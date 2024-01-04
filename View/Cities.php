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
    <h1>List of cities</h1>
    <table>
        <tr>
        <th>ID</th>
        <th>NAME</th>
        <th>POPULATION</th>

     
        </tr>
        <?php
            foreach($cities as $city){
                echo "<tr> 
                    <td>".$city->getObjectId()."</td>
                    <td>".$city->getName()."</td>    
                    <td>".$city->getPopulation()."</td>    
                </tr>";
            }
        ?>
            <td></td>
    </table>
</body>
</html>
