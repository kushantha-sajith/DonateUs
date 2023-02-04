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
      public function profile_beneficiary(){
      $data = [
        'title' => 'Profile'
      ];

      $this->view('users/beneficiary/profile_beneficiary', $data);
    }

      /**
       * @return void
       */
      public function beneficiary(){
      $data = [
        'title' => 'beneficiary'
      ];

      $this->view('users/beneficiary/index', $data);
    }
  }