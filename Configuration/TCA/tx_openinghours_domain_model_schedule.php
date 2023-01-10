<?php

return [
    'ctrl' => [
        'title' => 'LLL:EXT:openinghours/Resources/Private/Language/locallang_db.xlf:tx_openinghours_domain_model_schedule',
        'label' => 'title',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
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
        'searchFields' => 'title',
        'iconfile' => 'EXT:openinghours/Resources/Public/Icons/tx_openinghours_domain_model_schedule.gif',
    ],
    'types' => [
        '1' => ['showitem' => 'title, startdate, enddate, --div--;Opening hours, monday, tuesday, wednesday, thursday, friday, saturday, sunday, --div--;Exceptions, exceptions, --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language, sys_language_uid, l10n_parent, l10n_diffsource, --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access, hidden, starttime, endtime'],
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
                'foreign_table' => 'tx_openinghours_domain_model_schedule',
                'foreign_table_where' => 'AND {#tx_openinghours_domain_model_schedule}.{#pid}=###CURRENT_PID### AND {#tx_openinghours_domain_model_schedule}.{#sys_language_uid} IN (-1,0)',
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
        'categories' => [
            'config'=> [
                'type' => 'category',
            ],
        ],
        'title' => [
            'exclude' => true,
            'label' => 'LLL:EXT:openinghours/Resources/Private/Language/locallang_db.xlf:tx_openinghours_domain_model_schedule.title',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required',
                'default' => '',
            ],
        ],
        'startdate' => [
            'exclude' => true,
            'label' => 'LLL:EXT:openinghours/Resources/Private/Language/locallang_db.xlf:tx_openinghours_domain_model_schedule.startdate',
            'config' => [
                'dbType' => 'int',
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'size' => 12,
                'eval' => 'datetime,required',
                'default' => null,
            ],
        ],
        'enddate' => [
            'exclude' => true,
            'label' => 'LLL:EXT:openinghours/Resources/Private/Language/locallang_db.xlf:tx_openinghours_domain_model_schedule.enddate',
            'config' => [
                'dbType' => 'int',
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'size' => 12,
                'eval' => 'datetime,required',
                'default' => null,
            ],
        ],
        'monday' => [
            'exclude' => true,
            'label' => 'LLL:EXT:openinghours/Resources/Private/Language/locallang_db.xlf:tx_openinghours_domain_model_schedule.monday',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_openinghours_domain_model_openingtime',
                'foreign_field' => 'monday',
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
        'tuesday' => [
            'exclude' => true,
            'label' => 'LLL:EXT:openinghours/Resources/Private/Language/locallang_db.xlf:tx_openinghours_domain_model_schedule.tuesday',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_openinghours_domain_model_openingtime',
                'foreign_field' => 'tuesday',
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
        'wednesday' => [
            'exclude' => true,
            'label' => 'LLL:EXT:openinghours/Resources/Private/Language/locallang_db.xlf:tx_openinghours_domain_model_schedule.wednesday',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_openinghours_domain_model_openingtime',
                'foreign_field' => 'wednesday',
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
        'thursday' => [
            'exclude' => true,
            'label' => 'LLL:EXT:openinghours/Resources/Private/Language/locallang_db.xlf:tx_openinghours_domain_model_schedule.thursday',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_openinghours_domain_model_openingtime',
                'foreign_field' => 'thursday',
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
        'friday' => [
            'exclude' => true,
            'label' => 'LLL:EXT:openinghours/Resources/Private/Language/locallang_db.xlf:tx_openinghours_domain_model_schedule.friday',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_openinghours_domain_model_openingtime',
                'foreign_field' => 'friday',
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
        'saturday' => [
            'exclude' => true,
            'label' => 'LLL:EXT:openinghours/Resources/Private/Language/locallang_db.xlf:tx_openinghours_domain_model_schedule.saturday',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_openinghours_domain_model_openingtime',
                'foreign_field' => 'saturday',
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
        'sunday' => [
            'exclude' => true,
            'label' => 'LLL:EXT:openinghours/Resources/Private/Language/locallang_db.xlf:tx_openinghours_domain_model_schedule.sunday',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_openinghours_domain_model_openingtime',
                'foreign_field' => 'sunday',
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

        'exceptions' => [
            'exclude' => true,
            'label' => 'LLL:EXT:openinghours/Resources/Private/Language/locallang_db.xlf:tx_openinghours_domain_model_schedule.exceptions',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_openinghours_domain_model_exception',
                'foreign_field' => 'schedule',
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
