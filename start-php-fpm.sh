#!/usr/bin/env bash
# Iniciar PHP-FPM con la configuración especificada
exec /usr/sbin/php-fpm8.1 -F --fpm-config /etc/php/8.1/fpm/php-fpm.conf
