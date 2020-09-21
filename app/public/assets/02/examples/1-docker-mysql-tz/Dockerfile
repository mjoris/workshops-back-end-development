FROM mysql:8.0

MAINTAINER Mahmoud Zalt <mahmoud@zalt.me>

# Set timezone
ARG TZ=UTC
ENV TZ ${TZ}
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

COPY my.cnf /etc/mysql/conf.d/my.cnf
CMD ["mysqld"]
EXPOSE 3306