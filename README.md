Depot -- app

> robust application!

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
    - super user => 1
    - admin      => 2
    - caissier   => 3
    - employee   => 5

