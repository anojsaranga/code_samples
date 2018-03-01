<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class ManageAppoinments extends MY_Controller
{
    public function index($page = 'manageappoinments')
    {
        
        if (!file_exists('application/views/backend/pages/'.$page.'.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();

        }           //if (!file_exists('application/views/' . $page . '.php'))

        // check user is logged in to system and load admin panel
        if($this->isLoggedIn() == 1)
        {
            // user log and admin panel acces only for admin user
            if($this->getUserType()=="Administrator" || $this->getUserType()=="Employee")
            {                
                $data = array();

                $data['user_type']               = $this->getUserType();            //get the user type

                $data['all_active_appointments'] = $this->get_all_active_and_pending_appointments();         //get all active and pending appointments

                $data['get_all_source_details']  = $this->get_all_source_details();           //get all source details

                $data['get_all_customer']        = $this->get_all_customer_details();         //get all customer details

                $data['services']                = $this->get_all_service();           //get all service details

                $data['employee_works']          = $this->get_all_empolees_of_salon();         //get all employee details

                // $data['services_category']       = $this->get_all_service_category();           //get all category details

                // $data['services_subcategory']    = $this->get_all_service_sub_category();           //get all service sub category

                $data['employee_works_on_calendar']            = $this->get_all_empolees_of_salon_to_calendar();            //get all empolees of salon to calendar
                
                $data['title'] = ucfirst($page); // Capitalize the first letter
                $this->load->view('backend/template/be_header', $data);
                $this->load->view('backend/pages/'.$page, $data);
                $this->load->view('backend/template/be_footer', $data);
        
            }
            // when other logged user try to direct acess to redirect to other pages
            else
            {
                $this->defaultPageLoadForUser();
                
            }           //if($this->getUserType()=="Administrator")
        }

        // if not user logged in system redirect to the login page
        else
        {
            $data['title'] = ucfirst("Login"); // Capitalize the first letter           
            $this->load->view('backend/template/be_header', $data);            
            $this->load->view('backend/pages/login', $data);
            $this->load->view('backend/template/be_footer', $data);

        }           //if($this->isLoggedIn())
               
    }           //public function index($page = 'reports')

    //function to get all services
    public function get_all_service()
    {
        $this->load->model('services_model');

        $query_service_details = $this->services_model->get_all_service();

        if (!$query_service_details == 0)
        {
            return $query_service_details;
        }
    }           //public function get_all_service()

    //function to get all services category
    public function get_all_service_category()
    {
        $this->load->model('servicescategory_model');

        $query_service_category_details = $this->servicescategory_model->get_all_service_category();

        if (!$query_service_category_details == 0)
        {
            return $query_service_category_details;
        }
    }           //public function get_all_service_category()

    //function to get all services sub category
    public function get_all_service_sub_category()
    {
        $this->load->model('servicessubcategory_model');

        $query_service_sub_category_details = $this->servicessubcategory_model->get_all_service_sub_category();

        if(!$query_service_sub_category_details == 0)
        {   
            return $query_service_sub_category_details;
        }

    }           //public function get_all_service_sub_category()

    //function to get all employee details
    public function get_all_empolees_of_salon()
    {
        $this->load->model('user_model');
        $this->load->model('userrole_model');

        $query_user_id = $this->userrole_model->get_all_employee_details();

        if (!$query_user_id == 0)
        {
            return $query_user_id;
        }
    }           //public function get_all_empolees_of_salon()

    //function to get all source details
    public function get_all_source_details()
    {
        $this->load->model('source_model');

        $query_get_all_source = $this->source_model->get_all_sources();

        if(!$query_get_all_source == 0)
        {   
            return $query_get_all_source;
        }

    }           //public function get_all_source_details()

    //function to get all the customer details
    public function get_all_customer_details()
    {
        $this->load->model('user_model');

        $query_customer_details = $this->user_model->get_all_record();

        if (!$query_customer_details == 0)
        {
            return $query_customer_details;
        }

    }           //public function get_all_customer_details()       

    //function to get all active and pending appointments
    public function get_all_active_and_pending_appointments()
    {
        $this->load->model('reservationrequest_model');

        $query_reservation_details = $this->reservationrequest_model->get_all_active_and_pending_appointments();

        if (!$query_reservation_details == 0)
        {
            return $query_reservation_details;
        }
    }         //public function get_all_active_and_pending_appointments()       

    //function to get all employee esource details to display in calendar
    public function get_all_empolees_of_salon_to_calendar()
    {
        $this->load->model('user_model');
        $this->load->model('userrole_model');

        $query_user_id = $this->userrole_model->get_all_employee_details()->result_array();     

        if (!$query_user_id == 0)
        {
            $array_to_return = array();

            $array1_index = 1;
            for ($index=0; $index<sizeof($query_user_id);$index++)
            {
                $array_to_return[]   = array('id'=>'resource'.$array1_index,'name'=>$query_user_id[$index]['first_name']);
                $array1_index++;            
                
            }           //for ($index=0; $index<sizeof($query_user_id))
            
            return json_encode($array_to_return);
            
        }           //if (!$query_user_id == 0)

    }           //public function get_all_empolees_of_salon_to_calendar()
    //function to get appointment details to edit
    public function viewReservationsDetails()
    {
        $reservation_id         = $_POST['reservation_id'];
        $returnValues['status'] = "";
        $returnValues['msg']    = "";
        $allEvents              = array();
        $oneEvent               = array();
        $array_to_return        = array();
        
        $this->load->model('reservationrequest_model');
        $this->load->model('servicesubcategoryeservationrequest_model');
        
        //get appointment details
        $queryAppointmentDetails = $this->reservationrequest_model->viewReservationsDetails($reservation_id);
        
        //get services for the currenct appointment
        $queryAllServicesForSelectedAppointment = $this->servicesubcategoryeservationrequest_model->get_services_for_selected_reservation($reservation_id);      
        
        //get employee details assigned to the selected appointment
        $queyrUserDetails = $this->reservationrequest_model->get_employee_details_to_selected_appointment($reservation_id);
        
        //appointment exists
        if(!$queryAppointmentDetails == 0)
        {
            //yes, then return the data
           $returnValues['status']            = "success";
           $returnValues['appointmentDetail'] = $queryAppointmentDetails;

            //appointment data to display  in caledar
            $oneEvent['title']           = ' | '.'Reservation '.$queryAppointmentDetails[0]['reservationrequest_id'];
            $oneEvent['date']            = $queryAppointmentDetails[0]['reservationrequest_date'];            
            $oneEvent['start']           = $queryAppointmentDetails[0]['reservationrequest_date'].' '.$queryAppointmentDetails[0]['reservationrequest_from'];
            $oneEvent['end']             = $queryAppointmentDetails[0]['reservationrequest_date'].' '.$queryAppointmentDetails[0]['reservationrequest_to'];           
            $oneEvent['allDay']          = false;           // will make the time showend    

            //set data to perticular employee
            if ($queyrUserDetails[0]['user_id'] == '1')
            {                   
                $oneEvent['resources']    = 'resource1';            // will make the time showend                   
            }
            else
            {
                if ($queyrUserDetails[0] == '2')
                {
                    $oneEvent['resources']    = 'resource2';            // will make the time showend                   
                }
                else
                {
                    if($queyrUserDetails[0] == '3')
                    {
                        $oneEvent['resources']    = 'resource3';            // will make the time showend                       
                    }
                    else
                    {
                        $oneEvent['resources']    = '';             // will make the time showend                                               
                    }
                }
            }       
            
            //final json array to return
            $allEvents[sizeof($allEvents)]          = $oneEvent;

            $returnValues['loadEventToCalendar']    = $allEvents;                               

            $this->load->model('userrole_model');

            //get all employee details
            $query_user_id = $this->userrole_model->get_all_employee_details()->result_array();     

            $array1_index = 1;
            for ($index=0; $index<sizeof($query_user_id);$index++)
            {
                $array_to_return[]   = array('id'=>'resource'.$array1_index,'name'=>$query_user_id[$index]['first_name']);
                $array1_index++;            
                
            }           //for ($index=0; $index<sizeof($query_user_id))
            
            //return employee details json object
            $returnValues['allemployeeDetail']    = $array_to_return;            

           //service available?
           if ($queryAllServicesForSelectedAppointment != 0)
           {
                //return the services
                $returnValues['status']            = "success";
                $returnValues['servicesDetail']    = $queryAllServicesForSelectedAppointment;            
           }
           else
           {
                //no display an error message
                $returnValues['status'] = "error";
                $returnValues['msg']    = "No service available for the selected appointment";   
           }

           //employee details available
           if ($queyrUserDetails != 0)
           {
                $returnValues['status']            = "success";
                $returnValues['employeeDetail']    = $queyrUserDetails;
           }
           else
           {
                $returnValues['statusEmployee'] = "error";
                $returnValues['employeeDetail'] = "null";   
           }
        }
        else
        {
            //no then dissplay an error message
            $returnValues['status'] = "error";
            $returnValues['msg']    = "No appointment";
            
        }           //if(!$queryAppointmentDetails==0)

        echo (json_encode($returnValues));

    }           //public function viewReservationsDetails()

    //function to get all the service categories
    public function get_service_categories()
    {
        $returnValue = array();     //final array to return

        if (isset($_POST['submitMode']) && $_POST['submitMode'] == 'ajax')      //if the submit mode is ajax?
        {
            //yes, then get the service id
            $service_id = $_POST['service_id'];

            //load the service category model
            $this->load->model('servicescategory_model');

            //call the service category select function in service category model
            $get_result = $this->servicescategory_model->get_service_categories($service_id);

            if ($get_result != 0)           //if data successfully returned?
            {
                //yes, then return the data
                $returnValue['status'] = 'success';
                $returnValue['msg']    = $get_result;
            }
            else
            {
                //no, then return an error message
                $returnValue['status'] = 'error';
                $returnValue['msg']    = 'No data found';
            }
        }

        echo (json_encode($returnValue));

    }           //public function get_service_categories()
    
    //function to get all the service sub categories
    public function get_service_sub_categories()
    {
        //final array to return.
        $returnValue = array();

        if (isset($_POST['submitMode']) && $_POST['submitMode'] == 'ajax')      //data submitted via ajax?
        {
            //yes, then proceed
            $service_category_id = $_POST['service_category_id'];

            $this->load->model('servicessubcategory_model');

            $get_result = $this->servicessubcategory_model->get_service_sub_categories($service_category_id);

            if ($get_result != 0)           //if the sub categories contains?
            {
                //yes, then return it.
                $returnValue['status'] = 'success';
                $returnValue['msg']    = $get_result;
            }
            else
            {
                //no, then return an error  message.
                $returnValue['status'] = 'error';
                $returnValue['msg']    = 'No data found';
            }
        }

        echo (json_encode($returnValue));

    }           //public function get_service_sub_categories()

    //function to get the appointment summery
    public function get_appointment_summery()
    {
        //final array to return.
        $returnValue = array();
        
        if (isset($_POST['submitMode']) && $_POST['submitMode'] == 'ajax')      //data submitted via ajax?
        {
            //yes, then proceed
            $service_type_id               = $_POST['service_type_id'];
            $service_name                  = $_POST['service_name'];
            $service_category_name         = $_POST['service_category_name'];
            $service_type_appointment_name = $_POST['service_type_appointment_name'];
            $hidden_reservation_id         = $_POST['hidden_reservation_id'];

            $this->load->model('servicessubcategory_model');

            $get_result = $this->servicessubcategory_model->get_service_sub_categories_for_specific_id($service_type_id);
            
            if ($get_result != 0)           //if the sub categories contains?
            {               
                //yes, then add sub categories.
                $this->load->model('servicesubcategoryeservationrequest_model');

                //array to insert data into table dilu_servicesubcategoryreservationrequest
                $service_reservation_request['reservationrequest_id'] = $hidden_reservation_id;
                $service_reservation_request['servicesubcategory_id'] = $service_type_id;

                //insert the reservation items to a specific reservation
                $insert_id = $this->servicesubcategoryeservationrequest_model->insert_data($service_reservation_request);

                //return the data
                $returnValue['status']                           = 'success';
                $returnValue['msg']                              = $get_result;
                $returnValue['service_name']                     = $service_name;
                $returnValue['service_category_name']            = $service_category_name;
                $returnValue['service_type_appointment_name']    = $service_type_appointment_name;
                $returnValue['ssubcatreserve_id']                = $insert_id;
            }
            else
            {
                //no, then return an error  message.
                $returnValue['status'] = 'error';
                $returnValue['msg']    = "Error in you reservation!";

            }           //if ($get_result != 0)
            
        }           //if (isset($_POST['submitMode']) && $_POST['submitMode'] == 'ajax')

        echo (json_encode($returnValue));

    }           //public function get_appointment_summery()

    //function to remove service types
    public function remove_service_from_reservation()
    {
        //define the array variable
        $returnValues = array();        
            
        //check the submitMode is set && submitMode is equal to type is ajax
        if((isset($_POST['submitMode'])) && $_POST['submitMode'] =='ajax')
        {
            //get the ssubcatreserve_id coming from js file
            $hidden_ssubcatreserve_id = $_POST['hidden_ssubcatreserve_id']; 
                       
            //load the model
            $this->load->model('servicesubcategoryeservationrequest_model');                                           

            $delete_result = $this->servicesubcategoryeservationrequest_model->remove_data($hidden_ssubcatreserve_id);      //remove the service type               

            if ($delete_result == '1')      //if the customer details successfully updated?
            {
                //yes, then return the success message
                $returnValues['status'] = "success";
                $returnValues['msg']    = "Service type successfully removed";                  
            }
            else
            {
                //no then return an error message
                $returnValues['status'] = "error";
                $returnValues['msg']    = "Service type did not successfully remove";
            }

        }           //if((isset($_POST['submitMode'])) && $_POST['submitMode'] =='ajax')
        
        echo (json_encode($returnValues));
        
    }           //public function remove_service_from_reservation() 

    //function to cancel the appointment
    public function cancel_appointment()
    {
        //define the array variable
        $returnValues = array();        
            
        //check the submitMode is set && submitMode is equal to type is ajax
        if((isset($_POST['submitMode'])) && $_POST['submitMode'] =='ajax')
        {
            //get the reservation_id coming from js file
            $reservation_id = $_POST['reservation_id']; 
                       
            //load the model
            $this->load->model('reservationrequest_model');                                           

            //update status
            $data['reservationrequest_status'] = 'Cancelled';

            $delete_result = $this->reservationrequest_model->update_data($reservation_id, $data);      //remove the service type               

            if ($delete_result == '1')      //if the customer details successfully updated?
            {
                //yes, then return the success message
                $returnValues['status'] = "success";
                $returnValues['msg']    = "Reservation successfully cancelled";                  
            }
            else
            {
                //no then return an error message
                $returnValues['status'] = "error";
                $returnValues['msg']    = "Reservation did not successfully cancelled";
            }

        }           //if((isset($_POST['submitMode'])) && $_POST['submitMode'] =='ajax')
        
        echo (json_encode($returnValues));

    }           //public function cancel_appointment()

    //function to save edited reservation details
    public function update_appointment_details()
    {
        //define the array variable
        $returnValues = array();        
            
        //load the reservation request model
        $this->load->model('reservationrequest_model');

        //load the userreservationrequest model
        $this->load->model('userreservationrequest_model');

        //load the user model
        $this->load->model('user_model');                
        
        //check the submitMode is set && submitMode is equal to type is ajax
        if((isset($_POST['submitMode'])) && $_POST['submitMode'] =='ajax')
        {   
            $data                  = "";     
            $reservationrequest_id = $_POST['reservationrequest_id'];

            //get the form input in make an appointmen ajax function form makeappoinement.js 
            isset($_POST['appointment_date']) ? $data['reservationrequest_date']  = $_POST['appointment_date'] : $data['reservationrequest_date'] = 'NULL';
            isset($_POST['appointment_from']) ? $data['reservationrequest_from']  = $_POST['appointment_from'] : $data['reservationrequest_from'] = 'NULL';
            isset($_POST['appointment_to'])   ? $data['reservationrequest_to']    = $_POST['appointment_to']   : $data['reservationrequest_to']   = 'NULL';
            isset($_POST['employee_id'])      ? $employee_id                      = $_POST['employee_id']      : $employee_id                     = '';
            
            //get the existing details of edited appointment
            $existing_details = $this->reservationrequest_model->get_reservation_for_specific_id($reservationrequest_id);

            if ($existing_details != 0)         //reservation details available?
            {
                //user has changed the reservation date and time?
                if ($existing_details[0]['reservationrequest_date'] != $_POST['appointment_date'] || $existing_details[0]['reservationrequest_from'] != $_POST['appointment_from'] || $existing_details[0]['reservationrequest_to'] != $_POST['appointment_to'] || $existing_details[0]['reservationrequest_id'] != $reservationrequest_id)
                {
                    // alert('hello');
                    
                    //yes, then check with time schedule
                    //check for existing appointments
                    $existing_appointments = $this->reservationrequest_model->check_appointment_date_time($_POST['appointment_date'],$_POST['appointment_from'],$_POST['appointment_to'],$employee_id);

                    if ($existing_appointments == '0')          //if the time availble for the selected date?
                    {
                        //yes, then update the reservations detils                      
                        $update_result = $this->reservationrequest_model->update_data($reservationrequest_id, $data);       //update the customer details               

                        if ($update_result == '1')      //if the customer details successfully updated?
                        {
                            //is employee selected?
                            if ($_POST['employee_id'] != '')
                            {
                                $same_employee = $this->userreservationrequest_model->get_check_employee($_POST['employee_id'],$_POST['reservationrequest_id']);
                                
                                //different employee selected?
                                if ($same_employee == 0)
                                {                            
                                    //yes then add the reservation for the selected employee

                                    //make an array to insert reservations details for employees
                                    $userreservations_data['user_id']               = $_POST['employee_id'];
                                    $userreservations_data['reservationrequest_id'] = $_POST['reservationrequest_id'];

                                    //insert the data
                                    $this->userreservationrequest_model->insert_data($userreservations_data);
                                    
                                }           //if ($same_employee == 0)

                            }           //if ($_POST['employee_id'] != '')

                            //create the mail and send it to customer
                            /*$customer_first_name     = $get_customer_data['first_name'];
                            $customer_last_name      = $get_customer_data['last_name'];
                            $to_email                = $get_customer_data['email'];                 
                            $subject                 = 'Salon Dilu Appointment Request';
                            $email_content           = "Dear ".$customer_first_name." ".$customer_last_name.",<br><br><br>Your appointment request has been successfully sent. We will send a confirmation mail regarding your appointment within shortly.<br><br>Your appointment summery:<br><br>".$summery."<br><br>Date: ".$_POST['appointment_date']."<br><br>From: ".$_POST['appointment_from']."<br><br>To: ".$_POST['appointment_to']."<br><br>From Salon Dilu";

                            $return = $this->create_email($to_email,$subject,$email_content);           */

                            //yes, then return the success message
                            $returnValues['status'] = "success";
                            $returnValues['msg']    = "Appointment successfully updated";                 
                            $returnValues['exists'] = $existing_appointments;                   
                        }
                        else
                        {
                            //no then return an error message
                            $returnValues['status'] = "error";
                            $returnValues['msg']    = "Appointment did not successfully update";
                            $returnValues['exists'] = $existing_appointments;                   

                        }           //if ($update_result == '1')
                    }
                    else
                    {
                        //yes then return an error message
                        $returnValues['status'] = "error";
                        $returnValues['msg']    = "Selected time is not available. Please select available time.";
                        $returnValues['exists'] = $existing_appointments;                   

                    }           //if ($existing_appointments != '1')

                }           
                else
                {
                    //no, then enter update the reservation                    
                    $update_result = $this->reservationrequest_model->update_data($reservationrequest_id, $data);       //update the customer details               

                    if ($update_result == '1')      //if the customer details successfully updated?
                    {
                        //is employee selected?
                        if ($_POST['employee_id'] != '')
                        {
                            $same_employee = $this->userreservationrequest_model->get_check_employee($_POST['employee_id'],$_POST['reservationrequest_id']);
                            
                            //different employee selected?
                            if ($same_employee == 0)
                            {                            
                                //yes then add the reservation for the selected employee

                                //make an array to insert reservations details for employees
                                $userreservations_data['user_id']               = $_POST['employee_id'];
                                $userreservations_data['reservationrequest_id'] = $_POST['reservationrequest_id'];

                                //insert the data
                                $this->userreservationrequest_model->insert_data($userreservations_data);
                                
                            }           //if ($same_employee == 0)

                        }           //if ($_POST['employee_id'] != '')

                        //create the mail and send it to customer
                        /*$customer_first_name     = $get_customer_data['first_name'];
                        $customer_last_name      = $get_customer_data['last_name'];
                        $to_email                = $get_customer_data['email'];                 
                        $subject                 = 'Salon Dilu Appointment Request';
                        $email_content           = "Dear ".$customer_first_name." ".$customer_last_name.",<br><br><br>Your appointment request has been successfully sent. We will send a confirmation mail regarding your appointment within shortly.<br><br>Your appointment summery:<br><br>".$summery."<br><br>Date: ".$_POST['appointment_date']."<br><br>From: ".$_POST['appointment_from']."<br><br>To: ".$_POST['appointment_to']."<br><br>From Salon Dilu";

                        $return = $this->create_email($to_email,$subject,$email_content);           */

                        //yes, then return the success message
                        $returnValues['status'] = "success";
                        $returnValues['msg']    = "Appointment successfully updated";                        
                    }
                    else
                    {
                        //no then return an error message
                        $returnValues['status'] = "error";
                        $returnValues['msg']    = "Appointment did not successfully update";

                    }           //if ($update_result == '1')

                }           ////if ($existing_details[$index]['reservationrequest_date'] != $_POST['appointment_date'] && $existing_details[$index]['reservationrequest_from'] != $_POST['appointment_from'] && $existing_details[$index]['appointment_to'] != $_POST['appointment_to'])

            }           //if ($existing_details != 0)
            
        }           //if((isset($_POST['submitMode'])) && $_POST['submitMode'] =='ajax')
        
        echo (json_encode($returnValues));

    }           //public function update_appointment_details()

    public function editappointment()
    {
        $oneEvent  = array();
        $allEvents = array();
        $data      = array();

        if($this->isLoggedIn() == 1)
        {
            // user log and admin panel acces only for admin user
            if($this->getUserType() == "Administrator" || $this->getUserType() == "Employee")
            {
                $data['user_type']  = $this->getUserType();            //get the user type

                // echo $_GET['id'];  
                if (isset($_GET['id']) && $_GET['id'] != '')
                {
                    $data['get_all_source_details']  = $this->get_all_source_details();           //get all source details

                    $data['get_all_customer']        = $this->get_all_customer_details();         //get all customer details

                    $data['services']                = $this->get_all_service();           //get all service details

                    $data['employee_works']          = $this->get_all_empolees_of_salon();         //get all employee details

                    $reservation_id = $_GET['id'];
                    $this->load->model('reservationrequest_model');
                    $this->load->model('servicesubcategoryeservationrequest_model');
                    
                    //get appointment details
                    $queryAppointmentDetails = $this->reservationrequest_model->viewReservationsDetails($reservation_id);
                    
                    //get services for the currenct appointment
                    $queryAllServicesForSelectedAppointment = $this->servicesubcategoryeservationrequest_model->get_services_for_selected_reservation($reservation_id);      
                    
                    //get employee details assigned to the selected appointment
                    $queyrUserDetails = $this->reservationrequest_model->get_employee_details_to_selected_appointment($reservation_id);
                    
                    //appointment exists
                    if(!$queryAppointmentDetails == 0)
                    {
                        //yes, then return the data                       
                       $data['appointmentDetail'] = $queryAppointmentDetails;

                        //appointment data to display  in caledar
                        $oneEvent['title']           = ' | '.'Reservation '.$queryAppointmentDetails[0]['reservationrequest_id'];
                        $oneEvent['date']            = $queryAppointmentDetails[0]['reservationrequest_date'];            
                        $oneEvent['start']           = $queryAppointmentDetails[0]['reservationrequest_date'].' '.$queryAppointmentDetails[0]['reservationrequest_from'];
                        $oneEvent['end']             = $queryAppointmentDetails[0]['reservationrequest_date'].' '.$queryAppointmentDetails[0]['reservationrequest_to'];           
                        $oneEvent['allDay']          = false;           // will make the time showend    

                        //set data to perticular employee
                        if ($queyrUserDetails[0]['user_id'] == '1')
                        {                   
                            $oneEvent['resources']    = 'resource1';            // will make the time showend                   
                        }
                        else
                        {
                            if ($queyrUserDetails[0] == '2')
                            {
                                $oneEvent['resources']    = 'resource2';            // will make the time showend                   
                            }
                            else
                            {
                                if($queyrUserDetails[0] == '3')
                                {
                                    $oneEvent['resources']    = 'resource3';            // will make the time showend                       
                                }
                                else
                                {
                                    $oneEvent['resources']    = '';             // will make the time showend                                               
                                }
                            }
                        }       
                        
                        //final json array to return
                        $allEvents[sizeof($allEvents)]  = $oneEvent;

                        $data['loadEventToCalendar']    = $allEvents;                               

                        $this->load->model('userrole_model');

                        //get all employee details
                        $query_user_id = $this->userrole_model->get_all_employee_details()->result_array();     

                        $array1_index = 1;
                        for ($index=0; $index<sizeof($query_user_id);$index++)
                        {
                            $array_to_return[]   = array('id'=>'resource'.$array1_index,'name'=>$query_user_id[$index]['first_name']);
                            $array1_index++;            
                            
                        }           //for ($index=0; $index<sizeof($query_user_id))
                        
                        //return employee details json object
                        $data['allemployeeDetail'] = $array_to_return;            

                       //service available?
                       if ($queryAllServicesForSelectedAppointment != 0)
                       {
                            //return the services                            
                            $data['servicesDetail']    = $queryAllServicesForSelectedAppointment;            
                       }
                       else
                       {
                            //no display an error message                            
                            $data['msg']    = "No service available for the selected appointment";   
                       }

                       //employee details available
                       if ($queyrUserDetails != 0)
                       {                            
                            $data['employeeDetail']    = $queyrUserDetails;
                       }
                       else
                       {                            
                            $data['employeeDetail'] = "null";   
                       }
                    }
                    else
                    {
                        //no then dissplay an error message                        
                        $data['msg']    = "No appointment";
                        
                    }           //if(!$queryAppointmentDetails==0)

                }  
                $this->load->view('backend/template/be_header', $data);
                $this->load->view('backend/pages/editappointment', $data);
                $this->load->view('backend/template/be_footer', $data);
            }
        }
    }
}           //class Reports extends MY_Controller
?>