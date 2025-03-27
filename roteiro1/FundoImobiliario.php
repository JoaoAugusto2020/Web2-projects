<?php
class FundoImobiliario
{
    private $nome;
    private $ticker;
    private $valor;
    private $quantidade;
    private $data;

    public function __construct($nome, $ticker, $valor, $quantidade, $data)
    {
        $this->nome = $nome;
        $this->ticker = $ticker;
        $this->valor = $valor;
        $this->quantidade = $quantidade;
        $this->data = $data;
    }

    public function getNome(){
		return $this->nome;
	}

	public function setNome($nome){
		$this->nome = $nome;
	}

	public function getTicker(){
		return $this->ticker;
	}

	public function setTicker($ticker){
		$this->ticker = $ticker;
	}

	public function getValor(){
		return $this->valor;
	}

	public function setValor($valor){
		$this->valor = $valor;
	}

	public function getQuantidade(){
		return $this->quantidade;
	}

	public function setQuantidade($quantidade){
		$this->quantidade = $quantidade;
	}

	public function getData(){
		return $this->data;
	}

	public function setData($data){
		$this->data = $data;
	}
}
