<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

	public function index()
	{
        // load model
        $this->load->model('user_model', 'users');
        // set return
        $data['users'] = $this->users->getAll();
		$this->load->view('page', $data);
	}

    public function import()
    {
        // load model
        $this->load->model('user_model', 'users');
        // load libraries
        $this->load->library('upload');
        $this->load->library('PHPExcel', 'phpexcel');
        // get file
        $fileName = time() . $_FILES['fileinput']['name'];
        // set confi
        $config['upload_path']   = './assets/files/';
        $config['file_name']     = $fileName;
        $config['allowed_types'] = 'xls|xlsx|csv';
        $config['max_size']      = 10240;
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('fileinput')) {
            // $this->upload->display_errors();
            echo "<pre>";
            print_r( $this->upload->display_errors() );
            echo "</pre>";exit;
        }

        $media = $this->upload->data('fileinput');
        $nama_file      = $this->upload->data('file_name');
		$file_path      = $this->upload->data('file_path');
        $inputFileName  = './assets/files/' . $nama_file;

        chmod( $inputFileName, 0777);

        try {
            $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
            $objReader     = PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel   = $objReader->load($inputFileName);
        } catch (Exception $e) {
            die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME) . '": ' . $e->getMessage());
        }

        $sheet          = $objPHPExcel->getSheet(0);
        $highestRow     = $sheet->getHighestRow();
        $highestColumn  = $sheet->getHighestColumn();
        //get last id
        $id = $this->users->getLastId();
        //set data
        for ($row = 2; $row <= $highestRow; $row++) {
            $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
            $noHp = $rowData[0][3];
            $data = array(
                "id"     => $id,
                "nama"   => $rowData[0][1],
                "alamat" => $rowData[0][2],
                "kontak" => "$noHp"
            );
            $insert = $this->users->add( $data );
            $id++;
        }

        unlink( $inputFileName );

        redirect( site_url('page') );
    }

    public function export()
    {
        // load model
        $this->load->model('user_model', 'users');
        // set return
        $data['users'] = $this->users->getAll();
        $this->load->view('page_export', $data);
    }
}
