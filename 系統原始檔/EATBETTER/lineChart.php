<html>
<head>
<meta charset="UTF-8" />
<title>身體指標變化折線圖</title>

<?php
	session_start();
//	$id = $_GET["id"];
	require_once("dbtools.inc.php");
	//建立資料連接
    $link = create_connection();
    //執行 SQL 命令
//    $sql="SELECT * FROM record WHERE id='".$id."' ORDER BY date DESC";
    $sql = "SELECT R.* FROM RECORD R JOIN USERS U ON R.ID=U.ID WHERE U.ACCOUNT_NUMBER='".$_SESSION['account_number']."' ORDER BY date";
    $result = execute_sql($link, "eatbetter", $sql);
	
	// 实例2： 包含 x 和 y 的形式
	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
     // 处理 $row;
         // $datetime = Date("Y-m-d", strtotime( $row["date"]))  ; // 将 Unix 时间戳转换成 JavaScript 时间戳
             $datetime = (strtotime($row["date"])+ 86400)*1000 ;//在时间戳的基础上加一天(即60*60*24)-> +86400
	 $value = $row["bmi"];
         $data[] = "[$datetime,$value]";

        
  }
$dataString = join(',',$data );
  // 转换成字符串，最终的数据格式是： [ [时间戳，值], [时间戳，值], [时间戳，值] ]


echo "<hr/>";

	?>
<style>
            /* css 代码  */
        </style>
        <script src="https://code.highcharts.com.cn/jquery/jquery-1.8.3.min.js"></script>
        <script src="https://code.highcharts.com.cn/highstock/highstock.js"></script>
        <script src="https://code.highcharts.com.cn/highcharts/modules/exporting.js"></script>
        <script src="https://code.highcharts.com.cn/highcharts/modules/data.js"></script>
        <script src="https://code.highcharts.com.cn/highcharts/modules/series-label.js"></script>
        <script src="https://code.highcharts.com.cn/highcharts/modules/oldie.js"></script>
        <script src="https://code.highcharts.com.cn/highcharts-plugins/highcharts-zh_CN.js"></script>
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
		  
    
<div id="container" style="width: 310px; height: 380px; margin: 0 auto;float: left;"></div>
<script language="JavaScript">

$(document).ready(function() {
   //图表类型
   var chart = {
      type: 'spline'
   };
   //标题
   var title = {
      text:  '身體指標變化情况(BMI)'
   };
   //副标题
   var subtitle = {
      text: ''
   };
   //X轴
   var xAxis = {
       
      type: 'datetime',
////      categories : ['2019/1/6','2019/7/30','2020/1/21','2020/7/3']
//      dateTimeLabelFormats: { // don't display the dummy year
//         month: '%e. %b',
//		 year: '%Y'
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
   };
   var  scrollbar = {
		enabled: true
		};
   //Y轴
   var yAxis = {
      title: {
         text: 'BMI'
      },
      min: 0,
      crosshair: true
   };
   //提示
   var tooltip = {
//       formatter: function () {
//				return '<b>' + this.series.name + '</b><br/>' +
//				Highcharts.dateFormat('%Y-%m-%d', this.x) + ': ' + this.y.toFixed(2)+'<br/>';
//			}
//var tooltip =  { headerFormat:  '<b>{series.name}</b><br>', pointFormat:  '{point.x:%e. %b}: {point.y:.2f} m'  }; 
      headerFormat: '<b>{series.name}</b><br>',
      pointFormat: '{point.x: %Y-%m-%d}: {point.y:.3f}'
   };
   //数据点选项
   var plotOptions = {
      spline: {
         marker: {
            enabled: true
         }
      }
   };

   var series= [{
         name: '2018-2019',
            // Define the data points. All series have a dummy year
            // of 1970/7/1 in order to be compared on the same x axis. Note
            // that in JavaScript, months start at 0 for January, 1 for February etc.
          
         data:[  <?php echo $dataString; ?>  ]
                   
//                    [Date.parse('2018-09-01'), 0 ],
//			[Date.parse('2018-09-18'), 0 ],
//			[Date.parse('2018-09-26'), 20],
//			[Date.parse('2018-11-01'), 20],
//			[Date.parse('2018-11-11'), 20],
//			[Date.parse('2018-11-25'), 21],
//			[Date.parse('2019-01-08'), 20],
//			[Date.parse('2019-01-15'), 20]]
      }
      
   ];
 
   var json = {};
   json.chart = chart;
   json.title = title;
   json.subtitle = subtitle;
   json.tooltip = tooltip;
   json.xAxis = xAxis;
   json.scrollbar = scrollbar;
   json.yAxis = yAxis;
   json.series = series;
   json.plotOptions = plotOptions;
   $('#container').highcharts(json);
 
});
</script>
<?php mysqli_close($link); ?>

</body>
</html>