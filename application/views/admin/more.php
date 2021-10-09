<!-- Modal -->
<div class="modal fade" id="moreModal-<?= $ticket['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ticket details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
            <div id="qrcode-<?= $ticket['id'] ?>" class="d-flex justify-content-center"></div>
            <br>
            <table class="table">
              <tr>
                 <td>Transaction ref.:</td>
                 <td><?= $ticket['tx_ref'] ?></td>
              </tr>
              <tr>
                 <td>Amount:</td>
                 <td><?= webSettings()['site_currency'] . $ticket['amount'] ?></td>
              </tr>
              <tr>
                 <td>Number of seats:</td>
                 <td><?= $ticket['tickets_nbr'] ?></td>
              </tr>
              <tr>
                 <td>Client:</td>
                 <td>Names: <?= $ticket['names'] ?><br>Email: <?= $ticket['email'] ?><br>Phone: <?= $ticket['phone'] ?></td>
              </tr>
              <tr>
                 <td><a href="<?= base_url() ?>re-send-ticket/<?= $ticket['id'] ?>" class="btn btn-block btn-primary">Re-send ticket to email</a></td>
                 <td><button data-dismiss="modal" class="btn btn-block btn-secondary">Close</button></td>
              </tr>
            </table>
            
        </div>
    </div>
  </div>
</div>


<script type="text/javascript">
  var qrcode = new QRCode("qrcode-<?= $ticket['id'] ?>", {
      text: "{\"ticket_no\" :\"<?= $ticket['ticket_no'] ?>\"}",
      width: 128,
      height: 128,
      colorDark : "#000000",
      colorLight : "#ffffff",
      correctLevel : QRCode.CorrectLevel.H
  });
</script>

