<?php

defined('TYPO3') || die();

(static function () {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_openinghours_domain_model_schedule', 'EXT:openinghours/Resources/Private/Language/locallang_csh_tx_openinghours_domain_model_schedule.xlf');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_openinghours_domain_model_schedule');

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_openinghours_domain_model_openingtime', 'EXT:openinghours/Resources/Private/Language/locallang_csh_tx_openinghours_domain_model_openingtime.xlf');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_openinghours_domain_model_openingtime');

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_openinghours_domain_model_exception', 'EXT:openinghours/Resources/Private/Language/locallang_csh_tx_openinghours_domain_model_exception.xlf');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_openinghours_domain_model_exception');
})();
