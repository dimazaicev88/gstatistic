<?php

CModule::AddAutoloadClasses(
    'gstatistic',
    [
        '\GStatistics\Api\KeepStatistic' => 'lib/Api/KeepStatistic.php',
        'GStatistics\Api\Hit' => 'lib/Api/Hit.php',
        '\GStatistics\Http\HttpClient' => 'lib/Http/HttpClient.php',
//        'CAllStatistics' => 'classes/general/statistic.php',
//        'GStatistics' => 'classes/general/statistic.php',
//        'GAdv' => 'classes/general/GAdv.php',
//        'GGuest' => 'classes/general/GGuest.php',
//        'GTraffic' => 'classes/general/GTraffic.php',
//        'GUserOnline' => 'classes/general/GUserOnline.php',
        'Stoplist' => 'lib/StopList.php',
//        'GHit' => 'classes/general/GHit.php',
//        'GSession' => 'classes/general/GSession.php',
//        'GReferer' => 'classes/general/GReferer.php',
//        'GPhrase' => 'classes/general/GPhrase.php',
//        'GSearcher' => 'classes/general/GSearcher.php',
//        'GSearcherHit' => 'classes/general/GSearcherHit.php',
//        'GPage' => 'classes/general/GPage.php',
//        'GStatEvent' => 'classes/general/GStatEvent.php',
//        'GStatEventType' => 'classes/general/GStatEventType.php',
//        'GAutoDetect' => 'classes/general/GAutoDetect.php',
//        'GCountry' => 'classes/general/GCountry.php',
//        'GCity' => 'classes/general/GCity.php',
//        'GStatRegion' => 'classes/general/city.php',
//        'GPath' => 'classes/general/GPath.php',
//        'GStat' => 'classes/general/statistic_old.php',
//        'GVisit' => 'classes/general/statistic_old.php',
//        'GStatCountry' => 'classes/general/statistic_old.php',
//        'GAllStatistic' => 'classes/general/statistic_old.php',
//        'GStatistic' => 'classes/general/GStatistic.php',
//        'GStatResult' => 'classes/general/statresult.php',

        '\GStatistics\Filter\Operators' => 'lib/Filter/Operators.php',
        '\GStatistics\Filter\Base' => 'lib/Filter/Base.php',
        '\GStatistics\Filter\Hit' => 'lib/Filter/Hit.php',
        'gstatistic' => 'install/index.php',
    ]
);