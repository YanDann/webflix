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
    npm install
```

Il faut ensuite le fichier `.env.exemple` :

```bash
    php -r "file_exists('.env') || copy('.env.example', '.env');"
```

Il faut générer une clé pour l'application laravel
 
```bash
    php artisan key:generate
```

N'oubliez pas la clé API dans le `.env` :

```bash
    THEMOVIEDB_API_KEY=???
```

Pour la base de données, on a les migrations :

```bash
    php artisan migrate
    # Pour remplir la base
    php artisan migrate:fresh --seed
```

Attention pour l'upload, modifiez le `.env`

```bash
    FILESYSTEM_DISK=public
```

## Workflow

Si vous travaillez sur le front, n'oubliez pas de lancer le serveur de dev :

```bash
    npm run dev
```

## Commandes utiles

Si on veut lister les routes de l'application :

```bash
    php artisan route:list
```

Pour remplir la BDD, on peut faire (test) :

```bash
    # Ajoute les données
    php artisan db:seed

    # Vide la base
    php artisan migrate:fresh --seed
```

## Ajouter React

On doit déjà installer le plugin et React

```bash
    npm install --save-dev @vitejs/plugin-react
    npm install --save-dev react react-dom
```

Ensuite, on modifie le fichier `vite.config.js`.
