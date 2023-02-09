<?php

namespace helpers;

class NIC_Validator{

    protected $nic;

    public function __construct($NIC)
    {
        $this->nic = $NIC;
    }

    function checkNIC($nic)
{
    //first check the nic old or new
    if(strlen($nic) == 10)
    {
        //check for letter v or x
        $lastLetter = $nic[9];
        if($lastLetter == "v" or $lastLetter=="V" or $lastLetter == "x" or $lastLetter=="X")
        {
            $year = ltrim($nic[0].$nic[1],"0"); //this will erase preceding zeros
            if($year > 0)
            {
                $checkingPart = ltrim($nic[2].$nic[3].$nic[4],"0"); //this number indicates the birthday it should be larger than 0 and smaller than 866

                if($checkingPart <= 0 or $checkingPart > 866)
                {
                    return false;
                }else{
                    return true;
                }

            }else{
                return false;
            }

        }else{
            return false;
        }
    }elseif(strlen($nic) == 12)
    {
        //this is the new id card number
        $year = ltrim($nic[0].$nic[1].$nic[2].$nic[3],"0"); //this will erase preceding zeros
        if($year > 1900)
        {
            //year should not be larger than current year

            if($year > date("Y") - 15)
            {
                return false;
            }else{
                $checkingPart = ltrim($nic[4].$nic[5].$nic[6],"0");

                if($checkingPart <= 0 or $checkingPart > 866)
                {
                    return false;

                }else{
                    return true;
                }

            }
        }else{
            return false;
        }
    }else{
        return false;
    }
}

// $nic = "XXXXXXXXX"; //enter the NIC number here
// if(checkNIC($nic))
// {
//     echo "good"; //valid NIC
// }else{
//     echo "false"; //invalid NIC
// }



}

