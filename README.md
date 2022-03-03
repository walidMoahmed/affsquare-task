you must follow this instructions to run the project
    1 - git clone 'https://github.com/walidMoahmed/affsquare-task'
    2- create database 
    3- change database config in file .env 
        like this 
            DB_CONNECTION=mysql
            DB_HOST=127.0.0.1
            DB_PORT=3306
            DB_DATABASE=affsquare_task
            DB_USERNAME=root
            DB_PASSWORD=
    4- run this command lines
        1- composer update
        2- php artisan migrate
        3- php artisan db:seed --class=PermissionTableSeeder
        4- php artisan db:seed --class=CreateAdminUserSeeder
        5- php artisan serve
    5- open local link and login
        email: admin@affsquare.com
        password: 1234567890
    6- if you need add new employee 
        1- you must create a new role and select permissions for this role
        2- add the employee
    
