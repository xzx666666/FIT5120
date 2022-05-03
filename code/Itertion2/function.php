<?php
function upload(){
    $allowedExts = array("gif", "jpeg", "jpg", "png");
    $temp = explode(".", $_FILES["file"]["name"]);
    $extension = end($temp);     
    if ((($_FILES["file"]["type"] == "image/gif")
    || ($_FILES["file"]["type"] == "image/jpeg")
    || ($_FILES["file"]["type"] == "image/jpg")
    || ($_FILES["file"]["type"] == "image/pjpeg")
    || ($_FILES["file"]["type"] == "image/x-png")
    || ($_FILES["file"]["type"] == "image/png"))
    && ($_FILES["file"]["size"] < 20480000)   
    && in_array($extension, $allowedExts))
    {
        if ($_FILES["file"]["error"] > 0)
        {
            echo "错误：: " . $_FILES["file"]["error"] . "<br>";
            return fasle;
        }else{
                $filename=date("YmdHis").rand(1000,9999).".".end($temp);
                move_uploaded_file($_FILES["file"]["tmp_name"], "uploads/" . $filename);
                return "uploads/".$filename;
        }
    }
    else
    {
        echo "非法的文件格式";
        return false;
    }
}