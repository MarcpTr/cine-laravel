# cine-laravel

## Reproductor de películas desde Google Drive


Plataforma web para ver las películas guardadas en Google drive de forma intuitiva y ordenada.
## Características

- Visualiza películas clásicas libres de derechos de autor accesibles a todos
- Importa tus carpetas de drive con películas para acceder a ellas en un entorno intuitivo
- Navega por ellas ordenadas por categorías
- Visualiza información como tráiler, actores, sinopsis...

## Tecnologias
- html5
- css
- JavaScript
- PHP
- Laravel
- MySQL

## Instrucciones
```sh
- composer global require laravel/installer
- composer install
- php artisan serve 
- php artisan key:generate
- php artisan make:migration create_user_table
- php artisan migrate
```


Modificar el fichero .env para apuntar a la base de datos
```sh
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=CloudPlayer
DB_USERNAME=root
DB_PASSWORD=
```

Para producción

APP_ENV=production
APP_DEBUG=false
```
