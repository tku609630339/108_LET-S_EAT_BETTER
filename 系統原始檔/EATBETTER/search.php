
<html lang="zh-TW">

<head>
    <meta charset="UTF-8">
    <script type="text/javascript">
      
    </script>		
<style>
*{
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
}
body{
    font-family: Helvetica;
    -webkit-font-smoothing: antialiased;
    background: rgba( 71, 147, 227, 1);
}
h2{
    text-align: center;
    font-size: 18px;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: white;
    padding: 30px 0;
}

/* Table Styles */

.table-wrapper{
    margin: 10px 10px 10px;
    box-shadow: 0px 35px 50px rgba( 0, 0, 0, 0.2 );
}

.fl-table {
    border-radius: 5px;
    font-size: 12px;
    font-weight: normal;
    border: none;
    border-collapse: collapse;
    width: 100%;
    max-width: 100%;
    white-space: nowrap;
    background-color: white;
}

.fl-table td, .fl-table th {
    text-align: center;
    padding: 8px;
}

.fl-table td {
    border-right: 1px solid #f8f8f8;
    font-size: 12px;
}

.fl-table thead th {
    color: #ffffff;
    background: #4FC3A1;
}


.fl-table thead th:nth-child(odd) {
    color: #ffffff;
    background: #324960;
}

.fl-table tr:nth-child(even) {
    background: #F8F8F8;
}

/* Responsive */

@media (max-width: 467px) {
    .fl-table {
        /*display: block;*/
        width: 100%;
    }

    .fl-table thead, .fl-table tbody, .fl-table thead th {
        /*display: block;*/
    }
    .fl-table thead th:last-child{
        border-bottom: none;
    }
    .fl-table thead {
        float: left;
    }
    .fl-table tbody {
        width: auto;
        position: relative;
        overflow-x: auto;
    }
    .fl-table td, .fl-table th {
        padding: 20px .625em .625em .625em;
        height: 60px;
        vertical-align: middle;
        box-sizing: border-box;
        overflow-x: hidden;
        overflow-y: auto;
        width: 45px;
        font-size: 13px;
        text-overflow: ellipsis;
    }
    .fl-table thead th {
        text-align: left;
        border-bottom: 1px solid #f7f7f9;
    }
    .fl-table tbody tr {
        /*display: table-cell;*/
    }
    .fl-table tbody tr:nth-child(odd) {
        background: none;
    }
    .fl-table tr:nth-child(even) {
        background: transparent;
    }
    .fl-table tr td:nth-child(odd) {
        background: #F8F8F8;
        border-right: 1px solid #E6E4E4;
    }
    .fl-table tr td:nth-child(even) {
        border-right: 1px solid #E6E4E4;
    }
    .fl-table tbody td {
        /*display: block;*/
        text-align: center;
    }
}
</style>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>

<?php

// 定義資料庫資訊
$DB_NAME = "eatbetter";
$DB_USER = "chia";
$DB_PASS = "mypassword";
$DB_HOST = "localhost";

// 連接 MySQL 資料庫伺服器
$link = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS);
if (empty($link)) {
    print mysqli_error($link);
    die("資料庫連接失敗！");
    exit;
}

// 選取資料庫
if (!mysqli_select_db($link, $DB_NAME)) {
    die("選取資料庫失敗！");
}

// 設定連線編碼
mysqli_query($link, "SET NAMES utf8");
//取得記錄數
$sql_tot = "SELECT * FROM food";
$result_tot = mysqli_query($link, $sql_tot);
$total_records = mysqli_num_rows($result_tot);
//echo "總共有 ".$total_records." 筆記錄";
// 顯示表頭
echo "<div class='table-wrapper'>
    <table width='300' class='fl-table'>";

//echo "<th></th>";
echo "<th>(編號)名稱</th>";
echo "<th>分類</th>";

