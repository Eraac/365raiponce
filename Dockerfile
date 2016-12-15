FROM busybox

MAINTAINER Kévin Labesse kevin@labesse.me

COPY . /var/www

RUN chown -R www-data:www-data /var/www

VOLUME /var/www
