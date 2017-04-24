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
   
   

 
   
   
   



