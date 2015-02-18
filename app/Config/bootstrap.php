<?php
/**
 * This file is loaded automatically by the app/webroot/index.php file after core.php
 *
 * This file should load/create any application wide configuration settings, such as
 * Caching, Logging, loading additional configuration files.
 *
 * You should also use this file to include any files that provide global functions/constants
 * that your application uses.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.10.8.2117
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

// Setup a 'default' cache configuration for use in the application.
Cache::config('default', array('engine' => 'File'));

/**
 * The settings below can be used to set additional paths to models, views and controllers.
 *
 * App::build(array(
 *     'Model'                     => array('/path/to/models/', '/next/path/to/models/'),
 *     'Model/Behavior'            => array('/path/to/behaviors/', '/next/path/to/behaviors/'),
 *     'Model/Datasource'          => array('/path/to/datasources/', '/next/path/to/datasources/'),
 *     'Model/Datasource/Database' => array('/path/to/databases/', '/next/path/to/database/'),
 *     'Model/Datasource/Session'  => array('/path/to/sessions/', '/next/path/to/sessions/'),
 *     'Controller'                => array('/path/to/controllers/', '/next/path/to/controllers/'),
 *     'Controller/Component'      => array('/path/to/components/', '/next/path/to/components/'),
 *     'Controller/Component/Auth' => array('/path/to/auths/', '/next/path/to/auths/'),
 *     'Controller/Component/Acl'  => array('/path/to/acls/', '/next/path/to/acls/'),
 *     'View'                      => array('/path/to/views/', '/next/path/to/views/'),
 *     'View/Helper'               => array('/path/to/helpers/', '/next/path/to/helpers/'),
 *     'Console'                   => array('/path/to/consoles/', '/next/path/to/consoles/'),
 *     'Console/Command'           => array('/path/to/commands/', '/next/path/to/commands/'),
 *     'Console/Command/Task'      => array('/path/to/tasks/', '/next/path/to/tasks/'),
 *     'Lib'                       => array('/path/to/libs/', '/next/path/to/libs/'),
 *     'Locale'                    => array('/path/to/locales/', '/next/path/to/locales/'),
 *     'Vendor'                    => array('/path/to/vendors/', '/next/path/to/vendors/'),
 *     'Plugin'                    => array('/path/to/plugins/', '/next/path/to/plugins/'),
 * ));
 *
 */

/**
 * Custom Inflector rules can be set to correctly pluralize or singularize table, model, controller names or whatever other
 * string is passed to the inflection functions
 *
 * Inflector::rules('singular', array('rules' => array(), 'irregular' => array(), 'uninflected' => array()));
 * Inflector::rules('plural', array('rules' => array(), 'irregular' => array(), 'uninflected' => array()));
 *
 */

/**
 * Plugins need to be loaded manually, you can either load them one by one or all of them in a single call
 * Uncomment one of the lines below, as you need. Make sure you read the documentation on CakePlugin to use more
 * advanced ways of loading plugins
 *
 * CakePlugin::loadAll(); // Loads all plugins at once
 * CakePlugin::load('DebugKit'); //Loads a single plugin named DebugKit
 *
 */

/**
 * You can attach event listeners to the request lifecycle as Dispatcher Filter. By default CakePHP bundles two filters:
 *
 * - AssetDispatcher filter will serve your asset files (css, images, js, etc) from your themes and plugins
 * - CacheDispatcher filter will read the Cache.check configure variable and try to serve cached content generated from controllers
 *
 * Feel free to remove or add filters as you see fit for your application. A few examples:
 *
 * Configure::write('Dispatcher.filters', array(
 *		'MyCacheFilter', //  will use MyCacheFilter class from the Routing/Filter package in your app.
 *		'MyPlugin.MyFilter', // will use MyFilter class from the Routing/Filter package in MyPlugin plugin.
 * 		array('callable' => $aFunction, 'on' => 'before', 'priority' => 9), // A valid PHP callback type to be called on beforeDispatch
 *		array('callable' => $anotherMethod, 'on' => 'after'), // A valid PHP callback type to be called on afterDispatch
 *
 * ));
 */
