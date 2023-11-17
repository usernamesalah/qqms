<?php

class MY_Controller extends CI_Controller
{
	public $title = 'QQMS - Pertamina | ';

	public function __construct()
	{
		parent::__construct();
		// $this->load->library('lib_log');
		date_default_timezone_set("Asia/Jakarta");
	}

	protected function template($data, $module = '')
	{
		$data['global_title'] = $this->title;
		$data['module'] = $module;
		if ( strlen($module) > 0 )
			return $this->load->view($module . '/includes/layout', $data);
		return $this->load->view('includes/layout', $data);
	}

	protected function POST($name)
	{
		return $this->input->post($name);
	}

	protected function GET($name, $clean = false)
	{
		return $this->input->get($name, $clean);
	}

	protected function METHOD()
	{
		return $this->input->method();
	}

	protected function flashmsg($msg, $type = 'success', $name = 'msg')
	{
		return $this->session->set_flashdata($name, '<div class="alert alert-' . $type . ' alert-dismissable fade show" role=""alert">' . $msg . '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>');
	}

	protected function upload($id, $directory, $tag_name = 'userfile', $max_size = 0)
	{
		if ( isset($_FILES[$tag_name]) && !empty($_FILES[$tag_name]['name']) )
		{
			$upload_path = realpath(FCPATH . 'assets/upload/' . $directory . '/');
			@unlink($upload_path . '/' . $id . '.jpg');
			$config = [
			 'file_name' => $id . '.jpg',
			 'allowed_types' => 'jpg|png|bmp|jpeg',
			 'upload_path' => $upload_path,
			 'max_size' => $max_size,
			 "overwrite" => true
			];
			$this->load->library('upload');
			$this->upload->initialize($config);
			return $this->upload->do_upload($tag_name);
		}
		return FALSE;
	}

	protected function multiple_upload($directory, $tag_name = 'userfile', $max_size = 0)
	{

		$upload_path = realpath(FCPATH . 'assets/upload/' . $directory . '/');
		$config = [
		 'allowed_types' => 'jpg|png|bmp|jpeg',
		 'upload_path' => $upload_path,
		 'max_size' => $max_size,
		 "overwrite" => true
		];

		$this->load->library('upload');
		$this->upload->initialize($config);

		$uploaded_files = array(); // To store the names of the uploaded files

		// Loop through each file in the $_FILES array
		foreach ($_FILES[$tag_name]['name'] as $key => $value)
		{
			$_FILES['userfile']['name'] = $_FILES[$tag_name]['name'][$key];
			$_FILES['userfile']['type'] = $_FILES[$tag_name]['type'][$key];
			$_FILES['userfile']['tmp_name'] = $_FILES[$tag_name]['tmp_name'][$key];
			$_FILES['userfile']['error'] = $_FILES[$tag_name]['error'][$key];
			$_FILES['userfile']['size'] = $_FILES[$tag_name]['size'][$key];
			
			if ($this->upload->do_upload('userfile')) {
                $uploaded_files[] = $this->upload->data('file_name');
            } else {
                // Handle error if the upload fails
                $error = array('error' => $this->upload->display_errors());
                print_r($error);
            }
		}

		return $uploaded_files;
	}
	protected function dump($var)
	{
		echo '<pre>';
		var_dump($var);
		echo '</pre>';
	}

	protected function go_back($index)
	{
		echo '<script type="text/javascript">window.history.go(' . $index . ');</script>';
	}

	protected function check_allowance($condition, $message = ['Required parameter is missing', 'danger'], $redirect_index = -1)
	{
		if ( $condition )
		{

			$this->flashmsg($message[0], $message[1]);
			$this->go_back($redirect_index);
			exit;

		}
	}

	protected function __generate_random_id()
	{
		return mt_rand();
	}

	protected function remove_directory($path)
	{
		$files = array_diff(scandir($path), ['.', '..']);
		foreach ($files as $file)
		{
			if ( is_dir($file) )
			{
				removeDirectory($file);
			}
			else
			{
				if ( file_exists($file) )
				{
					unlink($file);
				}
			}
		}
		rmdir($path);
		return;
	}
}
