<?php
namespace Model; 

class EntityRepository
{
    private $db;
    public $table;
    public function getDb() // méthode permettant d'instancier la classe PDO et de créer un objet PDO
    {
        if(!$this->db) // seulement si $this->db n'est pas remplie;si il n'y a pas de connexion BDD, alors on la construit
        {
            try
            {
                $xml = simplexml_load_file('app/config.xml'); 
                // echo '<pre>'; print_r($xml); echo '</echo>';     

                $this->table = $xml->table;//on associe de la table du fichier XML à la propriété '$table" de la classe,cette propriété nous servira pour tute nos requetes SQL (INSERT INTO $this->table)

                try
                {
                    $this->db = new \PDO("mysql:dbname=" . $xml->db . ";host=" . $xml->host, $xml->user, $xml->password, array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION)); // connexion à la BDD, si jamais on change de BDD,nous n'aurons pas besoin de modifier ce code, c'est un code généric, c'est le fichier config.xml que l'on modifiera
                    //  echo '<pre>'; var_dump($this->db); echo '</pre>';     
                }
                catch(\PDOException $e) // On entre dans le 'catch' en cas de mauvase connexion
                //l'anti-slash permet de sortir du namespace model
                {
                    die("Problème de connexion BDD !!");
                }
            }
            catch(\PDOException $e)
            {
                die("Problème de fichier XML manquant !!");
            }
        }
        return $this->db; // on retourne la connexion
    }

    public function selectAll() // méthode permettant de sélectionner tout les employés
    {
        // $q = $bdd->query(SELECT* FROM employe"); c'est la meême chose
        // $this->getDb() : représente un objet PDO donc une connexion à la BDD
        $q = $this->getDb()->query("SELECT * FROM " . $this->table);
        // $this->table : représente dans notre cas la table 'employé', c'est ce que l'on a récupéré du fichier config.xml
        $r = $q->fetchAll(\PDO::FETCH_ASSOC);
        return $r;
    }
    public function getFields() // méthode permettant de récupérer le noms des champs / colonne de la table 'employe'
    {
        $q = $this->getDb()->query("DESC " . $this->table); // DESC; descrpition de la table
        $r = $q->fetchAll(\PDO:: FETCH_ASSOC);
        return array_splice($r, 1); // permet de supprimer le premier champs idEmploye dans le formulaire gràce à la méthode arra_splice()
    }

    public function select($id) // méthode permettant de selectionner les données d'un employé dans la BDD via son id
    {
        // $q = $this->getDb()->query("SELECT * FROM  employe WHERE idEmploye = 7256);
        $q = $this->getDb()->query("SELECT * FROM " . $this->table . ' WHERE id' . ucfirst($this->table) . "=" . (int) $id);
        // $this->table : employe
        // id' . ucfirst($this->table) : idEmploye
        $r = $q->fetch(\PDO::FETCH_ASSOC);
        return $r;
    }

    public function save()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : 'NULL';

        // $q = $this->getDb()->query('REPLACE INTO employe (idEmploye, prenom, nom, sexe, service, dateEmbauche, salaire)VALUES ('  $id . ', '$_POST[prenom]', '$_POST[nom]' etc...)');  


        $q = $this->getDb()->query('REPLACE INTO ' . $this->table . '(id' . ucfirst($this->table) . ',' . implode(',', array_keys($_POST)) . ') VALUES (' . $id . ','. "'" . implode("','", $_POST) . "'" . ')');
        // $this->table : retourne la table 'employe'
        //id . ucfirst($this->table) : idEmploye
        // implode(',', array_keys($_POST)) : permet d'extraire chaque indice du formulaire afin de les appelés comme nom de champs/colonne dans la requete

    }
    public function delete($id)
    { 
        // $q = $this->getD()->query("DELETE FROM employe WHERE idEmploye = 7256");
        $q = $this->getDb()->query("DELETE FROM " . $this->table . " WHERE id" . ucfirst($this->table) . '=' . (int) $id);
    }
}
// on aura tte les requetes dans ce fichier

$e = new EntityRepository;
$e->getDb();
  