Configure::write('Dispatcher.filters', array(
	'AssetDispatcher',
	'CacheDispatcher'
));

/**
 * Configures default file logging options
 */
App::uses('CakeLog', 'Log');
CakeLog::config('debug', array(
	'engine' => 'File',
	'types' => array('notice', 'info', 'debug'),
	'file' => 'debug',
));
CakeLog::config('error', array(
	'engine' => 'File',
	'types' => array('warning', 'error', 'critical', 'alert', 'emergency'),
	'file' => 'error',
));
CakePlugin::load('CakePdf', array('bootstrap' => true, 'routes' => true));
Configure::write('CakePdf', array(
        'engine' => 'CakePdf.DomPdf',
        'options' => array(
            'print-media-type' => false,
            'outline' => true,
            'dpi' => 96
        ),
        'margin' => array(
            'bottom' => 15,
            'left' => 50,
            'right' => 30,
            'top' => 45
        ),
        'orientation' => 'landscape',
        'download' => true
    ));

define('CSS_VER','1.1');
define('CSS_CACHE',true);
global $logRequest;
$logRequest = true;

define('TIMEOUT_TIME',60*30); // 30 Minutes
define('LOGIN_ATTEMPT_TIME',60*15); // 15 Minutes
define('CAPTCHA_HIT_LIMIT',5); // on 5th attempt show captcha
define('ENABLE_SSO',false);
define('GOOGLE_ANALYTICS_ID','');

define('THEME','');
define('SITE_PATH','/');


//define('SMTP_HOST','smtpout.secureserver.net');
define('SMTP_HOST','192.168.1.4');
define('MAILER','smtp');
define('SMTP_AUTH',false);
define('MAILER_PORT',25);
define('EXTRASTEPSOFPROFILE',4);
define('DEFAULT_LANGUAGE','eng');
define('MeasureUuid','4000000-efb0-4e17-9303-009832e59055');
define('MealTypeID',1);
define('RecipeTypeID',7);
define('EXCLUDE_PLAN_LIMIT',2);
define('WEBSITE_URL','http://www.yourdomain.com');
define('SITE_NAME','Your Site Name');
define('Assessment_selected_categories',3);

define('PHASE_ID',109);
define('CATEGORY_ID',32);
define('DIET_ID',1);
define('DEFAULT_MEAL_TYPE_ID',1);
define('LAB_VALUES_CAT_ID',30);
define('LIFECAFE_ID',21);
define('STRENGTT_TYPE_ID',2);
define('ADMIN_EMAIL','ashfaqzp@gmail.com');
 
 
define('ACCOUNT_COUPEN','4000000-2688-4892-a063-034832e59055');
			$path = 'resources'.DS.'videos';
			$path = base64_encode(serialize($path));

define('EXERCISE_PATH',$path);

function getUsedVariables($templateBody) {

    preg_match_all ("/[\\w\\s]*:(\\w*)[\\w\\s]*/", $templateBody, $res); // extract all variables from template body
    if(isset($res[1])) {
        return $res[1]; // $res[1] will have list of variables that were used in the template
    }else {
        return array();
    }
}

///// SMTP Mailer settings.
define('MAIL_TO','noreply@yourdomain.com');
define('MAIL_FROM','noreply@yourdomain.com');
///// SMTP Mailer settings.

function smtpSettings() {
    return array(
            'port'=>MAILER_PORT,
            'timeout'=>'30',
            'host' => SMTP_HOST,

    );
}

function MDY2YMD( $date ,$join = '-') {
    list($mm,$dd,$yyyy) = split("[-/ ]",$date);
    return $yyyy.$join.$mm.$join.$dd;
}

function YMD2MDY( $date ,$join = '-') {
    list($yyyy,$mm,$dd) = split("[-/ ]",$date);
	return $mm.$join.$dd.$join.$yyyy;
}
function YMD2MDYWithSec( $date ,$join = '-') {
    list($yyyy,$mm,$dd, $hour, $min, $sec) = split("[-/: ]",$date);
    return date("m".$join."d".$join."Y H:i:s", mktime($hour,$min,$sec,$mm,$dd,$yyyy));
}

