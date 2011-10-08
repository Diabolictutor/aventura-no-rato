#!/bin/bash

rm recreate.sql
## 
echo "DROP DATABASE IF EXISTS \`anr\` ;" >> recreate.sql
echo "CREATE DATABASE \`anr\` ;" >> recreate.sql
echo "USE \`anr\` ;" >> recreate.sql
##
for nome in v*/*.sql; do 
    echo "SOURCE $nome" >> recreate.sql 
done    