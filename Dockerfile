FROM busybox

MAINTAINER Kévin Labesse kevin@labesse.me

COPY . /var/www/symfony

RUN chmod u+rws,g+rws,o+rws /var/www/symfony/app/cache /var/www/symfony/app/logs

VOLUME /var/www/symfony
