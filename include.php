<?php

CModule::AddAutoloadClasses(
    'gstatistic',
    [

        //------------------------- Api ----------------------------------
        '\GStatistics\Api\KeepStatistic' => 'lib/Api/KeepStatistic.php',
        'GStatistics\Api\Hit' => 'lib/Api/Hit.php',
        'GStatistics\Api\Guest' => 'lib/Api/Guest.php',
        'GStatistics\Api\Page' => 'lib/Api/Page.php',
        'GStatistics\Api\Path' => 'lib/Api/Path.php',
        'GStatistics\Api\Phrase' => 'lib/Api/Phrase.php',
        'GStatistics\Api\Referer' => 'lib/Api/Referer.php',
        'GStatistics\Api\Searcher' => 'lib/Api/Searcher.php',
        'GStatistics\Api\SearcherHit' => 'lib/Api/SearcherHit.php',
        'GStatistics\Api\Session' => 'lib/Api/Session.php',
        'GStatistics\Api\StatEvent' => 'lib/Api/StatEvent.php',
        'GStatistics\Api\StopList' => 'lib/Api/StopList.php',

        //------------------------- Filter --------------------------------
        '\GStatistics\Filter\Adv' => 'lib/Filter/Adv.php',
        '\GStatistics\Filter\AdvDataType' => 'lib/Filter/AdvDataType.php',
        '\GStatistics\Filter\Base' => 'lib/Filter/Base.php',
        '\GStatistics\Filter\City' => 'lib/Filter/City.php',
        '\GStatistics\Filter\Country' => 'lib/Filter/Country.php',
        '\GStatistics\Filter\Guest' => 'lib/Filter/Guest.php',
        '\GStatistics\Filter\Hit' => 'lib/Filter/Hit.php',
        '\GStatistics\Filter\Operators' => 'lib/Filter/Operators.php',
        '\GStatistics\Filter\Page' => 'lib/Filter/Page.php',
        '\GStatistics\Filter\Path' => 'lib/Filter/Path.php',
        '\GStatistics\Filter\Phrase' => 'lib/Filter/Phrase.php',
        '\GStatistics\Filter\Referer' => 'lib/Filter/Referer.php',
        '\GStatistics\Filter\Searcher' => 'lib/Filter/Searcher.php',
        '\GStatistics\Filter\SearcherHit' => 'lib/Filter/SearcherHit.php',
        '\GStatistics\Filter\Session' => 'lib/Filter/Session.php',
        '\GStatistics\Filter\StatEvent' => 'lib/Filter/StatEvent.php',
        '\GStatistics\Filter\StatEventType' => 'lib/Filter/StatEventType.php',
        '\GStatistics\Filter\StopList' => 'lib/Filter/StopList.php',

        //------------------------- Http --------------------------------
        '\GStatistics\Http\HttpClient' => 'lib/Http/HttpClient.php',

        'gstatistic' => 'install/index.php',
    ]
);