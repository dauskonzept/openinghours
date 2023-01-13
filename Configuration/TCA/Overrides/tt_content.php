<?php

defined('TYPO3') || die();

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
    'openinghours',
    'Configuration/TypoScript',
    'Opening hours'
);

// show FlexForm field in plugin configuration
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['openinghours_pi1'] = 'pi_flexform';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['openinghours_pi3'] = 'pi_flexform';

// Add plugins
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItemGroup(
    'tt_content',
    'list_type',
    'openinghours',
    'LLL:EXT:openinghours/Resources/Private/Language/locallang_mod.xlf:mlang_tabs_tab',
    'after:default'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
    'tt_content',
    'list_type',
    [
        'LLL:EXT:openinghours/Resources/Private/Language/locallang_db.xlf:tt_content.list_type_pi1',
        'openinghours_pi1',
        'actions-clock',
        'openinghours',
    ]
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
    'tt_content',
    'list_type',
    [
        'LLL:EXT:openinghours/Resources/Private/Language/locallang_db.xlf:tt_content.list_type_pi2',
        'openinghours_pi2',
        'actions-clock',
        'openinghours',
    ]
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
    'tt_content',
    'list_type',
    [
        'LLL:EXT:openinghours/Resources/Private/Language/locallang_db.xlf:tt_content.list_type_pi3',
        'openinghours_pi3',
        'actions-clock',
        'openinghours',
    ]
);

// Configure FlexForm field
TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
    'openinghours_pi1',
    'FILE:EXT:openinghours/Configuration/FlexForms/flexform_pi1.xml'
);

TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
    'openinghours_pi3',
    'FILE:EXT:openinghours/Configuration/FlexForms/flexform_pi3.xml'
);
