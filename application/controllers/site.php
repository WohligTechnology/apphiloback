<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Site extends CI_Controller
{
	public function __construct( )
	{
		parent::__construct();

		$this->is_logged_in();
	}
	function is_logged_in()
	{
		$is_logged_in = $this->session->userdata( 'logged_in' );
		if ( $is_logged_in !== 'true' || !isset( $is_logged_in ) ) {
			redirect( base_url() . 'index.php/login', 'refresh' );
		} //$is_logged_in !== 'true' || !isset( $is_logged_in )
	}
	function checkAccess($access)
	{
		$accesslevel=$this->session->userdata('accesslevel');
		if(!in_array($accesslevel,$access))
			redirect( base_url() . 'index.php/site?alerterror=You do not have access to this page. ', 'refresh' );
	}
	public function index()
	{
		$access = array("1");
		$this->checkAccess($access);
		$data[ 'page' ] = 'dashboard';
        $data["base_url"]=site_url("site/viewEnquiryJson");
        $data[ 'usercount' ] = $this->User_Model->getUserCount();
		$data[ 'enquirycount' ] = $this->Enquiry_Model->total();
		$data[ 'title' ] = 'Dashboard';
		$this->load->view( 'template', $data );
	}
	public function createUser()
	{
		$access = array("1");
		$this->checkAccess($access);
		$data['accesslevel']=$this->User_Model->getAccessLevels();
		$data[ 'status' ] =$this->User_Model->getStatusDropDown();
		$data[ 'logintype' ] =$this->User_Model->getLogintypeDropDown();
           $data[ 'eventnotification' ] =$this->User_Model->getEventNotificationDropDown();
            $data[ 'photonotification' ] =$this->User_Model->getPhotoNotificationDropDown();
            $data[ 'videonotification' ] =$this->User_Model->getVideoNotificationDropDown();
            $data[ 'blognotification' ] =$this->User_Model->getBlogNotificationDropDown();
//        $data['category']=$this->category_model->getcategorydropdown();
		$data[ 'page' ] = 'createUser';
		$data[ 'activemenu' ] = 'users';
		$data[ 'title' ] = 'Create User';
		$this->load->view( 'template', $data );
	}
	function createUserSubmit()
	{
		$access = array("1");
		$this->checkAccess($access);
		$this->form_validation->set_rules('name','Name','trim|required|max_length[30]');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email|is_unique[user.email]');
		$this->form_validation->set_rules('password','Password','trim|required|min_length[6]|max_length[30]');
		$this->form_validation->set_rules('confirmpassword','Confirm Password','trim|required|matches[password]');
		$this->form_validation->set_rules('accessslevel','Accessslevel','trim');
		$this->form_validation->set_rules('status','status','trim|');
		$this->form_validation->set_rules('socialid','Socialid','trim');
		$this->form_validation->set_rules('logintype','logintype','trim');
		$this->form_validation->set_rules('json','json','trim');
		if($this->form_validation->run() == FALSE)
		{
			$data['alerterror'] = validation_errors();
			$data['accesslevel']=$this->User_Model->getAccessLevels();
            $data[ 'status' ] =$this->User_Model->getStatusDropDown();
            $data[ 'logintype' ] =$this->User_Model->getLogintypeDropDown();
            $data[ 'eventnotification' ] =$this->User_Model->getEventNotificationDropDown();
            $data[ 'photonotification' ] =$this->User_Model->getPhotoNotificationDropDown();
            $data[ 'videonotification' ] =$this->User_Model->getVideoNotificationDropDown();
            $data[ 'blognotification' ] =$this->User_Model->getBlogNotificationDropDown();
            $data[ 'page' ] = 'createUser';
            $data[ 'title' ] = 'Create User';
            $this->load->view( 'template', $data );
		}
		else
		{
            $name=$this->input->post('name');
            $email=$this->input->post('email');
            $password=$this->input->post('password');
            $accesslevel=$this->input->post('accesslevel');
            $status=$this->input->post('status');
            $socialid=$this->input->post('socialid');
            $logintype=$this->input->post('logintype');
            $json=$this->input->post('json');
            $contact=$this->input->post('contact');
            $address=$this->input->post('address');
            $eventnotification=$this->input->post('eventnotification');
            $photonotification=$this->input->post('photonotification');
            $videonotification=$this->input->post('videonotification');
            $blognotification=$this->input->post('blognotification');
            $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];

                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
                $config_r['maintain_ratio'] = TRUE;
                $config_t['create_thumb'] = FALSE;///add this
                $config_r['width']   = 800;
                $config_r['height'] = 800;
                $config_r['quality']    = 100;
                //end of configs

                $this->load->library('image_lib', $config_r);
                $this->image_lib->initialize($config_r);
                if(!$this->image_lib->resize())
                {
                    $data['alerterror']="Failed." . $this->image_lib->display_errors();
                    //return false;
                }
                else
                {
                    //print_r($this->image_lib->dest_image);
                    //dest_image
                    $image=$this->image_lib->dest_image;
                    //return false;
                }

			}

            // COVERIMAGE
            $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="coverimage";
			$coverimage="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$coverimage=$uploaddata['file_name'];

                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
                $config_r['maintain_ratio'] = TRUE;
                $config_t['create_thumb'] = FALSE;///add this
                $config_r['width']   = 800;
                $config_r['height'] = 800;
                $config_r['quality']    = 100;
                //end of configs

                $this->load->library('image_lib', $config_r);
                $this->image_lib->initialize($config_r);
                if(!$this->image_lib->resize())
                {
                    $data['alerterror']="Failed." . $this->image_lib->display_errors();
                    //return false;
                }
                else
                {
                    //print_r($this->image_lib->dest_image);
                    //dest_image
                    $coverimage=$this->image_lib->dest_image;
                    //return false;
                }

			}

			if($this->User_Model->create($name,$email,$password,$accesslevel,$status,$socialid,$logintype,$image,$json,$contact,$address,$eventnotification,$photonotification,$videonotification,$blognotification,$coverimage)==0)
			$data['alerterror']="New User Could Not Be Created.";
			else
			$data['alertsuccess']="User Created Successfully.";
			$data['redirect']="site/viewUsers";
			$this->load->view("redirect",$data);
		}
	}
    function viewUsers()
	{
		$access = array("1");
		$this->checkAccess($access);
		$data['page']='viewUsers';
        $data['base_url'] = site_url("site/viewUsersJson");

		$data['title']='View Users';
		$this->load->view('template',$data);
	}
    function viewUsersJson()
	{
		$access = array("1");
		$this->checkAccess($access);


        $elements=array();
        $elements[0]=new stdClass();
        $elements[0]->field="`user`.`id`";
        $elements[0]->sort="1";
        $elements[0]->header="ID";
        $elements[0]->alias="id";


        $elements[1]=new stdClass();
        $elements[1]->field="`user`.`name`";
        $elements[1]->sort="1";
        $elements[1]->header="Name";
        $elements[1]->alias="name";

        $elements[2]=new stdClass();
        $elements[2]->field="`user`.`email`";
        $elements[2]->sort="1";
        $elements[2]->header="Email";
        $elements[2]->alias="email";

        $elements[3]=new stdClass();
        $elements[3]->field="`user`.`socialid`";
        $elements[3]->sort="1";
        $elements[3]->header="SocialId";
        $elements[3]->alias="socialid";

        $elements[4]=new stdClass();
        $elements[4]->field="`user`.`logintype`";
        $elements[4]->sort="1";
        $elements[4]->header="Login Type";
        $elements[4]->alias="logintype";

        $elements[5]=new stdClass();
        $elements[5]->field="`user`.`json`";
        $elements[5]->sort="1";
        $elements[5]->header="Json";
        $elements[5]->alias="json";

        $elements[6]=new stdClass();
        $elements[6]->field="`accesslevel`.`name`";
        $elements[6]->sort="1";
        $elements[6]->header="Access Level";
        $elements[6]->alias="accesslevelname";

        $elements[7]=new stdClass();
        $elements[7]->field="`statuses`.`name`";
        $elements[7]->sort="1";
        $elements[7]->header="Status";
        $elements[7]->alias="status";


        $search=$this->input->get_post("search");
        $pageno=$this->input->get_post("pageno");
        $orderby=$this->input->get_post("orderby");
        $orderorder=$this->input->get_post("orderorder");
        $maxrow=$this->input->get_post("maxrow");
        if($maxrow=="")
        {
            $maxrow=20;
        }

        if($orderby=="")
        {
            $orderby="id";
            $orderorder="ASC";
        }

        $data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `user` LEFT OUTER JOIN `logintype` ON `logintype`.`id`=`user`.`logintype` LEFT OUTER JOIN `accesslevel` ON `accesslevel`.`id`=`user`.`accesslevel` LEFT OUTER JOIN `statuses` ON `statuses`.`id`=`user`.`status`");

		$this->load->view("json",$data);
	}


	function editUser()
	{
		$access = array("1");
		$this->checkAccess($access);
		$data[ 'status' ] =$this->User_Model->getStatusDropDown();
		$data['accesslevel']=$this->User_Model->getAccessLevels();
		$data[ 'logintype' ] =$this->User_Model->getLogintypeDropDown();
        $data[ 'eventnotification' ] =$this->User_Model->getEventNotificationDropDown();
        $data[ 'photonotification' ] =$this->User_Model->getPhotoNotificationDropDown();
        $data[ 'videonotification' ] =$this->User_Model->getVideoNotificationDropDown();
        $data[ 'blognotification' ] =$this->User_Model->getBlogNotificationDropDown();
		$data['before']=$this->User_Model->beforeEdit($this->input->get('id'));
		$data['page']='editUser';
		$data['activemenu']='users';

		$data['title']='Edit User';
		$this->load->view('template',$data);
	}
	function editUserSubmit()
	{
		$access = array("1");
		$this->checkAccess($access);

		$this->form_validation->set_rules('name','Name','trim|required|max_length[30]');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email');
		$this->form_validation->set_rules('password','Password','trim|min_length[6]|max_length[30]');
		$this->form_validation->set_rules('confirmpassword','Confirm Password','trim|matches[password]');
		$this->form_validation->set_rules('accessslevel','Accessslevel','trim');
		$this->form_validation->set_rules('status','status','trim|');
		$this->form_validation->set_rules('socialid','Socialid','trim');
		$this->form_validation->set_rules('logintype','logintype','trim');
		$this->form_validation->set_rules('json','json','trim');
		if($this->form_validation->run() == FALSE)
		{
			$data['alerterror'] = validation_errors();
			$data[ 'status' ] =$this->User_Model->getStatusDropDown();
			$data['accesslevel']=$this->User_Model->getAccessLevels();
            $data[ 'logintype' ] =$this->User_Model->getLogintypeDropDown();
                  $data[ 'eventnotification' ] =$this->User_Model->getEventNotificationDropDown();
            $data[ 'photonotification' ] =$this->User_Model->getPhotoNotificationDropDown();
            $data[ 'videonotification' ] =$this->User_Model->getVideoNotificationDropDown();
            $data[ 'blognotification' ] =$this->User_Model->getBlogNotificationDropDown();
			$data['before']=$this->User_Model->beforeEdit($this->input->post('id'));
			$data['page']='editUser';
//			$data['page2']='block/userblock';
			$data['title']='Edit User';
			$this->load->view('template',$data);
		}
		else
		{

            $id=$this->input->get_post('id');
            $name=$this->input->get_post('name');
            $email=$this->input->get_post('email');
            $password=$this->input->get_post('password');
            $accesslevel=$this->input->get_post('accesslevel');
            $status=$this->input->get_post('status');
            $socialid=$this->input->get_post('socialid');
            $logintype=$this->input->get_post('logintype');
            $json=$this->input->get_post('json');
            $contact=$this->input->get_post('contact');
            $address=$this->input->post('address');
            $eventnotification=$this->input->post('eventnotification');
            $photonotification=$this->input->post('photonotification');
            $videonotification=$this->input->post('videonotification');
            $blognotification=$this->input->post('blognotification');

            $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];

                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
                $config_r['maintain_ratio'] = TRUE;
                $config_t['create_thumb'] = FALSE;///add this
                $config_r['width']   = 800;
                $config_r['height'] = 800;
                $config_r['quality']    = 100;
                //end of configs

                $this->load->library('image_lib', $config_r);
                $this->image_lib->initialize($config_r);
                if(!$this->image_lib->resize())
                {
                    $data['alerterror']="Failed." . $this->image_lib->display_errors();
                    //return false;
                }
                else
                {
                    //print_r($this->image_lib->dest_image);
                    //dest_image
                    $image=$this->image_lib->dest_image;
                    //return false;
                }

			}

            if($image=="")
            {
            $image=$this->User_Model->getUserImageById($id);
               // print_r($image);
                $image=$image->image;
            }


            //COVERIMAGE

                $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="coverimage";
			$coverimage="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$coverimage=$uploaddata['file_name'];

                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
                $config_r['maintain_ratio'] = TRUE;
                $config_t['create_thumb'] = FALSE;///add this
                $config_r['width']   = 800;
                $config_r['height'] = 800;
                $config_r['quality']    = 100;
                //end of configs

                $this->load->library('image_lib', $config_r);
                $this->image_lib->initialize($config_r);
                if(!$this->image_lib->resize())
                {
                   $data['alerterror']="Failed." . $this->image_lib->display_errors();
                    //return false;
                }
                else
                {
                    //print_r($this->image_lib->dest_image);
                    //dest_image
                    $coverimage=$this->image_lib->dest_image;
                    //return false;
                }

			}

            if($coverimage=="")
            {
            $coverimage=$this->User_Model->getCoverImageById($id);
               // print_r($coverimage);
                $coverimage=$coverimage->coverimage;
            }

			if($this->User_Model->edit($id,$name,$email,$password,$accesslevel,$status,$socialid,$logintype,$image,$json,$contact,$address,$eventnotification,$photonotification,$videonotification,$blognotification,$coverimage)==0)
			$data['alerterror']="User Editing Was Unsuccesful";
			else
			$data['alertsuccess']="User Edited Successfully.";

			$data['redirect']="site/viewUsers";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);

		}
	}

	function deleteUser()
	{
		$access = array("1");
		$this->checkAccess($access);
		$this->User_Model->deleteUser($this->input->get('id'));
//		$data['table']=$this->User_Model->viewUsers();
		$data['alertsuccess']="User Deleted Successfully";
		$data['redirect']="site/viewUsers";
			//$data['other']="template=$template";
		$this->load->view("redirect",$data);
	}
	function changeUserStatus()
	{
		$access = array("1");
		$this->checkAccess($access);
		$this->User_Model->changeStatus($this->input->get('id'));
//		$data['table']=$this->User_Model->viewUsers();
		$data['alertsuccess']="Status Changed Successfully";
		$data['redirect']="site/viewUsers";
        $data['other']="template=$template";
        $this->load->view("redirect",$data);
	}



    public function viewArticles()
{
$access=array("1");
$this->checkAccess($access);
$data["page"]="viewArticles";
$data[ 'status' ] =$this->User_Model->getStatusDropDown();
$data["base_url"]=site_url("site/viewArticlesjson");
$data["title"]="View Pages";
$this->load->view("template",$data);
}
function viewArticlesjson()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`webapp_articles`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";
$elements[1]=new stdClass();
$elements[1]->field="`statuses`.`name`";
$elements[1]->sort="1";
$elements[1]->header="Status";
$elements[1]->alias="status";
$elements[2]=new stdClass();
$elements[2]->field="`webapp_articles`.`title`";
$elements[2]->sort="1";
$elements[2]->header="Title";
$elements[2]->alias="title";
$elements[3]=new stdClass();
$elements[3]->field="`webapp_articles`.`json`";
$elements[3]->sort="1";
$elements[3]->header="Json";
$elements[3]->alias="json";
$elements[4]=new stdClass();
$elements[4]->field="`webapp_articles`.`content`";
$elements[4]->sort="1";
$elements[4]->header="Content";
$elements[4]->alias="content";
$elements[5]=new stdClass();
$elements[5]->field="DATE_FORMAT(`webapp_articles`.`timestamp`,'%a, %b %d %Y %h:%i %p')";
$elements[5]->sort="1";
$elements[5]->header="Timestamp";
$elements[5]->alias="timestamp";
$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
$maxrow=20;
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `webapp_articles` LEFT OUTER JOIN `statuses` ON `statuses`.`id`=`webapp_articles`.`status`","WHERE `webapp_articles`.`id`<>1");
$this->load->view("json",$data);
}

