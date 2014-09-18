<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$GLOBALS['TCA']['tx_lyrics_domain_model_lyrics'] = array(
	'ctrl' => $GLOBALS['TCA']['tx_lyrics_domain_model_lyrics']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, titel, text, vlabel, author, composer, time, has_translation, translated_title, translated_text, translator, artist',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, titel, text;;;richtext:rte_transform[mode=ts_links], vlabel, author, composer, time, has_translation, translated_title, translated_text;;;richtext:rte_transform[mode=ts_links], translator, artist, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime'),
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
				'foreign_table' => 'tx_lyrics_domain_model_lyrics',
				'foreign_table_where' => 'AND tx_lyrics_domain_model_lyrics.pid=###CURRENT_PID### AND tx_lyrics_domain_model_lyrics.sys_language_uid IN (-1,0)',
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
			'label' => 'LLL:EXT:lyrics/Resources/Private/Language/locallang_db.xlf:tx_lyrics_domain_model_lyrics.titel',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
		'text' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:lyrics/Resources/Private/Language/locallang_db.xlf:tx_lyrics_domain_model_lyrics.text',
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
		),
		'vlabel' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:lyrics/Resources/Private/Language/locallang_db.xlf:tx_lyrics_domain_model_lyrics.vlabel',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'author' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:lyrics/Resources/Private/Language/locallang_db.xlf:tx_lyrics_domain_model_lyrics.author',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'composer' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:lyrics/Resources/Private/Language/locallang_db.xlf:tx_lyrics_domain_model_lyrics.composer',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'time' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:lyrics/Resources/Private/Language/locallang_db.xlf:tx_lyrics_domain_model_lyrics.time',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'has_translation' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:lyrics/Resources/Private/Language/locallang_db.xlf:tx_lyrics_domain_model_lyrics.has_translation',
			'config' => array(
				'type' => 'check',
				'default' => 0
			)
		),
		'translated_title' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:lyrics/Resources/Private/Language/locallang_db.xlf:tx_lyrics_domain_model_lyrics.translated_title',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'translated_text' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:lyrics/Resources/Private/Language/locallang_db.xlf:tx_lyrics_domain_model_lyrics.translated_text',
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
		),
		'translator' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:lyrics/Resources/Private/Language/locallang_db.xlf:tx_lyrics_domain_model_lyrics.translator',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'artist' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:lyrics/Resources/Private/Language/locallang_db.xlf:tx_lyrics_domain_model_lyrics.artist',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_lyrics_domain_model_artists',
				'MM' => 'tx_lyrics_lyrics_artists_mm',
				'size' => 10,
				'autoSizeMax' => 30,
				'maxitems' => 9999,
				'multiple' => 0,
				'wizards' => array(
					'_PADDING' => 1,
					'_VERTICAL' => 1,
					'edit' => array(
						'type' => 'popup',
						'title' => 'Edit',
						'script' => 'wizard_edit.php',
						'icon' => 'edit2.gif',
						'popup_onlyOpenIfSelected' => 1,
						'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
						),
					'add' => Array(
						'type' => 'script',
						'title' => 'Create new',
						'icon' => 'add.gif',
						'params' => array(
							'table' => 'tx_lyrics_domain_model_artists',
							'pid' => '###CURRENT_PID###',
							'setValue' => 'prepend'
							),
						'script' => 'wizard_add.php',
					),
				),
			),
		),
		
	),
);
