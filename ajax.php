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
if($do=="getImagesList"){
    $isby=$_POST['isby'];
    if($isby=="on"){
        $sql="select * from ko_base order by `like` desc";
    }else{
        $sql="select * from ko_base order by `like` asc";
    }
    $keyword=$_POST['keyword'];
    if($keyword){
        $sql="select * from ko_base where habitat like '%$keyword%'";
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

if($do=="logout"){
    setcookie("admin",null);
}




?>