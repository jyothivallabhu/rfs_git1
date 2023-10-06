
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	
	function __Construct(){
		parent:: __Construct();
		$this->headerdata = $this->comm_fun->header_data();
		$this->uid = $this->session->userdata('rfsparent_user_id');
		$this->name = $this->session->userdata('rfsparent_user_first_name');
		$this->comm_fun->is_not_logged_in();
		$this->load->model('Children_model');
		$this->load->model('Artwork_model');
		
		$this->load->library('Ajax_pagination');
		$this->perPage = (isset($_POST['per_page']) && $_POST['per_page']>0)?$_POST['per_page']:10;
		$this->sorting = (isset($_POST['sorting']) && $_POST['sorting']!='')?$_POST['sorting']:'';
	}
	
	public function index(){
		
		$ary =array();	
		
		/*total rows count*/
		$res = $this->Artwork_model->getAllStudentArtWorks($ary);
		if($res){			
			$totalRec = count($res);
		}else{
			$totalRec=0;
		}
		/*pagination configuration*/
		$config['target']      = '#schoolsList';
		$config['base_url']    = base_url().'dashboard/ajaxPagination';
		$config['total_rows']  = $totalRec;
		$config['per_page']    = $this->perPage;
		$config['link_func']   = 'searchFilter';
		$this->ajax_pagination->initialize($config);
		$ary['limit']=$this->perPage;
		$ary['sorting']=$this->sorting;
		$posts = $this->Artwork_model->getAllStudentArtWorks($ary);
		/* echo $this->db->last_query();  */
		$data['pagination'] = $this->ajax_pagination->create_links();
		$data['showing_text'] = $this->ajax_pagination->showing_text;
		$data['artworks'] = $posts;	
		
		
		$data['childen'] =  $this->Children_model->getAllChildrenByParent($this->uid);
		/* $data['artworks'] =  $this->Artwork_model->getAllArtWorks($this->uid); */
		$data['academicyear'] = $this->Children_model->get_academicMaster();
		
		$data['main_content'] = 'dashboard';			
		$this->load->view('dash_template/body',$data);
	}
	
	function ajaxPagination(){
		
		
		
        $conditions = array();
		$page = $this->input->post('page');
        if(!$page){
            $offset = 0;
        }else{
            $offset = $page;
        }
		
        $conditions['search_text'] = $this->input->post('keyword');
        $conditions['sortby'] = $this->input->post('sortby');
        $conditions['perpage'] = $this->input->post('perpage');
        $conditions['status'] = $this->input->post('status');
        $conditions['student_id'] = $this->input->post('student_id');
        $conditions['academic_year'] = $this->input->post('academic_year');
        $conditions['c_id'] = $this->input->post('c_id');
        $conditions['lesson_id'] = $this->input->post('lesson_id');
        $conditions['request_from'] = $this->input->post('request_from');
        //total rows count
		$data = $this->Artwork_model->getAllStudentArtWorks($conditions);
		
        $totalRec = (!empty($data))?count($data):0;
		
        //pagination configuration
        $config['target']      = '#schoolsList';
        $config['base_url']    = base_url().'dashboard/ajaxPagination';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->input->post('perpage');
        $config['link_func']   = 'searchFilter';
        $this->ajax_pagination->initialize($config);
        
        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->input->post('perpage');
		$conditions['sorting']=$this->sorting;
		$artwork = $this->Artwork_model->getAllStudentArtWorks($conditions);
		$data['query'] = $this->db->last_query(); 
		
		
		
		$data['pagination'] = $this->ajax_pagination->create_links();
		$data['showing_text'] = $this->ajax_pagination->showing_text;
        
		$html ='';
		$i=0;
		if(!empty($artwork)){
			foreach($artwork as $key => $row){
				
				if($row->added_by == $this->uid){
					$del = '<a href="javascript:void(0);"  data-did="'.  $row->id  .'"  data-tbl="artwork" data-ctrl="artwork"  class="m-r-5 btn btn-icon btn-hover btn-rounded text-danger delete_class"><i class="anticon anticon-delete"></i></a>';
				}else{
					$del = '';
				}
				
		        $html .='<li class="col-2">
					
					<div class="artwork_card card bspHasModal" data-bsp-li-index="'.$i.'">
						<div class="imgWrapper">
							<img class="card-img-top img-responsive" src="'.base_url().$row->artwork_upload.'" alt="">
						</div>
					</div>
						
						<div class="card-body">
							<div class="m-t-20">
								<div class="text-center text-sm-left m-v-15 p-l-30">
									<p class="text-dark">'.$row->lesson_name.' </p>
								</div>
							</div>
							
							<div class="m-t-15 m-l-20">
							<a href="'. base_url('artwork/view/'.$row->id) .'" class="m-r-5 btn btn-icon btn-hover btn-rounded">
								    <i class="anticon anticon-eye"></i>
							</a>
							'.$del.'
							
							</div>
						  
						</div>
					</div>
					
				 </li>';
		$i++;
			}
		}else{
			$html .="No Records to display";
		}
		
		$data['html']=$html;
		echo json_encode($data);
    }
	
	
	
	
}