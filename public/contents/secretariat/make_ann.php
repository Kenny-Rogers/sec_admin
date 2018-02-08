<div class="row">
    <div class="col-sm-offset-2 col-sm-8">
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Quick Example</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" enctype="multipart/form-data" method="post" action="http://127.0.0.1/final_proj_api/public/make_announcement.php">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input class="form-control" name="title" id="exampleInputEmail1" placeholder="Enter email" type="text">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input class="form-control" name="message" id="exampleInputPassword1" placeholder="Password" type="text">
                </div>
                <input type="hidden" name="author" value="1" >
                <div class="form-group">
                  <label for="exampleInputFile">File input</label>
                  <input id="exampleInputFile" name="image" type="file">

                  <p class="help-block">Example block-level help text here.</p>
                </div>
                <div class="checkbox">
                  <label>
                    <input type="checkbox"> Check me out
                  </label>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
    </div>
</div>