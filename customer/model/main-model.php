<?php
function index()
{
    $search = '';
    if (isset($_POST['search'])) {
        $search = $_POST['search'];
    }
    $page = 1;
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    }
    include_once 'connect/openConnect.php';
    $sqlCount = "SELECT COUNT(*) AS count_record FROM product WHERE product_name LIKE '%$search%'";
    $counts = mysqli_query($connect, $sqlCount);
    foreach ($counts as $each) {
        $countRecord = $each['count_record'];
    }
    $recordOnePage = 6;
    $countPage = ceil($countRecord / $recordOnePage);
    $start = ($page - 1) * $recordOnePage;
    $end = 6;
    $sql = "SELECT product.*, publishing_company.publishing_company_name, author.name_author, category.name_category FROM product INNER JOIN publishing_company ON product.id_publishing_company = publishing_company.id_publishing_company INNER JOIN author ON product.id_author = author.id_author INNER JOIN category ON product.id_category = category.id_category WHERE product_name LIKE '%$search%' LIMIT $start, $end";
    $product = mysqli_query($connect, $sql);
    include_once 'connect/closeConnect.php';
    $array = array();
    $array['search'] = $search;
    $array['infor'] = $product;
    $array['page'] = $countPage;
    return $array;
}
function tl()
{
    $tl = $_GET['tl'];
    $page = 1;
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    }
    include_once 'connect/openConnect.php';
    $sqlCount = "SELECT COUNT(*) AS count_record FROM product WHERE id_category = '$tl'";
    $counts = mysqli_query($connect, $sqlCount);
    foreach ($counts as $each) {
        $countRecord = $each['count_record'];
    }
    $recordOnePage = 6;
    $countPage = ceil($countRecord / $recordOnePage);
    $start = ($page - 1) * $recordOnePage;
    $end = 6;
    $sql = "SELECT * FROM product WHERE id_category = '$tl' LIMIT $start, $end";
    $product = mysqli_query($connect, $sql);
    include_once 'connect/closeConnect.php';
    $arr = array();
    $arr['infor'] = $product;
    $arr['page'] = $countPage;
    return $arr;
}
$action = '';
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}

switch ($action) {
    case '':
        //lấy dữ liệu từ db
        $array = index();
        break;
    case 'findtl':
        $array = tl();
        break;
}
