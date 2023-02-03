<?php
  class Pages extends Controller {
    public function __construct(){

      $this->donorModel = $this->model('DonorModel');
     
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

    //load profile page
        /**
         * @return void
         */
        public function profile_donor(){

          if(isset($_SESSION['user_id'])){

              $id = $_SESSION['user_id'];

              $userdata = $this->donorModel->getUserData($id);
              $image_name = $this->profileImage();
              $data = [
              'title' => 'Profile',
              'userdata' => $userdata,
              'prof_img' => $image_name         
          ];
    
          $this->view('users/donor/profile_donor', $data);
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

  }