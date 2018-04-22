<?php 

   //class for API Transactions
   include('../api.php');
   include('../functions.php');

   //performing API call
   $complaints = API::get_data(API::get_api_url('get_complaint'));


  //  if( $col == 'region') {
  //    $display = 
  //    "<select class='form-control' onchange=\"get_details('type', this.value, 'station_name')\">";
  //      foreach($secretariats as $secretariat){
  //       $display .= "<option value='".$secretariat['type']."'>".get_type($secretariat['type'])."</option>";
  //        }
  //   } elseif($col == 'type'){
  //    $display = 
  //    "<select class='form-control' name='sec_id' required>";
  //      foreach($secretariats as $secretariat){
  //      $display .= "<option value='".$secretariat['id']."'>".ucwords($secretariat['name'])."</option>";
  //     }
  //  }

  //  $display .= "</select>";

    //print_r($complaints);
?>


    <div class="box box-solid">
      <div class="box-header with-border">
        <h3 class="box-title">Collapsible Accordion</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <div class="box-group" id="accordion">
          <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
          <div class="panel box box-danger">
            <div class="box-header with-border">
              <h4 class="box-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                  Collapsible Group Danger
                </a>
              </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse">
              <div class="box-body">
                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3
                wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
                eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla
                assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred
                nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer
                farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus
                labore sustainable VHS.
              </div>
            </div>
          </div>
          <div class="panel box box-success">
            <div class="box-header with-border">
              <h4 class="box-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                  Collapsible Group Success
                </a>
              </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse">
              <div class="box-body">
                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3
                wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
                eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla
                assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred
                nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer
                farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus
                labore sustainable VHS.
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->