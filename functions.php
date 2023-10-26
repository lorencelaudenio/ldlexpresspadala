<script>
  function CopyMyLeftTd(e) {
var leftTdIndex= $(e).parent().index()-0;
var leftTd= $(e).closest("tr").find("td:eq(" + leftTdIndex + ")");
copyToClipboard($(leftTd).text());
}

function copyToClipboard(txt) {
 var el = document.createElement('textarea');
 
  el.value = txt;
  el.setAttribute('readonly', '');
  el.style.position = 'absolute';
  el.style.left = '-9999px';
  document.body.appendChild(el);
  el.select();
  document.execCommand('copy');
  document.body.removeChild(el);

  // alert("Transaction number copied: " + el.value);
}
</script>



