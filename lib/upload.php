<?php

require('./include.php');

use Qcloud_cos\Auth;
use Qcloud_cos\Cosapi;

/**
 * 调用腾讯sdk上传文件
 */
class Lib_Upload {

	public static $getInstance = null;

	private $_bucketName = '';

	/**
	 * http 响应码，请求正常时为200
	 */
	CONST HTTPCODE = 200;

	/**
	 * 错误码，成功时为0
	 */
	CONST CODE = 0;

	private function __construct($bucketName) {
		$this->_bucketName = $bucketName;
	}

	public static instance($bucketName) {
		if(self :: getInstance == null) {
			self :: getInstance = new class($bucketName);
		}

		return self::getInstance;
	}

	/**
	 * 创建目录
	 */
	public function createFolder($folder) {
		$folder = trim($folder, '/');
		$response = Cosapi::createFolder($this->_bucketName, "/{$folder}/");
		$this->_response($response);
	}

	/**
	 * 上传文件
	 * @param $sourcePath string 本地文件绝对路径
	 * @param $targetPath string 云服务器存放路径，相对于bucketName
	 */
	public function uploadFile($sourcePath, $targetPath) {
		$response = Cosapi::upload($sourcePath, $this->_bucketName, $targetPath);
		$this->_response($response);
	}

	/**
	 * 返回信息
	 */
	private function _response($response) {
		$status = false;
		if($response['httpcode'] == self :: HTTPCODE && $response['code'] == self :: CODE) {
			$status = true;
		}
		return [
		    'status' => $status,
		    'response' => $response;
		];
	}
	
}