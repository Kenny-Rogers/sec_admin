<div class="row">
    <div class="col-sm-offset-2 col-sm-8">
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Make Announcement</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" enctype="multipart/form-data" method="post" action="http://127.0.0.1/final_proj_api/public/make_announcement.php">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Title</label>
                  <input class="form-control" name="title" id="exampleInputEmail1" placeholder="Enter email" type="text">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Message</label>
                  <textarea class="form-control" name="message"></textarea>
                </div>
                <input type="hidden" name="author" value="1" >
                <div class="form-group">
                  <label for="exampleInputFile">Image Upload</label>
                  <input id="exampleInputFile" name="image" type="file">
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