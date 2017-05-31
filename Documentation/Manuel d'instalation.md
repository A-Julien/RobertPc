#Manuel d'installation (Linux)

##Pré-requis

* Serveur web 
* Serveur PhP
* Sqlite3
* Git

##Installation des pré-requis
Mise à jour de la liste des paquets :

```
sudo apt-get update	
```
	
###Serveur web (Apache2)


* 

	```
	sudo apt-get install apache2
	```

###Serveur PhP

* Php : 

	```
	sudo apt-get install php5 libapache2-mod-php5 php5-mcrypt
	```

* Sqlite pour php :

	```
	sudo apt-get install php5-sqlite
	```

###Sqlite3

* 

	```
	sudo apt-get install sqlite3 libsqlite3-dev
	```

###Git

* 

	```
	sudo apt-get install git
	```
	
##Installation du site web

* Se placer dans le dossier du serveur web 

	```
	cd ServerWebRoot
	```

* Cloner le dépôt git :
	
	```
	git clone https://github.com/A-Julien/RobertPc.git
	```
	
* Rendre executable le script d'initialisation : 

	```
	chmod u+x initRobertPc.sh
	```
	ou
	```
	sudo chmod u+x initRobertPc.sh
	```
	
*	Executer le script d'initialisation :

	```
	./initRobertPc.sh
	```
	ou
	```
	sudo ./initRobertPc.sh
	```
	