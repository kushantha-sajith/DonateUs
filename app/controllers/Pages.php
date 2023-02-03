<?php
  class Pages extends Controller {
    public function __construct(){
    //  $this->Beneficiary = $this->('BeneficiaryModel');
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

    public function about(){
      $data = [
        'title' => 'About Us'
      ];

      $this->view('pages/about', $data);
    }

    public function beneficiary(){
      $data = [
        'title' => 'Beneficiary'
      ];

      $this->view('users/beneficiary/index', $data);
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

      /**
       * @return void
       */
      public function admin(){
      $data = [
        'title' => 'Admin'
      ];

      $this->view('users/admin/index', $data);
    }
  }