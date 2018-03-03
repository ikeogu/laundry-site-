<?php
	include_once 'includes/MYPDO.php';
	class Model extends  MyPDO{

			protected static $class_name;
			protected static $primary_key;
			protected static $table_name;
			protected static $table_fields;

			public function __construct(){
				parent::__construct();
			}

		public static function findBySql($sql){

		    $obj = new static();
            $object = $obj->connection->query($sql)->fetchAll(PDO::FETCH_CLASS,static::$class_name);
            return ($object) ? $object : false;
        } 
          private  function attribute(){
          $attributes = array();
            foreach (static::$table_fields as $field) {
              # code...
              if($this->$field != NULL)
              $attributes [$field] =  $this ->$field;
            }
         return $attributes;
        } 
     
        
        public static  function instantiate($record){
            //
        	$object = new static();
        	foreach ($record as $key => $value) {
        		# code...
        		if(in_array($key,static::$table_fields))
        			$object->$key = $value;
        }
        	return $object;
	    }


		public static function All(){
			$obj = new static();
            $sql = "SELECT * FROM ".static::$table_name;
            
            $object = $obj->connection->query($sql)->fetchAll(PDO::FETCH_CLASS,static::$class_name);
            return ($object) ? $object : false;
        } 


        public static function find($id){
           	$obj = new static();
            $sql = "SELECT  * FROM ".static::$table_name." WHERE ".static::$primary_key." = '$id'";
            $object = $obj->connection->query($sql)->fetchAll(PDO::FETCH_CLASS,static::$class_name);
            return($object) ? array_shift($object) : false;
            
        }


        public static function last(){
           $obj = new static();
            $sql = "SELECT  * FROM ".static::$table_name." ORDER BY ".static::$primary_key." DESC LIMIT 1";
            $object = $obj->connection->query($sql)->fetchAll(PDO::FETCH_CLASS,static::$class_name);
            return($object) ? array_shift($object) : false;
            
        }


        public function create(){
            $obj = new static();
            $obj_attributes_array = $this->attribute();

            $obj_attributes_array_keys = array_keys($obj_attributes_array);

            $sql = "INSERT INTO ".static::$table_name;
            $sql.=" (".join(',',$obj_attributes_array_keys).") ";
            $sql.="VALUES ('".join("','",$obj_attributes_array)."')";
            return $obj->connection->query($sql);
        }

      

        public function update(){
            $sql = " UPDATE ".static::$table_name." SET ";
            $obj_array_attr = $this->attribute();

            $array_attr_pairs = array();
            foreach ($obj_array_attr as $field => $value) {
                # code...
                $array_attr_pairs[] = "$field = '$value'";
            }
            $sql.= join(',',$array_attr_pairs);
            $primary_key = static::$primary_key;
            $sql.= " WHERE $primary_key = '{$this->customer_id}'";
            
            return $this->connection->query($sql);
        }
    }



?>