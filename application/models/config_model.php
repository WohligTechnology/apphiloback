<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class config_model extends CI_Model
{
public function create($title,$content,$text,$type)
{
$data=array("title" => $title,"content" => $content,"text" => $text,"type" => $type);
$query=$this->db->insert( "config", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeedit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("config")->row();
return $query;
}
function getsingleconfig($id){
$this->db->where("id",$id);
$query=$this->db->get("config")->row();
return $query;
}
public function edit($id,$title,$content,$text,$image,$type,$description)
{
      // CMS BLOG
    print_r($text);
    echo $text;
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
    
    if($id==6 && $text=="Drop down no"){
    $data=array("access" => 0);
    $this->db->where( "menu", 5 );
    $query=$this->db->update( "menuaccess", $data );
    } 
    else if($id==6 && $text=="Drop down yes"){
    $data=array("access" => 1);
    $this->db->where( "menu", 5 );
    $query=$this->db->update( "menuaccess", $data );
    }
    
    //VIDEOS
    
    else if($id==7 && $text=="Drop down no"){
    $data=array("access" => 0);
    $this->db->where( "menu", 7 );
    $query=$this->db->update( "menuaccess", $data );
    }
    else if($id==7 && $text=="Drop down yes"){
    $data=array("access" => 1);
    $this->db->where( "menu", 7 );
    $query=$this->db->update( "menuaccess", $data );
    }
    
    // EVENTS
    
    else if($id==8 && $text=="Drop down no"){
    $data=array("access" => 0);
    $this->db->where( "menu", 9 );
    $query=$this->db->update( "menuaccess", $data );
    }
    else if($id==8 && $text=="Drop down yes"){
    $data=array("access" => 1);
    $this->db->where( "menu", 9 );
    $query=$this->db->update( "menuaccess", $data );
    }
  
    
    if($image){
    $text=$image;
    }
$data=array("title" => $title,"content" => $content,"text" => $text,"image" => $image,"type" => $type,"description" => $description);
$this->db->where( "id", $id );
$query=$this->db->update( "config", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `config` WHERE `id`='$id'");
return $query;
}
    public function geteditpage($id){
    $query=$this->db->query("SELECT `type` FROM `config` WHERE `id`='$id'")->row();
        $type=$query->type;
        return $type;
    }
}
?>