public function createArticles()
{
$access=array("1");
$this->checkAccess($access);
$data["page"]="createArticles";
$data["activemenu"]="pages";
$data[ 'status' ] =$this->User_Model->getStatusDropDown();
$data["title"]="Create Page";
$this->load->view("template",$data);
}
public function createArticlesSubmit()
{
$access=array("1");
$this->checkAccess($access);
$this->form_validation->set_rules("status","Status","trim");
$this->form_validation->set_rules("title","Title","trim");
$this->form_validation->set_rules("json","Json","trim");
$this->form_validation->set_rules("content","Content","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="createArticles";
$data[ 'status' ] =$this->User_Model->getStatusDropDown();
$data["title"]="Create Page";
$this->load->view("template",$data);
}
else
{
$status=$this->input->get_post("status");
$title=$this->input->get_post("title");
$json=$this->input->get_post("json");
$content=$this->input->get_post("content");
       $config['upload_path'] = './uploads/';
						$config['allowed_types'] = 'gif|jpg|png|jpeg';
						$this->load->library('upload', $config);
						$filename="image";
						$image="";
						if (  $this->upload->do_upload($filename))
						{
							$uploaddata = $this->upload->data();
							$image=$uploaddata['file_name'];
						}
if($this->Articles_Model->create($status,$title,$json,$content,$image)==0)
$data["alerterror"]="New Page Could Not Be Created.";
else
$data["alertsuccess"]="Page Created Successfully.";
$data["redirect"]="site/viewArticles";
$this->load->view("redirect",$data);
}
}

public function home()
{
    $access=array("1");
    $this->checkAccess($access);
    $data["page"]="editArticles";
    $data["activemenu"]="home";
    $data[ 'status' ] =$this->User_Model->getStatusDropDown();
    $data["title"]="Edit Home";
    $data["before"]=$this->Articles_Model->beforeEdit(1);
    $this->load->view("template",$data);
}

public function editArticles()
{
$access=array("1");
$this->checkAccess($access);
$data["page"]="editArticles";
$data["activemenu"]="pages";
$data[ 'status' ] =$this->User_Model->getStatusDropDown();
$data["title"]="Edit Page";
$data["before"]=$this->Articles_Model->beforeEdit($this->input->get("id"));
$this->load->view("template",$data);
}
public function editArticlessubmit()
{
$access=array("1");
$this->checkAccess($access);
$this->form_validation->set_rules("id","ID","trim");
$this->form_validation->set_rules("status","Status","trim");
$this->form_validation->set_rules("title","Title","trim");
$this->form_validation->set_rules("json","Json","trim");
$this->form_validation->set_rules("content","Content","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="editArticles";
$data[ 'status' ] =$this->User_Model->getStatusDropDown();
$data["title"]="Edit Page";
$data["before"]=$this->Articles_Model->beforeEdit($this->input->get("id"));
$this->load->view("template",$data);
}
else
{
$id=$this->input->get_post("id");
$status=$this->input->get_post("status");
$title=$this->input->get_post("title");
$json=$this->input->get_post("json");
$content=$this->input->get_post("content");
$timestamp=$this->input->get_post("timestamp");
              $config['upload_path'] = './uploads/';
						$config['allowed_types'] = 'gif|jpg|png|jpeg';
						$this->load->library('upload', $config);
						$filename="image";
						$image="";
						if (  $this->upload->do_upload($filename))
						{
							$uploaddata = $this->upload->data();
							$image=$uploaddata['file_name'];
						}

						if($image=="")
						{
						$image=$this->Articles_Model->getImageById($id);
						   // print_r($image);
							$image=$image->image;
						}
if($this->Articles_Model->edit($id,$status,$title,$json,$content,$timestamp,$image)==0)
$data["alerterror"]="New Page Could Not Be Updated.";
else
$data["alertsuccess"]="Page Updated Successfully.";
    if($id!=1){
$data["redirect"]="site/viewArticles";

$this->load->view("redirect",$data);
    }
    else{
    $data["redirect"]="site/home?id=1";

$this->load->view("redirect2",$data);
    }
}
}
public function deleteArticles()
{
$access=array("1");
$this->checkAccess($access);
$this->Articles_Model->delete($this->input->get("id"));
$data["redirect"]="site/viewArticles";
$this->load->view("redirect",$data);
}
public function viewFrontmenu()
{
$access=array("1");
$this->checkAccess($access);
$data["page"]="viewFrontmenu";
$data[ 'status' ] =$this->User_Model->getStatusDropDown();
$data["base_url"]=site_url("site/viewFrontmenuJson");
$data["title"]="View Navigation";
$this->load->view("template",$data);
}
function viewFrontmenuJson()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`webapp_frontmenu`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";
$elements[1]=new stdClass();
$elements[1]->field="`webapp_frontmenu`.`order`";
$elements[1]->sort="1";
$elements[1]->header="Order";
$elements[1]->alias="order";
$elements[2]=new stdClass();
$elements[2]->field="`tab1`.`name`";
$elements[2]->sort="1";
$elements[2]->header="Parent";
$elements[2]->alias="parent";
$elements[3]=new stdClass();
$elements[3]->field="`statuses`.`name`";
$elements[3]->sort="1";
$elements[3]->header="Status";
$elements[3]->alias="status";
$elements[4]=new stdClass();
$elements[4]->field="`webapp_frontmenu`.`name`";
$elements[4]->sort="1";
$elements[4]->header="Name";
$elements[4]->alias="name";
$elements[5]=new stdClass();
$elements[5]->field="`webapp_frontmenu`.`json`";
$elements[5]->sort="1";
$elements[5]->header="Json";
$elements[5]->alias="json";
$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
$maxrow=20;
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `webapp_frontmenu` LEFT OUTER JOIN `statuses` ON `statuses`.`id`=`webapp_frontmenu`.`status` LEFT OUTER JOIN `webapp_frontmenu` as `tab1` ON `webapp_frontmenu`.`parent`=`tab1`.`id`");
$this->load->view("json",$data);
}

public function createFrontMenu()
{
$access=array("1");
$this->checkAccess($access);
$data["page"]="createFrontMenu";
$data["activemenu"]="navigations";
    $this->FrontMenu_Model->changeStatusOfExternalLink();
$data[ 'status' ] =$this->User_Model->getStatusDropDown();
$data[ 'parent' ] =$this->User_Model->getFrontMenuDropDown();
$data[ 'linktype' ] =$this->User_Model->getLinkTypeDropDown();
$data[ 'event' ] =$this->User_Model->getEventsDropDown();
$data[ 'blog' ] =$this->User_Model->getBlogDropDown();
$data[ 'video' ] =$this->User_Model->getVideoGalleryDropDown();
$data[ 'article' ] =$this->User_Model->getArticleDropDown();
$data[ 'gallery' ] =$this->User_Model->getGalleryDropDown();
$data[ 'icon' ] =$this->User_Model->getLinkDropDown();
$data["title"]="Create Navigation";
$this->load->view("template",$data);
}
public function createFrontMenusubmit()
{
$access=array("1");
$this->checkAccess($access);
$this->form_validation->set_rules("order","Order","trim");
$this->form_validation->set_rules("parent","Parent","trim");
$this->form_validation->set_rules("status","Status","trim");
$this->form_validation->set_rules("name","Name","trim");
$this->form_validation->set_rules("json","Json","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="createFrontMenu";
$data[ 'status' ] =$this->User_Model->getStatusDropDown();
$data[ 'parent' ] =$this->User_Model->getFrontMenuDropDown();
    $data[ 'event' ] =$this->User_Model->getEventsDropDown();
$data[ 'blog' ] =$this->User_Model->getBlogDropDown();
$data[ 'video' ] =$this->User_Model->getVideoDropDown();
$data[ 'article' ] =$this->User_Model->getArticleDropDown();
$data[ 'gallery' ] =$this->User_Model->getGalleryDropDown();
$data[ 'icon' ] =$this->User_Model->getLinkDropDown();
$data["title"]="Create Navigation";
$this->load->view("template",$data);
}
else
{
$order=$this->input->get_post("order");
$parent=$this->input->get_post("parent");
$status=$this->input->get_post("status");
$name=$this->input->get_post("name");
$json=$this->input->get_post("json");
$linktype=$this->input->get_post("linktype");
$icon=$this->input->get_post("icon");
$event=$this->input->get_post("event");
$blog=$this->input->get_post("blog");
$video=$this->input->get_post("video");
$article=$this->input->get_post("article");
$gallery=$this->input->get_post("gallery");
$typeid=$this->input->get_post("typeid");
     $config['upload_path'] = './uploads/';
						$config['allowed_types'] = 'gif|jpg|png|jpeg';
						$this->load->library('upload', $config);
						$filename="image";
						$image="";
						if (  $this->upload->do_upload($filename))
						{
							$uploaddata = $this->upload->data();
							$image=$uploaddata['file_name'];
						}
if($this->FrontMenu_Model->create($order,$parent,$status,$name,$json,$image,$linktype,$icon,$event,$blog,$video,$article,$gallery,$typeid)==0)
$data["alerterror"]="New Navigation could not be created.";
else
$data["alertsuccess"]="Navigation created Successfully.";
$data["redirect"]="site/viewFrontmenu";
$this->load->view("redirect",$data);
}
}
public function editFrontMenu()
{
$access=array("1");
$this->checkAccess($access);
$data["page"]="editFrontMenu";
$data["activemenu"]="navigations";
     $this->FrontMenu_Model->changeStatusOfExternalLink();
$data[ 'parent' ] =$this->User_Model->getFrontMenuDropDown();
$data[ 'status' ] =$this->User_Model->getStatusDropDown();
$data[ 'linktype' ] =$this->User_Model->getLinkTypeDropDown();
    $data[ 'event' ] =$this->User_Model->getEventsDropDown();
$data[ 'blog' ] =$this->User_Model->getBlogDropDown();
$data[ 'video' ] =$this->User_Model->getVideoDropDown();
$data[ 'article' ] =$this->User_Model->getArticleDropDown();
$data[ 'gallery' ] =$this->User_Model->getGalleryDropDown();
$data[ 'icon' ] =$this->User_Model->getLinkDropDown();
$data["title"]="Edit Navigation";
$data["before"]=$this->FrontMenu_Model->beforeEdit($this->input->get("id"));
$this->load->view("template",$data);
}
public function editFrontMenuSubmit()
{
$access=array("1");
$this->checkAccess($access);
$this->form_validation->set_rules("id","ID","trim");
$this->form_validation->set_rules("order","Order","trim");
$this->form_validation->set_rules("parent","Parent","trim");
$this->form_validation->set_rules("status","Status","trim");
$this->form_validation->set_rules("name","Name","trim");
$this->form_validation->set_rules("json","Json","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data[ 'status' ] =$this->User_Model->getStatusDropDown();
$data["page"]="editFrontMenu";
$data[ 'parent' ] =$this->User_Model->getFrontMenuDropDown();
$data[ 'event' ] =$this->User_Model->getEventsDropDown();
$data[ 'blog' ] =$this->User_Model->getBlogDropDown();
$data[ 'video' ] =$this->User_Model->getVideoDropDown();
$data[ 'article' ] =$this->User_Model->getArticleDropDown();
$data[ 'gallery' ] =$this->User_Model->getGalleryDropDown();
$data[ 'icon' ] =$this->User_Model->getLinkDropDown();
$data["title"]="Edit Navigation";
$data["before"]=$this->FrontMenu_Model->beforeEdit($this->input->get("id"));
$this->load->view("template",$data);
}
else
{
$id=$this->input->get_post("id");
$order=$this->input->get_post("order");
$parent=$this->input->get_post("parent");
$status=$this->input->get_post("status");
$name=$this->input->get_post("name");
$json=$this->input->get_post("json");
$linktype=$this->input->get_post("linktype");
$icon=$this->input->get_post("icon");
$event=$this->input->get_post("event");
$blog=$this->input->get_post("blog");
$video=$this->input->get_post("video");
$article=$this->input->get_post("article");
$gallery=$this->input->get_post("gallery");
    $typeid=$this->input->get_post("typeid");

     $config['upload_path'] = './uploads/';
						$config['allowed_types'] = 'gif|jpg|png|jpeg';
						$this->load->library('upload', $config);
						$filename="image";
						$image="";
						if (  $this->upload->do_upload($filename))
						{
							$uploaddata = $this->upload->data();
							$image=$uploaddata['file_name'];
						}

						if($image=="")
						{
						$image=$this->Gallery_Model->getImageById($id);
						   // print_r($image);
							$image=$image->image;
						}
if($this->FrontMenu_Model->edit($id,$order,$parent,$status,$name,$json,$image,$linktype,$icon,$event,$blog,$video,$article,$gallery,$typeid)==0)
$data["alerterror"]="New Navigation Could Not Be Updated.";
else
$data["alertsuccess"]="Navigation Updated Successfully.";
$data["redirect"]="site/viewFrontmenu";
$this->load->view("redirect",$data);
}
}
public function deleteFrontMenu()
{
$access=array("1");
$this->checkAccess($access);
$this->FrontMenu_Model->delete($this->input->get("id"));
$data["redirect"]="site/viewFrontmenu";
$this->load->view("redirect",$data);
}
public function viewGallery()
{
$access=array("1");
$this->checkAccess($access);
$data["page"]="viewGallery";
$data[ 'status' ] =$this->User_Model->getStatusDropDown();
$data["base_url"]=site_url("site/viewGalleryJson");
$data["title"]="View Image Gallery";
$this->load->view("template",$data);
}
function viewGalleryJson()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`webapp_gallery`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";
$elements[1]=new stdClass();
$elements[1]->field="`webapp_gallery`.`order`";
$elements[1]->sort="1";
$elements[1]->header="Order";
$elements[1]->alias="order";
$elements[2]=new stdClass();
$elements[2]->field="`statuses`.`name`";
$elements[2]->sort="1";
$elements[2]->header="Status";
$elements[2]->alias="status";
$elements[3]=new stdClass();
$elements[3]->field="`webapp_gallery`.`name`";
$elements[3]->sort="1";
$elements[3]->header="Name";
$elements[3]->alias="name";
$elements[4]=new stdClass();
$elements[4]->field="`webapp_gallery`.`json`";
$elements[4]->sort="1";
$elements[4]->header="Json";
$elements[4]->alias="json";
$elements[5]=new stdClass();
$elements[5]->field="DATE_FORMAT(`webapp_gallery`.`timestamp`,'%a, %b %d %Y %h:%i %p')";
$elements[5]->sort="1";
$elements[5]->header="Timestamp";
$elements[5]->alias="timestamp";
$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
$maxrow=20;
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `webapp_gallery` LEFT OUTER JOIN `statuses` ON `statuses`.`id`=`webapp_gallery`.`status`");
$this->load->view("json",$data);
}

