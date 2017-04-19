#!/usr/bin/php
<?php
require_once __DIR__.'/vendor/autoload.php';
require_once __DIR__.'/config.php';
use Goutte\Client;
$hoy = date("Y-m-d H:i:s");

$client = new Client();
$client->followRedirects(true);

$crawler = $client->request('GET', 'https://clientcp.vpnuk.info/vpnuk/clients/index.php');
$form = $crawler->selectButton('Login')->form();
$crawler = $client->submit($form, array('username' => $vpnukUsername, 'password' => $vpnukPassword));
$crawler = $client->request('GET', 'https://clientcp.vpnuk.info/vpnuk/clients/main.php?mod=sd&s=c');

sleep(1);

try {
	$crawler = $client->click($crawler->selectLink('Disable')->link());
} catch (Exception $e)  {
	echo "Nothing to Disable.\r\n";
}

sleep(1);

try {
	$crawler = $client->click($crawler->selectLink('Remove')->link());
} catch (Exception $e)  {
	echo "Nothing to Remove.\r\n";
}

sleep(1);

try {
		$crawler = $client->request('GET', 'https://clientcp.vpnuk.info/vpnuk/clients/main.php?mod=sd&s=c');
} catch (Exception $e)  {
	echo "Reloading the page failed.\r\n";
}

sleep(1);

$form = $crawler->selectButton('Enable')->form();
$crawler = $client->submit($form, array('fn' => $hoy, 'eip' => '1'));

sleep(1);

try {
	$crawler = $client->click($crawler->selectLink('LOG OUT OF CLIENT CP')->link());
} catch (Exception $e)  {
	echo "Failed to logout.\r\n";
}

?>
