<?php
include '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize input
    $p_id = $conn->real_escape_string($_POST['p_id']);
    $d_id = $conn->real_escape_string($_POST['d_id']);
    $appointment_date = $conn->real_escape_string($_POST['appointment_date']);
    $reason = $conn->real_escape_string($_POST['reason']);

    // Simple validation (you can enhance this)
    if (empty($p_id) || empty($d_id) || empty($appointment_date) || empty($reason)) {
        $error = "Please fill all fields.";
    } else {
        // Insert into appointments
        $sql = "INSERT INTO appointments (p_id, d_id, appointment_date, reason) 
                VALUES ('$p_id', '$d_id', '$appointment_date', '$reason')";

        if ($conn->query($sql) === TRUE) {
            // Redirect after successful booking
            header("Location: view_appointments.php");
            exit();
        } else {
            $error = "Error: " . $conn->error;
        }
    }
}

// Fetch patients and doctors for select dropdowns
$patients = $conn->query("SELECT p_id, name FROM patients ORDER BY name ASC");
$doctors = $conn->query("SELECT d_id, name FROM doctors ORDER BY name ASC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Book Appointment</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div class="container">
    <h2>Book Appointment</h2>

    <?php if (!empty($error)) : ?>
        <p style="color:red;"><?php echo $error; ?></p>
    <?php endif; ?>

    <form action="book_appointment.php" method="POST">
        <label>Select Patient</label>
        <select name="p_id" required>
            <option value="">-- Select Patient --</option>
            <?php while($row = $patients->fetch_assoc()) : ?>
                <option value="<?php echo $row['p_id']; ?>"><?php echo htmlspecialchars($row['name']); ?></option>
            <?php endwhile; ?>
        </select>

        <label>Select Doctor</label>
        <select name="d_id" required>
            <option value="">-- Select Doctor --</option>
            <?php while($row = $doctors->fetch_assoc()) : ?>
                <option value="<?php echo $row['d_id']; ?>"><?php echo htmlspecialchars($row['name']); ?></option>
            <?php endwhile; ?>
        </select>

        <label>Appointment Date</label>
        <input type="date" name="appointment_date" required>

        <label>Reason for Visit</label>
        <textarea name="reason" required></textarea>

        <button type="submit">Book Appointment</button>
    </form>
</div>
</body>
</html>
