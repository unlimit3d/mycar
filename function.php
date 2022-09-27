<?php
// if (eregi("function.php", $_SERVER['PHP_SELF'])) {
// 	header("location:index.php");
// }

date_default_timezone_set('Asia/Bangkok');



function FIX_PHP_CORSS_ORIGIN(){
	//http://stackoverflow.com/questions/18382740/cors-not-working-php
	if(isset($_SERVER['HTTP_ORIGIN'])) {
    header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
    header('Access-Control-Allow-Credentials: true');
	// header('Access-Control-Allow-Headers :origin, Authorization, x-requested-with, content-type');
    header('Access-Control-Max-Age: 86400');    // cache for 1 day
  }
    // Access-Control headers are received during OPTIONS requests
  if($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
      header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
      header("Access-Control-Allow-Headers:{$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
    exit(0);
  }
}

function CONDB_MYSQL($host, $user, $pass, $dbname)
{
	mysql_connect($host, $user, $pass) or die(mysql_error());
	mysql_select_db($dbname) or die(mysql_error());
	mysql_query("SET NAMES UTF8");
}

function checkLogin()
{
	if ($_SESSION['discharge']['Username'] == '') {
		exit();
	}
}

function CON_CARDATA()
{
	$dbhost = "127.0.0.1";
	$dbuser = "root";
	$dbpass = "p@ssword";
	$db = "test";
	$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
	
	return $conn;
}
 
function CloseCON_CARDATA($conn)
{
 	$conn -> close();
}

function conutf($data)
{
	$data = iconv("TIS-620", "UTF-8", $data);
	return trim($data);
}

function contis($data)
{
	$data = iconv("UTF-8", "TIS-620", $data);
	return trim($data);
}

function con_cp874($data){
	$data=iconv('UTF-8','cp874',$data);
	return trim($data);
}

function setHN($hn)
{
	$hn = trim($hn);

	if ($hn != '') {
		return str_pad($hn, 7, " ", STR_PAD_LEFT);
	} else {
		return false;
	}
}

function setDoctor($doctor)
{
	$doctor = trim($doctor);

	if ($doctor != '') {
		return str_pad($doctor, 6, " ", STR_PAD_LEFT);
	} else {
		return false;
	}
}

function format_day($day)
{
	list($d, $m, $y) = explode("/", $day);
	$day = $y . $m . $d;
	return $day;
}

function format_day2($day)//Y-m-d
{
	list($d, $m, $y) = explode("/", $day);
	$day = ($y-543) .'-'. $m .'-'. $d;
	return $day;
}
function format_day3($day)
{
	list($d, $m, $y) = explode("/", $day);
	$day = ($y-543) .'-'. str_pad($m, 2, "0", STR_PAD_LEFT) .'-'. str_pad($d, 2, "0", STR_PAD_LEFT);
	return $day;
}

function getIP()
{
	if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
		$ip = $_SERVER['HTTP_CLIENT_IP'];
	} else {
		$ip = $_SERVER['REMOTE_ADDR'];
	}
	return $ip;
}

function getMonth()
{
	$Month = array('01' => 'มกราคม', '02' => 'กุมภาพันธ์', '03' => 'มีนาคม', '04' => 'เมษายน', '05' => 'พฤษภาคม', '06' => 'มิถุนายน', '07' => 'กรกฎาคม', '08' => 'สิงหาคม', '09' => 'กันยายน', '10' => 'ตุลาคม', '11' => 'พฤศจิกายน', '12' => 'ธันวาคม');
	return $Month;
}

function num_comma($number)
{
	if ($number != "") {
		$number = number_format($number, 0, "", ",");
		return $number;
	} else {
		return 0;
	}
}

function ThaiDate($FDate)
{
	$FDate = trim($FDate);
	if ($FDate != "") {
		$Y = substr($FDate, 0, 4);
		$M = substr($FDate, 4, 2);
		$D = substr($FDate, 6, 2);
		settype($D, "integer");
		$Full_ThaiDate = $D . ' ' . MonthThai($M) . ' ' . $Y;
		return $Full_ThaiDate;
	}
}

