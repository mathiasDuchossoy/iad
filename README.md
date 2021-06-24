### DESCRIPTION

Votre objectif sera de développer une API de gestion de prospect (langage et framework au choix).

Deux notions existent :

Un prospect est représenté par un email, un nom, un prénom, une adresse,
Un bien est représenté par un type (maison/appartement) et une adresse.


Un prospect peut proposer à la vente un ou plusieurs biens. Un bien ne peut être vendu que par un prospect.

Vous devrez proposer les routes API permettant de créer un bien associé à un prospect et récupérer la liste des biens par prospect.
Vous fournirez un zip avec le code associé et expliquerez les choix structurants effectués (librairies, composants, langage).

# Stock management of Santa Claus.

## Installation preview

https://getcomposer.org/download/

https://www.php.net/manual/fr/install.php


## Installation

Copy the the .env

```bash
$ cp .env.dist .env.local
```

Install the dependencies
```bash
$ composer install
```

Create and install the database.


The db will be create with sqlite (you have to enable the extension in php.ini) in the folder "var/data.db"
```bash
$ php bin/console doctrine:database:create
$ php bin/console doctrine:migrations:migrate
```

## Usage
You can use the symfony server to use the api:
```bash
$ symfony server:start
```


To create a user I had create a command:

```bash
$ php bin/console app:create-prospect iad@mail.com password
```

The doc api is on "/api/docs"

You will can test the api by this page.
