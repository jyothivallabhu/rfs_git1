<?php 
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . '/third_party/mpdf/vendor/autoload.php';
class Pdf_generator{
    public function __construct() {
        
    }

    public function __get($var) {
        return get_instance()->$var;
    }
     
	public function generate_pdf($content, $title='', $name = 'download.pdf', $output_type = 'D', $header = null, $footer = null, $margin_top = 40, $margin_right = 10, $margin_bottom = 20, $margin_left = 10,  $orientation = 'P') { 
       
	   
		$defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
		$fontDirs = $defaultConfig['fontDir'];

		$defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
		$fontData = $defaultFontConfig['fontdata'];
		$pdf = new \Mpdf\Mpdf(['margin_header'=>0,'margin_footer'=>0, 'setAutoTopMargin' => 'stretch', 'margin_top'=>$margin_top, 'margin_bottom'=>$margin_bottom, 'margin_left'=>$margin_left, 'margin_right'=>$margin_right, 'orientation' => $orientation,'tableMinSizePriority' => true, 'mode' => 'utf-8', 
			'fontDir' => array_merge($fontDirs, [
				APPPATH . '../../assets/fonts/mpdf',
			]),
			'fontdata' => $fontData + [
				'frutiger' => [
					'R' => 'Frutiger-Normal.ttf',
					'I' => 'FrutigerObl-Normal.ttf',
				],
				'Open Sans' => [
					'R' => 'OpenSans-Regular.ttf',
					'B' => 'OpenSans-Bold.ttf',
					'I' => 'OpenSans-BoldItalic.ttf',
				],
				'sans-serif' => [
					'R' => 'microsoft-sans-serif.ttf',
					'B' => 'ms-reference-sans-serif.ttf'
				],
				'arial' => [
					'R' => 'arial.ttf',
					'B' => 'arialbd.ttf',
					'I' => 'ariali.ttf',
					'BI' => 'arialbi.ttf'
				]
				
			],
			'default_font' => 'arial'
		]);
		 
		
		//$pdf = new \Mpdf\Mpdf();
		$pdf->SetTitle($title);
		$pdf->SetHTMLHeader(trim($header));
		$pdf->SetHTMLFooter(trim($footer));
        // $pdf = new mPDF('utf-8', 'A4-' . $orientation, '13', '', 10, 10, $margin_top, $margin_bottom, 9, 9);
		$pdf->WriteHTML($content);
		if($output_type=='D'){
		    $pdf->Output( $name , $output_type);    
		}else{
		    return $pdf->Output( $name , $output_type);
		}
		
		return false;
    }
      
    public function print_arrays() {
        $args = func_get_args();
        echo "<pre>";
        foreach ($args as $arg) {
            print_r($arg);
        }
        echo "</pre>";
        die();
    }
	
    public function send_json($data) {
        header('Content-Type: application/json');
        die(json_encode($data));
        exit;
    }
  

}


?>