<?php
	$file = $_GET['file'];
	$text = $_GET['text'];
	//$text = strval($_COOKIE['user_email']);
	PlaceWatermark($file, $text, 30, 50, 80,TRUE);
	//ob_end_flush();
	function PlaceWatermark($file, $text, $xxx, $yyy, $op, $outdir) {
		// error_reporting(E_ALL);
		// ini_set('display_errors', '1');
		//$text = $_COOKIE['user_email'];
		//ob_start();
		require_once('fpdi.php');
		require_once('fpdf.php');
	    $name = uniqid();
	    $font_size = 5;
	   	$temp = $text;
	    for ($i=0;$i<2;$i++){
	    	$temp .= "\n\n\n\n\n\n".$text;
	    }
	    // $ts=explode("\n",$temp);
	    // $width=0;
	    // foreach ($ts as $k=>$string) {
	    //     $width=max($width,strlen($string));
	    // }
	    // $width  = imagefontwidth($font_size)*$width*3;
	    // $height = imagefontheight($font_size)*count($ts)*12;
	    // $el=imagefontheight($font_size)*12;
	    // $em=imagefontwidth($font_size)*3;
	    // $img = imagecreatetruecolor($width,$height);
	    // Background color
	    // $bg = imagecolorallocate($img, 255, 255, 255);
	    // imagefilledrectangle($img, 0, 0,$width ,$height , $bg);
	    // Font color
	    // $color = imagecolorallocate($img, 0, 0, 0);
	    // foreach ($ts as $k=>$string) {
	    //     $len = strlen($string);
	    //     $ypos = 0;
	    //     for($i=0;$i<$len;$i++){
	    //         $xpos = $i * $em;
	    //         $ypos = $k * $el;
	    //         imagechar($img, $font_size, $xpos, $ypos, $string, $color);
	    //         $string = substr($string, 1);      
	    //     }
	    // }
	    // imagecolortransparent($img, $bg);
	    // $blank = imagecreatetruecolor($width, $height);
	    // $tbg = imagecolorallocate($blank, 255, 255, 255);
	    // imagefilledrectangle($blank, 0, 0,$width ,$height , $tbg);
	    // imagecolortransparent($blank, $tbg);
	    // if ( ($op < 0) OR ($op >100) ){
	    //     $op = 100;
	    // }
	    // imagecopymerge($blank, $img, 0, 0, 0, 0, $width, $height, $op);
	    // imagepng($blank,$name.".png");
	    // Created Watermark Image
	    $pdf = new FPDI();
	    if (file_exists($file)){
	        $pagecount = $pdf->setSourceFile($file);
	    } else {
	        return FALSE;
	    }
	    // $tpl = $pdf->importPage(1);
	    // $pdf->addPage();
	    // $pdf->useTemplate($tpl, 1, 1, 0, 0, TRUE);
	    // //Put the watermark
	    // $pdf->Image($name.'.png', $xxx, $yyy, 0, 0, 'png');
	    for($i=1; $i <= $pagecount; $i++) {   
			$tpl = $pdf->importPage($i);
			$size = $pdf->getTemplateSize($tpl);
			if ($size['w'] > $size['h']) {
		        $pdf->AddPage('L', array($size['w'], $size['h']));
		    } else {
		        $pdf->AddPage('P', array($size['w'], $size['h']));
		    }
			//$pdf->addPage();
			//$pdf->useTemplate($tpl, 1, 1, 0, 0, TRUE);
			$pdf->useTemplate($tpl);
			//Put the watermark  
			//$pdf->Image($name.'.png', $xxx, $yyy, 0, 0, 'png');
			if ($size['w'] > 600 && $size['h'] > 300){
				$adjusted = $temp . "\n\n\n\n\n\n".$text;
				$pdf->SetFont('Helvetica', '', $size['w']/30);
				$pdf->SetTextColor(170,170,170);
				$pdf->SetXY($size['w']/4-strlen($text)*4,$size['h']/4-$size['h']/14);
				$pdf->SetMargins($size['w']/4-strlen($text)*4,0,0);
				$pdf->Write(12, $adjusted);
				$pdf->SetFont('Helvetica', '', $size['w']/30);
				$pdf->SetTextColor(170,170,170);
				$pdf->SetXY($size['w']/4*3-strlen($text)*4,$size['h']/4-$size['h']/14);
				$pdf->SetMargins($size['w']/4*3-strlen($text)*4,0,0);
				$pdf->Write(12, $adjusted);
			} else {
				$pdf->SetFont('Helvetica', '', $size['w']/30);
				$pdf->SetTextColor(170,170,170);
				$pdf->SetXY($size['w']/2-strlen($text)*2,$size['h']/4-$size['h']/10);
				$pdf->SetMargins($size['w']/2-strlen($text)*2,0,0);
				$pdf->Write(12, $temp);
			}
		} 
	    if ($outdir === TRUE){
	        return $pdf->Output();
	    } else {
	        return $pdf;
	    }
	}
?>