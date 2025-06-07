<?php
include '../includes/db.php';

// Fetch medical records joined with patient and doctor names
$sql = "SELECT mr.record_id, p.name AS patient_name, d.name AS doctor_name, mr.diagnosis, mr.treatment, mr.record_date 
        FROM medical_records mr
        LEFT JOIN patients p ON mr.patient_id = p.patient_id
        LEFT JOIN doctors d ON mr.doctor_id = d.doctor_id
        ORDER BY mr.record_date DESC";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>View Medical Records</title>
  <link rel="stylesheet" href="../css/style.css" />
  <style>
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }
    th, td {
      padding: 12px 15px;
      border: 1px solid #ccc;
      text-align: left;
    }
    th {
      background-color: #00796B;
      color: white;
    }
    tr:nth-child(even) {
      background-color: #f2f2f2;
    }
    h2 {
      text-align: center;
      margin-top: 20px;
      color: #00796B;
    }
  </style>
</head>
<body>

  <h2>Medical Records</h2>

  <?php if ($result && $result->num_rows > 0): ?>
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Patient</th>
          <th>Doctor</th>
          <th>Diagnosis</th>
          <th>Treatment</th>
          <th>Date</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
          <td><?php echo $row['record_id']; ?></td>
          <td><?php echo htmlspecialchars($row['patient_name']); ?></td>
          <td><?php echo htmlspecialchars($row['doctor_name']); ?></td>
          <td><?php echo nl2br(htmlspecialchars($row['diagnosis'])); ?></td>
          <td><?php echo nl2br(htmlspecialchars($row['treatment'])); ?></td>
          <td><?php echo $row['record_date']; ?></td>
        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  <?php else: ?>
    <p style="text-align:center; margin-top: 30px;">No medical records found.</p>
  <?php endif; ?>

</body>
</html>
