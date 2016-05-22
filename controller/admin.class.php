<?php
if( !defined('IN') ) die('bad request');
include_once( AROOT . 'controller'.DS.'app.class.php' );

class adminController extends appController
{
	private $_role_map = [
	    'dad' => 1,
	    'mom' => 2,
	    'mm'  => 3
	    
	];

	private $_file_types = [
        'pic' => ['.jpg', '.png', '.jpeg', '.gif'],
        'voice' => ['.mp3', '.wav', '.raw'],
        'video' => ['.mp4', '.avi']
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

		var_dump($_POST);

		if(!empty($_FILES) && !empty($_FILES['file']) && $_FILES['file']['error'] == 0) {
			//分析图片后缀，判断格式
			$fileName = $_FILES['file']['name'];
			$flagIndex= strripos($fileName, '.');
			$suffix = substr($fileName, $flagIndex);
			foreach ($this->_file_types as $file_type => $types) {
				if(in_array($suffix, $types)) {
					break;
				}
			}
			var_dump($file_type);
		}
		var_dump($_FILES);
		exit();
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
	