<?php

/*
 * BEGIN STANDARD STUFF
*/

echo '<html>';
echo '<head>';
echo '<title>Taxonomy client</title>';
echo '<link href="../gui/base.css" rel="stylesheet">';
echo '</head>';
echo '<body>
		<h1>http://www.itis.gov/web_service.html<br>http://www.itis.gov/ws_description.html</h1>';

/*
 * END STANDARD STUFF
*/

try{
  $sClient = new SoapClient("http://localhost/kary/taxonomy_client/ITISWebService.xml");
  
  //Title
  /*
  echo '<div id="title"><h1>Hello, World!';
  echo '</h1>';
  echo '<sub><a href="../spec/helloworld.php">Spec</a></sub>';
  echo '</div>';
  echo '<hr>';
  */
  //Body
  echo "<h1>Input</h1>";
  
  if (empty($_GET['srchKey']))
  {
  		$srchKey = "Dolphin";
  }
  else
  {
  		$srchKey = $_GET['srchKey'];
  }
  
  $response = $sClient->searchByCommonName($srchKey);
  
  echo '<form action="client.php">';
  echo 'searchForAnyMatch: <input placeholder="'.$srchKey.'" name="srchKey" type="text">';
  echo '<input type="submit" value="Submit">';
  echo "<hr>";
  
  echo "<h1>Output</h1>";
  echo "<pre>";
  var_dump($srchKey);
  var_dump($response);
  echo "</pre>";
  echo "<hr>";
  
  echo '<h1>Description</h1>';
  echo "Trying to get this damn soap client to work. See links above.";
  echo "<hr>";
  echo "<pre>";
  print_r($sClient->__getFunctions());
  print_r($sClient->__getTypes());
  echo "</pre>";
  
  
} catch(SoapFault $e){
	echo __FILE__.":".__LINE__;
  var_dump($e);
}
?>