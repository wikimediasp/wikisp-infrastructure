#!/bin/bash

echo Script para actualizar MediaWiki en servidores de wikisp.org
echo Actualizando repositorios del sistema

sudo apt update -y

echo Actualizando paquetes del sistema

sudo apt upgrade -y

echo Listo! Descargando nueva versión de MediaWiki 1.38

curl -O https://releases.wikimedia.org/mediawiki/1.38/mediawiki-1.38.4.zip

echo Sacando del paquete a MediaWiki 1.38

unzip mediawiki-*.zip

echo Cambiando el nombre de la carpeta y actualizando repositorio de wikisp

mv mediawiki-1.38.4 wiki2
cd mediawiki-config
git pull
cd ..

echo Tomaré un cafecito...
sleep 5s
echo Listo! Copiando LocalSettings.php y wsp-config a wiki2. Moviendo wiki2 a wikisp
cp mediawiki-config/juno/LocalSettings.php wiki2/LocalSettings.php
cp mediawiki-config/juno/Extensions.php wiki2/Extensions.php
cp mediawiki-config/juno/UserGroups.php wiki2/UserGroups.php
cp mediawiki-config/juno/Namespaces.php wiki2/Namespaces.php

sudo -s
mv wiki2 /var/www/wikisp/wiki2

echo Tomaré otro cafecito...
sleep 5s
echo Listo! Moviendo wiki2 a wikisp y copiando archivos importantes de wiki

cp /var/www/wikisp/wiki/private/PrivateSettings.php /var/www/wikisp/wiki2/private/PrivateSettings.php
cp /var/www/wikisp/wiki/.htaccess /var/www/wikisp/wiki2/.htaccess
cp /var/www/wikisp/wiki/{Part_of_WSP.svg,apple-touch-icon.png,favicon.ico,wikisp-icon.svg,wikisp-logo.svg,
wikisp-wordmark.svg} /var/www/wikisp/wiki2/resources/assets

echo Moviéndonos a carpeta extensiones y descargando
cd /var/www/wikisp/wiki2/extensions
git clone https://gerrit.wikimedia.org/r/mediawiki/extensions/CheckUser --branch REL1_38
git clone https://gerrit.wikimedia.org/r/mediawiki/extensions/Echo --branch REL1_38

echo Tomaré otro cafecito...
sleep 5s
echo Listo! Descargando 

git clone https://gerrit.wikimedia.org/r/mediawiki/extensions/Translate --branch REL1_38
git clone https://gerrit.wikimedia.org/r/mediawiki/extensions/UserMerge --branch REL1_38
git clone https://gerrit.wikimedia.org/r/mediawiki/extensions/CodeEditor --branch REL1_38
git clone https://gerrit.wikimedia.org/r/mediawiki/extensions/CodeMirror --branch REL1_38

echo Nos tomamos un pequeño descanso...
sleep 5s
echo Segumos descargando...

git clone https://gerrit.wikimedia.org/r/mediawiki/extensions/Babel --branch REL1_38
git clone https://gerrit.wikimedia.org/r/mediawiki/extensions/CharInsert --branch REL1_38
git clone https://gerrit.wikimedia.org/r/mediawiki/extensions/intersection --branch REL1_38
git clone https://gerrit.wikimedia.org/r/mediawiki/extensions/TemplateStyles --branch REL1_38

echo Nos tomamos un pequeño descanso...
sleep 5s
echo Seguimos descargando...

git clone https://github.com/sagamusix/MediaWiki-Counter.git Counter
git clone https://github.com/StarCitizenTools/mediawiki-extensions-TabberNeue.git TabberNeue
git clone https://gerrit.wikimedia.org/r/mediawiki/extensions/cldr --branch REL1_38
git clone https://gerrit.wikimedia.org/r/mediawiki/extensions/CleanChanges --branch REL1_38
git clone https://gerrit.wikimedia.org/r/mediawiki/extensions/Flow --branch REL1_38
git clone https://gerrit.wikimedia.org/r/mediawiki/extensions/MobileFrontend --branch REL1_38

echo Nos tomamos un pequeño descanso...
sleep 5s
echo Seguimos descargando...

git clone https://gerrit.wikimedia.org/r/mediawiki/extensions/PluggableAuth
git clone https://gerrit.wikimedia.org/r/mediawiki/extensions/SecurePoll --branch REL1_38
git clone https://gerrit.wikimedia.org/r/mediawiki/extensions/StaffEdits --branch REL1_38
git clone https://gerrit.wikimedia.org/r/mediawiki/extensions/StaffPowers --branch REL1_38
git clone https://gerrit.wikimedia.org/r/mediawiki/extensions/UniversalLanguageSelector --branch REL1_38
git clone https://gerrit.wikimedia.org/r/mediawiki/extensions/WSOAuth
#git clone https://gerrit.wikimedia.org/r/mediawiki/extensions/ContactPage --branch REL1_38

echo Eliminando extensiones innecesarias
rm -rf AbuseFilter CiteThisPage ConfirmEdit ImageMap Math PageImages MultimediaViewer SecureLinkFixer Nuke OATHAuth PdfHandler ReplaceText TextExtracts TitleBlacklist VisualEditor

echo Nos tomamos un pequeño descanso...
sleep 5s
echo Usando composer install

cd /var/www/wikisp/wiki2/extensions/Flow
composer install --no-dev

cd /var/www/wikisp/wiki2/extensions/PluggableAuth
composer install --no-dev

cd /var/www/wikisp/wiki2/extensions/WSOAuth
composer install --no-dev

echo Estamos preparados. Por favor, bloquea la base de datos.
sleep 5s
echo Cambiando lugares

mv /var/www/wikisp/wiki /var/www/wikisp/oldwiki
mv /var/www/wikisp/wiki2 /var/www/wikisp/wiki

echo Lugares cambiados
echo Iniciando actualización de base de datos

php /var/www/wikisp/wiki/maintenance/update.php

echo El script de actualización ha finalizado sus labores.
echo Por favor revisa que todo esté correcto. De otro modo NO elimines oldwiki.
echo ¡Gracias!





