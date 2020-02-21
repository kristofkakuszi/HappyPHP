<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Planner extends CIO_controller  {

    function __construct()
	{
        parent::__construct();
        $this->load->model('Model_common');
        $this->load->model('Model_example');
		$this->load->helper('swal_helper');
		/** Load CI-Fence library */
		$this->load->library('CIFence');
    }

	public function index()
	{
		$data['setting'] = $this->Model_common->all_setting();
		$data['page_example'] = $this->Model_common->all_page_planner();
		$data['comment'] = $this->Model_common->all_comment();
		$data['social'] = $this->Model_common->all_social();

		$this->load->view('view_header',$data);
		$this->load->view('view_planner',$data);
		$this->load->view('view_footer',$data);
	}
    public function send_planner() 
	{

		$data['setting'] = $this->Model_common->all_setting();

		$error = '';

		if(isset($_POST['form_example'])) {

			$valid = 1;




			
           	 //Ez nagyon fontos rész (adatokat atirom a sajat adataimra amit a weblapon csinaltam)
			$this->form_validation->set_rules('name', 'Name', 'trim|required');
			$this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email');
			$this->form_validation->set_rules('phone', 'Phone', 'trim|required');
			$this->form_validation->set_rules('service', 'Service', 'trim|required');
			$this->form_validation->set_rules('company', 'Company name', 'trim|required');
			$this->form_validation->set_rules('budgets', 'Budgets', 'trim|required');
			$this->form_validation->set_rules('presentation', 'Presentation', 'trim|required');



			$this->form_validation->set_error_delimiters('', '<br>');

			/** Set the validation rule of the CAPTCHA field */
			$this->form_validation->set_rules('captcha', 'answer', ['required', ['captcha_callable', [$this->cifence, 'check']]], ['captcha_callable' => $this->cifence->failMsg]);       

			$this->form_validation->set_error_delimiters('', '<br>');

 			/** Call the CAPTCHA and honeypot checking method
             * First argument: CAPTCHA value
             * Second argument: honeypot value
             * 
             * If honeypot is not used, the second argument is not needed.
             */
            $this->cifence->check($this->input->post('captcha'), $this->input->post('honeypot'));                        

            if($this->cifence->passed) { // Checking the returned CAPTCHA validation value (verified). 

                /** Your submit code comes here */
                $this->submitted = true;
            }
            else { // Denied.
                $this->submitted = false;
            }

			if($this->form_validation->run() == FALSE) {
				$valid = 0;
                $error .= validation_errors();
            }

			if($valid == 1)
		    {



                // ez is fontos
				$msg = '
            		<h3>Az az üzenet ami meg fog jelenni a rendszerüzeneteink között</h3>
					<b>Teljes név: </b> '.$_POST['name'].'<br><br>
					<b>Email: </b> '.$_POST['email'].'<br><br>
					<b>Telefonszám: </b> '.$_POST['phone'].'<br><br>
					<b>Szolgáltatás: </b> '.$_POST['service'].'<br><br>
					<b>Cég név: </b> '.$_POST['company'].'<br><br>
					<b>Büdzsé: </b> '.$_POST['budgets'].'<br><br>
					<b>Projekt bemutatása: </b> '.$_POST['presentation'].'
				';


            	$this->load->library('email');

				$this->email->from($data['setting']['send_email_from']);
				$this->email->to($data['setting']['receive_email_to']);
				$this->email->reply_to($_POST['email'], $_POST['name']);

				$this->email->subject('Ez lesz a tárgya az üzenetnek');
				$this->email->message($msg);

				$this->email->set_mailtype("html");

				$this->email->send();

		       // $success = 'Thank you for sending the email. We will example you shortly.';
			   // $this->session->set_flashdata('success',$success);
			    doSwalAlert('Rendelését rögzítettük', 'Köszönjük az üzeneted, 24 órán belül válaszolunk!', 'success');


		    } 
		    else
		    {
				// $this->session->set_flashdata('error',$error);
				doSwalAlert('Hiba!', 'Hibásan töltötted ki az adatokat!', 'error');
		    }

			redirect(base_url().'planner');
            
        } else {
            
            redirect(base_url().'planner');
        }
    }


}