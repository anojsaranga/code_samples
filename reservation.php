<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// require_once("/stripe-php/lib/Stripe.php");
/**
 * Reservation
 *
 * @package	    hotelreservation
 * @category	Reservation
 * @author	    
 * @link	    
 */

class Reservation extends MY_Controller
{

/**
 * Redirect to reservation.php view. If that view is not available show 404 error message. 
 *
 * @access	public
 * @param	string
 * @return	reservation view
 */

	public function index($page = 'reservation')
	{
		if ( ! file_exists('application/views/hotelreservation'.$page.'.php'))
		{
			show_404();
		}else
		{
				$data 						= array();
				$data['CheckIn_Date'] 		= $_POST['checkin_date'];
				$data['CheckOut_Date'] 		= $_POST['checkout_date'];
				$data['Hotel_Name'] 		= $_POST['hotel_name'];
				$data['Hotel_Address'] 		= $_POST['hotel_address'];
				$data['Room_Type'] 			= $_POST['Room_Type'];
				$data['Number_of_Adults'] 	= $_POST['Number_of_Adults'];
				$data['Number_of_Children'] = $_POST['Number_of_Children'];
				$data['Total_Rate'] 		= $_POST['hotel_rate'];
				$data['Room_Id'] 			= $_POST['Room_Id'];
				$data['Hotel_Code'] 		= $_POST['hotel_code']; 

				$this->load->view('hotel_home.php',$data);
			
		}
	}

	//function to get all room category details
    public function getAllRoomCategory()
    {
        $this->load->model('room_category_model');   

        $allRoomCategoryDetails = $this->room_category_model->select('room_category');

        if(null != $allRoomCategoryDetails && $allRoomCategoryDetails != "")
        {
            return $allRoomCategoryDetails;

        }           //if(null != $allHotelHallTypeDetails && $allHotelHallTypeDetails != "")

    }           //public function getAllRoomCategory()

    //function to get all hotels details
    public function getAllHotels()
    {
        $this->load->model('hotel_model');   

        $allHotelDetails = $this->hotel_model->select('hotel');

        if(null != $allHotelDetails && $allHotelDetails != "")
        {
            return $allHotelDetails;

        }           //if(null != $allHotelFacilityDetails && $allHotelFacilityDetails != "")

    }           //public function getAllHotels()

	/**
	 * Fill reserved customer data in user table 
	 *
	 * @access	public
	 * @param	string
	 * @return	Status and message (whether user data inserted or not)
	 */

	public function get_customer_reservation_details()
	{
		$return_values           = array();
        $return_values['status'] = "";
        $return_values['msg']    = "";

        if($this->session->userdata('logged_in') == FALSE )
        {
    	   
			if((isset($_POST['submitMode'])) && $_POST['submitMode'] =='ajax' )
			{

				isset($_POST['title']) 		    ? $data['title']             	= $_POST['title'] 	        : $data['title']    	     = 'NULL';
				isset($_POST['firstName']) 	    ? $data['first_name']         	= $_POST['firstName'] 	    : $data['first_name']    	 = 'NULL';
				isset($_POST['lastName']) 	    ? $data['last_name']          	= $_POST['lastName']  	    : $data['last_name']     	 = 'NULL';
				isset($_POST['address']) 	    ? $data['address']           	= $_POST['address']  	    : $data['address']    	     = 'NULL';
				isset($_POST['email']) 	    	? $data['email']             	= $_POST['email'] 	    	: $data['email']    	     = 'NULL';
				isset($_POST['telNumber']) 	    ? $data['telephone']            = $_POST['telNumber']   	: $data['telephone']         = 'NULL';

				

				//You must check user currently log or not---> very important. Else insert the records.
				$data['us_type_id'] 			= 3;
				$data['gender'] 				= '';
				$data['password'] 				= '';
				$data['activation_code'] 		='';
				$this->load->model('user_model');
				// echo $this->user_model->insert('user',$data);
				$add_user = $this->user_model->insert('user',$data);
				if($add_user >1)
				{
					$return_values['userNewId'] =$this->db->insert_id();
					$return_values['status'] = "success";

	                $return_values['msg']    = "User successfully added";
				}else
				{
					$return_values['status'] = "error";

	                $return_values['msg'] 	= "Unable to add user details";
				}


			
        	}
    	}else if($this->session->userdata('logged_in') == TRUE )
    	{
        	$return_values['status'] = "success";

	        $return_values['msg']    = "User not add User is already in the system";
				
        }


		echo json_encode($return_values);
	}

