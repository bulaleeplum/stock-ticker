<?php
    /**
     * Created by PhpStorm.
     * User: scott
     * Date: 15/04/16
     * Time: 2:16 PM
     */
define('SERVER_BACKUP', ('http://www.comp4711bsx.local/data/'));
define('SERVER', ('http://bsx.jlparry.com/data/'));
    class GameModel extends CI_Model {

        /**
         * Constructor.
         */
        function __construct() {
            parent::__construct();
        }


        function getStocks() {
            return $this->importCSV2Array(SERVER . 'stocks', 'r');
        }

        function getMovements() {
            return $this->importCSV2Array(SERVER . 'movement', 'r');
        }

        function getTransactions() {
            return $this->importCSV2Array(SERVER . 'transactions', 'r');
        }

        private function importCSV2Array($filename) {
            $row = 0;
            $col = 0;
            $handle = @fopen($filename, "r");
            if ($handle) {
                while (($row = fgetcsv($handle, 4096)) !== false) {
                    if (empty($fields)) {
                        $fields = $row;
                        continue;
                    }

                    foreach ($row as $k => $value) {
                        $results[$col][$fields[$k]] = $value;
                    }
                    $col++;
                    unset($row);
                }
                if (!feof($handle)) {
                    echo "Error: unexpected fgets() failng";
                }
                fclose($handle);
            } else {
                echo "fopen failed";
            }

            return isset($results) ? $results : "";
        }
    }