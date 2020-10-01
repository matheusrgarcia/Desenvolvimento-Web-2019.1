# Desenvolvimento-Web-2019.1
Repositório referente a disciplina Desenvolvimento Web 2019.1

This is a sample app for the API of Nuvem Shop / Tienda Nube using the official SDK for PHP.

This app was made using Laravel. Be sure to check their documentation.

Installation
First, you will need to install Composer following the instructions on their site.

Then, simply run the following command:

composer create-project tiendanube/sample-php-app sample-app --prefer-dist
Alternatively, you may download the contents of this repository and run composer install from your project's root directory.

Configuration
Make sure to define your database connection in app/config/database.php, then run the provided migration:

php artisan migrate
Then add your app_id and app_secret to app/config/tiendanube.php. You might also want to change the auth filter in app/filters.php to use the login URL in Spanish or Portuguese.

Now you can test your app! Just set your redirect_uri to http://localhost:8000/auth and run a PHP server:

php artisan serve
When you visit http://localhost:8000 you will be taken to Tienda Nube/Nuvem Shop's login page. Log into your store and you will be prompted to install your app. Install it and the provided auth route will take care of obtaining and storing an access token.