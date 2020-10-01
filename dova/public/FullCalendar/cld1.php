 <?php
ob_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
$iduser=$_SESSION['login'];

require_once('bdd.php');

$sql = "SELECT id, title, start, end, color FROM events where iduser='$iduser' ";

$req = $bdd->prepare($sql);
$req->execute();

$events = $req->fetchAll();

// if (isset($_POST['addevent'])) {
// 	$startdate_hour=$_POST['startdate_hour'];
// $startdate_minute=$_POST['startdate_minute'];
// $start = $_POST['start'];
// // echo $startdate_hour;

// // echo $startdate_minute;

// // echo $start;
// $datestart = $_POST['start'] . " " . $_POST['startdate_hour'] . ":" . $_POST['startdate_minute'];  
// echo $datestart;
// die();

// }

if (isset($_POST['addevent'])) {

	if (isset($_POST['title']) && isset($_POST['start']) && isset($_POST['end']) && isset($_POST['color'])){
	
	$title = $_POST['title'];
	$datestart = $_POST['start'] . " " . $_POST['startdate_hour'] . ":" . $_POST['startdate_minute']; 
	if( $_POST['end']==NULL){
		
		$dateend = $_POST['start'] . " " . $_POST['enddate_hour'] . ":" . $_POST['enddate_minute'];
	}
	else{$dateend = $_POST['end'] . " " . $_POST['enddate_hour'] . ":" . $_POST['enddate_minute'];}


	$color = $_POST['color'];
	// echo $datestart;
	// echo $dateend;
	// die();


	$sql = "INSERT INTO events(title, start, end, color, iduser) values ('$title', '$datestart', '$dateend', '$color','$iduser')";
	//$req = $bdd->prepare($sql);
	//$req->execute();
	
	// echo $sql;
	// die();	
	$query = $bdd->prepare( $sql );
	if ($query == false) {
	 print_r($bdd->errorInfo());
	 die ('Erreur prepare');
	}
	$sth = $query->execute();
	if ($sth == false) {
	 print_r($query->errorInfo());
	  die ('Erreur execute');
	}

}
header('Location: index.php?cld=cld');
}
// edit xoa
if (isset($_POST['delete']) && isset($_POST['id'])){
	
	
	$id = $_POST['id'];
	
	$sql = "DELETE FROM events WHERE id = $id";
	$query = $bdd->prepare( $sql );
	if ($query == false) {
	 print_r($bdd->errorInfo());
	 die ('Erreur prepare');
	}
	$res = $query->execute();
	if ($res == false) {
	 print_r($query->errorInfo());
	 die ('Erreur execute');
	}
header('Location: index.php?cld=cld');
}
elseif (isset($_POST['title']) && isset($_POST['color']) && isset($_POST['id'])){
	
	$id = $_POST['id'];
	$title = $_POST['title'];
	$color = $_POST['color'];
	
	$sql = "UPDATE events SET  title = '$title', color = '$color' WHERE id = $id ";

	
	$query = $bdd->prepare( $sql );
	if ($query == false) {
	 print_r($bdd->errorInfo());
	 die ('Erreur prepare');
	}
	$sth = $query->execute();
	if ($sth == false) {
	 print_r($query->errorInfo());
	 die ('Erreur execute');
	}
header('Location: index.php?cld=cld');
}


?>


<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- <title>Bare - Start Bootstrap Template</title> -->

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<!-- 
	FullCalendar -->
	<link href='css/fullcalendar.css' rel='stylesheet'>
	<link rel="stylesheet" href="css/bst.css">


    <!-- Custom CSS -->
    <style>
    body {
        padding-top: 0px;
        /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
    }
	
		
		
	
	.col-centered{
		float: none;
		margin: 0 auto;
	}
	
	
	.text-center{
		width: auto;
	   
	}
	ul {
		list-style: none;
	}
	#end{
		width: auto;
	}
	#start{
		width: auto;
	}

	
	#valueid>a{
  text-decoration: none;
  color: red !important;
      padding-top: 7px;
    padding-bottom: 0px;
	}
	#valueid>a:hover {
	  background-color: yellow;
	}
	
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<!-- <body> -->

    <!-- Navigation -->
    <!-- <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
           Brand and toggle get grouped for better mobile display -->
            <!-- <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Free Calendar</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <!-- <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">Menu</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        <!-- </div>
        /.container
    </nav> --> 

    <!-- Page Content -->
		<?php 
			$sql="SELECT * FROM user where ID='$ID'";
$rs = mysqli_query($dbc, $sql);

