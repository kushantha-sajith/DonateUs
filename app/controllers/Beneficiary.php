<?php

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

          
        public function donationHistoryBeneficiary(){

          if(isset($_SESSION['user_id'])){

            $id = $_SESSION['user_id'];
          $records = $this->beneficiaryModel->getDonationHistory($id);
      
            if(!isLoggedIn()){
                redirect('users/login');
            }
          // $image_name = $this->profileImage();
          $data = [
            'title' => 'Donation History',
            // 'prof_img' => $image_name,
            'records' => $records
          ];
      
          $this->view('users/beneficiary/donation_history_beneficiary', $data);
        }else{
          $this->view('users/login', $data);
        }
        }



          public function filteredHistoryBeneficiary($category){

            if(isset($_SESSION['user_id'])){

              $id = $_SESSION['user_id'];
            $records = $this->beneficiaryModel->getFilteredHistory($id, $category);
    
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
            // $image_name = $this->profileImage();
            $data = [
              'title' => 'Donation History',
              // 'prof_img' => $image_name,
              'records' => $records,
              'cat_title' => $cat
            ];
        
            $this->view('users/beneficiary/filtered_history_beneficiary', $data);
          }else{
            $this->view('users/login', $data);
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
          $dist_name = $this->beneficiaryModel->getDistrictName($id, $user_type);
    
          $data = [
            'title' => 'Profile',
            'userdata' => $userdata,
            'personaldata' => $personaldata,
            'prof_img' => $image_name,
            'dist' => $dist_name,
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
       



        //load request page
        public function donationRequest(){
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
      
            $this -> view('users/beneficiary/donation_request', $data);
          }else{
            $this->view('users/login', $data);
          }
        }


        //view more page
        public function viewFinancialRequest(){
          if(isset($_SESSION['user_id'])){

            $id = $_SESSION['user_id'];
            
          $financials = $this->beneficiaryModel->viewFinancialRequest($id);
        
          $data = [
            'title' => 'Donation Requests',
            'financials' => $financials,
          ];
    
          $this -> view('users/beneficiary/view_fin_req', $data);
        }else{
          $this->view('users/login', $data);
        }
        }



        public function viewNonFinancialRequest(){

          if(isset($_SESSION['user_id'])){

            $id = $_SESSION['user_id'];

          $nfinancials = $this->beneficiaryModel->viewNonFinancialRequest($id);
            
            $data = [
              'title' => 'Donation Requests',
              'nfinancials' => $nfinancials,
              // 'id' => $id   
  
            ];
         
            $this->view('users/beneficiary/view_nfin_req', $data);
            }else{
              $this->view('users/login', $data);
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
                  // 'id' => $id,
                  'title' => trim($_POST['title']),
                  'name' => trim($_POST['name']),
                  'NIC' => trim($_POST['NIC']),
                  'amount' => trim($_POST['amount']),
                  'description' => trim($_POST['description']),
                  'contact' => trim($_POST['contact']),
                  'city' => trim($_POST['city']),
                  'duedate' => trim($_POST['duedate']),
                  // 'proof' => trim($_POST['proof']),
                 // 'img2' => trim($_POST['img2']),
                  //'img3' => trim($_POST['img3']),
                  //'cat_id' => trim($_POST['cat_id']),
                  // 'passbook' => trim($_POST['passbook']),
                  'accnumber' => trim($_POST['accnumber']),
                  'bankname' => trim($_POST['bankname']),
                  'titleErr' => '',
                  'nameErr' => '',
                  'NICErr' => '',
                  'amountErr' => '',
                  'descriptionErr' => '',
                  'contactErr' => '',
                  'cityErr' => '',
                  'duedateErr' => '',
                  'proofErr' => '',
                 // 'img2Err' => '',
                 // 'img3Err' => '',  
                 // 'user_idErr' => '',
                  // 'cat_idErr' => '',
                  'passbookErr' => '',
                  'accnumberErr' => '',
                  'banknameErr' => '',
                //  'categories' => $categories,
                  'user_id' => $id
                ];

                

              if(empty($data['title'])){
                  $data['titleErr'] = 'Please enter title';
              }

              if(empty($data['name'])){
                $data['nameErr'] = 'Please enter name';
            }

            if(empty($data['NIC'])){
              $data['NICErr'] = 'Please enter NIC';
          }


              if(empty($data['amount'])){
                  $data['amountErr'] = 'Please enter amount';
              }

              if(empty($data['description'])){
                $data['descriptionErr'] = 'Please enter description';
            }

            if(empty($data['contact'])){
              $data['contactErr'] = 'Please enter contact';
          }

          if(empty($data['city'])){
            $data['cityErr'] = 'Please enter city';
        }

              if(empty($data['duedate'])){
                  $data['duedateErr'] = 'Please enter duedate';
              }

              // if(empty($data['proof'])){
              //   $data['proofErr'] = 'Please enter image';
              //  }

              //  if(empty($data['passbook'])){
              //   $data['passbookErr'] = 'Please enter image';
              //  }
  
               if(empty($data['accnumber'])){
                $data['accnumberErr'] = 'Please enter account number';
               }
  
               if(empty($data['bankname'])){
                $data['banknameErr'] = 'Please enter bank';
               }
       

             

              // Make sure no errors
              if(empty($data['descriptionErr']) && empty($data['titleErr']) && empty($data['amountErr']) && empty($data['duedateErr']) && empty($data['nameErr'])  && empty($data['NICErr']) && empty($data['cityErr']) && empty($data['contactErr']) && empty($data['accnumberErr']) && empty($data['banknameErr'])){
                  // Validated
                  if($this->beneficiaryModel->addFinancialRequest($data)){
                      redirect('beneficiary/donationRequest');
                  } else {
                      die('Something went wrong');
                  }
              } else {
                  // Load view with errors
                  $this->view('users/beneficiary/financial_request', $data);
              }

          }else{
              $data = [
                 /* 'id' => '',*/
                  'title' => '',
                  'name' => '',
                  'user_id' => '',
                  //'cat_id' => '',
                  'NIC' => '',
                  'amount' => '',
                  'description' => '',
                  'contact' => '',
                  'city' => '',
                  'duedate' => '',
                  'proof' => '',
                  'passbook' => '',
                  'accnumber' => '',
                  'bankname' => '',
                 // 'img2' => '',
              //  'img3' => '',
                  'titleErr' => '',
                  'nameErr' => '',
                  'NICErr' => '',
                  //'categoryErr' => '',
                  'descriptionErr' => '',
                  'amountErr' => '',
                 // 'typeErr' => '',
                  'contactErr' => '',
                  'cityErr' => '',
                 // 'publisheddateErr' => '',
                  'duedateErr' => '',
                 // 'user_idErr' => '',
                  'passbookErr' => '',
                  'proofErr' => '',
                  'accnumberErr' => '',
                  'banknameErr' => '',
                 // 'img2Err' => '',
                 // 'img3Err' => '',
                  // 'categories' => $categories
                ];
          
                $this -> view('users/beneficiary/financial_request', $data);
          }
         

        }


                //add a new request
                public function addNonFinancialRequest(){

                   $cat_id = $this->beneficiaryModel->getCategories();
                 
         
                   if($_SERVER['REQUEST_METHOD'] == 'POST'){
                       // Sanitize POST data
                       $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
         
                       $id = $_SESSION['user_id'];
         
                       $data = [
                          //  'id' => $id,
                           'title' => trim($_POST['title']),
                           'name' => trim($_POST['name']),
                           'NIC' => trim($_POST['NIC']),
                           'quantity' => trim($_POST['quantity']),
                           'description' => trim($_POST['description']),
                           'contact' => trim($_POST['contact']),
                           'city' => trim($_POST['city']),
                           'proof' => trim($_POST['proof']),
                          // 'img2' => trim($_POST['img2']),
                           //'img3' => trim($_POST['img3']),
                           'duedate' => trim($_POST['duedate']),
                           'cat_id' => $cat_id,
                           'titleErr' => '',
                           'nameErr' => '',
                           'NICErr' => '',
                           'quantityErr' => '',
                           'descriptionErr' => '',
                           'contactErr' => '',
                           'cityErr' => '',
                           'proofErr' => '',
                          // 'img2Err' => '',
                          // 'img3Err' => '',
                           'duedateErr' => '',
                          // 'user_idErr' => '',
                           'cat_idErr' => '',
                         //  'categories' => $categories,
                           'user_id' => $id
                         ];
         
                         if(empty($data['description'])){
                           $data['descriptionErr'] = 'Please enter description';
                       }
         
                       if(empty($data['title'])){
                           $data['titleErr'] = 'Please enter title';
                       }
         
                       if(empty($data['quantity'])){
                           $data['quantityErr'] = 'Please enter quantity';
                       }
         
                       if(empty($data['duedate'])){
                           $data['duedateErr'] = 'Please enter duedate';
                       }
         
                       if(empty($data['name'])){
                           $data['nameErr'] = 'Please enter name';
                       }
         
                       if(empty($data['NIC'])){
                         $data['NICErr'] = 'Please enter NIC';
                     }
         
                       if(empty($data['city'])){
                           $data['cityErr'] = 'Please enter city';
                       }
         
                       if(empty($data['contact'])){
                           $data['contactErr'] = 'Please enter contact';
                       }
         
                     //  if(empty($data['cat_id'])){
                     //   $data['cat_idErr'] = 'Please enter cat_id';
                     //  }
         
                      if(empty($data['proof'])){
                       $data['proofErr'] = 'Please enter image';
                      }
         
                     //  if(empty($data['img2'])){
                     //  $data['img2Err'] = 'Please enter image';
                     // }
         
                     // if(empty($data['img3'])){
                     //  $data['img3Err'] = 'Please enter image';
                     // }
         
                      
         
                       // Make sure no errors
                       if(empty($data['descriptionErr']) && empty($data['titleErr']) && empty($data['quantityErr']) && empty($data['duedateErr']) && empty($data['nameErr'])  && empty($data['NICErr']) && empty($data['cityErr']) && empty($data['contactErr']) && empty($data['cat_idErr']) && empty($data['proofErr'])){
                           // Validated
                           if($this->beneficiaryModel->addNonFinancialRequest($data)){
                               redirect('beneficiary/donationRequest');
                           } else {
                               die('Something went wrong');
                           }
                       } else {
                           // Load view with errors
                           $this->view('users/beneficiary/non_financial_request', $data);
                       }
         
                   }else{
                       $data = [
                          /* 'id' => '',*/
                           'title' => '',
                           'name' => '',
                           'user_id' => '',
                           'cat_id' => '',
                           'NIC' => '',
                           'description' => '',
                           //'type' => '',
                           'quantity' => '',
                           'duedate' => '',
                           'city' => '',
                           'contact' => '',
                           'proof' => '',
                          // 'img2' => '',
                       //  'img3' => '',
                           'titleErr' => '',
                           'nameErr' => '',
                           'NICErr' => '',
                           //'categoryErr' => '',
                           'descriptionErr' => '',
                           'quantityErr' => '',
                          // 'typeErr' => '',
                           'contactErr' => '',
                           'cityErr' => '',
                          // 'publisheddateErr' => '',
                           'duedateErr' => '',
                           'user_idErr' => '',
                          // 'cat_idErr' => '',
                           'proofErr' => '',
                          // 'img2Err' => '',
                          // 'img3Err' => '',
                           // 'categories' => $categories
                         ];
                   
                         $this -> view('users/beneficiary/non_financial_request', $data);
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
                      redirect('beneficiary/viewAcceptedReservation');
          
                  } else {
                      die('Something went wrong');
                  }
              }



              public function viewAcceptedReservation()
              {
                  $reservations = $this->beneficiaryModel->getAcceptedReservations();
                  $data = [
                      'reservations' => $reservations
                  ];
          
                  $this->view('users/beneficiary/calendar', $data);
              }




public function get_meals(){
    $requests = $this->beneficiaryModel->getAllRequests();
    $data = [
        'requests' => $requests,
    ];
    echo json_encode($data);
    }  
                 
    }

    