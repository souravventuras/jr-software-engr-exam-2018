
## Deployment Process

After cloning the repository, if Composer is installed globally, run

```bash
composer update
```

Create database and named it my_app_db

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


