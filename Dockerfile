FROM ubuntu:22.04

# Establecer el entorno no interactivo para evitar interrupciones
ENV DEBIAN_FRONTEND=noninteractive

# Actualizar repositorios e instalar dependencias necesarias
RUN apt-get update && apt-get install -y --no-install-recommends \
    nginx \
    mysql-client \
    git \
    unzip \
    wget \
    php8.1-fpm php8.1-cli php8.1-curl php8.1-gd php8.1-mysql \
    php8.1-zip php8.1-mbstring php8.1-soap php8.1-xml php8.1-intl \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Configuración inicial de Nginx y PHP-FPM
RUN mkdir -p /var/www/html /etc/www-local-config \
    && if ! grep -qxF 'daemon off;' /etc/nginx/nginx.conf; then echo "daemon off;" >> /etc/nginx/nginx.conf; fi

# Copiar los scripts de inicio
ADD start-nginx.sh /usr/local/bin/start-nginx
ADD start-php-fpm.sh /usr/local/bin/start-php-fpm
RUN chmod +x /usr/local/bin/start-nginx /usr/local/bin/start-php-fpm

# Configurar volúmenes para archivos locales
VOLUME ["/etc/www-local-config", "/var/www/html"]

# Exponer el puerto 80
EXPOSE 80

# Ejecutar Nginx y PHP-FPM en paralelo
CMD ["/bin/bash", "-c", "start-nginx & start-php-fpm & tail -f /var/log/nginx/access.log"]
