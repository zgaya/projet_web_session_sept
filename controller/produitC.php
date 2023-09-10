<?PHP
include_once ('C:\xampp\htdocs\projetweb1\config.php');
include_once ('C:\xampp\htdocs\projetweb1\model\produit.php');

class produitC
{

    public function ajouterproduit($produit)
    {
        $sql = "INSERT INTO produit(idProduit,idCategorie,nomP,prix,descriptionP) /*img,*/ 
			VALUES (NULL,:idCategorie,:nomP,:prix,:descriptionP)";  /*image*/
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);

            $query->execute([
                'idCategorie' => $produit->getidcategorie(),
                'nomP' => $produit->getnom(),
                'prix' => $produit->getprix(),
                // 'img' => $produit->getimage(),
                'descriptionP' => $produit->getdescription()

            ]);
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
  
    public function afficherproduit()
    {

        $sql = "SELECT * FROM produit";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }



    function supprimerproduit($idv)
    {
        $sql = "DELETE FROM produit WHERE idProduit = :idv";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':idv', $idv);
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    
    public function updateproduit($produit, $idProduit)
            {
                try {
                    $db = config::getConnexion();
                    $query = $db->prepare(
                        'UPDATE produit SET
                            idCategorie= :idCategorie, 
                            nomP = :nomP, 
                            prix = :prix,
                            descriptionP = :descriptionP
                        WHERE idProduit= :idProduit'
                    );
                    $query->execute([
                        'idProduit' => $idProduit,
                        'idCategorie' => $produit->getidcategorie(),
                        'nomP' => $produit->getnom(),
                        'prix' => $produit->getprix(),
                        'descriptionP' => $produit->getdescription()
                    ]);
                    echo $query->rowCount() . " records UPDATED successfully <br>";
                } catch (PDOException $e) {
                    die('Erreur: ' . $e->getMessage());
                }
            }
    public function listProd()
    {
        $sql = "SELECT * FROM produit";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    public function showProduit($id)
    {
        $sql = "SELECT * FROM produit WHERE id = :id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute(['id' => $id]);
    
            $produit = $query->fetch();
            return $produit;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    
    function recupererproduit($id)
    {
        $sql = "SELECT * from produit where idProduit=$id";
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
   
    function affichertri(){
			
        $sql="SELECT * FROM produit ORDER BY id";
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
            $sql = "SELECT * FROM produit LIMIT {$start},{$perPage}";
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
            $sql = "SELECT SQL_CALC_FOUND_ROWS * FROM produit";
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
            $sql = "SELECT *   from produit  ";
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
        $sql = "SELECT * from produit order by prix desc";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function rechercheproduit($key)
    {
       $sql = "SELECT * FROM produit WHERE idProduit LIKE '%$key%' OR nomP LIKE '%$key%' OR prix LIKE '%$key%'";
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
    $sql = "SELECT * from produit where id = :id";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute(['id' => $id]);

        $avis = $query->fetch();
        return $produit;
    } catch (Exception $e) {
        die('Error: ' . $e->getMessage());
    }}

    	//trie croissant selon prix
	    
        function afficherRecherche($rech){
                    
            $sql="SELECT * FROM produit where nom like '%$rech%'";
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