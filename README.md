# Plannthat

This repo is a facebook authentication demo using Laravel 5.8 as the backend framework and SQLite as its database. Using ngrok to serve it online.

## Run your local instance

* Install required prerequisites
    * PHP 7.2
    * Composer 1.10.1
    * Ngrok
    * Node and NPM

* Cloning the repo

    ```bash
    $ git clone git@github.com:lukaserat/laravel5.8-facebook-auth.git plannthat

    $ cd plannthat
    ```

* Install App Dependencies

    * Install frontend dependencies

        ```bash
        $ npm install
        $ npm run production
        ```

    * Install backend dependencies

        ```bash
        $ composer install
        ```

* Do Migration

    ```bash
    $ touch database/database.sqlite
    $ php artisan migrate
    ```
    
* Setup Environment file

    ```bash
    $ cp .env.example .env
    ```
    *Update required environment variables after you setup your ngrok and facebook app*

* Run your local instance

    ```bash
    $ php artisan serve
    ```

## Setup ngrok

For us to be able to comply with FB App security policy, we need to establish our app online. We will be using ngrok to serve our local instance.

See [ngrok](https://ngrok.com/docs) for documentation

Basically here are the steps:

* Register/Login to [ngrok](https://ngrok.com)
* Locally run the app
    ```bash
    $  php artisan serve
    ```
* Connect your account
    ```bash
    $  ngrok authtoken your_ngrok_token
    ```
* Start ngrok to tunnel your local instance
    ```bash
    $ ngrok http your_app_port
    ```

Once you have successfully serve your local instance online, update your Facebook App's url.

## Create Facebook App

See this [link](https://www.codexworld.com/create-facebook-app-id-app-secret/) to know how to create your own Facebook App.

Important things about setting up your facebook app.

* Privacy Policy URL = <your_ngrok_url>/privacy-policy *example: https://164b5ddf.ngrok.io/privacy-policy*
* App Domains = <your_ngrok_domain> *example: 164b5ddf.ngrok.io*
* Contact Email = <your_email>
* Product = Add "Facebook Login"

Facebook Login required settings:

* Valid OAuth Redirect URIs = <your_ngrok_url>/facebook/success *example: https://164b5ddf.ngrok.io/privacy-policy/facebook/success*

## Needed Environment Variables

* APP_DOMAIN
* APP_EMAIL
* FB_CLIENT_ID
* FB_CLIENT_SECRET
* FB_URL
