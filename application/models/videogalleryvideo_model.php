<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class VideoGalleryVideo_Model extends CI_Model
{
public function create($order,$status,$videogallery,$url,$alt)
{
$data=array("order" => $order,"status" => $status,"videogallery" => $videogallery,"url" => $url,"alt" => $alt);
$query=$this->db->insert( "webapp_videogalleryvideo", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeEdit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("webapp_videogalleryvideo")->row();
return $query;
}
function getSingleVideoGalleryVideo($id){
$this->db->where("id",$id);
$query=$this->db->get("webapp_videogalleryvideo")->row();
return $query;
}
public function edit($id,$order,$status,$videogallery,$url,$alt)
{
$data=array("order" => $order,"status" => $status,"videogallery" => $videogallery,"url" => $url,"alt" => $alt);
$this->db->where( "id", $id );
$query=$this->db->update( "webapp_videogalleryvideo", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `webapp_videogalleryvideo` WHERE `id`='$id'");
return $query;
}
}
?>
