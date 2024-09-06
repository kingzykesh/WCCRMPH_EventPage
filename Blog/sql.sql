CREATE TABLE posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    topic VARCHAR(255),
    content TEXT,
    author VARCHAR(255),
    date DATE,
    image VARCHAR(255)
);
