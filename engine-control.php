<?php

/*
 * 200221
 * ENGINE CONTROL
 * bcadiou@videlio-globalservices.com
 *
 */

echo "<html>";
echo "<head>";
echo "<title>Engine Control</title>";
echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';
echo '<link href="style.css" rel="stylesheet" media="all" type="text/css" />';
echo "</head>";

$key=(isset($_GET["key"])?urldecode($_GET["key"]):"");
$numero=(isset($_GET["numero"])?urldecode($_GET["numero"]):"");
$server=(isset($_GET["server"])?urldecode($_GET["server"]):"192.168.1.5");
$snap=(isset($_GET["snap"])?urldecode($_GET["snap"]):"SNAP");

if (isset($_POST["server"])) {
	$server=$_POST["server"];
}

if ($key=="take_all_in")
{
	send("RENDERER SET_OBJECT exalt/Reality");
	send("RENDERER*FRONT_LAYER SET_OBJECT exalt/Display");
	$snap="TAKE_ALL_IN";
}elseif ($key=="write") {
	$snap="WRITE";
	send("MAIN_SCENE*TREE*@payload*TEXT SET HELLO");
}elseif ($key=="initialize") {
	$snap="INITIALIZE";
	send("MAIN_SCENE*SCRIPT INVOKE OnInit");
	send("FRONT_SCENE*SCRIPT INVOKE OnInit");
	send("CLOCK1*TIME SET 0");
}elseif ($key=="take_all_out") {
	$snap="TAKE_ALL_OUT";
	send("RENDERER SET_OBJECT");
	send("RENDERER*FRONT_LAYER SET_OBJECT");
}elseif ($key=="camera") {
	$snap="CAM".$numero;
	send("RENDERER SET_CAMERA ".$numero);
}elseif ($key=="background") {
	$snap="BACKGROUND_".$numero;
	send("RENDERER*BACKGROUND*IMAGE*ACTIVE SET ".$numero);
}elseif ($key=="geoprogress_in") {
	$snap="GEOPROGRESS_IN";
	send("RENDERER*FRONT_LAYER*STAGE*\$GEOPROGRESS CONTINUE NORMAL");
}elseif ($key=="geoprogress_out") {
	$snap="GEOPROGRESS_OUT";
	send("RENDERER*FRONT_LAYER*STAGE*\$GEOPROGRESS CONTINUE REVERSE");
}elseif ($key=="weather_in") {
	$snap="WEATHER_IN";
	send("RENDERER*FRONT_LAYER*STAGE*\$Weather CONTINUE NORMAL");
}elseif ($key=="weather_out") {
	$snap="WEATHER_OUT";
	send("RENDERER*FRONT_LAYER*STAGE*\$Weather CONTINUE REVERSE");
}elseif ($key=="logo_in") {
	$snap="LOGO_IN";
	send("RENDERER*FRONT_LAYER*STAGE*\$SPONSOR CONTINUE NORMAL");
}elseif ($key=="logo_out") {
	$snap="LOGO_OUT";
	send("RENDERER*FRONT_LAYER*STAGE*\$SPONSOR CONTINUE REVERSE");
}elseif ($key=="leaders_in") {
	$snap="LEADERS_IN";
	send("RENDERER*FRONT_LAYER*STAGE*\$LEADERS CONTINUE NORMAL");
}elseif ($key=="leaders_out") {
	$snap="LEADERS_OUT";
	send("RENDERER*FRONT_LAYER*STAGE*\$LEADERS CONTINUE REVERSE");
}elseif ($key=="circle_in") {
	$snap="CIRCLE_IN";
	send("RENDERER*FRONT_LAYER*STAGE*\$CIRCLE CONTINUE NORMAL");
}elseif ($key=="circle_out") {
	$snap="CIRCLE_OUT";
	send("RENDERER*FRONT_LAYER*STAGE*\$CIRCLE CONTINUE REVERSE");
}elseif ($key=="reference_in") {
	$snap="REFERENCE_IN";
	send("RENDERER*MAIN_LAYER*STAGE*\$REFERENCE CONTINUE NORMAL");
}elseif ($key=="reference_out") {
	$snap="REFERENCE_OUT";
	send("RENDERER*MAIN_LAYER*STAGE*\$REFERENCE CONTINUE REVERSE");
}elseif ($key=="sponsor_in") {
	$snap="SPONSOR_IN";
	send("RENDERER*MAIN_LAYER*STAGE*\$SPONSOR CONTINUE NORMAL");
}elseif ($key=="sponsor_out") {
	$snap="SPONSOR_OUT";
	send("RENDERER*MAIN_LAYER*STAGE*\$SPONSOR CONTINUE REVERSE");
}elseif ($key=="clock_in") {
	$snap="CLOCK_IN";
	send("RENDERER*FRONT_LAYER*STAGE*\$Clock CONTINUE NORMAL");
}elseif ($key=="clock_out") {
	$snap="CLOCK_OUT";
	send("RENDERER*FRONT_LAYER*STAGE*\$Clock CONTINUE REVERSE");
}elseif ($key=="locator_in") {
	$snap="LOCATOR_IN";
	send("RENDERER*FRONT_LAYER*STAGE*\$LOCATOR CONTINUE NORMAL");
}elseif ($key=="locator_out") {
	$snap="LOCATOR_OUT";
	send("RENDERER*FRONT_LAYER*STAGE*\$LOCATOR CONTINUE REVERSE");
}elseif ($key=="dist_in") {
	$snap="DISTANCE_IN";
	send("RENDERER*FRONT_LAYER*STAGE*\$Distance CONTINUE NORMAL");
}elseif ($key=="dist_out") {
	$snap="DISTANCE_OUT";
	send("RENDERER*FRONT_LAYER*STAGE*\$Distance CONTINUE REVERSE");
}elseif ($key=="venue_in") {
	$snap="VENUE_IN";
	send("RENDERER*FRONT_LAYER*STAGE*\$Venue CONTINUE NORMAL");
}elseif ($key=="venue_out") {
	$snap="VENUE_OUT";
	send("RENDERER*FRONT_LAYER*STAGE*\$Venue CONTINUE REVERSE");
}elseif ($key=="racenm_in") {
	$snap="RACENM_IN";
	send("RENDERER*FRONT_LAYER*STAGE*\$RaceName CONTINUE NORMAL");
}elseif ($key=="racenm_out") {
	$snap="RACENM_OUT";
	send("RENDERER*FRONT_LAYER*STAGE*\$RaceName CONTINUE REVERSE");
}elseif ($key=="running_time_in") {
	$snap="RUNNING_TIME_IN";
	send("RENDERER*FRONT_LAYER*STAGE*\$RUNNINGTIME CONTINUE NORMAL");
}elseif ($key=="running_time_out") {
	$snap="RUNNING_TIME_OUT";
	send("RENDERER*FRONT_LAYER*STAGE*\$RUNNINGTIME CONTINUE REVERSE");
}elseif ($key=="side_standings_in") {
	$snap="SIDE_STANDINGS_IN";
	send("RENDERER*FRONT_LAYER*STAGE*\$SIDESTANDINGS CONTINUE NORMAL");
}elseif ($key=="side_standings_out") {
	$snap="SIDE_STANDINGS_OUT";
	send("RENDERER*FRONT_LAYER*STAGE*\$SIDESTANDINGS CONTINUE REVERSE");
}elseif ($key=="horse_speed_in") {
	$snap="HORSE_SPEED_IN_".$numero;
	if ($numero=="") {
		send("RENDERER*FRONT_LAYER*STAGE*\$HORSESPEED CONTINUE NORMAL");
	}else{
		send("RENDERER*FRONT_LAYER*STAGE*\$HORSESPEED\$".$numero." CONTINUE NORMAL");
	}
}elseif ($key=="horse_speed_out") {
	$snap="HORSE_SPEED_OUT_".$numero;
	if ($numero=="") {
		send("RENDERER*FRONT_LAYER*STAGE*\$HORSESPEED CONTINUE REVERSE");
	}else{
		send("RENDERER*FRONT_LAYER*STAGE*\$HORSESPEED\$".$numero." CONTINUE REVERSE");
	}
}elseif ($key=="horse_speed_02_in") {
	$snap="HORSE_SPEED_02_IN";
	send("RENDERER*FRONT_LAYER*STAGE*\$HORSESPEED$02 CONTINUE NORMAL");
}elseif ($key=="horse_speed_02_out") {
	$snap="HORSE_SPEED_02_OUT";
	send("RENDERER*FRONT_LAYER*STAGE*\$HORSESPEED$02 CONTINUE REVERSE");
}elseif ($key=="horse_speed_06_in") {
	$snap="HORSE_SPEED_06_IN";
	send("RENDERER*FRONT_LAYER*STAGE*\$HORSESPEED$06 CONTINUE NORMAL");
}elseif ($key=="horse_speed_06_out") {
	$snap="HORSE_SPEED_06_OUT";
	send("RENDERER*FRONT_LAYER*STAGE*\$HORSESPEED$06 CONTINUE REVERSE");
}elseif ($key=="horse_speed_08_in") {
	$snap="HORSE_SPEED_08_IN";
	send("RENDERER*FRONT_LAYER*STAGE*\$HORSESPEED$08 CONTINUE NORMAL");
}elseif ($key=="horse_speed_08_out") {
	$snap="HORSE_SPEED_08_OUT";
	send("RENDERER*FRONT_LAYER*STAGE*\$HORSESPEED$08 CONTINUE REVERSE");
}elseif ($key=="standings_in") {
	$snap="STANDINGS_IN";
	send("RENDERER*FRONT_LAYER*STAGE*\$STANDINGS CONTINUE NORMAL");
}elseif ($key=="standings_out") {
	$snap="STANDINGS_OUT";
	send("RENDERER*FRONT_LAYER*STAGE*\$STANDINGS CONTINUE REVERSE");
}elseif ($key=="pointer_in") {
	$snap="POINTER_IN";
	send("RENDERER*MAIN_LAYER*STAGE*\$Pointer CONTINUE NORMAL");
}elseif ($key=="pointer_out") {
	$snap="POINTER_OUT";
	send("RENDERER*MAIN_LAYER*STAGE*\$Pointer CONTINUE REVERSE");
}elseif ($key=="vr_in") {
	$snap="VR_IN";
	send("RENDERER*MAIN_LAYER*STAGE*\$VR CONTINUE NORMAL");
}elseif ($key=="vr_out") {
	$snap="VR_OUT";
	send("RENDERER*MAIN_LAYER*STAGE*\$VR CONTINUE REVERSE");
}elseif ($key=="viziocode_in"){
	$snap="VIZIOCODE_IN";
	send("RENDERER*BACK_LAYER SET_OBJECT ViZioCode/Logo/ViZioCode2017Noir");
}elseif ($key=="viziocode_out") {
	$snap="VIZIOCODE_OUT";
	send("RENDERER*BACK_LAYER SET_OBJECT");
}elseif ($key=="running_time_stop") {
	$snap="RUNNING_TIME_STOP";
	send("CLOCK1 STOP");
}elseif ($key=="running_time_start") {
	$snap="RUNNING_TIME_START";
	send("CLOCK1 CONT");
}elseif ($key=="running_time_reset") {
	$snap="RUNNING_TIME_RESET";
	send("CLOCK1*TIME SET 0");
}elseif ($key=="object") {
	$snap=$numero;
	send("RENDERER*MAIN_LAYER*TREE*\$object\$VR\$model*FUNCTION*ControlGeom*input SET ".$numero);
}elseif ($key=="snap") {
	$aammjjhhmmss=date("ymd-His");
	send("IMAGE SNAPSHOT snap/".$aammjjhhmmss.($snap==""?"":"-".$snap)." RGB 1920 1080");
	sleep(1);
	send("IMAGE EXPORT IMAGE*/snap/".$aammjjhhmmss.($snap==""?"":"-".$snap)." \"Z:\Public\Pictures\\".$aammjjhhmmss.($snap==""?"":"-".$snap)."\" png");
}elseif ($key=="exec_action") {
	send("MAIN_SCENE*SCRIPT INVOKE OnExecAction ".$numero);
	$snap="SCRIPT".$numero;
}elseif ($key=="cleanup") {
	$snap="CLEANUP";
	send("SCENE CLEANUP");
}



