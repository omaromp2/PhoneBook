<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>


## About PhoneBook

This is an example App builded with Laravel Breeze and Inertia. 

## Install 

- Dependecies
 1. PHP 8 or higher
 2. Composer 
 3. MySql 

 - Local install 
 1. git clone 
 2. cd into project
 3. composer install 
 4. php artisan migrate 
 5. (optional) php artisan db:seed  

 - Using Sail or Docker 
 1. git clone 
 2. `cd` into project 
 3. Execute the current snipet. 
    ```
    docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php80-composer:latest \
    composer install --ignore-platform-reqs
    ```

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
