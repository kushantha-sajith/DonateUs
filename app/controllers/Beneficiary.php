<?php

    class Beneficiary extends Controller{
        public function __construct(){
            // if(!isLoggedIn()){
            //     redirect('users/login');
            // }

            $this->beneficiaryModel = $this->model('BeneficiaryModel');
        }

        public function index(){

            $data = [];

            $this->view('users/beneficiary/index', $data);
        }

        public function requests(){
            $requests = $this->beneficiaryModel->getRequests();
            $data = [
              'title' => 'Donation Requests',
              'requests' => $requests
            ];
      
            $this -> view('users/beneficiary/requests', $data);
          }

          public function newrequest(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                   
                    'description' => trim($_POST['description']),
                    'type' => trim($_POST['type']),
                    'quantity' => trim($_POST['quantity']),
                    'duedate' => trim($_POST['duedate']),
                    'categories' => trim($_POST['categories']),
                    'city' => trim($_POST['city']),
                    'contact' => trim($_POST['contact']),
                    'categoryErr' => '',
                    'descriptionErr' => '',
                    'quantityErr' => '',
                    'typeErr' => '',
                    'contactErr' => '',
                    'cityErr' => '',
                    'duedateErr' => ''
                    
                  ];

                  if(empty($data['description'])){
                    $data['descriptionErr'] = 'Please enter description';
                }

                if(empty($data['type'])){
                    $data['typeErr'] = 'Please enter type';
                }

                if(empty($data['quantity'])){
                    $data['quantityErr'] = 'Please enter quantity';
                }

                if(empty($data['duedate'])){
                    $data['duedateErr'] = 'Please enter duedate';
                }

                if(empty($data['categories'])){
                    $data['categoryErr'] = 'Please enter categories';
                }

                if(empty($data['city'])){
                    $data['cityErr'] = 'Please enter city';
                }

                if(empty($data['contact'])){
                    $data['contactErr'] = 'Please enter contact';
                }

               

                // Make sure no errors
                if(empty($data['descriptionErr']) && empty($data['typeErr']) && empty($data['quantityErr']) && empty($data['duedateErr']) && empty($data['categoryErr']) && empty($data['cityErr']) && empty($data['contactErr'])){
                    // Validated
                    if($this->beneficiaryModel->addRequest($data)){
                        // flash('category_message', 'Category Added');
                        redirect('beneficiary/requests');
                    } else {
                        die('Something went wrong');
                    }
                } else {
                    // Load view with errors
                    $this->view('users/beneficiary/newrequest', $data);
                }

            }else{
                $data = [
                   /* 'id' => '',*/
                    'description' => '',
                    'type' => '',
                    'quantity' => '',
                    'duedate' => '',
                    'categories' => '',
                    'city' => '',
                    'contact' => '',
                    'categoryErr' => '',
                    'descriptionErr' => '',
                    'quantityErr' => '',
                    'typeErr' => '',
                    'contactErr' => '',
                    'cityErr' => '',
                    'duedateErr' => ''
                  ];
            
                  $this -> view('users/beneficiary/newrequest', $data);
            }
           

          }

          public function edit($id){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'id' => $id,
                    'description' => trim($_POST['description']),
                    'type' => trim($_POST['type']),
                    'quantity' => trim($_POST['quantity']),
                    'duedate' => trim($_POST['duedate']),
                    'categories' => trim($_POST['categories']),
                    'city' => trim($_POST['city']),
                    'contact' => trim($_POST['contact']),
                    // 'user_id' => $_SESSION['user_id'],
                    'categoryErr' => '',
                    'descriptionErr' => '',
                    'quantityErr' => '',
                    'typeErr' => '',
                    'contactErr' => '',
                    'cityErr' => '',
                    'duedateErr' => ''                    
                  ];

                  if(empty($data['description'])){
                    $data['descriptionErr'] = 'Please enter description';
                }

                if(empty($data['type'])){
                    $data['typeErr'] = 'Please enter type';
                }

                if(empty($data['quantity'])){
                    $data['quantityErr'] = 'Please enter quantity';
                }

                if(empty($data['duedate'])){
                    $data['duedateErr'] = 'Please enter duedate';
                }

                if(empty($data['categories'])){
                    $data['categoryErr'] = 'Please enter categories';
                }

                if(empty($data['city'])){
                    $data['cityErr'] = 'Please enter city';
                }

                if(empty($data['contact'])){
                    $data['contactErr'] = 'Please enter contact';
                }

               

                // Make sure no errors
                if(empty($data['descriptionErr']) && empty($data['typeErr']) && empty($data['quantityErr']) && empty($data['duedateErr']) && empty($data['categoryErr']) && empty($data['cityErr']) && empty($data['contactErr'])){
                    // Validated
                    if($this->beneficiaryModel->editRequest($data)){
                        // flash('category_message', 'Category Added');
                        redirect('beneficiary/requests');
                    } else {
                        die('Something went wrong');
                    }
                } else {
                    // Load view with errors
                    $this->view('users/beneficiary/edit', $data);
                }

            }else{

                $requests = $this->beneficiaryModel->getRequestById($id);                //check for owner
                // if($requests->user_id != $_SESSION['user_id']){
                //     redirect('requests');
                // }
                $data = [
                    'id' => $id,
                    'description' => $requests->description,
                    'type' => $requests->type,
                    'quantity' => $requests->quantity,
                    'duedate' => $requests->duedate,
                    'categories' => $requests->categories,
                    'city' => $requests->city,
                    'contact' => $requests->contact,
                    'categoryErr' => '',
                    'descriptionErr' => '',
                    'quantityErr' => '',
                    'typeErr' => '',
                    'contactErr' => '',
                    'cityErr' => '',
                    'duedateErr' => ''
                  ];
            
                  $this -> view('users/beneficiary/edit', $data);
            }
           

          }


          public function delete($id){              
                $requests = $this->beneficiaryModel->getRequestById($id);                //check for owner
                // if($requests->user_id != $_SESSION['user_id']){
                //     redirect('requests');
                // }                
                if($this->beneficiaryModel->deleteRequest($id)){
                    // flash('request_message','Request Removed');
                    redirect('beneficiary/requests');
                }else{
                    die('Something went wrong');
                }
          }


          
    }
    
  