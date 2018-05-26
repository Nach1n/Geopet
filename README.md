# Instalar template AdminLTE
- cd geopet/public
- bower install admin-lte

# Instalación con datos de prueba
- Configurar .env
- Instalar template AdminLTE
- composer install
- php artisan migrate 
- php artisan db:seed

- php artisan migrate:refresh --seed
# Registro de actualizaciones
## 0.1
Utiliza el template [AdminLTE](https://github.com/almasaeed2010/AdminLTE)

**Agregado**
- Login basico.

## 0.2

**Agregado**
- Datos de ejemplo en vista adminHome y clientHome.
- Cantidad de usuarios totales y últimos usuarios registrados (adminHome).

**Modificado**
- Al eliminar usuario, elimina su avatar.
- Separa el home en dos vistas admin y cliente.

**Eliminado**
- Datos de ejemplo que estaban en web.php (archivo de rutas).
