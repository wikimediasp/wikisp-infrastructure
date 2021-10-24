<?php
# This file was automatically generated by the MediaWiki 1.35.1
# installer. If you make manual changes, please keep track in case you
# need to recreate them later.
#
# See includes/DefaultSettings.php for all configurable settings
# and their default values, but don't forget to make changes in _this_
# file, not there.
#
# Further documentation for configuration settings may be found at:
# https://www.mediawiki.org/wiki/Manual:Configuration_settings

# Protect against web entry
if ( !defined( 'MEDIAWIKI' ) ) {
	exit;
}


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

## The URL paths to the logo.  Make sure you change this from the default,
## or else you'll overwrite your logo when you upgrade!
$wgLogos = [ 
    'svg' => "$wgResourceBasePath/resources/assets/wikisp.svg",
    'wordmark' => [
	 'src' => "$wgResourceBasePath/resources/assets/wikisp-horizontal.svg",
         'width' => 200,
         'height' => 51,
    ],      	   
];

## Favicon
$wgFavicon = "$wgResourceBasePath/resources/assets/favicon.ico";

## UPO means: this is also a user preference option

$wgEnableEmail = true;
$wgEnableUserEmail = true; # UPO

$wgEmergencyContact = "info@wikisp.org";
$wgPasswordSender = "info@wikisp.org";

$wgEnotifUserTalk = false; # UPO
$wgEnotifWatchlist = false; # UPO
$wgEmailAuthentication = true;

require( "$IP/private/PrivateSettings.php" );

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
$wgRightsPage = "Wikimedia:Copyright"; # Set to the title of a wiki page that describes your license/copyright
$wgRightsUrl = "";
$wgRightsText = "";
$wgRightsIcon = "$wgScriptPath/resources/assets/Part_of_WSP.svg";

# Path to the GNU diff3 utility. Used for conflict resolution.
$wgDiff3 = "/usr/bin/diff3";

# Permisos cargados en auto-instalador
$wgGroupPermissions['*']['createaccount'] = false;
$wgGroupPermissions['*']['edit'] = false;

# Skins
wfLoadSkin( 'MinervaNeue' );
#$wgMFDefaultSkinClass = 'SkinMinerva';
$wgDefaultSkin = 'vector';
wfLoadSkin( 'Vector' );

# End of automatically generated settings.
# Add more configuration options below.

# Permisos - Por si no funciona UserGroups
## General
$wgGroupPermissions['*']['autocreateaccount'] = true;
$wgGroupPermissions['user']['upload'] = false;
$wgGroupPermissions['sysop']['upload'] = true;
$wgGroupPermissions['sysop']['flow-create-board'] = true;
$wgGroupPermissions['sysop']['createaccount'] = false;
## TechCom
$wgGroupsAddToSelf['techcom'] = array( 'checkuser', 'suppress' );
$wgGroupsRemoveFromSelf['techcom'] = array( 'checkuser', 'suppress' );
$wgGroupPermissions['techcom']['unblockable'] = true;
$wgGroupPermissions['techcom']['siteadmin'] = true;
$wgGroupPermissions['techcom'] = $wgGroupPermissions['interface-admin'];
$wgGroupPermissions['techcom'] = $wgGroupPermissions['sysop'];
## AdminCom
$wgGroupPermissions['admincom']['staffedit'] = true;
$wgAddGroups['admincom'] = ['checkuser', 'suppress', 'nomcom', 'admincom', 'techcom', 'staff'];
$wgRemoveGroups['admincom'] = ['checkuser', 'suppress', 'nomcom', 'techcom', 'staff'];
$wgGroupPermissions['admincom']['unblockable'] = true;
## NomCom
$wgGroupPermissions['nomcom']['securepoll-create-poll'] = true;
## Bureaucrats
$wgGroupPermissions['bureaucrat']['userrights'] = false;
$wgAddGroups['bureaucrat'] = ['sysop','bureaucrat','bot','interface-admin'];
$wgRemoveGroups['bureaucrat'] = ['sysop','bot','interface-admin'];
## Founders
$wgGroupPermissions['founder']['userrights'] = true;
$wgStaffPowersStewardGroupName = 'founder';


# Extensiones
wfLoadExtension( 'CategoryTree' );
wfLoadExtension( 'CheckUser' );
wfLoadExtension( 'CodeEditor' );
wfLoadExtension( 'intersection' ); # Aka DynamicPageList
wfLoadExtension( 'Echo' );

# Flow & ParserFunctions need to be instaled both
wfLoadExtension( 'Flow' );
$wgFlowContentFormat = 'html';

wfLoadExtension( 'ParserFunctions' );
wfLoadExtension( 'Gadgets' );
wfLoadExtension( 'InputBox' );

##InterWiki
wfLoadExtension( 'Interwiki' );
$wgGroupPermissions['sysop']['interwiki'] = true;

wfLoadExtension( 'MobileFrontend' );