	/**
	 * Fill reserved  data in reservation table 
	 *
	 * @access	public
	 * @param	string
	 * @return	Status and message (whether reservation data insert to reservation table or not)
	 */

	public function fill_reservation_details()
	{

		$return_values           = array();
        $return_values['status'] = "";
        $return_values['msg']    = "";

		if((isset($_POST['submitMode'])) && $_POST['submitMode'] =='ajax' )
		{

			$hotel_code  = $_POST['hotel_code'];
			$this->load->model('hotel_model');
			$this->load->model('room_model');
			$hotel_id    = $this->hotel_model->gethotelid($hotel_code);

			isset($_POST['Checkin_Date']) 		    ? $data['reservation_fromdate']             = $_POST['Checkin_Date'] 	        	: $data['reservation_fromdate']    	     = 'NULL';
			isset($_POST['Checkout_Date']) 	    	? $data['reservation_todate']         		= $_POST['Checkout_Date'] 	    		: $data['reservation_todate']    	     = 'NULL';
			
			$data['hotel_id'] = $hotel_id;

			$user_first_name 	  = $_POST['firstName'];
			$user_last_name 	  = $_POST['lastName'];
			$user_email 	      = $_POST['email'];
			$user_telnumber       = $_POST['telNumber'];
			$roomtype             = $_POST['roomtype'];
			$roomidValue		  = $this->room_model->getRoomId($roomtype,$hotel_id);
			$data['room_id']      = $roomidValue;
			$room_id              = $roomidValue;
			$noofrooms            = $_POST['noofrooms'];
		 	if($this->session->userdata('logged_in') == TRUE){
				$data['user_id']  = $this->session->userdata('user_id'); 
		 	}
            else
            {
				$data['user_id']  = $_POST['newUsergetid'];
				
            }
                  
			// $this->load->model('user_model');
			// $user_id    		  = $this->user_model->getuserId($user_first_name,$user_last_name,$user_email,$user_telnumber);
			// if($user_id == '')
			// {
			// 	$data['user_id']  = '1';
			// }else
			// {
			// 	$data['user_id']  = $user_id;
			// }
			

			$this->load->model('reservation_model');
			$max_reservation_id   = $this->reservation_model->getreservationId();
			$max_id_plus_one      = $max_reservation_id+1;
			$current_reserv_id    = '0000'.$max_id_plus_one;
			$data['reservation_confirmationCode'] = $current_reserv_id;

			//---Temporary Guest Id ---start
			$data['guest_id'] = 2;

			//---Temporary Guest Id ---end

			$from_date = $_POST['Checkin_Date'];
			$to_date   = $_POST['Checkout_Date'];
			$date_diff = (abs(strtotime($to_date) - strtotime($from_date)))/(60 * 60 * 24);
			$data['reservation_period'] = $date_diff;
			$data['reservation_status'] = 'Pending';
			$data['transaction_id'] = 'null';
			$add_reservation = $this->reservation_model->insert('reservation',$data);

			if($add_reservation > 1)
			{
				$room_update = array();
				$status      = "Not available";
				
				$numberofRooms = $this->room_model->getnoofRooms($room_id);
				$availablerooms = $numberofRooms - $noofrooms;
				
				if($availablerooms==0)
				{
					$room_update = array('no_of_rooms'=>$availablerooms,'room_status'=>$status);
				}
				else
				{
					$room_update = array('no_of_rooms'=>$availablerooms);
				}

				$this->room_model->update('room',$room_update,$room_id);
				$return_values['status']              = "success";
                $return_values['msg']                 = "Reservation successfully added";
                $return_values['confirmationNumber']  = $current_reserv_id;
			}
			else
			{
				$return_values['status'] = "error";
                $return_values['msg'] 	 = "Unable to add reservation details";
			}
			
		}

		echo json_encode($return_values);
	}

