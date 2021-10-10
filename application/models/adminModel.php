<?php
class adminModel extends CI_Model
{
    public function admin_login($username, $password)
    {
        $pass = md5($password);
        $query = "select * from user where username='$username' and password='$pass'";
        //return $query;
        //die;
        $res = $this->db->query($query);
        //print_r(mysqli_num_rows($res));die;
        if ($res->num_rows() == 1) {
            $this->session->set_userdata('login', $username);
            return $username;
        }
    }

    function course_insert($course_name, $fee, $duration, $feature)
    {

        $sql = "insert into course_table (course_name,fee,duration,feature) values ('$course_name','$fee','$duration','$feature')";
        //print_r($sql);die;
        if ($this->db->query($sql)) {
            return true;
        }
    }
    public function course_delete($id)
    {
        $sql = "DELETE FROM course_table WHERE course_id='$id'";
        if ($this->db->query($sql)) {
            return true;
        }
    }
    public function course_single($detail_ids)
    {
        $query = "SELECT * FROM course_table where course_id='$detail_ids'";
        $result = $this->db->query($query); //print_r($result);die;
        $row = $result->result();
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
        if ($this->db->query($sql)) {
            return true;
        }
    }
    public function download_fetch()
    {

        $displayquery = "SELECT * FROM `download_table`";
        $result = $this->db->query($displayquery);
        //print_r($result->rowCount());die;
        return $result;
    }
    public function download_single($detail_ids)
    {
        $query = "SELECT * FROM download_table where download_id='$detail_ids'";
        $result = $this->db->query($query); //print_r($result);die;
        $row = $result->result();
        return $row;
    }
    public function download_insert($file_name, $file)
    {

        $target_file = "assets/admin/download_file/" . $file;
        $sql = "insert into download_table (file_name,file) values ('$file_name','$file')"; //print_r($sql);
        //return $_FILES["file"]["tmp_name"];
        //die;
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            if ($this->db->query($sql)) {
                return true;
            }
        }
    }
    public function download_delete($id)
    {
        $sql = "select * from download_table where download_id='$id'"; //print_r($sql);die;
        $result = $this->db->query($sql);
        //$result=mysqli_query($conn,$sql);
        $filename = $result->row_array();
        //echo '<pre>', print_r($filename), '</pre>';
        //die;
        //return $filename['file'];
        //die;

        $filePath = "assets/admin/download_file/" . $filename['file'];

        if (unlink($filePath)) {

            $delete = "DELETE FROM download_table WHERE download_id='$id'";
            if ($this->db->query($delete)) {
                return true;
            }
        }
    }
    public function download_update($id, $file_name, $file)
    {
        if (!empty($file)) {

            $target_file = "assets/admin/download_file/" . $file;
            $check = "select * from download_table where download_id='$id'"; //echo $check;
            $result = $this->db->query($check); //print_r($result);die;
            $filename = $result->row_array();
            if (file_exists("assets/admin/download_file/$filename[file]")) {
                if (unlink("assets/admin/download_file/$filename[file]")) {
                    $sql = "update download_table set file_name='$file_name',file='$file' where download_id='$id'"; //echo $sql;die;
                    if ($this->db->query($sql)) {
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

            if ($this->db->query("update download_table set file_name='$file_name' where download_id='$id'")) {
                return true;
            } else {
                return false;
            }
        }
    }
    public function image_fetch()
    {
        $sql = "select * from image_table";
        $res = $this->db->query($sql);
        return $res;
    }
    public function image_insert($array, $count)
    {
        //return $array;
        for ($i = 0; $i < $count; $i++) {
            $sql = "INSERT INTO `image_table`(images) VALUES ('$array[$i]')";
            $this->db->query($sql);
        }
        return true;
    }
    public function image_delete($id)
    {
        $sql = "SELECT * FROM `image_table` WHERE image_id='" . $id . "'";
        //$result=mysqli_query($conn,$sql);
        //print_r($sql);die;
        $result = $this->db->query($sql);
        $filename = $result->row_array(); //return $filename['images'];die; //print_r($filename);die;
        $images = "assets/admin/images/{$filename['images']}";
        if (file_exists($images)) {
            //return $images;die;
            $del_file = unlink("assets/admin/images/{$filename['images']}");
            if ($del_file) {
                $delete = "DELETE FROM `image_table` WHERE image_id='" . $id . "'";
                $del_image = $this->db->query($delete);
                if ($del_image) {
                    return true;
                }
            }
        }
    }
    public function contact_insert($fname, $lname, $phone, $email)
    {
        $sql = "insert into 
                contact_table(fname,lname,phone,email)
                values('$fname','$lname','$phone','$email')"; //print_r($sql);die;
        //echo '<pre>',print_r($result,1),'</pre>';
        $result = $this->db->query($sql);
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
        $result = $this->db->query($displayquery);
        //print_r($result->rowCount());die;
        return $result;
    }
    public function contact_delete_all($id)
    {
        $sql = "DELETE FROM contact_table WHERE id in ($id)";
        if ($this->db->query($sql)) {
            /*if(mysqli_query($obj->con, $sql)){*/
            //echo $id;
            return true;
        }
    }
    public function getUserDetails()
    {
        $sql = "SELECT * FROM `contact_table`";
        $setRec = $this->db->query($sql);
        $columnHeader = '';
        $columnHeader = "id" . "\t" . "first name" . "\t" . "last name" . "\t" . "phone" . "\t" . "email" . "\t" . "date" . "\t";
        $setData = '';
        while ($rec = $setRec->result()) {
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
}
