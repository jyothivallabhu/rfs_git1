<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Main {

    public function __construct() {
        
    }

    public function __get($var) {
        return get_instance()->$var;
    }

 
	public function doctorCertificateTemplatesDropdownHTML($doctor_certificate_template_id = '', $class = "", $required = '0') {

        $this->db->select("id,title,type")->from('certificate_templates')->where('user_id', $this->session->userdata('infiniqo_master_user_id'));
		$result = $this->db->get();
        $certificate_templates = $result->result_array();

        $return = '';
        $return .= '<select class="form-control ' . $class . '"  id="doctor_certificate_template_id" name="doctor_certificate_template_id" ' . (($required) ? ' required="required" ' : '') . ' data-live-search="true" > ';
        $return .= '<option value="">Select a template</option>';
        foreach ($certificate_templates as $template) {
            $return .= '<option value="' . $template['id'] . '" ' . (($doctor_certificate_template_id == $template['id']) ? ' selected="selected"' : '') . ' data-tokens="' . $template['title'] . '"  > ' . $template['title'] .' ('.$template['type'].')</option>';
        }
        $return .= '</select> ';


        return $return;
    } 
	
	public function nursingCertificateTemplatesDropdownHTML($nursing_certificate_template_id = '', $class = "medium", $required = '0') {

        $this->db->select("id,title,type")->from('certificate_templates');
        $result = $this->db->get();
        $certificate_templates = $result->result_array();

        $return = '';
        $return .= '<select class="form-control  ' . $class . '"  id="nursing_certificate_template_id" name="nursing_certificate_template_id" ' . (($required) ? ' required="required" ' : '') . ' data-live-search="true" > ';
        $return .= '<option value="">Select a template</option>';
        foreach ($certificate_templates as $template) {
            $return .= '<option value="' . $template['id'] . '" ' . (($nursing_certificate_template_id == $template['id']) ? ' selected="selected"' : '') . ' data-tokens="' . $template['title'] . '"  > ' . $template['title'] .' ('.$template['type'].')</option>';
        }
        $return .= '</select> ';


        return $return;
    } 
	
	

}
