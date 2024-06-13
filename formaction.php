<?php
$errors = array();

if (isset($_POST["submit"])) {
    transmitmessage();

} else {
    $errors[] = "An unknown error occurred!";
    $errorString = implode("\n", $errors); // join the error messages into a string separated by newline characters
    header("location: contactform/contactform.php?error=" . urlencode($errorString));
}

function transmitmessage(){ 

    require "connect.php";

    // Validate input data
    $name = trim($_POST['name']);
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $subject = trim($_POST['subject']);
    $message = trim($_POST['message']);

    $errors = array();

    // Check that all fields are filled out
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        $errors[] = "Please fill out all the fields.";
    }

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    // Validate name format (only letters and hyphens allowed)
    if (!preg_match("/^[a-zA-Z\-]+$/", $name)) {
        $errors[] = "Invalid name format";
    }

    // Validate subject (only letters, numbers, and spaces allowed)
    if (!preg_match("/^[a-zA-Z0-9\s]+$/", $subject)) {
        $errors[] = "Invalid subject format";
    }

    // Validate message (only letters, numbers, spaces, and common punctuation allowed)
    if (!preg_match("/^[a-zA-Z0-9\s\.\?\!,]+$/", $message)) {
        $errors[] = "Invalid message format";
    }

    if (empty($errors)) {
        // Prepare and execute SQL query
        $stmt = $conn->prepare("INSERT INTO messages(Name, Email, Subject, Message) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $email, $subject, $message);
        if ($stmt->execute()){
            header("Location: contactform/contactform.php?msg=successfultransmission");
            exit();
        }
        else{
            echo "ERROR: " . $stmt->error;
            header("Location: contactform/contactform.php?msg=Error:". $stmt->error);
            exit();
        }
    } else {
        // If errors exist, implode them into a single message and redirect to the login page with error message
        $errorString = implode("\n", $errors); // join the error messages into a string separated by newline characters
        header("location: contactform/contactform.php?error=" . urlencode($errorString));
    }

    // Close database connection
    $conn->close();
}
?>