<?php

abstract class Kelompok{
	public $kelompok;

	public function setNext(Kelompok $kelompok){
		$this->kelompok = $kelompok;
		return $kelompok;
	}

	abstract function validate(Person $person);

	public function proses(Person $person){
		$this->validate($person);
		if($this->kelompok){
			$this->kelompok->proses($person);
		}
	}
}

class KelompokKelamin extends Kelompok{

	public $data = [
		'Kelompok-L'=> [],
		'Kelompok-P'=> [],
	];

	public function validate(Person $person){
		if($person->kelamin == 'L'){
			$data = $this->data['Kelompok-L'];
			array_push($data, $person->nama);
			$this->data['Kelompok-L'] = $data;
		}else
		if($person->kelamin == 'P'){
			$data = $this->data['Kelompok-P'];
			array_push($data, $person->nama);
			$this->data['Kelompok-P'] = $data;
		}
	}
}

class KelompokUmur extends Kelompok{

	public $data = [
		'Kelompok>=17'=> [],
		'Kelompok<17'=> [],
	];

	public function validate(Person $person){
		if($person->umur >= 17){
			$data = $this->data['Kelompok>=17'];
			array_push($data, $person->nama);
			$this->data['Kelompok>=17'] = $data;
		}else
		if($person->kelamin < 17){
			$data = $this->data['Kelompok<17'];
			array_push($data, $person->nama);
			$this->data['Kelompok<17'] = $data;
		}
	}
}

class JenisKelamin{
	const L = 'L';
	const P = 'P';
}

class Person{

	public $nama;
	public $umur;
	public $kelamin;

	public function __construct(String $nama, int $umur, $kelamin){
		$this->nama = $nama;
		$this->umur = $umur;
		$this->kelamin = $kelamin;
	}
}

$person = new Person('bibil', 17, JenisKelamin::L);
$person2 = new Person('aaron', 16, JenisKelamin::L);
$person3 = new Person('ardha', 15, JenisKelamin::P);

$kelompok = new KelompokKelamin;
$kelompok->setNext(new KelompokUmur);
$kelompok->proses($person);
$kelompok->proses($person2);
$kelompok->proses($person3);
die(var_dump($kelompok));