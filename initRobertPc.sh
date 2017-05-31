#!/bin/bash

chmod -R g-rwx,o+rX .
chmod o+rw modele/data modele/data/robertPc.db
chmod u+x modele/initDB.sh
./modele/initDB.sh
