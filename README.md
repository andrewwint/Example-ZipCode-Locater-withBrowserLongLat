# Travel Agent Management Tool
 using Laravel 5.4 and Vue.js 2.0 for managing Approved Travel Agents accross JTB's websites. As well as provide access to the Travel Agent to customize their profiles.

## Getting Started

### Requirements
* Php 5.6 or greater
* MySQL
* Node.js
* Composer - PHP Package Manager
* Maatwebsite/Laravel-Excel Excel importing - https://github.com/Maatwebsite/Laravel-Excel


Once you have cloned the application `cd` to `Project` and run the following commands.
```comandline
composer update
```

Install the application dependencies using composer

```
composer install
```

Update autoloader if needed

```
composer dump-autoload
```

Configure your database connection in the `.env` file

## Install SQL Tables and Data
Migrate database tables and seed the database with defaults and users to login

```
php artisan migrate:refresh --seed
```

## Google reCAPTCHA
Jamaica Tourist Board - Travel Agent Look UP
https://www.google.com/recaptcha/admin#site/338232345?setup

Paste this snippet before the closing </head> tag on your HTML template:

```<script src='https://www.google.com/recaptcha/api.js'></script>
```
Paste this snippet at the end of the <form> where you want the reCAPTCHA widget to appear:

```
<div class="g-recaptcha" data-sitekey="6LcZBCkUAAAAABLXEQjHDG_74cq2h5vjfaA43dKW"></div>
```

## Launching Application - localhost
Running the at `http://127.0.0.1:8000`

```
php artisan serve
Laravel development server started: <http://127.0.0.1:8000>
```

## Unit Tests
Requires PHPUnit to be installed or it can be loaded using composer and used locally

Global Comandline

```
phpunit
```

Local Comandline

```
./vendor/bin/phpunit
```
