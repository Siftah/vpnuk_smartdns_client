#!/usr/bin/php
<?php
require_once __DIR__.'/vendor/autoload.php';
require_once __DIR__.'/config.php';
use Goutte\Client;
$hoy = date("Y-m-d H:i:s");

$client = new Client();
$crawler = $client->request('GET', 'https://clientcp.vpnuk.info/vpnuk/clients/index.php');
$form = $crawler->selectButton('Login')->form();
$crawler = $client->submit($form, array('username' => $vpnukUsername, 'password' => $vpnukPassword));
$crawler = $client->request('GET', 'https://clientcp.vpnuk.info/vpnuk/clients/main.php?mod=sd&s=c');
$crawler = $client->click($crawler->selectLink('Disable')->link());
$crawler = $client->request('GET', 'https://clientcp.vpnuk.info/vpnuk/clients/main.php?mod=sd&s=c');
$crawler = $client->click($crawler->selectLink('Remove')->link());
$crawler = $client->request('GET', 'https://clientcp.vpnuk.info/vpnuk/clients/main.php?mod=sd&s=c');
$form = $crawler->selectButton('Enable')->form();
$crawler = $client->submit($form, array('fn' => $hoy));
$crawler = $client->click($crawler->selectLink('LOG OUT OF CLIENT CP')->link());

?>
