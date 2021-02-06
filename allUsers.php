<?php
include 'header.php';
include "classes/User.php";

$user = new \classes\User();

$allUsers = $user->getAllUser();

?>

<table>
    <tr>
        <td>id</td>
        <td>name</td>
        <td>surname</td>
        <td>email</td>
        <td>action</td>

    </tr>
    <?php foreach ($allUsers as $user){?>
        <tr>
            <td><?= $user['id']?></td>
            <td><?= $user['name']?></td>
            <td><?= $user['surname']?></td>
            <td><?= $user['email']?></td>
            <td>
                <a href="editUser.php?id=<?=$user['id']?>">edit</a>
            </td>
        </tr>
    <?php }?>
</table>
