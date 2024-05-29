<?php

namespace controllers;

class ShowOrderController
{
    public function loadView(): void
    {
        require 'views/ShowOrder.view.php';
    }
    public function delete($id = NULL)
    {
        global $db;

        if ($id != NULL) {
            $query = "DELETE FROM Orders WHERE id = :id;";
            $params = [
                ':id' => $id,
            ];
            $db->query($query, $params);
        }
        $query = "DELETE FROM Orders WHERE id = :id;";
        $params = [
            ':id' => $_GET['ID'],
        ];
        $db->query($query, $params);
        header('Location: /show');
    }
}