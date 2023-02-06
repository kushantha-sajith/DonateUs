<?php
  class Pages extends Controller {
    public function __construct(){

      $this->donorModel = $this->model('DonorModel');
      $this->userModel = $this->model('User');
     
    }

      //load home page
      /**
       * @return void
       */
      public function index(){
      $data = [
        'title' => 'DonateUs'
      ];
     
      $this->view('pages/index', $data);
    }

    //   /**
    //    * @return void
    //    */
    //   public function profile_donor(){
    //   $data = [
    //     'title' => 'Profile'
    //   ];

    //   $this->view('users/donor/profile_donor', $data);
    // }


      //load profile picture
      public function profileImage(){
        if(isset($_SESSION['user_id'])){
        $id = $_SESSION['user_id'];

          $userdata = $this->donorModel->getUserData($id);
          foreach($userdata as $user) :
            $image_name = $user-> prof_img;
          endforeach;  
          return $image_name;
        }else{
          $this->view('users/login_donor', $data);
      }
    }

       //load donr dashboard page
      /**
       * @return void
       */
      public function donor(){

          $image_name = $this->profileImage();
           
          // $row2 = mysqli_fetch_assoc($userdata);
          // $image_name = $row2['prof_img'];
          $data = [
          'title' => 'Dashboard',
          'prof_img' => $image_name        
      ];

      $this->view('users/donor/index', $data);
      
      
      
    }

           //load event organizer dashboard page
      /**
       * @return void
       */
      public function eorganizer(){

        $image_name = $this->profileImage();
         
        // $row2 = mysqli_fetch_assoc($userdata);
        // $image_name = $row2['prof_img'];
        $data = [
        'title' => 'Dashboard',
        'prof_img' => $image_name        
    ];

    $this->view('users/eorganizer/index', $data);
    
    
    
  }

    //load profile page
        /**
         * @return void
         */
        public function profile_donor(){

          if(isset($_SESSION['user_id'])){

              $id = $_SESSION['user_id'];
              $user_type = $_SESSION['user_type'];

              $userdata = $this->donorModel->getUserData($id);
              $personaldata = $this->donorModel->getPersonalData($id,$user_type);
              $image_name = $this->profileImage();
              $dist_name = $this->donorModel->getDistrictName($id,$user_type);

              $data = [
              'title' => 'Profile',
              'userdata' => $userdata,
              'personaldata' => $personaldata,
              'prof_img' => $image_name,
              'dist' => $dist_name            
          ];
    
          $this->view('users/donor/profile_donor', $data);
          }else{
              $this->view('users/login_donor', $data);
          }
          
        }

        public function edit_profile_donor(){
          $districts = $this->userModel->getDistricts();

          if(isset($_SESSION['user_id'])){

              $id = $_SESSION['user_id'];
              $user_type = $_SESSION['user_type'];

              $userdata = $this->donorModel->getUserData($id);
              $personaldata = $this->donorModel->getPersonalData($id,$user_type);
              $image_name = $this->profileImage();
              $dist_name = $this->donorModel->getDistrictName($id,$user_type);

              $data = [
              'title' => 'Profile',
              'userdata' => $userdata,
              'personaldata' => $personaldata,
              'prof_img' => $image_name,
              'dist' => $dist_name,
              'districts' => $districts           
          ];
    
          $this->view('users/donor/edit_profile_donor', $data);
          }else{
              $this->view('users/login_donor', $data);
          }
          
        }

        public function change_password_donor(){

          if(isset($_SESSION['user_id'])){

              $id = $_SESSION['user_id'];
              $user_type = $_SESSION['user_type'];

              $userdata = $this->donorModel->getUserData($id);
              $personaldata = $this->donorModel->getPersonalData($id,$user_type);
              $image_name = $this->profileImage();
              $dist_name = $this->donorModel->getDistrictName($id,$user_type);

              $data = [
              'title' => 'Profile',
              'userdata' => $userdata,
              'personaldata' => $personaldata,
              'prof_img' => $image_name,
              'dist' => $dist_name         
          ];
    
          $this->view('users/donor/change_password_donor', $data);
          }else{
              $this->view('users/login_donor', $data);
          }
          
        }

        public function profile_eorganizer(){

          if(isset($_SESSION['user_id'])){

              $id = $_SESSION['user_id'];
              $user_type = $_SESSION['user_type'];

              $userdata = $this->donorModel->getUserData($id);
              $personaldata = $this->donorModel->getPersonalData($id,$user_type);
              $image_name = $this->profileImage();
              $dist_name = $this->donorModel->getDistrictName($id,$user_type);

              $data = [
              'title' => 'Profile',
              'userdata' => $userdata,
              'personaldata' => $personaldata,
              'prof_img' => $image_name,
              'dist' => $dist_name         
          ];
    
          $this->view('users/eorganizer/profile_eorganizer', $data);
          }else{
              $this->view('users/login_donor', $data);
          }
          
        }

        public function edit_profile_eorganizer(){
          $districts = $this->userModel->getDistricts();

          if(isset($_SESSION['user_id'])){

              $id = $_SESSION['user_id'];
              $user_type = $_SESSION['user_type'];

              $userdata = $this->donorModel->getUserData($id);
              $personaldata = $this->donorModel->getPersonalData($id,$user_type);
              $image_name = $this->profileImage();
              $dist_name = $this->donorModel->getDistrictName($id,$user_type);

              $data = [
              'title' => 'Profile',
              'userdata' => $userdata,
              'personaldata' => $personaldata,
              'prof_img' => $image_name,
              'dist' => $dist_name          
          ];
    
          $this->view('users/eorganizer/edit_profile_eorganizer', $data);
          }else{
              $this->view('users/login_donor', $data);
          }
          
        }

        public function change_password_eorganizer(){
          

          if(isset($_SESSION['user_id'])){

              $id = $_SESSION['user_id'];
              $user_type = $_SESSION['user_type'];

              $userdata = $this->donorModel->getUserData($id);
              $personaldata = $this->donorModel->getPersonalData($id,$user_type);
              $image_name = $this->profileImage();
              $dist_name = $this->donorModel->getDistrictName($id,$user_type);

              $data = [
              'title' => 'Profile',
              'userdata' => $userdata,
              'personaldata' => $personaldata,
              'prof_img' => $image_name,
              'dist' => $dist_name         
          ];
    
          $this->view('users/eorganizer/change_password_eorganizer', $data);
          }else{
              $this->view('users/login_donor', $data);
          }
          
        }

    //load donation history page
        /**
         * @return void
         */
        public function donationHistory_donor(){

          $image_name = $this->profileImage();
          $data = [
            'title' => 'Donation History',
            'prof_img' => $image_name 
          ];
    
          $this->view('users/donor/donation_history_donor', $data);
        }

        
    //load donation requests page
        /**
         * @return void
         */
        public function donation_requests_donor(){

          $image_name = $this->profileImage();
          $data = [
            'title' => 'Donation Requests',
            'prof_img' => $image_name 
          ];
    
          $this->view('users/donor/donation_requests_donor', $data);
        }

  }