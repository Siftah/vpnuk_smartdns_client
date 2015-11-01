<?php
require_once __DIR__.'/vendor/autoload.php';
require_once __DIR__.'config.php';
use Goutte\Client;
$hoy = date("Y-m-d H:i:s");

$client = new Client();
$crawler = $client->request('GET', 'https://clientcp.vpnuk.info/vpnuk/clients/index.php');
$form = $crawler->selectButton('Login')->form();
$crawler = $client->submit($form, array('username' => 'vpnuk48161', 'password' => 'zedo65ne'));
//$crawler = $client->click($crawler->selectLink('IP Address Check-in')->link());
$crawler = $client->request('GET', 'https://clientcp.vpnuk.info/vpnuk/clients/main.php?mod=sd&s=c');
//$crawler->filter('#ccp_content > table ')->each(function ($node) {
// /   echo $node->text()."\r\n";
//});
$crawler = $client->click($crawler->selectLink('Disable')->link());
$crawler = $client->request('GET', 'https://clientcp.vpnuk.info/vpnuk/clients/main.php?mod=sd&s=c');
$crawler = $client->click($crawler->selectLink('Remove')->link());
$crawler = $client->request('GET', 'https://clientcp.vpnuk.info/vpnuk/clients/main.php?mod=sd&s=c');
$form = $crawler->selectButton('Enable')->form();
$crawler = $client->submit($form, array('fn' => $hoy));
$crawler = $client->click($crawler->selectLink('LOG OUT OF CLIENT CP')->link());

//var_dump($client->getResponse()->getContent());


//#ccp_content > table > tbody > tr > td:nth-child(5) > a:nth-child(2)
//$crawler = $client->click($crawler->selectLink('Disable')->link());
//sleep(2);
//$crawler = $client->click($crawler->selectLink('Remove')->link());
//sleep(2);
//$form = $crawler->selectButton('Enable')->form();
//$crawler = $client->submit($form, array('fn' => $hoy));
//$crawler = $client->click($crawler->selectLink('LOG OUT OF CLIENT CP')->link());

/*
// Get the latest post in this category and display the titles
$crawler->filter('h2 > a')->each(function ($node) {
    print $node->text()."\n";
});

$crawler = $client->request('GET', 'http://github.com/');
$crawler = $client->click($crawler->selectLink('Sign in')->link());
$form = $crawler->selectButton('Sign in')->form();
$crawler = $client->submit($form, array('login' => 'fabpot', 'password' => 'xxxxxx'));
$crawler->filter('.flash-error')->each(function ($node) {
    print $node->text()."\n";
});

// See if the response was ok
$status_code = $client->getResponse()->getStatus();
if($status_code==200){
    echo '200 OK<br>';
}
 
// Use the symfony filter method to find all links which are children of paragraph
// elements which have a class of title then loop through the results using the each method
$crawler->filter('p.title > a')->each(function ($node) {
    echo '<a target="blank" href="'.$node->attr('href').'" >'.htmlentities($node->text()).'</a><br>';
});

*/
?>
