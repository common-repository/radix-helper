<?php 
/**
 * @package  Radix Helper
 */
namespace Inc\Pages;

use Inc\Api\SettingsApi;
use Inc\Base\BaseController;
use Inc\Api\Callbacks\AdminCallbacks;

class Admin extends BaseController
{
	public $settings;

	public $callbacks;

	public $pages = array();


	public function register() 
	{
		$this->settings = new SettingsApi();

		$this->callbacks = new AdminCallbacks();

		$this->setPages();
	
		$this->settings->addPages( $this->pages )->register();
	}

	public function setPages() 
	{
		$this->pages = array(
			array(
				'page_title' => 'Radix Helper', 
				'menu_title' => 'Radix Helper', 
				'capability' => 'manage_options', 
				'menu_slug' => 'radix_helper', 
				'callback' => array( $this->callbacks, 'adminDashboard' )
			)
		);
	}
}