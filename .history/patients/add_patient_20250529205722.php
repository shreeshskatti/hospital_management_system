<?php include '../includes/db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Register New Patient</title>
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0; padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    body {
      background: linear-gradient(135deg, #c9e4f3, #e2f1fa);
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      padding: 20px;
    }

    .container {
      background: rgba(255, 255, 255, 0.85);
      backdrop-filter: blur(10px);
      border-radius: 20px;
      padding: 40px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
      max-width: 600px;
      width: 100%;
      animation: fadeIn 0.8s ease-in-out;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(30px); }
      to { opacity: 1; transform: translateY(0); }
    }

    h2 {
      text-align: center;
      margin-bottom: 30px;
      font-size: 28px;
      color: #0a3c68;
      position: relative;
    }

    h2::after {
      content: '';
      width: 60px;
      height: 4px;
      background: #0a3c68;
      position: absolute;
      left: 50%;
      transform: translateX(-50%);
      bottom: -10px;
      border-radius: 2px;
    }

    form {
      display: flex;
      flex-direction: column;
    }

    label {
      font-weight: 600;
      margin: 12px 0 6px;
      color: #333;
    }

    input, select {
      padding: 12px;
      border-radius: 8px;
      border: 1px solid #ccc;
      font-size: 15px;
      transition: 0.3s;
      background: #f9f9f9;
    }

    input:focus, select:focus {
      border-color: #0a3c68;
      box-shadow: 0 0 5px rgba(10, 60, 104, 0.3);
      background-color: #fff;
    }

    button {
      margin-top: 25px;
      padding: 12px;
      background: #0a3c68;
      color: #fff;
      font-size: 16px;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      font-weight: 600;
      transition: 0.3s;
    }

    button:hover {
      background: #06294a;
    }

    .back-link {
      text-align: center;
      margin-top: 20px;
    }

    .back-link a {
      color: #0a3c68;
      text-decoration: none;
      font-weight: 600;
      transition: 0.2s;
    }

    .back-link a:hover {
      text-decoration: underline;
    }

    .icon-input {
      position: relative;
    }

    .icon-input i {
      position: absolute;
      top: 50%;
      left: 12px;
      transform: translateY(-50%);
      color: #777;
    }

    .icon-input input {
      padding-left: 36px;
    }

    select {
      padding-left: 10px;
    }
  </style>
</head>
<body>

  <div class="container">
    <h2><i class="fas fa-user-plus"></i> Register New Patient</h2>

    <form action="" method="POST">
      <label>Full Name</label>
      <div class="icon-input">
        <i class="fas fa-user"></i>
        <input type="text" name="name" required>
      </div>

      <label>Email</label>
      <div class="icon-input">
        <i class="fas fa-envelope"></i>
        <input type="email" name="email" required>
      </div>

      <label>Phone</label>
      <div class="icon-input">
        <i class="fas fa-phone"></i>
        <input type="text" name="phone" required>
      </div>

      <label>Date of Birth</label>
      <div class="icon-input">
        <i class="fas fa-calendar-alt"></i>
        <input type="date" name="dob" required>
      </div>

      <label>Gender</label>
      <select name="gender" required>
        <option value="">-- Select --</option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
        <option value="Other">Other</option>
      </select>

      <label>Address</label>
      <div class="icon-input">
        <i class="fas fa-map-marker-alt"></i>
        <input type="text" name="address" required>
      </div>

      <button type="submit" name="submit"><i class="fas fa-plus-circle"></i> Register Patient</button>
    </form>

    <div class="back-link">
      <p><a href="view_patients.php"><i class="fas fa-arrow-left"></i> View Registered Patients</a></p>
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
