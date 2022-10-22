<?php

    class matchFinder {
        private $userToken;
        private $database;
        
        function __construct($givenUserToken, $givenDatabase){
            $this->userToken = $givenUserToken;
            $this->database = $givenDatabase;
        }
        
        public function getUserPreferences(){
            $preferenceQuery = "
                SELECT maanliUserPreference.prefer_gender, maanliUserPreference.minAge, maanliUserPreference.maxAge, maanliUserProfile.age
                FROM maanliUserPreference 
                LEFT JOIN maanliUserProfile 
                ON maanliUserPreference.id = maanliUserProfile.id
                WHERE maanliUserPreference.id = $this->userToken
            ";
            return $this->database->Query($preferenceQuery)->fetch_object();
        }

        public function findMatches($givenPreferences, $withInterest = true){
            $matchQuery = "
                SELECT id, firstName, lastName, age, gender, height 
                FROM maanliUserProfile
                WHERE id != $this->userToken
            ";

            if($givenPreferences->prefer_gender != "any")
                $matchQuery .= "AND gender = '$givenPreferences->prefer_gender'";

            $matchQuery .= "
                AND age > $givenPreferences->age - $givenPreferences->minAge
                AND age < $givenPreferences->age + $givenPreferences->maxAge
            ";

            $matchList = [];
            $matchFetch = $this->database->Query($matchQuery);
            while ($match = $matchFetch->fetch_assoc())
                $matchList[] = $match;

            if($withInterest) {

                for($i=0; $i<sizeof($matchList); $i++){
                    $matchInterestQuery = "
                        SELECT interestName, userID
                        FROM maanliUserInterests
                        WHERE ".$matchList[$i]['id']." = userID
                    ";
                    $matchInterestFetch = $this->database->Query($matchInterestQuery);
            
                    $matchInterestList = [];
                    while($row = $matchInterestFetch->fetch_object()) {
                        $matchInterestList[] = $row->interestName;
                    }
            
                    $matchList[$i]['matchInterestList'] = $matchInterestList;
                }
            }

            return $matchList;
        }
    }

?>