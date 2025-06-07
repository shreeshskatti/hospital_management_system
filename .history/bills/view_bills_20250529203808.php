<?php include '../includes/db.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>View Bills</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div class="container">
  <h2>Billing Records</h2>
  <table>
    <thead>
      <tr>
        <th>Bill ID</th>
        <th>Patient Name</th>
        <th>Amount</th>
        <th>Date</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $sql = "SELECT b.bill_id, b.patient_id, b.amount, b.bill_date, p.name AS patient_name 
              FROM bills b
              JOIN patients p ON b.patient_id = p.patient_id";
      $result = $conn->query($sql);

      if ($result && $result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
              echo "<tr>
                      <td>" . htmlspecialchars($row['bill_id']) . "</td>
                      <td>" . htmlspecialchars($row['patient_name']) . "</td>
                      <td>" . htmlspecialchars($row['amount']) . "</td>
                      <td>" . htmlspecialchars($row['bill_date']) . "</td>
                    </tr>";
          }
      } else {
          echo "<tr><td colspan='4' style='text-align:center;'>No billing records found.</td></tr>";
      }
      ?>
    </tbody>
  </table>
</div>
</body>
</html>