public function createGallery()
{
$access=array("1");
$this->checkAccess($access);
$data["page"]="createGallery";
$data["activemenu"]="image gallery";
$data[ 'status' ] =$this->User_Model->getStatusDropDown();
$data["title"]="Create Image Gallery";
$this->load->view("template",$data);
}
public function createGallerySubmit()
{
$access=array("1");
$this->checkAccess($access);
$this->form_validation->set_rules("order","Order","trim");
$this->form_validation->set_rules("status","Status","trim");
$this->form_validation->set_rules("name","Name","trim");
$this->form_validation->set_rules("json","Json","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data[ 'status' ] =$this->User_Model->getStatusDropDown();
$data["page"]="createGallery";
$data["title"]="Create Image Gallery";
$this->load->view("template",$data);
}
else
{
$order=$this->input->get_post("order");
$status=$this->input->get_post("status");
$name=$this->input->get_post("name");
$json=$this->input->get_post("json");
      $config['upload_path'] = './uploads/';
						$config['allowed_types'] = 'gif|jpg|png|jpeg';
						$this->load->library('upload', $config);
						$filename="image";
						$image="";
						if (  $this->upload->do_upload($filename))
						{
							$uploaddata = $this->upload->data();
							$image=$uploaddata['file_name'];
						}
if($this->Gallery_Model->create($order,$status,$name,$json,$image)==0)
$data["alerterror"]="New Image Gallery could not be created.";
else
$data["alertsuccess"]="Image Gallery created Successfully.";
$data["redirect"]="site/viewGallery";
$this->load->view("redirect",$data);
}
}
public function editGallery()
{
$access=array("1");
$this->checkAccess($access);
$data["page"]="editGallery";
$data["activemenu"]="image gallery";
$data["page2"]="block/galleryblock";
$data[ 'status' ] =$this->User_Model->getStatusDropDown();
$data[ 'before1' ] =$this->input->get('id');
$data[ 'before2' ] =$this->input->get('id');
$data["title"]="Edit Image Gallery";
$data["before"]=$this->Gallery_Model->beforeEdit($this->input->get("id"));
$this->load->view("templatewith2",$data);
}
public function editGallerySubmit()
{
$access=array("1");
$this->checkAccess($access);
$this->form_validation->set_rules("id","ID","trim");
$this->form_validation->set_rules("order","Order","trim");
$this->form_validation->set_rules("status","Status","trim");
$this->form_validation->set_rules("name","Name","trim");
$this->form_validation->set_rules("json","Json","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="editGallery";
$data[ 'status' ] =$this->User_Model->getStatusDropDown();
$data["title"]="Edit Image Gallery";
$data["before"]=$this->Gallery_Model->beforeEdit($this->input->get("id"));
$this->load->view("template",$data);
}
else
{
$id=$this->input->get_post("id");
$order=$this->input->get_post("order");
$status=$this->input->get_post("status");
$name=$this->input->get_post("name");
$json=$this->input->get_post("json");
$timestamp=$this->input->get_post("timestamp");
      $config['upload_path'] = './uploads/';
						$config['allowed_types'] = 'gif|jpg|png|jpeg';
						$this->load->library('upload', $config);
						$filename="image";
						$image="";
						if (  $this->upload->do_upload($filename))
						{
							$uploaddata = $this->upload->data();
							$image=$uploaddata['file_name'];
						}

						if($image=="")
						{
						$image=$this->Gallery_Model->getImageById($id);
						   // print_r($image);
							$image=$image->image;
						}
if($this->Gallery_Model->edit($id,$order,$status,$name,$json,$timestamp,$image)==0)
$data["alerterror"]="New Image Gallery Could Not Be Updated.";
else
$data["alertsuccess"]="Image Gallery Updated Successfully.";
$data["redirect"]="site/viewGallery";
$this->load->view("redirect",$data);
}
}
public function deleteGallery()
{
$access=array("1");
$this->checkAccess($access);
$this->Gallery_Model->delete($this->input->get("id"));
$data["redirect"]="site/viewGallery";
$this->load->view("redirect",$data);
}
public function viewGalleryImage()
{
$access=array("1");
$this->checkAccess($access);
$data["page"]="viewGalleryImage";
$data["activemenu"]="image gallery";
$data["page2"]="block/galleryblock";
$data[ 'status' ] =$this->User_Model->getStatusDropDown();
$data[ 'before1' ] =$this->input->get('id');
$data[ 'before2' ] =$this->input->get('id');
$data[ 'gallery' ] =$this->User_Model->getGalleryDropDown();
$data["base_url"]=site_url("site/viewGalleryImageJson?id=".$this->input->get('id'));
$data["title"]="View Image Gallery";
$this->load->view("templatewith2",$data);
}
function viewGalleryImageJson()
{
 $id=$this->input->get('id');
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`webapp_galleryimage`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";
$elements[1]=new stdClass();
$elements[1]->field="`webapp_gallery`.`name`";
$elements[1]->sort="1";
$elements[1]->header="Gallery";
$elements[1]->alias="gallery";
$elements[2]=new stdClass();
$elements[2]->field="`webapp_galleryimage`.`order`";
$elements[2]->sort="1";
$elements[2]->header="Order";
$elements[2]->alias="order";
$elements[3]=new stdClass();
$elements[3]->field="`statuses`.`name`";
$elements[3]->sort="1";
$elements[3]->header="Status";
$elements[3]->alias="status";
$elements[4]=new stdClass();
$elements[4]->field="`webapp_galleryimage`.`image`";
$elements[4]->sort="1";
$elements[4]->header="Image";
$elements[4]->alias="image";

$elements[5]=new stdClass();
$elements[5]->field="`webapp_galleryimage`.`gallery`";
$elements[5]->sort="1";
$elements[5]->header="galleryid";
$elements[5]->alias="galleryid";
$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
$maxrow=20;
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `webapp_galleryimage` LEFT OUTER JOIN `statuses` ON `statuses`.`id`=`webapp_galleryimage`.`status` LEFT OUTER JOIN `webapp_gallery` ON `webapp_gallery`.`id`=`webapp_galleryimage`.`gallery`","WHERE `webapp_galleryimage`.`gallery`='$id'");
$this->load->view("json",$data);
}

public function createGalleryImage()
{
$access=array("1");
$this->checkAccess($access);
$data["page"]="createGalleryImage";
$data["activemenu"]="image gallery";
$data["page2"]="block/galleryblock";
$data[ 'status' ] =$this->User_Model->getStatusDropDown();
$data[ 'gallery' ] =$this->User_Model->getGalleryDropDown();
$data[ 'before1' ] =$this->input->get('id');
$data[ 'before2' ] =$this->input->get('id');
$data["title"]="Create Image Gallery";
$this->load->view("templatewith2",$data);
}
public function createGalleryImageSubmit()
{
$access=array("1");
$this->checkAccess($access);
$this->form_validation->set_rules("gallery","Gallery","trim");
$this->form_validation->set_rules("order","Order","trim");
$this->form_validation->set_rules("status","Status","trim");
$data[ 'gallery' ] =$this->User_Model->getGalleryDropDown();
$this->form_validation->set_rules("image","Image","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="createGalleryImage";
$data[ 'gallery' ] =$this->User_Model->getGalleryDropDown();
$data[ 'status' ] =$this->User_Model->getStatusDropDown();
$data["title"]="Create Image Gallery";
$this->load->view("template",$data);
}
else
{
$gallery=$this->input->get_post("gallery");
$order=$this->input->get_post("order");
$status=$this->input->get_post("status");
$alt=$this->input->get_post("alt");
//$image=$this->input->get_post("image");
       $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];

                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
                $config_r['maintain_ratio'] = TRUE;
                $config_t['create_thumb'] = FALSE;///add this
                $config_r['width']   = 800;
                $config_r['height'] = 800;
                $config_r['quality']    = 100;
                //end of configs

                $this->load->library('image_lib', $config_r);
                $this->image_lib->initialize($config_r);
                if(!$this->image_lib->resize())
                {
                   $data['alerterror']="Failed." . $this->image_lib->display_errors();
                    //return false;
                }
                else
                {
                    //print_r($this->image_lib->dest_image);
                    //dest_image
                    $image=$this->image_lib->dest_image;
                    //return false;
                }

			}
if($this->GalleryImage_Model->create($gallery,$order,$status,$image,$alt)==0)
$data["alerterror"]="New Image Gallery Image could not be created.";
else
$data["alertsuccess"]="Image Gallery Image created Successfully.";
$data["redirect"]="site/viewGalleryImage?id=".$gallery;
$this->load->view("redirect2",$data);
}
}
public function editGalleryImage()
{
$access=array("1");
$this->checkAccess($access);
$data["page"]="editGalleryImage";
$data["page2"]="block/galleryblock";
$data["activemenu"]="image gallery";
$data[ 'status' ] =$this->User_Model->getStatusDropDown();
$getgallery=$this->GalleryImage_Model->beforeEdit($this->input->get("gallery"));
$getid=$this->GalleryImage_Model->beforeEdit($this->input->get("id"));
$data[ 'before1' ] =$this->input->get('galleryid');
$data[ 'before2' ] =$this->input->get('galleryid');
$data[ 'gallery' ] =$this->User_Model->getGalleryDropDown();
$data["title"]="Edit Image Gallery";
$data["before"]=$this->GalleryImage_Model->beforeEdit($this->input->get("id"));
$this->load->view("templatewith2",$data);
}
public function editGalleryImagesubmit()
{
$access=array("1");
$this->checkAccess($access);
$this->form_validation->set_rules("id","ID","trim");
$this->form_validation->set_rules("gallery","Gallery","trim");
$this->form_validation->set_rules("order","Order","trim");
$this->form_validation->set_rules("status","Status","trim");
$this->form_validation->set_rules("image","Image","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="editGalleryImage";
$data[ 'gallery' ] =$this->User_Model->getGalleryDropDown();
$data[ 'status' ] =$this->User_Model->getStatusDropDown();
$data["title"]="Edit Image Gallery";
$data["before"]=$this->GalleryImage_Model->beforeEdit($this->input->get("id"));
$this->load->view("template",$data);
}
else
{
$id=$this->input->get_post("id");
$gallery=$this->input->get_post("gallery");
$order=$this->input->get_post("order");
$status=$this->input->get_post("status");
$alt=$this->input->get_post("alt");
//$image=$this->input->get_post("image");
      $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];

                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
                $config_r['maintain_ratio'] = TRUE;
                $config_t['create_thumb'] = FALSE;///add this
                $config_r['width']   = 800;
                $config_r['height'] = 800;
                $config_r['quality']    = 100;
                //end of configs

                $this->load->library('image_lib', $config_r);
                $this->image_lib->initialize($config_r);
                if(!$this->image_lib->resize())
                {
                   $data['alerterror']="Failed." . $this->image_lib->display_errors();
                    //return false;
                }
                else
                {
                    //print_r($this->image_lib->dest_image);
                    //dest_image
                    $image=$this->image_lib->dest_image;
                    //return false;
                }

			}

            if($image=="")
            {
            $image=$this->User_Model->getGalleryImageById($id);
               // print_r($image);
                $image=$image->image;
            }

if($this->GalleryImage_Model->edit($id,$gallery,$order,$status,$image,$alt)==0)
$data["alerterror"]="New Image Gallery Image Could Not Be Updated.";
else
$data["alertsuccess"]="Image Gallery Image Updated Successfully.";
$data["redirect"]="site/viewGalleryImage?id=".$gallery;
$this->load->view("redirect2",$data);
}
}
public function deleteGalleryImage()
{
$access=array("1");
$this->checkAccess($access);
$this->GalleryImage_Model->delete($this->input->get("id"));
$data["redirect"]="site/viewGalleryImage?id=".$this->input->get('galleryid');
$this->load->view("redirect2",$data);
}
public function viewVideoGallery()
{
$access=array("1");
$this->checkAccess($access);
$data["page"]="viewVideoGallery";
$data["base_url"]=site_url("site/viewVideoGalleryJson");
$data["title"]="View Video Gallery";
$this->load->view("template",$data);
}
function viewVideoGalleryJson()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`webapp_videogallery`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";
$elements[1]=new stdClass();
$elements[1]->field="`webapp_videogallery`.`order`";
$elements[1]->sort="1";
$elements[1]->header="Order";
$elements[1]->alias="order";
$elements[2]=new stdClass();
$elements[2]->field="`statuses`.`name`";
$elements[2]->sort="1";
$elements[2]->header="Status";
$elements[2]->alias="status";
$elements[3]=new stdClass();
$elements[3]->field="`webapp_videogallery`.`name`";
$elements[3]->sort="1";
$elements[3]->header="Name";
$elements[3]->alias="name";
$elements[4]=new stdClass();
$elements[4]->field="`webapp_videogallery`.`json`";
$elements[4]->sort="1";
$elements[4]->header="Json";
$elements[4]->alias="json";

$elements[5]=new stdClass();
$elements[5]->field="DATE_FORMAT(`webapp_videogallery`.`timestamp`,'%a, %b %d %Y %h:%i %p')";
$elements[5]->sort="1";
$elements[5]->header="Timestamp";
$elements[5]->alias="timestamp";
$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
$maxrow=20;
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `webapp_videogallery` LEFT OUTER JOIN `statuses` ON `statuses`.`id`=`webapp_videogallery`.`status`");
$this->load->view("json",$data);
}

public function createVideoGallery()
{
$access=array("1");
$this->checkAccess($access);
$data["page"]="createVideoGallery";
$data["activemenu"]="video gallery";
$data[ 'status' ] =$this->User_Model->getStatusDropDown();
$data[ 'videogallery' ] =$this->User_Model->getVideoGalleryDropDown();
$data["title"]="Create Video Gallery";
$this->load->view("template",$data);
}
public function createVideoGallerySubmit()
{
$access=array("1");
$this->checkAccess($access);
$this->form_validation->set_rules("order","Order","trim");
$this->form_validation->set_rules("status","Status","trim");
$this->form_validation->set_rules("name","Name","trim");
$this->form_validation->set_rules("json","Json","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="createVideoGallery";
$data[ 'videogallery' ] =$this->User_Model->getVideoGalleryDropDown();
$data[ 'status' ] =$this->User_Model->getStatusDropDown();
$data["title"]="Create Video Gallery";
$this->load->view("template",$data);
}
else
{
$order=$this->input->get_post("order");
$status=$this->input->get_post("status");
$name=$this->input->get_post("name");
$json=$this->input->get_post("json");
$subtitle=$this->input->get_post("subtitle");
if($this->VideoGallery_Model->create($order,$status,$name,$json,$subtitle)==0)
$data["alerterror"]="New Video Gallery could not be created.";
else
$data["alertsuccess"]="Video Gallery created Successfully.";
$data["redirect"]="site/viewVideoGallery";
$this->load->view("redirect",$data);
}
}
public function editVideoGallery()
{
$access=array("1");
$this->checkAccess($access);
$data["page"]="editVideoGallery";
$data["activemenu"]="video gallery";
$data["page2"]="block/videoblock";
$data["before1"]=$this->input->get('id');
$data["before2"]=$this->input->get('id');
$data[ 'videogallery' ] =$this->User_Model->getVideoGalleryDropDown();
$data[ 'status' ] =$this->User_Model->getStatusDropDown();
$data["title"]="Edit Video Gallery";
$data["before"]=$this->VideoGallery_Model->beforeEdit($this->input->get("id"));
$this->load->view("templatewith2",$data);
}
public function editVideoGallerySubmit()
{
$access=array("1");
$this->checkAccess($access);
$this->form_validation->set_rules("id","ID","trim");
$this->form_validation->set_rules("order","Order","trim");
$this->form_validation->set_rules("status","Status","trim");
$this->form_validation->set_rules("name","Name","trim");
$this->form_validation->set_rules("json","Json","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data[ 'videogallery' ] =$this->User_Model->getVideoGalleryDropDown();
$data[ 'status' ] =$this->User_Model->getStatusDropDown();
$data["page"]="editVideoGallery";
$data["title"]="Edit Video Gallery";
$data["before"]=$this->VideoGallery_Model->beforeEdit($this->input->get("id"));
$this->load->view("template",$data);
}
else
{
$id=$this->input->get_post("id");
$order=$this->input->get_post("order");
$status=$this->input->get_post("status");
$name=$this->input->get_post("name");
$json=$this->input->get_post("json");
    $timestamp=$this->input->get_post("timestamp");
     $subtitle=$this->input->get_post("subtitle");
if($this->VideoGallery_Model->edit($id,$order,$status,$name,$json,$timestamp,$subtitle)==0)
$data["alerterror"]="New Video Gallery Could Not Be Updated.";
else
$data["alertsuccess"]="Video Gallery Updated Successfully.";
$data["redirect"]="site/viewVideoGallery";
$this->load->view("redirect",$data);
}
}
public function deleteVideoGallery()
{
$access=array("1");
$this->checkAccess($access);
$this->VideoGallery_Model->delete($this->input->get("id"));
$data["redirect"]="site/viewVideoGallery";
$this->load->view("redirect",$data);
}
public function viewVideoGalleryVideo()
{
$access=array("1");
$this->checkAccess($access);
$data["page"]="viewVideoGalleryVideo";
$data["activemenu"]="video gallery";
$data["page2"]="block/videoblock";
$data["before1"]=$this->input->get('id');
$data["before2"]=$this->input->get('id');
$data["base_url"]=site_url("site/viewVideoGalleryVideoJson?id=").$this->input->get('id');
$data["title"]="View Video Gallery Video";
$this->load->view("templatewith2",$data);
}
function viewVideoGalleryVideoJson()
{
$id=$this->input->get('id');
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`webapp_videogalleryvideo`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";
$elements[1]=new stdClass();
$elements[1]->field="`webapp_videogalleryvideo`.`order`";
$elements[1]->sort="1";
$elements[1]->header="Order";
$elements[1]->alias="order";
$elements[2]=new stdClass();
$elements[2]->field="`statuses`.`name`";
$elements[2]->sort="1";
$elements[2]->header="Status";
$elements[2]->alias="status";
$elements[3]=new stdClass();
$elements[3]->field="`webapp_videogallery`.`name`";
$elements[3]->sort="1";
$elements[3]->header="Video Gallery";
$elements[3]->alias="videogallery";
$elements[4]=new stdClass();
$elements[4]->field="`webapp_videogalleryvideo`.`url`";
$elements[4]->sort="1";
$elements[4]->header="Url";
$elements[4]->alias="url";

$elements[5]=new stdClass();
$elements[5]->field="`webapp_videogalleryvideo`.`videogallery`";
$elements[5]->sort="1";
$elements[5]->header="videoid";
$elements[5]->alias="videoid";
$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
$maxrow=20;
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `webapp_videogalleryvideo` LEFT OUTER JOIN `statuses` ON `statuses`.`id`=`webapp_videogalleryvideo`.`status` LEFT OUTER JOIN `webapp_videogallery` ON `webapp_videogallery`.`id`=`webapp_videogalleryvideo`.`videogallery`","WHERE `webapp_videogalleryvideo`.`videogallery`='$id'");
$this->load->view("json",$data);
}

