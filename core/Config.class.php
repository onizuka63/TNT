<?php

class Config {
	private static $config;

	static function init() {
		self::$config = array();
	}
	static function get($key) {
		if (isset(self::$config[$key])) {
			return self::$config[$key];
		}
		return null;
	}
	static function set($key, $value) {
		self::$config[$key] = $value;
	}
}
Config::init();
