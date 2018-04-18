UrlFetcher
==========

UrlFetcher is a PHP class providing methods to make http requests

Basic usage
-----------

    $fetcher = new UrlFetcher("http://www.example.com/content.dat");

    if(!$fetcher->found()){
      echo $fetcher->getErrorMessage();
      exit(1);
    }

    $content = $fetcher->getContent();

    $status_code = $fetcher->getStatusCode(); // e.g 200
    $content_type = $fetcher->getContentType(); // e.g. "application/pdf"
    $request_headers = $fetcher->getRequestHeaders();
    $response_headers = $fetcher->getResponseHeaders();


HTTP basic authentication or non-standard port can be specified within the URL.

    $fetcher = new UrlFetcher("https://username:password@www.example.com:444/private/content.dat");
    if($fetcher->found()){
      echo $fetcher->getContent();
    }else{
      echo $fetcher->getErrorMessage();
    }

### Make a POST requests

    $fetcher = new UrlFetcher("https://www.example.com/api/en/articles/create_new/");
    if($fetcher->post(["title" => "Sample article", "body" => "Lorem Ipsum..."])){
      echo $fetcher->getContent();
    }

Installation
------------

Use the Composer to install the UrlFetcher.

    cd path/to/your/project/
    composer require atk14/url-fetcher

Licence
-------

UrlFetcher is free software distributed [under the terms of the MIT license](http://www.opensource.org/licenses/mit-license)