public function createVideoGalleryVideo()
{
$access=array("1");
$this->checkAccess($access);
$data["page"]="createVideoGalleryVideo";
$data["activemenu"]="video gallery";
$data["page2"]="block/videoblock";
$data["before1"]=$this->input->get('id');
$data["before2"]=$this->input->get('id');
$data[ 'status' ] =$this->User_Model->getStatusDropDown();
$data[ 'videogallery' ] =$this->User_Model->getVideoGalleryDropDown();
$data["title"]="Create Video Gallery Video";
$this->load->view("templatewith2",$data);
}
public function createVideoGalleryVideoSubmit()
{
$access=array("1");
$this->checkAccess($access);
$this->form_validation->set_rules("order","Order","trim");
$this->form_validation->set_rules("status","Status","trim");
$this->form_validation->set_rules("videogallery","Video Gallery","trim");
$this->form_validation->set_rules("url","Url","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="createVideoGalleryVideo";
$data[ 'status' ] =$this->User_Model->getStatusDropDown();
$data[ 'videogallery' ] =$this->User_Model->getVideoGalleryDropDown();
$data["title"]="Create Video Gallery Video";
$this->load->view("template",$data);
}
else
{
$order=$this->input->get_post("order");
$status=$this->input->get_post("status");
$videogallery=$this->input->get_post("videogallery");
$url=$this->input->get_post("url");
$alt=$this->input->get_post("alt");
if($this->VideoGalleryVideo_Model->create($order,$status,$videogallery,$url,$alt)==0)
$data["alerterror"]="New Video Gallery Video Could Not Be created.";
else
$data["alertsuccess"]="Video Gallery Video created Successfully.";
$data["redirect"]="site/viewVideoGalleryVideo?id=".$videogallery;
$this->load->view("redirect2",$data);
}
}
public function editVideoGalleryVideo()
{
$access=array("1");
$this->checkAccess($access);
$data["page"]="editVideoGalleryVideo";
$data["activemenu"]="video gallery";
$data["page2"]="block/videoblock";
$data["before1"]=$this->input->get('videoid');
$data["before2"]=$this->input->get('videoid');
$data[ 'status' ] =$this->User_Model->getStatusDropDown();
$data[ 'videogallery' ] =$this->User_Model->getVideoGalleryDropDown();
$data["title"]="Edit Video Gallery Video";
$data["before"]=$this->VideoGalleryVideo_Model->beforeEdit($this->input->get("id"));
$this->load->view("templatewith2",$data);
}
public function editVideoGalleryVideoSubmit()
{
$access=array("1");
$this->checkAccess($access);
$this->form_validation->set_rules("id","ID","trim");
$this->form_validation->set_rules("order","Order","trim");
$this->form_validation->set_rules("status","Status","trim");
$this->form_validation->set_rules("videogallery","Video Gallery","trim");
$this->form_validation->set_rules("url","Url","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data[ 'videogallery' ] =$this->User_Model->getVideoGalleryDropDown();
$data["page"]="editVideoGalleryVideo";
$data[ 'status' ] =$this->User_Model->getStatusDropDown();
$data["title"]="Edit Video Gallery Video";
$data["before"]=$this->VideoGalleryVideo_Model->beforeEdit($this->input->get("id"));
$this->load->view("template",$data);
}
else
{
$id=$this->input->get_post("id");
$order=$this->input->get_post("order");
$status=$this->input->get_post("status");
$videogallery=$this->input->get_post("videogallery");
$url=$this->input->get_post("url");
$alt=$this->input->get_post("alt");
if($this->VideoGalleryVideo_Model->edit($id,$order,$status,$videogallery,$url,$alt)==0)
$data["alerterror"]="New Video Gallery Video Could Not Be Updated.";
else
$data["alertsuccess"]="Video Gallery Video Updated Successfully.";
$data["redirect"]="site/viewVideoGalleryVideo?id=".$videogallery;
$this->load->view("redirect2",$data);
}
}
public function deleteVideoGalleryVideo()
{
$access=array("1");
$this->checkAccess($access);
$this->VideoGalleryVideo_Model->delete($this->input->get("id"));
$data["redirect"]="site/viewVideoGalleryVideo?id=".$this->input->get('videoid');
$this->load->view("redirect2",$data);
}
public function viewEvents()
{
$access=array("1");
$this->checkAccess($access);
$data["page"]="viewEvents";
$data["activemenu"]="events";
$data["base_url"]=site_url("site/viewEventsJson");
$data["title"]="View Events";
$this->load->view("template",$data);
}
function viewEventsJson()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`webapp_events`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";
$elements[1]=new stdClass();
$elements[1]->field="`statuses`.`name`";
$elements[1]->sort="1";
$elements[1]->header="Status";
$elements[1]->alias="status";
$elements[2]=new stdClass();
$elements[2]->field="`webapp_events`.`title`";
$elements[2]->sort="1";
$elements[2]->header="Title";
$elements[2]->alias="title";
$elements[3]=new stdClass();
$elements[3]->field="DATE_FORMAT(`webapp_events`.`timestamp`,'%a, %b %d %Y %h:%i %p')";
$elements[3]->sort="1";
$elements[3]->header="Timestamp";
$elements[3]->alias="timestamp";
$elements[4]=new stdClass();
$elements[4]->field="`webapp_events`.`content`";
$elements[4]->sort="1";
$elements[4]->header="Content";
$elements[4]->alias="content";
$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
$maxrow=20;
}
if($orderby=="")
{
$orderby="id";
$orderorder="DESC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `webapp_events` LEFT OUTER JOIN `statuses` ON `statuses`.`id`=`webapp_events`.`status`");
$this->load->view("json",$data);
}

public function createEvents()
{
$access=array("1");
$this->checkAccess($access);
$data["page"]="createEvents";
$data[ 'status' ] =$this->User_Model->getStatusDropDown();
$data["activemenu"]="events";
$data["title"]="Create Event";
$this->load->view("template",$data);
}
public function createEventsSubmit()
{
$access=array("1");
$this->checkAccess($access);
$this->form_validation->set_rules("status","Status","trim");
$this->form_validation->set_rules("title","Title","trim");
$this->form_validation->set_rules("timestamp","Timestamp","trim");
$this->form_validation->set_rules("content","Content","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="createEvents";
$data[ 'status' ] =$this->User_Model->getStatusDropDown();
$data["title"]="Create Event";
$this->load->view("template",$data);
}
else
{
$status=$this->input->get_post("status");
$title=$this->input->get_post("title");
$timestamp=$this->input->get_post("timestamp");
$content=$this->input->get_post("content");
$venue=$this->input->get_post("venue");
//$image=$this->input->get_post("image");
$startdate=$this->input->get_post("startdate");
$starttime=$this->input->get_post("starttime");
    $config['upload_path'] = './uploads/';
						$config['allowed_types'] = 'gif|jpg|png|jpeg';
						$this->load->library('upload', $config);
						$filename="image";
						$image="";
						if (  $this->upload->do_upload($filename))
						{
							$uploaddata = $this->upload->data();
							$image=$uploaddata['file_name'];
						}
if($this->Events_Model->create($status,$title,$timestamp,$content,$venue,$image,$startdate,$starttime)==0)
$data["alerterror"]="New Event could not be created.";
else
$data["alertsuccess"]="Event created Successfully.";
$data["redirect"]="site/viewEvents";
$this->load->view("redirect",$data);
}
}
public function editEvents()
{
$access=array("1");
$this->checkAccess($access);
$data["page"]="editEvents";
$data["activemenu"]="events";
$data["page2"]="block/eventblock";
$data["before1"]=$this->input->get('id');
$data["before2"]=$this->input->get('id');
$data["before3"]=$this->input->get('id');
$data["title"]="Edit Event";
$data[ 'status' ] =$this->User_Model->getStatusDropDown();
$data["before"]=$this->Events_Model->beforeEdit($this->input->get("id"));
$data['exp']=explode(":",$data["before"]->starttime);
$this->load->view("templatewith2",$data);
}
public function editEventsSubmit()
{
$access=array("1");
$this->checkAccess($access);
$this->form_validation->set_rules("id","ID","trim");
$this->form_validation->set_rules("status","Status","trim");
$this->form_validation->set_rules("title","Title","trim");
$this->form_validation->set_rules("timestamp","Timestamp","trim");
$this->form_validation->set_rules("content","Content","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data[ 'status' ] =$this->User_Model->getStatusDropDown();
$data["page"]="editEvents";
$data["title"]="Edit Event";
$data["before"]=$this->Events_Model->beforeEdit($this->input->get("id"));
$this->load->view("template",$data);
}
else
{
$id=$this->input->get_post("id");
$status=$this->input->get_post("status");
$title=$this->input->get_post("title");
$timestamp=$this->input->get_post("timestamp");
$content=$this->input->get_post("content");
$venue=$this->input->get_post("venue");
//$image=$this->input->get_post("image");
$startdate=$this->input->get_post("startdate");
$starttime=$this->input->get_post("starttime");

				   $config['upload_path'] = './uploads/';
						$config['allowed_types'] = 'gif|jpg|png|jpeg';
						$this->load->library('upload', $config);
						$filename="image";
						$image="";
						if (  $this->upload->do_upload($filename))
						{
							$uploaddata = $this->upload->data();
							$image=$uploaddata['file_name'];
						}

						if($image=="")
						{
						$image=$this->Events_Model->getImageById($id);
						   // print_r($image);
							$image=$image->image;
						}
if($this->Events_Model->edit($id,$status,$title,$timestamp,$content,$venue,$image,$startdate,$starttime)==0)
$data["alerterror"]="New Event Could Not Be Updated.";
else
$data["alertsuccess"]="Event Updated Successfully.";
$data["redirect"]="site/viewEvents";
$this->load->view("redirect",$data);
}
}
public function deleteEvents()
{
$access=array("1");
$this->checkAccess($access);
$this->Events_Model->delete($this->input->get("id"));
$data["redirect"]="site/viewEvents";
$this->load->view("redirect",$data);
}
public function viewEventVideo()
{
$access=array("1");
$this->checkAccess($access);
$data["page"]="viewEventVideo";
$data["activemenu"]="events";
$data["page2"]="block/eventblock";
$data["before1"]=$this->input->get('id');
$data["before2"]=$this->input->get('id');
$data["before3"]=$this->input->get('id');
$data["base_url"]=site_url("site/viewEventVideoJson?id=").$this->input->get('id');
$data["title"]="View Event Videos";
$this->load->view("templatewith2",$data);
}
function viewEventVideoJson()
{
$id=$this->input->get('id');
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`webapp_eventvideo`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";
$elements[1]=new stdClass();
$elements[1]->field="`webapp_events`.`title`";
$elements[1]->sort="1";
$elements[1]->header="event";
$elements[1]->alias="event";
$elements[2]=new stdClass();
$elements[2]->field="`webapp_videogallery`.`name`";
$elements[2]->sort="1";
$elements[2]->header="Video Gallery";
$elements[2]->alias="videogallery";
$elements[3]=new stdClass();
$elements[3]->field="`statuses`.`name`";
$elements[3]->sort="1";
$elements[3]->header="Status";
$elements[3]->alias="status";
$elements[4]=new stdClass();
$elements[4]->field="`webapp_eventvideo`.`order`";
$elements[4]->sort="1";
$elements[4]->header="Order";
$elements[4]->alias="order";

$elements[5]=new stdClass();
$elements[5]->field="`webapp_eventvideo`.`event`";
$elements[5]->sort="1";
$elements[5]->header="eventid";
$elements[5]->alias="eventid";

$elements[6]=new stdClass();
$elements[6]->field="`webapp_eventvideo`.`url`";
$elements[6]->sort="1";
$elements[6]->header="Url";
$elements[6]->alias="url";
$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
$maxrow=20;
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `webapp_eventvideo` LEFT OUTER JOIN `statuses` ON `statuses`.`id`=`webapp_eventvideo`.`status` LEFT OUTER JOIN `webapp_videogallery` ON `webapp_videogallery`.`id`=`webapp_eventvideo`.`videogallery` LEFT OUTER JOIN `webapp_events` ON `webapp_events`.`id`=`webapp_eventvideo`.`event`","WHERE `webapp_eventvideo`.`event`='$id'");
$this->load->view("json",$data);
}

