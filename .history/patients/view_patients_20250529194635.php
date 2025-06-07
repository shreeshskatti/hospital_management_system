<?php include '../includes/db.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>All Patients</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div class="container">
  <h2>Patient Records</h2>
  <table>
    <thead>
      <tr>
        <th>P.ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>DOB</th>
        <th>Gender</th>
        <th>Address</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $result = $conn->query("SELECT * FROM patients");
      while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['p_id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['email']}</td>
                <td>{$row['phone']}</td>
                <td>{$row['dob']}</td>
                <td>{$row['gender']}</td>
                <td>{$row['address']}</td>
              </tr>";
      }
      ?>
    </tbody>
  </table>
</div>
</body>
</html>
