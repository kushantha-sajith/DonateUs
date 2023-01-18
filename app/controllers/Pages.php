<?php
  class Pages extends Controller {
    public function __construct(){
     
    }

      /**
       * @return void
       */
      public function index(){
      $data = [
        'title' => 'DonateUs'
      ];
     
      $this->view('pages/index', $data);
    }

      /**
       * @return void
       */
      public function profile_donor(){
      $data = [
        'title' => 'Profile'
      ];

      $this->view('users/donor/profile_donor', $data);
    }

      /**
       * @return void
       */
      public function donor(){
      $data = [
        'title' => 'Donor'
      ];

      $this->view('users/donor/index', $data);
    }
  }