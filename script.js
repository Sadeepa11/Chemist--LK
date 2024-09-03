
function changeView() {

    var signUpBox = document.getElementById("signUpBox");
    var signInBox = document.getElementById("signInBox");

    signUpBox.classList.toggle("d-none");
    signInBox.classList.toggle("d-none");

}

function signUp() {

    var f = document.getElementById("f");
    var l = document.getElementById("l");
    var e = document.getElementById("e");
    var p = document.getElementById("p");
    var g = document.getElementById("m");
    var g = document.getElementById("g");

    var form = new FormData;
    form.append("f", f.value);
    form.append("l", l.value);
    form.append("e", e.value);
    form.append("p", p.value);
    form.append("m", m.value);
    form.append("g", g.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4) {
            var text = request.responseText;
            if (text == "success") {
                document.getElementById("msg").innerHTML = text;
                document.getElementById("msg").className = "bi bi-check2-circle fs-5";
                document.getElementById("alertdiv").className = "alert alert-success";
                document.getElementById("msgdiv").className = "d-block";
            } else {
                document.getElementById("msg").innerHTML = text;
                document.getElementById("msgdiv").className = "d-block";
            }
        }
    }

    request.open("POST", "signUpProcess.php", true);
    request.send(form);

}

function signIn() {

    var email = document.getElementById("email2");
    var password = document.getElementById("password2");
    var rememberme = document.getElementById("rememberme");

    var f = new FormData();
    f.append("e", email.value);
    f.append("p", password.value);
    f.append("r", rememberme.checked);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                window.location = "dashboard.php";
            } else {
                document.getElementById("msg2").innerHTML = t;
            }

        }
    };

    r.open("POST", "signInProcess.php", true);
    r.send(f);

}

var bm;
function forgotPassword() {

    var email = document.getElementById("email2");

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "Success") {
                alert("Verification code has sent to your email. Please check your inbox");

                var m = document.getElementById("forgotPasswordModal");
                bm = new bootstrap.Modal(m);
                bm.show();
            } else {
                document.getElementById("msg2").innerHTML = t

            }

        }
    }

    r.open("GET", "forgotPasswordProcess.php?e=" + email.value, true);
    r.send();



}

function showPassword() {



    var np = document.getElementById("np");
    var npb = document.getElementById("npb");

    if (np.type == "password") {

        np.type = "text";
        npb.innerHTML = "Hide";

    } else {
        np.type = "password";
        npb.innerHTML = "Show";
    }

}
function showPassword2() {



    var rnp = document.getElementById("rnp");
    var rnpb = document.getElementById("rnpb");

    if (rnp.type == "password") {

        rnp.type = "text";
        rnpb.innerHTML = "Hide";

    } else {
        rnp.type = "password";
        rnpb.innerHTML = "Show";
    }

}
function resetPassword() {

    var email = document.getElementById("email2");
    var np = document.getElementById("np");
    var rnp = document.getElementById("rnp");
    var vcode = document.getElementById("vc");


    var f = new FormData();

    f.append("e", email.value);
    f.append("n", np.value);
    f.append("r", rnp.value);
    f.append("v", vcode.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                alert("Your Password is Updated");
                bm.hide();

            } else {
                alert(t);
            }
        }

    };


    r.open("POST", "resetPasswordProcess.php", true);
    r.send(f);

}
function signout() {
    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {

                window.location.reload();

            }
        }
    }


    r.open("GET", "signoutProcess.php", true);
    r.send();
}
function adminSignout() {
    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {

                window.location.reload();

            }
        }
    }


    r.open("GET", "adminSignoutProcess.php", true);
    r.send();
}


function showPassword() {



    var np = document.getElementById("np");
    var npb = document.getElementById("npb");

    if (np.type == "password") {

        np.type = "text";
        npb.innerHTML = "Hide";

    } else {
        np.type = "password";
        npb.innerHTML = "Show";
    }

};
function changeImage() {
    var viwe = document.getElementById("viweImg");
    var file = document.getElementById("profileimage");

    file.onchange = function () {
        var img = this.files[0];
        var url = window.URL.createObjectURL(img);
        viwe.src = url;
    }
};
function updateProfile() {
    var fname = document.getElementById("f");
    var lname = document.getElementById("l");
    var grade = document.getElementById("g");
    var image = document.getElementById("profileimage");

    var f = new FormData();
    f.append("fn", fname.value);
    f.append("ln", lname.value);
    f.append("g", grade.value);



    if (image.files.length == 0) {

        var confirmation = confirm("Are you sure You don't want to update Profile Image?");

        if (confirmation) {
            alert("you have not selected any image.");
        }

    } else {
        f.append("image", image.files[0]);
    }

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                window.location.reload();
            } else {
                alert(t);
            }
        }
    }

    r.open("POST", "updateProfileProcess.php", true);
    r.send(f);
}







