FROM ubuntu:20.04

RUN apt update
RUN apt upgrade -y
RUN apt-get install software-properties-common -y
RUN add-apt-repository ppa:ondrej/php
RUN apt-get update -y
RUN apt-get install apache2 php8.0 libapache2-mod-php8.0 -y
RUN apt-get install php8.0-common php8.0-sqlite3  php8.0-xml php8.0-curl php8.0-gd php8.0-imagick php8.0-cli php8.0-dev php8.0-imap php8.0-mbstring php8.0-opcache php8.0-soap php8.0-zip -y
RUN apt-get install php8.0-fpm libapache2-mod-fcgid -y
RUN apt install sqlite3 -y
RUN apt-get install php-sqlite3 -y

WORKDIR /home/tienda_online/