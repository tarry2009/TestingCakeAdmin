<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Rootx Dashboard </title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo $this->base; ?>/app/webroot/admin/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo $this->base; ?>/app/webroot/admin/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="<?php echo $this->base; ?>/app/webroot/admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="<?php echo $this->base; ?>/app/webroot/admin/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo $this->base; ?>/app/webroot/admin/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo $this->base; ?>/app/webroot/css/main.css" rel="stylesheet">
	
	<!-- LightBox CSS -->
    <link href="<?php echo $this->base; ?>/app/webroot/css/lightbox.css" rel="stylesheet">

    
    <!-- Custom Fonts -->
    <link href="<?php echo $this->base; ?>/app/webroot/admin/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="<?php echo $this->base; ?>/app/webroot/admin/js/html5shiv.js"></script>
        <script src="<?php echo $this->base; ?>/app/webroot/admin/js/respond.min.js"></script>
    <![endif]-->

     <!-- jQuery -->
    <script src="<?php echo $this->base; ?>/app/webroot/js/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo $this->base; ?>/app/webroot/admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo $this->base; ?>/app/webroot/admin/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="<?php echo $this->base; ?>/app/webroot/admin/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo $this->base; ?>/app/webroot/admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo $this->base; ?>/app/webroot/admin/dist/js/sb-admin-2.js"></script>

    <!-- LightBox JavaScript -->
    <script src="<?php echo $this->base; ?>/app/webroot/js/lightbox.min.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
	<?php
		$activeApiLink = $this->Html->url( array(  "controller" => "restapi", "action" => "active")); 
	?>
	var json = '';
    $(document).ready(function() {
        
	var table = $('#tableDefault').DataTable({
                responsive: true
        });
        
         // Add event listener for opening and closing details
    $('#tableDefault tbody').on('click', 'td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = table.row( tr );
		var rid = $(this).attr('id');
		var childTable = $('#t'+rid).html();
		
        //alert(childTable);
        if ( row.child.isShown() ) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        }
        else {
			
            // Open this row
            row.child( childTable ).show();
            tr.addClass('shown');
        }
    } );
    
	
		function setActive(uuid,table) {
			 
			$.post('<?php echo $activeApiLink; ?>/'+uuid+'/'+table,function(data){
				if (data != 'error') {
					
				}
			});
		}
	
    });
    </script>
      
</head>

<body>

    <div id="wrapper">
	<?php echo $this->element('header'); ?>
       <div id="page-wrapper">
	   <div class="row">
                <div class="col-lg-12">
			<?php
			  #echo $this->Html->getCrumbs(' > ','Home'); 
			  $this->Html->addCrumb('Home', '/users');
			  if(isset($crumb['text']) AND !empty($crumb['text']))
			    $this->Html->addCrumb($crumb['text'], $crumb['key']);
			  
			  echo $this->Html->getCrumbs(' > '); 
			?>
            
            <h1 class="page-header">Dashboard</h1>
					
			<!-- PAGE CONTENT BEGINS HERE -->
									    
		    <?php echo $this->Session->flash(); ?>
		   
		    <!-- PAGE CONTENT ENDS HERE -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <?php echo $viewName; ?>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
				
           <?php echo $this->fetch('content'); ?>
	   
	    <!-- /.table-responsive -->
                             
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

   

</body>

</html>
