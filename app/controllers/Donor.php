<?php

use helpers\Email;

    class Donor extends Controller{
        public function __construct(){
            if(!isLoggedIn()){
                redirect('users/login');
            }
            $this->donorModel = $this->model('DonorModel');
            $this->userModel = $this->model('User');
        }

        //load donor dashboard
        /**
         * @return void
         */
        public function index(){

            if(isset($_SESSION['user_id'])){

              $id = $_SESSION['user_id'];

              $userdata = $this->donorModel->getUserData($id);
              foreach($userdata as $user) :
                $image_name = $user-> prof_img;
              endforeach;  

              $total_donations =  $this->donorModel->getTotalDonations($id);
              // $financial_total =  $this->donorModel->getTotalFDonations($id);
              // $nfinancial_total =  $this->donorModel->getTotalNDonations($id);

              $data = [
              'title' => 'Dashboard',
              'prof_img' => $image_name,
              'total' =>  $total_donations
              // 'financial_total' => $financial_total,
              // 'nfinancial_total' => $nfinancial_total       
              ];
    
          $this->view('users/donor/index', $data);
          }else{
              $this->view('users/login', $data);
          }
        }

          

        /**
         * @return void
         */
        public function updateProfileDonor($contact){

          $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING); 
  
          $otp_code = rand(100000,999999);
          $verification_status = 1;
          $otp_verify = 1;
          $otp_code = 0;
          $type = $_SESSION['user_type'];
          $id = $_SESSION['user_id'];
          $districts = $this->userModel->getDistricts();
  
          // Init data
          $data =[
            'f_name' => trim($_POST['f_name']),
            'l_name' => trim($_POST['l_name']),
            'comp_name' => trim($_POST['comp_name']),
            'contact_ind' => trim($_POST['contact_ind']),
            'city' => trim($_POST['city']),
            'district' => trim($_POST['district']),
            'emp_name' => trim($_POST['emp_name']),
            'emp_id' => trim($_POST['emp_id']),
            'desg' => trim($_POST['desg']),
            'contact_corp' => trim($_POST['contact_corp']),
            'type' => $type,
            'id' => $id,
            'otp_code' => $otp_code,
            'otp_verify' => $otp_verify
            ];
          
            $tp_changed = false;

          if($type == 2){
            if($contact != $data['contact_ind']){
              $tp_changed = true;
              $data['otp_code'] = rand(100000, 999999);
              $data['otp_verify'] = 0;
            }
          }else{
            if($contact != $data['contact_corp']){
              $tp_changed = true;
              $data['otp_code'] = rand(100000, 999999);
              $data['otp_verify'] = 0;
            }
          }

          if($this->donorModel->updateProfileDonor($data)){
            if($tp_changed){
              $email = new Email($user_email);
              $email->sendVerificationEmail($user_email, $otp_code);
              redirect('users/otpVerify/1');
            }else{
              redirect('pages/profileDonor');
            }
            }else{
              redirect('pages/editProfileDonor');
            }
          

        }


        public function changePasswordDonor(){

          $id = $_SESSION['user_id'];
          $user_type = $_SESSION['user_type'];
          $user_email = $_SESSION['user_email'];
          $image_name = $this->profileImage();

          if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $otp_verify = 0;
            $otp_code = rand(100000, 999999);

            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'old_password' => trim($_POST['old_password']),
                'new_password' => trim($_POST['new_password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'old_password_error' => '',
                'new_password_error' => '',
                'confirm_password_error' => '',
                'otp_code' => $otp_code,
                'otp_verify' => $otp_verify
            ];

            $error = false;
            $same = $this->donorModel->passwordChecker($data['new_password'], $id);
            $correct = $this->donorModel->passwordChecker($data['old_password'], $id);

              if (!$correct) {
                $data['old_password_error'] = 'Incorrect password';
                $data['new_password'] = '';
                    $data['confirm_password'] = '';
                $error = true;
              } else{

                if (empty($data['new_password'])) {
                  $data['new_password_error'] = 'Please enter a new password';
                  $error = true;
                } else {
                  if ($same) {
                    $data['new_password_error'] = 'New password cannot be same as old password';
                    $data['new_password'] = '';
                    $data['confirm_password'] = '';
                    $error = true;
                  }else{
                    if (strlen($data['new_password']) < 6) {
                      $data['new_password_error'] = 'Password must be at least 6 characters';
                      $error = true;
                    }
  
                    if (empty($data['confirm_password'])) {
                      $data['confirm_password_error'] = 'Please confirm password';
                      $error = true;
                    } else {
                      if ($data['new_password'] != $data['confirm_password']) {
                        $data['confirm_password_error'] = 'Passwords do not match';
                        $error = true;
                      }
                    }
                  }
  
                  
                }
              }
              
              if ($error == false) {
                      
                // Hash Password
                $data['new_password'] = password_hash($data['new_password'], PASSWORD_DEFAULT);
                
                if ($this->donorModel->changePassword($data, $id)) {
      
                  $email = new Email($user_email);
                  $email->sendVerificationEmail($user_email, $otp_code);
                  redirect('users/otpVerify/0');
                } else {
                  die('Something went wrong');
                }
              } else {
                // Load view with errors
                $this->view('users/donor/change_password_donor', $data);
              }

            }else{

              $data = [
                'old_password' => '',
                'new_password' => '',
                'confirm_password' => '',
                'old_password_error' => '',
                'new_password_error' => '',
                'confirm_password_error' => '',
                'prof_img' => $image_name
              ];

              $this->view('users/donor/change_password_donor', $data);
             
            }

        }
        
        

        /**
         * @return void
         */
        public function feedback(){
            $data = [
              'title' => 'Feedback',
              'desc' => '',
              'feedback_err' => ''
            ];
      
            $this->view('users/donor/feedback', $data);
          }

           
         /**
         * @return void
         */
        public function all_feedback(){
            $data = [
              'title' => 'All Feedback'
            ];
      
            $this->view('users/donor/all_feedback', $data);
          }
          
        /**
         * @return void
         */
        public function submitFeedback(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'desc' => trim($_POST['desc']),
                    'feedback_err' => ''
                ];

                // Validate data
                if(empty($data['desc'])){
                    $data['feedback_err'] = 'Please type something here';
                }

                // Make sure no errors
                if(empty($data['feedback_err'])){
                    // Validated
                    if($this->donorModel->addFeedback($data)){
                        // flash('category_message', 'Category Added');
                        redirect('donor/allFeedback');
                    } else {
                        die('Something went wrong');
                    }
                } else {
                    // Load view with errors
                    $this->view('users/donor/feedback', $data);
                }
            } else {
                // Init data
                $data = [
                    'desc' => ''
                ];

                // Load view
                $this->view('users/donor/feedback', $data);
            }
        }


        /**
         * @return void
         */
        public function addCategories(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'category_name' => trim($_POST['category_name']),
                    'category_name_err' => ''
                ];

                // Validate data
                if(empty($data['category_name'])){
                    $data['category_name_err'] = 'Please enter category name';
                }

                // Make sure no errors
                if(empty($data['category_name_err'])){
                    // Validated
                    if($this->adminModel->addCategory($data)){
                        // flash('category_message', 'Category Added');
                        redirect('admin/categories');
                    } else {
                        die('Something went wrong');
                    }
                } else {
                    // Load view with errors
                    $this->view('users/admin/categories', $data);
                }
            } else {
                // Init data
                $data = [
                    'category_name' => ''
                ];

                // Load view
                $this->view('users/admin/categories', $data);
            }
        }

        
        /**
         * @param $id
         * @return void
         */
        public function editCategories($id){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'id' => $id,
                    'category_name' => trim($_POST['category_name']),
                    'category_name_err' => ''
                ];

                // Validate data
                if(empty($data['category_name'])){
                    $data['category_name_err'] = 'Please enter category name';
                    redirect('admin/editCategories/' . $id);
                }

                // Make sure no errors
                if(empty($data['category_name_err'])){
                    // Validated
                    if($this->adminModel->editCategory($data)){
                        // flash('category_message', 'Category Added');
                        redirect('admin/categories');
                    } else {
                        die('Something went wrong');
                    }
                } else {
                    // Load view with errors
                    $this->view('users/admin/categories', $data);
                }
            } else {
                // Get existing category from model
                $category = $this->adminModel->getCategoryById($id);
                // Init data
                $data = [
                    'id' => $id,
                    'category_name' => $category->category_name
                ];

                // Load view
                $this->view('users/admin/editCategories', $data);
            }
        }

        
        /**
         * @param $id
         * @return void
         */
        public function deleteCategories($id){
                if($this->adminModel->deleteCategory($id)){
                    redirect('admin/categories');
                } else {
                    die('Something went wrong');
                }
        }

        public function profileImage(){
          if (isset($_SESSION['user_id'])) {
            $id = $_SESSION['user_id'];
            $userdata = $this->donorModel->getUserData($id);
            foreach ($userdata as $user) :
              $image_name = $user->prof_img;
            endforeach;
            return $image_name;
          } else {
            $this->view('users/login', $data);
          }
        }

        /**
         * @return void
         */
        public function stats(){
          $image_name = $this->profileImage();
          $data = [
              'title' => 'Statistics',
              'prof_img' => $image_name
          ];

          $this->view('users/donor/stats', $data);
      }
 
      public function filteredHistoryDonor($category){

        $id = $_SESSION['user_id'];
        $records = $this->donorModel->getFilteredHistory($id, $category);

        switch ($category) {
          case 0:
              $cat = 'Non-Financial Donations';
              break;
          case 1:
                $cat = 'Financial Donations';
                  break;
          case 2:
            $cat = 'Food';
              break;
          case 3:
            $cat = 'Stationary';
              break;
          case 4:
            $cat = 'Medicine';
              break;
          default:
          $cat = 'Select Donation Category';
              break;
        }
    
          if(!isLoggedIn()){
              redirect('users/login');
          }
        $image_name = $this->profileImage();
        $data = [
          'title' => 'Donation History',
          'prof_img' => $image_name,
          'records' => $records,
          'cat_title' => $cat
        ];
    
        $this->view('users/donor/filtered_history_donor', $data);
      }  

        public function eventsDonor(){

          $events = $this->donorModel->getEventRequests();
          $districts = $this->donorModel->getEventRequestDistricts();

          if(!isLoggedIn()){
              redirect('users/login');
          }
          $image_name = $this->profileImage();
          $data = [
            'title' => 'Donation Requests',
            'prof_img' => $image_name,
            'events' => $events,
            'districts' => $districts
          ];

          $this->view('users/donor/events_donor', $data);
        }


        public function reservationsDonor(){

          $requests = $this->donorModel->getOrgRequests();
          $districts = $this->donorModel->getOrgRequestDistricts();

      if(!isLoggedIn()){
          redirect('users/login');
      }
    $image_name = $this->profileImage();
    $data = [
      'title' => 'Donation Requests',
      'prof_img' => $image_name,
      'requests' => $requests,
      'districts' => $districts
    ];

    $this->view('users/donor/reservations_donor', $data);
        }

        public function sponsorshipsDonor(){

          $events = $this->donorModel->getEventRequests();

          if(!isLoggedIn()){
              redirect('users/login');
          }
          $image_name = $this->profileImage();
          $data = [
            'title' => 'Donation Requests',
            'prof_img' => $image_name,
            'events' => $events,
          ];

          $this->view('users/donor/sponsorships_donor', $data);
        }

        public function viewCalendarDonor($id){

          $userData = $this->donorModel->getPersonalData($id,5);
          $reservations = $this->donorModel->getReservations($id);

      if(!isLoggedIn()){
          redirect('users/login');
      }
    $image_name = $this->profileImage();
    $data = [
      'title' => 'Donation Requests',
      'prof_img' => $image_name, 
      'user_data' => $userData,
      'reservations' => $reservations
    ];

    $this->view('users/donor/calendar_donor', $data);

      }

      public function filteredRequestDonor($category){

        $records = $this->donorModel->getFilteredRequests($category);

        switch ($category) {
          case 0:
              $cat = 'Non-Financial Donations';
              break;
          case 1:
                $cat = 'Financial Donations';
                  break;
          case 2:
            $cat = 'Food';
              break;
          case 3:
            $cat = 'Stationary';
              break;
          case 4:
            $cat = 'Medicine';
              break;
          default:
          $cat = 'Select Donation Category';
              break;
      }
    
          if(!isLoggedIn()){
              redirect('users/login');
          }
        $image_name = $this->profileImage();
        $data = [
          'title' => 'Donation Requests',
          'prof_img' => $image_name,
          'records' => $records,
          'cat_title' => $cat
        ];
    
        $this->view('users/donor/filtered_requests_donor', $data);
      }  

      public function deleteProfileDonor(){

        $id = $_SESSION['user_id'];
        $user_type = $_SESSION['user_type'];
        //check ongoing reservations, donations
        if($this->donorModel->disableAccount($id,$user_type)){
         redirect('users/logout');
        }
        //else{
        //  ??
        //}
       
      }

      public function viewmoreRequestDonor($id, $category){

        $details = $this->donorModel->getRequestDetails($id, $category);

        if(!isLoggedIn()){
          redirect('users/login');
      }
    $image_name = $this->profileImage();
    $data = [
      'title' => 'Donation Requests',
      'prof_img' => $image_name,
      'details' => $details,
      'id' => $id
    ];

    $this->view('users/donor/viewmore_request_donor', $data);
      }

      public function viewmoreEventDonor($id){

        $details = $this->donorModel->getEventDetails($id);

        if(!isLoggedIn()){
          redirect('users/login');
      }
    $image_name = $this->profileImage();
    $data = [
      'title' => 'Events',
      'prof_img' => $image_name,
      'details' => $details,
      'id' => $id
    ];

    $this->view('users/donor/viewmore_event_donor', $data);
      }

      public function filteredReservationsDonor($id){

        $records = $this->donorModel->getFilteredReservations($id);
        $districts = $this->donorModel->getOrgRequestDistricts();
        $district_name = $this->donorModel->getDistrictName($id,0);

      if(!isLoggedIn()){
          redirect('users/login');
      }
      $image_name = $this->profileImage();
      $data = [
      'title' => 'Reservations',
      'prof_img' => $image_name,
      'records' => $records,
      'districts' => $districts,
      'dist_title' => $district_name
    ];

    $this->view('users/donor/filtered_reservations_donor', $data);
      }

      public function filteredEventsDonor($id){

        $records = $this->donorModel->getFilteredEvents($id);
        $districts = $this->donorModel->getEventRequestDistricts();
        $district_name = $this->donorModel->getDistrictName($id,0);

      if(!isLoggedIn()){
          redirect('users/login');
      }
      $image_name = $this->profileImage();
      $data = [
      'title' => 'Events',
      'prof_img' => $image_name,
      'records' => $records,
      'districts' => $districts,
      'dist_title' => $district_name
    ];

    $this->view('users/donor/filtered_events_donor', $data);
      }

      public function makeReservationDonor($id){
      
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING); 
        // $type = $_SESSION['user_type'];
        $user_id = $_SESSION['user_id'];
        // $districts = $this->userModel->getDistricts();

        // Init data
        $data =[
          'amount_reserved' => trim($_POST['amount_reserved']),
          'contact1' => trim($_POST['contact1']),
          'contact2' => trim($_POST['contact2']),
          'email' => trim($_POST['email']),
          'meal_type' =>trim($_POST['meal_type']),
          'status' => 0,
          'don_id' => $user_id,
          'ben_id' => $id,
          'date' => trim($_POST['date']),
          'month' => trim($_POST['month']),
          'year' => trim($_POST['year']),
          ];

          switch($data['meal_type']){
            case'Breakfast':
              $data['meal_type'] = 1;
              break;
            case'Lunch':
              $data['meal_type'] = 2;
              break;
            case'Dinner':
              $data['meal_type'] = 3;
              break;
            default:
            $data['meal_type'] = 0;
          }
          $data['month'] -= 1;

        if($this->donorModel->makeReservationDonor($data)){
        redirect('donor/viewMyReservationsDonor');
      }else{
        die('Something went wrong');
        }
    
  }

  public function viewMyReservationsDonor(){
    $user_id = $_SESSION['user_id'];

    $records = $this->donorModel->getMyReservations($user_id);
    $organizations = $this->donorModel->getMyReservationsOrgs($user_id);
    
    if(!isLoggedIn()){
      redirect('users/login');
    }
    
    $image_name = $this->profileImage();
    $data = [
      'title' => 'Donation Requests',
      'prof_img' => $image_name,
      'records' => $records,
      'organizations' => $organizations      
      ];

          $this->view('users/donor/my_reservations_donor', $data);
  }

  public function markAsDelivered($donation_type, $id){

    if($donation_type == 0){
      
      if($this->donorModel->markDeliveredDonation($id)){
        redirect('donor/viewMyReservationsDonor');
      }else{
        die('Something went wrong');
        }
    } else{
      
      if($this->donorModel->markDeliveredReservation($id)){
        redirect('donor/viewMyReservationsDonor');
      }else{
        die('Something went wrong');
        }
    }
  }
  public function markAsCancelled($donation_type, $id){

    if($donation_type == 0){
      
      if($this->donorModel->markCancelledDonation($id)){
        redirect('donor/viewMyReservationsDonor');
      }else{
        die('Something went wrong');
        }
    } else{
      
      if($this->donorModel->markCancelledReservation($id)){
        redirect('donor/viewMyReservationsDonor');
      }else{
        die('Something went wrong');
        }
    }
  }
  public function filteredMyReservationsDonor($ben_id){
    $user_id = $_SESSION['user_id'];

    $records = $this->donorModel->getFilteredMyReservations($user_id,$ben_id);
    $organizations = $this->donorModel->getMyReservationsOrgs($user_id);
    $org_data = $this->donorModel->getPersonalData($ben_id,5);
    
    if(!isLoggedIn()){
      redirect('users/login');
    }
    
    $image_name = $this->profileImage();
    $data = [
      'title' => 'My Reservations',
      'prof_img' => $image_name,
      'records' => $records,
      'organizations' => $organizations, 
      'org_data' =>  $org_data  
      ];

          $this->view('users/donor/filtered_my_reservations_donor', $data);
  }

  public function donate($type){

    $image_name = $this->profileImage();
    if($type==0){
      $data = [
        'title' => 'Donation Requests',
        'prof_img' => $image_name 
        ];
      $this->view('users/donor/donate_nfinancial_donor', $data);
    }else{
      $data = [
        'title' => 'Donate  - Financial',
        'prof_img' => $image_name 
        ];
      $this->view('users/donor/donate_financial_donor', $data);
    }
    
  }
  }