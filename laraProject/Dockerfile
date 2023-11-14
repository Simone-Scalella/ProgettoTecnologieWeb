# Usa un'immagine di PHP 7.2 con Composer come base
FROM composer:1.10 AS composer

# Secondo stage per l'esecuzione effettiva
FROM php:7.2.34-apache

# Imposta la variabile d'ambiente COMPOSER_ALLOW_SUPERUSER
ENV COMPOSER_ALLOW_SUPERUSER 1

# Installa estensioni e dipendenze necessarie
RUN apt-get update \
    && apt-get install -y libzip-dev zip unzip git \
    && docker-php-ext-install pdo_mysql zip

# Installa Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Composer installa le dipendenze in una directory temporanea
WORKDIR /app
COPY composer.json composer.json
COPY composer.lock composer.lock
RUN composer install --no-scripts --no-autoloader

# Vediamo se funziona
#COPY --from=composer:latest /usr/local/bin/composer /usr/local/bin/composer

# Copia il resto dell'applicazione e genera l'autoloader
COPY . .

# Esegui composer install per installare le dipendenze
RUN composer install

# Pulisci la cache di Composer
RUN composer clear-cache

# Esegui composer dump-autoload per generare l'autoloader
RUN composer dump-autoload --optimize --classmap-authoritative

# Configura la porta Apache
EXPOSE 8080

# Configura il tuo VirtualHost Apache
COPY apache-config.conf /etc/apache2/sites-available/000-default.conf

# Installa le dipendenze aggiuntive e abilita mod_rewrite
RUN apt-get update \
    && apt-get install -y libzip-dev zip unzip \
    && docker-php-ext-install pdo_mysql zip \
    && a2enmod rewrite

# Avvia Apache al momento del container
CMD ["apache2-foreground"]
