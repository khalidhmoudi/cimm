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
 * Postgre Forge Class
 *
 * @category	Database
<<<<<<< HEAD
 * @author		ExpressionEngine Dev Team
=======
 * @author		EllisLab Dev Team
>>>>>>> codeigniter/develop
 * @link		http://codeigniter.com/user_guide/database/
 */
class CI_DB_postgre_forge extends CI_DB_forge {

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
	 * Create Table
	 *
	 * @access	private
	 * @param	string	the table name
	 * @param	array	the fields
	 * @param	mixed	primary key(s)
	 * @param	mixed	key(s)
	 * @param	boolean	should 'IF NOT EXISTS' be added to the SQL
	 * @return	bool
	 */
	function _create_table($table, $fields, $primary_keys, $keys, $if_not_exists)
	{
		$sql = 'CREATE TABLE ';

		if ($if_not_exists === TRUE)
		{
			if ($this->db->table_exists($table))
			{
				return "SELECT * FROM $table"; // Needs to return innocous but valid SQL statement
			}
		}

		$sql .= $this->db->_escape_identifiers($table)." (";
		$current_field_count = 0;

		foreach ($fields as $field=>$attributes)
=======
	protected $_drop_table	= 'DROP TABLE IF EXISTS %s CASCADE';

	/**
	 * Process Fields
	 *
	 * @param	mixed	the fields
	 * @return	string
	 */
	protected function _process_fields($fields, $primary_keys = array())
	{
		$sql = '';
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
			}
			else
			{
				$attributes = array_change_key_case($attributes, CASE_UPPER);

				$sql .= "\n\t".$this->db->_protect_identifiers($field);

				$is_unsigned = (array_key_exists('UNSIGNED', $attributes) && $attributes['UNSIGNED'] === TRUE);
=======
				$sql .= "\n\t".$attributes;
			}
			else
			{
				$sql .= "\n\t".$this->db->escape_identifiers($field);

				$attributes = array_change_key_case($attributes, CASE_UPPER);
				$is_unsigned = ( ! empty($attributes['UNSIGNED']) && $attributes['UNSIGNED'] === TRUE);
>>>>>>> codeigniter/develop

				// Convert datatypes to be PostgreSQL-compatible
				switch (strtoupper($attributes['TYPE']))
				{
					case 'TINYINT':
						$attributes['TYPE'] = 'SMALLINT';
						break;
					case 'SMALLINT':
						$attributes['TYPE'] = ($is_unsigned) ? 'INTEGER' : 'SMALLINT';
						break;
					case 'MEDIUMINT':
						$attributes['TYPE'] = 'INTEGER';
						break;
					case 'INT':
						$attributes['TYPE'] = ($is_unsigned) ? 'BIGINT' : 'INTEGER';
						break;
					case 'BIGINT':
						$attributes['TYPE'] = ($is_unsigned) ? 'NUMERIC' : 'BIGINT';
						break;
					case 'DOUBLE':
						$attributes['TYPE'] = 'DOUBLE PRECISION';
						break;
					case 'DATETIME':
						$attributes['TYPE'] = 'TIMESTAMP';
						break;
					case 'LONGTEXT':
						$attributes['TYPE'] = 'TEXT';
						break;
					case 'BLOB':
						$attributes['TYPE'] = 'BYTEA';
						break;
<<<<<<< HEAD
				}

				// If this is an auto-incrementing primary key, use the serial data type instead
				if (in_array($field, $primary_keys) && array_key_exists('AUTO_INCREMENT', $attributes) 
					&& $attributes['AUTO_INCREMENT'] === TRUE)
				{
					$sql .= ' SERIAL';
				}
				else
				{
					$sql .=  ' '.$attributes['TYPE'];
				}

				// Modified to prevent constraints with integer data types
				if (array_key_exists('CONSTRAINT', $attributes) && strpos($attributes['TYPE'], 'INT') === false)
=======
					default:
						break;
				}

				// If this is an auto-incrementing primary key, use the serial data type instead
				$sql .= (in_array($field, $primary_keys) && ! empty($attributes['AUTO_INCREMENT']) && $attributes['AUTO_INCREMENT'] === TRUE)
					? ' SERIAL' : ' '.$attributes['TYPE'];

				// Modified to prevent constraints with integer data types
				if ( ! empty($attributes['CONSTRAINT']) && strpos($attributes['TYPE'], 'INT') === FALSE)
>>>>>>> codeigniter/develop
				{
					$sql .= '('.$attributes['CONSTRAINT'].')';
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

				// Added new attribute to create unqite fields. Also works with MySQL
				if (array_key_exists('UNIQUE', $attributes) && $attributes['UNIQUE'] === TRUE)
=======
				if (isset($attributes['DEFAULT']))
				{
					$sql .= " DEFAULT '".$attributes['DEFAULT']."'";
				}

				$sql .= ( ! empty($attributes['NULL']) && $attributes['NULL'] === TRUE)
					? ' NULL' : ' NOT NULL';

				// Added new attribute to create unique fields. Also works with MySQL
				if ( ! empty($attributes['UNIQUE']) && $attributes['UNIQUE'] === TRUE)
>>>>>>> codeigniter/develop
				{
					$sql .= ' UNIQUE';
				}
			}

			// don't add a comma on the end of the last field
			if (++$current_field_count < count($fields))
			{
				$sql .= ',';
			}
		}

<<<<<<< HEAD
		if (count($primary_keys) > 0)
		{
			// Something seems to break when passing an array to _protect_identifiers()
			foreach ($primary_keys as $index => $key)
			{
				$primary_keys[$index] = $this->db->_protect_identifiers($key);
			}

			$sql .= ",\n\tPRIMARY KEY (" . implode(', ', $primary_keys) . ")";
=======
		return $sql;
	}

