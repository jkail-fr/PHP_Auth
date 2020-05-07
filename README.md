# PHP_Auth
A simple login system + DB in php

think it like a module ... so responsive to be integrated everywhere
Use SESSION
1 page with html
1 page with php checks
SQL table
NO CSS, to adapt to future project
Account creation system
change password
ecxcrat clean db for git

TODO :
finir creation compte (verifier que l'email (regex fredo) et le pseudo sont libres update SQL et hash mot de passe)
Log in : verif comparaison SQL
Page de modification du mot de passe 
Mettre champ création en required
securiser les champs
idee V2 : rajouter authentification LDAP : Oauth (gmail / facebook) et un mode envoi email ou pas pour connexion (via fichier conf, qui genere un array afin de generer les boutons / codes souahités)

NEXT TIME : 
Check if email ad pseudo are not alredey in DB
Add regex to emial check