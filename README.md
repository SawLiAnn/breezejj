
1. `composer install`
2. `cp .env.example .env`
3. `php artisan key:generate`
4. Set your database credentials in `.env` file
5. `php artisan migrate:fresh --seed`
6. `php artisan serve`
7. Visit `localhost:8000/login` in your browser
8. Choose `email` from `users` table, password is `password`
