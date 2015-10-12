<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class Config_Model extends CI_Model
{
public function create($title,$content,$text,$type)
{
$query=$this->db->query("INSERT INTO `webapp_blog`( `title`, `text`, `content`, `type`) VALUES (".$this->db->escape($title).",".$this->db->escape($text).",".$this->db->escape($content).",".$this->db->escape($type).")");
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeEdit($id)
{
$query=$this->db->query("SELECT * FROM `config` WHERE `id`=(".$this->db->escape($id).")")->row();
return $query;
}
function getSingleConfig($id){
$query=$this->db->query("SELECT * FROM `config` WHERE `id`=(".$this->db->escape($id).")")->row();
return $query;
}
public function edit($id,$title,$content,$text,$image,$type,$description)
{
      // CMS BLOG
    if($id==5){
     $res = json_decode($text);
    if($res[0]->value==1){
    $data=array("access" => 1);
    $this->db->where( "menu", 15 );
    $query=$this->db->update( "menuaccess", $data );
          // add blog detail from linktype dropdown
    $data=array("status" => 1);
    $this->db->where( "id", 10 );
    $query=$this->db->update( "linktype", $data );
    } 
    else if($res[0]->value==""){
    $data=array("access" => 0);
    $this->db->where( "menu", 15 );
    $query=$this->db->update( "menuaccess", $data );
          // remove blog detail from linktype dropdown
    $data=array("status" => 0);
    $this->db->where( "id", 10 );
    $query=$this->db->update( "linktype", $data );
    }   
    }
    
    // GALLERY
    
    if($id==6 && $text==""){
    $data=array("access" => 0);
    $this->db->where( "menu", 5 );
    $query=$this->db->update( "menuaccess", $data );
    } 
    else if($id==6 && $text=="true"){
    $data=array("access" => 1);
    $this->db->where( "menu", 5 );
    $query=$this->db->update( "menuaccess", $data );
    }
    
    //VIDEOS
    
    else if($id==7 && $text==""){
    $data=array("access" => 0);
    $this->db->where( "menu", 7 );
    $query=$this->db->update( "menuaccess", $data );
    }
    else if($id==7 && $text=="true"){
    $data=array("access" => 1);
    $this->db->where( "menu", 7 );
    $query=$this->db->update( "menuaccess", $data );
    }
    
    // EVENTS
    
    else if($id==8 && $text==""){
    $data=array("access" => 0);
    $this->db->where( "menu", 9 );
    $query=$this->db->update( "menuaccess", $data );
    }
    else if($id==8 && $text=="true"){
    $data=array("access" => 1);
    $this->db->where( "menu", 9 );
    $query=$this->db->update( "menuaccess", $data );
    }
  
    
    if($image){
    $text=$image;
    }
//$data=array("title" => $title,"content" => $content,"text" => $text,"image" => $image,"type" => $type,"description" => $description);
//$this->db->where( "id", $id );
//$query=$this->db->update( "config", $data );
$query=$this->db->query("UPDATE `config` 
 SET `title` = ".$this->db->escape($title).", `text` = ".$this->db->escape($text).",`content` = ".$this->db->escape($content).",`type` = ".$this->db->escape($type).",`image` = ".$this->db->escape($image).",`description` = ".$this->db->escape($description)."
 WHERE id = (".$this->db->escape($id).")");
return 1;
}

public function delete($id)
{
$query=$this->db->query("DELETE FROM `config` WHERE `id`=(".$this->db->escape($id).")");
return $query;
}
    public function getEditPage($id){
    $query=$this->db->query("SELECT `type` FROM `config` WHERE `id`=(".$this->db->escape($id).")")->row();
        $type=$query->type;
        return $type;
    }
}
?>
