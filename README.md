per generare il vostro file config.php
**USATE**: cat config-sample.php > config.php

**run: $sh updateDB.sh USER** lper aggiornare il database in automatico

USER ADMIN: admin
PASSWORD ADMIN: root

users(**id**, name, lastname, sex, **email**, password, **username**)
//unique(email)
//unique(username)

| Field | Type | Null | Key | Default | Extra |
| --- | --- | --- | --- | --- | --- |
| id       | int(6) unsigned      | NO   | PRI | NULL    | auto_increment |
| name     | varchar(30)          | NO   |     | NULL    |                |
| lastname | varchar(30)          | NO   |     | NULL    |                |
| sex      | enum('M','F','N.D.') | NO   |     | NULL    |                |
| email    | varchar(35)          | NO   | PRI | NULL    |                |
| password | char(64)             | NO   |     | NULL    |                |
| username | varchar(20)          | NO   | PRI | NULL    |                |
| isAdmin  | tinyint(1)           | NO   |     | 0       |                |


rockets(**id**, model, price)

| Field | Type | Null | Key | Default | Extra |
| --- | --- | --- | --- | --- | --- |
| id          | int(6) unsigned     | NO   | PRI | NULL    | auto_increment |
| model       | varchar(20)         | NO   |     | NULL    |                |
| weight      | int(6) unsigned     | NO   |     | NULL    |                |
| height      | int(6) unsigned     | NO   |     | NULL    |                |
| nationality | varchar(15)         | YES  |     | NULL    |                |


travels(**id**, departure, arrival, description)

| Field | Type | Null | Key | Default | Extra |
| --- | --- | --- | --- | --- | --- |
| id          | int(6) unsigned | NO   | PRI | NULL    | auto_increment |
| departure   | varchar(30)     | NO   |     | NULL    |                |
| arrival     | varchar(30)     | NO   |     | NULL    |                |
| description | text            | NO   |     | NULL    |                |


rocket_travel(**id_travel***, **id_rocket***)

| Field | Type | Null | Key | Default | Extra |
| --- | --- | --- | --- | --- | --- |
| id_travel | int(6) unsigned | NO   | PRI | NULL    |       |
| id_rocket | int(6) unsigned | NO   | PRI | NULL    |       |
| data      | data            | NO   | PRI | NULL    |       |


cabin(**id**, seats, class)
//unique(seats,class)

| Field | Type | Null | Key | Default | Extra |
| --- | --- | --- | --- | --- | --- |
| id    | int(6)                                | NO   | PRI | NULL    | auto_increment |
| seats | int(2)                                | NO   | MUL | NULL    |                |
| class | enum('Standard','Deluxe','SpaceClub') | NO   |     | NULL    |                |


rocket_cabin(**id**, id_rocket*, id_cabin*, number_of_cabin)
//unique(id_rocket, id_cabin)

| Field | Type | Null | Key | Default | Extra |
| --- | --- | --- | --- | --- | --- |
| id              | int(6)          | NO   | PRI | NULL    |       |
| id_rocket       | int(6)          | NO   | MUL | NULL    |       |
| id_cabin        | int(6)          | NO   | MUL | NULL    |       |
| number_of_cabin | int(6)          | NO   |     | NULL    |       |
| price           | int(5) unsigned | NO   |     | NULL    |       |
| free            | tinyint(1)      | NO   |     | NULL    |       |


orders(**id**, id_user*, id_travel*, id_rc*, number_of_seats)

| Field | Type | Null | Key | Default | Extra |
| --- | --- | --- | --- | --- | --- |
| id              | int(6) | NO   | PRI | NULL    | auto_increment |
| id_user         | int(6) | NO   | MUL | NULL    |                |
| id_travel       | int(6) | NO   | MUL | NULL    |                |
| id_rc           | int(6) | NO   | MUL | NULL    |                |
| number_of_seats | int(2) | NO   |     | NULL    |                |


planets(**id**, name, info, mass, temperature)

| Field | Type | Null | Key | Default | Extra |
| --- | --- | --- | --- | --- | --- |
| id          | int(6) unsigned | NO   | PRI | NULL    |       |
| name        | varchar(20)     | NO   |     | NULL    |       |
| info        | text            | NO   |     | NULL    |       |
| mass        | int(10)         | NO   |     | NULL    |       |
| temperature | int(10)         | NO   |     | NULL    |       |


images(**path**, **name**)

| Field | Type | Null | Key | Default | Extra |
| --- | --- | --- | --- | --- | --- |
| path  | varchar(30)     | NO   |     | NULL    |       |
| name  | varchar(10)     | NO   |     | NULL    |       |
| id    | int(6) unsigned | NO   | PRI | NULL    |       |


img_planet(**id_planet***, **id_img***)

| Field | Type | Null | Key | Default | Extra |
| --- | --- | --- | --- | --- | --- |
| id_planet | int(6) unsigned | NO   | PRI | NULL    |       |
| id_img    | int(6) unsigned | NO   | PRI | NULL    |       |


img_planet(**id_travel***, **id_img***)

| Field | Type | Null | Key | Default | Extra |
| --- | --- | --- | --- | --- | --- |
| id_travel | int(6) unsigned | NO   | PRI | NULL    |       |
| id_img    | int(6) unsigned | NO   | PRI | NULL    |       |
