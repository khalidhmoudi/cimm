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
 * Image Manipulation class
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Image_lib
<<<<<<< HEAD
 * @author		ExpressionEngine Dev Team
=======
 * @author		EllisLab Dev Team
>>>>>>> codeigniter/develop
 * @link		http://codeigniter.com/user_guide/libraries/image_lib.html
 */
class CI_Image_lib {

<<<<<<< HEAD
	var $image_library		= 'gd2';	// Can be:  imagemagick, netpbm, gd, gd2
	var $library_path		= '';
	var $dynamic_output		= FALSE;	// Whether to send to browser or write to disk
	var $source_image		= '';
	var $new_image			= '';
	var $width				= '';
	var $height				= '';
	var $quality			= '90';
	var $create_thumb		= FALSE;
	var $thumb_marker		= '_thumb';
	var $maintain_ratio		= TRUE;		// Whether to maintain aspect ratio when resizing or use hard values
	var $master_dim			= 'auto';	// auto, height, or width.  Determines what to use as the master dimension
	var $rotation_angle		= '';
	var $x_axis				= '';
	var	$y_axis				= '';

	// Watermark Vars
	var $wm_text			= '';			// Watermark text if graphic is not used
	var $wm_type			= 'text';		// Type of watermarking.  Options:  text/overlay
	var $wm_x_transp		= 4;
	var $wm_y_transp		= 4;
	var $wm_overlay_path	= '';			// Watermark image path
	var $wm_font_path		= '';			// TT font
	var $wm_font_size		= 17;			// Font size (different versions of GD will either use points or pixels)
	var $wm_vrt_alignment	= 'B';			// Vertical alignment:   T M B
	var $wm_hor_alignment	= 'C';			// Horizontal alignment: L R C
	var $wm_padding			= 0;			// Padding around text
	var $wm_hor_offset		= 0;			// Lets you push text to the right
	var $wm_vrt_offset		= 0;			// Lets you push  text down
	var $wm_font_color		= '#ffffff';	// Text color
	var $wm_shadow_color	= '';			// Dropshadow color
	var $wm_shadow_distance	= 2;			// Dropshadow distance
	var $wm_opacity			= 50;			// Image opacity: 1 - 100  Only works with image

	// Private Vars
	var $source_folder		= '';
	var $dest_folder		= '';
	var $mime_type			= '';
	var $orig_width			= '';
	var $orig_height		= '';
	var $image_type			= '';
	var $size_str			= '';
	var $full_src_path		= '';
	var $full_dst_path		= '';
	var $create_fnc			= 'imagecreatetruecolor';
	var $copy_fnc			= 'imagecopyresampled';
	var $error_msg			= array();
	var $wm_use_drop_shadow	= FALSE;
	var $wm_use_truetype	= FALSE;

	/**
	 * Constructor
	 *
	 * @param	string
=======
	/**
	 * PHP extension/library to use for image manipulation
	 * Can be: imagemagick, netpbm, gd, gd2
	 *
	 * @var string
	 */
	public $image_library		= 'gd2';

	/**
	 * Path to the graphic library (if applicable)
	 *
	 * @var string
	 */
	public $library_path		= '';

	/**
	 * Whether to send to browser or write to disk
	 *
	 * @var bool
	 */
	public $dynamic_output		= FALSE;

	/**
	 * Path to original image
	 *
	 * @var string
	 */
	public $source_image		= '';

	/**
	 * Path to the modified image
	 *
	 * @var string
	 */
	public $new_image		= '';

	/**
	 * Image width
	 *
	 * @var int
	 */
	public $width			= '';

	/**
	 * Image height
	 *
	 * @var int
	 */
	public $height			= '';

	/**
	 * Quality percentage of new image
	 *
	 * @var int
	 */
	public $quality			= 90;

	/**
	 * Whether to create a thumbnail
	 *
	 * @var bool
	 */
	public $create_thumb		= FALSE;

	/**
	 * String to add to thumbnail version of image
	 *
	 * @var string
	 */
	public $thumb_marker		= '_thumb';

	/**
	 * Whether to maintain aspect ratio when resizing or use hard values
	 *
	 * @var bool
	 */
	public $maintain_ratio		= TRUE;

	/**
	 * auto, height, or width.  Determines what to use as the master dimension
	 *
	 * @var string
	 */
	public $master_dim		= 'auto';

	/**
	 * Angle at to rotate image
	 *
	 * @var string
	 */
	public $rotation_angle		= '';

	/**
	 * X Coordinate for manipulation of the current image
	 *
	 * @var int
	 */
	public $x_axis			= '';

	/**
	 * Y Coordinate for manipulation of the current image
	 *
	 * @var int
	 */
	public $y_axis			= '';

	// --------------------------------------------------------------------------
	// Watermark Vars
	// --------------------------------------------------------------------------

	/**
	 * Watermark text if graphic is not used
	 *
	 * @var string
	 */
	public $wm_text			= '';

	/**
	 * Type of watermarking.  Options:  text/overlay
	 *
	 * @var string
	 */
	public $wm_type			= 'text';

	/**
	 * Default transparency for watermark
	 *
	 * @var int
	 */
	public $wm_x_transp		= 4;

	/**
	 * Default transparency for watermark
	 *
	 * @var int
	 */
	public $wm_y_transp		= 4;

	/**
	 * Watermark image path
	 *
	 * @var string
	 */
	public $wm_overlay_path		= '';

	/**
	 * TT font
	 *
	 * @var string
	 */
	public $wm_font_path		= '';

	/**
	 * Font size (different versions of GD will either use points or pixels)
	 *
	 * @var int
	 */
	public $wm_font_size		= 17;

	/**
	 * Vertical alignment:   T M B
	 *
	 * @var string
	 */
	public $wm_vrt_alignment	= 'B';

	/**
	 * Horizontal alignment: L R C
	 *
	 * @var string
	 */
	public $wm_hor_alignment	= 'C';

	/**
	 * Padding around text
	 *
	 * @var int
	 */
	public $wm_padding			= 0;

	/**
	 * Lets you push text to the right
	 *
	 * @var int
	 */
	public $wm_hor_offset		= 0;

	/**
	 * Lets you push text down
	 *
	 * @var int
	 */
	public $wm_vrt_offset		= 0;

	/**
	 * Text color
	 *
	 * @var string
	 */
	protected $wm_font_color	= '#ffffff';

	/**
	 * Dropshadow color
	 *
	 * @var string
	 */
	protected $wm_shadow_color	= '';

	/**
	 * Dropshadow distance
	 *
	 * @var int
	 */
	public $wm_shadow_distance	= 2;

	/**
	 * Image opacity: 1 - 100  Only works with image
	 *
	 * @var int
	 */
	public $wm_opacity		= 50;

	// --------------------------------------------------------------------------
	// Private Vars
	// --------------------------------------------------------------------------

	/**
	 * Source image folder
	 *
	 * @var string
	 */
	public $source_folder		= '';

	/**
	 * Destination image folder
	 *
	 * @var string
	 */
	public $dest_folder		= '';

	/**
	 * Image mime-type
	 *
	 * @var string
	 */
	public $mime_type		= '';

	/**
	 * Original image width
	 *
	 * @var int
	 */
	public $orig_width		= '';

	/**
	 * Original image height
	 *
	 * @var int
	 */
	public $orig_height		= '';

	/**
	 * Image format
	 *
	 * @var string
	 */
	public $image_type		= '';

	/**
	 * Size of current image
	 *
	 * @var string
	 */
	public $size_str		= '';

	/**
	 * Full path to source image
	 *
	 * @var string
	 */
	public $full_src_path		= '';

	/**
	 * Full path to destination image
	 *
	 * @var string
	 */
	public $full_dst_path		= '';

	/**
	 * Name of function to create image
	 *
	 * @var string
	 */
	public $create_fnc		= 'imagecreatetruecolor';

	/**
	 * Name of function to copy image
	 *
	 * @var string
	 */
	public $copy_fnc		= 'imagecopyresampled';

	/**
	 * Error messages
	 *
	 * @var array
	 */
	public $error_msg		= array();

	/**
	 * Whether to have a drop shadow on watermark
	 *
	 * @var bool
	 */
	protected $wm_use_drop_shadow	= FALSE;

	/**
	 * Whether to use truetype fonts
	 *
	 * @var bool
	 */
	public $wm_use_truetype	= FALSE;

	/**
	 * Initialize Image Library
	 *
	 * @param	array	$props
>>>>>>> codeigniter/develop
	 * @return	void
	 */
	public function __construct($props = array())
	{
		if (count($props) > 0)
		{
			$this->initialize($props);
		}

<<<<<<< HEAD
		log_message('debug', "Image Lib Class Initialized");
=======
		log_message('debug', 'Image Lib Class Initialized');
>>>>>>> codeigniter/develop
	}

	// --------------------------------------------------------------------

