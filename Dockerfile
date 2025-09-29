# Базовый образ PHP 8.2 + Apache
FROM php:8.2-apache

# Устанавливаем системные зависимости
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    && rm -rf /var/lib/apt/lists/*

# Включаем необходимые модули Apache
RUN a2enmod rewrite headers

# Устанавливаем PHP расширения (минимальный набор для веб-проекта)
RUN docker-php-ext-install pdo pdo_mysql

# Копируем файлы проекта в контейнер
COPY . /var/www/html/

# Устанавливаем права
RUN chown -R www-data:www-data /var/www/html

# Порт, который будет слушать Apache
EXPOSE 80

# Запуск Apache в foreground режиме
CMD ["apache2-foreground"]