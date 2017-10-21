<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller 
{
    function __construct() 
    {
        parent::__construct();
        $this->load->library("highcharts");
        $this->load->library("dashtemp_template");
    }
    
    public function index()
    {        
        $qry_status = "
            select 
                sum(case when trans_status = 'Draft' then 1 else 0 end) as status_draft, 
                sum(case when trans_status = 'Approved' then 1 else 0 end) as status_approved, 
                sum(case when trans_status = 'Posted' then 1 else 0 end) as status_posted, 
                sum(1) as total 
            from datatable 
        ";
        $rs_status = getByQuery($qry_status);
		$data = array(
                'status_draft' => $rs_status[0]->status_draft,
                'status_approved' => $rs_status[0]->status_approved,
                'status_posted' => $rs_status[0]->status_posted,
                'total' => $rs_status[0]->total,
                'chart_bar' => $this->getChartBar(),
                'chart_pie' => $this->getChartPie(),
                'chart_line' => $this->getChartLine(),
                'chart_line2' => $this->getChartLine2()
            );
        $this->dashtemp_template->display_dashtemp('page/dashboard_vw', $data);
    }
    
    public function doc()
    {        
        $this->load->view('dashtemp_template/dashtemp_doc');
    }

    public function getChartBar() {
        $i = 0;
        $draft = array();
        $approved = array();
        $posted = array();
        $categories = array();
        $qry = "
            select 
                trans_type,
                sum(case when trans_status = 'Draft' then trans_amount else 0 end) as status_draft,
                sum(case when trans_status = 'Approved' then trans_amount else 0 end) as status_approved,
                sum(case when trans_status = 'Posted' then trans_amount else 0 end) as status_posted 
            from datatable 
            group by trans_type 
        ";
        $rs = getByQuery($qry);
        if($rs != "") {
            foreach($rs as $row) {
                $draft[$i] = (int)$row->status_draft;
                $approved[$i] = (int)$row->status_approved;
                $posted[$i] = (int)$row->status_posted;
                $categories[$i] = $row->trans_type;
                $i++;
            }
        }

        $data['draft']['data'] = $draft;
        $data['draft']['name'] = 'Draft';
        $data['approved']['data'] = $approved;
        $data['approved']['name'] = 'Approved';
        $data['posted']['data'] = $posted;
        $data['posted']['name'] = 'Posted';
        $data['axis']['categories'] = $categories;

        $this->highcharts->set_type('column'); 
        $this->highcharts->set_title('Graphic Amount');
        $this->highcharts->set_axis_titles('Type', 'Amount');         
        $this->highcharts->set_xAxis($data['axis']); 
        $this->highcharts->set_serie($data['draft']); 
        $this->highcharts->set_serie($data['approved']); 
        $this->highcharts->set_serie($data['posted']);                
        $this->highcharts->render_to('chart_bar');
        
        return $this->highcharts->render(); 
    }

    public function getChartPie() {
        $invoice = 0;
        $payment = 0;
        $qry = "
            select 
                sum(case when trans_type = 'Invoice' then trans_amount else 0 end) as status_invoice,
                sum(case when trans_type = 'Payment' then trans_amount else 0 end) as status_payment
            from datatable 
        ";
        $rs = getByQuery($qry);
        if($rs != "") {
            foreach($rs as $row) {
                $invoice = (int)$row->status_invoice;
                $payment = (int)$row->status_payment;
            }
        }

        $serie['data']  = array(
            array('Invoice', $invoice), 
            array('Payment', $payment)
        );
        
        $this->highcharts->set_title('Invoice vs Payment');
        $this->highcharts->set_type('pie');
        $this->highcharts->set_serie($serie);             
        $this->highcharts->render_to('chart_pie');
        
        return $this->highcharts->render(); 
    }

    public function getChartLine() {
        $draft = 0;
        $approved = 0;
        $posted = 0;
        $data = array();
        $qry = "
            select trans_type, trans_amount 
            from datatable 
            where trans_type = 'Invoice'
        ";
        $rs = getByQuery($qry);
        if($rs != "") {
            foreach($rs as $row) {
                $data[] = array($row->trans_type ,(int)$row->trans_amount);
            }
        }

        $serie['data']  = $data;
        
        $this->highcharts->set_title('History Invoice');
        $this->highcharts->set_axis_titles('Serie', 'Amount');  
        $this->highcharts->set_type('line');
        $this->highcharts->set_serie($serie);             
        $this->highcharts->render_to('chart_line');
        
        return $this->highcharts->render(); 
    }

    public function getChartLine2() {
        $draft = 0;
        $approved = 0;
        $posted = 0;
        $data = array();
        $qry = "
            select trans_type, trans_amount 
            from datatable 
            where trans_type = 'Payment'
        ";
        $rs = getByQuery($qry);
        if($rs != "") {
            foreach($rs as $row) {
                $data[] = array($row->trans_type ,(int)$row->trans_amount);
            }
        }

        $serie['data']  = $data;
        
        $this->highcharts->set_title('History Payment');
        $this->highcharts->set_axis_titles('Serie', 'Amount');  
        $this->highcharts->set_type('line');
        $this->highcharts->set_serie($serie);             
        $this->highcharts->render_to('chart_line2');
        
        return $this->highcharts->render(); 
    }
}	