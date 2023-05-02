<?php

class VerificationModel extends Database
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    /**
     * @param $otp
     * @return false|mixed
     */
    public function verifyOTP($otp)
    {
        $this->db->query('SELECT * FROM `reg_user` WHERE `otp_code` = :otp');
        $this->db->bind(':otp', $otp);

        $row = $this->db->single();
        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }

    /**
     * @param $id
     * @return bool
     */
    public function verify($id)
    {
        $this->db->query('UPDATE `reg_user` SET `otp_verify` = :status, `otp_code` = :otp WHERE `id` = :id');
        $this->db->bind(':id', $id);
        $this->db->bind(':status', 1);
        $this->db->bind(':otp', '');

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function verifyUpdate($id)
    {
        $this->db->query('UPDATE `reg_user` SET `otp_verify` = :status, `otp_code` = :otp, `backup` = :backup WHERE `id` = :id');
        $this->db->bind(':id', $id);
        $this->db->bind(':backup', '');
        $this->db->bind(':status', 1);
        $this->db->bind(':otp', '');

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}