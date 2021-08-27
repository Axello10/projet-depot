# Depot App

## Description
---
 une application web qui permet de gerer une affaire de depots, les entreer, les sorties, les employees, factures, etc...


## Fonctionnement
---

- ### Roles

    - super user => 1   (a tout les droits!)
    - admin      => 2   (voir tout, tout creer(sauf un utilisateur), mettre a jour et supprimer c'est qui l'ajouter)
    - caissier   => 3   (peut creer, mettre a jour, voir, supprimer c'est qui l'a ajouter)
    - employee   => 4   (aucun droit sur le system!)

- ### Autorisation

    - les autorisations des utilisateurs sont differents selon leurs roles dans le systeme. 
    - on verifie les droits de l'utilisateur connecté.
    - on verifie dans les liens.
    - on verifie avant chaque operation.
    - on verifie dans les controlleur et les moteurs de templates.

- ### Authentification

    - pour utilise le systeme vous devez etres connecté!
    - pour ce il faut un compte relié a ce system
    - une fois connecté on verifie vos autorisation.

fournisseurs

1 => depot principale
2 => depot simple
3 => depot ou source externe


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




