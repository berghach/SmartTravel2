<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<form action="index.php?action=update" method="post">
<div class="mb-3">
  <label for="formGroupExampleInput" class="form-label">Title </label>
  <input type="text" value="<?= $company->getname() ?>" class="form-control" name="name" id="formGroupExampleInput" placeholder="Example input placeholder">
</div>
<div class="mb-3">
  <label for="formGroupExampleInput2" class="form-label">Genra</label>
  <input type="text" class="form-control" value="<?= $company->getimage() ?>" name="Genra" id="formGroupExampleInput2" placeholder="Another input placeholder">
</div>
<div class="mb-3" >
  <label for="formGroupExampleInput2" class="form-label">id</label>
  <input  type="text" class="form-control" name="id" readonly value="<?= $company->getid() ?>" id="formGroupExampleInput2" placeholder="Another input placeholder">
</div>
<button type="submit" name="submit">submit</button>
</form>

    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>