#!/bin/sh
rm modele/data/robertPc.db
sqlite3 modele/data/robertPc.db <<EOF
.read modele/create.sql
.separator |
.import modele/txt/produits produits
.separator |
.import modele/txt/categories categories
.separator |
.import modele/txt/appartient appartient
.quit
EOF
