-- Insert sample data
USE ecommerce_db;

-- Insert admin user (password: admin123)
INSERT INTO users (username, email, password, full_name, role) VALUES 
('admin', 'admin@ecommerce.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Administrator', 'admin');

-- Insert sample customers (password: customer123)
INSERT INTO users (username, email, password, full_name, phone, address, role) VALUES 
('john_doe', 'john@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'John Doe', '081234567890', 'Jl. Sudirman No. 123, Jakarta', 'customer'),
('jane_smith', 'jane@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Jane Smith', '081234567891', 'Jl. Thamrin No. 456, Jakarta', 'customer');

-- Insert sample products
INSERT INTO products (name, description, price, stock, category, image, status) VALUES 
('Laptop Gaming ASUS ROG', 'Laptop gaming dengan spesifikasi tinggi untuk gaming dan produktivitas', 15000000.00, 10, 'Electronics', '/images/laptop-asus.jpg', 'active'),
('Smartphone Samsung Galaxy', 'Smartphone flagship dengan kamera canggih dan performa optimal', 8000000.00, 25, 'Electronics', '/images/samsung-galaxy.jpg', 'active'),
('Sepatu Nike Air Max', 'Sepatu olahraga dengan teknologi Air Max untuk kenyamanan maksimal', 1500000.00, 50, 'Fashion', '/images/nike-airmax.jpg', 'active'),
('Tas Ransel Eiger', 'Tas ransel outdoor dengan material tahan air dan desain ergonomis', 500000.00, 30, 'Fashion', '/images/eiger-backpack.jpg', 'active'),
('Kamera Canon EOS', 'Kamera DSLR profesional untuk fotografi dan videografi', 12000000.00, 8, 'Electronics', '/images/canon-eos.jpg', 'active');

-- Insert sample orders
INSERT INTO orders (customer_id, total_amount, status, shipping_address, payment_method) VALUES 
(2, 15500000.00, 'processing', 'Jl. Sudirman No. 123, Jakarta', 'Credit Card'),
(3, 2000000.00, 'shipped', 'Jl. Thamrin No. 456, Jakarta', 'Bank Transfer');

-- Insert sample order items
INSERT INTO order_items (order_id, product_id, quantity, price, subtotal) VALUES 
(1, 1, 1, 15000000.00, 15000000.00),
(1, 4, 1, 500000.00, 500000.00),
(2, 3, 1, 1500000.00, 1500000.00),
(2, 4, 1, 500000.00, 500000.00);

-- Insert sample cart items
INSERT INTO cart (customer_id, product_id, quantity) VALUES 
(2, 2, 1),
(2, 5, 1);
