<?php foreach ($data_2['activities'] as $activities): ?>

<div>
    <h6 class="fw-bold">
        <?php echo $activities->name ?><li class="list-inline-item" style="margin-left:8px;"><span class="badge badge-dark"><?php echo $activities->category;?></span></li>
        <span class="fw-light" style="float:right;font-style:italic"><?php echo date('d/m/y ', strtotime($activities->activitystart)); ?></span>
    </h6>
</div>
<div style="margin-bottom:10px;"><?php echo $activities->desc ?></div>

<?php endforeach ?>