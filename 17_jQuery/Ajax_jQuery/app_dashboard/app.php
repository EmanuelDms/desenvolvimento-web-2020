<?php

// classe dashboard => define a competência da dashboard
class Dashboard{
	public $data_inicio;
	public $data_fim;
	public $numeroVendas;
	public $totalVendas;

	public function __get($atributo){
		return $this->$atributo;
	}

	public function __set($atributo, $valor){
		$this->$atributo = $valor;
		return $this;
	}

}

// Classe de conexão bd
class Conexao{
	private $host = 'localhost';
	private $dbname = 'dashboard';
	private $user = 'emanuel';
	private $pass = '123';

	public function conectar(){
		try{

			$conexao = new PDO(
				"mysql:host=$this->host;dbname=$this->dbname;",
				"$this->user", "$this->pass"
			);

			// Essa instrução faz com que a instância da conexao trabalhe com UTF-8, fazendo com que a aplicação no geral trabalhe em um mesmo padrão de caracteres;

			$conexao->exec('set charset set utf8');

			return $conexao;

		} catch (PDOException $e) {
			echo "<pre>".$e->getMessage()."</pre>";
		}
	}
}


// classe que permite manipular o objeto no banco
// classe (model)
class Bd {
	private $conexao;
	private $dashboard;
	// Serão objetos definidos no script, podendo serem tipados sendo, forçando-os que sejam objetos baseados em uma determinada classe

	public function __construct(Conexao $conexao, Dashboard $dashboard){
		$this->conexao = $conexao->conectar();
		$this->dashboard = $dashboard;
	}

	public function getNumeroVendas() {
		$query = "
			SELECT 
				count(*) as numero_vendas 
			FROM 
				tb_vendas 
			WHERE 
				data_venda between :data_inicio and :data_fim;";

		// statement
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':data_inicio', $this->dashboard->__get('data_inicio'));
		$stmt->bindValue(':data_fim', $this->dashboard->__get('data_fim'));
		$stmt->execute();

		return $stmt->fetch(PDO::FETCH_OBJ)->numero_vendas;
	}

	public function getTotalVendas() {
		$query = "
			SELECT 
				SUM(total) as total_vendas 
			FROM 
				tb_vendas 
			WHERE 
				data_venda between :data_inicio and :data_fim;";

		// statement
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':data_inicio', $this->dashboard->__get('data_inicio'));
		$stmt->bindValue(':data_fim', $this->dashboard->__get('data_fim'));
		$stmt->execute();

		return $stmt->fetch(PDO::FETCH_OBJ)->total_vendas;
	}
}

// Lógica do Script

$dashboard = new Dashboard();

$conexao = new Conexao();

$dashboard->__set('data_inicio', '2018-10-01');
$dashboard->__set('data_fim', '2018-10-31');

$bd = new Bd($conexao, $dashboard);

$dashboard->__set('numeroVendas', $bd->getNumeroVendas());
$dashboard->__set('totalVendas', $bd->getTotalVendas());

print_r($dashboard);

?>