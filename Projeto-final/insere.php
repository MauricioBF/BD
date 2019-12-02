<?php 
  require_once('back/tipoDAO.php');    
  require_once('back/tipo.php');
  $id = isset($_GET['id']);
  if($id){
    $id = $_GET['id'];
    $tdao = new TipoDAO();
    $tip = $tdao->buscar(intval($id));
  }
?>
<h2>Cadastro Tipos</h2>

<form action="cadastrartipo.php" method="post">
  <div class="form-group">
    <label for="nome">Nome</label>
    <input type="text" class="form-control form-control-sm" id="nome" name="nome" 
    value="<?php if($id) echo $tip->getNome();?>" >
  </div>
  <div class="form-group">
    <label for="descricao">Descrição</label>
    <input type="text" class="form-control form-control-sm" id="descricao" name="descricao" 
    value="<?php if($id) echo $tip->getDescricao();?>" >
  </div>
    <?php if($id){ ?>
    <input type="hidden" name="id" value="<?php echo $tip->getId();?>">
    <?php } ?>
  <div class="form-group">
    <button type="submit" class="btn btn-sm btn-primary" >enviar</button>
    <button type="reset" class="btn btn-sm btn-secondary" >limpar</button> 
  </div>
</form>

<a href="listartipo.php" class="btn btn-sm active" role="button" aria-pressed="true">  voltar 
</a>

<?php include_once("inc/footer.php"); ?>