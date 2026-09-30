# MEDMAS

<div align="left">
  <svg width="56" height="56" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg" aria-label="Medical management system icon">
    <rect x="8" y="12" width="48" height="40" rx="8" fill="#EAF4FF" stroke="#1F5FBF" stroke-width="2"/>
    <path d="M25 28H39V36H25V28ZM30 23V41H34V23H30ZM18 21C18 17.6863 20.6863 15 24 15H40C43.3137 15 46 17.6863 46 21V25H42V21C42 19.8954 41.1046 19 40 19H24C22.8954 19 22 19.8954 22 21V25H18V21ZM21 28H13V32H21V28ZM43 28H51V32H43V28ZM21 36H13V40H21V36ZM43 36H51V40H43V36Z" fill="#1F5FBF"/>
    <circle cx="32" cy="46" r="4" fill="#10B981"/>
  </svg>
</div>

MEDMAS is a complete medical management system designed for clinics, polyclinics, and healthcare organizations. It centralizes patient records, doctor information, medical consultations, prescriptions, and appointment scheduling in one web application built with PHP and MySQL.

This project was developed as an academic evaluation and is intended to support daily operational workflows in a medical environment.

## <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12 2L20 6V11C20 16.55 16.39 21.74 12 23C7.61 21.74 4 16.55 4 11V6L12 2Z" stroke="#1F5FBF" stroke-width="1.8"/><path d="M12 7V12L15 14" stroke="#1F5FBF" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg> Project Overview

MEDMAS helps clinical teams manage patient data and care activities in a structured, secure, and user-friendly way. The platform is especially useful for small and medium-sized healthcare centers that need a lightweight system without relying on a large enterprise software stack.

### Core objectives
- Centralize patient information and medical files
- Manage physician profiles and access levels
- Record consultations and care events
- Generate and print medical prescriptions
- Schedule and track appointments
- Provide a clean dashboard for quick operational insights

## <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6 18L18 6M8 7H17V16" stroke="#1F5FBF" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/><path d="M5 12H2M22 12H19M12 19V22M12 2V5" stroke="#1F5FBF" stroke-width="1.8" stroke-linecap="round"/></svg> Key Features

- Dashboard with counts for patients, consultations, and appointments
- Patient registration and management with dossier tracking
- Doctor management with role-based access
- Consultation recording linked to a patient and doctor
- Prescription management with consultation-linked records
- Appointment scheduling and status tracking
- Authentication system for medical staff
- Responsive interface with light/dark theme support
- Print-ready prescription output

## <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M7 18V7.5C7 6.12 8.12 5 9.5 5H14.5C15.88 5 17 6.12 17 7.5V18" stroke="#1F5FBF" stroke-width="1.8"/><path d="M4 18H20" stroke="#1F5FBF" stroke-width="1.8" stroke-linecap="round"/><path d="M10 9H14" stroke="#1F5FBF" stroke-width="1.8" stroke-linecap="round"/></svg> Technology Stack

- PHP 7/8 for server-side logic
- MySQL database for persistent storage
- Bootstrap 5 for responsive UI components
- JavaScript for interface behavior and theme toggling
- HTML/CSS for layout and styling
- XAMPP as the local development environment

## <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5 5.5C5 4.67 5.67 4 6.5 4H17.5C18.33 4 19 4.67 19 5.5V18.5C19 19.33 18.33 20 17.5 20H6.5C5.67 20 5 19.33 5 18.5V5.5Z" stroke="#1F5FBF" stroke-width="1.8"/><path d="M8 8H16M8 12H16M8 16H13" stroke="#1F5FBF" stroke-width="1.8" stroke-linecap="round"/></svg> Project Modules

The application is organized around the following primary functional areas:

- Dashboard: summary statistics and quick navigation
- Patients: add, view, update, and search patient records
- Doctors: manage medical staff and administrative rights
- Consultations: create and review visits and symptoms
- Prescriptions: generate prescription records linked to consultations
- Appointments: manage patient scheduling for doctors
- Authentication: secure login for authorized medical users

## <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4 7.5C4 6.12 5.12 5 6.5 5H17.5C18.88 5 20 6.12 20 7.5V16.5C20 17.88 18.88 19 17.5 19H6.5C5.12 19 4 17.88 4 16.5V7.5Z" stroke="#1F5FBF" stroke-width="1.8"/><path d="M7 9H17M7 12H12M7 15H14" stroke="#1F5FBF" stroke-width="1.8" stroke-linecap="round"/></svg> Database Structure

