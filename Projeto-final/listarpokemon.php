<?php 
require_once('inc/header.php');
require_once('back/pokemonDAO.php');    
require_once('back/pokemon.php');    
$pdao = new PokemonDAO();
$listPok = $pdao->listar(50,0);
?>

  <h2 style="text-align:center;">Lista de Pokemons</h2>
  <div  style="width:70%; margin:0 auto;">

  <table class="table table-sm table-responsive-sm table-hover">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Código</th>
            <th scope="col">Nome</th>
            <th scope="col">Habilidade</th>
            <th scope="col">Nível</th>
            <th scope="col">Tipo</th>
            <th scope="col">Opções</th>
    </tr>
  </thead>
  <tbody>
    <?php  
        foreach($listPok as $pokemon){
    ?>
    <tr>
      <td> <?php echo $pokemon->getId(); ?> </td>
      <td> <?php echo $pokemon->getNome(); ?> </td>
      <td> <?php echo $pokemon->getHabilidade(); ?> </td>
      <td> <?php echo $pokemon->getNivel(); ?> </td>
      <td> <?php echo $pokemon->getTipo(); ?> </td>
      <td> 
        <a href="detalhespokemon.php?id=<?php echo $pokemon->getId(); ?>" class="btn btn-sm btn-info"> 					
          Detalhes</a>
        <a href="registro.php?id=<?php echo $pokemon->getId(); ?>" class="btn btn-sm btn-warning">
          Editar</a>				
        <a href="excluirpokemon.php?id=<?php echo $pokemon->getId(); ?>" class="btn btn-sm btn-danger"> 					
          Excluir</a>
      </td>
    </tr>
    <?php } ?>
  </tbody>
</table>
<a href="registro.php" class="btn btn-secondary active" role="button" aria-pressed="true">Inserir Pokemon</a>
  </div>







