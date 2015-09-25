<div class="row">
    <div class="col s12">
        <h5 class="pad-left-15">User table</h5>
        <div class="col s12 drawchintantable">
            <table class="highlight">
                <thead>
                    <tr>
                        <th data-field="id">Name</th>
                        <th data-field="name">Name</th>
                        <th data-field="email">Item Name</th>
                        <th data-field="socialid">Item Name</th>
                        <th data-field="logintype">Item Name</th>
                        <th data-field="accesslevelname">Item Name</th>
                        <th data-field="status">Item Name</th>

                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
        <?php $this->chintantable->createpagination();?>



    </div>
     <div class="createbuttonplacement"><a class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">add</i></a></div>
      
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
        return "<tr><td>" + resultrow.id + "</td><td>" + resultrow.name + "</td><td>" + resultrow.email + "</td><td>" + resultrow.socialid + "</td><td>" + resultrow.logintype + "</td><td>" + resultrow.accesslevelname + "</td><td>" + resultrow.status + "</td><td><a class='btn ' href='<?php echo site_url('site/edituser?id=');?>" + resultrow.id + "'><i class='icon-pencil'></i></a><a class='btn ' href='<?php echo site_url('site/deleteuser?id='); ?>" + resultrow.id + "'><i class='icon-trash '></i></a></td><tr>";
    }
    generatejquery('<?php echo $base_url;?>');
</script>