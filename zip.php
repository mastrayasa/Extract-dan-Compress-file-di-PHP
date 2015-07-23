<?php

// inisialisasi class ZipArchive
$zip = new ZipArchive();

// membuat file baru
$zip->open('hasil-compress.zip', ZIPARCHIVE::OVERWRITE ); // ZIPARCHIVE::OVERWRITE atau ZIPARCHIVE::CREATE

// menambahkan file
$zip->addFile('contoh-file1/contoh-file.txt','contoh-file1/contoh-file.txt');
$zip->addFile('contoh-file1/contoh-file.docx','contoh-file1/contoh-file.docx');


## menambahkan file, namun menyimpan kedalam folder yang berbeda. ##
// dari contoh-file2 simpan ke folder gambar
$zip->addFile('contoh-file2/Chrysanthemum.jpg','gambar/Chrysanthemum.jpg');

// dari contoh-file2 simpan ke folder gambar-1
$zip->addFile('contoh-file2/Desert.jpg','gambar-1/Desert.jpg');

// dari contoh-file2 simpan ke folder gambar-2
$zip->addFile('contoh-file2/Hydrangeas.jpg','gambar-2/Hydrangeas.jpg');


// Tutup
$zip->close();

echo 'Berhasil!';
?>