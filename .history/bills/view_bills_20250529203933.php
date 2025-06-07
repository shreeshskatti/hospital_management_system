<?php 
include '../includes/db.php'; 
?>

<!DOCTYPE html>
<html>
<head>
  <title>View Bills</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div class="container">
  <h2>Bill Records</h2>
  <table>
    <thead>
      <tr>
        <th>Bill ID</th>
        <th>Patient Name</th>
        <th>Amount</th>
        <th>Paid</th>
        <th>Bill Date</th>
      </tr>
    </thead>
    <tbody>
      <?php
      // SQL with JOINs through appointments to patients
      $sql = "SELECT b.bill_id, p.name AS patient_name, b.amount, b.paid, b.bill_date 
              FROM bills b
              JOIN appointments a ON b.appointment_id = a.appointment_id
              JOIN patients p ON a.patient_id = p.patient_id";

      $result = $conn->query($sql);

      if($result) {
        while ($row = $result->fetch_assoc()) {
          echo "<tr>
                  <td>{$row['bill_id']}</td>
                  <td>{$row['patient_name']}</td>
                  <td>{$row['amount']}</td>
                  <td>" . ($row['paid'] ? "Yes" : "No") . "</td>
                  <td>{$row['bill_date']}</td>
                </tr>";
        }
      } else {
        echo "<tr><td colspan='5'>Error: " . $conn->error . "</td></tr>";
      }
      ?>
    </tbody>
  </table>
</div>
</body>
</html>
