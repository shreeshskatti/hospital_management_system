<?php
include '../includes/db.php';

// Handle form submission to delete patient and related data
if (isset($_POST['delete_patient'])) {
    $patient_id = $_POST['patient_id'];

    // Start transaction for safety
    $conn->begin_transaction();

    try {
        // Delete bills related to appointments of this patient
        $conn->query("DELETE b FROM bills b JOIN appointments a ON b.appointment_id = a.appointment_id WHERE a.patient_id = $patient_id");

        // Delete medical records of this patient
        $conn->query("DELETE FROM medical_records WHERE patient_id = $patient_id");

        // Delete appointments of this patient
        $conn->query("DELETE FROM appointments WHERE patient_id = $patient_id");

        // Finally, delete the patient
        $conn->query("DELETE FROM patients WHERE patient_id = $patient_id");

        $conn->commit();

        $message = "Patient and all related data deleted successfully.";
    } catch (Exception $e) {
        $conn->rollback();
        $message = "Error deleting patient: " . $e->getMessage();
    }
}

// Fetch patients for dropdown
$patients_result = $conn->query("SELECT patient_id, name FROM patients ORDER BY name");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete Patient</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <h1>Hospital Management System</h1>
        <p>Efficient | Secure | Reliable</p>
    </header>

    <div class="container">
        <h2>Delete Patient</h2>
        
        <?php if (!empty($message)): ?>
            <p style="color: <?= strpos($message, 'Error') === false ? 'green' : 'red' ?>"><?= htmlspecialchars($message) ?></p>
        <?php endif; ?>

        <form method="POST" onsubmit="return confirm('Are you sure you want to delete this patient and ALL related data? This action cannot be undone.');">
            <label for="patient_id">Select Patient to Delete:</label><br>
            <select name="patient_id" id="patient_id" required>
                <option value="">-- Select Patient --</option>
                <?php while ($patient = $patients_result->fetch_assoc()): ?>
                    <option value="<?= $patient['patient_id'] ?>"><?= htmlspecialchars($patient['name']) ?></option>
                <?php endwhile; ?>
            </select><br><br>
            
            <input type="submit" name="delete_patient" value="Delete Patient" class="btn-danger">
        </form>
    </div>

    <footer>
        &copy; <?= date('Y'); ?> Hospital Management System. All rights reserved.
    </footer>
</body>
</html>
