

dit clone https://github.com/nicolasdet/zend.git

cd zend

composer-update

docker-compose up -d

docker-compose run --rm zf php vendor/bin/doctrine-module orm:schema-tool:update




### Info Nicolas :

## ce qui est fait :


-- les routes, child route pour view, add, delete, update
car elle héritant toute de meetup. 

-- l'entity meetup qui accepte un dateTime avec son entityRespository

le respository qui prend les methode add, delete et create.  (update bientot)


-- le controller avec les actions ( crud Actions...)

-- le service form qui est injecter via la factory (comme dans l'example du cour)

j'ai ajouter les vérification des dates dans meetupForm avec la fonction de callback !!


-- L'update fonctionne !! 

on a donc un CRUD complet avec la vérificationd des champs. 

## a faire :

il reste du code a nétoyer car aillant coder vite et fait beaucoup, beaucoup  de test et de bidouillage pour comprendre j'ai écrit beaucoup de code qui pourrais étre innutile. je vais nettoyer le code des que j'ai le temp !


## futur : 

j'aimerais bien metre en place un service d'authentification avec un user qui serais stoquer en base qui pourrais crée un meetup (étre organisateur)
puis assisté a d'autres meetup (simple visiteur)

les organisateur seraient les seul a pouvoir modifier leur meetup. 

