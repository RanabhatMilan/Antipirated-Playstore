<?php require "inc/header.php"; ?>
    <div id="site_content">
     
      <div id="content">
        <!-- insert the page content here -->
        <h1>Contact Us</h1>
        <p>THANK YOU for using our services.Please leave your enquires, comments, messages and suggestions here:</p>
        <form action="#" method="post">
          <div class="form_settings">
            <p><span>Name:</span><input  style="border: 2px solid black;" class="contact" type="text" name="your_name" id="your_name" value="" /></p>
            <p><span>Email Address:</span><input  style="border: 2px solid black;"  class="contact" type="email" name="your_email" id="your_email" value="" /></p>
            <p><span>Message:</span><textarea  style="border: 2px solid black;"   class="contact textarea" rows="8" cols="50" name="your_enquiry" id="your_enquiry"></textarea></p>
            <span>&nbsp;</span><button id="submit" class="submit" type="submit" name="contact_submitted" value="submit" >Submit</button>

          </div>
           <div style="margin-top: 15px; margin-bottom: 15px;"> <span  style="color: red;" class="msg hidden"></span><div></div>
        </form>
        
      </div>
    </div>
    
   <script type="text/javascript" src="bootstrap/js/jquery.min.js"></script>
   <script type="text/javascript">
     
     $('#submit').click(function(e){
        e.preventDefault();
        // $('.msg').html('');
        // $('.msg').addClass('hidden');
        var email_address = $('#your_email').val();
        var contact_name = $('#your_name').val();
        var msg = $('#your_enquiry').val();

        if (email_address =='' || contact_name =='' || msg ==''){
          $('.msg').html('Please fill all of the above fields.');
          $('.msg').removeClass('hidden');
        }else{ 
         
        $.post('inc/api.php', {email: email_address, name: contact_name, message : msg, act: 'add'}, function(res){
          //alert(res);
          if (res > 0) {
            $('.msg').html('Thank You for your enquiry.You will get response soon.');
          }else{
            $('.msg').html('Sorry! There was problem while redirecting your enquiry.');
          }
          
           $('#your_email').val('');
         $('#your_name').val('');
        $('#your_enquiry').val('');
        $('.msg').removeClass('hidden');
        
        });
      }
      setTimeout(function(){
        $('.msg').slideUp('slow');
        $('.msg').html('');
        $('.msg').addClass('hidden');
        window.location.href = window.location.href;
      },4000);
     });
   </script>

    <?php require 'inc/footer.php'; ?>