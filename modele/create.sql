CREATE TABLE produits (
    id INTEGER,
    nom STRING,
    modele STRING,
    marque STRING,
    description STRING,
    photo STRING,
    disponibilite STRING,
    prix INTEGER,
    format STRING,
    CONSTRAINT PK_produits 	primary key (id)
);

CREATE TABLE categories (
  nomMenu STRING,
  CONSTRAINT PK_categories 	primary key (nomMenu),
  CONSTRAINT u_categories 	UNIQUE (nomMenu)
);

CREATE TABLE appartient (
  nom STRING,
  id STRING,
  CONSTRAINT FK_appartient  foreign key (nom) 			references categories(nomMenu),
	CONSTRAINT FK_appartient_id  foreign key (id) 			references produits(id),
  CONSTRAINT PK_appartient 	primary key (nom, id)
);
