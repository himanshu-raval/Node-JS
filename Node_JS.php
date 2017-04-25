Step 1) 
Intsall Node in Local. 
Follow this Site :http://blog.teamtreehouse.com/install-node-js-npm-windows
https://nodejs.org/en/download/
node-v6.10.2-x64.msi
-> open CMD And Check Node is installed or not.
-> node -v  (return installed Version of Node)Node Package Manager
-> npm -v  (Return Instlled Version of NPM)
run Js file using CMD.
craete js file (node_test.js)
console.log('check Node is Installed!');
firt goto file Directory Then run Command > node node_test.js

2) Ren Server in Local:
Crate new file like main.js
Put this code.
//https://www.tutorialspoint.com/nodejs/nodejs_first_application.htm
--------------------------------------
var http = require("http"); 
http.createServer(function (request, response) {
   // Send the HTTP header 
   // HTTP Status: 200 : OK
   // Content Type: text/plain
   response.writeHead(200, {'Content-Type': 'text/plain'});
   // Send the response body as "Hello World"
   response.end('Hello World\n');
}).listen(8081);

// Console will print the message
console.log('Server running at http://127.0.0.1:8081/');
----------------------------------------

Craete Firt Node Project:

Crate Directory Using mkdir
npm inti
entr Yout Project Name like 'npm-test'
ver version of Your Package
description
author
etc.
Then Write yes. (automatically create new package.json file and this all information store in package.json)


------------------

For install any Module 
npm install --save <module name>
   (--save) save data to package.json file
   Check your Package.json file
   
 "dependencies": {
    "express": "^4.15.2"
  }
   
   
---------------------------------
   https://www.tutorialspoint.com/nodejs/nodejs_express_framework.htm
   
   
   imporant module :
   Create Blank Folder > goto this folder in CMD then Fire following Command One by one.
   npm init
   npm install express --save
   npm install body-parser --save
   npm install cookie-parser --save
   npm install multer --save

   
   server.js
   
   
   var express = require('express');
var app = express();

// This responds with "Hello World" on the homepage
app.get('/', function (req, res) {
   console.log("Got a GET request for the homepage");
   res.send('Hello GET');
})

// This responds a POST request for the homepage
app.post('/', function (req, res) {
   console.log("Got a POST request for the homepage");
   res.send('Hello POST');
})

// This responds a DELETE request for the /del_user page.
app.delete('/del_user', function (req, res) {
   console.log("Got a DELETE request for /del_user");
   res.send('Hello DELETE');
})

// This responds a GET request for the /list_user page.
app.get('/list_user', function (req, res) {
   console.log("Got a GET request for /list_user");
   res.send('Page Listing');
})

// This responds a GET request for abcd, abxcd, ab123cd, and so on
app.get('/ab*cd', function(req, res) {   
   console.log("Got a GET request for /ab*cd");
   res.send('Page Pattern Match');
})

var server = app.listen(8081, function () {

   var host = server.address().address
   var port = server.address().port

   console.log("Example app listening at http://%s:%s", host, port)
})
   
   
   > http://127.0.0.1:8081/
   GET
   
 
 --------------------------------------------------------------
   REST API
   
   create users.json file with Following data
   
   {
   "user1" : {
      "name" : "mahesh",
      "password" : "password1",
      "profession" : "teacher",
      "id": 1
   },
   "user2" : {
      "name" : "suresh",
      "password" : "password2",
      "profession" : "librarian",
      "id": 2
   },
   "user3" : {
      "name" : "ramesh",
      "password" : "password3",
      "profession" : "clerk",
      "id": 3
   }
}
   
   
   Create server.js file with Following Data
   
   
   var express = require('express');
var app = express();
var fs = require("fs");

app.get('/listUsers', function (req, res) {
   fs.readFile( __dirname + "/" + "users.json", 'utf8', function (err, data) {
       console.log( data );
       res.end( data );
   });
})

var server = app.listen(8081, function () {

  var host = server.address().address
  var port = server.address().port

  console.log("Example app listening at http://%s:%s", host, port)

})
   
   
   RUN ::> http://127.0.0.1:8081/listUsers
   
   now you may get json data as response.
   
   
   https://www.tutorialspoint.com/nodejs/nodejs_restful_api.htm
   
   
   



