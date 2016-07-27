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
        print "\n..::: Reading  :::.. {$this->base_url} .. :::\n\n";
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
       
   /*
  name: Concorrência - 007/2016 - MG
    origin: SEBRAE
    attachments:

        Name: Instrumento Convocatório
        File: storage/files/sebrae/902595f6721de8c52dc924539eab5333feff697.pdf
        Name: Anexo IA - Marca SEBRAE
        File: storage/files/sebrae/210059c5abe126a582534e42aa7327603cffd513.pdf
        Name: Anexo IA - Marca SEBRAE
        File: storage/files/sebrae/c95dd50e4f1622c8638db6819b010bc1127dadce.pdf
        Name: Anexo IA - Marca SEBRAE
        File: storage/files/sebrae/582dcf05ee2d4fc4da33f3cde5a8172e66d23f0e.pdf

    object: Contratação de Agência de Propaganda, especializada, em regime de não exclusividade, para prestação de serviços de publicidade para o SEBRAE-MG
    starting_date: 09/05/2016 às10:00 h
        */
    
    abstract function formatResponseHtmlToJson();
    
    abstract function search($param);
        
}
