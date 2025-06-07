<?php include '../includes/db.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Doctors</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div class="container">
  <h2>Doctor List</h2>
  <table>
    <thead>
      <tr>
        <th>Doctor ID</th>
        <th>Name</th>
        <th>Specialization</th>
        <th>Email</th>
        <th>Phone</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $result = $conn->query("SELECT * FROM doctors");
      while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['d_id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['specialization']}</td>
                <td>{$row['email']}</td>
                <td>{$row['phone']}</td>
              </tr>";
      }
      ?>
    </tbody>
  </table>
</div>
</body>
</html>
