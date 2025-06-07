<?php
include '../includes/db.php';

if (!isset($_GET['p_id'])) {
    echo "No patient ID provided.";
    exit;
}

$patient_id = intval($_GET['p_id']);

// Handle new treatment submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $treatment_date = $_POST['treatment_date'];
    $treatment_desc = $_POST['treatment_desc'];
    $doctor_name = $_POST['doctor_name'];

    $stmt = $conn->prepare("INSERT INTO treatments (patient_id, treatment_date, treatment_desc, doctor_name) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isss", $patient_id, $treatment_date, $treatment_desc, $doctor_name);
    $stmt->execute();
    $stmt->close();
}

// Fetch patient details
$patient_result = $conn->query("SELECT name FROM patients WHERE patient_id = $patient_id");
if ($patient_result->num_rows == 0) {
    echo "Patient not found.";
    exit;
}
$patient = $patient_result->fetch_assoc();

// Fetch treatments
$treatments_result = $conn->query("SELECT treatment_date, treatment_desc, doctor_name FROM treatments WHERE patient_id = $patient_id ORDER BY treatment_date DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Treatments for <?php echo htmlspecialchars($patient['name']); ?></title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<h2>Treatments for <?php echo htmlspecialchars($patient['name']); ?></h2>

<h3>Add New Treatment</h3>
<form method="POST" style="max-width:500px; margin-bottom:30px;">
    <label>Treatment Date:</label><br>
    <input type="date" name="treatment_date" required><br><br>

    <label>Treatment Description:</label><br>
    <textarea name="treatment_desc" rows="4" cols="50" required></textarea><br><br>

    <label>Doctor Name:</label><br>
    <input type="text" name="doctor_name" required><br><br>

    <button type="submit">Add Treatment</button>
</form>

<h3>Past Treatments</h3>
<?php if ($treatments_result && $treatments_result->num_rows > 0): ?>
    <table border="1" cellpadding="10" cellspacing="0" style="width:80%; margin:auto;">
        <thead>
            <tr>
                <th>Date</th>
                <th>Description</th>
                <th>Doctor</th>
            </tr>
        </thead>
        <tbody>
            <?php while($treatment = $treatments_result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($treatment['treatment_date']); ?></td>
                    <td><?php echo htmlspecialchars($treatment['treatment_desc']); ?></td>
                    <td><?php echo htmlspecialchars($treatment['doctor_name']); ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
<?php else: ?>
    <p style="text-align:center;">No treatments found for this patient.</p>
<?php endif; ?>

<p style="text-align:center; margin-top: 30px;">
    <a href="patients_list.php">← Back to Patients List</a>
</p>

</body>
</html>
