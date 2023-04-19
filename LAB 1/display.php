<?php
$name=$_POST["un"];
$ename=$_POST["eid"];
?>
<h2>You have entered data</h2>
<table>
    <tr>
    <td>Username is:</td>
    <td><?php echo $name;?></td></tr>
    <tr>
    <td>Emailid is:</td>
    <td><?php echo $ename;?></td></tr>
</table>