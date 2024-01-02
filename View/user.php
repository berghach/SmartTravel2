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
        <th>email</th>
        <th>Titre</th>
        <th>capacite</th>
        <th>Company</th>
        <th>lwuma</th>
        <th>active??</th>
     
        </tr>
        <?php
            foreach($users as $user1){
                echo "<tr> 
                    <td>".$user1->getemail()."</td>
                    <td>".$user1->getname()."</td>
                    <td>".$user1->getpassword()."</td>
                    <td>".$user1->getrole()."</td>
                    <td>".$user1->getDate_register()."</td>
                    <td>".$user1->getis_active()."</td>
             
                </tr>";
            }
        ?>
            <td></td>
    </table>
</body>
</html>
