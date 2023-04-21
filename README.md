# laravel-api

This is my minimal pack to start a Laravel API project.
It's the Laravel latest version at the time of repository creation (April, 2023), with the following changes:
- Added [Breeze](https://laravel.com/docs/10.x/starter-kits) with the api setting option and Pest test package;
- Changed the settings to support a SPA front-end.

* Note that this API scaffold is intended to work with a SPA front-end; I recommend a Vite/Vue application.
Please, refer to [vue-spa](https://github.com/regesmendes/vue-spa) for more details.

## Project Setup

Clone the project and get into the project's folder

### Install dependencies

Run the following command to install all composer packages and prepare .env file:

```sh
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php82-composer:latest \
    composer install --ignore-platform-reqs
```

```sh
cp .env.example .env
```

### Bring the server up

```sh
./vendor/bin/sail up -d
```

### Migrate the Database

```sh
./vendor/bin/sail artisan migrate:fresh
```

### Generate the App key

```sh
./vendor/bin/sail artisan key:generate
```

### Run the tests

```sh
./vendor/bin/sail pest
```

### Contact
Feel free to get in touch for comments, suggestions or questions.
