<?php

/* FUNGSI ZIP FILE */
function create_zip($files = array(),$destination = '',$overwrite = false) {
	
	// jika file zip sudah ada & overwrite bernilai false, return false
	if(file_exists($destination) && !$overwrite) { 
		return false;
	}
	
	// vars
	$valid_files = array();
	
	# Disini kita akan cek ulang, 
	# memastikan file yang didaftarkan benar2 ada.
	if(is_array($files)) {
		// cek file satu per satu
		foreach($files as $file) {
			// daftar ulang file, hanya yang ada
			if(file_exists($file)) {
				$valid_files[] = $file;
			}
		}
	}
	
	// JIKA KITA PUNYA FILE YANG VALID
	if(count($valid_files)) {
		
		// BUAT FILE ZIP
		$zip = new ZipArchive();
		if($zip->open($destination,$overwrite ? ZIPARCHIVE::OVERWRITE : ZIPARCHIVE::CREATE) !== true) {
			return false;
		}
		
		// TAMBAHKAN FILE (file-file yang falid tadi)
		foreach($valid_files as $file) {
			$zip->addFile($file,$file);
		}
		
		// TUTUP
		$zip->close();
		
		// CEK KEMBALI, MEMASTIKAN FILE BENAR-BENAR ADA
		return file_exists($destination);
	}
	else
	{
		return false;
	}
}

// DAFTARKAN FILE-FILE YANG AKAN DI COMPRESS
$files_to_zip = array(
	'contoh-file1/contoh-file.txt',
	'contoh-file1/contoh-file.docx',
	'contoh-file2/Chrysanthemum.jpg',
	'contoh-file2/Desert.jpg',
	'contoh-file2/Hydrangeas.jpg'
);

 // COMPRESS FILE
$result = create_zip(
	$files_to_zip, // daftar file yang akan di compress
	'hasil-compress-advance.zip', // nama file keluaran
	true // false jika mode create | true jika mode overwrite
);


if($result){
	echo 'Berhasil!';
}else{
	echo 'Gagal!';
}

?>
