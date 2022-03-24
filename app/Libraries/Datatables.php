<?php namespace App\Libraries;

class Datatables
{
    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    function BuildDatatables($query, $where = NULL, $isWhere, $cari){
        $search = htmlspecialchars($_POST['search']['value']);
        // Ambil data limit per page
        $limit = $_POST['length'];
        $start = $_POST['start'];
        // Untuk menentukan order by "ASC" atau "DESC"
        $order_field = $_POST['order'][0]['column']; 
        $order_ascdesc = $_POST['order'][0]['dir']; 
        $order = " ORDER BY ".$_POST['columns'][$order_field]['data']." ".$order_ascdesc;

        $setWhere = array();
        foreach ($where as $key => $value)
        {
            $setWhere[] = $key."='".$value."'";
        }
        $fwhere = implode(' AND ', $setWhere);
        $cari = implode(" LIKE '%".$search."%' OR ", $cari)." LIKE '%".$search."%'";
        $builder = $this->db->query($query)->getResultArray();
        $recordTotal = count($builder);
        // var_dump(count($builder));
        if(empty($search))
        {            
            // LIMIT ".$limit." OFFSET ".$start 
            if(!empty($where)){
                if(!empty($isWhere)){
                    $sql = $query." WHERE $fwhere $isWhere $order LIMIT $limit OFFSET $start";
                }else{
                    $sql = $query." WHERE $isWhere $order LIMIT $limit OFFSET $start";
                }
            }else{
                if(!empty($isWhere)){
                    $sql = $query." WHERE $isWhere $order LIMIT $limit OFFSET $start";
                }else{
                    $sql = $query."  $order LIMIT $limit OFFSET $start";
                }
            }
            $builder = $this->db->query($sql);
            $data = $builder->getResultArray();
            $recordTotalFiltered =  count($data);
        }
        else {
            if(!empty($where)){
                if(!empty($isWhere)){
                    $sql = $query." WHERE $fwhere $isWhere AND (".$cari.") $order LIMIT $limit OFFSET $start";
                }else{
                    $sql = $query." WHERE $fwhere AND (".$cari.") $order LIMIT $limit OFFSET $start";
                }
            }else{
                if(!empty($isWhere)){
                    $sql = $query." WHERE $fwhere $isWhere AND (".$cari.") $order LIMIT $limit OFFSET $start";
                }else{
                    $sql = $query." WHERE $isWhere AND (".$cari.") $order LIMIT $limit OFFSET $start";
                }
            }
            $builder = $this->db->query($sql);
            $data = $builder->getResultArray();
            $recordTotalFiltered =  count($data);
        }

        $callback = array(    
                        'draw'              => intval($_POST['draw']), // Ini dari datatablenya    
                        'recordsTotal'      => intval($recordTotal),    
                        'recordsFiltered'   => intval($recordTotalFiltered),    
                        'data'              => $data,
                    );
        $csrf_name = csrf_token();
        $csrf_hash = csrf_hash();
        $callback[$csrf_name] = $csrf_hash;   
        echo json_encode($callback); // Convert array $callback ke json
    }
} 