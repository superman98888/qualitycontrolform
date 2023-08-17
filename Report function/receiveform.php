<?php include "../header.php" ?>
<div class="container col-4 border rounded bg-light mt-5" style='--bs-bg-opacity: .5;'>
  <h1 class="text-center"> Ghi nhận sự cố </h1>
  <hr>
  <form action="" method="post">
    <div class="mb-3">
      <label for="name" class="form-label"> Khoa </label>
      <input type="text" class="form-control" id ="department" name="department" placeholder="" autocomplete="on" readonly>
    </div>
    <div class="mb-3">
      <label for="problem" class="form-label"> Vấn đề gặp phải </label>
      <input type="text" class="form-control" id ="problem" name="problem" placeholder="" autocomplete="off" readonly>
    </div>
    <div class="mb-3">
      <label for="field" class="form-label"> Lĩnh vực </label>
      <input type="text" class="form-control" id ="field" name="field" placeholder="" autocomplete="on" readonly>
    </div>
    <div class="mb-3">
      <label for="contact" class="form-label"> Liên lạc </label>
      <input type="text" class="form-control" id ="contact" name="contact" placeholder="" autocomplete="off" readonly>
    </div>
    <div class="mb-3">
      <label for="reportdate" class="form-label"> Ngày đề xuất </label>
      <input type="date" class="form-control" id ="reportdate" name="reportdate" placeholder="" autocomplete="off" readonly>
    </div>
    <div class="mb-3">
      <label for="username" class="form-label"> Người đề xuất </label>
      <input type="text" class="form-control" id ="username" name="username" placeholder="" autocomplete="off" readonly>
    </div>
    <div class="mb-3">
      <label for="username" class="form-label"> Người tiếp nhận </label>
      <input type="text" class="form-control" id ="receiveuser" name="receiveuser" placeholder="" autocomplete="off" required>
    </div>
    <div class="mb-3">
      <label for="executedate" class="form-label"> Ngày xử lý </label>
      <input type="date" class="form-control" id ="executedate" name="executedate" placeholder="" autocomplete="off" required>
    </div>
    <div class="mb-3">
      <label for="delaysummary" class="form-label"> Số ngày chờ </label>
      <input type="number" class="form-control" id ="delaysummary" name="delaysummary" placeholder="" autocomplete="off" readonly>
    </div>
    <div class="mb-3">
      <label for="note" class="form-label"> Ghi chú </label>
      <input type="text" class="form-control" id ="note" name="note" placeholder="" autocomplete="off" readonly>
    </div>
    <div class="mb-3">
      <input type="submit" name="send" value="Tiếp nhận báo cáo" class="btn btn-primary">
    </div>
    <div class="mb-3">
      <input type="reset" name="cancel" value="Hủy" class="btn btn-secondary">
    </div>
  </form>
</div>