function timeConvert($time, $format, $seconds = false) {

    #
    #   $time   - String:  Time in either 24hr format or 12hr AM/PM format
    #   $format - Integer: "0" = 24 to 12 convert    "1" = 12 to 24 convert
    #
    #   RETURNS Time String converted to the proper format
    #
  
    if ($format == 0) {         //  24 to 12 hr convert
        $time = trim ($time);

        if ($seconds == true) {
            $RetStr = date("g:i:s a", strtotime($time));
        }
        else {
            $RetStr = date("g:i a", strtotime($time));
        }
    }
    elseif ($format == 1) {     // 12 to 24 hr convert
        $time = trim ($time);

        if ($seconds == true) {
            $RetStr = date("H:i:s", strtotime($time));
        }
        else {
            $RetStr = date("H:i", strtotime($time));
        }
    }

    return $RetStr;
}
function slug($string, $replacement = '_', $length = 255) {
    $string = strtolower(Inflector::slug($string));
    if (strlen($string) > $length) {
        $string = substr($string, 0, $length);
    }
    return $string;
}

function transformOperators( $operator, $amount ) {
    switch( $operator ) {
        case 'exactly' :
            $min = round($amount - $amount/100*10,1);
            $max = $amount ; //round($amount + $amount/100*10,1);
            $avg = $amount;
            break;

        case 'at_most' :
            $min = 0;
            $max = $amount;
            $avg = $amount;
            break;

        case 'at_least' :
            $min = $amount;
            $max = false;
            $avg = $amount;
            break;

        case 'between' :
            $amount = preg_split("[,|:|-]",$amount);
            $min = isset($amount[0])?$amount[0]:0;
            $max = isset($amount[1])?$amount[1]:$amount;
            $avg = round(((int)$min+(int)$max)/2);
            break;
    }
    return array(
            'min' => $min,
            'max' => $max,
            'avg' => $avg
    );
}

$cmsKeys = array();
function __sc($key, $return = false) {
    global $cmsKeys;
    $key = trim($key);
    $language = DEFAULT_LANGUAGE;

    if ( ($contents = Cache::read($key.'.'.$language)) === false) {
        App::import('Model', 'Content');
        $Content = new Content();
        $contents = $Content->getContentsByKey($key, $language);
        Cache::write($key.'.'.$language, $contents);
    }
    $exist = true;
    if(empty($contents)) {
        $exist = false;
        $contents = $key;
		App::import('model','MissingCmsKey');
		$cmsKeyObj = new MissingCmsKey();
		$cmsKeyObj->create();
		$cmsKeyObj->save( array(
			'page_url' => $_SERVER['REQUEST_URI'],
			'id' => $key
		));
    }

    $cmsKeys[ $key ] = array($exist,$contents);
    if($return) {
        return $contents ;
    }else {
        echo $contents ;
    }
}

function limit_chars($str, $limit = 50) {
    $strLen = strlen($str);
    $result = $str;
    if($strLen > $limit) {
        $result = substr($str, 0, $limit).'...';
    }
    return $result;
}

function limit_words( $str, $wordLimit, &$limited=false) {
    $words = split(' ',$str);
    if( count($words) > $wordLimit ) {
        $limited = true;
        $str = implode(' ',array_slice($words,0,$wordLimit));
        return trim( $str ).'...';
    }else {
        $limited = false;
        return $str;
    }
}
function clientToServerTime( $currentClientTime, $clientTimeZone ) {
    $timeDifference =  SERVER_TIMEZONE - $clientTimeZone ;
    return strtotime("$timeDifference hours",$currentClientTime);
}

function serverToClientTime( $currentServerTime, $clientTimeZone ) {
    $timeDifference =  $clientTimeZone - SERVER_TIMEZONE;
    return strtotime("$timeDifference hours",$currentServerTime);
}

define('SERVER_TIMEZONE','-7');

