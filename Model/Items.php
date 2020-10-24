<?php
class Items{
    public $list = array( );
   private $servername = "localhost";
   private $username = "root";
   private $password = "";
   private $DbName = "items";

   public function Items()
    {

        // Create connection
        $conn = new mysqli($this->servername, $this->username, $this->password , $this->DbName);

        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        //echo "Connected successfully";


        $sql = "SELECT * FROM items";
        $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
          
            while($u = $result->fetch_assoc())
            {
            $this->list[] = array(
                'ID' => $u['ID'],
                'ItemName' => $u['ItemName'],
                'ItemPrice' => $u['ItemPrice']
                  );
            }
        }        
    }

    public function get_list ()
    { 
        return $this->list;
    }

    public function getItem($itemName)
    {
       $found_key = array_search($itemName, array_column($this->list, 'ItemName'));
        return $this->list[$found_key];
    }
    public function getItemPrice ($itemName)
    {
        $item =$this-> getItem ($itemName);
		$iPrice =  array_slice($item, 2);
		extract($iPrice);
        return $ItemPrice;
    }
    
}

?>