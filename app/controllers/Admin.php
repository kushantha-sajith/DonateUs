<?php

    class Admin extends Controller{
        public function __construct(){
            if(!isLoggedIn()){
                redirect('users/login');
            }

            $this->adminModel = $this->model('AdminModel');
        }

        //load admin dashboard
        /**
         * @return void
         */
        public function index(){
            $data = [];
            $this->view('users/admin/index', $data);
        }

        //load categories page
        /**
         * @return void
         */
        public function categories(){
            $categories = $this->adminModel->getCategories();
            $data = [
              'title' => 'Donation Categories',
              'categories' => $categories
            ];
      
            $this->view('users/admin/categories', $data);
          }

          //add method of categories
        /**
         * @return void
         */
        public function addCategories(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'category_name' => trim($_POST['category_name']),
                    'category_name_err' => ''
                ];

                // Validate data
                if(empty($data['category_name'])){
                    $data['category_name_err'] = 'Please enter category name';
                }

                if ($this->adminModel->findCategoryByName($data['category_name'])) {
                    $data['category_name_err'] = 'Category already exists';
                }

                // Make sure no errors
                if(empty($data['category_name_err'])){
                    // Validated
                    if($this->adminModel->addCategory($data)){
                        // flash('category_message', 'Category Added');
                        redirect('admin/categories');
                    } else {
                        die('Something went wrong');
                    }
                } else {
                    // Load view with errors
                    $this->view('users/admin/addCategories', $data);
                }
            } else {
                // Init data
                $data = [
                    'category_name' => '',
                    'category_name_err' => ''
                ];

                // Load view
                $this->view('users/admin/addCategories', $data);
            }
        }

        //edit method of categories
        /**
         * @param $id
         * @return void
         */
        public function editCategories($id){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'id' => $id,
                    'category_name' => trim($_POST['category_name']),
                    'category_name_err' => ''
                ];

                // Validate data
                if(empty($data['category_name'])){
                    $data['category_name_err'] = 'Please enter category name';
                    redirect('admin/editCategories/' . $id);
                }

                // Make sure no errors
                if(empty($data['category_name_err'])){
                    // Validated
                    if($this->adminModel->editCategory($data)){
                        // flash('category_message', 'Category Added');
                        redirect('admin/categories');
                    } else {
                        die('Something went wrong');
                    }
                } else {
                    // Load view with errors
                    $this->view('users/admin/categories', $data);
                }
            } else {
                // Get existing category from model
                $category = $this->adminModel->getCategoryById($id);
                // Init data
                $data = [
                    'id' => $id,
                    'category_name' => $category->category_name,
                    'category_name_err' => ''
                ];

                // Load view
                $this->view('users/admin/editCategories', $data);
            }
        }

        //delete method of categories
        /**
         * @param $id
         * @return void
         */
        public function deleteCategories($id){
                if($this->adminModel->deleteCategory($id)){
                    redirect('admin/categories');
                } else {
                    die('Something went wrong');
                }
        }

        /**
         * @return void
         */
        public function users(){
            $users = $this->adminModel->getUsers();
            $categories = $this->adminModel->getCategories();
            $data = [
                'title' => 'Users',
                'users' => $users,
                'categories' => $categories
            ];

            $this->view('users/admin/users', $data);
        }

        /**
         * @return void
         */
        public function donationRequests(){
            $donationRequests = $this->adminModel->getDonationRequests();
            $categories = $this->adminModel->getCategories();
            $data = [
                'title' => 'Donation Requests',
                'donationRequests' => $donationRequests,
                'categories' => $categories
            ];

            $this->view('users/admin/donationRequest', $data);
        }

        /**
         * @return void
         */
        public function events(){
            $events = $this->adminModel->getEvents();
            $categories = $this->adminModel->getCategories();
            $data = [
                'title' => 'Events',
                'events' => $events,
                'categories' => $categories
            ];

            $this->view('users/admin/events', $data);
        }

        /**
         * @return void
         */
        public function stats(){
            $data = [
                'title' => 'Statistics'
            ];

            $this->view('users/admin/stats', $data);
        }

        /**
         * @return void
         */
        public function financialDonationHistory(){
            $financialDonationHistory = $this->adminModel->financialDonationHistory();
            $data = [
                'title' => 'Donation History',
                'financialDonationHistory' => $financialDonationHistory
            ];

            $this->view('users/admin/donationHistory', $data);
        }

        /**
         * @return void
         */
        public function nonFinancialDonationHistory(){
            $nonFinancialDonationHistory = $this->adminModel->nonFinancialDonationHistory();
            $data = [
                'title' => 'Donation History',
                'nonFinancialDonationHistory' => $nonFinancialDonationHistory
            ];

            $this->view('users/admin/nonFinancialDonations', $data);
        }
    }

    