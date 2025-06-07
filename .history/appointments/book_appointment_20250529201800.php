<?php
include '../includes/db.php';

$patients = $conn->query("SELECT patient_id, name FROM patients");
if (!$patients) {
    die("Error fetching patients: " . $conn->error);
}

$doctors = $conn->query("SELECT doctor_id, name FROM doctors");
if (!$doctors) {
    die("Error fetching doctors: " . $conn->error);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Test Dropdowns</title>
</head>
<body>
<h2>Patients Dropdown</h2>
<select>
<?php while ($row = $patients->fetch_assoc()): ?>
    <option value="<?php echo $row['patient_id']; ?>"><?php echo $row['name']; ?></option>
<?php endwhile; ?>
</select>

<h2>Doctors Dropdown</h2>
<select>
<?php while ($row = $doctors->fetch_assoc()): ?>
    <option value="<?php echo $row['doctor_id']; ?>"><?php echo $row['name']; ?></option>
<?php endwhile; ?>
</select>
</body>
</html>
