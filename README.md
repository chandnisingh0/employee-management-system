🚀 Employee Management System (Laravel)

Project Overview
This is a Laravel-based Employee Management System developed as part of an assignment.
The application allows users to manage employees and their multiple addresses with a clean dashboard interface.
It demonstrates strong understanding of Laravel architecture, database relationships, and dynamic form handling using JavaScript.

Tech Stack
Backend: Laravel (PHP)
Frontend: Bootstrap, HTML, CSS, JavaScript, jQuery
Database: MySQL
Version Control: Git & GitHub

Authentication
Login system with username and password
Protected dashboard using middleware

Features ------>
Employee Management
Add Employee
Edit Employee
Delete Employee
View Employee List (Dashboard)

Multiple Address Feature (Main Highlight)------>
Add multiple addresses dynamically using "Add More" button
Each address includes:

* Address Line
* City
* State
* Zip Code
  All addresses are stored in a separate table and linked to employee

Database Relationships ------>
One-to-Many relationship
One Employee can have multiple addresses

Database Schema ------>
Employees Table
id
name
email
position
salary
created_at

Employee Addresses Table
id
employee_id
address_line
city
state
zip_code
created_at

Installation & Setup ------>
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

7. Start Server
   php artisan serve

Testing
All CRUD operations tested
Multiple address feature working properly
Responsive UI tested

Project Demo Videos ------->
Video 1: Complete Flow (Login, Dashboard, CRUD)
Video 2: Responsive

Videos are available in the /videos folder.

Bonus Features (if implemented)
Search employees
Sorting and pagination
AJAX form submission

Debugging
Used dd() and logs for debugging
Proper error handling implemented

Author
Chandni Singh
Laravel Developer

Notes
This project focuses on clean code, reusable structure using services and traits, and scalable backend design.