	/**
	 * Initialize image properties
	 *
	 * Resets values in case this class is used in a loop
	 *
<<<<<<< HEAD
	 * @access	public
	 * @return	void
	 */
	function clear()
	{
		$props = array('source_folder', 'dest_folder', 'source_image', 'full_src_path', 'full_dst_path', 'new_image', 'image_type', 'size_str', 'quality', 'orig_width', 'orig_height', 'width', 'height', 'rotation_angle', 'x_axis', 'y_axis', 'create_fnc', 'copy_fnc', 'wm_overlay_path', 'wm_use_truetype', 'dynamic_output', 'wm_font_size', 'wm_text', 'wm_vrt_alignment', 'wm_hor_alignment', 'wm_padding', 'wm_hor_offset', 'wm_vrt_offset', 'wm_font_color', 'wm_use_drop_shadow', 'wm_shadow_color', 'wm_shadow_distance', 'wm_opacity');
=======
	 * @return	void
	 */
	public function clear()
	{
		$props = array('library_path', 'source_image', 'new_image', 'width', 'height', 'rotation_angle', 'x_axis', 'y_axis', 'wm_text', 'wm_overlay_path', 'wm_font_path', 'wm_shadow_color', 'source_folder', 'dest_folder', 'mime_type', 'orig_width', 'orig_height', 'image_type', 'size_str', 'full_src_path', 'full_dst_path');
>>>>>>> codeigniter/develop

		foreach ($props as $val)
		{
			$this->$val = '';
		}

<<<<<<< HEAD
		// special consideration for master_dim
		$this->master_dim = 'auto';
=======
		$this->image_library 		= 'gd2';
		$this->dynamic_output 		= FALSE;
		$this->quality 				= 90;
		$this->create_thumb 		= FALSE;
		$this->thumb_marker 		= '_thumb';
		$this->maintain_ratio 		= TRUE;
		$this->master_dim 			= 'auto';
		$this->wm_type 				= 'text';
		$this->wm_x_transp 			= 4;
		$this->wm_y_transp 			= 4;
		$this->wm_font_size 		= 17;
		$this->wm_vrt_alignment 	= 'B';
		$this->wm_hor_alignment 	= 'C';
		$this->wm_padding 			= 0;
		$this->wm_hor_offset 		= 0;
		$this->wm_vrt_offset 		= 0;
		$this->wm_font_color		= '#ffffff';
		$this->wm_shadow_distance 	= 2;
		$this->wm_opacity 			= 50;
		$this->create_fnc 			= 'imagecreatetruecolor';
		$this->copy_fnc 			= 'imagecopyresampled';
		$this->error_msg 			= array();
		$this->wm_use_drop_shadow 	= FALSE;
		$this->wm_use_truetype 		= FALSE;
>>>>>>> codeigniter/develop
	}

	// --------------------------------------------------------------------

	/**
	 * initialize image preferences
	 *
<<<<<<< HEAD
	 * @access	public
	 * @param	array
	 * @return	bool
	 */
	function initialize($props = array())
	{
		/*
		 * Convert array elements into class variables
		 */
=======
	 * @param	array
	 * @return	bool
	 */
	public function initialize($props = array())
	{
		// Convert array elements into class variables
>>>>>>> codeigniter/develop
		if (count($props) > 0)
		{
			foreach ($props as $key => $val)
			{
<<<<<<< HEAD
				$this->$key = $val;
			}
		}

		/*
		 * Is there a source image?
		 *
		 * If not, there's no reason to continue
		 *
		 */
		if ($this->source_image == '')
		{
			$this->set_error('imglib_source_image_required');
			return FALSE;	
		}

		/*
		 * Is getimagesize() Available?
		 *
		 * We use it to determine the image properties (width/height).
		 * Note:  We need to figure out how to determine image
		 * properties using ImageMagick and NetPBM
		 *
=======
				if (property_exists($this, $key))
				{
					if (in_array($key, array('wm_font_color', 'wm_shadow_color')))
					{
						if (preg_match('/^#?([0-9a-f]{3}|[0-9a-f]{6})$/i', $val, $matches))
						{
							/* $matches[1] contains our hex color value, but it might be
							 * both in the full 6-length format or the shortened 3-length
							 * value.
							 * We'll later need the full version, so we keep it if it's
							 * already there and if not - we'll convert to it. We can
							 * access string characters by their index as in an array,
							 * so we'll do that and use concatenation to form the final
							 * value:
							 */
							$val = (strlen($matches[1]) === 6)
								? '#'.$matches[1]
								: '#'.$matches[1][0].$matches[1][0].$matches[1][1].$matches[1][1].$matches[1][2].$matches[1][2];
						}
						else
						{
							continue;
						}
					}

					$this->$key = $val;
				}
			}
		}

		// Is there a source image? If not, there's no reason to continue
		if ($this->source_image === '')
		{
			$this->set_error('imglib_source_image_required');
			return FALSE;
		}

		/* Is getimagesize() available?
		 *
		 * We use it to determine the image properties (width/height).
		 * Note: We need to figure out how to determine image
		 * properties using ImageMagick and NetPBM
>>>>>>> codeigniter/develop
		 */
		if ( ! function_exists('getimagesize'))
		{
			$this->set_error('imglib_gd_required_for_props');
			return FALSE;
		}

		$this->image_library = strtolower($this->image_library);

