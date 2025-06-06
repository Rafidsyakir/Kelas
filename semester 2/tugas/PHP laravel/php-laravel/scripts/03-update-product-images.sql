-- Update product images with real URLs
USE ecommerce_db;

UPDATE products SET 
    image = 'https://images.unsplash.com/photo-1603302576837-37561b2e2302?w=400&h=400&fit=crop&crop=center'
WHERE name LIKE '%Laptop Gaming ASUS ROG%';

UPDATE products SET 
    image = 'https://images.unsplash.com/photo-1592750475338-74b7b21085ab?w=400&h=400&fit=crop&crop=center'
WHERE name LIKE '%Smartphone Samsung Galaxy%';

UPDATE products SET 
    image = 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=400&h=400&fit=crop&crop=center'
WHERE name LIKE '%Sepatu Nike Air Max%';

UPDATE products SET 
    image = 'https://images.unsplash.com/photo-1553062407-98eeb64c6a62?w=400&h=400&fit=crop&crop=center'
WHERE name LIKE '%Tas Ransel Eiger%';

UPDATE products SET 
    image = 'https://images.unsplash.com/photo-1606983340126-99ab4feaa64a?w=400&h=400&fit=crop&crop=center'
WHERE name LIKE '%Kamera Canon EOS%';

-- Verify the updates
SELECT id, name, image FROM products;