# Scribunto
wfLoadExtension( 'Scribunto' );
$wgScribuntoDefaultEngine = 'luastandalone';

wfLoadExtension( 'SecurePoll' );

# StaffEdits
wfLoadExtension( 'StaffEdits' );
$wgStaffEditsMessagePrefix = wsp;

wfLoadExtension( 'StaffPowers' );
wfLoadExtension( 'TemplateStyles' );
wfLoadExtension( 'WikiEditor' );
wfLoadExtension( 'PluggableAuth' );
wfLoadExtension( 'WSOAuth' );

# WSOAuth
$wgOAuthUri = 'https://meta.wikimedia.org/w/index.php?title=Special:OAuth';
#$wgPluggableAuth_EnableAutoLogin = true;
#$wgPluggableAuth_EnableLocalLogin = true;
#$wgOAuthMigrateUsersByUsername = true;

# UserGroups
# require_once "$IP/extensions/UserGroups/UserGroups.php";

# Constants for additional namespaces
define("NS_PROPOSAL", 3000);
define("NS_PROPOSAL_TALK", 3001);
define("NS_PROGRAM", 3002);
define("NS_PROGRAM_TALK", 3003);
define("NS_EVENT", 3004);
define("NS_EVENT_TALK", 3005);
define("NS_CONFERENCE", 3006);
define("NS_CONFERENCE_TALK", 3007);

# ExtraNamespaces
$wgExtraNamespaces[NS_PROPOSAL] = "Propuestas";
$wgExtraNamespaces[NS_PROPOSAL_TALK] = "Propuestas_discusión";
$wgExtraNamespaces[NS_PROGRAM] = "Programas";
$wgExtraNamespaces[NS_PROGRAM_TALK] = "Programas_discusión";
$wgExtraNamespaces[NS_EVENT] = "Eventos";
$wgExtraNamespaces[NS_EVENT_TALK] = "Eventos_discusión";
$wgExtraNamespaces[NS_CONFERENCE] = "Conferencias";
$wgExtraNamespaces[NS_CONFERENCE_TALK] = "Conferencias_discusión";

# NamespacesWithSubpages
$wgNamespacesWithSubpages = [
	NS_MAIN => true,
	NS_PROPOSAL => true,
	NS_PROPOSAL_TALK => true,
	NS_PROGRAM => true,
	NS_PROGRAM_TALK => true,
	NS_EVENT => true,
	NS_EVENT_TALK => true,
	NS_CONFERENCE=> true,
	NS_CONFERENCE_TALK => true,
	NS_TEMPLATE => true,
	NS_TEMPLATE_TALK => true
];

# wgAllowDisplayTitle + RestrictDisplayTitle
$wgAllowDisplayTitle = true;
$wgRestrictDisplayTitle = false;

# MLEB
wfLoadExtension( 'Babel' );

wfLoadExtension( 'cldr' );

wfLoadExtension( 'CleanChanges' );
$wgCCTrailerFilter = true;
$wgCCUserFilter = false;
$wgDefaultUserOptions['usenewrc'] = 1;

wfLoadExtension( 'LocalisationUpdate' );
$wgLocalisationUpdateDirectory = "$IP/cache";

wfLoadExtension( 'Translate' );
$wgGroupPermissions['user']['translate'] = true;
$wgGroupPermissions['user']['translate-messagereview'] = true;
$wgGroupPermissions['user']['translate-groupreview'] = true;
$wgGroupPermissions['user']['translate-import'] = true;
$wgGroupPermissions['sysop']['pagetranslation'] = true;
$wgGroupPermissions['sysop']['translate-manage'] = true;
$wgTranslateDocumentationLanguageCode = 'qqq';
$wgExtraLanguageNames['qqq'] = 'Message documentation'; # No linguistic content. Used for documenting messages

wfLoadExtension( 'UniversalLanguageSelector' );

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
$wgGroupPermissions['sysop']['pagelang'] = true;

# CodeMirror
wfLoadExtension( 'CodeMirror' );
$wgDefaultUserOptions['usecodemirror'] = 1;

# SyntaxHighlight
wfLoadExtension( 'SyntaxHighlight_GeSHi' );

# UserMerge
wfLoadExtension( 'UserMerge' );
// By default nobody can use this function, enable for bureaucrat?
$wgGroupPermissions['bureaucrat']['usermerge'] = true;
$wgGroupPermissions['techcom']['usermerge'] = true;
// optional: default is array( 'sysop' )
$wgUserMergeProtectedGroups = [ 'founder' ];

# Counter
wfLoadExtension ( 'Counter' );

# TabberNeue - T292344
wfLoadExtension( 'TabberNeue' );

#Debug - cuando se requiera, se descomenta
#$wgDebugLogFile = "/var/log/mediawiki/debug-{$wgDBname}.log";
#$wgDebugComments = true;
#$wgShowExceptionDetails = true;

