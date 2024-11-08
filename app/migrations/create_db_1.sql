CREATE DATABASE hotel CHARACTER SET=utf8mb4;

CREATE USER 'NUME_USER'@'localhost' IDENTIFIED BY 'PAROLA_USER';
GRANT ALL ON hotel.* TO 'NUME_USER'@'localhost';

CREATE USER 'NUME_USER'@'127.0.0.1' IDENTIFIED BY 'PAROLA_USER';
GRANT ALL ON hotel.* TO 'NUME_USER'@'127.0.0.1';

USE hotel;

CREATE TABLE users (
    user_id INTEGER AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    phone VARCHAR(10) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(100) NOT NULL
);

CREATE TABLE room_types (
    type_id INTEGER AUTO_INCREMENT PRIMARY KEY,
    max_guests INTEGER NOT NULL DEFAULT 0,
    price INTEGER NOT NULL
);

CREATE TABLE rooms (
    room_number INTEGER PRIMARY KEY,
    room_type INTEGER NOT NULL,
    FOREIGN KEY(room_type) REFERENCES room_types(type_id) ON DELETE RESTRICT
);

CREATE TABLE bookings (
    booking_id INTEGER AUTO_INCREMENT PRIMARY KEY,
    room_number INTEGER NOT NULL,
    user_id INTEGER NOT NULL,
    start_date DATE NOT NULL,
    end_date DATE NOT NULL,
    FOREIGN KEY(room_number) REFERENCES rooms(room_number) ON DELETE RESTRICT,
    FOREIGN KEY(user_id) REFERENCES users(user_id) ON DELETE RESTRICT
);

CREATE TABLE migrations (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL UNIQUE,
    date DATE DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO migrations(name) VALUES('create_db-1.sql');