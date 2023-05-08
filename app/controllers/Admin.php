<?php

use helpers\Email;
use Dompdf\Dompdf;

class Admin extends Controller
{
    /**
     * @var mixed
     */
    private $adminModel;
    private $statModel;

    public function __construct()
    {
        if (!isLoggedIn()) {
            redirect('users/login');
        }

        $this->adminModel = $this->model('AdminModel');
        $this->statModel = $this->model('StatModel');
    }

    //load admin dashboard

    /**
     * @return void
     */
    public function index()
    {
        $data = [];
        $this->view('users/admin/index', $data);
    }

    //load categories page

    /**
     * @return void
     */
    public function categories()
    {
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
    public function addCategories()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'category_name' => trim($_POST['category_name']),
                'category_name_err' => ''
            ];

            // Validate data
            if (empty($data['category_name'])) {
                $data['category_name_err'] = 'Please enter category name';
            }

            if ($this->adminModel->findCategoryByName($data['category_name'])) {
                $data['category_name_err'] = 'Category already exists';
            }

            // Make sure no errors
            if (empty($data['category_name_err'])) {
                // Validated
                if ($this->adminModel->addCategory($data)) {
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
    public function editCategories($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'id' => $id,
                'category_name' => trim($_POST['category_name']),
                'category_name_err' => ''
            ];

            // Validate data
            if (empty($data['category_name'])) {
                $data['category_name_err'] = 'Please enter category name';
                redirect('admin/editCategories/' . $id);
            }

            // Make sure no errors
            if (empty($data['category_name_err'])) {
                // Validated
                if ($this->adminModel->editCategory($data)) {
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
    public function deleteCategories($id)
    {
        if ($this->adminModel->deleteCategory($id)) {
            redirect('admin/categories');
        } else {
            die('Something went wrong');
        }
    }

    /**
     * @return void
     */
    public function users()
    {
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
    public function donationRequests()
    {
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
    public function events()
    {
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
    public function stats()
    {
        $data = [
            'title' => 'Statistics'
        ];

        $this->view('users/admin/stats', $data);
    }

    /**
     * @return void
     */
    public function profile()
    {
        $data = [
            'title' => 'Profile'
        ];

        $this->view('users/admin/profile', $data);
    }

    /**
     * @return void
     */
    public function editEmail()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'email' => trim($_POST['email']),
                'email_err' => ''
            ];

            // Validate data
            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter email';
            }

            if ($this->adminModel->findUserByEmail($data['email'])) {
                $data['email_err'] = 'Email already exists';
            }

            // Make sure no errors
            if (empty($data['email_err'])) {
                // Validated
                if ($this->adminModel->editEmail($data)) {
                    // flash('category_message', 'Category Added');
                    redirect('admin/profile');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $this->view('users/admin/profile', $data);
            }
        } else {
            // Init data
            $data = [
                'email' => '',
                'email_err' => ''
            ];

            // Load view
            $this->view('users/admin/profile', $data);
        }
    }

    /**
     * @return void
     */
    public function changePassword()
    {
        $id = $_SESSION['user_id'];
        $user_email = $_SESSION['user_email'];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $otp_verify = 0;
            $otp_code = rand(100000, 999999);

            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'old_password' => trim($_POST['old_password']),
                'new_password' => trim($_POST['new_password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'old_password_error' => '',
                'new_password_error' => '',
                'confirm_password_error' => '',
                'otp_code' => $otp_code,
                'otp_verify' => $otp_verify
            ];

            $error = false;
            $same = $this->adminModel->passwordChecker($data['new_password'], $id);
            $correct = $this->adminModel->passwordChecker($data['old_password'], $id);

            if (!$correct) {
                $data['old_password_error'] = 'Incorrect password';
                $data['new_password'] = '';
                $data['confirm_password'] = '';
                $error = true;
            } else {
                if (empty($data['new_password'])) {
                    $data['new_password_error'] = 'Please enter a new password';
                    $error = true;
                } else {
                    if ($same) {
                        $data['new_password_error'] = 'New password cannot be same as old password';
                        $data['new_password'] = '';
                        $data['confirm_password'] = '';
                        $error = true;
                    } else {
                        if (strlen($data['new_password']) < 6) {
                            $data['new_password_error'] = 'Password must be at least 6 characters';
                            $error = true;
                        }

                        if (empty($data['confirm_password'])) {
                            $data['confirm_password_error'] = 'Please confirm password';
                            $error = true;
                        } else {
                            if ($data['new_password'] != $data['confirm_password']) {
                                $data['confirm_password_error'] = 'Passwords do not match';
                                $error = true;
                            }
                        }
                    }
                }
            }
            if ($error == false) {
                // Hash Password
                $data['new_password'] = password_hash($data['new_password'], PASSWORD_DEFAULT);
                if ($this->adminModel->changePassword($data, $id)) {
                    $email = new Email($user_email);
                    $email->sendVerificationEmail($user_email, $otp_code);
                    redirect('users/otpVerifyAdmin');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $this->view('users/admin/changePassword', $data);
            }
        } else {
            $data = [
                'old_password' => '',
                'new_password' => '',
                'confirm_password' => '',
                'old_password_error' => '',
                'new_password_error' => '',
                'confirm_password_error' => ''
            ];
            $this->view('users/admin/changePassword', $data);
        }
    }

    /**
     * @return void
     */
    public function reports()
    {
        $data = [
            'title' => 'Reports'
        ];

        $this->view('users/admin/reports', $data);
    }

//    /**
//     * @return void
//     */
//    public function monthlyDonationsReport()
//    {
//        $result = $this->adminModel->monthlyDonations();
//        $dompdf = new Dompdf();
//
//        $html = '<h1>Donation History</h1>';
//        $html .= '<table>';
//        $html .= '<thead><tr><th>Donation ID</th><th>Amount</th><th>Completed Date</th></tr></thead>';
//        $html .= '<tbody>';
//        foreach ($result as $row) {
//            $html .= '<tr>';
//            $html .= '<td>' . $row['don_id'] . '</td>';
//            $html .= '<td>' . $row['amount'] . '</td>';
//            $html .= '<td>' . $row['date_of_completion'] . '</td>';
//            $html .= '</tr>';
//        }
//        $html .= '</tbody>';
//        $html .= '</table>';
//
//        $dompdf->loadHtml($html);
//        $dompdf->setPaper('A4');
//        $dompdf->render();
//        $dompdf->stream('Donation_History.pdf', array('Attachment' => 0));
//    }

    /**
     * @return void
     */
    public function donationReqReport()
    {
        $donations = $this->adminModel->financialDonationHistory();
        $nDonations = $this->adminModel->nonFinancialDonationHistory();
        $ongoingCount = $this->statModel->ongoingRequests();
        $completedCount = $this->statModel->completedRequests();
        $rejectedCount = $this->statModel->rejectedRequests();
        $financialCount = $this->adminModel->getTotalFinDonations();
        $category = $this->statModel->categoryCount();

        $data = [
            'title' => 'Donation Request Report',
            'donation' => $donations,
            'nDonation' => $nDonations,
            'ongoingCount' => $ongoingCount,
            'completedCount' => $completedCount,
            'rejectedCount' => $rejectedCount,
            'financialCount' => $financialCount,
            'category' => $category
        ];

        $this->view('users/admin/donationReport', $data);
    }

    /**
     * @return void
     */
    public function financialDonationHistory()
    {
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
    public function nonFinancialDonationHistory()
    {
        $nonFinancialDonationHistory = $this->adminModel->nonFinancialDonationHistory();
        $data = [
            'title' => 'Donation History',
            'nonFinancialDonationHistory' => $nonFinancialDonationHistory
        ];

        $this->view('users/admin/nonFinancialDonations', $data);
    }

    /**
     * @return void
     */
    public function eventReqReport()
    {
        $events = $this->adminModel->eventHistory();
        $ongoing = $this->statModel->ongoingEvents();
        $completed = $this->statModel->completedEvents();
        $rejected = $this->statModel->rejectedEvents();
        $data = [
            'title' => 'Event Report',
            'events' => $events,
            'ongoing' => $ongoing,
            'completed' => $completed,
            'rejected' => $rejected
        ];

        $this->view('users/admin/eventReport', $data);
    }

    /**
     * @return void
     */
    public function eventHistory()
    {
        $eventHistory = $this->adminModel->eventHistory();

        $data = [
            'title' => 'Event Donation History',
            'donationHistory' => $eventHistory
        ];

        $this->view('users/admin/eventDonationHistory', $data);
    }

    /**
     * @return void
     */
    public function monthlyDonationReqReport()
    {
        $donations = $this->adminModel->mFinancialDonationHistory();
        $nDonations = $this->adminModel->mNonFinancialDonationHistory();
        $ongoingCount = $this->statModel->mOngoingRequests();
        $completedCount = $this->statModel->mCompletedRequests();
        $rejectedCount = $this->statModel->mRejectedRequests();
        $financialCount = $this->adminModel->mGetTotalFinDonations();
        $category = $this->statModel->mCategoryCount();

        $data = [
            'title' => 'Donation Request Report',
            'donation' => $donations,
            'nDonation' => $nDonations,
            'ongoingCount' => $ongoingCount,
            'completedCount' => $completedCount,
            'rejectedCount' => $rejectedCount,
            'financialCount' => $financialCount,
            'category' => $category
        ];

        $this->view('users/admin/monthlyDonationReport', $data);
    }
}