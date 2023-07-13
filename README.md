# Webflix

Voici le projet laraval

## Installation

La première étape du projet pour travailler dessus, c'est de cloner le dépôt

```bash
    git clone https://github.com/YanDann/webflix.git
```

Il faut installer les dépendances :

```bash
    composer install
```

Il faut ensuite le fichier `.env.exemple` :

```bash
    php -r "file_exists('.env') || copy('.env.example', '.env');"
```

Il faut générer une clé pour l'application laravel
 
```bash
    php artisan key:generate
```


