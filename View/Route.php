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
        <th>depart_city</th>
        <th>Arrive_city</th>
        <th>duree</th>
        <th>periode</th>
     
        </tr>
        <?php
            foreach($Routes as $Route1){
                echo "<tr> 
                    <td>".$Route1->getid()."</td>
                    <td>".$Route1->getdepart_city()."</td>
                    <td>".$Route1->getArrive_city()."</td>
                    <td>".$Route1->getduree()."</td>
                    <td>".$Route1->getperiode()."</td>

             
                </tr>";
            }
        ?>
            <td></td>
    </table>
</body>
</html>
