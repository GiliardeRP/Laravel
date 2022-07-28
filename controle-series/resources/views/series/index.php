<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de Séries</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
    <div class="container">
    <nav class="navbar navbar-expand-lg bg-light">
     <div class="container-fluid"><h1>Séries</h1>
    </div>
    </nav>

    <a href="#" class="btn btn-dark mb-2">Adicionar</a>
    <ul class="list-group">
        <?php foreach ($series as $serie) : ?>
            <li class="list-group-item"><?= $serie; ?></li>
            <?php endforeach; ?>
    </ul>
    </div>
</body>
</html>
