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
<br>
<a href="listartipo.php" class="btn btn-primary" role="button" aria-pressed="true" style="margin-left: 20px;  margin-top:20px;">  voltar 
</a>
<h2 style="text-align:center;">Cadastro Tipos</h2>

<form action="cadastrartipo.php" method="post" style="width:50%; margin:0 auto;">
  <div class="form-group">
    <label for="nome">Nome</label>
    <input type="text" class="form-control form-control" id="nome" name="nome" 
    value="<?php if($id) echo $tip->getNome();?>" required>
  </div>
  <div class="form-group">
    <label for="descricao">Descrição</label>
    <textarea name="descricao" id="descricao"   class="form-control form-control"  cols="10" rows="5" required><?php if($id) echo $tip->getDescricao();?></textarea>
    <!-- <input type="text" class="form-control form-control" id="descricao" name="descricao"  value="<?php if($id) echo $tip->getDescricao();?>" > -->
  </div>
    <?php if($id){ ?>
    <input type="hidden" name="id" value="<?php echo $tip->getId();?>">
    <?php } ?>
  <div class="form-group">
    <button type="submit" class="btn btn-sm btn-primary" >enviar</button>
    <button type="reset" class="btn btn-sm btn-secondary" >limpar</button> 
  </div>
</form>



<?php include_once("inc/footer.php"); ?>