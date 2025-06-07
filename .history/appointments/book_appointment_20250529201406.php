<?php
include '../includes/db.php';

// Fetch patients and doctors for the form
$patients = $conn->query("SELECT patient_id, name FROM patients");
$doctors = $conn->query("SELECT doctor_id, name FROM doctors");

if (isset($_POST['submit'])) {
    $patient_id = $_POST['patient_id'];
    $doctor_id = $_POST['doctor_id'];
    $appointment_date = $_POST['appointment_date'];
    $reason = $_POST['reason'];

    $sql = "INSERT INTO appointments (patient_id, doctor_id, appointment_date, reason) 
            VALUES ('$patient_id', '$doctor_id', '$appointment_date', '$reason')";

    if ($conn->query($sql)) {
        echo "<script>alert('Appointment booked successfully.'); window.location.href='view_appointments.php';</script>";
        exit();
    } else {
        echo "Error: " . $conn->error;
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
    <h2>Book an Appointment</h2>
    <form action="" method="POST">
        <label>Patient</label>
        <select name="patient_id" required>
            <option value="">-- Select Patient --</option>
            <?php while($row = $patients->fetch_assoc()): ?>
                <option value="<?php echo $row['patient_id']; ?>"><?php echo htmlspecialchars($row['name']); ?></option>
            <?php endwhile; ?>
        </select>

        <label>Doctor</label>
        <select name="doctor_id" required>
            <option value="">-- Select Doctor --</option>
            <?php while($row = $doctors->fetch_assoc()): ?>
                <option value="<?php echo $row['doctor_id']; ?>"><?php echo htmlspecialchars($row['name']); ?></option>
            <?php endwhile; ?>
        </select>

        <label>Appointment Date</label>
        <input type="date" name="appointment_date" required>

        <label>Reason</label>
        <textarea name="reason" required></textarea>

        <button type="submit" name="submit">Book Appointment</button>
    </form>
</div>
</body>
</html>
