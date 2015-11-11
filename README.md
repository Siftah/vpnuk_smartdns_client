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

# Works well with...
If you're using Digital Ocean for your hosting you may wish to use this in combination with the following script which will automatically update a DNS entry on Digital Ocean when your IP changes;
https://github.com/Siftah/Digital-Ocean-Dynamic-DNS-Updater

The two work well together from a crontab like this;
> */15 * * * * $HOME/Digital-Ocean-Dynamic-DNS-Updater/updater.php [token] [domain.net] [@] [A] $HOME/vpnuk_smartdns_client/vpnuk_smartdns_client.php

The SmartDNS client will only be updated when the DNS changes.

# Disclaimer
This is in no way affiliated to, endorsed by or even remotely linked to http://www.vpnuk.net/

Though I am a happy user and would heartily recommend their services!
