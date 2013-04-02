<?php 

include('simplexml_dump.php');

if (!empty($_GET['q']))
{	
	echo "Hello, ".$_GET['q'];
}

if (!empty($_GET['a']))
{
	if ($_GET['a']=='a')
	{
		echo '1';
	}
	elseif ($_GET['a']=='b')
	{
		echo '2';
	}
	else
	{
		echo 'neither';
	}
}

if (!empty($_GET['search']))
{
	echo "<pre>";
	$url = "http://www.itis.gov/ITISWebService/services/ITISService/searchForAnyMatch?srchKey=".$_GET['search'];
	echo $url."\n";
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	$content = curl_exec($ch);
	curl_close($ch);
	
	//echo "foo";
	print_r(htmlentities($content));
	$content_xml = simplexml_load_string($content);
	
	simplexml_dump($content_xml);
	echo "</pre>";
}

if (!empty($_GET['soap']))
{
	echo "<pre>";
	
	$client = new SoapClient("http://www.itis.gov/ITISWebService.xml");
	$params = array("srchKey"=>$_GET['soap']);
	$res = $client->searchByCommonName($params);
	print_r($res);
	
	echo "</pre>";
}

?>
