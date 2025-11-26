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

// گرفتن اطلاعات از فرم
$patient_id = $_POST['patient_id'];
$symptom_id = $_POST['symptom_id'];
$date_reported = $_POST['date_reported'];
$severity = $_POST['severity'];

// اجرای کوئری
$sql = "INSERT INTO PatientSymptomLog (PatientID, SymptomID, DateReported, Severity)
        VALUES ('$patient_id', '$symptom_id', '$date_reported', '$severity')";

if ($conn->query($sql) === TRUE) {
    echo "Symptom logged successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
