<?php
 include_once 'MYPDO.php';
 include_once 'Model.php';

 /**
 * 
 */
 class Items extends Model
 {
 	protected $item_id;
 	protected $customer_id;
 	protected $cart_id;
 	protected $service_id;
 	protected $staff_id;
 	public 	 $datein;
 	public  $dateout;
 	public $expected_delivery_date;
 	public $color;
 	public $amount;
 	public $status;
 	protected static $class_name = 'Items';
	protected static $primary_key = 'item_id';
	protected static $table_name = 'item';
	protected static $table_fields = array('dateout','expected_delivery_date','color','amount','status','item_id','customer_id','cart_id','service_id', 'staff_id','datein' );

 	function __construct()
 	{
 		# code...
 		parent::__construct();
 	}

 	 public static function find($id){
            global$database;
            $sql = "SELECT  * FROM ".static::$table_name." WHERE customer_id = '$id'";
            $customer = static::instantiate($database->query($sql)->fetch(PDO::FETCH_ASSOC));
            return($customer) ? $customer : false;
            
        }

 	public function setNewItemId(){

		
		//staff/001
		if($lastitem = static::last()){
			$lastId = explode ('/',$lastitem->item_id);
		
			if(strlen(++$lastId[1])<3 ){ 
				$this->item_id = 'item/'.str_repeat('0', 3-strlen($lastId[1])).$lastId[1];
			}
			else{
				$this->item_id = 'item/'.$lastId[1];
			}
		}else{
			$this->item_id = 'item/001'; 
		}

	}

 	public function insertItem(){
 		$this->setNewItemId();
 		return ($this->create())? true : false;
 	}

 	public  static function ItemTable(){
		 $table = '<table class= "table table-hover table-striped table-border">
                   <thead>
                    <td>S/NO</td>
                    <td>Item Name</td>
                    <td>Description</td>
                    <td>Color</td>
                    <td>Service</td>
                    <td>Amount</td>
                    <td>Datein</td>
                    <td>Dateout</td>
                    <td>Expected day of delivery</td>
                    <td>Staff</td>
                    <td>Customer</td>
                  </thead>
                  <tbody>';
         if($all =static::All())
        foreach ($all as $item_type){
            $table.="<tr>
            		<td>{$item_type->item_id}</td>
                  	<td>{$item_type->item_name}</td>
                  	<td>{$item_type->item_description}</td>
                  	<td>{$item_type->color}</td>
                  	<td>{$item_type->service}</td>
                  	<td>{$item_type->amount}</td>
                  	<td>{$item_type->datein}</td>
                  	<td>{$item_type->dateout}</td>
                  	<td>{$item_type->expected_delivery_date}</td>
                  	<td>{$item_type->staff_id}</td>
                  	<td>{$item_type->customer_id}</td>
                  	</tr>";
        }
        $table.="</tbody></table>";
                  echo $table;       
    }
 }
 








?>