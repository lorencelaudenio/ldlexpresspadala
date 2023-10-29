<script>
    /*delete record*/
function deleterecs(){

var del=confirm("Are you sure you want to all transactions?");
if (del==true){
   alert ("All transactions are deleted!")
}else{
    alert("No transactions were affected.")
}
return del;
}
</script>

<script>
    /*delete config*/
function deleteallrecords(){

var del=confirm("Are you sure you want to delete all records?");
if (del==true){
   alert ("All records are deleted!")
}else{
    alert("No records were affected.")
}
return del;
}
</script>

<script>
    /*save config*/
function confirm_save(){

var save=confirm("Save config?");
if (save==true){
   alert ("Config succesfully saved!")
}else{
    alert("No config affected.")
}
return save;
}


</script>

<script>
    const toggle = document.querySelector(".toggle"),
      input = document.querySelector(".password");
    toggle.addEventListener("click", () => {
      if (input.type === "password") {
        input.type = "text";
        toggle.classList.replace("fa-eye-slash", "fa-eye");
      } else {
        input.type = "password";
      }
    })


    function getfee(){	
	//document.getElementById("fee").value = Number(document.getElementById("amt").value) * 0.02;
    document.getElementById("fee").value = Number(document.getElementById("amt").value) * <?php echo json_encode($interest); ?>;
	document.getElementById("total").value = Number(document.getElementById("amt").value) + Number(document.getElementById("fee").value);
}

function getdestcode(){	
	var str = document.getElementById('dest').value;
    var res = str.substring(0,3);
    document.getElementById('destcode').value = res.toUpperCase();
}
  </script>

<script>
  function ShowPass() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>

<script>
  $(function () {
  $('[data-toggle="popover"]').popover()
  
})
</script>

<!-- <script>
  $('.popover-dismiss').popover({
  trigger: 'focus'
  
})
  </script> -->

<script>
  $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>

<!-- <script type="text/javascript">

$(document).ready(function () {
 
window.setTimeout(function() {
    $(".alert").fadeTo(1000, 0).slideUp(1000, function(){
        $(this).remove(); 
    });
}, 5000);
 
});
</script> -->

<script>
  $('.toast').toast(option)
</script>

<script>
$(document).ready( function () {
    $('#myTable').DataTable(

      {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    }
    );
    paging: true
    scrollY: 400

    
} );
</script>


