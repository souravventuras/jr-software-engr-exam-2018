# jr-software-engr-exam-2018

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
- `php artisan db:seed` may be take some times. because, it's generates so many data.

Then hit `http://localhost:8000` on your browser.

## Documentation
This Branch is all about *Task B* **DB seed**.

I have maintanied relationships when seeding.

- `“developer” has many “programming_languages” and ”languages”`.
- `“programming_language” and “languages” also has_many “developers”`.

## Route
``                   List of developers:        http://localhost:8000/developers


         List of language by developer id:      http://localhost:8000/developers/language/1
         

 List of programming language by developer id:  http://localhost:8000/developers/programming_language/1
 


                    List of language:           http://localhost:8000/languages

                    
    List of developers by language id:          http://localhost:8000/languages/1
    

        List of programming language:           http://localhost:8000/programming_languages
        

 List of developers by programming language id: http://localhost:8000/programming_languages/1


``




## Description
Task B, I have covered possible all of the requirement that you have provided.

**I have used**

- *laravel 5.6* latest version.
- Implemented some migration flow with relationships.

> Some Others *React.js* & *Redux* related crafting, please visit [React.js & Redux demo](https://ikram-ud-daula.herokuapp.com/)





Sincerely,

Ikram – Ud – Daula



