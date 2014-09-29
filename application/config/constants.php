<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');


/*
 * Define User Type Constants
 */

define('USER_ADMIN',1);
define('USER_NORMAL',2);
define("USER_LIMITED",3);

/*
 * Define User Status
 */

define('USER_BLOCKED',0); //0 is stored in DB if user is blocked
define('USER_VALID',1); //1 is stored in DB if user is valid
define('USER_INVALID',2); //2 is flag for invalid credentials
define('USER_NA',3); //3 is flag for not exsisting user

/*
 * Define Return status
 */

define('RETURN_FAILURE',0);
define('RETURN_SUCCESS',1);
define('RETURN_DUPLICATE',2);
define('RETURN_NO_RESULT',3);

/*
 * Define Player Types
 */

define('BATSMAN',1);
define('BOWLER',2);
define('WICKET_KEEPER',3);
define('ALL_ROUNDER',4);

/*
 * Define Email
 */

define('FROM_EMAIL','emmad.ahmad@gmail.com');
define('FROM_EMAIL_TITLE','Fantasy App');
define('ACCOUNT_TITLE','My Account');

/*
 * Define Date Formats
 */

define('DB_FULL_DATE','Y-m-d H:i:s');
define('DB_DATE','Y-m-d');
define('DATE_PLUGIN','m/d/Y');
define('DB_TIME','H:i:s');
define('TIME_PLUGIN','h:i A');
define('DEFAULT_DATE','d M Y');
define('SHORT_DATE','');
define('LONG_DATE','');
define('TIME','h:i a');

