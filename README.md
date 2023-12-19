# Movies-R-Us


## Overview
This is a simple movie database application built with Laravel 10, Vue3 and Inertia.

It shows a list of movies on the home page with a preview of a few reviews. Users can click through to read all reviews for a given movie.

Authenticated users can add new movies and reviews. They can also edit and delete movies they created.

## Demo

Demo site: https://movies-r-us.formula23.com/

Login: admin@moviesrus.com

Password: password

## Installation

Create your .env file

    $ mv .env.example .env

Install Composer dependencies. The database will be migrated after dependencies are installed.

    $ composer install 

Install Node dependencies

    $ npm install

Migrate the database (This might have already been done when Composer dependencies were installed)

    $ php artisan migrate

Populate the database with seed data. This will create a user allowing you to login to the application

    $ php artisan db:seed

Compile the CSS and JS files for development

    $ npm run dev

Start the local development server

    $ php artisan serve

You can now access the server at http://localhost:8000
