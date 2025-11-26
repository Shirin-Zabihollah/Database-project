<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "symptom_tracker_db";

// اتصال
$conn = new mysqli($servername, $username, $password, $database);

// بررسی اتصال
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// دریافت داده از فرم
$name = $_POST['name'];
$specialization = $_POST['specialization'];
$email = $_POST['email'];

// اجرای کوئری
$sql = "INSERT INTO Doctor (Name, Specialization, Email)
        VALUES ('$name', '$specialization', '$email')";

if ($conn->query($sql) === TRUE) {
    echo "Doctor registered successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
