#!/usr/bin/env bash

# Instalar dependencias de Composer
echo "Running composer..."
composer global require hirak/prestissimo
composer install --no-dev --working-dir=/var/www/html

# Generar clave de aplicación
echo "Generating application key..."
php artisan key:generate --show

# Cachear configuración
echo "Caching config..."
php artisan config:cache

# Cachear rutas
echo "Caching routes..."
php artisan route:cache

# Ejecutar migraciones
echo "Running migrations..."
php artisan migrate --force

#Ponemos datos de prueba
echo "Seeding the database..."
php artisan db:seed

# Aquí comienzan los pasos específicos de Vite
echo "Installing Node.js dependencies..."
npm install

echo "Building front-end assets with Vite..."
npm run build

# Continúa con cualquier otro paso necesario para tu despliegue
