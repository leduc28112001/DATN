<a href="?room=emails" class="back"><i class="fa-solid fa-left-long"></i></a>
<table>
    <?php 
    if(isset($result)){
        ?>
            <tr>
                <th>Message</th>
            </tr>
            <tr>
                <td class="textleft"><?= $result['message'] ?></td>
            </tr>
        <?php // HTML
    }else{
        messRed("No Data");
    }
    ?>
</table>