<?php
$conn = new mysqli("localhost", "root", "", "symptom_tracker_db");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$sql = "SELECT * FROM Visit";
$result = $conn->query($sql);

echo "<h2>List of Visits</h2>";
if ($result->num_rows > 0) {
    echo "<table border='1' cellpadding='10'>
            <tr>
                <th>Visit ID</th>
                <th>Patient ID</th>
                <th>Doctor ID</th>
                <th>Visit Date</th>
            </tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['VisitID']}</td>
                <td>{$row['PatientID']}</td>
                <td>{$row['DoctorID']}</td>
                <td>{$row['VisitDate']}</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No visits found.";
}
$conn->close();
?>
