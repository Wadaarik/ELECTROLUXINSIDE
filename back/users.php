<?php

include 'gestion.php';


//FETCH USERS
$sql_users = "SELECT * FROM `electroluxinside` ORDER BY id DESC";
$res_users = $conn->query($sql_users);

while ($row_users = $res_users->fetch_row()) {
    echo '
    <li>
        <div class="infos">
            <span class="usr_mail">'.$row_users[1].'</span>
            <span class="usr_conn">'.$row_users[3].'</span>
        </div>
        &nbsp;<p>'.$row_users[4].'</p>
    </li>
    <hr />';
}
?>