Antinea Gontard
Hugo Lantillon

Nous vous pr�sentons notre projet Babyfoot.
Il donne un classement des joueurs et des match 2vs2 fait au Babyfoot.

Trois pages :
Index.php
MatchRank.php
PlayerRank.php

Index.php :
L'ent�te ainsi que les trois joueurs les plus fort.
Un lien vers Match Rank

MatchRank.php
Tous les matches avec les �quipes, les eux joueurs par �quipe ainsi que les scores.
Ajout de matches

PlayerRank.php
Tous les joueurs tri�s par ratio. 
Ajout de joueur

Les matches et joueurs sont des classes. 
-> contenant toutes les informations
-> affichant leur Html

Connection est une classe
-> connection a la base de donn�e
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
Cr�e les entit�s
Cr�e l'HTML
Recuperer/ ecrire des donn�es(URL)
Gerer les donn�es