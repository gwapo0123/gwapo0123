var base_url = "http://localhost:8080/ass_web";

$(function(){

    // ===== ===== =====

    // Add driver
    $( "#btn_add_driver" ).click(function(event){
        console.log("Add driver clicked");
        event.preventDefault();

        var first_name = $("input[name='first_name']").val();
        var middle_name = $("input[name='middle_name']").val();
        var last_name = $("input[name='last_name']").val();
        var email_address = $("input[name='email_address']").val();
        var complete_address = $("input[name='complete_address']").val();
        var contact_number = $("input[name='contact_number']").val();
        var emergency_number = $("input[name='emergency_number']").val();
        var license_number = $("input[name='license_number']").val();

        $.ajax({
          type:"post",
          url: base_url + "/drivers/add_driver",
          data:{first_name : first_name, 
                middle_name : middle_name,
                last_name : last_name,
                email_address : email_address,
                complete_address : complete_address,
                contact_number : contact_number,
                emergency_number : emergency_number,
                license_number : license_number
                },
            success:function(data){
              console.log(data);
            }
          });
    });

     // Edit driver
    $("#btn_edit_driver").click(function(event){
      console.log("Edit driver clicked");        
      event.preventDefault();

      var id = $("input[name='edit_id']").val();
      var first_name = $("input[name='edit_first_name']").val();
      var middle_name = $("input[name='edit_middle_name']").val();
      var last_name = $("input[name='edit_last_name']").val(); 
      var email_address = $("input[name='edit_email_address']").val();
      var complete_address = $("input[name='edit_complete_address']").val();
      var contact_number = $("input[name='edit_contact_number']").val();
      var emergency_number = $("input[name='edit_emergency_number']").val();
      var license_number = $("input[name='edit_license_number']").val();
      console.log(email_address);
      console.log(complete_address);
        $.ajax({
            type:"POST",
            data: {
              id:id,
              first_name:first_name,
              middle_name:middle_name,
              last_name:last_name,
              email_address:email_address,
              complete_address:complete_address,
              contact_number:contact_number,
              emergency_number:emergency_number,
              license_number:license_number
            },
            url: base_url + "/drivers/edit_driver",
            success:function(result){
              console.log(result);

            }
          });
    });

    // Add taxi
    $( "#btn_add_taxi" ).click(function(event){
      console.log("Add taxi clicked");        
      event.preventDefault();

      var plate_number = $("input[name='plate_number']").val();
      var brand = $("input[name='brand']").val();
      var body_number = $("input[name='body_number']").val(); 
      var last_change_oil_date = $("input[name='last_change_oil_date']").val();

      if(plate_number == "" || brand == "" || body_number == "" || last_change_oil_date == ""){
        alert("Please fill in all the fields!");
      }
      else{
        $.ajax({
          type:"post",
          url: base_url + "/taxis/add_taxi",
          data:{plate_number : plate_number, 
                brand : brand,
                body_number : body_number,
                last_change_oil_date : last_change_oil_date
                },
            success:function(data){
              console.log(data);
            }
          });
      }
    });

    // Edit taxi
    $( "#btn_edit_taxi" ).click(function(event){
      console.log("Edit taxi clicked");        
      event.preventDefault();

      var id = $("input[name='edit_id']").val();
      var plate_number = $("input[name='edit_plate_number']").val();
      var brand = $("input[name='edit_brand']").val();
      var body_number = $("input[name='edit_body_number']").val(); 
      var last_change_oil_date = $("input[name='edit_last_change_oil_date']").val();

        $.ajax({
            type:"POST",
            data: {
              id:id,
              plate_number:plate_number,
              brand:brand,
              body_number:body_number,
              last_change_oil_date:last_change_oil_date
            },
            url: base_url + "/taxis/edit_taxi",
            success:function(result){
              console.log(result);

            }
          });
    });

     // Edit rental
    $( "#btn_edit_rental" ).click(function(event){
      console.log("Edit rental clicked");        
      event.preventDefault();

      var id = $("#edit_lbl_id").val();
      var date_from = $("#edit_lbl_date_from").val();
      var date_to = $("#edit_lbl_date_to").val();
          
        $.ajax({
            type:"POST",
            data: {
              id:id,
              date_from:date_from,
              date_to:date_to
            },
            url: base_url + "/rentals/extend_date_to",
            success:function(result){
              console.log(result);

            }
          });
    });

    // Add reminder
    $( "#btn_add_reminder" ).click(function(event){
      console.log("Add reminder clicked");
      event.preventDefault();

      var title = $("input[name='title']").val();
      var message = $("textarea[name='message']").val();

      console.log(title);
      console.log(message);

      $.ajax({
        type:"post",
        url: base_url + "/reminders/add_reminder",
        data:{title : title, 
        message : message
        },
        success:function(data){
          console.log(data);
        }
      });
    });

     // Add reminder
    $("#btn_add_rental").click(function(event){
      console.log("Add rental clicked");
      event.preventDefault();

      var driver_id = $("#lbl_driver option:selected").val();
      var taxi_id = $("#lbl_taxi option:selected").val();
      var date_from = $("#lbl_date_from").val();
      var date_to = $("#lbl_date_to").val();

      $.ajax({
        type:"post",
        url: base_url + "/rentals/add_rental",
        data:{
          driver_id : driver_id, 
          taxi_id : taxi_id, 
          date_from : date_from, 
          date_to : date_to, 
        },
        success:function(data){
          console.log(data);
        }
      });
    });
});


