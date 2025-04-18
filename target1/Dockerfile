FROM debian:bullseye

# Install packages with cleanup
RUN apt-get update && \
    apt-get install -y \
    apache2 \
    libapache2-mod-php \
    php \
    php-curl \
    php-mysqli \
    unzip \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Enable PHP and configure Apache/PHP for CTF
RUN a2enmod php7.4 && \
    sed -i 's/AllowOverride None/AllowOverride All/g' /etc/apache2/apache2.conf && \
    echo "ServerName localhost" >> /etc/apache2/apache2.conf && \
    echo "ServerTokens Prod" >> /etc/apache2/apache2.conf && \
    echo "ServerSignature Off" >> /etc/apache2/apache2.conf && \
    echo "display_errors = On" >> /etc/php/7.4/apache2/php.ini && \
    echo "allow_url_include = On" >> /etc/php/7.4/apache2/php.ini

# Copy website content
COPY website/ /var/www/html/

# Set permissions (intentionally vulnerable for CTF)
RUN chown -R www-data:www-data /var/www/html/ && \
    find /var/www/html/ -type d -exec chmod 755 {} \; && \
    find /var/www/html/ -type f -exec chmod 644 {} \; && \
    chmod 777 /var/www/html/backup.zip && \
    chmod +x /var/www/html/admin.php && \
    chmod 644 /var/www/html/secret/flag1.txt

# Health check
HEALTHCHECK --interval=30s --timeout=3s \
    CMD curl -f http://localhost/ || exit 1

EXPOSE 80

CMD ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]
