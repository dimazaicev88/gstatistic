<?php

CModule::AddAutoloadClasses(
    'gstatistic',
    [
        '\GStatistics\Api\KeepStatistic' => 'lib/Api/KeepStatistic.php',
        '\GStatistics\Http\HttpClient' => 'lib/Http/HttpClient.php',
        'gstatistic' => 'install/index.php',
    ]
);