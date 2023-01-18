<?php

use helpers\Email;

  class Users extends Controller {
    public function __construct(){
      $this->userModel = $this->model('User');
        $this->verificationModel = $this->model('VerificationModel');
    }

    //Register function
      /**
       * @return void
       */
      public function register_donor($type){

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
            'empid' =>'null',
            'verification_status' => $verification_status,
            'otp_code' => $otp_code,
            'user_type' => 'individual',
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
          if($this->userModel->register_donor($data)){
              
              $email = new Email($data['email']);
              $email->sendVerificationEmail($data['email'], $otp_code);
              redirect('users/verify');
          } else {
            die('Something went wrong');
          }

        } else {
          // Load view with errors
          $this->view('users/register_donor', $data);
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
          if($this->userModel->register_donor($data)){
              
              $email = new Email($data['email']);
              $email->sendVerificationEmail($data['email'], $otp_code);
              redirect('users/verify');
          } else {
            die('Something went wrong');
          }

        } else {
          // Load view with errors
          $this->view('users/register_donor', $data);
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
        $this->view('users/register_donor', $data);
      }
    
    }

    //login method for all users of the system
      /**
       * @return void
       */
      public function login_donor(){
      // Check for POST
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Process form
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        // Init data
        $data =[
          'email' => trim($_POST['email']),
          'password' => trim($_POST['password']),
          'email_err' => '',
          'password_err' => '',      
        ];

        // Validate Email
        if(empty($data['email'])){
          $data['email_err'] = 'Please enter email';
        }
        // Validate Password
        if(empty($data['password'])){
          $data['password_err'] = 'Please enter password';
        }
        // Check for user/email
        if($this->userModel->findUserByEmail($data['email'])){
          // User found
        } else {
          // User not found
          $data['email_err'] = 'No user found';
        }
        // Make sure errors are empty
        if(empty($data['email_err']) && empty($data['password_err'])){
          // Validated
          // Check and set logged-in user
          $loggedInUser = $this->userModel->login_donor($data['email'], $data['password']);

          if($loggedInUser){
            // Create Session
            $this->createUserSession($loggedInUser);
            
          } else {
            $data['password_err'] = 'Password incorrect';

            $this->view('users/login_donor', $data);
          }
        } else {
          // Load view with errors
          $this->view('users/login_donor', $data);
        }
      } else {
        // Init data
        $data =[    
          'email' => '',
          'password' => '',
          'email_err' => '',
          'password_err' => '',        
        ];

        // Load view
        $this->view('users/login_donor', $data);
      }
    }

    //otp verification
      /**
       * @return void
       */
      public function verify(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $data = [
                'otp'=>trim($_POST['otp']),
                'error'=>'',
                'status'=> ''
            ];

            $verified = $this->verificationModel->verifyOTP($data['otp']);

            if($verified){
                if($this->verificationModel->verify($verified->id)){
                    // set verification successful flash message
//                    setFlash("verify","Your account has been verified",Flash::FLASH_SUCCESS);
                    // redirect to the login of donor
                    redirect('users/login_donor');
                }
                else{
                    // set verification failed flash message
//                    Flash::setFlash("verify","Account verification failed!",Flash::FLASH_DANGER);
                    // redirect to the signup of donor
                    redirect('users/register_donor');
                }
            }
            else{
                $data['error'] = "Invalid OTP";
            }
        }
        else{
            $data = [
                'otp'=>'',
                'error'=>'',
                'status'=>''
            ];
        }
        $this->view('users/signupVerification_donor', $data);
    }

    //create sessions for all users
      /**
       * @param $user
       * @return void
       */
      public function createUserSession($user){
      $_SESSION['user_id'] = $user->id;
      $_SESSION['user_email'] = $user->email;
      $_SESSION['user_type'] = $user->type;
      redirect('pages/donor');
    }

    //logout method
      /**
       * @return void
       */
      public function logout(){
      unset($_SESSION['user_id']);
      unset($_SESSION['user_email']);
      unset($_SESSION['user_type']);
      session_destroy();
      redirect('users/login_donor');
    }

    
  }