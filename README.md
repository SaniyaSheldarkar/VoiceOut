# VoiceOut – Complaint & Support System

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
