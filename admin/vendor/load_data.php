<?php 
session_start();
$id_vendor = $_SESSION['id'];

require '../../connection.php';

$where_like = [
    'id',
    'fullname',
    'phone',
    'email',
    'address',
    'bank',
    'rekening'
];

$response = $_REQUEST;
$start    = $response['start'];
$length   = $response['length'];
$order    = $where_like[$response['order'][0]['column']];
$dir      = $response['order'][0]['dir'];
$search   = $response['search']['value'];


$total_data = mysqli_query($conn, "SELECT * from adminonline where role = 'vendor'");

if(empty($search)) {
    $query_data = mysqli_query($conn, "SELECT * from adminonline where role = 'vendor'  ORDER BY $order $dir LIMIT $start, $length");

    $total_filtered = mysqli_query($conn, "SELECT * from adminonline where role = 'vendor'");
} else {
    $query_data = mysqli_query($conn, "SELECT * from adminonline where role = 'vendor' AND fullname LIKE '%$search%'  ORDER BY $order $dir LIMIT $start, $length");

    $total_filtered = mysqli_query($conn, "SELECT * from adminonline where role = 'vendor' AND fullname LIKE '%$search%' ");
}

$response['data'] = [];
$nomor            = $start + 1;

if($query_data) {
    while($row = mysqli_fetch_assoc($query_data)) {

        $response['data'][] = [
            $nomor,
            $row['fullname'],
            $row['phone'],
            $row['email'],
            $row['address'],
            $row['bank'],
            $row['rekening']
        ];
        $nomor++;
    }
}

$response['recordsTotal'] = 0;
if($total_data <> FALSE) {
    $response['recordsTotal'] = mysqli_num_rows($total_data);
}

$response['recordsFiltered'] = 0;
if($total_filtered <> FALSE) {
    $response['recordsFiltered'] = mysqli_num_rows($total_filtered);
}


echo json_encode($response);

?>