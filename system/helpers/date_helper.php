<<<<<<< HEAD
<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package		CodeIgniter
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2008 - 2011, EllisLab, Inc.
 * @license		http://codeigniter.com/user_guide/license.html
=======
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.2.4 or newer
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the Open Software License version 3.0
 *
 * This source file is subject to the Open Software License (OSL 3.0) that is
 * bundled with this package in the files license.txt / license.rst.  It is
 * also available through the world wide web at this URL:
 * http://opensource.org/licenses/OSL-3.0
 * If you did not receive a copy of the license and are unable to obtain it
 * through the world wide web, please send an email to
 * licensing@ellislab.com so we can send you a copy immediately.
 *
 * @package		CodeIgniter
 * @author		EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2012, EllisLab, Inc. (http://ellislab.com/)
 * @license		http://opensource.org/licenses/OSL-3.0 Open Software License (OSL 3.0)
>>>>>>> codeigniter/develop
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */

<<<<<<< HEAD
// ------------------------------------------------------------------------

=======
>>>>>>> codeigniter/develop
/**
 * CodeIgniter Date Helpers
 *
 * @package		CodeIgniter
 * @subpackage	Helpers
 * @category	Helpers
<<<<<<< HEAD
 * @author		ExpressionEngine Dev Team
=======
 * @author		EllisLab Dev Team
>>>>>>> codeigniter/develop
 * @link		http://codeigniter.com/user_guide/helpers/date_helper.html
 */

// ------------------------------------------------------------------------

<<<<<<< HEAD
/**
 * Get "now" time
 *
 * Returns time() or its GMT equivalent based on the config file preference
 *
 * @access	public
 * @return	integer
 */
if ( ! function_exists('now'))
{
	function now()
	{
		$CI =& get_instance();

		if (strtolower($CI->config->item('time_reference')) == 'gmt')
		{
			$now = time();
			$system_time = mktime(gmdate("H", $now), gmdate("i", $now), gmdate("s", $now), gmdate("m", $now), gmdate("d", $now), gmdate("Y", $now));

			if (strlen($system_time) < 10)
			{
				$system_time = time();
				log_message('error', 'The Date class could not set a proper GMT timestamp so the local time() value was used.');
			}

			return $system_time;
		}
		else
		{
			return time();
		}
=======
if ( ! function_exists('now'))
{
	/**
	 * Get "now" time
	 *
	 * Returns time() based on the timezone parameter or on the
	 * "time_reference" setting
	 *
	 * @param	string
	 * @return	int
	 */
	function now($timezone = NULL)
	{
		if (empty($timezone))
		{
			$timezone = config_item('time_reference');
		}

		if ($timezone === 'local' OR $timezone === date_default_timezone_get())
		{
			return time();
		}

		$datetime = new DateTime('now', new DateTimeZone($timezone));
		sscanf($datetime->format('j-n-Y G:i:s'), '%d-%d-%d %d:%d:%d', $day, $month, $year, $hour, $minute, $second);

		return mktime($hour, $minute, $second, $month, $day, $year);
>>>>>>> codeigniter/develop
	}
}

// ------------------------------------------------------------------------

<<<<<<< HEAD
/**
 * Convert MySQL Style Datecodes
 *
 * This function is identical to PHPs date() function,
 * except that it allows date codes to be formatted using
 * the MySQL style, where each code letter is preceded
 * with a percent sign:  %Y %m %d etc...
 *
 * The benefit of doing dates this way is that you don't
 * have to worry about escaping your text letters that
 * match the date codes.
 *
 * @access	public
 * @param	string
 * @param	integer
 * @return	integer
 */
if ( ! function_exists('mdate'))
{
	function mdate($datestr = '', $time = '')
	{
		if ($datestr == '')
			return '';

		if ($time == '')
			$time = now();

		$datestr = str_replace('%\\', '', preg_replace("/([a-z]+?){1}/i", "\\\\\\1", $datestr));
=======
if ( ! function_exists('mdate'))
{
	/**
	 * Convert MySQL Style Datecodes
	 *
	 * This function is identical to PHPs date() function,
	 * except that it allows date codes to be formatted using
	 * the MySQL style, where each code letter is preceded
	 * with a percent sign:  %Y %m %d etc...
	 *
	 * The benefit of doing dates this way is that you don't
	 * have to worry about escaping your text letters that
	 * match the date codes.
	 *
	 * @param	string
	 * @param	int
	 * @return	int
	 */
	function mdate($datestr = '', $time = '')
	{
		if ($datestr === '')
		{
			return '';
		}
		elseif (empty($time))
		{
			$time = now();
		}

		$datestr = str_replace(
			'%\\',
			'',
			preg_replace('/([a-z]+?){1}/i', '\\\\\\1', $datestr)
		);

>>>>>>> codeigniter/develop
		return date($datestr, $time);
	}
}

// ------------------------------------------------------------------------

<<<<<<< HEAD
/**
 * Standard Date
 *
 * Returns a date formatted according to the submitted standard.
 *
 * @access	public
 * @param	string	the chosen format
 * @param	integer	Unix timestamp
 * @return	string
 */
if ( ! function_exists('standard_date'))
{
	function standard_date($fmt = 'DATE_RFC822', $time = '')
	{
		$formats = array(
						'DATE_ATOM'		=>	'%Y-%m-%dT%H:%i:%s%Q',
						'DATE_COOKIE'	=>	'%l, %d-%M-%y %H:%i:%s UTC',
						'DATE_ISO8601'	=>	'%Y-%m-%dT%H:%i:%s%Q',
						'DATE_RFC822'	=>	'%D, %d %M %y %H:%i:%s %O',
						'DATE_RFC850'	=>	'%l, %d-%M-%y %H:%i:%s UTC',
						'DATE_RFC1036'	=>	'%D, %d %M %y %H:%i:%s %O',
						'DATE_RFC1123'	=>	'%D, %d %M %Y %H:%i:%s %O',
						'DATE_RSS'		=>	'%D, %d %M %Y %H:%i:%s %O',
						'DATE_W3C'		=>	'%Y-%m-%dT%H:%i:%s%Q'
						);

		if ( ! isset($formats[$fmt]))
=======
if ( ! function_exists('standard_date'))
{
	/**
	 * Standard Date
	 *
	 * Returns a date formatted according to the submitted standard.
	 *
	 * As of PHP 5.2, the DateTime extension provides constants that
	 * serve for the exact same purpose and are used with date().
	 * Due to that, this function is DEPRECATED and should be removed
	 * in CodeIgniter 3.1+.
	 *
	 * Here are two examples of how you should replace it:
	 *
	 *	date(DATE_RFC822, now()); // default
	 *	date(DATE_W3C, $time); // a different format and time
	 *
	 * Reference: http://www.php.net/manual/en/class.datetime.php#datetime.constants.types
	 *
	 * @deprecated
	 * @param	string	the chosen format
	 * @param	int	Unix timestamp
	 * @return	string
	 */
	function standard_date($fmt = 'DATE_RFC822', $time = NULL)
	{
		if (empty($time))
		{
			$time = now();
		}

		// Procedural style pre-defined constants from the DateTime extension
		if (strpos($fmt, 'DATE_') !== 0 OR defined($fmt) === FALSE)
>>>>>>> codeigniter/develop
		{
			return FALSE;
		}

<<<<<<< HEAD
		return mdate($formats[$fmt], $time);
=======
		return date(constant($fmt), $time);
>>>>>>> codeigniter/develop
	}
}

// ------------------------------------------------------------------------

<<<<<<< HEAD
/**
 * Timespan
 *
 * Returns a span of seconds in this format:
 *	10 days 14 hours 36 minutes 47 seconds
 *
 * @access	public
 * @param	integer	a number of seconds
 * @param	integer	Unix timestamp
 * @return	integer
 */
if ( ! function_exists('timespan'))
{
	function timespan($seconds = 1, $time = '')
=======
if ( ! function_exists('timespan'))
{
	/**
	 * Timespan
	 *
	 * Returns a span of seconds in this format:
	 *	10 days 14 hours 36 minutes 47 seconds
	 *
	 * @param	int	a number of seconds
	 * @param	int	Unix timestamp
	 * @param	int	a number of display units
	 * @return	string
	 */
	function timespan($seconds = 1, $time = '', $units = 7)
>>>>>>> codeigniter/develop
	{
		$CI =& get_instance();
		$CI->lang->load('date');

<<<<<<< HEAD
		if ( ! is_numeric($seconds))
		{
			$seconds = 1;
		}

		if ( ! is_numeric($time))
		{
			$time = time();
		}

		if ($time <= $seconds)
		{
			$seconds = 1;
		}
		else
		{
			$seconds = $time - $seconds;
		}

		$str = '';
		$years = floor($seconds / 31536000);

		if ($years > 0)
		{
			$str .= $years.' '.$CI->lang->line((($years	> 1) ? 'date_years' : 'date_year')).', ';
		}

		$seconds -= $years * 31536000;
		$months = floor($seconds / 2628000);

		if ($years > 0 OR $months > 0)
		{
			if ($months > 0)
			{
				$str .= $months.' '.$CI->lang->line((($months	> 1) ? 'date_months' : 'date_month')).', ';
			}

			$seconds -= $months * 2628000;
=======
		is_numeric($seconds) OR $seconds = 1;
		is_numeric($time) OR $time = time();
		is_numeric($units) OR $units = 7;

		$seconds = ($time <= $seconds) ? 1 : $time - $seconds;

		$str = array();
		$years = floor($seconds / 31557600);

		if ($years > 0)
		{
			$str[] = $years.' '.$CI->lang->line($years > 1 ? 'date_years' : 'date_year');
		}

		$seconds -= $years * 31557600;
		$months = floor($seconds / 2629743);

		if (count($str) < $units && ($years > 0 OR $months > 0))
		{
			if ($months > 0)
			{
				$str[] = $months.' '.$CI->lang->line($months > 1 ? 'date_months' : 'date_month');
			}

			$seconds -= $months * 2629743;
>>>>>>> codeigniter/develop
		}

		$weeks = floor($seconds / 604800);

<<<<<<< HEAD
		if ($years > 0 OR $months > 0 OR $weeks > 0)
		{
			if ($weeks > 0)
			{
				$str .= $weeks.' '.$CI->lang->line((($weeks	> 1) ? 'date_weeks' : 'date_week')).', ';
=======
		if (count($str) < $units && ($years > 0 OR $months > 0 OR $weeks > 0))
		{
			if ($weeks > 0)
			{
				$str[] = $weeks.' '.$CI->lang->line($weeks > 1 ? 'date_weeks' : 'date_week');
>>>>>>> codeigniter/develop
			}

			$seconds -= $weeks * 604800;
		}

		$days = floor($seconds / 86400);

<<<<<<< HEAD
		if ($months > 0 OR $weeks > 0 OR $days > 0)
		{
			if ($days > 0)
			{
				$str .= $days.' '.$CI->lang->line((($days	> 1) ? 'date_days' : 'date_day')).', ';
=======
		if (count($str) < $units && ($months > 0 OR $weeks > 0 OR $days > 0))
		{
			if ($days > 0)
			{
				$str[] = $days.' '.$CI->lang->line($days > 1 ? 'date_days' : 'date_day');
>>>>>>> codeigniter/develop
			}

			$seconds -= $days * 86400;
		}

		$hours = floor($seconds / 3600);

<<<<<<< HEAD
		if ($days > 0 OR $hours > 0)
		{
			if ($hours > 0)
			{
				$str .= $hours.' '.$CI->lang->line((($hours	> 1) ? 'date_hours' : 'date_hour')).', ';
=======
		if (count($str) < $units && ($days > 0 OR $hours > 0))
		{
			if ($hours > 0)
			{
				$str[] = $hours.' '.$CI->lang->line($hours > 1 ? 'date_hours' : 'date_hour');
>>>>>>> codeigniter/develop
			}

			$seconds -= $hours * 3600;
		}

		$minutes = floor($seconds / 60);

<<<<<<< HEAD
		if ($days > 0 OR $hours > 0 OR $minutes > 0)
		{
			if ($minutes > 0)
			{
				$str .= $minutes.' '.$CI->lang->line((($minutes	> 1) ? 'date_minutes' : 'date_minute')).', ';
=======
		if (count($str) < $units && ($days > 0 OR $hours > 0 OR $minutes > 0))
		{
			if ($minutes > 0)
			{
				$str[] = $minutes.' '.$CI->lang->line($minutes > 1 ? 'date_minutes' : 'date_minute');
>>>>>>> codeigniter/develop
			}

			$seconds -= $minutes * 60;
		}

<<<<<<< HEAD
		if ($str == '')
		{
			$str .= $seconds.' '.$CI->lang->line((($seconds	> 1) ? 'date_seconds' : 'date_second')).', ';
		}

		return substr(trim($str), 0, -1);
=======
		if (count($str) === 0)
		{
			$str[] = $seconds.' '.$CI->lang->line($seconds > 1 ? 'date_seconds' : 'date_second');
		}

		return implode(', ', $str);
>>>>>>> codeigniter/develop
	}
}

// ------------------------------------------------------------------------

<<<<<<< HEAD
/**
 * Number of days in a month
 *
 * Takes a month/year as input and returns the number of days
 * for the given month/year. Takes leap years into consideration.
 *
 * @access	public
 * @param	integer a numeric month
 * @param	integer	a numeric year
 * @return	integer
 */
if ( ! function_exists('days_in_month'))
{
=======
if ( ! function_exists('days_in_month'))
{
	/**
	 * Number of days in a month
	 *
	 * Takes a month/year as input and returns the number of days
	 * for the given month/year. Takes leap years into consideration.
	 *
	 * @param	int	a numeric month
	 * @param	int	a numeric year
	 * @return	int
	 */
>>>>>>> codeigniter/develop
	function days_in_month($month = 0, $year = '')
	{
		if ($month < 1 OR $month > 12)
		{
			return 0;
		}
<<<<<<< HEAD

		if ( ! is_numeric($year) OR strlen($year) != 4)
=======
		elseif ( ! is_numeric($year) OR strlen($year) !== 4)
>>>>>>> codeigniter/develop
		{
			$year = date('Y');
		}

<<<<<<< HEAD
		if ($month == 2)
		{
			if ($year % 400 == 0 OR ($year % 4 == 0 AND $year % 100 != 0))
=======
		if ($year >= 1970)
		{
			return (int) date('t', mktime(12, 0, 0, $month, 1, $year));
		}

		if ($month == 2)
		{
			if ($year % 400 === 0 OR ($year % 4 === 0 && $year % 100 !== 0))
>>>>>>> codeigniter/develop
			{
				return 29;
			}
		}

		$days_in_month	= array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
		return $days_in_month[$month - 1];
	}
}

// ------------------------------------------------------------------------

<<<<<<< HEAD
/**
 * Converts a local Unix timestamp to GMT
 *
 * @access	public
 * @param	integer Unix timestamp
 * @return	integer
 */
if ( ! function_exists('local_to_gmt'))
{
	function local_to_gmt($time = '')
	{
		if ($time == '')
			$time = time();

		return mktime( gmdate("H", $time), gmdate("i", $time), gmdate("s", $time), gmdate("m", $time), gmdate("d", $time), gmdate("Y", $time));
=======
if ( ! function_exists('local_to_gmt'))
{
	/**
	 * Converts a local Unix timestamp to GMT
	 *
	 * @param	int	Unix timestamp
	 * @return	int
	 */
	function local_to_gmt($time = '')
	{
		if ($time === '')
		{
			$time = time();
		}

		return mktime(
			gmdate('G', $time),
			gmdate('i', $time),
			gmdate('s', $time),
			gmdate('n', $time),
			gmdate('j', $time),
			gmdate('Y', $time)
		);
>>>>>>> codeigniter/develop
	}
}

// ------------------------------------------------------------------------

<<<<<<< HEAD
/**
 * Converts GMT time to a localized value
 *
 * Takes a Unix timestamp (in GMT) as input, and returns
 * at the local value based on the timezone and DST setting
 * submitted
 *
 * @access	public
 * @param	integer Unix timestamp
 * @param	string	timezone
 * @param	bool	whether DST is active
 * @return	integer
 */
if ( ! function_exists('gmt_to_local'))
{
	function gmt_to_local($time = '', $timezone = 'UTC', $dst = FALSE)
	{
		if ($time == '')
=======
if ( ! function_exists('gmt_to_local'))
{
	/**
	 * Converts GMT time to a localized value
	 *
	 * Takes a Unix timestamp (in GMT) as input, and returns
	 * at the local value based on the timezone and DST setting
	 * submitted
	 *
	 * @param	int	Unix timestamp
	 * @param	string	timezone
	 * @param	bool	whether DST is active
	 * @return	int
	 */
	function gmt_to_local($time = '', $timezone = 'UTC', $dst = FALSE)
	{
		if ($time === '')
>>>>>>> codeigniter/develop
		{
			return now();
		}

		$time += timezones($timezone) * 3600;

<<<<<<< HEAD
		if ($dst == TRUE)
		{
			$time += 3600;
		}

		return $time;
=======
		return ($dst === TRUE) ? $time + 3600 : $time;
>>>>>>> codeigniter/develop
	}
}

// ------------------------------------------------------------------------

<<<<<<< HEAD
/**
 * Converts a MySQL Timestamp to Unix
 *
 * @access	public
 * @param	integer Unix timestamp
 * @return	integer
 */
if ( ! function_exists('mysql_to_unix'))
{
=======
if ( ! function_exists('mysql_to_unix'))
{
	/**
	 * Converts a MySQL Timestamp to Unix
	 *
	 * @param	int	Unix timestamp
	 * @return	int
	 */
>>>>>>> codeigniter/develop
	function mysql_to_unix($time = '')
	{
		// We'll remove certain characters for backward compatibility
		// since the formatting changed with MySQL 4.1
		// YYYY-MM-DD HH:MM:SS

<<<<<<< HEAD
		$time = str_replace('-', '', $time);
		$time = str_replace(':', '', $time);
		$time = str_replace(' ', '', $time);

		// YYYYMMDDHHMMSS
		return  mktime(
						substr($time, 8, 2),
						substr($time, 10, 2),
						substr($time, 12, 2),
						substr($time, 4, 2),
						substr($time, 6, 2),
						substr($time, 0, 4)
						);
=======
		$time = str_replace(array('-', ':', ' '), '', $time);

		// YYYYMMDDHHMMSS
		return mktime(
			substr($time, 8, 2),
			substr($time, 10, 2),
			substr($time, 12, 2),
			substr($time, 4, 2),
			substr($time, 6, 2),
			substr($time, 0, 4)
		);
>>>>>>> codeigniter/develop
	}
}

// ------------------------------------------------------------------------

<<<<<<< HEAD
/**
 * Unix to "Human"
 *
 * Formats Unix timestamp to the following prototype: 2006-08-21 11:35 PM
 *
 * @access	public
 * @param	integer Unix timestamp
 * @param	bool	whether to show seconds
 * @param	string	format: us or euro
 * @return	string
 */
if ( ! function_exists('unix_to_human'))
{
	function unix_to_human($time = '', $seconds = FALSE, $fmt = 'us')
	{
		$r  = date('Y', $time).'-'.date('m', $time).'-'.date('d', $time).' ';

		if ($fmt == 'us')
=======
if ( ! function_exists('unix_to_human'))
{
	/**
	 * Unix to "Human"
	 *
	 * Formats Unix timestamp to the following prototype: 2006-08-21 11:35 PM
	 *
	 * @param	int	Unix timestamp
	 * @param	bool	whether to show seconds
	 * @param	string	format: us or euro
	 * @return	string
	 */
	function unix_to_human($time = '', $seconds = FALSE, $fmt = 'us')
	{
		$r = date('Y', $time).'-'.date('m', $time).'-'.date('d', $time).' ';

		if ($fmt === 'us')
>>>>>>> codeigniter/develop
		{
			$r .= date('h', $time).':'.date('i', $time);
		}
		else
		{
			$r .= date('H', $time).':'.date('i', $time);
		}

		if ($seconds)
		{
			$r .= ':'.date('s', $time);
		}

<<<<<<< HEAD
		if ($fmt == 'us')
		{
			$r .= ' '.date('A', $time);
=======
		if ($fmt === 'us')
		{
			return $r.' '.date('A', $time);
>>>>>>> codeigniter/develop
		}

		return $r;
	}
}

// ------------------------------------------------------------------------

<<<<<<< HEAD
/**
 * Convert "human" date to GMT
 *
 * Reverses the above process
 *
 * @access	public
 * @param	string	format: us or euro
 * @return	integer
 */
if ( ! function_exists('human_to_unix'))
{
	function human_to_unix($datestr = '')
	{
		if ($datestr == '')
=======
if ( ! function_exists('human_to_unix'))
{
	/**
	 * Convert "human" date to GMT
	 *
	 * Reverses the above process
	 *
	 * @param	string	format: us or euro
	 * @return	int
	 */
	function human_to_unix($datestr = '')
	{
		if ($datestr === '')
>>>>>>> codeigniter/develop
		{
			return FALSE;
		}

<<<<<<< HEAD
		$datestr = trim($datestr);
		$datestr = preg_replace("/\040+/", ' ', $datestr);

		if ( ! preg_match('/^[0-9]{2,4}\-[0-9]{1,2}\-[0-9]{1,2}\s[0-9]{1,2}:[0-9]{1,2}(?::[0-9]{1,2})?(?:\s[AP]M)?$/i', $datestr))
=======
		$datestr = preg_replace('/\040+/', ' ', trim($datestr));

		if ( ! preg_match('/^(\d{2}|\d{4})\-[0-9]{1,2}\-[0-9]{1,2}\s[0-9]{1,2}:[0-9]{1,2}(?::[0-9]{1,2})?(?:\s[AP]M)?$/i', $datestr))
>>>>>>> codeigniter/develop
		{
			return FALSE;
		}

		$split = explode(' ', $datestr);

<<<<<<< HEAD
		$ex = explode("-", $split['0']);

		$year  = (strlen($ex['0']) == 2) ? '20'.$ex['0'] : $ex['0'];
		$month = (strlen($ex['1']) == 1) ? '0'.$ex['1']  : $ex['1'];
		$day   = (strlen($ex['2']) == 1) ? '0'.$ex['2']  : $ex['2'];

		$ex = explode(":", $split['1']);

		$hour = (strlen($ex['0']) == 1) ? '0'.$ex['0'] : $ex['0'];
		$min  = (strlen($ex['1']) == 1) ? '0'.$ex['1'] : $ex['1'];

		if (isset($ex['2']) && preg_match('/[0-9]{1,2}/', $ex['2']))
		{
			$sec  = (strlen($ex['2']) == 1) ? '0'.$ex['2'] : $ex['2'];
		}
		else
		{
			// Unless specified, seconds get set to zero.
			$sec = '00';
		}

		if (isset($split['2']))
		{
			$ampm = strtolower($split['2']);

			if (substr($ampm, 0, 1) == 'p' AND $hour < 12)
				$hour = $hour + 12;

			if (substr($ampm, 0, 1) == 'a' AND $hour == 12)
				$hour =  '00';

			if (strlen($hour) == 1)
				$hour = '0'.$hour;
		}

		return mktime($hour, $min, $sec, $month, $day, $year);
=======
		list($year, $month, $day) = explode('-', $split[0]);

		$ex = explode(':', $split['1']);

		$hour	= (int) $ex[0];
		$min	= (int) $ex[1];
		$sec	= ( ! empty($ex[2]) && preg_match('/[0-9]{1,2}/', $ex[2]))
				? (int) $ex[2] : 0;

		if (isset($split[2]))
		{
			$ampm = strtolower($split[2]);

			if ($ampm[0] === 'p' && $hour < 12)
			{
				$hour += 12;
			}
			elseif ($ampm[0] === 'a' && $hour === 12)
			{
				$hour = 0;
			}
		}

		return mktime($hour, $min, $sec, $month, $day, $year);
	}
}

// ------------------------------------------------------------------------

if ( ! function_exists('nice_date'))
{
	/**
	 * Turns many "reasonably-date-like" strings into something
	 * that is actually useful. This only works for dates after unix epoch.
	 *
	 * @param	string	The terribly formatted date-like string
	 * @param	string	Date format to return (same as php date function)
	 * @return	string
	 */
	function nice_date($bad_date = '', $format = FALSE)
	{
		if (empty($bad_date))
		{
			return 'Unknown';
		}
		elseif (empty($format))
		{
			$format = 'U';
		}

		// Date like: YYYYMM
		if (preg_match('/^\d{6}$/i', $bad_date))
		{
			if (in_array(substr($bad_date, 0, 2), array('19', '20')))
			{
				$year  = substr($bad_date, 0, 4);
				$month = substr($bad_date, 4, 2);
			}
			else
			{
				$month  = substr($bad_date, 0, 2);
				$year   = substr($bad_date, 2, 4);
			}

			return date($format, strtotime($year.'-'.$month.'-01'));
		}

		// Date Like: YYYYMMDD
		if (preg_match('/^(\d{2})\d{2}(\d{4})$/i', $bad_date, $matches))
		{
			return date($format, strtotime($matches[1].'/01/'.$matches[2]));
		}

		// Date Like: MM-DD-YYYY __or__ M-D-YYYY (or anything in between)
		if (preg_match('/^(\d{1,2})-(\d{1,2})-(\d{4})$/i', $bad_date, $matches))
		{
			return date($format, strtotime($matches[3].'-'.$matches[1].'-'.$matches[2]));
		}

		// Any other kind of string, when converted into UNIX time,
		// produces "0 seconds after epoc..." is probably bad...
		// return "Invalid Date".
		if (date('U', strtotime($bad_date)) === '0')
		{
			return 'Invalid Date';
		}

		// It's probably a valid-ish date format already
		return date($format, strtotime($bad_date));
>>>>>>> codeigniter/develop
	}
}

// ------------------------------------------------------------------------

<<<<<<< HEAD
/**
 * Timezone Menu
 *
 * Generates a drop-down menu of timezones.
 *
 * @access	public
 * @param	string	timezone
 * @param	string	classname
 * @param	string	menu name
 * @return	string
 */
if ( ! function_exists('timezone_menu'))
{
	function timezone_menu($default = 'UTC', $class = "", $name = 'timezones')
=======
if ( ! function_exists('timezone_menu'))
{
	/**
	 * Timezone Menu
	 *
	 * Generates a drop-down menu of timezones.
	 *
	 * @param	string	timezone
	 * @param	string	classname
	 * @param	string	menu name
	 * @param	mixed	attributes
	 * @return	string
	 */
	function timezone_menu($default = 'UTC', $class = '', $name = 'timezones', $attributes = '')
>>>>>>> codeigniter/develop
	{
		$CI =& get_instance();
		$CI->lang->load('date');

<<<<<<< HEAD
		if ($default == 'GMT')
			$default = 'UTC';

		$menu = '<select name="'.$name.'"';

		if ($class != '')
=======
		$default = ($default === 'GMT') ? 'UTC' : $default;

		$menu = '<select name="'.$name.'"';

		if ($class !== '')
>>>>>>> codeigniter/develop
		{
			$menu .= ' class="'.$class.'"';
		}

<<<<<<< HEAD
		$menu .= ">\n";

		foreach (timezones() as $key => $val)
		{
			$selected = ($default == $key) ? " selected='selected'" : '';
			$menu .= "<option value='{$key}'{$selected}>".$CI->lang->line($key)."</option>\n";
		}

		$menu .= "</select>";

		return $menu;
=======
		$menu .= _stringify_attributes($attributes).">\n";

		foreach (timezones() as $key => $val)
		{
			$selected = ($default === $key) ? ' selected="selected"' : '';
			$menu .= '<option value="'.$key.'"'.$selected.'>'.$CI->lang->line($key)."</option>\n";
		}

		return $menu.'</select>';
>>>>>>> codeigniter/develop
	}
}

// ------------------------------------------------------------------------

<<<<<<< HEAD
/**
 * Timezones
 *
 * Returns an array of timezones.  This is a helper function
 * for various other ones in this library
 *
 * @access	public
 * @param	string	timezone
 * @return	string
 */
if ( ! function_exists('timezones'))
{
=======
if ( ! function_exists('timezones'))
{
	/**
	 * Timezones
	 *
	 * Returns an array of timezones. This is a helper function
	 * for various other ones in this library
	 *
	 * @param	string	timezone
	 * @return	string
	 */
>>>>>>> codeigniter/develop
	function timezones($tz = '')
	{
		// Note: Don't change the order of these even though
		// some items appear to be in the wrong order

		$zones = array(
<<<<<<< HEAD
						'UM12'		=> -12,
						'UM11'		=> -11,
						'UM10'		=> -10,
						'UM95'		=> -9.5,
						'UM9'		=> -9,
						'UM8'		=> -8,
						'UM7'		=> -7,
						'UM6'		=> -6,
						'UM5'		=> -5,
						'UM45'		=> -4.5,
						'UM4'		=> -4,
						'UM35'		=> -3.5,
						'UM3'		=> -3,
						'UM2'		=> -2,
						'UM1'		=> -1,
						'UTC'		=> 0,
						'UP1'		=> +1,
						'UP2'		=> +2,
						'UP3'		=> +3,
						'UP35'		=> +3.5,
						'UP4'		=> +4,
						'UP45'		=> +4.5,
						'UP5'		=> +5,
						'UP55'		=> +5.5,
						'UP575'		=> +5.75,
						'UP6'		=> +6,
						'UP65'		=> +6.5,
						'UP7'		=> +7,
						'UP8'		=> +8,
						'UP875'		=> +8.75,
						'UP9'		=> +9,
						'UP95'		=> +9.5,
						'UP10'		=> +10,
						'UP105'		=> +10.5,
						'UP11'		=> +11,
						'UP115'		=> +11.5,
						'UP12'		=> +12,
						'UP1275'	=> +12.75,
						'UP13'		=> +13,
						'UP14'		=> +14
					);

		if ($tz == '')
=======
			'UM12'		=> -12,
			'UM11'		=> -11,
			'UM10'		=> -10,
			'UM95'		=> -9.5,
			'UM9'		=> -9,
			'UM8'		=> -8,
			'UM7'		=> -7,
			'UM6'		=> -6,
			'UM5'		=> -5,
			'UM45'		=> -4.5,
			'UM4'		=> -4,
			'UM35'		=> -3.5,
			'UM3'		=> -3,
			'UM2'		=> -2,
			'UM1'		=> -1,
			'UTC'		=> 0,
			'UP1'		=> +1,
			'UP2'		=> +2,
			'UP3'		=> +3,
			'UP35'		=> +3.5,
			'UP4'		=> +4,
			'UP45'		=> +4.5,
			'UP5'		=> +5,
			'UP55'		=> +5.5,
			'UP575'		=> +5.75,
			'UP6'		=> +6,
			'UP65'		=> +6.5,
			'UP7'		=> +7,
			'UP8'		=> +8,
			'UP875'		=> +8.75,
			'UP9'		=> +9,
			'UP95'		=> +9.5,
			'UP10'		=> +10,
			'UP105'		=> +10.5,
			'UP11'		=> +11,
			'UP115'		=> +11.5,
			'UP12'		=> +12,
			'UP1275'	=> +12.75,
			'UP13'		=> +13,
			'UP14'		=> +14
		);

		if ($tz === '')
>>>>>>> codeigniter/develop
		{
			return $zones;
		}

<<<<<<< HEAD
		if ($tz == 'GMT')
			$tz = 'UTC';

		return ( ! isset($zones[$tz])) ? 0 : $zones[$tz];
	}
}

=======
		return isset($zones[$tz]) ? $zones[$tz] : 0;
	}
}

// ------------------------------------------------------------------------

if ( ! function_exists('date_range'))
{
	/**
	 * Date range
	 *
	 * Returns a list of dates within a specified period.
	 *
	 * @param	int	unix_start	UNIX timestamp of period start date
	 * @param	int	unix_end|days	UNIX timestamp of period end date
	 *					or interval in days.
	 * @param	mixed	is_unix		Specifies whether the second parameter
	 *					is a UNIX timestamp or a day interval
	 *					 - TRUE or 'unix' for a timestamp
	 *					 - FALSE or 'days' for an interval
	 * @param	string  date_format	Output date format, same as in date()
	 * @return	array
	 */
	function date_range($unix_start = '', $mixed = '', $is_unix = TRUE, $format = 'Y-m-d')
	{
		if ($unix_start == '' OR $mixed == '' OR $format == '')
		{
			return FALSE;
		}

		$is_unix = ! ( ! $is_unix OR $is_unix === 'days');

		// Validate input and try strtotime() on invalid timestamps/intervals, just in case
		if ( ( ! preg_match('/^[0-9]+$/', $unix_start) && ($unix_start = @strtotime($unix_time)) === FALSE)
			OR ( ! preg_match('/^[0-9]+$/', $mixed) && ($is_unix === FALSE OR ($mixed = @strtotime($mixed)) === FALSE))
			OR ($is_unix === TRUE && $mixed < $unix_start))
		{
			return FALSE;
		}

		if ($is_unix && ($unix_start == $mixed OR date($format, $unix_start) === date($format, $mixed)))
		{
			return array($start_date);
		}

		$range = array();

		/* NOTE: Even though the DateTime object has many useful features, it appears that
		 *	 it doesn't always handle properly timezones, when timestamps are passed
		 *	 directly to its constructor. Neither of the following gave proper results:
		 *
		 *		new DateTime('<timestamp>')
		 *		new DateTime('<timestamp>', '<timezone>')
		 *
		 *	 --- available in PHP 5.3:
		 *
		 *		DateTime::createFromFormat('<format>', '<timestamp>')
		 *		DateTime::createFromFormat('<format>', '<timestamp>', '<timezone')
		 *
		 *	 ... so we'll have to set the timestamp after the object is instantiated.
		 *	 Furthermore, in PHP 5.3 we can use DateTime::setTimestamp() to do that and
		 *	 given that we have UNIX timestamps - we should use it.
		*/
		$from = new DateTime();

		if (is_php('5.3'))
		{
			$from->setTimestamp($unix_start);
			if ($is_unix)
			{
				$arg = new DateTime();
				$arg->setTimestamp($mixed);
			}
			else
			{
				$arg = (int) $mixed;
			}

			$period = new DatePeriod($from, new DateInterval('P1D'), $arg);
			foreach ($period as $date)
			{
				$range[] = $date->format($format);
			}

			/* If a period end date was passed to the DatePeriod constructor, it might not
			 * be in our results. Not sure if this is a bug or it's just possible because
			 * the end date might actually be less than 24 hours away from the previously
			 * generated DateTime object, but either way - we have to append it manually.
			 */
			if ( ! is_int($arg) && $range[count($range) - 1] !== $arg->format($format))
			{
				$range[] = $arg->format($format);
			}

			return $range;
		}

		$from->setDate(date('Y', $unix_start), date('n', $unix_start), date('j', $unix_start));
		$from->setTime(date('G', $unix_start), date('i', $unix_start), date('s', $unix_start));
		if ($is_unix)
		{
			$arg = new DateTime();
			$arg->setDate(date('Y', $mixed), date('n', $mixed), date('j', $mixed));
			$arg->setTime(date('G', $mixed), date('i', $mixed), date('s', $mixed));
		}
		else
		{
			$arg = (int) $mixed;
		}
		$range[] = $from->format($format);

		if (is_int($arg)) // Day intervals
		{
			do
			{
				$from->modify('+1 day');
				$range[] = $from->format($format);
			}
			while (--$arg > 0);
		}
		else // end date UNIX timestamp
		{
			for ($from->modify('+1 day'), $end_check = $arg->format('Ymd'); $from->format('Ymd') < $end_check; $from->modify('+1 day'))
			{
				$range[] = $from->format($format);
			}

			// Our loop only appended dates prior to our end date
			$range[] = $arg->format($format);
		}

		return $range;
	}
}
>>>>>>> codeigniter/develop

/* End of file date_helper.php */
/* Location: ./system/helpers/date_helper.php */