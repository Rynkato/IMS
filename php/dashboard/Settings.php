<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/ims/php/DatabaseHandler.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/ims/php/modals/UserModal.php';


class Settings {

    function deleteEverything() {
        $DatabaseHandler = new DatabaseHandler();
        $UserModal = new UserModal();

        $Company_ID = $UserModal->getUserData("Company_ID");

        // Delete Company Database
        $sql = "DROP DATABASE " . $Company_ID;
        $connection = $DatabaseHandler->getCompanyMySQLiConnection($Company_ID);

        $result = $connection->query($sql);

        if($result) {
            // Remove Supervisor & Users from Main Database
            $remUsersSQL = "DELETE FROM ims.users WHERE Company_ID = '" . $Company_ID . "'";
            $remCompanyListSQL = "DELETE FROM ims.company_list WHERE Company_ID = '" . $Company_ID . "'";
            $connectionAdmin = $DatabaseHandler->getAdminMySQLiConnection();

            $remUsersResults = $connectionAdmin->query($remUsersSQL);
            $remCompanyListResults = $connectionAdmin->query($remCompanyListSQL);

            $msg = "";

            if($remUsersResults && $remCompanyListResults) {
                unset($_SESSION['email']);


            } else {
                $msg = "There was an error deleting the inventory management system.";
            }
        } else {
            $msg = "There was an error deleting the inventory management system.";
        }

        return $msg;
    }

    function saveThreshold($min, $max) {
        $DatabaseHandler = new DatabaseHandler();
        $UserModal = new UserModal();

        $sql = "UPDATE company_info SET Minimum_Threshold = $min, Maximum_Threshold = $max WHERE Company_ID = 1";
        $connection = $DatabaseHandler->getCompanyMySQLiConnection($UserModal->getUserData("Company_ID"));

        $result = $connection->query($sql);

        if($result) {
            echo "The threshold values have been saved.";
        } else {
            echo "There was an error in updating the threshold values.";
        }
    }

    function saveCurrencyFormat($format) {
        $DatabaseHandler = new DatabaseHandler();
        $UserModal = new UserModal();

        $sql = "UPDATE company_info SET Currency_Format = '$format' WHERE Company_ID = 1";
        $connection = $DatabaseHandler->getCompanyMySQLiConnection($UserModal->getUserData("Company_ID"));

        $result = $connection->query($sql);

        if($result) {
            echo "The currency format has been saved.";
        } else {
            echo "There was an error in updating the currency format.";
        }
    }

}