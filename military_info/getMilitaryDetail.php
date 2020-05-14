<?php
 include('../session.php');
$militaryid = $_POST['militaryid'];
 $sql_lang = "
  SELECT tlk.*,tllr.level_id rid, tllr.level_name reading,tlls.level_id sid ,tlls.level_name speaking,tllw.level_id wid,tllw.level_name writting 
  ,tllu.level_id  uid,tllu.level_name understanding  
  ,tl.lang_name , tl.id  langid,concat(te.lastname,' ', te.firstname ,' ', te.surname) full_name,te.id empid
FROM  $tbl_language_knowledge tlk  
inner join  $tbl_employees te on tlk.emp_id=te.id 
inner  join  $tbl_emp_lang tl  on tlk.lang_id=tl.id
left join $tbl_lang_level tllr on tlk.lang_reading=tllr.level_id  and tllr.lang_short_name='az'
left join $tbl_lang_level tlls on tlk.lang_speaking=tlls.level_id and tlls.lang_short_name='az'
left join $tbl_lang_level tllw on tlk.lang_writing=tllw.level_id and tllw.lang_short_name='az'
left join $tbl_lang_level tllu on tlk.lang_understanding=tllu.level_id and tllu.lang_short_name='az'
where tlk.lang_status=1 and  te.emp_status=1 and  tlk.id='$langid' ";
	
 $result_lang = $db->query($sql_lang);
 $data = array();
if ($result_lang->num_rows > 0) {
			// output data of each row
 $row_lang = $result_lang->fetch_assoc();
 $data = $row_lang;
}
	 
echo json_encode($data);
?>