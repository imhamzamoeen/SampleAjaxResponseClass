<?php 

namespace App\Classes;

use ErrorException;
use InvalidArgumentException;

/**
 * We will use this class for seding any reponses as we can directly pass it to the response()->json() helper
 */
class AjaxResponse {

   /* to add more properties for frontend we can use setData method over response */
   protected array $extraMembors=[];  // this will contain our additional members 
   /**
    * Summary of __construct
    * @param int|string $status
    * @param mixed $data
    * @param string $message
    * @param bool $hasError
    */
   public function __construct(public int|string $status=200,public mixed $data=[],public string $message="Success",public bool $hasError=false){
   }

   public function __get($name) {
      /* called whenever an inaccessible property is accessed, for available, it is not called */
      return isset($this->extraMembors[$name]) ? $this->extraMembors[$name]  : throw  new ErrorException();
  }

  public function __set($name, $value) {
      /* called whenever an inaccessible property is setted */
      data_set($this->extraMembors,$name,$value);
  }

}