function filterJavascript($data) {
    if(empty($data)) {
        return null;
    }
    App::import('Sanitize');
    $replaceString0 = Sanitize::html('<script>');
    $replaceString1  = Sanitize::html('</script>');
    $data = str_replace('<script>',$replaceString0,$data );
    $data = str_replace('</script>',$replaceString1,$data );
    return $data;
}

function imageResize( $imagePath, $w=100, $h=100 ) {
    $img = $imagePath;
    $percent = 0;
    $constrain = 0;

    // get image size of img
    $x = @getimagesize($img);
    // image width
    $sw = $x[0];
    // image height
    $sh = $x[1];

    if ($percent > 0) {
        // calculate resized height and width if percent is defined
        $percent = $percent * 0.01;
        $w = $sw * $percent;
        $h = $sh * $percent;
    } else {
        if (isset ($w) AND !isset ($h)) {
            // autocompute height if only width is set
            $h = (100 / ($sw / $w)) * .01;
            $h = @round ($sh * $h);
        } elseif (isset ($h) AND !isset ($w)) {
            // autocompute width if only height is set
            $w = (100 / ($sh / $h)) * .01;
            $w = @round ($sw * $w);
        } elseif (isset ($h) AND isset ($w) AND isset ($constrain)) {
            // get the smaller resulting image dimension if both height
            // and width are set and $constrain is also set
            $hx = (100 / ($sw / $w)) * .01;
            $hx = @round ($sh * $hx);

            $wx = (100 / ($sh / $h)) * .01;
            $wx = @round ($sw * $wx);

            if ($hx < $h) {
                $h = (100 / ($sw / $w)) * .01;
                $h = @round ($sh * $h);
            } else {
                $w = (100 / ($sh / $h)) * .01;
                $w = @round ($sw * $w);
            }
        }
    }

            $im = @ImageCreateFromJPEG ($img) or // Read JPEG Image
            $im = @ImageCreateFromPNG ($img) or // or PNG Image
            $im = @ImageCreateFromGIF ($img) or // or GIF Image
            $im = false; // If image is not JPEG, PNG, or GIF

    if (!$im) {
        // We get errors from PHP's ImageCreate functions...
        // So let's echo back the contents of the actual image.
        readfile ($img);
    } else {
        // Create the resized image destination
        $thumb = @ImageCreateTrueColor ($w, $h);
        // Copy from image source, resize it, and paste to image destination
        @ImageCopyResampled ($thumb, $im, 0, 0, 0, 0, $w, $h, $sw, $sh);
        // Output resized image
        $tmpFileName = tempnam(sys_get_temp_dir(),'tls3');
        @ImageJPEG ($thumb,$tmpFileName);
        return $tmpFileName;
    }

}

function array2json($arr) {
    $parts = array();
    $is_list = false;

    //Find out if the given array is a numerical array
    $keys = array_keys($arr);
    $max_length = count($arr)-1;
    if(($keys[0] == 0) and ($keys[$max_length] == $max_length)) {//See if the first key is 0 and last key is length - 1
        $is_list = true;
        for($i=0; $i<count($keys); $i++) { //See if each key correspondes to its position
            if($i != $keys[$i]) { //A key fails at position check.
                $is_list = false; //It is an associative array.
                break;
            }
        }
    }

    foreach($arr as $key=>$value) {
        if(is_array($value)) { //Custom handling for arrays
            if($is_list) $parts[] = array2json($value); /* :RECURSION: */
            else $parts[] = '"' . $key . '":' . array2json($value); /* :RECURSION: */
        } else {
            $str = '';
            if(!$is_list) $str = '"' . $key . '":';

            //Custom handling for multiple data types
            if(is_numeric($value)) $str .= $value; //Numbers
            elseif($value === false) $str .= 'false'; //The booleans
            elseif($value === true) $str .= 'true';
            else $str .= '"' . addslashes($value) . '"'; //All other things
            // :TODO: Is there any more datatype we should be in the lookout for? (Object?)

            $parts[] = $str;
        }
    }
    $json = implode(',',$parts);

    if($is_list) return '[' . $json . ']';//Return numerical JSON
    return '{' . $json . '}';//Return associative JSON
}

