<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class FrontMenu_Model extends CI_Model
{
public function create($order,$parent,$status,$name,$json,$image,$linktype,$icon,$event,$blog,$video,$article,$gallery,$typeid)
{
$data=array("order" => $order,"parent" => $parent,"status" => $status,"name" => $name,"json" => $json,"image" => $image,"icon" => $icon,"linktype" => $linktype,"event" => $event,"blog" => $blog,"video" => $video,"article" => $article,"gallery" => $gallery,"typeid" => $typeid);
$query=$this->db->insert( "webapp_frontmenu", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeEdit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("webapp_frontmenu")->row();
return $query;
}
function getSingleFrontMenu($id){
$this->db->where("id",$id);
$query=$this->db->get("webapp_frontmenu")->row();
return $query;
}
public function edit($id,$order,$parent,$status,$name,$json,$image,$linktype,$icon,$event,$blog,$video,$article,$gallery,$typeid)
{
$data=array("order" => $order,"parent" => $parent,"status" => $status,"name" => $name,"json" => $json,"image" => $image,"icon" => $icon,"linktype" => $linktype,"event" => $event,"blog" => $blog,"video" => $video,"article" => $article,"gallery" => $gallery,"typeid" => $typeid);
$this->db->where( "id", $id );
$query=$this->db->update( "webapp_frontmenu", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `webapp_frontmenu` WHERE `id`='$id'");
return $query;
}
    public function changeStatusOfExternalLink(){
    $data=array("status" => 0);
$this->db->where( "id", 17 );
$query=$this->db->update( "linktype", $data );

 $data=array("status" => 0);
$this->db->where( "id", 18 );
$query=$this->db->update( "linktype", $data );
    }
   
}
?>
