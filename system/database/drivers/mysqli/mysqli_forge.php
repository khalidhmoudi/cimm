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
 * MySQLi Forge Class
 *
 * @category	Database
<<<<<<< HEAD
 * @author		ExpressionEngine Dev Team
=======
 * @author		EllisLab Dev Team
>>>>>>> codeigniter/develop
 * @link		http://codeigniter.com/user_guide/database/
 */
class CI_DB_mysqli_forge extends CI_DB_forge {

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
=======
	protected $_create_database	= 'CREATE DATABASE %s CHARACTER SET %s COLLATE %s';
>>>>>>> codeigniter/develop

	/**
	 * Process Fields
	 *
<<<<<<< HEAD
	 * @access	private
	 * @param	mixed	the fields
	 * @return	string
	 */
	function _process_fields($fields)
=======
	 * @param	mixed	the fields
	 * @return	string
	 */
	protected function _process_fields($fields)
>>>>>>> codeigniter/develop
	{
		$current_field_count = 0;
		$sql = '';

<<<<<<< HEAD
		foreach ($fields as $field=>$attributes)
=======
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

				if (array_key_exists('NAME', $attributes))
				{
					$sql .= ' '.$this->db->_protect_identifiers($attributes['NAME']).' ';
				}

				if (array_key_exists('TYPE', $attributes))
				{
					$sql .=  ' '.$attributes['TYPE'];
				}

				if (array_key_exists('CONSTRAINT', $attributes))
				{
					$sql .= '('.$attributes['CONSTRAINT'].')';
				}

				if (array_key_exists('UNSIGNED', $attributes) && $attributes['UNSIGNED'] === TRUE)
=======
				$sql .= "\n\t".$this->db->escape_identifiers($field);

				empty($attributes['NAME']) OR $sql .= ' '.$this->db->escape_identifiers($attributes['NAME']).' ';

				if ( ! empty($attributes['TYPE']))
				{
					$sql .= ' '.$attributes['TYPE'];

					if ( ! empty($attributes['CONSTRAINT']))
					{
						switch (strtolower($attributes['TYPE']))
						{
							case 'decimal':
							case 'float':
							case 'numeric':
								$sql .= '('.implode(',', $attributes['CONSTRAINT']).')';
								break;
							case 'enum':
							case 'set':
								$sql .= '("'.implode('","', $attributes['CONSTRAINT']).'")';
								break;
							default:
								$sql .= '('.$attributes['CONSTRAINT'].')';
						}
					}
				}

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

				$sql .= ( ! empty($attributes['NULL']) && $attributes['NULL'] === TRUE)
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

		return $sql;
	}

	// --------------------------------------------------------------------

	/**
	 * Create Table
	 *
<<<<<<< HEAD
	 * @access	private
=======
>>>>>>> codeigniter/develop
	 * @param	string	the table name
	 * @param	mixed	the fields
	 * @param	mixed	primary key(s)
	 * @param	mixed	key(s)
<<<<<<< HEAD
	 * @param	boolean	should 'IF NOT EXISTS' be added to the SQL
	 * @return	bool
	 */
	function _create_table($table, $fields, $primary_keys, $keys, $if_not_exists)
=======
	 * @param	bool	should 'IF NOT EXISTS' be added to the SQL
	 * @return	bool
	 */
	protected function _create_table($table, $fields, $primary_keys, $keys, $if_not_exists)
>>>>>>> codeigniter/develop
	{
		$sql = 'CREATE TABLE ';

		if ($if_not_exists === TRUE)
		{
			$sql .= 'IF NOT EXISTS ';
		}

<<<<<<< HEAD
		$sql .= $this->db->_escape_identifiers($table)." (";

		$sql .= $this->_process_fields($fields);

		if (count($primary_keys) > 0)
		{
			$key_name = $this->db->_protect_identifiers(implode('_', $primary_keys));
			$primary_keys = $this->db->_protect_identifiers($primary_keys);
			$sql .= ",\n\tPRIMARY KEY ".$key_name." (" . implode(', ', $primary_keys) . ")";
=======
		$sql .= $this->db->escape_identifiers($table).' ('.$this->_process_fields($fields);

		if (count($primary_keys) > 0)
		{
			$key_name = $this->db->escape_identifiers(implode('_', $primary_keys));
			$sql .= ",\n\tPRIMARY KEY ".$key_name.' ('.implode(', ', $this->db->escape_identifiers($primary_keys)).')';
>>>>>>> codeigniter/develop
		}

		if (is_array($keys) && count($keys) > 0)
		{
			foreach ($keys as $key)
			{
				if (is_array($key))
				{
<<<<<<< HEAD
					$key_name = $this->db->_protect_identifiers(implode('_', $key));
					$key = $this->db->_protect_identifiers($key);
				}
				else
				{
					$key_name = $this->db->_protect_identifiers($key);
					$key = array($key_name);
				}

				$sql .= ",\n\tKEY {$key_name} (" . implode(', ', $key) . ")";
			}
		}

		$sql .= "\n) DEFAULT CHARACTER SET {$this->db->char_set} COLLATE {$this->db->dbcollat};";

		return $sql;
	}

	// --------------------------------------------------------------------

	/**
	 * Drop Table
	 *
	 * @access	private
	 * @return	string
	 */
	function _drop_table($table)
	{
		return "DROP TABLE IF EXISTS ".$this->db->_escape_identifiers($table);
=======
					$key_name = $this->db->escape_identifiers(implode('_', $key));
					$key = $this->db->escape_identifiers($key);
				}
				else
				{
					$key_name = $this->db->escape_identifiers($key);
					$key = array($key_name);
				}

				$sql .= ",\n\tKEY ".$key_name.' ('.implode(', ', $key).')';
			}
		}

		return $sql."\n) DEFAULT CHARACTER SET ".$this->db->char_set.' COLLATE '.$this->db->dbcollat.';';
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
	 * @param	array	fields
	 * @param	string	the field after which we should add the new field
<<<<<<< HEAD
	 * @return	object
	 */
	function _alter_table($alter_type, $table, $fields, $after_field = '')
	{
		$sql = 'ALTER TABLE '.$this->db->_protect_identifiers($table)." $alter_type ";

		// DROP has everything it needs now.
		if ($alter_type == 'DROP')
		{
			return $sql.$this->db->_protect_identifiers($fields);
		}

		$sql .= $this->_process_fields($fields);

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
=======
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
>>>>>>> codeigniter/develop
	}

}

/* End of file mysqli_forge.php */
/* Location: ./system/database/drivers/mysqli/mysqli_forge.php */