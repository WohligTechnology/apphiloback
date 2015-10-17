<div class="row">
    <div class="col s12">
        <div class="row">
            <div class="col s12 dragable">
                <div class="row">
                    <div class="col m6 l6">
                        <h5 class="panel-title">List of Image Gallery</h5>
                    </div>
                    <div class="col m6 l6">
                        <a href="#" class="saveOrdering blue darken-4 btn waves-effect waves-light" style="float: right;margin-top: 15px;"><i class='material-icons propericon'>save</i> Save</a>
                    </div>
                      <table class="highlight responsive-table">
                    <thead>
                        <tr>
                          <th data-field="id" data-selectall='true' data-delete-selected="<?php echo $deleteselected;?>">Id</th>
                          <th data-field="name">Name</th>
                          <th data-field="status">Status</th>
                          <th data-field="timestamp">Timestamp</th>
                          <th data-field="action">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
                </div>
                <div class="row">
                    <ul class="getordering"></ul>
                </div>
            </div>
        </div>
    </div>
     <div class="createbuttonplacement"><a class="btn-floating btn-large waves-effect waves-light blue darken-4 tooltipped" href="<?php echo site_url("site/createGallery"); ?>"data-position="top" data-delay="50" data-tooltip="Create"><i class="material-icons">add</i></a>
    </div>
</div>
<script>
function drawtable(resultrow) {
         return "<li data-id='"+resultrow.id+"'><div class='card-panel'><tr><td>" + resultrow.id + "</td><td>" + resultrow.name + "</td><td>" + resultrow.status + "</td><td>" + resultrow.timestamp + "</td><td><a class='btn btn-primary btn-xs waves-effect waves-light blue darken-4 z-depth-0 less-pad' href='<?php echo site_url('site/editGallery?id=');?>" + resultrow.id + "'><i class='material-icons'>mode_edit</i></a><a class='btn btn-danger btn-xs waves-effect waves-light red pad10 z-depth-0 less-pad' onclick=\"return confirm('Are you sure you want to delete?');\" href='<?php echo site_url('site/deleteGallery?id='); ?>" + resultrow.id + "'><i class='material-icons propericon'>delete</i></a></td></tr></div><li>";
    }
    
    getDragDropOrdering("<?php echo $base_url;?>" , "<?php echo $orderfield; ?>","<?php echo $tablename;?>" ,"<?php echo $where;?>");
</script>
<script>
</script>


<!--
<div class="row">
    <div class="col s12">
        <div class="row">
            <div class="col s12 drawchintantable">
               <?php $this->chintantable->createsearch("List of Image Gallery");?>
                <table class="highlight responsive-table">
                    <thead>
                        <tr>
                          <th data-field="id" data-selectall='true' data-delete-selected="<?php echo $deleteselected;?>">Id</th>
                          <th data-field="name">Name</th>
                          <th data-field="status">Status</th>
                          <th data-field="timestamp">Timestamp</th>
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
    <div class="createbuttonplacement"><a class="btn-floating btn-large waves-effect waves-light blue darken-4 tooltipped" href="<?php echo site_url("site/createGallery"); ?>"data-position="top" data-delay="50" data-tooltip="Create"><i class="material-icons">add</i></a>
    </div>

</div>
<script>
    function drawtable(resultrow) {
        return "<tr><td>" + resultrow.id + "</td><td>" + resultrow.name + "</td><td>" + resultrow.status + "</td><td>" + resultrow.timestamp + "</td><td><a class='btn btn-primary btn-xs waves-effect waves-light blue darken-4 z-depth-0 less-pad' href='<?php echo site_url('site/editGallery?id=');?>" + resultrow.id + "'><i class='material-icons'>mode_edit</i></a><a class='btn btn-danger btn-xs waves-effect waves-light red pad10 z-depth-0 less-pad' onclick=\"return confirm('Are you sure you want to delete?');\" href='<?php echo site_url('site/deleteGallery?id='); ?>" + resultrow.id + "'><i class='material-icons propericon'>delete</i></a></td></tr>";
    }
    generatejquery('<?php echo $base_url;?>');
</script>
-->
