per generare il vostro file config.php
**USATE**: cat config-sample.php > config.php

**run: $sh updateDB.sh USER** per aggiornare il database in automatico

users(**id**, name, lastname, sex, email, password)

| Field | Type | Null | Key | Default | Extra |
| --- | --- | --- | --- | --- | --- |
| id       | int(6) unsigned      | NO | PRI | NULL | AUTO_INCERMENT |
| name     | varchar(30)          | NO |     | NULL |                |
| lastname | varchar(30)          | NO |     | NULL |                |
| sex      | enum('M','F','N.D.') | NO |     | NULL |                |
| email    | varchar(35)          | NO |     | NULL |                |
| password | varchar(8)           | NO |     | NULL |                |



rockets(**id**, model, price)

| Field | Type | Null | Key | Default | Extra |
| --- | --- | --- | --- | --- | --- |
| id    | int(6) unsigned     | NO   | PRI | NULL    | auto_increment |
| model | varchar(20)         | NO   |     | NULL    |                |
| price | bigint(12) unsigned | YES  |     | NULL    |                |

travels(**id**, departure, arrival, date)

| Field | Type | Null | Key | Default | Extra |
| --- | --- | --- | --- | --- | --- |
| id        | int(6) unsigned | NO   | PRI | NULL    | auto_increment |
| departure | varchar(30)     | NO   |     | NULL    |                |
| arrival   | varchar(30)     | NO   |     | NULL    |                |
| date      | date            | YES  |     | NULL    |                |

rocket_travel(**id_travel***, **id_rocket***)

| Field | Type | Null | Key | Default | Extra |
| --- | --- | --- | --- | --- | --- |
| id_travel | int(6) unsigned | NO   | PRI | NULL    |       |
| id_rocket | int(6) unsigned | NO   | PRI | NULL    |       |
| data      | data            | NO   | PRI | NULL    |       |
