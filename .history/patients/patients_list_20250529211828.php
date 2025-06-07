<?php
include '../includes/db.php';

// Fetch all patients
$sql = "SELECT patient_id, name, email, phone FROM patients ORDER BY patient_id DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Patients List</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<h2>Patients List</h2>

<table border="1" cellpadding="10" cellspacing="0" style="margin:auto; width:80%;">
    <thead>
        <tr>
            <th>Patient ID</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Treatments</th>
        </tr>
    </thead>
    <tbody>
        <?php if ($result && $result->num_rows > 0): ?>
            <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['patient_id']); ?></td>
                    <td><?php echo htmlspecialchars($row['name']); ?></td>
                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                    <td><?php echo htmlspecialchars($row['phone']); ?></td>
                    <td>
                        <a href="view_treatments.php?p_id=<?php echo $row['patient_id']; ?>">View/Add Treatments</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr><td colspan="5" style="text-align:center;">No patients found.</td></tr>
        <?php endif; ?>
    </tbody>
</table>

</body>
</html>
