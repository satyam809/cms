<?php
session_start();
require 'config.php';
class Admin
{
    public $con;
    public function __construct()
    {
        try {
            $this->con = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Connected successfully";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function admin_login($username, $password)
    {
        $query = "select * from user where username='$username' and password='$password'"; //print_r($query);die;
        $res = $this->con->query($query);
        //print_r(mysqli_num_rows($res));die;
        if ($res->rowCount() > 0) {
            $_SESSION['login'] = $username;
            header("location:index.php");
        }
    }
    public function check_login()
    {
        //print_r($_SESSION['login']);die;
        if (strlen($_SESSION['login']) == 0) {
            header('location:login.php');
        }
    }
    public function image_fetch()
    {
        $sql = "select * from image_table";
        $res = $this->con->query($sql);
        return $res;
    }
    public function image_insert($array, $count)
    {
        //return $array;
        for ($i = 0; $i < $count; $i++) {
            $sql = "INSERT INTO `image_table`(images) VALUES ('$array[$i]')";
            $this->con->query($sql);
        }
        return true;
    }
    public function image_delete($id)
    {
        $sql = "SELECT * FROM `image_table` WHERE image_id='" . $id . "'";
        //$result=mysqli_query($conn,$sql);
        //print_r($sql);die;
        $result = $this->con->query($sql);
        $filename = $result->fetch(PDO::FETCH_ASSOC); //return $filename['images'];die; //print_r($filename);die;
        $images = path . "admin/images/{$filename['images']}";
        if (file_exists($images)) {
            //return $images;die;
            $del_file = unlink(path . "admin/images/{$filename['images']}");
            if ($del_file) {
                $delete = "DELETE FROM `image_table` WHERE image_id='" . $id . "'";
                $del_image = $this->con->query($delete);
                if ($del_image) {
                    return true;
                }
            }
        }
        //header('location:gallery.php');

    }
    // download
    public function download_insert($file_name, $file)
    {

        $target_file = path . "admin/download_file/" . basename($file);
        $sql = "insert into download_table (file_name,file) values ('$file_name','$file')"; //print_r($sql);
        if ($this->con->query($sql)) {
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                return true;
            }
        }
    }
    public function download_fetch()
    {

        $displayquery = "SELECT * FROM `download_table`";
        $result = $this->con->query($displayquery);
        //print_r($result->rowCount());die;
        return $result;
    }

    public function download_delete($id)
    {
        $sql = "select * from download_table where download_id='$id'"; //print_r($sql);die;
        $result = $this->con->query($sql);
        //$result=mysqli_query($conn,$sql);
        $filename = $result->fetch(PDO::FETCH_ASSOC); //echo '<pre>',print_r($filename,1),'</pre>';die;
        $filePath = "C:/xampp/htdocs/myproject/ims/admin/download_file/$filename[file]";

        if (unlink($filePath)) { //return $filePath;die;
            $delete = "DELETE FROM download_table WHERE download_id='$id'";
            if ($this->con->query($delete)) {
                return true;
            }
        }
    }

    public function download_single($detail_ids)
    {
        $query = "SELECT * FROM download_table where download_id='$detail_ids'";
        $result = $this->con->query($query); //print_r($result);die;
        $row = $result->fetch(PDO::FETCH_ASSOC);
        return $row;
        /*$row=$result->fetch(PDO::FETCH_ASSOC);
            if($result->rowCount()> 0) {
                while(){
                    $response=$row;
                }
            }*/
    }

    public function download_update($id, $file_name, $file)
    {
        if (!empty($file)) {

            $target_file = path . "admin/download_file/" . basename($file); //echo $target_file;
            $check = "select * from download_table where download_id='$id'"; //echo $check;
            $result = $this->con->query($check); //print_r($result);die;
            //$result=mysqli_query($conn,$check);
            $filename = $result->fetch(PDO::FETCH_ASSOC);
            if (file_exists(path . "admin/download_file/$filename[file]")) {
                if (unlink(path . "admin/download_file/$filename[file]")) {
                    $sql = "update download_table set file_name='$file_name',file='$file' where download_id='$id'"; //echo $sql;die;
                    if ($this->con->query($sql)) {
                        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                            return true;
                        } else {
                            return false;
                        }
                    } else {
                        return false;
                    }
                }
            }
        } else {

            if ($this->con->query("update download_table set file_name='$file_name' where download_id='$id'")) {
                return true;
            } else {
                return false;
            }
        }
    }
    public function contact_insert($fname, $lname, $phone, $email)
    {
        $sql = "insert into 
                contact_table(fname,lname,phone,email)
                values('$fname','$lname','$phone','$email')"; //print_r($sql);die;
        //echo '<pre>',print_r($result,1),'</pre>';
        $result = $this->con->query($sql);
        return $result;
    }
    /*public function contact_insert($fname,$lname,$phone,$email){
        $to = "satyamshivam570@gmail.com"; 
            $from = $email;
            $name = $name;
            $contactno = $phone;
            
            $message = $fname."whose Contact No:".$contactno."whose Email-id:".$email. "\n\n" ."";


            $headers = "From:" . $from;
            $headers2 = "From:" . $to;
            mail($to,$subject,$message,$headers);
            return true;
                
    }*/
    public function contact_fetch()
    {

        $displayquery = "SELECT * FROM `contact_table`";
        $result = $this->con->query($displayquery);
        //print_r($result->rowCount());die;
        return $result;
    }
    public function contact_delete_all($id)
    {
        $sql = "DELETE FROM contact_table WHERE id in ($id)";
        if ($this->con->query($sql)) {
            /*if(mysqli_query($obj->con, $sql)){*/
            //echo $id;
            return true;
        }
    }
    public function contact_export()
    {
        $sql = "SELECT * FROM `contact_table`";
        $setRec = $this->con->query($sql);
        $columnHeader = '';
        $columnHeader = "id" . "\t" . "first name" . "\t" . "last name" . "\t" . "phone" . "\t" . "email" . "\t" . "date" . "\t";
        $setData = '';
        while ($rec = $setRec->fetch(PDO::FETCH_ASSOC)) {
            $rowData = '';
            foreach ($rec as $value) {
                $value = '"' . $value . '"' . "\t";
                $rowData .= $value;
            }
            $setData .= trim($rowData) . "\n";
        }

        header("Content-type: application/octet-stream");
        header("Content-Disposition: attachment; filename=contact.xls");
        header("Pragma: no-cache");
        header("Expires: 0");
        echo ucwords($columnHeader) . "\n" . $setData . "\n";
    }
    public function course_insert($course_name, $fee, $duration, $feature)
    {

        $sql = "insert into course_table (course_name,fee,duration,feature) values ('$course_name','$fee','$duration','$feature')"; //print_r($sql);die;
        if ($this->con->query($sql)) {
            return true; //
        }
    }
    public function course_fetch()
    {

        $displayquery = "SELECT * FROM `course_table`";
        $result = $this->con->query($displayquery);
        //print_r($result->rowCount());die;
        return $result;
    }
    public function course_single($detail_ids)
    {
        $query = "SELECT * FROM course_table where course_id='$detail_ids'";
        $result = $this->con->query($query); //print_r($result);die;
        $row = $result->fetch(PDO::FETCH_ASSOC);
        return $row;
        /*$row=$result->fetch(PDO::FETCH_ASSOC);
            if($result->rowCount()> 0) {
                while(){
                    $response=$row;
                }
            }*/
    }

    public function course_update($id, $course_name, $fee, $duration, $feature)
    {
        $sql = "update course_table set course_name='$course_name',fee='$fee',duration='$duration',feature='$feature' where course_id='$id'";
        if ($this->con->query($sql)) {
            return true;
        }
    }
    public function course_delete($id)
    {
        $sql = "DELETE FROM course_table WHERE course_id='$id'";
        if ($this->con->query($sql)) {
            return true;
        }
    }
}
$obj = new Admin();
