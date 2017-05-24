#!/bin/sh
rm data/robertPc.db
sqlite3 data/robertPc.db <<EOF
.read create.sql
.separator |
.import txt/produits produits
.separator |
.import txt/categories categories
.separator |
.import txt/appartient appartient
.quit
EOF
