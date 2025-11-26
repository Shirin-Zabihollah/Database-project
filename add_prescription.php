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
$diagnosis_id = $_POST['diagnosis_id'];
$medication_name = $_POST['medication_name'];
$dosage = $_POST['dosage'];
$duration = $_POST['duration'];

// اجرای کوئری
$sql = "INSERT INTO Prescription (DiagnosisID, MedicationName, Dosage, Duration)
        VALUES ('$diagnosis_id', '$medication_name', '$dosage', '$duration')";

if ($conn->query($sql) === TRUE) {
    echo "Prescription added successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
