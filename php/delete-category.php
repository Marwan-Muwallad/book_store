<?php 
include "../assets/db/config.php";


if (isset($_GET['id'])) {
    
    $id = $_GET['id'];
   
   if (empty($id)) {
       $em = "Error Occured!";
       header("Location:../?page=admin&error=$em");
       exit;
   }else {

        
        $sql = "DELETE FROM categories WHERE id=?";
        $stmt = $conn->prepare($sql);
        $res = $stmt->execute([$id]);
        if($res) {
            $sm = " The Category Successfully Deleted!";
            header("Location:../?page=admin&success=$sm");
            exit;
           }else {
            $em = "Unknown Error Occured";
            header("Location:../?page=amin&error=$em");
            exit;
           }
      
       
   }
}else {
    header("Location:../?page=admin");
    exit;
}

?>