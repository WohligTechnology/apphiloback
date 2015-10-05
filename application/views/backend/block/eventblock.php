<section class="panel">
    <div class="panel-body">
        <ul id="nav-mobile">
            <li><a class="waves-effect waves-light <?php if($this->uri->segment(2)=="editevents") { echo "active"; } ?>" href="<?php echo site_url('site/editevents?id=').$before1; ?>">Event Details</a></li>
            <li><a class="waves-effect waves-light <?php if($this->uri->segment(2)=="vieweventvideo") { echo "active"; } ?>" href="<?php echo site_url('site/vieweventvideo?id=').$before2; ?>">Event Video</a></li>
            <li><a class="waves-effect waves-light <?php if($this->uri->segment(2)=="vieweventimages") { echo "active"; } ?>" href="<?php echo site_url('site/vieweventimages?id=').$before3; ?>">Event Images</a></li>
        </ul>
    </div>
</section>