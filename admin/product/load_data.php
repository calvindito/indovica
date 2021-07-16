<?php 
session_start();
$id_vendor = $_SESSION['id'];

require '../../connection.php';

$where_like = [
    'id',
    
    'image',
    'vendor',
    'name',
    'categories',
    'owner',
    'year',
    'price',
    'status'
];

$response = $_REQUEST;
$start    = $response['start'];
$length   = $response['length'];
$order    = $where_like[$response['order'][0]['column']];
$dir      = $response['order'][0]['dir'];
$search   = $response['search']['value'];

$total_data = mysqli_query($conn, "SELECT product.id, adminonline.fullname, category.name as category_name,product.image, product.name , product.category_id, product.owner, product.year, product.price, product.status FROM product join adminonline on vendor_id = adminonline.id join category on category.id = category_id");

if(empty($search)) {
    $query_data = mysqli_query($conn, "SELECT product.id, adminonline.fullname, category.name as category_name,product.image, product.name , product.category_id, product.owner, product.year, product.price, product.status FROM product join adminonline on vendor_id = adminonline.id join category on category.id = category_id  ORDER BY $order $dir LIMIT $start, $length");

    $total_filtered = mysqli_query($conn, "SELECT product.id, adminonline.fullname, category.name as category_name,product.image, product.name , product.category_id, product.owner, product.year, product.price, product.status FROM product join adminonline on vendor_id = adminonline.id join category on category.id = category_id");
} else {
    $query_data = mysqli_query($conn, "SELECT product.id, adminonline.fullname,category.name as category_name, product.image, product.name , product.category_id, product.owner, product.year, product.price, product.status FROM product join adminonline on vendor_id = adminonline.id join category on category.id = category_id where adminonline.fullname LIKE '%$search%' OR product.name LIKE '%$search%' ORDER BY $order $dir LIMIT $start, $length");

    $total_filtered = mysqli_query($conn, "SELECT product.id, adminonline.fullname,category.name as category_name, product.image, product.name , product.category_id, product.owner, product.year, product.price, product.status FROM product join adminonline on vendor_id = adminonline.id join category on category.id = category_id where adminonline.fullname LIKE '%$search%' OR product.name LIKE '%$search%'");
}

$response['data'] = [];
$nomor            = $start + 1;

if($query_data) {
    while($row = mysqli_fetch_assoc($query_data)) {
        
        $foto = explode(',', $row['image']);
        if($foto[0] && file_exists('../../global_assets/images/foto_produk/' . $foto[0] . '')) {
            $gambar = '<img src="../../global_assets/images/foto_produk/' . $foto[0] . '" style="max-width:50px; max-height:50px;">';
        } else {
            $gambar = '<img src="../../global_assets/images/logo3.png" style="max-width:50px; max-height:50px;">';
        }
        if($row['status']=="accepted"){
            $status = '<button class="btn btn-outline-success border-transparent">ACCEPTED</button>';
            $aksi =' <button type="button" onclick="detail(' . $row['id'] . ',2)" class="btn btn-primary btn-sm">Detail</button>';
        }else if($row['status']=="rejected"){
            $status = '<button class="btn btn-outline-danger border-transparent">REJECTED</button>';
            $aksi =' <button type="button" onclick="detail(' . $row['id'] . ',3)" class="btn btn-primary btn-sm">Detail</button>';
        }else{
            $status = '<button class="btn btn-outline-primary border-transparent">REVIEW</button>';
            $aksi = '
                <button type="button" onclick="detail(' . $row['id'] . ',1)" class="btn btn-warning btn-sm">Update</button>
                <button type="button" onclick="hapus(' . $row['id'] . ')" class="btn btn-danger btn-sm">Delete</button>
            ';
        }

        $response['data'][] = [
            $nomor,
            $gambar,
            $row['fullname'],
            $row['name'],
            $row['category_name'],
            $row['owner'],
            $row['year'],
            $row['price'],
            $status,
            $aksi
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