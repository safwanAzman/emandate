<div id="myDIV" style="display:none;">
    @include('pages.loading.loading')
</div>
<script>
    function loading() {
        var x = document.getElementById("myDIV");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }
</script>