# VoiceOut — Complaint & Mental Health Support System

A student-focused platform for complaint reporting, emotional support, and emergency response


VoiceOut is a web-based platform designed to empower students and individuals to report incidents such as bullying, harassment, discrimination, or any form of abuse. It provides a structured way to raise complaints, maintain personal diaries, log emotional states, and trigger emergency SOS alerts.

The system also includes an admin dashboard for administrators to review, track, and manage complaints, mark them as resolved, and monitor user well-being trends through logs.

Key Features:

Complaint Registration – Users can file detailed complaints with categories, offender information, witnesses, and supporting evidence.

Personal Diary – Safe space for users to record personal experiences and thoughts.

Feelings Log – Allows users to log their emotions (happy, sad, anxious, suicidal, etc.) for mental health tracking.

SOS Alerts – Emergency feature to trigger instant notifications to saved emergency contacts via call, SMS, or both.

Admin Panel – Secure dashboard for administrators to view complaints, update statuses, and manage records.



---


Tech Stack:

Frontend: HTML, CSS, JavaScript

Backend: PHP

Database: MySQL




## Features

* **User Module**

  * Register and manage profile details.
  * Submit complaints with details, witnesses, and evidence.
  * Write personal diary entries.
  * Log feelings and track emotional state.
  * Trigger SOS alerts to emergency contacts.

* **Admin Module**

  * Secure login for admins.
  * View and manage all complaints.
  * Mark complaints as resolved or delete them.

---

## Database Schema

### 1. `users`

```sql
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

### 2. `user_details`

```sql
CREATE TABLE user_details (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(100) NOT NULL,
    age INT NOT NULL,
    address VARCHAR(255) NOT NULL,
    phone VARCHAR(15) NOT NULL,
    emergency_contact VARCHAR(15) NOT NULL,
    education VARCHAR(100) NOT NULL,
    profession ENUM('student','employee','housewife','other') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

### 3. `complaints`

```sql
CREATE TABLE complaints (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100),
    category ENUM('bullying','harassment','verbal_abuse','cyberbullying','discrimination','other') NOT NULL,
    details TEXT NOT NULL,
    location VARCHAR(255),
    date DATE NOT NULL,
    offender VARCHAR(100),
    witnesses VARCHAR(255),
    evidence LONGBLOB,
    submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    status VARCHAR(20) DEFAULT 'pending'
);
```

### 4. `diary_entries`

```sql
CREATE TABLE diary_entries (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    entry TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

### 5. `feelings_log`

```sql
CREATE TABLE feelings_log (
    id INT AUTO_INCREMENT PRIMARY KEY,
    feeling ENUM('help','anxiety','sad','suicidal','happy') NOT NULL,
    logged_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    count INT DEFAULT 0
);
```

### 6. `sos_logs`

```sql
CREATE TABLE sos_logs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    emergency_contact VARCHAR(15) NOT NULL,
    method ENUM('call','sms','both') DEFAULT 'both',
    triggered_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

### 7. `admins`

```sql
CREATE TABLE admins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Default admin account
INSERT INTO admins (fullname, email, password)
VALUES ('System Admin', 'admin@voiceout.com', 'admin123');
```

---

## Usage

* **Users** can register, log in, and use modules like complaints, diary, feelings, and SOS.
* **Admins** can log in at `/admin_login.html` and manage complaints through the dashboard.

---

<img width="1909" height="375" alt="Screenshot 2025-08-17 162854" src="https://github.com/user-attachments/assets/84c8ad06-a062-445f-a39e-54032f909472" />
<img width="1919" height="820" alt="Screenshot 2025-08-17 171652" src="https://github.com/user-attachments/assets/80677e64-0a8b-4008-b923-b03b211ad5f1" />
<img width="1908" height="964" alt="Screenshot 2025-08-17 171632" src="https://github.com/user-attachments/assets/5742cb5f-58e9-4ff3-aed2-49686634f7f4" />
<img width="844" height="881" alt="Screenshot 2025-08-17 171711" src="https://github.com/user-attachments/assets/d87ee41a-a3c9-49b0-a8c8-ae5576a03658" />

<img width="1913" height="711" alt="Screenshot 2025-08-17 171734" src="https://github.com/user-attachments/assets/ada57be5-3298-4365-95f0-077617a76ef6" />
<img width="1907" height="864" alt="Screenshot 2025-08-17 171854" src="https://github.com/user-attachments/assets/489f6929-c13d-47a1-a811-e9310182f73b" />
<img width="1909" height="865" alt="Screenshot 2025-08-17 171848" src="https://github.com/user-attachments/assets/b7397416-cf6d-47dc-bb97-3f6b0ff2db84" />
<img width="1916" height="880" alt="Screenshot 2025-08-17 171841" src="https://github.com/user-attachments/assets/3cafaf5d-bf00-4477-ab3e-1e6a2deaa53a" />
<img width="1571" height="869" alt="Screenshot 2025-08-17 171821" src="https://github.com/user-attachments/assets/2952ebd1-2b70-4b56-b63d-7c87c5d65ae8" />
<img width="1678" height="797" alt="Screenshot 2025-08-17 171812" src="https://github.com/user-attachments/assets/92437dad-9610-4327-9183-06727a17b292" />
<img width="1702" height="860" alt="Screenshot 2025-08-17 171754" src="https://github.com/user-attachments/assets/37efbb84-7888-43be-acf3-18929f3fadd9" />
<img width="1914" height="852" alt="Screenshot 2025-08-17 171747" src="https://github.com/user-attachments/assets/859328e1-a002-463b-b6ab-5e2021c05466" />



