<?php
$conn = new mysqli("localhost", "root", "", "symptom_tracker_db");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

// استفاده از JOIN برای نمایش نام بیمار و نام علامت
$sql = "SELECT 
            psl.LogID,
            p.Name AS PatientName,
            s.Name AS SymptomName,
            psl.DateReported,
            psl.Severity
        FROM PatientSymptomLog psl
        JOIN Patient p ON psl.PatientID = p.PatientID
        JOIN Symptom s ON psl.SymptomID = s.SymptomID";

$result = $conn->query($sql);

echo "<h2>Logged Symptoms with Patient and Symptom Names</h2>";
if ($result->num_rows > 0) {
    echo "<table border='1' cellpadding='10'>
            <tr>
                <th>Log ID</th>
                <th>Patient Name</th>
                <th>Symptom Name</th>
                <th>Date Reported</th>
                <th>Severity</th>
            </tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['LogID']}</td>
                <td>{$row['PatientName']}</td>
                <td>{$row['SymptomName']}</td>
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