	//function to get reservations for a hotel
	public function getReservationForHotel()
	{
		$returnValues = array();

        $this->load->model('reservation_model');        
        $this->load->model('user_model');        
        $this->load->model('hotel_model');        

        // check is this ajax caller
        if((isset($_POST['submitMode'])) &&($_POST['submitMode'] == 'ajax'))
        {
            if(isset($_POST['hotelID']))
            {
                $reservationDetails = $this->reservation_model->getReservationForHotel($_POST['hotelID']);                

                $userDetails        = $this->user_model->select('user');

                $hotelDetails       = $this->hotel_model->select('hotel');

                // get data from DB
                $returnValues['status']                = "success";
                $returnValues['reservationDetails']    = $reservationDetails;
                $returnValues['userDetails']           = $userDetails;
                $returnValues['hotelDetails']          = $hotelDetails;

            }			//if(isset($_POST['hotelID']))   

            echo json_encode($returnValues);
            
        }           //if((isset($_POST['submitMode'])) &&($_POST['submitMode'] == 'ajax')) 


	}			//public function getReservationForHotel()

	//function to get user details for a reservations
	public function ajaxGetUserDetailsToDisplay()
	{
		$returnValues = array();        
        $this->load->model('user_model');                

        // check is this ajax caller
        if((isset($_POST['submitMode'])) &&($_POST['submitMode'] == 'ajax'))
        {
            if(isset($_POST['hiddenUserId']))
            {
                $userDetails  =  $this->user_model->getUserDetailsForSpecificID($_POST['hiddenUserId']);                

                // get data from DB
                $returnValues['status']                = "success";             
                $returnValues['userDetails']           = $userDetails;

            }			//if(isset($_POST['hotelID']))   

            echo json_encode($returnValues);
            
        }           //if((isset($_POST['submitMode'])) &&($_POST['submitMode'] == 'ajax')) 

	}			//public function ajaxGetUserDetailsToDisplay()

