# Geekpicker-p2p-wallet

Geekpicker-p2p-wallet is an awesome interview task of Geekpicker.

## Description

The task is developed by Laravel. Laravel Repository Pattern is used for development. Laravel Passport is used for API authentication. Frontend is developed by simply Laravel Blade. The API of https://currencylayer.com is used for currency conversion. In development, SOLID design principles are fully followed for coding. The task has PHPUnit test case with full coverage.

### Features

#### Web interface
- Most Conversion
- Transaction info for a particular user
- All Transaction History

#### Restfull API list
- POST login (Parameters: email, password)
Authenticated APIs:
- GET user-profile
- GET user-transaction-info
- GET user-transaction-history
- POST send-money (Parameters: receiver_id, amount)
- POST logout
