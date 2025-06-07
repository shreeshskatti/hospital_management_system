<?php include '../includes/db.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Patient Bills</title>
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
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $sql = "SELECT b.bill_id, p.name AS patient, b.amount, b.bill_date, b.status
              FROM bills b
              JOIN patients p ON b.p_id = p.p_id";
      $result = $conn->query($sql);
      while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['bill_id']}</td>
                <td>{$row['patient']}</td>
                <td>₹{$row['amount']}</td>
                <td>{$row['bill_date']}</td>
                <td>{$row['status']}</td>
              </tr>";
      }
      ?>
    </tbody>
  </table>
</div>
</body>
</html>
