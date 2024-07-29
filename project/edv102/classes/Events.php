<?php

include_once DB_CONNECTION; 

class Events {
    private $id;
    private $seminars_id;
    private $start;
    private $end;
    private $rooms_id;

    // Getter and Setter methods
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getSeminarsId() {
        return $this->seminars_id;
    }

    public function setSeminarsId($seminars_id) {
        $this->seminars_id = $seminars_id;
    }

    public function getStart() {
        return $this->start;
    }

    public function setStart($start) {
        $this->start = $start;
    }

    public function getEnd() {
        return $this->end;
    }

    public function setEnd($end) {
        $this->end = $end;
    }

    public function getRoomsId() {
        return $this->rooms_id;
    }

    public function setRoomsId($rooms_id) {
        $this->rooms_id = $rooms_id;
    }

    // Insert method
    public function insert($db) {
        $data = [
            'seminars_id' => $this->seminars_id,
            'start' => $this->start,
            'end' => $this->end,
            'rooms_id' => $this->rooms_id
            
        ];
        return DBUtility::insert($db, 'events', $data);
    }


    // Delete method
    public function delete($db, $id) {
        return DBUtility::delete($db, 'events', $id);
    }

    // Update method
    public function update($db, $id) {
        $data = [
           'seminars_id' => $this->seminars_id,
            'start' => $this->start,
            'end' => $this->end,
            'rooms_id' => $this->rooms_id
        ];
        return DBUtility::update($db, 'events', $id, $data);
    }

    // Select method
    public function select($db, $id) {
        $result = DBUtility::select($db, 'events', $id);
        if ($result) {
            $this->id = $result['id'];
            $this->seminars_id = $result['seminars_id'];
            $this->start = $result['start'];
            $this->end = $result['end'];
            $this->rooms_id = $result['rooms_id'];
            return $this; // Erfolg, das aktuelle Objekt zurückgeben
        } else {
            return false; // Kein Eintrag gefunden
        }
    }

    // SelectAll method
    public function selectAll($db, $id) {
        $results = DBUtility::selectAll($db, 'events');
        $events = [];

        if ($results) {
            foreach ($results as $result) {
                $event = new self();
                $event->setId($result['id']);
                $event->setSeminarsId($result['seminars_id']);
                $event->setStart($result['start']);
                $event->setEnd($result['end']);
                $event->setRoomsId($result['rooms_id']);
                $events[] = $event;
            }
        }

        return $events; // Rückgabe eines Arrays von Objekten
    }





}

?>