<?php include '../includes/db.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Add Medical Record</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div class="container">
  <h2>Add Medical Record</h2>
  <form method="POST">
    <label>Patient ID</label>
    <input type="number" name="p_id" required>

    <label>Diagnosis</label>
    <input type="text" name="diagnosis" required>

    <label>Treatment</label>
    <input type="text" name="treatment" required>

    <label>Record Date</label>
    <input type="date" name="record_date" required>

    <button type="submit" name="submit">Save Record</button>
  </form>

  <?php
  if (isset($_POST['submit'])) {
    $p_id = $_POST['p_id'];
    $diagnosis = $_POST['diagnosis'];
    $treatment = $_POST['treatment'];
    $record_date = $_POST['record_date'];

    $sql = "INSERT INTO medical_records (p_id, diagnosis, treatment, record_date)
            VALUES ('$p_id', '$diagnosis', '$treatment', '$record_date')";

    if ($conn->query($sql)) {
      echo "<script>alert('Record added successfully.');</script>";
    } else {
      echo "Error: " . $conn->error;
    }
  }
  ?>
</div>
</body>
</html>
