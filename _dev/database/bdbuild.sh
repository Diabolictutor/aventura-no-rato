#!/bin/bash

## bdbuild.sh
 # 
 # This file is part of Aventura no Rato! A browser based, adventure type, game.
 # Copyright (C) 2011  Diogo Samuel, Jorge Gonçalves, Pedro Pires e Sérgio Lopes
 # 
 # This program is free software: you can redistribute it and/or modify
 # it under the terms of the GNU Affero General Public License as published by
 # the Free Software Foundation, either version 3 of the License, or
 # (at your option) any later version.
 # 
 # This program is distributed in the hope that it will be useful,
 # but WITHOUT ANY WARRANTY; without even the implied warranty of
 # MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 # GNU Affero General Public License for more details.
 # 
 # You should have received a copy of the GNU Affero General Public License
 # along with this program.  If not, see <http://www.gnu.org/licenses/>. 
 ##

rm recreate.sql
## 
echo "DROP DATABASE IF EXISTS \`anr\` ;" >> recreate.sql
echo "CREATE DATABASE \`anr\` ;" >> recreate.sql
echo "USE \`anr\` ;" >> recreate.sql
##
for nome in v*/*.sql; do 
    echo "SOURCE $nome" >> recreate.sql 
done    