function ThaiDateS($FDate)
{
	$FDate = trim($FDate);
	if ($FDate != "") {
		$Y = substr($FDate, 0, 4);
		$M = substr($FDate, 4, 2);
		$D = substr($FDate, 6, 2);
		settype($D, "integer");
		$Full_ThaiDate = $D . ' ' . MonthThaiS($M) . ' ' . $Y;
		return $Full_ThaiDate;
	}
}

function MonthThai($m)
{
	settype($m, "integer");
	$Month = array(1 => "มกราคม", 2 => "กุมภาพันธ์", 3 => "มีนาคม", 4 => "เมษายน", 5 => "พฤษภาคม", 6 => "มิถุนายน",
		7 => "กรกฎาคม", 8 => "สิงหาคม", 9 => "กันยายน", 10 => "ตุลาคม", 11 => "พฤศจิกายน", 12 => "ธันวาคม");
	return $Month[$m];
}

function MonthThaiS($m)
{
	settype($m, "integer");
	$Month = array(1 => "ม.ค.", 2 => "ก.พ.", 3 => "มี.ค.", 4 => "เม.ย.", 5 => "พ.ค.", 6 => "มิ.ย.",
		7 => "ก.ค.", 8 => "ส.ค.", 9 => "ก.ย.", 10 => "ต.ค.", 11 => "พ.ย.", 12 => "ธ.ค.");
	return $Month[$m];
}

function month_year_number()
{
	$fy_number = array(10, 11, 12, 1, 2, 3, 4, 5, 6, 7, 8, 9);
	return $fy_number;
}

function NumDay($Month, $Year)
{
	settype($Month, "integer");
	if ($Month == 1 || $Month == 3 || $Month == 5 || $Month == 7 || $Month == 8 || $Month == 10 || $Month == 12) {
		$NumDay = 31;
	} else if ($Month == 4 || $Month == 6 || $Month == 9 || $Month == 11) {
		$NumDay = 30;
	} else if ($Month == 2) {
		if ($Year % 4 == 0) {
			$NumDay = 29;
		} else {
			$NumDay = 28;
		}
	}
	return $NumDay;
}

function FormatDate($DateInput)
{
	list($D, $M, $Y) = explode("/", $DateInput);
	return $Y . $M . $D;
}

function FormatDateInput($DateInput)
{
	if ($DateInput != '') {
		$Y = substr($DateInput, 0, 4);
		$M = substr($DateInput, 4, 2);
		$D = substr($DateInput, 6, 2);
		return $D . '/' . $M . '/' . $Y;
	}
}

function FormatDateInput2($DateInput)
{
	if ($DateInput != '') {
		$Y = substr($DateInput, 0, 4);
		$M = substr($DateInput, 4, 2);
		$D = substr($DateInput, 6, 2);
		return ($Y-543) . '-' . $M . '-' . $D;
	}
}// 25620225 -> 2019-02-25

function FormatDateThai($datetime)
{
	list($D, $M, $Y) = split('/', $datetime); 
	$Y = $Y + 543; // เปลี่ยน ค.ศ. เป็น พ.ศ.
	return $D . '/' . $M . '/' . $Y;
}// 13/11/2018 -> 13/11/2561

function conv_Data12($bday){
  $day  = substr($bday,0,4)+543;
  $day .= substr($bday,5,2);
  $day .= substr($bday,8,2);
  return $day;
}// 2017-04-25 =>25600425

function SetPid($txt)
{
	$sPid = substr($txt, 0, 1) . "-" . substr($txt, 1, 4) . "-" . substr($txt, 5, 5) . "-" . substr($txt, 10, 2) . "-" . substr($txt, 12, 1);
	return $sPid;
}

function MonthInYear($year)
{
	$r_month = array(
		($year - 1) . '10',
		($year - 1) . '11',
		($year - 1) . '12',
		$year . '01',
		$year . '02',
		$year . '03',
		$year . '04',
		$year . '05',
		$year . '06',
		$year . '07',
		$year . '08',
		$year . '09',
	);
	return $r_month;
}

