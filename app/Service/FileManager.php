<?php


namespace App\Service;

use App\RequestFile;

class FileManager
{
	
	public function __construct()
	{
		$this->file = new RequestFile;
	}

	public function all()
	{
		return $this->file->all();
	}

	public function path($id)
	{
		$file = $this->file->findOrFail($id);
		$filePath = storage_path('app/public/files/documents/'.$file->uploaded_file);

		return $filePath;
	}
	public function data(Array $data, $filename)
	{
		return [

			'purpose' => $data['purpose'],
            'summary' => $data['summary'],
            'paper_size_id' => $data['size'],
            'print_type_id' => $data['type'],
            'uploaded_file' => $filename,
            'address' => $data['address'],
            'name' => $data['name'],
            'contact_number' => $data['contact_number']
		];
	}
}