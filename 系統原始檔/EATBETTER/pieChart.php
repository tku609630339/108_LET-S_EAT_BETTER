<html>
<head>
<meta charset="utf-8"><link rel="icon" href="https://jscdn.com.cn/highcharts/images/favicon.ico">
        <meta name="viewport" content="width=device-width, initial-scale=1">
<title>飲食指標圓餅圖</title>

<?php
	session_start();
//	$id = $_GET["id"];
	require_once("dbtools.inc.php");
	//建立資料連接
    $link = create_connection();
    //執行 SQL 命令
//    $sql="SELECT * FROM record WHERE id='".$id."' ORDER BY date DESC";$sql = "SELECT * FROM record WHERE id= (SELECT Max(id) FROM record) ORDER BY date DESC LIMIT 1;";
    $sql = "SELECT R.* FROM RECORD R JOIN USERS U ON R.ID=U.ID WHERE U.ACCOUNT_NUMBER='".$_SESSION['account_number']."' ORDER BY date DESC LIMIT 1";
    $result = execute_sql($link, "eatbetter", $sql);


echo "<hr/>";

	?>
<style>
            /* css 代码  */
			
			
			
			
        </style>
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com.cn/highcharts/themes/grid-light.js"></script>
<script src="https://code.highcharts.com.cn/highcharts/themes/sand-signika.js"></script>

         
</head>


<body>
    <table style='border:1px #0000FF dashed;' cellpadding='10' border='1'>
    <tr bgcolor="yellow" align="center">
<td><a href='welcome.php'>回會員區主頁</a></td>

<!--  <td><a href='record.php'>回到 [我的紀錄]</a>-->
    </td><td><a href='logout.php'>logout</a></td>
</tr>

</table>
    
    <div id="container" style="width: 310px; height: 500px;margin: 0 auto;float: left;"></div>
    <?php 
    $sql = "SELECT R.* FROM RECORD R JOIN USERS U ON R.ID=U.ID WHERE U.ACCOUNT_NUMBER='".$_SESSION['account_number']."' ORDER BY date DESC LIMIT 1";
    $result = execute_sql($link, "eatbetter", $sql);
  $row1 = mysqli_fetch_array($result, MYSQLI_ASSOC);
  ?>
    <script>
            // JS 代码 
            
$(function () {
	$('#container').highcharts({
		chart: {
			plotBackgroundColor: null,
			plotBorderWidth: null,
			plotShadow: false
		},
		title: {
			text: '飲食指標圓餅圖'
		},
		tooltip: {
			headerFormat: '{series.name}<br>',
			pointFormat: '{point.name}: <b>{point.percentage:.1f}% ,值: {point.y} </b>'
		}
                ,
		plotOptions: {
			pie: {
				allowPointSelect: true,
				cursor: 'pointer',
				dataLabels: {
					enabled: false,// true
//					 通过 format 或 formatter 来格式化数据标签显示
//					format: '值: {point.y} 占比 {point.percentage} %',
					formatter: function() {
						//this 为当前的点（扇区）对象，可以通过  console.log(this) 来查看详细信息
//						return '<span style="color: ' + this.point.color + '"> 值：' + this.y + '，占比' + this.percentage + '%</span>';
                                                return '<span style="color: ' + this.point.color + '"> 值：' + this.y +'</span>';
					}
				},
				showInLegend: true  // 显示在图例中
			}
		}
                ,
		series: [{
			type: 'pie',
			name: '營養成分占比',
			data: [
                                
				['脂肪值(g)',   <?php echo $row1["fat"];?>],
                                
				['蛋白質(g)',       <?php echo $row1["protein"];?>],
				 
				['碳水化合物(g)',    <?php echo $row1["carbo"];?>],
                               
				['膳食纖維(g)',     <?php echo $row1["fiber"];?>],
                                {
					name: '水分(g)',
					y: <?php echo $row1["water"];?>,
					sliced: true,
                                        selected: true
				}
				
			]
		}]
	});
});



        </script>
    

<?php mysqli_close($link); ?>


		
</body>
</html>