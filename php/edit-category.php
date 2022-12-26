<?php 
include "../assets/db/config.php";


if (isset($_POST['category_id']) && isset($_POST['category_name'])) {
    $id = $_POST['category_id'];
    $name = $_POST['category_name'];
   if (empty($name)) {
       $em = "The Category Name is required";
       header("Location:../?page=edit-category&error=$em&id=$id");
       exit;
   }else {
       $sql = "UPDATE categories  SET name=? WHERE id=?";
       $stmt = $conn->prepare($sql);
       $res = $stmt->execute([$name,$id]);
       if ($res) {
        $sm = "Successfully Updated!";
        header("Location:../?page=edit-category&success=$sm&id=$id");
        exit;
       }else {
        $em = "Unknown Error Occured";
        header("Location:../?page=edit-category&error=$em&id=$id");
        exit;
       }
   }
}else {
    header("Location:../?page=admin");
    exit;
}

?>