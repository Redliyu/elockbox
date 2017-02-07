## Installation
1. download the repo and cd into it
2. `composer install`
3. rename file ".env.example" to ".env", and set up the db accordingly 
4. `php artisan key:generate`
5. `php artisan migrate`
6. `php artisan db:seed`
7. `php artisan serve`
8. if your localhost cannot handle request, please do 'chmod -R 777 Your/local/repository'
9. localhost/elockboxDEV/public/debug/create to create the first user
Note: this is the repo of elockbox, USC CSCI 577a F2016 Team 10.