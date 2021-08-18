Depot -- app

> let's build it!

## installation

### 1. creer la base de donnée
 utiliser phpmyadmin et creer une base de donnée appeler depot

### 2. creer les tables
```
php artisan migrate
```
### 3. preremplir la base de donnée
```
php artisan db:seed
```
### 4. demarrer le serveur
```
php artisan serve
```
### roles
    - super user => 1   (a tout les droits!)
    - admin      => 2   (voir tout, tout creer, mettre a jour et supprimer c'est qui l'ajouter)
    - caissier   => 3   (peut creer, mettre a jour, voir, supprimer c'est qui l'a ajouter)


    - employee   => 4

