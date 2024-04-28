Savvior Demo - Command Line Restaurant 
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
$ php bin/restaurant-cli final-order
$ php bin/restaurant-cli create-customers
$ php bin/restaurant-cli view-menu
$ php bin/restaurant-cli place-orders
$ php bin/restaurant-cli final-order
$ php bin/restaurant-cli export-order-xml
```
### Run Tests

```bash
$ php bin/restaurant-cli app:final-order
```

## Credentials

Source repository: https://github.com/RentecWarren/restaurant