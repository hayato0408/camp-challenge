１．DBに人の情報を入れたテーブルを作成してください。


//humanテーブルを作成
mysql> create table human(id int not null primary key,name varchar(50),age int, address varchar(155));
Query OK, 0 rows affected (0.02 sec)



//humanテーブルにレコードをinsert
mysql> insert into human values(1,'安井',27,'福井');
Query OK, 1 row affected (0.00 sec)

mysql> insert into human values(2,'山田',38,'福島');
Query OK, 1 row affected (0.00 sec)

mysql> insert into human values(3,'渡部',31,'福岡');
Query OK, 1 row affected (0.01 sec)

mysql> insert into human values(4,'井上',25,'東京');
Query OK, 1 row affected (0.00 sec)

mysql> insert into human values(5,'岩田',41,'宮城');
Query OK, 1 row affected (0.01 sec)


mysql> select * from human;
+----+--------+------+---------+
| id | name   | age  | address |
+----+--------+------+---------+
|  1 | 安井   |   27 | 福井    |
|  2 | 山田   |   38 | 福島    |
|  3 | 渡部   |   31 | 福岡    |
|  4 | 井上   |   25 | 東京    |
|  5 | 岩田   |   41 | 宮城    |
+----+--------+------+---------+
5 rows in set (0.00 sec)
