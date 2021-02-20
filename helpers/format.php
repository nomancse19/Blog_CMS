<?php
class format{
    public function formatdate($date){
       return  date("F j, Y ,g:i a",  strtotime($date));
    }
    
    public function textshorten($text,$limit=300){
        $text=$text. " ";
        $text=  substr($text, 0,$limit);
        $text=  substr($text, 0,  strrpos($text, "."));
        $text=$text."........";
        return $text;
    }
    public function textshorten2($text,$limit){
        $text=$text. " ";
        $text=  substr($text, 0,$limit);
//        $text=  substr($text, 0,  strrpos($text, "."));
        $text=$text."........";
        return $text;
    }
    
    public function valid($data){
        $data=trim($data);
        $data=  htmlspecialchars($data);
        $data=  stripslashes($data);
        return $data;
    }
    
    public function title(){
        $path=$_SERVER['SCRIPT_FILENAME'];
        $title=  basename($path,".php");
        if($title=='index'){
            $title='Home';
        }
        elseif($title=='about'){
            $title='About Us';
        }
       
        return $title=  ucwords($title);
    }
    
}












?>