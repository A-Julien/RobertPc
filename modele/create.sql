CREATE TABLE carteMere (
--GENERIQUE
      id INTEGER,
      nom STRING,
      modele STRING,
      marque STRING,
      description STRING,
      photo STRING,
      disponibilite STRING,
      prix INTEGER,
      format STRING,
--Dédier
	nbProcesseur INTEGER,
	nbMemoire  INTEGER
);

CREATE TABLE carteGraphique (
--GENERIQUE
      id INTEGER,
      nom STRING,
      modele STRING,
      marque STRING,
      description STRING,
      photo STRING,
      disponibilite STRING,
      prix INTEGER,
      format STRING,
--Dédier
	frequence FLOAT,
	nbMemoire  INTEGER
);


CREATE TABLE alimentation (
--GENERIQUE
      id INTEGER,
      nom STRING,
      modele STRING,
      marque STRING,
      description STRING,
      photo STRING,
      disponibilite STRING,
      prix INTEGER,
      format STRING,
--Dédier
	puissance INTEGER
);

CREATE TABLE processeur (
--GENERIQUE
      id INTEGER,
      nom STRING,
      modele STRING,
      marque STRING,
      description STRING,
      photo STRING,
      disponibilite STRING,
      prix INTEGER,
      format STRING,
--Dédier
	frequence FLOAT,
	nbCoeur INTEGER
);

CREATE TABLE memoire (
--GENERIQUE
      id INTEGER,
      nom STRING,
      modele STRING,
      marque STRING,
      description STRING,
      photo STRING,
      disponibilite STRING,
      prix INTEGER,
      format STRING,
--Dédier
	frequence FLOAT,
	capacite INTEGER
);



