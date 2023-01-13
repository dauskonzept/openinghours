<?php

return [
    'ctrl' => [
        'title' => 'LLL:EXT:openinghours/Resources/Private/Language/locallang_db.xlf:tx_openinghours_domain_model_exception',
        'label' => 'date',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'sortby' => 'sorting',
        'hideTable' => true,
        'versioningWS' => true,
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ],
        'searchFields' => 'date',
        'iconfile' => 'EXT:openinghours/Resources/Public/Icons/tx_openinghours_domain_model_exception.gif',
    ],
    'types' => [
        '1' => ['showitem' => '--palette--;;fields, openinghours, --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language, sys_language_uid, l10n_parent, l10n_diffsource, --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access, hidden, starttime, endtime'],
    ],
    'palettes' => [
        'fields' => [
            'label' => 'LLL:EXT:openinghours/Resources/Private/Language/locallang.xlf:palette.fields.title',
            'showitem' => 'date, data',
        ],
    ],
    'columns' => [
        'sys_language_uid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'language',
            ],
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'default' => 0,
                'items' => [
                    ['', 0],
                ],
                'foreign_table' => 'tx_openinghours_domain_model_exception',
                'foreign_table_where' => 'AND {#tx_openinghours_domain_model_exception}.{#pid}=###CURRENT_PID### AND {#tx_openinghours_domain_model_exception}.{#sys_language_uid} IN (-1,0)',
            ],
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.visible',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'items' => [
                    [
                        0 => '',
                        1 => '',
                        'invertStateDisplay' => true,
                    ],
                ],
            ],
        ],
        'starttime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime,int',
                'default' => 0,
                'behaviour' => [
                    'allowLanguageSynchronization' => true,
                ],
            ],
        ],
        'endtime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.endtime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime,int',
                'default' => 0,
                'range' => [
                    'upper' => mktime(0, 0, 0, 1, 1, 2038),
                ],
                'behaviour' => [
                    'allowLanguageSynchronization' => true,
                ],
            ],
        ],
        'date' => [
            'exclude' => true,
            'label' => 'LLL:EXT:openinghours/Resources/Private/Language/locallang_db.xlf:tx_openinghours_domain_model_exception.date',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'dbType' => 'date',
                'size' => 4,
                'eval' => 'date',
                'default' => null,
            ],
        ],
        'data' => [
            'exclude' => true,
            'label' => 'LLL:EXT:openinghours/Resources/Private/Language/locallang_db.xlf:tx_openinghours_domain_model_exception.data',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'default' => '',
            ],
        ],
        'openinghours' => [
            'exclude' => true,
            'label' => 'LLL:EXT:openinghours/Resources/Private/Language/locallang_db.xlf:tx_openinghours_domain_model_exception.openinghours',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_openinghours_domain_model_openingtime',
                'foreign_field' => 'exception',
                'foreign_sortby' => 'sorting',
                'maxitems' => 9999,
                'appearance' => [
                    'collapseAll' => 1,
                    'levelLinksPosition' => 'top',
                    'showSynchronizationLink' => 1,
                    'showPossibleLocalizationRecords' => 1,
                    'useSortable' => 1,
                    'showAllLocalizationLink' => 1,
                ],
            ],
        ],
    ],
];