	//function to get room details to update
    public function ajaxGetRoomDetailsToDisplay()
    {
        $returnValues = array();

        $this->load->model('room_model');        

        // check is this ajax caller
        if((isset($_POST['submitMode'])) &&($_POST['submitMode'] == 'ajax'))
        {
            if(isset($_POST['roomID']))
            {
                $roomDetailsToEdit = $this->room_model->getRoomByID($_POST['roomID']);

                $roomDetails = array();
                // convert object to json object
                foreach ($roomDetailsToEdit as $key=> $roomDetail)
                {
                    $roomDetails[$key] = $roomDetail;
                }

                // get data from DB  
                $returnValues['status']                  = "success";
                $returnValues['roomDetails']             = $roomDetails;
                $returnValues['roomCategoryDetails']     = $this->getAllRoomCategory();
                $returnValues['hotelDetails']            = $this->getAllHotels();
            }   

            echo json_encode($returnValues);
            
        }			//if((isset($_POST['submitMode'])) &&($_POST['submitMode'] == 'ajax'))     

    }           //public function ajaxGetRoomDetailsToDisplay()

   
    /**
     * Purpose of the function          load view in reservation confirmation page
     * @author                         
     */
    public function reservationConfirmationPage()
    {
    	$dataconfirm 						     = array();   	

    	isset($_GET['checkindate']) 		    ? $dataconfirm['reservation_fromdate']             = $_GET['checkindate'] 	        	: $dataconfirm['reservation_fromdate']    	     = 'NULL';
		isset($_GET['checkoutdate']) 	    	? $dataconfirm['reservation_todate']         	   = $_GET['checkoutdate'] 	    	    : $dataconfirm['reservation_todate']    	     = 'NULL';
		isset($_GET['hotelname']) 	    	    ? $dataconfirm['hotelname']         	           = $_GET['hotelname'] 	    	    : $dataconfirm['hotelname']    	                 = 'NULL';
        isset($_GET['numrooms']) 	    	    ? $dataconfirm['numrooms']         	               = $_GET['numrooms'] 	    	        : $dataconfirm['numrooms']    	                 = 'NULL';
        isset($_GET['roomtypes']) 	    	    ? $dataconfirm['roomtypes']         	           = $_GET['roomtypes'] 	    	    : $dataconfirm['roomtypes']    	                 = 'NULL';
        isset($_GET['numadults']) 	    	    ? $dataconfirm['numadults']         	           = $_GET['numadults'] 	    	    : $dataconfirm['numadults']    	                 = 'NULL';
        isset($_GET['numchildren']) 	    	? $dataconfirm['numchildren']         	           = $_GET['numchildren'] 	    	    : $dataconfirm['numchildren']    	             = 'NULL';
        isset($_GET['numnights']) 	    	    ? $dataconfirm['numnights']         	           = $_GET['numnights'] 	    	    : $dataconfirm['numnights']    	                 = 'NULL';
        isset($_GET['finalrate']) 	    	    ? $dataconfirm['finalrate']         	           = $_GET['finalrate'] 	    	    : $dataconfirm['finalrate']    	                 = 'NULL';
		isset($_GET['tx']) 	    	            ? $transction_id = $_GET['tx'] :$udate_data['transaction_id']  = 'NULL';
		
		// echo $_GET['confirmnumber'];

        if (isset($_GET['tx']) && isset($_GET['st']))
        {
			$this->load->model('reservation_model');
        	
        	// $transction_id  = $_GET['tx'];
			$payment_status = $_GET['st'];

			//payment  successfully made?
			if ($payment_status == 'Completed')
			{
				//yes, then get cutomer data to send the sms
				$customer_title = $_GET['customer_title'];
				$first_name     = $_GET['first_name'];
				$mobile_number  = $_GET['mobile_number'];
				$space          = '%20';
	            $break          = '%0A';		            

				// if the first character is a 0 then:
	            if (substr($mobile_number, 0, 1 ) == 0 )
	            {
	                // take the string starting at the 2nd character (starts with 0,1,2,3,4)
	                $mobile_number = substr($mobile_number, 1 );		                

	            }			//if (substr($contact_numbers[$index]['telephone'], 0, 1 ) == 0 )
	            

				if ($_GET['amt'] == $_GET['finalrate'])
				{
					$udate_data['reservation_status'] = 'Reserved';
					$udate_data['transaction_id']     = $transction_id;	
					$dataconfirm['amount_paid']		  = $_GET['amt'];
					
					//inform the customer via SMS
					$message        = 'Dear'.$space.$customer_title.$space.$first_name.','.$break.'Your'.$space.'reservation'.$space.'successfully'.$space.'made.'.$space.'Reservation'.$space.'detials'.$space.'have'.$space.'been'.$space.'sent'.$space.'to'.$space.'your'.$space.'email'.$space.'address.'.$break.'Thank'.$space.'you.'.$break.'MyHotel'.$space.'Team.';

					//message successfully sent?
					if($this->sendIndividualSms($mobile_number,$message) == TRUE)
		            {
		            	//yes, then display the success message
		                $return_values['statusSMS'] = 'success';
		                $return_values['sms']       = 'Sms Sent';                    
		            }
		            else
		            {
		            	//ooops... no, then display an error message
		                $return_values['statusSMS'] = 'error';
		                $return_values['sms']       = 'Sms Not Sent';

		            }			//if($this->sendIndividualSms($telno,$message) == TRUE)
					
				}
				else
				{
					//no, then inform the customer
					$udate_data['reservation_status'] = 'Unsuccess';
					$udate_data['transaction_id']     = $transction_id;		
					$dataconfirm['amount_paid']		  = $_GET['amt'];

					//inform the customer via SMS
					$message        = 'Dear'.$space.$customer_title.$space.$first_name.','.$break.'Your'.$space.'reservation'.$space.'is'.$space.'unsuccess.'.$break.'Thank'.$space.'you.'.$break.'MyHotel'.$space.'Team.';

					//message successfully sent?
					if($this->sendIndividualSms($mobile_number,$message) == TRUE)
		            {
		            	//yes, then display the success message
		                $return_values['statusSMS'] = 'success';
		                $return_values['sms']       = 'Sms Sent';                    
		            }
		            else
		            {
		            	//ooops... no, then display an error message
		                $return_values['statusSMS'] = 'error';
		                $return_values['sms']       = 'Sms Not Sent';

		            }			//if($this->sendIndividualSms($telno,$message) == TRUE)
				}

			}
			else
			{
				$udate_data['reservation_status'] = 'Pending';
				$udate_data['transaction_id']     = $transction_id;
			}

			$update_data = $this->reservation_model->update_reservation_status($_GET['confirmnumber'],$udate_data);
        }
        
        // echo $_GET['confirmnumber'];  
        if ($update_data == true)
        {
        	$dataconfirm['reservation_status'] = 'Success';
        }
        else
        {
        	$dataconfirm['reservation_status'] = 'Unsuccess';
        }

        $this->load->view('template/header');
		$this->load->view('hotelreservation/reservationConfirmation',$dataconfirm);
		$this->load->view('template/footer');
		
    }
    /*---------------- ---------End of reservationConfirmationPage()---------------------------*/

