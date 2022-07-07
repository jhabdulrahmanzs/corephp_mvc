# sampleproject

# create table register

CREATE TABLE register (
	id int primary key AUTO_INCREMENT,
	firstname varchar(255) NOT NULL,
	lastname varchar(255) NOT NULL,	
	username varchar(255) NOT NULL,
	useremail varchar(255) NOT NULL,
	phone int(10) NOT NULL,
	profile varchar(255) NOT NULL,
	address varchar(255) NOT NULL,
	userpwd varchar(50) NOT NULL,
	cpassword varchar(50) NOT NULL

  
)
