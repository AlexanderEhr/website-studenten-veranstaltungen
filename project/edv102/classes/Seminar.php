<?php
//namespace Project\Classes;
//use Project\Classes\DBUtility;
//use PDO;

include_once DB_CONNECTION; 


class Seminar {
    private $id;
    private $title;
    private $description;
    private $price;
    private $categories_id;
    private $duration;

    // Getter and Setter methods
    public function getId() {return $this->id;}

    public function setId($id) {$this->id = $id;}

    public function getTitle() {return $this->title;}

    public function setTitle($title) {$this->title = $title;}

    public function getDescription() {return $this->description;}

    public function setDescription($description) {$this->description = $description;}

    public function getPrice() {return $this->price;}

    public function setPrice($price) {$this->price = $price;}

    public function getCategoriesId() {return $this->categories_id;}

    public function setCategoriesId($categories_id) {$this->categories_id = $categories_id;}

    public function getDuration() {return $this->duration;}

    public function setDuration($duration) {$this->duration = $duration;}


    // Insert method
    public function insert($db) {
        $data = [
            'title' => $this->title,
            'descriptions'=> $this->description,
            'price'=> $this ->price,
            'categories_id'=> $this->categories_id,
            'duration'=>$this->duration
            
        ];
        return DBUtility::insert($db, 'seminars', $data);
    }


    // Delete method
    public function delete($db, $id) {
        return DBUtility::delete($db, 'seminars', $id);
    }


    // Update method
    public function update($db, $id) {
        $data = [
            'title' => $this->title,
            'descriptions'=> $this->description,
            'price'=> $this ->price,
            'categories_id'=> $this->categories_id,
            'duration'=>$this->duration
        ];
        return DBUtility::update($db, 'seminars', $id, $data);
    }


    // Select method
    public function select($db, $id) {
        $result = DBUtility::select($db, 'seminars', $id);
        if ($result) {
            $seminar = new self();
            $seminar->setId($result['id']);
            $seminar->setTitle($result['title']);
            $seminar->setDescription($result['descriptions']);
            $seminar->setPrice($result['price']);
            $seminar->setCategoriesId($result['categories_id']);
            $seminar->setDuration($result['duration']);
            return $seminar; // Erfolg, das Seminar-Objekt zurückgeben
        } else {
            return false; // Kein Eintrag gefunden
        }
    }

    
    // SelectAll method
    public function selectAll($db) {
        $results = DBUtility::selectAll($db, 'seminars');
        $seminars = [];

        if ($results) {
            foreach ($results as $result) {
                $seminar = new self();
                $seminar->setId($result['id']);
                $seminar->setTitle($result['title']);
                $seminar->setDescription($result['descriptions']);
                $seminar->setPrice($result['price']);
                $seminar->setCategoriesId($result['categories_id']);
                $seminar->setDuration($result['duration']);
                $seminars[] = $seminar;
            }
        }

        return $seminars; // Rückgabe eines Arrays von Objekten
    }
}
?>
