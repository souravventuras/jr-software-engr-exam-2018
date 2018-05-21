# Laravel-React Test Project with Redux
> Ikram - Ud - Daula

> Software Developer


## Installtion
- Download the resoueces
- Open command prompt and navigate the project root in your command prompt
- Make sure composer install on your pc by using command on your prompt
```
composer -v
```
- Run the command on your prompt
```
composer install
npm install
```
- Create a Database on your local server and configure database & credential in **.env** file.
```
DB_DATABASE=(your database name)
DB_USERNAME=(server username)
DB_PASSWORD=(server password. if you have)
```
- Run the command on your prompt
```
php artisan migrate
php artisan db:seed
php artisan serve
```
Then hit `http://localhost:8000` on your browser.

## Documentation
- not completed

- developer search complete but other data render not completed.


## Description


**I have used**

- *laravel 5.6* latest version.
- Implemented some migration flow with relationships.
- DB seeding for some dummy post category.
- Provides an API endpoint.
- *Bootstrap 4* with customization
- *Redux* part took some time from me. I am not using Redux repository from Git which is they recommended. But I implemented a complete store for this test project with filtering, sorting, and sort between date which are not visualize but functionaly implementated. You may check the resources.
```
resources\assets\js 
                   \actions
                   \reducers
                   \selectors
                   \store
```
- This implementation of *Redux* is self-created using `redux` and `react-redux` node module.
> Some Others *React.js* & *Redux* related crafting, please visit [React.js & Redux demo](https://ikram-ud-daula.herokuapp.com/)



Sincerely,

Ikram – Ud – Daula



