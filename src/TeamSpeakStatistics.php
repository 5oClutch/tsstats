<?php

namespace Ts3stats;
use GuzzleHttp\Client;

/**
 * Here is where we can add the servers to the api,
 * and get all the Teamspeak server user data.
 * Teamspeak server data updates every 30 minutes
 */
class TeamSpeakStatistics
{

    /**
     * Create a new TeamSpeakStatistics Instance
     */
    public function __construct()
    {

    }

    /**
     * Send server ip to the api start getting the teamspeak stats.
     *
     * @param   string $server Teamspeak server ip
     * @example examples/addServer.php 6 2 addServer Example
     */
    public function addServer($server)
    {
        header('Content-Type: application/json');
        $client = new Client();
        $response = $client->request(
            'POST', 'http://ts3stats.tk/api/addserver', [
            'form_params' => [
            'server' => $server,
            ]
            ]
        );

        return $response->getBody()->getContents();
    }

    /**
     * 
     * Check if the server has any data in the database.
     * 
     *
     * @param   string $server Teamspeak server ip
     * @example examples/checkServerData.php 6 2 checkServerData Example
     * @return  boolean
     */
    public function checkServerData($server)
    {
        $client = new Client();
        $response = $client->get('http://ts3stats.tk/api/' . $server)->getBody();
        //header('Content-Type: application/json');
        //$response = json_decode($response->getContents());
        $response = json_decode($response->getContents());
        if($response->error == "Server Does Not Exist In Our Recordings") {
            return 'false';
        }
        return 'true';
    }

    /**
     * Get all that data of the clients on the server from the api.
     *
     * @param   string $server Teamspeak server ip
     * @example examples/getServerClients.php 6 2 getServerClients Example
     */
    public function getServerClients($server)
    {
        $client = new Client();
        $response = $client->get('http://ts3stats.tk/api/' . $server)->getBody();
        header('Content-Type: application/json');
        return $response->getContents();
    }
    /**
     * Get all that data of the clients on the server from the api in graphical representation.
     *
     * @param   string $server Teamspeak server ip
     * @example examples/getServerClientsGraph.php 6 2 getServerClientsGraph Example
     */
    public function getServerClientsGraph($server)
    {
        $client = new Client();
        $response = $client->get('http://ts3stats.tk/'.$server)->getBody();
        return $response->getContents();
    }

    /**
     * Get the average players on the teamspeak server today.
     *
     * @param   string $server Teamspeak server ip
     * @example examples/currentDayAverage.php 6 2 currentDayAverage Example 
     */
    public function currentDayAverage($server)
    {
        $client = new Client();
        $response = $client->get('http://ts3stats.tk/api/' . $server . '/avg/today')->getBody();
        header('Content-Type: application/json');
        return $response->getContents();
    }
}
