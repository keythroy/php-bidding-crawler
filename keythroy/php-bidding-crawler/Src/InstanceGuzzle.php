<?php
namespace keythroy\BiddingsCrawler;

require_once 'vendor/autoload.php';

use GGuzzleHttp\Client;

Class InstanceGuzzle
{

    public static $instance;

    private function __construct() {
        //
    } 
    
    public static function getInstance() {
        
        if ( !isset( self::$instance ) ) {
            self::$instance = new Client([
                'debug' => true, // only to troubleshoot
            ]);            
        }

        return self::$instance;
    }

}


