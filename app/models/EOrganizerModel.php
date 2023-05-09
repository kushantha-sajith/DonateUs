<?php

class EOrganizerModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    /**
     * @return mixed
     */
    public function getUserData($id)
    {



        $this->db->query('SELECT * FROM reg_user WHERE id = :id');
        $this->db->bind(':id', $id);
        $results = $this->db->resultSet();
        return $results;
    }

    public function updateprofileeorganizer($data)
    {

        $zero = '1';

        $this->db->query('SELECT * FROM reg_user WHERE id = :id');
        $this->db->bind(':id', $data['id']);
        $row2 = $this->db->single();
        $tp_existing = $row2->tp_number;
        $tp_new = $data['contact'];

        $this->db->query('SELECT * FROM event_org WHERE user_id = :id');
        $this->db->bind(':id', $data['id']);
        $row = $this->db->single();

        if (empty($data['full_name'])) {
            $data['full_name'] = $row->full_name;
        }
        if (empty($data['comm_name'])) {
            $data['comm_name'] = $row->community_name;
        }
        if (empty($data['desg'])) {
            $data['desg'] = $row->designation;
        }
        if (empty($data['city'])) {
            $data['city'] = $row->city;
        }
        if ($data['district'] == $zero) {
            $data['district'] = $row->district;
        }


        $this->db->query('UPDATE event_org SET full_name = :full_name, community_name = :comm_name, designation = :desg, zipcode = :city, district = :district WHERE user_id = :id');
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':full_name', $data['full_name']);
        $this->db->bind(':comm_name', $data['comm_name']);
        $this->db->bind(':desg', $data['desg']);
        $this->db->bind(':city', $data['city']);
        $this->db->bind(':district', $data['district']);


        if ($this->db->execute()) {

            $this->db->query('SELECT * FROM reg_user WHERE tp_number = :tp_number');
            // Bind value
            $this->db->bind(':tp_number', $data['contact']);
            $row3 = $this->db->single();
            // Check row
            if ($this->db->rowCount() > 0) {
                $tp_new = $tp_existing;
            } else {
                if (empty($data['contact'])) {
                    $tp_new = $tp_existing;
                }
            }


            $this->db->query('UPDATE reg_user SET tp_number = :tp_number WHERE id = :id');
            $this->db->bind(':id', $data['id']);
            $this->db->bind(':tp_number', $tp_new);

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
     * @param $data
     * @return bool
     */

    public function addevent($data, $file)
    {
        // $type1 = "ind";
        $this->db->query('INSERT INTO events (event_title, description, location, budget, due_date , proof_letter, thumbnail, bank_pass_book, bank_acc_number, bank_name, event_org_id) 
        VALUES
        (:event_title, :description, :city, :ammount, :due_date, :proof_document, :thumb, :passbook, :accountno, :bankname, :event_org_id)');

        // Bind values
        $this->db->bind(':event_title', $data['title']);
        $this->db->bind(':description', $data['description']);
       
        $this->db->bind(':city', $data['city']);
        $this->db->bind(':ammount', $data['ammount']);
        $this->db->bind(':due_date', $data['duedate']);
        $this->db->bind(':proof_document', $file['proof_name']);
        $this->db->bind(':thumb', $file['thumb_name']);
        $this->db->bind(':passbook', $file['passbook_name']);
        $this->db->bind(':accountno', $data['accountno']);
        $this->db->bind(':bankname', $data['bankname']);
        $this->db->bind(':event_org_id', $data['event_org_id']);

        move_uploaded_file($file['thumb_temp_name'], $file['thumb_upload_to'] . $file['thumb_name']);
        move_uploaded_file($file['proof_temp_name'], $file['proof_upload_to'] . $file['proof_name']);
        move_uploaded_file($file['passbook_temp_name'], $file['passbookb_upload_to'] . $file['passbook_name']);


        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
        //     } else {
        //         return false;

        // }
    }

    public function updateEvent($data, $file)
    {
        // exit(json_encode($data));
        $this->db->query('UPDATE events SET event_title = :event_title, description = :description, location = :city, budget = :ammount, due_date = :due_date, proof_letter = :proof_document, thumbnail = :thumb, bank_pass_book = :passbook, bank_acc_number = :accountno, bank_name = :bankname WHERE id = :id');
        // Bind values
        $this->db->bind(':id', $data['event_id']);
        $this->db->bind(':event_title', $data['title']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':city', $data['city']);
        $this->db->bind(':ammount', $data['ammount']);
        $this->db->bind(':due_date', $data['duedate']);
        $this->db->bind(':proof_document', $file['proof_name']);
        $this->db->bind(':thumb', $file['thumb_name']);
        $this->db->bind(':passbook', $file['passbook_name']);
        $this->db->bind(':accountno', $data['accountno']);
        $this->db->bind(':bankname', $data['bankname']);

        if ($file['thumb_temp_name'] != "") {
            move_uploaded_file($file['thumb_temp_name'], $file['thumb_upload_to'] . $file['thumb_name']);
        }
        if ($file['proof_temp_name'] != "") {
            move_uploaded_file($file['proof_temp_name'], $file['proof_upload_to'] . $file['proof_name']);
        }
        if ($file['passbook_temp_name'] != "") {
            move_uploaded_file($file['passbook_temp_name'], $file['passbookb_upload_to'] . $file['passbook_name']);
        }

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getEvents($userId, $status)
    {
        $this->db->query('SELECT * FROM events WHERE event_org_id = :id AND status = :status');
        $this->db->bind(':id', $userId);
        $this->db->bind(':status', $status);
        $results = $this->db->resultSet();
        return $results;
    }

    public function getEvent($id)
    {
        $this->db->query('SELECT * FROM events WHERE id = :id');
        $this->db->bind(':id', $id);
        $results = $this->db->single();
        return $results;
    }

    //number of ongoing requests
    public function getOngoingReqCount($user_ID)
    {
        $this->db->query('SELECT COUNT(*) AS total_donation_requests FROM events WHERE status = 1 AND  event_org_id = :user_ID');
        $this->db->bind(':user_ID', $user_ID);
        $row = $this->db->single();
        return $row->total_donation_requests;
    }
    //pending requests status(0)
    public function getPendingReqCount($user_ID)
    {
        $this->db->query('SELECT COUNT(*) AS total_donation_requests FROM events WHERE status = 0 AND  event_org_id = :user_ID');
        $this->db->bind(':user_ID', $user_ID);
        $row = $this->db->single();
        return $row->total_donation_requests;
    }
    //total donations from events_donation_history table whose events are from this user
    public function getTotalDonations($user_ID)
    {
        $this->db->query('SELECT SUM(amount) AS total_donation FROM event_donation_history WHERE event_id IN (SELECT id FROM events WHERE event_org_id = :user_ID)');
        $this->db->bind(':user_ID', $user_ID);
        $row = $this->db->single();
        return $row->total_donation;
    }

    //donation date, amount from event_donation_history and donor name from f_name and l_name related to that donation from ind_don ordered by most recent date
    public function getDonationHistory($user_ID)
    {
        $this->db->query('SELECT event_donation_history.id, event_donation_history.date_of_completion, event_donation_history.amount, CONCAT(ind_don.f_name, " ", ind_don.l_name) AS donor_name FROM event_donation_history INNER JOIN ind_don ON event_donation_history.don_id = ind_don.user_id WHERE event_id IN (SELECT id FROM events WHERE event_org_id = :user_ID) ORDER BY event_donation_history.date_of_completion DESC');
        $this->db->bind(':user_ID', $user_ID);
        $results = $this->db->resultSet();
        return $results;
    }

    //donation date, title 
}