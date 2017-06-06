<?php


$EM_CONF[$_EXTKEY] = array(
    'title' => 'SMS CoolURI clear cache',
    'description' => 'Adds a button to the clear cache menu for invalidating all cached links in CoolURI.',
    'category' => 'be',
    'shy' => 0,
    'version' => '1.0.0',
    'dependencies' => '',
    'conflicts' => '',
    'priority' => '',
    'loadOrder' => '',
    'module' => '',
    'state' => 'stable',
    'uploadfolder' => 0,
    'createDirs' => '',
    'modify_tables' => '',
    'clearcacheonload' => 0,
    'lockType' => '',
    'author' => 'Markus Kobligk',
    'author_email' => 'kobligk@sitegeist.de',
    'author_company' => 'sitegeist media solutions GmbH',
    'constraints' => array(
        'depends' => array(
            'typo3' => '8.7.0-8.99.99'
        ),
        'conflicts' => array(),
        'suggests' => array(),
    ),
);