   public function creditcardPayment()
   {
   	    $paymentdata 						     = array();
   	    $return_values 							 = array();
   		isset($_GET['finalrate']) 		    ? $amount             = $_GET['finalrate'] 	        	: $amount    	     = 'NULL';
   		isset($_GET['name']) 		        ? $name               = $_GET['name'] 	        	    : $name    	         = 'NULL';
   		isset($_GET['cvcCode']) 		    ? $cvcCode            = $_GET['cvcCode'] 	        	: $cvcCode    	     = 'NULL';
   		isset($_GET['card_number']) 		? $card_number        = $_GET['card_number'] 	        : $card_number    	 = 'NULL';
   		isset($_GET['exp_month']) 		    ? $exp_month          = $_GET['exp_month'] 	        	: $exp_month    	 = 'NULL';
   		isset($_GET['stripeToken']) 		? $stripeToken        = $_GET['stripeToken'] 	        : $stripeToken    	 = 'NULL';
   		isset($_GET['email']) 		        ? $email        	  = $_GET['email'] 	        		: $email    	     = 'NULL';
   		isset($_GET['paymentmethod']) 		? $paymentmethod      = $_GET['paymentmethod'] 	        : $paymentmethod     = 'NULL';
   		isset($_GET['hotel_id']) 		    ? $hotel_id           = $_GET['hotel_id'] 	            : $hotel_id          = 'NULL';
   		isset($_GET['userId']) 		        ? $userId             = $_GET['userId'] 	            : $userId            = 'NULL';

   		$paymentdata['payment_description'] = $amount;
   		$paymentdata['payment_due_date']    = $amount;
   		$paymentdata['payment_method']      = $paymentmethod;
   		$paymentdata['hotel_id']            = $hotel_id;
   		$paymentdata['user_id']             = $userId;
   		$paymentdata['card_number']         = $card_number;
   		$paymentdata['exp_date']            = $exp_month;
   		$paymentdata['cvcCode']             = $cvcCode;
   		$paymentdata['email']               = $email;

   		try
   		{

   			 Stripe::setApiKey("tGN0bIwXnHdwOa85VABjPdSn8nWY7G7I");
		     $response = Stripe_Charge::create(array("amount" => $amount * 100, 
			         "currency" => "usd", 
			         "card" => $stripeToken, 
					 "description" => "Purchase for: $name / $email")
		     );
				$details 		= json_decode($response);
				$responseValue  = json_encode($response);
				$card 			= $details->card;
				echo "Thank you for your payment for $name<br/>";
				echo "This is your confirmation page and printable receipt for your purchase of $$amount charged to your $card->type ending in $card->last4.<br/>";
				echo "Your charge confirmation number is: $details->id. <br/><br/>Thank you for your purchase!";
   			    
			$this->load->model('payment_model');	
			$add_payment = $this->payment_model->insert('payment',$paymentdata);

			if($add_payment >1)
			{
				$return_values['status'] = "success";

                $return_values['msg']    = "Payment details are successfully added";
			}else
			{
				$return_values['status'] = "error";

                $return_values['msg'] 	= "Unable to add payment details";
			}


   		}catch (Exception $e) {
   			
   			echo "Purchase Page<br/>";
		    echo "Unfortunately there was an error charging your credit card for $$amount.<br/>";
		    echo "The error was: " . $e->getMessage() ;
   		}
   		return $return_values;
   }
   
   /**
     * Purpose of the function          function to change message status
     * @author                          
     */
     public function changeMessageStatus()
    {
        $returnValues = array();
        
        if ((isset($_POST['messages_id']))&&(!is_null($_POST['messages_id'])))
        {
            $this->load->model('messages_model');

            if (($this->messages_model->update_messages_record(array('messages_id' =>$_POST['messages_id']), $_POST['messageData']))!==0)
            {
                $returnValues['status'] = 'success';
                $returnValues['msg']    = "Messages deactivated successfully.";
            }
            // not updated database
            else
            {
                $returnValues['status'] = 'error';
                $returnValues['msg']    = "Messages does not deactivated.";
            }
        }
        else
        {
            $returnValues['status'] = 'error';
            $returnValues['msg']    = "Messages not selected.";
        }          
            
        // echo json_encode($returnValues);
        echo json_encode($_POST['messageData']);

    }  //function to change message status

}