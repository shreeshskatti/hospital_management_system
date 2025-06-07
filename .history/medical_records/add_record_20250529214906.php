<?php
include '../includes/db.php';

$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $patient_id = $_POST['patient_id'];
    $doctor_id = $_POST['doctor_id'];
    $diagnosis = $_POST['diagnosis'];
    $treatment = $_POST['treatment'];
    $record_date = $_POST['record_date'];

    $sql = "INSERT INTO medical_records (patient_id, doctor_id, diagnosis, treatment, record_date)
            VALUES ('$patient_id', '$doctor_id', '$diagnosis', '$treatment', '$record_date')";

    if (mysqli_query($conn, $sql)) {
        $success = "✅ Medical record added successfully!";
    } else {
        $success = "❌ Error: " . mysqli_error($conn);
    }
}

// Fetch patients
$patients = mysqli_query($conn, "SELECT patient_id, name FROM patients");

// Fetch doctors
$doctors = mysqli_query($conn, "SELECT doctor_id, name FROM doctors");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Medical Record</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        body {
            background: linear-gradient(to right, #f0f4c3, #ffffff);
            font-family: 'Roboto', sans-serif;
        }
        .form-container {
            max-width: 700px;
            margin: 40px auto;
            padding: 25px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
            display: block;
            margin-top: 15px;
        }
        select, input[type="text"], input[type="date"], textarea {
            width: 100%;
            padding: 10px;
            margin-top: 8px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }
        textarea {
            height: 80px;
        }
        button {
            margin-top: 20px;
            background-color: #00796B;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
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

<div class="form-container">
    <h2>Add Medical Record</h2>

    <?php if ($success) echo "<div class='message'>$success</div>"; ?>

    <form method="POST">
        <label for="patient_id">Patient</label>
        <select name="patient_id" required>
            <option value="">-- Select Patient --</option>
            <?php while ($row = mysqli_fetch_assoc($patients)): ?>
                <option value="<?= $row['patient_id'] ?>"><?= $row['patient_id'] ?> - <?= $row['name'] ?></option>
            <?php endwhile; ?>
        </select>

        <label for="doctor_id">Doctor</label>
        <select name="doctor_id" required>
            <option value="">-- Select Doctor --</option>
            <?php while ($row = mysqli_fetch_assoc($doctors)): ?>
                <option value="<?= $row['doctor_id'] ?>"><?= $row['doctor_id'] ?> - <?= $row['name'] ?></option>
            <?php endwhile; ?>
        </select>

        <label for="diagnosis">Diagnosis</label>
        <textarea name="diagnosis" required></textarea>

        <label for="treatment">Treatment</label>
        <textarea name="treatment" required></textarea>

        <label for="record_date">Record Date</label>
        <input type="date" name="record_date" required>

        <button type="submit">Add Record</button>
    </form>
</div>

</body>
</html>
