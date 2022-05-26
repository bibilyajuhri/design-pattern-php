<?php

interface Menu{
	function add();
	function calc();
}

class AyamDada implements Menu{
	private $harga = 20000;

	function add(){
		echo "Menambahkan Paket Ayam Dada: {$this->harga}\n";
	}

	function calc(){
		return $this->harga;
	}
}

class AyamSayap implements Menu{
	private $harga = 15000;

	function add(){
		echo "Menambahkan Paket Ayam Harga: {$this->harga}\n";
	}

	function calc(){
		return $this->harga;
	}
}

class Minuman implements Menu{

	const TYPE_AIRPUTIH = 'TYPE_AIRPUTIH';
	const TYPE_SODA = 'TYPE_SODA';

	public $type;

	function __construct(Menu $menu, $type){
		$this->menu = $menu;
		$this->type = $type;
	}

	function add(){
		$this->menu->add();
		$name = $this->getName();
		$harga = $this->getHarga();
		echo "Menambahkan Minuman $name: {$harga}\n";
	}

	function calc(){
		return $this->getHarga() + $this->menu->calc();
	}

	private function getName(){
		$name = [
			self::TYPE_AIRPUTIH=> 'Air Putih',
			self::TYPE_SODA=> 'Soda',
		];
		return $name[$this->type];
	}

	private function getHarga(){
		$harga = [
			self::TYPE_AIRPUTIH=> 5000,
			self::TYPE_SODA=> 10000,
		];
		return $harga[$this->type];
	}
}

class Kentang implements Menu{
	private $harga = 12000;

	function __construct(Menu $menu){
		$this->menu = $menu;
	}

	function add(){
		$this->menu->add();
		echo "Menambahkan Kentang: {$this->harga}\n";
	}

	function calc(){
		return $this->harga + $this->menu->calc();
	}
}

$beli = new Kentang(new Minuman(new AyamDada(), Minuman::TYPE_SODA));
$beli->add();
echo "Total: {$beli->calc()}\n";