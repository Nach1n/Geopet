# Instalar template AdminLTE
- cd geopet/public
- bower install admin-lte

# Instalación con datos de prueba
- Configurar .env
- Instalar template AdminLTE
- composer install
- php artisan migrate 
- php artisan db:seed
- php artisan serve
- php artisan migrate:refresh --seed

