<?php 
  require_once('inc/header.php');
  require_once('back/pokemonDAO.php');    
  require_once('back/pokemon.php');
  require_once('back/tipoDAO.php');    
  require_once('back/tipo.php');    
  $tdao = new TipoDAO();
  $listTipo = $tdao->listar(50,0);
  $id = isset($_GET['id']);
  if($id){
    $id = $_GET['id'];
    $pdao = new PokemonDAO();
    $pok = $pdao->buscar(intval($id));
  }
?>

<a href="listarpokemon.php" class="btn btn-primary active" role="button" aria-pressed="true" style="margin-left: 20px; margin-top:20px;">  voltar 
</a>
<h2 style="text-align:center;">Cadastro Pokemon</h2>

<form action="cadastrarpokemon.php" method="post" style="width:50%; margin:0 auto;">
  <div class="form-group">
    <label for="nome">Nome</label>
    <input type="text" class="form-control form-control" id="nome" name="nome" 
    value="<?php if($id) echo $pok->getNome();?>" required>
  </div>
  <div class="form-group">
    <label for="habilidade">Habilidade</label>
    <input type="text" class="form-control form-control" id="habilidade" name="habilidade" 
    value="<?php if($id) echo $pok->getHabilidade();?>" required>
  </div>
  <div class="form-group">
    <label for="nivel">Nível</label>
    <input type="number" min="1" max="3" class="form-control form-control" id="nivel" name="nivel" 
    value="<?php if($id) echo $pok->getNivel();?>" required>
  </div>
  <div class="form-group">
    <label for="tipo">Tipo</label>
    <?php 
    ?>
    <select name="tipo" class="form-control" required>
      <?php 
      foreach($listTipo as $t){ 
        ?>
      <option value="<?php echo $t->getId() ?>"
        <?php 
        if($id && $t->getId()===$pok->getTipo()->getId()) echo "selected"?>>
        <?php echo $t->getNome()?>
      </option>
      <?php }  ?>
    </select>
  </div>
    <?php if($id){ ?>
    <input type="hidden" name="id" value="<?php echo $pok->getId();?>">
    <?php } ?>
  <div class="form-group">
    <button type="submit" class="btn btn-sm btn-primary" >enviar</button>
    <button type="reset" class="btn btn-sm btn-secondary" >limpar</button> 
  </div>
</form>

<?php include_once("inc/footer.php"); ?>