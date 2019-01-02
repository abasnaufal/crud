<h1>Input Data Produk</h1>
<form name="form_input">
    <label for="">Nama Produk</label><br><br>
    <input type="text" name="name"><br><br>
    <label for="">Price</label><br><br>
    <input type="text" name="price"><br><br>
    <label for="">Decription</label><br><br>
    <input type="text" name="description"><br><br>
    <button type="submit">Save</button>
</form>

<script>
    $('[name="form_input"]').on('submit',function(e){
        e.preventDefault();

        var name= $('[name="name"]').val();

        var dataForm = $(this).serialize();
        console.log(dataForm);
        $.ajax({
            url : "<?php echo base_url('toko_buku/add'); ?>",
            type: "POST",
            data: dataForm + "&submit=1",
            success: function(data)
            {
                setTimeout(function(){
                    window.location = "<?php echo base_url('toko_buku/index'); ?>";
                }, 2000);
            },
            error: function(){
                setTimeout(function(){
                    window.location = "<?php echo base_url('toko_buku/add'); ?>";
                },2000);
            }
        });    
    });
</script>