
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
   <div class="row">
    <div class="col s12">
        <div class="row">
            <div class="col s12 dragable">
                <div class="row">
                    <div class="col m6 l6">
                        <h5 class="panel-title">List of Navigation</h5>
                    </div>
                    <div class="col m6 l6">
                        <a href="#" class="saveOrdering blue darken-4 btn waves-effect waves-light" style="float: right;margin-top: 15px;"><i class='material-icons propericon'>save</i> Save</a>
                    </div>
                </div>
                <div class="row">
                    <ul class="getordering"></ul>
                </div>
            </div>
        </div>

    </div>

    
</div>
<script>
function drawtable(resultrow) {
//        if (resultrow.id==1){
//
//        }
         return "<li data-id='"+resultrow.id+"'><div class='card-panel'><tr><td>" + resultrow.id + "</td><td>" + resultrow.name + "</td><td>" + resultrow.status + "</td><td><a class='btn btn-primary btn-xs waves-effect waves-light blue darken-4 z-depth-0 less-pad' href='<?php echo site_url('site/editFrontMenu?id=');?>" + resultrow.id + "'><i class='material-icons'>mode_edit</i></a><a class='btn btn-danger btn-xs waves-effect waves-light red pad10 z-depth-0 less-pad' onclick=\"return confirm('Are you sure you want to delete?');\" href='<?php echo site_url('site/deleteFrontMenu?id='); ?>" + resultrow.id + "'><i class='material-icons propericon'>delete</i></a></td></tr></div><li>";
    }
    
    getDragDropOrdering("<?php echo $base_url;?>" , "<?php echo $orderfield; ?>","<?php echo $tablename;?>" ,"<?php echo $where;?>");
</script>
<script>
    
</script>