<<<<<<< HEAD
		/*
		 * Set the full server path
=======
		/* Set the full server path
>>>>>>> codeigniter/develop
		 *
		 * The source image may or may not contain a path.
		 * Either way, we'll try use realpath to generate the
		 * full server path in order to more reliably read it.
<<<<<<< HEAD
		 *
		 */
		if (function_exists('realpath') AND @realpath($this->source_image) !== FALSE)
		{
			$full_source_path = str_replace("\\", "/", realpath($this->source_image));
=======
		 */
		if (function_exists('realpath') && @realpath($this->source_image) !== FALSE)
		{
			$full_source_path = str_replace('\\', '/', realpath($this->source_image));
>>>>>>> codeigniter/develop
		}
		else
		{
			$full_source_path = $this->source_image;
		}

		$x = explode('/', $full_source_path);
		$this->source_image = end($x);
		$this->source_folder = str_replace($this->source_image, '', $full_source_path);

		// Set the Image Properties
		if ( ! $this->get_image_properties($this->source_folder.$this->source_image))
		{
<<<<<<< HEAD
			return FALSE;	
=======
			return FALSE;
>>>>>>> codeigniter/develop
		}

		/*
		 * Assign the "new" image name/path
		 *
		 * If the user has set a "new_image" name it means
		 * we are making a copy of the source image. If not
<<<<<<< HEAD
		 * it means we are altering the original.  We'll
		 * set the destination filename and path accordingly.
		 *
		 */
		if ($this->new_image == '')
=======
		 * it means we are altering the original. We'll
		 * set the destination filename and path accordingly.
		 */
		if ($this->new_image === '')
>>>>>>> codeigniter/develop
		{
			$this->dest_image = $this->source_image;
			$this->dest_folder = $this->source_folder;
		}
<<<<<<< HEAD
		else
		{
			if (strpos($this->new_image, '/') === FALSE AND strpos($this->new_image, '\\') === FALSE)
			{
				$this->dest_folder = $this->source_folder;
				$this->dest_image = $this->new_image;
			}
			else
			{
				if (function_exists('realpath') AND @realpath($this->new_image) !== FALSE)
				{
					$full_dest_path = str_replace("\\", "/", realpath($this->new_image));
				}
				else
				{
					$full_dest_path = $this->new_image;
				}

				// Is there a file name?
				if ( ! preg_match("#\.(jpg|jpeg|gif|png)$#i", $full_dest_path))
				{
					$this->dest_folder = $full_dest_path.'/';
					$this->dest_image = $this->source_image;
				}
				else
				{
					$x = explode('/', $full_dest_path);
					$this->dest_image = end($x);
					$this->dest_folder = str_replace($this->dest_image, '', $full_dest_path);
				}
			}
		}

		/*
		 * Compile the finalized filenames/paths
=======
		elseif (strpos($this->new_image, '/') === FALSE)
		{
			$this->dest_folder = $this->source_folder;
			$this->dest_image = $this->new_image;
		}
		else
		{
			if (strpos($this->new_image, '/') === FALSE && strpos($this->new_image, '\\') === FALSE)
			{
				$full_dest_path = str_replace('\\', '/', realpath($this->new_image));
			}
			else
			{
				$full_dest_path = $this->new_image;
			}

			// Is there a file name?
			if ( ! preg_match('#\.(jpg|jpeg|gif|png)$#i', $full_dest_path))
			{
				$this->dest_folder = $full_dest_path.'/';
				$this->dest_image = $this->source_image;
			}
			else
			{
				$x = explode('/', $full_dest_path);
				$this->dest_image = end($x);
				$this->dest_folder = str_replace($this->dest_image, '', $full_dest_path);
			}
		}

		/* Compile the finalized filenames/paths
>>>>>>> codeigniter/develop
		 *
		 * We'll create two master strings containing the
		 * full server path to the source image and the
		 * full server path to the destination image.
		 * We'll also split the destination image name
		 * so we can insert the thumbnail marker if needed.
<<<<<<< HEAD
		 *
		 */
		if ($this->create_thumb === FALSE OR $this->thumb_marker == '')
=======
		 */
		if ($this->create_thumb === FALSE OR $this->thumb_marker === '')
>>>>>>> codeigniter/develop
		{
			$this->thumb_marker = '';
		}

<<<<<<< HEAD
		$xp	= $this->explode_name($this->dest_image);
=======
		$xp = $this->explode_name($this->dest_image);
>>>>>>> codeigniter/develop

		$filename = $xp['name'];
		$file_ext = $xp['ext'];

		$this->full_src_path = $this->source_folder.$this->source_image;
		$this->full_dst_path = $this->dest_folder.$filename.$this->thumb_marker.$file_ext;

<<<<<<< HEAD
		/*
		 * Should we maintain image proportions?
		 *
		 * When creating thumbs or copies, the target width/height
		 * might not be in correct proportion with the source
		 * image's width/height.  We'll recalculate it here.
		 *
		 */
		if ($this->maintain_ratio === TRUE && ($this->width != '' AND $this->height != ''))
=======
		/* Should we maintain image proportions?
		 *
		 * When creating thumbs or copies, the target width/height
		 * might not be in correct proportion with the source
		 * image's width/height. We'll recalculate it here.
		 */
		if ($this->maintain_ratio === TRUE && ($this->width !== 0 OR $this->height !== 0))
>>>>>>> codeigniter/develop
		{
			$this->image_reproportion();
		}

<<<<<<< HEAD
		/*
		 * Was a width and height specified?
		 *
		 * If the destination width/height was
		 * not submitted we will use the values
		 * from the actual file
		 *
		 */
		if ($this->width == '')
			$this->width = $this->orig_width;

		if ($this->height == '')
			$this->height = $this->orig_height;

		// Set the quality
		$this->quality = trim(str_replace("%", "", $this->quality));

		if ($this->quality == '' OR $this->quality == 0 OR ! is_numeric($this->quality))
			$this->quality = 90;

		// Set the x/y coordinates
		$this->x_axis = ($this->x_axis == '' OR ! is_numeric($this->x_axis)) ? 0 : $this->x_axis;
		$this->y_axis = ($this->y_axis == '' OR ! is_numeric($this->y_axis)) ? 0 : $this->y_axis;

		// Watermark-related Stuff...
		if ($this->wm_font_color != '')
		{
			if (strlen($this->wm_font_color) == 6)
			{
				$this->wm_font_color = '#'.$this->wm_font_color;
			}
		}

		if ($this->wm_shadow_color != '')
		{
			if (strlen($this->wm_shadow_color) == 6)
			{
				$this->wm_shadow_color = '#'.$this->wm_shadow_color;
			}
		}

		if ($this->wm_overlay_path != '')
		{
			$this->wm_overlay_path = str_replace("\\", "/", realpath($this->wm_overlay_path));
		}

		if ($this->wm_shadow_color != '')
		{
			$this->wm_use_drop_shadow = TRUE;
		}

		if ($this->wm_font_path != '')
=======
		/* Was a width and height specified?
		 *
		 * If the destination width/height was not submitted we
		 * will use the values from the actual file
		 */
		if ($this->width === '')
		{
			$this->width = $this->orig_width;
		}

		if ($this->height === '')
		{
			$this->height = $this->orig_height;
		}

		// Set the quality
		$this->quality = trim(str_replace('%', '', $this->quality));

		if ($this->quality === '' OR $this->quality === 0 OR ! preg_match('/^[0-9]+$/', $this->quality))
		{
			$this->quality = 90;
		}

		// Set the x/y coordinates
		is_numeric($this->x_axis) OR $this->x_axis = 0;
		is_numeric($this->y_axis) OR $this->y_axis = 0;

		// Watermark-related Stuff...
		if ($this->wm_overlay_path !== '')
		{
			$this->wm_overlay_path = str_replace('\\', '/', realpath($this->wm_overlay_path));
		}

		if ($this->wm_shadow_color !== '')
		{
			$this->wm_use_drop_shadow = TRUE;
		}
		elseif ($this->wm_use_drop_shadow === TRUE && $this->wm_shadow_color === '')
		{
			$this->wm_use_drop_shadow = FALSE;
		}

		if ($this->wm_font_path !== '')
>>>>>>> codeigniter/develop
		{
			$this->wm_use_truetype = TRUE;
		}

		return TRUE;
	}

	// --------------------------------------------------------------------

	/**
	 * Image Resize
	 *
	 * This is a wrapper function that chooses the proper
	 * resize function based on the protocol specified
	 *
<<<<<<< HEAD
	 * @access	public
	 * @return	bool
	 */
	function resize()
	{
		$protocol = 'image_process_'.$this->image_library;

		if (preg_match('/gd2$/i', $protocol))
		{
			$protocol = 'image_process_gd';
		}

=======
	 * @return	bool
	 */
	public function resize()
	{
		$protocol = ($this->image_library === 'gd2') ? 'image_process_gd' : 'image_process_'.$this->image_library;
>>>>>>> codeigniter/develop
		return $this->$protocol('resize');
	}

	// --------------------------------------------------------------------

	/**
	 * Image Crop
	 *
	 * This is a wrapper function that chooses the proper
	 * cropping function based on the protocol specified
	 *
<<<<<<< HEAD
	 * @access	public
	 * @return	bool
	 */
	function crop()
	{
		$protocol = 'image_process_'.$this->image_library;

		if (preg_match('/gd2$/i', $protocol))
		{
			$protocol = 'image_process_gd';
		}

=======
	 * @return	bool
	 */
	public function crop()
	{
		$protocol = ($this->image_library === 'gd2') ? 'image_process_gd' : 'image_process_'.$this->image_library;
>>>>>>> codeigniter/develop
		return $this->$protocol('crop');
	}

	// --------------------------------------------------------------------

	/**
	 * Image Rotate
	 *
	 * This is a wrapper function that chooses the proper
	 * rotation function based on the protocol specified
	 *
<<<<<<< HEAD
	 * @access	public
	 * @return	bool
	 */
	function rotate()
=======
	 * @return	bool
	 */
	public function rotate()
>>>>>>> codeigniter/develop
	{
		// Allowed rotation values
		$degs = array(90, 180, 270, 'vrt', 'hor');

<<<<<<< HEAD
		if ($this->rotation_angle == '' OR ! in_array($this->rotation_angle, $degs))
		{
			$this->set_error('imglib_rotation_angle_required');
			return FALSE;	
		}

		// Reassign the width and height
		if ($this->rotation_angle == 90 OR $this->rotation_angle == 270)
=======
		if ($this->rotation_angle === '' OR ! in_array($this->rotation_angle, $degs))
		{
			$this->set_error('imglib_rotation_angle_required');
			return FALSE;
		}

		// Reassign the width and height
		if ($this->rotation_angle === 90 OR $this->rotation_angle === 270)
>>>>>>> codeigniter/develop
		{
			$this->width	= $this->orig_height;
			$this->height	= $this->orig_width;
		}
		else
		{
			$this->width	= $this->orig_width;
			$this->height	= $this->orig_height;
		}

<<<<<<< HEAD

		// Choose resizing function
		if ($this->image_library == 'imagemagick' OR $this->image_library == 'netpbm')
		{
			$protocol = 'image_process_'.$this->image_library;

			return $this->$protocol('rotate');
		}

		if ($this->rotation_angle == 'hor' OR $this->rotation_angle == 'vrt')
		{
			return $this->image_mirror_gd();
		}
		else
		{
			return $this->image_rotate_gd();
		}
=======
		// Choose resizing function
		if ($this->image_library === 'imagemagick' OR $this->image_library === 'netpbm')
		{
			$protocol = 'image_process_'.$this->image_library;
			return $this->$protocol('rotate');
		}

		return ($this->rotation_angle === 'hor' OR $this->rotation_angle === 'vrt')
			? $this->image_mirror_gd()
			: $this->image_rotate_gd();
>>>>>>> codeigniter/develop
	}

	// --------------------------------------------------------------------

	/**
	 * Image Process Using GD/GD2
	 *
	 * This function will resize or crop
	 *
<<<<<<< HEAD
	 * @access	public
	 * @param	string
	 * @return	bool
	 */
	function image_process_gd($action = 'resize')
=======
	 * @param	string
	 * @return	bool
	 */
	public function image_process_gd($action = 'resize')
>>>>>>> codeigniter/develop
	{
		$v2_override = FALSE;

		// If the target width/height match the source, AND if the new file name is not equal to the old file name
		// we'll simply make a copy of the original with the new name... assuming dynamic rendering is off.
<<<<<<< HEAD
		if ($this->dynamic_output === FALSE)
		{
			if ($this->orig_width == $this->width AND $this->orig_height == $this->height)
			{
				if ($this->source_image != $this->new_image)
				{
					if (@copy($this->full_src_path, $this->full_dst_path))
					{
						@chmod($this->full_dst_path, FILE_WRITE_MODE);
					}
				}

				return TRUE;
			}
		}

		// Let's set up our values based on the action
		if ($action == 'crop')
		{
			//  Reassign the source width/height if cropping
=======
		if ($this->dynamic_output === FALSE && $this->orig_width === $this->width && $this->orig_height === $this->height)
		{
			if ($this->source_image !== $this->new_image && @copy($this->full_src_path, $this->full_dst_path))
			{
				@chmod($this->full_dst_path, FILE_WRITE_MODE);
			}

			return TRUE;
		}

		// Let's set up our values based on the action
		if ($action === 'crop')
		{
			// Reassign the source width/height if cropping
>>>>>>> codeigniter/develop
			$this->orig_width  = $this->width;
			$this->orig_height = $this->height;

			// GD 2.0 has a cropping bug so we'll test for it
			if ($this->gd_version() !== FALSE)
			{
				$gd_version = str_replace('0', '', $this->gd_version());
<<<<<<< HEAD
				$v2_override = ($gd_version == 2) ? TRUE : FALSE;
=======
				$v2_override = ($gd_version === 2);
>>>>>>> codeigniter/develop
			}
		}
		else
		{
			// If resizing the x/y axis must be zero
			$this->x_axis = 0;
			$this->y_axis = 0;
		}

		//  Create the image handle
		if ( ! ($src_img = $this->image_create_gd()))
		{
			return FALSE;
		}

<<<<<<< HEAD
		//  Create The Image
		//
		//  old conditional which users report cause problems with shared GD libs who report themselves as "2.0 or greater"
		//  it appears that this is no longer the issue that it was in 2004, so we've removed it, retaining it in the comment
		//  below should that ever prove inaccurate.
		//
		//  if ($this->image_library == 'gd2' AND function_exists('imagecreatetruecolor') AND $v2_override == FALSE)
		if ($this->image_library == 'gd2' AND function_exists('imagecreatetruecolor'))
=======
		/* Create the image
		 *
		 * Old conditional which users report cause problems with shared GD libs who report themselves as "2.0 or greater"
		 * it appears that this is no longer the issue that it was in 2004, so we've removed it, retaining it in the comment
		 * below should that ever prove inaccurate.
		 *
		 * if ($this->image_library === 'gd2' && function_exists('imagecreatetruecolor') && $v2_override === FALSE)
		 */
		if ($this->image_library === 'gd2' && function_exists('imagecreatetruecolor'))
>>>>>>> codeigniter/develop
		{
			$create	= 'imagecreatetruecolor';
			$copy	= 'imagecopyresampled';
		}
		else
		{
			$create	= 'imagecreate';
			$copy	= 'imagecopyresized';
		}

		$dst_img = $create($this->width, $this->height);

<<<<<<< HEAD
		if ($this->image_type == 3) // png we can actually preserve transparency
=======
		if ($this->image_type === 3) // png we can actually preserve transparency
>>>>>>> codeigniter/develop
		{
			imagealphablending($dst_img, FALSE);
			imagesavealpha($dst_img, TRUE);
		}

		$copy($dst_img, $src_img, 0, 0, $this->x_axis, $this->y_axis, $this->width, $this->height, $this->orig_width, $this->orig_height);

<<<<<<< HEAD
		//  Show the image
		if ($this->dynamic_output == TRUE)
		{
			$this->image_display_gd($dst_img);
		}
		else
		{
			// Or save it
			if ( ! $this->image_save_gd($dst_img))
			{
				return FALSE;
			}
		}

		//  Kill the file handles
=======
		// Show the image
		if ($this->dynamic_output === TRUE)
		{
			$this->image_display_gd($dst_img);
		}
		elseif ( ! $this->image_save_gd($dst_img)) // Or save it
		{
			return FALSE;
		}

		// Kill the file handles
>>>>>>> codeigniter/develop
		imagedestroy($dst_img);
		imagedestroy($src_img);

		// Set the file to 777
		@chmod($this->full_dst_path, FILE_WRITE_MODE);

		return TRUE;
	}

	// --------------------------------------------------------------------

	/**
	 * Image Process Using ImageMagick
	 *
	 * This function will resize, crop or rotate
	 *
<<<<<<< HEAD
	 * @access	public
	 * @param	string
	 * @return	bool
	 */
	function image_process_imagemagick($action = 'resize')
	{
		//  Do we have a vaild library path?
		if ($this->library_path == '')
=======
	 * @param	string
	 * @return	bool
	 */
	public function image_process_imagemagick($action = 'resize')
	{
		//  Do we have a vaild library path?
		if ($this->library_path === '')
>>>>>>> codeigniter/develop
		{
			$this->set_error('imglib_libpath_invalid');
			return FALSE;
		}

<<<<<<< HEAD
		if ( ! preg_match("/convert$/i", $this->library_path))
		{
			$this->library_path = rtrim($this->library_path, '/').'/';

			$this->library_path .= 'convert';
		}

		// Execute the command
		$cmd = $this->library_path." -quality ".$this->quality;

		if ($action == 'crop')
		{
			$cmd .= " -crop ".$this->width."x".$this->height."+".$this->x_axis."+".$this->y_axis." \"$this->full_src_path\" \"$this->full_dst_path\" 2>&1";
		}
		elseif ($action == 'rotate')
		{
			switch ($this->rotation_angle)
			{
				case 'hor'	: $angle = '-flop';
					break;
				case 'vrt'	: $angle = '-flip';
					break;
				default		: $angle = '-rotate '.$this->rotation_angle;
					break;
			}

			$cmd .= " ".$angle." \"$this->full_src_path\" \"$this->full_dst_path\" 2>&1";
		}
		else  // Resize
		{
			$cmd .= " -resize ".$this->width."x".$this->height." \"$this->full_src_path\" \"$this->full_dst_path\" 2>&1";
		}

		$retval = 1;

		@exec($cmd, $output, $retval);

		//	Did it work?
=======
		if ( ! preg_match('/convert$/i', $this->library_path))
		{
			$this->library_path = rtrim($this->library_path, '/').'/convert';
		}

		// Execute the command
		$cmd = $this->library_path.' -quality '.$this->quality;

		if ($action === 'crop')
		{
			$cmd .= ' -crop '.$this->width.'x'.$this->height.'+'.$this->x_axis.'+'.$this->y_axis.' "'.$this->full_src_path.'" "'.$this->full_dst_path .'" 2>&1';
		}
		elseif ($action === 'rotate')
		{
			$angle = ($this->rotation_angle === 'hor' OR $this->rotation_angle === 'vrt')
					? '-flop' : '-rotate '.$this->rotation_angle;

			$cmd .= ' '.$angle.' "'.$this->full_src_path.'" "'.$this->full_dst_path.'" 2>&1';
		}
		else // Resize
		{
			if($this->maintain_ratio === TRUE)
			{
				$cmd .= ' -resize '.$this->width.'x'.$this->height.' "'.$this->full_src_path.'" "'.$this->full_dst_path.'" 2>&1';
			}
			else
			{
				$cmd .= ' -resize '.$this->width.'x'.$this->height.'\! "'.$this->full_src_path.'" "'.$this->full_dst_path.'" 2>&1';
			}
		}

		$retval = 1;
		@exec($cmd, $output, $retval);

		// Did it work?
>>>>>>> codeigniter/develop
		if ($retval > 0)
		{
			$this->set_error('imglib_image_process_failed');
			return FALSE;
		}

		// Set the file to 777
		@chmod($this->full_dst_path, FILE_WRITE_MODE);

		return TRUE;
	}

	// --------------------------------------------------------------------

	/**
	 * Image Process Using NetPBM
	 *
	 * This function will resize, crop or rotate
	 *
<<<<<<< HEAD
	 * @access	public
	 * @param	string
	 * @return	bool
	 */
	function image_process_netpbm($action = 'resize')
	{
		if ($this->library_path == '')
=======
	 * @param	string
	 * @return	bool
	 */
	public function image_process_netpbm($action = 'resize')
	{
		if ($this->library_path === '')
>>>>>>> codeigniter/develop
		{
			$this->set_error('imglib_libpath_invalid');
			return FALSE;
		}

<<<<<<< HEAD
		//  Build the resizing command
		switch ($this->image_type)
		{
			case 1 :
						$cmd_in		= 'giftopnm';
						$cmd_out	= 'ppmtogif';
				break;
			case 2 :
						$cmd_in		= 'jpegtopnm';
						$cmd_out	= 'ppmtojpeg';
				break;
			case 3 :
						$cmd_in		= 'pngtopnm';
						$cmd_out	= 'ppmtopng';
				break;
		}

		if ($action == 'crop')
		{
			$cmd_inner = 'pnmcut -left '.$this->x_axis.' -top '.$this->y_axis.' -width '.$this->width.' -height '.$this->height;
		}
		elseif ($action == 'rotate')
		{
			switch ($this->rotation_angle)
			{
				case 90		:	$angle = 'r270';
					break;
				case 180	:	$angle = 'r180';
					break;
				case 270	:	$angle = 'r90';
					break;
				case 'vrt'	:	$angle = 'tb';
					break;
				case 'hor'	:	$angle = 'lr';
=======
		// Build the resizing command
		switch ($this->image_type)
		{
			case 1 :
				$cmd_in		= 'giftopnm';
				$cmd_out	= 'ppmtogif';
				break;
			case 2 :
				$cmd_in		= 'jpegtopnm';
				$cmd_out	= 'ppmtojpeg';
				break;
			case 3 :
				$cmd_in		= 'pngtopnm';
				$cmd_out	= 'ppmtopng';
				break;
		}

		if ($action === 'crop')
		{
			$cmd_inner = 'pnmcut -left '.$this->x_axis.' -top '.$this->y_axis.' -width '.$this->width.' -height '.$this->height;
		}
		elseif ($action === 'rotate')
		{
			switch ($this->rotation_angle)
			{
				case 90:	$angle = 'r270';
					break;
				case 180:	$angle = 'r180';
					break;
				case 270:	$angle = 'r90';
					break;
				case 'vrt':	$angle = 'tb';
					break;
				case 'hor':	$angle = 'lr';
>>>>>>> codeigniter/develop
					break;
			}

			$cmd_inner = 'pnmflip -'.$angle.' ';
		}
		else // Resize
		{
			$cmd_inner = 'pnmscale -xysize '.$this->width.' '.$this->height;
		}

		$cmd = $this->library_path.$cmd_in.' '.$this->full_src_path.' | '.$cmd_inner.' | '.$cmd_out.' > '.$this->dest_folder.'netpbm.tmp';

		$retval = 1;
<<<<<<< HEAD

		@exec($cmd, $output, $retval);

		//  Did it work?
=======
		@exec($cmd, $output, $retval);

		// Did it work?
>>>>>>> codeigniter/develop
		if ($retval > 0)
		{
			$this->set_error('imglib_image_process_failed');
			return FALSE;
		}

		// With NetPBM we have to create a temporary image.
		// If you try manipulating the original it fails so
		// we have to rename the temp file.
		copy ($this->dest_folder.'netpbm.tmp', $this->full_dst_path);
<<<<<<< HEAD
		unlink ($this->dest_folder.'netpbm.tmp');
=======
		unlink($this->dest_folder.'netpbm.tmp');
>>>>>>> codeigniter/develop
		@chmod($this->full_dst_path, FILE_WRITE_MODE);

		return TRUE;
	}

	// --------------------------------------------------------------------

	/**
	 * Image Rotate Using GD
	 *
<<<<<<< HEAD
	 * @access	public
	 * @return	bool
	 */
	function image_rotate_gd()
	{
		//  Create the image handle
=======
	 * @return	bool
	 */
	public function image_rotate_gd()
	{
		// Create the image handle
>>>>>>> codeigniter/develop
		if ( ! ($src_img = $this->image_create_gd()))
		{
			return FALSE;
		}

		// Set the background color
		// This won't work with transparent PNG files so we are
		// going to have to figure out how to determine the color
		// of the alpha channel in a future release.

		$white	= imagecolorallocate($src_img, 255, 255, 255);

<<<<<<< HEAD
		//  Rotate it!
		$dst_img = imagerotate($src_img, $this->rotation_angle, $white);

		//  Save the Image
		if ($this->dynamic_output == TRUE)
		{
			$this->image_display_gd($dst_img);
		}
		else
		{
			// Or save it
			if ( ! $this->image_save_gd($dst_img))
			{
				return FALSE;
			}
		}

		//  Kill the file handles
=======
		// Rotate it!
		$dst_img = imagerotate($src_img, $this->rotation_angle, $white);

		// Show the image
		if ($this->dynamic_output === TRUE)
		{
			$this->image_display_gd($dst_img);
		}
		elseif ( ! $this->image_save_gd($dst_img)) // ... or save it
		{
			return FALSE;
		}

		// Kill the file handles
>>>>>>> codeigniter/develop
		imagedestroy($dst_img);
		imagedestroy($src_img);

		// Set the file to 777
<<<<<<< HEAD

=======
>>>>>>> codeigniter/develop
		@chmod($this->full_dst_path, FILE_WRITE_MODE);

		return TRUE;
	}

	// --------------------------------------------------------------------

	/**
	 * Create Mirror Image using GD
	 *
	 * This function will flip horizontal or vertical
	 *
<<<<<<< HEAD
	 * @access	public
	 * @return	bool
	 */
	function image_mirror_gd()
=======
	 * @return	bool
	 */
	public function image_mirror_gd()
>>>>>>> codeigniter/develop
	{
		if ( ! $src_img = $this->image_create_gd())
		{
			return FALSE;
		}

		$width  = $this->orig_width;
		$height = $this->orig_height;

<<<<<<< HEAD
		if ($this->rotation_angle == 'hor')
		{
			for ($i = 0; $i < $height; $i++)
			{
				$left  = 0;
				$right = $width-1;

=======
		if ($this->rotation_angle === 'hor')
		{
			for ($i = 0; $i < $height; $i++, $left = 0, $right = $width-1)
			{
>>>>>>> codeigniter/develop
				while ($left < $right)
				{
					$cl = imagecolorat($src_img, $left, $i);
					$cr = imagecolorat($src_img, $right, $i);

					imagesetpixel($src_img, $left, $i, $cr);
					imagesetpixel($src_img, $right, $i, $cl);

					$left++;
					$right--;
				}
			}
		}
		else
		{
<<<<<<< HEAD
			for ($i = 0; $i < $width; $i++)
			{
				$top = 0;
				$bot = $height-1;

=======
			for ($i = 0; $i < $width; $i++, $top = 0, $bot = $height-1)
			{
>>>>>>> codeigniter/develop
				while ($top < $bot)
				{
					$ct = imagecolorat($src_img, $i, $top);
					$cb = imagecolorat($src_img, $i, $bot);

					imagesetpixel($src_img, $i, $top, $cb);
					imagesetpixel($src_img, $i, $bot, $ct);

					$top++;
					$bot--;
				}
			}
		}

<<<<<<< HEAD
		//  Show the image
		if ($this->dynamic_output == TRUE)
		{
			$this->image_display_gd($src_img);
		}
		else
		{
			// Or save it
			if ( ! $this->image_save_gd($src_img))
			{
				return FALSE;
			}
		}

		//  Kill the file handles
=======
		// Show the image
		if ($this->dynamic_output === TRUE)
		{
			$this->image_display_gd($src_img);
		}
		elseif ( ! $this->image_save_gd($src_img)) // ... or save it
		{
			return FALSE;
		}

		// Kill the file handles
>>>>>>> codeigniter/develop
		imagedestroy($src_img);

		// Set the file to 777
		@chmod($this->full_dst_path, FILE_WRITE_MODE);

		return TRUE;
	}

	// --------------------------------------------------------------------

	/**
	 * Image Watermark
	 *
	 * This is a wrapper function that chooses the type
	 * of watermarking based on the specified preference.
	 *
<<<<<<< HEAD
	 * @access	public
	 * @param	string
	 * @return	bool
	 */
	function watermark()
	{
		if ($this->wm_type == 'overlay')
		{
			return $this->overlay_watermark();
		}
		else
		{
			return $this->text_watermark();
		}
=======
	 * @return	bool
	 */
	public function watermark()
	{
		return ($this->wm_type === 'overlay') ? $this->overlay_watermark() : $this->text_watermark();
>>>>>>> codeigniter/develop
	}

	// --------------------------------------------------------------------

	/**
	 * Watermark - Graphic Version
	 *
<<<<<<< HEAD
	 * @access	public
	 * @return	bool
	 */
	function overlay_watermark()
=======
	 * @return	bool
	 */
	public function overlay_watermark()
>>>>>>> codeigniter/develop
	{
		if ( ! function_exists('imagecolortransparent'))
		{
			$this->set_error('imglib_gd_required');
			return FALSE;
		}

<<<<<<< HEAD
		//  Fetch source image properties
		$this->get_image_properties();

		//  Fetch watermark image properties
		$props			= $this->get_image_properties($this->wm_overlay_path, TRUE);
		$wm_img_type	= $props['image_type'];
		$wm_width		= $props['width'];
		$wm_height		= $props['height'];

		//  Create two image resources
=======
		// Fetch source image properties
		$this->get_image_properties();

		// Fetch watermark image properties
		$props		= $this->get_image_properties($this->wm_overlay_path, TRUE);
		$wm_img_type	= $props['image_type'];
		$wm_width	= $props['width'];
		$wm_height	= $props['height'];

		// Create two image resources
>>>>>>> codeigniter/develop
		$wm_img  = $this->image_create_gd($this->wm_overlay_path, $wm_img_type);
		$src_img = $this->image_create_gd($this->full_src_path);

		// Reverse the offset if necessary
		// When the image is positioned at the bottom
		// we don't want the vertical offset to push it
<<<<<<< HEAD
		// further down.  We want the reverse, so we'll
		// invert the offset.  Same with the horizontal
		// offset when the image is at the right

		$this->wm_vrt_alignment = strtoupper(substr($this->wm_vrt_alignment, 0, 1));
		$this->wm_hor_alignment = strtoupper(substr($this->wm_hor_alignment, 0, 1));

		if ($this->wm_vrt_alignment == 'B')
			$this->wm_vrt_offset = $this->wm_vrt_offset * -1;

		if ($this->wm_hor_alignment == 'R')
			$this->wm_hor_offset = $this->wm_hor_offset * -1;

		//  Set the base x and y axis values
		$x_axis = $this->wm_hor_offset + $this->wm_padding;
		$y_axis = $this->wm_vrt_offset + $this->wm_padding;

		//  Set the vertical position
		switch ($this->wm_vrt_alignment)
		{
			case 'T':
				break;
			case 'M':	$y_axis += ($this->orig_height / 2) - ($wm_height / 2);
				break;
			case 'B':	$y_axis += $this->orig_height - $wm_height;
				break;
		}

		//  Set the horizontal position
		switch ($this->wm_hor_alignment)
		{
			case 'L':
				break;
			case 'C':	$x_axis += ($this->orig_width / 2) - ($wm_width / 2);
				break;
			case 'R':	$x_axis += $this->orig_width - $wm_width;
				break;
		}

		//  Build the finalized image
		if ($wm_img_type == 3 AND function_exists('imagealphablending'))
=======
		// further down. We want the reverse, so we'll
		// invert the offset. Same with the horizontal
		// offset when the image is at the right

		$this->wm_vrt_alignment = strtoupper($this->wm_vrt_alignment[0]);
		$this->wm_hor_alignment = strtoupper($this->wm_hor_alignment[0]);

		if ($this->wm_vrt_alignment === 'B')
			$this->wm_vrt_offset = $this->wm_vrt_offset * -1;

		if ($this->wm_hor_alignment === 'R')
			$this->wm_hor_offset = $this->wm_hor_offset * -1;

		// Set the base x and y axis values
		$x_axis = $this->wm_hor_offset + $this->wm_padding;
		$y_axis = $this->wm_vrt_offset + $this->wm_padding;

		// Set the vertical position
		if ($this->wm_vrt_alignment === 'M')
		{
			$y_axis += ($this->orig_height / 2) - ($wm_height / 2);
		}
		elseif ($this->wm_vrt_alignment === 'B')
		{
			$y_axis += $this->orig_height - $wm_height;
		}

		// Set the horizontal position
		if ($this->wm_hor_alignment === 'C')
		{
			$x_axis += ($this->orig_width / 2) - ($wm_width / 2);
		}
		elseif ($this->wm_hor_alignment === 'R')
		{
			$x_axis += $this->orig_width - $wm_width;
		}

		//  Build the finalized image
		if ($wm_img_type === 3 && function_exists('imagealphablending'))
>>>>>>> codeigniter/develop
		{
			@imagealphablending($src_img, TRUE);
		}

		// Set RGB values for text and shadow
		$rgba = imagecolorat($wm_img, $this->wm_x_transp, $this->wm_y_transp);
		$alpha = ($rgba & 0x7F000000) >> 24;

		// make a best guess as to whether we're dealing with an image with alpha transparency or no/binary transparency
		if ($alpha > 0)
		{
			// copy the image directly, the image's alpha transparency being the sole determinant of blending
			imagecopy($src_img, $wm_img, $x_axis, $y_axis, 0, 0, $wm_width, $wm_height);
		}
		else
		{
			// set our RGB value from above to be transparent and merge the images with the specified opacity
			imagecolortransparent($wm_img, imagecolorat($wm_img, $this->wm_x_transp, $this->wm_y_transp));
			imagecopymerge($src_img, $wm_img, $x_axis, $y_axis, 0, 0, $wm_width, $wm_height, $this->wm_opacity);
		}

<<<<<<< HEAD
		//  Output the image
		if ($this->dynamic_output == TRUE)
		{
			$this->image_display_gd($src_img);
		}
		else
		{
			if ( ! $this->image_save_gd($src_img))
			{
				return FALSE;
			}
=======
		// Output the image
		if ($this->dynamic_output === TRUE)
		{
			$this->image_display_gd($src_img);
		}
		elseif ( ! $this->image_save_gd($src_img)) // ... or save it
		{
			return FALSE;
>>>>>>> codeigniter/develop
		}

		imagedestroy($src_img);
		imagedestroy($wm_img);

		return TRUE;
	}

	// --------------------------------------------------------------------

	/**
	 * Watermark - Text Version
	 *
<<<<<<< HEAD
	 * @access	public
	 * @return	bool
	 */
	function text_watermark()
=======
	 * @return	bool
	 */
	public function text_watermark()
>>>>>>> codeigniter/develop
	{
		if ( ! ($src_img = $this->image_create_gd()))
		{
			return FALSE;
		}

<<<<<<< HEAD
		if ($this->wm_use_truetype == TRUE AND ! file_exists($this->wm_font_path))
=======
		if ($this->wm_use_truetype === TRUE && ! file_exists($this->wm_font_path))
>>>>>>> codeigniter/develop
		{
			$this->set_error('imglib_missing_font');
			return FALSE;
		}

<<<<<<< HEAD
		//  Fetch source image properties
		$this->get_image_properties();

		// Set RGB values for text and shadow
		$this->wm_font_color	= str_replace('#', '', $this->wm_font_color);
		$this->wm_shadow_color	= str_replace('#', '', $this->wm_shadow_color);

		$R1 = hexdec(substr($this->wm_font_color, 0, 2));
		$G1 = hexdec(substr($this->wm_font_color, 2, 2));
		$B1 = hexdec(substr($this->wm_font_color, 4, 2));

		$R2 = hexdec(substr($this->wm_shadow_color, 0, 2));
		$G2 = hexdec(substr($this->wm_shadow_color, 2, 2));
		$B2 = hexdec(substr($this->wm_shadow_color, 4, 2));

		$txt_color	= imagecolorclosest($src_img, $R1, $G1, $B1);
		$drp_color	= imagecolorclosest($src_img, $R2, $G2, $B2);

		// Reverse the vertical offset
		// When the image is positioned at the bottom
		// we don't want the vertical offset to push it
		// further down.  We want the reverse, so we'll
		// invert the offset.  Note: The horizontal
		// offset flips itself automatically

		if ($this->wm_vrt_alignment == 'B')
			$this->wm_vrt_offset = $this->wm_vrt_offset * -1;

		if ($this->wm_hor_alignment == 'R')
=======
		// Fetch source image properties
		$this->get_image_properties();

		// Reverse the vertical offset
		// When the image is positioned at the bottom
		// we don't want the vertical offset to push it
		// further down. We want the reverse, so we'll
		// invert the offset. Note: The horizontal
		// offset flips itself automatically

		if ($this->wm_vrt_alignment === 'B')
			$this->wm_vrt_offset = $this->wm_vrt_offset * -1;

		if ($this->wm_hor_alignment === 'R')
>>>>>>> codeigniter/develop
			$this->wm_hor_offset = $this->wm_hor_offset * -1;

		// Set font width and height
		// These are calculated differently depending on
		// whether we are using the true type font or not
<<<<<<< HEAD
		if ($this->wm_use_truetype == TRUE)
		{
			if ($this->wm_font_size == '')
				$this->wm_font_size = '17';
=======
		if ($this->wm_use_truetype === TRUE)
		{
			if ($this->wm_font_size === '')
			{
				$this->wm_font_size = 17;
			}
>>>>>>> codeigniter/develop

			$fontwidth  = $this->wm_font_size-($this->wm_font_size/4);
			$fontheight = $this->wm_font_size;
			$this->wm_vrt_offset += $this->wm_font_size;
		}
		else
		{
			$fontwidth  = imagefontwidth($this->wm_font_size);
			$fontheight = imagefontheight($this->wm_font_size);
		}

		// Set base X and Y axis values
		$x_axis = $this->wm_hor_offset + $this->wm_padding;
		$y_axis = $this->wm_vrt_offset + $this->wm_padding;

<<<<<<< HEAD
		// Set verticle alignment
		if ($this->wm_use_drop_shadow == FALSE)
=======
		if ($this->wm_use_drop_shadow === FALSE)
>>>>>>> codeigniter/develop
			$this->wm_shadow_distance = 0;

		$this->wm_vrt_alignment = strtoupper(substr($this->wm_vrt_alignment, 0, 1));
		$this->wm_hor_alignment = strtoupper(substr($this->wm_hor_alignment, 0, 1));

<<<<<<< HEAD
		switch ($this->wm_vrt_alignment)
		{
			case	 "T" :
				break;
			case "M":	$y_axis += ($this->orig_height/2)+($fontheight/2);
				break;
			case "B":	$y_axis += ($this->orig_height - $fontheight - $this->wm_shadow_distance - ($fontheight/2));
				break;
=======
		// Set verticle alignment
		if ($this->wm_vrt_alignment === 'M')
		{
			$y_axis += ($this->orig_height / 2) + ($fontheight / 2);
		}
		elseif ($this->wm_vrt_alignment === 'B')
		{
			$y_axis += $this->orig_height - $fontheight - $this->wm_shadow_distance - ($fontheight / 2);
>>>>>>> codeigniter/develop
		}

		$x_shad = $x_axis + $this->wm_shadow_distance;
		$y_shad = $y_axis + $this->wm_shadow_distance;

<<<<<<< HEAD
		// Set horizontal alignment
		switch ($this->wm_hor_alignment)
		{
			case "L":
				break;
			case "R":
						if ($this->wm_use_drop_shadow)
							$x_shad += ($this->orig_width - $fontwidth*strlen($this->wm_text));
							$x_axis += ($this->orig_width - $fontwidth*strlen($this->wm_text));
				break;
			case "C":
						if ($this->wm_use_drop_shadow)
							$x_shad += floor(($this->orig_width - $fontwidth*strlen($this->wm_text))/2);
							$x_axis += floor(($this->orig_width  -$fontwidth*strlen($this->wm_text))/2);
				break;
		}

		//  Add the text to the source image
		if ($this->wm_use_truetype)
		{
			if ($this->wm_use_drop_shadow)
				imagettftext($src_img, $this->wm_font_size, 0, $x_shad, $y_shad, $drp_color, $this->wm_font_path, $this->wm_text);
				imagettftext($src_img, $this->wm_font_size, 0, $x_axis, $y_axis, $txt_color, $this->wm_font_path, $this->wm_text);
		}
		else
		{
			if ($this->wm_use_drop_shadow)
				imagestring($src_img, $this->wm_font_size, $x_shad, $y_shad, $this->wm_text, $drp_color);
				imagestring($src_img, $this->wm_font_size, $x_axis, $y_axis, $this->wm_text, $txt_color);
		}

		//  Output the final image
		if ($this->dynamic_output == TRUE)
=======
		if ($this->wm_use_drop_shadow)
		{
			// Set horizontal alignment
			if ($this->wm_hor_alignment === 'R')
			{
				$x_shad += $this->orig_width - ($fontwidth * strlen($this->wm_text));
				$x_axis += $this->orig_width - ($fontwidth * strlen($this->wm_text));
			}
			elseif ($this->wm_hor_alignment === 'C')
			{
				$x_shad += floor(($this->orig_width - ($fontwidth * strlen($this->wm_text))) / 2);
				$x_axis += floor(($this->orig_width - ($fontwidth * strlen($this->wm_text))) / 2);
			}

			/* Set RGB values for text and shadow
			 *
			 * First character is #, so we don't really need it.
			 * Get the rest of the string and split it into 2-length
			 * hex values:
			 */
			$txt_color = str_split(substr($this->wm_font_color, 1, 6), 2);
			$txt_color = imagecolorclosest($src_img, hexdec($txt_color[0]), hexdec($txt_color[1]), hexdec($txt_color[2]));
			$drp_color = str_split(substr($this->wm_shadow_color, 1, 6), 2);
			$drp_color = imagecolorclosest($src_img, hexdec($drp_color[0]), hexdec($drp_color[1]), hexdec($drp_color[2]));

			// Add the text to the source image
			if ($this->wm_use_truetype)
			{
				imagettftext($src_img, $this->wm_font_size, 0, $x_shad, $y_shad, $drp_color, $this->wm_font_path, $this->wm_text);
				imagettftext($src_img, $this->wm_font_size, 0, $x_axis, $y_axis, $txt_color, $this->wm_font_path, $this->wm_text);
			}
			else
			{
				imagestring($src_img, $this->wm_font_size, $x_shad, $y_shad, $this->wm_text, $drp_color);
				imagestring($src_img, $this->wm_font_size, $x_axis, $y_axis, $this->wm_text, $txt_color);
			}

			// We can preserve transparency for PNG images
			if ($this->image_type === 3)
			{
				imagealphablending($src_img, FALSE);
				imagesavealpha($src_img, TRUE);
			}
		}

		// Output the final image
		if ($this->dynamic_output === TRUE)
>>>>>>> codeigniter/develop
		{
			$this->image_display_gd($src_img);
		}
		else
		{
			$this->image_save_gd($src_img);
		}

		imagedestroy($src_img);

		return TRUE;
	}

	// --------------------------------------------------------------------

	/**
	 * Create Image - GD
	 *
	 * This simply creates an image resource handle
	 * based on the type of image being processed
	 *
<<<<<<< HEAD
	 * @access	public
	 * @param	string
	 * @return	resource
	 */
	function image_create_gd($path = '', $image_type = '')
	{
		if ($path == '')
			$path = $this->full_src_path;

		if ($image_type == '')
=======
	 * @param	string
	 * @param	string
	 * @return	resource
	 */
	public function image_create_gd($path = '', $image_type = '')
	{
		if ($path === '')
			$path = $this->full_src_path;

		if ($image_type === '')
>>>>>>> codeigniter/develop
			$image_type = $this->image_type;


		switch ($image_type)
		{
			case	 1 :
						if ( ! function_exists('imagecreatefromgif'))
						{
							$this->set_error(array('imglib_unsupported_imagecreate', 'imglib_gif_not_supported'));
							return FALSE;
						}

						return imagecreatefromgif($path);
				break;
			case 2 :
						if ( ! function_exists('imagecreatefromjpeg'))
						{
							$this->set_error(array('imglib_unsupported_imagecreate', 'imglib_jpg_not_supported'));
							return FALSE;
						}

						return imagecreatefromjpeg($path);
				break;
			case 3 :
						if ( ! function_exists('imagecreatefrompng'))
						{
							$this->set_error(array('imglib_unsupported_imagecreate', 'imglib_png_not_supported'));
							return FALSE;
						}

						return imagecreatefrompng($path);
				break;

		}

		$this->set_error(array('imglib_unsupported_imagecreate'));
		return FALSE;
	}

	// --------------------------------------------------------------------

	/**
	 * Write image file to disk - GD
	 *
	 * Takes an image resource as input and writes the file
	 * to the specified destination
	 *
<<<<<<< HEAD
	 * @access	public
	 * @param	resource
	 * @return	bool
	 */
	function image_save_gd($resource)
	{
		switch ($this->image_type)
		{
			case 1 :
						if ( ! function_exists('imagegif'))
						{
							$this->set_error(array('imglib_unsupported_imagecreate', 'imglib_gif_not_supported'));
							return FALSE;
						}

						if ( ! @imagegif($resource, $this->full_dst_path))
						{
							$this->set_error('imglib_save_failed');
							return FALSE;
						}
				break;
			case 2	:
						if ( ! function_exists('imagejpeg'))
						{
							$this->set_error(array('imglib_unsupported_imagecreate', 'imglib_jpg_not_supported'));
							return FALSE;
						}

						if ( ! @imagejpeg($resource, $this->full_dst_path, $this->quality))
						{
							$this->set_error('imglib_save_failed');
							return FALSE;
						}
				break;
			case 3	:
						if ( ! function_exists('imagepng'))
						{
							$this->set_error(array('imglib_unsupported_imagecreate', 'imglib_png_not_supported'));
							return FALSE;
						}

						if ( ! @imagepng($resource, $this->full_dst_path))
						{
							$this->set_error('imglib_save_failed');
							return FALSE;
						}
				break;
			default		:
							$this->set_error(array('imglib_unsupported_imagecreate'));
							return FALSE;
				break;
=======
	 * @param	resource
	 * @return	bool
	 */
	public function image_save_gd($resource)
	{
		switch ($this->image_type)
		{
			case 1:
				if ( ! function_exists('imagegif'))
				{
					$this->set_error(array('imglib_unsupported_imagecreate', 'imglib_gif_not_supported'));
					return FALSE;
				}

				if ( ! @imagegif($resource, $this->full_dst_path))
				{
					$this->set_error('imglib_save_failed');
					return FALSE;
				}
			break;
			case 2:
				if ( ! function_exists('imagejpeg'))
				{
					$this->set_error(array('imglib_unsupported_imagecreate', 'imglib_jpg_not_supported'));
					return FALSE;
				}

				if ( ! @imagejpeg($resource, $this->full_dst_path, $this->quality))
				{
					$this->set_error('imglib_save_failed');
					return FALSE;
				}
			break;
			case 3:
				if ( ! function_exists('imagepng'))
				{
					$this->set_error(array('imglib_unsupported_imagecreate', 'imglib_png_not_supported'));
					return FALSE;
				}

				if ( ! @imagepng($resource, $this->full_dst_path))
				{
					$this->set_error('imglib_save_failed');
					return FALSE;
				}
			break;
			default:
				$this->set_error(array('imglib_unsupported_imagecreate'));
				return FALSE;
			break;
>>>>>>> codeigniter/develop
		}

		return TRUE;
	}

	// --------------------------------------------------------------------

	/**
	 * Dynamically outputs an image
	 *
<<<<<<< HEAD
	 * @access	public
	 * @param	resource
	 * @return	void
	 */
	function image_display_gd($resource)
	{
		header("Content-Disposition: filename={$this->source_image};");
		header("Content-Type: {$this->mime_type}");
=======
	 * @param	resource
	 * @return	void
	 */
	public function image_display_gd($resource)
	{
		header('Content-Disposition: filename='.$this->source_image.';');
		header('Content-Type: '.$this->mime_type);
>>>>>>> codeigniter/develop
		header('Content-Transfer-Encoding: binary');
		header('Last-Modified: '.gmdate('D, d M Y H:i:s', time()).' GMT');

		switch ($this->image_type)
		{
<<<<<<< HEAD
			case 1		:	imagegif($resource);
				break;
			case 2		:	imagejpeg($resource, '', $this->quality);
				break;
			case 3		:	imagepng($resource);
				break;
			default		:	echo 'Unable to display the image';
=======
			case 1	:	imagegif($resource);
				break;
			case 2	:	imagejpeg($resource, '', $this->quality);
				break;
			case 3	:	imagepng($resource);
				break;
			default:	echo 'Unable to display the image';
>>>>>>> codeigniter/develop
				break;
		}
	}

	// --------------------------------------------------------------------

	/**
	 * Re-proportion Image Width/Height
	 *
	 * When creating thumbs, the desired width/height
	 * can end up warping the image due to an incorrect
	 * ratio between the full-sized image and the thumb.
	 *
	 * This function lets us re-proportion the width/height
	 * if users choose to maintain the aspect ratio when resizing.
	 *
<<<<<<< HEAD
	 * @access	public
	 * @return	void
	 */
	function image_reproportion()
	{
		if ( ! is_numeric($this->width) OR ! is_numeric($this->height) OR $this->width == 0 OR $this->height == 0)
			return;

		if ( ! is_numeric($this->orig_width) OR ! is_numeric($this->orig_height) OR $this->orig_width == 0 OR $this->orig_height == 0)
			return;

		$new_width	= ceil($this->orig_width*$this->height/$this->orig_height);
		$new_height	= ceil($this->width*$this->orig_height/$this->orig_width);

		$ratio = (($this->orig_height/$this->orig_width) - ($this->height/$this->width));

		if ($this->master_dim != 'width' AND $this->master_dim != 'height')
		{
			$this->master_dim = ($ratio < 0) ? 'width' : 'height';
		}

		if (($this->width != $new_width) AND ($this->height != $new_height))
		{
			if ($this->master_dim == 'height')
			{
				$this->width = $new_width;
			}
			else
			{
				$this->height = $new_height;
			}
		}
=======
	 * @return	void
	 */
	public function image_reproportion()
	{
		if (($this->width === 0 && $this->height === 0) OR $this->orig_width === 0 OR $this->orig_height === 0
			OR ( ! preg_match('/^[0-9]+$/', $this->width) && ! preg_match('/^[0-9]+$/', $this->height))
			OR ! preg_match('/^[0-9]+$/', $this->orig_width) OR ! preg_match('/^[0-9]+$/', $this->orig_height))
		{
			return;
		}

		// Sanitize so we don't call preg_match() anymore
		$this->width = (int) $this->width;
		$this->height = (int) $this->height;

		if ($this->master_dim !== 'width' && $this->master_dim !== 'height')
		{
			if ($this->width > 0 && $this->height > 0)
			{
				$this->master_dim = ((($this->orig_height/$this->orig_width) - ($this->height/$this->width)) < 0)
							? 'width' : 'height';
			}
			else
			{
				$this->master_dim = ($this->height === 0) ? 'width' : 'height';
			}
		}
		elseif (($this->master_dim === 'width' && $this->width === 0)
			OR ($this->master_dim === 'height' && $this->height === 0))
		{
			return;
		}

		if ($this->master_dim === 'width')
		{
			$this->height = (int) ceil($this->width*$this->orig_height/$this->orig_width);
		}
		else
		{
			$this->width = (int) ceil($this->orig_width*$this->height/$this->orig_height);
		}
>>>>>>> codeigniter/develop
	}

	// --------------------------------------------------------------------

	/**
	 * Get image properties
	 *
	 * A helper function that gets info about the file
	 *
<<<<<<< HEAD
	 * @access	public
	 * @param	string
	 * @return	mixed
	 */
	function get_image_properties($path = '', $return = FALSE)
=======
	 * @param	string
	 * @param	bool
	 * @return	mixed
	 */
	public function get_image_properties($path = '', $return = FALSE)
>>>>>>> codeigniter/develop
	{
		// For now we require GD but we should
		// find a way to determine this using IM or NetPBM

<<<<<<< HEAD
		if ($path == '')
			$path = $this->full_src_path;
=======
		if ($path === '')
		{
			$path = $this->full_src_path;
		}
>>>>>>> codeigniter/develop

		if ( ! file_exists($path))
		{
			$this->set_error('imglib_invalid_path');
			return FALSE;
		}

<<<<<<< HEAD
		$vals = @getimagesize($path);

		$types = array(1 => 'gif', 2 => 'jpeg', 3 => 'png');

		$mime = (isset($types[$vals['2']])) ? 'image/'.$types[$vals['2']] : 'image/jpg';

		if ($return == TRUE)
		{
			$v['width']			= $vals['0'];
			$v['height']		= $vals['1'];
			$v['image_type']	= $vals['2'];
			$v['size_str']		= $vals['3'];
			$v['mime_type']		= $mime;

			return $v;
		}

		$this->orig_width	= $vals['0'];
		$this->orig_height	= $vals['1'];
		$this->image_type	= $vals['2'];
		$this->size_str		= $vals['3'];
=======
		$vals = getimagesize($path);
		$types = array(1 => 'gif', 2 => 'jpeg', 3 => 'png');
		$mime = (isset($types[$vals[2]])) ? 'image/'.$types[$vals[2]] : 'image/jpg';

		if ($return === TRUE)
		{
			return array(
					'width' =>	$vals[0],
					'height' =>	$vals[1],
					'image_type' =>	$vals[2],
					'size_str' =>	$vals[3],
					'mime_type' =>	$mime
				);
		}

		$this->orig_width	= $vals[0];
		$this->orig_height	= $vals[1];
		$this->image_type	= $vals[2];
		$this->size_str		= $vals[3];
>>>>>>> codeigniter/develop
		$this->mime_type	= $mime;

		return TRUE;
	}

	// --------------------------------------------------------------------

	/**
	 * Size calculator
	 *
	 * This function takes a known width x height and
<<<<<<< HEAD
	 * recalculates it to a new size.  Only one
	 * new variable needs to be known
	 *
	 *	$props = array(
	 *					'width'			=> $width,
	 *					'height'		=> $height,
	 *					'new_width'		=> 40,
	 *					'new_height'	=> ''
	 *				  );
	 *
	 * @access	public
	 * @param	array
	 * @return	array
	 */
	function size_calculator($vals)
=======
	 * recalculates it to a new size. Only one
	 * new variable needs to be known
	 *
	 *	$props = array(
	 *			'width'		=> $width,
	 *			'height'	=> $height,
	 *			'new_width'	=> 40,
	 *			'new_height'	=> ''
	 *		);
	 *
	 * @param	array
	 * @return	array
	 */
	public function size_calculator($vals)
>>>>>>> codeigniter/develop
	{
		if ( ! is_array($vals))
		{
			return;
		}

		$allowed = array('new_width', 'new_height', 'width', 'height');

		foreach ($allowed as $item)
		{
<<<<<<< HEAD
			if ( ! isset($vals[$item]) OR $vals[$item] == '')
				$vals[$item] = 0;
		}

		if ($vals['width'] == 0 OR $vals['height'] == 0)
=======
			if (empty($vals[$item]))
			{
				$vals[$item] = 0;
			}
		}

		if ($vals['width'] === 0 OR $vals['height'] === 0)
>>>>>>> codeigniter/develop
		{
			return $vals;
		}

<<<<<<< HEAD
		if ($vals['new_width'] == 0)
		{
			$vals['new_width'] = ceil($vals['width']*$vals['new_height']/$vals['height']);
		}
		elseif ($vals['new_height'] == 0)
=======
		if ($vals['new_width'] === 0)
		{
			$vals['new_width'] = ceil($vals['width']*$vals['new_height']/$vals['height']);
		}
		elseif ($vals['new_height'] === 0)
>>>>>>> codeigniter/develop
		{
			$vals['new_height'] = ceil($vals['new_width']*$vals['height']/$vals['width']);
		}

		return $vals;
	}

	// --------------------------------------------------------------------

	/**
	 * Explode source_image
	 *
	 * This is a helper function that extracts the extension
	 * from the source_image.  This function lets us deal with
<<<<<<< HEAD
	 * source_images with multiple periods, like:  my.cool.jpg
=======
	 * source_images with multiple periods, like: my.cool.jpg
>>>>>>> codeigniter/develop
	 * It returns an associative array with two elements:
	 * $array['ext']  = '.jpg';
	 * $array['name'] = 'my.cool';
	 *
<<<<<<< HEAD
	 * @access	public
	 * @param	array
	 * @return	array
	 */
	function explode_name($source_image)
=======
	 * @param	array
	 * @return	array
	 */
	public function explode_name($source_image)
>>>>>>> codeigniter/develop
	{
		$ext = strrchr($source_image, '.');
		$name = ($ext === FALSE) ? $source_image : substr($source_image, 0, -strlen($ext));

		return array('ext' => $ext, 'name' => $name);
	}

	// --------------------------------------------------------------------

	/**
	 * Is GD Installed?
	 *
<<<<<<< HEAD
	 * @access	public
	 * @return	bool
	 */
	function gd_loaded()
	{
		if ( ! extension_loaded('gd'))
		{
			if ( ! dl('gd.so'))
			{
				return FALSE;
			}
=======
	 * @return	bool
	 */
	public function gd_loaded()
	{
		if ( ! extension_loaded('gd'))
		{
			/* As it is stated in the PHP manual, dl() is not always available
			 * and even if so - it could generate an E_WARNING message on failure
			 */
			return (function_exists('dl') && @dl('gd.so'));
>>>>>>> codeigniter/develop
		}

		return TRUE;
	}

	// --------------------------------------------------------------------

	/**
	 * Get GD version
	 *
<<<<<<< HEAD
	 * @access	public
	 * @return	mixed
	 */
	function gd_version()
=======
	 * @return	mixed
	 */
	public function gd_version()
>>>>>>> codeigniter/develop
	{
		if (function_exists('gd_info'))
		{
			$gd_version = @gd_info();
<<<<<<< HEAD
			$gd_version = preg_replace("/\D/", "", $gd_version['GD Version']);

			return $gd_version;
=======
			return preg_replace('/\D/', '', $gd_version['GD Version']);
>>>>>>> codeigniter/develop
		}

		return FALSE;
	}

	// --------------------------------------------------------------------

	/**
	 * Set error message
	 *
<<<<<<< HEAD
	 * @access	public
	 * @param	string
	 * @return	void
	 */
	function set_error($msg)
=======
	 * @param	string
	 * @return	void
	 */
	public function set_error($msg)
>>>>>>> codeigniter/develop
	{
		$CI =& get_instance();
		$CI->lang->load('imglib');

		if (is_array($msg))
		{
			foreach ($msg as $val)
			{
<<<<<<< HEAD

				$msg = ($CI->lang->line($val) == FALSE) ? $val : $CI->lang->line($val);
=======
				$msg = ($CI->lang->line($val) === FALSE) ? $val : $CI->lang->line($val);
>>>>>>> codeigniter/develop
				$this->error_msg[] = $msg;
				log_message('error', $msg);
			}
		}
		else
		{
<<<<<<< HEAD
			$msg = ($CI->lang->line($msg) == FALSE) ? $msg : $CI->lang->line($msg);
=======
			$msg = ($CI->lang->line($msg) === FALSE) ? $msg : $CI->lang->line($msg);
>>>>>>> codeigniter/develop
			$this->error_msg[] = $msg;
			log_message('error', $msg);
		}
	}

	// --------------------------------------------------------------------

	/**
	 * Show error messages
	 *
<<<<<<< HEAD
	 * @access	public
	 * @param	string
	 * @return	string
	 */
	function display_errors($open = '<p>', $close = '</p>')
	{
		$str = '';
		foreach ($this->error_msg as $val)
		{
			$str .= $open.$val.$close;
		}

		return $str;
	}

}
// END Image_lib Class
=======
	 * @param	string
	 * @param	string
	 * @return	string
	 */
	public function display_errors($open = '<p>', $close = '</p>')
	{
		return (count($this->error_msg) > 0) ? $open.implode($close.$open, $this->error_msg).$close : '';
	}

}
>>>>>>> codeigniter/develop

/* End of file Image_lib.php */
/* Location: ./system/libraries/Image_lib.php */