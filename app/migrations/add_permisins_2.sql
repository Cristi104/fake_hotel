CREATE TABLE permissions(
    permission_id INTEGER PRIMARY KEY,
    name VARCHAR(100) UNIQUE
);

CREATE TABLE role_permissions(
    user_type_id INTEGER,
    permission_id INTEGER,
    strength VARCHAR(50),
    PRIMARY KEY(user_type_id, permission_id),
    FOREIGN KEY(user_type_id) REFERENCES user_types(type_id) ON DELETE CASCADE,
    FOREIGN KEY(permission_id) REFERENCES permissions(permission_id) ON DELETE CASCADE
);

INSERT INTO permissions VALUES(1, 'create_user');
INSERT INTO permissions VALUES(2, 'read_user');
INSERT INTO permissions VALUES(3, 'update_user');
INSERT INTO permissions VALUES(4, 'delete_user');
INSERT INTO permissions VALUES(5, 'create_room_type');
INSERT INTO permissions VALUES(6, 'read_room_type');
INSERT INTO permissions VALUES(7, 'update_room_type');
INSERT INTO permissions VALUES(8, 'delete_room_type');
INSERT INTO permissions VALUES(9, 'create_room');
INSERT INTO permissions VALUES(10, 'read_room');
INSERT INTO permissions VALUES(11, 'update_room');
INSERT INTO permissions VALUES(12, 'delete_room');
INSERT INTO permissions VALUES(13, 'create_booking');
INSERT INTO permissions VALUES(14, 'read_booking');
INSERT INTO permissions VALUES(15, 'update_booking');
INSERT INTO permissions VALUES(16, 'delete_booking');

INSERT INTO role_permissions VALUES(1, 1, 'ALL');
INSERT INTO role_permissions VALUES(1, 2, 'ALL');
INSERT INTO role_permissions VALUES(1, 3, 'ALL');
INSERT INTO role_permissions VALUES(1, 4, 'ALL');
INSERT INTO role_permissions VALUES(1, 5, 'ALL');
INSERT INTO role_permissions VALUES(1, 6, 'ALL');
INSERT INTO role_permissions VALUES(1, 7, 'ALL');
INSERT INTO role_permissions VALUES(1, 8, 'ALL');
INSERT INTO role_permissions VALUES(1, 9, 'ALL');
INSERT INTO role_permissions VALUES(1, 10, 'ALL');
INSERT INTO role_permissions VALUES(1, 11, 'ALL');
INSERT INTO role_permissions VALUES(1, 12, 'ALL');
INSERT INTO role_permissions VALUES(1, 13, 'ALL');
INSERT INTO role_permissions VALUES(1, 14, 'ALL');
INSERT INTO role_permissions VALUES(1, 15, 'ALL');
INSERT INTO role_permissions VALUES(1, 16, 'ALL');

INSERT INTO role_permissions VALUES(2, 2, 'SELF');
INSERT INTO role_permissions VALUES(2, 3, 'SELF');
INSERT INTO role_permissions VALUES(2, 13, 'SELF');
INSERT INTO role_permissions VALUES(2, 14, 'SELF');