function send($command) {
	echo $command;
	global $server;
		$fp = fsockopen($server, 6100, $errno, $errstr, 30);
    if (!$fp) {
        echo "$errstr ($errno)<br />\n";
    } else {
        fwrite($fp, "-1 ".$command);
     //   while (fgets($fp, 128)) {
      //     echo fgets($fp, 128); // If you expect an answer
     //  }
        fclose($fp); // To close the connection
    }

}


echo "<body vlink=white link=white>";

/*
echo "<form method=\"post\" action=\"engine-control.php\" target=\"_self\">";
echo "<INPUT TYPE=\"hidden\" name=\"key\" value=\"Lancer la fonction\">";
echo "<INPUT TYPE=\"hidden\" name=\"server\" value=\"".$server."\">";
echo "<INPUT class=\"bouton\" TYPE=\"submit\" value=\"OK\">";
echo "</form>";
*/

echo "<table>";

echo "<tr>";

echo "<td colspan=2 height=40 bgcolor=black align=center>";
echo $server;
echo "</td>";

echo "<td colspan=2 height=40 bgcolor=black align=center>";
echo $snap;
echo "</td>";

/*
echo "<td width=100 height=40 bgcolor=black align=center>";
echo "<a href=engine-control.php?server=$server&key=take_all_in&snap=$snap class=\"bouton\">LOAD&nbsp;SCENE</a>";
echo "</td>";
echo "<td width=100 height=40 bgcolor=black align=center>";
echo "<a href=engine-control.php?server=$server&key=take_all_out&snap=$snap class=\"bouton\">UNLOAD</a>";
echo "</td>";
echo "<td colspan=2 height=40 bgcolor=black align=center>";
echo "<p></p>";
echo "</td>";
*/

