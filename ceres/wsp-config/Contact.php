<?php
$wgContactConfig['default'] = array(
	'RecipientUser' => null, // Must be the name of a valid account which also has a verified e-mail-address added to it.
	'SenderName' => 'Contact Form on ' . $wgSitename, // "Contact Form on" needs to be translated
	'SenderEmail' => 'hello@wikisp.org', // Defaults to $wgPasswordSender, may be changed as required
	'RequireDetails' => true, // Either "true" or "false" as required
	'IncludeIP' => true, // Either "true" or "false" as required
	'MustBeLoggedIn' => true, // Check if the user is logged in before rendering the form
	'AdditionalFields' => array(
		'Text' => array(
			'label-message' => 'emailmessage',
			'type' => 'textarea',
			'rows' => 20,
			'required' => true,  // Either "true" or "false" as required
		),
	),
        // Added in MW 1.26
	'DisplayFormat' => 'table',  // See HTMLForm documentation for available values.
	'RLModules' => array(),  // Resource loader modules to add to the form display page.
	'RLStyleModules' => array(),  // Resource loader CSS modules to add to the form display page.
);
