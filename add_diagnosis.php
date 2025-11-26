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

// گرفتن داده از فرم
$visit_id = $_POST['visit_id'];
$diagnosis_name = $_POST['diagnosis_name'];
$diagnosis_date = $_POST['diagnosis_date'];

// اجرای کوئری
$sql = "INSERT INTO Diagnosis (VisitID, DiagnosisName, DiagnosisDate)
        VALUES ('$visit_id', '$diagnosis_name', '$diagnosis_date')";

if ($conn->query($sql) === TRUE) {
    echo "Diagnosis added successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
