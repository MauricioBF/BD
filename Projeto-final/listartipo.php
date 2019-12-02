<?php 
require_once('inc/header.php');
require_once('back/tipoDAO.php');    
require_once('back/tipo.php');    
$tdao = new TipoDAO();
$lisTipo = $tdao->listar(50,0);
var_dump($tdao);
?>

  <h2>Lista de Tipos</h2>
  <table class="table table-sm table-responsive-sm table-hover">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Código</th>
            <th scope="col">Nome</th>
            <th scope="col">Descrição</th>
            <th scope="col">Opções</th>
    </tr>
  </thead>
  <tbody>
    <?php  
        foreach($lisTipo as $tipo){
    ?>
    <tr>
      <td> <?php echo $tipo->getId(); ?> </td>
      <td> <?php echo $tipo->getNome(); ?> </td>
      <td> <?php echo $tipo->getDescricao(); ?> </td>
      <td> 
        <a href="detalhestipo.php?id=<?php echo $tipo->getId(); ?>" class="btn btn-sm btn-info"> 					
          Detalhes?</a>
        <a href="registro.php?id=<?php echo $tipo->getId(); ?>" class="btn btn-sm btn-warning">
          Editar?</a>				
        <a href="excluirtipo.php?id=<?php echo $tipo->getId(); ?>" class="btn btn-sm btn-danger"> 					
          Excluir?</a>
      </td>
    </tr>
    <?php } ?>
  </tbody>
</table>
<a href="registro.php" class="btn btn-secondary active" role="button" aria-pressed="true">Inserir Tipo</a>







