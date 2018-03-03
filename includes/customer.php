<?php
 include_once 'database.php';

    class Customer{
    	public $customer_id;
    	public $first_name;
    	public $last_name;
    	public $dob;
    	public $email;
    	public $address;
    	public $status;
    	public $password;
    	

      public static $table_fields = array('customer_id','first_name','last_name','dob','email','address','status','password');
          public static $table_name = 'customer';


        public static  function instantiate($record){
        	$object = new Customer();
        	foreach ($record as $key => $value) {
        		# code...
        		if(in_array($key,self::$table_fields))
        			$object->$key = $value;
        	}
        	return $object;
        }
        private  function attribute(){
          $attributes = array();
            foreach (self::$table_fields as $field) {
              # code...
              if($this->$field != NULL)
              $attributes [$field] =  $this ->$field;
            }
         return $attributes;
        } 

        public  function create_post($post){
        	global $database;
        	unset($post['create']);
            $post['password'] = md5($post['password']);
            $attributes =  array_keys($post);
            $sql = "INSERT INTO ".self::$table_name." (".join(',',$attributes).")  VALUES ('";
            $sql.= join("','",$post)."')";

            return $database->query($sql);
         
        }

        public static function All(){
            global $database;
            $sql = "SELECT * FROM ".self::$table_name;
            $customers = $database->query($sql)->fetchAll(PDO::FETCH_CLASS,'Customer');
             return ($customers) ? $customers : false;
        } 


        public function create(){
            global $database;
            $obj_attributes_array = $this->attribute();

            $obj_attributes_array_keys = array_keys($obj_attributes_array);

            $sql = "INSERT INTO ".self::$table_name;
            $sql.=" (".join(',',$obj_attributes_array_keys).") ";
            $sql.="VALUES ('".join("','",$obj_attributes_array)."')";
            return $database->query($sql);

        }

        public static function find($id){
            global$database;
            $sql = "SELECT  * FROM ".self::$table_name." WHERE customer_id = '$id'";
            $customer = self::instantiate($database->query($sql)->fetch(PDO::FETCH_ASSOC));
            return($customer) ? $customer : false;
            
        }
        public function update(){
            global $database;
            $sql = " UPDATE ".self::$table_name."SET";
            $obj_array_attr = $this->attribute();

            $array_attr_pairs = array();
            foreach ($obj_array_attr as $field => $value) {
                # code...
                $array_attr_pairs[] = "$field = '$value'";
            }
            $sql.= join(',',$array_attr_pairs);
            $sql.= "WHERE customer_id = {$this->customer_id}";
            
            return $database->query($sql);
        }
        public function delete(){
            global $database;
             $sql = " DELETE FROM ".self::$table_name;
             $sql.= " WHERE customer_id = ".$this->customer_id;
             return ($database->query($sql)) ? true : false;
         }

         public static function emailLike($email){
            global $database;
            $sql = " SELECT * FROM ".static::$table_name." WHERE email LIKE  '%$email%'";
             return ($database->query($sql)) ? true : false;
         } 
    }
?>