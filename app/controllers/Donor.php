<?php

use helpers\Email;

    class Donor extends Controller{
        public function __construct(){
            /*if(!isLoggedIn()){
                redirect('users/login');
            }
*/
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
              $data = [
              'title' => 'Dashboard',
              'prof_img' => $image_name        
          ];
    
          $this->view('users/donor/index', $data);
          }else{
              $this->view('users/login_donor', $data);
          }
        }

          

        /**
         * @return void
         */
        public function update_profile_donor(){

          $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING); 
  
          $otp_code = rand(100000,999999);
          $verification_status = 1;
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
            'id' => $id
            ];
    
          
            if($this->donorModel->update_profile_donor($data)){
              redirect('pages/profile_donor');
            }else{
              redirect('pages/edit_profile_donor');
            }
            
            
  
        }


        public function change_password_donor(){

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
            $same = $this->donorModel->passwordChecker($data['new_password'], $id,$is_quit);
            $correct = $this->donorModel->passwordChecker($data['old_password'], $id,$is_quit);

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
      
                if ($this->donorModel->change_password($data, $id)) {
      
                  $email = new Email($user_email);
                  $email->sendVerificationEmail($user_email, $otp_code);
                  redirect('users/otp_verify');
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
 
        

      }