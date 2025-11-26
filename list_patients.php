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

// گرفتن اطلاعات از جدول Patient
$sql = "SELECT * FROM Patient";
$result = $conn->query($sql);

echo "<h2>List of Registered Patients</h2>";
if ($result->num_rows > 0) {
    echo "<table border='1' cellpadding='10'>
            <tr>
                <th>Patient ID</th>
                <th>Name</th>
                <th>Date of Birth</th>
                <th>Gender</th>
                <th>Email</th>
            </tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row["PatientID"]."</td>
                <td>".$row["Name"]."</td>
                <td>".$row["DateOfBirth"]."</td>
                <td>".$row["Gender"]."</td>
                <td>".$row["Email"]."</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No patients found.";
}

$conn->close();
?>
