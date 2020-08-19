<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

$route['dashboard'] = 'DashboardController';

$route['karyawan'] = 'KaryawanController';
$route['karyawan/tambah'] = 'KaryawanController/tambah';
$route['karyawan/lihat/(:any)'] = 'KaryawanController/lihat/$1';
$route['karyawan/update'] = 'KaryawanController/update';
$route['karyawan/hapus/(:any)'] = 'KaryawanController/hapus/$1';
$route['karyawan/ajaxIndex'] = 'KaryawanController/ajaxIndex';

// $route['mapel'] = 'MapelController';
// $route['mapel/tambah'] = 'MapelController/tambah';
// $route['mapel/lihat/(:any)'] = 'MapelController/lihat/$1';
// $route['mapel/update'] = 'MapelController/update';
// $route['mapel/hapus/(:any)'] = 'MapelController/hapus/$1';
// $route['mapel/ajaxIndex'] = 'MapelController/ajaxIndex';

// $route['wali'] = 'WaliController';
// $route['wali/tambah'] = 'WaliController/tambah';
// $route['wali/lihat/(:any)'] = 'WaliController/lihat/$1';
// $route['wali/update'] = 'WaliController/update';
// $route['wali/hapus/(:any)'] = 'WaliController/hapus/$1';
// $route['mapel/ajaxIndex'] = 'WaliController/ajaxIndex';

$route['jabatan'] = 'JabatanController';
$route['jabatan/tambah'] = 'JabatanController/tambah';
$route['jabatan/updateForm/(:any)'] = 'JabatanController/updateForm/$1';
$route['jabatan/update'] = 'JabatanController/update';
$route['jabatan/hapus/(:any)'] = 'JabatanController/hapus/$1';

$route['absen'] = 'AbsenController';
$route['absen/tambah'] = 'AbsenController/tambah';
$route['absen/lihat/(:any)'] = 'AbsenController/lihat/$1';
$route['absen/lembur/(:any)'] = 'AbsenController/lembur/$1';
$route['absen/update'] = 'AbsenController/update';
$route['absen/hapus/(:any)'] = 'AbsenController/hapus/$1';
$route['absen/ajaxIndex'] = 'AbsenController/ajaxIndex';

$route['gaji'] = 'GajiController';
$route['gaji/lihat/(:any)'] = 'GajiController/lihat/$1';
$route['gaji/bayar/(:any)'] = 'GajiController/bayar/$1';
$route['gaji/pinjam/(:any)'] = 'GajiController/pinjam/$1';
$route['gaji/detail/(:any)'] = 'GajiController/detail/$1';
$route['gaji/tambah'] = 'GajiController/tambah_gaji';
$route['gaji/update'] = 'GajiController/update';
$route['gaji/hapus/(:any)'] = 'GajiController/hapus/$1';
$route['gaji/ajaxIndex'] = 'GajiController/ajaxIndex';

$route['pinjam'] = 'PinjamController';
$route['pinjam/tambah'] = 'PinjamController/tambah';

$route['laporan'] = 'LaporanController';
$route['laporan/lihat/(:any)/(:any)'] = 'LaporanController/lihat/$1/$2';

$route['login'] = 'AuthController/login';
$route['logout'] = 'AuthController/logout';

$route['default_controller'] = 'Welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
