<script>
    $("#button").click(function(){
        $.get("interesesBanco", function(data, status){
            alert("Data: " + data + "\nStatus: " + status);
        });
    });
</script>