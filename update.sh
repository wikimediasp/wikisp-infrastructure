#!/bin/bash

echo Script para actualizar MediaWiki en servidores de wikisp.org
echo Actualizando repositorios del sistema

apt update -y

echo Actualizando paquetes del sistema

apt upgrade -y

echo Listo! Descargando nueva versión de MediaWiki 1.37

curl -O https://releases.wikimedia.org/mediawiki/1.38/mediawiki-1.38.2.zip

echo Sacando del paquete a MediaWiki 1.37

unzip mediawiki-*.zip

echo Cambiando el nombre de la carpeta y actualizando repositorio de wikisp

mv mediawiki-* wiki2/
cd mediawiki-config
git pull
cd ..

echo Tomaré un cafecito...
sleep 5s
echo Listo! Copiando LocalSettings.php y wsp-config a wiki2. Moviendo wiki2 a wikisp

cp mediawiki-config/juno/wiki/LocalSettings.php wiki2/LocalSettings.php
cp mediawiki-config/juno/wiki/wsp-config wiki2/wsp-config
mv wiki2 /var/www/wikisp/

echo Tomaré otro cafecito...
sleep 5s
echo Listo! Moviendo wiki2 a wikisp y copiando archivos importantes de wiki

# cp /var/www/wikisp/wiki/wsp-config/private/PrivateSettings.php /var/www/wikisp/wiki2/wsp-config/private/PrivateSettings.php
cp /var/www/wikisp/wiki/.htaccess /var/www/wikisp/wiki2/.htaccess

echo Moviéndonos a carpeta extensiones y descargando
cd /var/www/wikisp/wiki2/extensions
git clone https://gerrit.wikimedia.org/r/mediawiki/extensions/CheckUser

echo Tomaré otro cafecito...
sleep 5s
echo Listo! Descargando 

git clone https://gerrit.wikimedia.org/r/mediawiki/extensions/Translate
git clone https://gerrit.wikimedia.org/r/mediawiki/extensions/UserMerge
git clone https://gerrit.wikimedia.org/r/mediawiki/extensions/CodeEditor
git clone https://gerrit.wikimedia.org/r/mediawiki/extensions/CodeMirror

echo Nos tomamos un pequeño descanso...
sleep 5s
echo Segumos descargando...

git clone https://gerrit.wikimedia.org/r/mediawiki/extensions/Babel
git clone https://gerrit.wikimedia.org/r/mediawiki/extensions/CharInsert
git clone https://gerrit.wikimedia.org/r/mediawiki/extensions/intersection
git clone https://gerrit.wikimedia.org/r/mediawiki/extensions/TabberNeue
git clone https://gerrit.wikimedia.org/r/mediawiki/extensions/TemplateStyles

echo Nos tomamos un pequeño descanso...
sleep 5s
echo Seguimos descargando...

git clone https://github.com/sagamusix/MediaWiki-Counter.git Counter
git clone https://github.com/StarCitizenTools/mediawiki-extensions-TabberNeue.git TabberNeue
git clone https://gerrit.wikimedia.org/r/mediawiki/extensions/cldr
git clone https://gerrit.wikimedia.org/r/mediawiki/extensions/CleanChanges
git clone https://gerrit.wikimedia.org/r/mediawiki/extensions/Flow
git clone https://gerrit.wikimedia.org/r/mediawiki/extensions/MobileFrontend

echo Nos tomamos un pequeño descanso...
sleep 5s
echo Seguimos descargando...

git clone https://gerrit.wikimedia.org/r/mediawiki/extensions/PluggableAuth
git clone https://gerrit.wikimedia.org/r/mediawiki/extensions/SecurePoll
git clone https://gerrit.wikimedia.org/r/mediawiki/extensions/StaffEdits
git clone https://gerrit.wikimedia.org/r/mediawiki/extensions/StaffPowers
git clone https://gerrit.wikimedia.org/r/mediawiki/extensions/UniversalLanguageSelector
git clone https://gerrit.wikimedia.org/r/mediawiki/extensions/WSOAuth
git clone https://gerrit.wikimedia.org/r/mediawiki/extensions/ContactPage

echo Nos tomamos un pequeño descanso...
sleep 5s
echo Usando composer install

cd Flow
composer install --no-dev

cd /var/www/wikisp/wiki2/extensions/PluggableAuth
composer install --no-dev

cd /var/www/wikisp/wiki2/extensions/WSOAuth
composer install --no-dev

#echo Estamos preparados. Por favor, bloquea la base de datos.
sleep 5s
echo Cambiando lugares

#mv wiki oldwiki
#mv wiki2 wiki

#echo Lugares cambiados
#echo Iniciando actualización de base de datos

#php /var/www/wikisp/wiki/maintenance/update.php

echo El script de actualización ha finalizado sus labores.
echo Por favor revisa que todo esté correcto. De otro modo NO elimines oldwiki.
echo ¡Gracias!





