CREATE TABLE user_types (
    type_id INTEGER AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL UNIQUE
);

CREATE TABLE users (
    user_id INTEGER AUTO_INCREMENT PRIMARY KEY,
    user_type INTEGER NOT NULL,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    phone VARCHAR(10) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(100) NOT NULL,
    FOREIGN KEY(user_type) REFERENCES user_types(type_id) ON DELETE RESTRICT
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
START TRANSACTION;

INSERT INTO user_types(name) VALUES('admin');
INSERT INTO user_types(name) VALUES('customer');

INSERT INTO migrations(name) VALUES('create_db-1.sql');
COMMIT;