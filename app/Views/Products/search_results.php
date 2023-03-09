<?php if ($is_error): ?>
    <div class="error">Error fetching results. Please try again later.</div>
<?php else: ?>
    <?php if (count($products) > 0 && $display_result): ?>
        <table class="styled-table" width="100%">
        <thead>
            <tr>
                <th width="20%">Image</th>
                <th width="60%">Title</th>
                <th width="20%">Destination</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product) { ?>
            <tr>
                <td><img src='<?php echo $product->img_sml; ?>' width="50%" height="50%"/></td>
                <td><?php echo $product->title; ?></td>
                <td><?php echo $product->dest; ?></td>
            </tr>
            <?php } ?>
        </tbody>
        </table>
        <!-- Pagination -->
        <div class="pagination justify-content-center mb-4">
            <?= $pager_links ?>

            <div class="btn-group pagination justify-content-center mb-4" role="group" aria-label="pager counts">
                &nbsp;&nbsp;&nbsp;
                <button type="button" class="btn btn-light"><?= 'Page '.$currentPage.' of '.$totalPages; ?></button>
            </div>
        </div>
    <?php elseif ($display_result): ?>
        <div class="noresults">No results Found. Please try a different title.</div>
    <?php endif; ?>
<?php endif; ?>