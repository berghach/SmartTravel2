<?php 


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Liste des livres</h1>
    <table>
        <tr>
        <th>id</th>
        <th>Titre</th>
        <th>Genra</th>
     
        </tr>
        <?php
            foreach($companys as $company1){
                echo "<tr> 
                    <td>".$company1->getid()."</td>
                    <td>".$company1->getname()."</td>
                    <td>".$company1->getimage()."</td>
             
                </tr>";
            }
        ?>
            <td></td>
    </table>
</body>
</html>
