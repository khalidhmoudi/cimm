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
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

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
 * @link		http://codeigniter.com
 * @since		Version 2.0.3
 * @filesource
 */

>>>>>>> codeigniter/develop
/**
 * SQLSRV Forge Class
 *
 * @category	Database
<<<<<<< HEAD
 * @author		ExpressionEngine Dev Team
=======
 * @author		EllisLab Dev Team
>>>>>>> codeigniter/develop
 * @link		http://codeigniter.com/user_guide/database/
 */
class CI_DB_sqlsrv_forge extends CI_DB_forge {

<<<<<<< HEAD
	/**
	 * Create database
	 *
	 * @access	private
	 * @param	string	the database name
	 * @return	bool
	 */
	function _create_database($name)
	{
		return "CREATE DATABASE ".$name;
	}

	// --------------------------------------------------------------------

	/**
	 * Drop database
	 *
	 * @access	private
	 * @param	string	the database name
	 * @return	bool
	 */
	function _drop_database($name)
	{
		return "DROP DATABASE ".$name;
	}

	// --------------------------------------------------------------------

	/**
	 * Drop Table
	 *
	 * @access	private
	 * @return	bool
	 */
	function _drop_table($table)
	{
		return "DROP TABLE ".$this->db->_escape_identifiers($table);
	}

	// --------------------------------------------------------------------
=======
	protected $_drop_table	= 'DROP TABLE %s';
>>>>>>> codeigniter/develop

	/**
	 * Create Table
	 *
<<<<<<< HEAD
	 * @access	private
=======
>>>>>>> codeigniter/develop
	 * @param	string	the table name
	 * @param	array	the fields
	 * @param	mixed	primary key(s)
	 * @param	mixed	key(s)
<<<<<<< HEAD
	 * @param	boolean	should 'IF NOT EXISTS' be added to the SQL
	 * @return	bool
	 */
	function _create_table($table, $fields, $primary_keys, $keys, $if_not_exists)
	{
		$sql = 'CREATE TABLE ';

		if ($if_not_exists === TRUE)
		{
			$sql .= 'IF NOT EXISTS ';
		}

		$sql .= $this->db->_escape_identifiers($table)." (";
		$current_field_count = 0;

		foreach ($fields as $field=>$attributes)
=======
	 * @param	bool	should 'IF NOT EXISTS' be added to the SQL
	 * @return	string
	 */
	protected function _create_table($table, $fields, $primary_keys, $keys, $if_not_exists)
	{
		$sql = ($if_not_exists === TRUE)
			? "IF NOT EXISTS (SELECT * FROM sysobjects WHERE ID = object_id(N'".$table."') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)\n"
			: '';

		$sql .= 'CREATE TABLE '.$this->db->escape_identifiers($table).' (';

		$current_field_count = 0;
		foreach ($fields as $field => $attributes)
>>>>>>> codeigniter/develop
		{
			// Numeric field names aren't allowed in databases, so if the key is
			// numeric, we know it was assigned by PHP and the developer manually
			// entered the field information, so we'll simply add it to the list
			if (is_numeric($field))
			{
<<<<<<< HEAD
				$sql .= "\n\t$attributes";
=======
				$sql .= "\n\t".$attributes;
>>>>>>> codeigniter/develop
			}
			else
			{
				$attributes = array_change_key_case($attributes, CASE_UPPER);

<<<<<<< HEAD
				$sql .= "\n\t".$this->db->_protect_identifiers($field);

				$sql .=  ' '.$attributes['TYPE'];

				if (array_key_exists('CONSTRAINT', $attributes))
=======
				$sql .= "\n\t".$this->db->escape_identifiers($field).' '.$attributes['TYPE'];

				if (stripos($attributes['TYPE'], 'INT') === FALSE && ! empty($attributes['CONSTRAINT']))
>>>>>>> codeigniter/develop
				{
					$sql .= '('.$attributes['CONSTRAINT'].')';
				}

<<<<<<< HEAD
				if (array_key_exists('UNSIGNED', $attributes) && $attributes['UNSIGNED'] === TRUE)
=======
				if ( ! empty($attributes['UNSIGNED']) && $attributes['UNSIGNED'] === TRUE)
>>>>>>> codeigniter/develop
				{
					$sql .= ' UNSIGNED';
				}

<<<<<<< HEAD
				if (array_key_exists('DEFAULT', $attributes))
				{
					$sql .= ' DEFAULT \''.$attributes['DEFAULT'].'\'';
				}

				if (array_key_exists('NULL', $attributes) && $attributes['NULL'] === TRUE)
				{
					$sql .= ' NULL';
				}
				else
				{
					$sql .= ' NOT NULL';
				}

				if (array_key_exists('AUTO_INCREMENT', $attributes) && $attributes['AUTO_INCREMENT'] === TRUE)
=======
				if (isset($attributes['DEFAULT']))
				{
					$sql .= " DEFAULT '".$attributes['DEFAULT']."'";
				}

				$sql .= ( ! empty($attributes['NULL']) && $attribues['NULL'] === TRUE)
					? ' NULL' : ' NOT NULL';

				if ( ! empty($attributes['AUTO_INCREMENT']) && $attributes['AUTO_INCREMENT'] === TRUE)
>>>>>>> codeigniter/develop
				{
					$sql .= ' AUTO_INCREMENT';
				}
			}

			// don't add a comma on the end of the last field
			if (++$current_field_count < count($fields))
			{
				$sql .= ',';
			}
		}

		if (count($primary_keys) > 0)
		{
<<<<<<< HEAD
			$primary_keys = $this->db->_protect_identifiers($primary_keys);
			$sql .= ",\n\tPRIMARY KEY (" . implode(', ', $primary_keys) . ")";
=======
			$sql .= ",\n\tPRIMARY KEY (".implode(', ', $this->db->escape_identifiers($primary_keys)).')';
>>>>>>> codeigniter/develop
		}

		if (is_array($keys) && count($keys) > 0)
		{
			foreach ($keys as $key)
			{
<<<<<<< HEAD
				if (is_array($key))
				{
					$key = $this->db->_protect_identifiers($key);
				}
				else
				{
					$key = array($this->db->_protect_identifiers($key));
				}

				$sql .= ",\n\tFOREIGN KEY (" . implode(', ', $key) . ")";
			}
		}

		$sql .= "\n)";

		return $sql;
=======
				$key = is_array($key)
					? $this->db->escape_identifiers($key)
					: array($this->escape_identifiers($key));

				$sql .= ",\n\tFOREIGN KEY (".implode(', ', $key).')';
			}
		}

