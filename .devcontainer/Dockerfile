FROM mcr.microsoft.com/devcontainers/php:8.3

# Install PDO MySQL and mysqli extensions
RUN docker-php-ext-install pdo_mysql mysqli

# Enable the extensions
RUN echo "extension=pdo_mysql.so" > /usr/local/etc/php/conf.d/pdo_mysql.ini && \
    echo "extension=mysqli.so" > /usr/local/etc/php/conf.d/mysqli.ini