echo "</tr>";

echo "<tr>";

/*
echo "<td width=100 height=40 bgcolor=black align=center>";
echo "<a href=set-race.php?server=$server target=\"_race\" class=\"bouton\">SET&nbsp;RACE</a>";
echo "</td>";
echo "<td width=100 height=40 bgcolor=black align=center>";
echo "<a href=set-time.php?server=$server target=\"_time\" class=\"bouton\">DATE&nbsp;TIME</a>";
echo "</td>";
echo "<td width=100 width=100 height=40 bgcolor=black align=center>";
echo "<a href=engine-control.php?server=$server&key=exec_action&numero=1&snap=".$snap." class=\"bouton\">SAVE&nbsp;KML</a> ";
echo "</td>";
echo "<td width=100 width=100 height=40 bgcolor=black align=center>";
echo "<a href=engine-control.php?server=$server&key=exec_action&numero=2&snap=".$snap." class=\"bouton\">SAVE&nbsp;CSV</a> ";
echo "</td>";
*/

echo "<td width=100 height=40 bgcolor=black align=center>";
echo "<a href=engine-control.php?server=$server&key=snap&snap=".$snap." class=\"bouton\">SNAP&nbsp;SHOT</a> ";
echo "</td>";

/*
echo "<td width=100 height=40 bgcolor=black align=center>";
echo "<a href=engine-control.php?server=$server&key=write&snap=".$snap." class=\"bouton\">CONTROL WRITE</a> ";
echo "</td>";
echo "<td width=100 height=40 bgcolor=black align=center>";
echo "<a href=engine-control.php?server=$server&key=initialize&snap=".$snap." class=\"bouton\">INITIALIZE</a> ";
echo "</td>";
echo "<td width=100 height=40 bgcolor=black align=center>";
echo "<a href=engine-control.php?server=$server&key=cleanup&snap=".$snap." class=\"bouton\">CLEANUP</a> ";
echo "</td>";
echo "<td width=100 width=100 height=40 bgcolor=black align=center>";
echo "<a href=engine-control.php?server=$server&key=exec_action&numero=9&snap=".$snap." class=\"bouton\">DEBUG</a> ";
echo "</td>";
*/

