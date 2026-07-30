# Week 2 — Exercise 03: PHP & MySQL — Super Globals and CRUD

A full-stack employee management web application built with PHP, MySQLi, and HTML. Runs through XAMPP with the MySQL database on **port 3307**.

---

## Files

| File | Description |
|------|-------------|
| `db_connect.php` | Shared MySQLi connection to the `techvibe` database on **port 3307**. Included by all other scripts via `require_once`. |
| `setup.php` | Run once to create the `techvibe` database and the `employees` table. |
| `index.php` | Landing page — displays all employees in an HTML table with **Edit** and **Delete** links, plus a search filter. |
| `create.php` | HTML form to add a new employee. Uses `$_POST`, prepared statements, `bind_param()`, and `execute()`. |
| `read.php` | Standalone page that fetches and displays all employee records. |
| `update.php` | Uses `$_GET` to retrieve an employee ID, pre-populates an edit form, and updates the record via `$_POST`. |
| `delete.php` | Receives an employee ID via `$_GET`, runs a prepared `DELETE`, and redirects back to `index.php`. |

---

## Database Schema

```sql
CREATE DATABASE IF NOT EXISTS techvibe;

CREATE TABLE employees (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    department VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

---

## Setup & Run

1. **Copy the folder** into your XAMPP `htdocs` directory:
   ```
   C:\xampp\htdocs\week2_ex03_php_mysql\
   ```

2. **Start Apache and MySQL** from the XAMPP Control Panel.
   - Ensure MySQL is running on **port 3307**.

3. **Run the setup script** once in your browser:
   ```
   http://localhost/week2_ex03_php_mysql/setup.php
   ```

4. **Open the application:**
   ```
   http://localhost/week2_ex03_php_mysql/index.php
   ```

---

## CRUD Operations

| Operation | Page | Method | Details |
|-----------|------|--------|---------|
| **Create** | `create.php` | `POST` | Form submits name, email, and department. |
| **Read** | `index.php` / `read.php` | `SELECT` | All records displayed in an HTML table. |
| **Update** | `update.php` | `GET` + `POST` | `$_GET` fetches the record; `$_POST` saves changes. |
| **Delete** | `delete.php` | `GET` | Deletes by ID and redirects to `index.php`. |

All **DML operations** (INSERT, UPDATE, DELETE) use **prepared statements** with `bind_param()` and `execute()` for security.

---

## Stretch Goals Included

1. **Server-side Validation** — `create.php` and `update.php` check that name and email are not empty before running the database query.
2. **Search by Department** — `index.php` includes a search form that filters employees using a `WHERE ... LIKE` query.

---

## Tech Stack

- PHP 8+
- MySQLi (with explicit port 3307)
- MySQL / MariaDB
- HTML + CSS

---

## Author
TechVibe Junior Developer Programme — Week 2
