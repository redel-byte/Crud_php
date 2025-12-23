-- =============================================
-- SCRIPT SQL - Gestion de Produits
-- Exécutez ce script dans phpMyAdmin
-- =============================================

-- Créer la base de données
CREATE DATABASE IF NOT EXISTS shop_db 

-- Utiliser la base de données
USE shop_db;

-- Supprimer la table si elle existe (pour réinitialiser)
DROP TABLE IF EXISTS products;

-- Créer la table products
CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL,
    quantity INT NOT NULL DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insérer des données de test
INSERT INTO products (name, description, price, quantity) VALUES 
('iPhone 15', 'Smartphone Apple dernière génération', 999.99, 25),
('MacBook Pro', 'Ordinateur portable 14 pouces M3', 1999.00, 10),
('AirPods Pro', 'Écouteurs sans fil avec réduction de bruit', 279.00, 50),
('iPad Air', 'Tablette 10.9 pouces', 699.00, 30),
('Apple Watch', 'Montre connectée Series 9', 449.00, 40);

-- Vérifier les données
SELECT * FROM products;
