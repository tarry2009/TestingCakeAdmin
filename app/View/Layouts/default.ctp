<?php
/**
 *
 * Test Task Developer: Mohammad Ashfaq
 * 
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->meta('icon');
		echo $this->Html->meta('description');
	?>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	
	<?php
		echo $this->Html->css('main');
		echo $this->Html->css('admin/assets/css/bootstrap.min');
		
		echo $this->Html->css('admin/assets/css/bootstrap-responsive.min.css');
		echo $this->Html->css('admin/assets/css/font-awesome.min.css');
		echo $this->Html->css('admin/assets/css/datepicker');
	?>
		
		<!--[if IE 7]>
	<?php
		echo $this->Html->css('admin/assets/css/ont-awesome-ie7.min');
	?>	
		<![endif]-->
	<?php	
	
		echo $this->Html->css('admin/assets/css/bootstrap.min');
	
	?>
	<!-- page specific plugin styles -->
	
	
	<?php	
	
		echo $this->Html->css('admin/assets/css/ace.min');
		echo $this->Html->css('admin/assets/css/ace-responsive.min');
		echo $this->Html->css('admin/assets/css/ace-skins.min');
	?>
	<!--[if lt IE 9]>
	<?php
		echo $this->Html->css('admin/assets/css/ace-ie'); 
	?>
	<![endif]-->
	
	<script type="text/javascript">
		var base =  '<?php echo $this->base; ?>/';	
	</script>	
	<!-- basic scripts -->
	<?php
		
		echo $this->Html->script('admin/assets/js/jquery-1.9.1.min');
		echo $this->Html->script('admin/assets/js/bootstrap.min');
	?>

	<!-- ace scripts -->
	<?php
		echo $this->Html->script('admin/assets/js/ace-elements.min');
		echo $this->Html->script('admin/assets/js/ace.min');
		echo $this->Html->script('admin/assets/js/date');
		echo $this->Html->script('admin/assets/js/bootstrap-datepicker.min');
		echo $this->Html->script('admin/assets/js/jquery.validate.min');
		echo $this->Html->script('main');
	?>

	<!-- page specific plugin scripts -->
	
	<?php
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body class="login-layout">
	
	 <?php echo $this->fetch('content'); ?>
		<script type="text/javascript">
			/*		
			function show_box(id) {
			 $('.widget-box.visible').removeClass('visible');
			 $('#'+id).addClass('visible');
			}
			*/
			
		</script>
		
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
