Restaurant Order Export Demo
===============

- Small business use case  
- Doctrine ORM 
- Test Driven Development

## Installation

```bash
$ composer install
```

## Setup

Create DB

```bash
$ php bin/doctrine orm:schema-tool:create
```

## Demo

### Execute each command, in sequence

```bash
$ php bin/restaurant-cli view-orders
$ php bin/restaurant-cli create-customers
$ php bin/restaurant-cli create-menu
$ php bin/restaurant-cli view-menu
$ php bin/restaurant-cli place-orders
$ php bin/restaurant-cli view-orders
$ php bin/restaurant-cli export-orders-xml
```
### Run Tests

```bash
$ ./vendor/phpunit/phpunit/phpunit --configuration phpunit-config.xml --testsuite InputValidation
```

## Credentials

Source repository: https://github.com/RentecWarren/restaurant