<?php
include_once 'includes/seg.php';
include_once 'includes/head.php';

?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.3.8/html5-qrcode.min.js"></script>
<style>
  .result{
    background-color: black;
    color:#fff;
    padding:20px;
  }
  .row{
    display:flex;
  }
</style>
<h4>QR CODE SCAN - AULAS</h4>

<center>
<div class="row">
  <div class="col">
    <center><div style="width:500px;" id="reader" autoplay></div></center>

<script>
function showHint(str) {
  if (str.length == 0) {
    document.getElementById("txtHint").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("POST", "gethint.php?&tag=" + str, true);
    xmlhttp.send();
  }
}




  </script>
  <div class="col" style="padding:30px;">
   
    <div></div><form action="">
     <input type="hidden" name="start" class="input" id="result" onkeyup="showHint(this.value)" placeholder="result here" readonly="" /></form>
  
  </div>
</div>
</center>
<script type="text/javascript">
function onScanSuccess(qrCodeMessage) {
    document.getElementById("result").value = qrCodeMessage;
    showHint(qrCodeMessage);
    window.alert('Presença confirmada!');

    
    //location.reload();


}
function onScanError(errorMessage) {
  //handle scan error
}
var html5QrcodeScanner = new Html5QrcodeScanner(
    "reader", { fps: 10, qrbox: 250 });
html5QrcodeScanner.render(onScanSuccess, onScanError);

</script>