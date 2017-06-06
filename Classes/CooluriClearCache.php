<?php

namespace SMS\SmsCooluriclearcache;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2017 Markus Kobligk <kobligk@sitegeist.de>
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

use TYPO3\CMS\Backend\Routing\UriBuilder;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Backend\Toolbar\ClearCacheActionsHookInterface;

class CooluriClearCache implements ClearCacheActionsHookInterface
{
    /**
     * Add a custom cache menu entry for invalidating the cooluri URL cache.
     *
     * @param array $cacheActions
     * @param array $optionValues
     *
     * @author Markus Kobligk <kobligk@sitegeist.de>
     */
    public function manipulateCacheActions(&$cacheActions, &$optionValues)
    {
        if ($GLOBALS['BE_USER']->isAdmin() || $GLOBALS['BE_USER']->getTSConfigVal('options.clearCache.cooluri')) {
            $uriBuilder = GeneralUtility::makeInstance(UriBuilder::class);
            $optionValues[] = 'clearCooluriCache';
            
            $cacheActions[] = [
                'id' => 'clearCooluriCache',
                'title' => 'LLL:EXT:sms_cooluriclearcache/Resources/Private/Language/locallang_db.xlf:title',
                'href' => $uriBuilder->buildUriFromRoute('ajax_smscooluriclearcache_clearcache'),
                'iconIdentifier' => 'actions-system-cache-clear-impact-low'
            ];
        }
    }
    
    /**
     * Update the timestamp for all cached URLs to zero.
     * Every URL will be regenerated the next time it is called via FE then.
     *
     * @author Markus Kobligk <kobligk@sitegeist.de>
     */
    public function clearCooluriCache()
    {
        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable('link_cache');
        $queryBuilder
            ->update('link_cache')
            ->set('tstamp', '0000-00-00 00:00:00')
            ->execute();
    }
}