public function createEventVideo()
{
$access=array("1");
$this->checkAccess($access);
$data["page"]="createEventVideo";
$data["activemenu"]="events";
$data["page2"]="block/eventblock";
$data["before1"]=$this->input->get('id');
$data["before2"]=$this->input->get('id');
$data["before3"]=$this->input->get('id');
$data[ 'status' ] =$this->User_Model->getStatusDropDown();
$data[ 'event' ] =$this->User_Model->getEventsDropDown();
$data[ 'videogallery' ] =$this->User_Model->getVideoGalleryDropDown();
$data["title"]="Create Event Video";
$this->load->view("templatewith2",$data);
}
public function createEventVideoSubmit()
{
$access=array("1");
$this->checkAccess($access);
$this->form_validation->set_rules("event","event","trim");
$this->form_validation->set_rules("videogallery","Video Gallery","trim");
$this->form_validation->set_rules("status","Status","trim");
$this->form_validation->set_rules("order","Order","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="createEventVideo";
$data[ 'status' ] =$this->User_Model->getStatusDropDown();
$data[ 'videogallery' ] =$this->User_Model->getVideoGalleryDropDown();
$data[ 'event' ] =$this->User_Model->getEventsDropDown();
$data["title"]="Create Event Video";
$this->load->view("template",$data);
}
else
{
$event=$this->input->get_post("event");
$videogallery=$this->input->get_post("videogallery");
$status=$this->input->get_post("status");
$order=$this->input->get_post("order");
$url=$this->input->get_post("url");
if($this->EventVideo_Model->create($event,$videogallery,$status,$order,$url)==0)
$data["alerterror"]="New Event Video could not be created.";
else
$data["alertsuccess"]="Event Video created Successfully.";
$data["redirect"]="site/viewEventVideo?id=".$event;
$this->load->view("redirect2",$data);
}
}
public function editEventVideo()
{
$access=array("1");
$this->checkAccess($access);
$data["page"]="editEventVideo";
$data["activemenu"]="events";
$data["page2"]="block/eventblock";
$data["before1"]=$this->input->get('eventid');
$data["before2"]=$this->input->get('eventid');
$data["before3"]=$this->input->get('eventid');
$data[ 'videogallery' ] =$this->User_Model->getVideoGalleryDropDown();
$data[ 'event' ] =$this->User_Model->getEventsDropDown();
$data[ 'status' ] =$this->User_Model->getStatusDropDown();
$data["title"]="Edit Event Video";
$data["before"]=$this->EventVideo_Model->beforeEdit($this->input->get("id"));
$this->load->view("templatewith2",$data);
}
public function editEventVideoSubmit()
{
$access=array("1");
$this->checkAccess($access);
$this->form_validation->set_rules("id","ID","trim");
$this->form_validation->set_rules("event","event","trim");
$this->form_validation->set_rules("videogallery","Video Gallery","trim");
$this->form_validation->set_rules("status","Status","trim");
$this->form_validation->set_rules("order","Order","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="editEventVideo";
$data[ 'videogallery' ] =$this->User_Model->getVideoGalleryDropDown();
$data[ 'status' ] =$this->User_Model->getStatusDropDown();
$data[ 'event' ] =$this->User_Model->getEventsDropDown();
$data["title"]="Edit Event Video";
$data["before"]=$this->EventVideo_Model->beforeEdit($this->input->get("id"));
$this->load->view("template",$data);
}
else
{
$id=$this->input->get_post("id");
$event=$this->input->get_post("event");
$videogallery=$this->input->get_post("videogallery");
$status=$this->input->get_post("status");
$order=$this->input->get_post("order");
    $url=$this->input->get_post("url");
if($this->EventVideo_Model->edit($id,$event,$videogallery,$status,$order,$url)==0)
$data["alerterror"]="New Event Video Could Not Be Updated.";
else
$data["alertsuccess"]="Event Video Updated Successfully.";
$data["redirect"]="site/viewEventVideo?id=".$event;
$this->load->view("redirect2",$data);
}
}
public function deleteEventVideo()
{
$access=array("1");
$this->checkAccess($access);
$this->EventVideo_Model->delete($this->input->get("id"));
$data["redirect"]="site/viewEventVideo?id=".$this->input->get('eventid');
$this->load->view("redirect2",$data);
}
public function viewEventImages()
{
$access=array("1");
$this->checkAccess($access);
$data["page"]="viewEventImages";
$data["activemenu"]="events";
$data["page2"]="block/eventblock";
$data["before1"]=$this->input->get('id');
$data["before2"]=$this->input->get('id');
$data["before3"]=$this->input->get('id');
$data["base_url"]=site_url("site/viewEventImagesJson?id=").$this->input->get('id');
$data["title"]="View Event Images";
$this->load->view("templatewith2",$data);
}
function viewEventImagesJson()
{
$id=$this->input->get('id');
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`webapp_eventimages`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";
$elements[1]=new stdClass();
$elements[1]->field="`webapp_events`.`title`";
$elements[1]->sort="1";
$elements[1]->header="event";
$elements[1]->alias="event";
$elements[2]=new stdClass();
$elements[2]->field="`statuses`.`name`";
$elements[2]->sort="1";
$elements[2]->header="Status";
$elements[2]->alias="status";
$elements[3]=new stdClass();
$elements[3]->field="`webapp_eventimages`.`order`";
$elements[3]->sort="1";
$elements[3]->header="Order";
$elements[3]->alias="order";
$elements[4]=new stdClass();
$elements[4]->field="`webapp_eventimages`.`image`";
$elements[4]->sort="1";
$elements[4]->header="Image";
$elements[4]->alias="image";
$elements[5]=new stdClass();
$elements[5]->field="`webapp_eventimages`.`event`";
$elements[5]->sort="1";
$elements[5]->header="eventid";
$elements[5]->alias="eventid";
$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
$maxrow=20;
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `webapp_eventimages` LEFT OUTER JOIN `statuses` ON `statuses`.`id`=`webapp_eventimages`.`status` LEFT OUTER JOIN `webapp_events` ON `webapp_events`.`id`=`webapp_eventimages`.`event`","WHERE `webapp_eventimages`.`event`='$id'");
$this->load->view("json",$data);
}

public function createEventImages()
{
$access=array("1");
$this->checkAccess($access);
$data["page"]="createEventImages";
$data["activemenu"]="events";
$data["page2"]="block/eventblock";
$data["before1"]=$this->input->get('id');
$data["before2"]=$this->input->get('id');
$data["before3"]=$this->input->get('id');
$data[ 'event' ] =$this->User_Model->getEventsDropDown();
$data[ 'status' ] =$this->User_Model->getStatusDropDown();
$data["title"]="Create Event Image";
$this->load->view("templatewith2",$data);
}
public function createEventImagesSubmit()
{
$access=array("1");
$this->checkAccess($access);
$this->form_validation->set_rules("event","event","trim");
$this->form_validation->set_rules("status","Status","trim");
$this->form_validation->set_rules("order","Order","trim");
$this->form_validation->set_rules("image","Image","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data[ 'status' ] =$this->User_Model->getStatusDropDown();
$data["page"]="createEventImages";
$data[ 'event' ] =$this->User_Model->getEventsDropDown();
$data["title"]="Create Event Image";
$this->load->view("template",$data);
}
else
{
$event=$this->input->get_post("event");
$status=$this->input->get_post("status");
$order=$this->input->get_post("order");
//$image=$this->input->get_post("image");
       $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];

                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
                $config_r['maintain_ratio'] = TRUE;
                $config_t['create_thumb'] = FALSE;///add this
                $config_r['width']   = 800;
                $config_r['height'] = 800;
                $config_r['quality']    = 100;
                //end of configs

                $this->load->library('image_lib', $config_r);
                $this->image_lib->initialize($config_r);
                if(!$this->image_lib->resize())
                {
                   $data['alerterror']="Failed." . $this->image_lib->display_errors();
                    //return false;
                }
                else
                {
                    //print_r($this->image_lib->dest_image);
                    //dest_image
                    $image=$this->image_lib->dest_image;
                    //return false;
                }

			}
if($this->EventImages_Model->create($event,$status,$order,$image)==0)
$data["alerterror"]="New Event Images could not be created.";
else
$data["alertsuccess"]="Event Image created Successfully.";
$data["redirect"]="site/viewEventImages?id=".$event;
$this->load->view("redirect2",$data);
}
}
public function editEventImages()
{
$access=array("1");
$this->checkAccess($access);
$data["page"]="editEventImages";
$data["activemenu"]="events";
$data["page2"]="block/eventblock";
$data["before1"]=$this->input->get('eventid');
$data["before2"]=$this->input->get('eventid');
$data["before3"]=$this->input->get('eventid');
$data[ 'status' ] =$this->User_Model->getStatusDropDown();
$data[ 'event' ] =$this->User_Model->getEventsDropDown();
$data["title"]="Edit Event Image";
$data["before"]=$this->EventImages_Model->beforeEdit($this->input->get("id"));
$this->load->view("templatewith2",$data);
}
public function editEventImagesSubmit()
{
$access=array("1");
$this->checkAccess($access);
$this->form_validation->set_rules("id","ID","trim");
$this->form_validation->set_rules("event","event","trim");
$this->form_validation->set_rules("status","Status","trim");
$this->form_validation->set_rules("order","Order","trim");
$this->form_validation->set_rules("image","Image","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="editEventImages";
$data[ 'event' ] =$this->User_Model->getEventsDropDown();
$data[ 'status' ] =$this->User_Model->getStatusDropDown();
$data["title"]="Edit Event Image";
$data["before"]=$this->EventImages_Model->beforeEdit($this->input->get("id"));
$this->load->view("template",$data);
}
else
{
$id=$this->input->get_post("id");
$event=$this->input->get_post("event");
$status=$this->input->get_post("status");
$order=$this->input->get_post("order");
//$image=$this->input->get_post("image");
      $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];

                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
                $config_r['maintain_ratio'] = TRUE;
                $config_t['create_thumb'] = FALSE;///add this
                $config_r['width']   = 800;
                $config_r['height'] = 800;
                $config_r['quality']    = 100;
                //end of configs

                $this->load->library('image_lib', $config_r);
                $this->image_lib->initialize($config_r);
                if(!$this->image_lib->resize())
                {
                  $data['alerterror']="Failed." . $this->image_lib->display_errors();
                    //return false;
                }
                else
                {
                    //print_r($this->image_lib->dest_image);
                    //dest_image
                    $image=$this->image_lib->dest_image;
                    //return false;
                }

			}

            if($image=="")
            {
            $image=$this->User_Model->getEventImageById($id);
               // print_r($image);
                $image=$image->image;
            }

if($this->EventImages_Model->edit($id,$event,$status,$order,$image)==0)
$data["alerterror"]="New Event Image Could Not Be Updated.";
else
$data["alertsuccess"]="Event Images Updated Successfully.";
$data["redirect"]="site/viewEventImages?id=".$event;
$this->load->view("redirect2",$data);
}
}
public function deleteEventImages()
{
$access=array("1");
$this->checkAccess($access);
$this->EventImages_Model->delete($this->input->get("id"));
$data["redirect"]="site/viewEventImages?id=".$this->input->get('eventid');
$this->load->view("redirect2",$data);
}
public function viewEnquiry()
{
$access=array("1");
$this->checkAccess($access);
$data["page"]="viewEnquiry";
$data["base_url"]=site_url("site/viewEnquiryJson");
$data["title"]="View Enquiry";
$this->load->view("template",$data);
}
function viewEnquiryJson()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`webapp_enquiry`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";
$elements[1]=new stdClass();
$elements[1]->field="`user`.`name`";
$elements[1]->sort="1";
$elements[1]->header="User";
$elements[1]->alias="user";
$elements[2]=new stdClass();
$elements[2]->field="`webapp_enquiry`.`name`";
$elements[2]->sort="1";
$elements[2]->header="Name";
$elements[2]->alias="name";
$elements[3]=new stdClass();
$elements[3]->field="`webapp_enquiry`.`email`";
$elements[3]->sort="1";
$elements[3]->header="Email";
$elements[3]->alias="email";
$elements[4]=new stdClass();
$elements[4]->field="`webapp_enquiry`.`title`";
$elements[4]->sort="1";
$elements[4]->header="Title";
$elements[4]->alias="title";
$elements[5]=new stdClass();
$elements[5]->field="`webapp_enquiry`.`timestamp`";
$elements[5]->sort="1";
$elements[5]->header="Timestamp";
$elements[5]->alias="timestamp";
$elements[6]=new stdClass();
$elements[6]->field="`webapp_enquiry`.`content`";
$elements[6]->sort="1";
$elements[6]->header="Content";
$elements[6]->alias="content";
$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
$maxrow=20;
}
if($orderby=="")
{
$orderby="id";
$orderorder="DESC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `webapp_enquiry` LEFT OUTER JOIN `user` ON `user`.`id`=`webapp_enquiry`.`user`");
$this->load->view("json",$data);
}

public function createEnquiry()
{
$access=array("1");
$this->checkAccess($access);
$data["page"]="createEnquiry";
$data["activemenu"]="enquiries";
$data["user"]=$this->User_Model->getUserDropDown();
$data["title"]="Create Enquiry";
$this->load->view("template",$data);
}
public function createEnquirySubmit()
{
$access=array("1");
$this->checkAccess($access);
$this->form_validation->set_rules("user","User","trim");
$this->form_validation->set_rules("name","Name","trim");
$this->form_validation->set_rules("email","Email","trim");
$this->form_validation->set_rules("title","Title","trim");
$this->form_validation->set_rules("timestamp","Timestamp","trim");
$this->form_validation->set_rules("content","Content","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["user"]=$this->User_Model->getUserDropDown();
$data["page"]="createEnquiry";
$data["title"]="Create Enquiry";
$this->load->view("template",$data);
}
else
{
$user=$this->input->get_post("user");
$name=$this->input->get_post("name");
$email=$this->input->get_post("email");
$title=$this->input->get_post("title");
$timestamp=$this->input->get_post("timestamp");
$content=$this->input->get_post("content");
if($this->Enquiry_Model->create($user,$name,$email,$title,$timestamp,$content)==0)
$data["alerterror"]="New enquiry could not be created.";
else
$data["alertsuccess"]="enquiry created Successfully.";
$data["redirect"]="site/viewEnquiry";
$this->load->view("redirect",$data);
}
}
public function editEnquiry()
{
$access=array("1");
$this->checkAccess($access);
$data["page"]="editEnquiry";
$data["activemenu"]="enquiries";
$data["user"]=$this->User_Model->getUserDropDown();
$data["title"]="Edit Enquiry";
$data["before"]=$this->Enquiry_Model->beforeEdit($this->input->get("id"));
$this->load->view("template",$data);
}
public function editEnquirySubmit()
{
$access=array("1");
$this->checkAccess($access);
$this->form_validation->set_rules("id","ID","trim");
$this->form_validation->set_rules("user","User","trim");
$this->form_validation->set_rules("name","Name","trim");
$this->form_validation->set_rules("email","Email","trim");
$this->form_validation->set_rules("title","Title","trim");
$this->form_validation->set_rules("timestamp","Timestamp","trim");
$this->form_validation->set_rules("content","Content","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="editEnquiry";
$data["user"]=$this->User_Model->getUserDropDown();
$data["title"]="Edit Enquiry";
$data["before"]=$this->Enquiry_Model->beforeEdit($this->input->get("id"));
$this->load->view("template",$data);
}
else
{
$id=$this->input->get_post("id");
$user=$this->input->get_post("user");
$name=$this->input->get_post("name");
$email=$this->input->get_post("email");
$title=$this->input->get_post("title");
$timestamp=$this->input->get_post("timestamp");
$content=$this->input->get_post("content");
if($this->Enquiry_Model->edit($id,$user,$name,$email,$title,$timestamp,$content)==0)
$data["alerterror"]="New enquiry Could Not Be Updated.";
else
$data["alertsuccess"]="enquiry Updated Successfully.";
$data["redirect"]="site/viewEnquiry";
$this->load->view("redirect",$data);
}
}
public function deleteEnquiry()
{
$access=array("1");
$this->checkAccess($access);
$this->Enquiry_Model->delete($this->input->get("id"));
$data["redirect"]="site/viewEnquiry";
$this->load->view("redirect",$data);
}
public function viewNotification()
{
$access=array("1");
$this->checkAccess($access);
$data["page"]="viewNotification";
$data["base_url"]=site_url("site/viewNotificationJson");
$data["title"]="View Notifications";
$this->load->view("template",$data);
}
function viewNotificationJson()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`webapp_notification`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";
$elements[1]=new stdClass();
$elements[1]->field="`statuses`.`name`";
$elements[1]->sort="1";
$elements[1]->header="Status";
$elements[1]->alias="status";
$elements[2]=new stdClass();
$elements[2]->field="`webapp_notification`.`image`";
$elements[2]->sort="1";
$elements[2]->header="Image";
$elements[2]->alias="image";
$elements[3]=new stdClass();
$elements[3]->field="DATE_FORMAT(`webapp_notification`.`timestamp`,'%a, %b %d %Y %h:%i %p')";
$elements[3]->sort="1";
$elements[3]->header="Timestamp";
$elements[3]->alias="timestamp";
$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
$maxrow=20;
}
if($orderby=="")
{
$orderby="id";
$orderorder="DESC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `webapp_notification` LEFT OUTER JOIN `statuses` ON `statuses`.`id`=`webapp_notification`.`status`");
$this->load->view("json",$data);
}

