# Geekpicker-p2p-wallet

Geekpicker-p2p-wallet is an awesome task for Geekpicker interview.

## Description

The task is developed by Laravel. Laravel Repository Pattern is used for development. Laravel Passport is used for API authentication. Frontend is developed by simply Laravel Blade. The API of https://currencylayer.com is used for currency conversion. In development, SOLID design principles are fully followed for coding. The task has PHPUnit test case with full coverage.

There are a web interface in the task which has:
- Most Conversion
- Transaction info for a particular user
- All Transaction History

The task has also a Restfull API set. API list:
- POST login (Parameters: email, password)
Authenticated APIs:
- GET user-profile
- GET user-transaction-info
- GET user-transaction-history
- POST send-money (Parameters: receiver_id, amount)
- POST logout
