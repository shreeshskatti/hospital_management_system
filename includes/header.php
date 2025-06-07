<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Hospital Management System</title>
  <link rel="stylesheet" href="/hospital_dbms_project/css/style.css">
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
    }
    .navbar {
      background: linear-gradient(90deg, #3f51b5, #5c6bc0);
      padding: 15px 30px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      color: white;
    }
    .navbar h1 {
      font-size: 22px;
      margin: 0;
    }
    .nav-links a {
      color: white;
      text-decoration: none;
      margin-left: 20px;
      font-weight: 500;
    }
    .nav-links a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="navbar">
    <h1>🏥 Hospital DBMS</h1>
    <div class="nav-links">
      <a href="/hospital_dbms_project/index.php">Home</a>
      <a href="/hospital_dbms_project/patients/register.php">Register</a>
      <a href="/hospital_dbms_project/patients/view.php">Patients</a>
      <a href="/hospital_dbms_project/appointments/view_appointments.php">Appointments</a>
      <a href="/hospital_dbms_project/doctors/view_doctors.php">Doctors</a>
      <a href="/hospital_dbms_project/medical_records/view_records.php">Records</a>
      <a href="/hospital_dbms_project/bills/view_bills.php">Bills</a>
      <a href="/hospital_dbms_project/rooms/view_rooms.php">Rooms</a>
    </div>
  </div>
