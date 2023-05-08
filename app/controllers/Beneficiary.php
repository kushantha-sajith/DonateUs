<?php

use helpers\NIC_Validator;

    class beneficiary extends Controller{
        public function __construct(){
            if(!isLoggedIn()){
                redirect('users/login');
            }
            $this->beneficiaryModel = $this->model('BeneficiaryModel');
            $this->userModel = $this->model('User');
            
            
        }


         //load beneficiary dashboard
       
        public function index(){
          if(isset($_SESSION['user_id'])){

          $id = $_SESSION['user_id'];

          $total_donations =  $this->beneficiaryModel->getTotalDonations($id);
          $total_reject = $this->beneficiaryModel->getTotalReject($id);
          $total_ongoing = $this->beneficiaryModel->getTotalOngoing($id);
          $total_complete = $this->beneficiaryModel->getTotalComplete($id);

          $data = [
          'title' => 'Dashboard',
          'total' =>  $total_donations,
          'reject' =>  $total_reject,
          'ongoing' =>  $total_ongoing,
          'complete' =>  $total_complete

          ];
       
          $this->view('users/beneficiary/index', $data);
          }else{
            $this->view('users/login', $data);
          }
         }


         
        public function profileBeneficiary(){

            if(isset($_SESSION['user_id'])){

                $id = $_SESSION['user_id'];

                $userdata = $this->beneficiaryModel->getUserData($id);
                $data = [
                'title' => 'Profile',
                'userdata' => $userdata         
            ];
      
            $this->view('users/beneficiary/profile_beneficiary', $data);
            }else{
                $this->view('users/login_beneficiary', $data);
            }
            
          }

        public function filteredHistoryBeneficiary($category,$filterId){

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
              $cat = $this->beneficiaryModel->getCategoryById($category);
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
            $donations = $this->beneficiaryModel->getFilteredHistory($id, $category,$filterId);
            $financials = $this->beneficiaryModel->getFinancialHistory($id);
            $non_financials = $this->beneficiaryModel->getNonFinancialHistory($id);
            $categories = $this->beneficiaryModel->getNonfinancialCategories();
        
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
      
          $this->view('users/beneficiary/filtered_history_beneficiary', $data);
        }  

        // public function markReceived(){

        //   if(isset($_SESSION['user_id'])){

        //       $id = $_SESSION['user_id'];

        //       $receive = $this->beneficiaryModel->markReceived($data);

        //       $data = [
        //       'status_title' => $status,
        //       'receive' => $receive         
        //   ];
    
        //   $this->view('users/beneficiary/donation_history_beneficiary', $data);
        //   }else{
        //       $this->view('users/index', $data);
        //   }
          
        // }


        // public function markReceived(){
        //   if($_SERVER['REQUEST_METHOD'] == 'POST'){
        //       // Sanitize POST data
        //       $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        //     $id = $_SESSION['user_id'];
        //     $donations = $this->beneficiaryModel->getFilteredHistory($id, $category,$filterId);
        //     // $financials = $this->beneficiaryModel->getFinancialHistory($id);
        //     // $non_financials = $this->beneficiaryModel->getNonFinancialHistory($id);
        //     // $categories = $this->beneficiaryModel->getNonfinancialCategories();
           
        //       $data = [             
        //       // 'status_title' => $status,
        //       'donations' => $donations,
        //       // 'financials' => $financials,
        //       // 'nfinancials' => $non_financials,
        //       // 'categories' => $categories
              
        //       ];

             
        //           if($this->beneficiaryModel->markReceived($data)){
        //               redirect('pages/donationHistoryBeneficiary');
        //           } else {
        //               die('Something went wrong');
        //           }
        //       } else {
        //           // Load view with errors
        //           $this->view('users/beneficiary/donation_history_beneficiary');
        //       }
        //   } 

        public function markReceived($id)
        {
            /*$c= $_SESSION['user_id'];
            $d =$this->schedulereqbenModel-> getDonId($c);*/
            // $this->beneficiaryModel->markReceivedDonation($id);
            if ($this->beneficiaryModel->markReceivedDonation($id)) {
                // flash('request_message', 'Request Accepted');
                redirect('pages/donationHistoryBeneficiary');
    // $this -> view('users/beneficiary/donation_req_ongoing', $data);

    
            } else {
                die('Something went wrong');
            }
        }
      
  
        
        
        
        public function feedback(){
            $data = [
              'title' => 'Feedback',
              'desc' => '',
              'feedback_err' => ''
            ];
      
            $this->view('users/beneficiary/feedback', $data);
          }

            //load all feedback page
        /**
         * @return void
         */
        public function all_feedback(){
            $data = [
              'title' => 'All Feedback'
            ];
      
            $this->view('users/beneficiary/all_feedback', $data);
          }
            //add feedback page
        /**
         * @return void
         */
        public function submit_feedback(){
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
                    if($this->beneficiaryModel->addFeedback($data)){
                        // flash('category_message', 'Category Added');
                        redirect('beneficiary/all_feedback');
                    } else {
                        die('Something went wrong');
                    }
                } else {
                    // Load view with errors
                    $this->view('users/beneficiary/feedback', $data);
                }
            } else {
                // Init data
                $data = [
                    'desc' => ''
                ];

                // Load view
                $this->view('users/beneficiary/feedback', $data);
            }
        }

        public function viewmoreHistoryBeneficiary($id){

          $image_name = $this->profileImage();
          $view = $this->beneficiaryModel->getHistoryDonor($id);
          $data = [
            'title' => 'Donation History',
            'prof_img' => $image_name,
            'view'=> $view
            
          ];
      
          $this->view('users/beneficiary/viewmore_history_beneficiary', $data);
        }


        // public function viewonFinancialRequest($id){

        //   // if(isset($_SESSION['user_id'])){

        //   //   $id = $_SESSION['user_id'];
        //    $requests = $this->beneficiaryModel->getRequests($id);
        //   $nfinancials = $this->beneficiaryModel->viewNonFinancialRequest($id);
            
        //     $data = [
        //       'title' => 'Donation Requests',
        //       'nfinancials' => $nfinancials,
        //      'requests' => $requests,
        //        'id' => $id   
  
        //     ];
         
        //     $this->view('users/beneficiary/view_nfin_req', $data);
        //     // }else{
        //     //   $this->view('users/login', $data);
        //     // }
          
          
        // }





        

        //load categories page
        
        public function categories(){
            $categories = $this->adminModel->getCategories();
            $data = [
              'title' => 'Donation Categories',
              'categories' => $categories
            ];
      
            $this -> view('users/admin/categories', $data);
          }

          //add method of categories
      
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

        //edit method of categories
       
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

        //delete method of categories
      
        public function deleteCategories($id){
                if($this->adminModel->deleteCategory($id)){
                    redirect('admin/categories');
                } else {
                    die('Something went wrong');
                }
        }

         


        /**
         * @return void
         */
        public function stats(){
          $data = [
              'title' => 'Statistics'
          ];

          $this->view('users/beneficiary/stats', $data);
      }


      public function profileImage(){
        if (isset($_SESSION['user_id'])) {
          $id = $_SESSION['user_id'];
          $userdata = $this->beneficiaryModel->getUserData($id);
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
      public function editProfileBeneficiary(){
        $districts = $this->userModel->getDistricts();
        if (isset($_SESSION['user_id'])) {
          $id = $_SESSION['user_id'];
          $user_type = $_SESSION['user_type'];
          $userdata = $this->beneficiaryModel->getUserData($id);
          $personaldata = $this->beneficiaryModel->getPersonalData($id, $user_type);
          $image_name = $this->profileImage();
          // $dist_name = $this->beneficiaryModel->getDistrictName($id, $user_type);
    
          $data = [
            'title' => 'Profile',
            'userdata' => $userdata,
            'personaldata' => $personaldata,
            'prof_img' => $image_name,
            // 'dist' => $dist_name,
            'districts' => $districts
          ];
    
          $this->view('users/beneficiary/edit_profile_beneficiary', $data);
        } else {
          $this->view('users/login', $data);
        }
      }




        public function changePasswordBeneficiary(){

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
                'otp_verify' => $otp_verify,
                'prof_img' => $image_name
            ];

            $error = false;
            $is_quit = false;
            $same = $this->beneficiaryModel->passwordChecker($data['new_password'], $id,$is_quit);
            $correct = $this->beneficiaryModel->passwordChecker($data['old_password'], $id,$is_quit);

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
      
                if ($this->beneficiaryModel->change_password($data, $id)) {
      
                  $email = new Email($user_email);
                  $email->sendVerificationEmail($user_email, $otp_code);
                  redirect('users/otp_verify');
                } else {
                  die('Something went wrong');
                }
              } else {
                // Load view with errors
                $this->view('users/beneficiary/change_password_beneficiary', $data);
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

              $this->view('users/beneficiary/change_password_beneficiary', $data);
             
            }

        }

         //delete profile
        /**
         * @param $id
         * @return void
         */
        public function deleteProfileBeneficiary($id){
          if($this->beneficiaryModel->deleteProfileBeneficiary($id)){
              redirect('beneficiary/index');
          } else {
              die('Something went wrong');
          }
  }
       

            public function addNewRequest()
            {
                if (!isLoggedIn()) {
                    redirect('users/login');
                }
                $this->view('users/beneficiary/addnewrequest');
            }


            


          //load request page
          public function allDonations(){
            if(isset($_SESSION['user_id'])){

              $id = $_SESSION['user_id'];

            $requests = $this->beneficiaryModel->getRequests($id);
            $financials = $this->beneficiaryModel->getFinancialRequest();
            $nfinancials = $this->beneficiaryModel->getNonFinancialRequest();
            
              $data = [
                'title' => 'Donation Requests',
                'requests' => $requests,
                'financials' => $financials,
                'nfinancials' => $nfinancials
              ];

              $this -> view('users/beneficiary/donation_req_all', $data);
            }else{
              $this->view('users/login', $data);
            }
          }

        //load request page
        public function donationPending(){
          if(isset($_SESSION['user_id'])){

            $id = $_SESSION['user_id'];

          $requests = $this->beneficiaryModel->getRequests($id);
          $financials = $this->beneficiaryModel->getFinancialRequest();
          $nfinancials = $this->beneficiaryModel->getNonFinancialRequest();
          
            $data = [
              'title' => 'Donation Requests',
              'requests' => $requests,
              'financials' => $financials,
              'nfinancials' => $nfinancials
            ];
      
            $this -> view('users/beneficiary/donation_req_pending', $data);
          }else{
            $this->view('users/login', $data);
          }
        }


        //view more page
        public function viewFinancialRequest($id){
          // if(isset($_SESSION['user_id'])){

          //   $d = $_SESSION['user_id'];
          $requests = $this->beneficiaryModel->getRequests($id);
            
          $financials = $this->beneficiaryModel->viewFinancialRequest($id);

          if(!isLoggedIn()){
            redirect('users/login');
        }
        
          $data = [
            'title' => 'Donation Requests',
            'financials' => $financials,
             'requests' => $requests,
            'id' => $id
          ];
    
          $this -> view('users/beneficiary/view_fin_req', $data);
        // }else{
        //   $this->view('users/login', $data);
        // }
        }



        public function viewNonFinancialRequest($id){

          // if(isset($_SESSION['user_id'])){

          //   $id = $_SESSION['user_id'];
           $requests = $this->beneficiaryModel->getRequests($id);
          $nfinancials = $this->beneficiaryModel->viewNonFinancialRequest($id);
            
            $data = [
              'title' => 'Donation Requests',
              'nfinancials' => $nfinancials,
             'requests' => $requests,
               'id' => $id   
  
            ];
         
            $this->view('users/beneficiary/view_nfin_req', $data);
            // }else{
            //   $this->view('users/login', $data);
            // }
          
          
        }


          //view update page
          public function viewUpFinancialRequest($id){
            // if(isset($_SESSION['user_id'])){
  
            //   $d = $_SESSION['user_id'];
            $requests = $this->beneficiaryModel->getRequests($id);
              
            $financials = $this->beneficiaryModel->viewFinancialRequest($id);
  
            if(!isLoggedIn()){
              redirect('users/login');
          }
          
            $data = [
              'title' => 'Donation Requests',
              'financials' => $financials,
               'requests' => $requests,
              'id' => $id
            ];
      
            $this -> view('users/beneficiary/fin_request', $data);
          // }else{
          //   $this->view('users/login', $data);
          // }
          }


   


            //delete method of categories
      
            public function deleteFinancialRequest($id){
              if($this->beneficiaryModel->deleteFinancialRequest($id)){
                  redirect('beneficiary/allDonations');
              } else {
                  die('Something went wrong');
              }
      }


          //delete method of categories
      
          public function deleteNonFinancialRequest($id){
            if($this->beneficiaryModel->deleteNonFinancialRequest($id)){
                redirect('beneficiary/allDonations');
            } else {
                die('Something went wrong');
            }
    }





        public function donationReject(){
          if(isset($_SESSION['user_id'])){

            $id = $_SESSION['user_id'];
  
            $requests = $this->beneficiaryModel->getRequests($id);
            $financials = $this->beneficiaryModel->getFinancialRequest();
            $nfinancials = $this->beneficiaryModel->getNonFinancialRequest();
            
              $data = [
                'title' => 'Donation Requests',
                'requests' => $requests,
                'financials' => $financials,
                'nfinancials' => $nfinancials
              ];
    
          $this -> view('users/beneficiary/donation_req_rejected', $data);
        }else{
            $this->view('users/login', $data);
          }

        }


        public function donationOngoing(){
          if(isset($_SESSION['user_id'])){

            $id = $_SESSION['user_id'];
  
            $requests = $this->beneficiaryModel->getRequests($id);
            $financials = $this->beneficiaryModel->getFinancialRequest();
            $nfinancials = $this->beneficiaryModel->getNonFinancialRequest();
            
              $data = [
                'title' => 'Donation Requests',
                'requests' => $requests,
                'financials' => $financials,
                'nfinancials' => $nfinancials
              ];
    
          $this -> view('users/beneficiary/donation_req_ongoing', $data);
        }else{
            $this->view('users/login', $data);
          }

        }



        public function donationCompleted(){
          if(isset($_SESSION['user_id'])){

            $id = $_SESSION['user_id'];
  
            $requests = $this->beneficiaryModel->getRequests($id);
            $financials = $this->beneficiaryModel->getFinancialRequest();
            $nfinancials = $this->beneficiaryModel->getNonFinancialRequest();
            
              $data = [
                'title' => 'Donation Requests',
                'requests' => $requests,
                'financials' => $financials,
                'nfinancials' => $nfinancials
              ];
    
          $this -> view('users/beneficiary/donation_req_completed', $data);
        }else{
            $this->view('users/login', $data);
          }

        }

        //add a new request
        public function addFinancialRequest(){

         // $categories = $this->beneficiaryModel->getCategories();

          if($_SERVER['REQUEST_METHOD'] == 'POST'){
              // Sanitize POST data
              $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

              $id = $_SESSION['user_id'];

              $data = [
                  'title' => trim($_POST['title']),
                  'name' => trim($_POST['name']),
                  'NIC' => trim($_POST['NIC']),
                  'amount' => trim($_POST['amount']),
                  'description' => trim($_POST['description']),
                  'contact' => trim($_POST['contact']),
                  'zipcode' => trim($_POST['zipcode']),
                  'duedate' => trim($_POST['duedate']),
                  'proof' => $_FILES['proof'],
                  'passbook' => $_FILES['passbook'],
                  'thumbnail' => $_FILES['thumbnail'],
                  'accnumber' => trim($_POST['accnumber']),
                  'bankname' => trim($_POST['bankname']),
                  'cat_id' => '1',
                  'titleErr' => '',
                  'nameErr' => '',
                  'NICErr' => '',
                  'amountErr' => '',
                  'descriptionErr' => '',
                  'contactErr' => '',
                  'zipcodeErr' => '',
                  'duedateErr' => '',
                  'proofErr' => '',
                 // 'user_idErr' => '',
                  // 'cat_idErr' => '',
                  'passbookErr' => '',
                  'accnumberErr' => '',
                  'banknameErr' => '',
                  'thumbnailErr' => '',
                //  'categories' => $categories,
                  'user_id' => $id
                ];

                

              if(empty($data['title'])){
                  $data['titleErr'] = 'Please enter title';
              }

              if(empty($data['name'])){
                $data['nameErr'] = 'Please enter name';
            }


              if(empty($data['amount'])){
                  $data['amountErr'] = 'Please enter amount';
              }

              if(empty($data['description'])){
                $data['descriptionErr'] = 'Please enter description';
            }

                          //Validate NIC
                          if (empty($data['NIC'])) {
                            $data['NICErr'] = 'Please enter NIC';
                            $error = true;
                        } else {
                            // Check NIC
                            $nic = new NIC_Validator($data['NIC']);
                            $validity = $nic->checkNIC($data['NIC']);
                            if (!$validity) {
                                $data['NICErr'] = 'Enter a valid NIC';
                                $error = true;
                            }
                            
                        }

                        if (empty($data['contact'])) {
                          $data['contactErr'] = 'Required';
                          $error = true;
                      } else if (strlen($data['contact']) != 10) {
                          $data['contactErr'] = 'Please enter a valid 10-digit phone number';
                          $error = true;
                      }
           

          if(empty($data['zipcode'])){
            $data['zipcodeErr'] = 'Please enter zipcode';
        }

              if(empty($data['duedate'])){
                  $data['duedateErr'] = 'Please enter duedate';
              }
  
               if(empty($data['accnumber'])){
                $data['accnumberErr'] = 'Please enter account number';
               }
  
               if(empty($data['bankname'])){
                $data['banknameErr'] = 'Please enter bank';
               }
       
               if(empty($data['thumbnail'])){
                $data['thumbnailErr'] = 'Please enter account number';
               }


                  //validate proof
                  if (!empty($_FILES['proof']['name'])) {
                    $img_name = $_FILES['proof']['name'];
                    $img_size = $_FILES['proof']['size'];
                    $tmp_name = $_FILES['proof']['tmp_name'];
                    $error = $_FILES['proof']['error'];

                    if ($error === 0) {
                        if ($img_size > 200000) {
                            $data['proofErr'] = "Sorry, your first image is too large.";
                        } else {
                            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION); //Extension type of image(jpg,png)
                            $img_ex_lc = strtolower($img_ex);

                            $allowed_exs = array("jpg", "jpeg", "png", "pdf");

                            if (in_array($img_ex_lc, $allowed_exs)) {
                                $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                                $img_upload_path = dirname(APPROOT) . '/public/uploads/' . $new_img_name;
                                move_uploaded_file($tmp_name, $img_upload_path);
                                $data['proof'] = $new_img_name;
                            } else {
                                $data['proofErr'] = "You can't upload files of this type";
                            }
                        }
                    } else {
                        $data['proofErr'] = "Unknown error occurred!";
                    }
                } else {
                    $data['proofErr'] = 'Please upload at least one image';
                }


                   //validate passbook
                   if (!empty($_FILES['passbook']['name'])) {
                    $img_name = $_FILES['passbook']['name'];
                    $img_size = $_FILES['passbook']['size'];
                    $tmp_name = $_FILES['passbook']['tmp_name'];
                    $error = $_FILES['passbook']['error'];

                    if ($error === 0) {
                        if ($img_size > 200000) {
                            $data['passbookErr'] = "Sorry, your first image is too large.";
                        } else {
                            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION); //Extension type of image(jpg,png)
                            $img_ex_lc = strtolower($img_ex);

                            $allowed_exs = array("jpg", "jpeg", "png", "pdf");

                            if (in_array($img_ex_lc, $allowed_exs)) {
                                $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                                $img_upload_path = dirname(APPROOT) . '/public/uploads/' . $new_img_name;
                                move_uploaded_file($tmp_name, $img_upload_path);
                                $data['passbook'] = $new_img_name;
                            } else {
                                $data['passbookErr'] = "You can't upload files of this type";
                            }
                        }
                    } else {
                        $data['passbookErr'] = "Unknown error occurred!";
                    }
                } else {
                    $data['passbookErr'] = 'Please upload at least one image';
                }



                 //validate thumbnail
                 if (!empty($_FILES['thumbnail']['name'])) {
                  $img_name = $_FILES['thumbnail']['name'];
                  $img_size = $_FILES['thumbnail']['size'];
                  $tmp_name = $_FILES['thumbnail']['tmp_name'];
                  $error = $_FILES['thumbnail']['error'];

                  if ($error === 0) {
                      if ($img_size > 200000) {
                          $data['thumbnailErr'] = "Sorry, your first image is too large.";
                      } else {
                          $img_ex = pathinfo($img_name, PATHINFO_EXTENSION); //Extension type of image(jpg,png)
                          $img_ex_lc = strtolower($img_ex);

                          $allowed_exs = array("jpg", "jpeg", "png", "pdf");

                          if (in_array($img_ex_lc, $allowed_exs)) {
                              $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                              $img_upload_path = dirname(APPROOT) . '/public/uploads/' . $new_img_name;
                              move_uploaded_file($tmp_name, $img_upload_path);
                              $data['thumbnail'] = $new_img_name;
                          } else {
                              $data['thumbnailErr'] = "You can't upload files of this type";
                          }
                      }
                  } else {
                      $data['thumbnailErr'] = "Unknown error occurred!";
                  }
              } else {
                  $data['thumbnailErr'] = 'Please upload at least one image';
              }


              // Make sure no errors
              if(empty($data['descriptionErr']) && empty($data['titleErr']) && empty($data['amountErr']) && empty($data['duedateErr']) && empty($data['nameErr'])  && empty($data['NICErr']) && empty($data['zipcodeErr']) && empty($data['contactErr']) && empty($data['accnumberErr']) && empty($data['banknameErr']) && empty($data['thumbnailErr']) && empty($data['passbookErr']) && empty($data['proofErr'])){
                  // Validated
                 
                  if($this->beneficiaryModel->addFinancialRequest($data)){
                    redirect('beneficiary/allDonations');
                } else {
                    die('Something went wrong');
                }
                  
              }else {
                  // Load view with errors
                  $this->view('users/beneficiary/financial_request', $data);

                 }

          }else{
              $data = [

                  'title' => '',
                  'name' => '',
                  'user_id' => '',
                  'cat_id' => '',
                  'NIC' => '',
                  'amount' => '',
                  'description' => '',
                  'contact' => '',
                  'zipcode' => '',
                  'duedate' => '',
                  'proof' => '',
                  'passbook' => '',
                  'accnumber' => '',
                  'bankname' => '',
                  'thumbnail' => '',
                  'titleErr' => '',
                  'nameErr' => '',
                  'NICErr' => '',
                  //'categoryErr' => '',
                  'descriptionErr' => '',
                  'amountErr' => '',
                  'contactErr' => '',
                  'zipcodeErr' => '',
                 // 'publisheddateErr' => '',
                  'duedateErr' => '',
                 // 'user_idErr' => '',
                  'passbookErr' => '',
                  'proofErr' => '',
                  'accnumberErr' => '',
                  'banknameErr' => '',
                  'thumbnailErr' => '',
                  // 'categories' => $categories
                ];
          
                $this -> view('users/beneficiary/financial_request', $data);
          }
         

        }


                //add a new request
                public function addNonFinancialRequest(){

                   $categories = $this->beneficiaryModel->getNonFinancialCategories();
                 
         
                   if($_SERVER['REQUEST_METHOD'] == 'POST'){
                       // Sanitize POST data
                       $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
         
                       $id = $_SESSION['user_id'];
                      //  $ref_num = rand(100000, 999999);

         
                       $data = [

                           'title' => trim($_POST['title']),
                           'name' => trim($_POST['name']),
                           'NIC' => trim($_POST['NIC']),
                           'quantity' => trim($_POST['quantity']),
                           'description' => trim($_POST['description']),
                           'contact' => trim($_POST['contact']),
                           'zipcode' => trim($_POST['zipcode']),
                           'proof' => $_FILES['proof'],
                           'thumbnail' => $_FILES['thumbnail'],
                           'duedate' => trim($_POST['duedate']),
                           'cat_id' => trim($_POST['cat_id']),
                           'item' => trim($_POST['item']),
                          //  'ref_num' => $ref_num,
                           'titleErr' => '',
                           'nameErr' => '',
                           'NICErr' => '',
                           'quantityErr' => '',
                           'descriptionErr' => '',
                           'contactErr' => '',
                           'zipcodeErr' => '',
                           'proofErr' => '',
                           'duedateErr' => '',
                          // 'user_idErr' => '',
                           'cat_idErr' => '',
                           'thumbnailErr' => '',
                          'categories' => $categories,
                           'user_id' => $id
                         ];
         
                         if(empty($data['description'])){
                           $data['descriptionErr'] = 'Please enter description';
                       }
         
                       if(empty($data['title'])){
                           $data['titleErr'] = 'Please enter title';
                       }
         
                       if(empty($data['quantity'])  || $data['quantity'] <= 0){
                           $data['quantityErr'] = 'Please enter valid quantity';
                       }
         
                       if(empty($data['duedate'])){
                           $data['duedateErr'] = 'Please enter duedate';
                       }
         
                       if(empty($data['name'])){
                           $data['nameErr'] = 'Please enter name';
                       }
         
                                    //Validate NIC
                        if (empty($data['NIC'])) {
                          $data['NICErr'] = 'Please enter NIC';
                          $error = true;
                      } else {
                          // Check NIC
                          $nic = new NIC_Validator($data['NIC']);
                          $validity = $nic->checkNIC($data['NIC']);
                          if (!$validity) {
                              $data['NICErr'] = 'Enter a valid NIC';
                              $error = true;
                          }
                          
                      }
                    
                       if(empty($data['zipcode'])){
                           $data['zipcodeErr'] = 'Please enter zipcode';
                       }
         
                      //  if(empty($data['contact'])){
                      //      $data['contactErr'] = 'Please enter contact';
                      //  }

                      if (empty($data['contact'])) {
                        $data['contactErr'] = 'Required';
                        $error = true;
                    } else if (strlen($data['contact']) != 10) {
                        $data['contactErr'] = 'Please enter a valid 10-digit phone number';
                        $error = true;
                    }
         
                      if(empty($data['cat_id'])){
                       $data['cat_idErr'] = 'Please enter cat_id';
                      }
                      if(empty($data['item'])){
                        $data['itemErr'] = 'Please enter item';
                       }

                       //validate proof
                  if (!empty($_FILES['proof']['name'])) {
                    $img_name = $_FILES['proof']['name'];
                    $img_size = $_FILES['proof']['size'];
                    $tmp_name = $_FILES['proof']['tmp_name'];
                    $error = $_FILES['proof']['error'];

                    if ($error === 0) {
                        if ($img_size > 200000) {
                            $data['proofErr'] = "Sorry, your first image is too large.";
                        } else {
                            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION); //Extension type of image(jpg,png)
                            $img_ex_lc = strtolower($img_ex);

                            $allowed_exs = array("jpg", "jpeg", "png", "pdf");

                            if (in_array($img_ex_lc, $allowed_exs)) {
                                $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                                $img_upload_path = dirname(APPROOT) . '/public/uploads/' . $new_img_name;
                                move_uploaded_file($tmp_name, $img_upload_path);
                                $data['proof'] = $new_img_name;
                            } else {
                                $data['proofErr'] = "You can't upload files of this type";
                            }
                        }
                    } else {
                        $data['proofErr'] = "Unknown error occurred!";
                    }
                } else {
                    $data['proofErr'] = 'Please upload at least one image';
                }



                //validate thumbnail
                if (!empty($_FILES['thumbnail']['name'])) {
                  $img_name = $_FILES['thumbnail']['name'];
                  $img_size = $_FILES['thumbnail']['size'];
                  $tmp_name = $_FILES['thumbnail']['tmp_name'];
                  $error = $_FILES['thumbnail']['error'];

                  if ($error === 0) {
                      if ($img_size > 200000) {
                          $data['thumbnailErr'] = "Sorry, your first image is too large.";
                      } else {
                          $img_ex = pathinfo($img_name, PATHINFO_EXTENSION); //Extension type of image(jpg,png)
                          $img_ex_lc = strtolower($img_ex);

                          $allowed_exs = array("jpg", "jpeg", "png", "pdf");

                          if (in_array($img_ex_lc, $allowed_exs)) {
                              $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                              $img_upload_path = dirname(APPROOT) . '/public/uploads/' . $new_img_name;
                              move_uploaded_file($tmp_name, $img_upload_path);
                              $data['thumbnail'] = $new_img_name;
                          } else {
                              $data['thumbnailErr'] = "You can't upload files of this type";
                          }
                      }
                  } else {
                      $data['thumbnailErr'] = "Unknown error occurred!";
                  }
              } else {
                  $data['thumbnailErr'] = 'Please upload at least one image';
              }
    
                       // Make sure no errors
                       if(empty($data['descriptionErr']) && empty($data['titleErr']) && empty($data['quantityErr']) && empty($data['duedateErr']) && empty($data['nameErr'])  && empty($data['NICErr']) && empty($data['zipcodeErr']) && empty($data['contactErr']) && empty($data['cat_idErr']) && empty($data['itemErr']) && empty($data['thumbnailErr']) && empty($data['proofErr'])){
                           // Validated
                           if($this->beneficiaryModel->addNonFinancialRequest($data)){
                               redirect('beneficiary/allDonations');
                           } else {
                               die('Something went wrong');
                           }
                       } else {
                           // Load view with errors
                           $this->view('users/beneficiary/non_financial_request', $data);
                       }
         
                   }else{
                       $data = [
                          
                           'title' => '',
                           'name' => '',
                           'user_id' => '',
                           'cat_id' => '',
                           'item' => '',
                           'categories' => $categories,
                           'NIC' => '',
                           'description' => '',
                           'quantity' => '',
                           'duedate' => '',
                           'zipcode' => '',
                           'contact' => '',
                           'thumbnail' => '',
                           'proof' => '',
                           'titleErr' => '',
                           'nameErr' => '',
                           'NICErr' => '',
                           //'categoryErr' => '',
                           'descriptionErr' => '',
                           'quantityErr' => '',
                          // 'typeErr' => '',
                           'contactErr' => '',
                           'zipcodeErr' => '',
                           'duedateErr' => '',
                           'user_idErr' => '',
                           'cat_idErr' => '',
                           'itemErr' => '',
                           'thumbnailErr' => '',
                           'proofErr' => '',
                          
                         ];
                   
                         $this -> view('users/beneficiary/non_financial_request', $data);
                   }
                  }

                         //view update page
        public function viewUpNonFinancialRequest($id){

          // if(isset($_SESSION['user_id'])){

          //   $id = $_SESSION['user_id'];
           $requests = $this->beneficiaryModel->getRequests($id);
          $nfinancials = $this->beneficiaryModel->viewNonFinancialRequest($id);
            
            $data = [
              'title' => 'Donation Requests',
              'nfinancials' => $nfinancials,
             'requests' => $requests,
              //  'id' => $id   
  
            ];
         
            $this->view('users/beneficiary/nfin_request', $data);
            // }else{
            //   $this->view('users/login', $data);
            // }
          
          
        }


         public function resubmitNFinancialRequest($id){
                   
          $nfinancials = $this->beneficiaryModel->viewNonFinancialRequest($id);
                    
                
                      $data = [
                        'nfinancials' => $nfinancials
                      ];
                
                      $this->view('users/beneficiary/resubmit_nfinancial', $data);
                    
                  }



                  public function resubmitFinancialRequest($id){
                   
                    $financials = $this->beneficiaryModel->viewFinancialRequest($id);
                              
                          
                                $data = [
                                  'financials' => $financials
                                ];
                          
                                $this->view('users/beneficiary/resubmit_financial', $data);
                              
                            }


                         //edit method of categories
       
        public function updateNonFinancialDueDate($id){
          if($_SERVER['REQUEST_METHOD'] == 'POST'){
              // Sanitize POST data
              $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

              $data = [
                  'id' => $id,
                  'due_date' => trim($_POST['due_date']),
                  
              ];

            
                  // Validated
                  if($this->beneficiaryModel->editDueDate($data)){
                      // flash('category_message', 'Category Added');
                      redirect('beneficiary/allDonations');
                  } else {
                      die('Something went wrong');
                  }
              
          } 
      }







                  // public function updateNonFinancialRequest(){
                  //   $districts = $this->userModel->getDistricts();
                  //   if (isset($_SESSION['user_id'])) {
                  //     $id = $_SESSION['user_id'];
                  //     $user_type = $_SESSION['user_type'];
                  //     $userdata = $this->beneficiaryModel->getUserData($id);
                  //     $personaldata = $this->beneficiaryModel->getPersonalData($id, $user_type);
                  //     $image_name = $this->profileImage();
                  //     $dist_name = $this->beneficiaryModel->getDistrictName($id, $user_type);
                
                  //     $data = [
                  //       'title' => 'Profile',
                  //       'userdata' => $userdata,
                  //       'personaldata' => $personaldata,
                  //       'prof_img' => $image_name,
                  //       'dist' => $dist_name,
                  //       'districts' => $districts
                  //     ];
                
                  //     $this->view('users/beneficiary/edit_profile_beneficiary', $data);
                  //   } else {
                  //     $this->view('users/login', $data);
                  //   }
                  // }


                  
                  // public function updateNonFinancialRequest($id){

                  //   $categories = $this->beneficiaryModel->getNonFinancialCategories();
                
                  //  $nfinancials = $this->beneficiaryModel->viewNonFinancialRequest($id);
  
                    
            
                  //     if($_SERVER['REQUEST_METHOD'] == 'POST'){
                  //         // Sanitize POST data
                  //         $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
                  //         // $id = $_SESSION['user_id'];
      
                  //         $data = [
                  //          'categories' => $categories,
                  //          ' nfinancials' =>  $nfinancials,
                           
                  //         ];


                  //         $this->view('users/beneficiary/nfin_request', $data);
                  //       } else {
                  //         $this->view('users/login', $data);
                  //       }
                  //     }

                   
               

                  public function updateNonFinancialRequest($id){

                  $categories = $this->beneficiaryModel->getNonFinancialCategories();
              
                 $nfinancials = $this->beneficiaryModel->viewNonFinancialRequest($id);

                  
          
                    if($_SERVER['REQUEST_METHOD'] == 'POST'){
                        // Sanitize POST data
                        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
          
                        $user_id = $_SESSION['user_id'];
    
                        $data = [
                         
                            'title' => trim($_POST['title']),
                            'name' => trim($_POST['name']),
                            'NIC' => trim($_POST['NIC']),
                            'quantity' => trim($_POST['quantity']),
                            'description' => trim($_POST['description']),
                            'contact' => trim($_POST['contact']),
                            'zipcode' => trim($_POST['zipcode']),
                            // 'proof_document' => trim($_POST['proof_document']),
                            'duedate' => trim($_POST['duedate']),
                            'nfinancials' => $nfinancials,
                            // 'cat_id' => trim($_POST['cat_id']),
                            // 'thumbnail' => trim($_POST['thumbnail']),
                           'categories' => $categories,
                            //  'requests' => $requests,
                            // 'requests' => $requests,
                          //   'titleErr' => '',
                          //   'nameErr' => '',
                          //   'NICErr' => '',
                          //   'quantityErr' => '',
                          //   'descriptionErr' => '',
                          //   'contactErr' => '',
                          //   'zipcodeErr' => '',
                          //   // 'proofErr' => '',
                          //   'duedateErr' => '',
                          //  // 'user_idErr' => '',
                          //   'cat_idErr' => '',
                            // 'thumbnailErr' => '',
                               'user_id' => $user_id
                          ];

              //             if(empty($data['description'])){
              //               $data['descriptionErr'] = 'Please enter description';
              //           }
          
              //           if(empty($data['title'])){
              //               $data['titleErr'] = 'Please enter title';
              //           }
          
              //           if(empty($data['quantity'])  || $data['quantity'] <= 0){
              //               $data['quantityErr'] = 'Please enter valid quantity';
              //           }
          
              //           if(empty($data['duedate'])){
              //               $data['duedateErr'] = 'Please enter duedate';
              //           }
          
              //           if(empty($data['name'])){
              //               $data['nameErr'] = 'Please enter name';
              //           }
          
              //                        //Validate NIC
              //            if (empty($data['NIC'])) {
              //              $data['NICErr'] = 'Please enter NIC';
              //              $error = true;
              //          } else {
              //              // Check NIC
              //              $nic = new NIC_Validator($data['NIC']);
              //              $validity = $nic->checkNIC($data['NIC']);
              //              if (!$validity) {
              //                  $data['NICErr'] = 'Enter a valid NIC';
              //                  $error = true;
              //              }
                           
              //          }
                     
              //           if(empty($data['zipcode'])){
              //               $data['zipcodeErr'] = 'Please enter zipcode';
              //           }
          
              //          //  if(empty($data['contact'])){
              //          //      $data['contactErr'] = 'Please enter contact';
              //          //  }
 
              //          if (empty($data['contact'])) {
              //            $data['contactErr'] = 'Required';
              //            $error = true;
              //        } else if (strlen($data['contact']) != 10) {
              //            $data['contactErr'] = 'Please enter a valid 10-digit phone number';
              //            $error = true;
              //        }
          
              //          if(empty($data['cat_id'])){
              //           $data['cat_idErr'] = 'Please enter cat_id';
              //          }
              //          if(empty($data['item'])){
              //            $data['itemErr'] = 'Please enter item';
              //           }
 
              //           //validate proof
              //      if (!empty($_FILES['proof']['name'])) {
              //        $img_name = $_FILES['proof']['name'];
              //        $img_size = $_FILES['proof']['size'];
              //        $tmp_name = $_FILES['proof']['tmp_name'];
              //        $error = $_FILES['proof']['error'];
 
              //        if ($error === 0) {
              //            if ($img_size > 200000) {
              //                $data['proofErr'] = "Sorry, your first image is too large.";
              //            } else {
              //                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION); //Extension type of image(jpg,png)
              //                $img_ex_lc = strtolower($img_ex);
 
              //                $allowed_exs = array("jpg", "jpeg", "png", "pdf");
 
              //                if (in_array($img_ex_lc, $allowed_exs)) {
              //                    $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
              //                    $img_upload_path = dirname(APPROOT) . '/public/uploads/' . $new_img_name;
              //                    move_uploaded_file($tmp_name, $img_upload_path);
              //                    $data['proof'] = $new_img_name;
              //                } else {
              //                    $data['proofErr'] = "You can't upload files of this type";
              //                }
              //            }
              //        } else {
              //            $data['proofErr'] = "Unknown error occurred!";
              //        }
              //    } else {
              //        $data['proofErr'] = 'Please upload at least one image';
              //    }
 
 
 
              //    //validate thumbnail
              //    if (!empty($_FILES['thumbnail']['name'])) {
              //      $img_name = $_FILES['thumbnail']['name'];
              //      $img_size = $_FILES['thumbnail']['size'];
              //      $tmp_name = $_FILES['thumbnail']['tmp_name'];
              //      $error = $_FILES['thumbnail']['error'];
 
              //      if ($error === 0) {
              //          if ($img_size > 200000) {
              //              $data['thumbnailErr'] = "Sorry, your first image is too large.";
              //          } else {
              //              $img_ex = pathinfo($img_name, PATHINFO_EXTENSION); //Extension type of image(jpg,png)
              //              $img_ex_lc = strtolower($img_ex);
 
              //              $allowed_exs = array("jpg", "jpeg", "png", "pdf");
 
              //              if (in_array($img_ex_lc, $allowed_exs)) {
              //                  $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
              //                  $img_upload_path = dirname(APPROOT) . '/public/uploads/' . $new_img_name;
              //                  move_uploaded_file($tmp_name, $img_upload_path);
              //                  $data['thumbnail'] = $new_img_name;
              //              } else {
              //                  $data['thumbnailErr'] = "You can't upload files of this type";
              //              }
              //          }
              //      } else {
              //          $data['thumbnailErr'] = "Unknown error occurred!";
              //      }
              //  } else {
              //      $data['thumbnailErr'] = 'Please upload at least one image';
              //  }
     
              //           // Make sure no errors
              //           if(empty($data['descriptionErr']) && empty($data['titleErr']) && empty($data['quantityErr']) && empty($data['duedateErr']) && empty($data['nameErr'])  && empty($data['NICErr']) && empty($data['zipcodeErr']) && empty($data['contactErr']) && empty($data['cat_idErr']) && empty($data['itemErr']) && empty($data['thumbnailErr']) && empty($data['proofErr'])){
              //               // Validated
                            if($this->beneficiaryModel->updateNonFinancialRequest($data)){
                            // $this->view('users/beneficiary/view_nfin_request', $data);
                            redirect('beneficiary/allDonations');
                            //  redirect('beneficiary/viewFinancialRequest/'.$id);
                            } else {
                                die('Something went wrong');
                            }
                        // } else {
                        //     // Load view with errors
                        //     $this->view('users/beneficiary/nfin_request', $data);
                        // }
          
                   
                   
                  }else{
                    $data = [
                       
                        'title' => '',
                        'name' => '',
                        'user_id' => '',
                        'cat_id' => '',
                        'item' => '',
                        'categories' => $categories,
                        'NIC' => '',
                        'description' => '',
                        'quantity' => '',
                        'duedate' => '',
                        'zipcode' => '',
                        'contact' => '',
                        'thumbnail' => '',
                        'proof' => '',
                      //   'titleErr' => '',
                      //   'nameErr' => '',
                      //   'NICErr' => '',
                      //   //'categoryErr' => '',
                      //   'descriptionErr' => '',
                      //   'quantityErr' => '',
                      //  // 'typeErr' => '',
                      //   'contactErr' => '',
                      //   'zipcodeErr' => '',
                      //   'duedateErr' => '',
                      //   'user_idErr' => '',
                      //   'cat_idErr' => '',
                      //   'itemErr' => '',
                        // 'thumbnailErr' => '',
                        // 'proofErr' => '',
                       
                      ];
                
                      $this -> view('users/beneficiary/non_financial_request', $data);
                }
               }
              




                   
        //add a new request
        public function updateFinancialRequest($id){

          // $this->beneficiaryModel->viewFinancialRequest($id);
 
           if($_SERVER['REQUEST_METHOD'] == 'POST'){
               // Sanitize POST data
               $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
 
               $user_id = $_SESSION['user_id'];
               $financials = $this->beneficiaryModel->viewFinancialRequest($id);
 
               $data = [
                   'title' => trim($_POST['title']),
                   'name' => trim($_POST['name']),
                   'NIC' => trim($_POST['NIC']),
                   'amount' => trim($_POST['amount']),
                   'description' => trim($_POST['description']),
                   'contact' => trim($_POST['contact']),
                   'zipcode' => trim($_POST['zipcode']),
                   'duedate' => trim($_POST['duedate']),
                   'proof' => $_FILES['proof'],
                   'passbook' => $_FILES['passbook'],
                   'thumbnail' => $_FILES['thumbnail'],
                   'accnumber' => trim($_POST['accnumber']),
                   'bankname' => trim($_POST['bankname']),
                   'cat_id' => '1',
                   'financials'=>$financials,
                   'user_id' => $user_id
                 ];
 

                   if($this->beneficiaryModel->updateFinancialRequest($data)){
                    //  $this->view('users/beneficiary/view_fin_request', $data);
                      redirect('beneficiary/allDonations');
                   } else {
                       die('Something went wrong');
                   }
               } else {
                   // Load view with errors
                   $this->view('users/beneficiary/fin_request', $data);
               }
 
         }


     
 
 
                    

                //  Calendar-----------------------------------------------------------------------------------------------------------



              public function viewReservation(){
                

                $reservations = $this->beneficiaryModel->getReservations();
               
                  $data = [
                    'title' => 'Donation Requests',
                    'reservations' => $reservations,
                    
                  ];

                  $this -> view('users/beneficiary/reservations', $data);
               
              }


              public function approveReservation($id)
              {
                  /*$c= $_SESSION['user_id'];
                  $d =$this->schedulereqbenModel-> getDonId($c);*/
                  $this->beneficiaryModel->getRequestDetails($id);
                  if ($this->beneficiaryModel->acceptRequest($id)) {
                      flash('request_message', 'Request Accepted');
                      redirect('beneficiary/viewReservation');
          // $this -> view('users/beneficiary/donation_req_ongoing', $data);

          
                  } else {
                      die('Something went wrong');
                  }
              }

              public function rejectReservation($id){
                if($this->beneficiaryModel->rejectRequest($id)){
                    redirect('beneficiary/viewReservation');
                } else {
                    die('Something went wrong');
                }
        }
          


              public function makeReservation($id){
      
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING); 
                // $type = $_SESSION['user_type'];
                $id = $_SESSION['user_id'];
                // $districts = $this->userModel->getDistricts();
            $userData = $this->beneficiaryModel->getPersonalData($id,5);

        
                // Init data
                $data =[

                  'meal_type' =>trim($_POST['meal_type']),
                  // 'status' => '',
                  // 'don_id' => $id,
                  'ben_id' => $id,
                  'date' => trim($_POST['date']),
                  'month' => trim($_POST['month']),
                  'year' => trim($_POST['year']),
                  'quantity' => trim($_POST['quantity']),


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
        
                if($this->beneficiaryModel->makeReservation($data)){
                redirect('beneficiary/viewCalendar');
              }else{
                die('Something went wrong');
                }
            
          }

          public function viewCalendar(){
            if(isset($_SESSION['user_id'])){

              $id = $_SESSION['user_id'];
  
            $userData = $this->beneficiaryModel->getPersonalData($id,5);
            $reservations = $this->beneficiaryModel->getCalendar($id);
            // $acceptedreservations = $this->beneficiaryModel->getAcceptedReservations();
            

  
        if(!isLoggedIn()){
            redirect('users/login');
        }
      $image_name = $this->profileImage();
      $data = [
        'title' => 'Donation Requests',
        'prof_img' => $image_name, 
        'user_data' => $userData,
        'reservations' => $reservations,
        'id'=>$id,
        // 'acceptedreservations' => $acceptedreservations,
        // 'breakfast' => $breakfast,
        // 'lunch' => $lunch,
        // 'dinner' => $dinner
      ];
  
      $this->view('users/beneficiary/calendar', $data);
      
    } else {
      $this->view('users/login', $data);
    }
        }

        public function reservationsOfADay($day, $month, $year){
          $breakfast = $this->beneficiaryModel->getBreakfast($day, $month, $year);
            $lunch = $this->beneficiaryModel->getLunch($day, $month, $year);
            $dinner = $this->beneficiaryModel->getDinner($day, $month, $year);

            $data = [
              'breakfast' => $breakfast,
              'lunch' => $lunch,
              'dinner' => $dinner
            ];

            $this->view('users/beneficiary/viewCalendarDetails', $data);
        }

      // public function viewAcceptedReservation()
      //         {
      //           if(isset($_SESSION['user_id'])){

      //             $id = $_SESSION['user_id'];
      //             // $reservations = $this->beneficiaryModel->getAcceptedReservations();
      //             $breakfast = $this->beneficiaryModel->getBreakfast();
      //       $lunch = $this->beneficiaryModel->getLunch();
      //       $dinner = $this->beneficiaryModel->getDinner();
      //       if(!isLoggedIn()){
      //         redirect('users/login');
      //     }
      //             $data = [
      //                 // 'reservations' => $reservations
      //                 // 'id'=>$id,
      //                 // 'acceptedreservations' => $acceptedreservations,
      //                 'breakfast' => $breakfast,
      //                 'lunch' => $lunch,
      //                 'dinner' => $dinner
      //             ];
          
      //             $this->view('users/beneficiary/calendar', $data);
      //           }else {
      //           $this->view('users/login', $data);
      //         }
      //       }
                  





// public function get_meals(){
//     $requests = $this->beneficiaryModel->getAllRequests();
//     $data = [
//         'requests' => $requests,
//     ];
//     echo json_encode($data);
//     }  
                 
    }

    