public function createNotification()
{
$access=array("1");
$this->checkAccess($access);
$data["page"]="createNotification";
$data["activemenu"]="notifications";
$this->Notification_Model->changeStatusOfExternalLink();
$data[ 'linktype' ] =$this->User_Model->getLinkTypeDropDown();
$data[ 'showdropdown' ] =18;
$data[ 'event' ] =$this->User_Model->getEventsDropDown();
$data[ 'blog' ] =$this->User_Model->getBlogDropDown();
$data[ 'video' ] =$this->User_Model->getVideoGalleryDropDown();
$data[ 'article' ] =$this->User_Model->getArticleDropDown();
$data[ 'gallery' ] =$this->User_Model->getGalleryDropDown();
$data[ 'status' ] =$this->User_Model->getStatusDropDown();
$data["title"]="Create Notification";
$this->load->view("template",$data);
}
public function createNotificationSubmit()
{
$access=array("1");
$this->checkAccess($access);
$linktype=$this->input->get_post("linktype");
$event=$this->input->get_post("event");
$video=$this->input->get_post("video");
$gallery=$this->input->get_post("gallery");
$article=$this->input->get_post("article");
$status=$this->input->get_post("status");
$blog=$this->input->get_post("blog");
$link=$this->input->get_post("link");
    $content=$this->input->get_post("content");
//$image=$this->input->get_post("image");

       $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];

                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
                $config_r['maintain_ratio'] = TRUE;
                $config_t['create_thumb'] = FALSE;///add this
                $config_r['width']   = 800;
                $config_r['height'] = 800;
                $config_r['quality']    = 100;
                //end of configs

                $this->load->library('image_lib', $config_r);
                $this->image_lib->initialize($config_r);
                if(!$this->image_lib->resize())
                {
                    $data['alerterror']="Failed." . $this->image_lib->display_errors();
                    //return false;
                }
                else
                {
                    //print_r($this->image_lib->dest_image);
                    //dest_image
                    $image=$this->image_lib->dest_image;
                    //return false;
                }

			}
if($this->Notification_Model->create($linktype,$event,$video,$gallery,$article,$status,$blog,$link,$content,$image)==0)
$data["alerterror"]="New notification could not be created.";
else
$data["alertsuccess"]="notification created Successfully.";
$data["redirect"]="site/viewNotification";
$this->load->view("redirect",$data);

}
public function editNotification()
{
$access=array("1");
$this->checkAccess($access);
$data["page"]="editNotification";
//$data["page2"]="block/notificationblock";
$this->Notification_Model->changeStatusOfExternalLink();
$data["before1"]=$this->input->get('id');
$data["before2"]=$this->input->get('id');
$data[ 'linktype' ] =$this->User_Model->getLinkTypeDropDown();
$data[ 'event' ] =$this->User_Model->getEventsDropDown();
$data[ 'blog' ] =$this->User_Model->getBlogDropDown();
$data[ 'video' ] =$this->User_Model->getVideoGalleryDropDown();
$data[ 'article' ] =$this->User_Model->getArticleDropDown();
$data[ 'gallery' ] =$this->User_Model->getGalleryDropDown();
$data[ 'status' ] =$this->User_Model->getStatusDropDown();
$data["title"]="Edit Notification";
$data["activemenu"]="notifications";
$data["before"]=$this->Notification_Model->beforeEdit($this->input->get("id"));
$this->load->view("template",$data);
}
public function editNotificationSubmit()
{
$access=array("1");
$this->checkAccess($access);
$this->form_validation->set_rules("id","ID","trim");
$this->form_validation->set_rules("videogallery","Video Gallery","trim");
$this->form_validation->set_rules("event","event","trim");
$this->form_validation->set_rules("videogalleryvideo","Video Gallery Video","trim");
$this->form_validation->set_rules("galleryimage","Gallery Image","trim");
$this->form_validation->set_rules("article","article","trim");
$this->form_validation->set_rules("status","Status","trim");
$this->form_validation->set_rules("link","Link","trim");
$this->form_validation->set_rules("image","Image","trim");
$this->form_validation->set_rules("timestamp","Timestamp","trim");
$this->form_validation->set_rules("content","Content","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="editNotification";
$data[ 'linktype' ] =$this->User_Model->getLinkTypeDropDown();
$data[ 'event' ] =$this->User_Model->getEventsDropDown();
$data[ 'blog' ] =$this->User_Model->getBlogDropDown();
$data[ 'video' ] =$this->User_Model->getVideoGalleryDropDown();
$data[ 'article' ] =$this->User_Model->getArticleDropDown();
$data[ 'gallery' ] =$this->User_Model->getGalleryDropDown();
$data[ 'status' ] =$this->User_Model->getStatusDropDown();
$data["title"]="Edit Notification";
$data["before"]=$this->Notification_Model->beforeEdit($this->input->get("id"));
$this->load->view("template",$data);
}
else
{
$id=$this->input->get_post("id");
$linktype=$this->input->get_post("linktype");
$event=$this->input->get_post("event");
$video=$this->input->get_post("video");
$gallery=$this->input->get_post("gallery");
$article=$this->input->get_post("article");
$status=$this->input->get_post("status");
$blog=$this->input->get_post("blog");
$link=$this->input->get_post("link");
    $content=$this->input->get_post("content");
$timestamp=$this->input->get_post("timestamp");
      $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];

                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
                $config_r['maintain_ratio'] = TRUE;
                $config_t['create_thumb'] = FALSE;///add this
                $config_r['width']   = 800;
                $config_r['height'] = 800;
                $config_r['quality']    = 100;
                //end of configs

                $this->load->library('image_lib', $config_r);
                $this->image_lib->initialize($config_r);
                if(!$this->image_lib->resize())
                {
                   $data['alerterror']="Failed." . $this->image_lib->display_errors();
                    //return false;
                }
                else
                {
                    //print_r($this->image_lib->dest_image);
                    //dest_image
                    $image=$this->image_lib->dest_image;
                    //return false;
                }

			}

            if($image=="")
            {
            $image=$this->User_Model->getNotificationImageById($id);
               // print_r($image);
                $image=$image->image;
            }

if($this->Notification_Model->edit($id,$linktype,$event,$video,$gallery,$article,$status,$blog,$link,$content,$image,$timestamp)==0)
$data["alerterror"]="New notification Could Not Be Updated.";
else
$data["alertsuccess"]="notification Updated Successfully.";
$data["redirect"]="site/viewNotification";
$this->load->view("redirect",$data);
}
}
public function deleteNotification()
{
$access=array("1");
$this->checkAccess($access);
$this->Notification_Model->delete($this->input->get("id"));
$data["redirect"]="site/viewNotification";
$this->load->view("redirect",$data);
}
public function viewNotificationUser()
{
$access=array("1");
$this->checkAccess($access);
$data["page"]="viewNotificationUser";
$data["page2"]="block/notificationblock";
$data["before1"]=$this->input->get('id');
$data["before2"]=$this->input->get('id');
$data["notification"]=$this->User_Model->getNotificationDropDown();
$data["base_url"]=site_url("site/viewNotificationUserJson?id=").$this->input->get('id');
$data["title"]="View Notification Users";
$this->load->view("templatewith2",$data);
}
function viewNotificationUserJson()
{
    $id=$this->input->get('id');
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`webapp_notificationuser`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";
$elements[1]=new stdClass();
$elements[1]->field="`webapp_notification`.`content`";
$elements[1]->sort="1";
$elements[1]->header="Notification";
$elements[1]->alias="notification";
$elements[2]=new stdClass();
$elements[2]->field="`user`.`name`";
$elements[2]->sort="1";
$elements[2]->header="User";
$elements[2]->alias="user";
$elements[3]=new stdClass();
$elements[3]->field="DATE_FORMAT(`webapp_notificationuser`.`timestamp`,'%a, %b %d %Y %h:%i %p')";
$elements[3]->sort="1";
$elements[3]->header="Timestamp";
$elements[3]->alias="timestamp";
$elements[4]=new stdClass();
$elements[4]->field="`webapp_notificationuser`.`timestamp_receive`";
$elements[4]->sort="1";
$elements[4]->header="Timestamp Received";
$elements[4]->alias="timestamp_receive";

$elements[5]=new stdClass();
$elements[5]->field="`webapp_notificationuser`.`notification`";
$elements[5]->sort="1";
$elements[5]->header="notificationid";
$elements[5]->alias="notificationid";
$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
$maxrow=20;
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `webapp_notificationuser` LEFT OUTER JOIN `webapp_notification` ON `webapp_notification`.`id`=`webapp_notificationuser`.`notification` LEFT OUTER JOIN `user` ON `user`.`id`=`webapp_notificationuser`.`user`","WHERE `webapp_notificationuser`.`notification`='$id'");
$this->load->view("json",$data);
}

public function createNotificationUser()
{
$access=array("1");
$this->checkAccess($access);
$data["page"]="createNotificationUser";
$data["page2"]="block/notificationblock";
$data["before1"]=$this->input->get('id');
$data["before2"]=$this->input->get('id');
$data["notification"]=$this->User_Model->getNotificationDropDown();
$data["title"]="Create Notification User";
$data[ 'notification' ] =$this->User_Model->getNotificationDropDown();
$data[ 'user' ] =$this->User_Model->getUserDropDown();
$this->load->view("templatewith2",$data);
}
public function createNotificationUserSubmit()
{
$access=array("1");
$this->checkAccess($access);
$this->form_validation->set_rules("notification","Notification","trim");
$this->form_validation->set_rules("user","User","trim");
$this->form_validation->set_rules("timestamp","Timestamp","trim");
$this->form_validation->set_rules("timestamp_receive","Timestamp Received","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["notification"]=$this->User_Model->getNotificationDropDown();
$data["page"]="createNotificationUser";
$data[ 'notification' ] =$this->User_Model->getNotificationDropDown();
$data[ 'user' ] =$this->User_Model->getUserDropDown();
$data["title"]="Create Notification User";
$this->load->view("template",$data);
}
else
{
$notification=$this->input->get_post("notification");
$user=$this->input->get_post("user");
$timestamp=$this->input->get_post("timestamp");
$timestamp_receive=$this->input->get_post("timestamp_receive");
if($this->NotificationUser_Model->create($notification,$user,$timestamp,$timestamp_receive)==0)
$data["alerterror"]="New Notificationuser could not be created.";
else
$data["alertsuccess"]="Notificationuser created Successfully.";
$data["redirect"]="site/viewNotificationUser?id=".$notification;
$this->load->view("redirect2",$data);
}
}
public function editNotificationUser()
{
$access=array("1");
$this->checkAccess($access);
$data["page"]="editNotificationUser";
$data["page2"]="block/notificationblock";
$data["before1"]=$this->input->get('notificationid');
$data["before2"]=$this->input->get('notificationid');
$data["notification"]=$this->User_Model->getNotificationDropDown();
$data[ 'notification' ] =$this->User_Model->getNotificationDropDown();
$data[ 'user' ] =$this->User_Model->getUserDropDown();
$data["title"]="Edit Notification User";
$data["before"]=$this->NotificationUser_Model->beforeEdit($this->input->get("id"));
$this->load->view("templatewith2",$data);
}
public function editNotificationUserSubmit()
{
$access=array("1");
$this->checkAccess($access);
$this->form_validation->set_rules("id","ID","trim");
$this->form_validation->set_rules("notification","Notification","trim");
$this->form_validation->set_rules("user","User","trim");
$this->form_validation->set_rules("timestamp","Timestamp","trim");
$this->form_validation->set_rules("timestamp_receive","Timestamp Received","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["notification"]=$this->User_Model->getNotificationDropDown();
$data[ 'notification' ] =$this->User_Model->getNotificationDropDown();
$data[ 'user' ] =$this->User_Model->getUserDropDown();
$data["page"]="editNotificationUser";
$data["title"]="Edit Notification User";
$data["before"]=$this->NotificationUser_Model->beforeEdit($this->input->get("id"));
$this->load->view("template",$data);
}
else
{
$id=$this->input->get_post("id");
$notification=$this->input->get_post("notification");
$user=$this->input->get_post("user");
$timestamp=$this->input->get_post("timestamp");
$timestamp_receive=$this->input->get_post("timestamp_receive");
if($this->NotificationUser_Model->edit($id,$notification,$user,$timestamp,$timestamp_receive)==0)
$data["alerterror"]="New notificationuser Could Not Be Updated.";
else
$data["alertsuccess"]="notificationuser Updated Successfully.";
$data["redirect"]="site/viewNotificationUser?id=".$notification;
$this->load->view("redirect2",$data);
}
}
public function deleteNotificationUser()
{
$access=array("1");
$this->checkAccess($access);
$this->NotificationUser_Model->delete($this->input->get("id"));
$data["redirect"]="site/viewNotificationUser?id=".$this->input->get('notificationid');
$this->load->view("redirect2",$data);
}
public function viewBlog()
{
$access=array("1");
$this->checkAccess($access);
$data["page"]="viewBlog";
$data["base_url"]=site_url("site/viewBlogJson");
$data["title"]="View Blog";
$this->load->view("template",$data);
}
function viewBlogJson()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`webapp_blog`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";
$elements[1]=new stdClass();
$elements[1]->field="`webapp_blog`.`content`";
$elements[1]->sort="1";
$elements[1]->header="content";
$elements[1]->alias="content";
$elements[2]=new stdClass();
$elements[2]->field="`webapp_blog`.`title`";
$elements[2]->sort="1";
$elements[2]->header="Title";
$elements[2]->alias="title";
$elements[3]=new stdClass();
$elements[3]->field="`webapp_blog`.`json`";
$elements[3]->sort="1";
$elements[3]->header="Json";
$elements[3]->alias="json";

$elements[5]=new stdClass();
$elements[5]->field="DATE_FORMAT(`webapp_blog`.`timestamp`,'%a, %b %d %Y %h:%i %p')";
$elements[5]->sort="1";
$elements[5]->header="Timestamp";
$elements[5]->alias="timestamp";
$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
$maxrow=20;
}
if($orderby=="")
{
$orderby="id";
$orderorder="DESC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `webapp_blog`");
$this->load->view("json",$data);
}

public function createBlog()
{
$access=array("1");
$this->checkAccess($access);
$data["page"]="createBlog";
$data["activemenu"]="blogs";
$data["title"]="Create Blog";
$this->load->view("template",$data);
}
public function createBlogSubmit()
{
$access=array("1");
$this->checkAccess($access);
$this->form_validation->set_rules("name","Name","trim");
$this->form_validation->set_rules("title","Title","trim");
$this->form_validation->set_rules("json","Json","trim");
$this->form_validation->set_rules("content","Content","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="createBlog";
$data["title"]="Create Blog";
$this->load->view("template",$data);
}
else
{
$title=$this->input->get_post("title");
$json=$this->input->get_post("json");
$content=$this->input->get_post("content");
$url=$this->input->get_post("url");
     $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];

                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
                $config_r['maintain_ratio'] = TRUE;
                $config_t['create_thumb'] = FALSE;///add this
                $config_r['width']   = 800;
                $config_r['height'] = 800;
                $config_r['quality']    = 100;
                //end of configs

                $this->load->library('image_lib', $config_r);
                $this->image_lib->initialize($config_r);
                if(!$this->image_lib->resize())
                {
                    $data['alerterror']="Failed." . $this->image_lib->display_errors();
                    //return false;
                }
                else
                {
                    //print_r($this->image_lib->dest_image);
                    //dest_image
                    $image=$this->image_lib->dest_image;
                    //return false;
                }

			}
