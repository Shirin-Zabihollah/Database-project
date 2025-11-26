<?php
$conn = new mysqli("localhost", "root", "", "symptom_tracker_db");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$sql = "SELECT * FROM PatientSymptomLog";
$result = $conn->query($sql);

echo "<h2>List of Logged Patient Symptoms</h2>";
if ($result->num_rows > 0) {
    echo "<table border='1' cellpadding='10'>
            <tr>
                <th>Log ID</th>
                <th>Patient ID</th>
                <th>Symptom ID</th>
                <th>Date Reported</th>
                <th>Severity</th>
            </tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['LogID']}</td>
                <td>{$row['PatientID']}</td>
                <td>{$row['SymptomID']}</td>
                <td>{$row['DateReported']}</td>
                <td>{$row['Severity']}</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No symptom logs found.";
}
$conn->close();
?>
