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
 * CodeIgniter Cookie Helpers
 *
 * @package		CodeIgniter
 * @subpackage	Helpers
 * @category	Helpers
<<<<<<< HEAD
 * @author		ExpressionEngine Dev Team
=======
 * @author		EllisLab Dev Team
>>>>>>> codeigniter/develop
 * @link		http://codeigniter.com/user_guide/helpers/cookie_helper.html
 */

// ------------------------------------------------------------------------

<<<<<<< HEAD
/**
 * Set cookie
 *
 * Accepts six parameter, or you can submit an associative
 * array in the first parameter containing all the values.
 *
 * @access	public
 * @param	mixed
 * @param	string	the value of the cookie
 * @param	string	the number of seconds until expiration
 * @param	string	the cookie domain.  Usually:  .yourdomain.com
 * @param	string	the cookie path
 * @param	string	the cookie prefix
 * @return	void
 */
if ( ! function_exists('set_cookie'))
{
	function set_cookie($name = '', $value = '', $expire = '', $domain = '', $path = '/', $prefix = '', $secure = FALSE)
	{
		// Set the config file options
		$CI =& get_instance();
		$CI->input->set_cookie($name, $value, $expire, $domain, $path, $prefix, $secure);
=======
if ( ! function_exists('set_cookie'))
{
	/**
	 * Set cookie
	 *
	 * Accepts seven parameters, or you can submit an associative
	 * array in the first parameter containing all the values.
	 *
	 * @param	mixed
	 * @param	string	the value of the cookie
	 * @param	string	the number of seconds until expiration
	 * @param	string	the cookie domain.  Usually:  .yourdomain.com
	 * @param	string	the cookie path
	 * @param	string	the cookie prefix
	 * @param	bool	true makes the cookie secure
	 * @param	bool	true makes the cookie accessible via http(s) only (no javascript)
	 * @return	void
	 */
	function set_cookie($name = '', $value = '', $expire = '', $domain = '', $path = '/', $prefix = '', $secure = FALSE, $httponly = FALSE)
	{
		// Set the config file options
		$CI =& get_instance();
		$CI->input->set_cookie($name, $value, $expire, $domain, $path, $prefix, $secure, $httponly);
>>>>>>> codeigniter/develop
	}
}

// --------------------------------------------------------------------

<<<<<<< HEAD
/**
 * Fetch an item from the COOKIE array
 *
 * @access	public
 * @param	string
 * @param	bool
 * @return	mixed
 */
if ( ! function_exists('get_cookie'))
{
	function get_cookie($index = '', $xss_clean = FALSE)
	{
		$CI =& get_instance();

		$prefix = '';

		if ( ! isset($_COOKIE[$index]) && config_item('cookie_prefix') != '')
		{
			$prefix = config_item('cookie_prefix');
		}

=======
if ( ! function_exists('get_cookie'))
{
	/**
	 * Fetch an item from the COOKIE array
	 *
	 * @param	string
	 * @param	bool
	 * @return	mixed
	 */
	function get_cookie($index = '', $xss_clean = FALSE)
	{
		$CI =& get_instance();
		$prefix = isset($_COOKIE[$index]) ? '' : config_item('cookie_prefix');
>>>>>>> codeigniter/develop
		return $CI->input->cookie($prefix.$index, $xss_clean);
	}
}

// --------------------------------------------------------------------

<<<<<<< HEAD
/**
 * Delete a COOKIE
 *
 * @param	mixed
 * @param	string	the cookie domain.  Usually:  .yourdomain.com
 * @param	string	the cookie path
 * @param	string	the cookie prefix
 * @return	void
 */
if ( ! function_exists('delete_cookie'))
{
=======
if ( ! function_exists('delete_cookie'))
{
	/**
	 * Delete a COOKIE
	 *
	 * @param	mixed
	 * @param	string	the cookie domain. Usually: .yourdomain.com
	 * @param	string	the cookie path
	 * @param	string	the cookie prefix
	 * @return	void
	 */
>>>>>>> codeigniter/develop
	function delete_cookie($name = '', $domain = '', $path = '/', $prefix = '')
	{
		set_cookie($name, '', '', $domain, $path, $prefix);
	}
}

<<<<<<< HEAD

=======
>>>>>>> codeigniter/develop
/* End of file cookie_helper.php */
/* Location: ./system/helpers/cookie_helper.php */