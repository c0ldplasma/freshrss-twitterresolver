# FreshRSS - Twitter resolver extension

This FreshRSS extension allows you to resolve t.co Twitter links to the actual URL behind it.

To use it, upload the ```xExtension-TwitterResolver``` directory to the FreshRSS `./extensions` directory on your server and enable it on the extension panel in FreshRSS.

## Installation

The first step is to put the extension into your FreshRSS extension directory:
```
cd /var/www/FreshRSS/extensions/
wget https://github.com/c0ldplasma/freshrss-twitterresolver/archive/master.zip
unzip master.zip
mv freshrss-twitterresolver-master/xExtension-TwitterResolver .
rm -rf freshrss-twitterresolver-master/
```

Then switch to your browser https://localhost/FreshRSS/p/i/?c=extension and activate it.

# Features

- Resolves t.co Twitter links to the actual URL behind it.

## Screenshots

With FreshRSS and an original Youtube Channel feed:
![screenshot before](<url> "Without this extension the t.co link is shown")

With activated TwitterResolver extension:
![screenshot after](<url> "After activating the extension the actual URL is shown")

## About FreshRSS

[FreshRSS](https://freshrss.org/) is a great self-hosted RSS Reader written in PHP, which is can also be found here at [GitHub](https://github.com/FreshRSS/FreshRSS).

More extensions can be found at [FreshRSS/Extensions](https://github.com/FreshRSS/Extensions).

## Changelog

0.1: 
* Initial fork of kevinpapst/freshrss-youtube