	// --------------------------------------------------------------------

	/**
	 * Create Table
	 *
	 * @param	string	the table name
	 * @param	array	the fields
	 * @param	mixed	primary key(s)
	 * @param	mixed	key(s)
	 * @param	bool	should 'IF NOT EXISTS' be added to the SQL
	 * @return	bool
	 */
	protected function _create_table($table, $fields, $primary_keys, $keys, $if_not_exists)
	{
		$sql = 'CREATE TABLE ';

		// PostgreSQL doesn't support IF NOT EXISTS syntax so we check if table exists manually
		if ($if_not_exists === TRUE && $this->db->table_exists($table))
		{
			return TRUE;
		}

		$sql .= $this->db->escape_identifiers($table).' ('.$this->_process_fields($fields, $primary_keys);

		if (count($primary_keys) > 0)
		{
			$sql .= ",\n\tPRIMARY KEY (".implode(', ', $this->db->escape_identifiers($primary_keys)).')';
>>>>>>> codeigniter/develop
		}

		$sql .= "\n);";

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

				foreach ($key as $field)
				{
					$sql .= "CREATE INDEX " . $table . "_" . str_replace(array('"', "'"), '', $field) . "_index ON $table ($field); ";
=======
				$key = is_array($key)
					? $this->db->escape_identifiers($key)
					: array($this->db->escape_identifiers($key));

				foreach ($key as $field)
				{
					$sql .= "\nCREATE INDEX ".$this->db->escape_identifiers($table.'_'.str_replace(array('"', "'"), '', $field).'_index')
						.' ON '.$this->db->escape_identifiers($table).' ('.$this->db->escape_identifiers($field).');';
>>>>>>> codeigniter/develop
				}
			}
		}

		return $sql;
	}

	// --------------------------------------------------------------------

	/**
<<<<<<< HEAD
	 * Drop Table
	 *
	 * @access    private
	 * @return    bool
	 */
	function _drop_table($table)
	{
		return "DROP TABLE IF EXISTS ".$this->db->_escape_identifiers($table)." CASCADE";
	}

	// --------------------------------------------------------------------

	/**
=======
>>>>>>> codeigniter/develop
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
		{
			return $sql;
		}

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
		$sql = 'ALTER TABLE '.$this->db->_protect_identifiers($table_name)." RENAME TO ".$this->db->_protect_identifiers($new_table_name);
		return $sql;
	}

=======
	 * @param	bool	should 'NOT NULL' be added
	 * @param	string	the field after which we should add the new field
	 * @return	string
	 */
	protected function _alter_table($alter_type, $table, $fields, $after_field = '')
 	{
 		$sql = 'ALTER TABLE '.$this->db->escape_identifiers($table).' '.$alter_type.' ';

 		// DROP has everything it needs now.
 		if ($alter_type === 'DROP')
 		{
 			return $sql.$this->db->escape_identifiers($fields);
 		}

 		return $sql.$this->_process_fields($fields)
			.($after_field !== '' ? ' AFTER '.$this->db->escape_identifiers($after_field) : '');
 	}
>>>>>>> codeigniter/develop

}

/* End of file postgre_forge.php */
/* Location: ./system/database/drivers/postgre/postgre_forge.php */