Run git clone https://github.com/your-username/yusafco-laravel.git.
cd into the new folder.
Copy .env.example to .env.
Fill in the .env file with your database credentials.
Run php artisan key:generate.
Run composer install to download all the PHP packages (vendor folder).
Run npm install to download all the JS packages (node_modules folder).
Run php artisan migrate --seed to set up the database.
Run php artisan storage:link.
Run npm run dev and php artisan serve.
