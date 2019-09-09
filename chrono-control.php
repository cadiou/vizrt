<?php

/*
 * 190806 
 * CHRONO CONTROL
 * bcadiou@videlio-globalservices.com
 *
 */

include("HTML.class.php");

$html = new HTML("Chrono Control",-1);

$html->tools();

$key= ( isset($_GET["key"])?urldecode($_GET["key"]):"" );
	
if (isset($_POST["server"])) {
	$server=$_POST["server"];
}elseif (isset($_GET["server"])) {
	$server=urldecode($_GET["server"]);
}else{
	$server="10.50.73.16";
}

$snap="ENGINE ".$server;

if (isset($_POST["minute"])) {
	$minute=$_POST["minute"];
}else{
	$minute="26";
}

if ($seconde="") {
	$seconde="00";
}

if ($minute="") {
	$minute="26";
}

if (isset($_POST['minute'])) {
	$minute=intval($_POST["minute"]);
	$seconde=intval($_POST["seconde"]);
	$time = $minute*60+$seconde;
	
	send("CLOCK1*TIME SET ".$time);
	send("CLOCK1*DIRECTION SET DOWN");
	send("CLOCK1 STOP");
	
	$snap="PRÊT À PARTIR";
	
}	
	
if ($key=="totem_decompte_stop") {
	$snap="STOP";
	send("CLOCK1 STOP");
}elseif ($key=="totem_decompte_start") {
	$snap="DÉCOMPTE EN COURS";
	send("CLOCK1 CONT");
}elseif ($key=="totem_decompte_get") {
	$snap="CONTROLE";
	echo get("CLOCK1*TIME GET");
}


$chrono1_from_viz = intval(substr(get("CLOCK1*TIME GET"),5,-1));

$chrono1 = intval($chrono1_from_viz/60).":".str_pad(intval(intval($chrono1_from_viz)-(intval($chrono1_from_viz/60)*60)),2,"0",STR_PAD_LEFT);

function send($command) {
	global $server;
		$fp = fsockopen($server, 6100, $errno, $errstr, 1);
    if (!$fp) {
        echo "$errstr ($errno)<br />\n";
    } else {
        fwrite($fp, "-1 ".$command);   
    }
	fclose($fp); // To close the connection
}

function get($command) {
	global $server;
		$fp = stream_socket_client("tcp://".$server.":6100", $errno, $errstr, 3);
    if (!$fp) {
        echo "$errstr ($errno)<br />\n";
    } else {
        fwrite($fp, "9999 ".$command."\0");
		return fread($fp,26);
    }	
    fclose($fp); // To close the connection
}

$html->h2("Décompte Totem");

$html->body("<center class=\"bouton\">".$chrono1."</center><script src=\"get_chrono.js\"></script>");

$html->h2("Commandes");

$html->body("<table class=\"ticket\">");
$html->body("<tr><td>");
$html->body("<center><a href=?server=$server&key=totem_decompte_start class=\"bouton_cam\">START</a></center>");
$html->body("</td><td>");
$html->body("<center><a href=?server=$server&key=totem_decompte_stop class=\"bouton_out\">STOP</a></center>");
$html->body("</td></tr>");
$html->body("</table>");

$html->h2("Réglage");

$html->body("<table class=\"ticket\">");
$html->body("<tr><td>");
$html->body("<form action=\"?server=$server\" method=\"post\">");
$html->body("<input type=\"text\" name=\"minute\" value=\"".$minute."\" size=\"2\"> : <input type=\"text\" name=\"seconde\" value=\"".$seconde."\" size=\"2\">");
$html->body("<input type=\"submit\" value=\"Initialiser le chrono\" class=\"bouton_ME\">");
$html->body("</form>");
$html->body("</td></tr>");
$html->body("</table>");

$html->h2("État");

$html->body("<table class=\"ticket\">");
$html->body("<tr><td>");
$html->body($snap);
$html->body("</td></tr>");
$html->body("</table>");


$html->out();

?>
