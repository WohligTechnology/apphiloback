<div class="row">
    <div class="col s12">
       <div class="row">
            <div class="col s12 drawchintantable">
               <?php $this->chintantable->createsearch("List of Slider");?>
                <table class="highlight responsive-table">
                    <thead>
                        <tr>
                            <th data-field="id">ID</th>
                            <th data-field="status">Status</th>
                            <th data-field="order">Order</th>
                            <th data-field="image">Image</th>
                            <th data-field="action">Action</th>
        
                        </tr>
                    </thead>
                    <tbody>
        
                    </tbody>
                </table>
            </div>
            
        <?php $this->chintantable->createpagination();?>

    </div>
    
    <div class="createbuttonplacement"><a class="btn-floating btn-large waves-effect waves-light blue darken-4 tooltipped" href="<?php echo site_url("site/createslider "); ?>" data-position="top" data-delay="50" data-tooltip="Create"><i class="material-icons">add</i></a>
    </div>

</div>
<script>
    function drawtable(resultrow) {
         var image = "<a href='<?php echo base_url('uploads').'/'; ?>" + resultrow.image + "' target='_blank' class='img-center'><img src='<?php echo base_url('uploads').'/'; ?>" + resultrow.image + "'></a>";
            if (resultrow.image == "") {
                image = "No Receipt Available";
            }
            return "<tr><td>" + resultrow.id + "</td><td>" + resultrow.status + "</td><td>" + resultrow.order + "</td><td>" + image + "</td><td><a class='btn waves-effect waves-light blue darken-4 z-depth-0 less-pad' href='<?php echo site_url('site/editslider?id=');?>" + resultrow.id + "'><i class='fa fa-pencil-square'></i></a><a class='btn waves-effect waves-light red pad10 z-depth-0 less-pad' onclick=\"return confirm('Are you sure you want to delete?');\" href='<?php echo site_url('site/deleteslider?id='); ?>" + resultrow.id + "'><i class='material-icons'>delete</i></a></td></tr>";
    }
    generatejquery('<?php echo $base_url;?>');
</script>