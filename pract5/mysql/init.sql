CREATE DATABASE IF NOT EXISTS appDb;
CREATE USER IF NOT EXISTS 'user'@'%' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON appDb.* TO 'user'@'%';
FLUSH PRIVILEGES;
USE appDb;

CREATE TABLE IF NOT EXISTS users (
    ID INT(10) NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) CHARACTER SET ascii NOT NULL,
    password VARCHAR(50) CHARACTER SET ascii NOT NULL,
    PRIMARY KEY (ID)
    ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS goods (
    ID INT(10) NOT NULL AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    description VARCHAR(255) NOT NULL,
    cost INT(10) NOT NULL,
    PRIMARY KEY (ID)
    );

-- htpasswd -bns admin admin
INSERT INTO users (name, password)
SELECT * FROM (SELECT 'admin', '{SHA}0DPiKuNIrrVmD8IUCuw1hQxNqZc=') AS temp
WHERE NOT EXISTS (
        SELECT name FROM users WHERE name = 'admin' AND password = '{SHA}0DPiKuNIrrVmD8IUCuw1hQxNqZc='
    ) LIMIT 1;

INSERT INTO goods (title, description, cost)
VALUES ('Smartphone', 'Chip and powerfull phone with good camera', 10000),
       ('Laptop', 'A lightweight laptop with a high-performance processor and a large amount of memory', 50000);