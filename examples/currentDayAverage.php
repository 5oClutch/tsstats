<?php
require '../vendor/autoload.php';

use Ts3stats\TeamSpeakStatistics;

$server = new TeamSpeakStatistics();
echo $server->currentDayAverage('ts.example.com');
 ?>
