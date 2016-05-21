<?php
if( !defined('IN') ) die('bad request');
include_once( AROOT . 'controller'.DS.'app.class.php' );

class adminController extends appController
{
	private $_role_map = [
	    'mm' => 2,
	    'bb' => 1
	];
	private $_layout = 'admin';
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		$data['title'] = $data['top_title'] = '首页';
		$data['time']  = date('m/d/Y', time());
		render( $data, $this->_layout);
	}

	function addWeight() {
		$role = v('role');
		$weight = floatval(v('weight'));
		$date   = v('date');
		$url = '/index.php?c=admin';
		if(intval($weight) == 0) {
			$msg = '输入正确的体重好嘛？';
			redirectAlert($url, $msg);
		}

		if(!isset($this->_role_map[$role])) {
			$msg = '你是来捣乱的吗？';
			redirectAlert($url, $msg);
		}
		$role = $this->_role_map[$role];
		$date = strtotime($date);
		$data = [
		    'uid' => $role,
		    'weight' => $weight,
		    'date' => $date
		];

		$set = Model_weight::meta()->setWeightData($data);
		$msg = $set ? '添加成功' : '添加失败';
		redirectAlert($url, $msg);
	}
}
	