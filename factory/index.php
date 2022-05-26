<?php

abstract class Manusia{
	protected $nama, $jenis_kelamin;

	public function __construct($nama, $jenis_kelamin){
		$this->nama = $nama;
		$this->jenis_kelamin = $jenis_kelamin;
	}

	public function info(){
		$jk = $this->jenis_kelamin == 'L' ? 'Pria' : 'Wanita';
		echo "Info Manusia\n";
		echo "Nama: $this->nama\n";
		echo "Jenis Kelamin: $jk\n\n";
	}
}

class Pria extends Manusia{
	const JENIS_KELAMIN = 'L';

	public function __construct($nama){
		parent::__construct($nama, self::JENIS_KELAMIN);
	}
}

class Wanita extends Manusia{
	const JENIS_KELAMIN = 'P';

	public function __construct($nama){
		parent::__construct($nama, self::JENIS_KELAMIN);
	}
}

class Factory{
	const PRIA = 'PRIA';
	const WANITA = 'WANITA';

	public $countPria = 0;
	public $countWanita = 0;

	public function createManusia($manusia, $nama){
		switch ($manusia) {
			case self::PRIA:
				$this->countPria++;
				return new Pria($nama);
				break;
			case self::WANITA:
				$this->countWanita++;
				return new Wanita($nama);
				break;
			
			default:
				return null;
				break;
		}
	}

	public function info(){
		echo "Total Pria = $this->countPria\n";
		echo "Total Wanita = $this->countWanita\n";
	}
}
$factory = new Factory();

$maria = $factory->createManusia(Factory::WANITA, 'Maria');
$maria->info();

$charles = $factory->createManusia(Factory::PRIA, 'Charles');
$charles->info();

$sofia = $factory->createManusia(Factory::WANITA, 'sofia');
$sofia->info();


$factory->info();