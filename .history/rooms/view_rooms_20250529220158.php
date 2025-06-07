<?php
include '../includes/db.php';

// Fetch all rooms
$query = "SELECT * FROM rooms ORDER BY room_number ASC";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Room Availability</title>
  <link rel="stylesheet" href="../css/style.css" />
  <style>
    .container {
      max-width: 900px;
      margin: 50px auto;
      padding: 25px;
      background: white;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    h2 {
      text-align: center;
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
      text-align: center;
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

  <div class="container">
    <h2>🛏️ Room Availability</h2>
    <table>
      <thead>
        <tr>
          <th>Room Number</th>
          <th>Room Type</th>
          <th>Price per Day (₹)</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
          <td><?= htmlspecialchars($row['room_number']) ?></td>
          <td><?= htmlspecialchars($row['room_type']) ?></td>
          <td><?= number_format($row['price_per_day'], 2) ?></td>
          <td class="<?= $row['is_available'] ? 'available' : 'occupied' ?>">
            <?= $row['is_available'] ? 'Available' : 'Occupied' ?>
          </td>
        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>

</body>
</html>