$vl = mysqli_fetch_assoc($rs);
		 ?>
		 <?php 
		 $sqlid="SELECT * FROM user ";
		$rsid = mysqli_query($dbc, $sqlid)

		  ?>
    <div class="container-fluid">
			<div class="tt">
				<ul>
						<li>CÔNG TY TNHH DOVA VIỆT NAM</li>
						<li>Địa chỉ: <?php echo $vl['Address'] ?></li>
						<li>Mã NV: <?php echo $vl["IDE"]?> </li>
						<li>Họ-Tên: <?php echo $vl['Name'];?> </li>
				</ul>
			</div>
        <div class="">
            <div class="col-lg-12 col-md-6 col-xs-4 col-sm-3 text-center">
                <h1></h1>
                <p class="lead"></p>
                <div id="calendar" class="col-centered">
                </div>
            </div>
			
        </div>
        <!-- /.row -->
		
		<!-- Modal -->
		<form class="form-horizontal" method="POST" >
		<div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			
			
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">thêm công việc</h4>
			  </div>
			  <div class="modal-body">
				
				  <div class="form-group">
					<label for="title" class="col-sm-2 control-label">công việc</label>
					<div class="col-sm-10">
					  <input type="text" name="title" class="form-control" id="title" placeholder="Title">
					</div>
				  </div>
				  <div class="form-group">
					<label for="color" class="col-sm-2 control-label">Màu</label>
					<div class="col-sm-10">
					  <select name="color" class="form-control" id="color">
						  <option value="">Choose</option>
						  <option style="color:#0071c5;" value="#0071c5">&#9724; Dark blue</option>
						  <option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquoise</option>
						  <option style="color:#008000;" value="#008000">&#9724; Green</option>						  
						  <option style="color:#FFD700;" value="#FFD700">&#9724; Yellow</option>
						  <option style="color:#FF8C00;" value="#FF8C00">&#9724; Orange</option>
						  <option style="color:#FF0000;" value="#FF0000">&#9724; Red</option>
						  <option style="color:#000;" value="#000">&#9724; Black</option>
						  
						</select>
					</div>
				  </div>
			<!-- 	  chọn người -->
				  <!-- <div >
				   	<table border="1" width="auto" height="auto">
				   		<tr>
				   			<td>
				   				<ul class="nav navbar-nav">
				   					<li id="valueid">
				   				<?php 
				   				foreach ($rsid as $valueid) {
				   				 ?>
				   								<a  id="<?php echo $valueid['ID'] ?>" 	onClick="reply_click(this.id)"><?php echo $valueid['Name'] ?></a>
				   								<?php } ?>
				   					</li>
				   				</ul>
				   			</td>
				   			
				   		</tr>
				   	</table>
				   </div> -->
		<!-- check cả ngày -->
				
					
			<!-- chon thoi gian -->
				  <div class="form-group" >
					<label for="start" class="col-sm-2 control-label">thời gian bắt đầu</label>
					<div class="col-sm-10">
						<ul class="nav navbar-nav">
					  <label for=""><input type="text" name="start" class="form-control" id="start"></label>
					  
					  	<label for="">gio</label>
					  
					 <select name="startdate_hour" id="hour" >

					 	<?php 
					 	$i=0;
					 	for($i;$i<=24;$i++){ ?>
					 	<option value="<?php echo $i ?>"><?php echo $i ?></option>
					 		
					 	<?php } ?>
					 </select>
					 <label for="">phút</label>
					 <select name="startdate_minute" id="minute" >
					 	<?php 
					 	$j=0;
					 	for($j;$j<=60;){ ?>
					 	<option value="<?php echo $j ?>"><?php echo $j ?></option>
					 		<?php $j=$j+15; ?>
					 	<?php } ?>
					 </select>
					 </ul>
					</div>
				  </div>



				
				  <div class="form-group">
					<label for="end" class="col-sm-2 control-label">thời gian kết thúc</label>
					<div class="col-sm-10">
					  
					  <ul class="nav navbar-nav">
					  <label for=""><input type="date" name="end" class="form-control" id="end" ></label>
					  
					  	<label for="">gio</label>
					  
					 <select name="enddate_hour" id="hour" >
					 	<?php 
					 	$i=0;
					 	for($i;$i<=24;$i++){ ?>
					 	<option value="<?php echo $i ?>"><?php echo $i ?></option>
					 		
					 	<?php } ?>
					 </select>
					 <label for="">phút</label>
					 <select name="enddate_minute" id="minute">
					 	<?php 
					 	$j=0;
					 	for($j;$j<=60;){ ?>
					 	<option value="<?php echo $j ?>"> <?php echo $j ?> </option>
					 	<?php $j=$j+15; ?>
					 		
					 	<?php } ?>
					 </select>
					 </ul>
					</div>
				  </div>
				



			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary" name="addevent">Save changes</button>
			  </div>
			</form>
			</div>
		  </div>
		</div>
		
		
		
		<!-- Modal -->

		<div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			<form class="form-horizontal" method="POST" >
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Edit Event</h4>
			  </div>
			  <div class="modal-body">
				
				  <div class="form-group">
					<label for="title" class="col-sm-2 control-label">Title</label>
					<div class="col-sm-10">
					  <input type="text" name="title" class="form-control" id="title" placeholder="Title">
					</div>
				  </div>
				  <div class="form-group">
					<label for="color" class="col-sm-2 control-label">Color</label>
					<div class="col-sm-10">
					  <select name="color" class="form-control" id="color">
						  <option value="">Choose</option>
						  <option style="color:#0071c5;" value="#0071c5">&#9724; Dark blue</option>
						  <option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquoise</option>
						  <option style="color:#008000;" value="#008000">&#9724; Green</option>						  
						  <option style="color:#FFD700;" value="#FFD700">&#9724; Yellow</option>
						  <option style="color:#FF8C00;" value="#FF8C00">&#9724; Orange</option>
						  <option style="color:#FF0000;" value="#FF0000">&#9724; Red</option>
						  <option style="color:#000;" value="#000">&#9724; Black</option>
						  
						</select>
					</div>
				  </div>
				    <div class="form-group"> 
						<div class="col-sm-offset-2 col-sm-10">
						  <div class="checkbox">
							<label class="text-danger"><input type="checkbox"  name="delete"> Delete event</label>
						  </div>
						</div>
					</div>
				  
				  <input type="hidden" name="id" class="form-control" id="id">
				
				
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary" name="editevents">Save changes</button>
			  </div>
			</form>
			</div>
		  </div>
		</div>

   
    <!-- /.container -->

    <!-- jQuery Version 1.11.1 -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
	
	<!-- FullCalendar -->
	<script src='js/moment.min.js'></script>
	<script src='js/fullcalendar.min.js'></script>
	<script src="js/jquery-3.4.1.min.js"></script>
	<script src="../bower_components/jquery-ui/jquery-ui.min.js"></script>
	
	<!-- <script type="text/javascript">
	function reply_click(clicked_id)
	{
	var id=clicked_id;
	   alert(id);
	}
	</script> -->
	<script>

	$(document).ready(function() {
		var date =  new Date();
		
		var day = date.getFullYear()+"-"+(date.getMonth()+1)+"-"+date.getDate();
		
		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,basicWeek,basicDay'
			},
			defaultDate: day,
			editable: true,
			eventLimit: true, // allow "more" link when too many events
			selectable: true,
			selectHelper: true,
			select: function(start, end) {
				
				$('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD '));
				$('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD '));
				$('#ModalAdd').modal('show');
			},
			eventRender: function(event, element) {
				element.bind('dblclick', function() {
					$('#ModalEdit #id').val(event.id);
					$('#ModalEdit #title').val(event.title);
					$('#ModalEdit #color').val(event.color);
					$('#ModalEdit').modal('show');
				});
			},
			eventDrop: function(event, delta, revertFunc) { // si changement de position

				edit(event);

			},
			eventResize: function(event,dayDelta,minuteDelta,revertFunc) { // si changement de longueur

				edit(event);

			},
			events: [
			<?php foreach($events as $event): 
			
				$start = explode(" ", $event['start']);
				$end = explode(" ", $event['end']);
				if($start[1] == '00:00:00'){
					$start = $start[0];
				}else{
					$start = $event['start'];
				}
				if($end[1] == '00:00:00'){
					$end = $end[0];
				}else{
					$end = $event['end'];
				}
			?>
				{
					id: '<?php echo $event['id']; ?>',
					title: '<?php echo $event['title']; ?>',
					start: '<?php echo $start; ?>',
					end: '<?php echo $end; ?>',
					color: '<?php echo $event['color']; ?>',
				},
			<?php endforeach; ?>
			]
		});
		
		function edit(event){
			start = event.start.format('YYYY-MM-DD HH:mm:ss');
			if(event.end){
				end = event.end.format('YYYY-MM-DD HH:mm:ss');
			}else{
				end = start;
			}
			
			id =  event.id;
			
			Event = [];
			Event[0] = id;
			Event[1] = start;
			Event[2] = end;
			
			$.ajax({
			 url: 'editEventDate.php',
			 type: "POST",
			 data: {Event:Event},
			 success: function(rep) {
					if(rep == 'OK'){
						alert('Saved');
					}else{
						alert('Could not be saved. try again.'); 
					}
				}
			});
		}
		
	});

</script>
<script>
		$(document).ready(function(){
			$('#end').datepicker({
				dateFormat: "dd-mm-yy",
				changeMonth: true
			});

		});
	</script>
 
<!-- </body> -->

