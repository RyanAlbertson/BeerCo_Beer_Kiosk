<?php
// Used to get filtered product data from the beer_co database.
class Product {

    private $table = 'product_data';
    private $dbConnect = false;

    // Establishes connecton to database.
    public function __construct() {
        require_once "../resources/data/config.php";
        if(!$this->dbConnect) {
            $conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
            if($conn->connect_error) {
                die("ERROR: failed to connect to MySQL: " . $conn->connect_error);
            } else {
                $this->dbConnect = $conn;
            }
        }
    }

    // Gets and stores data using a SQL query.
    private function getData($sqlQuery) {
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		if(!$result){
            //QUERY FAILS HERE
			die('ERROR: SQL query failed: '. $this->dbConnect->connect_error);
		}
		$data= array();
		while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
			$data[]=$row;
		}
		return $data;
    }

    // Gets the number of beers returned by a SQL query.
	private function getNumRows($sqlQuery) {
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		if(!$result){
			die('ERROR: SQL query failed: '. $this->dbConnect->connect_error);
		}
		$numRows = mysqli_num_rows($result);
		return $numRows;
	}

    // Gets brand names from beer_co database.
    public function getBrand() {
		$sqlQuery = "
			SELECT DISTINCT(Brand_Name)
			FROM ".$this->table."
			WHERE status = '1' ORDER BY Brand_Name ASC";
        return  $this->getData($sqlQuery);
    }

    // Gets brewer names from beer_co database.
    public function getBrewer() {
		$sqlQuery = "
			SELECT DISTINCT(Brewer)
			FROM ".$this->table."
			WHERE status = '1' ORDER BY Brewer ASC";
        return  $this->getData($sqlQuery);
    }

    // Gets region names from beer_co database.
    public function getRegion() {
		$sqlQuery = "
			SELECT DISTINCT(Origin_region)
			FROM ".$this->table."
			WHERE status = '1' ORDER BY Origin_region ASC";
        return  $this->getData($sqlQuery);
    }

    // Gets country names from beer_co database.
    public function getCountry() {
		$sqlQuery = "
			SELECT DISTINCT(Origin_Country)
			FROM ".$this->table."
			WHERE status = '1' ORDER BY Origin_Country ASC";
        return  $this->getData($sqlQuery);
    }

    // Gets and displays the queried beers.
    public function searchProducts() {

        $sqlQuery = "SELECT * FROM ".$this->table." WHERE status = '1'";
        if(isset($_POST["brand"])) {
            $brandFilterData = implode("','", $_POST["brand"]);
            $sqlQuery .= "
            AND Brand_Name IN('".$brandFilterData."')";
        }
        if(isset($_POST["brewer"])) {
            $brewerFilterData = implode("','", $_POST["brewer"]);
            $sqlQuery .= "
            AND Brewer IN('".$brewerFilterData."')";
        }
        if(isset($_POST["region"])) {
            $regionFilterData = implode("','", $_POST["region"]);
            $sqlQuery .= "
            AND Origin_region IN('".$regionFilterData."')";
            }
        if(isset($_POST["country"])) {
            $countryFilterData = implode("','", $_POST["country"]);
            $sqlQuery .= "
            AND Origin_Country IN('".$countryFilterData."')";
            }

        $sqlQuery .= " ORDER BY Brand_Name";
        $result = mysqli_query($this->dbConnect, $sqlQuery);
        $totalResult = mysqli_num_rows($result);
        $searchResultHTML = '';
        if($totalResult > 0) {
            while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
                $searchResultHTML .= '
                <div class="col-sm-4 col-lg-3 col-md-3">
                    <div class="product">
                        <p align="center"><strong><a href="#">'. $row['UPC'] .'</a></strong></p>
                        <p>
                            Brand : '. $row['Brand_Name'] .' <br />
                            Brewer : '. $row['Brewer'] .' <br />
                            Oz : '. $row['Oz'] .' Oz.<br />
                            ABV : '. $row['ABV'] .'%<br />
                            Calories : '. $row['Calories'] .'<br />
                            Origin Region : '. $row['Origin_region'] .'<br />
                            Origin Country : '. $row['Origin_Country'] .'
                        </p>
                    </div>
                </div>';
            }
        } else {
            $searchResultHTML = '<h3>No beers found. Please change your search.</h3>';
        }
        return $searchResultHTML;
    }
}
?>