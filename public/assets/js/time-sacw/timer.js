
function begintimer(){

    if (parselimit == 0){
        swal({
            title: "Your time is up.",
            text: 'click to submit',
            type: 'warning',
            confirmButtonText: 'Submit',
            confirmButtonClass: 'btn btn-confirm btn-sm mt-2',
            allowOutsideClick: false
        }).then(function (result) {
            if(result) {
                document.getElementById("form_test").submit();
            }
        })
        
    }else{
        parselimit-=1
        curmin = Math.floor(parselimit/60)
        cursec = parselimit%60
        
        if (curmin != 0)
            curtime = "<font color=red> "+curmin+" </font><font color=white> minutes </font><font color=red>"+cursec+" </font><font color=white> seconds remaining</font>"
        else {
            curtime="<font color=red>"+cursec+" </font><font color=white> seconds remaining</font>"
        }

        document.getElementById('displayTime').innerHTML = curtime;
        setTimeout("begintimer()",1000)
    }
}

