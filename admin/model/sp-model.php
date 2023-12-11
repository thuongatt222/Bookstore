<?php
//function lấy dữ liệu từ db
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
    $recordOnePage = 5;
    $countPage = ceil($countRecord / $recordOnePage);
    $start = ($page - 1) * $recordOnePage;
    $end = 5;
    $sql = "SELECT product.*, publishing_company.publishing_company_name, author.name_author, category.name_category FROM product INNER JOIN publishing_company ON product.id_publishing_company = publishing_company.id_publishing_company INNER JOIN author ON product.id_author = author.id_author INNER JOIN category ON product.id_category = category.id_category WHERE product_name LIKE '%$search%' LIMIT $start, $end";
    $product = mysqli_query($connect, $sql);
    include_once 'connect/closeConnect.php';
    $array = array();
    $array['search'] = $search;
    $array['infor'] = $product;
    $array['page'] = $countPage;
    return $array;
}
function addProduct()
{
    include_once 'connect/openConnect.php';
    $sql = "SELECT * FROM category";
    $category = mysqli_query($connect, $sql);
    $sqlauthor = "SELECT * FROM author";
    $author = mysqli_query($connect, $sqlauthor);
    $sqlpublis = "SELECT * FROM publishing_company";
    $publis = mysqli_query($connect, $sqlpublis);
    include_once 'connect/closeConnect.php';
    $arr = array();
    $arr['category'] = $category;
    $arr['author'] = $author;
    $arr['publis'] = $publis;
    return $arr;
}

//function lưu dữ liệu lên db

function store()
{

    $name = $_POST['name'];
    $page = $_POST['page'];
    $price = $_POST['price'];
    $size = $_POST['size'];
    // $date = $_POST['date'];
    $dates = strtotime($_POST['date']);
    $date = $_POST['date'];
    $describes = $_POST['describes'];
    $img = $_POST['img'];
    $category = $_POST['category_id'];
    $author = $_POST['author_id'];
    $publis = $_POST['publis_id'];
    if ($dates > time()) {
        $message = "Thời gian không phù hợp, Vui lòng sửa lại!";
        echo "<script>alert('$message');</script>";
        return 1; // Publication date is in the future, return 1
    }
    include_once 'connect/openConnect.php';
    $sql_check = "SELECT id_product FROM product WHERE product_name = '$name'";
    $query_check = mysqli_query($connect, $sql_check);
    if (mysqli_num_rows($query_check) > 0) {
        // Product already exists
        $message = "Tên sản phẩm đã tồn tại, Vui lòng sửa lại!";
        echo "<script>alert('$message');</script>";
        return 1;
    } else {
        // Insert new product
        $sql = "INSERT INTO product (product_name, image, publication_date, number_of_pages, size, price_product, describes, id_publishing_company, id_category, id_author)
                VALUES ('$name', '$img', '$date', '$page', '$size', '$price', '$describes', '$publis', '$category', '$author')";
        mysqli_query($connect, $sql);
        $message = "Thêm sản phẩm thành công!";
        echo "<script>alert('$message');</script>";
        return 0;
    }
    include_once 'connect/closeConnect.php';
}



function editProduct()
{
    //        Lấy id
    $id = $_GET['id'];
    include_once 'connect/openConnect.php';
    $sqlAuthor = "SELECT * FROM author";
    $author = mysqli_query($connect, $sqlAuthor);
    $sqlCategory = "SELECT * FROM category";
    $category = mysqli_query($connect, $sqlCategory);
    $sqlPublis = "SELECT * FROM publishing_company";
    $publis = mysqli_query($connect, $sqlPublis);
    $sql = "SELECT * FROM product WHERE id_product = '$id'";
    $products = mysqli_query($connect, $sql);
    include_once 'connect/closeConnect.php';
    $array1 = array();
    $array1['category'] = $category;
    $array1['author'] = $author;
    $array1['publis'] = $publis;
    $array1['products'] = $products;
    return $array1;
}

function updateProduct()
{
    $id = $_POST['id'];
    $name = $_POST['name'];
    $img = $_POST['img'];
    $page = $_POST['page'];
    $size = $_POST['size'];
    $date = $_POST['date'];
    $describes = $_POST['describes'];
    $price = $_POST['price'];
    $category_id = $_POST['category_id'];
    $author_id = $_POST['author_id'];
    $publis_id = $_POST['publis_id'];
    include_once 'connect/openConnect.php';
    $sql_check = "SELECT id_product FROM product WHERE product_name = '$name'";
    $query_check = mysqli_query($connect, $sql_check);
    if (mysqli_num_rows($query_check) > 1) {
        // Product already exists
        $message = "Tên sản phẩm đã tồn tại, Vui lòng sửa lại!";
        echo "<script>alert('$message');</script>";
        return 1;
    } else {
        // Insert new product
        $sql = "UPDATE product SET product_name = '$name', image = '$img', publication_date = '$date', number_of_pages = '$page', size = '$size', price = '$price', describes = '$describes', id_publishing_company = '$publis_id', id_category = '$category_id', id_author = '$author_id' WHERE id_product = '$id'";
        mysqli_query($connect, $sql);
        $message = "Sửa sản phẩm thành công!";
        echo "<script>alert('$message');</script>";
        return 0;
    }

    include_once 'connect/closeConnect.php';
}
function destroyProduct()
{
    $id = $_GET['id'];
    include_once 'connect/openConnect.php';
    $sql2 = "SELECT id_product FROM bill_detail WHERE id_product = '$id'";
    $check = mysqli_query($connect, $sql2);
    if (mysqli_num_rows($check) > 1) {
        $message = "Sản phẩm đang tồn tại trong mục đơn hàng!";
        echo "<script>alert('$message');</script>";
    } else {
        $sql = "DELETE FROM product WHERE id_product = '$id'";
        mysqli_query($connect, $sql);
        include_once 'connect/closeConnect.php';
        $message = "Xóa sản phẩm thành công!";
        echo "<script>alert('$message');</script>";
    }
}
function detailProduct()
{
    $id = $_GET['id'];
    include_once 'connect/openConnect.php';
    $sql = "SELECT product.*, publishing_company.publishing_company_name, author.name_author, category.name_category FROM product INNER JOIN publishing_company ON product.id_publishing_company = publishing_company.id_publishing_company INNER JOIN author ON product.id_author = author.id_author INNER JOIN category ON product.id_category = category.id_category WHERE id_product = '$id'";
    $product = mysqli_query($connect, $sql);
    include_once 'connect/closeConnect.php';
    return $product;
}
//Lấy hành động đang thực hiện
$action = '';
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}

switch ($action) {
    case '':
        //lấy dữ liệu từ db
        $array = index();
        break;
    case 'add':
        $arr = addProduct();
        break;
    case 'store':
        //lưu dữ liệu lên db
        $test = store();
        break;
    case 'edit':
        $array1 = editProduct();
        break;
    case 'update':
        $check = updateProduct();
        break;
    case 'destroy':
        destroyProduct();
        break;
    case 'detail':
        $product = detailProduct();
        break;
}
