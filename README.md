HOW TO SETUP THE PROJECT

git clone https://github.com/soumikanungo/laravel_booking.git

cd laravel_booking

cp .env.example .env

open .env and update DB_DATABASE (database details)

run : composer install or composer update

run : php artisan key:generate

run : php artisan migrate:fresh --seed

run : php artisan serve

Best of luck
