<?php
include '../includes/db.php';  // Adjust path if needed

// Fetch patients
$patients = $conn->query("SELECT patient_id, name FROM patients");
if (!$patients) {
    die("Error fetching patients: " . $conn->error);
}

// Fetch doctors
$doctors = $conn->query("SELECT doctor_id, name FROM doctors");
if (!$doctors) {
    die("Error fetching doctors: " . $conn->error);
}

if (isset($_POST['submit'])) {
    $patient_id = $_POST['patient_id'];
    $doctor_id = $_POST['doctor_id'];
    $appointment_date = $_POST['appointment_date'];
    $reason = $conn->real_escape_string($_POST['reason']);

    $insert_sql = "INSERT INTO appointments (patient_id, doctor_id, appointment_date, reason) 
                   VALUES ('$patient_id', '$doctor_id', '$appointment_date', '$reason')";

    if ($conn->query($insert_sql)) {
        echo "<script>alert('Appointment booked successfully.'); window.location.href='view_appointments.php';</script>";
        exit();
    } else {
        echo "Error booking appointment: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Book Appointment</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div class="container">
    <h2>Book a New Appointment</h2>
    <form action="" method="POST">

        <label>Patient</label>
        <select name="patient_id" required>
            <option value="">-- Select Patient --</option>
            <?php while ($row = $patients->fetch_assoc()): ?>
                <option value="<?php echo $row['patient_id']; ?>">
                    <?php echo htmlspecialchars($row['name']); ?>
                </option>
            <?php endwhile; ?>
        </select>

        <label>Doctor</label>
        <select name="doctor_id" required>
            <option value="">-- Select Doctor --</option>
            <?php while ($row = $doctors->fetch_assoc()): ?>
                <option value="<?php echo $row['doctor_id']; ?>">
                    <?php echo htmlspecialchars($row['name']); ?>
                </option>
            <?php endwhile; ?>
        </select>

        <label>Appointment Date</label>
        <input type="date" name="appointment_date" required>

        <label>Reason for Visit</label>
        <textarea name="reason" rows="4" required></textarea>

        <button type="submit" name="submit">Book Appointment</button>
    </form>
</div>
</body>
</html>
