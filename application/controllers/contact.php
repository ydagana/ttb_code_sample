<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');class Contact extends CI_Controller {		public function index()	{		$page_data = array();		$page_data['title'] = 'Contact Tell The Boss Staff and Start Getting Your Customer\'s Feedback';		$page_data['description'] = 'Start Our Customer Feedback Service Today and Get Your Customers Feedback In Real Time - Contact Us to Schedule a Demo today!';		$page_data['current'] = 'contact';				$this->load->view('general/header', $page_data);		$this->load->view('general/slideshow');		$this->load->view('general/contact');		$this->load->view('general/footer');	}		public function submit()	{		// Load and configure email client		$this->load->library('email');		$config['protocol'] = 'sendmail';		$config['mailpath'] = '/usr/sbin/sendmail';		$config['charset'] = 'iso-8859-1';		$config['wordwrap'] = TRUE;		$this->email->initialize($config);				// Load the submitter's info		$name = $this->input->post('name');		$company_name = $this->input->post('company_name');		$emailaddress = $this->input->post('email');		$phone = $this->input->post('phone');		$message = $this->input->post('message');		// Send the email to info@telltheboss.com		$this->email->from('info@telltheboss.com', 'TTB Contact');		$this->email->to('info@telltheboss.com');		$this->email->subject("Message from $name");		$this->email->message("Name: $name \r\n Company Name: $company_name \r\n Email: $emailaddress \r\n Phone number: $phone \r\n Message: \r\n $message"); 		$this->email->send();				$page_data = array();		$page_data['title'] = 'Tell The Boss - We will contact you soon';		$page_data['current'] = 'contact';				$this->load->view('general/header', $page_data);		$this->load->view('general/slideshow');		$this->load->view('general/contact_thank_you');		$this->load->view('general/footer');	}}