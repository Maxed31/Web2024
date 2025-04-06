CREATE TABLE User (
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role VARCHAR(20),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE Product (
    product_id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL,
    stock INT DEFAULT 0,
    category VARCHAR(50),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE `Order` (
    order_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    total_price DECIMAL(10, 2) NOT NULL,
    order_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES User(user_id)
);

CREATE TABLE Order_Item (
    order_item_id INT PRIMARY KEY AUTO_INCREMENT,
    order_id INT,
    product_id INT,
    quantity INT NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (order_id) REFERENCES `Order`(order_id),
    FOREIGN KEY (product_id) REFERENCES Product(product_id)
);

CREATE TABLE Review (
    review_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    product_id INT,
    rating INT CHECK (rating >= 1 AND rating <= 5),
    comment TEXT,
    review_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES User(user_id),
    FOREIGN KEY (product_id) REFERENCES Product(product_id)
);

INSERT INTO User (username, email, password, role)
VALUES 
('john_doe', 'john@example.com', 'hashedpassword1', 'customer'),
('jane_admin', 'jane@example.com', 'hashedpassword2', 'admin'),
('alice_smith', 'alice@example.com', 'hashedpassword3', 'customer');

INSERT INTO Product (name, description, price, stock, category)
VALUES 
('VR Headset', 'High-quality virtual reality headset.', 299.99, 50, 'Electronics'),
('Motion Controller', 'Precision motion controller for VR gaming.', 79.99, 100, 'Accessories'),
('VR Treadmill', 'Omnidirectional treadmill for immersive VR.', 899.99, 10, 'Fitness');

INSERT INTO `Order` (user_id, total_price)
VALUES 
(1, 379.98),
(3, 899.99);

INSERT INTO Order_Item (order_id, product_id, quantity, price)
VALUES 
(1, 1, 1, 299.99),
(1, 2, 1, 79.99),
(2, 3, 1, 899.99);

INSERT INTO Review (user_id, product_id, rating, comment)
VALUES 
(1, 1, 5, 'Amazing headset, totally worth it!'),
(3, 3, 4, 'Great treadmill, but very heavy.'),
(1, 2, 4, 'Good controller, responsive and fun.');
