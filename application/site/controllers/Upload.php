<?php


// Upload class
class Upload extends CI_Controller
{
    //Load libraries in Constructor.
    public function __construct()
    {
        parent::__construct();
        $this->user_id = $_SESSION['login_session']['user_id'];
    }
    // index method
    public function index()
    {
        // phpinfo();
        // exit;
        $data['metaDescription'] = 'File Upload with Progress Bar using CodeIgniter, jQuery and Ajax';
        $data['metaKeywords'] = 'File Upload with Progress Bar using CodeIgniter, jQuery and Ajax';
        $data['title'] = "File Upload with Progress Bar using CodeIgniter, jQuery and Ajax | TechArise";
        $data['breadcrumbs'] = array('File Upload with Progress Bar using CodeIgniter, jQuery and Ajax  ' => '#');
        $this->load->view('upload/index', $data);
    }
    // Upload file/image method
    public function video()
    {
        $this->load->view('upload/video');
    }
     function upl()
    {
        print_r($_POST);
        $status = 0;
        $msg = '';
        $url = '';


        $_POST['added_by'] = $this->user_id;

      
        $json = array();
       
        $error = '';

      	$dfileTypes = array('pdf', 'doc', 'docx','mp4');
					$filetrgt = 'uploads/';
					
					$dparts = pathinfo($_FILES['final_artwork']['name']);
					$fname = explode('.', $_FILES['final_artwork']['name']);
					if (in_array(strtolower($dparts['extension']), $dfileTypes)) {
						$time = time();
					$filename = $time . '.' . $dparts['extension'];
						$file = $filetrgt . $filename;
						move_uploaded_file($_FILES['final_artwork']['tmp_name'], $file);
					   $_POST['final_artwork'] = $filename;

					
					
					} else {
						$msg[] = warning_msg($_FILES['final_artwork']['name'] . 'invalid form document attachment format, we accept only pdf,word files');
						
					}
					
					
					
					$demonstration_video =    $introduction_video = true;
        $json = ($demonstration_video and    $introduction_video) ? 'success' : 'failed';
        $result = 0;
        if ($json == 'success') {
            $_POST['added_by'] = $this->user_id;
            $result = $this->db->insert('lessons', $_POST);
        }

        // header('Content-Type: application/json');
        // echo json_encode($json);

        if ($result) {
            $status = 1;
            $msg = '<div class="alert alert-success"> <strong>Added Successfully</strong></div>';
            $url = base_url() . 'lessons/';
        } else {
            $msg = $error;
        }
        $res = array('status' => $json, 'msg' => $msg, 'url' => $url);
        // $res['cst']['cstn'] = $this->security->get_csrf_token_name();
        // $res['cst']['cstv'] = $this->security->get_csrf_hash();
        // $json = 'success';
        echo json_encode($res);
        exit;
    }
}
