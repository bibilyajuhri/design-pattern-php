<?php 

interface Aritmatika{
	public function exec(int $a, int $b);
}

class Tambah implements Aritmatika{
	public function exec(int $a, int $b){
		return $a + $b;
	}
}

class Kurang implements Aritmatika{
	public function exec(int $a, int $b){
		return $a - $b;
	}
}

class Kali implements Aritmatika{
	public function exec(int $a, int $b){
		return $a * $b;
	}
}

class Bagi implements Aritmatika{
	public function exec(int $a, int $b){
		return $a / $b;
	}
}

class FacadeAritmatika{
	
	private $a;
	private $b;

	function __construct(int $a, int $b){
		$this->a = $a;
		$this->b = $b;
	}

	public function tambah(){
		$tambah = new Tambah();
		return $tambah->exec($this->a, $this->b);
	}

	public function kurang(){
		$kurang = new Kurang();
		return $kurang->exec($this->a, $this->b);
	}

	public function kali(){
		$kali = new Kali();
		return $kali->exec($this->a, $this->b);
	}

	public function bagi(){
		$bagi = new Bagi();
		return $bagi->exec($this->a, $this->b);
	}
}

$facade = new FacadeAritmatika(10, 2);
echo $facade->tambah()."\n";
echo $facade->kurang()."\n";
echo $facade->kali()."\n";
echo $facade->bagi()."\n";