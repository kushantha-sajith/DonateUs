<?php
class Pages extends Controller{
  public function __construct(){
<<<<<<< Updated upstream
<<<<<<< Updated upstream
<<<<<<< Updated upstream
=======
//      if(!isLoggedIn()){
//          redirect('users/login');
//      }
>>>>>>> Stashed changes
=======
//      if(!isLoggedIn()){
//          redirect('users/login');
//      }
>>>>>>> Stashed changes
=======
//      if(!isLoggedIn()){
//          redirect('users/login');
//      }
>>>>>>> Stashed changes
    //  $this->Beneficiary = $this->('BeneficiaryModel');
    $this->donorModel = $this->model('DonorModel');
    $this->userModel = $this->model('User');
  }

<<<<<<< Updated upstream
  
=======
>>>>>>> Stashed changes
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

  /**
   * @return void
   */
  public function admin(){
<<<<<<< Updated upstream
=======
      if(!isLoggedIn()){
          redirect('users/login');
      }
>>>>>>> Stashed changes
    $data = [
      'title' => 'Admin'
    ];

    $this->view('users/admin/index', $data);
  }

  /**
   * @return void
   */
  public function donor(){
<<<<<<< Updated upstream
<<<<<<< Updated upstream
<<<<<<< Updated upstream
    $image_name = $this->profileImage();
    $data = [
      'title' => 'Dashboard',
      'prof_img' => $image_name
    ];

    $this->view('users/donor/index', $data);
  }

  public function beneficiary(){
=======
=======
>>>>>>> Stashed changes
      if(!isLoggedIn()){
          redirect('users/login');
      }else{
        redirect('donor/index');
      }
  }

  public function beneficiary(){
<<<<<<< Updated upstream
=======
      if(!isLoggedIn()){
          redirect('users/login');
      }else{
        redirect('donor/index');
      }
  }

