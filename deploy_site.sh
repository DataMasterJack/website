#!/bin/bash
set -e
# Copy website skeleton to /var/www/bookmemories
sudo mkdir -p /var/www/bookmemories
sudo cp -r ./site/* /var/www/bookmemories/
sudo chown -R www-data:www-data /var/www/bookmemories
# Put nginx config
sudo tee /etc/nginx/sites-available/bookmemories.conf > /dev/null <<'EOL'
server {
    listen 80;
    server_name example.com www.example.com; # REPLACE with your domain
    root /var/www/bookmemories;
    index index.html;

    location / {
        try_files $uri $uri/ =404;
    }

    location /.well-known/acme-challenge/ {
        root /var/www/letsencrypt;
    }

    access_log /var/log/nginx/bookmemories.access.log;
    error_log /var/log/nginx/bookmemories.error.log;
}

EOL
sudo ln -sf /etc/nginx/sites-available/bookmemories.conf /etc/nginx/sites-enabled/bookmemories.conf
sudo nginx -t
sudo systemctl reload nginx
echo "Deployed to /var/www/bookmemories and reloaded nginx. Now point DNS A record to the VPS IP and run: sudo certbot --nginx -d example.com -d www.example.com"
