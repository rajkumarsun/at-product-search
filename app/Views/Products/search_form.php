<h2><a href="/"><?php echo $page_title; ?></a></h2>

<?php helper('form_helper'); ?>

<form action="/search" method="get">
    <div class="form-row">
        <div class="col">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" id="title" value="<?php echo set_value_get('title'); ?>">
        </div>
        <div class="col">
            <label for="pricing-location">Pricing Location</label>
            <?php echo form_dropdown('geo', $geo_options, set_value_get('geo'), 'class ="form-control selectpicker"'); ?>
        </div>
    </div>
    <br />
    <div class="form-row">
        <div class="col">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </div>
    <?php if (count($products) > 0 && $display_result): ?>
    <br />
    <div class="form-row">
        <div class="col-2">
            <label for="rows-per-page">Rows per page</label>
        </div>
        <div class="col-1">
            <?php echo form_dropdown('limit', $limit, set_value_get('limit'), 'class ="form-control selectpicker" onChange="this.form.submit()"'); ?>
        </div>
    </div>
    <?php endif; ?>
</form>