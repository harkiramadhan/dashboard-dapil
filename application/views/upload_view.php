<!DOCTYPE HTML>

<html>
<head>
	<title>Multiple Upload</title>

<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">


<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />

<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>


<style type="text/css">

body{
	background-color: #E8E9EC;
}

.dropzone {
	margin-top: 100px;
	border: 2px dashed #0087F7;
}

.dz-image{
    width: 250px!important;
}

</style>

</head>
<body>


<div class="dropzone">

  <div class="dz-message">
   <h3> Klik atau Drop gambar disini</h3>
  </div>

</div>



<script type="text/javascript">
    Dropzone.autoDiscover = false;

    var foto_upload= new Dropzone(".dropzone",{
        url: "<?php echo site_url('upload/import/') ?>",
        maxFilesize: 100,
        method:"post",
        paramName:"file",
        dictInvalidFileType:"Type file ini tidak dizinkan",
        addRemoveLinks:true,
        uploadMultiple:false
    });


    //Event ketika Memulai mengupload
    foto_upload.on("sending",function(a,b,c){
        a.token=Math.random();
        c.append("token_foto",a.token); //Menmpersiapkan token untuk masing masing foto
    });

</script>

</body>
</html>