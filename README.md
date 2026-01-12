# Mini E-Commerce Web Application

A mini e-commerce web application built using **Laravel** that allows users to browse products, add items to a cart, checkout, and place orders. The system also includes an **admin dashboard** for managing products and viewing orders.

---

##  Features

### User Features
- User authentication (login & register)
- Browse products
- Add products to cart
- Update cart quantities
- Checkout and place orders
- View order receipt

### Admin Features
- Admin authentication
- Add, edit, and delete products
- Upload product images
- Manage product stock
- View customer orders and order details

---

##  Technologies Used

- **Backend:** PHP (Laravel)
- **Frontend:** Blade, Bootstrap
- **Database:** MySQL
- **Authentication:** Laravel Auth
- **Version Control:** Git & GitHub

---

##  Database Design

- users
- products
- cart_items
- orders
- order_items

Relationships:
- A user can have many cart items
- An order has many order items
- A product can belong to many orders through order items

---

##  Installation & Setup

1. Clone the repository:
   ```bash
   git clone https://github.com/thuranaung2004/mini-ecommerce.git

2. Install dependencies:
   ```bash
   composer install
   npm install
   npm run dev

3. Create .env file:
   ```bash
   cp .env.example .env

4. Generate application key: 
   ```bash
   php artisan key:generate

5. Configure database in .env

6. Run migrations:
   ```bash
   php artisan migrate

7. Create storage link: 
   ```bash
   php artisan storage:link

8. Run the application:
   ```bash
   php artisan serve

Notes

This project was built for learning purposes.

It demonstrates Laravel MVC structure, database relationships, and basic e-commerce logic.   