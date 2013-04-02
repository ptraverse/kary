<!--
	This is the source file for the "Hello World of AJAX" tutorial
	
	You may use this code in your own projects as long as this 
	copyright is left	in place.  All code is provided AS-IS.
	This code is distributed in the hope that it will be useful,
 	but WITHOUT ANY WARRANTY; without even the implied warranty of
 	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
	
	Please visit http://www.DynamicAJAX.com for more great AJAX
	source code and tutorials.
	
	Copyright 2006 Ryan Smith / 345 Technical / 345 Group.
-->
<html>
	<head>
		<title>The Hello World of AJAX</title>
		<script language="JavaScript" type="text/javascript">
			//Gets the browser specific XmlHttpRequest Object
			function getXmlHttpRequestObject() {
				if (window.XMLHttpRequest) {
					return new XMLHttpRequest(); //Not IE
				} else if(window.ActiveXObject) {
					return new ActiveXObject("Microsoft.XMLHTTP"); //IE
				} else {
					//Display your error message here. 
					//and inform the user they might want to upgrade
					//their browser.
					alert("Your browser doesn't support the XmlHttpRequest object.  Better upgrade to Firefox.");
				}
			}			
			//Get our browser specific XmlHttpRequest object.
			var receiveReq = getXmlHttpRequestObject();		
			//Initiate the asyncronous request.
			function sayHello() {
				//If our XmlHttpRequest object is not in the middle of a request, start the new asyncronous call.
				if (receiveReq.readyState == 4 || receiveReq.readyState == 0) {
					//Setup the connection as a GET call to SayHello.html.
					//True explicity sets the request to asyncronous (default).
					receiveReq.open("GET", 'SayHello.html', true);
					//Set the function that will be called when the XmlHttpRequest objects state changes.
					receiveReq.onreadystatechange = handleSayHello; 
					//Make the actual request.
					receiveReq.send(null);
				}			
			}
			//Called every time our XmlHttpRequest objects state changes.
			function handleSayHello() {
				//Check to see if the XmlHttpRequests state is finished.
				if (receiveReq.readyState == 4) {
					//Set the contents of our span element to the result of the asyncronous call.
					document.getElementById('span_result').innerHTML = receiveReq.responseText;
				}
			}

			function showResult(str)
			{
			if (str.length==0)
			  {
			  document.getElementById("livesearch").innerHTML="";
			  document.getElementById("livesearch").style.border="1px";
			  return;
			  }
			document.getElementById("livesearch").style.border="2px";
			if (window.XMLHttpRequest)
			  {// code for IE7+, Firefox, Chrome, Opera, Safari
			  xmlhttp=new XMLHttpRequest();
			  }
			else
			  {// code for IE6, IE5
			  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			  }
			xmlhttp.onreadystatechange=function()
			  {
			  if (xmlhttp.readyState==4 && xmlhttp.status==200)
			    {
			    document.getElementById("livesearch").innerHTML=xmlhttp.responseText;
			    document.getElementById("livesearch").style.border="1px solid #A5ACB2";
			    }
			  }
			xmlhttp.open("GET","SayHello.php?q="+str,true);
			xmlhttp.send();
			}

			function alternateResult(str)
			{
			if (str.length==0)
			  {
			  document.getElementById("livesearch").innerHTML="";
			  document.getElementById("livesearch").style.border="1px";
			  return;
			  }
			document.getElementById("livesearch").style.border="2px";
			if (window.XMLHttpRequest)
			  {// code for IE7+, Firefox, Chrome, Opera, Safari
			  xmlhttp=new XMLHttpRequest();
			  }
			else
			  {// code for IE6, IE5
			  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			  }
			xmlhttp.onreadystatechange=function()
			  {
			  if (xmlhttp.readyState==4 && xmlhttp.status==200)
			    {
			    document.getElementById("livesearch").innerHTML=xmlhttp.responseText;
			    document.getElementById("livesearch").style.border="1px solid #A5ACB2";
			    }
			  }
			xmlhttp.open("GET","SayHello.php?a="+str,true);
			xmlhttp.send();
			}

			function searchResult(str)
			{
			if (str.length==0)
			  {
			  document.getElementById("livesearch").innerHTML="";
			  document.getElementById("livesearch").style.border="1px";
			  return;
			  }
			document.getElementById("livesearch").style.border="2px";
			if (window.XMLHttpRequest)
			  {// code for IE7+, Firefox, Chrome, Opera, Safari
			  xmlhttp=new XMLHttpRequest();
			  }
			else
			  {// code for IE6, IE5
			  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			  }
			xmlhttp.onreadystatechange=function()
			  {
			  if (xmlhttp.readyState==4 && xmlhttp.status==200)
			    {
			    document.getElementById("livesearch").innerHTML=xmlhttp.responseText;
			    document.getElementById("livesearch").style.border="1px solid #A5ACB2";
			    }
			  }
			xmlhttp.open("GET","SayHello.php?soap="+str,true);
			xmlhttp.send();
			}
			
			</script>
	</head>
	<body>
		<!-- Clicking this link initiates the asyncronous request -->
		<!--  <a href="javascript:sayHello();">Say Hello</a><br /> -->
		<!-- used to display the results of the asyncronous request -->
		<span id="span_result"></span>
		
		<form>
		<input type="text" size="30" onkeyup="searchResult(this.value)">
		<!--  <a href="javascript:showResult('foo')">Foo</a>  -->
		<div id="livesearch"></div>
		</form>
			
	</body>
</html>