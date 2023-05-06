<?php

class AdminModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    /**
     * @return mixed
     */
    public function getCategories()
    {
        $this->db->query('SELECT * FROM categories');
        $results = $this->db->resultSet();
        return $results;
    }

    /**
     * @param $data
     * @return bool
     */
    public function addCategory($data)
    {
        $this->db->query('INSERT INTO categories (category_name) VALUES(:category_name)');
        // Bind values
        $this->db->bind(':category_name', $data['category_name']);
        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param $data
     * @return bool
     */
    public function editCategory($data)
    {
        $this->db->query('UPDATE categories SET category_name = :category_name WHERE id = :id');
        // Bind values
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':category_name', $data['category_name']);
        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param $id
     * @return bool
     */
    public function deleteCategory($id)
    {
        $this->db->query('DELETE FROM categories WHERE id = :id');
        // Bind values
        $this->db->bind(':id', $id);
        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getCategoryById($id)
    {
        $this->db->query('SELECT * FROM categories WHERE id = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }

    // Find user by email

    /**
     * @param $category_name
     * @return bool
     */
    public function findCategoryByName($category_name)
    {
        $this->db->query('SELECT * FROM categories WHERE category_name = :category_name');
        // Bind value
        $this->db->bind(':category_name', $category_name);

        $row = $this->db->single();

        // Check row
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @return mixed
     */
    public function getUsers()
    {
        $this->db->query('SELECT * FROM reg_user');
        $results = $this->db->resultSet();
        return $results;
    }

    /**
     * @return mixed
     */
    public function getDonationRequests()
    {
        $this->db->query('SELECT * FROM donation_req');
        $results = $this->db->resultSet();
        return $results;
    }

    /**
     * @return mixed
     */
    public function getEvents()
    {
        $this->db->query('SELECT * FROM events');
        $results = $this->db->resultSet();
        return $results;
    }

    /**
     * @return mixed
     */
    public function financialDonationHistory()
    {
        $this->db->query('SELECT dh.id, dr.request_title, r.tp_number, dh.date_of_completion, c.category_name AS category, dh.quantity, dh.amount, IF(r.user_type = 2, id.f_name, cd.comp_name) AS donor_name, dr.id as req_id, CASE WHEN dr.req_type = 0 THEN "Financial" WHEN dr.req_type = 1 THEN "Non-financial" END AS req_type, CASE WHEN dh.status = 0 THEN "Pending" WHEN dh.status = 1 THEN "Completed" WHEN dh.status = 2 THEN "Delivered" END AS status FROM donation_history AS dh JOIN reg_user AS r ON dh.don_id = r.id JOIN categories AS c ON dh.category = c.id JOIN donation_req AS dr ON dh.req_id = dr.id LEFT JOIN ind_don AS id ON r.id = id.user_id AND r.user_type = 2 LEFT JOIN corp_don AS cd ON r.id = cd.user_id AND r.user_type = 3 WHERE dh.type = 0');
        $results = $this->db->resultSet();
        return $results;
    }

    /**
     * @return mixed
     */
    public function nonFinancialDonationHistory()
    {
        $this->db->query('SELECT dh.id, dr.request_title, r.tp_number, dh.date_of_completion, c.category_name AS category, dh.quantity, dh.quantity, IF(r.user_type = 2, id.f_name, cd.comp_name) AS donor_name, dr.id as req_id, CASE WHEN dr.req_type = 0 THEN "Financial" WHEN dr.req_type = 1 THEN "Non-financial" END AS req_type, CASE WHEN dh.status = 0 THEN "Pending" WHEN dh.status = 1 THEN "Completed" WHEN dh.status = 2 THEN "Delivered" END AS status FROM donation_history AS dh JOIN reg_user AS r ON dh.don_id = r.id JOIN categories AS c ON dh.category = c.id JOIN donation_req AS dr ON dh.req_id = dr.id LEFT JOIN ind_don AS id ON r.id = id.user_id AND r.user_type = 2 LEFT JOIN corp_don AS cd ON r.id = cd.user_id AND r.user_type = 3 WHERE dh.type = 1;');
        $results = $this->db->resultSet();
        return $results;
    }

    /**
     * @return mixed
     */
    public function getTotalUsers()
    {
        $this->db->query('SELECT COUNT(*) AS total_users FROM reg_user');
        $row = $this->db->single();
        return $row->total_users;
    }

    /**
     * @return mixed
     */
    public function getOngoingReqCount()
    {
        $this->db->query('SELECT COUNT(*) AS total_donation_requests FROM donation_req WHERE status = 1');
        $row = $this->db->single();
        return $row->total_donation_requests;
    }

    /**
     * @return mixed
     */
    public function getTotalFinDonations()
    {
        $this->db->query('SELECT SUM(amount) AS total_fin_donations FROM donation_history WHERE type = 0');
        $row = $this->db->single();
        return $row->total_fin_donations;
    }

    /**
     * @return mixed
     */
    public function getRecentDonations()
    {
        $this->db->query('SELECT dh.date_of_completion, c.category_name AS category, IF(r.user_type = 2, id.f_name, cd.comp_name) AS donor_name, dh.status FROM donation_history AS dh JOIN reg_user AS r ON dh.don_id = r.id JOIN categories AS c ON dh.category = c.id JOIN donation_req AS dr ON dh.req_id = dr.id LEFT JOIN ind_don AS id ON r.id = id.user_id AND r.user_type = 2 LEFT JOIN corp_don AS cd ON r.id = cd.user_id AND r.user_type = 3 ORDER BY dh.date_of_completion DESC LIMIT 5');
        $row = $this->db->resultSet();
        return $row;
    }

    /**
     * @param $password
     * @param $id
     * @return false|mixed
     */
    public function passwordChecker($password, $id)
    {
        $this->db->query('SELECT * FROM reg_user WHERE id = :id');
        $this->db->bind(':id', $id);

        $row = $this->db->single();
        $hashed_password = $row->password;

        if (password_verify($password, $hashed_password)) {
            return $row;
        } else {
            return false;
        }
    }

    public function changePassword($data, $id)
    {
        $this->db->query('SELECT * FROM reg_user WHERE id = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        $hashed_password = $row->password;

        $this->db->query('UPDATE reg_user SET backup = :password_backup WHERE id = :id');
        $this->db->bind(':id', $id);
        $this->db->bind(':password_backup', $hashed_password);

        if ($this->db->execute()) {
            $this->db->query('UPDATE reg_user SET password = :password, otp_code = :otp_code, otp_verify = :otp_verify WHERE id = :id');
            $this->db->bind(':id', $id);
            $this->db->bind(':password', $data['new_password']);
            $this->db->bind(':otp_code', $data['otp_code']);
            $this->db->bind(':otp_verify', $data['otp_verify']);

            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    /**
     * @return mixed
     */
    public function eventHistory()
    {
        $this->db->query('SELECT edh.id AS id, IF(ru.user_type = 2, ind_don.f_name, corp_don.comp_name) AS donor_name, et.event_title, eo.community_name, edh.date_of_completion, edh.amount, ru.tp_number AS donor_contact_number FROM event_donation_history AS edh INNER JOIN reg_user AS ru ON edh.don_id = ru.id LEFT JOIN ind_don ON edh.don_id = ind_don.user_id AND ru.user_type = 2 LEFT JOIN corp_don ON edh.don_id = corp_don.user_id AND ru.user_type = 3 INNER JOIN events AS et ON edh.event_id = et.id INNER JOIN event_org AS eo ON et.event_org_id = eo.user_id ORDER BY id');
        $results = $this->db->resultSet();
        return $results;
    }

    /**
     * @return mixed
     */
    public function monthlyDonations()
    {
//        $this->db->query('SELECT MONTHNAME(dh.date_of_completion) AS month, SUM(dh.amount) AS total FROM donation_history AS dh WHERE dh.type = 0 GROUP BY MONTH(dh.date_of_completion)');
        $this->db->query('SELECT * FROM donation_history WHERE type = 0');
        $results = $this->db->fetchResult();
        return $results;
    }
}