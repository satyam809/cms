<?php
//session_start();
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('adminModel');
        // if (!$this->session->userdata('login')) {
        //     $this->load->view('admin/logout');
        // }
    }
    public function login()
    {
        if ($this->input->post('type') == 'login') {

            $result = $this->adminModel->admin_login($_POST['username'], $_POST['password']);
            //echo $result;
            //die;
            if ($result) {
                echo json_encode(array("message" => "{$result},", "status" => true));
            }
            die;
        }
        $this->load->view('admin/login');
    }
    public function logout()
    {
        $this->session->unset_userdata('login');
        $this->load->view('admin/login');
    }
    public function index()
    {
        if (!$this->session->userdata('login')) {
            $this->load->view('admin/login');
        } else {
            $this->load->view('admin/index');
        }
    }

    public function addCourses()
    {
        //$this->check_login();
        if (!$this->session->userdata('login')) {
            $this->load->view('admin/login');
        } else {
            if ($this->input->post('type') == 'insert') {
                $course_name = $_POST['course_name'];
                $fee = $_POST['fee'];
                $duration = $_POST['duration'];
                $feature = $_POST['feature'];
                $result = $this->adminModel->course_insert($course_name, $fee, $duration, $feature);
                if ($result == true) {
                    echo json_encode(array("message" => "Course added successfully", "status" => true));
                    die;
                } else {
                    echo json_encode(array("message" => "Something wrong", "status" => false));
                    die;
                }
            }
            $this->load->view('admin/add_course');
        }
    }

    public function viewCourses()
    {
        if (!$this->session->userdata('login')) {
            $this->load->view('admin/login');
        } else {
            $this->load->view('admin/view_course');
        }
    }
    public function singleCourse()
    {
        if (!$this->session->userdata('login')) {
            $this->load->view('admin/login');
        } else {

            $result = $this->adminModel->course_single($_POST['id']);
            if ($result != "") {
                echo json_encode($result);
            } else {
                echo json_encode(array('message' => 'something wrong', 'status' => false));
            }
        }
    }
    public function editCourses()
    {
        if (!$this->session->userdata('login')) {
            $this->load->view('admin/login');
        } else {
            if ($this->input->post('type') == 'update') {
                $result = $this->adminModel->course_update($_POST['update_id'], $_POST['course_name'], $_POST['fee'], $_POST['duration'], $_POST['feature']);

                if ($result == true) {
                    echo json_encode(array('message' => 'Updated successfully', 'status' => true));
                    die;
                } else {
                    echo json_encode(array('message' => 'Not Updated', 'status' => false));
                    die;
                }
            }
            $this->load->view('admin/edit_course');
        }
    }
    public function deleteCourse()
    {
        if (!$this->session->userdata('login')) {
            $this->load->view('admin/login');
        } else {
            $id = $_POST['id']; //echo $file_name;
            $result = $this->adminModel->course_delete($id);
            //echo $result;die();
            if ($result == true) {
                echo json_encode(array("message" => "Deleted successfully", "status" => true));
            } else {
                echo json_encode(array("message" => "something wrong", "status" => false));
            }
        }
    }
    public function downloads()
    {
        if (!$this->session->userdata('login')) {
            $this->load->view('admin/login');
        } else {
            $this->load->view('admin/downloads');
        }
    }
    public function viewDownloads()
    {
        $result = $this->adminModel->download_fetch();
        //echo "<pre>";
        //print_r($result->fetchAll(PDO::FETCH_ASSOC));
        $output = $result->result();
        if ($output != "") {
            echo json_encode($output);
        } else {
            echo json_encode(array('message' => 'No images', 'status' => false));
        }
    }
    public function singleDownload()
    {
        $result = $this->adminModel->download_single($_POST['id']);
        if ($result != "") {
            echo json_encode($result);
        } else {
            echo json_encode(array('message' => 'something wrong', 'status' => false));
        }
    }
    public function addDownload()
    {
        $file_name = $_POST['file_name']; //echo $file_name;

        $file = $_FILES['file']['name']; //echo $file;die;
        $obj = $this->adminModel->download_insert($file_name, $file);
        //echo $obj;
        //die;
        if ($obj) {
            echo json_encode(array('message' => 'Added successfully', 'status' => true));
        } else {
            echo json_encode(array('message' => 'Something wrong', 'status' => false));
        }
    }
    public function deleteDownload()
    {
        $id = $_POST['id'];

        $result = $this->adminModel->download_delete($id);
        if ($result) {
            echo json_encode(array("message" => "Deleted successfully", "status" => true));
        } else {
            echo json_encode(array("message" => "something wrong", "status" => false));
        }
    }
    public function editDownload()
    {
        $id = $_POST['download_id']; //echo $id;die;
        $file_name = $_POST['file_name']; //echo $file_name;

        $file = $_FILES['file']['name']; //echo $file;die;
        $obj = $this->adminModel->download_update($id, $file_name, $file);
        if ($obj) {
            echo json_encode(array('message' => 'Updated successfully', 'status' => true));
        } else {
            echo json_encode(array('message' => 'Not Updated', 'status' => false));
        }
    }
    public function gallery()
    {
        if (!$this->session->userdata('login')) {
            $this->load->view('admin/login');
        } else {
            $this->load->view('admin/gallery');
        }
    }
    public function fetchgallery()
    {
        $result = $this->adminModel->image_fetch();
        //echo "<pre>";
        //print_r($result->fetchAll(PDO::FETCH_ASSOC));
        $output = $result->result();
        if ($output != "") {
            echo json_encode($output);
        } else {
            echo json_encode(array('message' => 'No images', 'status' => false));
        }
    }
    public function uploadgallery()
    {
        $count = count($_FILES['images']['name']);
        for ($i = 0; $i < $count; $i++) {
            $photo = $_FILES['images']['name'][$i];
            $target = "assets/admin/images/" . basename($photo);
            move_uploaded_file($_FILES["images"]["tmp_name"][$i], $target);
        }
        $result = $this->adminModel->image_insert($_FILES['images']['name'], $count);
        if ($result) {
            echo json_encode(array("message" => "Images are uploaded successfully", "status" => true));
        } else {
            echo json_encode(array("message" => "Images not uploaded", "status" => false));
        }
    }
    public function deletegallery()
    {
        $id = $_POST["id"]; //echo $id;die();
        $result = $this->adminModel->image_delete($id); //echo $result;die();
        if ($result === true) {
            echo json_encode(array("message" => "Delete successfully", "status" => true));
        } else {
            echo json_encode(array("message" => "Image not deleted", "status" => false));
        }
    }
    public function contact()
    {
        if (!$this->session->userdata('login')) {
            $this->load->view('admin/login');
        } else {
            $this->load->view('admin/contact');
        }
    }
    public function fetchcontact()
    {
        $result = $this->adminModel->contact_fetch();
        //echo "<pre>";
        //print_r($result->fetchAll(PDO::FETCH_ASSOC));
        $output = $result->result();
        if ($output != "") {
            echo json_encode($output);
        } else {
            echo json_encode(array('message' => 'No course', 'status' => false));
        }
    }
    public function exportcontact()
    {
        /* file name */
        $filename = 'users_' . date('Ymd') . '.csv';
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/csv; ");
        /* get data */
        $usersData = $this->adminModel->getUserDetails();
        /* file creation */
        $file = fopen('php:/* output', 'w');
        $header = array("First name", "last name", "Phone", "Email");
        fputcsv($file, $header);
        foreach ($usersData as $key => $line) {
            fputcsv($file, $line);
        }
        fclose($file);
        exit;
    }
}
