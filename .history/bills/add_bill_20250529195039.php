<?php include '../includes/db.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Add Bill</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div class="container">
  <h2>Generate New Bill</h2>
  <form method="POST">
    <label>Patient ID</label>
    <input type="number" name="p_id" required>

    <label>Amount (₹)</label>
    <input type="number" name="amount" required>

    <label>Status</label>
    <select name="status">
      <option value="Unpaid">Unpaid</option>
      <option value="Paid">Paid</option>
    </select>

    <label>Date</label>
    <input type="date" name="bill_date" required>

    <button type="submit" name="submit">Add Bill</button>
  </form>

  <?php
  if (isset($_POST['submit'])) {
    $p_id = $_POST['p_id'];
    $amount = $_POST['amount'];
    $status = $_POST['status'];
    $bill_date = $_POST['bill_date'];

    $sql = "INSERT INTO bills (p_id, amount, status, bill_date)
            VALUES ('$p_id', '$amount', '$status', '$bill_date')";
    if ($conn->query($sql)) {
      echo "<script>alert('Bill added successfully.');</script>";
    } else {
      echo "Error: " . $conn->error;
    }
  }
  ?>
</div>
</body>
</html>
