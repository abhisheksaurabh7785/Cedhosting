
    $(document).ready(function (){
      //submit button disable
      $('#submit').prop('disabled',true);
      //var declaration
      var prodname = /^(?![0-9]*$)[a-zA-Z0-9]+$/;
      var monthlypri  = /^[0-9]*\.?[0-9]*$/;
      var sku = /^[a-zA-Z0-9#](?:[a-zA-Z0-9_-]*[a-zA-Z0-9])?$/;
      var domain = /^([0-9]+|[a-zA-Z]+)$/;
      var lang = /^(([a-zA-Z]+|[a-zA-Z0-9]+)|([a-zA-Z]+[,]|[a-zA-Z0-9]+[,]))$/;
      //category validation
      $("#category").on('blur',function(){
          
      });
      //regex + EMPTY validation
      //regex product name validation
      $("#input-email").on('blur',function(){
        if($('#input-email').val()==''){
            //alert('please fill product name');
            $('#input-email').addClass('is-invalid');
            $('#input-email').removeClass('is-valid');
        }else if(!(prodname.test($('#input-email').val()))){
            $('#input-email').addClass('is-invalid');
            $('#input-email').removeClass('is-valid');
        }else{
          $('#input-email').addClass('is-valid');
          $('#input-email').removeClass('is-invalid');
        }
      });
      //monthly price validation
      $("#monthlyprice").on('blur',function(){
        if($('#monthlyprice').val()==''){
            //alert('please fill product name');
            $('#monthlyprice').addClass('is-invalid');
            $('#monthlyprice').removeClass('is-valid');
        }else if(!(monthlypri.test($('#monthlyprice').val()))){
            $('#monthlyprice').addClass('is-invalid');
            $('#monthlyprice').removeClass('is-valid');
        }else{
          $('#monthlyprice').addClass('is-valid');
          $('#monthlyprice').removeClass('is-invalid');
        }
      });
      //annual price validation
      $("#annualprice").on('blur',function(){
        if($('#annualprice').val()==''){
            //alert('please fill product name');
            $('#annualprice').addClass('is-invalid');
            $('#annualprice').removeClass('is-valid');
        }else if(!(monthlypri.test($('#annualprice').val()))){
            $('#annualprice').addClass('is-invalid');
            $('#annualprice').removeClass('is-valid');
        }else{
          $('#annualprice').addClass('is-valid');
          $('#annualprice').removeClass('is-invalid');
        }
      });
      //sku validation
      $("#sku").on('blur',function(){
        if($('#sku').val()==''){
            //alert('please fill product name');
            $('#sku').addClass('is-invalid');
            $('#sku').removeClass('is-valid');
        }else if(!(sku.test($('#sku').val()))){
            $('#sku').addClass('is-invalid');
            $('#sku').removeClass('is-valid');
        }else{
          $('#sku').addClass('is-valid');
          $('#sku').removeClass('is-invalid');
        }
      });
      //webspace validation
      $("#webspace").on('blur',function(){
        if($('#webspace').val()==''){
            //alert('please fill product name');
            $('#webspace').addClass('is-invalid');
            $('#webspace').removeClass('is-valid');
        }else if(!(monthlypri.test($('#webspace').val()))){
            $('#webspace').addClass('is-invalid');
            $('#webspace').removeClass('is-valid');
        }else{
          $('#webspace').addClass('is-valid');
          $('#webspace').removeClass('is-invalid');
        }
      });
      //bandwidth validation
      $("#bandwidth").on('blur',function(){
        if($('#bandwidth').val()==''){
            //alert('please fill product name');
            $('#bandwidth').addClass('is-invalid');
            $('#bandwidth').removeClass('is-valid');
        }else if(!(monthlypri.test($('#bandwidth').val()))){
            $('#bandwidth').addClass('is-invalid');
            $('#bandwidth').removeClass('is-valid');
        }else{
          $('#bandwidth').addClass('is-valid');
          $('#bandwidth').removeClass('is-invalid');
        }
      });
      //domain validation
      $("#domain").on('blur',function(){
        if($('#domain').val()==''){
            //alert('please fill product name');
            $('#domain').addClass('is-invalid');
            $('#domain').removeClass('is-valid');
        }else if(!(domain.test($('#domain').val()))){
            $('#domain').addClass('is-invalid');
            $('#domain').removeClass('is-valid');
        }else{
          $('#domain').addClass('is-valid');
          $('#domain').removeClass('is-invalid');
        }
      });
      //language validation
      $("#language").on('blur',function(){
        if($('#language').val()==''){
            //alert('please fill product name');
            $('#language').addClass('is-invalid');
            $('#language').removeClass('is-valid');
        }else if(!(lang.test($('#language').val()))){
            $('#language').addClass('is-invalid');
            $('#language').removeClass('is-valid');
        }else{
          $('#language').addClass('is-valid');
          $('#language').removeClass('is-invalid');
        }
      });
      //mailbox validation
      $("#mailbox").on('blur',function(){
        if($('#mailbox').val()==''){
            //alert('please fill product name');
            $('#mailbox').addClass('is-invalid');
            $('#mailbox').removeClass('is-valid');
        }else if(!(domain.test($('#mailbox').val()))){
            $('#mailbox').addClass('is-invalid');
            $('#mailbox').removeClass('is-valid');
        }else{
          $('#mailbox').addClass('is-valid');
          $('#mailbox').removeClass('is-invalid');
        }
      });
      //empty field
      
      //submit button enabled when all field are filled
      $('#form').keyup(function(){
        if($('#category').val()!='' && $('#input-email').val()!='' && $('#monthlyprice').val()!='' && $('#annualprice').val()!='' && $('#sku').val()!='' && $('#webspace').val()!='' && $('#bandwidth').val()!='' && $('#domain').val()!='' && $('#language').val()!='' && $('#mailbox').val()!=''){
            $('#submit').attr('disabled', false);
        }
            //empty field validation
        // else if($('#category').val()==''){
        //     alert('please fill category');
        //     //return false;
        // } 
        
        // else if($('#monthlyprice').val()==''){
        //     alert('please fill monthly price');
        //     //return true;
        // }
        // else if($('#annualprice').val()==''){
        //     alert('please fill annual price');
        //     //return true;
        // }
        // else if($('#sku').val()==''){
        //     alert('please fill sku');
        //     //return true;
        // }
        // else if($('#webspace').val()==''){
        //     //alert('please fill webspace');
        //     //return true;
        // }
        // else if($('#bandwidth').val()==''){
        //     alert('please fill bandwidth');
        //     //return true;
        // }
        // else if($('#domain').val()==''){
        //     alert('please fill domain');
        //     //return true;
        // }
        // else if($('#language').val()==''){
        //     alert('please fill language');
        //     //return true;
        // }
        // else if($('#mailbox').val()==''){
        //     alert('please fill mailbox');
        //     //return true;
        // }
        //regex monthly price  validation
        // else if(!(montlypri.test($('#monthlyprice').val()))){
        //   alert('Enter only valid numeric character in monthly price');
        //   return false;
        // }
        //regex monthly price  validation
        // else if(!(montlypri.test($('#annualprice').val()))){
        //   alert('Enter only valid numeric character in monthly price');
        //   return false;
        // }

        else
        {
            $('#submit').attr('disabled', true);        
        }
      });
      
    
     });


