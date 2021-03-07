# Swag Designer
For my final project at my first semester at Harvard I created a custom t-shirt generator that I can use as a Zazzle affiliate.  Zazzle is a website for ordering customized items with your own text or images.  The site was built with Laravel and MySQL. It demonstrate all 4 CRUD database interactions, pivot tables, migrations, seeders, blade templates, user logins and real-time rendering using the p5JS and jQuery libraries.

*Note: This app was created in 2017 and no longer maintained. It is for reference only.*


## Deployment Steps

    git clone git@github.com:jazmy/laravel-swagdesigner.git

Run 

    composer install

Copy .env.example

    cp .env.example .env
    
Update .env database connection string

    nano .env
    
Run 

    php artisan key:generate


Set Permissions

    chmod -R 775 storage
    chmod -R 775 bootstrap/cache
    chmod -R 775 storage/app

Run 

    php artisan migrate:refresh --seed


Run

    npm install

Run 

    php artisan storage:link 