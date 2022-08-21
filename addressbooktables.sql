asplap3188@Asplap3188:~$ sudo mysql
[sudo] password for asplap3188: 
ERROR 1045 (28000): Access denied for user 'root'@'localhost' (using password: NO)
asplap3188@Asplap3188:~$ sudo mysql -u root -p
Enter password: 
Welcome to the MySQL monitor.  Commands end with ; or \g.
Your MySQL connection id is 9
Server version: 8.0.29-0ubuntu0.20.04.3 (Ubuntu)

Copyright (c) 2000, 2022, Oracle and/or its affiliates.

Oracle is a registered trademark of Oracle Corporation and/or its
affiliates. Other names may be trademarks of their respective
owners.

Type 'help;' or '\h' for help. Type '\c' to clear the current input statement.

mysql> create database addressbook;
Query OK, 1 row affected (0.03 sec)

mysql> shoe tables;
ERROR 1064 (42000): You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'shoe tables' at line 1
mysql> show databases;
+--------------------+
| Database           |
+--------------------+
| addressbook        |
| aspire             |
| india              |
| information_schema |
| mysql              |
| performance_schema |
| sys                |
+--------------------+
7 rows in set (0.00 sec)

mysql> use addressbook;
Database changed
mysql> show tables;
Empty set (0.00 sec)

mysql> create table user(
    -> id int AUTO_INCREMENT,
    -> email varchar(25),
    -> password varchar(10),
    -> primary key(id),
    -> UNIQUE(email)
    -> );
Query OK, 0 rows affected (0.04 sec)

mysql> show table user;
ERROR 1064 (42000): You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'user' at line 1
mysql> describe table user;
+----+-------------+-------+------------+------+---------------+------+---------+------+------+----------+-------+
| id | select_type | table | partitions | type | possible_keys | key  | key_len | ref  | rows | filtered | Extra |
+----+-------------+-------+------------+------+---------------+------+---------+------+------+----------+-------+
|  1 | SIMPLE      | user  | NULL       | ALL  | NULL          | NULL | NULL    | NULL |    1 |   100.00 | NULL  |
+----+-------------+-------+------------+------+---------------+------+---------+------+------+----------+-------+
1 row in set, 1 warning (0.01 sec)

mysql> create table country(
    -> id int AUTO_INCREMENT,
    -> name varchar(40),
    -> primary key(id)
    -> );
Query OK, 0 rows affected (0.04 sec)

mysql> create table state(
    -> id int AUTO_INCREMENT,
    -> country_id int,
    -> name varchar(40),
    -> primary key(id),
    -> foreign key(country_id) REFERENCES country(id) ON CASCADE UPDATE ON CASCADE DELETE
    -> );
ERROR 1064 (42000): You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'CASCADE UPDATE ON CASCADE DELETE
)' at line 6
mysql> create table state( id int AUTO_INCREMENT, country_id int, name varchar(40), primary key(id), foreign key(country_id) REFERENCES country(id) ON CASCADE UPDATE ON CASCADE DELETE );
ERROR 1064 (42000): You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'CASCADE UPDATE ON CASCADE DELETE )' at line 1
mysql> create table state( id int AUTO_INCREMENT, country_id int, name varchar(40), primary key(id), foreign key(country_id) REFERENCES country(id) ON DELETE CASCADE ON UPDATE CASCADE);
Query OK, 0 rows affected (0.03 sec)

mysql> create table address(
    -> id int(autogen),
    -> name varchar(40),
    -> phone varchar(15),
    -> address varchar(200),
    -> city varchar(40),
    -> age int,
    -> country_id int,
    -> state_id int,
    -> primary key(id),
    -> foreign key(country_id) REFERENCES country(id),
    -> foreign key (state_id) REFERENCES state(id) ON DELETE CASCADE ON UPDATE CASCADE)
    -> ^C

^C
mysql> create table address(
    -> id int AUTO_INCREMENT;
ERROR 1064 (42000): You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 2
mysql> CREATE TABLE address(
    -> id int AUTO_INCREMENT,
    -> name varchar(15),
    -> address varchar(200),
    -> city varchar(40),
    -> age int,
    -> country_id int,
    -> state_id int,
    -> primary key(id),
    -> foreign key(country_id) REFERENCES country(id) ON DELETE CASCADE ON UPDATE CASCADE
    -> FOREIGN KEY(state_id) REFERENCES state(id) ON DELETE CASCADE ON UPDATE CASCADE
    -> );
ERROR 1064 (42000): You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'FOREIGN KEY(state_id) REFERENCES state(id) ON DELETE CASCADE ON UPDATE CASCADE
)' at line 11
mysql> CREATE TABLE address( id int AUTO_INCREMENT, name varchar(15), address varchar(200), city varchar(40), age int, country_id int, state_id int, primary key(id), foreign key(country_id) REFERENCES country(id) ON DELETE CASCADE ON UPDATE CASCADE FOREIGN KEY(state_id) REFERENCES state(id) ON DELETE CASCADE ON UPDATE
CASCADE );
ERROR 1064 (42000): You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'FOREIGN KEY(state_id) REFERENCES state(id) ON DELETE CASCADE ON UPDATE CASCADE )' at line 1
mysql> CREATE TABLE address( id int AUTO_INCREMENT, name varchar(15), address varchar(200), city varchar(40), age int, country_id int, state_id int, primary key(id), foreign key(country_id) REFERENCES country(id),foreign key(state_id) REFERENCES state(id) ON DELETE CASCADE ON UPDATE CASCADE );
Query OK, 0 rows affected (0.04 sec)

mysql> Insert into country(name)values('India'),('China'),('USA');
Query OK, 3 rows affected (0.02 sec)
Records: 3  Duplicates: 0  Warnings: 0

mysql> select*from country;
+----+-------+
| id | name  |
+----+-------+
|  1 | India |
|  2 | China |
|  3 | USA   |
+----+-------+
3 rows in set (0.00 sec)

mysql> Insert into state(country_id,name)VALUES(1,"Tamilnadu"),(1,"Kerala"),(2,"Gansu"),(2,"Hong kong")(3,"California"),(3,"Newyork");
mysql> 064 (42000): You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '(3,"California"),(3,"Newyork")' at line 1
mysql> Insert into state(country_id,name)VALUES(1,"Tamilnadu"),(1,"Kerala"),(2,"Gansu"),(2,"Hong kong")(3,"California"),(3,"Newyork");
mysql> 
mysql> Insert into state(country_id,name)VALUES(1,"Tamilnadu"),(1,"Kerala"),(2,"Gansu"),(2,"Hong kong"),(3,"California"),(3,"Newyork");
Query OK, 6 rows affected (0.02 sec)
Records: 6  Duplicates: 0  Warnings: 0

mysql> slect*from state;
ERROR 1064 (42000): You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'slect*from state' at line 1
mysql> select*from state;
+----+------------+------------+
| id | country_id | name       |
+----+------------+------------+
|  1 |          1 | Tamilnadu  |
|  2 |          1 | Kerala     |
|  3 |          2 | Gansu      |
|  4 |          2 | Hong kong  |
|  5 |          3 | California |
|  6 |          3 | Newyork    |
+----+------------+------------+
6 rows in set (0.00 sec)

mysql> 

