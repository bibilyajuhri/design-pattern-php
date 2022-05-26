<?php

interface Departement{
	public function info();
	public function info2();
}

class Manager implements Departement{
	public String $nama;
	public Array $list;
	public String $manager;

	function __construct(String $nama){
		$this->nama = $nama;
	}

	function add(Departement $departement){
		$this->list[] = $departement;
		$departement->manager = $this->nama;
	}

	function infoChild(){
		$curCount = count($this->list);
		foreach ($this->list as $key => $value) {
			$countChild = count($value->list);
			$curCount += $countChild;
			echo "bawahan $value->nama: $countChild\n";
		}
		echo "bawahan $this->nama: $curCount\n";
	}

	function info(){
		echo "-$this->nama\n";
		foreach ($this->list as $key => $value) {
			echo "\t";
			$value->info();
		}
	}

	function info2(){
		$atasan = isset($this->manager) ? $this->manager : null;
		if($atasan){
			echo "atasan $this->nama: $atasan\n";
		}
		foreach ($this->list as $key => $value) {
			$value->info2();
		}
	}
}

class Mitra implements Departement{
	public String $nama;
	public String $manager;

	function __construct(String $nama){
		$this->nama = $nama;
	}

	function info(){
		echo "\t";
		echo "-$this->nama\n";
	}

	function info2(){
		echo "atasan $this->nama: $this->manager\n";
	}
}
$bibil = new Mitra('bibil');
$aaron = new Mitra('aaron');

$robert = new Manager('robert');
$robert->add($bibil);
$robert->add($aaron);

//////////////////////////////

$zakky = new Mitra('zakky');
$syahdan = new Mitra('syahdan');

$bayu = new Manager('bayu');
$bayu->add($zakky);
$bayu->add($syahdan);

//////////////////////////////

$david = new Manager('david');
$david->add($robert);
$david->add($bayu);

$david->info();
echo "\n";
$david->info2();
echo "\n";
$david->infoChild();