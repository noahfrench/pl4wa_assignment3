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
$request = json_decode($postdata, true);

$username = $request['username'];
$password = $request['password'];

$data = [];
foreach ($request as $k => $v)
{
  $data[0][$k] = $v;
}

// sent response (in json format) back to the front end
// echo json_encode(['content'=>$data]);

$xml = simplexml_load_file("userData.xml") or die("Error: Cannot create object");

$newUser = $xml->addChild("user");
$newUser->addAttribute("name", $username);
$newUser->addAttribute("password", $password);
$newUser->addChild("star1");
$newUser->star1->addAttribute("title", "1 Star");
$newUser->addChild("star2");
$newUser->star2->addAttribute("title", "2 Stars");
$newUser->addChild("star3");
$newUser->star3->addAttribute("title", "3 Stars");
$newUser->addChild("star4");
$newUser->star4->addAttribute("title", "4 Stars");
$newUser->addChild("star5");
$newUser->star5->addAttribute("title", "5 Stars");

$xml->asXML("userData.xml"); //edit this to be true file path

//header("Location: http://localhost:4200");
//exit();
?>