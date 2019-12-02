<?php 
require_once('inc/header.php');
require_once('back/tipoDAO.php');    
require_once('back/tipo.php');
$id = isset($_GET['id']);

if($id){
  $id = $_GET['id'];
  $tdao = new TipoDAO();
  $tip = $tdao->buscar(intval($id));
}
?>
<h2 style="text-align:center;">Detalhes Tipo</h2>
<div  style="width:70%; margin:0 auto;">
<ul class="list-group">
  <li class="list-group-item active"><?= $tip->getNome()." (id:".$tip->getId().")";?></li>
  <li class="list-group-item"><?php echo "Descrição: ".$tip->getDescricao();?></li>
</ul>
<br>
<a href="listartipo.php" class="btn btn-primary active" role="button" aria-pressed="true"> << voltar</a>
</div>
<?php include_once("inc/footer.php");?>