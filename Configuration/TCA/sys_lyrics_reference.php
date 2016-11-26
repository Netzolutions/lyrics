<?php
if (!defined('TYPO3_MODE')) {
    die ('Access denied.');
}

return [
    'ctrl' => [
        'title' => 'LLL:EXT:lyrics/Resources/Private/Language/locallang_db.xlf:sys_lyrics_reference',
        'label' => 'uid_local',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'dividers2tabs' => TRUE,
        'hideTable' => true,
        'sortby' => 'sorting',
        'delete' => 'deleted',
        'versioningWS' => true,
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'rootLevel' => -1,
        'shadowColumnsForMovePlaceholders' => 'tablenames,fieldname,uid_local,table_local,uid_foreign',
        'enablecolumns' => array(
            'disabled' => 'hidden'
        ),
        'security' => array(
            'ignoreWebMountRestriction' => true,
            'ignoreRootLevelRestriction' => true,
        ),
        'typeicon_classes' => array(
            'default' => 'mimetypes-other-other'
        ),
        'searchFields' => 'uid_local,uid_foreign,tablenames,fieldname,title,description,time'
    ],
    'interface' => [
        'showRecordFieldList' => 'hidden,uid_local,uid_foreign,tablenames,fieldname,sorting_foreign,table_local,title,description,time',
    ],
    'types' => [
        '1' => ['showitem' => 'title, time, description'],
    ],
    'palettes' => [
        '1' => ['showitem' => ''],
    ],
    'columns' => [
        't3ver_label' => array(
            'exclude' => 0,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
            'config' => array(
                'type' => 'input',
                'size' => '30',
                'max' => '30'
            )
        ),
        'sys_language_uid' => array(
            'exclude' => 0,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
            'config' => array(
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'sys_language',
                'foreign_table_where' => 'ORDER BY sys_language.title',
                'items' => array(
                    array('LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages', -1),
                    array('LLL:EXT:lang/locallang_general.xlf:LGL.default_value', 0)
                ),
                'default' => 0,
                'showIconTable' => true,
            )
        ),
        'l10n_parent' => array(
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'exclude' => 0,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
            'config' => array(
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => array(
                    array('', 0)
                ),
                'foreign_table' => 'sys_lyrics_reference',
                'foreign_table_where' => 'AND sys_lyrics_reference.uid=###REC_FIELD_l10n_parent### AND sys_lyrics_reference.sys_language_uid IN (-1,0)',
                'default' => 0
            )
        ),
        'l10n_diffsource' => array(
            'exclude' => 0,
            'config' => array(
                'type' => 'passthrough',
                'default' => ''
            )
        ),
        'hidden' => array(
            'exclude' => 0,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
            'config' => array(
                'type' => 'check',
                'default' => '0'
            )
        ),
        'uid_local' => array(
            'exclude' => 0,
            'label' => 'LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.uid_local',
            'config' => array(
                'type' => 'group',
                'internal_type' => 'db',
                'size' => 1,
                'eval' => 'int',
                'maxitems' => 1,
                'minitems' => 0,
                'allowed' => 'tx_lyrics_domain_model_lyrics'
            )
        ),
        'uid_foreign' => array(
            'exclude' => 0,
            'label' => 'LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.uid_foreign',
            'config' => array(
                'type' => 'input',
                'size' => '10',
                'eval' => 'int'
            )
        ),
        'tablenames' => array(
            'exclude' => 0,
            'label' => 'LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.tablenames',
            'config' => array(
                'type' => 'input',
                'size' => '30',
                'eval' => 'trim'
            )
        ),
        'fieldname' => array(
            'exclude' => 0,
            'label' => 'LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.fieldname',
            'config' => array(
                'type' => 'input',
                'size' => '30'
            )
        ),
        'table_local' => array(
            'exclude' => 0,
            'label' => 'LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.table_local',
            'config' => array(
                'type' => 'input',
                'size' => '20',
                'default' => 'tx_lyrics_domain_model_lyrics'
            )
        ),
        'sorting_foreign' => array(
            'exclude' => 0,
            'label' => 'LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.sorting_foreign',
            'config' => array(
                'type' => 'input',
                'size' => '4',
                'max' => '4',
                'eval' => 'int',
                'range' => array(
                    'upper' => '1000',
                    'lower' => '10'
                ),
                'default' => 0
            )
        ),
        'title' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:lyrics/Resources/Private/Language/locallang_db.xlf:tx_lyrics_domain_model_lyrics.title',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'null',
                'placeholder' => '__row|uid_local|title',
                'mode' => 'useOrOverridePlaceholder',
                'default' => null,
            ],
        ],
        'time' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:lyrics/Resources/Private/Language/locallang_db.xlf:tx_lyrics_domain_model_lyrics.time',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'null',
                'placeholder' => '__row|uid_local|time',
                'mode' => 'useOrOverridePlaceholder',
                'default' => null,
            ],
        ],
        'description' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:lyrics/Resources/Private/Language/locallang_db.xlf:sys_lyrics_reference.description',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
    ]
];