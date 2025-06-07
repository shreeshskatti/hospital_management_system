<?php include '../includes/db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add New Patient</title>
  <link rel="stylesheet" href="../css/style.css">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0; padding: 0;
      box-sizing: border-box;
      font-family: 'Roboto', sans-serif;
    }
    body {
      background: linear-gradient(to right, #e3f2fd, #ffffff);
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }
    .container {
      background-color: #ffffff;
      padding: 30px 40px;
      border-radius: 12px;
      box-shadow: 0 8px 20px rgba(0,0,0,0.1);
      max-width: 600px;
      width: 100%;
    }
    h2 {
      text-align: center;
      margin-bottom: 25px;
      color: #1976D2;
    }
    form {
      display: flex;
      flex-direction: column;
    }
    label {
      margin-top: 15px;
      font-weight: bold;
      color: #333;
    }
    input, select {
      padding: 10px 12px;
      margin-top: 5px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 16px;
      transition: 0.3s;
    }
    input:focus, select:focus {
      outline: none;
      border-color: #1976D2;
      box-shadow: 0 0 5px rgba(25, 118, 210, 0.3);
    }
    button {
      margin-top: 25px;
      padding: 12px;
      background-color: #1976D2;
      color: white;
      border: none;
      border-radius: 6px;
      font-size: 16px;
      cursor: pointer;
      transition: 0.3s;
    }
    button:hover {
      background-color: #0d47a1;
    }
    .back-link {
      margin-top: 20px;
      text-align: center;
    }
    .back-link a {
      color: #1976D2;
      text-decoration: none;
      font-weight: bold;
    }
    .back-link a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

  <div class="container">
    <h2>Register a New Patient</h2>
    <form action="" method="POST">
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

    <div class="back-link">
      <p><a href="view_patients.php">← View Registered Patients</a></p>
    </div>
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
    exit();
  } else {
    echo "<p style='color: red; text-align:center;'>Error: " . $conn->error . "</p>";
  }
}
?>

</body>
</html>
