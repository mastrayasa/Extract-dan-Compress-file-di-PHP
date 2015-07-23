<?php

$zip = new ZipArchive;

$file = $zip->open("contoh.zip"); // buka file


if ($file === TRUE) 
{
	// extract file ke folder extract
	$zip->extractTo("hasil-unzip"); 
	$zip->close(); // tutup
	echo "Berhasil!";
} 
else 
{
	echo "Gagal";
}

?> 