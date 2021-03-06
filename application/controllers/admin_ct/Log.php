<?php

 
class Log extends CI_Controller{
    public $render_data = array();

    public function __construct() {
        parent::__construct();

        $this->template->set_template('admin');
        $this->load->model('Log_model','logs');
    }
    /*
     * Listing of logs
     */
    function index()
    {
        if(!is_group('admin')){
            redirect('admin');
            exit();
        }
        //******* Defalut ********//
        $render_data['user'] = $this->session->userdata('fnsn');
        $this->template->write('title', 'System Logs');
        $this->template->write('user_id', $render_data['user']['aid']);
        $this->template->write('user_name', $render_data['user']['name']);
        $this->template->write('user_group', $render_data['user']['group']);
        //******* Defalut ********//

        // ====== Java script Data tabale ======= //
        $js = 'var table;
        $(document).ready(function() {
            table = $("#table").DataTable({ 
                "processing": true,
                "serverSide": true,
                "order": [],
                "ajax": {
                    "url": "'.base_url('admin/log/ajax').'",
                    "type": "POST"
                }
            });
        });';
        
        
        $this->template->write('js', $js);
        $this->template->write_view('content', 'admin/log/index', $render_data);
        $this->template->render();
    }

    public function ajax(){
        if (!$this->input->is_ajax_request() || !is_group('admin')) {
            exit('No direct script access allowed');
        }

        $list = $this->logs->get_all_logs();
        $data = array();
        $no = $this->input->post('start');
        foreach ($list as $log) {
            $no++;
            $row = array();
            $row[] = date("d/m/Y H:i:s",strtotime($log->log_date));
            $row[] = $log->user;
            $row[] = $log->detail;
            $data[] = $row;
        }

        $output = array(
            "draw" => $this->input->post('draw'),
            "recordsTotal" => $this->logs->count_all(),
            "recordsFiltered" => $this->logs->count_filtered(),
            "data" => $data,
            );
        echo json_encode($output);
    }

    
}
