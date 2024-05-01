Restaurant Order Demo
===============

Three musicians walk into a bar...that serves food. They checkout the menu and decide what they want to eat. Then they get an itemized bill with the total.

This is a simple demonstration of using Doctrine ORM for a small business use case. The demo includes it's own Sqlite database. An XML export for consumption by a POS system, along with unit tests, are the next planned enhancements.  

## Installation

Clone:
```bash
git clone https://github.com/RentecWarren/restaurant.git
```

cd into directory:
```bash
cd restaurant
```

Install:
```bash
composer install
```

Create DB
```bash
php bin/doctrine orm:schema-tool:create
```

## Demo

### Execute each command, in sequence

```bash
php bin/restaurant-cli create-customers
php bin/restaurant-cli create-menu 
php bin/restaurant-cli place-orders
```

## Credentials
Source repository: https://github.com/RentecWarren/restaurant

## Disclaimer
This demo was written with HUMAN intelligence. Have a great day!