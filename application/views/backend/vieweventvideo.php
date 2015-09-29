<div class="row">
    <div class="col s12">
        <h5 class="pad-left-15">Eventvideo List</h5>
        <div class="col s12 drawchintantable">
            <table class="highlight">
                <thead>
                    <tr>
                           <th data-field="id">ID</th>
                                    <th data-field="event">Event</th>
                                    <th data-field="url">Url</th>
                                    <th data-field="status">Status</th>
                                    <th data-field="order">Order</th>
                                    <th data-field="action">Action</th>

                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
        <?php $this->chintantable->createpagination();?>



    </div>
    <div class="createbuttonplacement"><a class="btn-floating btn-large waves-effect waves-light red" href="<?php echo site_url("site/createeventvideo?id=").$this->input->get('id');?>"><i class="material-icons">add</i></a>
    </div>

</div>
<script>
    function drawtable(resultrow) {
           return "<tr><td>" + resultrow.id + "</td><td>" + resultrow.event + "</td><td>" + resultrow.url + "</td><td>" + resultrow.status + "</td><td>" + resultrow.order + "</td><td><a class='btn btn-primary btn-xs waves-effect waves-light' href='<?php echo site_url('site/editeventvideo?id=');?>" + resultrow.id + "&eventid=" + resultrow.eventid + "'><i class='material-icons propericon'>system_update_alt</i></a><a class='btn btn-danger btn-xs waves-effect waves-light' onclick=\"return confirm('Are you sure you want to delete?');\" href='<?php echo site_url('site/deleteeventvideo?id='); ?>" + resultrow.id + "&eventid=" + resultrow.eventid + "'><i class='material-icons propericon'>delete</i></a></td></tr>";
    }
    generatejquery('<?php echo $base_url;?>');
</script>