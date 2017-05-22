#!/bin/sh
sqlite3 data/robertPc.db <<EOF
.read create.sql
.separator |
.import txt/carteMere carteMere
.separator |
.import txt/carteGraphique carteGraphique
.separator |
.import txt/alimentation alimentation
.separator |
.import txt/processeur processeur
.separator |
.import txt/memoire memoire
.quit
EOF