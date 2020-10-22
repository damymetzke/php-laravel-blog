# PHP Laravel Blog
This is a generic project where I learn Laravel.
It is primarily meant to be shared with peers, but I put it under the MIT license just in case.
I make absolutely no promise for it to be optimal, reusable, secure or good code.

## Prerequisites
- [`PHP`](https://www.php.net/downloads)
- [`Node`/`NPM`](https://nodejs.org/en/download/)
- [`composer`](https://getcomposer.org/download/)
- [`XAMPP`](https://getcomposer.org/download/)
    - *Used for SQL database*
    - *To my knowledge `OS X` users generally use something different*

## Setup
```bash
# Make sure the working directory is in the root of the project
composer install
npm i

# Run to start local server
# make sure you have an SQL server running and inserted the correct credentials in .env:
php artisan serve
```

## Design
This simple blog uses an API first strategy.
All content is available through a REST api.
The REST API resides under `/api`.
The content is returned in JSON.
The actual web site is a way to view the data.
However, does not provide any extra content that the API besides `HTML`, `CSS`, and `JS`.
