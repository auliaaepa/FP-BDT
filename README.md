# FP-BDT
 
## Arsitektur Aplikasi
Berikut merupakan arsitektur aplikasi yang digunakan, baik yang berada di dalam AWS server, maupun bukan.
![Final Project](https://user-images.githubusercontent.com/76677130/146765061-a956aade-155a-413b-8e12-e9129a620a02.png)

## File Konfigurasi
Berikut merupakan script dan file yang digunakan untuk melakukan instalasi serta konfigurasi pada webserver, mysql replication, serta mongodb.
* MySQL Replication
    * [Install MySQL](https://github.com/auliaaepa/FP-BDT/blob/5a027bb8b6bef73ce347779f15002499fe4c97c5/script/mysql/install.txt)
    * [Konfigurasi Master](https://github.com/auliaaepa/FP-BDT/blob/main/script/mysql/master.txt)
    * [/etc/mysql/mysql.conf.d/mysqld.cnf pada master](https://github.com/auliaaepa/FP-BDT/blob/main/script/mysql/master-mysqld.cnf)
    * [Konfigurasi Slave](https://github.com/auliaaepa/FP-BDT/blob/main/script/mysql/slave.txt)
    * [/etc/mysql/mysql.conf.d/mysqld.cnf pada slave](https://github.com/auliaaepa/FP-BDT/blob/main/script/mysql/slave-mysqld.cnf)
    * [Aplikasi ke Webserver](https://github.com/auliaaepa/FP-BDT/blob/main/script/mysql/application.txt)
* MongoDB
    * [Install MongoDB](https://github.com/auliaaepa/FP-BDT/blob/main/script/mongodb/install.txt)
    * [Aplikasi ke Webserver](https://github.com/auliaaepa/FP-BDT/blob/main/script/mongodb/application.txt)
* Webserver
    * [Install Webserver](https://github.com/auliaaepa/FP-BDT/blob/main/script/webserver/install.txt)
    * [php.ini](https://github.com/auliaaepa/FP-BDT/blob/main/script/webserver/php.ini)
    * [config/app/php](https://github.com/auliaaepa/FP-BDT/blob/main/config/app.php)
    * [config/database.php](https://github.com/auliaaepa/FP-BDT/blob/main/config/database.php)
