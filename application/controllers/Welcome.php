<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	public function index()
	{
		$this->load->view('index');
	}
	public function about()
	{
		$this->load->view('about');
	}
	public function courses()
	{
		$this->load->view('courses');
	}
	public function downloads()
	{
		$this->load->view('downloads');
	}
	public function gallery()
	{
		$this->load->view('gallery');
	}
	public function contact()
	{
		$this->load->view('contact');
	}
}
