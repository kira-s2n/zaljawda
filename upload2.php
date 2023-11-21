<?php
if (isset($_POST['submit']) && isset($_FILES['my_image'])){
include "db_conn.php";

echo "<pre>";

print_r($_FILES['my_image']);
echo "</pre>";


$img_name = $_FILES['my_image']['name'];
$img_size = $_FILES['my_image']['size'];
$tmp_name = $_FILES['my_image']['tmp_name'];
$error = $_FILES['my_image']['error'];

if ($error === 0){
    if($img_size > 6000000){
        $em = "sorry, your file is too lage.";
        header("Location: projectsup.php?error=$em");



    }else{
        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION );
        $img_ex_lc= strtolower($img_ex);


        $allowed_exs = array("jpg" , "jpeg" , "png");

        if(in_array($img_ex_lc,$allowed_exs)){
            $new_img_name = uniqid("IMG-",true).'.'.$img_ex_lc;
            $img_upload_path = 'uploads/'. $new_img_name;
            move_uploaded_file($tmp_name,$img_upload_path);
       $sql = "INSERT INTO image22(image_url2) VALUES('$new_img_name')";
          
       mysqli_query($conn2, $sql2);
           header("Location: view.php");


        }else{
            $em = "you can't upload files of this type";
            header("Location:projectsup.php?$em");
        }


    }



}else{
    $em = "unknown erroe occurred!";
    header("Location: projectsup.php?error=$em");
}




}else{
    header("Location: projectup.php");

}








