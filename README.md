
## Deployment Process

If Composer is installed globally, run

```bash
composer update
```

In case you want to use a custom app dir name (e.g. `/myapp/`):

```bash
composer create-project --prefer-dist cakephp/app myapp
```

```bash
bin/cake server -p 8765
```

Then visit `http://localhost:8765


