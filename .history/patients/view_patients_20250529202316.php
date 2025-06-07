<?php
include '../includes/db.php';

if (!isset($_GET['p_id'])) {
    echo "<h3 style='color:red; text-align:center;'>Patient ID not specified.</h3>";
    exit;
}

$p_id = intval($_GET['p_id']); // sanitize input

// Prepare SQL to fetch patient by patient_id
$sql = "SELECT * FROM patients WHERE patient_id = $p_id";
$result = $conn->query($sql);

if (!$result || $result->num_rows == 0) {
    echo "<h3 style='color:red; text-align:center;'>Patient not found.</h3>";
    exit;
}

$patient = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Patient Details</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        .container { max-width: 600px; margin: 40px auto; padding: 20px; background: #f5f5f5; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1);}
        h2 { text-align: center; color: #333; font-family: 'Georgia', serif; }
        .detail { margin-bottom: 15px; }
        .label { font-weight: bold; color: #555; }
        .value { color: #222; font-size: 1.1em; }
        a.back { display: block; margin-top: 20px; text-align: center; text-decoration: none; color: #4a90e2; font-weight: 600; }
        a.back:hover { text-decoration: underline; }
    </style>
</head>
<body>

<div class="container">
    <h2>Patient Details</h2>
    <div class="detail"><span class="label">Full Name: </span><span class="value"><?php echo htmlspecialchars($patient['name']); ?></span></div>
    <div class="detail"><span class="label">Email: </span><span class="value"><?php echo htmlspecialchars($patient['email']); ?></span></div>
    <div class="detail"><span class="label">Phone: </span><span class="value"><?php echo htmlspecialchars($patient['phone']); ?></span></div>
    <div class="detail"><span class="label">Date of Birth: </span><span class="value"><?php echo htmlspecialchars($patient['dob']); ?></span></div>
    <div class="detail"><span class="label">Gender: </span><span class="value"><?php echo htmlspecialchars($patient['gender']); ?></span></div>
    <div class="detail"><span class="label">Address: </span><span class="value"><?php echo htmlspecialchars($patient['address']); ?></span></div>

    <a href="../patients/view_patients.php" class="back">← Back to Patients List</a>
</div>

</body>
</html>
