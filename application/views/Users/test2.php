<?php
Print_r($contest_pics);
echo '<br><br>'
?>
<BR><BR>
<?PHP
foreach($contest_pics as $contest) {
if (!empty($contest['files'])){
echo $contest['files'][0]['filename'];
echo '<BR><BR>';
}
else {echo 'no picture';}}
?>
<br><br>
