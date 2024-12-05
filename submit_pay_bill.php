<?php

error_reporting(E_ALL & ~E_NOTICE);

// Include config file for database connection and session
require_once 'config.php';

// Check if the user is logged in
checkLogin();

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the logged-in user's ID from the session
    $userID = $_SESSION['firebaseUID'];

    // Form details
    $formTitle = 'Pay Your Bill'; // Set the form title
    $formType = 'pay_bill'; // Set the form type
    $formContent = [
        'name' => $_POST['name'] ?? '',
        'email' => $_POST['email'] ?? '',
        'bill_number' => $_POST['bill_number'] ?? '',
        'bill_type' => $_POST['bill_type'] ?? '',
        'amount' => $_POST['amount'] ?? '',
        'card_number' => $_POST['card_number'] ?? '',
        'expiry_date' => $_POST['expiry_date'] ?? '',
        'cvv' => $_POST['cvv'] ?? '',
    ];

    // Validate required fields
    if (
        empty($formContent['name']) || empty($formContent['email']) ||
        empty($formContent['bill_number']) || empty($formContent['bill_type']) ||
        empty($formContent['amount']) || empty($formContent['card_number']) ||
        empty($formContent['expiry_date']) || empty($formContent['cvv'])
    ) {
        echo json_encode(['status' => 'error', 'message' => 'All fields are required.']);
        exit;
    }

    // Insert the form data into the database
    try {
        $stmt = $conn->prepare("
            INSERT INTO forms (User_ID, Form_Title, Form_Type, Form_Content)
            VALUES (:user_id, :form_title, :form_type, :form_content)
        ");
        
        $user_id = $_SESSION['firebaseUID'];
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':form_title', $formTitle);
        $stmt->bindParam(':form_type', $formType);
        $stmt->bindParam(':form_content', json_encode($formContent)); // Encode form content as JSON

        $stmt->execute();

        echo json_encode(['status' => 'success', 'message' => 'Form submitted successfully.']);
    } catch (PDOException $e) {
        echo json_encode(['status' => 'error', 'message' => 'Failed to submit form: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
}
?>
