# Geekpicker-p2p-wallet

Geekpicker-p2p-wallet is an awesome interview task of Geekpicker.

## Description

The task is developed by Laravel 9. Laravel Repository Pattern is used for development. Laravel Passport is used for API authentication. Frontend is developed by simply Laravel Blade. The API of https://currencylayer.com is used for currency conversion. In development, SOLID design principles are fully followed for coding. The task has PHPUnit test case with full coverage.

**The task features:**

##### Web interface
- Most Conversion
- Transaction info for a particular user
- All Transaction History

##### Restful API list
- POST login (Parameters: email, password)
- Authenticated APIs:
  - GET user-profile
  - GET user-transaction-info
  - GET user-transaction-history
  - POST send-money (Parameters: receiver_id, amount)
  - POST logout

### Task Scenario

There are two registered users with a single currency based wallet. User A has a USD and user B has a EUR wallet. User A can send any amount of money to user B in USD currency. This USD amount will be converted to EUR and transferred to user B wallet. In the meantime, a confirmation email will be sent to user B.

## Technical Requirements

- PHP 8.0 or higher
- Composer installed

## Installation

- First clone this Repo
- Go to project directory
- Run composer `composer install`
- Copy env file `cp .env.example .env`
- Generate laravel key `php artisan key:generate`
- Configure database and mail in .env file
- Set API key of currencylayer.com as CURRENCY_CONVERSION_API_KEY in .env file
- Run migrate with seeder `php artisan migrate:fresh --seed`
- Install passport `php artisan passport:install`
- Project run `php artisan serve`
- Project test `php artisan test`

## Postman API Testing

You can test APIs by the following Postman Collection. Just imposrt and set variables:
- url: API base url
- token: Generate token by login request
``
https://www.getpostman.com/collections/f3c8b4d9fa32400d7304
``
