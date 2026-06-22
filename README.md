# Barcode Inventory Management System

A modern inventory management system built with PHP, MySQL, Bootstrap, and barcode scanning capabilities.

## Features

* User authentication and secure login
* Add, edit, and delete products
* Automatic barcode generation
* Barcode scanning using device camera
* Product image upload support
* Stock In and Stock Out management
* Stock transaction history
* Inventory reports
* Print barcode labels
* Dashboard with inventory statistics
* Responsive Bootstrap UI
* Password hashing with PHP `password_hash()`
* SQL Injection protection using prepared statements

---

## Project Structure

```text
Barcode-Inventory-System/
│
├── index.php
├── dashboard.php
├── products.php
├── add-product.php
├── edit-product.php
├── delete-product.php
├── scan.php
├── stock-in.php
├── stock-out.php
├── stock-history.php
├── reports.php
├── login.php
├── logout.php
├── barcode-product.php
├── printbarcode.php
├── barcode-generator.php
│
├── includes/
│   ├── db.php
│   ├── auth.php
│   ├── header.php
│   └── footer.php
│
├── assets/
│   ├── css/style.css
│   └── js/script.js
│
├── barcode/
│   └── generated/
│
├── uploads/
│
├── database/
│   └── inventory.sql
│
├── vendor/
├── composer.json
└── README.md
```

---

## Technologies Used

* PHP 8+
* MySQL
* Bootstrap 5
* JavaScript
* HTML5
* CSS3
* Composer

---

## Required Packages

Install the barcode generator package:

```bash
composer require picqer/php-barcode-generator
```

Install all dependencies:

```bash
composer install
```

---

## Installation

### 1. Clone the Repository

```bash
git clone https://github.com/yogeshkumarsaini/Barcode-Inventory-System.git
```

### 2. Move to Project Directory

```bash
cd Barcode-Inventory-System
```

### 3. Import Database

* Open phpMyAdmin
* Create a database named `inventory_db`
* Import `database/inventory.sql`

### 4. Configure Database

Update `includes/db.php`:

```php
<?php

$host = "localhost";
$user = "root";
$pass = "";
$db   = "inventory_db";

$conn = new mysqli($host, $user, $pass, $db);
```

### 5. Start the Project

Move the project folder to your web server directory:

* XAMPP: `htdocs`
* WAMP: `www`

Open:

```text
http://localhost/Barcode-Inventory-System
```

---

## Default Login Credentials

```text
Username: admin
Password: password
```

> Change the default password after the first login.

---

## Database Tables

### users

Stores user login information.

### products

Stores product details including barcode, image, price, and stock quantity.

### stock_transactions

Stores stock movement history.

---

## Barcode Generation

Generated barcode images are stored in:

```text
barcode/generated/
```

Barcode format:

* CODE 128

---

## Image Uploads

Product images are stored in:

```text
uploads/
```

---

## Security Features

* Password hashing using `password_hash()`
* Password verification using `password_verify()`
* SQL Injection protection with prepared statements
* Session-based authentication
* File upload handling
* Input validation
