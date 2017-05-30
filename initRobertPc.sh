
#!/bin/bash

chmod -R g-rwx,o+rX .
chmod o+rw modele/data modele/data/base.db
modele/init.sh
