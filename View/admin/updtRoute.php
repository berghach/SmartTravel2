<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
        body {
            padding: 20px;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
        }

        label {
            margin-top: 10px;
            display: block;
        }
    </style>
</head>

<body>
    <form method="POST" action="index.php?action=updtRoute" enctype="multipart/form-data" class="form-horizontal">
        <h2 class="text-center">Modifier Route</h2>
        <div class="form-group">
            <label for="vil_dep" class="control-label col-sm-2">Ville départ:</label>
            <div class="col-sm-10">
                <select id="vil_dep" name="vil_dep" class="form-control">
                    <?php foreach ($villes as $v): ?>
                        <?php if ($v->getObjectId() === $route->getDepart_city()) { ?>
                            <option value="<?= $v->getObjectId() ?>" selected>
                                <?= $v->getName() ?>
                            </option>
                        <?php } else { ?>
                            <option value="<?= $v->getObjectId() ?>">
                                <?= $v->getName() ?>
                            </option>
                        <?php } ?>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="vil_arv" class="control-label col-sm-2">Ville d'arrivée:</label>
            <div class="col-sm-10">
                <select id="vil_arv" name="vil_arv" class="form-control">
                    <?php foreach ($villes as $v): ?>
                        <?php if ($v->getObjectId() === $route->getArrive_city()) { ?>
                            <option value="<?= $v->getObjectId() ?>" selected>
                                <?= $v->getName() ?>
                            </option>
                        <?php } else { ?>
                            <option value="<?= $v->getObjectId() ?>">
                                <?= $v->getName() ?>
                            </option>
                        <?php } ?>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="dist" class="control-label col-sm-2">Distance:</label>
            <div class="col-sm-10">
                <input value=<?= $route->getDist() ?> type="text" id="dist" name="dist" class="form-control">
            </div>
        </div>

        <div class="form-group">
            <label for="dure" class="control-label col-sm-2">Durée:</label>
            <div class="col-sm-10">
                <input value=<?= $route->getDuree() ?> type="text" name="dure" id="dure" class="form-control">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" value="Modifier" class="btn btn-primary">
            </div>
        </div>
    </form>
</body>

</html>