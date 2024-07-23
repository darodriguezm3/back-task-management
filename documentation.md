# Documentación de la Aplicación

## Descripción General

Esta aplicación es una plataforma de gestión de tareas que permite a los usuarios registrarse, iniciar sesión y gestionar sus tareas. La aplicación está construida utilizando el framework Laravel para el backend y React para el frontend.

## Funcionalidades

### Autenticación

- **Registro de Usuarios**: Los usuarios pueden registrarse proporcionando un nombre, correo electrónico y contraseña.
- **Inicio de Sesión**: Los usuarios pueden iniciar sesión con su correo electrónico y contraseña.
- **Cierre de Sesión**: Los usuarios pueden cerrar sesión.

### Gestión de Tareas

- **Crear Tareas**: Los usuarios pueden crear nuevas tareas.
- **Ver Tareas**: Los usuarios pueden ver una lista de sus tareas.
- **Actualizar Tareas**: Los usuarios pueden actualizar las tareas existentes.
- **Eliminar Tareas**: Los usuarios pueden eliminar tareas.
- **Paginación**: La lista de tareas soporta paginación.
- **Filtros**: Los usuarios pueden filtrar las tareas por estado y prioridad.

## Estructura del Proyecto

- **app/Http/Controllers**: Controladores de la aplicación.
- **app/Models**: Modelos de la aplicación.
- **database/migrations**: Archivos de migración para crear las tablas de la base de datos.
- **routes/web.php**: Definición de rutas web.

## Requisitos del Sistema

- PHP 7.4 o superior
- Composer
- MySQL
- Un servidor web (Apache o Nginx)

## Endpoints de la API

### Autenticación

- **POST /api/register**: Registro de usuarios.
- **POST /api/login**: Inicio de sesión de usuarios.
- **POST /api/logout**: Cierre de sesión de usuarios.

### Tareas

- **GET /api/tasks**: Listar tareas (soporta paginación y filtros).
- **POST /api/tasks**: Crear una nueva tarea.
- **GET /api/tasks/{id}**: Obtener una tarea específica.
- **PUT /api/tasks/{id}**: Actualizar una tarea.
- **DELETE /api/tasks/{id}**: Eliminar una tarea.
