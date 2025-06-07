🏥 Hospital Management System
A web-based Hospital Management System built using PHP, MySQL, HTML/CSS, and XAMPP.
This system allows patients to register and schedule appointments, while doctors or admins can view and manage those appointments via a web interface.

🚀 Features
✅ Patient Registration with personal and appointment details

🗓️ Book Appointments with a selected doctor

📄 View all Patients and Appointments

🔒 Secure database using MySQL

🎨 Clean, responsive HTML/CSS user interface

## 🛠️ Technologies Used

| Tech    | Purpose                 |
|---------|-------------------------|
| PHP     | Backend logic           |
| MySQL   | Database via phpMyAdmin |
| HTML/CSS| Frontend layout         |
| XAMPP   | Local server environment|
| VS Code | Code editor             |


Hospital Management System
A simple Hospital Management System built with PHP, MySQL, and XAMPP.

Requirements
XAMPP or any Apache + PHP + MySQL stack installed

Web browser (Chrome, Firefox, etc.)

Basic knowledge of PHP and MySQL

Installation & Setup
1. Install XAMPP
Download XAMPP from the official website:
https://www.apachefriends.org/download.html

Run the installer and follow the on-screen instructions to complete the installation.

2. Start Apache and MySQL services
Open XAMPP Control Panel

Click Start next to Apache and MySQL modules

Both services should show green indicators once running

3. Clone or Download this repository
Open Git Bash or your terminal and run:


git clone https://github.com/shreeshskatti/hospital_management_system.git

4. Place the project files
Move or copy the cloned hospital_management_system folder into your XAMPP htdocs directory

Windows default: C:\xampp\htdocs\hospital_management_system

Linux/Mac default: /opt/lampp/htdocs/hospital_management_system

5. Import the database
Open your browser and go to http://localhost/phpmyadmin

Click New to create a new database (e.g., hospital_db)

Select the new database, then go to the Import tab

Click Choose File and select the hospital_management_system.sql file from your project folder

Click Go to import the database structure and data

6. Configure database connection
Open the database config file in your project:

Usually found at config/config.php or includes/db.php

Edit the database credentials as follows (adjust if you changed your database name or MySQL credentials):


Edit
$servername = "localhost";

$username = "root";

$password = "";

$dbname = "hospital_db"; // the name of the database you imported

Save the changes

7. Run the project
Open your browser and visit:

http://localhost/hospital_management_system/

You should now be able to access the Hospital Management System interface

## 📁 Project Structure

📁 hospital_management_system/
├── 📁 assets/
│   ├── 📁 css/
│   ├── 📁 js/
│   ├── 📁 images/
│
├── 📁 config/
│   └── config.php
│
├── 📁 controllers/
│   └── PatientController.php
│
├── 📁 models/
│   └── Patient.php
│
├── 📁 views/
│   ├── 📁 patients/
│   ├── 📁 doctors/
│   ├── 📁 appointments/
│   ├── 📁 uploads/
│   ├── 📁 reports/
│   └── 📁 bills/
│
├── 📁 api/
│   └── patients.php
│
├── 📁 includes/
│   ├── db.php
│   ├── header.php
│   └── footer.php
│
├── 📁 tests/
├── 📁 docs/
├── 📁 appointments/
├── 📁 bills/
├── 📁 doctors/
├── 📁 medical_records/
├── 📁 patients/
├── 📁 rooms/
├── 📁 treatments/
│
├── index.php
├── readme.md
├── hospital_management_system.sql




C:\xampp\htdocs\hospital_management_system
 ***save these files here*** 