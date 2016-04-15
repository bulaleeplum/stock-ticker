<?php
    /**
     * Created by PhpStorm.
     * User: scott
     * Date: 15/04/16
     * Time: 2:16 PM
     */

    class GameModel extends CI_Model {

        /**
         * Constructor.
         */
        function __construct() {
            parent::__construct();
        }


        function importCSV2Array($filename) {
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
                    echo "Error: unexpected fgets() failn";
                }
                fclose($handle);
            }

            return $results;
        }
    }