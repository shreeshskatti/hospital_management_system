<?php include 'includes/db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Hospital Management System</title>
  <link rel="stylesheet" href="css/style.css">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0; padding: 0;
      box-sizing: border-box;
      font-family: 'Roboto', sans-serif;
    }
    body {
      background: linear-gradient(to right, #e0f7fa, #ffffff);
      color: #333;
    }
    header {
      background-color: #00796B;
      color: white;
      padding: 20px 0;
      text-align: center;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    .container {
      max-width: 900px;
      margin: 40px auto;
      padding: 20px;
      background: white;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
      text-align: center;
    }
    h1 {
      margin-bottom: 10px;
    }
    p {
      font-size: 18px;
      margin-bottom: 30px;
    }
    ul {
      list-style: none;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
      gap: 20px;
      padding: 0;
    }
    li a {
      display: block;
      padding: 20px;
      background-color: #e0f2f1;
      border-radius: 8px;
      text-decoration: none;
      color: #004D40;
      font-weight: bold;
      font-size: 16px;
      transition: all 0.3s ease;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }
    li a:hover {
      background-color: #b2dfdb;
      transform: translateY(-5px);
    }
    footer {
      text-align: center;
      margin-top: 40px;
      padding: 20px;
      background-color: #00796B;
      color: white;
    }
  </style>
</head>
<body>

  <header>
    <h1>Hospital Management System</h1>
    <p>Efficient | Secure | Reliable</p>
  </header>

  <div class="container">
    <p>Select an option to proceed:</p>
    <ul>
      <li><a href="patients/add_patient.php">📝 Register a Patient</a></li>
      <li><a href="doctors/view_doctors.php">👨‍⚕️ View Doctors</a></li>
      <li><a href="appointments/book_appointment.php">📅 Book Appointment</a></li>
      <li><a href="medical_records/add_record.php">➕ Add Medical Record</a></li> <!-- Added link -->
      <li><a href="medical_records/view_records.php">📋 View Medical Records</a></li>
      <li><a href="bills/view_bills.php">💳 View Bills</a></li>
      <li><a href="rooms/view_rooms.php">🛏️ Room Availability</a></li>
    </ul>
  </div>

  <footer>
    &copy; <?php echo date('Y'); ?> Hospital Management System. All rights reserved.
  </footer>

</body>
</html>
