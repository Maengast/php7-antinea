Antinea Gontard
Hugo Lantillon

Nous vous présentons notre projet Babyfoot.
Il donne un classement des joueurs et des match 2vs2 fait au Babyfoot.

Trois pages :
Index.php
MatchRank.php
PlayerRank.php

Index.php :
L'entête ainsi que les trois joueurs les plus fort.
Un lien vers Match Rank

MatchRank.php
Tous les matches avec les équipes, les eux joueurs par équipe ainsi que les scores.
Ajout de matches

PlayerRank.php
Tous les joueurs triés par ratio. 
Ajout de joueur

Les matches et joueurs sont des classes. 
-> contenant toutes les informations
-> affichant leur Html

Connection est une classe
-> connection a la base de donnée
-> ajout et mise a jour des informations

Session
-> ID des formulaires pour ne pas reposter les informations
-> sens du trie par type (en construction)

Formulaires
-> Ajout d'un match
-> Ajout d'un joueur
-> Affichage de Html
-> recuperation de post

Fonctions
Crée les entités
Crée l'HTML
Recuperer/ ecrire des données(URL)
Gerer les données