<?PHP
include_once ('C:\xampp\htdocs\projetweb1\config.php');
include_once ('C:\xampp\htdocs\projetweb1\model\categorie.php');

class categorieC
{

    public function ajoutercategorie($categorie)
    {
        $sql = "INSERT INTO categorie(idCategorie,nomC,descriptionC) 
			VALUES (NULL,:nomC,:descriptionC)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nomC' => $categorie->getnom(), 
                'descriptionC' => $categorie->getdescription()  
             ]);
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }
  
    public function affichercategorie()
    {

        $sql = "SELECT * FROM categorie";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }



    function supprimercategorie($idv)
    {
        $sql = "DELETE FROM categorie WHERE idCategorie = :idv";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':idv', $idv);
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    function recuperercategorie($id)
    {
        $sql = "SELECT * from categorie where idCategorie=$id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $user = $query->fetch();
            return $user;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    public function updatecategorie($categorie, $idCategorie)
            {
                try {
                    $db = config::getConnexion();
                    $query = $db->prepare(
                        'UPDATE categorie SET 
                            nomC = :nomC,  
                            descriptionC = :descriptionC
                        WHERE idCategorie= :idCategorie'
                    );
                    $query->execute([
                        'idCategorie' => $idCategorie,
                        'nomC' => $categorie->getnom(),
                        'descriptionC' => $categorie->getdescription()
                    ]);
                    echo $query->rowCount() . " records UPDATED successfully <br>";
                } catch (PDOException $e) {
                    $e->getMessage();
                }
            }

            
    // public function updatecategorie($updatedCategory, $idCategorie) {
    //     $db = config::getConnexion(); // Assuming you have a database connection method
    //     try {
    //         $query = $db->prepare("UPDATE categorie SET nomC = :nomC, descriptionC = :descriptionC WHERE idCategorie = :idCategorie");
    //         $query->execute([
    //             'nomC' => $updatedCategory->getnom(), // Assuming getnom() retrieves the updated name
    //             'descriptionC' => $updatedCategory->getdescription(), // Assuming getdescription() retrieves the updated description
    //             'idCategorie' => $idCategorie
    //         ]);
    //         echo $query->rowCount() . " records UPDATED successfully <br>";
    //     } catch (PDOException $e) {
    //         // Handle the exception, e.g., display an error message or log it
    //         echo "Error updating category: " . $e->getMessage();
    //     }
    // }
    public function listProd()
    {
        $sql = "SELECT * FROM categorie";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    public function showcategorie($id)
    {
        $sql = "SELECT * FROM categorie WHERE id = :id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute(['id' => $id]);
    
            $categorie = $query->fetch();
            return $categorie;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    
   
    function affichertri(){
			
        $sql="SELECT * FROM categorie ORDER BY id";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
    }  
        public function AffichereventPaginer($page, $perPage)
        {
            $start = ($page > 1) ? ($page * $perPage) - $perPage : 0;
            $sql = "SELECT * FROM categorie LIMIT {$start},{$perPage}";
            $db = config::getConnexion();
            try {
                $liste = $db->prepare($sql);
                $liste->execute();
                $liste = $liste->fetchAll(PDO::FETCH_ASSOC);
                return $liste;
            } catch (Exception $e) {
                die('Erreur: ' . $e->getMessage());
            }
        }
    
    
        public function calcTotalRows($perPage)
        {
            $sql = "SELECT SQL_CALC_FOUND_ROWS * FROM categorie";
            $db = config::getConnexion();
            try {
    
                $liste = $db->query($sql);
                $total = $db->query("SELECT FOUND_ROWS() as total")->fetch()['total'];
                $pages = ceil($total / $perPage);
                return $pages;
            } catch (Exception $e) {
                die('Erreur: ' . $e->getMessage());
            }
        }

        function triec(){
            $sql = "SELECT *   from categorie  ";
            $db = config::getConnexion();
            try{
                $liste=$db->query($sql);
                return $liste;
            }
            catch (Exception $e){
                die('Erreur: '.$e->getMessage());
            }
        }

        function sortv()
    {
        $sql = "SELECT * from categorie order by prix desc";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function recherchecategorie($key)
    {
       $sql = "SELECT * FROM categorie WHERE idCategorie LIKE '%$key%' OR nomC LIKE '%$key%' ";
       $db = config::getConnexion() ;
       try {
       $liste = $db->query($sql);
       return $liste;
     } catch (Exception $e) {
       die('Erreur: ' . $e->getMessage());
     }
   }  
                    

/*function showProd($id)
{
    $sql = "SELECT * from categorie where id = :id";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute(['id' => $id]);

        $avis = $query->fetch();
        return $categorie;
    } catch (Exception $e) {
        die('Error: ' . $e->getMessage());
    }}

    	//trie croissant selon prix
	    
        function afficherRecherche($rech){
                    
            $sql="SELECT * FROM categorie where nom like '%$rech%'";
            $db = config::getConnexion();
            try{
                $liste = $db->query($sql);
                return $liste;
            }
            catch (Exception $e){
                die('Erreur: '.$e->getMessage());
            }	
        }*/
}