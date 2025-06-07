<?php
include '../includes/db.php';
include '../includes/header.php';

$success = "";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $patient_id = $_POST['patient_id'];
    $doctor_id = $_POST['doctor_id'];
    $diagnosis = $_POST['diagnosis'];
    $treatment = $_POST['treatment'];
    $record_date = $_POST['record_date'];

    // Use prepared statement for security
    $stmt = $conn->prepare("INSERT INTO medical_records (patient_id, doctor_id, diagnosis, treatment, record_date) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("iisss", $patient_id, $doctor_id, $diagnosis, $treatment, $record_date);

    if ($stmt->execute()) {
        $success = "✅ Medical record added successfully!";
    } else {
        $success = "❌ Error: " . $conn->error;
    }
    $stmt->close();
}

// Fetch patients
$patients = mysqli_query($conn, "SELECT patient_id, name FROM patients");

// Fetch doctors
$doctors = mysqli_query($conn, "SELECT doctor_id, name FROM doctors");
?>

<div class="form-container">
    <h2>Add Medical Record</h2>

    <?php if ($success): ?>
        <div class="message"><?= $success ?></div>
    <?php endif; ?>

    <form method="POST">
        <label for="patient_id">Patient</label>
        <select name="patient_id" required>
            <option value="">-- Select Patient --</option>
            <?php while ($row = mysqli_fetch_assoc($patients)): ?>
                <option value="<?= $row['patient_id'] ?>"><?= $row['patient_id'] ?> - <?= htmlspecialchars($row['name']) ?></option>
            <?php endwhile; ?>
        </select>

        <label for="doctor_id">Doctor</label>
        <select name="doctor_id" required>
            <option value="">-- Select Doctor --</option>
            <?php while ($row = mysqli_fetch_assoc($doctors)): ?>
                <option value="<?= $row['doctor_id'] ?>"><?= $row['doctor_id'] ?> - <?= htmlspecialchars($row['name']) ?></option>
            <?php endwhile; ?>
        </select>

        <label for="diagnosis">Diagnosis</label>
        <textarea name="diagnosis" required placeholder="Enter diagnosis..."></textarea>

        <label for="treatment">Treatment</label>
        <textarea name="treatment" required placeholder="Enter treatment details..."></textarea>

        <label for="record_date">Record Date</label>
        <input type="date" name="record_date" required>

        <button type="submit">Add Record</button>
    </form>
</div>

<?php include '../includes/footer.php'; ?>
