<?php
require_once 'vendor/autoload.php';


    
    # imprime o titulo da pagina
    echo $crawler->filterXPath('html/head/title')->text();
    echo "\n\n";
    
    $titulos = [];
    $licitacoes =  $crawler->filter('h4.titLicitacoes')->each(function ($node, $i) use($titulos) {
        print $node->text()."\n";
    });
        
    /***
     * 
     * 
     * $crawler->filter('h1')->each(function(Symfony\Component\DomCrawler\Crawler $node, $i) use($h1_contents) {
                $h1_contents[$i] = trim($node->text());
        });
     * 
     * 
     * name: Concorrência - 007/2016 - MG
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
    
}

