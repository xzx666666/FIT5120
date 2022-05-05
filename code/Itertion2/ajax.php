<?php
include_once ("database.php");
include_once ("function.php");

$do=$_GET['do'];
if($do=="uploadImg"){
    if($_FILES){
        $image=upload($_FILES);
    }
    $description=$_POST['description'];
    $date=date("Y-m-d H:i:s");
    $habitat_id=$_POST['habitat'];
    $sql="SELECT title from ko_habitat where id='$habitat_id'";
    $habitat=mysqli_fetch_array(mysqli_query($con,$sql),MYSQLI_ASSOC)['title'];
    $sql="INSERT INTO ko_base(image,description,`up_time`,habitat,habitat_id)VALUES('$image','$description','$date','$habitat','$habitat_id')";
    mysqli_query($con,$sql);
    echo "success";
}
if($do=="addMember"){
    if($_FILES){
        $image=upload($_FILES);
    }
    $description=$_POST['description'];
    $name=$_POST['name'];
    $duties=$_POST['duties'];
    $sql="INSERT INTO ko_team(image,description,`name`,duties)VALUES('$image','$description','$name','$duties')";
    mysqli_query($con,$sql);
    echo "success";
}
if($do=="addHabitat"){
    $description=$_POST['description'];
    $title=$_POST['title'];
    $longitude=$_POST['longitude'];
    $latitude=$_POST['latitude'];
    $sql="INSERT INTO ko_habitat(longitude,latitude,description,`title`)VALUES('$longitude','$latitude','$description','$title')";
    mysqli_query($con,$sql);
    echo "success";
}
if($do=="editMember"){
    $id=$_POST['id'];
    $description=$_POST['description'];
    $name=$_POST['name'];
    $duties=$_POST['duties'];
    if($_FILES){
        $image=upload($_FILES);
        $sql="UPDATE ko_team set description='$description',duties='$duties',`name`='$name',image='$image' where id='$id' ";
    }else{
        $sql="UPDATE ko_team set description='$description',duties='$duties',`name`='$name' where id='$id' ";
    }
    
    mysqli_query($con,$sql);
    echo "success";
}
if($do=="editHabitat"){
    $id=$_POST['id'];
    $description=$_POST['description'];
    $title=$_POST['title'];
    $longitude=$_POST['longitude'];
    $latitude=$_POST['latitude'];
    $sql="UPDATE ko_habitat set title='$title',description='$description',longitude='$longitude',`latitude`='$latitude' where id='$id' ";

    mysqli_query($con,$sql);
    echo "success";
}
if($do=="getImagesList"){
    $isby=$_POST['isby'];
    $where = " where status=1";
    if($_POST['searchValue']!=""){
        $searchValue=$_POST['searchValue'];
        $where .=" and habitat like '%$searchValue%'";
    }
    if($isby=="on"){
        $sql="select * from ko_base $where order by `like` desc";
    }else{
        $sql="select * from ko_base $where order by `like` asc";
    }
    $keyword=$_POST['keyword'];
    if($keyword){
        $where.=" and habitat like '%$keyword%'";
        $sql="select * from ko_base $where";
    }
    $result=mysqli_query($con,$sql);
    $rows=mysqli_fetch_all($result,MYSQLI_ASSOC);
    foreach ($rows as $k => $v) {
        if($_COOKIE['like'.'_'.$v['id']]=='on'){
            $rows[$k]['likeStatus']="on";
        }else{
            $rows[$k]['likeStatus']="off";
        }
    }
    // echo $sql;die;
    echo json_encode($rows);
}
if($do=="getMemberList"){
    $sql="select * from ko_team";
    $result=mysqli_query($con,$sql);
    $rows=mysqli_fetch_all($result,MYSQLI_ASSOC);
    echo json_encode($rows);
}

if($do=="getHabitatList"){
    $sql="select * from ko_habitat";
    $result=mysqli_query($con,$sql);
    $rows=mysqli_fetch_all($result,MYSQLI_ASSOC);
    echo json_encode($rows);
}
if($do=="getHabitatListForMap"){
    $sql="select * from ko_habitat";
    $result=mysqli_query($con,$sql);
    $rows=mysqli_fetch_all($result,MYSQLI_ASSOC);
    foreach ($rows as $k=>$v){
        $data[$k]['type']="Feature";
        $data[$k]['properties']['message']=$v['id'];
        $data[$k]['properties']['iconSize']=[40,40];
        $data[$k]['geometry']['type']='Point';
        $data[$k]['geometry']['coordinates']=[$v['longitude'], $v['latitude']];
    }
    echo json_encode($data);
}
if($do=="getHabitat"){
    $id=$_POST['id'];
    $sql="select * from ko_habitat where id='$id'";
    $result=mysqli_query($con,$sql);
    $rows=mysqli_fetch_array($result,MYSQLI_ASSOC);
    echo json_encode($rows);
}
if($do=="delData"){
    $id=$_POST['id'];
    $db=$_POST['db'];
    $sql="DELETE from $db where id=$id ";
    echo $sql;
    mysqli_query($con,$sql);
}
if($do=="updateImage"){
    $id=$_POST['id'];
    $habitat=$_POST['habitat'];
    $habitat_id=$_POST['habitat'];
    $sql="SELECT title from ko_habitat where id='$habitat_id'";
    $habitat=mysqli_fetch_array(mysqli_query($con,$sql),MYSQLI_ASSOC)['title'];
    $status=$_POST['status'];
    $like=$_POST['like'];
    $description=$_POST['description'];
    $sql="UPDATE ko_base set habitat='$habitat',status='$status',`like`='$like',habitat_id='$habitat_id',description='$description' where id='$id' ";
    mysqli_query($con,$sql);
    echo $sql;
}
if($do=="updateLike"){
    $id=$_POST['id'];
    $action=$_POST['action'];
    
    if($action=="add"){
        setcookie("like"."_".$id,"on");
        $sql="UPDATE ko_base set `like`=`like`+1 where id='$id' ";
    }else{
        setcookie("like"."_".$id,"off");
        $sql="UPDATE ko_base set `like`=`like`-1 where id='$id' ";
    }
    mysqli_query($con,$sql);
 
}
if($do=="checkLogin"){
    $username=$_POST['username'];
    $password=$_POST['password'];
    if($username=="admin" and $password=="admin888"){
        echo "success";
        setcookie("admin","admin");
    }else{
        echo "error";
    }
}

if($do=="checkLoginUser"){
    setcookie("user","user");
}

if($do=="checkLoginUserStatus"){
    if($_COOKIE['user']=="user"){
        echo "success";
    }else{
        echo "error";
    }
}

if($do=="logout"){
    setcookie("admin",null);
}




?>