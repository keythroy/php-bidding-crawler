<?php
namespace LicitacaoCrawler;

require_once 'vendor/autoload.php';

use LicitacaoCrawler\ICrawler;
use LicitacaoCrawler\CrawlerConect;

abstract class AbstractLicitacaoCrawler implements ICrawler
{
    private $base_url;
    private $crawler;
    private $client;
    
    
    abstract public function __construct($url) {
        $this->set_url($url);
    }
    
    private function setUrl($url) {
        $this->base_url = $url;
    }
    
    public function executaLeitura(){
        
        print "\nLendo {$this->base_url}\n\n";
        
                try {
                        $this->client = CrawlerConect::getInstance();
                        $this->crawler = $this->client->request('GET', 'http://www.cnpq.br/web/guest/licitacoes');
                       
                        return ( $this->verificaUrl ) ? $this->crawler : FALSE;

                        
                        
               } catch (Exception $exc) {
                   echo $exc->getTraceAsString();
               }
        }
        
        private function verificaUrl(){
                $status_code = $this->client->getResponse()->getStatus();
                ($status_code==200) ? TRUE : FALSE;
        }
            
}