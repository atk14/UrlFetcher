UrlFetcher
==========

UrlFetcher is a PHP class providing methods to make http requests

Basic usage
-----------

    $fetcher = new UrlFetcher();
    $fetcher->setAuthorization("username","password");
    if($fetcher->fetchContent("http://www.example.com/private/content.dat")){
      echo $fetcher->getContent();
    }else{
      echo $fetcher->getErrorMessage();
    }

Installation
------------

Use the Composer to install the panel.

    cd path/to/your/project/
    composer require atk14/url-fetcher dev-master

Licence
-------

UrlFetcher is free software distributed [under the terms of the MIT license](http://www.opensource.org/licenses/mit-license)
