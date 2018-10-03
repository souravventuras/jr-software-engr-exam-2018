# Jr. Software Engineer Exam-2018


## How to Install

Run the following commands in composer: 

```
# git clone https://github.com/iarafat/jr-software-engr-exam-2018.git

# composer install

# php -r "file_exists('.env') || copy('.env.example', '.env');"

# vi .env
```

Put the configuration value based on your environment. And finally:

```
# composer dump-autoload

# php artisan key:generate

# php artisan migrate --seed

```
