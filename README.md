## Deployment Process

After cloning the repository, if Composer is installed globally, then goto to project folder and run the below command

```bash
composer update
```

Now create database in mysql and named it 'my_app_db'

For generating table using migrations go to project folder into /bin and open terminal/command promt and run following command

```bash
bin/cake migrations migrate
```

To seed database run the command

```bash
bin/cake migrations seed
```
To  run the application 

```bash
bin/cake server -p 8765
```

Then visit `http://localhost:8765

Result as a picture 

Then visit `http://localhost:8765

http://prntscr.com/kzgho9 --in general

http://prntscr.com/kzghzx --search with php result

http://prntscr.com/kzgiwb  -- search with english and php both

http://prntscr.com/kzgxd4 -api/json output
