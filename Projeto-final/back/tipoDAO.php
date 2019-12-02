<?php

class TipoDAO{

	private function criaConexao(){
		$con = new PDO("pgsql:host=localhost;dbname=poketmon;port=5432",
            "postgres", "postgres"); 
		return $con;
	}

	public function listar($limit, $offset){
		$con = $this->criaConexao();
		$sql = "SELECT * FROM tipo LIMIT ? OFFSET ?";
		$stm = $con->prepare($sql);
		$stm->bindValue(1,$limit);
		$stm->bindValue(2,$offset);
		$res=$stm->execute();
		$listTipo = array();
		if($res){	
			while($linha = $stm->fetch(PDO::FETCH_ASSOC)){
				$tip = new Tipo($linha['nome'],$linha['descricao']);
				$tip->setId(intval($linha['idtipo']));
				array_push($listTipo,$tip);
			}
		}
		$stm->closeCursor();
		$stm=NULL;
		$con = NULL;
		return $listTipo;
	}

	public function buscar($id){
		$con = $this->criaConexao();
		$sql = "SELECT * FROM tipo WHERE idtipo = ?";
		$stm = $con->prepare($sql);
		$stm->bindValue(1,$id);

		$res = $stm->execute();
		if($res ){	
			$linha = $stm->fetch(PDO::FETCH_ASSOC);
			$tip = new Tipo($linha['nome'],$linha['descricao']);
			$tip->setId(intval($linha['idtipo']));
		}
		else{
			$tip=$res;
			echo $stm->queryString;
			var_dump($stm->errorInfo());
		}
		$stm->closeCursor();
		$stm=NULL;
		$con = NULL;
		return $tip;
	} 
	public function inserir($tip){
		$con = $this->criaConexao();
		$sql ="INSERT INTO tipo (nome, descricao) 
			VALUES (?,?) RETURNING idtipo"; 
		$stm = $con->prepare($sql);
		$stm->bindValue(1,$tip->getNome());
		$stm->bindValue(2,$tip->getDescricao());
		
		$res = $stm->execute();
		if($res ){	
			echo $res;
		}
		else{
			echo $stm->queryString;
			var_dump($stm->errorInfo());
		}	
		$stm->closeCursor();
		$stm = NULL;
		$con = NULL;
		return $res;
	}
	public function deletar($id){
		$con = $this->criaConexao();
		$sql = "DELETE FROM tipo WHERE idtipo = ?";
		$stm = $con->prepare($sql);
		$stm->bindValue(1,$id);
		$res = $stm->execute();
		if(!$res){
			echo $stm->queryString;
			var_dump($stm->errorInfo());
		}
		$stm->closeCursor();
		$stm = NULL;
		$con = NULL;
		return $res;
	}
	public function alterar($tip){
		$con = $this->criaConexao();
		$sql="UPDATE tipo SET nome = ?, descricao = ? WHERE idtipo = ? ";
		$stm = $con->prepare($sql);
		$stm->bindValue(1,$tip->getNome());
		$stm->bindValue(2,$tip->getDescricao());
		$stm->bindValue(3,$tip->getId(),PDO::PARAM_INT);
		$res = $stm->execute();
		if(!$res){
			echo $stm->queryString;
			var_dump($stm->errorInfo());
		}
		$stm->closeCursor();
		$stm = NULL;
		$con = NULL;
		return $res;
	}
}

?>