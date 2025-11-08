FROM mcr.microsoft.com/devcontainers/php:8.3

# Install Node.js LTS (20.x)
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - && \
    apt-get install -y nodejs

# Install PDO MySQL and mysqli extensions
RUN docker-php-ext-install pdo_mysql mysqli

# Enable the extensions
RUN echo "extension=pdo_mysql.so" > /usr/local/etc/php/conf.d/pdo_mysql.ini && \
    echo "extension=mysqli.so" > /usr/local/etc/php/conf.d/mysqli.ini

# Verify Node.js and npm installation
RUN node --version && npm --version