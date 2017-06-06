<?php

// Define routes provided by EXT:sms_cooluriclearcache
return [
    'smscooluriclearcache_clearcache' => [
        'path' => '/smscooluriclearcache/clearcache',
        'target' => \SMS\SmsCooluriclearcache\CooluriClearCache::class . '::clearCooluriCache'
    ]
];
