<?php
/** Este archivo de configuración es para wikispwiki en el servidor Juno
    Contiene configuraciones exclusivas del servidor de producción 
    ADVERTENCIA: No incluir información sensible en este archivo 
    Orden de archivos
    - LocalSettings.php # Este archivo
    - private/PrivateSettings.php # Información sensible
**/

## Uncomment this to disable output compression
# $wgDisableOutputCompression = true;

$wgSitename = "Wikimedia Small Projects";
$wgMetaNamespace = "Internal";

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

## Private Data
$wspPrivate = "$IP/private";

## The URL paths to the logo.  Make sure you change this from the default,
## or else you'll overwrite your logo when you upgrade!
$wgLogos = [ 
    'svg' => "$wgResourceBasePath/resources/assets/wikisp-icon.svg",
    'icon' => "$wgResourceBasePath/resources/assets/wikisp-icon.svg",
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

require_once ( "$wspPrivate/PrivateSettings.php" );

# MySQL specific settings
$wgDBprefix = "";

# MySQL table options to use during installation or update
$wgDBTableOptions = "ENGINE=InnoDB, DEFAULT CHARSET=binary";

# Shared database table
# This has no effect unless $wgSharedDB is also set.
$wgSharedTables[] = "actor";

## Shared memory settings
$wgMainCacheType = CACHE_ACCEL; #2022-11-21, TheresNoTime
#$wgMemCachedServers = [ '127.0.0.1:11211' ];

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
$wgRightsIcon = "$wgResourceBasePath/resources/assets/Part_of_WSP.svg";
$wgRightsUrl = 'https://wikisp.org';
# Path to the GNU diff3 utility. Used for conflict resolution.
$wgDiff3 = "/usr/bin/diff3";

## Default skin: you can change the default skin. Use the internal symbolic
## names, ie 'vector', 'monobook':
$wgDefaultSkin = "vector";

# Enabled skins.
# The following skins were automatically enabled:

# Vector
wfLoadSkin( 'Vector' );

# MinervaNeue
wfLoadSkin( 'MinervaNeue' );

# Citizen
wfLoadSkin( 'Citizen' );

$wgCitizenEnableDrawerSiteStats = false;
$wgCitizenSearchDescriptionSource = 'wikidata';

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

# PageTranslationLanguageList
#$wgPageTranslationLanguageList = 'sidebar-only';

# wgRememberMe
$wgRememberMe = 'always';

# wgHiddenPrefs
$wgHiddenPrefs[] = 'realname';

#Debug - cuando se requiera, se descomenta
$wgDebugLogFile = "/var/log/mediawiki/debug-{$wgDBname}.log";
$wgDebugComments = true;
$wgShowExceptionDetails = true;

# =============================================== Inicio de extensiones =============================================== #
# Extensiones habilitadas, se pueden añadir usando
# wfLoadExtension( 'ExtensionName' );

# Extensiones sin configs adicionales
wfLoadExtension( 'CategoryTree' );
wfLoadExtension( 'Cite' );
wfLoadExtension( 'CodeEditor' );
wfLoadExtension( 'Gadgets' );
wfLoadExtension( 'InputBox' );
wfLoadExtension( 'Interwiki' );
wfLoadExtension( 'ParserFunctions' );
wfLoadExtension( 'SyntaxHighlight_GeSHi' );
wfLoadExtension( 'TemplateData' );
wfLoadExtension( 'TemplateStyles' );
wfLoadExtension('TemplateStylesExtender');
wfLoadExtension( 'WikiEditor' );
wfLoadExtension( 'CharInsert');
wfLoadExtension( 'intersection' );
wfLoadExtension( 'Echo' );
wfLoadExtension( 'Babel' );
wfLoadExtension( 'cldr' );
wfLoadExtension( 'UniversalLanguageSelector' );
wfLoadExtension( 'ShortDescription' );
wfLoadExtension( 'TabberNeue' );
wfLoadExtension ( 'Math' );
wfLoadExtension( 'FontAwesome' );
wfLoadExtension( 'ExternalContent' );

# MobileFrontend
wfLoadExtension( 'MobileFrontend' );

# Scribunto
wfLoadExtension( 'Scribunto' );
$wgScribuntoDefaultEngine = 'luastandalone';

# SecurePoll
wfLoadExtension( 'SecurePoll' );

# PluggableAuth
wfLoadExtension( 'PluggableAuth' );
$wgPluggableAuth_EnableLocalProperties = true;

# WSOAuth
wfLoadExtension( 'WSOAuth' );

# CleanChanges
wfLoadExtension( 'CleanChanges' );
$wgCCTrailerFilter = false;
$wgCCUserFilter = false;
$wgCCFiltersOnly = false;
$wgDefaultUserOptions['usenewrc'] = 1;

# Translate
wfLoadExtension( 'Translate' );
$wgTranslateDocumentationLanguageCode = 'qqq';
$wgExtraLanguageNames['qqq'] = 'Message documentation'; # No linguistic content. Used for documenting messages

# CodeMirror
wfLoadExtension( 'CodeMirror' );
$wgDefaultUserOptions['usecodemirror'] = 1;

# UserMerge
#wfLoadExtension( 'UserMerge' ); # Presenta fallas, desactivada.

# Counter
#wfLoadExtension( 'Counter' );

# Fin de extensiones

# =============================================== Inicio de permisos =============================================== #
/** Grupos base - Definidos por MediaWiki **/
# Bureaucrats
$wgGroupPermissions['bureaucrat']['userrights'] = true;
$wgGroupPermissions['bureaucrat']['usermerge'] = false; # Tiene errores

# General
$wgGroupPermissions['*']['createaccount'] = false;
$wgGroupPermissions['*']['edit'] = false;
$wgGroupPermissions['*']['autocreateaccount'] = true;
$wgGroupPermissions['user']['upload'] = false;
$wgGroupPermissions['user']['translate'] = true;
$wgGroupPermissions['user']['translate-messagereview'] = true;
$wgGroupPermissions['user']['translate-groupreview'] = true;
$wgGroupPermissions['user']['translate-import'] = true;

# Sysops
$wgGroupPermissions['sysop']['upload'] = true;
$wgGroupPermissions['sysop']['flow-create-board'] = true;
$wgGroupPermissions['sysop']['pagetranslation'] = true;
$wgGroupPermissions['sysop']['translate-manage'] = true;
$wgGroupPermissions['sysop']['interwiki'] = true;
$wgGroupPermissions['sysop']['pagelang'] = true;
$wgGroupPermissions['sysop']['manage-all-push-subscriptions'] = true;

/** Grupos especiales - Definidos por WikiSP **/

# NomCom
$wgGroupPermissions['nomcom']['securepoll-create-poll'] = true;
$wgGroupPermissions['electionadmin'] = [];
$wgGroupsAddToSelf['nomcom'][] = 'electionadmin';
$wgGroupsRemoveFromSelf['nomcom'][] = 'electionadmin';

# Eliminar push-subscription-manager
unset( $wgGroupPermissions['push-subscription-manager'] );

# Fin de permisos

# =============================================== Inicio de espacios de nombres =============================================== #
# Constants for additional namespaces
define("NS_PROPOSAL", 3000);
define("NS_PROPOSAL_TALK", 3001);
define("NS_GRANTS", 3002);
define("NS_GRANTS_TALK", 3003);
define("NS_RESOLUTION", 3004);
define("NS_RESOLUTION_TALK", 3005);

# ExtraNamespaces
$wgExtraNamespaces[NS_PROPOSAL] = "Propuestas";
$wgExtraNamespaces[NS_PROPOSAL_TALK] = "Propuestas_discusión";
$wgExtraNamespaces[NS_GRANTS] = "Grants";
$wgExtraNamespaces[NS_GRANTS_TALK] = "Grants_discusión";
$wgExtraNamespaces[NS_RESOLUTION] = "Resolución";
$wgExtraNamespaces[NS_RESOLUTION_TALK] = "Resolución_discusión";

# NamespacesWithSubpages
$wgNamespacesWithSubpages = [
	NS_MAIN => true,
	NS_PROPOSAL => true,
	NS_PROPOSAL_TALK => true,
	NS_GRANTS => true,
	NS_GRANTS_TALK => true,
	NS_TEMPLATE => true,
	NS_TEMPLATE_TALK => true
];

# Fin de espacios de nombres

