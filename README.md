# Student Information Registration System 🛢️🐘💻

## 1. System Overview
This project presents a web application architecture designed to manage core student records dynamically. Built using native **PHP** and backed by a **MySQL** relational database engine, the platform implements a complete stateful **CRUD (Create, Read, Update, Delete)** data pipeline. 

The technical execution focuses heavily on secure backend data engineering practices—migrating away from loose, vulnerable inline SQL strings toward parameterized database interaction models. The system integrates robust server-side form validations alongside **MySQLi Prepared Statements** to eliminate input vulnerability paths, providing a resilient blueprint for enterprise data management software.

---

## 2. System Architecture & Component Mapping

The application codebase is modularized into dedicated execution layers to enforce a clean separation of concerns:
* `db.php` (Database Connector): Establishes a persistent, secure connection layer using the procedural/object-oriented MySQLi extension API, managing error handling protocols during connection handshakes.
* `register.php` (Create Operation): Handles data capture for incoming student enrollment records. It runs raw inputs through sanitization arrays before executing parameterized SQL insertions.
* `view.php` (Read Operation): Performs structured database queries to retrieve current active records, parsing datasets into an optimized HTML layout grid equipped with operational triggers.
* `update.php` (Update Operation): Isolates precise target entries using matching key metrics, rendering existing record details in forms to allow controlled state edits.
* `delete.php` (Delete Operation): Intercepts specific entity records, passing sanitized unique identifiers through prepared execution streams to prune data securely.

---

## 3. Reflection
**What I Learned**
* Transitioning from static HTML files to a stateful PHP-MySQL CRUD system deepened my understanding of dynamic web application design. I learned how data must be tracked across independent page lifecycles using query parameters and persistent database states.

* Implementing MySQLi prepared statements taught me the critical importance of defensive backend engineering. Separating the SQL logic from user inputs effectively visualizes how applications neutralize potential SQL injection vectors at the database gateway.

* Engineering manual form validation layers showed me how vital input sanitation is before hitting long-term storage tables, keeping the underlying relational database clean and structurally consistent.
