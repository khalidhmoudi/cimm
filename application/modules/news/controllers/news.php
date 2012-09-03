<?php if ( !defined( 'BASEPATH' ) ) {
	exit( 'No direct script access allowed' );
}

/**
 * CI Smarty
 *
 * Smarty templating for Codeigniter
 *
 * @package   CI Smarty
 * @author    Dwayne Charrington
 * @copyright Copyright (c) 2012 Dwayne Charrington and Github contributors
 * @link      http://ilikekillnerds.com
 * @license   http://www.apache.org/licenses/LICENSE-2.0.html
 * @version   2.0
 * @help      http://codeigniter.com/user_guide/tutorial/news_section.html
 */

class News extends MX_Controller
{

	public function __construct() {

		parent::__construct();

	}

	public function index() {

		$this->lang->load( 'news' );
		// Some example data
		$data['title'] = "The Smarty parser works!";
		$data['body']  = "This is body text to show that the Smarty Parser works!";

		// Load the template from the views directory
		$this->parser->parse( "news.tpl", $data );
	}

	/**
	 * Showing off Smarty 3 template inheritance features
	 *
	 */
	public function inheritance() {

		// Some example data
		$data['title'] = "The Smarty parser works with template inheritance!";
		$data['body']  = "This is body text to show that Smarty 3 template inheritance works with Smarty Parser.";

		// Load the template from the views directory
		$this->parser->parse( "inheritancetest.tpl", $data );

	}

}