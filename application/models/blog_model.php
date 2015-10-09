<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class blog_model extends CI_Model
{
public function create($title,$json,$content,$url,$image)
{
$data=array("title" => $title,"json" => $json,"content" => $content,"image" => $image);
$query=$this->db->insert( "webapp_blog", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeedit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("webapp_blog")->row();
return $query;
}
function getsingleblog($id){
    $query=$this->db->query("SELECT `id`, `title`, `json`, `content`,`timestamp` FROM `webapp_blog` WHERE `id`='$id'")->row();
$query->blogimage=$this->db->query("SELECT `id`, `blog`, `status`, `order`, `image` FROM `webapp_blogimages` WHERE `status`=1 AND `blog`='$id'")->result();
   
$query->blogvideo=$this->db->query("SELECT `id`, `blog`, `status`, `order`, `video` FROM `webapp_blogvideo` WHERE `status`=1 AND `blog`='$id'")->result();
return $query;
}
public function edit($id,$title,$json,$content,$timestamp,$url,$image)
{
$data=array("title" => $title,"json" => $json,"content" => $content,"timestamp" => $timestamp,"image" => $image);
$this->db->where( "id", $id );
$query=$this->db->update( "webapp_blog", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `webapp_blog` WHERE `id`='$id'");
return $query;
}
    public function getimagebyid($id){
    $query=$this->db->query("SELECT `image` FROM `webapp_blog` WHERE `id`='$id'")->row();
		return $query;
    }
      public function clearblogimage($id){
         $data = array(
            'image' => ''
        );
        $this->db->where('id', $id);
        $query = $this->db->update('webapp_blog', $data);
        return $query;
    }
}
?>
