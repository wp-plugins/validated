<div class="wrap">

<h2>Validated</h2>

<script>

var url= new Array();

var slug=new Array();
var IDs = new Array();
<?php 
global $wpdb;
$prefix=$wpdb->prefix;
$myQuery="SELECT ID,post_name,guid FROM " . $prefix . "posts WHERE post_status='publish' ";

$query=mysql_query($myQuery);

$i=0;

$url=get_bloginfo('url');

$url2=get_bloginfo('url');

$url=str_replace("http://","",$url);

while ($myrow=mysql_fetch_array($query)) {

echo "slug[$i]='$myrow[post_name]';\n";

$theLink=get_permalink($myrow['ID']);
$theLink=str_replace("http://","",$theLink);
echo "url[$i]='$theLink';\n";
echo "IDs[$i]=$myrow[ID];\n";


$i++;

}

?>

var checkurl='<?= $url2; ?>/wp-content/plugins/validated/check.php';

function startValidation() {





var i=0;

var u=0;

while (i < url.length) {



theurl=checkurl + "?url=" + url[i] + "&slug=" + slug[i] + "&id=" + IDs[i];

jQuery.ajax({

  url: theurl,

  cache: false,

  success: function(html){

    jQuery("#results").append(html);

	u++;

	document.getElementById('checking').innerHTML='<b>Checking:</b> ' + u + '/' + url.length;

	if (u >=url.length){

document.getElementById('loadingpic').style.background='none';

document.getElementById('checking').innerHTML='';

jQuery("#imdone").fadeIn(1000);

jQuery("#imdone").fadeOut(2000);

jQuery("#sorting").fadeIn(1000);

var isgreen=jQuery('.isgreen').length;

var isred=jQuery('.isred').length;

jQuery('#totalgreen').html(isgreen);

jQuery('#totalred').html(isred);

}

  }

});



i++;

}



}



function sortBy(type) {

var type2='isgreen';



if (type == 'isgreen') {

type2='isred';

}



jQuery("." + type).fadeIn(1000);

jQuery("." + type2).fadeOut(1000);

}



function reValidate(id,slug,url) {

var i=id;

var theurl;

i=i-0;

jQuery("#row_" + i).fadeTo("slow", 0.33);



 

theurl=checkurl + "?id=" + i + "&url=" + url + "&replace=true&slug=" + slug;

jQuery.ajax({

  url: theurl,

  cache: false,

  success: function(html){

 jQuery("#row_" + i).empty();

    jQuery("#row_" + i).html(html);

	

jQuery("#row_" + i).fadeTo("slow", 1);

	//document.getElementById('checking').innerHTML='<b>Checking:</b> ' + u + '/' + url.length;

	

//document.getElementById('loadingpic').style.background='none';

//document.getElementById('checking').innerHTML='';

//jQuery("#imdone").fadeIn(1000);

//jQuery("#imdone").fadeOut(2000);

jQuery("#sorting").fadeIn(1000);

var isgreen=jQuery('.isgreen').length;

var isred=jQuery('.isred').length;

jQuery('#totalgreen').html(isgreen);

jQuery('#totalred').html(isred);



  }

});





}

window.onload=startValidation;

</script>

<style>

#results td {

color:#ff0000;

}

#results td.green {

color:#009900;

}

#results td.first {

color:#000000;

}



</style>





<table cellspacing="4" cellpadding="15" border="0" id="results" width="500">

<tr><td colspan="4" align="center" class="first"><div id="loadingpic" style="width:128px;height:15px;background:url(<?= $url2;?>/wp-content/plugins/validated/load.gif);"> &nbsp; </div>

<h2 id="imdone" style="display:none">Done!</h2>

<div id="sorting" style="display:none">Show: <a href="javascript:sortBy('isgreen');">Valid</a>(<span id="totalgreen"></span>)  |  <a href="javascript:sortBy('isred');">Invalid</a>(<span id="totalred"></span>)</div>

<span id="checking"></span> <br />

<br /></td></tr>

<tr><td class="first"><b>Post/Page:</b></td><td class="first"><b>Status</b></td><td class="first"><b># of Errors:</b></td><td></td></tr>



</table> <br />

<br />



</div>