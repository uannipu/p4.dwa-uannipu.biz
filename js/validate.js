/**
 * Created with JetBrains PhpStorm.
 * User: UAnnipu
 * Date: 12/21/13
 * Time: 9:52 PM
 * To change this template use File | Settings | File Templates.
 */

function validateHours(){

    var num     = $('.hrs').length;
    if(num > 0){
        var myChildren = $('.hrs').children("input[name*='hr']"); // get the values of hour field
        for(var i=0; i<num;i++){
            var hr = $(myChildren[i]).val().trim();
            if(hr.length < 1){
                $('#hours-error').css('color','red');
                $('#hours-error').html('Hours is required');
                return false;
            } else
                $('#hours-error').html('');
        }
    }
    return true;
}
function validateYear(){

    var num     = $('.hrs').length;
    if(num > 0){
        var year = $('.hrs').children("select[name*='year']"); // get the values of resource name field
        for(var i=0; i<num;i++){
            var yr = $(year[i]).val().trim();
            if(yr.length < 1){
                $('#years-error').css('color','red');
                $('#years-error').html('Year is required');
                return false;
            } else
                $('#years-error').html('');
        }
    }
    return true;
}

function validateWork(){

    var num     = $('.hrs').length;
    if(num > 0){
        var work = $('.hrs').children("select[name*='typ']"); // get the values of resource name field
        for(var i=0; i<num;i++){
            var wk = $(work[i]).val().trim();
            if(wk.length < 1){
                $('#work-error').css('color','red');
                $('#work-error').html('Work Type is required');
                return false;
            } else
                $('#work-error').html('');
        }
    }
    return true;
}

function validateSubj(){
    var num     = $('.hrs').length;
    if(num > 0){
        var subj = $('.hrs').children("select[name*='subj']"); // get the values of resource name field
        for(var i=0; i<num;i++){
            var sub = $(subj[i]).val().trim();
            if(sub.length < 1){
                $('#subj-error').css('color','red');
                $('#subj-error').html('Testing Subject is required');
                return false;
            } else
                $('#subj-error').html('');
        }
    }
    return true;
}
function validateRestype(){
    alert('hiiiiiii4');
    var num     = $('.hrs').length;
    if(num > 0){
        var ress = $('.hrs').children("select[name^=res]");
        for(var i=0; i<num;i++){
            var res = $(ress[i]).val().trim();
            if(res.length < 1){
                $('#res-error').css('color','red');
                $('#res-error').html('Resource Type is required');
                return false;
            } else
                $('#res-error').html('');
        }
    }
    return true;
}

function validateResname(){
    var num     = $('.hrs').length;
    if(num > 0){
        var resNames = $('.hrs').children("input[name*='name']"); // get the values of resource name field
        for(var i=0; i<num;i++){
            var resn = $(resNames[i]).val().trim();
            if(resn.length < 1){
                $('#resname-error').css('color','red');
                $('#resname-error').html('Resource name is required');
                return false;
            } else
                $('#resname-error').html('');
        }
    }
    return true;
}



function validate(){
    if(validateHours()&& validateYear()&& validateWork()&& validateSubj()&& validateRestype() && validateResname()){
        return true
    }
    return false;
}

