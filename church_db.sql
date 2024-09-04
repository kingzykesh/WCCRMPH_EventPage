CREATE DATABASE church_db;

USE church_db;

CREATE TABLE prayer_requests (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    parish VARCHAR(100),
    district VARCHAR(100),
    phone VARCHAR(20),
    request TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