		return $sql."\n)";
>>>>>>> codeigniter/develop
	}

	// --------------------------------------------------------------------

	/**
	 * Alter table query
	 *
	 * Generates a platform-specific query so that a table can be altered
	 * Called by add_column(), drop_column(), and column_alter(),
	 *
<<<<<<< HEAD
	 * @access	private
=======
>>>>>>> codeigniter/develop
	 * @param	string	the ALTER type (ADD, DROP, CHANGE)
	 * @param	string	the column name
	 * @param	string	the table name
	 * @param	string	the column definition
	 * @param	string	the default value
<<<<<<< HEAD
	 * @param	boolean	should 'NOT NULL' be added
	 * @param	string	the field after which we should add the new field
	 * @return	object
	 */
	function _alter_table($alter_type, $table, $column_name, $column_definition = '', $default_value = '', $null = '', $after_field = '')
	{
		$sql = 'ALTER TABLE '.$this->db->_protect_identifiers($table)." $alter_type ".$this->db->_protect_identifiers($column_name);

		// DROP has everything it needs now.
		if ($alter_type == 'DROP')
=======
	 * @param	bool	should 'NOT NULL' be added
	 * @param	string	the field after which we should add the new field
	 * @return	string
	 */
	protected function _alter_table($alter_type, $table, $column_name, $column_definition = '', $default_value = '', $null = '', $after_field = '')
	{
		$sql = 'ALTER TABLE '.$this->db->escape_identifiers($table).' '.$alter_type.' '.$this->db->escape_identifiers($column_name);

		// DROP has everything it needs now.
		if ($alter_type === 'DROP')
>>>>>>> codeigniter/develop
		{
			return $sql;
		}

<<<<<<< HEAD
		$sql .= " $column_definition";

		if ($default_value != '')
		{
			$sql .= " DEFAULT \"$default_value\"";
		}

		if ($null === NULL)
		{
			$sql .= ' NULL';
		}
		else
		{
			$sql .= ' NOT NULL';
		}

		if ($after_field != '')
		{
			$sql .= ' AFTER ' . $this->db->_protect_identifiers($after_field);
		}

		return $sql;

	}

	// --------------------------------------------------------------------

	/**
	 * Rename a table
	 *
	 * Generates a platform-specific query so that a table can be renamed
	 *
	 * @access	private
	 * @param	string	the old table name
	 * @param	string	the new table name
	 * @return	string
	 */
	function _rename_table($table_name, $new_table_name)
	{
		// I think this syntax will work, but can find little documentation on renaming tables in MSSQL
		$sql = 'ALTER TABLE '.$this->db->_protect_identifiers($table_name)." RENAME TO ".$this->db->_protect_identifiers($new_table_name);
		return $sql;
=======
		return $sql.' '.$column_definition
			.($default_value != '' ? ' DEFAULT "'.$default_value.'"' : '')
			.($null === NULL ? ' NULL' : ' NOT NULL')
			.($after_field != '' ? ' AFTER '.$this->db->escape_identifiers($after_field) : '');
>>>>>>> codeigniter/develop
	}

}

<<<<<<< HEAD
/* End of file mssql_forge.php */
/* Location: ./system/database/drivers/mssql/mssql_forge.php */
=======
/* End of file sqlsrv_forge.php */
/* Location: ./system/database/drivers/sqlsrv/sqlsrv_forge.php */
>>>>>>> codeigniter/develop