The application relies on a MySQL database named `clinic_system` and uses tables such as:

- `medecin` for doctor accounts and specializations
- `patient` for patient records and dossiers
- `consultation` for patient consultations
- `rendez_vous` for appointment bookings
- `prescription` for medical prescriptions

The connection configuration is defined in `db.php`, which should be adjusted if your local database credentials differ.

## <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12 2V8M12 16V22M4.93 4.93L8.64 8.64M15.36 15.36L19.07 19.07M2 12H8M16 12H22M4.93 19.07L8.64 15.36M15.36 8.64L19.07 4.93" stroke="#1F5FBF" stroke-width="1.8" stroke-linecap="round"/></svg> Requirements

Before running the project, ensure the following are installed:

- XAMPP or a similar PHP + MySQL environment
- Apache web server
- MySQL database server
- Modern browser such as Chrome, Edge, or Firefox

## <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12 3L19 7V12C19 16.5 15.8 20.6 12 21C8.2 20.6 5 16.5 5 12V7L12 3Z" stroke="#1F5FBF" stroke-width="1.8"/><path d="M8.5 12L11 14.5L15.5 10" stroke="#1F5FBF" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg> Installation and Setup

1. Clone or download the project into your local web server directory.
   - For XAMPP: place the project in `C:/xampp/htdocs/medmas`
2. Start Apache and MySQL from the XAMPP control panel.
3. Create the database named `clinic_system` in PHPMyAdmin or MySQL.
4. Update the database connection settings in `db.php` if necessary.
5. Create the required tables based on the project logic and model.
6. Open the browser and go to:

```text
http://localhost/medmas
```

## <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5 18H19M7 15V10.5C7 9.12 8.12 8 9.5 8H14.5C15.88 8 17 9.12 17 10.5V15" stroke="#1F5FBF" stroke-width="1.8" stroke-linecap="round"/><path d="M9 5H15" stroke="#1F5FBF" stroke-width="1.8" stroke-linecap="round"/></svg> Usage

After login, authorized staff can:

- access the dashboard and summary statistics
- create and update patient dossiers
- add or edit doctors
- schedule and manage patient appointments
- record consultation notes
- create prescriptions and print them when needed

## <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12 3V12L17 15" stroke="#1F5FBF" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/><circle cx="12" cy="12" r="9" stroke="#1F5FBF" stroke-width="1.8"/></svg> Project Structure

```text
medmas/
├── add_appointment.php
├── add_consultation.php
├── add_medecin.php
├── add_patient.php
├── add_prescription.php
├── appointments.php
├── auth.php
├── consultations.php
├── dashboard.php
├── db.php
├── delete_appointment.php
├── delete.php
├── edit_medecin.php
├── edit_patient.php
├── hashpasswords.php
├── index.php
├── login.php
├── logout.php
├── mark_done.php
├── medecins.php
├── patients.php
├── prescriptions.php
├── print_prescription.php
├── view_consultation.php
├── view_patient.php
├── view_prescription.php
├── assets/
│   ├── styles.css
│   ├── theme.js
│   └── js/
│       └── main.js
├── includes/
│   ├── footer.php
│   ├── header.php
│   └── sidebar.php
├── README.md
└── LICENSE (if applicable)
```

## <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12 3L19 7V12C19 16.5 15.8 20.6 12 21C8.2 20.6 5 16.5 5 12V7L12 3Z" stroke="#1F5FBF" stroke-width="1.8"/><path d="M12 7V12L15 14" stroke="#1F5FBF" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg> Security Considerations

This project is suitable for academic or internal clinic use, but it should be hardened for production use. Recommended improvements include:

- using environment variables for database credentials
- enforcing strong password policies
- adding user roles and permission checks throughout the app
- validating and sanitizing all user input more strictly
- enabling HTTPS in deployment environments

## <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12 2V6M12 18V22M5 12H1M23 12H19M6.3 6.3L3.8 3.8M20.2 20.2L17.7 17.7M17.7 6.3L20.2 3.8M3.8 20.2L6.3 17.7" stroke="#1F5FBF" stroke-width="1.8" stroke-linecap="round"/></svg> Notes

MEDMAS is a practical PHP-based clinic management solution that demonstrates how healthcare operations can be organized through a simple but effective web application. It is a solid foundation for further enhancement with advanced modules such as billing, patient histories, inventory management, or online appointment booking.

This project is primarily intended for educational and demonstration purposes, with room for further professional development and production hardening.
