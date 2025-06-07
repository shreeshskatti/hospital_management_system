<?php
include '../includes/db.php';
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $room_number = $_POST['room_number'];
    $type = $_POST['type'];
    $status = $_POST['status'];

    $sql = "INSERT INTO rooms (room_number, type, status)
            VALUES ('$room_number', '$type', '$status')";

    if (mysqli_query($conn, $sql)) {
        $success = "✅ Room added successfully!";
    } else {
        $success = "❌ Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Add Room - Hospital Management System</title>
  <link rel="stylesheet" href="../css/style.css" />
  <style>
    .container {
      max-width: 700px;
      margin: 40px auto;
      padding: 25px;
      background: white;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    h2 {
      color: #00796B;
      text-align: center;
      margin-bottom: 20px;
    }
    form label {
      font-weight: bold;
      display: block;
      margin-top: 15px;
    }
    form input, form select {
      width: 100%;
      padding: 10px;
      margin-top: 5px;
      border: 1px solid #ccc;
      border-radius: 6px;
    }
    button {
      margin-top: 20px;
      background-color: #00796B;
      color: white;
      padding: 12px 20px;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      width: 100%;
    }
    .message {
      margin-top: 20px;
      text-align: center;
      color: green;
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
    <h2>➕ Add New Room</h2>

    <?php if ($success) echo "<div class='message'>$success</div>"; ?>

    <form method="POST">
      <label for="room_number">Room Number</label>
      <input type="text" name="room_number" required />

      <label for="type">Room Type</label>
      <select name="type" required>
        <option value="">-- Select Type --</option>
        <option value="General">General</option>
        <option value="Private">Private</option>
        <option value="ICU">ICU</option>
        <option value="Deluxe">Deluxe</option>
      </select>

      <label for="status">Availability Status</label>
      <select name="status" required>
        <option value="Available">Available</option>
        <option value="Occupied">Occupied</option>
      </select>

      <button type="submit">Add Room</button>
    </form>
  </div>

  <footer>
    &copy; <?= date('Y') ?> Hospital Management System. All rights reserved.
  </footer>

</body>
</html>
