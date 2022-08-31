<?php
abstract class Controller{
    protected $request;
    protected $action;

    //constract to sign our properties values
    public function __construct($action,$request){
        $this->action = $action;
        $this->request = $request;
    }
    //end of constract

    //executeaction() function That to Execute The given action
    public function execueAction(){
        return $this->{$this->action}();
    }
    //End of execute function

    //Return View Function
    protected function returnView($viewmodel,$fullView){
        $view = "views/".get_class($this)."/".$this->action.".php";
        if($fullview){
            require("views/main.php");
        }else {
            require($view);
        }
    }
}