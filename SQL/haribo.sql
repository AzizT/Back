/**

* Objectif : Créer dans PHPMyAdmin une base de données haribo dont la modélisation est ci-dessous, les étapes sont détaillées ensuite.

*/



/**

* REQUETES A EFFECTUER dans PHPMyAdmin

*/



--1-- lister toutes les BDD de PHPMyAdmin



--2-- Utiliser la BDD haribo



--3--

/**

* insérer dans cette table les informations de votre groupe:

*/

INSERT INTO stagiaires (prenom, yeux, genre)
VALUES
    ('Barbara', 'bleu', 'f'),

    ('Sandra', 'marron', 'f'),

    ('Alpha', 'marron', 'h'),

    ('Sébastien', 'marron clair', 'h'),

    ('Sarah', 'marron', 'f'),

    ('Julien', 'vert', 'h'),

    ('Johan', 'bleu', 'h'),

    ('Yannick', 'marron', 'h'),

    ('Pascal', 'bleu', 'h'),

    ('Myriem', 'marron', 'f'),

    ('Hadi', 'marron', 'h'),

    ('Corinne', 'marron', 'f'),

    ('Alain', 'marron', 'h');



--4--

/**

* insérer dans cette table des bonbons haribo:

*/

INSERT INTO bonbons(id_bonbon, nom, saveur) VALUES (10, 'Chamallows', 'fraise'),

    (11, 'Dragibus', 'orange'),

    (12, 'Tagada', 'pik'),

    (13, 'Tagada', 'original'),

    (14, 'Tagada', 'purple'),

    (15, 'Car en Sac', 'réglisse'),

    (16, 'Dragibus', 'pik'),

    (17, 'Dragibus', 'soft'),

    (18, 'Croco', 'cola'),

    (19, 'Croco', 'fraise'),

    (20, 'Croco', 'citron');

--5--

/**

* insérer dans la table manger des informations sur qui a consommé quel bonbon, quand et dans quelles quantités (faites un copier-coller des lignes ci-dessous) :

*/

INSERT INTO manger(id_manger, id_bonbon, id_stagiaire, date_manger, quantite) VALUES

    (1, 10, 1, '2017-01-19', 4),

    (2, 11, 2, '2017-02-20', 1),

    (3, 12, 3, '2017-01-29', 3),

    (4, 13, 4, '2017-03-22', 9),

    (5, 14, 5, '2017-02-19', 8),

    (6, 15, 6, '2017-03-20', 11),

    (7, 15, 7, '2017-06-13', 4),

    (8, 20, 8, '2017-06-15', 1),

    (9, 15, 9, '2017-04-17', 5),

    (10, 17, 12, '2017-05-03', 7),

    (11, 16, 12, '2017-01-31', 3),

    (12, 18, 11, '2017-02-12', 6),

    (13, 10, 5, '2017-03-20', 1),

    (14, 19, 2, '2017-04-04', 2),

    (15, 15, 5, '2017-05-19', 14);



-- AJOUT DE CLEF ETRANGERE :

ALTER TABLE `manger`

 ADD PRIMARY KEY (`id_manger`),

 ADD FOREIGN KEY `id_bonbon` (`id_bonbon`),

 ADD FOREIGN KEY `id_stagiaire` (`id_stagiaire`);



--6-- Lister les tables de la BDD *haribo*
SHOW TABLES;


--7-- voir les paramètres de la table *bonbon*
SHOW COLUMNS FROM bonbons;
ou
DESCRIBE bonbons;


--8-- Sélectionner tous les champs de tous les enregistrements de la table *stagiaire*
SELECT * FROM stagiaires;


--9-- Rajouter un nouveau stagiaire *Patriiiick* en forçant la numérotation de l'id
INSERT INTO stagiaires (id_stagiaire, prenom, yeux, genre) VALUES ('8', 'Patriick', 'mistyrose', 'h');


--10-- Rajouter un nouveau stagiaire *Mila* SANS forcer la numérotation de l'id
INSERT INTO stagiaires (prenom, yeux, genre) VALUES ('Milla', 'vert', 'f');


--11-- Changer le prénom du stagiaire qui a l'id 100 de *Patriiiick* à *Patrick*
UPDATE stagiaires SET prenom='Patrick' WHERE id_stagiaire ='8';


--12-- Rajouter dans la table manger que Patrick a mangé 5 Tagada purpule le 15 septembre
INSERT INTO manger(id_bonbon, id_stagiaire, date_manger, quantite) VALUES ('2', '8', '2018-09-15', '5');


--13-- Sélectionner tous les noms des bonbons
SELECT nom FROM bonbons;


--14-- Sélectionner tous les noms des bonbons en enlevant les doublons
SELECT DISTINCT nom FROM bonbons;


--15-- Récupérer les couleurs des yeux des stagiaires (Sélectionner plusieurs champs dans une table)
SELECT prenom, yeux FROM stagiaires;


--16-- Dédoublonner un résultat sur plusieurs champs



--17-- Sélectionner le stagiaire qui a l'id 5
SELECT prenom FROM stagiaires WHERE id_stagiaire = 5;


--18-- Sélectionner tous les stagiaires qui ont les yeux marrons
SELECT prenom FROM stagiaires WHERE yeux = 'marron';


