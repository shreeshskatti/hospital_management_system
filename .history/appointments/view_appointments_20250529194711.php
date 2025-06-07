<?php include '../includes/db.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>View Appointments</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div class="container">
  <h2>Appointments</h2>
  <table>
    <thead>
      <tr>
        <th>Appointment ID</th>
        <th>Patient Name</th>
        <th>Doctor Name</th>
        <th>Date</th>
        <th>Reason</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $sql = "SELECT a.appointment_id, p.name AS patient, d.name AS doctor, a.appointment_date, a.reason
              FROM appointments a
              JOIN patients p ON a.p_id = p.p_id
              JOIN doctors d ON a.d_id = d.d_id";
      $result = $conn->query($sql);
      while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['appointment_id']}</td>
                <td>{$row['patient']}</td>
                <td>{$row['doctor']}</td>
                <td>{$row['appointment_date']}</td>
                <td>{$row['reason']}</td>
              </tr>";
      }
      ?>
    </tbody>
  </table>
</div>
</body>
</html>
