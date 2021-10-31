<?php

/***
* e-Pasien from version 0.1 Beta
* Last modified: 06 April 2018
* Author : drg. Faisol Basoro
* Email : drg.faisol@basoro.org
*
* File : config.php
* Description : Main config, function and helper
* Licence under GPL
***/
if (preg_match ('/config.php/', basename($_SERVER['PHP_SELF']))) die ('Unable to access this script directly from browser!');
if (strlen($_SERVER['REQUEST_URI']) > 255 || strpos($_SERVER['REQUEST_URI'], "concat") || 
                strpos($_SERVER['REQUEST_URI'], "union") || strpos($_SERVER['REQUEST_URI'], "base64") || 
                strpos($_SERVER['REQUEST_URI'], "'")||strpos($_SERVER['REQUEST_URI'], "/")||
                strpos($_SERVER['REQUEST_URI'], "*")||strpos($_SERVER['REQUEST_URI'], ";")||
                strpos($_SERVER['REQUEST_URI'], "/*")||strpos($_SERVER['REQUEST_URI'], "\\")||
                strpos($_SERVER['REQUEST_URI'], "}")||strpos($_SERVER['REQUEST_URI'], "$")||
                strpos($_SERVER['REQUEST_URI'], "{")||strpos($_SERVER['REQUEST_URI'], "@")||
                strpos($_SERVER['REQUEST_URI'], "[")||strpos($_SERVER['REQUEST_URI'], "]")||
                strpos($_SERVER['REQUEST_URI'], "(")||strpos($_SERVER['REQUEST_URI'], ")")||
                strpos($_SERVER['REQUEST_URI'], "|")||strpos($_SERVER['REQUEST_URI'], ",")||
                strpos($_SERVER['REQUEST_URI'], "<")||strpos($_SERVER['REQUEST_URI'], ">")||
                strpos($_SERVER['REQUEST_URI'], "`")||strpos($_SERVER['REQUEST_URI'], ":")||
                strpos($_SERVER['REQUEST_URI'], "+")||strpos($_SERVER['REQUEST_URI'], "-")||
                strpos($_SERVER['REQUEST_URI'], "^")||strpos($_SERVER['REQUEST_URI'], "#")||
                strpos($_SERVER['REQUEST_URI'], "!")||strpos($_SERVER['REQUEST_URI'], "-")||
        strpos($_SERVER['REQUEST_URI'], "='")||strpos($_SERVER['REQUEST_URI'], "=/"));

define('VERSION', '0.1 Beta');
define('ABSPATH', dirname(__FILE__) . '/');
define('URL', 'http://rskaryahusada.net/direktur');
define('URLSIMRS', 'http://rskaryahusada.net:2001/webappsn');
define('DIR', '');
define('DB_HOST', '192.168.1.15');
define('DB_USER', 'rskh_2018');
define('DB_PASS', 'terserahq1w2e3r');
define('DB_NAME', 'rskh_simrs2020');
define('KODERS', '3215056');
define('KODEPROP','32');

define('BpjsApiUrl', 'https://new-api.bpjs-kesehatan.go.id:8080/new-vclaim-rest/');
define('ConsID', '10673');
define('SecretKey', '9lWE72A2A7');

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
function escape($string) {
    global $connection;
    return mysqli_real_escape_string($connection, $string);
}

function query($sql) {
    global $connection;
    $query = mysqli_query($connection, $sql);
    confirm($query);
    return $query;
}

function confirm($query) {
    global $connection;
    if(!$query) {
        die("Query failed! " . mysqli_error($connection));
    }
}

function fetch_array($result) {
    return mysqli_fetch_array($result);
}

function fetch_assoc($result) {
    return mysqli_fetch_assoc($result);
}

function num_rows($result) {
    return mysqli_num_rows($result);
}

// Get date and time
date_default_timezone_set('Asia/Jakarta');
$year       = date('Y');
$last_year  = $year-1;
$next_year  = $year+1;
$curr_month = date('m');
$month      = date('Y-m');
$date       = date('Y-m-d');
$time       = date('H:i:s');
$date_time  = date('Y-m-d H:i:s');
$tanggal    = date('d');
$bulan      = date('m');
$tahun      = date('Y');
$time       = date('H:i:s');
$nonbooking = date('His');

// Namahari
$hari=fetch_array(query("SELECT DAYNAME(current_date())"));
$namahari="";
if($hari[0]=="Sunday"){
    $namahari="AKHAD";
}else if($hari[0]=="Monday"){
    $namahari="SENIN";
}else if($hari[0]=="Tuesday"){
   	$namahari="SELASA";
}else if($hari[0]=="Wednesday"){
    $namahari="RABU";
}else if($hari[0]=="Thursday"){
    $namahari="KAMIS";
}else if($hari[0]=="Friday"){
    $namahari="JUMAT";
}else if($hari[0]=="Saturday"){
    $namahari="SABTU";
}

$day = date('D', strtotime($date));
$dayList = array(
	'Sun' => 'Minggu',
	'Mon' => 'Senin',
	'Tue' => 'Selasa',
	'Wed' => 'Rabu',
	'Thu' => 'Kamis',
	'Fri' => 'Jumat',
	'Sat' => 'Sabtu'
);
$bulan = date('m', strtotime($date));
$bulanList = array(
	'01' => 'Januari',
	'02' => 'Pebruari',
	'03' => 'Maret',
	'04' => 'April',
	'05' => 'Mei',
	'06' => 'Juni',
	'07' => 'Juli',
	'08' => 'Agustus',
	'09' => 'September',
	'10' => 'Oktober',
	'11' => 'November',
	'12' => 'Desember'
);

// Get settings
$getSettings = query("SELECT * FROM setting");
$dataSettings = fetch_assoc($getSettings);

// htmlentities remove #$%#$%@ values
function clean($string) {
    return htmlentities($string);
}

// redirect to another page
function redirect($location) {
    return header("Location: {$location}");
}

// add message to session
function set_message($message) {
    if(!empty($message)) {
        $_SESSION['message'] = $message;
    } else {
        $message = "";
    }
}

// display session message
function display_message() {
    if(isset($_SESSION['message'])) {
        echo '<div class="alert bg-pink alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'.$_SESSION['message'].'</div>';
        unset($_SESSION['message']);
    }
}

// show errors
function validation_errors($error) {
    $errors = '<div class="alert bg-pink alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'.$error.'</div>';
    return $errors;
}

