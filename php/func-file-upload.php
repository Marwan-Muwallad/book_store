<?php 
#File Upload Helper Function
function upload_file($files, $allowed_exs, $path)
{
    $file_name = $files['name'];
    $tmp_name  = $files['tmp_name'];
    $error = $files['error'];
  
    if ($error === 0) {
       $file_ex = pathinfo($file_name, PATHINFO_EXTENSION);
       $file_ex_lc = strtolower($file_ex);

       if (in_array($file_ex_lc, $allowed_exs)) {
          $new_file_name = uniqid("", true).'.'.$file_ex_lc;
          $file_upload_path = '../upload/'.$path.'/'.$new_file_name;
          move_uploaded_file($tmp_name, $file_upload_path);
            $sm['status'] = 'success';
            $sm['data'] = $new_file_name;

            return $sm;

       }else {
        $em['status'] = 'error';
        $em['data'] = "You Can not upload files of this type!";

        return $em;
       }
    }else {
        $em['status'] = 'error';
        $em['data'] = 'Error Occured While Uploading!';

        return $em;
    }
}

?>