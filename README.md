# Introduction

```
$ git clone https://github.com/mochizukikotaro/k8s-php-apache-mysql.git
$ cd k8s-php-apache-mysql
```

There are 3 ways.

- Use docker-compose on local
- Use k8s
  - on GCP
  - on GCP with Cloud SQL


# Use docker-compose on local

```
$ docker-compose up -d

# Setting database
$ docker-compose exec mysql mysql -uroot -ppass
mysql> create database mochizuki_test;
mysql> create table users (id int auto_increment, name varchar(255), primary key(id));
mysql> insert into users (name) values ('ken'), ('taro'), ('yuki');
mysql> exit
```

Then, you can access `http://localhost/users_for_local.php`.

# Use k8s

**Prerequisties**



- GCP
- Project
- Cluster
- Cloud SQL
  - root:pass
  - create credentials
- Secrete


**Environment variables**

```
# ~/.zshrc

export PROJECT_ID="$(gcloud config get-value project)"
export IMAGE_PHP_APACHE="sample-apache:v1"

# for [on GCP]
export IMAGE_MYSQL="sample-mysql:v1"

# for [on GCP with Cloud SQL]
export INSTANCE_CONNECTION_NAME="project-id:asia-east1:sample"
export CREDENTIALS="sample.json"
```


## on GCP



```
$ envsubst < deploy.yml | kubectl create -f -
```


## on GCP with Cloud SQL

```
$ envsubst < deploy_with_proxy.yml | kubectl create -f -
```

# Update

```
# Update image
$ docker build -t <IMAGE-NAME> .
$ gcloud docker -- push <IMAGE-NAME>
$ kubectl set image <CONTAINER-NAME>=<IMAGE-NAME>:latest

# Update deployment
$ kubectl edit deployment <DEPLOYMENT-NAMEM>
# Edit ....
```
