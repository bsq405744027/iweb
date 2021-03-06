<?php
/**
*添加收藏记录
*请求参数：
  uid-用户ID，必需
  cid-课程ID，必需
*输出结果：
* {"code":1}//已收藏
* 或
* {"code":2}//未收藏
*/
@$uid = $_REQUEST['uid'] or die('uid required');
@$cid = $_REQUEST['cid'] or die('cid required');

require('init.php');

//查看该课程是否已被收藏，有则返回code=1，无则返回code=2
$sql = "SELECT fid FROM favorite WHERE userId=$uid AND courseId=$cid";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_row($result);
if($row){ //存在
  $fid = $row[0];
  $output['code'] = 1;
  $output['fid']=$fid;
}else {   //不存在
  $output['code'] = 2;
}

echo json_encode($output);






