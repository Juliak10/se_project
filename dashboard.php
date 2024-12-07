<?php
// Include config for database connection
require_once 'config.php';

// Fetch users with Role 0 (Citizen)
$queryCitizens = "SELECT * FROM users WHERE Role = 0";
$stmtCitizens = $conn->prepare($queryCitizens);
$stmtCitizens->execute();
$citizens = $stmtCitizens->fetchAll(PDO::FETCH_ASSOC);

// Fetch users with Role 1 (Staff)
$queryStaff = "SELECT * FROM users WHERE Role = 1";
$stmtStaff = $conn->prepare($queryStaff);
$stmtStaff->execute();
$staff = $stmtStaff->fetchAll(PDO::FETCH_ASSOC);

// Fetch all forms
$queryForms = "SELECT * FROM forms";
$stmtForms = $conn->prepare($queryForms);
$stmtForms->execute();
$forms = $stmtForms->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="stylesDashboard.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f7fc;
            color: #333;
            margin: 0;
            padding: 0;
        }

        /* Sidebar */
        #sidebar {
            background-color: #fff;
            color: #007BFF;
            padding: 20px;
            width: 250px;
            height: 100vh;
            position: fixed;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }

        #sidebar a {
            color: #007BFF;
            text-decoration: none;
            padding: 10px 15px;
            display: block;
            margin-bottom: 15px;
            border-radius: 5px;
        }

        #sidebar a:hover {
            background-color: #007BFF;
            color: #fff;
        }

        #sidebar a.active {
            background-color: #007BFF;
            color: #fff;
        }

        /* Main Content */
        .main-content {
            margin-left: 250px;
            padding: 20px;
        }

        .dashboard-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #fff;
            padding: 10px 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .dashboard-header h1 {
            color: #007BFF;
        }

        .logout-btn {
            background-color: #e74c3c;
            color: #fff;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        .logout-btn:hover {
            background-color: #c0392b;
        }

        /* Section Header */
        .section-header h2 {
            font-size: 1.5rem;
            color: #007BFF;
            margin-bottom: 15px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        table th, table td {
            padding: 12px 15px;
            text-align: left;
        }

        table th {
            background-color: #007BFF;
            color: white;
        }

        table tbody tr {
            border-bottom: 1px solid #f1f1f1;
        }

        table tbody tr:hover {
            background-color: #f7f7f7;
        }

        .form-content {
            margin-bottom: 15px;
        }

        .form-content strong {
            display: inline-block;
            width: 150px;
            font-weight: bold;
            color: #007BFF;
        }

        .form-content br {
            margin-bottom: 5px;
        }

        /* Action buttons */
        .btn {
            padding: 8px 16px;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
            text-align: center;
        }

        .btn.green {
            background-color: #27ae60;
            color: white;
        }

        .btn.green:hover {
            background-color: #2ecc71;
        }

        .btn.red {
            background-color: #e74c3c;
            color: white;
        }

        .btn.red:hover {
            background-color: #c0392b;
        }

        .btn.blue {
            background-color: #007BFF;
            color: white;
        }

        .btn.blue:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <!-- Include Sidebar -->
    <?php include('sidebar.php'); ?>

    <!-- Main Content Area -->
    <div class="main-content">
        <div class="dashboard-header">
            <h1>Admin Panel</h1>
            <button class="logout-btn">Logout</button>
        </div>

        <!-- Citizens Table -->
        <section>
            <div class="section-header">
                <h2>Citizens</h2>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($citizens as $user): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($user['First_Name'] . ' ' . $user['Last_Name']); ?></td>
                            <td><?php echo htmlspecialchars($user['Email']); ?></td>
                            <td>Citizen</td>
                            <td>
                                <a href="edit_user.php?id=<?php echo htmlspecialchars($user['User_ID']); ?>" class="btn green">Edit</a>
                                <a href="delete_user.php?id=<?php echo htmlspecialchars($user['User_ID']); ?>" class="btn red">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>

        <!-- Staff Table -->
        <section>
            <div class="section-header">
                <h2>Staff</h2>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($staff as $user): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($user['First_Name'] . ' ' . $user['Last_Name']); ?></td>
                            <td><?php echo htmlspecialchars($user['Email']); ?></td>
                            <td>Staff</td>
                            <td>
                                <a href="edit_user.php?id=<?php echo htmlspecialchars($user['User_ID']); ?>" class="btn green">Edit</a>
                                <a href="delete_user.php?id=<?php echo htmlspecialchars($user['User_ID']); ?>" class="btn red">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>

        <!-- Forms Table -->
        <section>
            <div class="section-header">
                <h2>Form Submissions</h2>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Full Name</th>
                        <th>Form Title</th>
                        <th>Form Type</th>
                        <th>Form Content</th>
                        <th>Status</th>
                        <th>Submission Date</th>
                        <th>Updated At</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($forms as $form): ?>
                        <?php
                            // Fetch user name by matching User_ID
                            $userQuery = "SELECT First_Name, Last_Name FROM users WHERE User_ID = :userID";
                            $userStmt = $conn->prepare($userQuery);
                            $userStmt->execute([':userID' => $form['User_ID']]);
                            $user = $userStmt->fetch(PDO::FETCH_ASSOC);
                            $userName = $user ? htmlspecialchars($user['First_Name'] . ' ' . $user['Last_Name']) : 'Unknown User';

                            // Decode and format Form_Content
                            $formContent = $form['Form_Content'];
                            $decodedContent = json_decode($formContent, true);

                            if (json_last_error() == JSON_ERROR_NONE && is_array($decodedContent)) {
                                $formattedContent = '';
                                foreach ($decodedContent as $key => $value) {
                                    // Clean up key names
                                    $formattedKey = ucwords(str_replace(['_', '-'], ' ', $key));
                                    $formattedContent .= "<div class='form-content'><strong>" . $formattedKey . ":</strong> " . htmlspecialchars($value) . "</div>";
                                }
                            } else {
                                $formattedContent = nl2br(htmlspecialchars($formContent));
                            }
                        ?>
                        <tr>
                            <td><?php echo $userName; ?></td>
                            <td><?php echo htmlspecialchars($form['Form_Title']); ?></td>
                            <td><?php echo htmlspecialchars($form['Form_Type']); ?></td>
                            <td><?php echo $formattedContent; ?></td>
                            <td><?php echo htmlspecialchars($form['Status']); ?></td>
                            <td><?php echo htmlspecialchars($form['Submission_Date']); ?></td>
                            <td><?php echo htmlspecialchars($form['updated_at']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>
    </div>
</body>
</html>
