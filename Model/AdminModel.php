<?php


class AdminModel {

    public function getAdminPage($id)
    {
        $dbc = Connect::getConnection();
        $sql = "SELECT p.id, p.status, p.controller, p.action, a.name, a.text, a.alias  FROM pages p JOIN admin a ON p.id = a.id_page AND p.id = :id";
        $placeholders = array('id'=> $id);
        $date = $dbc->getDate($sql, $placeholders);
        if(!$date || $date[0]['status'] == 0){
            throw new Exception("id = $id ,is not exist", 404);
        }
        return $date;
    }

}