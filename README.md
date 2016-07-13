# Pronghorn

## Tasks

Complete the following mini-tasks using whatever resources you'd like:

1. Use php or javascript to connect to and pull down content (e.g., tweets, pins, posts, statuses) from any one of the following social networks: LinkedIn, Twitter, Instagram, Pinterest, or Facebook.

2. Use php or javascript to output the language names (e.g., German, English) from this url (http://gmc.lingotek.com/language).

3. List the HTTP requests (i.e., HTTP method, URL) and responses (i.e., HTTP status code) used for both #1 and #2 above.

You should use php for one of the tasks and javascript for the other (you can choose which, either way is fine).  Again, we encourage you to use the internet as much as you want --- we just ask that you share whatever sources you use.  We are interested in how you go about this process and that you can demonstrate your understanding of what is happening technically.N

## Solution

### Task 1

I will use NodeJS to grab the language data, JSON decode it, and output the language names. I will log the HTTP requests as I go using a lightweight HTTP module.

### Task 2

I will install WAMP and use PHP to pull down tweets from Twitter. I will log the HTTP requests as I go using a lightweight PHP HTTP library and install it with Composer.

Rename the default www folder in WAMP to something else, and make a new www folder as a symlink to Pronghorn/task1/public/ folder using cmd (and replace with proper paths):

    mklink /d C:\wamp\www C:\Users\hal\documents\pronghorn\task1\public

See https://technet.microsoft.com/en-us/library/cc753194(v=ws.11).aspx

It will create softlinks by default. For difference between soft links and hard links, see http://askubuntu.com/questions/108771/what-is-the-difference-between-a-hard-link-and-a-symbolic-link

Use the Guzzle HTTP/REST lightweight library. (I chose Guzzle over Requests or Unirest because Guzzle seems to deal more with REST, and Twitter's API is all REST-based. See http://requests.ryanmccue.info/docs/why-requests.html).

Create a composer.json file with guzzle specified. Then install it with composer by navigating to task1/ folder and running "composer install" in powershell.






