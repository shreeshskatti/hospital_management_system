<?php
include '../includes/db.php';

// Fetch all rooms ordered by room number
$query = "SELECT * FROM rooms ORDER BY room_number ASC";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Room Availability - Hospital Management System</title>
  <link rel="stylesheet" href="../css/style.css" />
  <style>
    .container {
      max-width: 900px;
      margin: 40px auto;
      padding: 25px;
      background: white;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
      text-align: center;
    }
    h2 {
      color: #00796B;
      margin-bottom: 30px;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      font-size: 16px;
    }
    th, td {
      padding: 12px 15px;
      border: 1px solid #ddd;
    }
    th {
      background-color: #004D40;
      color: white;
    }
    tr:nth-child(even) {
      background-color: #f0f9f8;
    }
    .available {
      color: green;
      font-weight: bold;
    }
    .occupied {
      color: red;
      font-weight: bold;
    }
  </style>
</head>
<body>

  <header>
    <h1>Hospital Management System</h1>
    <p>Efficient | Secure | Reliable</p>
  </header>

  <div class="container">
    <h2>🛏️ Room Availability</h2>
    <table>
      <thead>
        <tr>
          <th>Room Number</th>
          <th>Room Type</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <?php if ($result->num_rows > 0): ?>
          <?php while($row = $result->fetch_assoc()): ?>
          <tr>
            <td><?= htmlspecialchars($row['room_number']) ?></td>
            <td><?= htmlspecialchars($row['type']) ?></td>
            <td class="<?= strtolower($row['status']) == 'available' ? 'available' : 'occupied' ?>">
              <?= htmlspecialchars($row['status']) ?>
            </td>
          </tr>
          <?php endwhile; ?>
        <?php else: ?>
          <tr><td colspan="3">No rooms found.</td></tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>

  <footer>
    &copy; <?= date('Y') ?> Hospital Management System. All rights reserved.
  </footer>

</body>
</html>
