<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_management extends CI_Controller
{
    
    
    function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->database();
        $this->load->library('session');
        $this->load->model('user_model');
    }
    
    
    public function index()
    {
        $this->load->helper('url');
        $this->load->view('user_management');
    }
    
    public function deleteUser($user_id = 0)
    {
        if ($user_id != 0) {
            $delete = $this->user_model->delete_user($user_id);
            echo $delete;
            
        }
    }
    
    public function DeactivateUser($user_id = 0)
    {
        if ($user_id != 0) {
            $update_data = array(
                'is_active' => 0
            );
            $update      = $this->user_model->update_user_status($update_data, $user_id);
            echo $update;
            
        }
    }
    
    public function ActivateUser($user_id = 0)
    {
        if ($user_id != 0) {
            $update_data = array(
                'is_active' => 1
            );
            $update      = $this->user_model->update_user_status($update_data, $user_id);
            echo $update;
            
        }
    }
    
    
    public function addUser($user_id = 0)
    {
        
        if ($this->input->post('fname')) {
            $fname       = $this->input->post('fname');
            $lname       = $this->input->post('lname');
            $email       = $this->input->post('email');
            $address     = $this->input->post('address');
            $pincode     = $this->input->post('pincode');
            $dateofbirth = $this->input->post('DOB');
            $dateofbirth = str_replace('/', '-', $dateofbirth);
            $dateofbirth = date("Y-m-d", strtotime($dateofbirth));
            
            $mobile_no   = $this->input->post('mobile_no');
            $date        = date("Y-m-d");
            $insert_data = array(
                'c_firstname' => $fname,
                'c_lastname' => $lname,
                'c_emailid' => $email,
                'c_address' => $address,
                'c_telephoneno' => $mobile_no,
                'c_dob' => $dateofbirth,
                'c_zipcode' => $pincode
            );
            
            $this->load->model('user_model');
            if ($user_id == 0) {
                $insert_data['created_on'] = $date;
                $add_data                  = $this->user_model->add_user_details($insert_data);
                if ($add_data == 1) {
                    $this->session->set_flashdata('success', "User details added successfully");
                } else {
                    $this->session->set_flashdata('error', "User details failed to add");
                }
            } else {
                $insert_data['updated_on'] = $date;
                $update_data               = $this->user_model->update_user_details($insert_data, $user_id);
                if ($update_data == 1) {
                    $this->session->set_flashdata('success', "User details updated successfully");
                } else {
                    $this->session->set_flashdata('error', "User details failed to updated");
                }
            }
            redirect("user_management");
            die;
        }
        $data = array();
        if ($user_id != 0) {
            $user_details         = $this->user_model->get_userdetails($user_id);
            $data['user_details'] = $user_details;
            $data['user_id']      = $user_id;
        }
        $this->load->view('add_user', $data);
        
    }
    
    
    
    public function get_userdetails()
    {
        
        $aColumns = array(
            'sr_no',
            'first_name',
            'last_name',
            'email_id',
            'address',
            'zip_code',
            'telephone_no',
            'DOB',
            'status',
            'action'
        );
        $bColumns = array(
            'c_id',
            'c_firstname',
            'c_lastname',
            'c_emailid',
            'c_address',
            'c_zipcode',
            'c_telephoneno',
            'c_dob',
            'is_active'
        );
        
        
        $sIndexColumn = "URA.id";
        
        
        
        
        /* DB table to use */
        $sTable = "customer";
        
        /*
         * Paging
         */
        $sLimit = "";
        
        if (isset($_GET['iDisplayStart']) && $_GET['iDisplayLength'] != '-1') {
            $sLimit = "LIMIT " . intval($_GET['iDisplayStart']) . ", " . intval($_GET['iDisplayLength']);
            $offset = $_GET['iDisplayStart'];
            $length = $_GET['iDisplayLength'];
        }
        
        
        /*
         * Ordering
         */
        
        $sOrder = "";
        
        if (isset($_GET['iSortCol_0'])) {
            
            $sOrder = "ORDER BY  ";
            
            for ($i = 0; $i < intval($_GET['iSortingCols']); $i++) {
                
                switch ($_GET['iSortCol_0']) {
                    
                    case 0:
                        
                        $sOrder .= " created_on 
                                    " . ($_GET['sSortDir_' . $i] === 'asc' ? 'asc' : 'desc') . ", ";
                        break;
                    
                    case 1:
                        $sOrder .= " c_firstname
                                    " . ($_GET['sSortDir_' . $i] === 'asc' ? 'asc' : 'desc') . ", ";
                        break;
                    
                    case 2:
                        
                        $sOrder .= " c_lastname
                                " . ($_GET['sSortDir_' . $i] === 'asc' ? 'asc' : 'desc') . ", ";
                        
                        break;
                    
                    case 3:
                        $sOrder .= " c_emailid
                                " . ($_GET['sSortDir_' . $i] === 'asc' ? 'asc' : 'desc') . ", ";
                        break;
                    
                    case 4:
                        $sOrder .= " c_address
                                " . ($_GET['sSortDir_' . $i] === 'asc' ? 'asc' : 'desc') . ", ";
                        break;
                    
                    case 5:
                        $sOrder .= " c_zipcode
                                " . ($_GET['sSortDir_' . $i] === 'asc' ? 'asc' : 'desc') . ", ";
                        break;
                    
                    case 6:
                        $sOrder .= " c_telephoneno
                                " . ($_GET['sSortDir_' . $i] === 'asc' ? 'asc' : 'desc') . ", ";
                        break;
                    
                    case 7:
                        $sOrder .= " c_dob
                                " . ($_GET['sSortDir_' . $i] === 'asc' ? 'asc' : 'desc') . ", ";
                        break;
                    
                    default:
                        $sOrder .= " created_on desc  ";
                        break;
                }
            }
            
            $sOrder = substr_replace($sOrder, "", -2);
            
            if ($sOrder == "ORDER BY") {
                $sOrder .= " created_on desc  ";
            }
        }
        
        
        
        $sWhere = "";
        
        if (isset($_GET['sSearch']) && $_GET['sSearch'] != "") {
            
            $sWhere = "WHERE (";
            
            for ($i = 0; $i < count($bColumns); $i++) {
                
                if (isset($_GET['bSearchable_' . $i]) && $_GET['bSearchable_' . $i] == "true") {
                    
                    $_GET['sSearch'] = trim($_GET['sSearch']);
                    
                    switch ($bColumns[$i]) {
                        
                        case 'c_id':
                            $sWhere .= $bColumns[$i] . " LIKE '%" . trim($_GET['sSearch'], " \t.") . "%' OR ";
                            break;
                        case 'c_firstname':
                            $sWhere .= "c_firstname LIKE '%" . trim($_GET['sSearch'], " \t.") . "%' OR ";
                            break;
                        case 'c_lastname':
                            $sWhere .= "c_lastname LIKE '%" . trim($_GET['sSearch'], " \t.") . "%' OR ";
                            break;
                        case 'c_emailid':
                            $sWhere .= "c_emailid LIKE '%" . trim($_GET['sSearch'], " \t.") . "%' OR ";
                            break;
                        case 'c_address':
                            $sWhere .= "c_address LIKE '%" . trim($_GET['sSearch'], " \t.") . "%' OR ";
                            break;
                        case 'c_zipcode':
                            $sWhere .= " c_zipcode LIKE '%" . trim($_GET['sSearch'], " \t.") . "%' OR ";
                            break;
                        case 'c_telephoneno':
                            $sWhere .= " c_telephoneno LIKE '%" . trim($_GET['sSearch'], " \t.") . "%' OR ";
                            break;
                        case 'c_dob':
                            $sWhere .= " c_dob LIKE '%" . trim($_GET['sSearch'], " \t.") . "%' OR ";
                            break;
                            
                    }
                    
                }
                
            }
            
            $sWhere = substr_replace($sWhere, "", -3);
            $sWhere .= ')';
        }
        
        
        
        if (isset($_GET['start_date']) && !empty($_GET['start_date'])) {
            
            if (isset($_GET['end_date']) && !empty($_GET['end_date'])) {
                
                $todate = date("Y-m-d", strtotime($_GET['end_date']));
                $date   = new DateTime($todate);
                $date->modify("+23 hours");
                $date->modify("+59 minutes");
                $date->modify("+59 seconds");
                $todate = $date->format("Y-m-d h:i:s");
                
                if ($sWhere != '' && !empty($sWhere)) {
                    
                    $sWhere .= " AND date( URA.created_on ) BETWEEN date( '" . $_GET['start_date'] . "' ) AND date( '" . $todate . "' )";
                    
                } else {
                    
                    $sWhere .= " WHERE date( URA.created_on ) BETWEEN date( '" . $_GET['start_date'] . "' ) AND date( '" . $todate . "' )";
                }
                
            }
            
        }
        if (isset($_POST['user_status']) && !empty($_POST['user_status'])) {
            $_GET['user_status'] = $_POST['user_status'];
        }
        
        if (isset($_GET['user_status']) && !empty($_GET['user_status'])) {
            $user_status = $_GET['user_status'];
            if ($sWhere != '' && !empty($sWhere)) {
                
                $sWhere .= " AND is_active='$user_status'";
                
            } else {
                
                $sWhere .= " WHERE is_active='$user_status'";
            }
            
        }
        
        $search_in_field = array(
            'c_firstname',
            'c_lastname',
            'c_emailid',
            'c_address',
            'c_zipcode',
            'c_telephoneno'
        );
        if (isset($_GET['keyword']) && !empty($_GET['keyword'])) {
            $str_keyword     = trim($_GET['keyword']);
            $str_keyword     = explode(',', $str_keyword);
            $select_field    = $_GET['select_field'];
            $select_criteria = $_GET['select_criteria'];
            if ($sWhere != '' && !empty($sWhere)) {
                $sWhere .= " AND (";
            } else {
                $sWhere .= " WHERE (";
            }
            $total_string = count($str_keyword);
            $count_str    = 1;
            foreach ($str_keyword as $value) {
                if ($select_criteria == 1) {
                    if ($select_field == 6) {
                        if ($count_str != 1) {
                            $sWhere .= " AND ";
                        }
                        $field_count = count($search_in_field);
                        $loop_count  = 1;
                        foreach ($search_in_field as $fieldvalue) {
                            if ($field_count != $loop_count) {
                                $sWhere .= " $fieldvalue='$value' OR ";
                            } else {
                                $sWhere .= " $fieldvalue LIKE '$value' ";
                            }
                            $loop_count++;
                        }
                        
                    } else {
                        if ($total_string != $count_str) {
                            $sWhere .= " $search_in_field[$select_field]='$value' OR ";
                        } else {
                            $sWhere .= " $search_in_field[$select_field]='$value' ";
                        }
                    }
                    
                } else if ($select_criteria == 2) {
                    if ($select_field == 6) {
                        if ($count_str != 1) {
                            $sWhere .= " AND ";
                        }
                        $field_count = count($search_in_field);
                        $loop_count  = 1;
                        foreach ($search_in_field as $fieldvalue) {
                            if ($field_count != $loop_count) {
                                $sWhere .= " $fieldvalue LIKE '%$value%' AND ";
                            } else {
                                $sWhere .= " $fieldvalue LIKE '%$value%' ";
                            }
                            $loop_count++;
                        }
                        
                    } else {
                        if ($total_string != $count_str) {
                            $sWhere .= " $search_in_field[$select_field] LIKE '%$value%' AND ";
                        } else {
                            $sWhere .= " $search_in_field[$select_field] LIKE '%$value%' ";
                        }
                    }
                } else if ($select_criteria == 3) {
                    if ($select_field == 6) {
                        if ($count_str != 1) {
                            $sWhere .= " AND ";
                        }
                        $field_count = count($search_in_field);
                        $loop_count  = 1;
                        foreach ($search_in_field as $fieldvalue) {
                            if ($field_count != $loop_count) {
                                $sWhere .= " $fieldvalue NOT LIKE '%$value%' AND ";
                            } else {
                                $sWhere .= " $fieldvalue NOT LIKE '%$value%' ";
                            }
                            $loop_count++;
                        }
                        
                    } else {
                        if ($total_string != $count_str) {
                            $sWhere .= " $search_in_field[$select_field] NOT LIKE '%$value%' AND ";
                        } else {
                            $sWhere .= " $search_in_field[$select_field] NOT LIKE '%$value%' ";
                        }
                    }
                } else {
                    if ($select_field == 6) {
                        if ($count_str != 1) {
                            $sWhere .= " OR ";
                        }
                        $field_count = count($search_in_field);
                        $loop_count  = 1;
                        foreach ($search_in_field as $fieldvalue) {
                            if ($field_count != $loop_count) {
                                $sWhere .= " $fieldvalue  LIKE '%$value%' OR ";
                            } else {
                                $sWhere .= " $fieldvalue  LIKE '%$value%' ";
                            }
                            $loop_count++;
                        }
                        
                    } else {
                        if ($total_string != $count_str) {
                            $sWhere .= " $search_in_field[$select_field]  LIKE '%$value%' OR ";
                        } else {
                            $sWhere .= " $search_in_field[$select_field]  LIKE '%$value%' ";
                        }
                        
                    }
                    
                }
                $count_str++;
                
            }
            $sWhere .= " ) ";
        }
        
        $sQuery = "
            SELECT " . str_replace(" , ", " ", implode(", ", $bColumns)) . "
            FROM
            $sTable 
             ";
        if (!isset($_POST['submit'])) {
            $sQuery .= "
        $sWhere  group by c_id
        $sOrder";
        } else {
            $sQuery .= "
        $sWhere  group by c_id
        order by created_on desc";
            
        }
        
        
        $rResult = $this->db->query($sQuery)->result_array();
        
        
        $iTotal = count($rResult);
        
        $rResult = $this->db->query($sQuery . " " . $sLimit)->result_array();
        
        $output = array(
            "sEcho" => 0,
            "iTotalRecords" => $iTotal,
            "iTotalDisplayRecords" => $iTotal,
            "aaData" => array()
        );
        
        
        /************** Excel report  for all sucbscription  ********************/
        
        if (isset($_POST['submit'])) {
            
            
            /****** export to CSV file of subscription reported *****/
            $msg                  = '';
            $org_id               = $this->session->userdata("org_id");
            $first_day_this_month = date('Y-m-01');
            $last_day_this_month  = date('Y-m-t');
            ob_clean();
            header('Content-Type: text/csv; charset=utf-8');
            
            header('Content-Disposition: attachment; filename=user_management_report_' . date('d_m_Y') . '.csv');
            $output = fopen('php://output', 'w');
            
            
            
            fputcsv($output, array(
                '',
                '',
                '',
                '',
                'User management report',
                '',
                '',
                '',
                '',
                ''
            ));
            
            
            fputcsv($output, array(
                '',
                '',
                '',
                '',
                ''
            ));
            
            
            
            $date = date('d-m-Y');
            fputcsv($output, array(
                'Report Date -',
                $date,
                '',
                '',
                ''
            ));
            fputcsv($output, array(
                '',
                '',
                '',
                '',
                ''
            ));
            
            fputcsv($output, array(
                'Sr. no',
                'First name',
                'Last name',
                'Email id',
                'Address',
                'Zip code',
                'Telephone no',
                'Status',
                'DOB'
            ));
            $pagesrl_no = 1;
            $page_srl   = 1;
            foreach ($rResult as $key => $aRow) {
                $temp    = array();
                $user_id = $page_srl;
                $page_srl++;
                $temp[] = $pagesrl_no;
                $temp[] = $aRow['c_firstname'];
                $temp[] = $aRow['c_lastname'];
                
                $c_emailid = $aRow['c_emailid'];
                $temp[]    = $c_emailid;
                
                $c_address = $aRow['c_address'];
                $temp[]    = $c_address;
                
                $c_zipcode = $aRow['c_zipcode'];
                $temp[]    = $c_zipcode;
                
                $c_telephoneno = $aRow['c_telephoneno'];
                $temp[]        = $c_telephoneno;
                
                $is_active = $aRow['is_active'];
                if ($is_active == 1) {
                    $temp[] = "Active";
                } else {
                    $temp[] = "Inactive";
                }
                
                $c_dob  = $aRow['c_dob'];
                $temp[] = date('d-m-Y', strtotime($c_dob));
                
                fputcsv($output, $temp);
                $pagesrl_no++;
            }
            
            die;
        }
        
        
        $page_srl = 1;
        foreach ($rResult as $key => $aRow) {
            
            $row = array();
            
            for ($i = 0; $i < count($aColumns); $i++) {
                
                switch ($aColumns[$i]) {
                    
                    case 'sr_no':
                        
                        $row[]    = $page_srl;
                        $page_srl = $page_srl + 1;
                        break;
                    
                    case 'first_name':
                        
                        $row[] = $aRow['c_firstname'];
                        break;
                    
                    case 'last_name':
                        
                        $row[] = $aRow['c_lastname'];
                        break;
                    
                    case 'email_id':
                        
                        $row[] = $aRow['c_emailid'];
                        break;
                    
                    case 'address':
                        
                        $row[] = $aRow['c_address'];
                        break;
                    case 'zip_code':
                        
                        $row[] = $aRow['c_zipcode'];
                        break;
                    
                    case 'zip_code':
                        
                        $row[] = $aRow['c_zipcode'];
                        break;
                    
                    case 'telephone_no':
                        
                        $row[] = $aRow['c_telephoneno'];
                        break;
                    
                    case 'DOB':
                        
                        $c_dob = date('d-m-Y', strtotime($aRow['c_dob']));
                        $row[] = $c_dob;
                        break;
                    
                    case 'status':
                        
                        $is_active = $aRow['is_active'];
                        if ($is_active == 1) {
                            $row[] = "Active";
                        } else {
                            $row[] = "Inactive";
                        }
                        break;
                    case 'action':
                        $c_id = $aRow['c_id'];
                        
                        $action = "";
                        $url    = base_url() . "User_management/addUser/" . $c_id;
                        $action .= '<a href="' . $url . '"><span style="color:red" class="glyphicon glyphicon-edit"></span></a>&nbsp;&nbsp;';
                        
                        $action .= '<a href="#" onclick="delete_user(' . $c_id . ');"><span style="color:red" class="glyphicon glyphicon-trash"></span></a>';
                        
                        $is_active = $aRow['is_active'];
                        if ($is_active == 1) {
                            $action .= '&nbsp;&nbsp;<a href="#" onclick="Deactivate(' . $c_id . ');">Deactivate</a>';
                            
                        } else {
                            $action .= '&nbsp;&nbsp;<a href="#" onclick="Activate(' . $c_id . ');">Activate</a>';
                            
                        }
                        $row[] = $action;
                        break;
                        
                        
                }
            }
            
            $output['aaData'][] = $row;
        }
        
        echo json_encode($output);
    }
    
}
