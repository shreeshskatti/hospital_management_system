<?php
include '../includes/db.php';

// Fetch patients for dropdown
$patients = $conn->query("SELECT patient_id, name FROM patients");
if (!$patients) {
    die("Error fetching patients: " . $conn->error);
}

// Fetch doctors for dropdown
$doctors = $conn->query("SELECT doctor_id, name FROM doctors");
if (!$doctors) {
    die("Error fetching doctors: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Book Appointment</title>
    <link rel="stylesheet" href="../css/style.css" />
    <style>
        /* Luxury classical theme overrides and form styling */
        body {
            background: #f8f4f0;
            font-family: 'Georgia', serif;
            color: #4a3c31;
            padding: 40px 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background: #fff8f0;
            border: 1px solid #d7c4aa;
            box-shadow: 0 4px 15px rgba(169, 146, 120, 0.3);
            border-radius: 12px;
            padding: 30px 40px;
        }
        h1, h2 {
            font-weight: 700;
            color: #6b4c3b;
            text-align: center;
            margin-bottom: 25px;
            letter-spacing: 1.1px;
        }
        label {
            display: block;
            margin-bottom: 6px;
            font-weight: 600;
            font-size: 1.05rem;
            color: #7a5c44;
        }
        select, input[type="text"], input[type="date"], textarea {
            width: 100%;
            padding: 10px 12px;
            margin-bottom: 18px;
            border: 1.8px solid #bfa682;
            border-radius: 8px;
            font-size: 1rem;
            color: #4a3c31;
            background: #fcf7f1;
            transition: border-color 0.3s ease;
        }
        select:focus, input[type="text"]:focus, input[type="date"]:focus, textarea:focus {
            border-color: #a67850;
            outline: none;
        }
        button {
            background-color: #8a6f4a;
            color: #fff8f0;
            border: none;
            padding: 14px 0;
            font-size: 1.15rem;
            width: 100%;
            border-radius: 10px;
            cursor: pointer;
            font-weight: 700;
            letter-spacing: 1.2px;
            box-shadow: 0 6px 12px rgba(138, 111, 74, 0.7);
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #a48357;
            box-shadow: 0 8px 14px rgba(164, 131, 87, 0.8);
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Book Appointment</h1>

    <form action="book_appointment.php" method="POST">

        <label for="patient_id">Select Patient</label>
        <select id="patient_id" name="patient_id" required>
            <option value="">-- Select Patient --</option>
            <?php while ($row = $patients->fetch_assoc()): ?>
                <option value="<?php echo htmlspecialchars($row['patient_id']); ?>">
                    <?php echo htmlspecialchars($row['name']); ?>
                </option>
            <?php endwhile; ?>
        </select>

        <label for="doctor_id">Select Doctor</label>
        <select id="doctor_id" name="doctor_id" required>
            <option value="">-- Select Doctor --</option>
            <?php while ($row = $doctors->fetch_assoc()): ?>
                <option value="<?php echo htmlspecialchars($row['doctor_id']); ?>">
                    <?php echo htmlspecialchars($row['name']); ?>
                </option>
            <?php endwhile; ?>
        </select>

        <label for="appointment_date">Appointment Date</label>
        <input type="date" id="appointment_date" name="appointment_date" required min="<?php echo date('Y-m-d'); ?>" />

        <label for="reason">Reason for Appointment</label>
        <textarea id="reason" name="reason" rows="3" placeholder="Enter reason or symptoms..." required></textarea>

        <button type="submit" name="submit">Book Appointment</button>
    </form>
</div>

<?php
// Process form submission
if (isset($_POST['submit'])) {
    $patient_id = $conn->real_escape_string($_POST['patient_id']);
    $doctor_id = $conn->real_escape_string($_POST['doctor_id']);
    $appointment_date = $conn->real_escape_string($_POST['appointment_date']);
    $reason = $conn->real_escape_string($_POST['reason']);

    $sql = "INSERT INTO appointments (patient_id, doctor_id, appointment_date, reason) 
            VALUES ('$patient_id', '$doctor_id', '$appointment_date', '$reason')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Appointment booked successfully!'); window.location.href='view_appointments.php';</script>";
        exit;
    } else {
        echo "<div style='color:#a94442; font-weight:700; margin-top:15px; text-align:center;'>Error: " . $conn->error . "</div>";
    }
}
?>

</body>
</html>
