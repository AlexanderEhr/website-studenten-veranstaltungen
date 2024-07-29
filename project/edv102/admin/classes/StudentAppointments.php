<?php
//namespace Project\Classes;

//use Project\Classes\DBUtility;



include_once DB_CONNECTION;

class StudentAppointments {
    
    private $id;
    private $student_id;
    private $events_id;

    // Getter and Setter methods
    public function getId() {return $this->id;}

    public function setId($id) {$this->id = $id;}

    public function getStudentId() {return $this->student_id;}

    public function setStudentId($student_id) {$this->student_id = $student_id;}

    public function getEventsId() {return $this->events_id;}

    public function setEventsId($events_id) {$this->events_id = $events_id;}

    // Insert method
    public function insert($db) {
        $data = [
            'student_id' => $this->student_id,
            'events_id' => $this->events_id
        ];
        return DBUtility::insert($db, 'student_events', $data);
   
    }

    // Delete method
    public function delete($db, $id) {
        return DBUtility::delete($db, 'student_events', $id);
    
    }

    // Update method
    public function update($db, $id) {
        $data = [
            'student_id' => $this->student_id,
            'events_id' => $this->events_id
        ];
        return DBUtility::update($db, 'student_events', $id, $data);
  }

  public function select($db, $id) {
    $result = DBUtility::select($db, 'student_events', $id);
    $seminars = [];

    if ($result) {
        $seminar = new self();
        $seminar->setId($result['id']);
        $seminar->setStudentId($result['student_id']);
        $seminar->setEventsId($result['events_id']);
        $seminars[] = $seminar;
        return $seminars; // Erfolg, das Seminar-Objekt zurückgeben
    } else {
        return false; // Kein Eintrag gefunden
    }
}

    public function selectAll($db) {
        $results = DBUtility::selectAll($db, 'student_events');
        $appointments = [];

        if ($results) {
            foreach ($results as $result) {
                $appointment = new self();
                $appointment->setId($result['id']);
                $appointment->setStudentId($result['student_id']);
                $appointment->setEventsId($result['events_id']);
                $appointments[] = $appointment;
            }
        }

        return $appointments; // Rückgabe eines Arrays von Objekten
    }

    // Neue Methode, um alle Termine für einen Studenten abzurufen
    public function selectAllByStudentId($db, $student_id) {
        $results = DBUtility::selectByColumn($db, 'student_events', 'student_id', $student_id);
        if ($results) {
            $appointments = [];
            foreach ($results as $result) {
                $appointment = new self();
                $appointment->setId($result['id']);
                $appointment->setStudentId($result['student_id']);
                $appointment->setEventsId($result['events_id']);
                $appointments[] = $appointment;
            }
            return $appointments;
        } else {
            return [];
        }
    }

}
?>
