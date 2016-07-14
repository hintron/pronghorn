console.log("------------------------------------------------------------");
console.log("Grabbing language data...\n");

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


// req is an instance of the http.ClientRequest class
// See https://nodejs.org/api/http.html#http_class_http_clientrequest
var req = http.request(options, (res) => {
  // console.log(`STATUS: ${res.statusCode}`);
  // console.log(`HEADERS: ${JSON.stringify(res.headers)}`);
  res.setEncoding('utf8');

  var all_data = '';

  // console.log(res);
  console.log(`HTTP Status Code: ${res.statusCode}`);
  // Alternate way of getting URL of request
  // console.log(`URL: ${res.req.agent.protocol}//${res.client._host}${res.req.path}`);

  // Note: The data event can happen multiple times to get all the data out!
  res.on('data', (chunk) => {
    // console.log("Data event!!!");
    // Gather all the data into one place
    all_data += chunk;
    // console.log(`BODY: ${chunk}`);
  });
  res.on('end', () => {
    // Create an empty array to hold the languages
    var languages = [];
    var language_abbr = [];
    all_data_decoded = JSON.parse(all_data);
    for(var item in all_data_decoded){
      language_abbr.push(item)
      languages.push(all_data_decoded[item].language);
    }
    console.log("\nLanguages:");
    for (var i = 0; i < languages.length; i++) {
      console.log(" *" + languages[i] + "(" + language_abbr[i] + ")");
    }
  })
});

// Print out HTTP Info (Task 3)
console.log(`HTTP Method: ${req.method}`);
console.log(`URL: ${req.agent.protocol}//${req._headers.host}${req.path}`);
// console.log(req);








req.on('error', (e) => {
  console.log(`problem with request: ${e.message}`);
});

// write data to request body
req.end();