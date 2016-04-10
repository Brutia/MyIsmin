# MyISMIN

Sur cette branche se trouve le developpement d'une version dynamique de MyIsmin.
Elle vise à rendre plus aisée l'utilisation de MyIsmin, et ajouter des fonctionnalités.

Ce site à été réalisé avec le framework php [Laravel](https://laravel.com), à partir du design original hébergé ici: https://github.com/Minitel-Ismin/MyIsmin

### Commandes de base Laravel
Laravel utilise le gestionnaire de dépendances Composer (https://getcomposer.org/).

Si vous utilisez un serveur de type LAMP ou WAMP: placez les fichiers dans www/MyIsmin

Pour installer l'application, lancer la commande suivante: `composer update` dans www/MyIsmin. Puis aller sur http://127.0.0.1/MyIsmin/public 

Pour configurer la connection à la base de donnée, éditer le fichier dans le fichier .env .

Pour installer les différentes tables dans la base de donnée, lancer la commande suivante : `php artisan migrate`

Pour tout complément sur le framework, consulter la documentation en ligne (très bien faite) [Laravel website](http://laravel.com/docs)

## Contact

Le site a été réalisé principalement par :
* [Thomas TROUCHKINE](https://github.com/Kerzas)  ( thomas.trouchkine@gmail.com )
* [Mathieu ROUSSE](https://github.com/m-rousse)  ( mathieu@rousse.me )
* [Guillaume ANDRES](https://github.com/Brutia) (guillaume.andres@yahoo.fr)

N'hésitez pas à nous contacter pour toutes remarques ou questions !