  public function beneficiary(){
>>>>>>> Stashed changes
      if(!isLoggedIn()){
          redirect('users/login');
      }
>>>>>>> Stashed changes
=======
      if(!isLoggedIn()){
          redirect('users/login');
      }
>>>>>>> Stashed changes
    $data = [
      'title' => 'Beneficiary'
    ];

    $this->view('users/beneficiary/index', $data);
  }

<<<<<<< Updated upstream
<<<<<<< Updated upstream
<<<<<<< Updated upstream
  public function eorganizer(){
=======
=======
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes
  public function organizer(){
      if(!isLoggedIn()){
          redirect('users/login');
      }
<<<<<<< Updated upstream
>>>>>>> Stashed changes
    $image_name = $this->profileImage();
=======
    $image_name = $this->profileImage();
    // $row2 = mysqli_fetch_assoc($userdata);
    // $image_name = $row2['prof_img'];
>>>>>>> Stashed changes
    $data = [
      'title' => 'Dashboard',
      'prof_img' => $image_name
    ];

    $this->view('users/eorganizer/index', $data);
  }

  /**
   * @return void
   */
<<<<<<< Updated upstream
  public function profile_donor(){
=======
  public function profileDonor(){
>>>>>>> Stashed changes
    if (isset($_SESSION['user_id'])) {
      $id = $_SESSION['user_id'];
      $user_type = $_SESSION['user_type'];
      $userdata = $this->donorModel->getUserData($id);
      $personaldata = $this->donorModel->getPersonalData($id, $user_type);
      $image_name = $this->profileImage();
      $dist_name = $this->donorModel->getDistrictName($id, $user_type);

      $data = [
        'title' => 'Profile',
        'userdata' => $userdata,
        'personaldata' => $personaldata,
        'prof_img' => $image_name,
        'dist' => $dist_name
      ];

      $this->view('users/donor/profile_donor', $data);
    } else {
<<<<<<< Updated upstream
=======
        $data = [
            'email' => '',
            'password' => '',
            'email_err' => '',
            'password_err' => ''
        ];
>>>>>>> Stashed changes
      $this->view('users/login', $data);
    }
  }

<<<<<<< Updated upstream
<<<<<<< Updated upstream
<<<<<<< Updated upstream
  public function profile_beneficiary(){
    $data = [
      'title' => 'Profile'
    ];
=======
=======
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes
  public function profileBeneficiary(){
      if (isset($_SESSION['user_id'])) {
          $id = $_SESSION['user_id'];
          $user_type = $_SESSION['user_type'];
          $userdata = $this->donorModel->getUserData($id);
          $personaldata = $this->donorModel->getPersonalData($id, $user_type);
          $image_name = $this->profileImage();
          $dist_name = $this->donorModel->getDistrictName($id, $user_type);
<<<<<<< Updated upstream
>>>>>>> Stashed changes

    $this->view('users/beneficiary/profile_beneficiary', $data);
  }

<<<<<<< Updated upstream
<<<<<<< Updated upstream
  public function profile_eorganizer(){
=======
  public function profileOrganizer(){
>>>>>>> Stashed changes
=======
  public function profileOrganizer(){
>>>>>>> Stashed changes
=======

          $data = [
              'title' => 'Profile',
              'userdata' => $userdata,
              'personaldata' => $personaldata,
              'prof_img' => $image_name,
              'dist' => $dist_name
          ];

          $this->view('users/beneficiary/profile_beneficiary', $data);
      } else {
          $this->view('users/login');
      }
  }

  public function profileOrganizer(){
>>>>>>> Stashed changes
    if (isset($_SESSION['user_id'])) {
      $id = $_SESSION['user_id'];
      $user_type = $_SESSION['user_type'];
      $userdata = $this->donorModel->getUserData($id);
      $personaldata = $this->donorModel->getPersonalData($id, $user_type);
      $image_name = $this->profileImage();
      $dist_name = $this->donorModel->getDistrictName($id, $user_type);

      $data = [
        'title' => 'Profile',
        'userdata' => $userdata,
        'personaldata' => $personaldata,
        'prof_img' => $image_name,
        'dist' => $dist_name
      ];

      $this->view('users/eorganizer/profile_eorganizer', $data);
    } else {
<<<<<<< Updated upstream
      $this->view('users/login', $data);
=======
      $this->view('users/login');
>>>>>>> Stashed changes
    }
  }

  public function profileImage(){
    if (isset($_SESSION['user_id'])) {
      $id = $_SESSION['user_id'];
      $userdata = $this->donorModel->getUserData($id);
      foreach ($userdata as $user) :
        $image_name = $user->prof_img;
      endforeach;
      return $image_name;
    } else {
      $this->view('users/login', $data);
    }
  }

<<<<<<< Updated upstream
<<<<<<< Updated upstream
<<<<<<< Updated upstream
  public function edit_profile_donor(){
=======
  public function editProfileDonor(){
>>>>>>> Stashed changes
=======
  public function editProfileDonor(){
>>>>>>> Stashed changes
=======
  public function editProfileDonor(){
>>>>>>> Stashed changes
    $districts = $this->userModel->getDistricts();
    if (isset($_SESSION['user_id'])) {
      $id = $_SESSION['user_id'];
      $user_type = $_SESSION['user_type'];
      $userdata = $this->donorModel->getUserData($id);
      $personaldata = $this->donorModel->getPersonalData($id, $user_type);
      $image_name = $this->profileImage();
      $dist_name = $this->donorModel->getDistrictName($id, $user_type);

      $data = [
        'title' => 'Profile',
        'userdata' => $userdata,
        'personaldata' => $personaldata,
        'prof_img' => $image_name,
        'dist' => $dist_name,
        'districts' => $districts
      ];

      $this->view('users/donor/edit_profile_donor', $data);
    } else {
      $this->view('users/login', $data);
    }
  }

<<<<<<< Updated upstream
<<<<<<< Updated upstream
<<<<<<< Updated upstream
   public function edit_profile_eorganizer(){
=======
=======
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes
  public function changePasswordDonor(){
    if (isset($_SESSION['user_id'])) {
      $id = $_SESSION['user_id'];
      $user_type = $_SESSION['user_type'];
      $userdata = $this->donorModel->getUserData($id);
      $personaldata = $this->donorModel->getPersonalData($id, $user_type);
      $image_name = $this->profileImage();
      $dist_name = $this->donorModel->getDistrictName($id, $user_type);

      $data = [
        'title' => 'Profile',
        'userdata' => $userdata,
        'personaldata' => $personaldata,
        'prof_img' => $image_name,
        'dist' => $dist_name
      ];

      $this->view('users/donor/change_password_donor', $data);
    } else {
      $this->view('users/login', $data);
    }
  }

  public function editProfileOrganizer(){
<<<<<<< Updated upstream
<<<<<<< Updated upstream
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes
    $districts = $this->userModel->getDistricts();
    if (isset($_SESSION['user_id'])) {
      $id = $_SESSION['user_id'];
      $user_type = $_SESSION['user_type'];
      $userdata = $this->donorModel->getUserData($id);
      $personaldata = $this->donorModel->getPersonalData($id, $user_type);
      $image_name = $this->profileImage();
      $dist_name = $this->donorModel->getDistrictName($id, $user_type);

      $data = [
        'title' => 'Profile',
        'userdata' => $userdata,
        'personaldata' => $personaldata,
        'prof_img' => $image_name,
<<<<<<< Updated upstream
        'dist' => $dist_name,
        'districts' => $districts
=======
        'dist' => $dist_name
>>>>>>> Stashed changes
      ];

      $this->view('users/eorganizer/edit_profile_eorganizer', $data);
    } else {
      $this->view('users/login', $data);
    }
  }

<<<<<<< Updated upstream
<<<<<<< Updated upstream
<<<<<<< Updated upstream
  public function change_password_eorganizer(){
=======
  public function changePasswordOrganizer(){
>>>>>>> Stashed changes
=======
  public function changePasswordOrganizer(){
>>>>>>> Stashed changes
=======
  public function changePasswordOrganizer(){
>>>>>>> Stashed changes
    if (isset($_SESSION['user_id'])) {
      $id = $_SESSION['user_id'];
      $user_type = $_SESSION['user_type'];
      $userdata = $this->donorModel->getUserData($id);
      $personaldata = $this->donorModel->getPersonalData($id, $user_type);
      $image_name = $this->profileImage();
      $dist_name = $this->donorModel->getDistrictName($id, $user_type);

      $data = [
        'title' => 'Profile',
        'userdata' => $userdata,
        'personaldata' => $personaldata,
        'prof_img' => $image_name,
        'dist' => $dist_name
      ];

      $this->view('users/eorganizer/change_password_eorganizer', $data);
    } else {
      $this->view('users/login', $data);
    }
  }

  //load donation history page
  /**
   * @return void
   */
<<<<<<< Updated upstream
<<<<<<< Updated upstream
  public function donationHistory_donor(){
=======
  public function donationHistoryDonor(){

    $id = $_SESSION['user_id'];
    $records = $this->donorModel->getDonationHistory($id);
=======
  public function donationHistoryDonor(){

    $id = $_SESSION['user_id'];
    $donations = $this->donorModel->getDonationHistory($id);
    $financials = $this->donorModel->getFinancialHistory($id);
    $non_financials = $this->donorModel->getNonFinancialHistory($id);
    $categories = $this->donorModel->getNonfinancialCategories();
>>>>>>> Stashed changes

      if(!isLoggedIn()){
          redirect('users/login');
      }
<<<<<<< Updated upstream
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes
    $image_name = $this->profileImage();
    $data = [
      'title' => 'Donation History',
      'prof_img' => $image_name,
<<<<<<< Updated upstream
      'records' => $records
=======
      'donations' => $donations,
      'financials' => $financials,
      'nfinancials' => $non_financials,
      'categories' => $categories
>>>>>>> Stashed changes
    ];

    $this->view('users/donor/donation_history_donor', $data);
  }

<<<<<<< Updated upstream

  //load donation requests page
  /**
   * @return void
   */
<<<<<<< Updated upstream
  public function donation_requests_donor(){
    
=======
  public function donationRequestsDonor(){

    $requests = $this->donorModel->getDonationRequests();
    $financials = $this->donorModel->getFinancialRequests();
    $non_financials = $this->donorModel->getNonFinancialRequests();

      if(!isLoggedIn()){
          redirect('users/login');
      }
>>>>>>> Stashed changes
    $image_name = $this->profileImage();
    $requests = $this->donorModel->getDonationRequests();
    $financials = $this->donorModel->getFinancialRequests();
    $non_financials = $this->donorModel->getNonFinancialRequests();

    $data = [
      'title' => 'Donation Requests',
      'prof_img' => $image_name,
      'requests' => $requests,
      'financials' => $financials,
      'non_financials' => $non_financials
<<<<<<< Updated upstream
<<<<<<< Updated upstream

=======
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes
    ];

    $this->view('users/donor/donation_requests_donor', $data);
  }
<<<<<<< Updated upstream
=======
=======
  public function donationRequestsDonor(){

    if (isset($_SESSION['user_id'])) {
      $id = $_SESSION['user_id'];
      $user_type = $_SESSION['user_type'];
      $requests = $this->donorModel->getDonationRequests();
      $financials = $this->donorModel->getFinancialRequests();
      $non_financials = $this->donorModel->getNonFinancialRequests();
      $categories = $this->donorModel->getNonfinancialCategories();
      $userdata = $this->donorModel->getPersonalData($id,$user_type);
      $req_count = count($requests);
      foreach ($userdata as $user) :
        $user_zip = $user->zipcode;
      endforeach;
      
    $image_name = $this->profileImage();

    if($req_count == 0 ){
      $data = [
        'title' => 'Donation Requests',
        'prof_img' => $image_name
      ];
  
      $this->view('users/donor/empty_page', $data);
    }else{
      $data = [
        'title' => 'Donation Requests',
        'prof_img' => $image_name,
        'requests' => $requests,
        'financials' => $financials,
        'non_financials' => $non_financials,
        'categories' => $categories,
        'user' => $user_zip
      ];
  
      $this->view('users/donor/donation_requests_donor', $data);
    }
    
    } else {
      $this->view('users/login');
    }
    
  }
>>>>>>> Stashed changes

  public function pendingRequestDetails(){
      if (!isLoggedIn()) {
          redirect('users/login');
      }
      $this->view('users/admin/pendingDonationDetails');
  }

  public function requestDetails(){
      if (!isLoggedIn()) {
          redirect('users/login');
      }
      $this->view('users/admin/completedDonationDetails');
  }

  public function userDetails(){
      if (!isLoggedIn()) {
          redirect('users/login');
      }
      $this->view('users/admin/userDetails');
  }

  public function approve(){
      if (!isLoggedIn()) {
          redirect('users/login');
      }
      $this->view('users/admin/approve');
  }

  public function profile(){
      if (!isLoggedIn()) {
          redirect('users/login');
      }
      $this->view('users/admin/profile');
  }

  public function editProfile(){
      if (!isLoggedIn()) {
          redirect('users/login');
      }
      $this->view('users/admin/editProfile');
  }

  public function changePassword(){
      if (!isLoggedIn()) {
          redirect('users/login');
      }
      $this->view('users/admin/changePassword');
  }

  public function addNewRequest(){
      if (!isLoggedIn()) {
          redirect('users/login');
      }
      $this->view('users/admin/addNewRequest');
  }
<<<<<<< Updated upstream
<<<<<<< Updated upstream
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes
}
