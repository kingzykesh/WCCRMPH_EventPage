CREATE DATABASE churchtwo_db;

USE churchtwo_db;

CREATE TABLE testimonies (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    parish VARCHAR(100),
    district VARCHAR(100),
    phone VARCHAR(20),
    request TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
