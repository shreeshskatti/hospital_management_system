<?php
include '../includes/db.php';
$patients = $conn->query("SELECT patient_id, name FROM patients ORDER BY name");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Patients List</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>
  <h2>Patients List</h2>
  <table border="1" cellpadding="10" cellspacing="0" style="width: 80%; margin:auto;">
    <thead>
      <tr><th>Patient Name</th><th>Actions</th></tr>
    </thead>
    <tbody>
      <?php while($p = $patients->fetch_assoc()): ?>
        <tr>
          <td><?php echo htmlspecialchars($p['name']); ?></td>
          <td>
            <a href="view_treatments.php?p_id=<?php echo $p['patient_id']; ?>">View Treatments</a>
          </td>
        </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
  <p style="text-align:center; margin-top: 30px;"><a href="../index.php">← Back to Home</a></p>
</body>
</html>