--19-- Sélectionner tous les stagiaires dont l'id est plus grand que 9
SELECT prenom FROM stagiaires WHERE id_stagiaire > '9';


--20-- Sélectionner tous les stagiaires SAUF celui dont l'id est 9 (soyons supersticieux !) :!\ iil y a 2 façons de faire
SELECT prenom FROM stagiaires WHERE id_stagiaire != 5;


--21-- Sélectionner tous les stagiaires qui ont un id inférieur ou égal à 10
SELECT prenom FROM stagiaires WHERE id_stagiaire <= 4;


--22-- Sélectionner tous les stagiaires dont l'id est compris entre 7 et 11
SELECT prenom FROM stagiaires WHERE id_stagiaire > 4 AND id_stagiaire < 8;


--23-- Sélectionner les stagiaires dont le prénom commence par un *S*
SELECT prenom FROM stagiaires WHERE prenom LIKE 's%';


--24-- Trier les stagiaires femmes par id décroissant
SELECT prenom FROM stagiaires WHERE genre = 'f' ORDER BY id_stagiaire DESC;


--25-- Trier les stagiaires hommes par prénom dans l'ordre alphabétique
SELECT prenom FROM stagiaires WHERE genre = 'h' ORDER BY prenom ;


--26-- Trier les stagiaires en affichant les femmes en premier et en classant les couleurs des yeux dans l'ordre alphabétique
SELECT prenom, genre, yeux FROM stagiaires ORDER BY genre DESC, yeux ;


--27-- Limiter l'affichage d'une requête de sélection de tous les stagiaires aux 3 premires résultats
SELECT * FROM stagiaires LIMIT 3;


--28-- Limiter l'affichage d'une requête de sélection de tous les stagiaires à partir du 3ème résultat et des 5 suivants
SELECT * FROM stagiaires LIMIT 2,5;


--29-- Afficher les 4 premiers stagiaires qui ont les yeux marron
SELECT * FROM stagiaires WHERE yeux = 'marron' LIMIT 4;


--30-- Pareil mais en triant les prénoms dans l'ordre alphabétique
SELECT * FROM stagiaires WHERE yeux = 'marron' ORDER BY prenom LIMIT 4;


--31-- Compter le nombre de stagiaires
SELECT COUNT(prenom) FROM stagiaires;


--32-- Compter le nombre de stagiaires hommes mais en changeant le nom de la colonne de résultat par *nb_stagiaires_H*
SELECT COUNT(prenom)AS nb_stagiaires_H FROM stagiaires WHERE genre = 'h';


--33-- Compter le nombre de couleurs d'yeux différentes
SELECT COUNT(yeux) FROM stagiaires;


--34-- Afficher le prénom et les yeux du stagiaire qui a l'id le plus petit
SELECT prenom, yeux FROM stagiaires WHERE id_stagiaire = '1';


--36-- Afficher le prénom et les yeux du stagiaire qui a l'id le plus grand /!\ c'est une requête imbriquée qu'il faut faire (requête sur le résultat d'une autre requête)
SELECT prenom, yeux, MAX(id_stagiaire) FROM stagiaires;


--37-- Afficher les stagiaires qui ont les yeux bleu et vert
SELECT prenom FROM stagiaires WHERE yeux = 'bleu' OR yeux = 'vert';


--38-- A l'inverse maintenant, afficher les stagiaires qui n'ont pas les yeux bleu ni vert
SELECT prenom FROM stagiaires WHERE yeux != 'bleu' AND yeux != 'vert';


--39-- récupérer tous les stagiaires qui ont mangé des bonbons, avec le détail de leurs consommations
SELECT id_stagiaire, quantite FROM manger;


--40-- récupérer que les stagiaires qui ont mangé des bonbons, avec le détail de leurs consommations



--41-- prénom du stagiaire, le nom du bonbon, la date de consommation pour tous les stagiaires qui ont mangé au moins une fois
SELECT prenom, nom, date_manger FROM stagiaires AS s, bonbons AS b, manger AS m WHERE s.id_stagiaire = m.id_stagiaire AND b.id_bonbon = m.id_bonbon;
ou
SELECT prenom, nom, date_manger FROM stagiaires INNER JOIN bonbons INNER JOIN manger WHERE manger.id_bonbon = bonbons.id_bonbon AND manger.id_stagiaire = stagiaires.id_stagiaire ;

--42-- Afficher les quantités consommées par les stagiaires (uniquement ceux qui ont mangé !)
SELECT prenom, quantite FROM stagiaires AS s, manger AS m WHERE s.id_stagiaire = m.id_stagiaire;


--43-- Calculer combien de bonbons ont été mangés au total par chaque stagiaire et afficher le nombre de fois où ils ont mangé



--44-- Afficher combien de bonbons ont été consommés au total
SELECT SUM(quantite) FROM manger;


--45-- Afficher le total de *Tagada* consommées



--46-- Afficher les prénoms des stagiaires qui n'ont rien mangé



--47-- Afficher les saveurs des bonbons (sans doublons)



--48-- Afficher le prénom du stagiaire qui a mangé le plus de bonbons



--49-- Aller chercher 1 référence dans 2 tables distinctes







