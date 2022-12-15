<?php
  class Pages extends Controller {
    public function __construct(){
    //  $this->Beneficiary = $this->('BeneficiaryModel');
    }
    
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
  }