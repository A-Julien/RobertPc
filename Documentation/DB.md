##Modèle DB

### Produits :
	
	- id 			 	(String)
	- nom 			 	(String)
	- modele 		 	(String)
	- marque 		 	(String)
	- description 			(String)
	- photo 		 	(int)
	- disponibilite			(bool)
	- prix 				(float)
	- format 			(String)

	
###Categories
	- nomMenu (String)
	
###Appartient
	- nom (String)
  	- id (String)

##Ancien modèle DB:

### Générique :
	
	- id 			 	(String)
	- nom 			 	(String)
	- modele 		 	(String)
	- marque 		 	(String)
	- description 			(String)
	- photo 		 	(int)
	- disponibilite			(bool)
	- prix 				(float)
	- format 			(String)

	
### carteMere
	- nbProcesseur	(int)
	- nbMemoire	(int)
	
### carteGraphique :
	- frequence 	(Float)
	- nbMemoire	(int)

### alimentation :
	- puissance 	(int)

### processeur :
	- frequence 	(float)
	- nbCoeur 	(int)
	

### memoire :
	- frequence 	(float)
	- capacite 	(int)
