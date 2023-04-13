<?php
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
wfLoadExtension( 'PdfHandler' );
wfLoadExtension( 'Poem' );
wfLoadExtension( 'SyntaxHighlight_GeSHi' );
wfLoadExtension( 'TemplateData' );
wfLoadExtension( 'TemplateStyles' );
wfLoadExtension( 'WikiEditor' );
wfLoadExtension( 'CategoryTree' );
wfLoadExtension( 'CheckUser' );
wfLoadExtension( 'intersection' );
wfLoadExtension( 'Echo' );
wfLoadExtension( 'Babel' );
wfLoadExtension( 'cldr' );
wfLoadExtension( 'UniversalLanguageSelector' );
#wfLoadExtension ( 'Counter' );
wfLoadExtension( 'TabberNeue' );

# Flow & ParserFunctions need to be instaled both
wfLoadExtension( 'Flow' );
$wgFlowContentFormat = 'html';

# MobileFrontend
wfLoadExtension( 'MobileFrontend' );

# Scribunto
wfLoadExtension( 'Scribunto' );
$wgScribuntoDefaultEngine = 'luastandalone';

# SecurePoll
wfLoadExtension( 'SecurePoll' );

# StaffEdits
wfLoadExtension( 'StaffEdits' );
$wgStaffEditsMessagePrefix = wsp;

# StaffPowers
wfLoadExtension( 'StaffPowers' );
$wgStaffPowersStewardGroupName = 'founder';

# WSOAuth
wfLoadExtension( 'WSOAuth' );
$wgOAuthUri = 'https://meta.wikimedia.org/w/index.php?title=Special:OAuth';

# CleanChanges
wfLoadExtension( 'CleanChanges' );
$wgCCTrailerFilter = true;
$wgCCUserFilter = false;
$wgDefaultUserOptions['usenewrc'] = 1;

#LocalisationUpdate
wfLoadExtension( 'LocalisationUpdate' );
$wgLocalisationUpdateDirectory = "$IP/cache";

# Translate
wfLoadExtension( 'Translate' );
$wgTranslateDocumentationLanguageCode = 'qqq';
$wgExtraLanguageNames['qqq'] = 'Message documentation'; # No linguistic content. Used for documenting messages

# CodeMirror
wfLoadExtension( 'CodeMirror' );
$wgDefaultUserOptions['usecodemirror'] = 1;

# UserMerge
wfLoadExtension( 'UserMerge' );
$wgUserMergeProtectedGroups = [ 'founder' ];

# PluggableAuth
wfLoadExtension( 'PluggableAuth' );
$wgPluggableAuth_EnableLocalLogin = true;
$wgPluggableAuth_EnableLocalProperties = true;

# ContactPage
wfLoadExtension( 'ContactPage' );
require_once ("$wspConfig/Contact.php");
