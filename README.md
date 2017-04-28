# Usage

```
git clone https://github.com/mochizukikotaro/k8s-php-apache-mysql.git
cd k8s-php-apache-mysql
```

There are 3 ways.

- Use docker-compose on local
- Use k8s on GCP
- Use k8s on GCP with Cloud SQL


### Use docker-compose on local

```
docker-compose up -d

# Setting database
docker-compose exec mysql mysql -uroot -ppass
mysql> create database mochizuki_test;
mysql> create table users (id int auto_increment, name varchar(255), primary key(id));
mysql> insert into users (name) values ('ken'), ('taro'), ('yuki');
mysql> exit
```

Then, you can access `http://localhost/users_for_local.php`.


### Use k8s on GCP

### Use k8s on GCP with Cloud SQL
