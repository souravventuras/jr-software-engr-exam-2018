# jr-software-engr-exam-2018
First create mysql database:
create database developerinfo;

Then create table:
create table developer(
ID int AUTO_INCREMENT,
email varchar(250) NOT NULL UNIQUE,
planguage varchar(250) NOT NULL,
language varchar(250) NOT NULL,
PRIMARY KEY(ID)
);

And then go to project directory by terminal and run:
node index.js

For unit test to run:
npm test
Then search in the browser:
localhost:5000
