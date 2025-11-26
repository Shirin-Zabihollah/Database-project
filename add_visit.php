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
$doctor_id = $_POST['doctor_id'];
$visit_date = $_POST['visit_date'];

// اجرای کوئری
$sql = "INSERT INTO Visit (PatientID, DoctorID, VisitDate)
        VALUES ('$patient_id', '$doctor_id', '$visit_date')";

if ($conn->query($sql) === TRUE) {
    echo "Visit added successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
