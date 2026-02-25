# 🍽️ Restaurant Gastronomique – Web Project

## 📌 Project Overview

This project is a multi-page professional restaurant website developed as part of the M104 – Static Web Development module.

The website represents a modern gastronomic restaurant offering high-quality dishes, elegant atmosphere, and an online reservation system.

The goal of this project is to demonstrate strong front-end structure, responsive design, and basic back-end integration using PHP and MySQL.

---

## 🚀 Technologies Used

- HTML5 (Semantic Structure)
- CSS3 (Custom Styling)
- Bootstrap 5 (Responsive Layout & Components)
- JavaScript (DOM & Interactions)
- PHP (Form Processing)
- MySQL (Reservation Storage)

---

## 📂 Project Structure

restaurant-Project/
│
├── index.html
├── services.html
├── galerie.html
├── contact.html
│
├── css/
│   └── style.css
│
├── js/
│   └── script.js
│
├── php/
│   └── traitement.php
│
├── connexion.php
│
└── img/

---

## 🌟 Main Features

### 🏠 Home Page (index.html)
- Sticky responsive navbar
- Hero section with call-to-action buttons
- About section
- Key statistics cards
- Testimonials / Partners section
- Complete footer

### 🍽️ Services Page (services.html)
- 6+ service cards
- Responsive grid layout
- Category filtering
- Featured service section
- Pricing comparison table

### 🖼️ Gallery Page (galerie.html)
- Image grid layout
- Hover zoom effect
- Lightbox (optional)
- FAQ section with accordion

### 📞 Contact Page (contact.html)
- Complete reservation form
- HTML5 validation
- Styled error messages
- Google Maps integration
- Opening hours table

---

## 🗄️ Database Setup

### 1️⃣ Create Database

```sql
CREATE DATABASE restaurant_db;
```

### 2️⃣ Create Table

```sql
CREATE TABLE informations (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(50),
    email VARCHAR(250),
    telephone VARCHAR(20),
    nombre_couverts INT,
    date DATE,
    heure VARCHAR(50),
    occassion_speciale VARCHAR(70),
    textinformations VARCHAR(500)
);
```

### 3️⃣ Configure connexion.php

```php
$host = 'localhost';
$db   = 'restaurant_db';
$user = 'root';
$pass = '';
```

---

## 💻 How to Run the Project

1. Install XAMPP or LAMP
2. Place the project folder inside:

XAMPP:
```
htdocs/
```

Linux:
```
/var/www/html/
```

3. Start Apache and MySQL
4. Open in browser:

```
http://localhost/restaurant-Project/
```

---

## 📱 Responsive Design

The website is fully responsive and optimized for:

- Mobile devices (<576px)
- Tablets (≥768px)
- Desktop screens (≥992px)

---

## 👨‍💻 Author

Developed by: Salah Baha  
Ayoub Aabidi
Walid Redouane
GitHub: https://github.com/bahasalah255

---

## 📌 Notes

- Clean and structured HTML
- External CSS file for styling
- Responsive Bootstrap components
- Secure database connection using PDO
- Prepared statements to prevent SQL injection

---

⭐ This project demonstrates the fundamentals of professional multi-page website development with front-end and back-end integration.