if (isset($_GET['s'])) { // 如果有搜尋文字顯示搜尋結果

    $s = mysqli_real_escape_string($link, $_GET['s']);
//    $sql = "SELECT * FROM food WHERE CONCAT(IFNULL(`識別碼`,''),IFNULL(`樣品名稱`,''),IFNULL(`食品分類`,'')) LIKE ‘%關鍵字%’;--->模糊搜尋
    $sql = "SELECT * FROM food WHERE CONCAT(IFNULL(`識別碼` , ''),IFNULL(`樣品名稱`,''),IFNULL(`食品分類`,'')) LIKE '%".$s."%'";
    $result = mysqli_query($link, $sql);
$total_records = mysqli_num_rows($result);
echo "<tr><td colspan='3' bgcolor='#99FF99'>總共有 ".$total_records." 筆記錄</td></tr>";
    // SQL 搜尋錯誤訊息
    if (!$result) {
        echo ("錯誤：" . mysqli_error($link));
        exit();
//         echo "<tr><td colspan='4'>關鍵字錯誤</td></tr>";
    

    // 搜尋無資料時顯示「查無資料」
    }
    if (mysqli_num_rows($result) == 0) {
        echo "<tr><td colspan='4'>查無資料</td></tr>";
    }

    // 搜尋有資料時顯示搜尋結果
    while ($row = mysqli_fetch_array($result)) {
        echo "<tr><td>(".$row["識別碼"] . ")".$row["樣品名稱"] . "</td>";
//        echo "<td>".$row["樣品名稱"] . "</td>";
        echo "<td>". $row["食品分類"] . "</td>";
        echo  "<tr><td>熱量 :" . $row["熱量-成分值(kcal)"] . "</td>";
        echo "<td><details><summary>成分</summary>";
		echo "<hr>內容物描述 :".$row["內容物描述"] . "<hr>";
		echo  "水分 :" . $row["水分-成分值(g)"] . "(g)<hr>";
		echo  "粗蛋白 :" . $row["粗蛋白-成分值(g)"] . "(g)<hr>";
		echo "粗脂肪 :" . $row["粗脂肪-成分值(g)"] . "(g)<hr>";
//		echo "<td>" . $row["灰分-成分值(g)"] . "</td>";
		echo  "總碳水化合物 :" . $row["總碳水化合物-成分值(g)"] . "(g)<hr>";
		echo "膳食纖維 :" . $row["膳食纖維-成分值(g)"] . "(g)<hr>";
//		echo  "樣品名稱 :" . $row["糖質總量-成分值(g)"] . "</br>";
		echo "鈉 :" . $row["鈉-成分值(mg)"] . "(mg)<hr>";
		echo "鉀 :" . $row["鉀-成分值(mg)"] . "(mg)<hr>";
		echo  "鈣 :" . $row["鈣-成分值(mg)"] . "(mg)<hr>";
		echo "鎂 :" . $row["鎂-成分值(mg)"] . "(mg)<hr>";
		echo "磷 :" . $row["磷-成分值(mg)"] . "(mg)<hr>";
		echo "鐵 :" . $row["鐵-成分值(mg)"] . "(mg)<hr>";
		echo "鋅 :" . $row["鋅-成分值(mg)"] . "(mg)<hr>";
		echo  "維生素B1 :" . $row["維生素B1-成分值(mg)"] . "(mg)<hr>";
		echo  "維生素B2 :" . $row["維生素B2-成分值(mg)"] . "(mg)<hr>";
//		echo "<td>" . $row["菸鹼素-成分值(mg)"] . "</td>";
//		echo "<td>" . $row["維生素B6-成分值(mg)"] . "</td>";
//		echo "<td>" . $row["維生素B12-成分值(ug)"] . "</td>";
//		echo "<td>" . $row["葉酸-成分值(ug)"] . "</td>";
		echo "維生素C :" . $row["維生素C-成分值(mg)"] . "(mg)</td></tr></details>";
	
	


//        echo "</tr>";
    }

} else { // 如果沒有搜尋文字顯示所有資料

    $sql = "SELECT * FROM food";
    $result = mysqli_query($link, $sql);
$total_records = mysqli_num_rows($result);
echo "<tr><td colspan='3' bgcolor='#99FF99'>總共有 ".$total_records." 筆記錄</td></tr>";
    if (!$result) {
        echo ("錯誤：" . mysqli_error($link));
        exit();
    }

    /* while ($row = mysqli_fetch_array($result)) {
        echo "<tr><td>(".$row["識別碼"] . ")".$row["樣品名稱"] . "</td>";
//        echo "<td>".$row["樣品名稱"] . "</td>";
        echo "<td>" . $row["食品分類"] . "</td>";
        echo  "<tr><td>熱量 :" . $row["熱量-成分值(kcal)"] . "</td>";
        echo "<td><details><summary>成分</summary>";
		echo "<hr>內容物描述 :".$row["內容物描述"] . "<hr>";
		echo  "水分 :" . $row["水分-成分值(g)"] . "(g)<hr>";
		echo  "粗蛋白 :" . $row["粗蛋白-成分值(g)"] . "(g)<hr>";
		echo "粗脂肪 :" . $row["粗脂肪-成分值(g)"] . "(g)<hr>";
//		echo "<td>" . $row["灰分-成分值(g)"] . "</td>";
		echo  "總碳水化合物 :" . $row["總碳水化合物-成分值(g)"] . "(g)<hr>";
		echo "膳食纖維 :" . $row["膳食纖維-成分值(g)"] . "(g)<hr>";
//		echo  "樣品名稱 :" . $row["糖質總量-成分值(g)"] . "</br>";
		echo "鈉 :" . $row["鈉-成分值(mg)"] . "(mg)<hr>";
		echo "鉀 :" . $row["鉀-成分值(mg)"] . "(mg)<hr>";
		echo  "鈣 :" . $row["鈣-成分值(mg)"] . "(mg)<hr>";
		echo "鎂 :" . $row["鎂-成分值(mg)"] . "(mg)<hr>";
		echo "磷 :" . $row["磷-成分值(mg)"] . "(mg)<hr>";
		echo "鐵 :" . $row["鐵-成分值(mg)"] . "(mg)<hr>";
		echo "鋅 :" . $row["鋅-成分值(mg)"] . "(mg)<hr>";
		echo  "維生素B1 :" . $row["維生素B1-成分值(mg)"] . "(mg)<hr>";
		echo  "維生素B2 :" . $row["維生素B2-成分值(mg)"] . "(mg)<hr>";
//		echo "<td>" . $row["菸鹼素-成分值(mg)"] . "</td>";
//		echo "<td>" . $row["維生素B6-成分值(mg)"] . "</td>";
//		echo "<td>" . $row["維生素B12-成分值(ug)"] . "</td>";
//		echo "<td>" . $row["葉酸-成分值(ug)"] . "</td>";
		echo "維生素C :" . $row["維生素C-成分值(mg)"] . "(mg)</td></tr></details>";
	
	


//        echo "</tr>";
    } */

}

echo "</table>"
. "</div>";

mysqli_close($link); // 連線結束

?>
   
</body>

</html>