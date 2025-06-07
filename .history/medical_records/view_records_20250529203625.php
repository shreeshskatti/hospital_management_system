<?php include '../includes/db.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Medical Records</title>
  <link rel="stylesheet" href="../css/style.css">
  <style>
    /* Additional styling for a professional table look */
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: #f5f5f7;
      color: #333;
      margin: 20px;
    }
    .container {
      max-width: 900px;
      margin: auto;
      background: #fff;
      padding: 25px 30px;
      border-radius: 8px;
      box-shadow: 0 6px 18px rgba(0,0,0,0.1);
    }
    h2 {
      color: #5a4d7c;
      margin-bottom: 20px;
      font-weight: 700;
      letter-spacing: 1px;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      border-radius: 6px;
      overflow: hidden;
      box-shadow: 0 0 10px rgba(90, 77, 124, 0.1);
    }
    thead {
      background-color: #5a4d7c;
      color: #fff;
      text-align: left;
      font-weight: 600;
    }
    th, td {
      padding: 12px 15px;
      border-bottom: 1px solid #ddd;
    }
    tbody tr:hover {
      background-color: #e0d9f7;
    }
  </style>
</head>
<body>
<div class="container">
  <h2>Medical Records</h2>
  <table>
    <thead>
      <tr>
        <th>Record ID</th>
        <th>Patient Name</th>
        <th>Diagnosis</th>
        <th>Treatment</th>
        <th>Date</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $sql = "SELECT r.record_id, p.name AS patient, r.diagnosis, r.treatment, r.record_date
              FROM medical_records r
              JOIN patients p ON r.patient_id = p.patient_id";
      $result = $conn->query($sql);

      if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo "<tr>
                  <td>" . htmlspecialchars($row['record_id']) . "</td>
                  <td>" . htmlspecialchars($row['patient']) . "</td>
                  <td>" . htmlspecialchars($row['diagnosis']) . "</td>
                  <td>" . htmlspecialchars($row['treatment']) . "</td>
                  <td>" . htmlspecialchars($row['record_date']) . "</td>
                </tr>";
        }
      } else {
        echo "<tr><td colspan='5' style='text-align:center;'>No medical records found.</td></tr>";
      }
      ?>
    </tbody>
  </table>
</div>
</body>
</html>
