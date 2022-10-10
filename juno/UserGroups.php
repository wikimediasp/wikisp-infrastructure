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
$wgGroupPermissions['sysop']['pagetranslation'] = true;
$wgGroupPermissions['sysop']['translate-manage'] = true;
$wgGroupPermissions['sysop']['interwiki'] = true;
$wgGroupPermissions['sysop']['pagelang'] = true;
$wgGroupPermissions['sysop']['createaccount'] = false;

# TechCom
$wgGroupPermissions['techcom'] = $wgGroupPermissions['interface-admin'];
$wgGroupPermissions['techcom'] = array_merge(
    $wgGroupPermissions['techcom'],
    $wgGroupPermissions['sysop']
    );
$wgGroupsAddToSelf['techcom'] = array( 'checkuser', 'suppress' );
$wgGroupsRemoveFromSelf['techcom'] = array( 'checkuser', 'suppress' );
$wgGroupPermissions['techcom']['unblockable'] = true;
$wgGroupPermissions['techcom']['siteadmin'] = true;
$wgGroupPermissions['techcom']['usermerge'] = true;

# AdminCom
$wgGroupPermissions['admincom']['staffedit'] = true;
$wgAddGroups['admincom'] = ['checkuser', 'suppress', 'nomcom', 'admincom', 'techcom', 'staff'];
$wgRemoveGroups['admincom'] = ['checkuser', 'suppress', 'nomcom', 'techcom', 'staff'];
$wgGroupPermissions['admincom']['unblockable'] = true;

# NomCom
$wgGroupPermissions['nomcom']['securepoll-create-poll'] = true;
$wgGroupPermissions['electionadmin'] = [];

# Bureaucrats
$wgGroupPermissions['bureaucrat']['userrights'] = false;
$wgAddGroups['bureaucrat'] = ['sysop','bureaucrat','bot','interface-admin'];
$wgRemoveGroups['bureaucrat'] = ['sysop','bot','interface-admin'];
$wgGroupPermissions['bureaucrat']['usermerge'] = true;

# Founders
$wgGroupPermissions['founder']['userrights'] = true;
