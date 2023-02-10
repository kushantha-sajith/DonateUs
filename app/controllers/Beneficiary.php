<?php

    class beneficiary extends Controller{
        public function __construct(){
            /*if(!isLoggedIn()){
                redirect('users/login');
            }
*/
            $this->beneficiaryModel = $this->model('BeneficiaryModel');
            
        }

        // //load admin dashboard
        // /**
        //  * @return void
        //  */
        // public function index(){

        //     $data = [];

        //     $this->view('users/admin/index', $data);
        // }

        //load profile page
        /**
         * @return void
         */
        public function profile_beneficiary(){

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

        //load edit_profile page
        /**
         * @return void
         */
        public function editProfile_beneficiary(){
          $data = [
            'title' => 'Edit Profile'
          ];
    
          $this->view('users/beneficiary/edit_profile_beneficiary', $data);
        }

        
        //load donation_history page
        /**
         * @return void
         */
        public function donationHistory_beneficiary(){
            $data = [
              'title' => 'Donation History'
            ];
      
            $this->view('users/beneficiary/donation_history_beneficiary', $data);
          }

          //load feedback page
        /**
         * @return void
         */
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



//load request page
        public function requests(){
          $requests = $this->beneficiaryModel->getRequests();
          $data = [
            'title' => 'Donation Requests',
            'requests' => $requests
          ];
    
          $this -> view('users/beneficiary/donation_req', $data);
        }

        //add a new request
<<<<<<< Updated upstream
<<<<<<< Updated upstream
        public function newrequest(){
=======
=======
>>>>>>> Stashed changes
        public function reqForm(){

          $categories = $this->beneficiaryModel->getCategories();

<<<<<<< Updated upstream
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes
          if($_SERVER['REQUEST_METHOD'] == 'POST'){
              // Sanitize POST data
              $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

              $id = $_SESSION['user_id'];

              $data = [
<<<<<<< Updated upstream
<<<<<<< Updated upstream
                 
=======
=======
>>>>>>> Stashed changes
                  'title' => trim($_POST['title']),
                  'name' => trim($_POST['name']),
                 // 'user_id' => trim($_POST['user_id']),
                 'id' => $id,
                  'cat_id' => trim($_POST['cat_id']),
                  //'NIC' => trim($_POST['NIC']),
                 // 'quantity' => trim($_POST['quantity']),
<<<<<<< Updated upstream
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes
                  'description' => trim($_POST['description']),
                 // 'type' => trim($_POST['type']),
                  'quantity' => trim($_POST['quantity']),
                 // 'publisheddate' => trim($_POST['publisheddate']),
                  'duedate' => trim($_POST['duedate']),
                 // 'categories' => trim($_POST['categories']),
                  'city' => trim($_POST['city']),
                  'contact' => trim($_POST['contact']),
                  'titleErr' => '',
                  'nameErr' => '',
                  //'NICErr' => '',
                  'descriptionErr' => '',
                  'quantityErr' => '',
                  'contactErr' => '',
                  'cityErr' => '',
<<<<<<< Updated upstream
<<<<<<< Updated upstream
                  'duedateErr' => ''
                  
=======
=======
>>>>>>> Stashed changes
                 // 'publisheddateErr' => '',
                  'duedateErr' => '',
                  'user_idErr' => '',
                  'cat_idErr' => '',
                  'categories' => $categories,
                  'user_id' => $id
<<<<<<< Updated upstream
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes
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

              if(empty($data['city'])){
                  $data['cityErr'] = 'Please enter city';
              }

              if(empty($data['contact'])){
                  $data['contactErr'] = 'Please enter contact';
              }

<<<<<<< Updated upstream
<<<<<<< Updated upstream
=======
=======
>>>>>>> Stashed changes
            //   if(empty($data['user_id'])){
            //     $data['user_idErr'] = 'Please enter user_id';
            // }

            if(empty($data['cat_id'])){
              $data['cat_idErr'] = 'Please enter cat_id';
          }

<<<<<<< Updated upstream
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes
             

              // Make sure no errors
              if(empty($data['descriptionErr']) && empty($data['titleErr']) && empty($data['quantityErr']) && empty($data['duedateErr']) && empty($data['nameErr']) && empty($data['cityErr']) && empty($data['contactErr']) && empty($data['user_idErr']) && empty($data['cat_idErr'])){
                  // Validated
                  if($this->beneficiaryModel->addRequest($data)){
                      // flash('category_message', 'Category Added');
                      redirect('beneficiary/donation_req');
                  } else {
                      die('Something went wrong');
                  }
              } else {
                  // Load view with errors
                  $this->view('users/beneficiary/reqForm', $data);
              }

          }else{
              $data = [
                 /* 'id' => '',*/
                  'title' => '',
                  'name' => '',
                  'user_id' => '',
                  'cat_id' => '',
                  //'NIC' => '',
                  'description' => '',
                  //'type' => '',
                  'quantity' => '',
                  'duedate' => '',
                  //'categories' => '',
                  'city' => '',
                  'contact' => '',
                  'titleErr' => '',
                  'nameErr' => '',
                 // 'NICErr' => '',
                  //'categoryErr' => '',
                  'descriptionErr' => '',
                  'quantityErr' => '',
                 // 'typeErr' => '',
                  'contactErr' => '',
                  'cityErr' => '',
                 // 'publisheddateErr' => '',
                  'duedateErr' => '',
                  'user_idErr' => '',
                  'cat_idErr' => '',
                  'categories' => $categories
                ];
          
                $this -> view('users/beneficiary/reqForm', $data);
          }
         

        }





        //edit the request
        public function editRequest($id){

          $categories = $this->beneficiaryModel->getCategories();

          if($_SERVER['REQUEST_METHOD'] == 'POST'){
              // Sanitize POST data
              $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

              $id = $_SESSION['user_id'];

              $data = [
                  'title' => trim($_POST['title']),
                  'name' => trim($_POST['name']),
                 // 'user_id' => trim($_POST['user_id']),
                 'id' => $id,
                  'cat_id' => trim($_POST['cat_id']),
                  //'NIC' => trim($_POST['NIC']),
                 // 'quantity' => trim($_POST['quantity']),
                  'description' => trim($_POST['description']),
                 // 'type' => trim($_POST['type']),
                  'quantity' => trim($_POST['quantity']),
                 // 'publisheddate' => trim($_POST['publisheddate']),
                  'duedate' => trim($_POST['duedate']),
                  // 'categories' => trim($_POST['categories']),
                  'city' => trim($_POST['city']),
                  'contact' => trim($_POST['contact']),
                  'titleErr' => '',
                  'nameErr' => '',
                  //'NICErr' => '',
                  'descriptionErr' => '',
                  'quantityErr' => '',
                  'contactErr' => '',
                  'cityErr' => '',
                 // 'publisheddateErr' => '',
                  'duedateErr' => '',
                  'user_idErr' => '',
                  'cat_idErr' => '',
                  'categories' => $categories,
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

              if(empty($data['city'])){
                  $data['cityErr'] = 'Please enter city';
              }

              if(empty($data['contact'])){
                  $data['contactErr'] = 'Please enter contact';
              }

            //   if(empty($data['user_id'])){
            //     $data['user_idErr'] = 'Please enter user_id';
            // }

            if(empty($data['cat_id'])){
              $data['cat_idErr'] = 'Please enter cat_id';
          }

             

              // Make sure no errors
              if(empty($data['descriptionErr']) && empty($data['titleErr']) && empty($data['quantityErr']) && empty($data['duedateErr']) && empty($data['nameErr']) && empty($data['cityErr']) && empty($data['contactErr']) && empty($data['cat_idErr'])){
                  // Validated
                  if($this->beneficiaryModel->editRequest($data)){
                      // flash('category_message', 'Category Added');
                      redirect('beneficiary/donation_req');
                  } else {
                      die('Something went wrong');
                  }
              } else {
                  // Load view with errors
                  $this->view('users/beneficiary/editRequest', $data);
              }

          }else{

              $requests = $this->beneficiaryModel->getRequestById($id);               
              // if($requests->user_id != $_SESSION['user_id']){
              //     redirect('requests');
              // }
              $data = [
                  'id' => $id,
                  'title' => $requests->title,
                  'name' => $requests->name,
                  'cat_id' => $requests->cat_id,
                  //'NIC' => $requests->NIC,
                 // 'type' => $requests->type,
                  'quantity' => $requests->quantity,
                  'duedate' => $requests->duedate,
                  'description' => $requests->description,
                  //'categories' => $requests->categories,
                  'city' => $requests->city,
                  'contact' => $requests->contact,
<<<<<<< Updated upstream
                 // 'categories' => $categories,
=======
                  'categories' => $categories,
>>>>>>> Stashed changes
                  'quantityErr' => '',
                  'descriptionErr' => '',
                  'quantityErr' => '',
                  'nameErr' => '',
                  'titleErr' => '',
                  'contactErr' => '',
                  'cityErr' => '',
                  'duedateErr' => ''
                ];
          
                $this -> view('users/beneficiary/editRequest', $data);
         

        }
      }

//delete a request
        public function deleteRequest($id){              
              $requests = $this->beneficiaryModel->getRequestById($id);                //check for owner
              // if($requests->user_id != $_SESSION['user_id']){
              //     redirect('requests');
              // }                
              if($this->beneficiaryModel->deleteRequest($id)){
                  // flash('request_message','Request Removed');
                  redirect('beneficiary/requests');
              }else{
                  die('Something went wrong');
              }
        }


        

        //load categories page
        /**
         * @return void
         */
        public function categories(){
            $categories = $this->adminModel->getCategories();
            $data = [
              'title' => 'Donation Categories',
              'categories' => $categories
            ];
      
            $this -> view('users/admin/categories', $data);
          }

          //add method of categories
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

        //edit method of categories
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

        //delete method of categories
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
//------------------------------------------------------------------------------------------edit this
        public function updateProfile(){

            $type1 = "ind";
      
                 // Check for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
              // Process form
        
              // Sanitize POST data
              $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      
              $verification_status = 0;
              $otp_code = rand(100000,999999);
      
              // Init data
              if(strcmp($type,$type1) == 0 ){
                $data =[
                  'email' => trim($_POST['email']),
                  'password' => trim($_POST['password']),
                  'confirm_password' => trim($_POST['confirm_password']),
                  'fname' => trim($_POST['fname']),
                  'lname' => trim($_POST['lname']),
                  'contact' => trim($_POST['contact']),
                  'city' => trim($_POST['city']),
                  'compname' => 'null',
                  'desg' =>'null',
                  'empid' =>'null'
                ];
      
                
              // Validate Email
              if(empty($data['email'])){
                $data['email_err'] = 'Please enter email';
              } else {
                // Check email
                if($this->userModel->findUserByEmail($data['email'])){
                  $data['email_err'] = 'Email is already taken';
                }
              }
      
              // Validate Password
              if(empty($data['password'])){
                $data['password_err'] = 'Please enter password';
              } elseif(strlen($data['password']) < 6){
                $data['password_err'] = 'Password must be at least 6 characters';
              }
      
              // Validate Confirm Password
              if(empty($data['confirm_password'])){
                $data['confirm_password_err'] = 'Please confirm password';
              } else {
                if($data['password'] != $data['confirm_password']){
                  $data['confirm_password_err'] = 'Passwords do not match';
                }
              }
      
              //validate other fieldds
              if(empty($data['fname'])){
                $data['other_err'] = 'Required';
              }
              if(empty($data['lname'])){
                $data['other_err'] = 'Required';
              }
              if(empty($data['contact'])){
                $data['other_err'] = 'Required';
              }
              if(empty($data['city'])){
                $data['other_err'] = 'Required';
              }
      
              // Make sure errors are empty
              if(empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm_password_err']) && empty($data['other_err'])){
                // Validated
                
                // Hash Password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
      
                // Register User
                if($this->userModel->register($data)){
                    
                    $email = new Email($data['email']);
                    $email->sendVerificationEmail($data['email'], $otp_code);
                    redirect('users/verify');
                } else {
                  die('Something went wrong');
                }
      
              } else {
                // Load view with errors
                $this->view('users/register', $data);
              }
      
              }else{
                $data =[
                  'email' => trim($_POST['email']),
                  'password' => trim($_POST['password']),
                  'confirm_password' => trim($_POST['confirm_password']),
                  'compname' => trim($_POST['compname']),
                  'contact' => trim($_POST['contact']),
                  'empid' => trim($_POST['empid']),
                  'desg' => trim($_POST['desg']),
                  'fname' => 'null',
                  'lname' => 'null',
                  'city' => 'null',
                  'verification_status' => $verification_status,
                  'otp_code' => $otp_code,
                  'user_type' => 'corporate',
                  'email_err' => '',
                  'password_err' => '',
                  'confirm_password_err' => '',
                  'other_err' => ''
                ];
      
                
              // Validate Email
              if(empty($data['email'])){
                $data['email_err'] = 'Please enter email';
              } else {
                // Check email
                if($this->userModel->findUserByEmail($data['email'])){
                  $data['email_err'] = 'Email is already taken';
                }
              }
      
              // Validate Password
              if(empty($data['password'])){
                $data['password_err'] = 'Please enter password';
              } elseif(strlen($data['password']) < 6){
                $data['password_err'] = 'Password must be at least 6 characters';
              }
      
              // Validate Confirm Password
              if(empty($data['confirm_password'])){
                $data['confirm_password_err'] = 'Please confirm password';
              } else {
                if($data['password'] != $data['confirm_password']){
                  $data['confirm_password_err'] = 'Passwords do not match';
                }
              }
      
              //validate other fieldds
              if(empty($data['contact'])){
                $data['other_err'] = 'Required';
              }
              if(empty($data['compname'])){
                $data['other_err'] = 'Required';
              }
              if(empty($data['desg'])){
                $data['other_err'] = 'Required';
              }
              if(empty($data['empid'])){
                $data['other_err'] = 'Required';
              }
      
              // Make sure errors are empty
              if(empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm_password_err']) && empty($data['other_err'])){
                // Validated
                
                // Hash Password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
      
                // Register User
                if($this->userModel->register($data)){
                    
                    $email = new Email($data['email']);
                    $email->sendVerificationEmail($data['email'], $otp_code);
                    redirect('users/verify');
                } else {
                  die('Something went wrong');
                }
      
              } else {
                // Load view with errors
                $this->view('users/register', $data);
              }
              }
              
      
      
            } else {
              // Init data
              $data =[
                'email' => '',
                'password' => '',
                'confirm_password' => '',
                'fname' => '',
                'lname' => '',
                'compname' => '',
                'empid' => '',
                'desg' => '',
                'contact' => '',
                'city' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => '',
                'other_err' => ''
              ];
      
              // Load view
              $this->view('users/register', $data);
            }
          
          }


          //load beneficiary dashboard
        /**
         * @return void
         */
        public function index(){
          $data = [
            'title' => 'DonateUs'
          ];
         
          $this->view('users/beneficiary/index', $data);
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

    }

    