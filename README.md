# Pkgs :package:

Quickly track the status of your packages using a tracking number with Pkgs (Powered by [Ship24](https://www.ship24.com/)).

## Usage

You may use the following credentials to log in and test the app:

```txt
guest@pkgs.test
password
```

Once logged in, enter a tracking number into the "Track Shipment" field to retrieve the current status of a package. Don't have a package to track? Try [one of these](https://files.ship24.com/docs/s24-tracking-numbers-sample.txt) sample tracking numbers.

## Try It Out

This demo project uses Laravel Breeze + Inertia + Vue. Once installed, visit the app in your browser at [http://localhost:8080](http://localhost:8080).

### Prerequisites

- `PHP 8.1`
- [Composer](https://getcomposer.org/download/) and [NPM](https://github.com/npm/cli) to manage dependencies
- An API key for Ship24's [Tracking and Webhooks API](https://docs.ship24.com/)

### Getting Started

After cloning this repository locally,

1. Install the project's dependencies:

```sh
  composer install
  npm install
```

2. Make a copy of the example `.env` files and generate an app key:

```sh
  cp .env.example .env
  php artisan key:generate
```

3. Create a new database for your project and update your `.env` file to match your local settings:

  ```env
    APP_URL=

    # Database
    DB_DATABASE=
    DB_USERNAME=
    DB_PASSWORD=

    # Ship24
    SHIP24_API_KEY=
  ```

4. Run database migrations and seed data:

```sh
  php artisan migrate --seed
```

5. Build the project's assets:

```sh
  npm run build
```

6. Configure a web server, such as the built-in PHP web server, to use the public directory as the document root:

```sh
  php -S localhost:8080 -t public
```

## Contributing

Looking to contribute to this project? Check out [contributing.md](CONTRIBUTING.md) to learn how.
