<?php
/** Este archivo de configuración es para wikispwiki en el servidor Juno
    Contiene configuraciones exclusivas del servidor de producción 
    ADVERTENCIA: No incluir información sensible en este archivo 
    Orden de archivos
    - LocalSettings.php # No editar bajo ninguna circunstancia
    - wsp-config/JunoSettings.php # Este archivo
    - wsp-config/private/PrivateSettings.php # Información sensible
    - wsp-config/identity # Logotipos
    - wsp-config/Extensions.php # Extensiones
    - wsp-config/UserGroups.php # Grupos de usuarios
    - wsp-config/Namespaces.php # Espacios de nombres
**/

## Uncomment this to disable output compression
# $wgDisableOutputCompression = true;

$wgSitename = "Wikimedia Small Projects";
$wgMetaNamespace = "Wikimedia";

## The URL base path to the directory containing the wiki;
## defaults for all runtime URL paths are based off of this.
## For more information on customizing the URLs
## (like /w/index.php/Page_title to /wiki/Page_title) please see:
## https://www.mediawiki.org/wiki/Manual:Short_URL
$wgScriptPath = "/wiki";
$wgScriptExtension = ".php";
$wgArticlePath = "{$wgScriptPath}/$1";

## The protocol and server name to use in fully-qualified URLs
$wgServer = "https://wikisp.org";

## The URL path to static resources (images, scripts, etc.)
$wgResourceBasePath = $wgScriptPath;

## WSP Config
$wspConfig = "$IP/wsp-config";

## The URL paths to the logo.  Make sure you change this from the default,
## or else you'll overwrite your logo when you upgrade!
$wgLogos = [ 
    'svg' => "$wgResourceBasePath/resources/assets/wikisp-icon.svg",
    'wordmark' => [
	 'src' => "$wgResourceBasePath/resources/assets/wikisp-wordmark.svg",
         'width' => 200,
         'height' => 51,
    ],      	   
];

## Favicon
$wgFavicon = "$wgResourceBasePath/resources/assets/favicon.ico";

## AppleTouchIcon
$wgAppleTouchIcon = "$wgResourceBasePath/resources/assets/apple-touch-icon.png";

## UPO means: this is also a user preference option

$wgEnableEmail = true;
$wgEnableUserEmail = true; # UPO

$wgEmergencyContact = "admin@wikisp.org";
$wgPasswordSender = "noreply@wikisp.org"; # Innecesario, pero igual se mantiene

$wgEnotifUserTalk = false; # UPO
$wgEnotifWatchlist = false; # UPO
$wgEmailAuthentication = true;

require_once ( "$wspConfig/private/PrivateSettings.php" );

# MySQL specific settings
$wgDBprefix = "";

# MySQL table options to use during installation or update
$wgDBTableOptions = "ENGINE=InnoDB, DEFAULT CHARSET=binary";

# Shared database table
# This has no effect unless $wgSharedDB is also set.
$wgSharedTables[] = "actor";

## Shared memory settings
$wgMainCacheType = CACHE_MEMCACHED;
$wgMemCachedServers = [ '127.0.0.1:11211' ];

## To enable image uploads, make sure the 'images' directory
## is writable, then set this to true:
$wgEnableUploads  = true;
$wgGenerateThumbnailOnParse = false;
#$wgUseImageMagick = true;
#$wgImageMagickConvertCommand = "/usr/bin/convert";

# InstantCommons allows wiki to use images from https://commons.wikimedia.org
$wgUseInstantCommons = true;

# Periodically send a pingback to https://www.mediawiki.org/ with basic data
# about this MediaWiki instance. The Wikimedia Foundation shares this data
# with MediaWiki developers to help guide future development efforts.
$wgPingback = true;

## If you use ImageMagick (or any other shell command) on a
## Linux server, this will need to be set to the name of an
## available UTF-8 locale. This should ideally be set to an English
## language locale so that the behaviour of C library functions will
## be consistent with typical installations. Use $wgLanguageCode to
## localise the wiki.
$wgShellLocale = "C.UTF-8";

## Set $wgCacheDirectory to a writable directory on the web server
## to make your wiki go slightly faster. The directory should not
## be publicly accessible from the web.
#$wgCacheDirectory = "$IP/cache";

# Site language code, should be one of the list in ./languages/data/Names.php
$wgLanguageCode = "es";

# Changing this will log out all existing sessions.
$wgAuthenticationTokenVersion = "1";

## For attaching licensing metadata to pages, and displaying an
## appropriate copyright notice / icon. GNU Free Documentation
## License and Creative Commons licenses are supported so far.
$wgRightsUrl = "https://creativecommons.org/licenses/by-sa/4.0/";
$wgRightsText = "Creative Commons Attribution-ShareAlike License";
$wgRightsIcon = "$wgResourceBasePath/resources/assets/Part_of_WSP.svg";

# Path to the GNU diff3 utility. Used for conflict resolution.
$wgDiff3 = "/usr/bin/diff3";

## Default skin: you can change the default skin. Use the internal symbolic
## names, ie 'vector', 'monobook':
$wgDefaultSkin = "vector";

# Enabled skins.
# The following skins were automatically enabled:
wfLoadSkin( 'Vector' );
wfLoadSkin( 'MinervaNeue' );

# Extensiones
require_once( "$wspConfig/Extensions.php" );

# Permisos
require_once( "$wspConfig/UserGroups.php" );

# Namespaces
require_once( "$wspConfig/Namespaces.php" );

#For localised sidebar and another stuffs
$wgHooks['TranslatePostInitGroups'][] = function ( &$list, &$deps, &$autoload ) {
	$id = 'wiki-sidebar';
	$mg = new WikiMessageGroup( $id, 'sidebar-messages' );
	$mg->setLabel( 'Sidebar' );
	$mg->setDescription( 'Messages used in the sidebar of this wiki.' );
	$list[$id] = $mg;
	return true;
};

# wgForceUIMsgAsContentMsg
$wgForceUIMsgAsContentMsg = ['sidebar-discuss-link'];

# wgPageLanguage
$wgPageLanguageUseDB = true;

# wgAllowDisplayTitle + RestrictDisplayTitle
$wgAllowDisplayTitle = true;
$wgRestrictDisplayTitle = false;

#Debug - cuando se requiera, se descomenta
#$wgDebugLogFile = "/var/log/mediawiki/debug-{$wgDBname}.log";
#$wgDebugComments = true;
#$wgShowExceptionDetails = true;

