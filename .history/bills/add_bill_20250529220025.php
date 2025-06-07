<?php
include '../includes/db.php';

// Fetch appointments with patient names
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
  <link rel="stylesheet" href="../css/style.css">
  <style>
    body {
      background: linear-gradient(to right, #e0f7fa, #ffffff);
      font-family: 'Roboto', sans-serif;
    }
    .container {
      max-width: 700px;
      margin: 50px auto;
      padding: 30px;
      background-color: #ffffff;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    h2 {
      text-align: center;
      color: #00796B;
      margin-bottom: 30px;
    }
    label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
      color: #004D40;
    }
    select, input[type="number"], input[type="date"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 20px;
      border-radius: 6px;
      border: 1px solid #ccc;
      font-size: 16px;
    }
    select:focus, input:focus {
      outline: none;
      border-color: #00796B;
      box-shadow: 0 0 5px rgba(0,121,107,0.3);
    }
    input[type="submit"] {
      width: 100%;
      background-color: #00796B;
      color: white;
      padding: 12px;
      border: none;
      border-radius: 6px;
      font-size: 16px;
      font-weight: bold;
      cursor: pointer;
    }
    input[type="submit"]:hover {
      background-color: #004D40;
    }
    .msg {
      text-align: center;
      margin-top: 20px;
      font-size: 16px;
    }
  </style>
</head>
<body>

  <div class="container">
    <h2>➕ Add Bill</h2>
    <form method="POST" action="">
      <label for="appointment_id">Select Appointment (Patient):</label>
      <select name="appointment_id" required>
        <option value="">-- Select --</option>
        <?php while($row = $result->fetch_assoc()): ?>
          <option value="<?= $row['appointment_id'] ?>">
            <?= $row['appointment_id'] ?> - <?= htmlspecialchars($row['name']) ?>
          </option>
        <?php endwhile; ?>
      </select>

      <label for="amount">Amount (₹):</label>
      <input type="number" step="0.01" name="amount" required>

      <label for="bill_date">Bill Date:</label>
      <input type="date" name="bill_date" required>

      <label for="paid">Paid?</label>
      <select name="paid">
        <option value="0">No</option>
        <option value="1">Yes</option>
      </select>

      <input type="submit" name="submit" value="Add Bill">
    </form>

    <?php
    if (isset($_POST['submit'])) {
      $appointment_id = $_POST['appointment_id'];
      $amount = $_POST['amount'];
      $bill_date = $_POST['bill_date'];
      $paid = $_POST['paid'];

      $stmt = $conn->prepare("INSERT INTO bills (appointment_id, amount, bill_date, paid) VALUES (?, ?, ?, ?)");
      $stmt->bind_param("idsi", $appointment_id, $amount, $bill_date, $paid);

      if ($stmt->execute()) {
        echo "<p class='msg' style='color: green;'>✅ Bill added successfully.</p>";
      } else {
        echo "<p class='msg' style='color: red;'>❌ Error: " . $stmt->error . "</p>";
      }
    }
    ?>
  </div>

</body>
</html>
