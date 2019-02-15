<br>
  <div class="row justify-content-center">
    <div class="col-auto">
      <div class="card text-center">
        <div class="card-header">
          <h5>Kirjaudu sisään</h5>
        </div>
        <div class="card-body">
          <form action="<?php echo site_url('Show/log_in'); ?>" method="post">
            <div class="form-group">
              <label>Tunnus</label>
              <br>
              <input type="text" name="tunnus" value="" required>
            </div>
            <div class="form-group">
              <label>Salasana</label>
              <br>
              <input type="password" name="salasana" value="" required>
            </div>
            <button type="submit" class="btn btn-block btn-primary">Kirjaudu sisään</button>
          </form>
        </div>
      </div>
    </div>
</div>
