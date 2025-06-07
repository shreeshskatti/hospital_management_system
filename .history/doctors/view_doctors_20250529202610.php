<?php
include '../includes/db.php';

// Fetch all doctors from the database
$sql = "SELECT doctor_id, name, email, phone, specialization FROM doctors ORDER BY doctor_id DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Doctors List</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        body {
            font-family: 'Georgia', serif;
            background-color: #f8f4f0;
            color: #333;
            padding: 20px;
        }
        h2 {
            text-align: center;
            color: #5a3e1b;
            margin-bottom: 30px;
        }
        table {
            width: 90%;
            margin: 0 auto;
            border-collapse: collapse;
            box-shadow: 0 0 15px rgba(90, 62, 27, 0.2);
            background: #fffaf0;
            border-radius: 10px;
            overflow: hidden;
        }
        th, td {
            padding: 12px 20px;
            border-bottom: 1px solid #d6c8b4;
            text-align: left;
        }
        th {
            background-color: #8b6f47;
            color: white;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        tr:hover {
            background-color: #f2e9d8;
            cursor: pointer;
        }
        a.view-link {
            color: #8b6f47;
            text-decoration: none;
            font-weight: 600;
        }
        a.view-link:hover {
            text-decoration: underline;
        }
        .add-doctor-btn {
            display: block;
            width: 200px;
            margin: 20px auto;
            padding: 12px;
            background-color: #8b6f47;
            color: white;
            text-align: center;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
            box-shadow: 0 4px 8px rgba(139,111,71,0.3);
        }
        .add-doctor-btn:hover {
            background-color: #a48853;
        }
    </style>
</head>
<body>

    <h2>Doctors List</h2>

    <a href="add_doctor.php" class="add-doctor-btn">+ Add New Doctor</a>

    <table>
        <thead>
            <tr>
                <th>Doctor ID</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Specialization</th>
                <th>Details</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result && $result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['doctor_id']); ?></td>
                        <td><?php echo htmlspecialchars($row['name']); ?></td>
                        <td><?php echo htmlspecialchars($row['email']); ?></td>
                        <td><?php echo htmlspecialchars($row['phone']); ?></td>
                        <td><?php echo htmlspecialchars($row['specialization']); ?></td>
                        <td><a class="view-link" href="view_doctor.php?d_id=<?php echo $row['doctor_id']; ?>">View Details</a></td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr><td colspan="6" style="text-align:center;">No doctors found.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>

</body>
</html>
