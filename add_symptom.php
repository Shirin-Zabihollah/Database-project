<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "symptom_tracker_db";

// اتصال به دیتابیس
$conn = new mysqli($servername, $username, $password, $database);

// بررسی اتصال
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// دریافت اطلاعات از فرم
$name = $_POST['name'];
$description = $_POST['description'];

// اجرای کوئری
$sql = "INSERT INTO Symptom (Name, Description) VALUES ('$name', '$description')";

if ($conn->query($sql) === TRUE) {
    echo "Symptom added successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