if($this->Blog_Model->create($title,$json,$content,$url,$image)==0)
$data["alerterror"]="New blog could not be created.";
else
$data["alertsuccess"]="blog created Successfully.";
$data["redirect"]="site/viewBlog";
$this->load->view("redirect",$data);
}
}
public function editBlog()
{
$access=array("1");
$this->checkAccess($access);
$data["page"]="editBlog";
$data["activemenu"]="blogs";
//$data["page2"]="block/blogblock";
$data["before1"]=$this->input->get('id');
$data["before2"]=$this->input->get('id');
$data["before3"]=$this->input->get('id');
$data["title"]="Edit Blog";
$data["before"]=$this->Blog_Model->beforeEdit($this->input->get("id"));
$this->load->view("template",$data);
}
public function editBlogSubmit()
{
$access=array("1");
$this->checkAccess($access);
$this->form_validation->set_rules("id","ID","trim");
$this->form_validation->set_rules("name","Name","trim");
$this->form_validation->set_rules("title","Title","trim");
$this->form_validation->set_rules("json","Json","trim");
$this->form_validation->set_rules("content","Content","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="editBlog";
$data["title"]="Edit Blog";
$data["before"]=$this->Blog_Model->beforeEdit($this->input->get("id"));
$this->load->view("template",$data);
}
else
{
$id=$this->input->get_post("id");
$title=$this->input->get_post("title");
$json=$this->input->get_post("json");
$content=$this->input->get_post("content");
      $timestamp=$this->input->get_post("timestamp");
    $url=$this->input->get_post("url");
    $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];

                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
                $config_r['maintain_ratio'] = TRUE;
                $config_t['create_thumb'] = FALSE;///add this
                $config_r['width']   = 800;
                $config_r['height'] = 800;
                $config_r['quality']    = 100;
                //end of configs

                $this->load->library('image_lib', $config_r);
                $this->image_lib->initialize($config_r);
                if(!$this->image_lib->resize())
                {
                   $data['alerterror']="Failed." . $this->image_lib->display_errors();
                    //return false;
                }
                else
                {
                    //print_r($this->image_lib->dest_image);
                    //dest_image
                    $image=$this->image_lib->dest_image;
                    //return false;
                }

			}

            if($image=="")
            {
            $image=$this->Blog_Model->getImageById($id);
               // print_r($image);
                $image=$image->image;
            }

if($this->Blog_Model->edit($id,$title,$json,$content,$timestamp,$url,$image)==0)
$data["alerterror"]="New blog Could Not Be Updated.";
else
$data["alertsuccess"]="blog Updated Successfully.";
$data["redirect"]="site/viewBlog";
$this->load->view("redirect",$data);
}
}
public function deleteBlog()
{
$access=array("1");
$this->checkAccess($access);
$this->Blog_Model->delete($this->input->get("id"));
$data["redirect"]="site/viewBlog";
$this->load->view("redirect",$data);
}
public function viewBlogVideo()
{
$access=array("1");
$this->checkAccess($access);
$data["page"]="viewBlogVideo";
$data["page2"]="block/blogblock";
$data["before1"]=$this->input->get('id');
$data["before2"]=$this->input->get('id');
$data["before3"]=$this->input->get('id');
$data["base_url"]=site_url("site/viewBlogVideoJson?id=").$this->input->get('id');
$data["title"]="View Blog Videos";
$this->load->view("templatewith2",$data);
}
function viewBlogVideoJson()
{
    $id=$this->input->get('id');
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`webapp_blogvideo`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";
$elements[1]=new stdClass();
$elements[1]->field="`webapp_blog`.`title`";
$elements[1]->sort="1";
$elements[1]->header="Blog";
$elements[1]->alias="blog";
$elements[2]=new stdClass();
$elements[2]->field="`statuses`.`name`";
$elements[2]->sort="1";
$elements[2]->header="Status";
$elements[2]->alias="status";
$elements[3]=new stdClass();
$elements[3]->field="`webapp_blogvideo`.`order`";
$elements[3]->sort="1";
$elements[3]->header="Order";
$elements[3]->alias="order";
$elements[4]=new stdClass();
$elements[4]->field="`webapp_blogvideo`.`video`";
$elements[4]->sort="1";
$elements[4]->header="Video";
$elements[4]->alias="video";

$elements[5]=new stdClass();
$elements[5]->field="`webapp_blogvideo`.`blog`";
$elements[5]->sort="1";
$elements[5]->header="blogid";
$elements[5]->alias="blogid";
$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
$maxrow=20;
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `webapp_blogvideo` LEFT OUTER JOIN `statuses` ON `statuses`.`id`=`webapp_blogvideo`.`status` LEFT OUTER JOIN `webapp_blog` ON `webapp_blog`.`id`=`webapp_blogvideo`.`blog`","WHERE `webapp_blogvideo`.`blog`='$id'");
$this->load->view("json",$data);
}

public function createBlogVideo()
{
$access=array("1");
$this->checkAccess($access);
$data["page"]="createBlogVideo";
$data["page2"]="block/blogblock";
$data["before1"]=$this->input->get('id');
$data["before2"]=$this->input->get('id');
$data["before3"]=$this->input->get('id');
$data[ 'blog' ] =$this->User_Model->getBlogDropDown();
$data[ 'status' ] =$this->User_Model->getStatusDropDown();
$data["title"]="Create Blog Video";
$this->load->view("templatewith2",$data);
}
public function createBlogVideoSubmit()
{
$access=array("1");
$this->checkAccess($access);
$this->form_validation->set_rules("blog","Blog","trim");
$this->form_validation->set_rules("status","Status","trim");
$this->form_validation->set_rules("order","Order","trim");
$this->form_validation->set_rules("video","Video","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data[ 'blog' ] =$this->User_Model->getBlogDropDown();
$data["page"]="createBlogVideo";
$data[ 'status' ] =$this->User_Model->getStatusDropDown();
$data["title"]="Create Blog Video";
$this->load->view("template",$data);
}
else
{
$blog=$this->input->get_post("blog");
$status=$this->input->get_post("status");
$order=$this->input->get_post("order");
$video=$this->input->get_post("video");
if($this->BlogVideo_Model->create($blog,$status,$order,$video)==0)
$data["alerterror"]="New blogvideo could not be created.";
else
$data["alertsuccess"]="blogvideo created Successfully.";
$data["redirect"]="site/viewBlogVideo?id=".$blog;
$this->load->view("redirect",$data);
}
}
public function editBlogVideo()
{
$access=array("1");
$this->checkAccess($access);
$data["page"]="editBlogVideo";
$data["page2"]="block/blogblock";
$data["before1"]=$this->input->get('id');
$data["before2"]=$this->input->get('id');
$data["before3"]=$this->input->get('id');
$data[ 'status' ] =$this->User_Model->getStatusDropDown();
$data[ 'blog' ] =$this->User_Model->getBlogDropDown();
$data["title"]="Edit Blog Video";
$data["before"]=$this->BlogVideo_Model->beforeEdit($this->input->get("id"));
$this->load->view("templatewith2",$data);
}
public function editBlogVideoSubmit()
{
$access=array("1");
$this->checkAccess($access);
$this->form_validation->set_rules("id","ID","trim");
$this->form_validation->set_rules("blog","Blog","trim");
$this->form_validation->set_rules("status","Status","trim");
$this->form_validation->set_rules("order","Order","trim");
$this->form_validation->set_rules("video","Video","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="editBlogVideo";
$data[ 'status' ] =$this->User_Model->getStatusDropDown();
$data[ 'blog' ] =$this->User_Model->getBlogDropDown();
$data["title"]="Edit Blog Video";
$data["before"]=$this->BlogVideo_Model->beforeEdit($this->input->get("id"));
$this->load->view("template",$data);
}
else
{
$id=$this->input->get_post("id");
$blog=$this->input->get_post("blog");
$status=$this->input->get_post("status");
$order=$this->input->get_post("order");
$video=$this->input->get_post("video");
if($this->BlogVideo_Model->edit($id,$blog,$status,$order,$video)==0)
$data["alerterror"]="New blogvideo Could Not Be Updated.";
else
$data["alertsuccess"]="blogvideo Updated Successfully.";
$data["redirect"]="site/viewBlogVideo?id=".$blog;
$this->load->view("redirect2",$data);
}
}
public function deleteBlogVideo()
{
$access=array("1");
$this->checkAccess($access);
$this->BlogVideo_Model->delete($this->input->get("id"));
$data["redirect"]="site/viewBlogVideo?id=".$this->input->get('blogid');
$this->load->view("redirect2",$data);
}
public function viewBlogImages()
{
$access=array("1");
$this->checkAccess($access);
$data["page"]="viewBlogImages";
$data["page2"]="block/blogblock";
$data["before1"]=$this->input->get('id');
$data["before2"]=$this->input->get('id');
$data["before3"]=$this->input->get('id');
$data["base_url"]=site_url("site/viewBlogImagesJson?id=").$this->input->get('id');
$data["title"]="View Blog Images";
$this->load->view("templatewith2",$data);
}
function viewBlogImagesJson()
{
    $id=$this->input->get('id');
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`webapp_blogimages`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";
$elements[1]=new stdClass();
$elements[1]->field="`webapp_blog`.`title`";
$elements[1]->sort="1";
$elements[1]->header="Blog";
$elements[1]->alias="blog";
$elements[2]=new stdClass();
$elements[2]->field="`statuses`.`name`";
$elements[2]->sort="1";
$elements[2]->header="Status";
$elements[2]->alias="status";
$elements[3]=new stdClass();
$elements[3]->field="`webapp_blogimages`.`order`";
$elements[3]->sort="1";
$elements[3]->header="Order";
$elements[3]->alias="order";
$elements[4]=new stdClass();
$elements[4]->field="`webapp_blogimages`.`image`";
$elements[4]->sort="1";
$elements[4]->header="Image";
$elements[4]->alias="image";
$elements[5]=new stdClass();
$elements[5]->field="`webapp_blogimages`.`blog`";
$elements[5]->sort="1";
$elements[5]->header="blogid";
$elements[5]->alias="blogid";
$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
$maxrow=20;
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `webapp_blogimages` LEFT OUTER JOIN `statuses` ON `statuses`.`id`=`webapp_blogimages`.`status` LEFT OUTER JOIN `webapp_blog` ON `webapp_blog`.`id`=`webapp_blogimages`.`blog`","WHERE `webapp_blogimages`.`blog`='$id'");
$this->load->view("json",$data);
}

public function createBlogImages()
{
$access=array("1");
$this->checkAccess($access);
$data["page"]="createBlogImages";
$data["page2"]="block/blogblock";
$data["before1"]=$this->input->get('id');
$data["before2"]=$this->input->get('id');
$data["before3"]=$this->input->get('id');
$data[ 'status' ] =$this->User_Model->getStatusDropDown();
$data[ 'blog' ] =$this->User_Model->getBlogDropDown();
$data["title"]="Create Blog Image";
$this->load->view("templatewith2",$data);
}
public function createBlogImagesSubmit()
{
$access=array("1");
$this->checkAccess($access);
$this->form_validation->set_rules("blog","ID","trim");
$this->form_validation->set_rules("status","Status","trim");
$this->form_validation->set_rules("order","Order","trim");
$this->form_validation->set_rules("image","Image","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="createBlogImages";
$data[ 'status' ] =$this->User_Model->getStatusDropDown();
$data[ 'blog' ] =$this->User_Model->getBlogDropDown();
$data["title"]="Create Blog Image";
$this->load->view("template",$data);
}
else
{
$blog=$this->input->get_post("blog");
$status=$this->input->get_post("status");
$order=$this->input->get_post("order");
//$image=$this->input->get_post("image");
       $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];

                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
                $config_r['maintain_ratio'] = TRUE;
                $config_t['create_thumb'] = FALSE;///add this
                $config_r['width']   = 800;
                $config_r['height'] = 800;
                $config_r['quality']    = 100;
                //end of configs

                $this->load->library('image_lib', $config_r);
                $this->image_lib->initialize($config_r);
                if(!$this->image_lib->resize())
                {
                   $data['alerterror']="Failed." . $this->image_lib->display_errors();
                    //return false;
                }
                else
                {
                    //print_r($this->image_lib->dest_image);
                    //dest_image
                    $image=$this->image_lib->dest_image;
                    //return false;
                }

			}
if($this->BlogImages_Model->create($blog,$status,$order,$image)==0)
$data["alerterror"]="New blogimages could not be created.";
else
$data["alertsuccess"]="blogimages created Successfully.";
$data["redirect"]="site/viewBlogImages?id=".$blog;
$this->load->view("redirect2",$data);
}
}
public function editBlogImages()
{
$access=array("1");
$this->checkAccess($access);
$data["page"]="editBlogImages";
$data["page2"]="block/blogblock";
$data["before1"]=$this->input->get('id');
$data["before2"]=$this->input->get('id');
$data["before3"]=$this->input->get('id');
$data[ 'status' ] =$this->User_Model->getStatusDropDown();
$data[ 'blog' ] =$this->User_Model->getBlogDropDown();
$data["title"]="Edit Blog Image";
$data["before"]=$this->BlogImages_Model->beforeEdit($this->input->get("id"));
$this->load->view("templatewith2",$data);
}
public function editBlogImagesSubmit()
{
$access=array("1");
$this->checkAccess($access);
$this->form_validation->set_rules("id","ID","trim");
$this->form_validation->set_rules("blog","ID","trim");
$this->form_validation->set_rules("status","Status","trim");
$this->form_validation->set_rules("order","Order","trim");
$this->form_validation->set_rules("image","Image","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="editBlogImages";
$data[ 'status' ] =$this->User_Model->getStatusDropDown();
$data[ 'blog' ] =$this->User_Model->getBlogDropDown();
$data["title"]="Edit Blog Image";
$data["before"]=$this->BlogImages_Model->beforeEdit($this->input->get("id"));
$this->load->view("template",$data);
}
else
{
$id=$this->input->get_post("id");
$blog=$this->input->get_post("blog");
$status=$this->input->get_post("status");
$order=$this->input->get_post("order");
//$image=$this->input->get_post("image");
      $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];

                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
                $config_r['maintain_ratio'] = TRUE;
                $config_t['create_thumb'] = FALSE;///add this
                $config_r['width']   = 800;
                $config_r['height'] = 800;
                $config_r['quality']    = 100;
                //end of configs

                $this->load->library('image_lib', $config_r);
                $this->image_lib->initialize($config_r);
                if(!$this->image_lib->resize())
                {
                    $data['alerterror']="Failed." . $this->image_lib->display_errors();
                    //return false;
                }
                else
                {
                    //print_r($this->image_lib->dest_image);
                    //dest_image
                    $image=$this->image_lib->dest_image;
                    //return false;
                }

			}

            if($image=="")
            {
            $image=$this->User_Model->getBlogImageById($id);
               // print_r($image);
                $image=$image->image;
            }

