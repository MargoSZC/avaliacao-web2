<?php 
include "../controller/UsuarioController.php";

   $vendedor = new UsuarioController();

  if(!empty($_GET['id'])){
    $vendedor->deletar($_GET['id']);
    header("location: VendedoresList.php");
  }
  if(!empty($_POST)){
    $load = $vendedor->pesquisar($_POST);

  }else{
    $load = $vendedor->carregar();

  }
   //var_dump($load);
  // exit;
?>

<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
  </head>
  <body>
  <div class="container">
    <h1>Listagem de Vendedores</h1>
    <form action="Vendedoreslist.php" method="post">
        <div class="row">
          <div class="col-2">
          <select name="campo">
        <option value="nome">Nome</option>
        <option value="salario">Salário</option>
        <option value="vendas">Vendas</option>

      </select>
</div>
<div class="col-4">
      <input  type="text" class="form-control" placeholder="Pesquisar" name="valor" />
</div>
<div class="col-3">
      <input class="btn btn-danger" type="submit" value="Buscar"/>
      <a class="btn btn-dark" href="VendedoresForm.php">Cadastrar</a>
</div>
  </form>
  <table class="table table-sm">
        <tr>
 <th>ID</th>
   <th>Nome</th>
    <th>Salário</th>
    <th>Vendas</th>

        </tr>
    <?php 
    foreach($load as $item){
      echo"<tr>
            <td>$item->id</td>
            <td>$item->nome</td>
            <td>$item->salario</td>
            <td>$item->vendas</td>

            <td><a href='./VendedoresForm.php?id=$item->id' ><i class='fa-solid fa-pen-to-square' style='color: #000000;'></i></a></td>
            <td><a href='./VendedoresList.php?id=$item->id' onclick='return confirm(\"Deseja Excluir?\")'><i class='fa-solid fa-trash' style='color: #000000;'></i></a></td>
           </tr>";
    }
        ?>
    </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
	</body>
</html>