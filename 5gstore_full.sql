
-- ایجاد پایگاه‌داده
CREATE DATABASE IF NOT EXISTS 5gstore CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE 5gstore;

-- جدول کاربران
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('user', 'admin') DEFAULT 'user'
);

-- درج یک ادمین پیش‌فرض
INSERT INTO users (username, password, role) 
VALUES ('admin', SHA2('admin123', 256), 'admin');

-- جدول محصولات
CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT NOT NULL,
    image VARCHAR(255) NOT NULL,
    price INT NOT NULL
);

-- جدول سفارشات
CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    product_id INT,
    quantity INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (product_id) REFERENCES products(id)
);
