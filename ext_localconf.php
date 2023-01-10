<?php

defined('TYPO3') || die();

(static function () {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'Openinghours',
        'Pi1',
        [
            \DSKZPT\Openinghours\Controller\ScheduleController::class => 'table',
        ],
        // non-cacheable actions
        [
            \DSKZPT\Openinghours\Controller\ScheduleController::class => '',
        ]
    );

    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'Openinghours',
        'Pi2',
        [
            \DSKZPT\Openinghours\Controller\ScheduleController::class => 'currentOpenRange',
        ],
        // non-cacheable actions
        [
            \DSKZPT\Openinghours\Controller\ScheduleController::class => '',
        ]
    );

    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'Openinghours',
        'Pi3',
        [
            \DSKZPT\Openinghours\Controller\ScheduleController::class => 'exceptions',
        ],
        // non-cacheable actions
        [
            \DSKZPT\Openinghours\Controller\ScheduleController::class => '',
        ]
    );

    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    list {
                        iconIdentifier = openinghours-plugin-list
                        title = LLL:EXT:openinghours/Resources/Private/Language/locallang_db.xlf:tx_openinghours_list.name
                        description = LLL:EXT:openinghours/Resources/Private/Language/locallang_db.xlf:tx_openinghours_list.description
                        tt_content_defValues {
                            CType = list
                            list_type = openinghours_list
                        }
                    }
                }
                show = *
            }
       }'
    );
})();
