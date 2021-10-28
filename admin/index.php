<?php include("template/header.php"); ?>

<div class='dashboard'>
    <?php include("template/admin.php");?>

    <!-- bảng -->
    <div class='dashboard-app'>
        <div class='dashboard-toolbar row'>
            <div class="col-5"><a href="#!" class="menu-toggle "><i class="fas fa-bars"></i></a></div>
            <div class="row height d-flex justify-content-center align-items-center col-7">
                <div class="form"> 
                    <i class="fa fa-search"></i> <input type="text" class="form-control form-input" placeholder="Tìm kiếm mọi thứ..."> <span class="left-pan"><i class="fa fa-microphone"></i></span> 
                </div>
            </div>
        </div>
        <div class='dashboard-content'>
            <div class='container'>
                <div class='card'>
                    <div class='card-header'>
                        <h2>Chào mừng admin....</h2>
                    </div>
                    <div class='card-body'> 
                        <!-- demo -->
                        <div class="hihi">
                          <div class="col-md-3 me-5 mb-4 btn text " style="background: #916BBF; color:#fff; border-radius: 12px">
                            <div class="fw-bold fs-5 text">1000 </div>
                            Học sinh <br>
                            <i class="fas fa-user-friends"></i>
                          </div>

                          <div class="col-md-3 me-5 mb-4 btn" style="background: #5F939A; color:#fff;border-radius: 12px ">
                            <div class="fw-bold fs-5 text">100 </div>
                            Giáo viên  <br>
                            <i class="fas fa-chalkboard-teacher"></i>
                          </div>

                          <div class="col-md-3 me-5 mb-4 btn" style="background: #9F5F80; color:#fff;border-radius: 12px ;">
                            <div class="fw-bold fs-5 text">1000 </div>
                            Phụ huynh <br>
                            <i class="fas fa-people-arrows"></i>     
                          </div>
                        </div>
                        <!-- CALENDAR-->
                        <div class="calendar">

                            <?php
                              $dataPoints = array(
                                array("x" => 946665000000, "y" => 3289000),
                                array("x" => 978287400000, "y" => 3830000),
                                array("x" => 1009823400000, "y" => 2009000),
                                array("x" => 1041359400000, "y" => 2840000),
                                array("x" => 1072895400000, "y" => 2396000),
                                array("x" => 1104517800000, "y" => 1613000),
                                array("x" => 1136053800000, "y" => 1821000));
                                $dataPoints1 = array(
                                  array("label"=> "2010", "y"=> 36.12),
                                  array("label"=> "2011", "y"=> 34.87),
                                  array("label"=> "2012", "y"=> 40.30),
                                  
                                );
                                $dataPoints2 = array(
                                  array("label"=> "2010", "y"=> 64.61),
                                  array("label"=> "2011", "y"=> 70.55),
                                  array("label"=> "2012", "y"=> 72.50),
                                  
                                );
                                
                                $dataPoints3 = array(
                                  array("label"=> "2010", "y"=> 36.12),
                                  array("label"=> "2011", "y"=> 34.87),
                                  array("label"=> "2012", "y"=> 40.30),
                                
                                );
                                  
                                ?>
                        <div class="d-flex flex-row ">
                          <div class="shadow-lg p-3 mb-5 bg-white rounded me-3" id="chartContainer" style="height: 280px; width: 48%;"></div>   
                          <div class="shadow-lg p-3 mb-5 bg-white rounded" id="chartContainer1" style="height: 280px; width: 48%;"></div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
window.onload = function () {
    CanvasJS.addColorSet("greenShades",
                [//colorSet Array
                    '#EEB76B',
                    '#E2703A',
                    '#9C3D54'
                ]);
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2",
    colorSet: 'greenShades',
	
	axisY:{
		includeZero: true
	},
	legend:{
		cursor: "pointer",
		verticalAlign: "center",
		horizontalAlign: "right",
		itemclick: toggleDataSeries
	},
	data: [{
		type: "column",
		name: "Real Trees",
		indexLabel: "{y}",
		yValueFormatString: "$#0.##",
		showInLegend: true,
		dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
	},{
		type: "column",
		name: "Artificial Trees",
		indexLabel: "{y}",
		yValueFormatString: "$#0.##",
		showInLegend: true,
		dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
	},
    {
		type: "column",
		name: "Real Trees",
		indexLabel: "{y}",
		yValueFormatString: "$#0.##",
		showInLegend: true,
		dataPoints: <?php echo json_encode($dataPoints3, JSON_NUMERIC_CHECK); ?>
	}]
  
});
chart.render();
 
function toggleDataSeries(e){
	if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
		e.dataSeries.visible = false;
	}
	else{
		e.dataSeries.visible = true;
	}
	chart.render();
};
var chart1 = new CanvasJS.Chart("chartContainer1", {
	animationEnabled: true,
	title:{
		text: "Company Revenue by Year"
	},
	axisY: {

		valueFormatString: "#0,,.",
		suffix: "mn",
		prefix: "$"
	},
	data: [{
		type: "spline",
		markerSize: 5,
		xValueFormatString: "YYYY",
		yValueFormatString: "$#,##0.##",
		xValueType: "dateTime",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart1.render();
 
}
</script>

<?php include("template/footer.php"); ?>
<!-- đoạn xử lý menu toogle -->
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

<script src="JS/admin.js"></script>
