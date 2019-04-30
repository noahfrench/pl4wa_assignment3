<?php


// try commenting out the header setting to experiment how the back end refuses the request
header('Access-Control-Allow-Origin: http://localhost:4200');
header('Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Authorization, Accept, Client-Security-Token, Accept-Encoding');

// $data = (int) $_SERVER['CONTENT_LENGTH']; 

// retrieve data from the request
$postdata = file_get_contents("php://input");

//echo $postdata;
//echo gettype($postdata);

// process data 
// (this example simply extracts the data and restructures them back) 
$request = json_decode($postdata);

$userName = $request[0];
$pw = $request[1];

$data = [];
foreach ($request as $k => $v)
{
  $data[0][$k] = $v;
}

//$pw = $data[0][0];
//$un = $data[0][1];

// sent response (in json format) back to the front end
echo json_encode(['content'=>$data]);

?>