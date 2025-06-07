<?php
include '../includes/db.php';

if (isset($_POST['submit'])) {
    // Collect and sanitize input
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $dob = $conn->real_escape_string($_POST['dob']);
    $gender = $conn->real_escape_string($_POST['gender']);
    $address = $conn->real_escape_string($_POST['address']);

    // Prepared statement to avoid SQL injection
    $stmt = $conn->prepare("INSERT INTO patients (name, email, phone, dob, gender, address) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $name, $email, $phone, $dob, $gender, $address);

    if ($stmt->execute()) {
        echo "<script>alert('Patient registered successfully.'); window.location.href='view_patients.php';</script>";
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Add New Patient</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>
  <div class="container">
    <h2>Register a New Patient</h2>
    <form action="add_patient.php" method="POST">
      <label>Full Name</label>
      <input type="text" name="name" required>

      <label>Email</label>
      <input type="email" name="email" required>

      <label>Phone</label>
      <input type="text" name="phone" required>

      <label>Date of Birth</label>
      <input type="date" name="dob" required>

      <label>Gender</label>
      <select name="gender" required>
        <option value="">-- Select --</option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
        <option value="Other">Other</option>
      </select>

      <label>Address</label>
      <input type="text" name="address" required>

      <button type="submit" name="submit">Register Patient</button>
    </form>
  </div>
</body>
</html>
