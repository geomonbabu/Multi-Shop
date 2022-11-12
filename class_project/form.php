

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<style>.err { background: #A9CCE3; border: 1px solid #A9CCE3; }
.emsg { color: #1A5276; font-weight: bold; }</style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="card m-5">
                    <div class="card-body p-5">
                        
                            <div class="m-2">
                            <div id="dataverify" class="emsg"></div>  
                            <input type="email" id="emailid" class="form-control" placeholder="Email">
                            <div id="cemail" class="emsg"></div> 
                            </div>
                            <div class="m-2 d-flex justify-content-center">
                            <button class="btn btn-outline-primary mx-2" name="verify" onclick="userverify()">Verify</button>
                            </div> 
                       
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card m-5">
                    <div class="card-body p-5">
                        
                             <input type="hidden" name="user_id" id="uid">
                            <div class="m-2">
                            <div id="dataupdate" class="emsg"></div>  
                            <input type="text" name="name" id="uname" class="form-control" placeholder="Name" required>
                            <div id="cname" class="emsg"></div>  
                            </div>
                            <div class="m-2">
                            <input type="email" name="email" id="uemail" class="form-control" placeholder="Email" required>
                            <div id="cuemail" class="emsg"></div> 
                            </div>
                            <div class="m-2">
                            <input type="number" name="contact" id="ucontact" class="form-control" placeholder="Contact" required> 
                            <div id="ccontact" class="emsg"></div>
                            </div>
                            <div class="m-2 d-flex justify-content-center">
                            <button class="btn btn-outline-primary mx-2" id="submit" name="submit" onclick="usersubmit()">Submit</button>
                            <button class="btn btn-outline-danger mx-2" id="delete" name="delete" onclick="userdelete()" style="display:none">Delete</button>
                            <button class="btn btn-outline-primary mx-2" id="update" name="update" onclick="userupdate()" style="display:none">Update</button>
                            <button class="btn btn-outline-warning mx-2" name="cancel" id="cancel" onclick="usercancel()" style="display:none">Cancel</button>
                            </div>  
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script type="text/javascript">

        function userverify(){

            //email field validation

            field = document.getElementById("emailid");
            error = document.getElementById("cemail");
            email=$('#emailid').val();
            if(!email){
                valid = false;
                field.classList.add("err");
                error.innerHTML = "Please enter your email\r\n";
                setTimeout(function(){
                    error.innerHTML = ""
                },5000)
                form.reset();
            }


           
           //verify email 
           name=$('#uname').val();
           contact=$('#ucontact').val();
           user_id=$('#uid').val();

            $.ajax({
                type:"POST",
                url: "verify.php",
                data: {
                email:email},
                success: function(response){

                    $('#submit').hide();
                    $('#update').show();
                    $('#cancel').show();
                    $('#delete').show();

                    const resultNew = JSON.parse(response);
                   
                    $("#uid").val(resultNew.user_id);
                    $("#uname").val(resultNew.name);
                    $("#uemail").val(resultNew.email);
                    $("#ucontact").val(resultNew.contact);

                    document.getElementById("emailid").value = "";
                    error = document.getElementById("dataverify");
                    valid = false;
                    field.classList.add("err");
                    error.innerHTML = "Verified successfully\r\n";
                    setTimeout(function(){
                        error.innerHTML = ""
                    },5000)
                    form.reset();
                }
            });

        }




//Insert user details

        function usersubmit(){

            //input field validation
            name=$('#uname').val();
            email=$('#uemail').val();
            contact=$('#ucontact').val();
            
        //Name validation
            field = document.getElementById("uname");
            error = document.getElementById("cname");
            if(!name){
                valid = false;
                field.classList.add("err");
                error.innerHTML = "Please enter your name\r\n";
                setTimeout(function(){
                    error.innerHTML = ""
                },5000)
                form.reset();
            }
            

            //Email validation
            field = document.getElementById("uemail");
            error = document.getElementById("cuemail");
            if(!email){
                valid = false;
                field.classList.add("err");
                error.innerHTML = "Please enter your email\r\n";
                setTimeout(function(){
                    error.innerHTML = ""
                },5000)
                form.reset();
            }



            //Contact validation
            field = document.getElementById("ucontact");
            error = document.getElementById("ccontact");
            if(!contact){
                valid = false;
                field.classList.add("err");
                error.innerHTML = "Please enter your contact\r\n";
                setTimeout(function(){
                    error.innerHTML = ""
                },5000)
                form.reset();
            }
            

            //Insert data

            $.ajax({
                type: "post",
                url: "insert.php",
                data: {
                name: name,
                email: email,
                contact: contact},
                success:function(data) {

                    document.getElementById("uname").value = "";
                    document.getElementById("uemail").value = "";
                    document.getElementById("ucontact").value = "";
                    error = document.getElementById("dataupdate");
                    valid = false;
                    field.classList.add("err");
                    error.innerHTML = "Inserted successfully\r\n";
                    setTimeout(function(){
                        error.innerHTML = ""
                    },5000)
                    form.reset();
                }
            });
            
    }



//Update user details

    function userupdate(){
        user_id=$('#uid').val();
        name=$('#uname').val();
        email=$('#uemail').val();
        contact=$('#ucontact').val();

        $.ajax({
                type: "post",
                url: "update.php",
                data: {
                user_id:user_id,
                name: name,
                email: email,
                contact: contact},
                success:function(data) {

                    error = document.getElementById("dataupdate");
                    valid = false;
                    field.classList.add("err");
                    error.innerHTML = "Updated successfully\r\n";
                    setTimeout(function(){
                        error.innerHTML = ""
                    },5000)
                    form.reset();
                }
            });        
    }



// Delete user details

    function userdelete(){
        user_id=$('#uid').val();
       

        $.ajax({
          url : "delete.php",
          type : "POST",
          data: {
                user_id:user_id},
                success:function(response){
                    $('#submit').show();
                    $('#update').hide();
                    $('#cancel').hide();
                    $('#delete').hide();

                    document.getElementById("uname").value = "";
                    document.getElementById("uemail").value = "";
                    document.getElementById("ucontact").value = "";
                    error = document.getElementById("dataupdate");
                    valid = false;
                    field.classList.add("err");
                    error.innerHTML = "Deleted successfully\r\n";
                    setTimeout(function(){
                     error.innerHTML = ""
                    },5000)
                    form.reset();
                }
        });
        
    }


    function usercancel(){
            document.getElementById("uname").value = "";
            document.getElementById("uemail").value = "";
            document.getElementById("ucontact").value = "";
    }

    </script>
    
</body>
</html>