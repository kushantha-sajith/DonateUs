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
      public function about(){
      $data = [
        'title' => 'About Us'
      ];

      $this->view('pages/about', $data);
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