echo "</tr>";

/*
echo "<tr>";
echo "<td width=100 height=40 bgcolor=black align=center>";
echo "<a href=engine-control.php?server=$server&key=camera&numero=1&snap=".$snap." class=\"bouton_cam\">REMOTE</a> ";
echo "</td>";
echo "<td width=100 height=40 bgcolor=black align=center>";
echo "<a href=engine-control.php?server=$server&key=camera&numero=3&snap=".$snap." class=\"bouton_cam\">CAM 3</a> ";
echo "</td>";
echo "<td width=100 height=40 bgcolor=black align=center>";
echo "<a href=engine-control.php?server=$server&key=camera&numero=5&snap=".$snap." class=\"bouton_cam\">CAM 5</a> ";
echo "</td>";
echo "<td width=100 height=40 bgcolor=black align=center>";
echo "<a href=engine-control.php?server=$server&key=camera&numero=7&snap=".$snap." class=\"bouton_cam\">CAM 7</a> ";
echo "</td>";
echo "<td width=100 height=40 bgcolor=black align=center>";
echo "<a href=engine-control.php?server=$server&key=camera&numero=9&snap=".$snap." class=\"bouton_cam\">CAM 9</a> ";
echo "</td>";
echo "<td width=100 height=40 bgcolor=black align=center>";
echo "<a href=engine-control.php?server=$server&key=camera&numero=11&snap=".$snap." class=\"bouton_cam\">CAM 11</a> ";
echo "</td>";
echo "<td width=100 height=40 bgcolor=black align=center>";
echo "<a href=engine-control.php?server=$server&key=camera&numero=13&snap=".$snap." class=\"bouton_cam\">TRACKS</a> ";
echo "</td>";
echo "<td width=100 height=40 bgcolor=black align=center>";
echo "<a href=engine-control.php?server=$server&key=camera&numero=15&snap=".$snap." class=\"bouton_cam\">POINT&nbsp;ZERO</a> ";
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td width=100 height=40 bgcolor=black align=center>";
echo "<a href=engine-control.php?server=$server&key=camera&numero=2&snap=".$snap." class=\"bouton_cam\">CAM 2</a> ";
echo "</td>";
echo "<td width=100 height=40 bgcolor=black align=center>";
echo "<a href=engine-control.php?server=$server&key=camera&numero=4&snap=".$snap." class=\"bouton_cam\">CAM 4</a> ";
echo "</td>";
echo "<td width=100 height=40 bgcolor=black align=center>";
echo "<a href=engine-control.php?server=$server&key=camera&numero=6&snap=".$snap." class=\"bouton_cam\">CAM 6</a> ";
echo "</td>";
echo "<td width=100 height=40 bgcolor=black align=center>";
echo "<a href=engine-control.php?server=$server&key=camera&numero=8&snap=".$snap." class=\"bouton_cam\">CAM 8</a> ";
echo "</td>";
echo "<td width=100 height=40 bgcolor=black align=center>";
echo "<a href=engine-control.php?server=$server&key=camera&numero=10&snap=".$snap." class=\"bouton_cam\">CAM 10</a> ";
echo "</td>";
echo "<td width=100 height=40 bgcolor=black align=center>";
echo "<a href=engine-control.php?server=$server&key=camera&numero=12&snap=".$snap." class=\"bouton_cam\">CAM 12</a> ";
echo "</td>";
echo "<td width=100 height=40 bgcolor=black align=center>";
echo "<a href=engine-control.php?server=$server&key=camera&numero=14&snap=".$snap." class=\"bouton_cam\">ZENITH</a> ";
echo "</td>";
echo "<td width=100 height=40 bgcolor=black align=center>";
echo "<a href=engine-control.php?server=$server&key=camera&numero=16&snap=".$snap." class=\"bouton_cam\">CAM 16</a> ";
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td colspan=2 rowspan=7 height=40 bgcolor=black align=center>";
echo "HORSE SPEED";
echo "</td>";
echo "<td width=100 height=40>";
echo "<a href=engine-control.php?server=$server&key=horse_speed_in&numero=01&snap=".$snap." class=\"bouton_in\">1 IN</a> ";
echo "</td>";
echo "<td width=100 height=40>";
echo "<a href=engine-control.php?server=$server&key=horse_speed_out&numero=01&snap=".$snap." class=\"bouton_out\">1 OUT</a> ";
echo "</td>";
echo "<td width=100 height=40>";
echo "<a href=engine-control.php?server=$server&key=horse_speed_in&numero=02&snap=".$snap." class=\"bouton_in\">2 IN</a> ";
echo "</td>";
echo "<td width=100 height=40>";
echo "<a href=engine-control.php?server=$server&key=horse_speed_out&numero=02&snap=".$snap." class=\"bouton_out\">2 OUT</a> ";
echo "</td>";
echo "<td width=100 height=40>";
echo "<a href=engine-control.php?server=$server&key=horse_speed_in&numero=03&snap=".$snap." class=\"bouton_in\">3 IN</a> ";
echo "</td>";
echo "<td width=100 height=40>";
echo "<a href=engine-control.php?server=$server&key=horse_speed_out&numero=03&snap=".$snap." class=\"bouton_out\">3 OUT</a> ";
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td width=100 height=40 bgcolor=black align=center>";
echo "<a href=engine-control.php?server=$server&key=horse_speed_in&numero=04&snap=".$snap." class=\"bouton_in\">4 IN</a> ";
echo "</td>";
echo "<td width=100 height=40 bgcolor=black align=center>";
echo "<a href=engine-control.php?server=$server&key=horse_speed_out&numero=04&snap=".$snap." class=\"bouton_out\">4 OUT</a> ";
echo "</td>";
echo "<td width=100 height=40 bgcolor=black align=center>";
echo "<a href=engine-control.php?server=$server&key=horse_speed_in&numero=05&snap=".$snap." class=\"bouton_in\">5 IN</a> ";
echo "</td>";
echo "<td width=100 height=40 bgcolor=black align=center>";
echo "<a href=engine-control.php?server=$server&key=horse_speed_out&numero=05&snap=".$snap." class=\"bouton_out\">5 OUT</a> ";
echo "</td>";
echo "<td width=100 height=40 bgcolor=black align=center>";
echo "<a href=engine-control.php?server=$server&key=horse_speed_in&numero=06&snap=".$snap." class=\"bouton_in\">6 IN</a> ";
echo "</td>";
echo "<td width=100 height=40 bgcolor=black align=center>";
echo "<a href=engine-control.php?server=$server&key=horse_speed_out&numero=06&snap=".$snap." class=\"bouton_out\">6 OUT</a> ";
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td width=100 height=40 bgcolor=black align=center>";
echo "<a href=engine-control.php?server=$server&key=horse_speed_in&numero=07&snap=".$snap." class=\"bouton_in\">7 IN</a> ";
echo "</td>";
echo "<td width=100 height=40 bgcolor=black align=center>";
echo "<a href=engine-control.php?server=$server&key=horse_speed_out&numero=07&snap=".$snap." class=\"bouton_out\">7 OUT</a> ";
echo "</td>";
echo "<td width=100 height=40 bgcolor=black align=center>";
echo "<a href=engine-control.php?server=$server&key=horse_speed_in&numero=08&snap=".$snap." class=\"bouton_in\">8 IN</a> ";
echo "</td>";
echo "<td width=100 height=40 bgcolor=black align=center>";
echo "<a href=engine-control.php?server=$server&key=horse_speed_out&numero=08&snap=".$snap." class=\"bouton_out\">8 OUT</a> ";
echo "</td>";
echo "<td width=100 height=40 bgcolor=black align=center>";
echo "<a href=engine-control.php?server=$server&key=horse_speed_in&numero=09&snap=".$snap." class=\"bouton_in\">9 IN</a> ";
echo "</td>";
echo "<td width=100 height=40 bgcolor=black align=center>";
echo "<a href=engine-control.php?server=$server&key=horse_speed_out&numero=09&snap=".$snap." class=\"bouton_out\">9 OUT</a> ";
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td width=100 height=40 bgcolor=black align=center>";
echo "<a href=engine-control.php?server=$server&key=horse_speed_in&numero=10&snap=".$snap." class=\"bouton_in\">10 IN</a> ";
echo "</td>";
echo "<td width=100 height=40 bgcolor=black align=center>";
echo "<a href=engine-control.php?server=$server&key=horse_speed_out&numero=10&snap=".$snap." class=\"bouton_out\">10 OUT</a> ";
echo "</td>";
echo "<td width=100 height=40 bgcolor=black align=center>";
echo "<a href=engine-control.php?server=$server&key=horse_speed_in&numero=11&snap=".$snap." class=\"bouton_in\">11 IN</a> ";
echo "</td>";
echo "<td width=100 height=40 bgcolor=black align=center>";
echo "<a href=engine-control.php?server=$server&key=horse_speed_out&numero=11&snap=".$snap." class=\"bouton_out\">11 OUT</a> ";
echo "</td>";
echo "<td width=100 height=40 bgcolor=black align=center>";
echo "<a href=engine-control.php?server=$server&key=horse_speed_in&numero=12&snap=".$snap." class=\"bouton_in\">12 IN</a> ";
echo "</td>";
echo "<td width=100 height=40 bgcolor=black align=center>";
echo "<a href=engine-control.php?server=$server&key=horse_speed_out&numero=12&snap=".$snap." class=\"bouton_out\">12 OUT</a> ";
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td width=100 height=40 bgcolor=black align=center>";
echo "<a href=engine-control.php?server=$server&key=horse_speed_in&numero=13&snap=".$snap." class=\"bouton_in\">13 IN</a> ";
echo "</td>";
echo "<td width=100 height=40 bgcolor=black align=center>";
echo "<a href=engine-control.php?server=$server&key=horse_speed_out&numero=13&snap=".$snap." class=\"bouton_out\">13 OUT</a> ";
echo "</td>";
echo "<td width=100 height=40 bgcolor=black align=center>";
echo "<a href=engine-control.php?server=$server&key=horse_speed_in&numero=14&snap=".$snap." class=\"bouton_in\">14 IN</a> ";
echo "</td>";
echo "<td width=100 height=40 bgcolor=black align=center>";
echo "<a href=engine-control.php?server=$server&key=horse_speed_out&numero=14&snap=".$snap." class=\"bouton_out\">14 OUT</a> ";
echo "</td>";
echo "<td width=100 height=40 bgcolor=black align=center>";
echo "<a href=engine-control.php?server=$server&key=horse_speed_in&numero=15&snap=".$snap." class=\"bouton_in\">15 IN</a> ";
echo "</td>";
echo "<td width=100 height=40 bgcolor=black align=center>";
echo "<a href=engine-control.php?server=$server&key=horse_speed_out&numero=15&snap=".$snap." class=\"bouton_out\">15 OUT</a> ";
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td width=100 height=40 bgcolor=black align=center>";
echo "<a href=engine-control.php?server=$server&key=horse_speed_in&numero=16&snap=".$snap." class=\"bouton_in\">16 IN</a> ";
echo "</td>";
echo "<td width=100 height=40 bgcolor=black align=center>";
echo "<a href=engine-control.php?server=$server&key=horse_speed_out&numero=16&snap=".$snap." class=\"bouton_out\">16 OUT</a> ";
echo "</td>";
echo "<td width=100 height=40 bgcolor=black align=center>";
echo "<a href=engine-control.php?server=$server&key=horse_speed_in&numero=17&snap=".$snap." class=\"bouton_in\">17 IN</a> ";
echo "</td>";
echo "<td width=100 height=40 bgcolor=black align=center>";
echo "<a href=engine-control.php?server=$server&key=horse_speed_out&numero=17&snap=".$snap." class=\"bouton_out\">17 OUT</a> ";
echo "</td>";
echo "<td width=100 height=40 bgcolor=black align=center>";
echo "<a href=engine-control.php?server=$server&key=horse_speed_in&numero=18&snap=".$snap." class=\"bouton_in\">18 IN</a> ";
echo "</td>";
echo "<td width=100 height=40 bgcolor=black align=center>";
echo "<a href=engine-control.php?server=$server&key=horse_speed_out&numero=18&snap=".$snap." class=\"bouton_out\">18 OUT</a> ";
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td width=100 height=40 bgcolor=black align=center>";
echo "<a href=engine-control.php?server=$server&key=horse_speed_in&numero=19&snap=".$snap." class=\"bouton_in\">19 IN</a> ";
echo "</td>";
echo "<td width=100 height=40 bgcolor=black align=center>";
echo "<a href=engine-control.php?server=$server&key=horse_speed_out&numero=19&snap=".$snap." class=\"bouton_out\">19 OUT</a> ";
echo "</td>";
echo "<td width=100 height=40 bgcolor=black align=center>";
echo "<a href=engine-control.php?server=$server&key=horse_speed_in&numero=20&snap=".$snap." class=\"bouton_in\">20 IN</a> ";
echo "</td>";
echo "<td width=100 height=40 bgcolor=black align=center>";
echo "<a href=engine-control.php?server=$server&key=horse_speed_out&numero=20&snap=".$snap." class=\"bouton_out\">20 OUT</a> ";
echo "</td>";
echo "<td width=100 height=40 bgcolor=black align=center>";
echo "<a href=engine-control.php?server=$server&key=horse_speed_in&snap=".$snap." class=\"bouton_in\">ALL&nbsp;IN</a> ";
echo "</td>";
echo "<td width=100 height=40 bgcolor=black align=center>";
echo "<a href=engine-control.php?server=$server&key=horse_speed_out&snap=".$snap." class=\"bouton_out\">ALL&nbsp;OUT</a> ";
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td colspan=2 height=40 bgcolor=black align=center>";
echo "LOGO";
echo "</td>";
echo "<td width=100 height=40 bgcolor=black align=center>";
echo "<a href=engine-control.php?server=$server&key=logo_in&snap=".$snap." class=\"bouton_in\">TAKE IN</a> ";
echo "</td>";
echo "<td width=100 height=40 bgcolor=black align=center>";
echo "<a href=engine-control.php?server=$server&key=logo_out&snap=".$snap." class=\"bouton_out\">OUT</a> ";
echo "</td>";
echo "<td colspan=2 height=40 bgcolor=black align=center>";
echo "LEADERS";
echo "</td>";
echo "<td width=100 height=40 bgcolor=black align=center>";
echo "<a href=engine-control.php?server=$server&key=leaders_in&snap=".$snap." class=\"bouton_in\">TAKE IN</a> ";
echo "</td>";
echo "<td width=100 height=40 bgcolor=black align=center>";
echo "<a href=engine-control.php?server=$server&key=leaders_out&snap=".$snap." class=\"bouton_out\">OUT</a> ";
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td colspan=2 height=40 bgcolor=black align=center>";
echo "LIVE VIDEO INPUT";
echo "</td>";
echo "<td width=100 height=40 bgcolor=black align=center>";
echo "<a href=engine-control.php?server=$server&key=background&numero=1&snap=".$snap." class=\"bouton_in\">TAKE IN</a> ";
echo "</td>";
echo "<td width=100 height=40 bgcolor=black align=center>";
echo "<a href=engine-control.php?server=$server&key=background&numero=0&snap=".$snap." class=\"bouton_out\">OUT</a> ";
echo "</td>";
echo "<td colspan=2 height=40 bgcolor=black align=center>";
echo "REFERENCE";
echo "</td>";
echo "<td width=100 height=40 bgcolor=black align=center>";
echo "<a href=engine-control.php?server=$server&key=reference_in&snap=".$snap." class=\"bouton_in\">TAKE IN</a> ";
echo "</td>";
echo "<td width=100 height=40 bgcolor=black align=center>";
echo "<a href=engine-control.php?server=$server&key=reference_out&snap=".$snap." class=\"bouton_out\">OUT</a> ";
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td colspan=2 height=40 bgcolor=black align=center>";
echo "SPONSOR";
echo "</td>";
echo "<td width=100 height=40 bgcolor=black align=center>";
echo "<a href=engine-control.php?server=$server&key=sponsor_in&snap=".$snap." class=\"bouton_in\">TAKE IN</a> ";
echo "</td>";
echo "<td width=100 height=40 bgcolor=black align=center>";
echo "<a href=engine-control.php?server=$server&key=sponsor_out&snap=".$snap." class=\"bouton_out\">OUT</a> ";
echo "</td>";
echo "<td colspan=2 height=40 bgcolor=black align=center>";
echo "BACK LAYER";
echo "</td>";
echo "<td width=100 height=40 bgcolor=black align=center>";
echo "<a href=engine-control.php?server=$server&key=viziocode_in&snap=".$snap." class=\"bouton_in\">TAKE IN</a> ";
echo "</td>";
echo "<td width=100 height=40 bgcolor=black align=center>";
echo "<a href=engine-control.php?server=$server&key=viziocode_out&snap=".$snap." class=\"bouton_out\">OUT</a> ";
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td colspan=2 height=40 bgcolor=black align=center>";
echo "POINTER";
echo "</td>";
echo "<td width=100 height=40 bgcolor=black align=center>";
echo "<a href=engine-control.php?server=$server&key=pointer_in&snap=".$snap." class=\"bouton_in\">TAKE IN</a> ";
echo "</td>";
echo "<td width=100 height=40 bgcolor=black align=center>";
echo "<a href=engine-control.php?server=$server&key=pointer_out&snap=".$snap." class=\"bouton_out\">OUT</a> ";
echo "</td>";
echo "<td colspan=2 height=40 bgcolor=black align=center>";
echo "CIRCLE ID";
echo "</td>";
echo "<td width=100 height=40 bgcolor=black align=center>";
echo "<a href=engine-control.php?server=$server&key=circle_in&snap=".$snap." class=\"bouton_in\">TAKE IN</a> ";
echo "</td>";
echo "<td width=100 height=40 bgcolor=black align=center>";
echo "<a href=engine-control.php?server=$server&key=circle_out&snap=".$snap." class=\"bouton_out\">OUT</a> ";
echo "</td>";
echo "</tr>";
echo "</tr>";
echo "<tr>";
echo "<td colspan=2 height=40 bgcolor=black align=center>";
echo "LOCATOR";
echo "</td>";
echo "<td width=100 height=40 bgcolor=black align=center>";
echo "<a href=engine-control.php?server=$server&key=locator_in&snap=".$snap." class=\"bouton_in\">TAKE IN</a> ";
echo "</td>";
echo "<td width=100 height=40 bgcolor=black align=center>";
echo "<a href=engine-control.php?server=$server&key=locator_out&snap=".$snap." class=\"bouton_out\">OUT</a> ";
echo "</td>";
echo "<td colspan=2 height=40 bgcolor=black align=center>";
echo "RUN TIME";
echo "</td>";
echo "<td width=100 height=40 bgcolor=black align=center>";
echo "<a href=engine-control.php?server=$server&key=running_time_in&snap=".$snap." class=\"bouton_in\">TAKE IN</a> ";
echo "</td>";
echo "<td width=100 height=40 bgcolor=black align=center>";
echo "<a href=engine-control.php?server=$server&key=running_time_out&snap=".$snap." class=\"bouton_out\">OUT</a> ";
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td colspan=2 height=40 bgcolor=black align=center>";
echo "SIDE STANDINGS";
echo "</td>";
echo "<td width=100 height=40 bgcolor=black align=center>";
echo "<a href=engine-control.php?server=$server&key=side_standings_in&snap=".$snap." class=\"bouton_in\">TAKE IN</a> ";
echo "</td>";
echo "<td width=100 height=40 bgcolor=black align=center>";
echo "<a href=engine-control.php?server=$server&key=side_standings_out&snap=".$snap." class=\"bouton_out\">OUT</a> ";
echo "</td>";
echo "<td colspan=2 height=40 bgcolor=black align=center>";
echo "FINISH";
echo "</td>";
echo "<td width=100 height=40 bgcolor=black align=center>";
echo "<a href=engine-control.php?server=$server&key=standings_in&snap=".$snap." class=\"bouton_in\">TAKE IN</a> ";
echo "</td>";
echo "<td width=100 height=40 bgcolor=black align=center>";
echo "<a href=engine-control.php?server=$server&key=standings_out&snap=".$snap." class=\"bouton_out\">OUT</a> ";
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td colspan=2 height=40 bgcolor=black align=center>";
echo "VIRTUAL REALITY";
echo "</td>";
echo "<td width=100 height=40 bgcolor=black align=center>";
echo "<a href=engine-control.php?server=$server&key=vr_in&snap=".$snap." class=\"bouton_in\">TAKE IN</a> ";
echo "</td>";
echo "<td width=100 height=40 bgcolor=black align=center>";
echo "<a href=engine-control.php?server=$server&key=vr_out&snap=".$snap." class=\"bouton_out\">OUT</a> ";
echo "</td>";
echo "<td colspan=2 height=40 bgcolor=black align=center>";
echo "GEO PROGRESS";
echo "</td>";
echo "<td width=100 height=40 bgcolor=black align=center>";
echo "<a href=engine-control.php?server=$server&key=geoprogress_in&snap=".$snap." class=\"bouton_in\">TAKE IN</a> ";
echo "</td>";
echo "<td width=100 height=40 bgcolor=black align=center>";
echo "<a href=engine-control.php?server=$server&key=geoprogress_out&snap=".$snap." class=\"bouton_out\">OUT</a> ";
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td colspan=2 height=40 bgcolor=black align=center>";
echo "RUNNING TIME";
echo "</td>";
echo "<td width=100 height=40 bgcolor=black align=center>";
echo "<a href=engine-control.php?server=$server&key=running_time_start&snap=".$snap." class=\"bouton\">START</a> ";
echo "</td>";
echo "<td width=100 height=40 bgcolor=black align=center>";
echo "<a href=engine-control.php?server=$server&key=running_time_stop&snap=".$snap." class=\"bouton\">STOP</a> ";
echo "</td>";
echo "<td height=40>";
echo "<a href=engine-control.php?server=$server&key=running_time_reset&snap=".$snap." class=\"bouton\">RESET</a> ";
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td colspan=2 height=40 bgcolor=black align=center>";
echo "SPLINE";
echo "</td>";
echo "<td width=100 height=40 bgcolor=black align=center>";
echo "<a href=engine-control.php?server=$server&key=exec_action&numero=13&snap=".$snap." class=\"bouton\">START</a> ";
echo "</td>";
echo "<td width=100 height=40 bgcolor=black align=center>";
echo "<a href=engine-control.php?server=$server&key=exec_action&numero=16&snap=".$snap." class=\"bouton\">STOP</a> ";
echo "</td>";
echo "<td width=100 height=40 bgcolor=black align=center>";
echo "<a href=engine-control.php?server=$server&key=exec_action&numero=16&snap=".$snap." class=\"bouton\">RESET</a> ";
echo "</td>";
echo "</tr>";
*/

echo "</table>";

echo "</body>";
echo "</html>";

?>
