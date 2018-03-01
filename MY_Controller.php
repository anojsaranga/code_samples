<?php
// This is custom controller
class MY_Controller extends CI_controller 
{

    function __construct()
    {

        parent::__construct();

    }			//function __construct()

    //function to get the login status
	public function isLoggedIn()
	{
	
		if($this->session->userdata('loginStatus'))
		{
			return 1;
		}
		else
		{
			return 0;

		}			//if($this->session->userdata('loginStatus'))

	}			//public function isLoggedIn()
	
	//function to get user type
	public function getUserType()
	{
		$userType = $this->session->userdata('userType');
		if(isset($userType))
		{
			return $userType;
		}
		else
		{
			return 0;

		}			//if(isset($userType))

	}			//public function getUserType()

	//function to get the current user id
	public function getUserId()
	{
		$userId = $this->session->userdata('userId');
		
		if(isset($userId))
		{
			return $userId;
		}
		else
		{
			return 0;

		}			//if(isset($userId))

	}			//public function getUserId()

	//function to get the current user name
	public function getUserName()
	{
		$userName = $this->session->userdata('userName');
		if(isset($userName))
		{
			return $userName;
		}
		else
		{
			return 0;

		}			//if(isset($userName))

	}			//public function getUserName()

	//function to load default page for user
	public function defaultPageLoadForUser()
	{							// check usre logged status
		if($this->isLoggedIn() == 1)
		{
			if(null != $this->getUserType() && $this->getUserType() != '')
			{
				switch ($this->getUserType())
				{
									// Admin for adminpage
					case 'Administrator':
						header('Location: '.base_url().'index.php/backend/admindashboard');
						break;
					
					case 'Employee':	// Visitor  for home page
						header('Location: '.base_url().'index.php/backend/employeedashboard');
						break;					

					case 'Customer':	// Visitor  for home page
						header('Location: '.base_url().'index.php/backend/customerdashboard');
						break;					

					default:			// Geuss user
						header('Location: '.base_url()."index.php/backend/login");				
						break;

				}				//switch ($this->getUserType())

			}					
			else
			{
					header('Location: '.base_url()."index.php/backend/login");		

			}				//if(null != $this->getUserType() && $this->getUserType() != '')
			
		}								// if user not logged to system redirect to login page
		else
		{
			header('Location: '.base_url()."index.php/backend/login");

		}			//if($this->isLoggedIn() == 1)

	}			//public function defaultPageLoadForUser()

	//function to get today date
	public function getTodayDate()
	{
		$this->load->helper('date');
        // get time stamp
        $time = time();
        
        $dateString = "%Y-%m-%d";
        return mdate($dateString, $time);
		
	}			//public function getTodayDate()

	//function to get today date with time
	public function getTodayDateWithTime()
	{
		$this->load->helper('date');
        // get time stamp
        $time = time();
        
        $dateString = "%Y-%m-%d-%h-%i";
        return mdate($dateString, $time);
		
	}			//public function getTodayDateWithTime()

	//function to set date unix
	public function unixToMysql($unix)
	{
		$dateString = "%Y-%m-%d";                        
        return mdate($dateString, $unix);
		
	}			//public function unixToMysql($unix)

	//function to send mail
	function create_email($toEmail,$subject,$emailContent)
	{
            $config = Array(
                            'protocol'  => 'smtp',
                            'smtp_host' => 'ssl://smtp.googlemail.com',
                            'smtp_port' =>  465,
                            'smtp_user' => 'webkit.anoj123@gmail.com',
                            'smtp_pass' => 'abc@123',
                            'charset'   => 'utf-8',
                            'wordwrap'  => TRUE,
                            'mailtype'  => 'html'
                            );

            $this->load->library('email',$config);


            $this->email->set_newline("\r\n");
            $this->email->from('webkit.anoj123@gmail.com');
            $this->email->to($toEmail);
            $this->email->subject($subject);
            $this->email->message($emailContent);

	    //check the email is send or not
	    if($this->email->send())
	    {
			$returnValues['status']  = 'success';
			$returnValues['msg']     = 'Your email was sent.';
	    }
	    else
	    {		     
			$returnValues['status'] = "error";
			$returnValues['msg']    = show_error($this->email->print_debugger());

	    }			//if($this->email->send())

	    	return $returnValues;
		
	}			//function createEmail($toEmail,$subject,$emailContent)

	//function to check word limit
	public function wordsLimit($string,$word_limit)
	{

		$words = explode(' ', $string, ($word_limit));
		if(count($words) > $word_limit)
		{
			array_pop($words);
		}
		else
		{
			return implode(' ', $words).'..';		

		}			//if(count($words) > $word_limit)
		
	}			//public function wordsLimit($string,$word_limit)

}			//class MY_Controller extends CI_controller 

?>