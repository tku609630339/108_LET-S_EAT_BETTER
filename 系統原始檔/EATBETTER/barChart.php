<html>
<head>
<meta charset="utf-8"><link rel="icon" href="https://jscdn.com.cn/highcharts/images/favicon.ico">
        <meta name="viewport" content="width=device-width, initial-scale=1">
<title>身體指標變化長條圖</title>

<?php
	session_start();
//	$id = $_GET["id"];
	require_once("dbtools.inc.php");
	//建立資料連接
    $link = create_connection();
    //執行 SQL 命令
//    $sql="SELECT * FROM record WHERE id='".$id."' ORDER BY date DESC";
    $sql = "SELECT R.* FROM RECORD R JOIN USERS U ON R.ID=U.ID WHERE U.ACCOUNT_NUMBER='".$_SESSION['account_number']."'";
    $result = execute_sql($link, "eatbetter", $sql);
	
	// 实例2： 包含 x 和 y 的形式
	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
     // 处理 $row;
         // $datetime = Date("Y-m-d", strtotime( $row["date"]))  ; // 将 Unix 时间戳转换成 JavaScript 时间戳
             $datetime = (strtotime($row["date"])+ 86400)*1000 ;//在时间戳的基础上加一天(即60*60*24)-> +86400
	 $value = $row["heat"];
         $data[] = "[$datetime,$value]";

        
  }
$dataString = join(',',$data );
  // 转换成字符串，最终的数据格式是： [ [时间戳，值], [时间戳，值], [时间戳，值] ]


echo "<hr/>";

	?>
<style>
            /* css 代码  */
			
			
			
			
        </style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
       <script src="https://code.highcharts.com.cn/highstock/highstock.js"></script>
        <script src="https://code.highcharts.com.cn/highcharts/modules/exporting.js"></script>
        <script src="https://img.hcharts.cn/highcharts-plugins/highcharts-zh_CN.js"></script>
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
    
    <div id="container" style="width: 310px;height:380px; margin: 0 auto;float: left;"></div>
    
    <script>
            // JS 代码 
            
            var chart = Highcharts.chart('container',{
    chart: {
        type: 'column'
    },
    title: {
        text: '身體指標變化情况(熱量)'
    },
    subtitle: {
//        text: '数据来源: WorldClimate.com'
    },
    xAxis: {
        
        type: 'datetime',
                        labels: {
                            step: 2,
                            staggerLines: 1,
				formatter: function () {
				return Highcharts.dateFormat('%Y-%m-%d', this.value);
                                
				}
      }, 
      
      title: {
         text: '日期'
      },
        crosshair: true
    },
    scrollbar : {
			enabled:true
		},
    
    yAxis: {
        // min: 0,
        title: {
            text: '熱量 (大卡)'
        }
    },
    tooltip: {
        // head + 每个 point + footer 拼接成完整的 table
//        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
          headerFormat: '<span style="">{point.x: %Y-%m-%d}</span><table>',
//        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td></br>' +
        pointFormat:'<tr><td style="padding:0"><b>{point.y:.1f} 大卡</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            borderWidth: 0
        }
    },
    series: [
{
         name: '2018-2019',
            // Define the data points. All series have a dummy year
            // of 1970/7/1 in order to be compared on the same x axis. Note
            // that in JavaScript, months start at 0 for January, 1 for February etc.
          
         data:[  <?php echo $dataString; ?>  ]
                   
      }

    ]
});
            
        </script>
    

<?php mysqli_close($link); ?>


		
</body>
</html>