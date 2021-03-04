<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	function selected($a, $b)
	{
		return ($a == $b ? 'current' : '');
	}
	
	function limit_words($string, $word_limit = 35)
	{
		$words = explode(" ",$string);
		//echo count(array_keys($words));
		$result =  implode(" ",array_splice($words,0,$word_limit));
		if(count(array_keys($words)) > 1) $result .= ' ...';
		return $result;
	}
	
	function export_excel($filename, $query)
	{
		$ci =& get_instance();
        $ci->load->database(); 
		include('excel/PHPExcel.php');
        include('excel/PHPExcel/IOFactory.php');
 		$objPHPExcel = new PHPExcel();
        $objPHPExcel->getProperties()->setTitle($filename)->setDescription("none");
 
        $objPHPExcel->setActiveSheetIndex(0);
 
        // Field names in the first row
        $fields = $ci->db->list_fields($filename); 
        $col = 0;
		foreach ($fields as $field)
        {
            $objPHPExcel->getActiveSheet()->getStyle(1)->getFont()->setName('cambria');
			$objPHPExcel->getActiveSheet()->getStyle(1)->getFont()->setSize(11);
			$objPHPExcel->getActiveSheet()->getStyle(1)->getFont()->setBold(true);
			$objPHPExcel->getActiveSheet()->getRowDimension(1)->setRowHeight(20);
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, ucwords($field));
			$col++;
        }
 
        // Fetching the table data
        $row = 2;
        foreach($query as $data)
        {
            $col = 0;
            foreach ($fields as $field)
            {
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $data->$field);
				$col++;
            }
 
            $row++;
        }
 
        $objPHPExcel->setActiveSheetIndex(0);
		$objPHPExcel->getActiveSheet()->getCell('A1');
		
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
 
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$filename.'_'.date('dMy').'.xls"');
        header('Cache-Control: max-age=0');
 
        $objWriter->save('php://output');
		return;
	}
	
	function uploadFile($name)
	{
	  $allowed_filetypes = array('.pdf','.doc','.docx','.xls', '.xlxs', '.ppt');
      $max_filesize = 10737418240; // Maximum filesize in BYTES (currently 10MB).
      $upload_path = 'files/pdf/';
 
	   $filename = $_FILES[$name]['name'];
	   $ext = substr($filename, strpos($filename,'.'), strlen($filename)-1);
	 
	   if(!in_array($ext,$allowed_filetypes)){
		  return 'The brochure type you attempted to upload is not allowed.'; 
		  exit;
		}
		  	 
	   if(filesize($_FILES[$name]['tmp_name']) > $max_filesize){
		  return 'The file you attempted to upload is too large.';
		  exit;
	   }
	 
	   move_uploaded_file($_FILES[$name]['tmp_name'],$upload_path . $filename);
	   return true;
	}
	
	function _createThumbnail($fileName, $source) {
		error_reporting(0);
		$file = explode(',', $fileName);
		for($i=0; $i<=count($file)-1; $i++){
			$CI =& get_instance();
			$config['image_library'] = 'gd2';
			$config['source_image'] = $source.$file[$i];
			$config['create_thumb'] = TRUE;
			$config['maintain_ratio'] = TRUE;
			$config['width'] = 199;
			$config['height'] = 199;
			$CI->load->library('image_lib');
			$CI->image_lib->initialize($config);
			$CI->image_lib->resize();
			$CI->image_lib->clear();
		}
		return true;
	}