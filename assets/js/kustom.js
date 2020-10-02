// $(document).ready(function(){    
//     $("#contactForm").submit(function(event){
//         submitForm();
//         return false;
//     });
// });
// // function to handle form submit
// function submitForm(){
//      $.ajax({
//         type: "POST",
//         // url: "save_kontak.php",
//         cache:false,
//         data: $('form#contactForm').serialize(),
//         success: function(response){
//             $("#contact").html(response)
//             $("#contact-modal").modal('hide');
//         },
//         error: function(){
//             alert("Error");
//         }
//     });
// }

$('#submitBtn').click(function() {
     $('#lname').text($('#lastname').val());
     $('#fname').text($('#firstname').val());
});

$('#submit').click(function(){
    alert('submitting');
    $('#formfield').submit();
});