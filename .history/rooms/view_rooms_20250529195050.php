<?php include '../includes/db.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Room Availability</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div class="container">
  <h2>Room List</h2>
  <table>
    <thead>
      <tr>
        <th>Room ID</th>
        <th>Room Type</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $result = $conn->query("SELECT * FROM rooms");
      while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['room_id']}</td>
                <td>{$row['room_type']}</td>
                <td>{$row['status']}</td>
              </tr>";
      }
      ?>
    </tbody>
  </table>
</div>
</body>
</html>
