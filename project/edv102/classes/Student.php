<?php

include_once DB_CONNECTION; 

class Student {
    private $id;
    private $title;
    private $name;
    private $familyname;
    private $street;
    private $housenumber;
    private $postcode;
    private $city;
    private $email;
    private $register_date;
    private $login;
    private $password;

    // Getter and Setter methods
    public function getId() {return $this->id;}

    public function setId($id) {$this->id = $id;}

    public function getTitle() {return $this->title;}

    public function setTitle($title) {$this->title = $title;}

    public function getName() {return $this->name;}

    public function setName($name) {$this->name = $name;}

    public function getFamilyname() {return $this->familyname;}

    public function setFamilyname($familyname) {$this->familyname = $familyname;}

    public function getStreet() {return $this->street;}

    public function setStreet($street) {$this->street = $street;}

    public function getHousenumber() {return $this->housenumber;}

    public function setHousenumber($housenumber) {$this->housenumber = $housenumber;}

    public function getPostcode() {return $this->postcode;}

    public function setPostcode($postcode) {$this->postcode = $postcode;}

    public function getCity() {return $this->city;}

    public function setCity($city) {$this->city = $city;}

    public function getEmail() {return $this->email;}

    public function setEmail($email) {$this->email = $email;}

    public function getRegisterDate() {return $this->register_date;}

    public function setRegisterDate($register_date) {$this->register_date = $register_date;}

    public function getLogin() {return $this->login;}

    public function setLogin($login) {$this->login = $login;}

    public function getPassword() {return $this->password;}

    public function setPassword($password) {$this->password = $password;}


    // Insert method
    public function insert($db) {
        $data = [
            'title' => $this->title,
            'name' => $this->name,
            'familyname' => $this->familyname,
            'street' => $this->street,
            'housenumber' => $this->housenumber,
            'postcode' => $this->postcode,
            'city' => $this->city,
            'email' => $this->email,
            'register_date' => $this->register_date,
            'login' => $this->login,
            'password' => $this->password
        ];
        return DBUtility::insert($db, 'student', $data);
    }


    // Delete method
    public function delete($db, $id) {
        return DBUtility::delete($db, 'student', $id);
    }


    // Update method
    public function update($db, $id) {
        $data = [
            'title' => $this->title,
            'name' => $this->name,
            'familyname' => $this->familyname,
            'street' => $this->street,
            'housenumber' => $this->housenumber,
            'postcode' => $this->postcode,
            'city' => $this->city,
            'email' => $this->email,
            'register_date' => $this->register_date,
            'login' => $this->login,
            'password' => $this->password
        ];
        return DBUtility::update($db, 'student', $id, $data);
    }


    // Select method
    public function select($db, $id) {
            $result = DBUtility::select($db, 'student', $id);
        if ($result) {
            $this->id = $result['id'];
            $this->title = $result['title'];
            $this->name = $result['name'];
            $this->familyname = $result['familyname'];
            $this->street = $result['street'];
            $this->housenumber = $result['housenumber'];
            $this->postcode = $result['postcode'];
            $this->city = $result['city'];
            $this->email = $result['email'];
            $this->register_date = $result['register_date'];
            $this->login = $result['login'];
            $this->password = $result['password'];

            return $this; // Erfolg, das aktuelle Objekt zurückgeben
        } else {
            return false; // Kein Eintrag gefunden
        }
    }


    // SelectAll method
    public function selectAll($db) {
       $results = DBUtility::selectAll($db, 'student');
        $students = [];

        if ($results) {
            foreach ($results as $result) {
                $student = new self();
                $student->setId($result['id']);
                $student->setTitle($result['title']);
                $student->setName($result['name']);
                $student->setFamilyname($result['familyname']);
                $student->setStreet($result['street']);
                $student->setHousenumber($result['housenumber']);
                $student->setPostcode($result['postcode']);
                $student->setCity($result['city']);
                $student->setEmail($result['email']);
                $student->setRegisterDate($result['register_date']);
                $student->setLogin($result['login']);
                $student->setPassword($result['password']);
                $students[] = $student;
            }
        }

        return $students; // Rückgabe eines Arrays von Objekten
    }
    
}

?>