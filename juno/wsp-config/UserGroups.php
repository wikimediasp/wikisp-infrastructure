<?php

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
$wgGroupPermissions['sysop']['createaccount'] = false;
$wgGroupPermissions['sysop']['pagetranslation'] = true;
$wgGroupPermissions['sysop']['translate-manage'] = true;
$wgGroupPermissions['sysop']['interwiki'] = true;
$wgGroupPermissions['sysop']['pagelang'] = true;

# TechCom
$wgGroupsAddToSelf['techcom'] = array( 'checkuser', 'suppress' );
$wgGroupsRemoveFromSelf['techcom'] = array( 'checkuser', 'suppress' );
$wgGroupPermissions['techcom']['unblockable'] = true;
$wgGroupPermissions['techcom']['siteadmin'] = true;
$wgGroupPermissions['techcom']['usermerge'] = true;
$wgGroupPermissions['techcom'] = $wgGroupPermissions['interface-admin'];
$wgGroupPermissions['techcom'] = $wgGroupPermissions['sysop'];

# AdminCom
$wgGroupPermissions['admincom']['staffedit'] = true;
$wgAddGroups['admincom'] = ['checkuser', 'suppress', 'nomcom', 'admincom', 'techcom', 'staff'];
$wgRemoveGroups['admincom'] = ['checkuser', 'suppress', 'nomcom', 'techcom', 'staff'];
$wgGroupPermissions['admincom']['unblockable'] = true;

# NomCom
$wgGroupPermissions['nomcom']['securepoll-create-poll'] = true;

# Bureaucrats
$wgGroupPermissions['bureaucrat']['userrights'] = false;
$wgAddGroups['bureaucrat'] = ['sysop','bureaucrat','bot','interface-admin'];
$wgRemoveGroups['bureaucrat'] = ['sysop','bot','interface-admin'];
$wgGroupPermissions['bureaucrat']['usermerge'] = true;

# Founders
$wgGroupPermissions['founder']['userrights'] = true;
