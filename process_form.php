<?php
// Replace these credentials with your actual database credentials
$hostname = 'localhost';
$username = 'librarym_system';
$password = 'yv9k29';
$database = 'user_login';

// Establish a connection to Oracle
$connection = oci_connect($username, $password, $hostname.'/'.$database);

if (!$connection) {
    $error_message = oci_error();
    die("Failed to connect to the database: " . $error_message['message']);
}

// Get form data
$username = $_POST['username'];
$email = $_POST['email'];

// Prepare the SQL statement
$sql = "INSERT INTO user_info (username, email) VALUES (:username, :email)";
$statement = oci_parse($connection, $sql);

// Bind parameters
oci_bind_by_name($statement, ":username", $username);
oci_bind_by_name($statement, ":email", $email);

// Execute the SQL statement
$result = oci_execute($statement);

if ($result) {
    echo "Data inserted successfully!";
} else {
    $error_message = oci_error($statement);
    echo "Failed to insert data: " . $error_message['message'];
}

// Close the connection
oci_close($connection);
?>
