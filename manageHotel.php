<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ManageHotel extends MY_Controller 
{

	// Auto load the index funciton
	public function index($page = 'hotal_admin')
	{
        if (!file_exists('application/views/hoteladmin/'.$page.'.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}
		// check user is logged in to system and load admin panel
		if($this->isLoggedIn())
		{
			// user log and admin panel acces only for admin user
			if(($this->getUserType() == '4') || ($this->getUserType() == '1'))
			{   
                $data['hotelChain']                  = $this->getAllHotelChains();           //function to get hotel chain details

                $data['hotelType']                   = $this->getAllHotelTypes();            //function to get hotel type details 

                $data['hotelStarRating']             = $this->getAllHotelStarRating();            //function to get hotel star rating details 

                $data['hotelSubscriptionPackage']    = $this->getAllHotelSubscriptionPackage();            //function to get hotel subscription package details 

                $data['hotelCity']                   = $this->getAllHotelCity();            //function to get hotel city details 

                $data['hotelCountry']                = $this->getAllHotelCountry();            //function to get hotel country details 
                
                $data['activehotelCountry']          = $this->getActiveHotelCountry();            //function to get activehotel country details 

                $data['hotelCurrency']               = $this->getAllHotelCurrency();            //function to get hotel currency details 
                
                $data['ActivehotelCurrency']         = $this->getAllActiveHotelCurrency();            //function to get Active hotel currency details 

                // $data['allHotels']                = $this->getAllHotel();            //function to get hotel currency details         

                $data['roomCategoryDetails']         = $this->getAllRoomCategory();         //get all room category

                $data['roomDetails']                 = $this->getAllRoomDetails();           //get all room details

                $data['beachDetails']                = $this->getAllBeachDetails();           //get all beach details

                $data['foodPreferencesDetails']      = $this->getAllFoodPreferencesDetails();           //get all food preferences details

                $data['forestsDetails']              = $this->getAllForestsDetails();           //get all forests details

                $data['historicsDetails']            = $this->getAllHistoricsDetails();           //get all historics details

                $data['mountainsDetails']            = $this->getAllMountainsDetails();           //get all mountains details

                $data['sceneriesDetails']            = $this->getAllSceneriesDetails();           //get all sceneries details

                $data['sportsDetails']               = $this->getAllSportsDetails();           //get all sports details

                $data['wildlifeDetails']             = $this->getAllWildlifeDetails();           //get all wildlife details

                $data['religiousInterestsDetails']   = $this->getAllReligiousInterestsDetails();           //get all religious interests details

                $data['specialProgramDetails']       = $this->getAllSpecialProgramDetails();           //get all special program details

                $data['sportsFacilityDetails']       = $this->getAllSportsFacilityDetails();           //get all sports facilty details

                $data['gymDetails']                  = $this->getAllGymDetails();           //get all gym details

                $data['entertainmentProgramDetails'] = $this->getAllEntertainmentProgramDetails();           //get all entertainment program details

                $data['poolDetails']                 = $this->getAllPoolDetails();           //get all pool details

                $data['restaurantsDetails']          = $this->getAllRestaurantsDetails();           //get all restaurants details

                $data['clubDetails']                 = $this->getAllClubDetails();         //get all club details

                $data['userID']                      = $this->getUserId();         //get the current user id        

                $data['hotelNames']                  = $this->getAllHotelsForCurrentUser();         //get all hotels for the current user                

                $data['roomNames']                   = $this->getAllRoomsForCurrentUser();         //get all hotels for the current user                

                $data['roomRateperiodsDetails']      = $this->getAllRoomRateperiodsDetails();         //get all room rate periods   

                $data['roomRateperiodsData']         = $this->getAllRoomRateperiodsData();         //get all room rate periods to hotel facility,!        

                $data['roomRateDetails']             = $this->getAllRoomRateDetails();         //get all room rates  

                $data['hotelroomRateDetails']        = $this->getHotelAllRoomRateDetails();

                $data['reservationsDetails']         = $this->getAllReservationsForCurrentUser();         //get all reservations details for current user

                $data['allReservationsDetails']      = $this->getAllReservations();         //get all reservations details

                $data['allCommentsDetails']          = $this->getAllComments();         //get all comments details

                $data['usersDetails']                = $this->getAllUserDetails();         //get all user details

                $data['guestUsersDetails']           = $this->getAllGuestUsersDetails();         //get all guest user details

                $data['awardDetails']                = $this->getAllAwardsForCurrentUser(); // get all awards details
                
                $data['foodDetails']                 = $this->getAllFoodsForCurrentUser(); // get all foods details
                
                $data['offerDetails']                = $this->getAllOffersForCurrentUser(); // get all offers details

                $data['vehiclesFacilityDetails']     = $this->getAllVehiclesFacilityDetails(); // get all Vehicles details

                $data['vehicleServiceDetails']       = $this->getAllVehicleServiceDetails(); // get all vehicle service details

                $data['featuredHotels']              = $this->getAllHotelsForFeatured();    // get all featured hotels details

                $data['hotelTestimonials']           = $this->getAllHotelsTestimonials();    // get all hotels Testimonials details

                $data['currencyDetails']             = $this->getAllCurrencyDetails();    // get all currency Details

                $data['countryDetails']              = $this->getAllCountryDetails();    // get all currency Details

                $data['vehicleDriverDetails']        = $this->getAllvehicleDriverDetails();    // get all Driver Details

                $data['hotelMessges']                = $this->getAllMessgesDetails();    // get all Driver Details
                
                 $data['bannersDetails']             = $this->getAllBannersDetails(); // get all banners details

                $data['newsDetails']                 = $this->getAllNewsDetails(); // get all news details

                $data['dashboradNumbers']            = $this->getDashboradNumbers(); // get Dashborad Numbers

                $data['subscriptionPackagesDetails'] = $this->getAllSubscriptionPackagesDetails(); // get all subscription packages details 

                $data['carServicesDetails']          = $this->getAllCarServicesDetails(); // get all car services details    
                
                $data['airlineServicesDetails']      = $this->getAllairlineServicesDetails(); // get all airline Services details    
                
                $data['websitePageDetails']          = $this->getwebsitePageDetails(); // get all airline Services details   

                $data['systembasecurrency']          = $this->getSystemBaseCurrency(); 

                $data['hotelCustomer']               = $this->gethotelCustomer(); // get all users (user type 2)

                $data['hotelFaqCustomer']            = $this->getAllFaqForCurrentUser(); // get all faq 

                $data['RoomRateDetailsTable']        = $this->getRoomRateDetailsTable();         //get all room rates  
                
                $data['HistoryRoomRateDetailsTable'] = $this->getHistoryRoomRateDetailsTable();         //get all room rates  
                
                $data['beachesName']                 = $this->getBeachesName();         //get all Beaches 

                $data['foodPreferences']             = $this->foodPreferences();         //get all foodPreferences  

                $data['forestName']                  = $this->getForestName();         //get all forestName  

                $data['historicalName']              = $this->getHistoricalName();         //get all historicalName  

                $data['mountainName']                = $this->getMountainName();         //get all mountainName  

                $data['religiousInterestName']       = $this->getReligiousInterestName();         //get all religiousInterestName 

                $data['sceneryName']                 = $this->getSceneryName();         //get all sceneryName  

                $data['sportName']                   = $this->getSportName();         //get all sportName  

                $data['wildlifeParkName']            = $this->getWildlifeParkName();         //get all wildlifeParkName  

                $data['bedTypes']                    = $this->getBedTypes();         //get all bed types for rooms

                $data['mattressTypes']               = $this->getMattressTypes();         //get all mattress types for rooms

                $data['popularFacilities']           = $this->getAllPopularFacilitiesForCurrentUser();         //get all popular facilities for hotels

                $data['cancellationPolicies']        = $this->getAllCancellationPoliciesForCurrentUser();         //get all cancellation policies for hotels

                $data['promotionDetails']            = $this->getAllPromotionsForCurrentUser();         //get all promotions for hotels

                $data['addonDetails']                = $this->getAllAddonsDetails();         //get all addons for hotels

                /********** Functions area of chart data ************/    

                $data['categoryWiseProperty']        = $this->getCategoryWiseProperty();

                $data['bookingRateofEachProperty']   = $this->getBookingRateofEachProperty();

                $data['paymentCountToAdminDashboard']= $this->getPaymentCountToAdminDashboard();

                /********** Functions area of chart data ************/

                // Load the library
                $this->load->library('googlemaps');

                // Map One
                $config['center']      = '7.9, 81';
                $config['zoom']        = 8;
                $config['map_name']    = 'map_one';
                $config['map_div_id']  = 'map_canvas_one';

                $this->googlemaps->initialize($config);

                $marker = array();
                $marker['position']           = '6.93194008, 79.84777832';
                $marker['infowindow_content'] = "Colombo";
                $marker['draggable']          = true;
                $marker['ondragend']          = 'updateDatabase(event.latLng.lat(), event.latLng.lng());';
                $this->googlemaps->add_marker($marker);

                $data['map_one'] = $this->googlemaps->create_map();

                // Map Two
                $config['center']      = '7.9, 81';
                $config['zoom']        = 8;
                $config['map_name']    = 'map_two';
                $config['map_div_id']  = 'map_canvas_two';
                $this->googlemaps->initialize($config);
                
                $marker = array();
                $marker['position']           = '6.93194008, 79.84777832';
                $marker['infowindow_content'] = "Colombo";
                $marker['draggable']          = true;  
                $marker['ondragend']          = 'updateDatabase(event.latLng.lat(), event.latLng.lng());';              
                $this->googlemaps->add_marker($marker);

                $data['map_two'] = $this->googlemaps->create_map();

                //Load the views
				$data['title'] = ucfirst("Add New Hotel"); // Capitalize the first letter
				$this->load->view('template/header',$data);
                $this->load->view('hoteladmin/'.$page,$data);
                $this->load->view('template/footer',$data);
			}
			// when other logged user try to direct acess to redirect to other pages
			else
			{
				// $this->defaultPageLoadForUser();
                // header('Location: '.base_url()."index.php/home");
                header('Location: '.base_url()."index.php/welcome");
            }
        }

        // if not user logged in system redirect to the login page
        else
        {           
            // header('Location: '.base_url()."index.php/home");
            header('Location: '.base_url()."index.php/welcome");
		}
	}

    /**
    * Purpose of the function          function to get the available hotel related cancellation policies
    * @author                          
    */
    public function getAllCancellationPoliciesForCurrentUser()
    {
        $this->load->model('cancellation_policy_model');   

        if($this->getUserType() == '1')
        {
            $allCancellationPolicyDetails = $this->cancellation_policy_model->select('cancellation_policy');

            if(null != $allCancellationPolicyDetails && $allCancellationPolicyDetails != "")
            {
                return $allCancellationPolicyDetails;
            }    
        }
        else
        {
            $userId          = $this->getUserId();
            $allCancellationPolicyDetails = $this->cancellation_policy_model->selectCancellationPoliciesForUser($userId);

            if(null != $allCancellationPolicyDetails && $allCancellationPolicyDetails != "")
            {
                return $allCancellationPolicyDetails;
            }         
        }

    }           //public function getAllCancellationPoliciesForCurrentUser()  

    /**
    * Purpose of the function          function to get the available addons
    * @author                          
    */
    public function getAllAddonsDetails()
    {
        $this->load->model('addons_model');   

        if($this->getUserType() == '1')
        {
            $allAddonsDetails = $this->addons_model->select();

            if(null != $allAddonsDetails && $allAddonsDetails != "")
            {
                return $allAddonsDetails;
            }     
        }
        else
        {
            $userId          = $this->getUserId();
            $allAddonsDetails = $this->addons_model->getAddonsForCurrentUser($userId);

            if(null != $allAddonsDetails && $allAddonsDetails != "")
            {
                return $allAddonsDetails;
            }         
        }        

    }           //public function getAllAddonsDetails()  


    /**
    * Purpose of the function          function to get the available hotel related Popular facilities
    * @author                          
    */
    public function getAllPopularFacilitiesForCurrentUser()
    {
        $this->load->model('popular_facilities_hotel_model');   

        if($this->getUserType() == '1')
        {
            $allPopularFacilityDetails = $this->popular_facilities_hotel_model->select('popular_facilities_hotel');

            if(null != $allPopularFacilityDetails && $allPopularFacilityDetails != "")
            {
                return $allPopularFacilityDetails;
            }    
        }
        else
        {
            $userId          = $this->getUserId();
            $allPopularFacilityDetails = $this->popular_facilities_hotel_model->selectPopularFacilitiesForUser($userId);

            if(null != $allPopularFacilityDetails && $allPopularFacilityDetails != "")
            {
                return $allPopularFacilityDetails;
            }         
        }

    }           //public function getAllPopularFacilitiesForCurrentUser()  

    //function to get bed types
    public function getBedTypes()
    {       
        $this->load->model('bed_type_model');                
        $queryBedTypes = $this->bed_type_model->select('bed_type');

        //data available?
        if(!$queryBedTypes == 0)
        {
            return ($queryBedTypes);

        }           //if(!$querygetCategoryWiseProperty == 0)

    }           //public function getBedTypes()

    //function to get mattress types
    public function getMattressTypes()
    {       
        $this->load->model('mattress_type_model');                
        $queryMattressTypes = $this->mattress_type_model->select('mattress_type');

        //data available?
        if(!$queryMattressTypes == 0)
        {
            return ($queryMattressTypes);

        }           //if(!$querygetCategoryWiseProperty == 0)

    }           //public function getMattressTypes()

    //function to get category wise property to chart
    public function getCategoryWiseProperty()
    {       
        $this->load->model('report_model');
        $user_type = $this->getUserType();

        //logged in as super admin?
        if($user_type == '1')
        {
            //yes, get all category wise property
            $querygetCategoryWiseProperty = $this->report_model->getCategoryWiseProperty();
            
        }
        else if ($user_type == '4')
        {
            //no, he is the hotel admin
            $user_id = $this->getUserId();
            $querygetCategoryWiseProperty = $this->report_model->getCategoryWisePropertyForSpecificUser($user_id);
        }


        //data available?
        if(!$querygetCategoryWiseProperty == 0)
        {  
            //yes then create an array to display the data in chart
            for ($index=0; $index <sizeof($querygetCategoryWiseProperty) ; $index++)
            { 
                $data_set[$index] = $querygetCategoryWiseProperty[$index]['total_count'];
            }

            return ($data_set);

        }
        else
        {
            return 0;
        }           //if(!$querygetCategoryWiseProperty == 0)

    }           //public function getCategoryWiseProperty()

    //function to get total payments count
    public function getPaymentCountToAdminDashboard()
    {       
        $this->load->model('payment_model');
        $user_type = $this->getUserType();

        //logged in as super admin?
        if($user_type == '1')
        {
            //yes, get all category wise property
            $totalPropertyCount = $this->payment_model->select('payment');
            
        }
        else if ($user_type == '4')
        {
            //no, he is the hotel admin
            $user_id = $this->getUserId();
            $totalPropertyCount = $this->payment_model->getPaymentCountToAdminDashboard($user_id);
        }

        //data available?
        if($totalPropertyCount != '')
        {
            return ($totalPropertyCount);

        }           //if(!$querygetCategoryWiseProperty == 0)

    }           //public function getCategoryWiseProperty()

    //function to get booking rate for each propperty
    public function getBookingRateofEachProperty()
    {       
        $this->load->model('report_model');
        $user_type = $this->getUserType();

        //logged in as super admin?
        if($user_type == '1')
        {
            //yes, get all category wise property
            $queryBookingRateofEachProperty = $this->report_model->getBookingRateofEachProperty();
            
        }
        else if ($user_type == '4')
        {
            //no, he is the hotel admin
            $user_id = $this->getUserId();

            //get the category wise property
            $queryBookingRateofEachProperty = $this->report_model->getBookingRateofEachPropertyOfHotelAdmin($user_id);
        }

        //data available?
        if(!$queryBookingRateofEachProperty == 0)
        {   
            for ($index=0; $index <sizeof($queryBookingRateofEachProperty) ; $index++)
            {       
                if (@sizeof($test[$queryBookingRateofEachProperty[$index]['ho_type_name']]['month'])==0)
                {                   
                    $test[$queryBookingRateofEachProperty[$index]['ho_type_name']]['month'] = array(0,0,0,0,0,0,0,0,0,0,0,0);
                }

                $nIndex = ((1*$queryBookingRateofEachProperty[$index]['month'])-1);

                $test[$queryBookingRateofEachProperty[$index]['ho_type_name']]['month'][$nIndex] = (1*$queryBookingRateofEachProperty[$index]['total_res_count']);
             
            }

            $json_array = array();
            foreach ($test as $key => $year_value)
            {
                $data['name'] = $key;
                $data['data'] = $year_value['month'];

                array_push($json_array, $data);
            }

            return (json_encode($json_array));


        }           //if(!$querygetCategoryWiseProperty == 0)
        /*else
        {
            $data['name'] = '2016';
            $data['data'] = 0,0,0,0,0,0,0,0,0,0,0,0;
            
                array_push($json_array, $data);
            // $array = array('name'=>'2016','data'=> 0,0,0,0,0,0,0,0,0,0,0,0);

            return (json_encode($json_array));            
        }*/
            // var_dump(json_encode($array));
            // exit();            

    }           //public function getBookingRateofEachProperty()

    //function to insert hotel location
    public function updateHotelLocation()
    {
        $this->load->model('hotel_model');
        $returnValues = array();

        if (isset($_POST['hotelID']) && !empty($_POST['hotelID']))
        {
            $hotelID   = $_POST['hotelID'];

            isset($_POST['newLat'])  ? $formData['hotel_latitude']  = $_POST['newLat'] : $formData['hotel_latitude']   = '';
            isset($_POST['newLng'])  ? $formData['hotel_longitude'] = $_POST['newLng'] : $formData['hotel_longitude']  = '';
            
            $getUpdatedData = $this->hotel_model->update('hotel', $formData, $hotelID);

            // data base updated
            if (null != $getUpdatedData && $getUpdatedData != '')
            {                
                $returnValues = "success";
            }
            else
            {                
                $returnValues = "Location did not add successfully";

            }           //if (null != $getUpdatedData && $getUpdatedData != '')

            echo $returnValues;

        }           //if (isset($_POST['hotelID']) && !empty($_POST['hotelID']))
        
    }           //public function updateHotelLocation()

    //function to get the available hotels for the current user
    public function getAllHotelsForCurrentUser()
    {
        $this->load->model('hotelUser_model');
        $this->load->model('hotel_model');
        $userId = $this->getUserId();
        
        if($this->getUserType() == '1')
        {
            $allHotelDetails = $this->hotel_model->select('hotel');

            if(null != $allHotelDetails && $allHotelDetails != "")
            {
                return $allHotelDetails;
            }    
        }
        else
        {
            $allHotels = $this->hotelUser_model->getAllHotelsForTheCurrentUser($userId);

            if (null != $allHotels && $allHotels != "")
            {
                $hotelDataArray  = array();
                for ($hotelIndex = 0; $hotelIndex<(sizeof($allHotels)); $hotelIndex++)
                {
                    $hotelDataArray[$hotelIndex] = $this->hotel_model->getHotelsForSpecificId($allHotels[$hotelIndex]['hotel_id']);

                }           //for ($hotelIndex=0; $hotelIndex<sizeof($allHotels); $hotelIndex++)

                return $hotelDataArray; 
                
            }           //if(null != $allHotels && $allHotels != "")  
        }  

    }           //public function getAllHotelsForCurrentUser() 

    //function to get the available hotels for the current user
    public function ajaxGtAllHotelsForCurrentUser()
    {
        $this->load->model('hotelUser_model');
        $this->load->model('hotel_model');
        $userId = $this->getUserId();
        $returnValues = array();
        
        if($this->getUserType() == '1')
        {
            $allHotelDetails = $this->hotel_model->select('hotel');

            if(null != $allHotelDetails && $allHotelDetails != "")
            {
                $returnValues['msg'] = $allHotelDetails;
            }    
        }
        else
        {
            $allHotels = $this->hotelUser_model->getAllHotelsForTheCurrentUser($userId);

            if (null != $allHotels && $allHotels != "")
            {
                $hotelDataArray  = array();
                for ($hotelIndex = 0; $hotelIndex<(sizeof($allHotels)); $hotelIndex++)
                {
                    $hotelDataArray[$hotelIndex] = $this->hotel_model->getHotelsForSpecificId($allHotels[$hotelIndex]['hotel_id']);

                }           //for ($hotelIndex=0; $hotelIndex<sizeof($allHotels); $hotelIndex++)
                
                $returnValues['msg'] = $hotelDataArray;
                
            }           //if(null != $allHotels && $allHotels != "")  
        } 

        echo (json_encode($returnValues));

    }           //public function ajaxGtAllHotelsForCurrentUser()  

    //function to get the available hotels for the current user via ajax
    public function ajaxGetAllHotelsForCurrentUser()
    {
        $this->load->model('hotelUser_model');
        $this->load->model('hotel_model');
        $returnValues    = array();
        
        if (isset($_POST['userID']) && !empty($_POST['userID']))
        {
            $userId = $_POST['userID'];

            $allHotels = $this->hotelUser_model->getAllHotelsForTheCurrentUser($userId);

            if (null != $allHotels && $allHotels != "")
            {
                $hotelDataArray  = array();

                for ($hotelIndex = 0; $hotelIndex<(sizeof($allHotels)); $hotelIndex++)
                {
                    $hotelDataArray[$hotelIndex] = $this->hotel_model->getHotelsForSpecificId($allHotels[$hotelIndex]['hotel_id']);

                }           //for ($hotelIndex=0; $hotelIndex<sizeof($allHotels); $hotelIndex++)

                $returnValues['status']     = 'success';                
                
            }           //if(null != $allHotels && $allHotels != "")  
            else
            {
                $returnValues['status']     = 'error';               

            }

                echo json_encode($returnValues); 
            
        }           //if (isset($_POST['userID']) && !empty($_POST['userID']))

    }           //public function getAllHotelsForCurrentUser()	    
  
    /**
     * Purpose of the function          function to get the available hotel related awards for the current user
     * @author                          
     */     
   

    public function getAllAwardsForCurrentUser()
    {
        $this->load->model('award_model');   

        if($this->getUserType() == '1')
        {
            $allAwardsDetails = $this->award_model->getSuperAdminAwardDetails();

            if(null != $allAwardsDetails && $allAwardsDetails != "")
            {
                return $allAwardsDetails;
            }    
        }
        else
        {
            $userId             = $this->getUserId();
            $allAwardDetails = $this->award_model->selectawardsForUser($userId);

            if(null != $allAwardDetails && $allAwardDetails != "")
            {
                return $allAwardDetails;
            }         
        }
    }           
        
    /*---------------- ---------End of getAllAwardsForCurrentUser()---------------------------*/


    /**
     * Purpose of the function          modal award settings preview
     * @author                          
     */         
    public function getAllAwardsDetailsViewModal()
    {
        $returnValues = array();

        if((isset($_POST['awardId']))) 
        {
            
            $this->load->model('award_model');

            $awardAllDetails = $this->award_model->getAwardTypeValuesPreview(array('award_id' => $_POST['awardId']));
                
            if (!empty($awardAllDetails))
            {

                $returnValues['awardAllDetail'] = $awardAllDetails->row();
                $returnValues['status'] = 'success';
                $returnValues['msg'] = 'Award details return';
            }
            else
            {
                $returnValues['status'] = 'error';
                $returnValues['msg'] = 'Not existing Award';
            }            
            
        }
        else
        {
            $returnValues['status'] = 'error';
            $returnValues['msg'] = 'data not send';         
        }

        echo json_encode($returnValues);

    }
    /*---------------- ---------End of getAllAwardsDetailsViewModal()---------------------------*/

    /**
     * Purpose of the function          save award settings preview details
     * @author                          
     */   
    public function saveAwardEditedDetails($phpRequest=null,$awardIDphp=null,$editedDataphp=null)
    {
        $returnValues = array();

        $this->load->model('award_model');
        
        if((isset($_POST['editedAwardDetails'])) &&($_POST['submitMode']=='ajax')) // check is this ajax caller
        {     
            $checkExistingData =$this->award_model->checkExistingData($_POST['awardId'],$_POST['editedAwardDetails']['award_name'],$_POST['editedAwardDetails']['award_date'],$_POST['hotel']); 
        
            if ($checkExistingData ==0) 
            {
                $result = $queryAwardResult = $this->award_model->update_records($_POST['awardId'], $_POST['editedAwardDetails']); // update database

                
                if (!empty($result))    // if update database
                {   
                    $returnValues['status'] = 'success';
                    $returnValues['msg']    = 'Data base updated';
                }
                
                else                   // not update database
                {
                    $returnValues['status'] = "error";
                    $returnValues['msg']    = 'Not updated award settings.';
                }

            }
            else
            {
                $returnValues['status'] = "error";
                $returnValues['msg']    = "Award already exists in this date";

            } 
            echo json_encode($returnValues);
        }

        elseif($phpRequest=='php')
        {            
           
            $result = $queryAwardResult = $this->award_model->update_records($awardIDphp, $editedDataphp);  // update database

            
            if ($result==1)     // if update database
            { 
                $returnValues['status'] = 'success';
                $returnValues['msg']    = 'Data base updated';
            }
            
            else                // not update database
            {
                $returnValues['status'] = "error";
                $returnValues['msg']    = "Data base not updated";
            }

            return $returnValues;
        }     
        
    }
    /*---------------- ---------End of saveAwardEditedDetails()---------------------------*/	

    /**
    * Purpose of the function          function to get the available hotel related Offers for the current user
    * @author                          
    */
    public function getAllOffersForCurrentUser()
    {
        $this->load->model('offer_model');   

        if($this->getUserType() == '1')
        {
            $allOffersDetails = $this->offer_model->getSuperAdminOffersDetails();

            if(null != $allOffersDetails && $allOffersDetails != "")
            {
                return $allOffersDetails;
            }    
        }
        else
        {
            $userId             = $this->getUserId();
            $allOfferDetails = $this->offer_model->selectaOffersForUser($userId);

            if(null != $allOfferDetails && $allOfferDetails != "")
            {
                return $allOfferDetails;
            }         
        }
    }           
        
    /*---------------- ---------End of getAllOffersForCurrentUser()---------------------------*/

    /**
    * Purpose of the function          function to get the available hotel related promotion for the current user
    * @author                          
    */
    public function getAllPromotionsForCurrentUser()
    {
        $this->load->model('promotion_model');   

        if($this->getUserType() == '1')
        {
            $allPromotionsDetails = $this->promotion_model->select();

            if(null != $allPromotionsDetails && $allPromotionsDetails != "")
            {
                return $allPromotionsDetails;
            }    
        }
        else
        {
            $userId               = $this->getUserId();
            $allPromotionsDetails = $this->promotion_model->selectPromotionsForUser($userId);

            if(null != $allPromotionsDetails && $allPromotionsDetails != "")
            {
                return $allPromotionsDetails;
            }         
        }
    }           
        
    /*---------------- ---------End of getAllPromotionsForCurrentUser()---------------------------*/

    //modal offer settings preview
    public function getAllOffersDetailsViewModal()
    {
        $returnValues = array();

        if((isset($_POST['offerId']))) 
        {
            
            $this->load->model('offer_model');

            $offerAllDetails = $this->offer_model->getOfferTypeValuesPreview(array('offer_id' => $_POST['offerId']));
                
            if (!empty($offerAllDetails))
            {
                $returnValues['offerAllDetail'] = $offerAllDetails->row();
                $returnValues['status']         = 'success';
                $returnValues['msg']            = 'Offer details return';
            }
            else
            {
                $returnValues['status'] = 'error';
                $returnValues['msg']    = 'Not existing Offer';
            }            
            
        }
        else
        {
            $returnValues['status'] = 'error';
            $returnValues['msg']    = 'data not send';         
        }

        echo json_encode($returnValues);

    } 

    //save food settings preview details
    public function saveOfferEditedDetails()
    {
        $returnValues = array();

        $this->load->model('offer_model');
    
        if((isset($_POST['offerId'])) && ($_POST['submitMode'] == 'ajax')) // check is this ajax caller
        {     
            if(!empty($_FILES['edit_offer_image_path']['name'])) 
            {
                $file_element_name       = 'edit_offer_image_path';

                $config['upload_path']   = './uploads/OfferAdvertisement/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']      = 1024*1;  
                $config['file_name']     = 'eHotel_Offer_Image_'; 

                $this->load->library('upload', $config);
                
                if (!$this->upload->do_upload($file_element_name))
                {
                    $returnValues['status'] = 'error_file_uploading';
                    $returnValues['file_upload_error_msg']    = $this->upload->display_errors('', '');
                }
                else
                {
                    $data = $this->upload->data();

                    $editedOfferDetails['offer_image']       = $data['file_name'];
                    $editedOfferDetails['offer_image_path']  = $config['upload_path'];
                    $editedOfferDetails['offer_name']        = $_POST['offer_name'];
                    $editedOfferDetails['discount']          = $_POST['offer_discount'];
                    $editedOfferDetails['offer_description'] = $_POST['offer_description'];                    
                    $editedOfferDetails['offer_startdate']   = $_POST['offer_startdate'];                    
                    $editedOfferDetails['offer_enddate']     = $_POST['offer_enddate'];                    

                    $queryOfferResult = $this->offer_model->update_records($_POST['offerId'],$editedOfferDetails); // update database
                    
                    if ($queryOfferResult != 0)    // if update database
                    {   
                        $returnValues['status'] = 'success';
                        $returnValues['msg']    = 'Data base updated';
                    }                    
                    else                   // not update database
                    {
                        $returnValues['status'] = "error";
                        $returnValues['msg']    = "Data base not updated";
                    }
                }
            }
            else 
            {
                $editedOfferDetails['offer_name']        = $_POST['offer_name'];
                $editedOfferDetails['discount']          = $_POST['offer_discount'];
                $editedOfferDetails['offer_description'] = $_POST['offer_description'];                    
                $editedOfferDetails['offer_startdate']   = $_POST['offer_startdate'];                    
                $editedOfferDetails['offer_enddate']     = $_POST['offer_enddate'];                    

                $queryOfferResult = $this->offer_model->update_records($_POST['offerId'],$editedOfferDetails); // update database
                
                if ($queryOfferResult != 0)    // if update database
                {   
                    $returnValues['status'] = 'success';
                    $returnValues['msg']    = 'Data base updated';
                }
                
                else                   // not update database
                {
                    $returnValues['status'] = "error";
                    $returnValues['msg']    = "Data base not updated";
                }
            }
        }        
            echo json_encode($returnValues);        
    } 
   
     /**
     * Purpose of the function          function to get the available hotel related Foods for the current user
     * @author                          
     */     
    public function getAllFoodsForCurrentUser()
    {
        $this->load->model('food_model');   

        if($this->getUserType() == '1')
        {
            $allFoodsDetails = $this->food_model->getSuperAdminFoodDetails();

            if(null != $allFoodsDetails && $allFoodsDetails != "")
            {
                return $allFoodsDetails;
            }    
        }
        else
        {
            $userId             = $this->getUserId();
            $allFoodDetails = $this->food_model->selectaFoodForUser($userId);

            if(null != $allFoodDetails && $allFoodDetails != "")
            {
                return $allFoodDetails;
            }         
        }
    }           
        
    /*---------------- ---------End of getAllFoodsForCurrentUser()---------------------------*/



    /**
     * Purpose of the function          modal food settings preview
     * @author                          
     */         
    public function getAllFoodsDetailsViewModal()
    {
        $returnValues = array();

        if((isset($_POST['foodId']))) 
        {
            
            $this->load->model('food_model');

            $foodAllDetails = $this->food_model->getFoodTypeValuesPreview(array('food_id' => $_POST['foodId']));
                
            if (!empty($foodAllDetails))
            {

                $returnValues['foodAllDetail'] = $foodAllDetails->row();
                $returnValues['status'] = 'success';
                $returnValues['msg'] = 'Food details return';
            }
            else
            {
                $returnValues['status'] = 'error';
                $returnValues['msg'] = 'Not existing Food';
            }            
            
        }
        else
        {
            $returnValues['status'] = 'error';
            $returnValues['msg'] = 'data not send';         
        }

        echo json_encode($returnValues);

    }
    /*---------------- ---------End of getAllFoodsDetailsViewModal()---------------------------*/

    /**
     * Purpose of the function          save food settings preview details
     * @author                          
     */   
    public function saveFoodEditedDetails($phpRequest=null,$foodIDphp=null,$editedDataphp=null)
    {
        $returnValues = array();

        $this->load->model('food_model');
        
        if((isset($_POST['editedFoodDetails'])) &&($_POST['submitMode']=='ajax')) // check is this ajax caller
        {     
            $checkExistingData =$this->food_model->checkExistingData($_POST['foodId'],$_POST['editedFoodDetails']['food_name'],$_POST['hotel']); 
        
            if ($checkExistingData ==0) {
                $result = $queryFoodResult = $this->food_model->update_records($_POST['foodId'], $_POST['editedFoodDetails']); // update database

                
                if (!empty($result))    // if update database
                {   
                    $returnValues['status'] = 'success';
                    $returnValues['msg']    = 'Data base updated';
                }
                
                else                   // not update database
                {
                    $returnValues['status'] = "error";
                    $returnValues['msg']    = "Data base not updated";
                }
            }
            else
            {
                $returnValues['status'] = "error";
                $returnValues['msg']    = "Food already exists in this hotel";

            } 


            echo json_encode($returnValues);
        }

        elseif($phpRequest=='php')
        {            
           
            $result = $queryFoodResult = $this->food_model->update_records($foodIDphp, $editedDataphp);  // update database

            
            if ($result==1)     // if update database
            { 
                $returnValues['status'] = 'success';
                $returnValues['msg']    = 'Data base updated';
            }
            
            else                // not update database
            {
                $returnValues['status'] = "error";
                $returnValues['msg']    = "Data base not updated";
            }

            return $returnValues;
        }     
        
    }
    /*---------------- ---------End of saveFoodEditedDetails()---------------------------*/


    /**
     * Purpose of the function          modal entertainment program settings preview
     * @author                          
     */         
    public function getAllEntertainmentProgramsDetailsViewModal()
    {
        $returnValues = array();

        if((isset($_POST['entertainmentProgramId']))) 
        {
            
            $this->load->model('hotel_entertainment_program_model');

            $entertainmentProgramAllDetails = $this->hotel_entertainment_program_model->getEntertainmentProgramValuesPreview(array('en_program_id' => $_POST['entertainmentProgramId']));
                
            if (!empty($entertainmentProgramAllDetails))
            {

                $returnValues['entertainmentProgramAllDetail'] = $entertainmentProgramAllDetails->row();
                $returnValues['status'] = 'success';
                $returnValues['msg'] = 'Entertainment program details return';
            }
            else
            {
                $returnValues['status'] = 'error';
                $returnValues['msg'] = 'Not existing Food';
            }            
            
        }
        else
        {
            $returnValues['status'] = 'error';
            $returnValues['msg'] = 'data not send';         
        }

        echo json_encode($returnValues);

    }
    /*---------------- ---------End of getAllEntertainmentProgramsDetailsViewModal()---------------------------*/

    /**
     * Purpose of the function          save entertainment program settings preview details
     * @author                          
     */   
    public function saveEntertainmentProgramsEditedDetails($phpRequest=null,$foodIDphp=null,$editedDataphp=null)
    {
        $returnValues = array();

        $this->load->model('hotel_entertainment_program_model');
        
        if((isset($_POST['editedEntertainmentProgramDetails'])) &&($_POST['submitMode']=='ajax')) // check is this ajax caller
        {     
            $checkExistingData =$this->hotel_entertainment_program_model->checkExistingData($_POST['entertainmentProgramId'],$_POST['editedEntertainmentProgramDetails']['en_program_name'],$_POST['hotel']); 
            if ($checkExistingData ==0) {
                $result = $queryEntertainmentProgramResult = $this->hotel_entertainment_program_model->update_records($_POST['entertainmentProgramId'], $_POST['editedEntertainmentProgramDetails']); // update database
                
                if (!empty($result))    // if update database
                {   
                    $returnValues['status'] = 'success';
                    $returnValues['msg']    = 'Data base updated';
                }
                
                else                   // not update database
                {
                    $returnValues['status'] = "error";
                    $returnValues['msg']    = 'Not updated entertainment program settings.';
                }
            
            
            }
            else
            {
                $returnValues['status'] = "error";
                $returnValues['msg']    = "Entertainment program already exists in this hotel";

            } 



            echo json_encode($returnValues);
        }

        elseif($phpRequest=='php')
        {            
           
            $result = $queryEntertainmentProgramResult = $this->hotel_entertainment_program_model->update_records($foodIDphp, $editedDataphp);  // update database

            
            if ($result==1)     // if update database
            { 
                $returnValues['status'] = 'success';
                $returnValues['msg']    = 'Data base updated';
            }
            
            else                // not update database
            {
                $returnValues['status'] = "error";
                $returnValues['msg']    = "Data base not updated";
            }

            return $returnValues;
        }     
        
    }
    /*---------------- ---------End of saveEntertainmentProgramsEditedDetails()---------------------------*/


    /**
     * Purpose of the function          modal special program settings preview
     * @author                          
     */         
    public function getAllSpecialProgramsDetailsViewModal()
    {
        $returnValues = array();

        if((isset($_POST['specialProgramId']))) 
        {
            
            $this->load->model('special_program_model');

            $specialProgramAllDetails = $this->special_program_model->getSpecialProgramValuesPreview(array('sp_program_id' => $_POST['specialProgramId']));
                
            if (!empty($specialProgramAllDetails))
            {

                $returnValues['specialProgramAllDetail'] = $specialProgramAllDetails->row();
                $returnValues['status'] = 'success';
                $returnValues['msg'] = 'Special program details return';
            }
            else
            {
                $returnValues['status'] = 'error';
                $returnValues['msg'] = 'Not existing Food';
            }            
            
        }
        else
        {
            $returnValues['status'] = 'error';
            $returnValues['msg'] = 'data not send';         
        }

        echo json_encode($returnValues);

    }
    /*---------------- ---------End of getAllSpecialProgramsDetailsViewModal()---------------------------*/

    /**
     * Purpose of the function          save special program settings preview details
     * @author                          
     */   
    public function saveSpecialProgramsEditedDetails($phpRequest=null,$foodIDphp=null,$editedDataphp=null)
    {
        $returnValues = array();

        $this->load->model('special_program_model');
        
        if((isset($_POST['editedSpecialProgramDetails'])) &&($_POST['submitMode']=='ajax')) // check is this ajax caller
        {     
            $checkExistingData =$this->special_program_model->checkExistingData($_POST['specialProgramId'],$_POST['editedSpecialProgramDetails']['sp_program_name'],$_POST['hotel']); 
            if ($checkExistingData ==0) 
            {
                $result = $querySpecialProgramResult = $this->special_program_model->update_records($_POST['specialProgramId'], $_POST['editedSpecialProgramDetails']); // update database

                
                if (!empty($result))    // if update database
                {   
                    $returnValues['status'] = 'success';
                    $returnValues['msg']    = 'Data base updated';
                }
                
                else                   // not update database
                {
                    $returnValues['status'] = "error";
                    $returnValues['msg']    = "'Not updated special program settings.'";
                }

            }
            else
            {
                $returnValues['status'] = "error";
                $returnValues['msg']    = "Special program already exists in this hotel";

            } 
            echo json_encode($returnValues);
        }

        elseif($phpRequest=='php')
        {            
           
            $result = $querySpecialProgramResult = $this->special_program_model->update_records($foodIDphp, $editedDataphp);  // update database

            
            if ($result==1)     // if update database
            { 
                $returnValues['status'] = 'success';
                $returnValues['msg']    = 'Data base updated';
            }
            
            else                // not update database
            {
                $returnValues['status'] = "error";
                $returnValues['msg']    = "Data base not updated";
            }

            return $returnValues;
        }     
        
    }
    /*---------------- ---------End of saveSpecialProgramsEditedDetails()---------------------------*/


    /**
     * Purpose of the function          modal beach settings preview
     * @author                          
     */         
    public function getAllBeachesDetailsViewModal()
    {
        $returnValues = array();

        if((isset($_POST['beachesId']))) 
        {
            
            $this->load->model('beaches_model');

            $beachAllDetails = $this->beaches_model->getBeachTypeValuesPreview(array('beaches_id' => $_POST['beachesId']));
                
            if (!empty($beachAllDetails))
            {

                $returnValues['beachAllDetail'] = $beachAllDetails->row();
                $returnValues['status'] = 'success';
                $returnValues['msg'] = 'Beach details return';
            }
            else
            {
                $returnValues['status'] = 'error';
                $returnValues['msg'] = 'Not existing Beach';
            }            
            
        }
        else
        {
            $returnValues['status'] = 'error';
            $returnValues['msg'] = 'data not send';         
        }

        echo json_encode($returnValues);

    }
    /*---------------- ---------End of getAllBeachesDetailsViewModal()---------------------------*/

    /**
     * Purpose of the function          save beach settings preview details
     * @author                          
     */   
    public function saveBeachEditedDetails($phpRequest=null,$beachIDphp=null,$editedDataphp=null)
    {
        $returnValues = array();

        $this->load->model('beaches_model');
        
        if((isset($_POST['editedBeachDetails'])) &&($_POST['submitMode']=='ajax')) // check is this ajax caller
        {     
            $checkExistingData =$this->beaches_model->checkExistingData($_POST['beachId'],$_POST['editedBeachDetails']['beaches_name'],$_POST['hotel']); 
            if ($checkExistingData ==0) 
            {
                $result = $queryBeachResult = $this->beaches_model->update_records($_POST['beachId'], $_POST['editedBeachDetails']); // update database

                
                if (!empty($result))    // if update database
                {   
                    $returnValues['status'] = 'success';
                    $returnValues['msg']    = 'Data base updated';
                }
                
                else                   // not update database
                {
                    $returnValues['status'] = "error";
                    $returnValues['msg']    = 'Not updated beach settings.';
                }

            }
            else
            {
                $returnValues['status'] = "error";
                $returnValues['msg']    = "Special program already exists in this hotel";

            } 
            echo json_encode($returnValues);
        }

        elseif($phpRequest=='php')
        {            
           
            $result = $queryBeachResult = $this->beaches_model->update_records($beachIDphp, $editedDataphp);  // update database

            
            if ($result==1)     // if update database
            { 
                $returnValues['status'] = 'success';
                $returnValues['msg']    = 'Data base updated';
            }
            
            else                // not update database
            {
                $returnValues['status'] = "error";
                $returnValues['msg']    = "Data base not updated";
            }

            return $returnValues;
        }     
        
    }
    /*---------------- ---------End of saveBeachEditedDetails()---------------------------*/

    /**
     * Purpose of the function          modal food preferences settings preview
     * @author                          
     */         
    public function getAllFoodPreferenceDetailsViewModal()
    {
        $returnValues = array();

        if((isset($_POST['foodpreferenceId']))) 
        {
            
            $this->load->model('food_preferences_model');

            $foodPreferenceAllDetails = $this->food_preferences_model->getFoodPreferenceTypeValuesPreview(array('fo_preferences_id ' => $_POST['foodpreferenceId']));
                
            if (!empty($foodPreferenceAllDetails))
            {

                $returnValues['foodPreferenceAllDetail'] = $foodPreferenceAllDetails->row();
                $returnValues['status'] = 'success';
                $returnValues['msg'] = 'Food Preference details return';
            }
            else
            {
                $returnValues['status'] = 'error';
                $returnValues['msg'] = 'Not existing Food Preference';
            }            
            
        }
        else
        {
            $returnValues['status'] = 'error';
            $returnValues['msg'] = 'data not send';         
        }

        echo json_encode($returnValues);

    }
    /*---------------- ---------End of getAllFoodPreferenceDetailsViewModal()---------------------------*/

    /**
     * Purpose of the function          save food preference settings preview details
     * @author                          
     */   
    public function saveFoodPreferenceEditedDetails($phpRequest=null,$foodPreferenceIDphp=null,$editedDataphp=null)
    {
        $returnValues = array();

        $this->load->model('food_preferences_model');
        
        if((isset($_POST['editedFoodPreferenceDetails'])) &&($_POST['submitMode']=='ajax')) // check is this ajax caller
        {     
            $checkExistingData =$this->food_preferences_model->checkExistingData($_POST['foodpreferenceId'],$_POST['editedFoodPreferenceDetails']['fo_preferences_name'],$_POST['hotel']); 
            if ($checkExistingData ==0) 
            {

                $result = $queryFoodPreferenceResult = $this->food_preferences_model->update_records($_POST['foodpreferenceId'], $_POST['editedFoodPreferenceDetails']); // update database

                
                if (!empty($result))    // if update database
                {   
                    $returnValues['status'] = 'success';
                    $returnValues['msg']    = 'Data base updated';
                }
                
                else                   // not update database
                {
                    $returnValues['status'] = "error";
                    $returnValues['msg']    = 'Not updated Food preference settings.';
                }

            }
            else
            {
                $returnValues['status'] = "error";
                $returnValues['msg']    = "Food preference already exists in this hotel";

            } 
            echo json_encode($returnValues);
        }

        elseif($phpRequest=='php')
        {            
           
            $result = $queryFoodPreferenceResult = $this->food_preferences_model->update_records($foodPreferenceIDphp, $editedDataphp);  // update database

            
            if ($result==1)     // if update database
            { 
                $returnValues['status'] = 'success';
                $returnValues['msg']    = 'Data base updated';
            }
            
            else                // not update database
            {
                $returnValues['status'] = "error";
                $returnValues['msg']    = "Data base not updated";
            }

            return $returnValues;
        }     
        
    }
    /*---------------- ---------End of saveFoodPreferenceEditedDetails()---------------------------*/

     /**
     * Purpose of the function          modal forest settings preview
     * @author                          
     */         
    public function getAllForestsDetailsViewModal()
    {
        $returnValues = array();

        if((isset($_POST['forestsId']))) 
        {
            
            $this->load->model('forests_model');

            $forestAllDetails = $this->forests_model->getForestTypeValuesPreview(array('forests_id' => $_POST['forestsId']));
                
            if (!empty($forestAllDetails))
            {

                $returnValues['forestAllDetail'] = $forestAllDetails->row();
                $returnValues['status'] = 'success';
                $returnValues['msg'] = 'Forest details return';
            }
            else
            {
                $returnValues['status'] = 'error';
                $returnValues['msg'] = 'Not existing forest';
            }            
            
        }
        else
        {
            $returnValues['status'] = 'error';
            $returnValues['msg'] = 'data not send';         
        }

        echo json_encode($returnValues);

    }
    /*---------------- ---------End of getAllForestsDetailsViewModal()---------------------------*/


    /**
     * Purpose of the function          save forest settings preview details
     * @author                          
     */   
    public function saveForestEditedDetails($phpRequest=null,$forestIDphp=null,$editedDataphp=null)
    {
        $returnValues = array();

        $this->load->model('forests_model');
        
        if((isset($_POST['editedForestDetails'])) &&($_POST['submitMode']=='ajax')) // check is this ajax caller
        {     
            $checkExistingData =$this->forests_model->checkExistingData($_POST['forestId'],$_POST['editedForestDetails']['forests_name'],$_POST['hotel']); 
            if ($checkExistingData ==0) 
            {
                $result = $queryForestResult = $this->forests_model->update_records($_POST['forestId'], $_POST['editedForestDetails']); // update database

                
                if (!empty($result))    // if update database
                {   
                    $returnValues['status'] = 'success';
                    $returnValues['msg']    = 'Data base updated';
                }
                
                else                   // not update database
                {
                    $returnValues['status'] = "error";
                    $returnValues['msg']    = 'Not updated forest settings.';
                }

            }
            else
            {
                $returnValues['status'] = "error";
                $returnValues['msg']    = "Forest already exists in this hotel";

            } 
            echo json_encode($returnValues);
        }

        elseif($phpRequest=='php')
        {            
           
            $result = $queryForestResult = $this->forests_model->update_records($forestIDphp, $editedDataphp);  // update database

            
            if ($result==1)     // if update database
            { 
                $returnValues['status'] = 'success';
                $returnValues['msg']    = 'Data base updated';
            }
            
            else                // not update database
            {
                $returnValues['status'] = "error";
                $returnValues['msg']    = "Data base not updated";
            }

            return $returnValues;
        }     
        
    }
    /*---------------- ---------End of saveForestEditedDetails()---------------------------*/

    /**
     * Purpose of the function          modal historic settings preview
     * @author                          
     */         
    public function getAllHistoricsDetailsViewModal()
    {
        $returnValues = array();

        if((isset($_POST['historicsId']))) 
        {
            
            $this->load->model('historic_model');

            $historicAllDetails = $this->historic_model->getHistoricTypeValuesPreview(array('historic_id' => $_POST['historicsId']));
                
            if (!empty($historicAllDetails))
            {

                $returnValues['historicAllDetail'] = $historicAllDetails->row();
                $returnValues['status'] = 'success';
                $returnValues['msg'] = 'Historic details return';
            }
            else
            {
                $returnValues['status'] = 'error';
                $returnValues['msg'] = 'Not existing Historic';
            }            
            
        }
        else
        {
            $returnValues['status'] = 'error';
            $returnValues['msg'] = 'data not send';         
        }

        echo json_encode($returnValues);

    }
    /*---------------- ---------End of getAllHistoricsDetailsViewModal()---------------------------*/


    /**
     * Purpose of the function          save historic settings preview details
     * @author                          
     */   
    public function saveHistoricEditedDetails($phpRequest=null,$historicIDphp=null,$editedDataphp=null)
    {
        $returnValues = array();

        $this->load->model('historic_model');
        
        if((isset($_POST['editedHistoricDetails'])) &&($_POST['submitMode']=='ajax')) // check is this ajax caller
        {     
            $checkExistingData =$this->historic_model->checkExistingData($_POST['historicId'],$_POST['editedHistoricDetails']['historic_name'],$_POST['hotel']); 
            if ($checkExistingData ==0) 
            {
                $result = $queryHistoricResult = $this->historic_model->update_records($_POST['historicId'], $_POST['editedHistoricDetails']); // update database

                
                if (!empty($result))    // if update database
                {   
                    $returnValues['status'] = 'success';
                    $returnValues['msg']    = 'Data base updated';
                }
                
                else                   // not update database
                {
                    $returnValues['status'] = "error";
                    $returnValues['msg']    = 'Not updated historic settings.';
                }
            }
            else
            {
                $returnValues['status'] = "error";
                $returnValues['msg']    = "Historic already exists in this hotel";

            }

            echo json_encode($returnValues);
        }

        elseif($phpRequest=='php')
        {            
           
            $result = $queryHistoricResult = $this->historic_model->update_records($historicIDphp, $editedDataphp);  // update database

            
            if ($result==1)     // if update database
            { 
                $returnValues['status'] = 'success';
                $returnValues['msg']    = 'Data base updated';
            }
            
            else                // not update database
            {
                $returnValues['status'] = "error";
                $returnValues['msg']    = "Data base not updated";
            }

            return $returnValues;
        }     
        
    }
    /*---------------- ---------End of saveHistoricEditedDetails()---------------------------*/
    
     /**
     * Purpose of the function          modal mountain settings preview
     * @author                          
     */         
    public function getAllMountainsDetailsViewModal()
    {
        $returnValues = array();

        if((isset($_POST['mountainsId']))) 
        {
            
            $this->load->model('mountains_model');

            $mountainAllDetails = $this->mountains_model->getMountainTypeValuesPreview(array('mountains_id' => $_POST['mountainsId']));
                
            if (!empty($mountainAllDetails))
            {

                $returnValues['mountainAllDetail'] = $mountainAllDetails->row();
                $returnValues['status'] = 'success';
                $returnValues['msg'] = 'Mountain details return';
            }
            else
            {
                $returnValues['status'] = 'error';
                $returnValues['msg'] = 'Not existing mountain';
            }            
            
        }
        else
        {
            $returnValues['status'] = 'error';
            $returnValues['msg'] = 'data not send';         
        }

        echo json_encode($returnValues);

    }
    /*---------------- ---------End of getAllMountainsDetailsViewModal()---------------------------*/

    /**
     * Purpose of the function          save mountain settings preview details
     * @author                          
     */   
    public function saveMountainEditedDetails($phpRequest=null,$mountainIDphp=null,$editedDataphp=null)
    {
        $returnValues = array();

        $this->load->model('mountains_model');
        
        if((isset($_POST['editedMountainDetails'])) &&($_POST['submitMode']=='ajax')) // check is this ajax caller
        {     
            $checkExistingData =$this->mountains_model->checkExistingData($_POST['mountainId'],$_POST['editedMountainDetails']['mountains_name'],$_POST['hotel']); 
            if ($checkExistingData ==0) 
            {
                $result = $queryMountainResult = $this->mountains_model->update_records($_POST['mountainId'], $_POST['editedMountainDetails']); // update database

                
                if (!empty($result))    // if update database
                {   
                    $returnValues['status'] = 'success';
                    $returnValues['msg']    = 'Data base updated';
                }
                
                else                   // not update database
                {
                    $returnValues['status'] = "error";
                    $returnValues['msg']    = 'Not updated mountain settings.';
                }
            }
            else
            {
                $returnValues['status'] = "error";
                $returnValues['msg']    = "Mountain already exists in this hotel";

            }

            echo json_encode($returnValues);
        }

        elseif($phpRequest=='php')
        {            
           
            $result = $queryMountainResult = $this->mountains_model->update_records($mountainIDphp, $editedDataphp);  // update database

            
            if ($result==1)     // if update database
            { 
                $returnValues['status'] = 'success';
                $returnValues['msg']    = 'Data base updated';
            }
            
            else                // not update database
            {
                $returnValues['status'] = "error";
                $returnValues['msg']    = "Data base not updated";
            }

            return $returnValues;
        }     
        
    }
    /*---------------- ---------End of saveMountainEditedDetails()---------------------------*/

    /**
     * Purpose of the function          modal religious interest settings preview
     * @author                          
     */         
    public function getAllReligiousInterestDetailsViewModal()
    {
        $returnValues = array();

        if((isset($_POST['religiousInterestId']))) 
        {
            
            $this->load->model('religiousInterests_model');

            $religiousInterestAllDetails = $this->religiousInterests_model->getReligiousInterestTypeValuesPreview(array('re_interests_id' => $_POST['religiousInterestId']));
                
            if (!empty($religiousInterestAllDetails))
            {

                $returnValues['religiousInterestAllDetail'] = $religiousInterestAllDetails->row();
                $returnValues['status'] = 'success';
                $returnValues['msg'] = 'Religious interest details return';
            }
            else
            {
                $returnValues['status'] = 'error';
                $returnValues['msg'] = 'Not existing religious interest';
            }            
            
        }
        else
        {
            $returnValues['status'] = 'error';
            $returnValues['msg'] = 'data not send';         
        }

        echo json_encode($returnValues);

    }
    /*---------------- ---------End of getAllReligiousInterestDetailsViewModal()---------------------------*/


    /**
     * Purpose of the function          save religious interest settings preview details
     * @author                          
     */   
    public function saveReligiousInterestEditedDetails($phpRequest=null,$religiousInterestIDphp=null,$editedDataphp=null)
    {
        $returnValues = array();

        $this->load->model('religiousInterests_model');
        
        if((isset($_POST['editedReligiousInterestDetails'])) &&($_POST['submitMode']=='ajax')) // check is this ajax caller
        {     
             $checkExistingData =$this->religiousInterests_model->checkExistingData($_POST['religiousInterestId'],$_POST['editedReligiousInterestDetails']['re_interests_name'],$_POST['hotel']); 
            if ($checkExistingData ==0) 
            {
                $result = $queryReligiousInterestResult = $this->religiousInterests_model->update_records($_POST['religiousInterestId'], $_POST['editedReligiousInterestDetails']); // update database

                
                if (!empty($result))    // if update database
                {   
                    $returnValues['status'] = 'success';
                    $returnValues['msg']    = 'Data base updated';
                }
                
                else                   // not update database
                {
                    $returnValues['status'] = "error";
                    $returnValues['msg']    = 'Not updated religious interest settings.';
                }
            
            
            }
            else
            {
                $returnValues['status'] = "error";
                $returnValues['msg']    = "Religious interest already exists in this hotel";

            }

            echo json_encode($returnValues);
        }

        elseif($phpRequest=='php')
        {            
           
            $result = $queryReligiousInterestResult = $this->religiousInterests_model->update_records($religiousInterestIDphp, $editedDataphp);  // update database

            
            if ($result==1)     // if update database
            { 
                $returnValues['status'] = 'success';
                $returnValues['msg']    = 'Data base updated';
            }
            
            else                // not update database
            {
                $returnValues['status'] = "error";
                $returnValues['msg']    = "Data base not updated";
            }

            return $returnValues;
        }     
        
    }
    /*---------------- ---------End of saveReligiousInterestEditedDetails()---------------------------*/


    /**
     * Purpose of the function          modal scenery settings preview
     * @author                          
     */         
    public function getAllSceneryDetailsViewModal()
    {
        $returnValues = array();

        if((isset($_POST['sceneryId']))) 
        {
            
            $this->load->model('sceneries_model');

            $sceneryAllDetails = $this->sceneries_model->getSceneryTypeValuesPreview(array('sceneries_id' => $_POST['sceneryId']));
                
            if (!empty($sceneryAllDetails))
            {

                $returnValues['sceneryAllDetail'] = $sceneryAllDetails->row();
                $returnValues['status'] = 'success';
                $returnValues['msg'] = 'Scenery details return';
            }
            else
            {
                $returnValues['status'] = 'error';
                $returnValues['msg'] = 'Not existing scenery';
            }            
            
        }
        else
        {
            $returnValues['status'] = 'error';
            $returnValues['msg'] = 'data not send';         
        }

        echo json_encode($returnValues);

    }
    /*---------------- ---------End of getAllSceneryDetailsViewModal()---------------------------*/

    /**
     * Purpose of the function          save scenery settings preview details
     * @author                          
     */   
    public function saveSceneryEditedDetails($phpRequest=null,$sceneryIDphp=null,$editedDataphp=null)
    {
        $returnValues = array();

        $this->load->model('sceneries_model');
        
        if((isset($_POST['editedSceneryDetails'])) &&($_POST['submitMode']=='ajax')) // check is this ajax caller
        {     
             $checkExistingData =$this->sceneries_model->checkExistingData($_POST['sceneryId'],$_POST['editedSceneryDetails']['sceneries_name'],$_POST['hotel']); 
            if ($checkExistingData ==0) 
            {

                $result = $querySceneryResult = $this->sceneries_model->update_records($_POST['sceneryId'], $_POST['editedSceneryDetails']); // update database
                
                if (!empty($result))    // if update database
                {   
                    $returnValues['status'] = 'success';
                    $returnValues['msg']    = 'Data base updated';
                }
                
                else                   // not update database
                {
                    $returnValues['status'] = "error";
                    $returnValues['msg']    = 'Not updated scenery settings.';
                }
            }
            else
            {
                $returnValues['status'] = "error";
                $returnValues['msg']    = "Scenery already exists in this hotel";

            }

            echo json_encode($returnValues);
        }

        elseif($phpRequest=='php')
        {            
           
            $result = $querySceneryResult = $this->sceneries_model->update_records($sceneryIDphp, $editedDataphp);  // update database

            
            if ($result==1)     // if update database
            { 
                $returnValues['status'] = 'success';
                $returnValues['msg']    = 'Data base updated';
            }
            
            else                // not update database
            {
                $returnValues['status'] = "error";
                $returnValues['msg']    = "Data base not updated";
            }

            return $returnValues;
        }     
        
    }
    /*---------------- ---------End of saveSceneryEditedDetails()---------------------------*/

    /**
     * Purpose of the function          modal sport settings preview
     * @author                          
     */         
    public function getAllSportDetailsViewModal()
    {
        $returnValues = array();

        if((isset($_POST['sportId']))) 
        {
            
            $this->load->model('sports_model');

            $sportAllDetails = $this->sports_model->getSportTypeValuesPreview(array('sports_id' => $_POST['sportId']));
                
            if (!empty($sportAllDetails))
            {

                $returnValues['sportAllDetail'] = $sportAllDetails->row();
                $returnValues['status'] = 'success';
                $returnValues['msg'] = 'Sport details return';
            }
            else
            {
                $returnValues['status'] = 'error';
                $returnValues['msg'] = 'Not existing sport';
            }            
            
        }
        else
        {
            $returnValues['status'] = 'error';
            $returnValues['msg'] = 'data not send';         
        }

        echo json_encode($returnValues);

    }
    /*---------------- ---------End of getAllSportDetailsViewModal()---------------------------*/


    /**
     * Purpose of the function          save sport settings preview details
     * @author                          
     */   
    public function saveSportEditedDetails($phpRequest=null,$sportIDphp=null,$editedDataphp=null)
    {
        $returnValues = array();

        $this->load->model('sports_model');
        
        if((isset($_POST['editedSportDetails'])) &&($_POST['submitMode']=='ajax')) // check is this ajax caller
        {     
             $checkExistingData =$this->sports_model->checkExistingData($_POST['sportId'],$_POST['editedSportDetails']['sports_name'],$_POST['hotel']); 
            if ($checkExistingData ==0) 
            {
                $result = $querySportResult = $this->sports_model->update_records($_POST['sportId'], $_POST['editedSportDetails']); // update database

                
                if (!empty($result))    // if update database
                {   
                    $returnValues['status'] = 'success';
                    $returnValues['msg']    = 'Data base updated';
                }
                
                else                   // not update database
                {
                    $returnValues['status'] = "error";
                    $returnValues['msg']    = 'Not updated sport settings.';
                }


            }
            else
            {
                $returnValues['status'] = "error";
                $returnValues['msg']    = "Sport already exists in this hotel";

            }
            echo json_encode($returnValues);
        }

        elseif($phpRequest=='php')
        {            
           
            $result = $querySportResult = $this->sports_model->update_records($sportIDphp, $editedDataphp);  // update database

            
            if ($result==1)     // if update database
            { 
                $returnValues['status'] = 'success';
                $returnValues['msg']    = 'Data base updated';
            }
            
            else                // not update database
            {
                $returnValues['status'] = "error";
                $returnValues['msg']    = "Data base not updated";
            }

            return $returnValues;
        }     
        
    }
    /*---------------- ---------End of saveSportEditedDetails()---------------------------*/

    /**
     * Purpose of the function          modal wildlife settings preview
     * @author                          
     */         
    public function getAllWildlifeDetailsViewModal()
    {
        $returnValues = array();

        if((isset($_POST['wildlifeId']))) 
        {
            
            $this->load->model('wildlife_model');

            $wildlifeAllDetails = $this->wildlife_model->getWildlifeTypeValuesPreview(array('wildlife_id' => $_POST['wildlifeId']));
                
            if (!empty($wildlifeAllDetails))
            {

                $returnValues['wildlifeAllDetail'] = $wildlifeAllDetails->row();
                $returnValues['status'] = 'success';
                $returnValues['msg'] = 'Wildlife details return';
            }
            else
            {
                $returnValues['status'] = 'error';
                $returnValues['msg'] = 'Not existing sport';
            }            
            
        }
        else
        {
            $returnValues['status'] = 'error';
            $returnValues['msg'] = 'data not send';         
        }

        echo json_encode($returnValues);

    }
    /*---------------- ---------End of getAllWildlifeDetailsViewModal()---------------------------*/


    /**
     * Purpose of the function          save wildlife settings preview details
     * @author                          
     */   
    public function saveWildlifeEditedDetails($phpRequest=null,$wildlifeIDphp=null,$editedDataphp=null)
    {
        $returnValues = array();

        $this->load->model('wildlife_model');
        
        if((isset($_POST['editedWildlifeDetails'])) &&($_POST['submitMode']=='ajax')) // check is this ajax caller
        {     
            $checkExistingData =$this->wildlife_model->checkExistingData($_POST['wildlifeId'],$_POST['editedWildlifeDetails']['wildlife_name'],$_POST['hotel']); 
            if ($checkExistingData ==0) 
            {

                $result = $queryWildlifeResult = $this->wildlife_model->update_records($_POST['wildlifeId'], $_POST['editedWildlifeDetails']); // update database

                
                if (!empty($result))    // if update database
                {   
                    $returnValues['status'] = 'success';
                    $returnValues['msg']    = 'Data base updated';
                }
                
                else                   // not update database
                {
                    $returnValues['status'] = "error";
                    $returnValues['msg']    = 'Not updated wildlife settings.';
                }
            }
            else
            {
                $returnValues['status'] = "error";
                $returnValues['msg']    = "Wildlife already exists in this hotel";

            }

            echo json_encode($returnValues);
        }

        elseif($phpRequest=='php')
        {            
           
            $result = $queryWildlifeResult = $this->wildlife_model->update_records($wildlifeIDphp, $editedDataphp);  // update database

            
            if ($result==1)     // if update database
            { 
                $returnValues['status'] = 'success';
                $returnValues['msg']    = 'Data base updated';
            }
            
            else                // not update database
            {
                $returnValues['status'] = "error";
                $returnValues['msg']    = "Data base not updated";
            }

            return $returnValues;
        }     
        
    }
    /*---------------- ---------End of saveWildlifeEditedDetails()---------------------------*/

    //function to get the available rooms for the current user
    public function getAllRoomsForCurrentUser()
    {
        $this->load->model('hotelUser_model');
        $this->load->model('hotel_model');
        $this->load->model('room_model');
        $userId = $this->getUserId();

        if($this->getUserType() == '1')
        {
            $allRoomDetails = $this->room_model->select('room');

            if(null != $allRoomDetails && $allRoomDetails != "")
            {
                return $allRoomDetails;
            }    
        }
        else
        {
            $allHotels = $this->hotelUser_model->getAllHotelsForTheCurrentUser($userId);

            if(null != $allHotels && $allHotels != "")
            {
                $hotelDataArray = array();
                for ($hotelIndex=0; $hotelIndex<sizeof($allHotels); $hotelIndex++)
                {
                    $hotelDataArray[$hotelIndex]['hotelID'] = $this->hotel_model->getHotelsForSpecificId2($allHotels[$hotelIndex]['hotel_id']);

                }           //for ($hotelIndex=0; $hotelIndex<sizeof($allHotels); $hotelIndex++)        
                
                $allRoomDetails = $this->room_model->select('room');

                if(null != $allRoomDetails && $allRoomDetails != "")
                {
                    if (null != $hotelDataArray && $hotelDataArray != "")
                    {
                        $a=0;
                        $data = array();
                        for ($index=0; $index<sizeof($hotelDataArray); $index++)
                        {
                            for($i=0; $i<sizeof($allRoomDetails); $i++)
                            {
                                if($hotelDataArray[$index]['hotelID'] == $allRoomDetails[$i]['hotel_id'])
                                {
                                    $data[$a] = $allRoomDetails[$i];
                                    $a++;

                                }           //if($hotelDataArray[$index]['hotelID'] == $allRoomDetails[$index]['hotel_id'])                    

                            }           //for($i=0; $i<sizeof($allRoomDetails); $i++)

                        }           //for ($index=0; $index<sizeof($hotelDataArray); $index++)

                        if (null != $data && $data != '')
                        {
                            return $data;                        

                        }           //if (null != $data && $data != '')

                    }           //if (null != $hotelDataArray && $hotelDataArray != "")

                }           //if(null != $allRoomDetails && $allRoomDetails != "")
                
            }           //if(null != $allHotels && $allHotels != "") 
        }


        /*if (null != $hotelDataArray && $hotelDataArray != '')
        {
            $roomNamesArray = array();
            for ($index=0; $index<sizeof($hotelDataArray); $index++)
            {
                $roomNamesArray[$index] = $this->room_model->getRoomDetailsForSpecificHotel($hotelDataArray[$index]['hotelID']);

            }           //for ($index=0; $index<sizeof($hotelDataArray); $index++)                       



        }           //if (null != $hotelDataArray && $hotelDataArray != '')*/

            // return $hotelDataArray;
    }           //public function getAllRoomsForCurrentUser()

    //function to get the available reservations for the current user hotels
    public function getAllReservationsForCurrentUser()
    {
        $this->load->model('hotelUser_model');
        $this->load->model('hotel_model');
        $userId = $this->getUserId();

        $this->load->model('reservation_model');
        $this->load->model('hotelUser_model');
        // $this->load->model('hotel_model');

        if($this->getUserType() == '1')
        {
            $allReservationDetails = $this->reservation_model->select('reservation');

            if(null != $allReservationDetails && $allReservationDetails != "")
            {
                    return $allReservationDetails;

            }           //if(null != $allReservationDetails && $allReservationDetails != "")
        }
        else if($this->getUserType() == '4')
        {
            $allReservationDetails = $this->reservation_model->getReservationForHotelAdmin($userId);

            if(null != $allReservationDetails && $allReservationDetails != "")
            {
                return $allReservationDetails;

            }
            
        }
        else
        {
            $userId                = $this->getUserId();
            $allReservationDetails = $this->reservation_model->getReservationDetails($userId);
            if(null != $allReservationDetails && $allReservationDetails != "")
            {
                return $allReservationDetails;

            }
        }
            // return $allReservationDetails;
    } 

    //function to get all available reservations 
    public function getAllReservations()
    {        
        $this->load->model('reservation_model');        
        
        $allReservationDetails = $this->reservation_model->select('reservation');

        if(null != $allReservationDetails && $allReservationDetails != "")
        {
                return $allReservationDetails;

        }           //if(null != $allReservationDetails && $allReservationDetails != "")        
         
    }           //public function getAllReservations()

    //function to send sms to top most merchants
    public function send_sms_to_merchants()
    {
        //get user details
        $user_details = $this->getAllUserDetails();

        //get reservation details
        $reservation_details = $this->getAllReservations();

        //get comments
        $comment_details = $this->getAllComments();

        $returnValues = array();

        //users details availble to get top most merchants
        if (null != $user_details && $user_details != '')
        {
            $space        = '%20';
            $break        = '%0A';

            //yes, check reservations or comments available
            if (null != $reservation_details && $reservation_details != '' || null != $comment_details && $comment_details != '')
            {
                //yes, then get the top most merchant
                for($index=0;$index<(sizeof($user_details));$index++)
                {
                    $total_number_of_reservations = 0;
                    //get reservatin count
                    for($i=0;$i<(sizeof($reservation_details));$i++)
                    {
                        if($reservation_details[$i]['user_id'] == $user_details[$index]['user_id'])
                        {
                            $total_number_of_reservations++;                                        
                        }
                    } 

                    //message to customer if he reached the maximum level of reservations
                    if ($total_number_of_reservations >= 5)
                    {
                        $first_name     = str_replace(' ', '%20', $user_details[$index]['first_name']);            
                        $last_name      = str_replace(' ', '%20', $user_details[$index]['last_name']);

                        //Check first number is 0
                        if (substr($user_details[$index]['telephone'], 0, 1) == '0') {

                            $contact_number= substr($user_details[$index]['telephone'], 1);

                        }else if(substr($user_details[$index]['telephone'], 0, 3) == '+94') //Check first number is +94
                        {
                            $contact_number= substr($user_details[$index]['telephone'], 3); 

                        }else{              
                            $contact_number = $user_details[$index]['telephone'];          
                        }

                        // $contact_number = $user_details[$index]['telephone'];                       
                        $message        = "Dear".$space.$first_name.$space.$last_name.",".$break."Congratulations,".$space." We".$space."are".$space."pleased".$space."to".$space."inform".$space."you".$space."that".$space."you".$space."have".$space."passed".$space."the".$space."maximum".$space."level".$space."of".$space."reservations".$space."in".$space."MyHotel".$space."booking".$space."engine.".$break."Thank".$space."You!";

                        //message has not deleliverd already.
                        if ($user_details[$index]['is_notified_reservation'] == 0)
                        {
                            if($this->sendIndividualSms($contact_number,$message) == TRUE)
                            {
                                //update the status
                                $this->load->model('user_model');

                                //update data
                                $update_id                                 = $user_details[$index]['user_id'];
                                $update_details['is_notified_reservation'] = 1;

                                //update the confirmation status
                                $update_notification_status = $this->user_model->update_record($update_id, $update_details);

                                $returnValues['status']     = 'success';
                                $returnValues['sms']        = 'Sms Send';                    
                            }
                            else
                            {
                                $returnValues['status']     = 'error';
                                $returnValues['sms']        = 'Sms Not Send';

                            }           //if($this->sendIndividualSms($telno,$message) == TRUE) 

                        }           //if ($user_details[$index]['is_notified_reservation'] == 0)

                    }           //if ($total_number_of_reservations >= 5)

                    //get commnect count
                    $total_number_of_comments     = 0;
                    for($i=0;$i<(sizeof($comment_details));$i++)
                    {
                        if($comment_details[$i]['user_id'] == $user_details[$index]['user_id'] && $comment_details[$i]['comments_status'] =='activate')
                        {
                            $total_number_of_comments++;                                        
                        }
                    }           //for($i=0;$i<(sizeof($comment_details));$i++) 

                    //message to customer if he reached the maximum level of comments
                    if ($total_number_of_comments >= 5)
                    {
                        $first_name     = str_replace(' ', '%20', $user_details[$index]['first_name']);            
                        $last_name      = str_replace(' ', '%20', $user_details[$index]['last_name']);
                        $contact_number = $user_details[$index]['telephone'];                       
                        $message        = "Dear".$space.$first_name.$space.$last_name.",".$break."Congratulations,".$space."We".$space."are".$space."pleased".$space."to".$space."inform".$space."you".$space."that".$space."you".$space."have".$space."passed".$space."the".$space."maximum".$space."level".$space."of".$space."comments".$space."in".$space."MyHotel".$space."system".$break."Thank".$space."You!";

                        if ($user_details[$index]['is_notified_comments'] == 0)
                        {
                            if($this->sendIndividualSms($contact_number,$message) == TRUE)
                            {
                                //update the status
                                $this->load->model('user_model');

                                //update data
                                $update_id                                 = $user_details[$index]['user_id'];
                                $update_details['is_notified_comments']    = 1;

                                //update the confirmation status
                                $update_notification_status = $this->user_model->update_record($update_id, $update_details);

                                $returnValues['status'] = 'success';
                                $returnValues['sms']    = 'Sms Send';                    
                            }
                            else
                            {
                                $returnValues['status'] = 'error';
                                $returnValues['sms']    = 'Sms Not Send';

                            }           //if($this->sendIndividualSms($telno,$message) == TRUE)
                            
                        }           //if ($user_details[$index]['is_notified_comments'] == 0)

                    }           //if ($total_number_of_comments >= 5)                    

                }           //for($index=0;$index<(sizeof($user_details));$index++)
                
            }           //if (null != $reservation_details && $reservation_details != '' || null != $comment_details && $comment_details != '')

        }           //if (null != $user_details && $user_details != '')

        echo(json_encode($returnValues));

    }           //public function send_sms_to_merchants()

    //function to get all comments
    public function getAllComments()
    {        
        $this->load->model('user_comments_model');        
        
        $allCommentsDetails = $this->user_comments_model->select('user_comments');

        if(null != $allCommentsDetails && $allCommentsDetails != "")
        {
                return $allCommentsDetails;

        }           //if(null != $allCommentsDetails && $allCommentsDetails != "")        
         
    }           //public function getAllComments()

     //function to get all room rate details
    public function getAllRoomRateDetails()
    {
        $this->load->model('room_rate_model');   

        if($this->getUserType() == '1')
        {
            $allRoomRatesDetails = $this->room_rate_model->getSuperAdminRoomRatesDetails();

            if(null != $allRoomRatesDetails && $allRoomRatesDetails != "")
            {
                return $allRoomRatesDetails;
            }    
        }
        else
        {
            $userId             = $this->getUserId();
            $allRoomRateDetails = $this->room_rate_model->getRoomRatesDetails($userId);

            if(null != $allRoomRateDetails && $allRoomRateDetails != "")
            {
                return $allRoomRateDetails;
            }         
        }
    }           //public function getAllRoomRateDetails()

     //function to get hotel specific all room rate details
    public function getHotelAllRoomRateDetails()
    {
        $this->load->model('room_rate_model');   

        $userId  = $this->getUserId();
       

        if($this->getUserType() == '1')
        {
            $hotelroomRateDetails = $this->room_rate_model->getSuperAdminRoomRatesDetails();

            if(null != $hotelroomRateDetails && $hotelroomRateDetails != "")
            {
                return $hotelroomRateDetails;
            }    
        }
        else
        {
            $hotelroomRateDetails = $this->room_rate_model->getRoomRatesDetails($userId);
            if(null != $hotelroomRateDetails && $hotelroomRateDetails != "")
            {
                return $hotelroomRateDetails;
            }
        }
    }           //public function getHotelAllRoomRateDetails()

    //function to get all user details
    public function getAllUserDetails()
    {
        $this->load->model('user_model');   

        $allUserDetails = $this->user_model->select('user');

        if(null != $allUserDetails && $allUserDetails != "")
        {
            return $allUserDetails;

        }           //if(null != $allUserDetails && $allUserDetails != "")

    }           //public function getAllUserDetails()

    //function to get all user details
    public function getAllGuestUsersDetails()
    {
        $this->load->model('guest_model');   

        $allGuestUserDetails = $this->guest_model->select('guest');

        if(null != $allGuestUserDetails && $allGuestUserDetails != "")
        {
            return $allGuestUserDetails;

        }           //if(null != $allGuestUserDetails && $allGuestUserDetails != "")

    }           //public function getAllGuestUsersDetails()

    //function to get all room rate periods details
    public function getAllRoomRateperiodsDetails()
    {
        $this->load->model('room_rate_periods_model');

        if($this->getUserType() == '1')
        {
            $allRoomRatePeriodsDetails = $this->room_rate_periods_model->getSuperAdminRoomRatePeriodsDetails();

            if(null != $allRoomRatePeriodsDetails && $allRoomRatePeriodsDetails != "")
            {
                return $allRoomRatePeriodsDetails;
            }    
        }
        else
        {
            $userId                    = $this->getUserId();
            $allRoomRateperiodsDetails = $this->room_rate_periods_model->getRoomRatePeriodsDetails($userId);

            if(null != $allRoomRateperiodsDetails && $allRoomRateperiodsDetails != "")
            {
                return $allRoomRateperiodsDetails;
            }           //if(null != $allRoomRateperiodsDetails && $allRoomRateperiodsDetails != "")
        }
    }           //public function getAllRoomRateperiodsDetails()

    //function to get all room rate periods details to hotel facility
    public function getAllRoomRateperiodsData()
    {
        $this->load->model('room_rate_periods_model');

        if($this->getUserType() == '1')
        {   
            $allRoomRateperiodsDetails = $this->room_rate_periods_model->select('room_rate_periods');

            if(null != $allRoomRateperiodsDetails && $allRoomRateperiodsDetails != "")
            {
                return $allRoomRateperiodsDetails;

            }    
        }
        else
        {

            $userId             = $this->getUserId();

            $allRoomDetails = $this->room_rate_periods_model->getUserRoomRateperiodsData($userId);

            if(null != $allRoomDetails && $allRoomDetails != "")
            {
                return $allRoomDetails;

            }           //if(null != $allRoomDetails && $allRoomDetails != "")

        }

    }           //public function getAllRoomRateperiodsData()

    //function to get all hotel chain details
    public function getAllHotelChains()
    {
        $this->load->model('hotelChain_model');   

        $allHotelChainDetails = $this->hotelChain_model->select('hotel_chain');

        if(null != $allHotelChainDetails && $allHotelChainDetails != "")
        {
            return $allHotelChainDetails;
            
        }           //if(null != $allHotelChainDetails && $allHotelChainDetails != "")

    }           //public function getAllHotelChains()

    //function to get all hotel type details
    public function getAllHotelTypes()
    {
        $this->load->model('hotelType_model');   

        $allHotelTypeDetails = $this->hotelType_model->select('hotel_type');

        if(null != $allHotelTypeDetails && $allHotelTypeDetails != "")
        {
            return $allHotelTypeDetails;

        }           //if(null != $allHotelTypeDetails && $allHotelTypeDetails != "")

    }           //public function getAllHotelTypes()

    //function to get all hotel star rating details
    public function getAllHotelStarRating()
    {
        $this->load->model('starRating_model');   

        $allHotelStarRatingDetails = $this->starRating_model->select('star_rating');

        if(null != $allHotelStarRatingDetails && $allHotelStarRatingDetails != "")
        {
            return $allHotelStarRatingDetails;

        }           //if(null != $allHotelStarRatingDetails && $allHotelStarRatingDetails != "")

    }           //public function getAllHotelStarRating()

    //function to get all hotel subscription package details
    public function getAllHotelSubscriptionPackage()
    {
        $this->load->model('subscription_package_model');   

        // $allHotelSubscriptionPackageDetails = $this->subscription_package_model->select('subscription_package');
        $allHotelSubscriptionPackageDetails = $this->subscription_package_model->getActivateSubscriptionPackages();
        
        if(sizeof($allHotelSubscriptionPackageDetails)>0)
        {
            return $allHotelSubscriptionPackageDetails;

        }           //if(sizeof($allHotelSubscriptionPackageDetails)>0)

    }           //public function getAllHotelSubscriptionPackage()

    //function to get all hotel city details
    public function getAllHotelCity()
    {
        $this->load->model('city_model');   

        $allHotelCityDetails = $this->city_model->select('city');

        if(null != $allHotelCityDetails && $allHotelCityDetails != "")
        {
            return $allHotelCityDetails;

        }           //if(null != $allHotelCityDetails && $allHotelCityDetails != "")

    }           //public function getAllHotelCity()

    //function to get all hotel country details
    public function getAllHotelCountry()
    {
        $this->load->model('refCountry_model');   

        $allHotelCountryDetails = $this->refCountry_model->select('ref_country');

        if(null != $allHotelCountryDetails && $allHotelCountryDetails != "")
        {
            return $allHotelCountryDetails;

        }           //if(null != $allHotelCountryDetails && $allHotelCountryDetails != "")

    }           //public function getAllHotelCountry()

    //function to get all active hotel country details
    public function getActiveHotelCountry()
    {
        $this->load->model('refCountry_model');   

        $allHotelCountryDetails = $this->refCountry_model->selectbyActive();

        if(null != $allHotelCountryDetails && $allHotelCountryDetails != "")
        {
            return $allHotelCountryDetails;

        }           //if(null != $allHotelCountryDetails && $allHotelCountryDetails != "")

    } 


//function to get system base currency details
    public function getSystemBaseCurrency()
    {
        $this->load->model('base_currency_model');   

        $allSystemBaseCurrencyDetails = $this->base_currency_model->select('base_currency');

        if(null != $allSystemBaseCurrencyDetails && $allSystemBaseCurrencyDetails != "")
        {
            return $allSystemBaseCurrencyDetails;

        }           //if(null != $allSystemBaseCurrencyDetails && $allSystemBaseCurrencyDetails != "")

    } 

    //function to get all hotel currency details
    public function getAllHotelCurrency()
    {
        $this->load->model('currency_model');   

        $allHotelCurrencyDetails = $this->currency_model->select('currency');

        if(null != $allHotelCurrencyDetails && $allHotelCurrencyDetails != "")
        {
            return $allHotelCurrencyDetails;

        }           //if(null != $allHotelCurrencyDetails && $allHotelCurrencyDetails != "")

    }           //public function getAllHotelCurrency()
 
    //function to get all hotel currency details
    public function getAllActiveHotelCurrency()
    {
        $this->load->model('currency_model');   

        $allHotelCurrencyDetails = $this->currency_model->selectbyActive();

        if(null != $allHotelCurrencyDetails && $allHotelCurrencyDetails != "")
        {
            return $allHotelCurrencyDetails;

        }           //if(null != $allHotelCurrencyDetails && $allHotelCurrencyDetails != "")

    }           //public function getAllHotelCurrency()

    //function to get all hotel details
    /*public function getAllHotel()
    {
        $this->load->model('hotel_model');   

        $allHotelDetails = $this->hotel_model->select('hotel');

        if(null != $allHotelDetails && $allHotelDetails != "")
        {
            return $allHotelDetails;

        }           //if(null != $allHotelCurrencyDetails && $allHotelCurrencyDetails != "")

    } */          //public function getAllHotel()

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

    //function to get all room details
    /*public function getAllRoomDetails()
    {
        $this->load->model('room_model');   

        $allRoomDetails = $this->room_model->select('room');

        if(null != $allRoomDetails && $allRoomDetails != "")
        {
            return $allRoomDetails;

        }           //if(null != $allRoomDetails && $allRoomDetails != "")

    } */          //public function getAllRoomDetails()

    //function to get all beach details
    // public function getAllBeachDetails()
    // {
    //     $this->load->model('beaches_model');   

    //     $allBeachDetails = $this->beaches_model->select('beaches');

    //     if(null != $allBeachDetails && $allBeachDetails != "")
    //     {
    //         return $allBeachDetails;

    //     }           //if(null != $allBeachDetails && $allBeachDetails != "")

    // }           //public function getAllBeachDetails()



     /**
     * Purpose of the function          function to get the available hotel related Beach Details for the current user
     * @author                          
     */     
   

    public function getAllBeachDetails()
    {
        $this->load->model('beaches_model');   

        if($this->getUserType() == '1')
        {
            $allBeachesDetails = $this->beaches_model->getSuperAdminBeachDetails();

            if(null != $allBeachesDetails && $allBeachesDetails != "")
            {
                return $allBeachesDetails;
            }    
        }
        else
        {
            $userId             = $this->getUserId();
            $allBeachDetails = $this->beaches_model->selectaBeachDetailsForUser($userId);

            if(null != $allBeachDetails && $allBeachDetails != "")
            {
                return $allBeachDetails;
            }         
        }
    }           
        
    /*---------------- ---------End of getAllBeachDetails()---------------------------*/



    //function to get all food preferences details
    // public function getAllFoodPreferencesDetails()
    // {
    //     $this->load->model('food_preferences_model');   

    //     $allFoodPreferencesDetails = $this->food_preferences_model->select('food_preferences');

    //     if(null != $allFoodPreferencesDetails && $allFoodPreferencesDetails != "")
    //     {
    //         return $allFoodPreferencesDetails;

    //     }           //if(null != $allFoodPreferencesDetails && $allFoodPreferencesDetails != "")

    // }           //public function getAllFoodPreferencesDetails()

        /*---------------- ---------End of getAllFoodsForCurrentUser()---------------------------*/



     /**
     * Purpose of the function          function to get the available hotel related FoodPreferences for the current user
     * @author                          
     */     
   

    public function getAllFoodPreferencesDetails()
    {
        $this->load->model('food_preferences_model');   

        if($this->getUserType() == '1')
        {
            $allFoodPreferencesDetails = $this->food_preferences_model->getSuperAdminFoodPreferencesDetails();

            if(null != $allFoodPreferencesDetails && $allFoodPreferencesDetails != "")
            {
                return $allFoodPreferencesDetails;
            }    
        }
        else
        {
            $userId             = $this->getUserId();
            $allFoodPreferenceDetails = $this->food_preferences_model->selectaFoodPreferencesForUser($userId);

            if(null != $allFoodPreferenceDetails && $allFoodPreferenceDetails != "")
            {
                return $allFoodPreferenceDetails;
            }         
        }
    }           
        
    /*---------------- ---------End of getAllFoodPreferencesDetails()---------------------------*/


    //function to get all forests details
    // public function getAllForestsDetails()
    // {
    //     $this->load->model('forests_model');   

    //     $allForestsDetails = $this->forests_model->select('forests');

    //     if(null != $allForestsDetails && $allForestsDetails != "")
    //     {
    //         return $allForestsDetails;

    //     }           //if(null != $allForestsDetails && $allForestsDetails != "")

    // }           //public function getAllForestsDetails()

    /**
     * Purpose of the function          function to get the available hotel related Forests for the current user
     * @author                          
     */     
   

    public function getAllForestsDetails()
    {
        $this->load->model('forests_model');   

        if($this->getUserType() == '1')
        {
            $allForestsDetails = $this->forests_model->getSuperAdminForestsDetails();

            if(null != $allForestsDetails && $allForestsDetails != "")
            {
                return $allForestsDetails;
            }    
        }
        else
        {
            $userId             = $this->getUserId();
            $allForestDetails = $this->forests_model->selectForestsForUser($userId);

            if(null != $allForestDetails && $allForestDetails != "")
            {
                return $allForestDetails;
            }         
        }
    }           
        
    /*---------------- ---------End of getAllForestsDetails()---------------------------*/

    //function to get all historic details
    // public function getAllHistoricsDetails()
    // {
    //     $this->load->model('historic_model');   

    //     $allHistoricDetails = $this->historic_model->select('historic');

    //     if(null != $allHistoricDetails && $allHistoricDetails != "")
    //     {
    //         return $allHistoricDetails;

    //     }           //if(null != $allHistoricDetails && $allHistoricDetails != "")

    // }           //public function getAllHistoricsDetails()


 /**
     * Purpose of the function          function to get the available hotel related Historics for the current user
     * @author                          
     */     
   

    public function getAllHistoricsDetails()
    {
        $this->load->model('historic_model');   

        if($this->getUserType() == '1')
        {
            $allHistoricsDetails = $this->historic_model->getSuperAdminHistoricsDetails();

            if(null != $allHistoricsDetails && $allHistoricsDetails != "")
            {
                return $allHistoricsDetails;
            }    
        }
        else
        {
            $userId             = $this->getUserId();
            $allHistoricDetails = $this->historic_model->selectHistoricsForUser($userId);

            if(null != $allHistoricDetails && $allHistoricDetails != "")
            {
                return $allHistoricDetails;
            }         
        }
    }           
        
    /*---------------- ---------End of getAllHistoricsDetails()---------------------------*/    

    //function to get all mountains details
    // public function getAllMountainsDetails()
    // {
    //     $this->load->model('mountains_model');   

    //     $allMountainsDetails = $this->mountains_model->select('mountains');

    //     if(null != $allMountainsDetails && $allMountainsDetails != "")
    //     {
    //         return $allMountainsDetails;

    //     }           //if(null != $allMountainsDetails && $allMountainsDetails != "")

    // }           //public function getAllMountainsDetails()



 /**
     * Purpose of the function          function to get the available hotel related Mountains for the current user
     * @author                          
     */     
   

    public function getAllMountainsDetails()
    {
        $this->load->model('mountains_model');   

        if($this->getUserType() == '1')
        {
            $allMountainsDetails = $this->mountains_model->getSuperAdminMountainsDetails();

            if(null != $allMountainsDetails && $allMountainsDetails != "")
            {
                return $allMountainsDetails;
            }    
        }
        else
        {
            $userId             = $this->getUserId();
            $allMountainDetails = $this->mountains_model->selectMountainsForUser($userId);

            if(null != $allMountainDetails && $allMountainDetails != "")
            {
                return $allMountainDetails;
            }         
        }
    }           
        
    /*---------------- ---------End of getAllMountainsDetails()---------------------------*/  

    //function to get all religious interests details
    // public function getAllReligiousInterestsDetails()
    // {
    //     $this->load->model('religiousInterests_model');   

    //     $allReligiousInterestsDetails = $this->religiousInterests_model->select('religious_interests');

    //     if(null != $allReligiousInterestsDetails && $allReligiousInterestsDetails != "")
    //     {
    //         return $allReligiousInterestsDetails;

    //     }           //if(null != $allReligiousInterestsDetails && $allReligiousInterestsDetails != "")

    // }           //public function getAllReligiousInterestsDetails()

 /**
     * Purpose of the function          function to get the available hotel related ReligiousInterests for the current user
     * @author                          
     */     
   

    public function getAllReligiousInterestsDetails()
    {
        $this->load->model('religiousInterests_model');   

        if($this->getUserType() == '1')
        {
            $allReligiousInterestsDetails = $this->religiousInterests_model->getSuperAdminReligiousInterestsDetails();

            if(null != $allReligiousInterestsDetails && $allReligiousInterestsDetails != "")
            {
                return $allReligiousInterestsDetails;
            }    
        }
        else
        {
            $userId             = $this->getUserId();
            $allReligiousInterestDetails = $this->religiousInterests_model->selectReligiousInterestsForUser($userId);

            if(null != $allReligiousInterestDetails && $allReligiousInterestDetails != "")
            {
                return $allReligiousInterestDetails;
            }         
        }
    }           
        
    /*---------------- ---------End of getAllReligiousInterestsDetails()---------------------------*/ 

    //function to get all scenery details
    // public function getAllSceneriesDetails()
    // {
    //     $this->load->model('sceneries_model');   

    //     $allSceneriesDetails = $this->sceneries_model->select('sceneries');

    //     if(null != $allSceneriesDetails && $allSceneriesDetails != "")
    //     {
    //         return $allSceneriesDetails;

    //     }           //if(null != $allSceneriesDetails && $allSceneriesDetails != "")

    // }           //public function getAllSceneriesDetails()


/**
     * Purpose of the function          function to get the available hotel related Sceneries for the current user
     * @author                          
     */     
   

    public function getAllSceneriesDetails()
    {
        $this->load->model('sceneries_model');   

        if($this->getUserType() == '1')
        {
            $allSceneriesDetails = $this->sceneries_model->getSuperAdminSceneriesDetails();

            if(null != $allSceneriesDetails && $allSceneriesDetails != "")
            {
                return $allSceneriesDetails;
            }    
        }
        else
        {
            $userId             = $this->getUserId();
            $allSceneryDetails = $this->sceneries_model->selectSceneriesForUser($userId);

            if(null != $allSceneryDetails && $allSceneryDetails != "")
            {
                return $allSceneryDetails;
            }         
        }
    }           
        
    /*---------------- ---------End of getAllSceneriesDetails()---------------------------*/ 

    //function to get all sports details
    // public function getAllSportsDetails()
    // {
    //     $this->load->model('sports_model');   

    //     $allSportsDetails = $this->sports_model->select('sports');

    //     if(null != $allSportsDetails && $allSportsDetails != "")
    //     {
    //         return $allSportsDetails;

    //     }           //if(null != $allSportsDetails && $allSportsDetails != "")

    // }           //public function getAllSportsDetails()



/**
     * Purpose of the function          function to get the available hotel related Sports for the current user
     * @author                          
     */     
   

    public function getAllSportsDetails()
    {
        $this->load->model('sports_model');   

        if($this->getUserType() == '1')
        {
            $allSportsDetails = $this->sports_model->getSuperAdminSportsDetails();

            if(null != $allSportsDetails && $allSportsDetails != "")
            {
                return $allSportsDetails;
            }    
        }
        else
        {
            $userId             = $this->getUserId();
            $allSportDetails = $this->sports_model->selectSportsForUser($userId);

            if(null != $allSportDetails && $allSportDetails != "")
            {
                return $allSportDetails;
            }         
        }
    }           
        
/*---------------- ---------End of getAllSportsDetails()---------------------------*/ 

    //function to get all wildlife details
    // public function getAllWildlifeDetails()
    // {
    //     $this->load->model('wildlife_model');   

    //     $allWildlifeDetails = $this->wildlife_model->select('wildlife');

    //     if(null != $allWildlifeDetails && $allWildlifeDetails != "")
    //     {
    //         return $allWildlifeDetails;

    //     }           //if(null != $allWildlifeDetails && $allWildlifeDetails != "")

    // }           //public function getAllWildlifeDetails()

/**
     * Purpose of the function          function to get the available hotel related WhildLife for the current user
     * @author                          
     */     
   

    public function getAllWildlifeDetails()
    {
        $this->load->model('wildlife_model');   

        if($this->getUserType() == '1')
        {
            $allWildlifesDetails = $this->wildlife_model->getSuperAdminWhildLifeDetails();

            if(null != $allWildlifesDetails && $allWildlifesDetails != "")
            {
                return $allWildlifesDetails;
            }    
        }
        else
        {
            $userId             = $this->getUserId();
            $allWildlifeDetails = $this->wildlife_model->selectWhildLifeForUser($userId);

            if(null != $allWildlifeDetails && $allWildlifeDetails != "")
            {
                return $allWildlifeDetails;
            }         
        }
    }           
        
/*---------------- ---------End of getAllWildlifeDetails()---------------------------*/ 


    //function to get all special program details
    // public function getAllSpecialProgramDetails()
    // {
    //     $this->load->model('special_program_model');   

    //     $allSpecialProgramDetails = $this->special_program_model->select('special_program');

    //     if(null != $allSpecialProgramDetails && $allSpecialProgramDetails != "")
    //     {
    //         return $allSpecialProgramDetails;

    //     }           //if(null != $allSpecialProgramDetails && $allSpecialProgramDetails != "")

    // }           //public function getAllSpecialProgramDetails()



    /**
     * Purpose of the function          function to get the available hotel related SpecialProgram for the current user
     * @author                          
     */     
   

    public function getAllSpecialProgramDetails()
    {
        $this->load->model('special_program_model');   

        if($this->getUserType() == '1')
        {
            $allSpecialProgramsDetails = $this->special_program_model->getSuperAdminSpecialProgramDetails();

            if(null != $allSpecialProgramsDetails && $allSpecialProgramsDetails != "")
            {
                return $allSpecialProgramsDetails;
            }    
        }
        else
        {
            $userId             = $this->getUserId();
            $allSpecialProgramDetails = $this->special_program_model->selectSpecialProgramForUser($userId);

            if(null != $allSpecialProgramDetails && $allSpecialProgramDetails != "")
            {
                return $allSpecialProgramDetails;
            }         
        }
    }           
        
    /*---------------- ---------End of getAllSpecialProgramDetails()---------------------------*/


    //function to get all sports facility details
    public function getAllSportsFacilityDetails()
    {
        $this->load->model('sports_facility_model');   

        if($this->getUserType() == '1')
        {
            $allSportsFacilityDetails = $this->sports_facility_model->select('sports_facility');

            if(null != $allSportsFacilityDetails && $allSportsFacilityDetails != "")
            {
                return $allSportsFacilityDetails;

            }    
        }
        else
        {

            $userId  = $this->getUserId();

            $allSportsFacilityDetails = $this->sports_facility_model->getUserSportsFacilityDetails($userId);

            if(null != $allSportsFacilityDetails && $allSportsFacilityDetails != "")
            {
                return $allSportsFacilityDetails;

            }           //if(null != $allClubDetails && $allClubDetails != "")

        }

    }           //public function getAllSportsFacilityDetails()

    /*//function to get all sports facility details
    public function getAllGymDetails()
    {
        $this->load->model('gym_model');   

        $allGymDetails = $this->gym_model->select('gym');

        if(null != $allGymDetails && $allGymDetails != "")
        {
            return $allGymDetails;

        }           //if(null != $allGymDetails && $allGymDetails != "")

    }           //public function getAllGymDetails()*/


    //function to get all sports facility details
    public function getAllGymDetails()
    {
        $this->load->model('gym_model');   

        if($this->getUserType() == '1')
        {
            $allGymDetails = $this->gym_model->select('gym');

            if(null != $allGymDetails && $allGymDetails != "")
            {
                return $allGymDetails;

            }    
        }
        else
        {

            $userId   = $this->getUserId();

            $allGymDetails = $this->gym_model->getUserGymDetails($userId);

            if(null != $allGymDetails && $allGymDetails != "")
            {
                return $allGymDetails;

            }           //if(null != $allGymDetails && $allGymDetails != "")

        }

    }           //public function getAllGymDetails()

    //function to get all entertainment program details
    // public function getAllEntertainmentProgramDetails()
    // {
    //     $this->load->model('entertainment_program_model');   

    //     $allEntertainmentProgramDetails = $this->entertainment_program_model->select('entertainment_program');

    //     if(null != $allEntertainmentProgramDetails && $allEntertainmentProgramDetails != "")
    //     {
    //         return $allEntertainmentProgramDetails;

    //     }           //if(null != $allEntertainmentProgramDetails && $allEntertainmentProgramDetails != "")

    // }           //public function getAllEntertainmentProgramDetails()



 /**
     * Purpose of the function          function to get the available hotel related EntertainmentProgram for the current user
     * @author                          
     */     
   

    public function getAllEntertainmentProgramDetails()
    {
        $this->load->model('entertainment_program_model');   

        if($this->getUserType() == '1')
        {
            $allEntertainmentProgramsDetails = $this->entertainment_program_model->getSuperAdminEntertainmentProgramDetails();

            if(null != $allEntertainmentProgramsDetails && $allEntertainmentProgramsDetails != "")
            {
                return $allEntertainmentProgramsDetails;
            }    
        }
        else
        {
            $userId             = $this->getUserId();
            $allEntertainmentProgramDetails = $this->entertainment_program_model->selectaEntertainmentProgramForUser($userId);

            if(null != $allEntertainmentProgramDetails && $allEntertainmentProgramDetails != "")
            {
                return $allEntertainmentProgramDetails;
            }         
        }
    }           
        
    /*---------------- ---------End of getAllEntertainmentProgramDetails()---------------------------*/

    //function to get all pool details
    public function getAllPoolDetails()
    {
        $this->load->model('pool_model');   

        if($this->getUserType() == '1')
        {
            $allPoolDetails = $this->pool_model->select('pool');

            if(null != $allPoolDetails && $allPoolDetails != "")
            {
                return $allPoolDetails;

            }   
        }
        else
        {

            $userId             = $this->getUserId();

            $allPoolDetails = $this->pool_model->getUserPoolDetails($userId);
            // $allPoolDetails = $this->pool_model->select('pool');

            if(null != $allPoolDetails && $allPoolDetails != "")
            {
                return $allPoolDetails;

            }           //if(null != $allPoolDetails && $allPoolDetails != "")

        }

    }           //public function getAllPoolDetails()

    
    //function to get all restaurants details
    public function getAllRestaurantsDetails()
    {
        $this->load->model('restaurants_model');   

        if($this->getUserType() == '1')
        {
            $allRestaurantsDetails = $this->restaurants_model->select('restaurants');

            if(null != $allRestaurantsDetails && $allRestaurantsDetails != "")
            {
                return $allRestaurantsDetails;

            }   
        }
        else
        {

            $userId             = $this->getUserId();

            $allRestaurantsDetails = $this->restaurants_model->getUserRestaurantsDetails($userId);
            // $allRestaurantsDetails = $this->restaurants_model->select('pool');

            if(null != $allRestaurantsDetails && $allRestaurantsDetails != "")
            {
                return $allRestaurantsDetails;

            }           //if(null != $allRestaurantsDetails && $allRestaurantsDetails != "")

        }

    }           //public function getAllRestaurantsDetails()


    //function to get all club details
    public function getAllClubDetails()
    {
        $this->load->model('club_model');   

         if($this->getUserType() == '1')
        {
            $allClubDetails = $this->club_model->select('club');

            if(null != $allClubDetails && $allClubDetails != "")
            {
                return $allClubDetails;

            }    
        }
        else
        {

            $userId  = $this->getUserId();

            $allClubDetails = $this->club_model->getUserClubDetails($userId);
            // $allClubDetails = $this->club_model->select('club');

            if(null != $allClubDetails && $allClubDetails != "")
            {
                return $allClubDetails;

            }           //if(null != $allClubDetails && $allClubDetails != "")

        }

    }           //public function getAllClubDetails()

    
    public function getAllRoomDetails()
    {
        $this->load->model('room_model'); 

         if($this->getUserType() == '1')
        {
            $allRoomDetails = $this->room_model->select('room');

            if(null != $allRoomDetails && $allRoomDetails != "")
            {
                return $allRoomDetails;
            }    
        }
        else
        {

            $userId             = $this->getUserId();

            $allRoomDetails = $this->room_model->getuserRoomDetails($userId);

            if(null != $allRoomDetails && $allRoomDetails != "")
            {
                return $allRoomDetails;

            }           //if(null != $allClubDetails && $allClubDetails != "")

        }

    }   

    //function to add new hotel to the system
    public function addNewHotel()
    {
        $returnValues                     = array();
        $returnValues['statusFileSize']   = '';
        $returnValues['status']           = "";
        $returnValues['msg']              = "";
        $formData                         = array();
        $returnValues['fileuploadStatus'] = '';
        $file_element_name                = ''; 

        isset($_POST['submitMode'])? $returnValues['ajax']= $_POST['submitMode'] : $returnValues['ajax']  = "noAjax";
        
        // Get form data and check empty
        isset($_POST['hotel_name'])           ? $formData['hotel_name']        = $_POST['hotel_name']         : $formData['hotel_name']           = '';
        isset($_POST['hotel_address'])        ? $formData['hotel_address']     = $_POST['hotel_address']      : $formData['hotel_address']        = "";
        isset($_POST['hotel_description'])    ? $formData['hotel_description'] = $_POST['hotel_description']  : $formData['hotel_description']    = "";
        isset($_POST['hotel_contactno'])      ? $formData['hotel_contactno']   = $_POST['hotel_contactno']    : $formData['hotel_contactno']      = "";
        isset($_POST['hotel_code'])           ? $formData['hotel_code']        = $_POST['hotel_code']         : $formData['hotel_code']           = "";
        isset($_POST['hotel_post_code'])      ? $formData['hotel_post_code']   = $_POST['hotel_post_code']    : $formData['hotel_post_code']      = "";
        isset($_POST['hotel_url'])            ? $formData['hotel_url']         = $_POST['hotel_url']          : $formData['hotel_url']            = "";
        !empty($_POST['hotel_longitude'])     ? $formData['hotel_longitude']   = $_POST['hotel_longitude']    : $formData['hotel_longitude']      = 0;
        !empty($_POST['hotel_latitude'])      ? $formData['hotel_latitude']    = $_POST['hotel_latitude']     : $formData['hotel_latitude']       = 0;
        !empty($_POST['ho_chain_id'])         ? $formData['ho_chain_id']       = $_POST['ho_chain_id']        : $formData['ho_chain_id']          = 0;
        isset($_POST['ho_type_id'])           ? $formData['ho_type_id']        = $_POST['ho_type_id']         : $formData['ho_type_id']           = "";
        isset($_POST['st_rating_id'])         ? $formData['st_rating_id']      = $_POST['st_rating_id']       : $formData['st_rating_id']         = "";
        isset($_POST['su_package_id'])        ? $formData['su_package_id']     = $_POST['su_package_id']      : $formData['su_package_id']        = "";
        isset($_POST['city_id'])              ? $formData['city_id']           = $_POST['city_id']            : $formData['city_id']              = "";
        isset($_POST['currency_id'])          ? $formData['currency_id']       = $_POST['currency_id']        : $formData['currency_id']          = "";
        isset($_POST['ref_country_code'])     ? $formData['ref_country_code']  = $_POST['ref_country_code']   : $formData['ref_country_code']     = "";
        isset($_POST['check_in_time'])        ? $formData['check_in_time']     = $_POST['check_in_time']      : $formData['check_in_time']        = "";
        isset($_POST['check_out_time'])       ? $formData['check_out_time']    = $_POST['check_out_time']     : $formData['check_out_time']       = "";
        
        $this->load->model('hotel_model');

        $getAllHotelDetails = $this->hotel_model->select('hotel');
        $countHotel = 0;

        for($index = 0; $index<(sizeof($getAllHotelDetails)); $index++)
        {
            //if the hotel alreday exists?
            if(strtolower($getAllHotelDetails[$index]['hotel_name']) == strtolower($_POST['hotel_name']))
            {
                //yes, then increase the count.
                $countHotel++;

            }           //if(strtolower($getAllHotelDetails[$index]['hotel_name']) == strtolower($_POST['hotel_name']))
            
        }           //for($index = 0; $index<(sizeof($getAllHotelDetails)); $index++)

        //if the hotel already exists?
        if($countHotel > 0)
        {
            //yes, then display an error message
            $returnValues['status'] = "error";
            $returnValues['msg']    = "Hotel already exists";   
        }
        else
        {   
            // (html type : file) name of the form's file upload field
            $returnValues['statusFileSize']     = '';
            $returnValues['contentCompletness'] = "";

            if (!empty($_FILES['Hotel_image_content_path']['name'])) 
            {            
                $returnValues['fileuploadStatus'] = "file is selected";
                $file_element_name                = 'Hotel_image_content_path';                
            }
                if (!file_exists('./uploads/hotelImages/'.$_POST['ho_chain_name']))         //if the ditecroty exists with hotel chain name?
                {
                    $hotel_name_image = $_POST['hotel_name'];

                    $hotel_name_image = str_replace(' ', '_',$hotel_name_image);
                    
                    //no, then create a directory and upload the images.
                    $folderName = './uploads/hotelImages/'.$_POST['ho_chain_name'];                    
                    mkdir($folderName, 0777, true);

                    /*echo $_POST['ho_chain_name'];
                    exit();*/
                    if (!file_exists('./uploads/hotelImages/'.$_POST['ho_chain_name'].'/'.$hotel_name_image.'/'))            //if the directory exists with the hotel name?
                    {
                        //no, then create a new directory and uplaod the images.
                        $folderName = './uploads/hotelImages/'.$_POST['ho_chain_name'].'/'.$hotel_name_image.'/';

                        mkdir($folderName, 0777, true);                        

                        // set the configure valuess
                        // file upload path
                        // $config['upload_path']  = './uploads/hotelImages/'.$_POST['ho_chain_name'].'/'.$hotel_name_image.'/';
                        $config['upload_path']  = './uploads/hotelImages/'.$_POST['ho_chain_name'].'/'.$hotel_name_image.'/';
                        // Accept file types

                        $config['allowed_types'] = 'gif|jpg|png';
                        $config['max_size']      = 1024*1;

                        // file save name in upload folder
                        $config['file_name']    = 'myHotel_hotel_image'.$_POST['hotel_image_name'];


                        // load uplod library andset cofigure values
                        $this->load->library('upload', $config);
                        $this->load->helper('date');

                        // upload file using file name 
                        if (!$this->upload->do_upload($file_element_name))
                        {   // if error return error
                            $returnValues['statusFileSize'] = 'error';
                            $returnValues['msg']            = $this->upload->display_errors('', '');
                        }
                        else
                        {
                            // get uploded file's informations
                            $fileData = $this->upload->data();
                            
                            // set some file properties to data base
                            $formData['hotel_image_name']      = $fileData['file_name'];
                            $formData['hotel_image_path']      = './uploads/hotelImages/'.$_POST['ho_chain_name'].'/'.$hotel_name_image.'/';

                        }           //if (!$this->upload->do_upload($file_element_name))

                        @unlink($_FILES[$file_element_name]);
                    }
                    else
                    {
                        // set the configure valuess
                        // file upload path
                        $config['upload_path']  = './uploads/hotelImages/'.$_POST['ho_chain_name'].'/'.$hotel_name_image.'/';
                        // $config['upload_path']  = $folderName;
                        // Accept file types

                        $config['allowed_types'] = 'gif|jpg|png';
                        $config['max_size']      = 1024*1;

                        // file save name in upload folder
                        $config['file_name']    = 'myHotel_hotel_image'.$_POST['hotel_image_name'];


                        // load uplod library andset cofigure values
                        $this->load->library('upload', $config);
                        $this->load->helper('date');

                        // upload file using file name 
                        if (!$this->upload->do_upload($file_element_name))
                        {   // if error return error
                            $returnValues['statusFileSize'] = 'error';
                            $returnValues['msg']            = $this->upload->display_errors('', '');
                        }
                        else
                        {
                            // get uploded file's informations
                            $fileData = $this->upload->data();
                            
                            // set some file properties to data base
                            $formData['hotel_image_name']      = $fileData['file_name'];
                            $formData['hotel_image_path']      = './uploads/hotelImages/'.$_POST['ho_chain_name'].'/'.$hotel_name_image.'/';

                        }           //if (!$this->upload->do_upload($file_element_name))

                        @unlink($_FILES[$file_element_name]);

                    }               //if (!file_exists('./uploads/hotelImages/'.$_POST['ho_chain_name'].'/'.$_POST['hotel_name']))                 

                }           //if (!file_exists('path/to/directory'))   
                else
                {

                    $hotel_name_image = $_POST['hotel_name'];
                    $hotel_name_image = str_replace(' ', '_',$hotel_name_image);
                    //yes, then check if the directory exists for a specific hotel.
                    if (!file_exists('./uploads/hotelImages/'.$_POST['ho_chain_name'].'/'.$hotel_name_image.'/'))            //if the directory exists with the hotel name?
                    {
                        //no, then create a new directory and uplaod the images.
                        mkdir('./uploads/hotelImages/'.$_POST['ho_chain_name'].'/'.$hotel_name_image, 0777, true);     

                        /*echo $hotel_name_image;
                        exit();*/
                        // set the configure valuess
                        // file upload path
                        $config['upload_path']  = './uploads/hotelImages/'.$_POST['ho_chain_name'].'/'.$hotel_name_image.'/';
                        // Accept file types

                        $config['allowed_types'] = 'gif|jpg|png';
                        $config['max_size']      = 1024*1;

                        // file save name in upload folder
                        $config['file_name']    = 'myHotel_hotel_image'.$_POST['hotel_image_name'];


                        // load uplod library andset cofigure values
                        $this->load->library('upload', $config);
                        $this->load->helper('date');                   

                        // upload file using file name 
                        if (!$this->upload->do_upload($file_element_name))
                        {   // if error return error
                            $returnValues['statusFileSize'] = 'error';
                            $returnValues['msg']            = $this->upload->display_errors('', '');
                        }
                        else
                        {
                            // get uploded file's informations
                            $fileData = $this->upload->data();
                            
                            // set some file properties to data base
                            $formData['hotel_image_name']      = $fileData['file_name'];
                            $formData['hotel_image_path']      = './uploads/hotelImages/'.$_POST['ho_chain_name'].'/'.$hotel_name_image.'/';

                        }           //if (!$this->upload->do_upload($file_element_name))

                        @unlink($_FILES[$file_element_name]);
                    }
                    else
                    {
                        // set the configure valuess
                        // file upload path
                        $config['upload_path']  = './uploads/hotelImages/'.$_POST['ho_chain_name'].'/'.$hotel_name_image.'/';
                        // Accept file types

                        $config['allowed_types'] = 'gif|jpg|png';
                        $config['max_size']      = 1024*1;

                        // file save name in upload folder
                        $config['file_name']    = 'myHotel_hotel_image'.$_POST['hotel_image_name'];


                        // load uplod library andset cofigure values
                        $this->load->library('upload', $config);
                        $this->load->helper('date');

                        //yes, then directly upload file using file name 
                        if (!$this->upload->do_upload($file_element_name))
                        {   // if error return error
                            $returnValues['statusFileSize'] = 'error';
                            $returnValues['msg']            = $this->upload->display_errors('', '');
                        }
                        else
                        {
                            // get uploded file's informations
                            $fileData = $this->upload->data();
                            
                            // set some file properties to data base
                            $formData['hotel_image_name']      = $fileData['file_name'];
                            $formData['hotel_image_path']      = './uploads/hotelImages/'.$_POST['ho_chain_name'].'/'.$hotel_name_image;

                        }           //if (!$this->upload->do_upload($file_element_name))

                        @unlink($_FILES[$file_element_name]);

                    }               //if (!file_exists('./uploads/hotelImages/'.$_POST['ho_chain_name'].'/'.$_POST['hotel_name']))                 
                    
                }           


                // data is ok but not uploaded the file to data base file size excied or not written permiton 
                if( $returnValues['statusFileSize'] !== 'error')  
                {
                     $return = $this->hotel_model->insert('hotel',$formData);

                    // data base updated
                    if (null != $return && $return != '')
                    {
                        $hotelUserData = array();
                        $userID        = $_POST['user_id'];
                        $this->load->model('hotelUser_model');

                        $hotelUserData['user_id']  = $userID;
                        $hotelUserData['hotel_id'] = $return;

                        $this->hotelUser_model->insert('hotel_user',$hotelUserData);

                        $returnValues['status'] = "success";
                        $returnValues['msg']    = "Hotel successfully added.";
                    }
                    else
                    {
                        $returnValues['status'] = "error";
                        $returnValues['msg']    = "Hotel did not add successfully";

                    }           //if (null != $return && $return != '')                    

                }           //if( $returnValues['statusFileSize'] == '')  

            // }           //if (!empty($_FILES['Hotel_image_content_path']['name']))         
                
                // exit();
            //no, then insert the new hotel       
           
        }
        
        // return value to Ajax js fucnton 
        echo json_encode ($returnValues);

    }           //public function addNewHotel()    

    //function to get the country image file path
    public function getImageFilePath()
    {
        $returnValues = array();

        $this->load->model('refcountry_model');        

        // check is this ajax caller
        if((isset($_POST['submitMode'])) &&($_POST['submitMode'] == 'ajax'))
        {
            if(isset($_POST['countryCode']))
            {
                $countryDetailsToEdit = $this->refcountry_model->getReferenceCountryByID($_POST['countryCode']);

                $countryDetails = array();
                // convert object to json object
                foreach ($countryDetailsToEdit as $key=> $countryDetail)
                {
                    $countryDetails[$key] = $countryDetail;
                }

                // get data from DB
                $returnValues['status']            = "success";
                $returnValues['countryDetails']    = $countryDetails;
            }   

            echo json_encode($returnValues);
            
        }           //if((isset($_POST['submitMode'])) &&($_POST['submitMode'] == 'ajax')) 

    }           //public function getImageFilePath()

    //function to get hotel details to update
    public function aJaxGetHotelDetailsToUpdate()
    {
        $returnValues = array();

        $this->load->model('hotel_model');        

        // check is this ajax caller
        if((isset($_POST['submitMode'])) &&($_POST['submitMode'] == 'ajax'))
        {
            if(isset($_POST['hotelID']))
            {
                $hotelDetailsToEdit = $this->hotel_model->getHotelByID($_POST['hotelID']);

                $hotelDetails = array();
                // convert object to json object
                foreach ($hotelDetailsToEdit as $key=> $hotelDetail)
                {
                    $hotelDetails[$key] = $hotelDetail;
                }

                // get data from DB
                $returnValues['status']                       = "success";
                $returnValues['hotelDetails']                 = $hotelDetails;
                $returnValues['allCountris']                  = $this->getAllHotelCountry();
                $returnValues['allCity']                      = $this->getAllHotelCity();
                $returnValues['allCurrency']                  = $this->getAllHotelCurrency();
                $returnValues['allhotelChain']                = $this->getAllHotelChains();
                $returnValues['allhotelType']                 = $this->getAllHotelTypes();
                $returnValues['allhotelStarRating']           = $this->getAllHotelStarRating();
                $returnValues['allhotelSubscriptionPackage']  = $this->getAllHotelSubscriptionPackage();

            }   

            echo json_encode($returnValues);
            
        }
        else if($phpRequest=='php')
        {
            if($hotelID!=null)
            { 
                // get data from DB
                $qeuryEcontentResult = $this->content_model->get_specific_record("Content_id",$eContentIDphp);

                $eContents = array();

                // convert object to json object
                foreach ($qeuryEcontentResult->result() as $key => $eContent)
                {
                    $eContents[$key] = $eContent;
                }
                
                // return as array
                return $eContents;
            }
        }

    }           //public function aJaxGetHotelDetailsToUpdate()

    //function to change the hotel status
    public function changeHotelStatus()
    {
        $returnValues = array();
        
        // check adminitrator permission for this functionality
        /*if ($this->getUserType() == "Administrator")            //if the user authorized for this operation?
        {*/
            //yes, then go ahead.
            if ((isset($_POST['hotel_id'])) && (!is_null($_POST['hotel_id'])))      //if the hotel id setted?
            {
                //yes, then update the hotel status.
                $this->load->model('hotel_model');

                $changeStatus = $this->hotel_model->update('hotel', $_POST['hotelData'], $_POST['hotel_id']);
                
                if (null != $changeStatus && $changeStatus != '')           //if the database successfully updated?
                {
                    //yes, then display the success message.
                    $returnValues['status'] = 'success';
                    if (strtolower($_POST['status']) == strtolower('deactivate'))
                    {
                        $returnValues['msg'] = "deactivated";                        
                    }
                    else if (strtolower($_POST['status']) == strtolower('activate'))
                    {
                        $returnValues['msg'] = "activated";                 

                    }           //if (strtolower($_POST['status']) == strtolower('deactivate'))
                }                
                else
                {
                    //no, then display an error message.
                    $returnValues['status'] = 'error';

                    if (strtolower($_POST['status']) == strtolower('deactivate'))
                    {
                        $returnValues['msg'] = "not deactivate";                        
                    }
                    else if (strtolower($_POST['status']) == strtolower('activate'))
                    {
                        $returnValues['msg'] = "not activate";                       
                                                 
                    }           //if (strtolower($_POST['status']) == strtolower('deactivate'))                   
                    
                }           //if (null != $changeStatus && $changeStatus != '')                  
                
            }
            else
            {
                //no, then display an error message.
                $returnValues['status'] = 'error';
                $returnValues['msg']    = "Hotel not selected.";

            }           //if ((isset($_POST['hotel_id'])) && (!is_null($_POST['hotel_id'])))
            
        /*}
        else                                    
        {
            //no, then display the permission error message.
            $returnValues['status'] = "error";
            $returnValues['msg']    = "Access Denied \n This user does not have permission for this functionality.";

        }  */         //if ($this->getUserType() == "Administrator")        
        
        echo json_encode($returnValues);

    }           //public function changeHotelStatus()    

    //function to get beach hotels
    public function getBeachHotels()
    {
        $returnValues = array();

        $this->load->model('placeofInterest_model');        

        // check is this ajax caller
        if((isset($_POST['submitMode'])) &&($_POST['submitMode'] == 'ajax'))
        {
            if(isset($_POST['hiddenValue']))
            {
                $hotelDetails = $this->placeofInterest_model->getHotelforPlaceofInterest($_POST['hiddenValue']);                

                // get data from DB
                $returnValues['status']                    = "success";
                $returnValues['placeofInterestDetails']    = $hotelDetails;
            }   
            
            // $returnValues['msg']    = $_POST['hiddenValue'];

            echo json_encode($returnValues);
            
        }           //if((isset($_POST['submitMode'])) &&($_POST['submitMode'] == 'ajax')) 

    }           //public function saveBeachDetails()

    //function to get the place of interest
    public function getPlacesofInterest()
    {
        $returnValues                = array();        
        $placeOfIntersetDetails      = array();
        $placeOfIntersetDetailsIndex = 0;

        // check is this ajax caller
        if((isset($_POST['submitMode'])) &&($_POST['submitMode'] == 'ajax'))
        {
            if(isset($_POST['hotelID']))
            {
                $this->load->model('hotelBeach_model');                     //load the hotel beach model

                $this->load->model('hotelFoodpreferences_model');           //load the food preference model

                $this->load->model('hotelForest_model');            //load the hotel fores model

                $this->load->model('hotelHistoric_model');          //load the hotel historic model

                $this->load->model('hotelMountain_model');          //load the hotel mountain model

                $this->load->model('hotelReligiousinterest_model');         //load the hotel religious model

                $this->load->model('hotelSceneries_model');         //load the hotel scenery model

                $this->load->model('hotelSports_model');            //load the hotel sports model

                $this->load->model('hotelWildlife_model');          //load the hotel wildlife model

                $this->load->model('beaches_model');                     //load the beaches model

                $this->load->model('food_preferences_model');           //load the food preference model

                $this->load->model('forests_model');            //load the forest model

                $this->load->model('historic_model');          //load the historic model

                $this->load->model('mountains_model');          //load the mountains model

                $this->load->model('religiousInterests_model');         //load the religious interests model

                $this->load->model('sceneries_model');         //load the scenereis model

                $this->load->model('sports_model');            //load the sports model

                $this->load->model('wildlife_model');          //load the wildlife model

                //get the beaches for the current hotel
                $getBeachesForTheCurrentHotel            = $this->hotelBeach_model->getBeachesForSpecificHotel($_POST['hotelID']);

                //get the food preferences for the current hotel
                $getFoodPreferencesForTheCurrentHotel    = $this->hotelFoodpreferences_model->getFoodPreferencesForSpecificHotel($_POST['hotelID']);

                //get the forests for the current hotel
                $getForestForTheCurrentHotel             = $this->hotelForest_model->getForestForSpecificHotel($_POST['hotelID']);

                //get the historic for the current hotel
                $getHistoricForTheCurrentHotel           = $this->hotelHistoric_model->getHistoricForSpecificHotel($_POST['hotelID']);

                //get the mountains for the current hotel
                $getMountainsForTheCurrentHotel          = $this->hotelMountain_model->getMountarinsForSpecificHotel($_POST['hotelID']);

                //get the religious interests for the current hotel
                $getReligiousInterestsForTheCurrentHotel = $this->hotelReligiousinterest_model->getReligiousInterestsForSpecificHotel($_POST['hotelID']);

                //get the sceneries for the current hotel
                $getSceneriesForTheCurrentHotel          = $this->hotelSceneries_model->getSceneriesForSpecificHotel($_POST['hotelID']);

                //get the sports for the current hotel
                $getSportsForTheCurrentHotel             = $this->hotelSports_model->getSportsForSpecificHotel($_POST['hotelID']);

                //get the wildlife for the current hotel
                $getWildlifeForTheCurrentHotel           = $this->hotelWildlife_model->getWildlifeForSpecificHotel($_POST['hotelID']);

                if (!empty($getBeachesForTheCurrentHotel))          //beaches avaialble for the current hotel?
                {
                    if (count($placeOfIntersetDetails) > 0)         //array already contaied data?
                    {
                        //yes, then increment the array index
                        $placeOfIntersetDetailsIndex++;
                        
                    }           //if (count($placeOfIntersetDetails) > 0)

                    $placeOfIntersetDetails[$placeOfIntersetDetailsIndex]['category'] = 'beaches';                       

                    //yes, then iterate thorugh the beaches array
                    for ($index=0; $index<(sizeof($getBeachesForTheCurrentHotel)); $index++)
                    {
                        //get the beach name for specific id
                        $beachName = $this->beaches_model->getBeachesForSpecificHotel($getBeachesForTheCurrentHotel[$index]['beaches_id']);                        

                        $placeOfIntersetDetails[$placeOfIntersetDetailsIndex]['categoryName'] = array(
                                                                                                'categoryName'=> $beachName[$index]['beaches_name']
                                                                                                );                        

                    }           //for ($index=0; $index<(sizeof($getBeachesForTheCurrentHotel)); $index++)
                    
                }           //if (!empty($getBeachesForTheCurrentHotel))
                

                if (!empty($getFoodPreferencesForTheCurrentHotel))          //food preferences avaialble for the current hotel?
                {
                    if (count($placeOfIntersetDetails) > 0)         //array already contaied data?
                    {
                        //yes, then increment the array index
                        $placeOfIntersetDetailsIndex++;
                        
                    }           //if (count($placeOfIntersetDetails) > 0)

                    // $placeOfIntersetDetailsIndex++;     //increment the array index

                    $placeOfIntersetDetails[$placeOfIntersetDetailsIndex]['category'] = 'food preferences';   

                    //yes, then iterate thorugh the beaches array
                    for ($index=0; $index<(sizeof($getFoodPreferencesForTheCurrentHotel)); $index++)
                    {
                        //get the food preferences name for specific id
                        $foodPreferencesName = $this->food_preferences_model->getFoodPreferencesForSpecificHotel($getFoodPreferencesForTheCurrentHotel[$index]['fo_preferences_id']);                        

                        $placeOfIntersetDetails[$placeOfIntersetDetailsIndex]['categoryName'] = array(
                                                                                                'categoryName'=> $foodPreferencesName[$index]['fo_preferences_name']
                                                                                                );

                    }           //for ($index=0; $index<(sizeof($getFoodPreferencesForTheCurrentHotel)); $index++)                    

                }           //if (!empty($getFoodPreferencesForTheCurrentHotel))

                if (!empty($getForestForTheCurrentHotel))           //forests avaialble for the current hotel?
                {
                    if (count($placeOfIntersetDetails) > 0)         //array already contaied data?
                    {
                        //yes, then increment the array index
                        $placeOfIntersetDetailsIndex++;
                        
                    }           //if (count($placeOfIntersetDetails) > 0)                    

                    $placeOfIntersetDetails[$placeOfIntersetDetailsIndex]['category'] = 'forests';   

                    //yes, then iterate thorugh the forests array
                    for ($index=0; $index<(sizeof($getForestForTheCurrentHotel)); $index++)
                    {
                        //get the forest name for specific id
                        $forestsName = $this->forests_model->getForestForSpecificHotel($getForestForTheCurrentHotel[$index]['forests_id']);                        

                        $placeOfIntersetDetails[$placeOfIntersetDetailsIndex]['categoryName'] = array(
                                                                                                'categoryName'=> $forestsName[$index]['forests_name']
                                                                                                );

                    }           //for ($index=0; $index<(sizeof($getForestForTheCurrentHotel)); $index++)

                }           //if (!empty($getForestForTheCurrentHotel))

                if (!empty($getHistoricForTheCurrentHotel))         //historic avaialble for the current hotel?
                {
                    if (count($placeOfIntersetDetails) > 0)         //array already contaied data?
                    {
                        //yes, then increment the array index
                        $placeOfIntersetDetailsIndex++;
                        
                    }           //if (count($placeOfIntersetDetails) > 0)

                    $placeOfIntersetDetails[$placeOfIntersetDetailsIndex]['category'] = 'historic';   

                    //yes, then iterate thorugh the historic array
                    for ($index=0; $index<(sizeof($getHistoricForTheCurrentHotel)); $index++)
                    {
                        //get the historic name for specific id
                        $historicName = $this->historic_model->getHistoricForSpecificHotel($getHistoricForTheCurrentHotel[$index]['historic_id']);                        

                        $placeOfIntersetDetails[$placeOfIntersetDetailsIndex]['categoryName'] = array(
                                                                                                'categoryName'=> $historicName[$index]['historic_name']
                                                                                                );

                    }           //for ($index=0; $index<(sizeof($getHistoricForTheCurrentHotel)); $index++)                    

                }           //if (!empty($getHistoricForTheCurrentHotel))

                if (!empty($getMountainsForTheCurrentHotel))            //mountains avaialble for the current hotel?
                {
                    if (count($placeOfIntersetDetails) > 0)         //array already contaied data?
                    {
                        //yes, then increment the array index
                        $placeOfIntersetDetailsIndex++;
                        
                    }           //if (count($placeOfIntersetDetails) > 0)  

                    $placeOfIntersetDetails[$placeOfIntersetDetailsIndex]['category'] = 'mountains';   

                    //yes, then iterate thorugh the mountains array
                    for ($index=0; $index<(sizeof($getMountainsForTheCurrentHotel)); $index++)
                    {
                        //get the mountain name for specific id
                        $mountainName = $this->mountains_model->getMountarinsForSpecificHotel($getMountainsForTheCurrentHotel[$index]['mountains_id']);                        

                        $placeOfIntersetDetails[$placeOfIntersetDetailsIndex]['categoryName'] = array(
                                                                                                'categoryName'=> $mountainName[$index]['mountains_name']
                                                                                                );

                    }           //for ($index=0; $index<(sizeof($getMountainsForTheCurrentHotel)); $index++)                    

                }           //if (!empty($getMountainsForTheCurrentHotel))

                if (!empty($getReligiousInterestsForTheCurrentHotel))       //religious interests avaialble for the current hotel?
                {
                    if (count($placeOfIntersetDetails) > 0)         //array already contaied data?
                    {
                        //yes, then increment the array index
                        $placeOfIntersetDetailsIndex++;
                        
                    }           //if (count($placeOfIntersetDetails) > 0)

                    $placeOfIntersetDetails[$placeOfIntersetDetailsIndex]['category'] = 'religious interest';   

                    //yes, then iterate thorugh the religious interests array
                    for ($index=0; $index<(sizeof($getReligiousInterestsForTheCurrentHotel)); $index++)
                    {
                        //get the religious interests name for specific id
                        $religiousInterestsName = $this->religiousInterests_model->getReligiousInterestsForSpecificHotel($getReligiousInterestsForTheCurrentHotel[$index]['re_interests_id']);                        

                        $placeOfIntersetDetails[$placeOfIntersetDetailsIndex]['categoryName'] = array(
                                                                                                'categoryName'=> $religiousInterestsName[$index]['re_interests_name']
                                                                                                );

                    }           //for ($index=0; $index<(sizeof($getReligiousInterestsForTheCurrentHotel)); $index++)                    

                }           //if (!empty($getReligiousInterestsForTheCurrentHotel))

                if (!empty($getSceneriesForTheCurrentHotel))        //sceneries avaialble for the current hotel?
                {
                    if (count($placeOfIntersetDetails) > 0)         //array already contaied data?
                    {
                        //yes, then increment the array index
                        $placeOfIntersetDetailsIndex++;
                        
                    }           //if (count($placeOfIntersetDetails) > 0)

                    $placeOfIntersetDetails[$placeOfIntersetDetailsIndex]['category'] = 'sceneries';   

                    //yes, then iterate thorugh the sceneries array
                    for ($index=0; $index<(sizeof($getSceneriesForTheCurrentHotel)); $index++)
                    {
                        //get the sceneries name for specific id
                        $sceneriesName = $this->sceneries_model->getSceneriesForSpecificHotel($getSceneriesForTheCurrentHotel[$index]['sceneries_id']);                        

                        $placeOfIntersetDetails[$placeOfIntersetDetailsIndex]['categoryName'] = array(
                                                                                                'categoryName'=> $sceneriesName[$index]['sceneries_name']
                                                                                                );

                    }           //for ($index=0; $index<(sizeof($getSceneriesForTheCurrentHotel)); $index++)                    

                }           //if (!empty($getSceneriesForTheCurrentHotel))

                if (!empty($getSportsForTheCurrentHotel))           //sports avaialble for the current hotel?
                {
                    if (count($placeOfIntersetDetails) > 0)         //array already contaied data?
                    {
                        //yes, then increment the array index
                        $placeOfIntersetDetailsIndex++;
                        
                    }           //if (count($placeOfIntersetDetails) > 0)

                    $placeOfIntersetDetails[$placeOfIntersetDetailsIndex]['category'] = 'sports';   

                    //yes, then iterate thorugh the sports array
                    for ($index=0; $index<(sizeof($getSportsForTheCurrentHotel)); $index++)
                    {
                        //get the sports name for specific id
                        $sportsName = $this->sports_model->getSportsForSpecificHotel($getSportsForTheCurrentHotel[$index]['sports_id']);                        

                        $placeOfIntersetDetails[$placeOfIntersetDetailsIndex]['categoryName'] = array(
                                                                                                'categoryName'=> $sportsName[$index]['sports_name']
                                                                                                );

                    }           //for ($index=0; $index<(sizeof($getSportsForTheCurrentHotel)); $index++)                    

                }           //if (!empty($getSportsForTheCurrentHotel))

                if (!empty($getWildlifeForTheCurrentHotel))         //wildlife avaialble for the current hotel?
                {
                    if (count($placeOfIntersetDetails) > 0)         //array already contaied data?
                    {
                        //yes, then increment the array index
                        $placeOfIntersetDetailsIndex++;
                        
                    }           //if (count($placeOfIntersetDetails) > 0)

                    $placeOfIntersetDetails[$placeOfIntersetDetailsIndex]['category'] = 'wildlife';   

                    //yes, then iterate thorugh the wildlife array
                    for ($index=0; $index<(sizeof($getWildlifeForTheCurrentHotel)); $index++)
                    {
                        //get the wildlife name for specific id
                        $wildlifeName = $this->wildlife_model->getWildlifeForSpecificHotel($getWildlifeForTheCurrentHotel[$index]['wildlife_id']);                        

                        $placeOfIntersetDetails[$placeOfIntersetDetailsIndex]['categoryName'] = array(
                                                                                                'categoryName'=> $wildlifeName[$index]['wildlife_name']
                                                                                                );

                    }           //for ($index=0; $index<(sizeof($getWildlifeForTheCurrentHotel)); $index++)                    

                }           //if (!empty($getWildlifeForTheCurrentHotel))
                                                    
                // get data from DB
                $returnValues['status']                    = "success";
                $returnValues['placeOfIntersetDetails']    = $placeOfIntersetDetails;                
            } 
            else
            {
                $returnValues['status'] = "error";
                $returnValues['msg']    = 'error in your code';
            }  

            echo json_encode($returnValues);
            
        }           //if((isset($_POST['submitMode'])) &&($_POST['submitMode'] == 'ajax')) 

    }           //public function getPlacesofInterest()

    public function getuserreviews()
    {
        $userreviews  = array();
        $this->load->model('user_comments_model'); 
        if((isset($_POST['hotel_id'])) &&($_POST['submitMode']=='ajax')) // check is this ajax caller
        {  
            $hotelId     = $_POST['hotel_id'];
            $userreviews = $this->user_comments_model->gettoadminvalidate($hotelId);

            if(sizeof($userreviews)>0)
            {
                 echo json_encode($userreviews); 
            }else
            {
                return 0;
            }
        }
    }

    public function updateuserreviews()
    {
        $this->load->model('user_comments_model'); 
        $data = array();
          if((isset($_POST['hotel_id'])) &&(isset($_POST['comm_id'])) &&(isset($_POST['comm_status'])) &&($_POST['submitMode']=='ajax'))
          { 
                if ($_POST['comm_status']=='Approve') {
                    $data['is_sa_approved'] = 1;
                    $data['comments_status'] = 'activate';
                    $msg = "Guest comment has been approved";

                }else{
                    $data['is_sa_approved'] = 0;
                    $data['comments_status'] = 'deactivate';
                    $msg = "Guest comment has been disapproved";
                }

                $comments_id = $_POST['comm_id'];
                $return      = $this->user_comments_model->update('user_comments',$data,$comments_id);
            
            if(null != $return && $return != '')
            {
                $returnValues['status']   = "success";
                $returnValues['msg']      = $msg;
            }
            else
            {
                $returnValues['status'] = "error";
                $returnValues['msg']    = "Unable to approve user comments";
            }
             echo json_encode ($returnValues);
          }
    }

	function addImagesToHotelGallery()
    {
        $this->load->model('gallery_images');
        $this->load->model('gallery_images_room');
        $this->load->model('hotel_model');

        $hotel_id     = $_POST['hotel_id'];
        $room_id      = $_POST['room_id'];
        $image_names  = explode(",", $_POST['image_names']);
        $formData     = array();
        $returnValues = array();
        
        $hotel_name = $this->hotel_model->get_hotel_name_for_id($hotel_id);

        $hotel_chain_names = $this->getAllHotelChains(); 

        foreach ($_FILES["file"]["error"] as $key => $error)
        {
            if ($error == UPLOAD_ERR_OK)
            {
                $time       = time();  // time on creation
                $random_num = rand(00,99);  // random number
                $imageName       = $time.$random_num.$_FILES["file"]["name"][$key]; // avoid same file name collision

                $size       = $_FILES["file"]["size"][$key]; // get file size

                for ($index = 0; $index < (sizeof($image_names)); $index++)
                {
                    if ($_FILES["file"]["name"][$key] == $image_names[$index])
                    {
                        for($chainIndex=0;$chainIndex<(sizeof($hotel_chain_names));$chainIndex++)
                        {
                            if($hotel_chain_names[$chainIndex]['ho_chain_id'] == $hotel_name[0]['ho_chain_id'])
                            {                                        
                                $hotel_chain = $hotel_chain_names[$chainIndex]['ho_chain_name'];
                            }
                        }                            

                        //user going to upload images to room gallery
                        if ($room_id != null || !empty($room_id))
                        {
                            //yes, then set the path for specific folder
                            $path = "./uploads/roomImages/".$hotel_chain."/".$hotel_name[0]['hotel_name']."/";                            
                        }
                        else
                        {
                            //no, he's going to upoad images to hotel images gallery
                            $path = "./uploads/hotelImages/".$hotel_chain."/".$hotel_name[0]['hotel_name']."/";                            
                        }
                        
                        if (!file_exists($path))       //if the ditecroty exists with hotel_chain & hotel_name names?
                        {
                            //no, then create a directory and upload the images.
                            $folderName = $path;                    
                            mkdir($folderName, 0777, true);

                            switch(strtolower($_FILES["file"]['type'][$key]))
                            {
                                case 'image/jpeg':
                                        $image = imagecreatefromjpeg($_FILES["file"]['tmp_name'][$key]);
                                        move_uploaded_file($_FILES["file"]["tmp_name"][$key],$path.$imageName);
                                        break;
                                case 'image/png':
                                        $image = imagecreatefrompng($_FILES["file"]['tmp_name'][$key]);
                                        move_uploaded_file($_FILES["file"]["tmp_name"][$key],$path.$imageName);
                                        break;
                                case 'image/gif':
                                        $image = imagecreatefromgif($_FILES["file"]['tmp_name'][$key]);
                                        move_uploaded_file($_FILES["file"]["tmp_name"][$key],$path.$imageName);
                                        break;
                                default:
                                       print('This file type is not allowed');
                                       return false;
                            }

                            @unlink($_FILES["file"]['tmp_name'][$key]);
                            $old_width      = imagesx($image);
                            $old_height     = imagesy($image);

                            if ($old_width < 500 || $old_height < 550) // check the what is the 
                            {
                                $returnValues['status'] = 'error';
                                $returnValues['msg']    = 'Please consider about minimum image size is 500 x 550 pixels';
                            }
                            else
                            {
                                $max_width  = 500;
                                $max_height = 550;
                                $scale          = min($max_width/$old_width, $max_height/$old_height);

                                if ($old_width > 500 || $old_height > 550)
                                {
                                    $new_width      = $max_width ;
                                    $new_height     = $max_height ;
                                } 
                                else
                                {
                                    $new_width  = $old_width;
                                    $new_height = $old_height;
                                }

                                $new = imagecreatetruecolor($new_width, $new_height);
                                imagecopyresampled($new, $image,0, 0, 0, 0,$new_width, $new_height, $old_width, $old_height);
                                switch(strtolower($_FILES["file"]['type'][$key]))
                                {
                                    case 'image/jpeg':
                                            imagejpeg($new, $path.'tn_'.$imageName, 90);
                                            break;
                                    case 'image/png':
                                            imagealphablending($new, false);
                                            imagecopyresampled($new, $image,0, 0, 0, 0,$new_width, $new_height, $old_width, $old_height);
                                            imagesavealpha($new, true); 
                                            imagepng($new, $path.'tn_'.$imageName, 0);
                                            break;
                                    case 'image/gif':
                                            imagegif($new, $path.'tn_'.$imageName);
                                            break;
                                    default:
                                }

                                imagedestroy($image);
                                imagedestroy($new);

                                $formData['image_name']   = 'tn_'.$imageName;                    
                                $formData['image_size']   = $size;  

                                //user going to upload images to room gallery
                                if ($room_id != null || !empty($room_id))
                                {
                                    //yes, then set the path for specific folder                                    
                                    $formData['image_path']   = "uploads/roomImages/".$hotel_chain."/".$hotel_name[0]['hotel_name']."/";
                                }
                                else
                                {
                                    //no, he's going to upoad images to hotel images gallery                                    
                                    $formData['image_path']   = "uploads/hotelImages/".$hotel_chain."/".$hotel_name[0]['hotel_name']."/";
                                
                                } 

                                $formData['created_time'] = $time;
                                $formData['hotel_id']     = $hotel_id;

                                //user going to upload images to room gallery
                                if ($room_id != null && $room_id != '')
                                {
                                    $formData['room_id']     = $room_id;
                                    //yes, then set the path for specific folder                                    
                                    $insert_result = $this->gallery_images_room->insert('gallery_images_room', $formData);                    
                                }
                                else
                                {
                                    //no, he's going to upoad images to hotel images gallery                                    
                                    $insert_result = $this->gallery_images->insert('gallery_images', $formData);                    
                                
                                }
                                
                                $returnValues['status']    = 'success';
                                $returnValues['msg']       = 'Image successfully uploaded';
                                $returnValues['hotel_id']  = $hotel_id;
                            }
                        }
                        else
                        {
                            switch(strtolower($_FILES["file"]['type'][$key]))
                            {
                                case 'image/jpeg':
                                        $image = imagecreatefromjpeg($_FILES["file"]['tmp_name'][$key]);
                                        move_uploaded_file($_FILES["file"]["tmp_name"][$key],$path.$imageName);
                                        break;
                                case 'image/png':
                                        $image = imagecreatefrompng($_FILES["file"]['tmp_name'][$key]);
                                        move_uploaded_file($_FILES["file"]["tmp_name"][$key],$path.$imageName);
                                        break;
                                case 'image/gif':
                                        $image = imagecreatefromgif($_FILES["file"]['tmp_name'][$key]);
                                        move_uploaded_file($_FILES["file"]["tmp_name"][$key],$path.$imageName);
                                        break;
                                default:
                                       print('This file type is not allowed');
                                       return false;
                            }

                            @unlink($_FILES["file"]['tmp_name'][$key]);
                            $old_width      = imagesx($image);
                            $old_height     = imagesy($image);

                            if ($old_width < 500 || $old_height < 550) // check the what is the 
                            {
                                $returnValues['status'] = 'error';
                                $returnValues['msg']    = 'Please consider about minimum image size is 500 x 550 pixels';
                            }
                            else
                            {
                                $max_width  = 500;
                                $max_height = 550;
                                $scale          = min($max_width/$old_width, $max_height/$old_height);

                                if ($old_width > 500 || $old_height > 550)
                                {
                                    $new_width      = $max_width ;
                                    $new_height     = $max_height ;
                                } 
                                else
                                {
                                    $new_width  = $old_width;
                                    $new_height = $old_height;
                                }

                                $new = imagecreatetruecolor($new_width, $new_height);
                                imagecopyresampled($new, $image,0, 0, 0, 0,$new_width, $new_height, $old_width, $old_height);
                                switch(strtolower($_FILES["file"]['type'][$key]))
                                {
                                    case 'image/jpeg':
                                            imagejpeg($new, $path.'tn_'.$imageName, 90);
                                            break;
                                    case 'image/png':
                                            imagealphablending($new, false);
                                            imagecopyresampled($new, $image,0, 0, 0, 0,$new_width, $new_height, $old_width, $old_height);
                                            imagesavealpha($new, true); 
                                            imagepng($new, $path.'tn_'.$imageName, 0);
                                            break;
                                    case 'image/gif':
                                            imagegif($new, $path.'tn_'.$imageName);
                                            break;
                                    default:
                                }

                                imagedestroy($image);
                                imagedestroy($new);

                                // print '<div style="font-family:arial;"><b>'.$imageName.'</b> Uploaded successfully. Size: '.round($_FILES["file"]['size'][$key]/1000).'kb</div>';

                                $formData['image_name']   = 'tn_'.$imageName;                    
                                $formData['image_size']   = $size;
                                
                                //user going to upload images to room gallery
                                if ($room_id != null || !empty($room_id))
                                {
                                    //yes, then set the path for specific folder                                    
                                    $formData['image_path']   = "uploads/roomImages/".$hotel_chain."/".$hotel_name[0]['hotel_name']."/";
                                }
                                else
                                {
                                    //no, he's going to upoad images to hotel images gallery
                                    $formData['image_path']   = "uploads/hotelImages/".$hotel_chain."/".$hotel_name[0]['hotel_name']."/";
                                
                                } 

                                $formData['created_time'] = $time;
                                $formData['hotel_id']     = $hotel_id;

                                //user going to upload images to room gallery
                                if ($room_id != null || !empty($room_id))
                                {
                                    //yes, then set the path for specific folder                                    
                                    $formData['room_id']     = $room_id;
                                    $insert_result = $this->gallery_images_room->insert('gallery_images_room', $formData);                    
                                }
                                else
                                {
                                    //no, he's going to upoad images to hotel images gallery                                    
                                    $insert_result = $this->gallery_images->insert('gallery_images', $formData);                    
                                
                                }
                                
                                $returnValues['status']    = 'success';
                                $returnValues['msg']       = 'Image successfully uploaded';
                                $returnValues['hotel_id']  = $hotel_id;
                            }
                        }
                    }
                }
            }   
        }

        echo json_encode($returnValues);
        
    }

	public function get_images_for_specific_hotel()
    {
        $this->load->model('gallery_images');
        $this->load->model('gallery_images_room');
        
        if(isset($_POST['submitMode']) && $_POST['submitMode'] == 'ajax')
        {
            $returnValues  = array();            
            $hotel_id      = $_POST['hotel_id'];
            $room_id       = $_POST['room_id'];

            //asking for room images?
            if ($room_id != null || !empty($room_id))
            {
                //yes then get it
                $image_name_array = $this->gallery_images_room->get_images_for_hotel_room($hotel_id, $room_id);
                $return_type      = 'room_image';

            }
            else
            {
                //no, asking hotel images
                $image_name_array = $this->gallery_images->get_images_for_hotel($hotel_id);                
                $return_type      = 'hotel_image';
            }


            for ($index=0; $index < (sizeof($image_name_array)); $index++)
            {                
                if (empty($image_name_array[$index]['image_id']) != 1)
                {
                    $returnValues['status']        = "success";                    
                    $returnValues['imageNames']    = $image_name_array; 
                    $returnValues['returnType']    = $return_type; 
                    $returnValues['imagePath']     = $image_name_array[$index]['image_path']; 
                }
                else
                {
                    $returnValues['status']       = "error";
                    $returnValues['imageNames']   = "No images found"; 
                }
            }
        }
        else
        {
            $returnValues['status']        = "error";
            $returnValues['imageNames']    = "Error with your submission mode"; 
        }


        echo json_encode($returnValues);

    }

	public function delete_images()
    {
        $this->load->model('gallery_images');
        
        if(isset($_POST['submitMode']) && $_POST['submitMode'] == 'ajax')
        {
            $returnValues  = array();        
            $formData      = array();    
            $hotel_id      = $_POST['hotel_id'];
            $image_id      = $_POST['image_id'];

            $image_path_array = $this->gallery_images->get_image_path($image_id);

            $file_to_delete   = "./".$image_path_array[0]['image_path'].$image_path_array[0]['image_name'];

            $delete_status    = unlink($file_to_delete);
            
            if ($delete_status == true)
            {
                $image_name_array = $this->gallery_images->deleteData('gallery_images',$image_id);

                $returnValues['status']    = "success";
                $returnValues['msg']       = "Image successfully deleted.";
                $returnValues['hotel_id']  = $hotel_id;
            }
            else
            {
                $returnValues['status']  = "error";
                $returnValues['msg']     = "Image did not successfully delete."; 
            }
        }
        else
        {
            $returnValues['status'] = "error";
            $returnValues['msg']    = "Error with your submission mode"; 
        }

        echo json_encode($returnValues);

    }
	
	public function getAllRestaurantDetailsViewModal()
    {
        $returnValues = array();

        if((isset($_POST['restaurantId']))) 
        {
            
            $this->load->model('restaurants_model');

            $restaurantAllDetails = $this->restaurants_model->getRestaurantTypeValuesPreview($_POST['restaurantId']);
                
            if (!empty($restaurantAllDetails))
            {

                $returnValues['restaurantAllDetails'] = $restaurantAllDetails;
                $returnValues['status'] = 'success';
                $returnValues['msg'] = 'Restaurant details return';
            }
            else
            {
                $returnValues['status'] = 'error';
                $returnValues['msg'] = 'Not existing Restaurant';
            }            
            
        }
        else
        {
            $returnValues['status'] = 'error';
            $returnValues['msg'] = 'data not send';         
        }

        echo json_encode($returnValues);

    }
	
	public function saveRestaurantEditedDetails($phpRequest=null,$restaurantIDphp=null,$editedDataphp=null)
    {
        $returnValues = array();

        $this->load->model('restaurants_model');
        
        if((isset($_POST['editedRestaurantDetails'])) &&($_POST['submitMode']=='ajax')) // check is this ajax caller
        {     
            $checkExistingDate =$this->restaurants_model->checkExistingDate($_POST['restaurantId'],$_POST['editedRestaurantDetails']['restaurants_name'],$_POST['hotel']); 
        
            if ($checkExistingDate ==0) {
                $result = $queryRestaurantResult = $this->restaurants_model->update_records($_POST['restaurantId'], $_POST['editedRestaurantDetails']); // update database

                
                if (!empty($result))    // if update database
                {   
                    $returnValues['status'] = 'success';
                    $returnValues['msg']    = 'Data base updated';
                }
                
                else                   // not update database
                {
                    $returnValues['status'] = "error";
                    $returnValues['msg']    = "Not updated restaurant settings.";
                }
            }else
            {
                $returnValues['status'] = "error";
                $returnValues['msg']    = "Restaurant already exists in this hotel";

            }

            echo json_encode($returnValues);
        }

        elseif($phpRequest=='php')
        {            
           
            $result = $queryRestaurantResult = $this->restaurants_model->update_records($restaurantIDphp, $editedDataphp);  // update database

            
            if ($result==1)     // if update database
            { 
                $returnValues['status'] = 'success';
                $returnValues['msg']    = 'Data base updated';
            }
            
            else                // not update database
            {
                $returnValues['status'] = "error";
                $returnValues['msg']    = "Data base not updated";
            }

            return $returnValues;
        }
    }

		public function getAllPoolDetailsViewModal()
    {
        $returnValues = array();

        if((isset($_POST['poolId']))) 
        {
            
            $this->load->model('pool_model');

            $poolAllDetails = $this->pool_model->getPoolTypeValuesPreview($_POST['poolId']);
                
            if (!empty($poolAllDetails))
            {

                $returnValues['poolAllDetails'] = $poolAllDetails;
                $returnValues['status'] = 'success';
                $returnValues['msg'] = 'Pool details return';
            }
            else
            {
                $returnValues['status'] = 'error';
                $returnValues['msg'] = 'Not existing Pool';
            }            
            
        }
        else
        {
            $returnValues['status'] = 'error';
            $returnValues['msg'] = 'data not send';         
        }

        echo json_encode($returnValues);

    }

    public function getAllRoomRatePeriodsDetailsViewModal()
    {
        $returnValues = array();

        if((isset($_POST['room_rate_period_id']))) 
        {
            
            $this->load->model('room_rate_periods_model');

            $roomRatePeriodAllDetails = $this->room_rate_periods_model->getRoomRatePeriodValuesPreview(array('ro_rate_periods_id' => $_POST['room_rate_period_id']));
                
            if (!empty($roomRatePeriodAllDetails))
            {

                $returnValues['roomRatePeriodAllDetails'] = $roomRatePeriodAllDetails->row();
                $returnValues['status'] = 'success';
                $returnValues['msg'] = 'Room Rate Period details return';
            }
            else
            {
                $returnValues['status'] = 'error';
                $returnValues['msg'] = 'Not existing Room Rate Period';
            }            
            
        }
        else
        {
            $returnValues['status'] = 'error';
            $returnValues['msg'] = 'data not send';         
        }

        echo json_encode($returnValues);

    }
	
	public function savePoolEditedDetails($phpRequest=null,$poolIDphp=null,$editedDataphp=null)
    {
        $returnValues = array();

        $this->load->model('pool_model');
        
        if((isset($_POST['editedPoolDetails'])) &&($_POST['submitMode']=='ajax')) // check is this ajax caller
        {   

            $checkExistingDate =$this->pool_model->checkExistingDate($_POST['poolId'],$_POST['editedPoolDetails']['pool_name'],$_POST['pool_hotel']); 
        
            if ($checkExistingDate ==0) {
                $result = $queryPoolResult = $this->pool_model->update_records($_POST['poolId'], $_POST['editedPoolDetails']); // update database

                
                if (!empty($result))    // if update database
                {   
                    $returnValues['status'] = 'success';
                    $returnValues['msg']    = 'Data base updated';
                }
                
                else                   // not update database
                {
                    $returnValues['status'] = "error";
                    $returnValues['msg']    = "Data base not updated";
                }
            }else
            {
                $returnValues['status'] = "error";
                $returnValues['msg']    = "Pool already exists in this hotel";

            }

            echo json_encode($returnValues);
        }

        elseif($phpRequest=='php')
        {            
           
            $result = $queryPoolResult = $this->pool_model->update_records($poolIDphp, $editedDataphp);  // update database

            
            if ($result==1)     // if update database
            { 
                $returnValues['status'] = 'success';
                $returnValues['msg']    = 'Data base updated';
            }
            
            else                // not update database
            {
                $returnValues['status'] = "error";
                $returnValues['msg']    = "Data base not updated";
            }

            return $returnValues;
        }     
        
    }
        
   public function getAllSportsFacilityDetailsViewModal()
    {
        $returnValues = array();

        if((isset($_POST['sportsfacilityId']))) 
        {
            
            $this->load->model('sports_facility_model');

            $sportsfacilityAllDetails = $this->sports_facility_model->getSportsFacilityTypeValuesPreview($_POST['sportsfacilityId']);
                
            if (!empty($sportsfacilityAllDetails))
            {

                $returnValues['sportsfacilityAllDetails'] = $sportsfacilityAllDetails;
                $returnValues['status'] = 'success';
                $returnValues['msg'] = 'Sports Facility details return';
            }
            else
            {
                $returnValues['status'] = 'error';
                $returnValues['msg'] = 'Not existing Sports Facility';
            }            
            
        }
        else
        {
            $returnValues['status'] = 'error';
            $returnValues['msg'] = 'data not send';         
        }

        echo json_encode($returnValues);

    } 

    public function saveSportsFacilityEditedDetails($phpRequest=null,$sportsfacilityIDphp=null,$editedDataphp=null)
    {
        $returnValues = array();

        $this->load->model('sports_facility_model');
        
        if((isset($_POST['editedSportsFacilityDetails'])) &&($_POST['submitMode']=='ajax')) // check is this ajax caller
        {     
            $checkExistingDate =$this->sports_facility_model->checkExistingDate($_POST['sportsfacilityId'],$_POST['editedSportsFacilityDetails']['sp_facility_name'],$_POST['hotel']); 
        
            if ($checkExistingDate ==0) {
                $result = $querySportsFacilityResult = $this->sports_facility_model->update_records($_POST['sportsfacilityId'], $_POST['editedSportsFacilityDetails']); // update database

                
                if (!empty($result))    // if update database
                {   
                    $returnValues['status'] = 'success';
                    $returnValues['msg']    = 'Data base updated';
                }
                
                else                   // not update database
                {
                    $returnValues['status'] = "error";
                    $returnValues['msg']    = "Data base not updated";
                }
            
            }
            else
            {
                $returnValues['status'] = "error";
                $returnValues['msg']    = "Gym already exists in this hotel";

            }  
            

            echo json_encode($returnValues);
        }

        elseif($phpRequest=='php')
        {            
           
            $result = $querySportsFacilityResult = $this->sports_facility_model->update_records($sportsfacilityIDphp, $editedDataphp);  // update database

            
            if ($result==1)     // if update database
            { 
                $returnValues['status'] = 'success';
                $returnValues['msg']    = 'Data base updated';
            }
            
            else                // not update database
            {
                $returnValues['status'] = "error";
                $returnValues['msg']    = "Data base not updated";
            }

            return $returnValues;
        }     
        
    }

    public function getAllClubDetailsViewModal()
    {
        $returnValues = array();

        if((isset($_POST['clubId']))) 
        {
            
            $this->load->model('club_model');

            $clubAllDetails = $this->club_model->getClubTypeValuesPreview($_POST['clubId']);
                
            if (!empty($clubAllDetails))
            {

                $returnValues['clubAllDetails'] = $clubAllDetails;
                $returnValues['status'] = 'success';
                $returnValues['msg'] = 'Club details return';
            }
            else
            {
                $returnValues['status'] = 'error';
                $returnValues['msg'] = 'Not existing Club';
            }            
            
        }
        else
        {
            $returnValues['status'] = 'error';
            $returnValues['msg'] = 'data not send';         
        }

        echo json_encode($returnValues);

    } 


    public function saveClubEditedDetails($phpRequest=null,$clubIDphp=null,$editedDataphp=null)
    {
        $returnValues = array();

        $this->load->model('club_model');
        
        if((isset($_POST['editedClubDetails'])) &&($_POST['submitMode']=='ajax')) // check is this ajax caller
        {     
            $checkExistingDate =$this->club_model->checkExistingDate($_POST['clubId'],$_POST['editedClubDetails']['club_name'],$_POST['hotel']); 
        
            if ($checkExistingDate ==0) {
                $result = $queryClubResult = $this->club_model->update_records($_POST['clubId'], $_POST['editedClubDetails']); // update database

                
                if (!empty($result))    // if update database
                {   
                    $returnValues['status'] = 'success';
                    $returnValues['msg']    = 'Data base updated';
                }
                
                else                   // not update database
                {
                    $returnValues['status'] = "error";
                    $returnValues['msg']    = "Data base not updated";
                }
             }
            else
            {
                $returnValues['status'] = "error";
                $returnValues['msg']    = "Club already exists in this hotel";

            }  
            

            echo json_encode($returnValues);
        }

        elseif($phpRequest=='php')
        {            
           
            $result = $queryClubResult = $this->club_model->update_records($clubIDphp, $editedDataphp);  // update database

            
            if ($result==1)     // if update database
            { 
                $returnValues['status'] = 'success';
                $returnValues['msg']    = 'Data base updated';
            }
            
            else                // not update database
            {
                $returnValues['status'] = "error";
                $returnValues['msg']    = "Data base not updated";
            }

            return $returnValues;
        }     
        
    }


    public function getAllRoomDetailsViewModal()
    {
        $returnValues = array();

        if((isset($_POST['roomId']))) 
        {
            
            $this->load->model('room_model');
            $this->load->model('room_category_model');
            $this->load->model('popular_facilities_room_model');

            $roomAllDetails = $this->room_model->getRoomTypeValuesPreview(array('room_id' => $_POST['roomId']));
            
            //gel all popluar facilities for the room
            $roomPopularFacilities = $this->popular_facilities_room_model->getFacilitiesForRoom(array('room_id' => $_POST['roomId']));
                
            if (!empty($roomAllDetails))
            {
                $roomTypeDetails = $this->room_category_model->select('room_category');
                $returnValues['roomAllDetails']        = $roomAllDetails->row();
                $returnValues['roomTypeDetails']       = $roomTypeDetails;
                $returnValues['roomCurrencyDetails']   = $this->getAllCurrency();
                $returnValues['roomBedTypes']          = $this->getBedTypes();
                $returnValues['roomMattressType']      = $this->getMattressTypes();
                $returnValues['roomPopularFacilities'] = $roomPopularFacilities;
                $returnValues['status']                = 'success';
                $returnValues['msg']                   = 'Room details return';
            }
            else
            {
                $returnValues['status'] = 'error';
                $returnValues['msg']    = 'Not existing Room';
            }            
            
        }
        else
        {
            $returnValues['status'] = 'error';
            $returnValues['msg']    = 'data not send';         
        }

        echo json_encode($returnValues);

    }

    public function getAllCurrency()
    {
        $this->load->model('currency_model');   

        $allRoomCurrencyDetails = $this->currency_model->select('currency');

        if(null != $allRoomCurrencyDetails && $allRoomCurrencyDetails != "")
        {
            return $allRoomCurrencyDetails;

        }           //if(null != $allHotelHallTypeDetails && $allHotelHallTypeDetails != "")

    }     


    public function saveRoomEditedDetails($phpRequest=null,$roomIDphp=null,$editedDataphp=null)
    {
        $returnValues = array();

        $this->load->model('room_model');
        $this->load->model('popular_facilities_room_model');
        
        if((isset($_POST['editedRoomDetails'])) &&($_POST['submitMode']=='ajax')) // check is this ajax caller
        {            
            $queryRoomResult = $this->room_model->update_records($_POST['roomId'], $_POST['editedRoomDetails']); // update database            
           
            if (!empty($queryRoomResult))    // if update database
            {   
              $returnValues['status'] = 'success';
                $returnValues['msg']    = 'Data base updated';  
            }            
            else                   // not update database
            {
                $returnValues['status'] = "error";
                $returnValues['msg']    = "Data base not updated";
            }

            if ($_POST['facility_id'] != 0)
            {
                $queryFacilityResult = $this->popular_facilities_room_model->update_records($_POST['facility_id'], $_POST['editedPopularFacilityDetails']); // update database
                
            }
            else
            {
                $queryFacilityResult = $this->popular_facilities_room_model->insert('popular_facilities_room', $_POST['editedPopularFacilityDetails']); // insert record

            }
            
            /*if ($queryFacilityResult)
            {
                $returnValues['status'] = 'success';
                $returnValues['msg']    = 'Facility details updated.';
            }
            else
            {
                $returnValues['status'] = "error";
                $returnValues['msg']    = "Facility details did not update.";
            } */


            echo json_encode($returnValues);
        }
        elseif($phpRequest=='php')
        {            
           
            $result = $queryRoomResult = $this->room_model->update_records($roomIDphp, $editedDataphp);  // update database

            
            if ($result==1)     // if update database
            { 
                $returnValues['status'] = 'success';
                $returnValues['msg']    = 'Data base updated';
            }
            
            else                // not update database
            {
                $returnValues['status'] = "error";
                $returnValues['msg']    = "Data base not updated";
            }

            return $returnValues;
        }     
        
    }

    public function getAllGymDetailsViewModal()
    {
        $returnValues = array();

        if((isset($_POST['gymId']))) 
        {
            
            $this->load->model('gym_model');

            $gymAllDetails = $this->gym_model->getGymTypeValuesPreview($_POST['gymId']);
                
            if (!empty($gymAllDetails))
            {

                $returnValues['gymAllDetails'] = $gymAllDetails;
                $returnValues['status'] = 'success';
                $returnValues['msg'] = 'Gym details return';
            }
            else
            {
                $returnValues['status'] = 'error';
                $returnValues['msg'] = 'Not existing Gym';
            }            
            
        }
        else
        {
            $returnValues['status'] = 'error';
            $returnValues['msg'] = 'data not send';         
        }

        echo json_encode($returnValues);

    } 

    public function saveGymEditedDetails($phpRequest=null,$gymIDphp=null,$editedDataphp=null)
    {
        $returnValues = array();

        $this->load->model('gym_model');
        
        if((isset($_POST['editedGymDetails'])) &&($_POST['submitMode']=='ajax')) // check is this ajax caller
        {     
            $checkExistingDate =$this->gym_model->checkExistingDate($_POST['gymId'],$_POST['editedGymDetails']['gym_name'],$_POST['gym_hotel']); 
        
            if ($checkExistingDate ==0) {
            
                $result = $queryGymResult = $this->gym_model->update_records($_POST['gymId'], $_POST['editedGymDetails']); // update database
              
                if (!empty($result))    // if update database
                {   
                    $returnValues['status'] = 'success';
                    $returnValues['msg']    = 'Data base updated';
                }
                
                else                   // not update database
                {
                    $returnValues['status'] = "error";
                    $returnValues['msg']    = "Data base not updated";
                }
            }
            else
            {
                $returnValues['status'] = "error";
                $returnValues['msg']    = "Gym already exists in this hotel";

            } 

            echo json_encode($returnValues);
        }

        elseif($phpRequest=='php')
        {            
           
            $result = $queryGymResult = $this->gym_model->update_records($gymIDphp, $editedDataphp);  // update database

            
            if ($result==1)     // if update database
            { 
                $returnValues['status'] = 'success';
                $returnValues['msg']    = 'Data base updated';
            }
            
            else                // not update database
            {
                $returnValues['status'] = "error";
                $returnValues['msg']    = "Data base not updated";
            }

            return $returnValues;
        }     
        
    }

    public function getHotelSpecificRooms()
    {
          $returnValues = array();

         if((isset($_POST['hotel_id'])) && ($_POST['submitMode'] == 'ajax')) // check is this ajax caller
         {
             $hotelID          = $_POST['hotel_id'];
             $this->load->model('room_model');
             $roomdetails      = $this->room_model->getRoomDetails($hotelID);

             if(sizeof($roomdetails)>0)
             {
                  $returnValues['roomdetails'] = $roomdetails;
                  $returnValues['status']      = 'success';
                  $returnValues['msg']         = 'Room details return';
             }else
             {
                  $returnValues['status']        = 'error';
                  $returnValues['msg']           = 'Not existing Rooms';
             } 

             echo json_encode($returnValues);
         }

    }


    //function to get all Vehicles facility details
    public function getAllVehiclesFacilityDetails()
    {
        $this->load->model('vehicles_facility_model');   

        if($this->getUserType() == '1')
        {
            $allVehiclesFacilityDetails = $this->vehicles_facility_model->select('vehicle');

            if(null != $allVehiclesFacilityDetails && $allVehiclesFacilityDetails != "")
            {
                return $allVehiclesFacilityDetails;

            }    
        }
        else
        {

            $userId = $this->getUserId();

            $allVehiclesFacilityDetails = $this->vehicles_facility_model->getUserVehicleServices($userId);

            if(null != $allVehiclesFacilityDetails && $allVehiclesFacilityDetails != "")
            {
                return $allVehiclesFacilityDetails;

            }           //if(null != $allVehiclesFacilityDetails && $allVehiclesFacilityDetails != "")

        }

    }           //public function getAllVehiclesFacilityDetails()
 

     //function to get all vehicle service details
    public function getAllVehicleServiceDetails() 
    {
        
        $this->load->model('vehicle_service_model'); 

        if($this->getUserType() == '1')
        {
            $allVehicleServiceDetails = $this->vehicle_service_model->select('vehicle_service');

            if(null != $allVehicleServiceDetails && $allVehicleServiceDetails != "")
            {
                return $allVehicleServiceDetails;

            }    
        }
        else
        {

            $userId = $this->getUserId();

            // $allVehicleServiceDetails = $this->vehicle_service_model->getuserVehicleServices($userId);
            $allVehicleServiceDetails = $this->vehicle_service_model->select('vehicle_service');

            if(null != $allVehicleServiceDetails && $allVehicleServiceDetails != "")
            {
                return $allVehicleServiceDetails;

            }           //if(null != $allVehicleServiceDetails && $allVehicleServiceDetails != "")

        }

    }        //public function getallVehicleServiceDetails()




    public function getAllVehiclesFacilityDetailsViewModal()
    {
        $returnValues = array();

        if((isset($_POST['vehiclesfacilityId']))) 
        {
            
            $this->load->model('Vehicles_facility_Model');

            $vehiclesfacilityAllDetails = $this->Vehicles_facility_Model->getVehiclesFacilityTypeValuesPreview(array('vehicle_id' => $_POST['vehiclesfacilityId']));
                
            if (!empty($vehiclesfacilityAllDetails))
            {
                $this->load->model('vehicle_service_model');   
                $allVehicleServiceDetails = $this->vehicle_service_model->select('vehicle_service');

                $returnValues['vehicleServiceDetails']      = $allVehicleServiceDetails;
                $returnValues['vehiclesfacilityAllDetails'] = $vehiclesfacilityAllDetails->row();
                $returnValues['status'] = 'success';
                $returnValues['msg'] = 'Vehicles Facility details return';
            }
            else
            {
                $returnValues['status'] = 'error';
                $returnValues['msg'] = 'Not existing Vehicles Facility';
            }            
            
        }
        else
        {
            $returnValues['status'] = 'error';
            $returnValues['msg'] = 'data not send';         
        }

        echo json_encode($returnValues);

    } 

    public function saveVehicleFacilityEditedDetails($phpRequest=null,$vehiclefacilityIDphp=null,$editedDataphp=null)
    {
        $returnValues = array();

        $this->load->model('vehicles_facility_model');
        
        if((isset($_POST['editedVehicleFacilityDetails'])) &&($_POST['submitMode']=='ajax')) // check is this ajax caller
        {     
            
            $result = $queryVehicleFacilityResult = $this->vehicles_facility_model->update_records($_POST['vehiclefacilityId'], $_POST['editedVehicleFacilityDetails']); // update database

            
            if (!empty($result))    // if update database
            {   
                $returnValues['status'] = 'success';
                $returnValues['msg']    = 'Data base updated';
            }
            else                   // not update database
            {
                $returnValues['status'] = "error";
                $returnValues['msg']    = "Data base not updated";
            }

            echo json_encode($returnValues);
        }

        elseif($phpRequest=='php')
        {            
           
            $result = $queryVehicleFacilityResult = $this->vehicles_facility_model->update_records($vehiclefacilityIDphp, $editedDataphp);  // update database

            if ($result==1)     // if update database
            { 
                $returnValues['status'] = 'success';
                $returnValues['msg']    = 'Data base updated';
            }
            
            else                // not update database
            {
                $returnValues['status'] = "error";
                $returnValues['msg']    = "Data base not updated";
            }

            return $returnValues;
        }     
        
    }
	
	//get all vehicle service details modal
    public function getAllVehicleServiceDetailsViewModal()
    {
        $returnValues = array();

        if((isset($_POST['vehicleServiceId']))) 
        {
            
            $this->load->model('vehicle_service_model');

            $vehicleServiceAllDetails = $this->vehicle_service_model->getVehicleServiceTypeValuesPreview(array('vc_id' => $_POST['vehicleServiceId']));
                
            if (!empty($vehicleServiceAllDetails))
            {

                $returnValues['vehicleServiceAllDetails'] = $vehicleServiceAllDetails->row();
                $returnValues['status']                   = 'success';
                $returnValues['msg']                      = 'Vehicle service details return';
            }
            else
            {
                $returnValues['status'] = 'error';
                $returnValues['msg']    = 'Not existing Vehicle service';
            }            
            
        }
        else
        {
            $returnValues['status'] = 'error';
            $returnValues['msg']    = 'data not send';         
        }

        echo json_encode($returnValues);

    } 

    //save vehicle service edit details
    public function saveVehicleServiceEditedDetails($phpRequest=null,$vehicleServiceIDphp=null,$editedDataphp=null)
    {
        $returnValues = array();

        $this->load->model('vehicle_service_model');
        
        if((isset($_POST['editedVehicleServiceDetails'])) &&($_POST['submitMode']=='ajax')) // check is this ajax caller
        {     
            
            $result = $queryVehicleService = $this->vehicle_service_model->update_records($_POST['vehicleServiceId'], $_POST['editedVehicleServiceDetails']); // update database

            
            if (!empty($result))    // if update database
            {   
                $returnValues['status'] = 'success';
                $returnValues['msg']    = 'Data base updated';
            }
            
            else                   // not update database
            {
                $returnValues['status'] = "error";
                $returnValues['msg']    = "Data base not updated";
            }

            echo json_encode($returnValues);
        }

        elseif($phpRequest=='php')
        {            
           
            $result = $this->vehicle_service_model->update_records($vehicleServiceIDphp, $editedDataphp);  // update database

            
            if ($result==1)     // if update database
            { 
                $returnValues['status'] = 'success';
                $returnValues['msg']    = 'Data base updated';
            }
            
            else                // not update database
            {
                $returnValues['status'] = "error";
                $returnValues['msg']    = "Data base not updated";
            }

            return $returnValues;
        }     
    }

	 public function getAllRoomRateDetailsViewModal()
    {
        $returnValues = array();

        if((isset($_POST['roomrateId']))) 
        {
            
            $this->load->model('room_rate_model');
            $this->load->model('room_rate_periods_model');
            $this->load->model('room_category_model');

            $roomrateAllDetails = $this->room_rate_model->getRoomRateTypeValuesPreview(array('ro_rate_id' => $_POST['roomrateId']));
                
            if (!empty($roomrateAllDetails))
            {
                $roomTypeDetails        = $this->room_category_model->select('room_category');
                $roomRatePeriodsDetails = $this->room_rate_periods_model->select('room_rate_periods');

                $returnValues['roomrateAllDetails']     = $roomrateAllDetails->row();
                $returnValues['roomCategoryDetails']    = $roomTypeDetails;
                $returnValues['roomCurrencyDetails']    = $this->getAllCurrency();
                $returnValues['roomRatePeriodsDetails'] = $roomRatePeriodsDetails;
                $returnValues['status']                 = 'success';
                $returnValues['msg']                    = 'Room rate details return';
            }
            else
            {
                $returnValues['status'] = 'error';
                $returnValues['msg']    = 'Not existing Room rate';
            }            
            
        }
        else
        {
            $returnValues['status'] = 'error';
            $returnValues['msg']    = 'data not send';         
        }

        echo json_encode($returnValues);

    } 
	
	public function saveRoomRateEditedDetails($phpRequest=null,$roomrateIDphp=null,$editedDataphp=null)
    {
        $returnValues = array();

        $this->load->model('room_rate_model');
        
        if((isset($_POST['editedroomrateDetails'])) &&($_POST['submitMode']=='ajax')) // check is this ajax caller
        {   
            $result = $queryRoomRateResult = $this->room_rate_model->update_records($_POST['roomrateId'], $_POST['editedroomrateDetails']); // update database

            if (!empty($result))    // if update database
            {   
                $returnValues['status'] = 'success';
                $returnValues['msg']    = 'Data base updated';
            }
            
            else                   // not update database
            {
                $returnValues['status'] = "error";
                $returnValues['msg']    = "Data base not updated";
            }

            echo json_encode($returnValues);
        }
        elseif($phpRequest=='php')
        {  
            $result = $queryRoomRateResult = $this->room_rate_model->update_records($roomrateIDphp, $editedDataphp);  // update database

            
            if ($result==1)     // if update database
            { 
                $returnValues['status'] = 'success';
                $returnValues['msg']    = 'Data base updated';
            }
            
            else                // not update database
            {
                $returnValues['status'] = "error";
                $returnValues['msg']    = "Data base not updated";
            }

            return $returnValues;
        }     
        
    }

    public function saveRoomRatePeriodEditedDetails($phpRequest=null,$poolIDphp=null,$editedDataphp=null)
    {
        $returnValues = array();

        $this->load->model('room_rate_periods_model');
        
        if((isset($_POST['editedRoomRatePeriodDetails'])) &&($_POST['submitMode']=='ajax')) // check is this ajax caller
        {     
            
            $result = $queryPoolResult = $this->room_rate_periods_model->update_records($_POST['ro_rate_periods_id'], $_POST['editedRoomRatePeriodDetails']); // update database

            
            if (!empty($result))    // if update database
            {   
                $returnValues['status'] = 'success';
                $returnValues['msg']    = 'Data base updated';
            }
            
            else                   // not update database
            {
                $returnValues['status'] = "error";
                $returnValues['msg']    = "Data base not updated";
            }

            echo json_encode($returnValues);
        }

        elseif($phpRequest=='php')
        {            
           
            $result = $queryPoolResult = $this->room_rate_periods_model->update_records($poolIDphp, $editedDataphp);  // update database

            
            if ($result==1)     // if update database
            { 
                $returnValues['status'] = 'success';
                $returnValues['msg']    = 'Data base updated';
            }
            
            else                // not update database
            {
                $returnValues['status'] = "error";
                $returnValues['msg']    = "Data base not updated";
            }

            return $returnValues;
        }     
        
    }

	 function addImagesToHotelFrontView()
    {
        $this->load->model('gallery_images');
        $this->load->model('hotel_model');

        $hotel_id     = $_POST['hotel_id'];
        $image_names  = explode(",", $_POST['image_names']);
        $formData     = array();
        $returnValues = array();
        
        $hotel_name = $this->hotel_model->get_hotel_name_for_id($hotel_id);

        $hotel_chain_names = $this->getAllHotelChains(); 

        /*print_r($hotel_name[0]['ho_chain_id']);
        exit();*/

        foreach ($_FILES["file"]["error"] as $key => $error)/*ijfrg8eghouwerhgfuwerhfgiu9wehrf4pfyhe4[8gvv*//*ldmvokjehjnogvberjpgerpgvb*/
        {
            if ($error == UPLOAD_ERR_OK)
            {
                $time       = time();  // time on creation
                $random_num = rand(00,99);  // random number
                $imageName       = $time.$random_num.$_FILES["file"]["name"][$key]; // avoid same file name collision

                $size       = $_FILES["file"]["size"][$key]; // get file size
                // print_r($image_names);
                // echo $_FILES["file"]["name"][$key];
                for ($index = 0; $index < (sizeof($image_names)); $index++)
                {
                    if ($_FILES["file"]["name"][$key] == $image_names[$index])
                    {                    
                        for($chainIndex=0;$chainIndex<(sizeof($hotel_chain_names));$chainIndex++)
                        {
                            if($hotel_chain_names[$chainIndex]['ho_chain_id'] == $hotel_name[0]['ho_chain_id'])
                            {                                        
                                $hotel_chain = $hotel_chain_names[$chainIndex]['ho_chain_name'];
                            }
                        }

                        $hotelName = $hotel_name[0]['hotel_name'];

                        if (!file_exists('./uploads/hotelImages/'.$hotel_chain))         //if the ditecroty exists with hotel chain name?
                        {
                            $path = "./uploads/hotelImages/".$hotel_chain."/".$hotel_name[0]['hotel_name']."/";
                            
                            $folderName = './uploads/hotelImages/'.$hotel_chain;
                            mkdir($folderName, 0777, true);

                            if (!file_exists('./uploads/hotelImages/'.$hotel_chain.'/'.$hotelName))
                            {
                                $folderName = './uploads/hotelImages/'.$hotel_chain.'/'.$hotelName;
                                mkdir($folderName, 0777, true);

                                switch(strtolower($_FILES["file"]['type'][$key]))
                                {
                                    case 'image/jpeg':
                                            $image = imagecreatefromjpeg($_FILES["file"]['tmp_name'][$key]);
                                            move_uploaded_file($_FILES["file"]["tmp_name"][$key],$path.$imageName);
                                            break;
                                    case 'image/png':
                                            $image = imagecreatefrompng($_FILES["file"]['tmp_name'][$key]);
                                            move_uploaded_file($_FILES["file"]["tmp_name"][$key],$path.$imageName);
                                            break;
                                    case 'image/gif':
                                            $image = imagecreatefromgif($_FILES["file"]['tmp_name'][$key]);
                                            move_uploaded_file($_FILES["file"]["tmp_name"][$key],$path.$imageName);
                                            break;
                                    default:
                                           print('This file type is not allowed');
                                           return false;
                                }

                                @unlink($_FILES["file"]['tmp_name'][$key]);
                                $old_width      = imagesx($image);
                                $old_height     = imagesy($image);

                                if ($old_width > 500 || $old_height > 550) // check the what is the 
                                {
                                    $returnValues['status'] = 'error';
                                    $returnValues['msg']    = 'Please consider about minimum image size is 500 x 550 pixels.!';
                                }
                                else
                                {
                                    $max_width  = 500;
                                    $max_height = 550;
                                    $scale          = min($max_width/$old_width, $max_height/$old_height);

                                    if ($old_width > 500 || $old_height > 550)
                                    {
                                        $new_width      = $max_width ;
                                        $new_height     = $max_height ;
                                    } 
                                    else
                                    {
                                        $new_width  = $old_width;
                                        $new_height = $old_height;
                                    }

                                    $new = imagecreatetruecolor($new_width, $new_height);
                                    imagecopyresampled($new, $image,0, 0, 0, 0,$new_width, $new_height, $old_width, $old_height);
                                    switch(strtolower($_FILES["file"]['type'][$key]))
                                    {
                                        case 'image/jpeg':
                                                imagejpeg($new, $path.'fv_'.$imageName, 90);
                                                break;
                                        case 'image/png':
                                                imagealphablending($new, false);
                                                imagecopyresampled($new, $image,0, 0, 0, 0,$new_width, $new_height, $old_width, $old_height);
                                                imagesavealpha($new, true); 
                                                imagepng($new, $path.'fv_'.$imageName, 0);
                                                break;
                                        case 'image/gif':
                                                imagegif($new, $path.'fv_'.$imageName);
                                                break;
                                        default:
                                    }
                                    // }

                                    imagedestroy($image);
                                    imagedestroy($new);

                                    $formData['image_name']   = 'fv_'.$imageName;                    
                                    $formData['image_size']   = $size;                    
                                    $formData['image_path']   = "uploads/hotelImages/".$hotel_chain."/".$hotel_name[0]['hotel_name']."/";
                                    $formData['created_time'] = $time;
                                    $formData['hotel_id']     = $hotel_id;

                                    $insert_result = $this->gallery_images->insert('gallery_images', $formData);                    
                                    
                                    $returnValues['status']    = 'success';
                                    $returnValues['msg']       = 'Image successfully uploaded';
                                    $returnValues['hotel_id']  = $hotel_id;
                                }
                            }
                            else
                            {
                                switch(strtolower($_FILES["file"]['type'][$key]))
                                {
                                    case 'image/jpeg':
                                            $image = imagecreatefromjpeg($_FILES["file"]['tmp_name'][$key]);
                                            move_uploaded_file($_FILES["file"]["tmp_name"][$key],$path.$imageName);
                                            break;
                                    case 'image/png':
                                            $image = imagecreatefrompng($_FILES["file"]['tmp_name'][$key]);
                                            move_uploaded_file($_FILES["file"]["tmp_name"][$key],$path.$imageName);
                                            break;
                                    case 'image/gif':
                                            $image = imagecreatefromgif($_FILES["file"]['tmp_name'][$key]);
                                            move_uploaded_file($_FILES["file"]["tmp_name"][$key],$path.$imageName);
                                            break;
                                    default:
                                           print('This file type is not allowed');
                                           return false;
                                }

                                @unlink($_FILES["file"]['tmp_name'][$key]);
                                $old_width      = imagesx($image);
                                $old_height     = imagesy($image);

                                if ($old_width > 500 || $old_height > 550) // check the what is the 
                                {
                                    $returnValues['status'] = 'error';
                                    $returnValues['msg']    = 'Please consider about minimum image size is 500 x 550 pixels.!';
                                }
                                else
                                {
                                    $max_width  = 500;
                                    $max_height = 550;
                                    $scale          = min($max_width/$old_width, $max_height/$old_height);

                                    if ($old_width > 500 || $old_height > 550)
                                    {
                                        $new_width      = $max_width ;
                                        $new_height     = $max_height ;
                                    } 
                                    else
                                    {
                                        $new_width  = $old_width;
                                        $new_height = $old_height;
                                    }

                                    $new = imagecreatetruecolor($new_width, $new_height);
                                    imagecopyresampled($new, $image,0, 0, 0, 0,$new_width, $new_height, $old_width, $old_height);
                                    switch(strtolower($_FILES["file"]['type'][$key]))
                                    {
                                        case 'image/jpeg':
                                                imagejpeg($new, $path.'fv_'.$imageName, 90);
                                                break;
                                        case 'image/png':
                                                imagealphablending($new, false);
                                                imagecopyresampled($new, $image,0, 0, 0, 0,$new_width, $new_height, $old_width, $old_height);
                                                imagesavealpha($new, true); 
                                                imagepng($new, $path.'fv_'.$imageName, 0);
                                                break;
                                        case 'image/gif':
                                                imagegif($new, $path.'fv_'.$imageName);
                                                break;
                                        default:
                                    }
                                    // }

                                    imagedestroy($image);
                                    imagedestroy($new);

                                    $formData['image_name']   = 'fv_'.$imageName;                    
                                    $formData['image_size']   = $size;                    
                                    $formData['image_path']   = "uploads/hotelImages/".$hotel_chain."/".$hotel_name[0]['hotel_name']."/";
                                    $formData['created_time'] = $time;
                                    $formData['hotel_id']     = $hotel_id;

                                    $insert_result = $this->gallery_images->insert('gallery_images', $formData);                    
                                    
                                    $returnValues['status']    = 'success';
                                    $returnValues['msg']       = 'Image successfully uploaded';
                                    $returnValues['hotel_id']  = $hotel_id;
                                }
                            }
                            
                        }
                        else
                        {
                            $path = "./uploads/hotelImages/".$hotel_chain."/".$hotel_name[0]['hotel_name']."/";

                            if (!file_exists('./uploads/hotelImages/'.$hotel_chain.'/'.$hotelName))
                            {
                                $folderName = './uploads/hotelImages/'.$hotel_chain.'/'.$hotelName;
                                mkdir($folderName, 0777, true);

                                switch(strtolower($_FILES["file"]['type'][$key]))
                                {
                                    case 'image/jpeg':
                                            $image = imagecreatefromjpeg($_FILES["file"]['tmp_name'][$key]);
                                            move_uploaded_file($_FILES["file"]["tmp_name"][$key],$path.$imageName);
                                            break;
                                    case 'image/png':
                                            $image = imagecreatefrompng($_FILES["file"]['tmp_name'][$key]);
                                            move_uploaded_file($_FILES["file"]["tmp_name"][$key],$path.$imageName);
                                            break;
                                    case 'image/gif':
                                            $image = imagecreatefromgif($_FILES["file"]['tmp_name'][$key]);
                                            move_uploaded_file($_FILES["file"]["tmp_name"][$key],$path.$imageName);
                                            break;
                                    default:
                                           print('This file type is not allowed');
                                           return false;
                                }

                                @unlink($_FILES["file"]['tmp_name'][$key]);
                                $old_width      = imagesx($image);
                                $old_height     = imagesy($image);

                                if ($old_width > 500 || $old_height > 550) // check the what is the 
                                {
                                    $returnValues['status'] = 'error';
                                    $returnValues['msg']    = 'Please consider about minimum image size is 500 x 550 pixels.!';
                                }
                                else
                                {
                                    $max_width  = 500;
                                    $max_height = 550;
                                    $scale          = min($max_width/$old_width, $max_height/$old_height);

                                    if ($old_width > 500 || $old_height > 550)
                                    {
                                        $new_width      = $max_width ;
                                        $new_height     = $max_height ;
                                    } 
                                    else
                                    {
                                        $new_width  = $old_width;
                                        $new_height = $old_height;
                                    }

                                    $new = imagecreatetruecolor($new_width, $new_height);
                                    imagecopyresampled($new, $image,0, 0, 0, 0,$new_width, $new_height, $old_width, $old_height);
                                    switch(strtolower($_FILES["file"]['type'][$key]))
                                    {
                                        case 'image/jpeg':
                                                imagejpeg($new, $path.'fv_'.$imageName, 90);
                                                break;
                                        case 'image/png':
                                                imagealphablending($new, false);
                                                imagecopyresampled($new, $image,0, 0, 0, 0,$new_width, $new_height, $old_width, $old_height);
                                                imagesavealpha($new, true); 
                                                imagepng($new, $path.'fv_'.$imageName, 0);
                                                break;
                                        case 'image/gif':
                                                imagegif($new, $path.'fv_'.$imageName);
                                                break;
                                        default:
                                    }
                                    // }

                                    imagedestroy($image);
                                    imagedestroy($new);

                                    $formData['image_name']   = 'fv_'.$imageName;                    
                                    $formData['image_size']   = $size;                    
                                    $formData['image_path']   = "uploads/hotelImages/".$hotel_chain."/".$hotel_name[0]['hotel_name']."/";
                                    $formData['created_time'] = $time;
                                    $formData['hotel_id']     = $hotel_id;

                                    $insert_result = $this->gallery_images->insert('gallery_images', $formData);                    
                                    
                                    $returnValues['status']    = 'success';
                                    $returnValues['msg']       = 'Image successfully uploaded';
                                    $returnValues['hotel_id']  = $hotel_id;
                                }
                            }
                            else
                            {
                                switch(strtolower($_FILES["file"]['type'][$key]))
                                {
                                    case 'image/jpeg':
                                            $image = imagecreatefromjpeg($_FILES["file"]['tmp_name'][$key]);
                                            move_uploaded_file($_FILES["file"]["tmp_name"][$key],$path.$imageName);
                                            break;
                                    case 'image/png':
                                            $image = imagecreatefrompng($_FILES["file"]['tmp_name'][$key]);
                                            move_uploaded_file($_FILES["file"]["tmp_name"][$key],$path.$imageName);
                                            break;
                                    case 'image/gif':
                                            $image = imagecreatefromgif($_FILES["file"]['tmp_name'][$key]);
                                            move_uploaded_file($_FILES["file"]["tmp_name"][$key],$path.$imageName);
                                            break;
                                    default:
                                           print('This file type is not allowed');
                                           return false;
                                }

                                @unlink($_FILES["file"]['tmp_name'][$key]);
                                $old_width      = imagesx($image);
                                $old_height     = imagesy($image);

                                if ($old_width > 500 || $old_height > 550) // check the what is the 
                                {
                                    $returnValues['status'] = 'error';
                                    $returnValues['msg']    = 'Please consider about minimum image size is 500 x 550 pixels.!';
                                }
                                else
                                {
                                    $max_width  = 500;
                                    $max_height = 550;
                                    $scale          = min($max_width/$old_width, $max_height/$old_height);

                                    if ($old_width > 500 || $old_height > 550)
                                    {
                                        $new_width      = $max_width ;
                                        $new_height     = $max_height ;
                                    } 
                                    else
                                    {
                                        $new_width  = $old_width;
                                        $new_height = $old_height;
                                    }

                                    $new = imagecreatetruecolor($new_width, $new_height);
                                    imagecopyresampled($new, $image,0, 0, 0, 0,$new_width, $new_height, $old_width, $old_height);
                                    switch(strtolower($_FILES["file"]['type'][$key]))
                                    {
                                        case 'image/jpeg':
                                                imagejpeg($new, $path.'fv_'.$imageName, 90);
                                                break;
                                        case 'image/png':
                                                imagealphablending($new, false);
                                                imagecopyresampled($new, $image,0, 0, 0, 0,$new_width, $new_height, $old_width, $old_height);
                                                imagesavealpha($new, true); 
                                                imagepng($new, $path.'fv_'.$imageName, 0);
                                                break;
                                        case 'image/gif':
                                                imagegif($new, $path.'fv_'.$imageName);
                                                break;
                                        default:
                                    }
                                    // }

                                    imagedestroy($image);
                                    imagedestroy($new);

                                    $formData['image_name']   = 'fv_'.$imageName;                    
                                    $formData['image_size']   = $size;                    
                                    $formData['image_path']   = "uploads/hotelImages/".$hotel_chain."/".$hotel_name[0]['hotel_name']."/";
                                    $formData['created_time'] = $time;
                                    $formData['hotel_id']     = $hotel_id;

                                    $insert_result = $this->gallery_images->insert('gallery_images', $formData);                    
                                    
                                    $returnValues['status']    = 'success';
                                    $returnValues['msg']       = 'Image successfully uploaded';
                                    $returnValues['hotel_id']  = $hotel_id;
                                }
                            }
                        }

                    }
                }
            }   
        }

        echo json_encode($returnValues);
        
    }

    //function to get the available hotels for the current user
    public function getAllHotelsForFeatured()
    {
        $this->load->model('hotel_model');

        $allHotels = $this->hotel_model->getAllHotelsForFeatured();

        if (null != $allHotels && $allHotels != "")
        {

            return $allHotels; 
            
        }           //if(null != $allHotels && $allHotels != "")  

    } 
    
    public function getAllHotelsTestimonials()
    {
        $this->load->model('hotel_model');

        $allTestimonials = $this->hotel_model->getAllHotelsTestimonials();

        if (null != $allTestimonials && $allTestimonials != "")
        {

            return $allTestimonials; 
            
        }

    }           //public function getAllCurrencyDetails() 
    
    public function getAllCurrencyDetails()
    {
        $this->load->model('currency_model');

        $allTestimonials = $this->currency_model->getAllCurrencyDetails();

        if (null != $allTestimonials && $allTestimonials != "")
        {

            return $allTestimonials; 
        }
    }           //public function getAllCurrencyDetails()  

    public function getAllCurrencyDetailsViewModal()
    {
        $returnValues = array();

        if((isset($_POST['currency_id']))) 
        {
            
            $this->load->model('currency_model');

            $currencyAllDetails = $this->currency_model->getAllCurrencyDetailsViewModal(array('currency_id' => $_POST['currency_id']));
                
            if (!empty($currencyAllDetails))
            {

                $returnValues['currencyAllDetails'] = $currencyAllDetails->row();
                $returnValues['status'] = 'success';
                $returnValues['msg'] = 'Currency details return';
            }
            else
            {
                $returnValues['status'] = 'error';
                $returnValues['msg'] = 'Not existing Currency';
            }            
            
        }
        else
        {
            $returnValues['status'] = 'error';
            $returnValues['msg'] = 'data not send';         
        }

        echo json_encode($returnValues);
    }
    
    public function getAllCountryDetails()
    {
        $this->load->model('refCountry_model');

        $allTestimonials = $this->refCountry_model->getAllCountryDetails();

        if (null != $allTestimonials && $allTestimonials != "")
        {

            return $allTestimonials; 
        }
    }           //public function getAllvehicleDriverDetails()
    
    public function getAllvehicleDriverDetails()
    {
        $this->load->model('driver_model');

        $allDriverDetails = $this->driver_model->getAllvehicleDriverDetails();

        if (null != $allDriverDetails && $allDriverDetails != "")
        {

            return $allDriverDetails; 
        }
    }           //public function getAllvehicleDriverDetails()

    public function getAllCountryDetailsViewModal()
    {
        $returnValues = array();

        if((isset($_POST['ref_country_code']))) 
        {
            
            $this->load->model('refCountry_model');

            $countryAllDetails = $this->refCountry_model->getAllCountryDetailsViewModal(array('ref_country_code' => $_POST['ref_country_code']));
                
            if (!empty($countryAllDetails))
            {

                $returnValues['countryAllDetails']  = $countryAllDetails;
                $returnValues['status']             = 'success';
                $returnValues['msg']                = 'Country details return';
            }
            else
            {
                $returnValues['status'] = 'error';
                $returnValues['msg']    = 'Not existing Country';
            }            
            
        }
        else
        {
            $returnValues['status'] = 'error';
            $returnValues['msg']    = 'data not send';         
        }

        echo json_encode($returnValues);
    }

    public function getMessageDetailsViewModal()
    {
        $returnValues = array();

        if((isset($_POST['messages_id']))) 
        {
            
            $this->load->model('messages_model');

            $messageData = $this->messages_model->getMessageDetailsViewModal($_POST['messages_id'])->row();
                
            if (!empty($messageData))
            {

                $returnValues['messageData']        = $messageData;
                $returnValues['status']             = 'success';
                $returnValues['msg']                = 'Message details return';
            }
            else
            {
                $returnValues['status'] = 'error';
                $returnValues['msg']    = 'Not existing Message';
            }            
            
        }
        else
        {
            $returnValues['status'] = 'error';
            $returnValues['msg']    = 'data not send';         
        }

        echo json_encode($returnValues);
    }

    public function getAllMessgesDetails()
    {

        $this->load->model('messages_model');

        $messageAllDetails = $this->messages_model->getAllMessgesDetails();
            
        if (null != $messageAllDetails && $messageAllDetails != "")
        {
            return $messageAllDetails; 
        }        

    }


    public function saveCurrencyEditedDetails($phpRequest=null,$currencyIDphp=null,$editedDataphp=null)
    {
        $returnValues = array();

        $this->load->model('currency_model');
        
        if((isset($_POST['editedCurrencyDetails'])) &&($_POST['submitMode']=='ajax')) // check is this ajax caller
        {     
            
            $result = $queryCurrencyResult = $this->currency_model->update_records($_POST['currency_id'], $_POST['editedCurrencyDetails']); // update database

            
            if (!empty($result))    // if update database
            {   
                $returnValues['status'] = 'success';
                $returnValues['msg']    = 'Data base updated';
            }
            
            else                   // not update database
            {
                $returnValues['status'] = "error";
                $returnValues['msg']    = "Data base not updated";
            }

            echo json_encode($returnValues);
        }

        elseif($phpRequest=='php')
        {            
           
            $result = $queryCurrencyResult = $this->currency_model->update_records($currencyIDphp, $editedDataphp);  // update database

            
            if ($result==1)     // if update database
            { 
                $returnValues['status'] = 'success';
                $returnValues['msg']    = 'Data base updated';
            }
            
            else                // not update database
            {
                $returnValues['status'] = "error";
                $returnValues['msg']    = "Data base not updated";
            }

            return $returnValues;
        }     
        
    }

    public function saveCountryEditedDetails($phpRequest=null,$countryIDphp=null,$editedDataphp=null)
    {
        $returnValues = array();

        $this->load->model('refCountry_model');
        
        if((isset($_POST['editedCountryDetails'])) &&($_POST['submitMode']=='ajax')) // check is this ajax caller
        {     
            
            $result = $queryCurrencyResult = $this->refCountry_model->update_records($_POST['ref_country_code'], $_POST['editedCountryDetails']); // update database

            
            if (!empty($result))    // if update database
            {   
                $returnValues['status'] = 'success';
                $returnValues['msg']    = 'Data base updated';
            }
            
            else                   // not update database
            {
                $returnValues['status'] = "error";
                $returnValues['msg']    = "Data base not updated";
            }

            echo json_encode($returnValues);
        }

        elseif($phpRequest=='php')
        {            
           
            $result = $queryCurrencyResult = $this->refCountry_model->update_records($countryIDphp, $editedDataphp);  // update database

            
            if ($result==1)     // if update database
            { 
                $returnValues['status'] = 'success';
                $returnValues['msg']    = 'Data base updated';
            }
            
            else                // not update database
            {
                $returnValues['status'] = "error";
                $returnValues['msg']    = "Data base not updated";
            }

            return $returnValues;
        }     
        
    }
	
	//function to get all banners details
    public function getAllBannersDetails()
    {
        $this->load->model('banners_model');   

        $allBannersDetails = $this->banners_model->select('banner');

        if(null != $allBannersDetails && $allBannersDetails != "")
        {
            return $allBannersDetails;

        }    
    }  

    //modal banner settings preview
    public function getAllBannersDetailsViewModal()
    {
        $returnValues = array();

        if((isset($_POST['bannerId']))) 
        {
            
            $this->load->model('banners_model');

            $bannerAllDetails = $this->banners_model->getBannerTypeValuesPreview($_POST['bannerId']);
                
            if (!empty($bannerAllDetails))
            {
                $returnValues['bannerAllDetail'] = $bannerAllDetails->row();
                $returnValues['status']         = 'success';
                $returnValues['msg']            = 'Banner details return';
            }
            else
            {
                $returnValues['status'] = 'error';
                $returnValues['msg']    = 'Not existing Banner';
            }            
            
        }
        else
        {
            $returnValues['status'] = 'error';
            $returnValues['msg']    = 'data not send';         
        }

        echo json_encode($returnValues);

    } 


    //save banner settings preview details
    public function saveBannerEditedDetails()
    {
        $returnValues = array();

        $this->load->model('banners_model');
    
        if((isset($_POST['bannerId'])) && ($_POST['submitMode'] == 'ajax')) // check is this ajax caller
        {     
            if(!empty($_FILES['edit_banner_image_path']['name'])) 
            {
                $file_element_name       = 'edit_banner_image_path';

                $config['upload_path']   = './uploads/banner/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']      = 1024*1;  
                $config['file_name']     = 'MyHotel_Banner_'; 

                $this->load->library('upload', $config);
                
                if (!$this->upload->do_upload($file_element_name))
                {
                    $returnValues['status'] = 'error_file_uploading';
                    $returnValues['file_upload_error_msg'] = $this->upload->display_errors('', '');
                }
                else
                {
                    $data = $this->upload->data();

                    $editedBannerDetails['banner_name']  = $data['file_name'];
                    $editedBannerDetails['banner_path '] = $config['upload_path'];

                    $editedBannerDetails['customer_name'] = $_POST['customer_name'];                    
                    $editedBannerDetails['start_date']    = $_POST['start_date'];                    
                    $editedBannerDetails['exp_date']      = $_POST['exp_date'];                    

                    $queryBannerResult = $this->banners_model->update_records($_POST['bannerId'],$editedBannerDetails); // update database
                    
                    if ($queryBannerResult != 0)    // if update database
                    {   
                        $returnValues['status'] = 'success';
                        $returnValues['msg']    = 'Data base updated';
                    }
                    
                    else                   // not update database
                    {
                        $returnValues['status'] = "error";
                        $returnValues['msg']    = "Data base not updated";
                    }
                }
            }
            else 
            {
                $editedBannerDetails['customer_name'] = $_POST['customer_name'];                    
                $editedBannerDetails['start_date']    = $_POST['start_date'];                    
                $editedBannerDetails['exp_date']      = $_POST['exp_date'];                    

                $queryBannerResult = $this->banners_model->update_records($_POST['bannerId'],$editedBannerDetails); // update database
                
                if ($queryBannerResult != 0)    // if update database
                {   
                    $returnValues['status'] = 'success';
                    $returnValues['msg']    = 'Data base updated';
                }
                
                else                   // not update database
                {
                    $returnValues['status'] = "error";
                    $returnValues['msg']    = "Data base not updated";
                }
            }
        }        
            echo json_encode($returnValues);        
    } 

    //function to get all news details
    public function getAllNewsDetails()
    {
        $this->load->model('news_model');   

        $allNewsDetails = $this->news_model->select('news');

        if(null != $allNewsDetails && $allNewsDetails != "")
        {
            return $allNewsDetails;

        }    
    }  

    //modal news settings preview
    public function getAllNewsDetailsViewModal()
    {
        $returnValues = array();

        if((isset($_POST['newsId']))) 
        {
            
            $this->load->model('news_model');

            $newsAllDetails = $this->news_model->getNewsTypeValuesPreview($_POST['newsId']);
                
            if (!empty($newsAllDetails))
            {
                $returnValues['newsAllDetail'] = $newsAllDetails->row();
                $returnValues['status']         = 'success';
                $returnValues['msg']            = 'News details return';
            }
            else
            {
                $returnValues['status'] = 'error';
                $returnValues['msg']    = 'Not existing News';
            }            
            
        }
        else
        {
            $returnValues['status'] = 'error';
            $returnValues['msg']    = 'data not send';         
        }

        echo json_encode($returnValues);
    }

    //save news settings preview details
    public function saveNewsEditedDetails()
    {
        $returnValues = array();

        $this->load->model('news_model');
    
        if((isset($_POST['newsId'])) && ($_POST['submitMode'] == 'ajax')) // check is this ajax caller
        {     
            if(!empty($_FILES['edit_news_image_path']['name'])) 
            {
                $file_element_name       = 'edit_news_image_path';

                $config['upload_path']   = './uploads/news/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']      = 1024*1;  
                $config['file_name']     = 'MyHotel_News_'; 

                $this->load->library('upload', $config);
                
                if (!$this->upload->do_upload($file_element_name))
                {
                    $returnValues['status'] = 'error_file_uploading';
                    $returnValues['file_upload_error_msg'] = $this->upload->display_errors('', '');
                }
                else
                {
                    $data = $this->upload->data();

                    $editedNewsDetails['news_image'] = $data['file_name'];
                    $editedNewsDetails['news_path '] = $config['upload_path'];

                    $editedNewsDetails['news_title']      = $_POST['news_title'];                    
                    $editedNewsDetails['news_start_date'] = $_POST['news_start_date'];                    
                    $editedNewsDetails['news_exp_date']   = $_POST['news_exp_date'];                    

                    $queryNewsResult = $this->news_model->update_records($_POST['newsId'],$editedNewsDetails); // update database
                    
                    if ($queryNewsResult != 0)    // if update database
                    {   
                        $returnValues['status'] = 'success';
                        $returnValues['msg']    = 'Data base updated';
                    }
                    
                    else                   // not update database
                    {
                        $returnValues['status'] = "error";
                        $returnValues['msg']    = "Data base not updated";
                    }
                }
            }
            else 
            {
                $editedNewsDetails['news_title']      = $_POST['news_title'];                    
                $editedNewsDetails['news_start_date'] = $_POST['news_start_date'];                    
                $editedNewsDetails['news_exp_date']   = $_POST['news_exp_date'];                    

                $queryNewsResult = $this->news_model->update_records($_POST['newsId'],$editedNewsDetails); // update database
                
                if ($queryNewsResult != 0)    // if update database
                {   
                    $returnValues['status'] = 'success';
                    $returnValues['msg']    = 'Data base updated';
                }
                
                else                   // not update database
                {
                    $returnValues['status'] = "error";
                    $returnValues['msg']    = "Data base not updated";
                }
            }
        }        
            echo json_encode($returnValues);        
    } 


    //function to get Dashborad Numbers details
    public function getDashboradNumbers()
    {
        $this->load->model('hotel_model');  
        $userId = $this->getUserId(); 

        $Statistics = $this->hotel_model->getStatisticsToDashboard($userId);
        $Comments   = $this->hotel_model->getCommentsToDashboard($userId);
        $Bookings   = $this->hotel_model->getBookingsToDashboard($userId);
        $Messages   = $this->hotel_model->getMessagesToDashboard($userId);


        $returnValues ['Statistics']    = $Statistics;
        $returnValues ['Comments']  = $Comments;
        $returnValues ['Bookings']  = $Bookings;
        $returnValues ['Messages']  = $Messages;

        if(null != $returnValues && $returnValues != "")
        {
            return $returnValues;
        }    
    }


    /**
     * Purpose of the function          get all subscription packages details
     * @author                          
     */
    public function getAllSubscriptionPackagesDetails()
    {
        $this->load->model('subscription_package_model');

        $allSubscriptionPackagesDetails = $this->subscription_package_model->select('subscription_package');

        if(null != $allSubscriptionPackagesDetails && $allSubscriptionPackagesDetails != "")
        {
            return $allSubscriptionPackagesDetails;
        }   

    }
    /*---------------- ---------End of getAllSubscriptionPackagesDetails()---------------------------*/




    /**
     * Purpose of the function          get All Car Services details
     * @author                         
     */
    public function getAllCarServicesDetails()
    {
        $this->load->model('car_service_model');

        $allCarServicesDetails = $this->car_service_model->select('car_service');

        if(null != $allCarServicesDetails && $allCarServicesDetails != "")
        {
            return $allCarServicesDetails;
        }   

    }
    /*---------------- ---------End of getAllCarServicesDetails()---------------------------*/

 		/**
         * Purpose of the function          get all airlineServices details
         * @author                         
         */
        public function getAllairlineServicesDetails()
        {
            $this->load->model('airline_services_model');

            $allgetAllairlineServicesDetails = $this->airline_services_model->select('airline_service');

            if(null != $allgetAllairlineServicesDetails && $allgetAllairlineServicesDetails != "")
            {
                return $allgetAllairlineServicesDetails;
            }   

        }
        /*---------------- ---------End of getAllairlineServicesDetails()---------------------------*/

    /**
     * Purpose of the function          after selected country then load country related cities
     * @author                          
     */
    public function getCitySelectedCountry()
    {
         $returnValues = array();

          $this->load->model('city_model');

           // check is this ajax caller
        if((isset($_POST['submitMode'])) &&($_POST['submitMode'] == 'ajax'))
        {
            if(isset($_POST['getCity']))
            {
                $countryRelatedCities = $this->city_model->getCountryByID($_POST['getCity']);

                $countryCityDetails = array();

                if($countryRelatedCities != FALSE)
                {
                    // convert object to json object
                    foreach ($countryRelatedCities as $key=> $countryCityDetail)
                    {
                        $countryCityDetails[$key] = $countryCityDetail;
                    }
                    
                }      


                // get data from DB
                $returnValues['status']            = "success";
                $returnValues['countryCityDetails']    = $countryCityDetails;
            }
           
            echo json_encode($returnValues);

        }        
    }
    /*---------------- ---------End of getCitySelectedCountry()---------------------------*/

    /**
     * Purpose of the function          after selected hotel then load hotel related Vehicle Services
     * @author                       
     */
    public function getVehicleServices()
    {
         
        $returnValues   = array();
        // $vehicleServices= array();

        if((isset($_POST['hotelId'])) &&($_POST['requestMode']=='ajax')) // check is this ajax caller
        {
            $hotelID          = $_POST['hotelId'];
            $this->load->model('vehicle_service_model');

                $vehicleServices = $this->vehicle_service_model->getRelatedVehicleServices($hotelID);

            if(sizeof($vehicleServices)>0)
            {
                 $returnValues['vehicleServices'] = $vehicleServices;
                 $returnValues['status']      = 'success';
                 $returnValues['msg']         = 'Vehicle Service details return';
            }
            else
            {   
                
                 $returnValues['status']        = 'error';
                 $returnValues['msg']           = 'Not existing Vehicle Service';
            } 


            echo json_encode($returnValues);
        }



    }
    /**
     * Purpose of the function         get website Url Details
     * @author                         
     */
    public function getwebsitePageDetails()
    {
        $this->load->model('hotel_model');

        $allwebsiteUrlDetails = $this->hotel_model->select('hotel');

        if(null != $allwebsiteUrlDetails && $allwebsiteUrlDetails != "")
        {
            return $allwebsiteUrlDetails;
        }   

    }
    /*---------------- ---------End of getwebsitePageDetails()---------------------------*/

    /**
     * Purpose of the function          modal website url preview
     * @author                       
     */         
    public function getAllwebsiteUrlDetailsViewModal()
    {
        $returnValues = array();

        if((isset($_POST['HotelID']))) 
        {
            
            $this->load->model('hotel_model');

            $websiteAllDetails = $this->hotel_model->getwebsiteValuesPreview(array('hotel_id' => $_POST['HotelID']));
                
            if (!empty($websiteAllDetails))
            {

                $returnValues['websiteDetail'] = $websiteAllDetails->row();
                $returnValues['status'] = 'success';
                $returnValues['msg'] = 'website details return';
            }
            else
            {
                $returnValues['status'] = 'error';
                $returnValues['msg'] = 'Not existing website';
            }            
            
        }
        else
        {
            $returnValues['status'] = 'error';
            $returnValues['msg'] = 'data not send';         
        }

        echo json_encode($returnValues);

    }
    /*---------------- ---------End of getAllwebsiteUrlDetailsViewModal()---------------------------*/
        /**
     * Purpose of the function          save Website Url  details
     * @author                          
     */   
    public function saveWebsiteEditedDetails($phpRequest=null,$HotelIDphp=null,$editedDataphp=null)
    {
        $returnValues = array();

        $this->load->model('hotel_model');
        
        if((isset($_POST['editedWebsiteDetails'])) &&($_POST['submitMode']=='ajax')) // check is this ajax caller
        {     
            
            $result = $queryWebsiteResult = $this->hotel_model->update_records($_POST['HotelID'], $_POST['editedWebsiteDetails']); // update database

            
            if (!empty($result))    // if update database
            {   
                $returnValues['status'] = 'success';
                $returnValues['msg']    = 'Data base updated';
            }
            
            else                   // not update database
            {
                $returnValues['status'] = "error";
                $returnValues['msg']    = "Data base not updated";
            }

            echo json_encode($returnValues);
        }

        elseif($phpRequest=='php')
        {            
           
            $result = $queryWebsiteResult = $this->hotel_model->update_records($HotelIDphp, $editedDataphp);  // update database

            
            if ($result==1)     // if update database
            { 
                $returnValues['status'] = 'success';
                $returnValues['msg']    = 'Data base updated';
            }
            
            else                // not update database
            {
                $returnValues['status'] = "error";
                $returnValues['msg']    = "Data base not updated";
            }

            return $returnValues;
        }     
        
    }
    /*---------------- ---------End of saveWebsiteEditedDetails()---------------------------*/

            /**
     * Purpose of the function          display Hotel Currency
     * @author                          
     */   

    public function displayHotelCurrency()
    {
        $hotelCurrencyForHotel  = array();
        $this->load->model('hotel_model'); 
        if((isset($_POST['hotel_id'])) &&($_POST['submitMode']=='ajax')) // check is this ajax caller
        {  
            $hotelId     = $_POST['hotel_id'];
            $hotelCurrencyForHotel = $this->hotel_model->get_hotel_currency_for_id($hotelId);

            if(sizeof($hotelCurrencyForHotel)>0)
            {
      
                 $returnValues['hotelCurrencyForHotel'] = $hotelCurrencyForHotel;
                 $returnValues['status']      = 'success';
                 $returnValues['msg']         = 'Hotel Currency details return';
            }
            else
            {   
                
                 $returnValues['status']        = 'error';
                 $returnValues['msg']           = 'Not existing Currency';
            } 

            echo json_encode($returnValues); 

        }
    }

     /**
     * Purpose of the function          display Base Currency in outlook
     * @author                         
     */   

    public function displayBaseCurrency()
    {
        $BaseCurrency  = array();
        $this->load->model('currency_model'); 
        if($_POST['submitMode']=='ajax') // check is this ajax caller
        {  
            $BaseCurrency = $this->currency_model->get_base_currency_for_outlook();
            // echo sizeof($BaseCurrency);
            if(!empty($BaseCurrency)>0)
            {
      
                 $returnValues['BaseCurrency'] = $BaseCurrency;
                 $returnValues['status']      = 'success';
                 $returnValues['msg']         = 'Base Currency details return';
            }
            else
            {   
                
                 $returnValues['status']        = 'error';
                 $returnValues['msg']           = 'Not existing Base Currency';
            } 

            echo json_encode($returnValues); 

        }
    } 

    /**
     * Purpose of the function          update subcription pakage table for base currency  
     * @author                         
     */ 

    public function updatesubBaseCurrency()
    {
        $BaseCurrency  = array();
        $this->load->model('currency_model'); 
        $this->load->model('subscription_package_model'); 
        if($_POST['submitMode']=='ajax') // check is this ajax caller
        {  
            $BaseCurrency = $this->currency_model->get_base_currency_for_outlook(); //identufy the base currency and get his currency ID and Code

            if(!empty($BaseCurrency))
            {
                $base_currency_code = $BaseCurrency[0]['currency_code'];
                $base_currency_id = $BaseCurrency[0]['currency_id'];

                $BaseCurrencyRate = $this->currency_model->getCurrencyRateUP_USD($base_currency_code); //get the  Units_per_USD in currency rate table
                    
                    if(!empty($BaseCurrencyRate)){ 
                    
                        $UnitsPerUSD = $BaseCurrencyRate[0]['Units_per_USD'];
                        $SubPackageDetails = $this->currency_model->getSubPackageDitails($base_currency_id); //get subcription package details
                        
                        if(!empty($SubPackageDetails))
                        {
                            foreach ($SubPackageDetails as $key => $value) {

                                $monthlyFree = $value['su_package_monthly_fee'];
                                $AnnualFree = $value['su_package_annual_fee'];
                                $UsdPerUnit = $value['USD_per_Unit'];
                                $SuPackageID = $value['su_package_id'];
          

                                $updateData['su_package_monthly_fee'] = ($monthlyFree * $UsdPerUnit) * $UnitsPerUSD;
                                $updateData['su_package_annual_fee'] = ($AnnualFree * $UsdPerUnit) * $UnitsPerUSD;
                                $updateData['su_package_currency'] = $base_currency_id;
                
                                $result = $querySubscriptionPackageResult = $this->subscription_package_model->update_records($SuPackageID, $updateData); // update database
                                $returnValues['status']      = 'success';
                                $returnValues['msg']         = 'Update database';
                            }

                        }else
                        {   
                            
                             $returnValues['status']        = 'error';
                             $returnValues['msg']           = 'Not existing subcription details';
                        } 


                    }else
                    {   
                        
                         $returnValues['status']        = 'error';
                         $returnValues['msg']           = 'Not existing Units_per_USD ';
                    } 

            }
            else
            {   
                
                 $returnValues['status']        = 'error';
                 $returnValues['msg']           = 'Not existing Base Currency';
            } 

            echo json_encode($returnValues); 
   


        }
    }

    public function displayBaseCurrencyName()
    {
        $hotelCurrencyForHotel  = array();
        $this->load->model('currency_model'); 
        if((isset($_POST['basecurrencyCode'])) &&($_POST['submitMode']=='ajax')) // check is this ajax caller
        {  
            $basecurrencyCode     = $_POST['basecurrencyCode'];
            $systemCurrencyName = $this->currency_model->get_basecurrency_name($basecurrencyCode);

            if(sizeof($systemCurrencyName)>0)
            {
      
                 $returnValues['currency_name'] = $systemCurrencyName;
                 $returnValues['status']      = 'success';
                 $returnValues['msg']         = 'Currency Name Details return';
            }
            else
            {   
                
                 $returnValues['status']        = 'error';
                 $returnValues['msg']           = 'Not existing Currency';
            } 

            echo json_encode($returnValues); 

        }
    }

    public function gethotelCustomer()
    {
        # code...
        $this->load->model('hotel_model');
        $getCustomer = $this->hotel_model->gethotelCustomer();
        // var_dump($getCustomer);
        // exit();
        if (null != $getCustomer && $getCustomer != "") {

            return $getCustomer;
        }
    }

         /**
     * Purpose of the function          function to get the available faq  for the current user
     * @author                         
     */     
   

    public function getAllFaqForCurrentUser()
    {
        $this->load->model('faq_model');   

        if($this->getUserType() == '1')
        {
            $allFaqDetails = $this->faq_model->getSuperAdminFaqDetails();

            if(null != $allFaqDetails && $allFaqDetails != "")
            {
                return $allFaqDetails;
            }    
        }
        else
        {
            $userId             = $this->getUserId();
            $allFaqDetails = $this->faq_model->selectaFaqForUser($userId);

            if(null != $allFaqDetails && $allFaqDetails != "")
            {
                return $allFaqDetails;
            }         
        }
    }           
        
    /*---------------- ---------End of getAllFaqForCurrentUser()---------------------------*/

     /**
     * Purpose of the function          modal faq settings preview
     * @author                          
     */         
    public function getAllFaqDetailsViewModal()
    {
        $returnValues = array();

        if((isset($_POST['faqId']))) 
        {
            
            $this->load->model('faq_model');

            $faqAllDetails = $this->faq_model->getFaqValuesPreview(array('faq_id' => $_POST['faqId']));
                
            if (!empty($faqAllDetails))
            {

                $returnValues['faqAllDetails'] = $faqAllDetails->row();
                $returnValues['status'] = 'success';
                $returnValues['msg'] = 'faq details return';
            }
            else
            {
                $returnValues['status'] = 'error';
                $returnValues['msg'] = 'Not existing faq';
            }            
            
        }
        else
        {
            $returnValues['status'] = 'error';
            $returnValues['msg'] = 'data not send';         
        }

        echo json_encode($returnValues);

    }
    /*---------------- ---------End of getAllFaqDetailsViewModal()---------------------------*/
       /**
     * Purpose of the function          save faq settings preview details
     * @author                          
     */   
    public function saveFaqdEditedDetails($phpRequest=null,$foodIDphp=null,$editedDataphp=null)
    {
        $returnValues = array();

        $this->load->model('faq_model');
        
        if((isset($_POST['editedFaqDetails'])) &&($_POST['submitMode']=='ajax')) // check is this ajax caller
        {     
            
            $result = $queryFaqResult = $this->faq_model->update_records($_POST['faqId'], $_POST['editedFaqDetails']); // update database

            
            if (!empty($result))    // if update database
            {   
                $returnValues['status'] = 'success';
                $returnValues['msg']    = 'Data base updated';
            }
            
            else                   // not update database
            {
                $returnValues['status'] = "error";
                $returnValues['msg']    = "Data base not updated";
            }

            echo json_encode($returnValues);
        }

        elseif($phpRequest=='php')
        {            
           
            $result = $queryFaqResult = $this->food_model->update_records($foodIDphp, $editedDataphp);  // update database

            
            if ($result==1)     // if update database
            { 
                $returnValues['status'] = 'success';
                $returnValues['msg']    = 'Data base updated';
            }
            
            else                // not update database
            {
                $returnValues['status'] = "error";
                $returnValues['msg']    = "Data base not updated";
            }

            return $returnValues;
        }     
        
    }
    /*---------------- ---------End of saveFaqdEditedDetails()---------------------------*/
     /**
     * Purpose of the function          display room facilities in room rate
     * @author                          
     */   

    public function displayRoomCategory()
    {
        $roomCategory   = array();
        $this->load->model('room_model'); 

        if((isset($_POST['room_id'])) && ($_POST['submitMode'] == 'ajax')) // check is this ajax caller
        {  
            $room_id      = $_POST['room_id'];
            $roomCategory = $this->room_model->getRoomCategory($room_id);            

            if($roomCategory)
            {      
                $returnValues['roomCategory'] = $roomCategory[0]['ro_category_id'];
                $returnValues['status']      = 'success';                
            }
            else
            {   
                $returnValues['status']        = 'error';
                $returnValues['msg']           = 'Not existing Room Category';
            } 

            echo json_encode($returnValues); 
        }

    }           //public function displayRoomCategory()

     //function to get hotel specific all room rate details
    public function getRoomRateDetailsTable()
    {
        $this->load->model('room_rate_model');   

        $userId  = $this->getUserId();
       

        if($this->getUserType() == '1')
        {
            $RoomRateDetails = $this->room_rate_model->getSuperAdminRoomRatesDetailsTable();

            if(null != $RoomRateDetails && $RoomRateDetails != "")
            {
                return $RoomRateDetails;
            }    
        }
        else
        {
            $RoomRateDetails = $this->room_rate_model->getRoomRatesDetails($userId);
            if(null != $RoomRateDetails && $RoomRateDetails != "")
            {
                return $RoomRateDetails;
            }
        }
    }   

     //function to get hotel specific all room rate details
    public function getHistoryRoomRateDetailsTable()
    {
        $this->load->model('room_rate_model');   

        $userId  = $this->getUserId();
       

        if($this->getUserType() == '1')
        {
            $RoomRateDetails = $this->room_rate_model->getSuperAdminHistoryRoomRatesDetailsTable();

            if(null != $RoomRateDetails && $RoomRateDetails != "")
            {
                return $RoomRateDetails;
            }    
        }
        else
        {
            $RoomRateDetails = $this->room_rate_model->getHistoryRoomRatesDetails($userId);
            if(null != $RoomRateDetails && $RoomRateDetails != "")
            {
                return $RoomRateDetails;
            }
        }
    }  
    public function getBeachesName()
    {
        $this->load->model('beaches_model');
        $beaches_name=$this->beaches_model->getBeachesName();
        // var_dump($beaches_name);
        if(null != $beaches_name && $beaches_name != "")
            {
                return $beaches_name;
            }
    }  

    public function foodPreferences()
    {
        $this->load->model('food_preferences_model');
        $foodPreferences=$this->food_preferences_model->getFoodPreferencesName();
        
        if(null != $foodPreferences && $foodPreferences != "")
            {
                return $foodPreferences;
            }
    } 
    public function getForestName()
    {
        $this->load->model('forests_model');
        $ForestName=$this->forests_model->getForestName();
        
        if(null != $ForestName && $ForestName != "")
            {
                return $ForestName;
            }
    } 
    public function getHistoricalName()
    {
        $this->load->model('historic_model');
        $HistoricalName=$this->historic_model->getHistoricalName();
        
        if(null != $HistoricalName && $HistoricalName != "")
            {
                return $HistoricalName;
            }
    } 
    public function getMountainName()
    {
        $this->load->model('mountains_model');
        $MountainName=$this->mountains_model->getMountainName();
        
        if(null != $MountainName && $MountainName != "")
            {
                return $MountainName;
            }
    } 
    public function getReligiousInterestName()
    {
        $this->load->model('religiousInterests_model');
        $ReligiousInterestName=$this->religiousInterests_model->getReligiousInterestName();
        
        if(null != $ReligiousInterestName && $ReligiousInterestName != "")
            {
                return $ReligiousInterestName;
            }
    } 
    public function getSceneryName()
    {
        $this->load->model('sceneries_model');
        $foodPreferences=$this->sceneries_model->getSceneryName();
        
        if(null != $foodPreferences && $foodPreferences != "")
            {
                return $foodPreferences;
            }
    } 
    public function getSportName()
    {
        $this->load->model('sports_model');
        $SportsName=$this->sports_model->getSportsName();
        
        if(null != $SportsName && $SportsName != "")
            {
                return $SportsName;
            }
    } 
    public function getWildlifeParkName()
    {
        $this->load->model('wildlife_model');
        $WildlifeParkName=$this->wildlife_model->getWildlifeParkName();
        
        if(null != $WildlifeParkName && $WildlifeParkName != "")
            {
                return $WildlifeParkName;
            }
    } 
    
    //function to add new popular facility
    public function addNewPopularFacility()
    {
        $returnValues           = array();
        $formData               = array();        
        $returnValues['status'] = "";
        $returnValues['msg']    = "";

        if( $_POST['submitMode'] != '' && $_POST['submitMode'] == 'ajax' ) // check is this ajax caller
        { 
            isset($_POST['hotel_id'])              ? $formData['hotel_id']                 = $_POST['hotel_id']                : $formData['hotel_id']                = 0;
            isset($_POST['comp_breakfast'])        ? $formData['complimentary_breakfast']  = $_POST['comp_breakfast']          : $formData['complimentary_breakfast'] = 0;
            isset($_POST['restaurant'])            ? $formData['restaurant']               = $_POST['restaurant']              : $formData['restaurant']              = 0; 
            isset($_POST['free_wi_fi'])            ? $formData['free_wi_fi']               = $_POST['free_wi_fi']              : $formData['free_wi_fi']              = 0; 
            isset($_POST['parking'])               ? $formData['parking']                  = $_POST['parking']                 : $formData['parking']                 = 0; 
            isset($_POST['front_desk_service'])    ? $formData['24_hrs_fd_service']        = $_POST['front_desk_service']      : $formData['24_hrs_fd_service']       = 0; 
            isset($_POST['non_smoking'])           ? $formData['non_smoking']              = $_POST['non_smoking']             : $formData['non_smoking']             = 0; 
            isset($_POST['outdoor_swimming_pool']) ? $formData['outdoor_swimming_pool']    = $_POST['outdoor_swimming_pool']   : $formData['outdoor_swimming_pool']   = 0; 
            isset($_POST['air_conditioning'])      ? $formData['ac']                       = $_POST['air_conditioning']        : $formData['ac']                      = 0; 
            isset($_POST['coffee_tea_in_lobby'])   ? $formData['coffy_tea_in_lobby']       = $_POST['coffee_tea_in_lobby']     : $formData['coffy_tea_in_lobby']      = 0; 
            isset($_POST['bar'])                   ? $formData['bar']                      = $_POST['bar']                     : $formData['bar']                     = 0; 
            
            //then insert data to pupular facilities hotel table
            $this->load->model('popular_facilities_hotel_model');

            /*var_dump($existent_result);
            exit();*/
            //check data existent
            $existent_result = $this->popular_facilities_hotel_model->get_popular_facility($_POST['hotel_id']);
            if ($existent_result)
            {
                // no records foun. then add the new facility with hotel
                $return = $this->popular_facilities_hotel_model->insert('popular_facilities_hotel',$formData);

                if(null != $return && $return != '')
                {
                    $returnValues['status'] = "success";
                    $returnValues['msg']    = "Data successfully added.";
                }
                else
                {
                    $returnValues['status'] = "error";
                    $returnValues['msg']    = "Data did not add successfully";                    
                }                
            }
            else
            {
                //sorry, there is a record existing the database for relevant hotel
                $returnValues['status'] = "error";
                $returnValues['msg']    = "Cannot add record. Record already exist in system. Please update the record.";

            }           //if ($existent_result)
        }

        echo json_encode($returnValues);

    }           //public function addNewPopularFacility()

    //get popular facility to update
    public function getPopularFacilityToEdit()
    {
        $returnValues = array();

        if((isset($_POST['facility_Id']))) 
        {   
            $this->load->model('popular_facilities_hotel_model');

            $popularFacilityAllDetails = $this->popular_facilities_hotel_model->getOfferTypeValuesPreview($_POST['facility_Id']);
                
            if (!empty($popularFacilityAllDetails))
            {
                $returnValues['roomPopularFacilities'] = $popularFacilityAllDetails[0];
                $returnValues['status']                = 'success';
                $returnValues['msg']                   = 'Details returned.';
            }
            else
            {
                $returnValues['status'] = 'error';
                $returnValues['msg']    = 'Invalid facility id.';
            }            
        }
        else
        {
            $returnValues['status'] = 'error';
            $returnValues['msg']    = 'Please select a valid facility id.';
        }

        echo json_encode($returnValues);

    }           //public function getPopularFacilityToEdit()

    //function to add new popular facility
    public function savePopularFacilityEditedDetails()
    {
        $returnValues           = array();
        $formData               = array();        
        $returnValues['status'] = "";
        $returnValues['msg']    = "";

        if( $_POST['submitMode'] != '' && $_POST['submitMode'] == 'ajax' ) // check is this ajax caller
        { 
            isset($_POST['hotel_id'])                ? $formData['hotel_id']                 = $_POST['hotel_id']                : $formData['hotel_id']                = 0;
            isset($_POST['complimentary_breakfast']) ? $formData['complimentary_breakfast']  = $_POST['complimentary_breakfast'] : $formData['complimentary_breakfast'] = 0;
            isset($_POST['restaurant'])              ? $formData['restaurant']               = $_POST['restaurant']              : $formData['restaurant']              = 0; 
            isset($_POST['free_wi_fi'])              ? $formData['free_wi_fi']               = $_POST['free_wi_fi']              : $formData['free_wi_fi']              = 0; 
            isset($_POST['parking'])                 ? $formData['parking']                  = $_POST['parking']                 : $formData['parking']                 = 0; 
            isset($_POST['h24_hrs_fd_service'])      ? $formData['24_hrs_fd_service']        = $_POST['h24_hrs_fd_service']      : $formData['24_hrs_fd_service']       = 0; 
            isset($_POST['non_smoking'])             ? $formData['non_smoking']              = $_POST['non_smoking']             : $formData['non_smoking']             = 0; 
            isset($_POST['outdoor_swimming_pool'])   ? $formData['outdoor_swimming_pool']    = $_POST['outdoor_swimming_pool']   : $formData['outdoor_swimming_pool']   = 0; 
            isset($_POST['ac'])                      ? $formData['ac']                       = $_POST['ac']                      : $formData['ac']                      = 0; 
            isset($_POST['coffy_tea_in_lobby'])      ? $formData['coffy_tea_in_lobby']       = $_POST['coffy_tea_in_lobby']      : $formData['coffy_tea_in_lobby']      = 0; 
            isset($_POST['bar'])                     ? $formData['bar']                      = $_POST['bar']                     : $formData['bar']                     = 0; 
            
            //then insert data to pupular facilities hotel table
            $this->load->model('popular_facilities_hotel_model');
         
            // faclity id exist in the database, then update the data
            $return = $this->popular_facilities_hotel_model->updateFacilityRecord($_POST['facility_id'], $formData);

            if($return)
            {
                $returnValues['status'] = "success";
                $returnValues['msg']    = "Data successfully updated.";
            }
            else
            {
                $returnValues['status'] = "error";
                $returnValues['msg']    = "Data did not update successfully.";
            }        
        }

        echo json_encode($returnValues);

    }           //public function addNewPopularFacility()

    //function to add new cancellation policy
    public function addNewCancellationPolicy()
    {
        $returnValues           = array();
        $formData               = array();        
        $returnValues['status'] = "";
        $returnValues['msg']    = "";

        if( $_POST['submitMode'] != '' && $_POST['submitMode'] == 'ajax' ) // check is this ajax caller
        { 
            isset($_POST['policy_name'])    ? $formData['policy_name']  = $_POST['policy_name']    : $formData['policy_name'] = '';
            isset($_POST['description'])    ? $formData['description']  = $_POST['description']    : $formData['description'] = '';
            isset($_POST['hotel_id'])       ? $formData['hotel_id']     = $_POST['hotel_id']       : $formData['hotel_id']    = 0; 
            isset($_POST['room_id'])        ? $formData['room_id']      = $_POST['room_id']        : $formData['room_id']     = 0; 
            isset($_POST['affect_from'])    ? $formData['affect_from']  = $_POST['affect_from']    : $formData['affect_from'] = ''; 
            isset($_POST['affect_to'])      ? $formData['affect_to']    = $_POST['affect_to']      : $formData['affect_to']   = '';             
            $formData['status'] = 'active';
            
            //then insert data to pupular facilities hotel table
            $this->load->model('cancellation_policy_model');            
           
            //Add the new policy with hotel
            $return = $this->cancellation_policy_model->insert('cancellation_policy',$formData);

            if(null != $return && $return != '')
            {
                $returnValues['status'] = "success";
                $returnValues['msg']    = "Cancellation policy successfully added.";
            }
            else
            {
                $returnValues['status'] = "error";
                $returnValues['msg']    = "Cancellation policy did not add successfully";                    
            }                
       
        }

        echo json_encode($returnValues);

    }           //public function addNewCancellationPolicy()


    //get cancellation policy to update
    public function getPolicyDetailsToUpdate()
    {
        $returnValues = array();

        if((isset($_POST['policy_Id']))) 
        {   
            $this->load->model('cancellation_policy_model');

            $cancellationPolicyAllDetails = $this->cancellation_policy_model->getPolicyDetailsToUpdate($_POST['policy_Id']);
                
            if (!empty($cancellationPolicyAllDetails))
            {
                //get rooms for relevant hotel
                $hotelID          = $cancellationPolicyAllDetails[0]['hotel_id'];
                $this->load->model('room_model');
                $roomdetails      = $this->room_model->getRoomDetails($hotelID);

             
                $returnValues['cancellationPolicyDetails'] = $cancellationPolicyAllDetails[0];
                $returnValues['hotelsForCurrentUser']      = $this->getAllHotelsForCurrentUser();
                $returnValues['roomsForCurrentHotel']      = $roomdetails;
                $returnValues['status']                    = 'success';
                $returnValues['msg']                       = 'Details returned.';
            }
            else
            {
                $returnValues['status'] = 'error';
                $returnValues['msg']    = 'Invalid policy id.';
            }            
        }
        else
        {
            $returnValues['status'] = 'error';
            $returnValues['msg']    = 'Please select a valid policy id.';
        }

        echo json_encode($returnValues);

    }           //public function getPolicyDetailsToUpdate()


    //function to save edited cancellation policy details
    public function saveCancellationPolicyEditedDetails()
    {
        $returnValues           = array();
        $formData               = array();        
        $returnValues['status'] = "";
        $returnValues['msg']    = "";

        if( $_POST['submitMode'] != '' && $_POST['submitMode'] == 'ajax' ) // check is this ajax caller
        { 
            isset($_POST['policy_name'])    ? $formData['policy_name']  = $_POST['policy_name']    : $formData['policy_name'] = '';
            isset($_POST['description'])    ? $formData['description']  = $_POST['description']    : $formData['description'] = '';
            isset($_POST['hotel_id'])       ? $formData['hotel_id']     = $_POST['hotel_id']       : $formData['hotel_id']    = 0; 
            isset($_POST['room_id'])        ? $formData['room_id']      = $_POST['room_id']        : $formData['room_id']     = 0; 
            isset($_POST['affect_from'])    ? $formData['affect_from']  = $_POST['affect_from']    : $formData['affect_from'] = ''; 
            isset($_POST['affect_to'])      ? $formData['affect_to']    = $_POST['affect_to']      : $formData['affect_to']   = '';
            isset($_POST['status'])         ? $formData['status']       = $_POST['status']         : $formData['status']      = 0;
                        
            $this->load->model('cancellation_policy_model');
         
            //update the data
            $return = $this->cancellation_policy_model->updatePolicyRecord($_POST['policyId'], $formData);

            if($return)
            {
                $returnValues['status'] = "success";
                $returnValues['msg']    = "Cancellation policy successfully updated.";
            }
            else
            {
                $returnValues['status'] = "error";
                $returnValues['msg']    = "Cancellation policy did not update successfully.";
            }        
        }

        echo json_encode($returnValues);

    }           //public function saveCancellationPolicyEditedDetails()

    //Deactivate/Activate cancellation policies
    public function changePolicyStatus()
    {
        $returnValues = array();
        
        // check adminitrator permission for this functionality 
        if ((isset($_POST['policy_id']))&&(!is_null($_POST['policy_id'])))
        {
            $this->load->model('cancellation_policy_model');

            //Update the status
            if (($this->cancellation_policy_model->update_policy_record(array('policy_id' =>$_POST['policy_id']), $_POST['policyData'])) !== 0)
            {
                $returnValues['status']       = 'success';
                $returnValues['updateStatus'] = $_POST['policyData']['status'];

                if ($_POST['policyData']['status'] == 'active')
                {
                    $returnValues['msg']          = "Cancellation policy successfully activated.";
                    
                }
                else
                {
                    $returnValues['msg']          = "Cancellation policy successfully deactivated.";                    
                }
            }
            else
            {
                // not updated database
                $returnValues['status'] = 'error';
                $returnValues['msg']    = "Cancellation policy did not successfully ".$_POST['policyData']['status'].".";
            }       
        }
        else
        {
            $returnValues['status'] = 'error';
            $returnValues['msg']    = "Policy not selected.";
        } 
        
        echo json_encode($returnValues);

    }           //public function changePolicyStatus()


    //function to add new promotion
    public function addNewPromotion()
    {
        $returnValues           = array();
        $formData               = array();        
        $returnValues['status'] = "";
        $returnValues['msg']    = "";

        if( $_POST['submitMode'] != '' && $_POST['submitMode'] == 'ajax' ) // check is this ajax caller
        { 
            isset($_POST['hotel_id'])            ? $formData['hotel_id']             = $_POST['hotel_id']           : $formData['hotel_id']             = '';
            isset($_POST['room_id'])             ? $formData['room_id']              = $_POST['room_id']            : $formData['room_id']              = '';
            isset($_POST['promotion_name'])      ? $formData['promotion_name']       = $_POST['promotion_name']     : $formData['promotion_name']       = 0;
            isset($_POST['promotion_discount'])  ? $formData['discount_percentage']  = $_POST['promotion_discount'] : $formData['discount_percentage']  = 0;
            isset($_POST['description'])         ? $formData['description']          = $_POST['description']        : $formData['description']          = '';
            isset($_POST['valid_from'])          ? $formData['valid_from']           = $_POST['valid_from']         : $formData['valid_from']           = '';
            isset($_POST['valid_to'])            ? $formData['valid_to']             = $_POST['valid_to']           : $formData['valid_to']             = '';
            isset($_POST['promotion_code'])      ? $formData['promotion_code']       = $_POST['promotion_code']     : $formData['promotion_code']       = '';            
            
            //then insert data to hotel promotions table
            $this->load->model('promotion_model');            
           
            //Add the new promotion with hotel
            $return = $this->promotion_model->insert('hotel_promotions',$formData);

            if(null != $return && $return != '')
            {
                $returnValues['status'] = "success";
                $returnValues['msg']    = "Promotion successfully added.";
            }
            else
            {
                $returnValues['status'] = "error";
                $returnValues['msg']    = "Promotion did not add successfully";                    
            }                
       
        }

        echo json_encode($returnValues);

    }           //public function addNewPromotion()

    //get promotion to update
    public function getPromotionDetailsToUpdate()
    {
        $returnValues = array();

        if((isset($_POST['promotion_Id']))) 
        {   
            $this->load->model('promotion_model');

            $promotionAllDetails = $this->promotion_model->getPromotionDetailsToUpdate($_POST['promotion_Id']);
                
            if (!empty($promotionAllDetails))
            {
                //get rooms for relevant hotel
                $hotelID          = $promotionAllDetails[0]['hotel_id'];
                $this->load->model('room_model');
                $roomdetails      = $this->room_model->getRoomDetails($hotelID);

             
                $returnValues['promotionAllDetails']       = $promotionAllDetails[0];
                $returnValues['hotelsForCurrentUser']      = $this->getAllHotelsForCurrentUser();
                $returnValues['roomsForCurrentHotel']      = $roomdetails;
                $returnValues['status']                    = 'success';
                $returnValues['msg']                       = 'Details returned.';
            }
            else
            {
                $returnValues['status'] = 'error';
                $returnValues['msg']    = 'Invalid promotion id.';
            }            
        }
        else
        {
            $returnValues['status'] = 'error';
            $returnValues['msg']    = 'Please select a valid promotion id.';
        }

        echo json_encode($returnValues);

    }           //public function getPromotionDetailsToUpdate()

    //function to save edited promotion details
    public function savePromotionEditedDetails()
    {
        $returnValues           = array();
        $formData               = array();        
        $returnValues['status'] = "";
        $returnValues['msg']    = "";

        if( $_POST['submitMode'] != '' && $_POST['submitMode'] == 'ajax' ) // check is this ajax caller
        { 
            isset($_POST['promotion_code']) ? $formData['promotion_code']  = $_POST['promotion_code'] : $formData['promotion_code'] = '';
            isset($_POST['promotion_name']) ? $formData['promotion_name']  = $_POST['promotion_name'] : $formData['promotion_name'] = '';
            isset($_POST['description'])    ? $formData['description']     = $_POST['description']    : $formData['description']    = 0; 
            isset($_POST['hotel_id'])       ? $formData['hotel_id']        = $_POST['hotel_id']       : $formData['hotel_id']       = 0; 
            isset($_POST['room_id'])        ? $formData['room_id']         = $_POST['room_id']        : $formData['room_id']        = 0; 
            isset($_POST['valid_from'])     ? $formData['valid_from']      = $_POST['valid_from']     : $formData['valid_from']     = ''; 
            isset($_POST['valid_to'])       ? $formData['valid_to']        = $_POST['valid_to']       : $formData['valid_to']       = '';
            isset($_POST['promo_status'])   ? $formData['promo_status']    = $_POST['promo_status']   : $formData['promo_status']   = 0;           
                        
            $this->load->model('promotion_model');
         
            //update the data
            $return = $this->promotion_model->update_records($_POST['promotionId'], $formData);

            if($return)
            {
                $returnValues['status'] = "success";
                $returnValues['msg']    = "Promotion details successfully updated.";
            }
            else
            {
                $returnValues['status'] = "error";
                $returnValues['msg']    = "Promotion details did not update successfully.";
            }        
        }

        echo json_encode($returnValues);

    }           //public function savePromotionEditedDetails()

    //Deactivate/Activate hotel promotions
    public function changePromotionStatus()
    {
        $returnValues = array();
        
        // check adminitrator permission for this functionality 
        if ((isset($_POST['promotion_id']))&&(!is_null($_POST['promotion_id'])))
        {
            $this->load->model('promotion_model');

            //Update the status
            if (($this->promotion_model->update_promotion_status(array('promotion_id' =>$_POST['promotion_id']), $_POST['promotionData'])) !== 0)
            {
                $returnValues['status']       = 'success';
                $returnValues['updateStatus'] = $_POST['promotionData']['promo_status'];

                if ($_POST['promotionData']['promo_status'] == 'active')
                {
                    $returnValues['msg']          = "Promotion successfully activated.";
                    
                }
                else
                {
                    $returnValues['msg']          = "Promotion successfully deactivated.";                    
                }
            }
            else
            {
                // not updated database
                $returnValues['status'] = 'error';
                $returnValues['msg']    = "Promotion did not successfully ".$_POST['promotionData']['promo_status'].".";
            }       
        }
        else
        {
            $returnValues['status'] = 'error';
            $returnValues['msg']    = "Promotion not selected.";
        } 
        
        echo json_encode($returnValues);

    }           //public function changePromotionStatus()

}           //class ManageHotel extends MY_Controller 