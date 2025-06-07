<?php include '../includes/db.php'; ?>
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

<?php
if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $dob = $_POST['dob'];
  $gender = $_POST['gender'];
  $address = $_POST['address'];

  $sql = "INSERT INTO patients (name, email, phone, dob, gender, address)
          VALUES ('$name', '$email', '$phone', '$dob', '$gender', '$address')";

  if ($conn->query($sql)) {
    echo "<script>alert('Patient registered successfully.'); window.location.href='view_patients.php';</script>";
  } else {
    echo "Error: " . $conn->error;
  }
}
?>
</body>
</html>
