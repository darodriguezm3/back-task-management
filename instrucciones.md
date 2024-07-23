
# Instrucciones para Ejecutar el Backend Localmente

## Requisitos del Sistema

- PHP 7.4 o superior
- Composer
- MySQL
- Un servidor web (Apache o Nginx)

## Pasos para Configurar y Ejecutar el Backend

### 1. Clonar el Proyecto

git clone <url-del-repositorio>
cd <nombre-del-repositorio>
2. Instalar Dependencias
composer install
3. Configurar el Archivo .env
Copia el archivo de ejemplo .env.example a .env y configura las variables de entorno.


cp .env.example .env
Configura las variables de conexión a la base de datos en el archivo .env:


DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nombre_de_tu_base_de_datos
DB_USERNAME=tu_usuario
DB_PASSWORD=tu_contraseña
4. Crear la Base de Datos
Abre MySQL (o MariaDB) y crea la base de datos que configuraste en el archivo .env.


CREATE DATABASE nombre_de_tu_base_de_datos;
5. Generar la Clave de la Aplicación

php artisan key:generate
6. Migrar la Base de Datos

php artisan migrate
7. Ejecutar el Servidor de Desarrollo

php artisan serve
Esto iniciará el servidor en http://127.0.0.1:8000.

8. Verificación
Abre tu navegador web y navega a http://127.0.0.1:8000 para verificar que tu aplicación Laravel esté funcionando correctamente.