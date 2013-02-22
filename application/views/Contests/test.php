<?php 
echo $contest_data[0]['id'];
echo $contest_data[0]['room_type'];
foreach($contest_files as $file) {
echo $file['filename'];
}
?>