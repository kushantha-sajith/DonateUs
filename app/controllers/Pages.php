<?php
class Pages extends Controller{
  public function __construct(){
//      if(!isLoggedIn()){
//          redirect('users/login');
//      }
    //  $this->Beneficiary = $this->('BeneficiaryModel');
    $this->donorModel = $this->model('DonorModel');
    $this->userModel = $this->model('User');
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

  /**
   * @return void
   */
  public function admin(){
      if(!isLoggedIn()){
          redirect('users/login');
      }
    $data = [
      'title' => 'Admin'
    ];

    $this->view('users/admin/index', $data);
  }

  /**
   * @return void
   */
  public function donor(){
      if(!isLoggedIn()){
          redirect('users/login');
      }
    $image_name = $this->profileImage();
    // $row2 = mysqli_fetch_assoc($userdata);
    // $image_name = $row2['prof_img'];
    $data = [
      'title' => 'Dashboard',
      'prof_img' => $image_name
    ];

    $this->view('users/donor/index', $data);
  }

  public function beneficiary(){
      if(!isLoggedIn()){
          redirect('users/login');
      }
    $data = [
      'title' => 'Beneficiary'
    ];

    $this->view('users/beneficiary/index', $data);
  }

  public function organizer(){
      if(!isLoggedIn()){
          redirect('users/login');
      }
    $image_name = $this->profileImage();
    // $row2 = mysqli_fetch_assoc($userdata);
    // $image_name = $row2['prof_img'];
    $data = [
      'title' => 'Dashboard',
      'prof_img' => $image_name
    ];

    $this->view('users/eorganizer/index', $data);
  }

  /**
   * @return void
   */
  public function profileDonor(){
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
      $this->view('users/login_donor', $data);
    }
  }

  public function profileBeneficiary(){
      if(!isLoggedIn()){
          redirect('users/login');
      }

    $data = [
      'title' => 'Profile'
    ];

    $this->view('users/beneficiary/profile_beneficiary', $data);
  }

  public function profileOrganizer(){
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
      $this->view('users/login_donor', $data);
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
      $this->view('users/login_donor', $data);
    }
  }

  public function editProfileDonor(){
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
      $this->view('users/login_donor', $data);
    }
  }

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
      $this->view('users/login_donor', $data);
    }
  }

  public function editProfileOrganizer(){
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
        'dist' => $dist_name
      ];

      $this->view('users/eorganizer/edit_profile_eorganizer', $data);
    } else {
      $this->view('users/login_donor', $data);
    }
  }

  public function changePasswordOrganizer(){
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
      $this->view('users/login_donor', $data);
    }
  }

  //load donation history page
  /**
   * @return void
   */
  public function donationHistoryDonor(){
      if(!isLoggedIn()){
          redirect('users/login');
      }
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
  public function donationRequestsDonor(){
      if(!isLoggedIn()){
          redirect('users/login');
      }
    $image_name = $this->profileImage();
    $data = [
      'title' => 'Donation Requests',
      'prof_img' => $image_name
    ];

    $this->view('users/donor/donation_requests_donor', $data);
  }

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
}
