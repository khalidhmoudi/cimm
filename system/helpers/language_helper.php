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
 * CodeIgniter Language Helpers
 *
 * @package		CodeIgniter
 * @subpackage	Helpers
 * @category	Helpers
<<<<<<< HEAD
 * @author		ExpressionEngine Dev Team
=======
 * @author		EllisLab Dev Team
>>>>>>> codeigniter/develop
 * @link		http://codeigniter.com/user_guide/helpers/language_helper.html
 */

// ------------------------------------------------------------------------

<<<<<<< HEAD
/**
 * Lang
 *
 * Fetches a language variable and optionally outputs a form label
 *
 * @access	public
 * @param	string	the language line
 * @param	string	the id of the form element
 * @return	string
 */
if ( ! function_exists('lang'))
{
=======
if ( ! function_exists('lang'))
{
	/**
	 * Lang
	 *
	 * Fetches a language variable and optionally outputs a form label
	 *
	 * @param	string	the language line
	 * @param	string	the id of the form element
	 * @return	string
	 */
>>>>>>> codeigniter/develop
	function lang($line, $id = '')
	{
		$CI =& get_instance();
		$line = $CI->lang->line($line);

<<<<<<< HEAD
		if ($id != '')
		{
			$line = '<label for="'.$id.'">'.$line."</label>";
=======
		if ($id !== '')
		{
			$line = '<label for="'.$id.'">'.$line.'</label>';
>>>>>>> codeigniter/develop
		}

		return $line;
	}
}

<<<<<<< HEAD
// ------------------------------------------------------------------------
=======
>>>>>>> codeigniter/develop
/* End of file language_helper.php */
/* Location: ./system/helpers/language_helper.php */