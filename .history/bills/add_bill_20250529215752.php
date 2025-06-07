<?php
include '../includes/db.php';

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $patient_id = $_POST['patient_id'];
    $amount = $_POST['amount'];
    $description = $_POST['description'];
    $billing_date = $_POST['billing_date'];

    $stmt = $conn->prepare("INSERT INTO bills (patient_id, amount, description, billing_date) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("idss", $patient_id, $amount, $description, $billing_date);

    if ($stmt->execute()) {
        echo "<script>alert('Bill added successfully!'); window.location.href='view_bills.php';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Bill</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        body {
            background: linear-gradient(to right, #f1f8e9, #ffffff);
            font-family: 'Roboto', sans-serif;
            padding: 30px;
        }
        .form-container {
            max-width: 600px;
            margin: auto;
            background: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #2e7d32;
        }
        label {
            font-weight: bold;
            margin-top: 10px;
            display: block;
        }
        input, select, textarea {
            width: 100%;
            padding: 10px;
            margin-top: 6px;
            border-radius: 6px;
            border: 1px solid #ccc;
        }
        button {
            background-color: #388e3c;
            color: white;
            padding: 12px;
            margin-top: 20px;
            border: none;
            width: 100%;
            font-size: 16px;
            border-radius: 8px;
            cursor: pointer;
        }
        button:hover {
            background-color: #2e7d32;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Add New Bill</h2>
    <form method="POST">
        <label for="patient_id">Select Patient:</label>
        <select name="patient_id" id="patient_id" required>
            <option value="">-- Choose Patient --</option>
            <?php
            $result = $conn->query("SELECT patient_id, name FROM patients");
            while ($row = $result->fetch_assoc()) {
                echo "<option value='{$row['patient_id']}'>{$row['name']} (ID: {$row['patient_id']})</option>";
            }
            ?>
        </select>

        <label for="amount">Amount (₹):</label>
        <input type="number" name="amount" step="0.01" required>

        <label for="description">Description:</label>
        <textarea name="description" rows="3" required></textarea>

        <label for="billing_date">Billing Date:</label>
        <input type="date" name="billing_date" required>

        <button type="submit">Add Bill</button>
    </form>
</div>

</body>
</html>
