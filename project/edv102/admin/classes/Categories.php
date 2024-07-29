
<?php
include_once DB_CONNECTION;

class Categories {
    private $id;
    private $category;


    // Getter and Setter methods
    public function getId() {return $this->id;}

    public function setId($id) {$this->id = $id;}

    public function getCategory() {return $this->category;}

    public function setCategory($category) {$this->category = $category;}


    // Insert method
    public function insert($db) {
        $data = [
            'category' => $this->category
            
        ];
        return DBUtility::insert($db, 'categories', $data);
    }


    // Delete method
    public function delete($db, $id) {
        return DBUtility::delete($db, 'categories', $id);
    }


    // Update method
    public function update($db, $id) {
        $data = [
            'category' => $this->category
        ];
        return DBUtility::update($db, 'categories', $id, $data);
    }


    // Select method
    public function select($db, $id) {
        $result = DBUtility::select($db, 'categories', $id);
    if ($result) {
        $this->id = $result['id'];
        $this->category = $result['category'];
        return $this; // Erfolg, das aktuelle Objekt zurückgeben
    } else {
        return false; // Kein Eintrag gefunden
    }
    }


    // SelectAll method
    public function selectAll($db) {
        $results = DBUtility::selectAll($db, 'categories');
        $categorys = [];

        if ($results) {
            foreach ($results as $result) {
                $category = new self();
                $category->setId($result['id']);
                $category->setCategory($result['category']);
                $categorys[] = $category;
            }
        }

        return $categorys; 
    }
}
?>