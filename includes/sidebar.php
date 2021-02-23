<?php
include("includes/db.php");
include("functions/functions.php");
?>
<div class="panel panel-default sidebar-menu"><!--panel panel-default sidebar-menu-->
    <div class="panel-heading"><!--panel headind-->
        <h3 class="panel-title">Product categories</h3>
    </div><!--panel headind-->
<div class="panel-body">
    <ul class="nav nav-pills nav-stacked category-menu">
    <?php
        getPCats();
        ?>

    </ul>
</div>
</div><!--panel panel-default sidebar-menu-->

<div class="panel panel-default sidebar-menu"><!--panel panel-default sidebar-menu-->
    <div class="panel-heading"><!--panel headind-->
        <h3 class="panel-title">categories</h3>
    </div><!--panel headind-->
<div class="panel-body">
    <ul class="nav nav-pills nav-stacked category-menu">
    <?php
    getCat();
    ?>
    </ul>
</div>
</div><!--panel panel-default sidebar-menu-->