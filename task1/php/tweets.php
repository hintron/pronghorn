<?php
// Require the Composer autoload, so we can use Guzzle
require "../vendor/autoload.php";
// Twitter API oauth wrapper
// Use it to create the proper oauth signature, but then siphon url and signature through Guzzle
require_once('../vendor/j7mbo/twitter-api-php/TwitterAPIExchange.php');

error_log("Getting tweets...");

// Start using Guzzle to pull down tweets from Twitter
use GuzzleHttp\Client;

$client = new Client([
    // Base URI is used with relative requests
    'base_uri' => 'https://api.twitter.com/1.1',
]);




// This file will contain these vars:
    // $customer_key
    // $customer_secret
    // $access_token
    // $access_token_secret
require "../php/secret.php";
// NOTE: This file is NOT saved in Git, since this code is public

// Build the oauth signature using TwitterAPIExchange
// See https://github.com/J7mbo/twitter-api-php

$settings = array(
    'oauth_access_token' => $access_token,
    'oauth_access_token_secret' => $access_token_secret,
    'consumer_key' => $customer_key,
    'consumer_secret' => $customer_secret
);

$twitter_request_url = 'https://api.twitter.com/1.1/search/tweets.json';
$twitter_request_get_fields = '?q=%23lingotek&result_type=recent';
$twitter_request_method = 'GET';
$twitter = new TwitterAPIExchange($settings);

// TODO: Create the oauth signature
// This basically does oauth stuff for me, so I don't have to
// it creates a signature according to this document: https://dev.twitter.com/oauth/overview/creating-signatures
$twitter->setGetfield($twitter_request_get_fields);
$twitter->buildOauth($twitter_request_url, $twitter_request_method);
echo $twitter->performRequest();

// $url = 'https://api.twitter.com/1.1/followers/list.json';
// $getfield = '?username=J7mbo&skip_status=1';
// $requestMethod = 'GET';
// $twitter = new TwitterAPIExchange($settings);
// echo $twitter->setGetfield($getfield)
             // ->buildOauth($url, $requestMethod)
             // ->performRequest();


// error_log(print_r($twitter,1));


// TODO: Use Guzzle to execute the actual http request, so I can monitor the HTTP responses? Or can I do that just fine with the twitter api exchange tool?




// $client->setDefaultOption('verify', false);
// $response = $client->request('GET', '/', ['verify' => true]);
// $response = $client->request('GET', 'http://gmc.lingotek.com/language');
// $response = $client->request('GET', 'https://api.twitter.com/oauth2/token');
// $response = $client->request('GET', 'https://api.twitter.com/oauth/request_token');







// if(isset($response) && $response != null){
//     error_log("parsing response...");

//     $code = $response->getStatusCode(); // 200
//     $reason = $response->getReasonPhrase(); // OK

//     echo "<h2>$code $reason</h2>";

//     $body = $response->getBody();

//     echo $body;

// }


?>