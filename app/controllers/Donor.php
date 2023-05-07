<?php
require APPROOT.'/init.php';
use helpers\Email;
use Stripe\StripeClient;

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
<<<<<<< Updated upstream

              $total_donations =  $this->donorModel->getTotalDonations($id);
              // $financial_total =  $this->donorModel->getTotalFDonations($id);
              // $nfinancial_total =  $this->donorModel->getTotalNDonations($id);
=======
              
              $total_donations =  $this->donorModel->getTotalDonations($id);
              $financial_total =  $this->donorModel->getTotalFinancialDonations($id);
              $nfinancial_total =  $this->donorModel->getTotalNonFinancialDonations($id);
              $upcoming_reservations = $this->donorModel->getUpcomingReservations($id);
>>>>>>> Stashed changes

              $data = [
              'title' => 'Dashboard',
              'prof_img' => $image_name,
<<<<<<< Updated upstream
              'total' =>  $total_donations
              // 'financial_total' => $financial_total,
              // 'nfinancial_total' => $nfinancial_total       
=======
              'total' =>  $total_donations,
              'financial_total' => $financial_total,
              'nfinancial_total' => $nfinancial_total,
              'reservattions_upcoming' => $upcoming_reservations      
>>>>>>> Stashed changes
              ];
    
          $this->view('users/donor/index', $data);
          }else{
              $this->view('users/login', $data);
<<<<<<< Updated upstream
=======
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
        
        public function feedback($donationId){

          $id = $_SESSION['user_id'];
          $user_type = $_SESSION['user_type'];
          $image_name = $this->profileImage();
          $userdata = $this->donorModel->getDonorDetails($id,$user_type);
          if($user_type){
            foreach ($userdata as $donor) :
              $name = $donor->f_name." ".$donor->l_name;
              $contact = $donor->tp_number;
              $email = $donor->email;
            endforeach;
          }else{
            foreach ($userdata as $donor) :
              $name = $donor->comp_name;
              $email = $donor->email;
            endforeach;
          }
    


          if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
              'prof_img' => $image_name,
              'name' => trim($_POST['name']),
              'email' => trim($_POST['email']),
              'subject' => trim($_POST['subject']),
              'desc' => trim($_POST['desc']),
              'subject_err' => '',
              'feedback_err' => '',
              'sender_id' => $id,
              'donation_id' => $donationId
              
            ];

            $error = false;
            // Validate data
            if(empty($data['name'])){
              $data['name'] = $name;
          }
          if(empty($data['email'])){
            $data['email'] = $email;
        }
            if(empty($data['subject'])){
                $data['subject_err'] = 'Please enter the subject';
                $error = true;
            }            
        if(empty($data['desc'])){
          $data['feedback_err'] = 'Please type your message here';
          $error = true;
      }

            // Make sure no errors
            if(!$error){
                // Validated
                if($this->donorModel->addFeedback($data)){
                    // flash('category_message', 'Category Added');
                    redirect('donor/viewAllFeedbackDonor');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $this->view('users/donor/feedback_donor', $data);
            }
        } else {
          $data = [
            'title' => 'Feedback',
            'name' => $name,
            'email' => $email,
            'subject' => '',
            'desc' => '',
            'subject_err' => '',
            'feedback_err' => '',
            'prof_img' => $image_name,
            'donation_id' => $donationId
          ];
    
          $this->view('users/donor/feedback_donor', $data);
        }
            
>>>>>>> Stashed changes
          }
        }

<<<<<<< Updated upstream
          

        /**
         * @return void
         */
