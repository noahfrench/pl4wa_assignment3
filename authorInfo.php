<?php
$q=$_GET["q"];

$xmlDoc = new DOMDocument();
$xmlDoc->load("author_info.xml");

$x = $xmlDoc->getElementsByTagName('AUTHOR');

for ($i=0; $i<=$x->length-1; $i++) {
  if ($x->item($i)->nodeType==1) {
    //echo trim($q);
    //echo $x->item($i)->childNodes->item(1)->nodeValue;
    //echo trim($x->item($i)->childNodes->item(1)->nodeValue);
    // echo $q === $x->item($i)->childNodes->item(1)->nodeValue;
    //echo trim($x->item($i)->childNodes->item(1)->nodeValue);
    if ($x->item($i)->childNodes->item(1)->nodeValue == $q) {
      $y=($x->item($i));
    }
  }
}

$author=($y->childNodes);

for ($i=0;$i<$author->length;$i++) { 
  if ($author->item($i)->nodeType==1) {
    echo("<b>" . $author->item($i)->nodeName . ":</b> ");
    echo($author->item($i)->nodeValue);
    echo("<br>");
  }
}

?>