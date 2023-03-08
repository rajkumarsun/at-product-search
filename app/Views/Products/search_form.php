<h2>Product Search</h2>

<form action="/search" method="post">
    <div class="form-row">
        <div class="col-1">
          <label for="title">Title</label>
        </div>
        <div class="col-3">
          <input type="text" class="form-control" name="title" id="title" value="<?= set_value('title') ?>">
        </div>
        <div class="col-1">
          <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </div>
</form>