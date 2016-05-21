<?php
if( !defined('IN') ) die('bad request');
include_once( AROOT . 'controller'.DS.'app.class.php' );

class missleeispigController extends appController
{

	private $_layout = 'missLee';
	function __construct()
	{
		//echo strtotime('20150903');
		parent::__construct();
	}
	
	function index()
	{
		$getweight = Model_weight::meta()->getWeightData(2);

		$date = [];
		$weight=[];
        $tmpData = [];

		foreach($getweight as $ls) {
            $lsDate = date('m/d', $ls['date']);
            if(in_array($lsDate, $tmpData)) {
                continue;
            }
            $tmpData[]= $lsDate;
			$date[]   = $lsDate;
			$weight[] = floatval($ls['weight']);
		}
		$data['date']   = json_encode($date);
		$data['weight'] = json_encode($weight);
		$data['title'] = '老婆老婆';

		render( $data, $this->_layout);
	}
}
	