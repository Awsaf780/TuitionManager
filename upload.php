<?php
require "vendor/autoload.php";
use Google\Cloud\Vision\VisionClient;
$vision = new VisionClient(['keyFile' => json_decode(file_get_contents("ocrkey/ocrkeys.json"), true)]);

//MULTI FILE UPLOA
if(isset($_FILES['files']['name'])){

	$upload_location = "./uploads/";		
	$file = $_FILES['files']['name'];
		
	$ext = pathinfo($file, PATHINFO_EXTENSION);
	$valid_ext = array("png","jpeg","jpg","gif");
	$filename = time().'.'.$ext;

	// Check extension
	if(in_array($ext, $valid_ext)){

		$path = $upload_location.$filename;
		
		if(move_uploaded_file($_FILES['files']['tmp_name'],$path)){

			//OCR IMAGE READ				
			$imageSource = fopen($path, 'r');
			$image = $vision->image($imageSource, ['TEXT_DETECTION']);
			$textAnnotations = $vision->annotate($image)->text();

			$rows = [];

			// Function used to sort our lines.
			function sortProc($a, $b)
			{
				if ($a["x"] === $b["x"]) {
					return 0;
				}
				return ($a["x"] < $b["x"]) ? -1 : 1;
			}

			// Remove first row (complete text).
			array_shift($textAnnotations);

			// We should calculate this, use a reasonable value to begin with.
			$lineHeight = 8;

			foreach ($textAnnotations as $text) {
				$key = round(((double)($text->info()["boundingPoly"]["vertices"][0]["y"]))/$lineHeight);
				$x = (int)$text->info()["boundingPoly"]["vertices"][0]["x"];
				$value = ["x" => $x, "text" => $text->description()];
				if (!isset($rows[$key])) {
					$rows[$key] = [];
				}
				$rows[$key][] = $value;
			}

			$text = [];
			foreach ($rows as $key => $value) {
				// Sort by x value.
				usort($value, "sortProc");

				// Concatenate each line
				$result = array_reduce($value, function($acc, $elem) {
					$acc .= " " . $elem["text"];
					return $acc;
				}, "");

				$text[] = $result."$$";

				// Stop when we get here!
				if (preg_match("/from account/i", $result)) {
					break;
				}
			}

			$string_data = str_replace( ':', '', implode(":",$text));
			$ocr_data = explode('$$',$string_data);
			
			foreach ($ocr_data as $index => $ocr_text) {
				if((strpos($ocr_text,'ID NO')!==false)||(strpos($ocr_text,'NID No')!==false)
					||(strpos($ocr_text,'NO')!==false)||(strpos($ocr_text,'ID')!==false))
				{
					if(strpos($ocr_text,'ID NO')!==false && strlen($ocr_text)>10)
					{
						$nid = trim(str_replace('ID NO','',$ocr_text));
					}
					elseif(strpos($ocr_text,'NID No')!==false)
					{
						$nid = trim($ocr_data[$index-1]);
					}
					elseif(strpos($ocr_text,'NO')!==false && strlen($ocr_text)>10)
					{
						$nid = trim(str_replace('NO','',$ocr_text));
					}
					elseif(strpos($ocr_text,'ID')!==false && strlen($ocr_text)>10 && strpos($ocr_text,'NATIONAL')===false )
					{								
						$nid = trim(str_replace('ID','',$ocr_text));
					}									
				}
			}

			/* $ocr_file_name = $filename.date("d.m.Y").".txt";
			$handle = fopen("./ocrfile/".$ocr_file_name, 'w') or die('Cannot open file:  '.$ocr_file_name);
			fwrite($handle, $string_data);
			fclose($handle); */
			
			echo $nid;					
		}			
	}
}
?>