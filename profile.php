<?php
// Start session and connect to the database
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$host = '127.0.0.1';
$db = 'mybeirut';
$user = 'root';
$password = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$db", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Fetch user data if authenticated
if (isset($_SESSION['firebaseUID'])) {
    $firebaseUID = $_SESSION['firebaseUID'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE User_ID = :user_id");
    $stmt->bindParam(':user_id', $firebaseUID);
    $stmt->execute();
    $userData = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($userData) {
        $Name = $userData['First_Name'] . " " . $userData['Last_Name'];
        $Role = $userData['Role'] == 0 ? 'Citizen' : ($userData['Role'] == 1 ? 'Staff' : 'User'); // Role mapping
        $Picture = $userData['Picture'] ?? 'uploads/default.png'; // Default profile picture
        $Email = $userData['Email'] ?? 'N/A';
        $Phone = $userData['Phone_Number'] ?? 'N/A'; // Retrieve phone number from the database
    } else {
        die("Error: User not found.");
    }
} else {
    // Redirect to sign-in if not authenticated
    header("Location: signin.php");
    exit();
}

// Handle profile picture upload
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['profile_pic'])) {
    $targetDir = "uploads/";
    $fileName = basename($_FILES['profile_pic']['name']);
    $targetFilePath = $targetDir . $fileName;

    // Validate file type
    $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
    $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];

    if (!in_array($fileType, $allowedTypes)) {
        echo "<script>alert('Only JPG, JPEG, PNG, and GIF files are allowed.');</script>";
    } elseif (move_uploaded_file($_FILES['profile_pic']['tmp_name'], $targetFilePath)) {
        // Update picture path in the database
        $stmt = $conn->prepare("UPDATE users SET Picture = :picture WHERE User_ID = :user_id");
        $stmt->bindParam(':picture', $targetFilePath);
        $stmt->bindParam(':user_id', $firebaseUID);

        if ($stmt->execute()) {
            $Picture = $targetFilePath; // Update the variable for display
            echo "<script>alert('Profile picture updated successfully!');</script>";
        } else {
            echo "<script>alert('Failed to update profile picture in the database.');</script>";
        }
    } else {
        echo "<script>alert('Failed to upload file. Ensure the uploads/ directory exists and is writable.');</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <link rel="stylesheet" href="styles.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <nav class="navbar">
        <div class="logo">
            <img src="./assets/hasan.png" alt="Logo" class="logo-img">
        </div>
        <ul class="nav-links">
            <li><a href="home.php">Home</a></li>
            <li><a href="signup.php">Sign Up</a></li>
            <li><a href="signin.php">Sign In</a></li>
            <li><a href="forms.php">Forms</a></li>
            <li><a href="about_us.php">About Us</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
        <div class="profile-icon">
            <i class='bx bx-user'></i>
        </div>
    </nav>

    <div class="wrapper">
        <div class="tabs">
            <button class="tab-button active" onclick="showTab('profile-info')">Profile Info</button>
            <button class="tab-button" onclick="showTab('form-submissions')">Form Submissions</button>
        </div>

        <div id="profile-info" class="tab-content active">
            <div class="profile-header">
                <img src="<?php echo htmlspecialchars($Picture); ?>" alt="Profile Picture" id="profile-picture">

                <form action="profile.php" method="POST" enctype="multipart/form-data" id="upload-form">
                    <input type="file" name="profile_pic" id="file-upload" accept="image/*" style="display: none;">
                    <button type="button" id="upload-btn">Upload Profile Picture</button>
                    <button type="button" id="change-pass" onclick="window.location.href='Resetpass.php';">Change Password</button>
                    <button type="submit" id="submit-btn" style="display: none;">Submit</button>
                </form>

                <h1 id="user-name"><?php echo htmlspecialchars($Name); ?></h1>
            </div>
            <div class="profile-info">
                <p><strong>Email:</strong> <?php echo htmlspecialchars($Email); ?></p>
                <p><strong>Phone:</strong> <?php echo htmlspecialchars($Phone); ?></p>
                <p><strong>Role:</strong> <?php echo htmlspecialchars($Role); ?></p>
            </div>
        </div>

        <div id="form-submissions" class="tab-content">
            <h3>Form Submissions</h3>
            <ul id="form-list">
                <li>Loading forms...</li>
            </ul>
        </div>
    </div>

    <script>
        const uploadBtn = document.getElementById('upload-btn');
        const fileInput = document.getElementById('file-upload');
        const submitBtn = document.getElementById('submit-btn');
        const profilePicture = document.getElementById('profile-picture');

        // Tab functionality
        const tabs = document.querySelectorAll('.tab-button');
        const contents = document.querySelectorAll('.tab-content');

        function showTab(tabId) {
            tabs.forEach(tab => tab.classList.remove('active'));
            contents.forEach(content => content.classList.remove('active'));

            document.querySelector(`[onclick="showTab('${tabId}')"]`).classList.add('active');
            document.getElementById(tabId).classList.add('active');
        }

        // Trigger file input when upload button is clicked
        uploadBtn.addEventListener('click', () => {
            fileInput.click();
        });

        // Show submit button when a file is selected
        fileInput.addEventListener('change', () => {
            submitBtn.style.display = 'inline-block';

            // Preview the selected image
            const file = fileInput.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    profilePicture.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
</body>

</html>
