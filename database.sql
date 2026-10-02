CREATE DATABASE IF NOT EXISTS pos_system CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE pos_system;
CREATE TABLE products (id INT AUTO_INCREMENT PRIMARY KEY,name VARCHAR(100) NOT NULL,price DECIMAL(10,2) NOT NULL,stock_quantity INT NOT NULL DEFAULT 0,image VARCHAR(255),created_at DATETIME NOT NULL);
CREATE TABLE customers (id INT AUTO_INCREMENT PRIMARY KEY,full_name VARCHAR(100) NOT NULL,email VARCHAR(100) NOT NULL,phone VARCHAR(20),created_at DATETIME NOT NULL);
CREATE TABLE users (id INT AUTO_INCREMENT PRIMARY KEY,username VARCHAR(50) NOT NULL UNIQUE,full_name VARCHAR(100) NOT NULL,password VARCHAR(255) NOT NULL,avatar VARCHAR(255),created_at DATETIME NOT NULL);
CREATE TABLE sales (id INT AUTO_INCREMENT PRIMARY KEY,product_id INT NOT NULL,customer_id INT NULL,sold_by INT NOT NULL,quantity INT NOT NULL,total_price DECIMAL(10,2) NOT NULL,created_at DATETIME NOT NULL,CONSTRAINT fk_sales_product FOREIGN KEY(product_id) REFERENCES products(id),CONSTRAINT fk_sales_customer FOREIGN KEY(customer_id) REFERENCES customers(id),CONSTRAINT fk_sales_user FOREIGN KEY(sold_by) REFERENCES users(id));
INSERT INTO users(username,full_name,password,created_at) VALUES ('admin','System Administrator','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llCzZ3l2J8X7v7nZ6jE6G','2026-10-01 00:00:00');
