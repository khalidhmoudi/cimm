<<<<<<< HEAD
<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Code Igniter
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
 * Database Utility Class
 *
 * @category	Database
<<<<<<< HEAD
 * @author		ExpressionEngine Dev Team
 * @link		http://codeigniter.com/user_guide/database/
 */
class CI_DB_utility extends CI_DB_forge {

	var $db;
	var $data_cache		= array();

	/**
	 * Constructor
	 *
	 * Grabs the CI super object instance so we can access it.
	 *
	 */
	function __construct()
=======
 * @author		EllisLab Dev Team
 * @link		http://codeigniter.com/user_guide/database/
 */
abstract class CI_DB_utility extends CI_DB_forge {

	public $db;

	// Platform specific SQL strings
	// Just setting those defaults to FALSE as they are mostly MySQL-specific
	protected $_optimize_table	= FALSE;
	protected $_repair_table	= FALSE;

	public function __construct()
>>>>>>> codeigniter/develop
	{
		// Assign the main database object to $this->db
		$CI =& get_instance();
		$this->db =& $CI->db;
<<<<<<< HEAD

		log_message('debug', "Database Utility Class Initialized");
=======
		log_message('debug', 'Database Utility Class Initialized');
>>>>>>> codeigniter/develop
	}

	// --------------------------------------------------------------------

