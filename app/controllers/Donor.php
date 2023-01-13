<?php

    class Donor extends Controller{
        public function __construct(){
            /*if(!isLoggedIn()){
                redirect('users/login');
            }
*/
            $this->donorModel = $this->model('DonorModel');
            
        }

        //load admin dashboard
        /**
         * @return void
         */
        public function index(){

            $data = [];

            $this->view('users/admin/index', $data);
        }

        //load profile page
        /**
         * @return void
         */
        public function profile(){

            if(isset($_SESSION['user_id'])){

                $id = $_SESSION['user_id'];

                $userdata = $this->donorModel->getUserData($id);
                $data = [
                'title' => 'Profile',
                'userdata' => $userdata         
            ];
      
            $this->view('users/donor/profile', $data);
            }else{
                $this->view('users/login', $data);
            }
            
          }



        
        //load donation_history page
        /**
         * @return void
         */
        public function donationHistory(){
            $data = [
              'title' => 'Donation History'
            ];
      
            $this->view('users/donor/donation_history', $data);
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
      
            $this->view('users/donor/feedback', $data);
          }

            //load all feedback page
        /**
         * @return void
         */
        public function all_feedback(){
            $data = [
              'title' => 'All Feedback'
            ];
      
            $this->view('users/donor/all_feedback', $data);
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
                    if($this->donorModel->addFeedback($data)){
                        // flash('category_message', 'Category Added');
                        redirect('donor/all_feedback');
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
        public function updateProfile($type){

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
    }

    