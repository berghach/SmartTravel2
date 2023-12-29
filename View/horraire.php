<?php 


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="whr_depth=device-whr_depth, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Liste des livres</h1>
    <table>
        <tr>
        <th>hr_dep</th>
        <th>hr_dep</th>
        <th>Prix</th>
        <th>nhar</th>
        <th>tri9</th>
     
        </tr>
        <?php
            foreach($horraires as $horraire1){
                echo "<tr> 
                    <td>".$horraire1->gethr_dep()."</td>
                    <td>".$horraire1->gethr_arv()."</td>
                    <td>".$horraire1->getPrix()."</td>
                    <td>".$horraire1->getnhar()."</td>
                    <td>".$horraire1->gettri9()."</td>

             
                </tr>";
            }
        ?>
            <td></td>
    </table>
</body>
</html>
