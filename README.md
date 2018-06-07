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
# Registro de actualizaciones
## 0.1 - 23-05-2018
Utiliza el template [AdminLTE](https://github.com/almasaeed2010/AdminLTE)

**Agregado**
- Login básico.

## 0.2 - 24-05-2018

**Agregado**
- Datos de ejemplo en vista adminHome y clientHome.
- Cantidad de usuarios totales y últimos usuarios registrados (view: adminHome).

**Modificado**
- Al eliminar usuario, elimina su avatar.
- Prepara el HomeController@index para dos vistas, admin y cliente.

**Eliminado**
- Datos de ejemplo que estaban en web.php (archivo de rutas).

## 0.3 - 03-06-2018
**Agregado**
- Notificaciones masivas del admin hacia los clientes.

**Modificado**
- Tabla ViewUsers.index ordenada de manera descendente.
- Se corrige un dropdown-item que no se adaptaba a la vista mobile.
- DataTables responsive.

## 0.4 - 06-06-2018
**Agregado**
- Vistas y controladores (FrontController) para recibir a los visitantes **(incompleto)**.
- Modelo (Option), Vista y controlador (AppOptionsController) para modificar datos de la aplicación como nombre, email, datos de contacto, entre otros.
**Modificado**
- package.json que generaba conflictos al hacer una instalación desde cero.
- InitialConfigurationSeeder, agrega datos de ejemplo de la app nombre, email, datos de contacto, entre otros.

