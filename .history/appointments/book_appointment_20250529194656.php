<?php include '../includes/db.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Book Appointment</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div class="container">
  <h2>Book Appointment</h2>
  <form method="POST">
    <label>Patient ID</label>
    <input type="number" name="p_id" required>

    <label>Doctor ID</label>
    <input type="number" name="d_id" required>

    <label>Date</label>
    <input type="date" name="appointment_date" required>

    <label>Reason for Visit</label>
    <input type="text" name="reason" required>

    <button type="submit" name="submit">Book</button>
  </form>

  <?php
  if (isset($_POST['submit'])) {
    $p_id = $_POST['p_id'];
    $d_id = $_POST['d_id'];
    $appointment_date = $_POST['appointment_date'];
    $reason = $_POST['reason'];

    $sql = "INSERT INTO appointments (p_id, d_id, appointment_date, reason)
            VALUES ('$p_id', '$d_id', '$appointment_date', '$reason')";
    if ($conn->query($sql)) {
      echo "<script>alert('Appointment booked successfully.');</script>";
    } else {
      echo "Error: " . $conn->error;
    }
  }
  ?>
</div>
</body>
</html>
