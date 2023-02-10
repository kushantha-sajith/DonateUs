<?php

use helpers\Email;
use helpers\NIC_Validator;

<<<<<<< Updated upstream
  class Users extends Controller {
    public function __construct(){
      $this->userModel = $this->model('User');
        $this->verificationModel = $this->model('VerificationModel');
    }
=======
class Users extends Controller{
  public function __construct(){
    $this->userModel = $this->model('User');
    $this->verificationModel = $this->model('VerificationModel');
    $this->donorModel = $this->model('DonorModel');
  }

  //Register function
  /**
   * @return void
   */
  public function register(){
    // Check for POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Process form

      // Sanitize POST data
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      $verification_status = 0;
      $otp_code = rand(100000, 999999);

      // Init data
      $data = [
        'email' => trim($_POST['email']),
        'password' => trim($_POST['password']),
        'confirm_password' => trim($_POST['confirm_password']),
        'verification_status' => $verification_status,
        'otp_code' => $otp_code,
        'email_err' => '',
        'password_err' => '',
        'confirm_password_err' => ''
      ];

      // Validate Email
      if (empty($data['email'])) {
        $data['email_err'] = 'Please enter email';
      } else {
        // Check email
        if ($this->userModel->findUserByEmail($data['email'])) {
          $data['email_err'] = 'Email is already taken';
        }
      }

      // Validate Password
      if (empty($data['password'])) {
        $data['password_err'] = 'Please enter password';
      } elseif (strlen($data['password']) < 6) {
        $data['password_err'] = 'Password must be at least 6 characters';
      }

      // Validate Confirm Password
      if (empty($data['confirm_password'])) {
        $data['confirm_password_err'] = 'Please confirm password';
      } else {
        if ($data['password'] != $data['confirm_password']) {
          $data['confirm_password_err'] = 'Passwords do not match';
        }
      }

      // Make sure errors are empty
      if (empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])) {
        // Validated

        // Hash Password
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

        // Register User
        if ($this->userModel->register($data)) {
          //flash('register_success', 'You are Registered and can log in');
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
    } else {
      // Init data
      $data = [
        'email' => '',
        'password' => '',
        'confirm_password' => '',
        'email_err' => '',
        'password_err' => '',
        'confirm_password_err' => ''
      ];

      // Load view
      $this->view('users/register', $data);
    }
  }


  public function register_donor($type){
    $type1 = "ind";
    $districts = $this->userModel->getDistricts();

    // Check for POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Process form
>>>>>>> Stashed changes

    //Register function
      /**
       * @return void
       */
      public function register_beneficiary($type){
      $type1 = "ind";
      $districts = $this->userModel->getDistricts();
           // Check for POST
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Process form  
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING); 
        $otp_verify = 0;
        $otp_code = rand(100000,999999);
        $verification_status = 0;        
        // Init data
        if(strcmp($type,$type1) == 0 ){
          $data =[
            'email_ind' => trim($_POST['email_ind']),
            'nic' => trim($_POST['nic']),
            'password_ind' => trim($_POST['password_ind']),
            'confirm_password_ind' => trim($_POST['confirm_password_ind']),
            'fname' => trim($_POST['fname']),
            'lname' => trim($_POST['lname']),
            'contact_ind' => trim($_POST['contact_ind']),
            'city_ind' => trim($_POST['city_ind']),
            'district_ind' => trim($_POST['district_ind']),
            'address_ind' => trim($_POST['address_ind']),
            'identity_ind' => trim($_POST['identity_ind']),
            'otp_verify' => $otp_verify,
            'otp_code' => $otp_code,
            'verification_status' => $verification_status,
            'districts' => $districts,
            'prof_img' => 'img_profile',
            'acc_status' => '1',
            'email_err_ind' => '',
            'nic_err' => '',
            'password_err_ind' => '',
            'confirm_password_err_ind' => '',
            'fname_err_ind' => '',
            'lname_err_ind' => '',
            'contact_err_ind' => '',
            'city_err_ind' => '',
            'district_err_ind' => '',
            'city_err' => '',
            'district_err' => '',
            'city' => '',
            'district' => '',
            'email' => '',
            'compname' => '',
            'password' => '',
            'confirm_password' => '',
            'fullname' => '',
            'empid' => '',
            'desg' => '',
            'contact' => '',
            'orgtype' => '',
            'address' => '',
            'identity' => '',
            'email_err' => '',
            'password_err' => '',
            'confirm_password_err' => '',
            'contact_err' => '',
            'cname_err' => '',
            'fullname_err' => '',
            'desg_err' => '',
            'empid_err' => '',
            'tab' => 'Individual'
          ];

        $error = false;
        // Validate Email
        if(empty($data['email_ind'])){
          $data['email_err_ind'] = 'Please enter email';
          $error = true;
        } else {
          // Check email
          if($this->userModel->findUserByEmail($data['email_ind'])){
            $data['email_err_ind'] = 'Email is already taken';
            $error = true;
          }
        }

        //Validate NIC
        if(empty($data['nic'])){
          $data['nic_err'] = 'Please enter NIC';
          $error = true;
        } else {
          // Check NIC
          $nic = new NIC_Validator($data['nic']);
          $validity = $nic->checkNIC($data['nic']);
          if(!$validity){
            $data['nic_err'] = 'Enter a valid NIC';
            $error = true;
          }
        }

        // Validate Password
        if(empty($data['password_ind'])){
          $data['password_err_ind'] = 'Please enter password';
          $error = true;
        } elseif(strlen($data['password_ind']) < 6){
          $data['password_err_ind'] = 'Password must be at least 6 characters';
          $error = true;
        }

        // Validate Confirm Password
        if(empty($data['confirm_password_ind'])){
          $data['confirm_password_err_ind'] = 'Please confirm password';
          $error = true;
        } else {
          if($data['password_ind'] != $data['confirm_password_ind']){
            $data['confirm_password_err_ind'] = 'Passwords do not match';
            $error = true;
          }
        }

        //validate other fields
        if(empty($data['fname'])){
          $data['fname_err_ind'] = 'Required';
          $error = true;
        }
        if(empty($data['lname'])){
          $data['lname_err_ind'] = 'Required';
          $error = true;
        }
        if(empty($data['contact_ind'])){
          $data['contact_err_ind'] = 'Required';
          $error = true;
        }else {
          // Check contact number
          if($this->userModel->findUserByContact($data['contact_ind'])){
            $data['contact_err_ind'] = 'Contact Number is already taken';
            $error = true;
          }
        }
        if(empty($data['city_ind'])){
          $data['city_err_ind'] = 'Required';
          $error = true;
        }
        if(($data['district_ind'])==0){
          $data['district_err_ind'] = 'Required';
          $error = true;
        }
        

        // Make sure errors are empty
        if($error == false){
          // Validated
          
          // Hash Password
          $data['password_ind'] = password_hash($data['password_ind'], PASSWORD_DEFAULT);

          // Register User
          if($this->userModel->register_beneficiary($data,$type)){
              
              $email = new Email($data['email_ind']);
              $email->sendVerificationEmail($data['email_ind'], $otp_code);
              redirect('users/verify');
          } else {
            die('Something went wrong');
          }

        } else {
          // Load view with errors
          $this->view('users/register_beneficiary', $data);
        }

        }else{
          //corporate--------------------------------------------------------------------------------------
          $data =[
            'email' => trim($_POST['email']),
            'compname' => trim($_POST['compname']),
            'password' => trim($_POST['password']),
            'confirm_password' => trim($_POST['confirm_password']),
            'city' => trim($_POST['city']),
            'district' => trim($_POST['district']),
            'fullname' => trim($_POST['fullname']),
            'empid' => trim($_POST['empid']),
            'desg' => trim($_POST['desg']),
            'contact' => trim($_POST['contact']), 
            'address' => trim($_POST['address']), 
            'identity' => trim($_POST['identity']),  
            'orgtype' => trim($_POST['orgtype']),      
            'user_type' => 'corporate_beneficiary',
            'email_err' => '',
            'password_err' => '',
            'confirm_password_err' => '',
            'contact_err' => '',
            'cname_err' => '',
            'fullname_err' => '',
            'desg_err' => '',
            'empid_err' => '',
            'email_ind' => '',
            'nic' => '',
            'password_ind' => '',
            'confirm_password_ind' => '',
            'fname' => '',
            'lname' => '',
            'contact_ind' => '',
            'city_ind' => '',
            'district_ind' => '',
            'address_ind' => '',
            'identity_ind' => '',
            'district_err_ind' => '',
            'otp_verify' => $otp_verify,
            'otp_code' => $otp_code,
            'verification_status' => $verification_status,
            'districts' => $districts,
            'prof_img' => 'img_profile',
            'acc_status' => '1',
            'email_err_ind' => '',
            'nic_err' => '',
            'password_err_ind' => '',
            'confirm_password_err_ind' => '',
            'fname_err_ind' => '',
            'lname_err_ind' => '',
            'contact_err_ind' => '',
            'city_err_ind' => '',
            'city_err' => '',
            'district_err' => '',
            'tab' => 'Corporate'
          ];

          $error = false;

        // Validate Email
        if(empty($data['email'])){
          $data['email_err'] = 'Please enter email';
          $error = true;
        } else {
          // Check email
          if($this->userModel->findUserByEmail($data['email'])){
            $data['email_err'] = 'Email is already taken';
            $error = true;
          }
        }

        // Validate Password
        if(empty($data['password'])){
          $data['password_err'] = 'Please enter password';
          $error = true;
        } elseif(strlen($data['password']) < 6){
          $data['password_err'] = 'Password must be at least 6 characters';
          $error = true;
        }

        // Validate Confirm Password
        if(empty($data['confirm_password'])){
          $data['confirm_password_err'] = 'Please confirm password';
          $error = true;
        } else {
          if($data['password'] != $data['confirm_password']){
            $data['confirm_password_err'] = 'Passwords do not match';
            $error = true;
          }
        }

        //validate other fieldds
        if(empty($data['contact'])){
          $data['contact_err'] = 'Required';
          $error = true;
        }else {
          // Check contact number
          if($this->userModel->findUserByContact($data['contact'])){
            $data['contact_err'] = 'Contact Number is already taken';
            $error = true;
          }
        }
        if(empty($data['compname'])){
          $data['cname_err'] = 'Required';
          $error = true;
        }
        if(empty($data['fullname'])){
          $data['fullname_err'] = 'Required';
          $error = true;
        }
        if(empty($data['desg'])){
          $data['desg_err'] = 'Required';
          $error = true;
        }
        if(empty($data['empid'])){
          $data['empid_err'] = 'Required';
          $error = true;
        }
        if(empty($data['city'])){
          $data['city_err'] = 'Required';
          $error = true;
        }
        if(($data['district'])==0){
          $data['district_err'] = 'Required';
          $error = true;
        }

        // Make sure errors are empty
        if($error == false){
          // Validated
          
          // Hash Password
          $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

          // Register User
          if($this->userModel->register_beneficiary($data,$type)){
              
              $email = new Email($data['email']);
              $email->sendVerificationEmail($data['email'], $otp_code);
              redirect('users/verify');
          } else {
            die('Something went wrong');
          }

        } else {
          // Load view with errors
          $this->view('users/register_beneficiary', $data);
        }
<<<<<<< Updated upstream
        }
      } else {
        // Init data
        $data =[
          'email_ind' => '',
          'nic' => '',
          'password_ind' => '',
          'confirm_password_ind' => '',
          'fname' => '',
          'lname' => '',
          'contact_ind' => '',
          'city_ind' => '',
          'district_ind' => '0',
          'address_ind' => '',
          'identity_ind' => '',
=======
      }
    } else {
      // Init data
      $data = [
        'email_ind' => '',
        'nic' => '',
        'password_ind' => '',
        'confirm_password_ind' => '',
        'fname' => '',
        'lname' => '',
        'contact_ind' => '',
        'city_ind' => '',
        'district_ind' => '0',
        'email_err_ind' => '',
        'nic_err' => '',
        'password_err_ind' => '',
        'confirm_password_err_ind' => '',
        'other_err_ind' => '',
        'email' => '',
        'password' => '',
        'confirm_password' => '',
        'compname' => '',
        'fullname' => '',
        'empid' => '',
        'desg' => '',
        'contact' => '',
        'city' => '',
        'district' => '0',
        'email_err' => '',
        'nic_err' => '',
        'password_err' => '',
        'confirm_password_err' => '',
        'fname_err_ind' => '',
        'lname_err_ind' => '',
        'contact_err_ind' => '',
        'city_err_ind' => '',
        'district_err_ind' => '',
        'city_err' => '',
        'district_err' => '',
        'contact_err' => '',
        'cname_err' => '',
        'fullname_err' => '',
        'desg_err' => '',
        'empid_err' => '',
        'districts' => $districts,
        'tab' => 'Individual'
      ];

      // Load view
      $this->view('users/register_donor', $data);
    }
  }



  public function register_beneficiary($type){
    $type1 = "ind";
    $districts = $this->userModel->getDistricts();
    // Check for POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Process form  
      // Sanitize POST data
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      $otp_verify = 0;
      $otp_code = rand(100000, 999999);
      $verification_status = 0;
      
      // Init data
      if (strcmp($type, $type1) == 0) {
        $data = [
          'email_ind' => trim($_POST['email_ind']),
          'nic' => trim($_POST['nic']),
          'password_ind' => trim($_POST['password_ind']),
          'confirm_password_ind' => trim($_POST['confirm_password_ind']),
          'fname' => trim($_POST['fname']),
          'lname' => trim($_POST['lname']),
          'contact_ind' => trim($_POST['contact_ind']),
          'city_ind' => trim($_POST['city_ind']),
          'district_ind' => trim($_POST['district_ind']),
          'address_ind' => trim($_POST['address_ind']),
          'identity_ind' => trim($_POST['identity_ind']),
          'otp_verify' => $otp_verify,
          'otp_code' => $otp_code,
          'verification_status' => $verification_status,
          'districts' => $districts,
          'prof_img' => 'img_profile',
          'acc_status' => '1',
>>>>>>> Stashed changes
          'email_err_ind' => '',
          'nic_err' => '',
          'password_err_ind' => '',
          'confirm_password_err_ind' => '',
          'other_err_ind' => '',
          'email' => '',
          'password' => '',
          'confirm_password' => '',
          'compname' => '',
          'fullname' => '',
          'empid' => '',
          'desg' => '',
          'contact' => '',
          'city' => '',
          'district' => '0',
          'address' => '',
          'identity' => '',
          'orgtype' => '',
          'email_err' => '',
          'nic_err' => '',
          'password_err' => '',
          'confirm_password_err' => '',
          'fname_err_ind' => '',
          'lname_err_ind' => '',
          'contact_err_ind' => '',
          'city_err_ind' => '',
          'district_err_ind' => '',
          'city_err' => '',
          'district_err' => '',
          'contact_err' => '',
          'cname_err' => '',
          'fullname_err' => '',
          'desg_err' => '',
          'empid_err' => '',
          'districts' => $districts,
          'tab' => 'Individual'
        ];

        // Load view
        $this->view('users/register_beneficiary', $data);
      }    
    }

    
   //login method for all users of the system
      /**
       * @return void
       */
      public function login_beneficiary(){
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
          $loggedInUser = $this->userModel->login_beneficiary($data['email'], $data['password']);

          if($loggedInUser){
            // Create Session
            $this->createUserSession($loggedInUser);
            
          } else {
            $data['password_err'] = 'Password incorrect';

            $this->view('users/login_beneficiary', $data);
          }
        } else {
          // Load view with errors
          $this->view('users/login_beneficiary', $data);
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
        $this->view('users/login_beneficiary', $data);
      }
    }


    //Register function - Donor
      /**
       * @return void
       */
      public function register_donor($type){

        $type1 = "ind";
        $districts = $this->userModel->getDistricts();
  
             // Check for POST
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          // Process form
    
          // Sanitize POST data
          $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING); 
  
          $otp_verify = 0;
          $otp_code = rand(100000,999999);
          $verification_status = 1;
  
          
  
          
          // Init data
          if(strcmp($type,$type1) == 0 ){
            $data =[
              'email_ind' => trim($_POST['email_ind']),
              'nic' => trim($_POST['nic']),
              'password_ind' => trim($_POST['password_ind']),
              'confirm_password_ind' => trim($_POST['confirm_password_ind']),
              'fname' => trim($_POST['fname']),
              'lname' => trim($_POST['lname']),
              'contact_ind' => trim($_POST['contact_ind']),
              'city_ind' => trim($_POST['city_ind']),
              'district_ind' => trim($_POST['district_ind']),
              'otp_verify' => $otp_verify,
              'otp_code' => $otp_code,
              'verification_status' => $verification_status,
              'districts' => $districts,
              'prof_img' => 'img_profile.png',
              'acc_status' => '1',
              'email_err_ind' => '',
              'nic_err' => '',
              'password_err_ind' => '',
              'confirm_password_err_ind' => '',
              'fname_err_ind' => '',
              'lname_err_ind' => '',
              'contact_err_ind' => '',
              'city_err_ind' => '',
              'district_err_ind' => '',
              'city_err' => '',
              'district_err' => '',
              'city' => '',
              'district' => '',
              'email' => '',
              'compname' => '',
              'password' => '',
              'confirm_password' => '',
              'fullname' => '',
              'empid' => '',
              'desg' => '',
              'contact' => '',
              'email_err' => '',
              'password_err' => '',
              'confirm_password_err' => '',
              'contact_err' => '',
              'cname_err' => '',
              'fullname_err' => '',
              'desg_err' => '',
              'empid_err' => '',
              'tab' => 'Individual'
            ];
  
          $error = false;
          // Validate Email
          if(empty($data['email_ind'])){
            $data['email_err_ind'] = 'Please enter email';
            $error = true;
          } else {
            // Check email
            if($this->userModel->findUserByEmail($data['email_ind'])){
              $data['email_err_ind'] = 'Email is already taken';
              $error = true;
            }
          }
  
          //Validate NIC
          if(empty($data['nic'])){
            $data['nic_err'] = 'Please enter NIC';
            $error = true;
          } else {
            // Check NIC
            $nic = new NIC_Validator($data['nic']);
            $validity = $nic->checkNIC($data['nic']);
            if(!$validity){
              $data['nic_err'] = 'Enter a valid NIC';
              $error = true;
            }
            if($this->userModel->findUserByNIC($data['nic'])){
              $data['nic_err'] = 'NIC Number is already taken';
              $error = true;
            }
          }
  
          // Validate Password
          if(empty($data['password_ind'])){
            $data['password_err_ind'] = 'Please enter password';
            $error = true;
          } elseif(strlen($data['password_ind']) < 6){
            $data['password_err_ind'] = 'Password must be at least 6 characters';
            $error = true;
          }
  
          // Validate Confirm Password
          if(empty($data['confirm_password_ind'])){
            $data['confirm_password_err_ind'] = 'Please confirm password';
            $error = true;
          } else {
            if($data['password_ind'] != $data['confirm_password_ind']){
              $data['confirm_password_err_ind'] = 'Passwords do not match';
              $error = true;
            }
          }
  
          //validate other fields
          if(empty($data['fname'])){
            $data['fname_err_ind'] = 'Required';
            $error = true;
          }
          if(empty($data['lname'])){
            $data['lname_err_ind'] = 'Required';
            $error = true;
          }
          if(empty($data['contact_ind'])){
            $data['contact_err_ind'] = 'Required';
            $error = true;
          }else {
            // Check contact number
            if($this->userModel->findUserByContact($data['contact_ind'])){
              $data['contact_err_ind'] = 'Contact Number is already taken';
              $error = true;
            }
          }
          if(empty($data['city_ind'])){
            $data['city_err_ind'] = 'Required';
            $error = true;
          }
          if(($data['district_ind'])==1){
            $data['district_err_ind'] = 'Required';
            $error = true;
          }
          
  
          // Make sure errors are empty
          if($error == false){
            // Validated
            
            // Hash Password
            $data['password_ind'] = password_hash($data['password_ind'], PASSWORD_DEFAULT);
  
            // Register User
            if($this->userModel->register_donor($data,$type)){
                
                $email = new Email($data['email_ind']);
                $email->sendVerificationEmail($data['email_ind'], $otp_code);
                redirect('users/verify');
            } else {
              die('Something went wrong');
            }
  
          } else {
            // Load view with errors
            $this->view('users/register_donor', $data);
          }
  
          }else{
            //corporate--------------------------------------------------------------------------------------
            $data =[
              'email' => trim($_POST['email']),
              'compname' => trim($_POST['compname']),
              'password' => trim($_POST['password']),
              'confirm_password' => trim($_POST['confirm_password']),
              'city' => trim($_POST['city']),
              'district' => trim($_POST['district']),
              'fullname' => trim($_POST['fullname']),
              'empid' => trim($_POST['empid']),
              'desg' => trim($_POST['desg']),
              'contact' => trim($_POST['contact']),         
              'user_type' => 'corporate_donor',
              'email_err' => '',
              'password_err' => '',
              'confirm_password_err' => '',
              'contact_err' => '',
              'cname_err' => '',
              'fullname_err' => '',
              'desg_err' => '',
              'empid_err' => '',
              'email_ind' => '',
              'nic' => '',
              'password_ind' => '',
              'confirm_password_ind' => '',
              'fname' => '',
              'lname' => '',
              'contact_ind' => '',
              'city_ind' => '',
              'district_ind' => '',
              'district_err_ind' => '',
              'otp_verify' => $otp_verify,
              'otp_code' => $otp_code,
              'verification_status' => $verification_status,
              'districts' => $districts,
              'prof_img' => 'img_profile.png',
              'acc_status' => '1',
              'email_err_ind' => '',
              'nic_err' => '',
              'password_err_ind' => '',
              'confirm_password_err_ind' => '',
              'fname_err_ind' => '',
              'lname_err_ind' => '',
              'contact_err_ind' => '',
              'city_err_ind' => '',
              'city_err' => '',
              'district_err' => '',
              'tab' => 'Corporate'
            ];
  
            $error = false;
  
          // Validate Email
          if(empty($data['email'])){
            $data['email_err'] = 'Please enter email';
            $error = true;
          } else {
            // Check email
            if($this->userModel->findUserByEmail($data['email'])){
              $data['email_err'] = 'Email is already taken';
              $error = true;
            }
          }
  
          // Validate Password
          if(empty($data['password'])){
            $data['password_err'] = 'Please enter password';
            $error = true;
          } elseif(strlen($data['password']) < 6){
            $data['password_err'] = 'Password must be at least 6 characters';
            $error = true;
          }
  
          // Validate Confirm Password
          if(empty($data['confirm_password'])){
            $data['confirm_password_err'] = 'Please confirm password';
            $error = true;
          } else {
            if($data['password'] != $data['confirm_password']){
              $data['confirm_password_err'] = 'Passwords do not match';
              $error = true;
            }
          }
  
          //validate other fieldds
          if(empty($data['contact'])){
            $data['contact_err'] = 'Required';
            $error = true;
          }else {
            // Check contact number
            if($this->userModel->findUserByContact($data['contact'])){
              $data['contact_err'] = 'Contact Number is already taken';
              $error = true;
            }
          }
          if(empty($data['compname'])){
            $data['cname_err'] = 'Required';
            $error = true;
          }
          if(empty($data['fullname'])){
            $data['fullname_err'] = 'Required';
            $error = true;
          }
          if(empty($data['desg'])){
            $data['desg_err'] = 'Required';
            $error = true;
          }
          if(empty($data['empid'])){
            $data['empid_err'] = 'Required';
            $error = true;
          }
          if(empty($data['city'])){
            $data['city_err'] = 'Required';
            $error = true;
          }
          if(($data['district'])==1){
            $data['district_err'] = 'Required';
            $error = true;
          }
  
          // Make sure errors are empty
          if($error == false){
            // Validated
            
            // Hash Password
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
  
            // Register User
            if($this->userModel->register_donor($data,$type)){
                
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
            'email_ind' => '',
            'nic' => '',
            'password_ind' => '',
            'confirm_password_ind' => '',
            'fname' => '',
            'lname' => '',
            'contact_ind' => '',
            'city_ind' => '',
            'district_ind' => '0',
            'email_err_ind' => '',
            'nic_err' => '',
            'password_err_ind' => '',
            'confirm_password_err_ind' => '',
            'other_err_ind' => '',
            'email' => '',
            'password' => '',
            'confirm_password' => '',
            'compname' => '',
            'fullname' => '',
            'empid' => '',
            'desg' => '',
            'contact' => '',
            'city' => '',
            'district' => '0',
            'email_err' => '',
            'nic_err' => '',
            'password_err' => '',
            'confirm_password_err' => '',
            'fname_err_ind' => '',
            'lname_err_ind' => '',
            'contact_err_ind' => '',
            'city_err_ind' => '',
            'district_err_ind' => '',
            'city_err' => '',
            'district_err' => '',
            'contact_err' => '',
            'cname_err' => '',
            'fullname_err' => '',
            'desg_err' => '',
            'empid_err' => '',
            'districts' => $districts,
            'tab' => 'Individual'
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
  
          $error = false;
  
          // Validate Email
          if(empty($data['email'])){
            $data['email_err'] = 'Please enter email';
            $error = true;
          }else{
            // Check for user/email
          if($this->userModel->findUserByEmail($data['email'])){
            // User found
          } else {
            // User not found
            $data['email_err'] = 'No user found';
            $error = true;
          }
          }
          // Validate Password
          if(empty($data['password'])){
            $data['password_err'] = 'Please enter password';
            $error = true;
          }
          
          // Make sure errors are empty
          if($error == false){
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
                    // redirect to the login of beneficiary
                    redirect('users/login_beneficiary');
                }
                else{
                    // set verification failed flash message
//                    Flash::setFlash("verify","Account verification failed!",Flash::FLASH_DANGER);
                    // redirect to the signup of beneficiary
                    redirect('users/register_beneficiary');
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
        $this->view('users/signupVerification_beneficiary', $data);
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
      redirect('pages/beneficiary');
    }

<<<<<<< Updated upstream
    //logout method
      /**
       * @return void
       */
      public function logout(){
      unset($_SESSION['user_id']);
      unset($_SESSION['user_email']);
      unset($_SESSION['user_type']);
      session_destroy();
      redirect('users/login_beneficiary');
=======
    switch ($user->user_type) {
      case 1:
        redirect('pages/admin');
        break;
      case 2:
        redirect('pages/ind_donor');
        break;
      case 3:
        redirect('pages/cor_donor');
        break;
      case 4:
        redirect('pages/beneficiary');
        break;
      case 5:
        redirect('pages/beneficiary');
        break;
      case 6:
        redirect('pages/event_org');
        break;
      default:
        redirect('users/login');
        break;
>>>>>>> Stashed changes
    }

<<<<<<< Updated upstream
    
  }
=======
    redirect('pages/index');
  }


}
>>>>>>> Stashed changes
