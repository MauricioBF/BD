<?php

class PokemonDAO{

	private function criaConexao(){
		$con = new PDO("pgsql:host=localhost;dbname=poketmon;port=5432",
            "postgres", "postgres"); 
            var_dump($con);
		return $con;
	}

	public function listar($limit, $offset){
		$con = $this->criaConexao();
		$sql = "SELECT * FROM pokemon LIMIT ? OFFSET ?";
		$stm = $con->prepare($sql);
		$stm->bindValue(1,$limit);
		$stm->bindValue(2,$offset);
		$res=$stm->execute();
		$listPok = array();
		if($res){	
			while($linha = $stm->fetch(PDO::FETCH_ASSOC)){
				$pok = new Pokemon($linha['nome'],$linha['habilidade'],$linha['nivel'],$linha['tipo']);
				$pok->setId(intval($linha['idpokemon']));
				array_push($listPok,$pok);
			}
		}
		$stm->closeCursor();
		$stm=NULL;
		$con = NULL;
		return $listPok;
	}

	public function buscar($id){
		$con = $this->criaConexao();
		$sql = "SELECT * FROM pokemon WHERE idpokemon = ?";
		$stm = $con->prepare($sql);
		$stm->bindValue(1,$id);

		$res = $stm->execute();
		if($res ){	
			$linha = $stm->fetch(PDO::FETCH_ASSOC);
			$pok = new Pokemon($linha['nome'],$linha['habilidade'],$linha['nivel'],$linha['tipo']);
			$pok->setId(intval($linha['idpokemon']));
		}
		else{
			$pok=$res;
			echo $stm->queryString;
			var_dump($stm->errorInfo());
		}
		$stm->closeCursor();
		$stm=NULL;
		$con = NULL;
		return $pok;
	} 
	public function inserir($pok){
		$con = $this->criaConexao();
		$sql ="INSERT INTO pokemon (nome, habilidade, nivel, tipo) 
			VALUES (?,?,?,?) RETURNING idpokemon"; 
		$stm = $con->prepare($sql);
		$stm->bindValue(1,$pok->getNome());
		$stm->bindValue(2,$pok->getHabilidade());
        $stm->bindValue(3,$pok->getNivel());
        $stm->bindValue(4,$pok->getTipo());
		
		$res = $stm->execute();
		if($res ){	
			$linha = $res->fetch(PDO::FETCH_ASSOC);
			$pok->setId(intval($linha['id']));
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
		$sql = "DELETE FROM pokemon WHERE idpokemon = ?";
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
	public function alterar($pok){
		$con = $this->criaConexao();
		$sql="UPDATE pokemon SET nome = ?, habilidade = ?, 
		  nivel = ?, tipo = ? WHERE idpokemon = ? ";
		$stm = $con->prepare($sql);
		$stm->bindValue(1,$pok->getNome());
		$stm->bindValue(2,$pok->getHabilidade());
        $stm->bindValue(3,$pok->getNivel());
        $stm->bindValue(4,$pok->getTipo());
		$stm->bindValue(5,$pok->getId(),PDO::PARAM_INT);
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
