<img width="1915" height="919" alt="Capture d&#39;écran 2026-04-10 015750" src="https://github.com/user-attachments/assets/7ef3bbcd-e596-4b1d-87f7-35dba4a0bb8b" />
<img width="1909" height="917" alt="Capture d&#39;écran 2026-04-10 015808" src="https://github.com/user-attachments/assets/ef3fb40e-e9a5-438e-b992-4fbc7b03e346" />

# Secure PHP Authentication Boilerplate

A lightweight, highly secure authentication and session management template built with Vanilla PHP. This project serves as a robust foundation for building scalable PHP applications, prioritizing industry-standard security practices.

## 📸 Screenshots
*(اترك أكواد الصور التي رفعها GitHub هنا)*

## 🛡️ Core Security Features

This boilerplate is engineered to mitigate common OWASP vulnerabilities:
* **SQL Injection (SQLi) Prevention:** Strict use of PDO Prepared Statements.
* **Secure Credential Storage:** Utilizes PHP's native `password_hash()` (bcrypt).
* **Session Hijacking Defense:** Implements `session_regenerate_id(true)` upon login.
* **XSS Protection:** Output escaping using `htmlspecialchars()`.

## 📂 Project Architecture

The codebase follows a clean, procedural structure:
* `config/db.php`: PDO Database connection
* `index.php`: Main Authentication Controller
* `etudiant-liste.php`: Protected Dashboard View
* `logout.php`: Secure session termination

## 🚀 Getting Started
1. Create a database named `etudiant_hermes_tanger`.
2. Import your SQL tables and default user.
3. Update `config/db.php` with your local credentials.

**Default Test Account:**
* Username: admin
* Password: password
