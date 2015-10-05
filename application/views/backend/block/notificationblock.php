<section class="panel">
    <div class="panel-body">
        <ul id="nav-mobile">
            <li><a class="waves-effect waves-light <?php if($this->uri->segment(2)=="editnotification") { echo "active"; } ?>" href="<?php echo site_url('site/editnotification?id=').$before1; ?>">Notification Details</a></li>
            <li><a class="waves-effect waves-light <?php if($this->uri->segment(2)=="viewnotificationuser") { echo "active"; } ?>" href="<?php echo site_url('site/viewnotificationuser?id=').$before2; ?>">User Notification</a></li>
        </ul>
    </div>
</section>