<?php
namespace keythroy\BiddingsCrawler;

require_once 'vendor/autoload.php';
require_once 'AbstractCrawler.PHP';

use Keythroy\BiddingsCrawler\AbstractCrawler;
use Sunra\PhpSimple\HtmlDomParser;

class CnpqBiddings extends AbstractCrawler
{
    public function __construct() {
         $this->setBaseUrl('http://www.cnpq.br/web/guest/licitacoes');
         $this->getTarget();
         $this->checkUrl();
    }
    
    
    /**
     Array param[
            'busca-solicitacoes' => $param['busca-solicitacoes'], 
            'filtro-ano' => $param['filtro-ano'],
            'filtro-categoria' => $param['filtro-ano']
     ];
     */    
    public function search($param){ 
        
        $this->form = $this->crawler->filter('form[id=formLicit]')->form();
        
        if(isset( $param['filtro-ano'] )){
            //$this->form['filtro-ano']->select($param['filtro-ano']);
        }
        
        //params ...
        
        $this->formCrawler = $this->client->submit( $this->form );
        $this->response = $this->formatResponseHtmlToJson();
        
        //$this-> = $this->formatResponseHtml($strHtml);
        
        
        return TRUE;
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
    public function formatResponseHtmlToJson(){
        //return '{ name: Concorrência - 007/2016 - MG, origin: CNPQ, attachments: ...}';
//        return $html;
    }
    public function getResponse(){
        
        $html = HtmlDomParser::str_get_html( $this->formCrawler->html() );
        echo  "\n######     CNPQ  ######\n";
        //$this->response = $this->formatResponseHtmlToJson();
       // $response .= "\n$this->response\n\n";
       $response = $html->find('div[class=licitacoes] > h4.titLicitacao');
       foreach($response as $licitacao){
           echo $licitacao."\n"; 
       }
       
    }
}
