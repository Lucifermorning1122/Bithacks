function SendMail() {

    var params = {
    
    from_name: document.getElementById("fullname").value,
     email_id : document.getElementById("email_id").value,
    message : document.getElementById("message").value
    }
    emailjs.send("service_ok1zgkx" , "template_yho5q6b",params).then(function(res) {
        alert("Success!" + res.status)
    })
}