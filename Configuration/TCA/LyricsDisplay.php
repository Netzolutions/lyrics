<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$TCA['tx_lyrics_domain_model_lyricsdisplay'] = array(
	'ctrl' => $TCA['tx_lyrics_domain_model_lyricsdisplay']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, titel, text, tx_lyrics_label, composter, time, has_translation, translated_title, translated_text, translator',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, titel, text, tx_lyrics_label, composter, time, has_translation, translated_title, translated_text, translator,--div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access,starttime, endtime'),
	),
	'palettes' => array(
		'1' => array('showitem' => ''),
	),
	'columns' => array(
		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.xlf:LGL.default_value', 0)
				),
			),
		),
		'l10n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_lyrics_domain_model_lyricsdisplay',
				'foreign_table_where' => 'AND tx_lyrics_domain_model_lyricsdisplay.pid=###CURRENT_PID### AND tx_lyrics_domain_model_lyricsdisplay.sys_language_uid IN (-1,0)',
			),
		),
		'l10n_diffsource' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),
		't3ver_label' => array(
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'max' => 255,
			)
		),
		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
			'config' => array(
				'type' => 'check',
			),
		),
		'starttime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),
		'endtime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),
		'titel' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:lyrics/Resources/Private/Language/locallang_db.xlf:tx_lyrics_domain_model_lyricsdisplay.titel',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
		'text' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:lyrics/Resources/Private/Language/locallang_db.xlf:tx_lyrics_domain_model_lyricsdisplay.text',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim,required',
				'wizards' => array(
					'RTE' => array(
						'icon' => 'wizard_rte2.gif',
						'notNewRecords'=> 1,
						'RTEonly' => 1,
						'script' => 'wizard_rte.php',
						'title' => 'LLL:EXT:cms/locallang_ttc.xlf:bodytext.W.RTE',
						'type' => 'script'
					)
				)
			),
			'defaultExtras' => 'richtext:rte_transform[flag=rte_enabled|mode=ts]',
		),
		'tx_lyrics_label' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:lyrics/Resources/Private/Language/locallang_db.xlf:tx_lyrics_domain_model_lyricsdisplay.tx_lyrics_label',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'composter' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:lyrics/Resources/Private/Language/locallang_db.xlf:tx_lyrics_domain_model_lyricsdisplay.composter',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'time' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:lyrics/Resources/Private/Language/locallang_db.xlf:tx_lyrics_domain_model_lyricsdisplay.time',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'has_translation' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:lyrics/Resources/Private/Language/locallang_db.xlf:tx_lyrics_domain_model_lyricsdisplay.has_translation',
			'config' => array(
				'type' => 'check',
				'default' => 0
			),
		),
		'translated_title' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:lyrics/Resources/Private/Language/locallang_db.xlf:tx_lyrics_domain_model_lyricsdisplay.translated_title',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'translated_text' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:lyrics/Resources/Private/Language/locallang_db.xlf:tx_lyrics_domain_model_lyricsdisplay.translated_text',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim',
				'wizards' => array(
					'RTE' => array(
						'icon' => 'wizard_rte2.gif',
						'notNewRecords'=> 1,
						'RTEonly' => 1,
						'script' => 'wizard_rte.php',
						'title' => 'LLL:EXT:cms/locallang_ttc.xlf:bodytext.W.RTE',
						'type' => 'script'
					)
				)
			),
			'defaultExtras' => 'richtext:rte_transform[flag=rte_enabled|mode=ts]',
		),
		'translator' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:lyrics/Resources/Private/Language/locallang_db.xlf:tx_lyrics_domain_model_lyricsdisplay.translator',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
	),
);

?>