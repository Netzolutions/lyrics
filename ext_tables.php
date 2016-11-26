<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'Netzcript.' . $_EXTKEY,
    'Lyrics',
    'Lyrics '
);

$pluginSignature = str_replace('_','',$_EXTKEY) . '_lyrics';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($pluginSignature, 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/flexform_lyrics.xml');

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'Netzcript.' . $_EXTKEY,
    'Artist',
    'Artist'
);

$pluginSignature = str_replace('_','',$_EXTKEY) . '_artist';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($pluginSignature, 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/flexform_artist.xml');

if (TYPO3_MODE === 'BE') {

    /**
     * Registers a Backend Module
     */
    /*\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
        'Netzcript.' . $_EXTKEY,
        'web',     // Make module a submodule of 'web'
        'mod_lyrics',    // Submodule key
        '',                        // Position
        array(
            'Lyrics' => 'list, new, create, edit, update, delete',
        ),
        array(
            'access' => 'user,group',
            'icon' => 'EXT:' . $_EXTKEY . '/Resources/Public/Icons/' .
                (\TYPO3\CMS\Core\Utility\GeneralUtility::compat_version('7.0') ? 'module_lyrics.png' : 'mod_lyrics.gif'),
            'labels' => 'LLL:EXT:' . $_EXTKEY . '/Resources/Private/Language/locallang_lyrics.xlf',
        )
    );*/

}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Lyrics');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_lyrics_domain_model_lyrics', 'EXT:lyrics/Resources/Private/Language/locallang_csh_tx_lyrics_domain_model_lyrics.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_lyrics_domain_model_lyrics');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_lyrics_domain_model_artists', 'EXT:lyrics/Resources/Private/Language/locallang_csh_tx_lyrics_domain_model_artists.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_lyrics_domain_model_artists');