
## Follow the instruction to run this project properly

- After Cloning or Download the project run "composer update"
- Rename the .env.example to .env
- Add the Database and it's credentials into .env file
- Generate Laravel Application Key using "php artisan key:generate" command 

## Migration && Seeding
- Run "php artisan migrate" command in Terminal/Console to migrate the database
- Run "php artisan db:seed" command to seed the data

## Search Function
- Run the project using "php artisan serve" and open the browser with (http://localhost:8000/)
- There will be a table full with data of developers and A search option with an input field where 
  you can write the programming language or language and two dropdown/select field from where you can select programming language or language.
  Enter/click Search button to see the developers who can Write programming language or Speaking Language 

## API Function
- Browse (http://localhost:8000/api/developer/{id}/{page?}) for getting a developer’s detail
	i) 'id' is the developer id 
	ii) page is optional. Page number is used so that if developer has more than 10 Programming language or Language then it will paginate the data 

## Testing 
- For api test
	* Open the Terminal, copy this and paste in Terminal "./vendor/bin/phpunit tests/Feature/ApiTest.php" 
- For Searching Unit test
	* Open the Terminal, copy this and paste in Terminal "./vendor/bin/phpunit tests/Unit/SearchTest.php"

``` Database Config
# Add Database Credential in .env file
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your database name
DB_USERNAME=database username
DB_PASSWORD=database password
```

``` bash
# install dependencies
composer update

# Generate Key
php artisan key:generate

# Migrate Database 
php artisan migrate 

# Seeding Database 
php artisan db:seed

# serve with hot reload at localhost:8000
php artisan serve

# Test API
./vendor/bin/phpunit tests/Feature/ApiTest.php

# Test Search Class
./vendor/bin/phpunit tests/Unit/SearchTest.php
```