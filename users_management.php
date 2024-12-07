<?php
// Include config for database connection
require_once 'config.php';

// Fetch all users
$query = "SELECT * FROM users";
$stmt = $conn->prepare($query);
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* Base styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            display: flex;
            min-height: 100vh;
            background: #f5f8fa;
            color: #333;
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            background: #007bff;
            color: #fff;
            padding: 20px;
            height: 100vh;
            position: fixed;
        }

        .sidebar .logo {
            margin-bottom: 20px;
        }

        .sidebar nav ul {
            list-style: none;
            padding: 0;
        }

        .sidebar nav ul li {
            margin-bottom: 10px;
        }

        .sidebar nav ul li a {
            text-decoration: none;
            color: #fff;
            font-size: 16px;
            padding: 10px;
            display: block;
            border-radius: 5px;
            transition: background 0.3s ease;
        }

        .sidebar nav ul li a:hover {
            background: #0056b3;
        }

        .sidebar nav ul li a.active {
            background: #003366;
        }

        /* Main content area */
        .main-content {
            margin-left: 250px;
            padding: 20px;
            width: calc(100% - 250px);
        }

        /* Dashboard Header */
        .dashboard-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        /* Header Wrapper for User Management */
        .header-wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            background: #fff;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        /* Admin Panel header title */
        .header-wrapper h1 {
            font-size: 30px;
            font-weight: 700;
            color: #333;
            margin: 0;
            text-align: center;
        }

        /* Logout Button */
        .logout-btn {
            padding: 10px 20px;
            background: #dc3545;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .logout-btn:hover {
            background: #c82333;
        }

        /* Dashboard Sections */
        .dashboard-section {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        .dashboard-section h2 {
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        textarea,
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            color: #333;
        }

        textarea {
            resize: vertical;
        }

        button.btn {
            background: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        button.btn.blue {
            background: #007bff;
        }

        button.btn.green {
            background: #28a745;
        }

        button.btn.red {
            background: #dc3545;
        }

        button.btn:hover {
            background: #0056b3;
        }

        /* Tables */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background: #007bff;
            color: white;
        }

        table tbody tr:hover {
            background: #f1f1f1;
        }

        /* Button Styling for 'Add New User' */
        .add-user-btn {
            background: #007bff;
            color: white;
            padding: 12px 25px;
            text-decoration: none;
            font-size: 16px;
            border-radius: 5px;
            transition: background 0.3s ease, transform 0.3s ease;
            display: inline-block;
            margin-top: 15px;
        }

        .add-user-btn:hover {
            background: #0056b3;
            transform: scale(1.05);
        }

        .add-user-btn:focus {
            outline: none;
            box-shadow: 0 0 10px rgba(0, 123, 255, 0.5);
        }

        /* Edit Button Styling */
        .edit-btn {
            background: #28a745;
            color: white;
            padding: 8px 20px;
            text-decoration: none;
            font-size: 14px;
            border-radius: 5px;
            transition: background 0.3s ease, transform 0.3s ease;
            display: inline-block;
        }

        .edit-btn:hover {
            background: #218838;
            transform: scale(1.05);
        }

        .edit-btn:focus {
            outline: none;
            box-shadow: 0 0 10px rgba(40, 167, 69, 0.5);
        }

        /* Delete Button Styling */
        .delete-btn {
            background: #dc3545;
            color: white;
            padding: 8px 20px;
            text-decoration: none;
            font-size: 14px;
            border-radius: 5px;
            transition: background 0.3s ease, transform 0.3s ease;
            display: inline-block;
        }

        .delete-btn:hover {
            background: #c82333;
            transform: scale(1.05);
        }

        .delete-btn:focus {
            outline: none;
            box-shadow: 0 0 10px rgba(220, 53, 69, 0.5);
        }
    </style>
</head>
<body>
    <!-- Include Sidebar -->
    <?php include('sidebar.php'); ?>

    <!-- Main Content Area -->
    <div class="main-content">
        <!-- Header Wrapper for User Management -->
        <div class="dashboard-header">
            <div class="header-wrapper">
                <h1>User Management</h1>
            </div>
        </div>

        <!-- Users Table -->
        <section>
            <div class="section-header">
                <h2>Users List</h2>
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
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?php echo $user['First_Name'] . ' ' . $user['Last_Name']; ?></td>
                            <td><?php echo $user['Email']; ?></td>
                            <td><?php echo $user['Role'] == 1 ? 'Admin' : 'User'; ?></td>
                            <td>
                                <a href="edit_user.php?id=<?php echo $user['User_ID']; ?>" class="btn green edit-btn">Edit</a>
                                <a href="delete_user.php?id=<?php echo $user['User_ID']; ?>" class="btn red delete-btn">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>
    </div>
</body>
</html>
