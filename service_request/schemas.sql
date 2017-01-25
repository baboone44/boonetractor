DROP TABLE ServiceRequest;
DROP TABLE ServiceRequestType;
DROP TABLE BT_Customers;
DROP TABLE BT_Stores;

CREATE TABLE BT_Stores (
       store_id int AUTO_INCREMENT NOT NULL,
       store_name varchar(25) NOT NULL,
       PRIMARY KEY(store_id)
);

INSERT INTO BT_Stores(store_name) VALUES ("Salem");

CREATE TABLE BT_Customers (
       id int AUTO_INCREMENT UNIQUE,
       name varchar(255) NOT NULL,
       business_name varchar(255) NOT NULL,
       street_address varchar(255) NOT NULL,
       city varchar(50) NOT NULL,
       state varchar(2) NOT NULL,
       zip varchar(10) NOT NULL,
       phone_number varchar(15) NOT NULL,
       email_address varchar(255),
       PRIMARY KEY(phone_number)
);

CREATE TABLE ServiceRequestType(
	id_type int AUTO_INCREMENT,
	description varchar(7),
	PRIMARY KEY(id_type)
);

INSERT INTO ServiceRequestType(description) VALUES ("PARTS");
INSERT INTO ServiceRequestType(description) VALUES ("SERVICE");

CREATE TABLE ServiceRequest (
       service_id int AUTO_INCREMENT,
       customer_id int NOT NULL,
       description text NOT NULL,
       request_type int NOT NULL,
       store_id int NOT NULL,
       status int NOT NULL,
       notes text,
       date_submitted datetime NOT NULL,
       PRIMARY KEY (service_id),
       FOREIGN KEY (store_id) REFERENCES BT_Stores(store_id),
       FOREIGN KEY (request_type) REFERENCES ServiceRequestType(id_type),
       FOREIGN KEY (customer_id) REFERENCES BT_Customers(id)
);      



