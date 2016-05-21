<?php
class Base_model
{
    protected static $_metas = array();

	protected function __construct() {
		$this->init();
	}
	
	/**
     * 继承类的元对象唯一实例
     *
     * @param string $class
     *
     */
    static function instance($class)
    {
        if (!isset(self::$_metas[$class]))
        {
            self::$_metas[$class] = new $class();
        }
        return self::$_metas[$class];
    }

    protected function db() {
    	
    }

    protected function init() {

    }
}