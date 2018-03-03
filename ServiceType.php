<?php
 include_once 'includes/MYPDO.php';
 include_once 'includes/Model.php';

 /**
 * 
 */
 class Service extends Model {
   	protected $service_id;
   	public $title;
   	public $descript;
   
   	protected static $class_name = 'Service';
  	protected static $primary_key = 'service_id';
  	protected static $table_name = 'service_type';
  	protected static $table_fields  = array('service_id','title','descript' );


	 public function __construct()
 	  {
 		# code...
 		parent::__construct();
  	}
	 public  static function serviceTable(){
    
		 $table = '<table class= "table table-hover table-striped table-border">
                   <thead>
                    <td>S/NO</td>
                    <td>Title</td>
                    <td>Description</td>
                  </thead>
                  <tbody>';
         if($all =static::All())
        foreach ($all as $service_type){
            $table.="<tr>
            		<td>{$service_type->service_id}</td>
                  	<td>{$service_type->title}</td>
                  	<td>{$service_type->descript}</td>
                  	</tr>";
        }
        $table.="</tbody></table>";
                  echo $table;       
    }
	}
 ?>