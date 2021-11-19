<?php

include 'gestion.php';


//FETCH DATAS FROM CHAT
$sql_msg = "SELECT * FROM `chat` ORDER BY id DESC";
$res_query = $conn->query($sql_msg);


while ($row_msg = $res_query->fetch_row()){
    echo '
    <li>
        <div class="infos">
            <span class="usr_msg">'.$row_msg[4].'</span>
            <span class="usr_date">'.$row_msg[3].'</span>
        </div>
        &nbsp;<p>'.$row_msg[2].'</p>
    </li>
    <hr />';

}