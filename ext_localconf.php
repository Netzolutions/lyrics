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
        'Artists' => ''
    )
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'Netzcript.' . $_EXTKEY,
    'Artist',
    array(
        'Artists' => 'list, show',
    ),
    array(
        'Lyrics' => '',
        'Artists' => ''
    )
);
