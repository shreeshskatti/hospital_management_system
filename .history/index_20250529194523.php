<?php include 'includes/db.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Hospital Management System</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div class="container">
    <h1>Welcome to Hospital Management System</h1>
    <p>Select an option to proceed:</p>
    <ul>
      <li><a href="patients/add_patient.php">Register a Patient</a></li>
      <li><a href="doctors/view_doctors.php">View Doctors</a></li>
      <li><a href="appointments/book_appointment.php">Book Appointment</a></li>
      <li><a href="medical_records/view_records.php">View Medical Records</a></li>
      <li><a href="bills/view_bills.php">View Bills</a></li>
      <li><a href="rooms/view_rooms.php">Room Availability</a></li>
    </ul>
  </div>
</body>
</html>
