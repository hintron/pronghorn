# Pronghorn

## Tasks

Complete the following mini-tasks using whatever resources you'd like:

1. Use php or javascript to connect to and pull down content (e.g., tweets, pins, posts, statuses) from any one of the following social networks: LinkedIn, Twitter, Instagram, Pinterest, or Facebook.

2. Use php or javascript to output the language names (e.g., German, English) from this url (http://gmc.lingotek.com/language).

3. List the HTTP requests (i.e., HTTP method, URL) and responses (i.e., HTTP status code) used for both #1 and #2 above.

You should use php for one of the tasks and javascript for the other (you can choose which, either way is fine).  Again, we encourage you to use the internet as much as you want --- we just ask that you share whatever sources you use.  We are interested in how you go about this process and that you can demonstrate your understanding of what is happening technically.N

## Solution

### Task 1

I will install WAMP and use PHP to pull down tweets from Twitter. I will log the HTTP requests as I go using a lightweight PHP HTTP library and install it with Composer (https://getcomposer.org/).

Rename the default www folder in WAMP to something else, and make a new www folder as a symlink to Pronghorn/task1/public/ folder using cmd (and replace with proper paths):

    mklink /d C:\wamp\www C:\Users\hal\documents\pronghorn\task1\public

See https://technet.microsoft.com/en-us/library/cc753194(v=ws.11).aspx

It will create softlinks by default. For difference between soft links and hard links, see http://askubuntu.com/questions/108771/what-is-the-difference-between-a-hard-link-and-a-symbolic-link

Use the Guzzle HTTP/REST lightweight library. I chose Guzzle (https://github.com/guzzle/guzzle) over Requests (https://github.com/rmccue/Requests) or Unirest-php (https://github.com/Mashape/unirest-php) because Guzzle seems to deal more with REST, and Twitter's API is all REST-based. See http://requests.ryanmccue.info/docs/why-requests.html).

Create a composer.json file with guzzle specified. Then install it with Composer by navigating to task1/ folder and running "composer install" in powershell. Composer will automatically download everything and then create a lock file.

Twitter unfortunately will not allow access to its API without oauth. This means I need to get a Twitter developer account and set up oauth before I can query data.

This is a good how-to document I found: http://stackoverflow.com/questions/12916539/simplest-php-example-for-retrieving-user-timeline-with-twitter-api-version-1-1

I need to quickly read up and figure out how oauth works: https://hueniverse.com/oauth/guide/terminology/

Guzzle was using curl, and curl wasn't working due to an SSL Certificate problem. It couldn't find the file with all the certificates of the CAs. So I followed this (http://stackoverflow.com/a/34883260/1416379), downloaded the most recent cacert.pem file from curl's website (https://curl.haxx.se/docs/caextract.html), pasted it into C:/wamp/, and set
    curl.cainfo = "C:\wamp\cacert.pem"
in my php.ini file and restarted all services. This seemed to solve the issue. See also http://docs.guzzlephp.org/en/latest/request-options.html#verify-option


Twitter uses oauth 1.0. To initially get data from twitter, I went to https://dev.twitter.com/oauth/tools/signature-generator/12599346 to create an oauth signature using the tokens I generated for my Pronghorn app. This created a curl command that was able to get data from Twitter.


### Task 2

I will use NodeJS to grab the language data, JSON decode it, and output the language names. I will log the HTTP requests as I go using a lightweight HTTP module.

I will look into the http module, specifically the request() function. Since there is no authentication getting in the way of the language data, it should be trivial.

This showed me how to get all the chunks of data into one piece: https://docs.nodejitsu.com/articles/HTTP/clients/how-to-create-a-HTTP-request/


### Task 3

Done throughout tasks 1 and 2


