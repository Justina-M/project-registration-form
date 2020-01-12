$(document).ready(function() {
    $('#btn-submit').click(function(e){  //e - shorter for event
        e.preventDefault();  // stops from default submit action. We will submit it manually

        var club = $("#club").val();
        var isu_member = $("#isu_member").val();
        var contact_person = $("#contact_person").val();
        var contact_email = $("#contact_email").val();
        var judge_first_name = $("#judge_first_name").val();
        var judge_last_name = $("#judge_last_name").val();
        var judge_qualification = $("#judge_qualification").val();

        $.ajax({
            type: "POST",
            url: "save-data.php",
            dataType: "json",
            data: {
                club:club,
                isu_member:isu_member,
                contact_person:contact_person,
                contact_email:contact_email,
                judge_first_name:judge_first_name,
                judge_last_name:judge_last_name,
                judge_qualification:judge_qualification
            },
            success: function(data) {
                console.log(data);

                if (data.code == "200") {
                    alert('Thank you, your registration was successfully submited.'); // TODO redirect to thank-you page
                    console.log('Registration was successfull. Form data: ' + data.msg);
                    $("#registration-form")[0].reset();  // Reset all form data
                    $(".display-error").css("display", "none");  // Hide all errors
                    $("#btn-submit").prop("disabled", true);  // Disable submit button (avoiding sending twice and etc.)
                } else {
                    $(".display-error").html("<ul>" + data.msg + "</ul>");
                    $(".display-error").css("display", "block");
                }
            }
        });
    });
});