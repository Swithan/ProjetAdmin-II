FROM ubuntu:latest

RUN apt-get update
RUN apt-get install -y nginx
RUN apt-get install -y nano
RUN apt-get install lsb-release ca-certificates apt-transport-https software-properties-common -y
RUN add-apt-repository ppa:ondrej/php
RUN apt-get install -y php8.0 php8.0-fpm mysql-client

RUN echo "daemon off;" >> /etc/nginx/nginx.conf

RUN mkdir -p /var/www/www/
RUN mkdir -p /var/www/b2b/

COPY sites/www/index.html /var/www/www/
COPY sites/b2b/index.php  /var/www/b2b/

COPY config/www.conf /etc/nginx/sites-available/
COPY config/b2b.conf /etc/nginx/sites-available/

RUN ln -s /etc/nginx/sites-available/www.conf /etc/nginx/sites-enabled/
RUN ln -s /etc/nginx/sites-available/b2b.conf /etc/nginx/sites-enabled/

EXPOSE 80 443

CMD service php8.0-fpm start