<?php
include '../includes/db.php';

// Fetch patients and doctors for dropdowns
$patients = $conn->query("SELECT patient_id, name FROM patients ORDER BY name");
$doctors = $conn->query("SELECT doctor_id, name FROM doctors ORDER BY name");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $patient_id = $_POST['patient_id'] ?: NULL;
    $doctor_id = $_POST['doctor_id'] ?: NULL;
    $diagnosis = $_POST['diagnosis'] ?: NULL;
    $treatment = $_POST['treatment'] ?: NULL;
    $record_date = $_POST['record_date'] ?: NULL;

    $stmt = $conn->prepare("INSERT INTO medical_records (patient_id, doctor_id, diagnosis, treatment, record_date) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("iisss", $patient_id, $doctor_id, $diagnosis, $treatment, $record_date);

    if ($stmt->execute()) {
        echo "<p style='color:green;'>Medical record added successfully.</p>";
    } else {
        echo "<p style='color:red;'>Error: " . $conn->error . "</p>";
    }

    $stmt->close();
}
?>

<h2>Add Medical Record</h2>
<form method="POST">
    <label for="patient_id">Select Patient:</label><br>
    <select name="patient_id" required>
        <option value="">--Select Patient--</option>
        <?php while ($row = $patients->fetch_assoc()): ?>
            <option value="<?php echo $row['patient_id']; ?>"><?php echo htmlspecialchars($row['name']); ?></option>
        <?php endwhile; ?>
    </select><br><br>

    <label for="doctor_id">Select Doctor:</label><br>
    <select name="doctor_id" required>
        <option value="">--Select Doctor--</option>
        <?php while ($row = $doctors->fetch_assoc()): ?>
            <option value="<?php echo $row['doctor_id']; ?>"><?php echo htmlspecialchars($row['name']); ?></option>
        <?php endwhile; ?>
    </select><br><br>

    <label for="diagnosis">Diagnosis:</label><br>
    <textarea name="diagnosis" rows="4"></textarea><br><br>

    <label for="treatment">Treatment:</label><br>
    <textarea name="treatment" rows="4"></textarea><br><br>

    <label for="record_date">Record Date:</label><br>
    <input type="date" name="record_date" value="<?php echo date('Y-m-d'); ?>"><br><br>

    <button type="submit">Add Record</button>
</form>
