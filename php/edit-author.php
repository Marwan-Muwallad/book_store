<?php 
include "../assets/db/config.php";


if (isset($_POST['author_id']) && isset($_POST['author_name'])) {
    $id = $_POST['author_id'];
    $name = $_POST['author_name'];
   if (empty($name)) {
       $em = "The Author Name is required";
       header("Location:../?page=edit-author&error=$em&id=$id");
       exit;
   }else {
       $sql = "UPDATE authors  SET name=? WHERE id=?";
       $stmt = $conn->prepare($sql);
       $res = $stmt->execute([$name,$id]);
       if ($res) {
        $sm = "Successfully Updated!";
        header("Location:../?page=edit-author&success=$sm&id=$id");
        exit;
       }else {
        $em = "Unknown Error Occured";
        header("Location:../?page=edit-author&error=$em&id=$id");
        exit;
       }
   }
}else {
    header("Location:../?page=admin");
    exit;
}

?>