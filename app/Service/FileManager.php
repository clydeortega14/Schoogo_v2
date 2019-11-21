<?php


namespace App\Service;

use App\RequestFile;

class FileManager
{
	
	public function manageFile($file, $location)
	{
		$filename = rand().".".$file->getClientOriginalExtension();
		// $file->storeAs($location, $filename);
		$file->move(public_path('/uploads/'.$location), $filename);

		return $filename;
	}
}