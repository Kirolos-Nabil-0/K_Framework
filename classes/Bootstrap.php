<?php
class Bootstrap{
    //propertise
    private $controller;
    private $action;
    private $request;

// CONSTRACTED METHOD TO HANDEL REQUESTS AND actions

    public function __construct($request){
    
        $this->request=$request;

// check if there any controller in the URL 
//   if it null will show the home
        if($this->request["controller"]==""){
            $this->controller  = "home";        
            // else will show the choosen controller
        }else{
            $this->controller = $this->request["controller"];
        }
//end of handling request

//handiling the actions

// if it null the action will be the index
        if($this->request["action"]==""){
            $this->action = 'index';
        }
        else{
            $this->action = $this->request["action"];
            
        }
     
    }
// End of The constructor 


//Creatr Controller function That Funcrion check controllers and its action and its rquersts
public function createController(){
    // Check Class exists
    if(class_exists($this->controller)){
        $parents = class_parents($this->controller);
//Extend
        if(in_array("Controller",$parents)){
        // check if controller has this actions
                if (method_exists($this->controller,$this->action)) {
                    return new $this->controller($this->action,$this->request);
                }
                else{
                    //Method does not exists
                echo "<h1>Method not exists</h1>";
                return;
                }
      
        }
        else{
            //Base controller does not exists
        echo "<h1>controller not found</h1>";
        return;
        }

    }
    else {
        //Controller Class Does not exist
        echo "<h1>Controller Class Does not exist</h1>";
    }
}

}