if($this->BlogImages_Model->edit($id,$blog,$status,$order,$image)==0)
$data["alerterror"]="New blogimages Could Not Be Updated.";
else
$data["alertsuccess"]="blogimages Updated Successfully.";
$data["redirect"]="site/viewBlogImages?id=".$blog;
$this->load->view("redirect2",$data);
}
}
public function deleteBlogImages()
{
$access=array("1");
$this->checkAccess($access);
$this->BlogImages_Model->delete($this->input->get("id"));
$data["redirect"]="site/viewBlogImages?id=".$this->input->get('blogid');
$this->load->view("redirect2",$data);
}



    // slider




    public function viewSlider()
{
$access=array("1");
$this->checkAccess($access);
$data["page"]="viewSlider";
$data["base_url"]=site_url("site/viewSliderJson");
$data["title"]="View Sliders";
$this->load->view("template",$data);
}
function viewSliderJson()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`slider`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";
$elements[1]=new stdClass();
$elements[1]->field="`slider`.`alt`";
$elements[1]->sort="1";
$elements[1]->header="Alt";
$elements[1]->alias="alt";
$elements[2]=new stdClass();
$elements[2]->field="`statuses`.`name`";
$elements[2]->sort="1";
$elements[2]->header="Status";
$elements[2]->alias="status";
$elements[3]=new stdClass();
$elements[3]->field="`slider`.`order`";
$elements[3]->sort="1";
$elements[3]->header="Order";
$elements[3]->alias="order";
$elements[4]=new stdClass();
$elements[4]->field="`slider`.`image`";
$elements[4]->sort="1";
$elements[4]->header="Image";
$elements[4]->alias="image";
$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
$maxrow=20;
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `slider` LEFT OUTER JOIN `statuses` ON `statuses`.`id`=`slider`.`status`");
$this->load->view("json",$data);
}

public function createSlider()
{
$access=array("1");
$this->checkAccess($access);
$data["page"]="createSlider";
$data["activemenu"]="home slides";
$data[ 'status' ] =$this->User_Model->getStatusDropDown();
$data["title"]="Create Slider";
$this->load->view("template",$data);
}
public function createSliderSubmit()
{
$access=array("1");
$this->checkAccess($access);
$this->form_validation->set_rules("blog","ID","trim");
$this->form_validation->set_rules("status","Status","trim");
$this->form_validation->set_rules("order","Order","trim");
$this->form_validation->set_rules("image","Image","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="createSlider";
$data[ 'status' ] =$this->User_Model->getStatusDropDown();
$data["title"]="Create Slider";
$this->load->view("template",$data);
}
else
{
$alt=$this->input->get_post("alt");
$status=$this->input->get_post("status");
$order=$this->input->get_post("order");
//$image=$this->input->get_post("image");
      $config['upload_path'] = './uploads/';
						$config['allowed_types'] = 'gif|jpg|png|jpeg';
						$this->load->library('upload', $config);
						$filename="image";
						$image="";
						if (  $this->upload->do_upload($filename))
						{
							$uploaddata = $this->upload->data();
							$image=$uploaddata['file_name'];
						}
if($this->Slider_Model->create($alt,$status,$order,$image)==0)
$data["alerterror"]="New slider could not be created.";
else
$data["alertsuccess"]="slider created Successfully.";
$data["redirect"]="site/viewSlider";
$this->load->view("redirect",$data);
}
}
public function editSlider()
{
$access=array("1");
$this->checkAccess($access);
$data["page"]="editSlider";
$data["activemenu"]="home slides";
$data[ 'status' ] =$this->User_Model->getStatusDropDown();
$data["title"]="Edit Slider";
$data["before"]=$this->Slider_Model->beforeEdit($this->input->get("id"));
$this->load->view("template",$data);
}
public function editSliderSubmit()
{
$access=array("1");
$this->checkAccess($access);
$this->form_validation->set_rules("id","ID","trim");
$this->form_validation->set_rules("blog","ID","trim");
$this->form_validation->set_rules("status","Status","trim");
$this->form_validation->set_rules("order","Order","trim");
$this->form_validation->set_rules("image","Image","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="editSlider";
$data[ 'status' ] =$this->User_Model->getStatusDropDown();
$data["title"]="Edit slider";
$data["before"]=$this->Slider_Model->beforeEdit($this->input->get("id"));
$this->load->view("template",$data);
}
else
{
$id=$this->input->get_post("id");
$alt=$this->input->get_post("alt");
$status=$this->input->get_post("status");
$order=$this->input->get_post("order");
//$image=$this->input->get_post("image");
   				   $config['upload_path'] = './uploads/';
						$config['allowed_types'] = 'gif|jpg|png|jpeg';
						$this->load->library('upload', $config);
						$filename="image";
						$image="";
						if (  $this->upload->do_upload($filename))
						{
							$uploaddata = $this->upload->data();
							$image=$uploaddata['file_name'];
						}

						if($image=="")
						{
						$image=$this->Slider_Model->getImageById($id);
						   // print_r($image);
							$image=$image->image;
						}
if($this->Slider_Model->edit($id,$alt,$status,$order,$image)==0)
$data["alerterror"]="New slider Could Not Be Updated.";
else
$data["alertsuccess"]="slider Updated Successfully.";
$data["redirect"]="site/viewSlider";
$this->load->view("redirect",$data);
}
}
public function deleteSlider()
{
$access=array("1");
$this->checkAccess($access);
$this->Slider_Model->delete($this->input->get("id"));
$data["redirect"]="site/viewSlider";
$this->load->view("redirect",$data);
}

// CONFIG CRUDE STARTS

public function viewConfig()
{
$access=array("1");
$this->checkAccess($access);
$data["page"]="viewConfig";
$data["base_url"]=site_url("site/viewConfigJson");
$data["title"]="View Config";
$this->load->view("template",$data);
}
function viewConfigJson()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`config`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";
$elements[2]->field="`config`.`title`";
$elements[2]->sort="1";
$elements[2]->header="Title";
$elements[2]->alias="title";
$elements[3]=new stdClass();
$elements[3]->field="`config`.`text`";
$elements[3]->sort="1";
$elements[3]->header="text";
$elements[3]->alias="text";
$elements[4]=new stdClass();
$elements[4]->field="`config`.`type`";
$elements[4]->sort="1";
$elements[4]->header="type";
$elements[4]->alias="type";

$elements[5]=new stdClass();
$elements[5]->field="`config`.`content`";
$elements[5]->sort="1";
$elements[5]->header="Description";
$elements[5]->alias="content";
$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
$maxrow=20;
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `config`");
$this->load->view("json",$data);
}

public function createConfig()
{
$access=array("1");
$this->checkAccess($access);
$data["page"]="createConfig";
$data[ 'type' ] =$this->User_Model->getTypeDropDown();
$data["title"]="Create Config";
$this->load->view("template",$data);
}
public function createConfigSubmit()
{
$access=array("1");
$this->checkAccess($access);
$this->form_validation->set_rules("status","Status","trim");
$this->form_validation->set_rules("title","Title","trim");
$this->form_validation->set_rules("timestamp","Timestamp","trim");
$this->form_validation->set_rules("content","Content","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="createConfig";
$data[ 'type' ] =$this->User_Model->getTypeDropDown();
$data["title"]="Create Config";
$this->load->view("template",$data);
}
else
{
$text=$this->input->get_post("text");
$title=$this->input->get_post("title");
$type=$this->input->get_post("type");
$content=$this->input->get_post("content");
if($this->Config_Model->create($title,$content,$text,$type)==0)
$data["alerterror"]="New config could not be created.";
else
$data["alertsuccess"]="config created Successfully.";
$data["redirect"]="site/viewConfig";
$this->load->view("redirect",$data);
}
}
public function editConfig()
{
    $access=array("1");
    $this->checkAccess($access);
    $id=$this->input->get('id');
    $type=$id;
//    $type=$this->Config_Model->getEditPage($id);
    switch($type)
    {
        case 1: {
            $data["page"]="editConfigText";
            $data["title"]="Edit Config";
        }
            break;
        case 2: {
            $data["page"]="editConfigImage";
            $data["title"]="Edit Config Image";
        }
            break;
        case 3: {
            $data["page"]="dropdown";
            $data["title"]="Drop Down";
        }
            break;
        case 4: {
            $data["page"]="login";
            $data["title"]="Login";
        }
            break;
        case 5: {
            $data["page"]="blog";
            $data["title"]="Blog";
        }
            break;
        case 6: {
            $data["page"]="gallery";
            $data["title"]="Gallery";
        }
            break;
        case 7: {
            $data["page"]="videogallery";
            $data["title"]="Video Gallery";
        }
            break;
        case 8: {
            $data["page"]="configevents";
            $data["title"]="Config Events";
        }
            break;
        case 9: {
            $data["page"]="logo";
            $data["title"]="Logo";
        }
            break;
        case 10: {
            $data["page"]="backgroundimage";
            $data["title"]="Background Image";
        }
            break;

        case 11: {
            $data["page"]="banner";
            $data["title"]="Banner";
        }
            break;
        case 12: {
            $data["page"]="socialfeeds";
            $data["title"]="Social Feeds";
        }
            break;
        case 13: {
            $data["page"]="editConfig";
            $data["title"]="Notification";
        }
            break;
        case 14: {
            $data["page"]="editConfigText";
            $data["title"]="Color";
        }
            break;
        case 15: {
            $data["page"]="editConfigText";
            $data["title"]="Meta Keyword";
        }
            break;
        case 16: {
            $data["page"]="editConfigText";
            $data["title"]="Meta Decription";
        }
            break;
    }
    $data[ 'type' ] =$this->User_Model->getTypeDropDown();
    $data[ 'activemenu' ] ="config";
    $data["before"]=$this->Config_Model->beforeEdit($this->input->get("id"));
    $this->load->view("templateconfig",$data);
}
public function editConfigSubmit()
{
    $access=array("1");
    $this->checkAccess($access);
    $id=$this->input->get_post("id");
    $text=$this->input->get_post("text");
    $title=$this->input->get_post("title");
    $type=$this->input->get_post("type");
    $content=$this->input->get_post("content");
    $description=$this->input->get_post("description");
    $newtext = json_decode($text);
	//update hauth

	$urlforcontrollertest=$_SERVER["SCRIPT_FILENAME"];
        $urlforcontrollertest=substr($urlforcontrollertest,0,-9);
        $urlcontrollertest=$urlforcontrollertest.'application/config/hybridauthlib.php';


	for($i = 0 ; $i < sizeOf($newtext) ; $i++){
		$comp = $newtext[$i]->name;
		switch($comp){
			case "Google" : {
				$controllerfile=read_file($urlcontrollertest);
				$mnutext = explode("//google",$controllerfile);
				$googletext = "'Google' => array (
				'enabled' => true,
				'keys'    => array ( 'id' => '".$newtext[$i]->appid."', 'secret' => '".$newtext[$i]->secret."' )
			),";
				$googletext = $mnutext[0]."//google\n".$googletext."//google".$mnutext[2];
				if(write_file($urlforcontrollertest.'application/config/hybridauthlib.php', $googletext)){

	}
			}
			break;
			case "Facebook" : {
				$controllerfile=read_file($urlcontrollertest);
				$mnutext = explode("//facebook",$controllerfile);
				$googletext = "'Facebook' => array (
				'enabled' => true,
				'keys'    => array ( 'id' => '".$newtext[$i]->appid."', 'secret' => '".$newtext[$i]->secret."' ),
                'scope'   => 'email, user_about_me, user_birthday, user_hometown, user_website,publish_actions'
			),";
				$googletext = $mnutext[0]."//facebook\n".$googletext."\n//facebook".$mnutext[2];
				if(write_file($urlforcontrollertest.'application/config/hybridauthlib.php', $googletext)){

	}
			}
			break;
			case "twitter" : {
				$controllerfile=read_file($urlcontrollertest);
				$mnutext = explode("//twitter",$controllerfile);
				$googletext = "'Twitter' => array (
				'enabled' => true,
				'keys'    => array ( 'key' => '".$newtext[$i]->appid."', 'secret' =>'".$newtext[$i]->secret."' )
			),";
				$googletext = $mnutext[0]."//twitter\n".$googletext."\n//twitter".$mnutext[2];
				if(write_file($urlforcontrollertest.'application/config/hybridauthlib.php', $googletext)){

	}
			}
			break;
			case "instagram" : {
				$controllerfile=read_file($urlcontrollertest);
				$mnutext = explode("//instagram",$controllerfile);
				$googletext = "'Instagram' => array (
				'enabled' => true,
				'keys'    => array ( 'id' => '".$newtext[$i]->appid."', 'secret' => '".$newtext[$i]->secret."' )
			),";
				$googletext = $mnutext[0]."//instagram\n".$googletext."\n//instagram".$mnutext[2];
				if(write_file($urlforcontrollertest.'application/config/hybridauthlib.php', $googletext)){

	}
			}
			break;
			default:{

			}

		}


	}
    $preimage=$this->Config_Model->getpemById();
    $config['upload_path'] = './config/';
    $config['allowed_types'] = '*';
    $this->load->library('upload', $config);
    $filename="image";
    $image="";
    if (  $this->upload->do_upload($filename))
    {
        $uploaddata = $this->upload->data();
        $image=$uploaddata['file_name'];
    }
    else {
        $image=$preimage;
    if($this->Config_Model->edit($id,$title,$content,$text,$image,$type,$description)==0)
    $data["alerterror"]="New config Could Not Be Updated.";
    else
    $data["alertsuccess"]="config Updated Successfully.";
    $data["redirect"]="site/viewConfig";
    $this->load->view("redirect",$data);
    }
    if($this->Config_Model->edit($id,$title,$content,$text,$image,$type,$description)==0)
    $data["alerterror"]="New config Could Not Be Updated.";
    else
    $data["alertsuccess"]="config Updated Successfully.";
    $data["redirect"]="site/viewConfig";
    $this->load->view("redirect",$data);
}
public function deleteConfig()
{
$access=array("1");
$this->checkAccess($access);
$this->Config_Model->delete($this->input->get("id"));
$data["redirect"]="site/viewConfig";
$this->load->view("redirect",$data);
}


//CONFIG CRUDE END


    //HOME


    public function editHome()
{
$access=array("1");
$this->checkAccess($access);
$data["page"]="editHome";
$data["title"]="Edit Home";
$data["before"]=$this->Slider_Model->beforeEditHome("1");
$this->load->view("template",$data);
}
public function editHomeSubmit()
{
$access=array("1");
$this->checkAccess($access);
$id=$this->input->get_post("id");
$content=$this->input->get_post("content");
if($this->Slider_Model->editHome($id,$content)==0)
$data["alerterror"]="New home Could Not Be Updated.";
else
$data["alertsuccess"]="home Updated Successfully.";
$data["redirect"]="site/editHome";
$this->load->view("redirect2",$data);

}
    // CLEAR IMAGE
    public function clearGalleryImage(){
    $id=$this->input->get_post("id");
    $this->Gallery_Model->clearGalleryImage($id);
    }
    public function clearGalleryImage1(){
    $id=$this->input->get_post("id");
    $this->GalleryImage_Model->clearGalleryImage1($id);
    }

    public function clearUserImage(){
    $id=$this->input->get_post("id");
    $this->User_Model->clearUserImage($id);
    }

    public function clearCoverImage(){
    $id=$this->input->get_post("id");
    $this->User_Model->clearCoverImage($id);
    }
    public function clearEventImage(){
    $id=$this->input->get_post("id");
    $this->Events_Model->clearEventImage($id);
    }
    public function clearArticleImage(){
    $id=$this->input->get_post("id");
    $this->Articles_Model->clearArticleImage($id);
    }
    public function clearEventImage1(){
    $id=$this->input->get_post("id");
    $this->EventImages_Model->clearEventImage1($id);
    }
    public function clearSliderImage(){
    $id=$this->input->get_post("id");
    $this->Slider_Model->clearSliderImage($id);
    }
    public function clearNotificationImage(){
    $id=$this->input->get_post("id");
    $this->Notification_Model->clearNotificationImage($id);
    }
    public function clearBlogImage(){
    $id=$this->input->get_post("id");
    $this->Blog_Model->clearBlogImage($id);
    }

}
?>
