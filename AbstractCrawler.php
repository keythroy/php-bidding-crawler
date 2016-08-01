<?php
namespace keythroy\BiddingsCrawler;

require_once 'vendor/autoload.php';
require_once 'ICrawler.php';
require_once 'InstanceGoutte.php';

use keythroy\BiddingsCrawler\ICrawler;
use keythroy\BiddingsCrawler\InstanceGoutte;

abstract class AbstractCrawler implements ICrawler{
    
    protected $base_url;
    protected $crawler;
    protected $client;
    protected $form;
    protected $formCrawler;
    protected $response;
    
    public function setBaseUrl($url) {
        $this->base_url = $url;
    }

    public function checkUrl(){
        $status_code = $this->client->getResponse()->getStatus();
        ($status_code==200) ? TRUE : FALSE;
    }
    
    public function getTarget(){
        print "\n..::: Reading  :::.. {$this->base_url} ..:::\n\n";
        try {
            $this->client = InstanceGoutte::getInstance();
            $this->crawler = $this->client->request('GET', $this->base_url);
            //echo  "{$this->getTitle()}\n\n";
                return TRUE;
            } catch (Exception $exc) {
            return $exc->message();
        }
     }
        
    public function getTitle(){
        return $this->crawler->filterXPath('html/head/title')->text();
    }
     
    abstract function formatResponseHtmlToJson();
    
    abstract function search($param);
        
}
