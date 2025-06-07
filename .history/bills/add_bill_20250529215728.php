<?php
include '../includes/db.php';

// Fetch appointments and patient names
$query = "SELECT a.appointment_id, p.name 
          FROM appointments a 
          JOIN patients p ON a.patient_id = p.patient_id";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Bill</title>
</head>
<body>
  <h2>Add Bill</h2>
  <form method="POST" action="">
    <label for="appointment_id">Select Appointment (Patient):</label>
    <select name="appointment_id" required>
      <option value="">-- Select --</option>
      <?php while($row = $result->fetch_assoc()): ?>
        <option value="<?= $row['appointment_id'] ?>">
          <?= $row['appointment_id'] ?> - <?= htmlspecialchars($row['name']) ?>
        </option>
      <?php endwhile; ?>
    </select><br><br>

    <label for="amount">Amount (₹):</label>
    <input type="number" step="0.01" name="amount" required><br><br>

    <label for="bill_date">Bill Date:</label>
    <input type="date" name="bill_date" required><br><br>

    <label for="paid">Paid?</label>
    <select name="paid">
      <option value="0">No</option>
      <option value="1">Yes</option>
    </select><br><br>

    <input type="submit" name="submit" value="Add Bill">
  </form>
</body>
</html>

<?php
if (isset($_POST['submit'])) {
  $appointment_id = $_POST['appointment_id'];
  $amount = $_POST['amount'];
  $bill_date = $_POST['bill_date'];
  $paid = $_POST['paid'];

  $stmt = $conn->prepare("INSERT INTO bills (appointment_id, amount, bill_date, paid) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("idsi", $appointment_id, $amount, $bill_date, $paid);

  if ($stmt->execute()) {
    echo "<p style='color:green;'>Bill added successfully.</p>";
  } else {
    echo "<p style='color:red;'>Error: " . $stmt->error . "</p>";
  }
}
?>
