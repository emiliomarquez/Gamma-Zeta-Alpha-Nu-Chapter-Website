// JavaScript Document

if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.open("GET","http://gammazetaalpha.ucsd.edu/navigation.xml",false);
xmlhttp.send();
xmlDoc=xmlhttp.responseXML; 

document.write("<div class='navbar navbar-inverse navbar-fixed-top'><div class='container'><div class='navbar-header'><button type='button' class='navbar-toggle' data-toggle='collapse' data-target='.navbar-collapse'><span class='icon-bar'></span><span class='icon-bar'></span><span class='icon-bar'></span></button><a class='navbar-brand' href='http://gammazetaalpha.ucsd.edu/'>Gamma Zeta Alpha <em style='font-size:14px;' >at UCSD</em></a></div>");
document.write("<div class='navbar-collapse collapse'><ul class='nav navbar-nav'>");

var x=xmlDoc.getElementsByTagName("subPages");
var page = null;
for (i=0;i<x.length;i++){
  if(x[i].getElementsByTagName("page").length == 1 ){
  	document.write("<li><a href='"+
			x[i].getElementsByTagName("page")[0].getElementsByTagName("link")[0].childNodes[0].nodeValue+"'>"+
			x[i].getElementsByTagName("page")[0].getElementsByTagName("title")[0].childNodes[0].nodeValue+"</a></li>");
  	continue;
  }
  page = x[i].getElementsByTagName("page");
  
  document.write("<li class='dropdown'>");
  document.write("<a href='#' class='dropdown-toggle' data-toggle='dropdown'>");
  document.write(x[i].getAttributeNode("title").value+" <b class='caret'></b></a>");
  document.write("<ul class='dropdown-menu'>");
  for(j = 0;j < page.length; ++j )
  { 

	document.write("<li><a href='");
  	document.write(page[j].getElementsByTagName("link")[0].childNodes[0].nodeValue);
  	document.write("'>");
  	document.write(page[j].getElementsByTagName("title")[0].childNodes[0].nodeValue);
  	document.write("</a></li>");
  }
  document.write("</ul></li>");
}
document.write(" </ul></div><!--/.navbar-collapse --></div></div>");
