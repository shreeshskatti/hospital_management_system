<?php
include '../includes/db.php';

$error = '';
// Fetch departments for dropdown
$departments = [];
$result = $conn->query("SELECT department_id, department_name FROM departments ORDER BY department_name");
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $departments[] = $row;
    }
}

if (isset($_POST['submit'])) {
    $name = $conn->real_escape_string($_POST['name']);
    $specialization = $conn->real_escape_string($_POST['specialization']);
    $contact_info = $conn->real_escape_string($_POST['contact_info']);
    $department_id = intval($_POST['department_id']);

    // Validate department id exists
    $valid_dept = false;
    foreach ($departments as $dept) {
        if ($dept['department_id'] == $department_id) {
            $valid_dept = true;
            break;
        }
    }

    if (!$valid_dept) {
        $error = "Invalid Department selected.";
    } else {
        $sql = "INSERT INTO doctors (name, specialization, contact_info, department_id) 
                VALUES ('$name', '$specialization', '$contact_info', $department_id)";

        if ($conn->query($sql)) {
            echo "<script>alert('Doctor added successfully!'); window.location.href='view_doctors.php';</script>";
            exit;
        } else {
            $error = "Error: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add New Doctor</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
    /* same styling as before */
    body {
        font-family: 'Georgia', serif;
        background-color: #f8f4f0;
        color: #3c2f1b;
        padding: 20px;
    }
    .container {
        max-width: 600px;
        margin: 40px auto;
        background: #fffaf0;
        padding: 30px 40px;
        box-shadow: 0 0 20px rgba(139,111,71,0.3);
        border-radius: 12px;
    }
    h2 {
        text-align: center;
        color: #5a3e1b;
        margin-bottom: 30px;
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: 2px;
    }
    label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: #7a5c2e;
    }
    input[type="text"], select {
        width: 100%;
        padding: 10px 12px;
        margin-bottom: 20px;
        border: 1px solid #c4b29b;
        border-radius: 6px;
        font-size: 16px;
        font-family: 'Georgia', serif;
        color: #4a3a19;
        background: #fdf6e3;
    }
    input[type="text"]:focus, select:focus {
        border-color: #8b6f47;
        outline: none;
        background: #fff8dc;
    }
    button {
        display: block;
        width: 100%;
        padding: 14px;
        background-color: #8b6f47;
        border: none;
        color: white;
        font-size: 18px;
        font-weight: bold;
        border-radius: 8px;
        cursor: pointer;
        box-shadow: 0 4px 10px rgba(139,111,71,0.4);
        transition: background-color 0.3s ease;
    }
    button:hover {
        background-color: #a48853;
    }
    .error-message {
        background-color: #f2dede;
        color: #a94442;
        padding: 12px;
        margin-bottom: 20px;
        border-radius: 6px;
        border: 1px solid #ebccd1;
        font-weight: 600;
    }
    a.back-link {
        display: block;
        text-align: center;
        margin-top: 20px;
        color: #8b6f47;
        text-decoration: none;
        font-weight: 600;
    }
    a.back-link:hover {
        text-decoration: underline;
    }
    </style>
</head>
<body>

<div class="container">
    <h2>Add New Doctor</h2>

    <?php if ($error): ?>
        <div class="error-message"><?php echo $error; ?></div>
    <?php endif; ?>

    <form method="POST" action="add_doctor.php">
        <label for="name">Full Name</label>
        <input type="text" id="name" name="name" required placeholder="Dr. John Doe">

        <label for="specialization">Specialization</label>
        <input type="text" id="specialization" name="specialization" placeholder="Cardiology">

        <label for="contact_info">Contact Information</label>
        <input type="text" id="contact_info" name="contact_info" placeholder="Phone or Email">

        <label for="department_id">Department</label>
        <select id="department_id" name="department_id" required>
            <option value="">-- Select Department --</option>
            <?php foreach ($departments as $dept): ?>
                <option value="<?php echo $dept['department_id']; ?>"><?php echo htmlspecialchars($dept['department_name']); ?></option>
            <?php endforeach; ?>
        </select>

        <button type="submit" name="submit">Add Doctor</button>
    </form>

    <a class="back-link" href="view_doctors.php">← Back to Doctors List</a>
</div>

</body>
</html>
