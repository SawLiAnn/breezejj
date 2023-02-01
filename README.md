
`composer install`
`cp .env.example .env`
`php artisan key:generate`
Set your database credentials in `.env` file
`php artisan migrate:fresh --seed`
 `php artisan serve`
 Visit `localhost:8000/login` in your browser
 Choose `email` from `users` table, password is `password`
