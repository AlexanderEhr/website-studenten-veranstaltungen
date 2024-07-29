<?php
//namespace Project\Classes;
//use PDO;
//use PDOException;


// Die Funktionen hier in der Classe werden in allen anderen Classen aufgerufen um diese Methode aus zu führen.

class DBUtility {

    // Funktion zum Löschen eines Eintrags aus der Datenbank
    public static function delete($db, $table, $id) {
        try {
            $stmt = $db->prepare("DELETE FROM $table WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->rowCount() > 0; 
        } catch (PDOException $e) {
            error_log("Error deleting record: " . $e->getMessage());
            return false;
        }
    }


     // Funktion zum Einfügen eines neuen Eintrags in die Datenbank
     public static function insert($db, $table, $data) {
        try {
            // Erzeuge eine Liste der Spalten und Platzhalter für das SQL-Statement
            $columns = implode(", ", array_keys($data));
            $placeholders = ":" . implode(", :", array_keys($data));
            $stmt = $db->prepare("INSERT INTO $table ($columns) VALUES ($placeholders)");

            foreach ($data as $key => $value) {
                $stmt->bindValue(":$key", $value);
            }
            $stmt->execute();
            return $stmt->rowCount() > 0;

        } catch (PDOException $e) {
            error_log("Error inserting record: " . $e->getMessage());
            echo "Fehler beim Einfügen des Datensatzes: " . $e->getMessage() . "<br>";
            return false;
        }
    }



     // Funktion zum Aktualisieren eines Eintrags in der Datenbank
     public static function update($db, $table, $id, $data) {
        try {

            // Erzeuge die SET-Klausel für das SQL-Statement
            $set = [];
            foreach ($data as $key => $value) {
                $set[] = "$key = :$key";
            }
            $setClause = implode(", ", $set);
            $stmt = $db->prepare("UPDATE $table SET $setClause WHERE id = :id");

            // Binde die Werte an die entsprechenden Platzhalter
            foreach ($data as $key => $value) {
                $stmt->bindValue(":$key", $value);
            }
            $stmt->bindValue(":id", $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->rowCount() > 0;

        } catch (PDOException $e) {
            error_log("Error updating record: " . $e->getMessage());
            return false;
        }
    }



     // Select Function
     public static function select($db, $table, $id) {
        try {
            $stmt = $db->prepare("SELECT * FROM $table WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC) ?: false;
            
        } catch (PDOException $e) {
            error_log("Error selecting record: " . $e->getMessage());
            return false;
        }
    }


     // SelectAll Function
     public static function selectAll($db, $table) {
        try {
            $stmt = $db->prepare("SELECT * FROM $table");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC) ?: [];

        } catch (PDOException $e) {
            error_log("Error selecting records: " . $e->getMessage());
            return [];
        }
    }
    


    // SelectByColumn Function
    public static function selectByColumn($db, $table, $column, $value) {
        try {
            $stmt = $db->prepare("SELECT * FROM $table WHERE $column = :value");
            $stmt->bindParam(':value', $value);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            error_log("Error selecting records: " . $e->getMessage());
            return false;
        }
    }


}
?>
