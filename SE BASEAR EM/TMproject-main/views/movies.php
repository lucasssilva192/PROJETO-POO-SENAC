<?php 

include (__DIR__.'/../manager.php');

?>

<!DOCTYPE html>

<html lang="pt-br">

<head>

  <meta charset="UTF-8">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
  <script src='https://kit.fontawesome.com/8e2f41b6ca.js' crossorigin='anonymous' defer></script>

  <title>TM Project - Filmes</title>

  <script defer>
    function confirmDelete() {
      confirm('Deseja deletar o registro?');
    }

  </script>

</head>

<body>

  <?php include('layouts/header.php'); ?>

  <main class='m-5 min-vh-100'>

    <h1 class='display-6 pt-5 pb-3'>Filmes</h1>

    <form method='POST' action='' enctype='multipart/form-data'>

      <div class='row'>

        <div class='form-group col-3'>
          <label for='name'>Título</label>
          <input 
            type='text' 
            name='name' 
            class='form-control' 
            placeholder='ex. O Senhor dos Anéis'
            required
            value="<?php if($tm->editItem) echo $tm->editItem[0]['name']; ?>"
          >
        </div>

        <div class='form-group col-3'>
          <label for='genre'>Gênero</label>
          <input 
            type='text' 
            name='genre' 
            class='form-control' 
            placeholder='ex. Aventura'
            value="<?php if($tm->editItem) echo $tm->editItem[0]['genre']; ?>"
          >
        </div>

        <div class='form-group col-3'>
          <label for='director'>Diretor</label>
          <input 
            type='text' 
            name='director' 
            class='form-control' 
            placeholder='ex. Peter Jackson'
            value="<?php if($tm->editItem) echo $tm->editItem[0]['director']; ?>"
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
            required
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
          <button class='btn btn-md btn-success mt-2 w-25 justify-self-end' name='save' value='movie'>Salvar</button>
        </div>
      </div>

    </form>

    <section class='mt-5'>

      <table class='table table-bordered table-striped table-sm'>

        <thead>
          <tr>
            <th>Título</th>
            <th>Gênero</th>
            <th>Diretor</th>
            <th>Descrição</th>
            <th>Observações</th>
            <th>Nota</th>
            <th class='text-center'>Gerenciar</th>
          </tr>
        </thead>

        <tbody>
          
          <tr>
            <?php 
              $listMovies = $tm->movie->getData();
              if ($listMovies) {
                foreach($listMovies as $movie) {
                  echo "<tr>
                    <td>{$movie['name']}</td>
                    <td>{$movie['genre']}</td>
                    <td>{$movie['director']}</td>
                    <td>{$movie['description']}</td>
                    <td>{$movie['observation']}</td>
                    <td>{$movie['rating']}</td>
                    <td scope='col' class='d-flex justify-content-evenly'>
                      <form action='?id={$movie['id']}' method='POST' enctype='multipart/form-data'>
                        <button class='btn btn-sm btn-success' name='edit' value='movie'>
                          <i class='fas fa-edit text-white'></i>
                        </button>
                        <button class='btn btn-sm btn-danger' name='delete' value='movie' onclick='confirmDelete();'>
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