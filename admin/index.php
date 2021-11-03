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
                        <h2>Chào mừng admin</h2>
                    </div>
                    <div class='card-body'> 
                        <!-- demo -->
                        <div class="hihi">
                          <div class="col-md-3 me-5 mb-4 btn text " style="background: #916BBF; color:#fff; border-radius: 12px">
                            <?php
                              $counths = mysqli_query($conn, "select count(UserID) as counths from users where UserRoll = 'Học sinh'");
                              $row_counths = mysqli_fetch_assoc($counths);
                            ?>
                            <div class="fw-bold fs-5 text"><?php echo $row_counths['counths'] ?> </div>
                            Học sinh <br>
                            <i class="fas fa-user-friends"></i>
                          </div>

                          <div class="col-md-3 me-5 mb-4 btn" style="background: #5F939A; color:#fff;border-radius: 12px ">
                            <?php
                              $countgv = mysqli_query($conn, "select count(UserID) as countgv from users where UserRoll = 'Giáo viên'");
                              $row_countgv = mysqli_fetch_assoc($countgv);
                            ?>
                            <div class="fw-bold fs-5 text"><?php echo $row_countgv['countgv'] ?> </div>
                            Giáo viên  <br>
                            <i class="fas fa-chalkboard-teacher"></i>
                          </div>

                          <div class="col-md-3 me-5 mb-4 btn" style="background: #9F5F80; color:#fff;border-radius: 12px ;">
                            <?php
                              $countph = mysqli_query($conn, "select count(UserID) as countph from users where UserRoll = 'Phụ huynh'");
                              $row_countph = mysqli_fetch_assoc($countph);
                            ?>
                            <div class="fw-bold fs-5 text"><?php echo $row_countph['countph'] ?> </div>
                            Phụ huynh <br>
                            <i class="fas fa-people-arrows"></i>     
                          </div>
                        </div>
                        <!-- CALENDAR-->
                        <div class="calendar">

                            <?php
                              $sql_avg = "select avg(MidTerm) as mid, avg(FinalExam) as final from transcript group by Student_UserID";
                              $res_avg = mysqli_query($conn, $sql_avg);
                              $A = 0; $B = 0; $C = 0; $D = 0; $F = 0;

                              if(mysqli_num_rows($res_avg)>0){
                                while($row_avg = mysqli_fetch_assoc($res_avg)){
                                  $avg = ($row_avg['mid'] + $row_avg['final'])/2;
                                  if($avg>8.5){$A++;}
                                  else if($avg>7){$B++;}
                                  else if($avg>5.5){$C++;}
                                  else if($avg>4){$D++;}
                                  else{$F++;}
                                }
                              }
                              $dataPoints = array(
                                array("x" => 1, "y" => $F, "label" => "F"),
                                array("x" => 2, "y" => $D, "label" => "D"),
                                array("x" => 3, "y" => $C, "label" => "C"),
                                array("x" => 4, "y" => $B, "label" => "B"),
                                array("x" => 5, "y" => $A, "label" => "A"));
                              
                              $sql_counths = "select ClassGrade, count(UserID) as counths from users, class where users.UserRoll ='Học sinh' and users.UserClass = class.ClassID GROUP by class.ClassGrade";
                              $res_counths = mysqli_query($conn, $sql_counths);

                              if(mysqli_num_rows($res_counths)>0){
                                $hsk10 = 0; $hsk11 = 0; $hsk12 = 0;
                                while($row_counths = mysqli_fetch_assoc($res_counths)){
                                  if($row_counths['ClassGrade']==10){$hsk10 = $row_counths['counths'];}
                                  else if($row_counths['ClassGrade']==11){$hsk11 = $row_counths['counths'];}
                                  else if($row_counths['ClassGrade']==12){$hsk12 = $row_counths['counths'];}
                                }
                              }

                              $dataPoints1 = array(
                                array("label"=> "Khối 10", "y"=> $hsk10),
                                array("label"=> "Khối 11", "y"=> $hsk11),
                                array("label"=> "Khối 12", "y"=> $hsk12));

                              $sql_countgv = "select ClassGrade, count(Teacher_UserID) as countgv from teach, class where teach.ClassID = class.ClassID GROUP by teach.Teacher_UserID, class.ClassGrade";
                              $res_countgv = mysqli_query($conn, $sql_countgv);

                              if(mysqli_num_rows($res_countgv)>0){
                                $gvk10 = 0; $gvk11 = 0; $gvk12 = 0;
                                while($row_countgv = mysqli_fetch_assoc($res_countgv)){
                                  if($row_countgv['ClassGrade']==10){$gvk10 = $row_countgv['countgv'];}
                                  else if($row_countgv['ClassGrade']==11){$gvk11 = $row_countgv['countgv'];}
                                  else if($row_countgv['ClassGrade']==12){$gvk12 = $row_countgv['countgv'];}
                                }
                              }

                              $dataPoints2 = array(
                                array("label"=> "Khối 10", "y"=> $gvk10),
                                array("label"=> "Khối 11", "y"=> $gvk11),
                                array("label"=> "Khối 12", "y"=> $gvk12));   
                                
                              $sql_countph = "select ClassGrade, count(users.UserID) as countph from users as users, users as users1, class where users.UserRoll = 'Phụ huynh' and users.UserChild = users1.UserID and users1.UserClass = class.ClassID group by ClassGrade";
                              $res_countph = mysqli_query($conn, $sql_countph);

                              if(mysqli_num_rows($res_countph)>0){
                                $phk10 = 0; $phk11 = 0; $phk12 = 0;
                                while($row_countph = mysqli_fetch_assoc($res_countph)){
                                  if($row_countph['ClassGrade']==10){$phk10 = $row_countph['countph'];}
                                  else if($row_countph['ClassGrade']==11){$phk11 = $row_countph['countph'];}
                                  else if($row_countph['ClassGrade']==12){$phk12 = $row_countph['countph'];}
                                }
                              }

                              $dataPoints3 = array(
                                array("label"=> "Khối 10", "y"=> $phk10),
                                array("label"=> "Khối 11", "y"=> $phk11),
                                array("label"=> "Khối 12", "y"=> $phk12));
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
		name: "Học sinh",
		indexLabel: "{y}",
		showInLegend: true,
		dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
	},{
		type: "column",
		name: "Giáo viên",
		indexLabel: "{y}",
		showInLegend: true,
		dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
	},
    {
		type: "column",
		name: "Phụ huynh",
		indexLabel: "{y}",
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
		text: "BIEU DO DIEM"
	},
	data: [{
		type: "spline",
		markerSize: 8,
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