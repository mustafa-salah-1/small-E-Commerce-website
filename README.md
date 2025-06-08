README: Gaming - Your Premier Destination for Elite Gaming GearGaming is a modern, community-driven e-commerce platform dedicated to providing gamers with cutting-edge, professional-grade gaming equipment. Founded in 2023 by passionate gamers, K-Gaming has evolved from a small Discord community into a leading online store, revolutionizing the gaming equipment industry by combining advanced technology with community-driven design.

Features
Pro-Tested Gear: All products available on K-Gaming are rigorously tested by esports professionals to ensure tournament-grade performance.

Custom Modifications: K-Gaming offers exclusive access to custom modifications that you won't find anywhere else.

Community-Driven Design: Products are selected based on feedback from thousands of gamers.

Intuitive Shopping Cart: Users can manage items, adjust quantities, and proceed to checkout.

Location-Based Delivery: Select your precise delivery location on an interactive map for accurate and efficient order fulfillment.

User Account Management: Create an account, log in securely, manage your profile details, and view your order history.

Product Filtering and Search: Efficiently browse and discover products by brand, category, and through a comprehensive search function.

Order Tracking: View detailed information about your past orders, including status and item specifics.

Technologies Used
Backend: PHP

Database: MySQL (implied by PHP and functions like getCartByCustomerId, addInvoice, etc.)

Frontend:

HTML5

CSS3 (with home.css, about.css, cart.css, contact.css, login.css, product.css, profile.css)

JavaScript

Bootstrap 5 (for responsive design and UI components)

Leaflet.js (for interactive maps in cart and contact pages)

Font Awesome (for icons)

Google Fonts (Orbitron for headings)

Getting Started
These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

Prerequisites
Web server (e.g., Apache, Nginx)

PHP 7.4+

MySQL database

Composer (recommended for PHP dependency management, though not explicitly used for external libraries in the provided snippets)

Installation
Clone the repository:

git clone <your-repository-url>
cd k-gaming-ecommerce

Set up your web server:
Configure your web server to point to the project's root directory (k-gaming-ecommerce).

Database Configuration:

Create a MySQL database for your project.

Update the database connection details in app/php/config/config.php (you might need to create this file if it's not present or modify an existing placeholder).

<?php
// Example content for app/php/config/config.php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'your_db_username');
define('DB_PASSWORD', 'your_db_password');
define('DB_NAME', 'your_db_name');

/* Attempt to connect to MySQL database */
try{
    $connect = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}
?>

Import your database schema. (You would need to provide a .sql file for the database structure and initial data).

Public Assets:
Ensure the public/ directory contains img/, product-images/, and avatar/ as referenced in the code for images and avatars.

Access the Application:
Open your web browser and navigate to the configured URL (e.g., http://localhost/k-gaming-ecommerce).

For Visitors / Users
This section guides you through the main functionalities and typical usage flow of the K-Gaming e-commerce website.

Browsing Products:

Homepage (index.php): Discover featured products and popular categories.

Products Page (product.php): Explore our full catalog. Use the filtering options (by brand, category) and the search bar to find specific items.

Managing Your Cart:

Shopping Cart (cart.php): Add desired items to your cart, easily adjust quantities, or remove products.

Checkout Process:

Once your cart is ready, proceed to checkout from the cart.php page.

You will be prompted to select a delivery location on an interactive map for accurate shipping.

Account Management:

Login/Registration (login.php, register.php): Existing users can log in, and new users can create an account to unlock full features.

Profile Page (profile.php): After logging in, manage your personal information and view your complete order history.

Order Details (order-details.php): Click on any order in your profile to view detailed information about the items purchased and their status.

Getting Help:

About Us (about.php): Learn more about K-Gaming's mission, values, and story.

Contact Us (contact.php): Find our contact information, including phone, email, and our physical location on a map.

Project Structure
.
├── app/
│   ├── php/
│   │   ├── admin/
│   │   │   ├── brand/
│   │   │   │   └── functions.php
│   │   │   ├── cart/
│   │   │   │   └── functions.php
│   │   │   ├── category/
│   │   │   │   └── functions.php
│   │   │   ├── customer/
│   │   │   │   └── functions.php
│   │   │   ├── invoice/
│   │   │   │   └── functions.php
│   │   │   ├── invoice_product/
│   │   │   │   └── functions.php
│   │   │   └── product/
│   │   │       └── functions.php
│   │   └── config/
│   │       └── config.php
├── components/
│   ├── app.php
│   └── footer.php
├── public/
│   ├── avatar/
│   ├── img/
│   └── product-images/
│       └── main/
├── about.php
├── cart.php
├── check.php
├── contact.php
├── index.php
├── login.php
├── logout.php
├── order-details.php
├── product.php
├── profile.php
└── register.php
