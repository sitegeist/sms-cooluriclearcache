<?php

defined("TYPO3_MODE") or die("Access denied.");

$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['additionalBackendItems']['cacheActions']['clearCooluriCache']
    = \SMS\SmsCooluriclearcache\CooluriClearCache::class;
