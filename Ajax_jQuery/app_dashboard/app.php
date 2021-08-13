<?php
// classe dashboard => define a competência da dashboard
class Dashboard{
	public $data_inicio;
	public $data_fim;
	public $clientesAtivos;
	public $clientesInativos;
	public $numeroVendas;
	public $totalVendas;
	public $totalDespesas;

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


// classe(model) que permite manipular o objeto no banco
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

	public function getClientesAtivos() {
		// Considerando que a data não tem relação com o número de clientes ativos
		$query = "
			SELECT 
				count(id) as qtd_clientes_ativos
			FROM 
				tb_clientes 
			WHERE 
				cliente_ativo = 1;";

		// statement
		$stmt = $this->conexao->prepare($query);
		$stmt->execute();

		return $stmt->fetch(PDO::FETCH_OBJ)->qtd_clientes_ativos;
	}

	public function getClientesInativos() {
		// Considerando que a data não tem relação com o número de clientes ativo
		$query = "
			SELECT 
				count(id) as qtd_clientes_inativos
			FROM
				tb_clientes
			WHERE
				cliente_ativo = 0;";

		// statement
		$stmt = $this->conexao->prepare($query);
		$stmt->execute();

		return $stmt->fetch(PDO::FETCH_OBJ)->qtd_clientes_inativos;
	}

	public function getTotalDespesas(){
		$query = "
			SELECT
				SUM(total) as totalDespesas
			FROM
				tb_despesas
			WHERE
				data_despesa between :data_inicio and :data_fim;";

			// statement
			$stmt = $this->conexao->prepare($query);
			$stmt->bindValue(':data_inicio', $this->dashboard->__get('data_inicio'));
			$stmt->bindValue(':data_fim', $this->dashboard->__get('data_fim'));
			$stmt->execute();

			return $stmt->fetch(PDO::FETCH_OBJ)->totalDespesas;

	}
}

// Lógica do Script

$dashboard = new Dashboard();

$conexao = new Conexao();

$data = explode('-', $_GET['competencia']);
$ano = $data[0];
$mes = $data[1];

$dias_do_mes = cal_days_in_month(CAL_GREGORIAN, $mes, $ano);

$dashboard->__set('data_inicio', $ano."-".$mes."-01");
$dashboard->__set('data_fim', $ano."-".$mes."-".$dias_do_mes);

$bd = new Bd($conexao, $dashboard);

$dashboard->__set('numeroVendas', $bd->getNumeroVendas());
$dashboard->__set('totalVendas', $bd->getTotalVendas());
$dashboard->__set('clientesAtivos', $bd->getClientesAtivos());
$dashboard->__set('clientesInativos', $bd->getClientesInativos());
$dashboard->__set('totalDespesas', $bd->getTotalDespesas());

echo json_encode($dashboard);
?>