	/**
	 * List databases
	 *
<<<<<<< HEAD
	 * @access	public
	 * @return	bool
	 */
	function list_databases()
	{
		// Is there a cached result?
		if (isset($this->data_cache['db_names']))
		{
			return $this->data_cache['db_names'];
		}

		$query = $this->db->query($this->_list_databases());
		$dbs = array();
		if ($query->num_rows() > 0)
		{
			foreach ($query->result_array() as $row)
			{
				$dbs[] = current($row);
			}
		}

		$this->data_cache['db_names'] = $dbs;
		return $this->data_cache['db_names'];
=======
	 * @return	array
	 */
	public function list_databases()
	{
		// Is there a cached result?
		if (isset($this->db->data_cache['db_names']))
		{
			return $this->db->data_cache['db_names'];
		}
		elseif ($this->_list_databases === FALSE)
		{
			return ($this->db->db_debug) ? $this->db->display_error('db_unsuported_feature') : FALSE;
		}

		$this->db->data_cache['db_names'] = array();

		$query = $this->db->query($this->_list_databases);
		if ($query === FALSE)
		{
			return $this->db->data_cache['db_names'];
		}

		for ($i = 0, $c = count($query); $i < $c; $i++)
		{
			$this->db->data_cache['db_names'] = current($query[$i]);
		}

		return $this->db->data_cache['db_names'];
>>>>>>> codeigniter/develop
	}

	// --------------------------------------------------------------------

	/**
	 * Determine if a particular database exists
	 *
<<<<<<< HEAD
	 * @access	public
	 * @param	string
	 * @return	boolean
	 */
	function database_exists($database_name)
	{
		// Some databases won't have access to the list_databases() function, so
		// this is intended to allow them to override with their own functions as
		// defined in $driver_utility.php
		if (method_exists($this, '_database_exists'))
		{
			return $this->_database_exists($database_name);
		}
		else
		{
			return ( ! in_array($database_name, $this->list_databases())) ? FALSE : TRUE;
		}
	}


=======
	 * @param	string
	 * @return	bool
	 */
	public function database_exists($database_name)
	{
		return in_array($database_name, $this->list_databases());
	}

>>>>>>> codeigniter/develop
	// --------------------------------------------------------------------

	/**
	 * Optimize Table
	 *
<<<<<<< HEAD
	 * @access	public
	 * @param	string	the table name
	 * @return	bool
	 */
	function optimize_table($table_name)
	{
		$sql = $this->_optimize_table($table_name);

		if (is_bool($sql))
		{
				show_error('db_must_use_set');
		}

		$query = $this->db->query($sql);
		$res = $query->result_array();

		// Note: Due to a bug in current() that affects some versions
		// of PHP we can not pass function call directly into it
		return current($res);
=======
	 * @param	string	the table name
	 * @return	mixed
	 */
	public function optimize_table($table_name)
	{
		if ($this->_optimize_table === FALSE)
		{
			return ($this->db->db_debug) ? $this->db->display_error('db_unsuported_feature') : FALSE;
		}

		$query = $this->db->query(sprintf($this->_optimize_table, $this->db->escape_identifiers($table_name)));
		if ($query !== FALSE)
		{
			$query = $query->result_array();
			return current($res);
		}

		return FALSE;
>>>>>>> codeigniter/develop
	}

	// --------------------------------------------------------------------

	/**
	 * Optimize Database
	 *
<<<<<<< HEAD
	 * @access	public
	 * @return	array
	 */
	function optimize_database()
	{
		$result = array();
		foreach ($this->db->list_tables() as $table_name)
		{
			$sql = $this->_optimize_table($table_name);

			if (is_bool($sql))
			{
				return $sql;
			}

			$query = $this->db->query($sql);

			// Build the result array...
			// Note: Due to a bug in current() that affects some versions
			// of PHP we can not pass function call directly into it
			$res = $query->result_array();
=======
	 * @return	mixed
	 */
	public function optimize_database()
	{
		if ($this->_optimize_table === FALSE)
		{
			return ($this->db->db_debug) ? $this->db->display_error('db_unsuported_feature') : FALSE;
		}

		$result = array();
		foreach ($this->db->list_tables() as $table_name)
		{
			$res = $this->db->query(sprintf($this->_optimize_table, $this->db->escape_identifiers($table_name)));
			if (is_bool($res))
			{
				return $res;
			}

			// Build the result array...
			$res = $res->result_array();
>>>>>>> codeigniter/develop
			$res = current($res);
			$key = str_replace($this->db->database.'.', '', current($res));
			$keys = array_keys($res);
			unset($res[$keys[0]]);

			$result[$key] = $res;
		}

		return $result;
	}

	// --------------------------------------------------------------------

	/**
	 * Repair Table
	 *
<<<<<<< HEAD
	 * @access	public
	 * @param	string	the table name
	 * @return	bool
	 */
	function repair_table($table_name)
	{
		$sql = $this->_repair_table($table_name);

		if (is_bool($sql))
		{
			return $sql;
		}

		$query = $this->db->query($sql);

		// Note: Due to a bug in current() that affects some versions
		// of PHP we can not pass function call directly into it
		$res = $query->result_array();
		return current($res);
=======
	 * @param	string	the table name
	 * @return	mixed
	 */
	public function repair_table($table_name)
	{
		if ($this->_repair_table === FALSE)
		{
			return ($this->db->db_debug) ? $this->db->display_error('db_unsuported_feature') : FALSE;
		}

		$query = $this->db->query(sprintf($this->_repair_table, $this->db->escape_identifiers($table_name)));
		if (is_bool($query))
		{
			return $query;
		}

		$query = $query->result_array();
		return current($query);
>>>>>>> codeigniter/develop
	}

	// --------------------------------------------------------------------

	/**
	 * Generate CSV from a query result object
	 *
<<<<<<< HEAD
	 * @access	public
=======
>>>>>>> codeigniter/develop
	 * @param	object	The query result object
	 * @param	string	The delimiter - comma by default
	 * @param	string	The newline character - \n by default
	 * @param	string	The enclosure - double quote by default
	 * @return	string
	 */
<<<<<<< HEAD
	function csv_from_result($query, $delim = ",", $newline = "\n", $enclosure = '"')
=======
	public function csv_from_result($query, $delim = ',', $newline = "\n", $enclosure = '"')
>>>>>>> codeigniter/develop
	{
		if ( ! is_object($query) OR ! method_exists($query, 'list_fields'))
		{
			show_error('You must submit a valid result object');
		}

		$out = '';
<<<<<<< HEAD

=======
>>>>>>> codeigniter/develop
		// First generate the headings from the table column names
		foreach ($query->list_fields() as $name)
		{
			$out .= $enclosure.str_replace($enclosure, $enclosure.$enclosure, $name).$enclosure.$delim;
		}

<<<<<<< HEAD
		$out = rtrim($out);
		$out .= $newline;

		// Next blast through the result array and build out the rows
		foreach ($query->result_array() as $row)
=======
		$out = rtrim($out).$newline;

		// Next blast through the result array and build out the rows
		while ($row = $query->unbuffered_row('array'))
>>>>>>> codeigniter/develop
		{
			foreach ($row as $item)
			{
				$out .= $enclosure.str_replace($enclosure, $enclosure.$enclosure, $item).$enclosure.$delim;
			}
<<<<<<< HEAD
			$out = rtrim($out);
			$out .= $newline;
=======
			$out = rtrim($out).$newline;
>>>>>>> codeigniter/develop
		}

		return $out;
	}

	// --------------------------------------------------------------------

	/**
	 * Generate XML data from a query result object
	 *
<<<<<<< HEAD
	 * @access	public
=======
>>>>>>> codeigniter/develop
	 * @param	object	The query result object
	 * @param	array	Any preferences
	 * @return	string
	 */
<<<<<<< HEAD
	function xml_from_result($query, $params = array())
=======
	public function xml_from_result($query, $params = array())
>>>>>>> codeigniter/develop
	{
		if ( ! is_object($query) OR ! method_exists($query, 'list_fields'))
		{
			show_error('You must submit a valid result object');
		}

		// Set our default values
		foreach (array('root' => 'root', 'element' => 'element', 'newline' => "\n", 'tab' => "\t") as $key => $val)
		{
			if ( ! isset($params[$key]))
			{
				$params[$key] = $val;
			}
		}

		// Create variables for convenience
		extract($params);

		// Load the xml helper
		$CI =& get_instance();
		$CI->load->helper('xml');

		// Generate the result
<<<<<<< HEAD
		$xml = "<{$root}>".$newline;
		foreach ($query->result_array() as $row)
		{
			$xml .= $tab."<{$element}>".$newline;

			foreach ($row as $key => $val)
			{
				$xml .= $tab.$tab."<{$key}>".xml_convert($val)."</{$key}>".$newline;
			}
			$xml .= $tab."</{$element}>".$newline;
		}
		$xml .= "</$root>".$newline;

		return $xml;
=======
		$xml = '<'.$root.'>'.$newline;
		while ($row = $query->unbuffered_row())
		{
			$xml .= $tab.'<'.$element.'>'.$newline;
			foreach ($row as $key => $val)
			{
				$xml .= $tab.$tab.'<'.$key.'>'.xml_convert($val).'</'.$key.'>'.$newline;
			}
			$xml .= $tab.'</'.$element.'>'.$newline;
		}

		return $xml.'</'.$root.'>'.$newline;
>>>>>>> codeigniter/develop
	}

	// --------------------------------------------------------------------

	/**
	 * Database Backup
	 *
<<<<<<< HEAD
	 * @access	public
	 * @return	void
	 */
	function backup($params = array())
=======
	 * @return	void
	 */
	public function backup($params = array())
>>>>>>> codeigniter/develop
	{
		// If the parameters have not been submitted as an
		// array then we know that it is simply the table
		// name, which is a valid short cut.
		if (is_string($params))
		{
			$params = array('tables' => $params);
		}

		// ------------------------------------------------------

		// Set up our default preferences
		$prefs = array(
<<<<<<< HEAD
							'tables'		=> array(),
							'ignore'		=> array(),
							'filename'		=> '',
							'format'		=> 'gzip', // gzip, zip, txt
							'add_drop'		=> TRUE,
							'add_insert'	=> TRUE,
							'newline'		=> "\n"
						);
=======
				'tables'		=> array(),
				'ignore'		=> array(),
				'filename'		=> '',
				'format'		=> 'gzip', // gzip, zip, txt
				'add_drop'		=> TRUE,
				'add_insert'		=> TRUE,
				'newline'		=> "\n"
			);
>>>>>>> codeigniter/develop

		// Did the user submit any preferences? If so set them....
		if (count($params) > 0)
		{
			foreach ($prefs as $key => $val)
			{
				if (isset($params[$key]))
				{
					$prefs[$key] = $params[$key];
				}
			}
		}

<<<<<<< HEAD
		// ------------------------------------------------------

		// Are we backing up a complete database or individual tables?
		// If no table names were submitted we'll fetch the entire table list
		if (count($prefs['tables']) == 0)
=======
		// Are we backing up a complete database or individual tables?
		// If no table names were submitted we'll fetch the entire table list
		if (count($prefs['tables']) === 0)
>>>>>>> codeigniter/develop
		{
			$prefs['tables'] = $this->db->list_tables();
		}

<<<<<<< HEAD
		// ------------------------------------------------------

=======
>>>>>>> codeigniter/develop
		// Validate the format
		if ( ! in_array($prefs['format'], array('gzip', 'zip', 'txt'), TRUE))
		{
			$prefs['format'] = 'txt';
		}

<<<<<<< HEAD
		// ------------------------------------------------------

		// Is the encoder supported?  If not, we'll either issue an
		// error or use plain text depending on the debug settings
		if (($prefs['format'] == 'gzip' AND ! @function_exists('gzencode'))
		OR ($prefs['format'] == 'zip'  AND ! @function_exists('gzcompress')))
=======
		// Is the encoder supported? If not, we'll either issue an
		// error or use plain text depending on the debug settings
		if (($prefs['format'] === 'gzip' && ! @function_exists('gzencode'))
			OR ($prefs['format'] === 'zip' && ! @function_exists('gzcompress')))
>>>>>>> codeigniter/develop
		{
			if ($this->db->db_debug)
			{
				return $this->db->display_error('db_unsuported_compression');
			}

			$prefs['format'] = 'txt';
		}

<<<<<<< HEAD
		// ------------------------------------------------------

		// Set the filename if not provided - Only needed with Zip files
		if ($prefs['filename'] == '' AND $prefs['format'] == 'zip')
		{
			$prefs['filename'] = (count($prefs['tables']) == 1) ? $prefs['tables'] : $this->db->database;
			$prefs['filename'] .= '_'.date('Y-m-d_H-i', time());
		}

		// ------------------------------------------------------

		// Was a Gzip file requested?
		if ($prefs['format'] == 'gzip')
		{
			return gzencode($this->_backup($prefs));
		}

		// ------------------------------------------------------

		// Was a text file requested?
		if ($prefs['format'] == 'txt')
		{
			return $this->_backup($prefs);
		}

		// ------------------------------------------------------

		// Was a Zip file requested?
		if ($prefs['format'] == 'zip')
		{
			// If they included the .zip file extension we'll remove it
			if (preg_match("|.+?\.zip$|", $prefs['filename']))
			{
				$prefs['filename'] = str_replace('.zip', '', $prefs['filename']);
			}

			// Tack on the ".sql" file extension if needed
			if ( ! preg_match("|.+?\.sql$|", $prefs['filename']))
			{
				$prefs['filename'] .= '.sql';
			}

			// Load the Zip class and output it

=======
		// Was a Zip file requested?
		if ($prefs['format'] === 'zip')
		{
			// Set the filename if not provided (only needed with Zip files)
			if ($prefs['filename'] === '')
			{
				$prefs['filename'] = (count($prefs['tables']) === 1 ? $prefs['tables'] : $this->db->database)
							.date('Y-m-d_H-i', time()).'.sql';
			}
			else
			{
				// If they included the .zip file extension we'll remove it
				if (preg_match('|.+?\.zip$|', $prefs['filename']))
				{
					$prefs['filename'] = str_replace('.zip', '', $prefs['filename']);
				}

				// Tack on the ".sql" file extension if needed
				if ( ! preg_match('|.+?\.sql$|', $prefs['filename']))
				{
					$prefs['filename'] .= '.sql';
				}
			}

			// Load the Zip class and output it
>>>>>>> codeigniter/develop
			$CI =& get_instance();
			$CI->load->library('zip');
			$CI->zip->add_data($prefs['filename'], $this->_backup($prefs));
			return $CI->zip->get_zip();
		}
<<<<<<< HEAD

=======
		elseif ($prefs['format'] === 'txt') // Was a text file requested?
		{
			return $this->_backup($prefs);
		}
		elseif ($prefs['format'] === 'gzip') // Was a Gzip file requested?
		{
			return gzencode($this->_backup($prefs));
		}

		return;
>>>>>>> codeigniter/develop
	}

}

<<<<<<< HEAD

=======
>>>>>>> codeigniter/develop
/* End of file DB_utility.php */
/* Location: ./system/database/DB_utility.php */