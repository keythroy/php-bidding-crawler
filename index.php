<?php
namespace keythroy\BiddingsCrawler;

require_once 'vendor/autoload.php';
require_once 'config.php';
require_once 'CnpqBiddings.php';
require_once 'SebraeBiddings.php';

use keythroy\BiddingsCrawler\CnpqBiddings;
//use keythroy\BiddingsCrawler\SebraeBiddings;

print "Busca:";
$handle = fopen ("php://stdin","r");
$busca = fgets($handle);

print "Ano:";
$handle = fopen ("php://stdin","r");
$ano = fgets($handle);

$CNPQ = new CnpqBiddings();
$CNPQ->search([  //not working yet
     'ano' => $ano,
    'busca' => $busca
]);
print $CNPQ->getResponse()."\n\n";


//$SEBRAE = new SebraeBiddings();
////$SEBRAE->search([ //not working yet
////     'ano' => $year,
////    'termo' => $word
////]);
//print $SEBRAE->getResponse()."\n\n\n";
$response = "..::: Reading :::.. http://www.sebrae.com.br/canaldofornecedor ..:::\n ";
$response .=  "\n######     Sebrae  ######\n";
$response .= "{ name: Concorrência - 000/2010 - MG, origin: SEBRAE, attachments: ...}\n\n";
print $response;
