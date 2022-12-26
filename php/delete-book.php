<?php 
include "../assets/db/config.php";


if (isset($_GET['id'])) {
    
    $id = $_GET['id'];
   
   if (empty($id)) {
       $em = "Error Occured!";
       header("Location:../?page=admin&error=$em");
       exit;
   }else {

        $sql = "SELECT * FROM books WHERE id=?";
       $stmt = $conn->prepare($sql);
       $stmt->execute([$id]);
       $the_book = $stmt->fetch();
       
       if ($stmt->rowCount() > 0) {
        $sql2 = "DELETE FROM books WHERE id=?";
        $stmt2 = $conn->prepare($sql2);
        $res = $stmt2->execute([$id]);
        if ($res) {
            $cover = $the_book['cover'];
            $document = $the_book['document'];
            $c_b_c = "../upload/cover/$cover";
            $c_d = "../upload/documents/$document";
            unlink($c_b_c);
            unlink($c_d);
            
         $sm = "Successfully Deleted!";
         header("Location:../?page=admin&success=$sm");
         exit;
        }else {
         $em = "Unknown Error Occured";
         header("Location:../?page=admin&error=$em");
         exit;
        }
       }else {
        $em = "Error Occured!";
        header("Location:../?page=admin&error=$em");
        exit;
       }
       
   }
}else {
    header("Location:../?page=admin");
    exit;
}

?>