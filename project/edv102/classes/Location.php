<?php

include_once DB_CONNECTION; 


class Locations {
    private $id;
    private $location;

    // Getter and Setter methods
    public function getId() {return $this->id;}

    public function setId($id) {$this->id = $id;}

    public function getLocation() {return $this->location;}

    public function setLocation($location) {$this->location = $location;}


    // Insert method
    public function insert($db) {
        $data = [
            'location' => $this->location
            
        ];
        return DBUtility::insert($db, 'locations', $data);
    }


    // Delete method
    public function delete($db, $id) {
        return DBUtility::delete($db, 'locations', $id);
    }


    // Update method
    public function update($db, $id) {
        $data = [
            'locaton' => $this->location
        ];
        return DBUtility::update($db, 'locations', $id, $data);
    }


    // Select method
    public function select($db, $id) {
        $result = DBUtility::select($db, 'locations', $id);
    if ($result) {
        $this->id = $result['id'];
        $this->location = $result['location'];
        return $this; // Erfolg, das aktuelle Objekt zurückgeben
    } else {
        return false; // Kein Eintrag gefunden
    }
    }


    // SelectAll method
    public function selectAll($db, $id) {
        $results = DBUtility::selectAll($db, 'categories');
        $categorys = [];

        if ($results) {
            foreach ($results as $result) {
                $location= new self();
                $location->setId($result['id']);
                $location->setLocation($result['location']);
                $locations[] = $location;
            }
        }

        return $locations; // Rückgabe eines Arrays von Objekten
    }
    

}
?>
