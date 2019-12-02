<?php 
  require_once('inc/header.php');
  require_once('back/pokemonDAO.php');    
  require_once('back/pokemon.php');
  require_once('back/tipoDAO.php');
  require_once('back/tipo.php');
  $id = isset($_GET['id']);
  if($id){
    $id = $_GET['id'];
    $pdao = new PokemonDAO();
    $pok = $pdao->buscar(intval($id));
  }
?>
<h2>Cadastro Pokemons</h2>

<form action="cadastrarpokemon.php" method="post">
  <div class="form-group">
    <label for="nome">Nome</label>
    <input type="text" class="form-control form-control-sm" id="nome" name="nome" 
    value="<?php if($id) echo $pok->getNome();?>" >
  </div>
  <div class="form-group">
    <label for="habilidade">Habilidade</label>
    <input type="text" class="form-control form-control-sm" id="habilidade" name="habilidade" 
    value="<?php if($id) echo $pok->getHabilidade();?>" >
  </div>
  <div class="form-group">
    <label for="nivel">Nível</label>
    <input type="text" class="form-control form-control-sm" id="nivel" name="nivel" 
    value="<?php if($id) echo $pok->getNivel();?>">
  </div>
  <div class="form-group">
    <select name="tipo" class="form-control">
      <?php 
      foreach($listTipo as $c){ 
        ?>
      <option value="<?php echo $c->getId() ?>"
        <?php if($id&&$c->getId()===$id->getTipo()->getId()) echo "selected"?>>
        <?php echo $c->getNome()?>
      </option>
      <?php }  ?>
    </select>
    <label for="tipo">Tipo</label>
    <input type="text" class="form-control form-control-sm" id="tipo" name="tipo" 
    value="<?php if($id) echo $pok->getTipo();?>">
  </div>
    <?php if($id){ ?>
    <input type="hidden" name="id" value="<?php echo $pok->getId();?>">
    <?php } ?>
  <div class="form-group">
    <button type="submit" class="btn btn-sm btn-primary" >enviar</button>
    <button type="reset" class="btn btn-sm btn-secondary" >limpar</button> 
  </div>
</form>

<a href="listarpokemon.php" class="btn btn-sm active" role="button" aria-pressed="true">  voltar 
</a>

<?php include_once("inc/footer.php"); ?>