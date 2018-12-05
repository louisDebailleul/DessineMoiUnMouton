pour lancer le projet 


lancer
 
 * composer install 
 * yarn install
 
  
Modifier 

.env 

ligne 18 paramètre de connection db 


Pour charger la base de donner:


* php bin/console doctrine:database:create
* php bin/console doctrine:migrations:migrate
* php bin/console doctrine:migrations:load

lancer le serveur 

* php bin\console server:run

Lancer compilateur sass et js

Ecrire le js et le sass que dans le dossier asset ;) 

* yarn encore dev --watch

