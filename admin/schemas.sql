-- Author: Bronson Boone		

-- DROP TABLE Admins;

-- CREATE TABLE Admins( username VARCHAR(30) PRIMARY KEY,
--        	     	     password_hash VARCHAR(255) NOT NULL,
-- 	             isAdmin BIT DEFAULT 1
-- );

-- CREATE TABLE Deals( id INTEGER PRIMARY KEY AUTO_INCREMENT, 
--        	     	    title VARCHAR(2555) NOT NULL, 
-- 		    body TEXT NOT NULL,
-- 		    isVisible BIT DEFAULT 1
-- ); 

CREATE TABLE email_customers(email_address VARCHAR(255) PRIMARY KEY);
