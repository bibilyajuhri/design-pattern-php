<?php 
class bakso{
	public $pentol;
	public $tahu;
	public $gorengan;
	public $lontong;
	public $useSambal;
	public $useSaus;

	public function __construct($pentol, $tahu, $gorengan){
		$this->pentol = $pentol;
		$this->tahu = $tahu;
		$this->gorengan = $gorengan;
	}

	public function setLontong($lontong){
		$this->lontong = $lontong;
		return $this;
	}

	public function setUseSambal($useSambal){
		$this->useSambal = $useSambal;
		return $this;
	}

	public function setUseSaus($useSaus){
		$this->useSaus = $useSaus;
		return $this;
	}

	public function clone(){
		$clone = new self($this->pentol, $this->tahu, $this->gorengan);
		$clone->setLontong($this->lontong);
		$clone->setUseSambal($this->useSambal);
		$clone->setUseSaus($this->useSaus);
		return $clone;
	}
}

$bibil = new bakso(1,2,3);
$a = $bibil->clone();
$a->setUseSaus(true);
var_dump($bibil);
var_dump($a);