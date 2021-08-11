<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Server</title>
</head>
<body>
<style>
* {
	padding:0;
}

body {
	font-family: Poppins;
}

.data {
	border: 1px solid black;
}

.up {
    color: #00ff00;
}

.down {
	    color: #ffffff;
}

.back {
	border: 1px solid #000000;
    padding: 0.5rem;
    max-width: 100%;
    background-color: #000000;
}

.makan {
	margin: 0 auto;
    text-align: center;
	max-width:50%;
	border: 1px solid;
}

.number {
	color:red;
	
}

.waktu {
	font-size:xx-small;
	padding:0.2rem;
}
</style>

<?php

$myvar = 0;
$myvar2 = 0;

function get_list($dir)
{
global $myvar,$myvar2;
        foreach(glob("${dir}/*") as $fn) 
	{
                if (is_dir($fn)) 
			{
                        get_list($fn);
					$myvar2++;
                } else 
			{
                        //print $fn . "<br />";
					$myvar++;
                }
        }
}

get_list('F:\xampp\htdocs\count');

//echo "Jumlah Dokumen<br/><br/>";
//echo "$myvar files<br/>$myvar2 folders";
//echo "$myvar2 folders";

echo "<div class='makan'><br/>Jumlah Dokumen<br/><br/><div class='makan'>$myvar file</div> <br/><div class='makan'>$myvar2 folder</div>";

echo "<br/><br/>";

function isSiteAvailible($url){
    // Check, if a valid url is provided
    if(!filter_var($url, FILTER_VALIDATE_URL)){
        return false;
    }

    // Initialize cURL
    $curlInit = curl_init($url);
    
    // Set options
    curl_setopt($curlInit,CURLOPT_CONNECTTIMEOUT,10);
    curl_setopt($curlInit,CURLOPT_HEADER,true);
    curl_setopt($curlInit,CURLOPT_NOBODY,true);
    curl_setopt($curlInit,CURLOPT_RETURNTRANSFER,true);

    // Get response
    $response = curl_exec($curlInit);
    
    // Close a cURL session
    curl_close($curlInit);

    return $response?true:false;
}

$URL = 'http://nizarwiki.ga';

if(isSiteAvailible($URL)){
    echo '<div class="up back">Hore, website berjalan dengan baik.</div>';      
}else{
   echo '<div class="down back">Woops, website lagi DOWN nih!</div>'; 
}

date_default_timezone_set('Asia/Jakarta');

$timestamp = time();
$date_time = date("d-m-Y (D) H:i:s", $timestamp);
echo "<div class='waktu'>Current date and local time on this server is $date_time</div>";
?>


</body>
</html>
