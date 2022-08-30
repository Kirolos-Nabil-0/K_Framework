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
            $this->action = 'index'
        }else {
            $this->action = $this->request["action"];
            
        }

    }
// End of The constructor 






}