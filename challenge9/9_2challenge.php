//stationテーブルを作成
mysql> create table station(stationID int primary key,stationName varchar(30));
Query OK, 0 rows affected (0.02 sec)


//stationテーブルにレコードをinsert
insert into station values(1' at line 1
mysql> insert into station values(1,'中野');
Query OK, 1 row affected (0.01 sec)

mysql> insert into station values(2,'落合');
Query OK, 1 row affected (0.00 sec)

mysql> insert into station values(3,'高田馬場');
Query OK, 1 row affected (0.00 sec)

mysql> insert into station values(4,'早稲田');
Query OK, 1 row affected (0.00 sec)

mysql> insert into station values(5,'神楽坂');
Query OK, 1 row affected (0.00 sec)

mysql> insert into station values(6,'飯田橋');
Query OK, 1 row affected (0.00 sec)



mysql> select*from station;
+-----------+--------------+
| stationID | stationName  |
+-----------+--------------+
|         1 | 中野         |
|         2 | 落合         |
|         3 | 高田馬場     |
|         4 | 早稲田       |
|         5 | 神楽坂       |
|         6 | 飯田橋       |
+-----------+--------------+
6 rows in set (0.00 sec)
