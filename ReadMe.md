# Blog Test Rev

Ce projet est un exemple de blog. Voici comment l’installer et le lancer sur votre machine locale.

## Prérequis

- PHP 8.1 ou supérieur
- Composer
- Symfony CLI (optionnel mais recommandé)
- Base de données (MySQL, PostgreSQL, SQLite, etc.)

## Installation

1. Clonez le dépôt :

   ```bash
   git clone <url-du-repo>
   cd blog-test-rev
   ```

2. Installez les dépendances avec Composer :

3. ```bash

   composer install

   ```

4. Configurez votre base de données dans le fichier `.env` ou `.env.local` :

   ```dotenv
   DATABASE_URL=mysql://user:password@localhost:3306/db_name
   ```

5. Créez la base de données :

   ```bash
   php bin/console doctrine:database:create
   ```

6. Effectuer les migrations pour créer les tables nécessaires :

   ```bash
   php bin/console make:migration
   ```

   php bin/console doctrine:migrations:migrate

   Si vous n'avez pas de migrations, vous pouvez mettre à jour le schéma directement :

7. ```bash

   php bin/console doctrine:schema:update --force
   ```

8. Chargez les fixtures pour créer des données de test :

   ```bash
    php bin/console doctrine:fixtures:load
   ```

9. Si vous utilisez des migrations, exécutez-les :

   ```bash
    php bin/console doctrine:migrations:migrate
   ```

## Lancer l'application

symfony serve

```bash
symfony serve
```

L'application sera accessible à l'adresse [http://localhost:8000](http://localhost:8000).
