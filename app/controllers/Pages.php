<?php
class Pages extends Controller{
  public function __construct(){
    $this->beneficiaryModel = $this->model('BeneficiaryModel');
    $this->donorModel = $this->model('DonorModel');
    $this->userModel = $this->model('User');
    $this->adminPageModel = $this->model('AdminPage');
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

    /**
     * @return void
     */
    public function beneficiary(){
      if(!isLoggedIn()){
          redirect('users/login');
      }
    $data = [
      'title' => 'Beneficiary'
    ];

    $this->view('users/beneficiary/index', $data);
  }

    /**
     * @return void
     */
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
        $data = [
            'email' => '',
            'password' => '',
            'email_err' => '',
            'password_err' => ''
        ];
      $this->view('users/login', $data);
    }
  }

    /**
     * @return void
     */
    public function profileBeneficiary(){
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

          $this->view('users/beneficiary/profile_beneficiary', $data);
      } else {
          $this->view('users/login');
      }
  }

    /**
     * @return void
     */
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
      $this->view('users/login');
    }
  }

    /**
     * @return void
     */
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

    /**
     * @return void
     */
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

    /**
     * @return void
     */
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

    /**
     * @return void
     */
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

    /**
     * @return void
     */
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

    /**
     * @return void
     */
    public function pendingRequestDetails(){
      if (!isLoggedIn()) {
          redirect('users/login');
      }
      $this->view('users/admin/pendingDonationDetails');
  }

    /**
     * @return void
     */
    public function requestDetails(){
      if (!isLoggedIn()) {
          redirect('users/login');
      }
      $this->view('users/admin/completedDonationDetails');
  }

    /**
     * @return void
     */
    public function userDetails($id){
      if (!isLoggedIn()) {
          redirect('users/login');
      }
      $user_type = $this->adminPageModel->getUserType($id);
      if ($user_type == 2){
          $userData = $this->adminPageModel->getIndDonorDetails($id);
          $data = [
              'userData' => $userData
          ];
      }elseif ($user_type == 3){
          $userData = $this->adminPageModel->getCorpDonorDetails($id);
          $data = [
              'userData' => $userData
          ];
      }elseif ($user_type == 4){
          $userData = $this->adminPageModel->getIndBeneficiaryDetails($id);
          $data = [
              'userData' => $userData
          ];
      }elseif ($user_type == 5) {
          $userData = $this->adminPageModel->getOrgBeneficiaryDetails($id);
          $data = [
              'userData' => $userData
          ];
      }elseif ($user_type == 6){
          $userData = $this->adminPageModel->getOrganizerDetails($id);
          $data = [
              'userData' => $userData
          ];
      }

      $this->view('users/admin/userDetails', $data);
  }

    /**
     * @return void
     */
    public function approve(){
      if (!isLoggedIn()) {
          redirect('users/login');
      }
      $this->view('users/admin/approve');
  }

    /**
     * @return void
     */
    public function profile(){
      if (!isLoggedIn()) {
          redirect('users/login');
      }
      $this->view('users/admin/profile');
  }

    /**
     * @return void
     */
    public function editProfile(){
      if (!isLoggedIn()) {
          redirect('users/login');
      }
      $this->view('users/admin/editProfile');
  }

    /**
     * @return void
     */
    public function changePassword(){
      if (!isLoggedIn()) {
          redirect('users/login');
      }
      $this->view('users/admin/changePassword');
  }

    /**
     * @return void
     */
    public function addNewRequest(){
      if (!isLoggedIn()) {
          redirect('users/login');
      }
      $this->view('users/admin/addNewRequest');
  }

    /**
     * @return void
     */
    public function processing(){
      $this->view('users/processing');
  }
}
