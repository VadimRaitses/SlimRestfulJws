This is slim api 3  project with some entity model restful api, jwt authentcation and illuminate db
all db script for models included


## Install

Install the latest version using [composer](https://getcomposer.org/).


### Get a token
curl -X POST \
  http://localhost:8066/token \
  -H 'cache-control: no-cache' \
  -H 'content-type: application/json' \
  -d '{"email":"va","password":"va"}'
 
HTTP/1.1 201 Created
Content-Type: application/json
authorization :Bearer xxxtokenxxx



 ### Get current User
 curl -X GET \
   http://localhost:8066/user \
   -H 'authorization: Bearer xxxtokenxxx
   -H 'cache-control: no-cache'
 
 HTTP/1.1 200 OK
 Content-Type: application/json 
 {"id":83,"email":"va","password":"hashed passs","updated_at":"2018-02-23 23:49:15","created_at":"2018-02-23 23:49:15"}
   
 
 ### GET Entities 
 curl -X GET \
   http://localhost:8066/entity \
   -H 'authorization: Bearer xxxtokenxxx
   -H 'cache-control: no-cache' \
  HTTP/1.1 200 OK
 Content-Type: application/json    
 [{"id":0,"name":"text","text":"name","updated_at":"2018-02-24 19:28:44","created_at":"2018-02-24 19:28:44"},{"id":1,"name":"text","text":"name","updated_at":"2018-02-24 19:30:59","created_at":"2018-02-24 19:30:59"}] 
 
 ### GET Entity by Id
  curl -X GET \
    http://localhost:8066/entity/0 \
    -H 'authorization: Bearer xxxtokenxxx
    -H 'cache-control: no-cache' \
    
   HTTP/1.1 200 OK   
  [{"id":0,"name":"text","text":"name","updated_at":"2018-02-24 19:28:44","created_at":"2018-02-24 19:28:44"}] 
  
 
 ### POST entity
 curl -X POST \
   http://localhost:8066/entity \
   -H 'authorization: Bearer xxxtokenxxx
   -H 'cache-control: no-cache' \
   -H 'content-type: application/json' \
   -d '{"name":"text","text":"name"}'
  HTTP/1.1 201 Created   
 
 ### PUT Entity
 curl -X PUT \
   http://localhost:8066/entity/0 \
   -H 'authorization:Bearer xxxtokenxxx
   -H 'cache-control: no-cache' \
   -H 'content-type: application/json' \
   -d '{"name":"text","text":"vadim"}'
   
   
  HTTP/1.1 204 No Content  
 
 ### DELETE Entity
  curl -X DELETE \
    http://localhost:8066/entity/0 \
    -H 'authorization: Bearer xxxtokenxxx
    -H 'cache-control: no-cache'
  
  HTTP/1.1 204 No Content  
