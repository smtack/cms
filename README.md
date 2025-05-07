# CMS

## About?

This is a simple and customisable CMS developed with CodeIgniter.

## Setup

1. Create a database

2. Copy `env` to `.env` and tailor for your app, specifically the baseURL
and any database settings.

2. Run `composer install`

4. Then run `php spark migrate` and then `php spark db:seed AdminSeeder` to
create the admin user.

## Server Requirements

PHP version 8.1 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php) if you plan to use MySQL
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library
