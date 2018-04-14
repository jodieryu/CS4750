SET FOREIGN_KEY_CHECKS=0; 

DROP TABLE IF EXISTS restaurant;
CREATE TABLE restaurant( 
	r_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	rname VARCHAR(50) NOT NULL,
    phone_num INT(10),
    street VARCHAR(50) NOT NULL, #no city/state since its in cville
    price_range ENUM ('$', '$$', '$$$', '$$$$'),
    rating_google DOUBLE,
    rating DOUBLE, #avg rating for our website
    num_of_reviews INT DEFAULT '0'
);

DROP TABLE IF EXISTS r_hours;
CREATE TABLE r_hours(
	r_id INT NOT NULL,
    sun_open_time VARCHAR(5) NOT NULL,
    sun_close_time VARCHAR(5) NOT NULL,
    mon_open_time VARCHAR(5) NOT NULL,
    mon_close_time VARCHAR(5) NOT NULL, 
    tues_open_time VARCHAR(5) NOT NULL,
    tues_close_time VARCHAR(5) NOT NULL,
    wed_open_time VARCHAR(5) NOT NULL,
    wed_close_time VARCHAR(5) NOT NULL,
    thurs_open_time VARCHAR(5) NOT NULL,
    thurs_close_time VARCHAR(5) NOT NULL,
    fri_open_time VARCHAR(5) NOT NULL,
    fri_close_time VARCHAR(5) NOT NULL,
    sat_open_time VARCHAR(5) NOT NULL,
    sat__close_time VARCHAR(5) NOT NULL,
    description VARCHAR(20), #ex: lunch, dinner, dessert, bar, etc. 	
    PRIMARY KEY (r_id, description),
    FOREIGN KEY (r_id) REFERENCES restaurant(r_id)
);

DROP TABLE IF EXISTS customer;
CREATE TABLE customer(
	c_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    fname VARCHAR(50) NOT NULL,
    lname VARCHAR(50) NOT NULL,
    street VARCHAR(20),
    city VARCHAR(20),
    state VARCHAR(20),
    username VARCHAR(20) NOT NULL UNIQUE,
    pwd VARCHAR(255) NOT NULL
);

DROP TABLE IF EXISTS c_phone;
CREATE TABLE c_phone(
	c_id INT NOT NULL,
    phone_numb INT (10) NOT NULL,
    PRIMARY KEY (c_id, phone_numb),
    FOREIGN KEY (c_id) REFERENCES customer(c_id) ON DELETE CASCADE
);

DROP TABLE IF EXISTS r_cuisine;
DROP TABLE IF EXISTS r_category;
CREATE TABLE r_category(
	r_id INT NOT NULL, 
    category VARCHAR(20) NOT NULL,
    PRIMARY KEY (r_id, category),
    FOREIGN KEY (r_id) REFERENCES restaurant(r_id) ON DELETE CASCADE
);

DROP TABLE IF EXISTS own_menu;
DROP TABLE IF EXISTS menu;
CREATE TABLE menu(
	r_id INT NOT NULL,
    food_name VARCHAR(50) NOT NULL,
    price DECIMAL(6,2) NOT NULL,
    category VARCHAR(20) NOT NULL, #type of food: dessert, main, appetizer, etc. 
    description VARCHAR(100),
    PRIMARY KEY (r_id, food_name, category),
    FOREIGN KEY (r_id) REFERENCES restaurant(r_id) ON DELETE CASCADE
);


DROP TABLE IF EXISTS supplier;
CREATE TABLE supplier(
	s_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    sname VARCHAR(20) NOT NULL,
    street VARCHAR(20),
    city VARCHAR(20),
    state VARCHAR(20)   
);

DROP TABLE IF EXISTS provide;
CREATE TABLE provide(
	s_id INT NOT NULL,
    r_id INT NOT NULL,
    item VARCHAR(20) NOT NULL,
    PRIMARY KEY (s_id, r_id, item),
    FOREIGN KEY (s_id) REFERENCES supplier(s_id),
    FOREIGN KEY (r_id) REFERENCES restaurant(r_id)
);

DROP TABLE IF EXISTS review; 
CREATE TABLE review(
	c_id INT NOT NULL,
    r_id INT NOT NULL,
    rating INT NOT NULL,
    description TEXT, 
    PRIMARY KEY (c_id, r_id), #assume customers can only review a restaurant once
    FOREIGN KEY (c_id) REFERENCES customer(c_id) ON DELETE CASCADE,
    FOREIGN KEY (r_id) REFERENCES restaurant(r_id) ON DELETE CASCADE
);

#changed it such that not every customer has to have a favorite restaurant
#(got rid of total participation)
DROP TABLE IF EXISTS favorite; 
CREATE TABLE favorite(
	c_id INT NOT NULL,
    r_id INT NOT NULL,
    PRIMARY KEY (c_id, r_id),
    FOREIGN KEY (c_id) REFERENCES customer(c_id) ON DELETE CASCADE,
    FOREIGN KEY (r_id) REFERENCES restaurant(r_id) ON DELETE CASCADE
);

#added a bucketlist
DROP TABLE IF EXISTS bucketlist;
CREATE TABLE bucketlist(
	c_id INT NOT NULL,
    bl_name VARCHAR(20) NOT NULL,
    PRIMARY KEY (c_id, bl_name),
    FOREIGN KEY (c_id) REFERENCES customer(c_id) ON DELETE CASCADE
);

DROP TABLE IF EXISTS bucketlist_item;
CREATE TABLE bucketlist_item(
	c_id INT NOT NULL,
    bl_name VARCHAR(20) NOT NULL,
    r_id INT NOT NULL,
    eaten_at ENUM('T','F') DEFAULT 'F',
    PRIMARY KEY (c_id, bl_name, r_id),
	FOREIGN KEY (c_id, bl_name) REFERENCES bucketlist(c_id, bl_name) ON DELETE CASCADE,
    FOREIGN KEY (r_id) REFERENCES restaurant(r_id) ON DELETE CASCADE
);

#do you make another table for self referencing - friend ?
#what is order (netween customer and restaurant)?
	