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
        <th>capacite</th>
        <th>Company</th>
     
        </tr>
        <?php
            foreach($BUSs as $BUS1){
                echo "<tr> 
                    <td>".$BUS1->getid()."</td>
                    <td>".$BUS1->getname()."</td>
                    <td>".$BUS1->getcapacite()."</td>
                    <td>".$BUS1->getCompany()."</td>
             
                </tr>";
            }
        ?>
            <td></td>
    </table>
</body>
</html>
