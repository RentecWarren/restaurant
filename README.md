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
$ php bin/restaurant-cli app:final-order
$ php bin/restaurant-cli app:create-customers
$ php bin/restaurant-cli app:view-menu
$ php bin/restaurant-cli app:place-orders
$ php bin/restaurant-cli app:final-order
$ php bin/restaurant-cli app:export-order-xml
```
### Run Tests

```bash
$ php bin/restaurant-cli app:final-order
```

## Credentials

Source repository: https://github.com/RentecWarren/restaurant