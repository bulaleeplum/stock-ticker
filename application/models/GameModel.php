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

        function getGameData() {
            $xmlData = simplexml_load_file(SERVER . 'status');
            $gameData = array();

            $gameData['round'] = (string) $xmlData->round;
            $gameData['state'] = (string) $xmlData->state;
            $gameData['desc'] = (string) $xmlData->desc;
            $gameData['setup'] = (string) $xmlData->current;
            $gameData['duration'] = (string) $xmlData->duration;
            $gameData['upcoming'] = (string) $xmlData->upcoming;
            $gameData['alarm'] = (string) $xmlData->alarm;
            $gameData['now'] = (string) $xmlData->now;
            $gameData['countdown'] = (string) $xmlData->countdown;
            
            return $gameData;
        }

    }