var av;
function adminVerification() {
    var email = document.getElementById("ade");

    var f = new FormData();
    f.append("e", email.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "Success") {
                var adminVerificationModal = document.getElementById("verificationModal");
                av = new bootstrap.Modal(adminVerificationModal);
                av.show();
            } else {
                alert(t);
            }
        }
    }

    r.open("POST", "adminVerificationProcess.php", true);
    r.send(f);
}

function verify() {
    var verification = document.getElementById("vcode");

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                av.hide();
                window.location = "adminDashboard.php";
            } else {
                alert(t);
            }

        }
    }

    r.open("GET", "verificationProcess.php?v=" + verification.value, true);
    r.send();
}




var ml;
function modelL() {
    var modalL = document.getElementById("modelL");
    ml = new bootstrap.Modal(modalL);
    ml.show();
};

function uploadlesson() {
    var lessName = document.getElementById("lessName");
    var lessPrice = document.getElementById("lessPrice");
    var lessImg = document.getElementById("lessImg");
    var lessNote = document.getElementById("lessNote");





    var f = new FormData();




    if (lessImg.files.length == 0) {

        alert("Please Select a Cover to Lesson");

    } else {
        f.append("lessName", lessName.value);
        f.append("lessPrice", lessPrice.value);
        f.append("lessImg", lessImg.files[0]);
        f.append("lessNote", lessNote.files[0]);





        var r = new XMLHttpRequest();

        r.onreadystatechange = function () {
            if (r.readyState == 4) {
                var t = r.responseText;

                if (t == "Success") {
                    ml.hide();
                    window.location.reload();
                } else {
                    alert(t);
                }

            }
        }

        r.open("POST", "addLessonProcess.php", true);
        r.send(f);
    }
}
function edit() {
    window.location = "lesson.php";


}

var mv;
function modelV() {
    var modal1 = document.getElementById("modelV");
    mv = new bootstrap.Modal(modal1);
    mv.show();
};


function uploadVideo() {

    var video = document.getElementById("video");
    var vidName = document.getElementById("vidName");
    var vidImg = document.getElementById("vidImg");
    var lessId = document.getElementById("lessId");

    var f = new FormData();

    f.append("video", video.files[0]);
    f.append("vidImg", vidImg.files[0]);
    f.append("vidName", vidName.value);
    f.append("lessId", lessId.value);




    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;




            if (t == "Success") {
                mv.hide();
                window.location.reload();
            } else {
                alert(t);
            }

        }
    }

    r.open("POST", "addVideo.php", true);
    r.send(f);
}


var muv;
function modelUV() {
    var modal3 = document.getElementById("modelUV");
    muv = new bootstrap.Modal(modal3);
    muv.show();
};


function updateVideo(id) {

    var uvideo = document.getElementById("uvideo");
    var uvidName = document.getElementById("uvidName");
    var uvidImg = document.getElementById("uvidImg");
    var ulessId = document.getElementById("ulessId");



    // alert(uvideo.value);
    // alert(uvidName.value);
    // alert(uvidImg.value);
    // alert(ulessId.value);

    var f = new FormData();

    f.append("uvideo", uvideo.files[0]);
    f.append("uvidImg", uvidImg.files[0]);
    f.append("uvidName", uvidName.value);
    f.append("ulessId", ulessId.value);
    f.append("vidId", id.value);




    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;




            if (t == "Success") {
                mv.hide();
                window.location.reload();
            } else {
                alert(t);
            }

        }
    }

    r.open("POST", "updateVideo.php", true);
    r.send(f);
}


// function uploadNotes(id){

// var note=document.getElementById("uploadNotes");

// var f = new FormData();

// f.append("note", note.files[0]);
// f.append("lessId", id);





// var r = new XMLHttpRequest();

// r.onreadystatechange = function () {
//     if (r.readyState == 4) {
//         var t = r.responseText;




//         if (t == "Success") {
            
//             window.location.reload();
//         } else {
//             alert(t);
//         }

//     }
// }

// r.open("POST", "addNote.php", true);
// r.send(f);
// }
function deleteLesson(id){

    var f = new FormData();

    f.append("lessId", id);
    
    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
    
    
    
    
            if (t == "Success") {
                
                window.location.reload();
            } else {
                alert(t);
            }
    
        }
    }
    
    r.open("POST", "deleteLesson.php", true);
    r.send(f);

}
function deleteVideo(id){

    var f = new FormData();

    f.append("id", id);
    
    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
    
    
    
    
            if (t == "Success") {
                
                window.location.reload();
            } else {
                alert(t);
            }
    
        }
    }
    
    r.open("POST", "deleteVideo.php", true);
    r.send(f);

}
function purchaseLesson(id){

    var f = new FormData();

    f.append("id", id);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
    
   
    
    
            if (t == "Success") {
                
                window.location.reload();
            } else {
                alert(t);
            }
    
        }
    }
    
    r.open("POST", "purchaseLesson.php", true);
    r.send(f);

}











