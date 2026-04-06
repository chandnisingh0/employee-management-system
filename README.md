🚀 Employee Management System (Laravel)

Project Overview
This project is a Laravel-based Employee Management System developed as part of an assignment.
It allows users to manage employee records along with multiple addresses through a clean and user-friendly dashboard.

The project demonstrates strong understanding of Laravel architecture (MVC), database relationships, and dynamic form handling using JavaScript.

---

🛠 Tech Stack
Backend: Laravel (PHP)
Frontend: Bootstrap, HTML, CSS, JavaScript, jQuery
Database: MySQL
Version Control: Git & GitHub

---

🔐 Authentication
• Login system with username and password
• Dashboard protected using middleware

---

📊 Features

Employee Management
• Add Employee
• Edit Employee
• Delete Employee
• View Employee List (Dashboard)

Multiple Address Feature (Main Highlight)
• Dynamically add multiple addresses using "Add More" button
• Each address includes:

* Address Line
* City
* State
* Zip Code
  • All addresses are stored in a separate table and linked to employee

---

🔗 Database Relationships
• One-to-Many Relationship
• One Employee → Multiple Addresses

---

🗄 Database Schema

Employees Table
• id
• name
• email
• position
• salary
• created_at

Employee Addresses Table
• id
• employee_id (Foreign Key)
• address_line
• city
• state
• zip_code
• created_at

---

⚙ Installation & Setup

1. Clone Repository
   git clone https://github.com/chandnisingh0/employee-management-system.git
   cd employee-management-system

2. Install Dependencies
   composer install

3. Setup Environment
   cp .env.example .env

4. Configure Database in .env
   DB_DATABASE=your_db_name
   DB_USERNAME=your_db_user
   DB_PASSWORD=your_db_password

5. Generate App Key
   php artisan key:generate

6. Run Migrations
   php artisan migrate

7. (Optional) Import SQL File
   If you want ready database setup, import the file:
   database/employee_management.sql

8. Start Server
   php artisan serve

---

🧪 Testing
• All CRUD operations working properly
• Multiple address feature tested
• Responsive UI verified

---

🎥 Project Demo Videos
Video 1: Complete Flow (Login, Dashboard, CRUD)
Video 2: Responsive UI Demo

Videos available in /videos folder
(Or Google Drive link if shared)

---

✨ Bonus Features (if implemented)
• Search employees
• Sorting and pagination
• AJAX form submission

---

🐞 Debugging
• Used dd() and logs for debugging
• Proper error handling implemented

---

👨‍💻 Author
Chandni Singh
Laravel Developer

---

📌 Notes
This project focuses on clean code structure, reusable components (Services, Traits, Helpers), and scalable backend design aligned with real-world applications.
