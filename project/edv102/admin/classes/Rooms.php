<?php
include_once DB_CONNECTION; 

class Rooms {
    private $id;
    private $room;

    // Getter and Setter methods
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getRoom() {
        return $this->room;
    }

    public function setRoom($room) {
        $this->room = $room;
    }

    // Insert method
    public function insert($db) {
        $data = [
            'room' => $this->room
            
        ];
        return DBUtility::insert($db, 'rooms', $data);
    }

    // Delete method
    public function delete($db, $id) {
        return DBUtility::delete($db, 'rooms', $id);
    }

    // Update method
    public function update($db, $id) {
        $data = [
            'room' => $this->room
        ];
        return DBUtility::update($db, 'rooms', $id, $data);
    }

    // Select method
    public function select($db, $id) {
        $result = DBUtility::select($db, 'rooms', $id);
            if ($result) {
                $this->id = $result['id'];
                $this->room = $result['room'];
                return $this; // Erfolg, das aktuelle Objekt zurückgeben
            } else {
                return false; // Kein Eintrag gefunden
            }
    }

    // SelectAll method
    public function selectAll($db) {
        $results = DBUtility::selectAll($db, 'rooms');
        $categorys = [];

        if ($results) {
            foreach ($results as $result) {
                $room = new self();
                $room->setId($result['id']);
                $room->setRoom($result['room']);
                $rooms[] = $room;
            }
        }

        return $rooms; // Rückgabe eines Arrays von Objekten
    }
}
?>
