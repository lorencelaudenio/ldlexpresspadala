<script>
    function copyTXN() {
        var copyText = document.getElementById("txn");

        

/* Copy the text inside the text field */
document.execCommand("copy");

/* Alert the copied text */
alert("Copied the text: " + copyText.value);
}
</script>