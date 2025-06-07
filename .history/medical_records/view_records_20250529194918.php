<?php include '../includes/db.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Medical Records</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div class="container">
  <h2>Medical Records</h2>
  <table>
    <thead>
      <tr>
        <th>Record ID</th>
        <th>Patient Name</th>
        <th>Diagnosis</th>
        <th>Treatment</th>
        <th>Date</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $sql = "SELECT r.record_id, p.name AS patient, r.diagnosis, r.treatment, r.record_date
              FROM medical_records r
              JOIN patients p ON r.p_id = p.p_id";
      $result = $conn->query($sql);
      while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['record_id']}</td>
                <td>{$row['patient']}</td>
                <td>{$row['diagnosis']}</td>
                <td>{$row['treatment']}</td>
                <td>{$row['record_date']}</td>
              </tr>";
      }
      ?>
    </tbody>
  </table>
</div>
</body>
</html>
