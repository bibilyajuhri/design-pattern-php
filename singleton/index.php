<?php
class Developer{

	private static $singleton;

	private array $list = ['a', 'b', 'c'];

	private function __construct(){}

	public static function getInstance(){
		if(!self::$singleton){
			self::$singleton = new Developer;
		}
		return self::$singleton;
	}

	public function add(String $nama){
		$list = $this->list;
		array_push($list, $nama);
		$this->list = $list;
	}

	public function print(){
		echo implode(", ", $this->list)."\n";
	}

}

$Developer1 = Developer::getInstance();
$Developer1->add('d');
$Developer1->print();

$Developer2 = Developer::getInstance();
$Developer2->add('e');
$Developer2->print();