function CalAge($birthday)
{
	if (trim($birthday) == '') {
		return false;
	}

	$today = date("Ymd");

	$byear = substr($birthday, 0, 4) - 543;
	$bmonth = substr($birthday, 4, 2);
	$bday = substr($birthday, 6, 2);

	$tyear = date("Y");
	$tmonth = date("m");
	$tday = date("d");

	if ($byear < 1970) {
		$yearadd = 1970 - $byear;
		$byear = 1970;
	} else {
		$yearadd = 0;
	}

	$birth_time = mktime(0, 0, 0, $bmonth, $bday, $byear);
	$time_now = mktime(0, 0, 0, $tmonth, $tday, $tyear);

	$age_time = ($time_now - $birth_time);
	$age = array("Y" => (date("Y", $age_time) - 1970 + $yearadd), "M" => (date("m", $age_time) - 1), "D" => (date("d", $age_time) - 1));
	return ($age);
}

function chk_str($str)
{
	$status = true;
	$no_str = array("!", "@", "#", "$", "%", "^", "&", "*", "(", ")", "-", "_", "=", "+", "/", ":", ";", "<", ">", "|", "[", "]", "{", "}", '"', "?", "?", ",");
	foreach ($no_str as $a) {
		if (strstr($str, $a)) {
			$status = false;
		}
	}

	return $status;
}

function EnCodexFromService( $pid, $xtype, $Datetime ){
	 $client = new SoapClient("http://172.16.1.27:8081/wsdl/IEnIndexSRV",
	 array( "trace"      => 1,  // enable trace to view what is happening
			   "exceptions" => 0,  // disable exceptions
			   "cache_wsdl" => 0)   // disable any caching on the wsdl, encase you alter the wsdl server
			);
	 $data = $client->GetWebEnIndex( $pid, $xtype, $Datetime );
	 return $data;
}

function Fill_0($num)
{
	if ($num == '') {
		return 0;
	} else {
		return $num;
	}

}

function chk_news_date($birth_time)
{
	$byear = date("Y", $birth_time);
	$time_now = mktime(date("G"), date("i"), date("s"), date("m"), date("d"), date("Y"));

	if ($byear < 1970) {
		$yearadd = 1970 - $byear;
		$byear = 1970;
	} else {
		$yearadd = 0;
	}

	$age_time = ($time_now - $birth_time);

	if ((date("Y", $age_time) - 1970 + $yearadd) == 0 && (date("m", $age_time) - 1) == 0 && (date("d", $age_time) - 1) <= 14) {
		return true;
	} else {
		return false;
	}
}

function sername_file($filename)
{
	$sername_arr = explode(".", $filename);
	$sername = $sername_arr[(count($sername_arr) - 1)];
	return $sername;
}

function checkPID($pid)
{
	if (strlen($pid) != 13) {return false;}
	for ($i = 0, $sum = 0; $i < 12; $i++) {
		$sum += (int) ($pid{$i}) * (13 - $i);
	}

	if ((11 - ($sum % 11)) % 10 == (int) ($pid{12})) {
		return true;
	} else {
		return false;
	}
}

function checkThai($str)
{
	$is_thai_word = trim(preg_replace('/[^ก-๙]/u', '', $str));

	if ($is_thai_word != "") {
		return true;
	} else {
		return false;
	}
}

function checkEng($str)
{
	if (strlen($str) != strlen(utf8_decode($str))) {
		return false;
	} else {
		return true;
	}
}

function checkEmail($email)
{
	if (trim($email) != '') {
		if (!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email)) {
			return false;
		}
	}
	return true;
}

