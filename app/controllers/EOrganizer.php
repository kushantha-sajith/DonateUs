<?php

    class EOrganizer extends Controller{
        public function __construct(){
            if(!isLoggedIn()){
                redirect('users/login');
            }
            $this->EOrganizerModel = $this->model('EOrganizerModel');
            $this->userModel = $this->model('User');
<<<<<<< Updated upstream
=======
            
>>>>>>> Stashed changes
        }

        //load donor dashboard
        /**
         * @return void
         */
        public function index(){
<<<<<<< Updated upstream
=======

>>>>>>> Stashed changes
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
    
          $this->view('users/eorganizer/index', $data);
          }else{
              $this->view('users/login', $data);
          }
        }

<<<<<<< Updated upstream
=======
        
>>>>>>> Stashed changes
        /**
         * @return void
         */
        public function update_profile_eorganizer(){

          $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING); 
  
          $otp_code = rand(100000,999999);
          $verification_status = 1;
          $type = $_SESSION['user_type'];
          $id = $_SESSION['user_id'];
          $districts = $this->userModel->getDistricts();
  
          // Init data
          $data =[
            'full_name' => trim($_POST['full_name']),
            'contact' => trim($_POST['contact']),
            'comm_name' => trim($_POST['comm_name']),
            'desg' => trim($_POST['desg']),
            'city' => trim($_POST['city']),
            'district' => trim($_POST['district']),
            'type' => $type,
            'id' => $id
            ];
<<<<<<< Updated upstream
=======
    
>>>>>>> Stashed changes
          
            if($this->EOrganizerModel->update_profile_eorganizer($data)){
              redirect('pages/profile_eorganizer');
            }else{
              redirect('pages/edit_profile_eorganizer');
            }
<<<<<<< Updated upstream
=======
            
            
  
>>>>>>> Stashed changes
        }
        
        /**
         * @return void
         */
        public function stats(){
<<<<<<< Updated upstream
          $image_name = $this->profileImage();
=======
          $$image_name = $this->profileImage();
>>>>>>> Stashed changes
          $data = [
              'title' => 'Statistics',
              'prof_img' => $image_name
          ];
          $this->view('users/donor/stats', $data);
      }
<<<<<<< Updated upstream
=======
 
        
>>>>>>> Stashed changes
    }

    