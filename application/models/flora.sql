CREATE TABLE addresses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    country_id int(11) not null,
    state_id int(11) not null,
    name VARCHAR(255) not null,
    phone VARCHAR(255) not null,
    alt_phone VARCHAR(255) null,
    line1 VARCHAR(255) null,
    line2 VARCHAR(255) null,
    pincode int(10) not null
);