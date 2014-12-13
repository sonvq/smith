<?php

/**
 * Development by Sanmax Consultancy BVBA
 * @version $Id: Dir.php 8477 2010-06-21 11:56:03Z andries $
 *
 * LICENSE
 *
 * Warranty on source code, and templates, expires upon modifications, made by
 * either customer, or third party providers. Sanmax Consultancy can not be
 * held responsible for such modifications.
 *
 * Client assumes all responsibility for additional time and cost requirements
 * resulting from such modifications.
 */


/**
 * @category   SxCms
 * @package    SxCms_Dir
 * @copyright  Copyright (c) 2009-2010 Sanmax Consultancy BVBA. (http://www.sanmax.be)
 */
class SxCms_Dir
{
    /**
     * full path to dir / filename
     * @var string
     */
	protected $_filename;

    /**
     * new filename (when renamed)
     * @var string
     */
	protected $_newFilename;

	public function __construct($filename)
	{
		$this->_filename = realpath($filename);
	}

	public function setFilename($filename)
	{
		if ($filename !== basename($this->_filename)) {
			$this->_newFilename = $filename;
		}

		return $this;
	}

	public function getFilename()
	{
		return basename($this->_filename);
	}

	public function getBasename()
	{
		return basename($this->_filename);
	}

	public function isFile()
	{
		return false;
	}

	public function getPathnameFromBase()
	{
		$base = realpath(APPLICATION_PATH . '/../public_html/files/');
		$path = str_replace($base, '', $this->_filename);
		$path = str_replace('\\', '/', $path);

		return $path;
	}

	public function getPathname()
	{
		return $this->_filename;
	}

	public function save()
	{
		$path = str_replace('\\', '/', $this->_filename);
		if ($this->_newFilename) {
		 	$topdir = explode('/', $path);
			if (count($topdir) > 1) {
				array_pop($topdir);
				$topdir = implode('/', $topdir);
			} else {
				$topdir = '';
			}

			rename($this->_filename, $topdir . '/' . $this->_newFilename);
		}

		return true;
	}

    /**
     * Deletes directory
     * 
     * @return bool
     */
	public function delete()
	{
		return rmdir($this->_filename);
	}

    public function getPermissions()
    {
        return false;
    }
}
