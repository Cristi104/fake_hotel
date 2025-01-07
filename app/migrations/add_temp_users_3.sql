
CREATE TABLE temp_users (
    user_id INTEGER AUTO_INCREMENT PRIMARY KEY,
    user_type INTEGER NOT NULL,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    phone VARCHAR(10) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(100) NOT NULL,
    FOREIGN KEY(user_type) REFERENCES user_types(type_id) ON DELETE RESTRICT
);