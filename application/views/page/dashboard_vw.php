<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <i class="fa fa-dashboard"></i>&nbsp; <span class="title-page">Dashboard</span>
      <small>View the chart</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">Chart</li>
    </ol>
  </section>


  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-body">

          	<div class="row">
		      <div class="col-lg-3 col-xs-6">
		        <div class="small-box bg-aqua">
		          <div class="inner">
		            <h3><?= $status_draft ?></h3>
		            <p>Draft</p>
		          </div>
		          <div class="icon">
		            <i class="fa fa-edit"></i>
		          </div>
		          <a href="<?= base_url("jobposting") ?>" class="small-box-footer">View all <i class="fa fa-arrow-circle-right"></i></a>
		        </div>
		      </div>

		      <div class="col-lg-3 col-xs-6">
		        <div class="small-box bg-red">
		          <div class="inner">
		            <h3><?= $status_approved ?></h3>
		            <p>Approved</p>
		          </div>
		          <div class="icon">
		            <i class="fa fa-check"></i>
		          </div>
		          <a href="<?= base_url("candidate") ?>" class="small-box-footer">View all <i class="fa fa-arrow-circle-right"></i></a>
		        </div>
		      </div>

		      <div class="col-lg-3 col-xs-6">
		        <div class="small-box bg-yellow">
		          <div class="inner">
		            <h3><?= $status_posted ?></h3>
		            <p>Posted</p>
		          </div>
		          <div class="icon">
		            <i class="fa fa-thumbs-o-up"></i>
		          </div>
		          <a href="<?= base_url("interview") ?>" class="small-box-footer">View all <i class="fa fa-arrow-circle-right"></i></a>
		        </div>
		      </div>

		      <div class="col-lg-3 col-xs-6">
		        <div class="small-box bg-green">
		          <div class="inner">
		            <h3><?= $total ?></h3>
		            <p>Total</p>
		          </div>
		          <div class="icon">
		            <i class="fa fa-money"></i>
		          </div>
		          <a href="<?= base_url("hired") ?>" class="small-box-footer">View all <i class="fa fa-arrow-circle-right"></i></a>
		        </div>
		      </div>

		      <div class="col-lg-6">
		      	<?= $chart_bar ?>
		      </div>

		      <div class="col-lg-6">
		      	<?= $chart_pie ?>
		      </div>

		      <div style="clear:both; height:20px"></div>

		      <div class="col-lg-6">
		      	<?= $chart_line ?>
		      </div>

		      <div class="col-lg-6">
		      	<?= $chart_line2 ?>
		      </div>

		    </div>
            
          </div>
        </div>
      </div>
    </div>
  </section>
</div>