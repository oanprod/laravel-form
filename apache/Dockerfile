FROM debian:jessie
MAINTAINER Arnaud POINTET <arnaud.pointet@gmail.com>

RUN echo 'deb http://ftp.fr.debian.org/debian/ jessie non-free' >> /etc/apt/sources.list
RUN echo 'deb-src http://ftp.fr.debian.org/debian/ jessie non-free' >> /etc/apt/sources.list
RUN apt-get update
RUN apt-get -y install apache2 libapache2-mod-fastcgi libapache2-mod-php5

RUN a2enmod rewrite;
RUN a2enmod proxy_http;
RUN a2enmod proxy_fcgi;
RUN a2enmod php5;

RUN chown -R www-data:www-data /var/www/

RUN mv /etc/apache2/apache2.conf /etc/apache2/apache2.conf.dist
COPY apache2.conf /etc/apache2/apache2.conf

RUN a2dissite 000-default.conf

# Laravel Form
COPY laravelform.conf /etc/apache2/sites-available/laravelform.conf
RUN a2ensite laravelform.conf

# commandes à exécuter au démarrage de l'instance de l'image
# ici on démarrera Apache
CMD ["/usr/sbin/apache2ctl","-DFOREGROUND"]
