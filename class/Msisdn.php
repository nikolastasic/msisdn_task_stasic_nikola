<?php
/**
 * Created by PhpStorm.
 * User: Nikola Stašić
 * Date: 7/22/2017
 * Time: 2:59 PM
 */



include "db_connect.php";

class Msisdn
{

    private $input_msisdn;

    private $country_id;
    private $mno_id;


    public function __construct($input_msisdn)
    {
        $this->input_msisdn = trim($input_msisdn);

        $this->country_id = substr($this->input_msisdn, 1, 3);

        $this->mno_id = substr($this->input_msisdn, 4, 2);
    }


    public function validation()
    {

        $validate_msisdn = [

            "validation" => "Your MSISDN number is not valid!",
            "msisdn_info" => [],
            "checker" => 1
        ];

        if ($this->input_msisdn != "") {

            if (preg_match("/^\+[1-9]{1,3}[0-9]{4,14}$/", $this->input_msisdn)) {


                $record = $this->find($this->input_msisdn);


                if (count($record) > 0) {

                    $validate_msisdn = [

                        "validation" => "Your MSISDN number is valid!",
                        "msisdn_info" => $record,
                        "checker" => 2

                    ];

                } else {

                    $validate_msisdn = [

                        "validation" => "Missing from DB!",
                        "msisdn_info" => [],
                        "checker" => 3
                    ];
                }

            }

        }


        return $validate_msisdn;
    }

    public function find()
    {

        global $conn;

        $sql = "SELECT * FROM number_info
                WHERE country_id = " . $this->country_id . " AND mn_id = " . $this->mno_id . " ";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        return $row;


    }


}