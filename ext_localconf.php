<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Netscript.' . $_EXTKEY,
	'Lyrics',
	array(
		'Lyrics' => 'list, show',
		
	),
	// non-cacheable actions
	array(
		'Lyrics' => 'create, update, delete',
		'Artists' => 'create, update, delete',
		
	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Netscript.' . $_EXTKEY,
	'Artist',
	array(
		'Artists' => 'list, show',
		
	),
	// non-cacheable actions
	array(
		'Lyrics' => 'create, update, delete',
		'Artists' => 'create, update, delete',
		
	)
);
