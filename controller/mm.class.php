<?php
if( !defined('IN') ) die('bad request');
include_once( AROOT . 'controller'.DS.'app.class.php' );

class mmController extends appController
{
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		$data['title'] = $data['top_title'] = '慕慕';
		render( $data );
	}
	
}
	