# vpnuk_smartdns_client
Client to connect to VPNUK.net and check in your current IP address to access the SmartDNS service.

This may or may-not be super robust, depending on how often VPNUK.net update their user control panel pages - as I use this myself, it's likely to be kept reasonably up-to-date!

# Installation
Once you've cloned the repository, run `composer install` in the app directory to pull in the necessary composer components.

# Configuration
Copy the config.php.dist file to config.php and edit it, adding your own VPNUK.net username and password into the configuration.
`cp config.php.dist config.php && vim config.php`

# Running
Assuming you have the necessary PHP components installed and the path to php is correct (`/usr/bin/php`), you should be able to set the vpnuk_smartdns_client.php script to executable and then call it on the command line, from crontab or anywhere else.
`chmod +x vpnuk_smartdns_client.php`
`./vpnuk_smartdns_client.php`

# Disclaimer
This is in no way affiliated to, endorsed by or even remotely linked to http://www.vpnuk.net/

Though I am a happy user and would heartily recommend their services!