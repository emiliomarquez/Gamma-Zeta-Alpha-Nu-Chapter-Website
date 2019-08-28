// JavaScript Document
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.open("GET","http://gammazetaalpha.ucsd.edu/events/events.xml",false);
xmlhttp.send();
xmlDoc=xmlhttp.responseXML; 

var quart=xmlDoc.getElementsByTagName("quarter");
var events = null;
var date = new Date();
for(i=0; i< quart.length; ++i){
	document.write("<tr class='rowHeader'><td colspan='3' >"+quart[i].getAttribute('title') + "</td></tr>");
	events = quart[i].getElementsByTagName("event");
	for(j=0; j < events.length; ++j ){
		document.write("<tr><td class='nameofEvent'>"+events[j].getElementsByTagName("name")[0].childNodes[0].nodeValue+"</td>");
		date.setFullYear(parseInt(events[j].getElementsByTagName("year")[0].childNodes[0].nodeValue),
		parseInt(events[j].getElementsByTagName("month")[0].childNodes[0].nodeValue),
		parseInt(events[j].getElementsByTagName("date")[0].childNodes[0].nodeValue));
		document.write("<td class='dateofEvent'>"+ date.toDateString()+"</td>");
		document.write("<td class='typeofEvent'>"+events[j].getAttribute('type')+"</td></tr>");
	}

}