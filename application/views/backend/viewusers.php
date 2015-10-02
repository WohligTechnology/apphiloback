<div class="row">
    <div class="col s12">
        <div class="col s12 drawchintantable">
             <?php $this->chintantable->createsearch("List of User");?>
            <table class="highlight">
                <thead>
                    <tr>
                        <th data-field="id">Name</th>
                        <th data-field="name">Name</th>
                        <th data-field="email">Item Name</th>
                        <th data-field="logintype">Item Name</th>
                        <th data-field="accesslevelname">Item Name</th>
<!--                        <th data-field="status">Item Name</th>-->
                        <th data-field="">Action</th>

                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
        <?php $this->chintantable->createpagination();?>



    </div>
     <div class="createbuttonplacement"><a class="btn-floating btn-large waves-effect waves-light green accent-4" href="<?php echo site_url("site/createuser"); ?>"><i class="material-icons">add</i></a></div>
      
</div>
<script>
    function drawtable(resultrow) {
        if (!resultrow.username) {
            resultrow.username = "";
        }
        if (!resultrow.logintype) {
            resultrow.logintype = "";
        }
        if (!resultrow.json) {
            resultrow.json = "";
        }
        return "<tr><td>" + resultrow.id + "</td><td>" + resultrow.name + "</td><td>" + resultrow.email + "</td><td>" + resultrow.logintype + "</td><td>" + resultrow.accesslevelname + "</td><td><a class='btn waves-effect waves-light  orange lighten-1' href='<?php echo site_url('site/edituser?id=');?>" + resultrow.id + "'><i class='fa fa-pencil-square propericon'></i></a><a class='btn btn-danger btn-xs waves-effect waves-light red' onclick=\"return confirm('Are you sure you want to delete?');\" href='<?php echo site_url('site/deleteuser?id='); ?>" + resultrow.id + "'><i class='material-icons propericon'>delete</i></a></td><tr>";
    }
    generatejquery('<?php echo $base_url;?>');
</script>