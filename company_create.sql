show databases;
CREATE DATABASE company;
use company;
 
 CREATE TABLE customer(
 cusID int NOT null,
 cusName varchar(20) default NULL,
 contactName varchar(30) default NULL,
 contactNo char(10) default NULL,
 primary key (cusID)
 )ENGINE=InnoDB default charset=utf8mb4 collate=utf8mb4_0900_ai_ci;
 
 
  CREATE TABLE hardware(
 machineID varchar(10) NOT null,
 manufacturer varchar(20) not NULL,
 model varchar(10) not NULL,
 vendor varchar(20) not NULL,
 EOL date default NULL,
 primary key (machineID)
 )ENGINE=InnoDB default charset=utf8mb4 collate=utf8mb4_0900_ai_ci;
 
 CREATE TABLE app(
 appID varchar(10) NOT null,
 appName varchar(20) not NULL,
 Rel varchar(5) not NULL,
 EOL date default NULL,
 primary key (appID)
 )ENGINE=InnoDB default charset=utf8mb4 collate=utf8mb4_0900_ai_ci;
 
 
  CREATE TABLE CUSENV(
 cusID int(11) NOT null,
 sysNo smallint(6) not NULL,
 machineID varchar(10) default null,
 purDate date default null,
 Support date default null,
 OS varchar(10) default null,
 Web varchar(20) default null,
 Java varchar(3) default null,
 PHP varchar(3) default null,
 
 primary key (cusID, sysNo),
 CONSTRAINT cusenv_ibfk_1 Foreign key (cusID) REFERENCES customer(cusID)
 )ENGINE=InnoDB default charset=utf8mb4 collate=utf8mb4_0900_ai_ci;
 
 
 
 CREATE TABLE cusapp(
 cusID int not NULL,
 appID varchar(11) not null,
 purDate date default null,
 Support date default null,
 
 key appID (appID),
 CONSTRAINT cusapp_ibfk_1 Foreign key (cusID) REFERENCES customer(cusID),
 CONSTRAINT cusapp_ibfk_2 Foreign key (appID) REFERENCES app(appID)
 
 )ENGINE=InnoDB default charset=utf8mb4 collate=utf8mb4_0900_ai_ci;