<?php 

include (__DIR__.'/../manager.php');

?>

<!DOCTYPE html>

<html lang="ot-br">

<head>

  <meta charset="UTF-8">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
  <script src='https://kit.fontawesome.com/8e2f41b6ca.js' crossorigin='anonymous' defer></script>

  <title>TM Project - Comidas</title>

  <script defer>
    function confirmDelete() {
      confirm('Deseja deletar o registro?');
    }
  </script>}


</head>

<body>

  <?php include('layouts/header.php'); ?>

  <main class='m-5 min-vh-100'>

    <h1 class='display-6 pt-5 pb-3'>Comidas</h1>

    <form method='POST' action='' enctype='multipart/form-data'>

      <div class='row'>

        <div class='form-group col-3'>
          <label for='name'>Nome</label>
          <input 
            type='text' 
            name='name' 
            class='form-control' 
            placeholder='ex. Camemburguer'
            required
            value="<?php if($tm->editItem) echo $tm->editItem[0]['name']; ?>"
          >
        </div>

        <div class='form-group col-3'>
          <label for='flavour'>Sabor</label>
          <input 
            type='text' 
            name='flavour' 
            class='form-control' 
            placeholder='ex. Salgado'
            value="<?php if($tm->editItem) echo $tm->editItem[0]['flavour']; ?>"
            required
          >
        </div>

        <div class='form-group col-3'>
          <label for='restaurant'>Restaurante</label>
          <input 
            type='text' 
            name='restaurant' 
            class='form-control' 
            placeholder='ex. Seven Kings Burguer'
            value="<?php if($tm->editItem) echo $tm->editItem[0]['restaurant']; ?>"
          >
        </div>

        <div class='form-group col-3'>
          <label for='rating'>Nota</label>
          <input 
            type='number' 
            name='rating' 
            class='form-control' 
            min='0' 
            max='10' 
            placeholder='ex. 10'
            value="<?php if($tm->editItem) echo $tm->editItem[0]['rating']; ?>"
          >
        </div>

      </div>

      <div class='row mt-2'>

        <div class='form-group col-6'>
          <label for='description'>Descrição</label>
          <textarea 
            name='description' 
            class="form-control" 
            rows="3" 
            style="resize: none"
            ><?php if($tm->editItem) echo $tm->editItem[0]['description'];?></textarea>
        </div>

        <div class='form-group col-6'>
          <label for='observation'>Observações</label>
          <textarea 
            name='observation' 
            class="form-control" 
            rows="3" 
            style="resize: none"
            ><?php if($tm->editItem) echo $tm->editItem[0]['observation'];?></textarea>
        </div>

      </div>

      <div class='row'>
        <div class='form-group d-flex justify-content-end'>
          <button class='btn btn-md btn-success mt-2 w-25 justify-self-end' name='save' value='food'>Salvar</button>
        </div>
      </div>

    </form>

    <section class='mt-5'>

      <table class='table table-bordered table-striped table-sm'>

        <thead>
          <tr>
            <th>Nome</th>
            <th>Sabor</th>
            <th>Restaurante</th>
            <th>Descrição</th>
            <th>Observações</th>
            <th>Nota</th>
            <th class='text-center'>Gerenciar</th>
          </tr>
        </thead>

        <tbody>
          
          <tr>
            <?php 
              $listFoods = $tm->food->getData();
              if ($listFoods) {
                foreach($listFoods as $food) {
                  echo "<tr>
                    <td>{$food['name']}</td>
                    <td>{$food['flavour']}</td>
                    <td>{$food['restaurant']}</td>
                    <td>{$food['description']}</td>
                    <td>{$food['observation']}</td>
                    <td>{$food['rating']}</td>
                    <td scope='col' class='d-flex justify-content-evenly'>
                      <form action='?id={$food['id']}' method='POST' enctype='multipart/form-data'>
                        <button class='btn btn-sm btn-success' name='edit' value='food'>
                          <i class='fas fa-edit text-white'></i>
                        </button>
                        <button class='btn btn-sm btn-danger' name='delete' value='food' onclick='confirmDelete();'>
                          <i class='fas fa-trash-alt text-white'></i>
                        </button>
                      </form>
                    </td>
                  </tr>";
                } 
              } else {
                echo "<tr><td class='text-muted text-center' colspan='7'>Não há registros</td></tr>";
              }
            ?>
          </tr>
        </tbody>

      </table>

    </section>

  </main>

  <?php include('layouts/footer.php'); ?>

</body>

</html>