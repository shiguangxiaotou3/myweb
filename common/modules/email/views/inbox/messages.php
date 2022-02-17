<?php
/** @var $this yii\web\View */
/** @var $content string */
/** @var  $data  array */


$str= '';
if(is_array($data) and !empty($data)){

    foreach ($data as $message){
        $str .='<tr>';
        $str .= "<td><input type='checkbox' value='".$message['Number']."'></td>";
        $str .= "<td class='mailbox-star'><a href='#'><i class='fa fa-star text-yellow'></i></a></td>";
        $str .= "<td class=\"mailbox-name\"><a href=\"read-mail.html\">".substr($message['From'],0,30)."</a></td>";
        $str .= "<td class=\"mailbox-subject\"><b>".substr($message['Subject'],0,100)."</b> .......";
        $str .='<td class="mailbox-attachment"><i class="fa fa-paperclip"></i></td>';
        $str .="<td class='mailbox-date'>"/*MaxDifferTime($message['Date'], time())*/."前</td>";
        $str .="</tr>";
    }
}
?>
<table class="table table-hover table-striped">
    <trbody>
        <?= $str ?>
    </trbody>
</table>
