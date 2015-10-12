<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class Slider_Model extends CI_Model
{
public function create($alt,$status,$order,$image)
{
$data=array("alt" => $alt,"status" => $status,"order" => $order,"image" => $image);
$query=$this->db->insert( "slider", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeEdit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("slider")->row();
return $query;
}
    public function beforeEditHome($id)
{
$this->db->where("id",$id);
$query=$this->db->get("home")->row();
return $query;
}
function getSingleBlogImages($id){
$this->db->where("id",$id);
$query=$this->db->get("slider")->row();
return $query;
}
public function edit($id,$alt,$status,$order,$image)
{
$data=array("alt" => $alt,"status" => $status,"order" => $order,"image" => $image);
$this->db->where( "id", $id );
$query=$this->db->update( "slider", $data );
return 1;
}
    public function editHome($id,$content)
{
$data=array("content" => $content,"status" => 1);
$this->db->where( "id", $id );
$query=$this->db->update( "home", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `slider` WHERE `id`='$id'");
return $query;
}
     public function getImageById($id)
	{
		$query=$this->db->query("SELECT `image` FROM `slider` WHERE `id`='$id'")->row();
		return $query;
	}
    
           public function clearSliderImage($id){
         $data = array(
            'image' => ''
        );
        $this->db->where('id', $id);
        $query = $this->db->update('slider', $data);
        return $query;
    }
}
?>
