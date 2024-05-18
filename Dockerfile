FROM php:8.1.4-apache

# Instala dependencias necesarias
RUN apt-get update -y && apt-get install -y openssl zip unzip git 
RUN docker-php-ext-install pdo_mysql

# Instala Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copia el código fuente
COPY . /var/www/html
COPY ./public/.htaccess /var/www/html/.htaccess

# Establece el directorio de trabajo
WORKDIR /var/www/html

# Copia o renombra .env.example a .env y establece la clave API
RUN cp .env.example .env 

# Argumentos de construcción
ARG DB_PASSWORD
ARG OPENWEATHER_API_KEY

# Configura las variables de entorno
ENV DB_PASSWORD=${DB_PASSWORD}
ENV OPENWEATHER_API_KEY=${OPENWEATHER_API_KEY}

# Instala dependencias de PHP con Composer
RUN composer install \
    --ignore-platform-reqs \
    --no-interaction \
    --no-plugins \
    --no-scripts \
    --prefer-dist

# Genera la clave de la aplicación Laravel
RUN php artisan key:generate

# Ejecuta migraciones y enlaces simbólicos
RUN php artisan migrate
RUN php artisan storage:link

# Establece permisos adecuados y habilita módulos Apache necesarios
RUN chmod -R 777 storage
RUN a2enmod rewrite
RUN service apache2 restart