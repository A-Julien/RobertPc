#!/bin/bash

chmod -R g-rwx,o+rX .
chmod o+rw modele/data modele/data/robertPc.db
chmod u+x modele/init.sh
./modele/initDB.sh