function getUnderscoredName($fName) {
    $fileName = '';
    $delemetersArray[]=' ';
    $delemetersArray[]='!';
    $delemetersArray[]='@';
    $delemetersArray[]='#';
    $delemetersArray[]='$';
    $delemetersArray[]='%';
    $delemetersArray[]='^';
    $delemetersArray[]='&';
    $delemetersArray[]='*';
    $delemetersArray[]='(';
    $delemetersArray[]=')';
    $delemetersArray[]='~';
    $delemetersArray[]='-';
    $delemetersArray[]=',';
    $delemetersArray[]='<';
    $delemetersArray[]='>';

    foreach($delemetersArray as $key=>$delemetr) {
        $fileName = '';
        if($key==0) {
            $fName = String::tokenize($fName," ");
            foreach($fName as $key=>$value) {
                if($key==0)
                    $fileName = $value;
                else
                    $fileName = $fileName.'_'.$value;
            }
        }
        else {
            $fName = String::tokenize($fName,$delemetr);
            foreach($fName as $key=>$value) {
                if($key==0)
                    $fileName = $value;
                else
                    $fileName = $fileName.$value;
            }
        }
        $fName = $fileName;
    }
    return $fileName;
}

function converTime($date) {
    $time = strtotime($date);
    $minutesAgo = floor ( ( time() - $time ) / 60 );
    $hoursAgo = floor( $minutesAgo / 60 );
    $daysAgo = floor ( $hoursAgo / 24 );
    if($daysAgo >= 360) {
        $date = date('m/d/Y', $time);
    }else if($daysAgo >= 1) {
        $date = date('M d', $time);
    }else {
        $date = date('h:i A', $time);
    }
    return $date;
}

function toCamelCase($str, $capitalise_first_char = false) {
    if($capitalise_first_char) {
        $str[0] = strtoupper($str[0]);
    }
    $func = create_function('$c', 'return " ".strtoupper($c[1]);');
    return preg_replace_callback('/ ([a-z])/', $func, $str);
}

function isFileExists($path, $fileName) {
    $path = ROOT . DS . 'files' . DS . $path. DS;
    if( file_exists( $path.$fileName ) ) {
        return true ;
    }else {
        return false ;
    }
}

function getMiddleStr( $str, $firstChar = '(', $lastChar = ')' ) {
    $index = 0 ;
    $result = '' ;
    $find = false ;
    while( $index < strlen($str) ) {
        if( !$find ) {
            if( low($str[$index]) == $firstChar ) {
                $find = true ;
            }
        }else {
            if( low($str[$index]) != $lastChar ) {
                $result = $result.$str[$index] ;
            }else {
                return $result ;
            }
        }
        $index++ ;
    }
    return $result ;
}

function removeSpecialChar($name) {
    $special_Chars = array("/[^a-zA-Z0-9]/", "/_+/", "/_$/");
    //removing specail characters from string
    $str = preg_replace($special_Chars, ' ' , $name);
    //removing multiple spaces from string
    for($i=0; $i<strlen($str); $i++) {
        $str = str_replace('  ', ' ', $str);
    }
    return $str;
    
}
function liveSiteUrl( $domainName ) {
    $liveUrl = "http://$domainName.".FLT_DOMAIN ;
    return $liveUrl ;

}
function getFeetAndInches($number = 0) {
    if(empty($number)) {
        return array('feet' => 0, 'inches' => 0);
    }

    $feet = floor($number / 12);
    $inches = $number % 12;
    $result['feet'] = $feet;
    $result['inches'] = $inches;
    return $result;
}

function birthday ($birthday) {
	if( $birthday == '0000-00-00' ) return '';
	list($year,$month,$day) = explode("-",$birthday);
	$year_diff  = date("Y") - $year;
	$month_diff = date("m") - $month;
	$day_diff   = date("d") - $day;
	if ($day_diff < 0 || $month_diff < 0)
		$year_diff--;
	return $year_diff;
}

