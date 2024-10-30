<?php

CModule::AddAutoloadClasses(
    'gstatistic',
    [
        '\GStatistics\Api\KeepStatistic' => 'lib/Api/KeepStatistic.php',
        '\GStatistics\Api\Hit' => 'lib/Api/Hit.php',
        '\GStatistics\Api\StopList' => 'lib/Api/StopList.php',
        '\GStatistics\Http\HttpClient' => 'lib/Http/HttpClient.php',
        'gstatistic' => 'install/index.php',
    ]
);