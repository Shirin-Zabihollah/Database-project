<?php
$conn = new mysqli("localhost", "root", "", "symptom_tracker_db");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$sql = "SELECT * FROM Prescription";
$result = $conn->query($sql);

echo "<h2>List of Prescriptions</h2>";
if ($result->num_rows > 0) {
    echo "<table border='1' cellpadding='10'>
            <tr>
                <th>Prescription ID</th>
                <th>Diagnosis ID</th>
                <th>Medication Name</th>
                <th>Dosage</th>
                <th>Duration</th>
            </tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['PrescriptionID']}</td>
                <td>{$row['DiagnosisID']}</td>
                <td>{$row['MedicationName']}</td>
                <td>{$row['Dosage']}</td>
                <td>{$row['Duration']}</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No prescriptions found.";
}
$conn->close();
?>
