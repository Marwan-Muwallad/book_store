<?php 
include "../assets/db/config.php";


if (isset($_POST['category_name'])) {
   $name = $_POST['category_name'];
   if (empty($name)) {
       $em = "The Category Name is required";
       header("Location:../?page=add-category&error=$em");
       exit;
   }else {
       $sql = "INSERT INTO categories (name) VALUES (?)";
       $stmt = $conn->prepare($sql);
       $res = $stmt->execute([$name]);
       if ($res) {
        $sm = "Successfully Created!";
        header("Location:../?page=add-category&success=$sm");
        exit;
       }else {
        $em = "Unknown Error Occured";
        header("Location:../?page=add-category&error=$em");
        exit;
       }
   }
}else {
    header("Location:../?page=admin");
    exit;
}

?>