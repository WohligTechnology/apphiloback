<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class notification_model extends CI_Model
{
public function create($linktype,$event,$video,$gallery,$article,$status,$blog,$link,$content,$image)
{
$data=array("linktype" => $linktype,"event" => $event,"video" => $video,"gallery" => $gallery,"article" => $article,"status" => $status,"blog" => $blog,"link" => $link,"image" => $image,"content" => $content);
$query=$this->db->insert( "webapp_notification", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeedit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("webapp_notification")->row();
return $query;
}
function getsinglenotification($id){
$this->db->where("id",$id);
$query=$this->db->get("webapp_notification")->row();
return $query;
}
public function edit($id,$linktype,$event,$video,$gallery,$article,$status,$blog,$link,$content,$image,$timestamp)
{
$data=array("linktype" => $linktype,"event" => $event,"video" => $video,"gallery" => $gallery,"article" => $article,"status" => $status,"blog" => $blog,"link" => $link,"image" => $image,"content" => $content,"timestamp" => $timestamp);
$this->db->where( "id", $id );
$query=$this->db->update( "webapp_notification", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `webapp_notification` WHERE `id`='$id'");
    $query=$this->db->query("DELETE FROM `webapp_notificationuser` WHERE `notification`='$id'");
return $query;
}
     public function changestatusofexternallink(){
    $data=array("status" => 1);
$this->db->where( "id", 17 );
$query=$this->db->update( "linktype", $data );

$data=array("status" => 1);
$this->db->where( "id", 18 );
$query=$this->db->update( "linktype", $data );
    }
       public function clearnotificationimage($id){
         $data = array(
            'image' => ''
        );
        $this->db->where('id', $id);
        $query = $this->db->update('webapp_notification', $data);
        return $query;
    }
}
?>
