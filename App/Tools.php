<?php

namespace App;

class Tools {

	public static function getPost($post,$key) {
		if(isset($post[$key])) {
			$value=trim($post[$key]);
			$value = str_replace('\'', "\\'", $value);
		}
		else {
			$value="";
		}
		return $value;
	}
	
	public static function uploadFile($file,$type,$maxSize) {
		$folder = dirname(__DIR__).'/public/'.$type.'/';
		// Création d'un id unique pour le nom du fichier
		$fileArray = explode('.', $file['name']);
		$fileName = $fileArray[0];
		$fileExt = $fileArray[1];
		$fileID = $fileName."-".date("YmdHis").'.'.$fileExt;
		
		$fileMimeArray = explode('/', $file['type']);
		$fileType = $fileMimeArray[1];
		
		if ($type == 'pdf') {
			$file_info = new \finfo(FILEINFO_MIME);
			$mime_type = $file_info->buffer(file_get_contents($file["tmp_name"]));
		}
		if ($type == 'jpeg') {
			$size = getimagesize($file["tmp_name"]);
			$sizeType = $size[2];
		}
		// return 0 si taille supérieure à taille max
		if ($file["size"] > $maxSize) {
			return 0;
		}
		// Vérification extension du fichier : return 1 si sous-type MIME différent, on évite le bug mime firefox "binary/octet-stream"
		else if (($fileType != $type) && ($file["type"] != "binary/octet-stream")) {
			return 1;
		}
		// Vérification interne du fichier, return 1 si c'est pas un pdf
		else if (($type == 'pdf') && ($mime_type != 'application/pdf; charset=binary')) {
			return 1;
		}
		// Vérification interne du fichier, return 1 si c'est pas un jpeg
		else if (($type == 'jpeg') && ($sizeType != 2)) {
			return 1;
		}
		// return $fileID si upload&rename réussi,  si 2 rename a échoué, 3 si upload a échoué
		else if (is_uploaded_file($file["tmp_name"])) {
			if (rename($file["tmp_name"], $folder.$fileID)) {
				return $fileID;
			}
			else {
				return 2;
			}
		}
		else {
			return 3;
		}
	}
	
	public static function deleteFile($file,$type) {
		$folder = dirname(__DIR__).'/public/'.$type.'/';
		unlink ($folder.$file);
	}
}