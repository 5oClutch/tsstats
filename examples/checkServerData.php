<?php
require '../vendor/autoload.php';

use nisarg\ts3stats\TeamSpeakStatistics;

$server = new TeamSpeakStatistics();
echo $server->checkServerData('ts.example.com');
    ?>
