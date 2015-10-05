<div class="row">
    <div class="col s12">
        <div class="row">
            <div class="col s12 drawchintantable">
               <?php $this->chintantable->createsearch("List of Blog Video");?>
                <table class="highlight responsive-table">
                    <thead>
                        <tr>
                             <th data-field="id">ID</th>
                                        <th data-field="blog">Blog</th>
                                        <th data-field="status">Status</th>
            <!--                                    <th data-field="order">Order</th>-->
                                        <th data-field="video">Video</th>
                                        <th data-field="action">Action</th>
            
                        </tr>
                    </thead>
                    <tbody>
            
                    </tbody>
                </table>
            </div>
        </div>
        <?php $this->chintantable->createpagination();?>



    </div>
    <div class="createbuttonplacement"><a class="btn-floating btn-large waves-effect waves-light blue darken-4" href="<?php echo site_url("site/createblogvideo?id=").$this->input->get('id');?>"><i class="material-icons">add</i></a>
    </div>

</div>
<script>
    function drawtable(resultrow) {
          return "<tr><td>" + resultrow.id + "</td><td>" + resultrow.blog + "</td><td>" + resultrow.status + "</td><td>" + resultrow.video + "</td><td><a class='btn btn-primary btn-xs waves-effect waves-light blue darken-4 z-depth-0 less-pad' href='<?php echo site_url('site/editblogvideo?id=');?>" + resultrow.id + "&blogid=" + resultrow.blogid + "'><i class='fa fa-pencil-square propericon'></i></a><a class='btn btn-danger btn-xs waves-effect waves-light red pad10 z-depth-0 less-pad' onclick=\"return confirm('Are you sure you want to delete?');\" href='<?php echo site_url('site/deleteblogvideo?id='); ?>" + resultrow.id + "&blogid=" + resultrow.blogid + "'><i class='material-icons propericon'>delete</i></a></td></tr>";
    }
    generatejquery('<?php echo $base_url;?>');
</script>



<!--
<div id="page-title">
    <a class="btn btn-primary btn-labeled fa fa-plus margined pull-right" href="<?php echo site_url(" site/createblogvideo?id=").$this->input->get('id'); ?>">Create</a>
    <h1 class="page-header text-overflow">Blogvideo Details </h1>
</div>
<div id="page-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel drawchintantable">
                <?php $this->chintantable->createsearch("Blogvideo List");?>
                <div class="fixed-table-container">
                    <div class="fixed-table-body">
                        <table class="table table-hover" id="" cellpadding="0" cellspacing="0">
                            <thead>
                                <tr>
                                    <th data-field="id">ID</th>
                                    <th data-field="blog">Blog</th>
                                    <th data-field="status">Status</th>
                                    <th data-field="order">Order</th>
                                    <th data-field="video">Video</th>
                                    <th data-field="action">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <div class="fixed-table-pagination" style="display: block;">
                        <div class="pull-left pagination-detail">
                            <?php $this->chintantable->createpagination();?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function drawtable(resultrow) {
            return "<tr><td>" + resultrow.id + "</td><td>" + resultrow.blog + "</td><td>" + resultrow.status + "</td><td>" + resultrow.order + "</td><td>" + resultrow.video + "</td><td><a class='btn btn-primary btn-xs' href='<?php echo site_url('site/editblogvideo?id=');?>" + resultrow.id + "&blogid=" + resultrow.blogid + "'><i class='icon-pencil'></i></a><a class='btn btn-danger btn-xs' onclick=return confirm(\"Are you sure you want to delete?\") href='<?php echo site_url('site/deleteblogvideo?id='); ?>" + resultrow.id + "&blogid=" + resultrow.blogid + "'><i class='icon-trash '></i></a></td></tr>";
        }
        generatejquery("<?php echo $base_url;?>");
    </script>
</div>
</div>-->
