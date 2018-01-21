

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

(meetUpdateForm n'est pas a prendre en compte, je fait des test car j'ai du mal avec l'update. )

## presque terminer :

il me reste l'update j'ai encore un tout dernier problem de conversion au niveau des date ( on passe de String a dateTime ) fin je vais voir tout ça cet apremidi.  (dimanche)