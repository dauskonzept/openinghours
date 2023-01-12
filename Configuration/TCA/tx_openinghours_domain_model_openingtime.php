<?php

return [
    'ctrl' => [
        'title' => 'LLL:EXT:openinghours/Resources/Private/Language/locallang_db.xlf:tx_openinghours_domain_model_openingtime',
        'label' => 'start',
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
        'searchFields' => '',
        'iconfile' => 'EXT:openinghours/Resources/Public/Icons/tx_openinghours_domain_model_openingtime.gif',
    ],
    'types' => [
        '1' => ['showitem' => '--palette--;;fields, --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language, sys_language_uid, l10n_parent, l10n_diffsource, --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access, hidden, starttime, endtime'],
    ],
    'palettes' => [
        'fields' => [
            'label' => 'LLL:EXT:openinghours/Resources/Private/Language/locallang.xlf:palette.fields.title',
            'showitem' => 'start, end, data',
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
                'foreign_table' => 'tx_openinghours_domain_model_openingtime',
                'foreign_table_where' => 'AND {#tx_openinghours_domain_model_openingtime}.{#pid}=###CURRENT_PID### AND {#tx_openinghours_domain_model_openingtime}.{#sys_language_uid} IN (-1,0)',
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
        'start' => [
            'exclude' => true,
            'label' => 'LLL:EXT:openinghours/Resources/Private/Language/locallang_db.xlf:tx_openinghours_domain_model_openingtime.start',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'dbType' => 'time',
                'size' => 4,
                'eval' => 'time,required',
                'default' => null,
            ],
        ],
        'end' => [
            'exclude' => true,
            'label' => 'LLL:EXT:openinghours/Resources/Private/Language/locallang_db.xlf:tx_openinghours_domain_model_openingtime.end',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'dbType' => 'time',
                'size' => 4,
                'eval' => 'time,required',
                'default' => null,
            ],
        ],
        'data' => [
            'exclude' => true,
            'label' => 'LLL:EXT:openinghours/Resources/Private/Language/locallang_db.xlf:tx_openinghours_domain_model_openingtime.data',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'default' => '',
            ],
        ],
        'monday' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        'tuesday' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        'wednesday' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        'thursday' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        'friday' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        'saturday' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        'sunday' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
    ],
];
