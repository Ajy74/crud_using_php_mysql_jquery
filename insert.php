<?php
include('database.php');
 

// $image = $_FILES['image'];

 
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name=$_POST['name'];
    $gender=$_POST['gender'];
    $address=$_POST['address'];
    $phone=$_POST['phone'];
    $post=$_POST['post'];

    $img = $_FILES['pimage'];  


    if ($img['size']) {

        $filename = $img['name'];
        $fileerror = $img['error'];
        $filetmp = $img['tmp_name'];

        $fileext = explode('.', $filename);
        $filecheck = strtolower(end($fileext));

        $extstored = array('png', 'jpg', 'jpeg'); //it accept png ,jpg,jpeg file

        if (in_array($filecheck, $extstored)) {

            
            $destfile = 'profileimages/' . $filename;  //local destination path
            move_uploaded_file($filetmp, $destfile);  //to store in local destination 

            $image = 1;   //it will be used below to check whether image file is coing or not
        }

       
        if ($image) {

             // if image file comes..then upload in databse
            
                $mysqli->query("insert into employee_basics (name, gender, address,phone,post,image) values ('$name', '$gender', '$address','$phone','$post','$filename')");

                $res = $mysqli->query("select id from employee_basics order by id desc");
                $row = $res->fetch_row();
                $id = $row[0];

                header('location:index.php'); 
        
        }
        else{
            // if image file is not coming then do something you want....
            echo "there is problem to upload image";
        }

    }
}

?>