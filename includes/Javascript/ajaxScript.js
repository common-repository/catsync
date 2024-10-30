var xmlhttp;

function stateChanged()
{
    if (xmlhttp.readyState==4)
    {
        document.getElementById("sourceColumn").innerHTML=xmlhttp.responseText;
        document.getElementById("box1View").innerHTML=xmlhttp.responseText;
        document.getElementById("box2View").innerHTML = "";
		document.getElementById("sourceColumn2").innerHTML="<option value=''>None</option>";
		document.getElementById("sourceColumn2").innerHTML+=xmlhttp.responseText;
    }
}

function GetXmlHttpObject()
{
    if (window.XMLHttpRequest)
    {
        return new XMLHttpRequest();
    }
    else if (window.ActiveXObject)
    {
        return new ActiveXObject("Microsoft.XMLHTTP");
    }
    else
    {
        return null;
    }
}

function showColumn(str, url)
{
    xmlhttp=GetXmlHttpObject();

    if (xmlhttp==null)
    {
        alert ("Browser does not support HTTP Request");
        
        return;
    }
	
    url=url + "/catsync/includes/getColumns.php";
    url=url + "?table=" + str;
    url=url + "&sid=" + Math.random();
	
    xmlhttp.onreadystatechange=stateChanged;
    xmlhttp.open("GET",url,true);
    xmlhttp.send(null);
}

//To update the hidden variable which stores space separated selected column names.
function populateHiddenField()
{
    var hiddenField = document.getElementById("selectColumns");
    var sourceInner = document.getElementById("sourceInner");
    var destInner = document.getElementById("destInner");
    var selCols = document.getElementById("box2View");
    var sourceCols = document.getElementById("box1View");
    var topicCol = document.getElementById("sourceColumn").value;
	var topicCol2 = document.getElementById("sourceColumn2").value;
    hiddenField.value = topicCol+" ";
    var totSelCols = selCols.length;
    
    for (var i = 0; i < totSelCols; i++)
    {
        var columnName = selCols.options[i].value;
        hiddenField.value += columnName+" ";
    }
	
    //Stores the source and destination column names. The innerhtml is escaped. 
    //for example <option value="abcd">abcd</option> will be converted to #option value=@abcd@|abcd#/option|
    sourceInner.value = sourceCols.innerHTML.replace(/</g,"#").replace(/>/g,"|").replace(/\"/g,"@");
    destInner.value = selCols.innerHTML.replace(/</g,"#").replace(/>/g,"|").replace(/\"/g,"@");
}