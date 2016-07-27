<?php
namespace keythroy\BiddingsCrawler;

require_once 'vendor/autoload.php';

use Goutte\Client;

Class InstanceGoutte
{

    public static $instance;

    private function __construct() {
        //
    } 
    
    public static function getInstance() {
        
        if ( !isset( self::$instance ) ) {
            self::$instance = new Client();            
            
        }

        return self::$instance;
    }

}

