<?php
$conn = new mysqli("localhost", "root", "", "symptom_tracker_db");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$sql = "SELECT * FROM Diagnosis";
$result = $conn->query($sql);

echo "<h2>List of Diagnoses</h2>";
if ($result->num_rows > 0) {
    echo "<table border='1' cellpadding='10'>
            <tr>
                <th>Diagnosis ID</th>
                <th>Visit ID</th>
                <th>Diagnosis Name</th>
                <th>Diagnosis Date</th>
            </tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['DiagnosisID']}</td>
                <td>{$row['VisitID']}</td>
                <td>{$row['DiagnosisName']}</td>
                <td>{$row['DiagnosisDate']}</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No diagnoses found.";
}
$conn->close();
?>
