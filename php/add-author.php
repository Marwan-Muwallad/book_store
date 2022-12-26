<?php 
include "../assets/db/config.php";


if (isset($_POST['author_name'])) {
   $name = $_POST['author_name'];
   if (empty($name)) {
       $em = "The Author Name is required";
       header("Location:../?page=add-author&error=$em");
       exit;
   }else {
       $sql = "INSERT INTO authors (name) VALUES (?)";
       $stmt = $conn->prepare($sql);
       $res = $stmt->execute([$name]);
       if ($res) {
        $sm = "Successfully Created!";
        header("Location:../?page=add-author&success=$sm");
        exit;
       }else {
        $em = "Unknown Error Occured";
        header("Location:../?page=add-author&error=$em");
        exit;
       }
   }
}else {
    header("Location:../?page=admin");
    exit;
}

?>