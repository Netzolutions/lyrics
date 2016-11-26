<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'Netzcript.' . $_EXTKEY,
    'Lyrics',
    array(
        'Lyrics' => 'list, show, listByArtist',
    ),
    array(
        'Lyrics' => '',
        'Artist' => ''
    )
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'Netzcript.' . $_EXTKEY,
    'Artist',
    array(
        'Artist' => 'list, show',
    ),
    array(
        'Lyrics' => '',
        'Artist' => ''
    )
);
