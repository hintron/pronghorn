console.log("Hello, NodeJS!");

var http = require('http');

// From the example in https://nodejs.org/api/http.html#http_http_request_options_callback

// Grab the languages from http://gmc.lingotek.com/language
var options = {
  // protocol:'http:', // defaults to http:
  // port: 80, // Defaults to 80
  // method: 'GET', // Defaults to GET
  hostname: 'gmc.lingotek.com',
  path: '/language',
  // headers: {
  //   'Content-Type': 'application/x-www-form-urlencoded',
  //   'Content-Length': Buffer.byteLength(postData)
  // }
};

var req = http.request(options, (res) => {
  console.log(`STATUS: ${res.statusCode}`);
  // console.log(`HEADERS: ${JSON.stringify(res.headers)}`);
  res.setEncoding('utf8');
  res.on('data', (chunk) => {
    console.log(`BODY: ${chunk}`);
  });
  res.on('end', () => {
    console.log('No more data in response.')
  })
});

req.on('error', (e) => {
  console.log(`problem with request: ${e.message}`);
});

// write data to request body
req.end();