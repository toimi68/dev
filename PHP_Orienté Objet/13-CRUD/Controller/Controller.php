<?php
// le fichier controller.php contient toute les actions et les méthodes  a exécutées. Par exemple,si je souhaite afficher les informations 10 par 10, c'est dans ce fichier que l'on fera ce traitement
namespace Controller; 

class Controller
{
    private $db;
    public function __construct()
    {
        $this->db = new \model\EntityRepository; // permet de récupérer une connexion à la BDD qui se trovue dans le fichier EntityRepository.php
    }
    public function handlerRequest() // méthode qui permet de définir l'action de l'utilisateur, par exemple ,si l'utilisateur veut ajouter un employé, c'est la méthode save() qui s'execute
    {
        $op = isset($_GET['op']) ? $_GET['op'] : NULL; // si 'op'est définit ds l'URL, on le stock dans une variable sinon on stock 'NULL'

        try
        {
            if($op == 'add' || $op == 'update') $this->save($op);// si on a ajoute ou modifie un employé, on appellera la méthod save()
            elseif($op == 'select') $this->select(); // si on selectionne un employé,on fait appel à la méthod select()
            elseif($op == 'delete') $this->delete();// // si on supprime un employé,on fait appel à la méthod delete()
            else $this->selectAll();// permet d'afficher l'ensemble des employés
        }
        catch(Exception $e)
        {
            die("Problème dans l'action de l'internaute !!!");
        }
    }
    public function delete()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : NULL; // on contrôle qu'un id a bien été passé dans l'URL et on le stock
        $r = $this->db->delete($id); // on fait appel à la méthode delete() du fichier EntityRepository.php
        $this->redirect('index.php'); // après la suppression, on redirige vers la page index.php
    }
    public function select()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : NULL;// on contrôle si un id a été envoyé dans l'URL et on le stock dans la variable $id
        $this->render('layout.php', 'details.php', array(
            "title" => "Detail de l'employe ID : $id",
            "donnees" => $this->db->select($id) // on appel la méthode select() du fichier EntityRepository.php

        ));
    }
    public function selectAll() // définie l'ensemble des employés
    {
        // echo 'Methode selectAll !!';
        // $r = $this->db->selectAll();
        // db --->représente un objet issu de la classe EntityRepository
        // db->selectAll() : on pointe sur la méthode selectAll() déclarée dans la classe EntityRepository
        // echo '<pre>'; print_r($r); echo'</pre>';
        $this->render('layout.php', 'donnees.php', array(
            'title' => 'Toute les données',
            'donnees' => $this->db->selectAll(),// on pointe sur la méthode déclarée dans EntityRepository.php
             'fields' => $this->db->getFields(),// field fait appel à getField qui permet d'avoir nom des champs et colonne (methode render) sur entityRepository
            'id' => 'id' . ucfirst($this->db->table) // affiche idEmploye, cela servira à pointé sur l'indice idEmploye du tableau de données envoyer dans le layout pour les liens voir/modifier/supprimer
        ));
    }

    public function save($op)
    {
        $title = $op; // permet de récupérer la donnée envoyé dans l'URL et de la stocké dans $title

        $id = isset($_GET['id']) ?$_GET['id'] : NULL; // permet de contrôler si il y a un id envoyé dans l'url,dans ce cas on le stocke dans la variable $id

        $values = ($op == 'update') ? $this->db->select($id) : '';// si on a envoyé un id dans l'URL, on l'envoi en argument de la méthode select() de EntityRepository.php,cela permettra de selectionner toutes les donénes de l'employé pour la modification

        if($_POST)
        {
            $r = $this->db->save(); // lorsque l'on valide le formulaire d'ajout, oexecute la méthode save() du fichier EntityRepository.php
            $this->redirect('index.php'); // une fois l'insertion ou la modification executée,on redirige vers la page index.php
        }
        $this->render('layout.php', 'donnees-form.php', array(
            "title" => "Donnée : $title",
            "op" => $op,
            "fields" => $this->db->getFields(), // on pointe sur la méthode déclarée dans EntityRepository.php
            "values" => $values // permet de récupérer tout les données de l'employé en cas de modification
        ));
    }

    public function render($layout, $template, $parameters = array())
    {
        extract($parameters); // permet d'avoir les indices du tableau comme variable
        ob_start(); // commence la temporisation

        require "view/$template";
        // content = require "view/$template";

        $content = ob_get_clean(); // tout se qui se trouve dans la template sera stocké dans $content grace ) la fonction ob_get_clean()

        ob_start(); // temporise la sortie de l'affichage
        require "view/$layout";

        return ob_end_flush(); // permet de libérer l'affichage et fait tout apparaître sur la page
    }
    public function redirect($url) // méthode permettant d'effectuer une redirection après modification ou ajout
    {
        header("Location:" . $url);
    }
}

// tte les actions en fonction de l'internaute seront récuperer ici. Sert à controler l'application

