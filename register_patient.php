<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "symptom_tracker_db";

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }

$name = $_POST['name'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$password = $_POST['password'];

$sql = "INSERT INTO Patient (Name, DateOfBirth, Gender, Email, Password) 
VALUES ('$name', '$dob', '$gender', '$email', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "Patient registered successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