function getTimeDropdownData( $step = 30, $format = '12', $title = null){
	$list = array();
	if( $title != null ){
		$list[''] = $title;
	}
	$jump = 60/$step;
	$postFix = '';
	for($h=0; $h<24; $h++){
		for($m=0; $m<$jump; $m++){
			$hour = $h;
			if( $format == 12 ){
				$hour =  ($h%12) + (($h%12) ? 0 : 12);
				$postFix = ' '.($h <= 11 ? 'A.M.' : 'P.M.');
			}
			$list[ sprintf("%02s",$h).':'.sprintf("%02s",$m*$step) ] = sprintf("%02s",$hour).':'.sprintf("%02s",$m*$step).$postFix;
		}
	}
	return $list;
}

function showTime($time,$format=12){
	if( empty($time)){
		return 'n/a';
	}
	list($h,$m) = explode(':',$time);
	$postFix = '';
	if( $format == 12 ){
		$h =  ($h%12) + (($h%12) ? 0 : 12);
		$postFix = ($h <= 11 ? 'AM' : 'PM');
		return "$h:$m $postFix";
	}
	return $time;
}

function ageToDate($age, $formate = 'Y-m-d'){
	$time = mktime (0,0,0,date("m")  ,date("d"),date("Y")- $age);
	return date($formate,$time);
}

function invoke_hook($hook_name,$data = array()){
	global $hooks;
	if( isset($hooks[$hook_name]) && count($hooks[$hook_name]) > 0 ){
		foreach($hooks[$hook_name] as $fnc){
			$fnc($data);
		}
	}
}


$hooks = array();
function register_hook($hook_name,$fnc){
	global $hooks;
	if( !isset($hooks[$hook_name]) ){
		$hooks[$hook_name] = array($fnc);
		return true;
	}

	if( !in_array($fnc,$hooks[$hook_name]) ){
		$hooks[$hook_name][] = $fnc;
		return true;
	}
	return false;
}

function test_hook1($data){
	echo 'fnc 1';
	debug($data);
}

function test_hook2($data){
	echo 'fnc 2';
	debug($data);
}
    

function getEncrypt($pure_string) {
    # --- ENCRYPTION ---

    # the key should be random binary, use scrypt, bcrypt or PBKDF2 to
    # convert a string into a key
    # key is specified using hexadecimal
    $key = pack('H*', "11b04b7e103a0cd8b54763051cef08bc55abe029fdebae5e1d417e2ffb2a0013");
    
    # show key size use either 16, 24 or 32 byte keys for AES-128, 192
    # and 256 respectively
    $key_size =  strlen($key);
    
    # create a random IV to use with CBC encoding
    $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
    
    $dirty = array("+", "/", "=");
    $clean = array("_PLUS_", "_SLASH_", "_EQUALS_");
    $iv_size = mcrypt_get_iv_size(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB);
    
    $_SESSION['iv'] = mcrypt_create_iv($iv_size, MCRYPT_RAND);
    $encrypted_string = mcrypt_encrypt(MCRYPT_BLOWFISH,$key, utf8_encode($pure_string), MCRYPT_MODE_ECB, $iv);
    $encrypted_string = base64_encode($encrypted_string);
    return str_replace($dirty, $clean, $encrypted_string);
}

function getDecrypt($encrypted_string) {
    
    # convert a string into a key
    # key is specified using hexadecimal
    $key = pack('H*', "11b04b7e103a0cd8b54763051cef08bc55abe029fdebae5e1d417e2ffb2a0013");
    
    # show key size use either 16, 24 or 32 byte keys for AES-128, 192
    # and 256 respectively
    $key_size =  strlen($key);
    
    # create a random IV to use with CBC encoding
    $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
    
    $dirty = array("+", "/", "=");
    $clean = array("_PLUS_", "_SLASH_", "_EQUALS_");

    $string = base64_decode(str_replace($clean, $dirty, $encrypted_string));

    $decrypted_string = mcrypt_decrypt(MCRYPT_BLOWFISH, $key ,$string, MCRYPT_MODE_ECB, $iv);
    return $decrypted_string;
}