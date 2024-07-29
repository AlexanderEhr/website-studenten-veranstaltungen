<?php
interface iDatenbank
{
    public function set_daten($db);
    public function insert($db);
    public function delete($db, $id);
    public function update($db, $id);
    public function select($db, $id);
    public function selectAll($db);
}
?>