function num2wordsThai($num)
{
	$num = str_replace(",", "", $num);
	$num_decimal = explode(".", $num);
	$num = $num_decimal[0];
	$returnNumWord;
	$lenNumber = strlen($num);
	$lenNumber2 = $lenNumber - 1;
	$kaGroup = array("", "สิบ", "ร้อย", "พัน", "หมื่น", "แสน", "ล้าน", "สิบ", "ร้อย", "พัน", "หมื่น", "แสน", "ล้าน");
	$kaDigit = array("", "หนึ่ง", "สอง", "สาม", "สี่", "ห้า", "หก", "เจ็ต", "แปด", "เก้า");
	$kaDigitDecimal = array("ศูนย์", "หนึ่ง", "สอง", "สาม", "สี่", "ห้า", "หก", "เจ็ต", "แปด", "เก้า");
	$ii = 0;
	for ($i = $lenNumber2; $i >= 0; $i--) {
		$kaNumWord[$i] = substr($num, $ii, 1);
		$ii++;
	}
	$ii = 0;
	for ($i = $lenNumber2; $i >= 0; $i--) {
		if (($kaNumWord[$i] == 2 && $i == 1) || ($kaNumWord[$i] == 2 && $i == 7)) {
			$kaDigit[$kaNumWord[$i]] = "ยี่";
		} else {
			if ($kaNumWord[$i] == 2) {
				$kaDigit[$kaNumWord[$i]] = "สอง";
			}
			if (($kaNumWord[$i] == 1 && $i <= 2 && $i == 0) || ($kaNumWord[$i] == 1 && $lenNumber > 6 && $i == 6)) {
				if ($kaNumWord[$i + 1] == 0) {
					$kaDigit[$kaNumWord[$i]] = "หนึ่ง";
				} else {
					$kaDigit[$kaNumWord[$i]] = "เอ็ด";
				}
			} elseif (($kaNumWord[$i] == 1 && $i <= 2 && $i == 1) || ($kaNumWord[$i] == 1 && $lenNumber > 6 && $i == 7)) {
				$kaDigit[$kaNumWord[$i]] = "";
			} else {
				if ($kaNumWord[$i] == 1) {
					$kaDigit[$kaNumWord[$i]] = "หนึ่ง";
				}
			}
		}
		if ($kaNumWord[$i] == 0) {
			if ($i != 6) {
				$kaGroup[$i] = "";
			}
		}
		$kaNumWord[$i] = substr($num, $ii, 1);
		$ii++;
		$returnNumWord .= $kaDigit[$kaNumWord[$i]] . $kaGroup[$i];
	}
	if (isset($num_decimal[1])) {
		$returnNumWord .= "จุด";
		for ($i = 0; $i < strlen($num_decimal[1]); $i++) {
			$returnNumWord .= $kaDigitDecimal[substr($num_decimal[1], $i, 1)];
		}
	}
	return $returnNumWord;
}

function thdate($datetime)
{
	list($Y, $m, $d) = split('/', $datetime); // แยกวันเป็น ปี เดือน วัน
	$Y = $Y + 543; // เปลี่ยน ค.ศ. เป็น พ.ศ.
	return $Y . $m . $d;
}

function DateDiff($strDate1, $strDate2)
{
	return (strtotime($strDate2) - strtotime($strDate1)) / (60 * 60 * 24); // 1 day = 60*60*24
}
function TimeDiff($strTime1, $strTime2)
{
	return (strtotime($strTime2) - strtotime($strTime1)) / (60 * 60); // 1 Hour =  60*60
}
function DateTimeDiff($strDateTime1, $strDateTime2)
{
	return (strtotime($strDateTime2) - strtotime($strDateTime1)) / (60 * 60); // 1 Hour =  60*60
}

// echo "Date Diff = ".DateDiff("2008-08-01","2008-08-31")."<br>";
// echo "Time Diff = ".TimeDiff("00:00","19:00")."<br>";
// echo "Date Time Diff = ".DateTimeDiff("2008-08-01 00:00","2008-08-01 19:00")."<br>";

function PCT_List()
{
	$PCT = array(
		'ศัลยกรรม' => array('NEU', 'SURG', 'URO', 'PSURG', 'CVT', 'PLAST', 'SURHD'),
		'กุมารเวชกรรม' => array('PED', 'SKIN'),
		'อายุรกรรม' => array('MED', 'MEDHD', 'PSY', 'MEDBD'),
		'สูตินรีเวชกรรม' => array('OBG', 'OBS'),
		'ศัลยกรรมกระดูก' => array('ORTHO'),
		'หู คอ จมูก' => array('ENT'),
		'ทันตกรรม' => array('DENT'),
		'จักษุ' => array('EYE'),
	);
	return $PCT;
}



function addLog($username,$action,$note=''){
	$IP = getIP();
	$conn = CON_ESCAN();
	$sql = "INSERT INTO OPDV_LOG(USER_LOG,ACTION,IP,DATETIME_LOG,NOTE) VALUES('$username','$action','$IP',GETDATE(),'$note') ";
	$rs = sqlsrv_query($conn,$sql);
	return $rs;
}