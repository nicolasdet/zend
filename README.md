

dit clone https://github.com/nicolasdet/zend.git

cd zend/
composer-update

docker-compose up -d

docker-compose run --rm zf php vendor/bin/doctrine-module orm:schema-tool:update




### Info Nicolas :

j'ai pas tout a fait terminer

actuellement on peut afficher tout les meetup, en crée, en supprimer mais j'ai encore quelque difficulté sur l'update

ce qui me pose problém c'est les intéraction entre doctrine Orm et le form de zend. 
j'ai pas fait la validation car je n'ais pas encore tout a fait compris comment la métre en place ( comment apeller une fonction de callback ). 

j'ai du mal a faire le rapprochement entre l'éxemple que l'on a fait en cour et la doc de ZF qui est bien mais pas organiser...



Je finirais demain (dimanche) ! 
