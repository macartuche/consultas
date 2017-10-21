<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <i class="fa fa-table"></i>&nbsp; <span class="title-page">DATA TABLE</span>
      <small>List of Data</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-table"></i> Data Table</a></li>
      <li class="active">List of data</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-body">
            <table id="tablelist" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th style="width:5%"></th>
                  <th style="width:10%">Id</th>
                  <th style="width:10%">Date</th>
                  <th style="width:10%">Type</th>
                  <th style="width:25%">Description</th>
                  <th style="width:10%">Status</th>
                  <th style="width:15%">Amount</th>
                </tr>
              </thead>
              <tbody></tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<footer class="main-footer">
</footer>

<div class="modal fade" id="modalForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-table"></i> DATA FORM</h4>
      </div>
      <div class="modal-body">
        <div id="tableModal"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">CLOSE</button>
        <button type="button" id="btnSave" class="btn btn-success" onclick="doSave()">SAVE</button>
      </div>
    </div>
  </div>
</div>

<script>
    $(document).ready(function() {
      generateTable();
    });

    function generateTable()
    {   
      var where = "";      
      var table = $('#tablelist').DataTable( {
        ajax: {
          "url": "<?= base_url('datatable/gridview')?>",
          "type": "POST",
          "data" : {'where': where}
        }, 
        processing: true, 
        serverSide: true,
        scrollCollapse: true,
        destroy: true,
        iDisplayLength: 10,
        order: [[ 0, "desc" ]],
        dom: 'Bfrtip',
        buttons: [
            {
                text: '<i class="fa fa-plus"></i> Add New',
                action: function ( e, dt, node, config ) {
                    generateModalForm('add', '');
                }
            }, 
            {
                extend: 'copy',
                text: '<i class="fa fa-copy"></i> Copy',
                exportOptions: {
                    columns: [1,2,3,4,5]
                }
            }, 
            {
                extend: 'excel',
                title: 'dashboard',
                text: '<i class="fa fa-file-excel-o"></i> Excel',
                exportOptions: {
                    columns: [1,2,3,4,5]
                }
            }, 
            {
                extend: 'pdf',
                title: 'dashboard',
                text: '<i class="fa fa-file-pdf-o"></i> PDF',
                exportOptions: {
                    columns: [1,2,3,4,5]
                }
            }, 
            {
                extend: 'print',
                title: 'dashboard',
                text: '<i class="fa fa-print"></i> Print',
                exportOptions: {
                    columns: [1,2,3,4,5]
                }
            }
        ],
      });
    }
    
    function reloadDatatable()
    {
      $('#tablelist').DataTable().ajax.reload();
    }

    function generateModalForm(state, trans_id) {
      $('#modalForm').modal('show');
      $.ajax({
          type: 'post',
          async: false,
          url: '<?= base_url() ?>datatable/form',
          data: {'txtstate': state, 'txttransid': trans_id},
          success: function(ret) {
              var data = JSON.parse(ret); 
              $('#btnSave').show();
              $('#tableModal').html(data['table']);
          }
      });
    }

    function generateModalView(trans_id) {
      $.ajax({
          type: 'post',
          async: false,
          url: '<?= base_url() ?>datatable/view',
          data: {'txttransid': trans_id},
          success: function(ret) {
              var data = JSON.parse(ret); 
              $('#btnSave').hide();
              $('#tableModal').html(data['table']);
          }
      });
    }

    function doSave(){
      var txttransid = $('#txttransid').val();
      var txtstate = $('#txtstate').val();
      var txttransdate = $('#txttransdate').val();
      var ddltranstype = $('#ddltranstype').val();
      var txttranstxt = $('#txttranstxt').val();
      var ddltransstatus = $('#ddltransstatus').val();
      var txttransamount = $('#txttransamount').val();

      $.ajax({
        type: 'post',
        async: false,
        url: '<?= base_url() ?>datatable/save',
        data: {
                'txttransid': txttransid,
                'txtstate': txtstate,
                'txttransdate': txttransdate,
                'ddltranstype': ddltranstype,
                'txttranstxt': txttranstxt,
                'ddltransstatus': ddltransstatus,
                'txttransamount': txttransamount
            },
        success: function(ret) {
          var data = JSON.parse(ret); 
          $('#modalForm').modal('hide');
          reloadDatatable();
          infoStatus("Process successful");
        }
      });
    }

    function doDelete(trans_id) {
      bootbox.confirm({
        message: "<span class='alert-txt'><i class='fa fa-question-circle'></i>&nbsp;&nbsp;  Are you sure?<span>",
        buttons: {
            confirm: {
                label: 'Yes',
                className: 'btn-success'
            },
            cancel: {
                label: 'No',
                className: 'btn-danger'
            }
        },
        callback: function (result) {
          if(result == true) {
            $.ajax({
                type: 'post',
                async: false,
                url: '<?= base_url() ?>datatable/delete',
                data: {'txttransid': trans_id},
                success: function(ret) {
                  var data = JSON.parse(ret); 
                  reloadDatatable();
                  infoStatus("Process successful");
                }
            });
          }
        }
      });
    }
  </script>