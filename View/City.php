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

     
        </tr>
        <?php
            foreach($Citys as $City1){
                echo "<tr> 
                    <td>".$City1->getid()."</td>
                    <td>".$City1->getname()."</td>    
                </tr>";
            }
        ?>
            <td></td>
    </table>
</body>
</html>