<<<<<<< Updated upstream
<<<<<<< Updated upstream
        public function update_profile_donor(){
=======
        public function updateProfileDonor($contact){
>>>>>>> Stashed changes
=======
        public function updateProfileDonor($contact){
>>>>>>> Stashed changes

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
<<<<<<< Updated upstream
<<<<<<< Updated upstream
            
            
  
        }


        public function change_password_donor(){
=======
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
>>>>>>> Stashed changes
=======
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
>>>>>>> Stashed changes

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
      
<<<<<<< Updated upstream
<<<<<<< Updated upstream
                if ($this->donorModel->change_password($data, $id)) {
      
=======
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes
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
=======
        public function viewAllFeedbackDonor(){
>>>>>>> Stashed changes
            $data = [
              'title' => 'All Feedback'
            ];
      
            $this->view('users/donor/all_feedback_donor', $data);
          }
          
<<<<<<< Updated upstream
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


=======
       
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream

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
 
<<<<<<< Updated upstream
<<<<<<< Updated upstream
        

      }
=======
=======
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream
  }
>>>>>>> Stashed changes
=======
  }
>>>>>>> Stashed changes
=======

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
 
      public function filteredHistoryDonor($category,$filterId){

        if($filterId == 0){
          $status = 'Select Status';
          switch ($category) {
            case 0:
                $cat = 'Non-Financial Donations';
                break;
            case 1:
                  $cat = 'Financial Donations';
                    break;
            default:
            $cat = $this->donorModel->getCategoryById($category);
                break;
        }
        }else{
          $cat = 'Select Category';
          switch ($category) {
            case 1:
                $status = 'Pending';
                break;
            case 2:
                $status = 'Delivered';
                break;
            case 3:
                $status = 'Completed';
                break;
            case 4:
                $status = 'Canceled';
                break;
            default:
            $status = 'Error';
                break;
        }
        }
        

    
          if(!isLoggedIn()){
              redirect('users/login');
          }
          $id = $_SESSION['user_id'];
          $donations = $this->donorModel->getFilteredHistory($id, $category,$filterId);
          $financials = $this->donorModel->getFinancialHistory($id);
          $non_financials = $this->donorModel->getNonFinancialHistory($id);
          $categories = $this->donorModel->getNonfinancialCategories();
      
            if(!isLoggedIn()){
                redirect('users/login');
            }
          $image_name = $this->profileImage();
          $data = [
            'title' => 'Donation History',
            'prof_img' => $image_name,
            'donations' => $donations,
            'financials' => $financials,
            'nfinancials' => $non_financials,
            'categories' => $categories,
            'cat_title' => $cat,
            'status_title' => $status,
            'filter' => $filterId
          ];
    
        $this->view('users/donor/filtered_history_donor', $data);
      }  

        public function eventsDonor(){

          $events = $this->donorModel->getEventRequests();
          $districts = $this->donorModel->getEventRequestDistricts();
          $events_count = count($events);

          if(!isLoggedIn()){
              redirect('users/login');
          }

          $image_name = $this->profileImage();

          if($events_count == 0 ){
            $data = [
              'title' => 'Events',
              'prof_img' => $image_name
            ];
        
            $this->view('users/donor/empty_page', $data);
          }else{
          $data = [
            'title' => 'Events',
            'prof_img' => $image_name,
            'events' => $events,
            'districts' => $districts
          ];

          $this->view('users/donor/events_donor', $data);
        }

        }


        public function reservationsDonor(){

          $requests = $this->donorModel->getReservationRequests();
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
          foreach ($userData as $user) :
            $member_count = $user->members;
            $meal_plan = $user->meal_plan;
          endforeach;

      if(!isLoggedIn()){
          redirect('users/login');
      }
    $image_name = $this->profileImage();
    $data = [
      'title' => 'Donation Requests',
      'prof_img' => $image_name, 
      'user_data' => $userData,
      'reservations' => $reservations,
      'members' => $member_count,
      'meal_plan' =>  $meal_plan
    ];

    $this->view('users/donor/calendar_donor', $data);

      }

      public function filteredRequestDonor($category){

        if (isset($_SESSION['user_id'])) {
          $id = $_SESSION['user_id'];
          $user_type = $_SESSION['user_type'];
          $records = $this->donorModel->getFilteredRequests($category);
          $categories = $this->donorModel->getNonfinancialCategories();
          $userdata = $this->donorModel->getPersonalData($id,$user_type);
         
          foreach ($userdata as $user) :
            $user_zip = $user->zipcode;
          endforeach;

          switch ($category) {
            case 0:
                $cat = 'Non-Financial Donations';
                break;
            case 1:
                  $cat = 'Financial Donations';
                    break;
            default:
            $cat = $this->donorModel->getCategoryById($category);
                break;
        }

        $image_name = $this->profileImage();
        $data = [
          'title' => 'Donation Requests',
          'prof_img' => $image_name,
          'records' => $records,
          'cat_title' => $cat,
          'categories' => $categories,
          'user' => $user_zip 
        ];
    
        $this->view('users/donor/filtered_requests_donor', $data);
        } else {
          $this->view('users/login');
        }
        
    
        
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
        $donations_count = $this->donorModel->getReceivedDonationsCount($id);        
        $recent_donations = $this->donorModel->getRecentDonations($id,$category);

        foreach ($details as $data) :
          $user_id_ben = $data->user_id;
        endforeach;
        $user_type_ben = $this->donorModel->getUserTypeById($user_id_ben);
        $beneficiaryDetails = $this->donorModel->getBeneficiaryDetails($user_id_ben, $user_type_ben );
       
        if(!isLoggedIn()){
          redirect('users/login');
      }
    $image_name = $this->profileImage();
    $data = [
      'title' => 'Donation Requests',
      'prof_img' => $image_name,
      'details' => $details,
      'id' => $id,
      'cat_id' => $category,
      'recent_donations' => $recent_donations,
      'donations_count' => $donations_count,
      'beneficiary' => $beneficiaryDetails
    ];

    $this->view('users/donor/viewmore_request_donor', $data);
      }

      public function viewmoreEventDonor($id){

        $details = $this->donorModel->getEventDetails($id);
        $donations_count = $this->donorModel->getReceivedDonationsCountEvents($id);        
        $recent_donations = $this->donorModel->getRecentDonationsEvents($id);
        
        if(!isLoggedIn()){
          redirect('users/login');
      }
    $image_name = $this->profileImage();
    $data = [
      'title' => 'Events',
      'prof_img' => $image_name,
      'details' => $details,
      'id' => $id,
      'donations_count' => $donations_count,
      'recent_donations' => $recent_donations
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
  public function filteredMyReservationsDonor($filter_id,$filter_type){

    $user_id = $_SESSION['user_id'];
    $records = $this->donorModel->getFilteredMyReservations($user_id,$filter_id,$filter_type);
    $organizations = $this->donorModel->getMyReservationsOrgs($user_id);
    $org_data = $this->donorModel->getPersonalData($filter_id,5);
    
    if($filter_type == 1){
      switch($filter_id){
        case 0:
          $status = 'Pending for Approval';
          $org_name = 'Select Organization';
          break;
        case 1:
          $status = 'Approved & Reserved';
          $org_name = 'Select Organization';
          break;
        case 2:
          $status = 'Delivered';
          $org_name = 'Select Organization';
          break;
        case 3:
          $status = 'Completed';
          $org_name = 'Select Organization';
          break;
        case 4:
          $status = 'Canceled';
          $org_name = 'Select Organization';
          break;
        default:
          $status = 'Error';
          $org_name = 'Select Organization';

      }
    }else{
      $status = 'Select Status';
      foreach($org_data as $org ): 
        $org_name = $org->org_name; 
    endforeach; 
    }
    if(!isLoggedIn()){
      redirect('users/login');
    }
    
    $image_name = $this->profileImage();
    $data = [
      'title' => 'My Reservations',
      'prof_img' => $image_name,
      'records' => $records,
      'organizations' => $organizations, 
      'org_data' =>  $org_data,
      'status' => $status,
      'org_name' => $org_name,
      'filter' => $filter_type
      ];

          $this->view('users/donor/filtered_my_reservations_donor', $data);
  }

  public function donate($id, $category){
    
    $user_id = $_SESSION['user_id'];
    $user_type = $_SESSION['user_type'];
    $image_name = $this->profileImage();
    $userdata = $this->donorModel->getDonorDetails($user_id,$user_type);
    if($user_type ==2){
      foreach ($userdata as $donor) :
        $fullname = $donor->f_name." ".$donor->l_name;
        $contact = $donor->tp_number;
        $email = $donor->email;
      endforeach;
    }else{
      foreach ($userdata as $donor) :
        $fullname = $donor->comp_name;
        $contact = $donor->tp_number;
        $email = $donor->email;
      endforeach;
    }
    
    $requestdata = $this->donorModel->getRequestDetails($id, $category);

    //financial
    if($category == 1){
      foreach ($requestdata as $request) :
        $beneficiary_name = $request->name;
        $amount = $request->total_amount;
        $received = $request->received_amount;
      endforeach;
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      // Sanitize POST data
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      if (isset($_POST['anonymous']) && $_POST['anonymous'] == '1') {
        $anonymous = 1;
      } else {
        $anonymous = 0;
      }
      
      $data = [
        'title' => 'Donation',
          'prof_img' => $image_name,
          'req_id' => $id,
          'cat_id' => $category,
          'donor_id' => $user_id,
          'beneficiary_name' =>  $beneficiary_name,
          'donor_name' => trim($_POST['donor_name']),
          'donor_contact' => trim($_POST['donor_contact']),
          'donor_email' => trim($_POST['donor_email']),
          'donated_amount' => trim($_POST['donated_amount']),
          'anonymous' => $anonymous,
          'amount_err' => '',
          'amount' => $amount,
          'received' => $received,
          'isRequest' => 1 //donation request
      ];

      $error = false;
      // Validate data
      if(empty($data['donated_amount'])){
          $data['amount_err'] = 'Required';
          $error = true;
      }
      if($data['donated_amount'] < 200 ){
        $data['amount_err'] = 'Please enter a value greater than Rs.200'; //stripe only accepts values greater than 0.5 USD 
        $error = true;
    }
      if(empty($data['donor_name'])){
        $data['donor_name'] = $fullname;
      }
      if(empty($data['donor_contact'])){
        $data['donor_contact'] =  $contact;
      }
      if(empty($data['donor_email'])){
        $data['donor_email'] =  $email;
      }
      // Make sure no errors
      if(!$error){
          // Validated
          $this->processPayment($data);
          
      } else {
          // Load view with errors
          $this->view('users/donor/donate_financial_donor', $data);
      }
  } else {
    $data = [
      'title' => 'Donation',
      'req_id' => $id,
      'cat_id' => $category,
      'prof_img' => $image_name,
      'donor_name' => $fullname,
      'donor_contact' => $contact,
      'donor_email' => $email,
      'donated_amount' => '',
      'amount_err' => '',
      'amount' => $amount,
      'received' => $received,
      'isRequest' => 1 //donation request
      ];
    $this->view('users/donor/donate_financial_donor', $data);
  }
  //nonfinancial
}else{
 
    foreach ($requestdata as $request) :
      $beneficiary_name = $request->name;
      $quantity = $request->quantity;
      $received = $request->received_quantity;
      $item = $request->item;
      $user_id_ben = $request->user_id;
    endforeach;

    $user_type_ben = $this->donorModel->getUserTypeById($user_id_ben);
    $beneficiaryDetails = $this->donorModel->getBeneficiaryDetails($user_id_ben, $user_type_ben );

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      // Sanitize POST data
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      if (isset($_POST['anonymous']) && $_POST['anonymous'] == '1') {
        $anonymous = 1;
      } else {
        $anonymous = 0;
      }
      $data = [
        'title' => 'Donation',
          'prof_img' => $image_name,
          'req_id' => $id,
          'cat_id' => $category,
          'donor_id' => $user_id,
          'donor_name' => trim($_POST['donor_name']),
          'donor_contact' => trim($_POST['donor_contact']),
          'donated_quantity' => trim($_POST['donated_quantity']),
          'note_to_beneficiary' => trim($_POST['note_to_beneficiary']),
          'anonymous' => $anonymous,
          'donated_quantity_err' => '',
          'beneficiary' => $beneficiary_name,
          'quantity' => $quantity,
          'received' => $received,
          'request_data' => $requestdata,          
          'beneficiary' => $beneficiaryDetails
      ];

      $error = false;
      // Validate data
      if(empty($data['donated_quantity'])){
          $data['donated_quantity_err'] = 'Please enter a valid number';
          $error = true;
      }
      if($data['donated_quantity'] < 1){
        $data['donated_quantity_err'] = 'Please enter a valid number';
        $error = true;
    }
      if(empty($data['donor_name'])){
        $data['donor_name'] = $fullname;
      }
      if(empty($data['donor_contact'])){
        $data['donor_contact'] =  $contact;
      }
      // Make sure no errors
      if(!$error){
          // Validated
          if($this->donorModel->makeDonation($data)){
            $this->view('users/donor/final_step_nfinancial_donation', $data);
          } else {
              die('Something went wrong');
          }
      } else {
          // Load view with errors
          $this->view('users/donor/donate_nfinancial_donor', $data);
      }
  } else {
    $data = [
      'title' => 'Donation',
      'req_id' => $id,
      'cat_id' => $category,
      'prof_img' => $image_name,
      'donor_name' =>  $fullname,
      'donor_contact' => $contact,
      'beneficiary' => $beneficiary_name,
      'quantity' => $quantity,
      'received' => $received,
      'item' => $item,
      'donated_quantity_err' => ''
      ];
    $this->view('users/donor/donate_nfinancial_donor', $data);
    }
}
   
  }

  public function viewmoreHistoryDonor($donationId, $donation_type){
    //donation types -> financial(1) and non financial(0)
      $image_name = $this->profileImage();
      $details = $this->donorModel->getDonationDetails($donationId, $donation_type);
      $data = [
        'title' => 'Donation History',
        'prof_img' => $image_name,
        'donation_id' => $donationId,
        'details' => $details
      ];
  
      $this->view('users/donor/viewmore_history_donor', $data);
    
  
  }

  public function processPayment($data){

    $stripe_api_key = 'sk_test_51N4OOUBUpAx8uiW7HKrgvf5e7eL507tpWQexdi6sQC3euKoptTm3lUksLjYqlyQ5icjD25ui1KmfLICjiyfu3oxP00veVX6wxO';
    // $stripe_publishable_key = 'pk_test_51N4OOUBUpAx8uiW72yScgJIFw02GMM66j83iDem4IOYHUQJ9PJ29X8viRj4EkZRq20cNZNy1eAeMSTNLn77CbUOb00EQtTqMud';

    // // Set API key 
    // $stripe = new StripeClient($stripe_api_key);
    $beneficiaryName = $data['beneficiary_name'];
    $requestID = $data['req_id'];
    $amount_donated = $data['donated_amount'];
    $amount = intval($amount_donated) ;
    $currency = 'lkr';
    $encoded_data = urlencode(json_encode($data));
    // $response = array( 
    //   'status' => 0, 
    //   'error' => array( 
    //   'message' => 'Invalid Request!'    
    // ) 
    // ); 

    // if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
    //   $input = file_get_contents('php://input'); 
    //   $request = json_decode($input);     
    // } 

    // if (json_last_error() !== JSON_ERROR_NONE) { 
    //   http_response_code(400); 
    //   echo json_encode($response); 
    // exit; 
    // } 

    // if(!empty($request->createCheckoutSession)){ 
    //   // Convert product price to cent 
      $stripeAmount = round($amount*100, 2); 

    //   // Create new Checkout Session for the order 
    //   try { 
    //   $checkout_session = $stripe->checkout->sessions->create([ 
    //     'line_items' => [[ 
    //       'price_data' => [ 
    //           'product_data' => [ 
    //               'name' => $productName, 
    //               'metadata' => [ 
    //                   'pro_id' => $productID 
    //               ] 
    //           ], 
    //           'unit_amount' => $stripeAmount, 
    //           'currency' => $currency, 
    //       ], 
    //       'quantity' => 1 
    //   ]], 
    //       'mode' => 'payment', 
    //       'success_url' => URLROOT.'/donor/index', 
    //       'cancel_url' => URLROOT.'pages/donationRequestsDonor', 
    //     ]); 
    //   } catch(Exception $e) {  
    //     $api_error = $e->getMessage();  
    //   } 
   
    //   if(empty($api_error) && $checkout_session){ 
    //       $response = array( 
    //           'status' => 1, 
    //           'message' => 'Checkout Session created successfully!', 
    //           'sessionId' => $checkout_session->id 
    //   ); 
    //   }else{ 
    //       $response = array( 
    //         'status' => 0, 
    //         'error' => array( 
    //         'message' => 'Checkout Session creation failed! '.$api_error    
    //         ) 
    //       ); 
    //   } 
    // } 

    // // Return response 
    // echo json_encode($response); 
// -------------------------------------

// \Stripe\Stripe::setApiKey('sk_test_51N4OOUBUpAx8uiW7HKrgvf5e7eL507tpWQexdi6sQC3euKoptTm3lUksLjYqlyQ5icjD25ui1KmfLICjiyfu3oxP00veVX6wxO'); // set Stripe secret key

// if(isset($_POST['createCheckoutSession'])) {
//   $sessionId = createCheckoutSession();
//   echo json_encode(['sessionId' => $sessionId]);
// }



//     }
// function createCheckoutSession() {
//   // create a new Checkout Session using the Stripe API
//   $session = \Stripe\Checkout\Session::create([
//     'payment_method_types' => ['card'],
//     'line_items' => [
//       [
//         'price_data' => [
//           'currency' => 'usd',
//           'product_data' => [
//             'name' => 'My Product',
//           ],
//           'unit_amount' => 1000,
//         ],
//         'quantity' => 1,
//       ],
//     ],
//     'mode' => 'payment',
//     'success_url' => URLROOT.'/donor/index', 
//     'cancel_url' => URLROOT.'pages/donationRequestsDonor', 
//   ]);

//   return $session->id;
// }



\Stripe\Stripe::setApiKey($stripe_api_key);
header('Content-Type: application/json');



$checkout_session = \Stripe\Checkout\Session::create([
  'line_items' => [[
    'price_data' => [ 
                'product_data' => [ 
                    'name' => $beneficiaryName, 
                    'metadata' => [ 
                        'pro_id' => $requestID 
                    ] 
                ], 
                'unit_amount' => $stripeAmount, 
                'currency' => $currency, 
            ], 
    'quantity' => 1,
  ]],
  'mode' => 'payment',
  'success_url' => URLROOT.'/donor/afterPayment/1/'.$encoded_data, 
  'cancel_url' => URLROOT.'pages/afterPayment/0/'.$encoded_data,
]);

header("HTTP/1.1 303 See Other");
header("Location: " . $checkout_session->url);

  }

  public function afterPayment($status, $encoded_data){

    if($status == 1){ // succeeded
      $data = json_decode(urldecode($encoded_data), true);
       
      $payment_data = [
        'data' => $data,
        'status' => $status
        
      ];

      if($payment_data['data']['isRequest'] == 1 ){ //donation request
        if($this->donorModel->makeDonation($data)){
     
          $this->view('users/donor/final_step_financial_donation', $payment_data);
        } else {
            die('Something went wrong');
        }
      }
      if($payment_data['data']['isRequest'] == 0 ){ //event
        if($this->donorModel->makeDonationEvents($data)){
     
          $this->view('users/donor/final_step_financial_donation', $payment_data);
        } else {
            die('Something went wrong');
        }
      }
    
    }else{ //failed
      $this->view('users/donor/final_step_financial_donation', $payment_data);
    }
    
  }

  public function donateToEvents($id,$isEvent){
    $user_id = $_SESSION['user_id'];
    $user_type = $_SESSION['user_type'];
    $image_name = $this->profileImage();
    $userdata = $this->donorModel->getDonorDetails($user_id,$user_type);
    //get donor data 
    if($user_type ==2){
      foreach ($userdata as $donor) :
        $fullname = $donor->f_name." ".$donor->l_name;
        $contact = $donor->tp_number;
        $email = $donor->email;
      endforeach;
    }else{
      foreach ($userdata as $donor) :
        $fullname = $donor->comp_name;
        $contact = $donor->tp_number;
        $email = $donor->email;
      endforeach;
    }

    
    //get event data
    $details = $this->donorModel->getEventDetails($id);
    foreach ($details as $event) :
      $beneficiary_name = $event->event_title;
      $amount = $event->budget;
      $received = $event->received;
    endforeach;


    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      // Sanitize POST data
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      if (isset($_POST['anonymous']) && $_POST['anonymous'] == '1') {
        $anonymous = 1;
      } else {
        $anonymous = 0;
      }
      
      $data = [
        'title' => 'Donation',
          'prof_img' => $image_name,
          'req_id' => $id,
          'cat_id' => 1,
          'donor_id' => $user_id,
          'beneficiary_name' =>  $beneficiary_name,
          'donor_name' => trim($_POST['donor_name']),
          'donor_contact' => trim($_POST['donor_contact']),
          'donor_email' => trim($_POST['donor_email']),
          'donated_amount' => trim($_POST['donated_amount']),
          'anonymous' => $anonymous,
          'amount_err' => '',
          'amount' => $amount,
          'received' => $received,
          'isRequest' => 0 //event
      ];

      $error = false;
      // Validate data
      if(empty($data['donated_amount'])){
          $data['amount_err'] = 'Required';
          $error = true;
      }
      if($data['donated_amount'] < 200 ){
        $data['amount_err'] = 'Please enter a value greater than Rs.200'; //stripe only accepts values greater than 0.5 USD 
        $error = true;
    }
      if(empty($data['donor_name'])){
        $data['donor_name'] = $fullname;
      }
      if(empty($data['donor_contact'])){
        $data['donor_contact'] =  $contact;
      }
      if(empty($data['donor_email'])){
        $data['donor_email'] =  $email;
      }
      // Make sure no errors
      if(!$error){
          // Validated
          $this->processPayment($data);
          
      } else {
          // Load view with errors
          $this->view('users/donor/donate_financial_donor', $data);
      }
  } else {
    $data = [
      'title' => 'Donation',
      'req_id' => $id,
      'cat_id' => 1,
      'prof_img' => $image_name,
      'donor_name' => $fullname,
      'donor_contact' => $contact,
      'donor_email' => $email,
      'donated_amount' => '',
      'amount' => $amount,
      'amount_err' => '',
      'received' => $received,
      'isRequest' => 0 //event 
      ];
    $this->view('users/donor/donate_financial_donor', $data);
  }

  }
  }

    
  
>>>>>>> Stashed changes
