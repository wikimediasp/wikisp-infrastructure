<?php
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
