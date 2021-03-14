<?php include 'inc/header.php'; ?>
<?php 

  $login = Session::get('cuslogin');
  if($login == false){
    header('location:login.php');
  }
 

if(isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
  $cmrid = Session::get('cmrId');
  $userMessage = $cmr->InsertuserMessags($_POST,$cmrid);
}

?>


<style>

	#chat_box{
		width: 90%;
		height: 400px;
	}
	#chat_data{
		width: 100%;
		
		margin-bottom: 20px;
		border-bottom: 1px solid silver;
		font-weight:bold;
	}
	.name_user,.submit_user,.msg_user{
		width: 100%;
		height: 40px;
		border:1px solid gray;
		border-radius: 5px;
	}
	.submit_user{
		background: #1f3548;
		color: white;
	}

</style>
<body onload="ajax();">
	 <div class="row">
          <div class="col-lg-12" data-aos="fade-up" data-aos-delay="300">
	<div class="container">

			<div id="chat_box" style="overflow: auto;">
				<div id="chat"></div>
				

			</div>
			<form action=" " method="POST" >
				 <div class="form-group">
						<input class="form-control name_user" id="exampleFormControlInput1" type="text" name="name" placeholder="Enter Name" />
				  </div>
                  <div class="form-group">
						<textarea class="form-control msg_user" id="exampleFormControlTextarea1"  name="message" placeholder="Enter Message"></textarea>
				  </div>
                  <div class="form-group">
						<input class="submit_user" type="submit" name="submit" value="send" />
				  </div>
			</form>

	</div>
</div>
</div>
<script>
	
	function ajax() {

  		
  		var req =new XMLHttpRequest();

  		req.onreadystatechange = function(){
  			if(req.readyState == 4 && req.status == 200){
  				console.log(req.responseText);
  				document.getElementById('chat').innerHTML = req.responseText;
  			}
  		}
  		req.open('GET','chat1.php',true);
  		req.send();



	}

	setInterval(function(){ajax()},10000);


</script>
<!-- <script src="jquery-3.5.1.min.jsasdasdasd"></script>
<script>
        $(function(){
            
                $.ajax({
                    
                    method:"GET",
                    url:"chat.php",
                    
                    success: function(data,status,xhr){
                        $("#chat").html(data);
                    },
                   
                });
          
        });

    
    
    </script> -->
</body>
</html>
<?php include 'inc/footer.php'; ?>
