<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class restapi_model extends CI_Model
{
    public function createenquiry($name,$email,$user,$content,$title){
    $data=array("name" => $name,"email" => $email,"user" => $user,"content" => $content,"title" => $title);
$query=$this->db->insert( "webapp_enquiry", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  1;
    }
    public function blogids(){
    $query=$this->db->query("SELECT `id` FROM `webapp_blog`")->result();
        return $query;
    }    
    public function signup($username,$email,$password,$dob){
		$data=array("username" => $username,"email" => $email,"password" => md5($password),"eventnotification" => 'false',"photonotification" => 'false',"videonotification" => 'false',"blognotification" => 'false',"dob" => $dob);
		$query=$this->db->insert( "user", $data );
		$id=$this->db->insert_id();
	    $newdata=$this->db->query("SELECT * FROM `user` WHERE `id`='$id'")->row();
		if(!$query)
		return false;
		else
		return $newdata;
    }
    public function signin($username,$password){
     $password=md5($password);
        $query=$this->db->query("SELECT `id` FROM `user` WHERE `email`='$username' AND `password`= '$password'");
        if($query->num_rows > 0)
        {
            $user=$query->row();
            $user=$user->id;
            
		   $newdata=$this->db->query("SELECT * FROM `user` WHERE `id`='$user'")->row();
//            $newdata = array(
//                'username'     => $username,
//                'password' => $password,
//                'logged_in' => true,
//                'id'=> $user
//            );
		   
            $this->session->set_userdata($newdata);
            //print_r($newdata);
            return $newdata;
        }
        else
        return false;
    }
    
    public function getappconfig(){
    $query=$this->db->query("SELECT `id`, `title`, `content`, `text`, `type`, `image` FROM `config`")->result();
       return $query;
    }
      public function changepassword($id, $oldpassword, $newpassword, $confirmpassword) {
        $oldpassword = md5($oldpassword);
        $newpassword = md5($newpassword);
        $confirmpassword = md5($confirmpassword);
        if ($newpassword == $confirmpassword) {
            $useridquery = $this->db->query("SELECT `id` FROM `user` WHERE `password`='$oldpassword'");
            if ($useridquery->num_rows() == 0) {
                return 0;
            } else {
                $query = $useridquery->row();
                $userid = $query->id;
                $updatequery = $this->db->query("UPDATE `user` SET `password`='$newpassword' WHERE `id`='$userid'");
                return 1;
            }
        } else {
//            echo "New password and confirm password do not match!!!";
			return -1;
        }
    }
    
    public function profilesubmit($id,$name,$email,$password,$dob,$contact)
    {
        $password=md5($password);
        $data=array("name" => $name,"email" => $email,"password" => $password,"dob" => $dob,"contact" => $contact);
        $this->db->where( "id", $id );
        $query=$this->db->update( "user", $data );
        if(!$query)
        return  0;
        else
        return  1;
    }
    public function editprofile($id,$name,$email,$dob,$contact,$location)
    {
        $data=array("name" => $name,"email" => $email,"dob" => $dob,"contact" => $contact,"address" => $location);
        $this->db->where( "id", $id );
        $query=$this->db->update( "user", $data );
        $query1=$this->db->query("SELECT `id`, `name`, `email`, `accesslevel`, `timestamp`, `status`, `image`, `username`, `socialid`, `logintype`, `json`, `dob`, `street`, `address`, `city`, `state`, `pincode`, `facebook`, `twitter`, `google`, `country`, `instagram`, `contact` FROM `user` WHERE `id`='$id'")->row();
        if($query)
        return  $query1;
        else
        return  0;
    }
    public function searcharticletitle($searchelement){
        $query=$this->db->query("SELECT `id`, `status`, `title`, `json`, `content`, `timestamp`, `image` FROM `webapp_articles` WHERE `title` LIKE '%$searchelement%'")->result();
        return $query;
    } 
    public function searcheventtitle($searchelement){
        $query=$this->db->query("SELECT `id`, `status`, `title`, `timestamp`, `content`, `image`, `startdate`, `starttime` FROM `webapp_events` WHERE `title` LIKE '%$searchelement%'")->result();
        return $query;
    }  
    public function searchblogtitle($searchelement){
        $query=$this->db->query("SELECT `id`, `name`, `title`, `json`, `content`, `timestamp` FROM `webapp_blog` WHERE `name` LIKe '%$searchelement%' OR `title` LIKE '%$searchelement%'")->result();
        return $query;
    } 
    public function searchgalleryname($searchelement){
        $query=$this->db->query("SELECT `id`, `order`, `status`, `name`, `json`, `timestamp`, `image` FROM `webapp_gallery` WHERE `name` LIKE '%$searchelement%'")->result();
        return $query;
    } 
    public function searchvideogalleryname($searchelement){
        $query=$this->db->query("SELECT `id`, `order`, `status`, `name`, `json`, `timestamp` FROM `webapp_videogallery` WHERE `name` LIKE '%$searchelement%'")->result();
        return $query;
    }
    public function searchelement($searchelement){
     $query['article']=$this->db->query("SELECT `id`, `status`, `title`, `json`, `content`, `timestamp`, `image` FROM `webapp_articles` WHERE `title` LIKE '%$searchelement%'")->result();
                $query['events']=$this->db->query("SELECT `id`, `status`, `title`, `timestamp`, `content`, `image`, `startdate`, `starttime` FROM `webapp_events` WHERE `title` LIKE '%$searchelement%'")->result();
           $query['blog']=$this->db->query("SELECT `id`, `name`, `title`, `json`, `content`, `timestamp` FROM `webapp_blog` WHERE `name` LIKe '%$searchelement%' OR `title` LIKE '%$searchelement%'")->result();
          $query['gallery']=$this->db->query("SELECT `id`, `order`, `status`, `name`, `json`, `timestamp`, `image` FROM `webapp_gallery` WHERE `name` LIKE '%$searchelement%'")->result();
          $query['videogallery']=$this->db->query("SELECT `id`, `order`, `status`, `name`, `json`, `timestamp` FROM `webapp_videogallery` WHERE `name` LIKE '%$searchelement%'")->result();
        return $query;
    }
    
    public function getallfrontmenu(){
       $query['menu']=$this->db->query("SELECT `webapp_frontmenu`.`id`,`webapp_frontmenu`.`order`,`webapp_frontmenu`.`parent`,`webapp_frontmenu`.`status`,`webapp_frontmenu`.`name`,`webapp_frontmenu`.`json`,`webapp_frontmenu`.`image`,`webapp_frontmenu`.`linktype`,`webapp_frontmenu`.`event`,`webapp_frontmenu`.`blog`,`webapp_frontmenu`.`video`,`webapp_frontmenu`.`article`,`webapp_frontmenu`.`gallery`,`linktype`.`id` as `linktypeid`,`linktype`.`name` as `linktypename`,`linktype`.`status` as `linktypestatus`,`linktype`.`order` as `linktypeorder`,`linktype`.`link` as `linktypelink`,`webapp_events`.`title` as `eventname`,`webapp_blog`.`title` as `blogname`,`webapp_videogallery`.`name` as `videoname`,`webapp_articles`.`title` as `articlename`,`webapp_gallery`.`name` as `galleryname`,`webapp_frontmenu`.`link` as `icon` FROM `webapp_frontmenu` 
    LEFT OUTER JOIN `linktype` ON `linktype`.`id`=`webapp_frontmenu`.`linktype` 
    LEFT OUTER JOIN `webapp_events` ON `webapp_events`.`id`=`webapp_frontmenu`.`event` 
    LEFT OUTER JOIN `webapp_blog` ON `webapp_blog`.`id`=`webapp_frontmenu`.`blog` 
    LEFT OUTER JOIN `webapp_videogallery` ON `webapp_videogallery`.`id`=`webapp_frontmenu`.`video` 
    LEFT OUTER JOIN `webapp_articles` ON `webapp_articles`.`id`=`webapp_frontmenu`.`article` 
    LEFT OUTER JOIN `webapp_gallery` ON `webapp_gallery`.`id`=`webapp_frontmenu`.`gallery` WHERE `webapp_frontmenu`.`status`=1 ORDER BY `webapp_frontmenu`.`order` ASC")->result();
        $query['config']=$this->db->query("SELECT `id`, `title`, `content`, `text`, `type`, `image`, `description` FROM `config`")->result();
        return $query;
    
    }
    public function updateprofileimage($imageName,$userid){
        $data = array(
               'image' => $imageName
            );

        $this->db->where('id', $userid);
        $this->db->update('user', $data); 
        return $query;
    } 
    public function updatecoverimage($imageName,$userid){
         $data = array(
               'coverimage' => $imageName
            );

        $this->db->where('id', $userid);
        $this->db->update('user', $data); 
        return $query;
    } 
    public function getallsliders(){
        $query=$this->db->query("SELECT `id`, `image`, `order`, `status`, `alt` FROM `slider` WHERE `status`=1")->result(); 
        return $query;
    } 
    public function getsingleuserdetail($id){
        $query=$this->db->query("SELECT `id`, `name`, `email`, `accesslevel`, `timestamp`, `status`, `image`, `username`, `socialid`, `logintype`, `json`, `dob`, `street`, `address`, `city`, `state`, `pincode`, `facebook`, `twitter`, `google`, `country`, `instagram`, `contact`, `eventnotification`, `photonotification`, `videonotification`, `blognotification`, `coverimage` FROM `user` WHERE `id`='$id'")->row();
        // eventnotification
        if($query->eventnotification=="true")
        {
            $query->eventnotification=true;
        }
        else
        {
            $query->eventnotification=false;
        }    
        // photonotification
        if($query->photonotification=="true")
        {
            $query->photonotification=true;
        }
        else
        {
            $query->photonotification=false;
        }
        // videonotification
        if($query->videonotification=="true")
        {
            $query->videonotification=true;
        }
        else
        {
            $query->videonotification=false;
        }
        // blognotification
        if($query->blognotification=="true")
        {
            $query->blognotification=true;
        }
        else
        {
            $query->blognotification=false;
        }
        
        return $query;
    }
    public function gethomecontent(){
        $query=$this->db->query("SELECT `content` FROM `home`")->row(); 
        return $query;
    }
    public function changesetting($id,$event,$photo,$video,$blog){
            // eventnotification
        if($event=="true")
        {
            $event=true;
        }
        else
        {
            $event=false;
        }    
        // photonotification
        if($photo=="true")
        {
            $photo=true;
        }
        else
        {
            $photo=false;
        }
        // videonotification
        if($video=="true")
        {
            $video=true;
        }
        else
        {
            $video=false;
        }
        // blognotification
        if($blog=="true")
        {
            $blog=true;
        }
        else
        {
            $blog=false;
        }
        $query=$this->db->query("UPDATE `user` SET `eventnotification`='$event',`photonotification`='$photo',`videonotification`='$video',`blognotification`='$blog' WHERE `id`='$id'"); 
        return $query;
        }
    
    
}
?>