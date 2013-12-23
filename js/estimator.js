    /**
     * this function gets invoked on change event of the hours, resource type and resource name.
     * This method calculates the hours and amount based on the input fields dynamically.
     */
  function recalc(){
        validate();

        var tot = 0;
        var myChildren = $('.hrs').children("input[name*='hr']"); // get the values of hour field
        var names = $('.hrs').children("input[name*='name']"); // get the values of resource name field
        var subj = $('.hrs').children("select[name*='subj']"); // get the values of resource name field
        var work = $('.hrs').children("select[name*='typ']"); // get the values of resource name field
        var year = $('.hrs').children("select[name*='year']"); // get the values of resource name field

        for ( var i=0; i<myChildren.length; i++){
            var tmp = ($(myChildren[i]).val().trim());
            // check only if the length of the field > 1
            if (tmp.length >= 1) {
                if(!isNaN(tmp)){
                    var num = Math.floor($(myChildren[i]).val());
                    tot = tot+num;
                }
            }
        }

        // Array to hold rates of resources by type
        var rates = {"D":100, "T" :75 , "B": 85, "A":120};
        var res = $('.hrs').children("select[name*='res']"); // get the values of hour field

        var dollar =0; var rate=0 ;
        // iterate through to populate the values on the preview pane dynamically and calculate the total amount and hours
        // Apply the appropriate hourly rate based on the resource type
        for ( var i=0; i<res.length; i++){
            var opt = ($(res[i]).val());
            var cnt = i+1;
            if(opt == 'D'){
                rate =  rates['D']* Math.floor($(myChildren[i]).val());
                 $('#ebody tr:nth-child('+cnt+') td:nth-child(6)').html(rates['D']);
            } else if (opt == 'A'){
                rate =  rates['A']* Math.floor($(myChildren[i]).val());
                $('#ebody tr:nth-child('+cnt+') td:nth-child(6)').html(rates['A']);
            } else if (opt == 'B'){
                rate =  rates['B']* Math.floor($(myChildren[i]).val());
                $('#ebody tr:nth-child('+cnt+') td:nth-child(6)').html(rates['B']);
            } else if (opt == 'T'){
                rate =  rates['T']* Math.floor($(myChildren[i]).val());
                $('#ebody tr:nth-child('+cnt+') td:nth-child(6)').html(rates['T']);
            } else if(opt == ''){
                rate = 0;
                $('#ebody tr:nth-child('+cnt+') td:nth-child(6)').html('');
            }
            $('#ebody tr:nth-child('+cnt+') td:nth-child(5)').html($(myChildren[i]).val());
            $('#ebody tr:nth-child('+cnt+') td:nth-child(7)').html($(names[i]).val());


            $('#ebody tr:nth-child('+cnt+') td:nth-child(2)').html($(year[i]).val());
            //if drop down box value is empty, then set the text value to blank for the display purposes on the preview
            var resDesc =  $(res[i]).find("option:selected").text();
            if(opt == ''){
                resDesc = '';
            }
            var subjDesc =  $(subj[i]).find("option:selected").text();
            if($(subj[i]).val() == '') subjDesc = '';
            var workTypeDesc =  $(work[i]).find("option:selected").text();
            if($(work[i]).val() == '') workTypeDesc = '';
            var yearDesc =  $(year[i]).find("option:selected").text();
            if($(year[i]).val() == '') yearDesc = '';

            $('#ebody tr:nth-child('+cnt+') td:nth-child(2)').html(workTypeDesc);
            $('#ebody tr:nth-child('+cnt+') td:nth-child(4)').html(resDesc);
            $('#ebody tr:nth-child('+cnt+') td:nth-child(1)').html(yearDesc);
            $('#ebody tr:nth-child('+cnt+') td:nth-child(3)').html(subjDesc);
           // $('#ebody tr:nth-child('+cnt+') td:nth-child(1)').html($('#eId').val());

            dollar = dollar + rate; // calculate the dollar amount in a loop
        }
        // set the output divs for the preview
        $('#total-hours-output').html('Total Hours : '+ tot);
        $('#total-amount-output').html('Total Amount : '+dollar);

    }; // end of method recalc

    /**
    *   This method is invoked when a more method or remove method is clicked
    */

    $(document).ready(function() {
         $('#more').click(function() {
             var num     = $('.hrs').length;
               if(validate()){
                // check the total number of divs with class=hrs, there is always a min of 1 div with hrs.

                var newNum  = new Number(num + 1); // increment the number by 1
                // clone an existing div with id as input1 and change the attributes of the children elements by incrementing the id, name
                var newElem = $('#input' +num).clone().attr('id', 'input' + newNum);

                newElem.children(':first').attr('id', 'year' + newNum).attr('year', 'year' + newNum).val('');
                newElem.find("select[name^=typ]").attr('id', 'typ' + newNum).attr('typ', 'typ' + newNum).val('');
                newElem.find("select[name^=subj]").attr('id', 'subj' + newNum).attr('subj', 'subj' + newNum).val('');
                newElem.find("input[name^=hr]").attr('id', 'hr' + newNum).attr('hr', 'hr' + newNum).val('');
                newElem.find("select[name^=res]").attr('id', 'res' + newNum).attr('name', 'res' + newNum).val('');
                newElem.children(':last').attr('id', 'name' + newNum).attr('name', 'name' + newNum).val(''); // after cloning, set the values to blanks

                $('#input' + num).after(newElem); // add the new element after the previous input div element
                $('#newElem').append('<BR>');
                $('#input' + num).html='';
                var rowlen    = $('.hrs').length;
                if (rowlen == 1)
                    $('#btnDel').attr('disabled',true);
                else $('#btnDel').attr('disabled',false);
                /*if(num -1 == 1){
                    $('#btnDel').attr('disabled',true); // disable the remove button on load
                } else {
                    $('#btnDel').attr('disabled',false);
                }*/

                // add new rows on the preview table at the same time , each time the more button is clicked.
                var clsvar;
                if(num%2 == 1)clsvar = "oddRow"; else clsvar = "evenRow";

                var txt="<tr id=row"+newNum+" class="+clsvar+"><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>";

                // add the row after the previous row in the preview
                $('#row'+num).after(txt);
                 }
              }); // end of more function

             // this method is invoked when remove button is clicked, removes the bottom most row and disables when the available row is just 1
            // removes the rows from the preview window as well.
             $('#btnDel').click(function() {
                 var num = $('.hrs').length;
                 $('#input' + num).remove();
                 $("#est tr:eq("+num+")").remove();
                 calculate();
                 $('#btnAdd').attr('disabled',false);
                 if (num-1 == 1)
                     $('#btnDel').attr('disabled',true);
             });
            var rowlen    = $('.hrs').length;
            if (rowlen == 1)
                $('#btnDel').attr('disabled',true);
         });

            /*
         * This method is used for starting over the entry all over.
         */
        $('#refresh-btn').click(function() {
                //remove all the rows greater than 1
                $("#est tr:gt(1)").remove();
                //clear the contents of tds in second row

                for (var i =0; i< 8;i++){
                    $('#ebody tr:nth-child(2) td:nth-child('+i+')').html("");
                }
                //reset all the input fields on the form
                $("input[type=text], select").val("");

                // remove the extra fields for hours and resources
                $('.hrs:gt(0)').remove();

                // clear contents of amount and hours and pgm in the preview screen
                $('#total-amount-output').html("");
                $('#total-hours-output').html("");

                $('#hours-error').html("");
                $('#years-error').html("");
                $('#work-error').html("");
                $('#subj-error').html("");
                $('#res-error').html("");
                $('#resname-error').html("");
        });

       /*
        * This method is used utility method to calculate the hours and amount any time
        */
        function calculate() {

            var tot = 0;

            var myChildren = $('.hrs').children("input[name*='hr']"); // get the values of hour field
            var resNames = $('.hrs').children("input[name*='name']"); // get the values of resource name field
            var subj = $('.hrs').children("select[name*='subj']"); // get the values of resource name field
            var work = $('.hrs').children("select[name*='typ']"); // get the values of resource name field
            var year = $('.hrs').children("select[name*='year']"); // get the values of resource name field

            for ( var i=0; i<myChildren.length; i++){
                var num = Math.floor($(myChildren[i]).val());
               tot = tot+num;
            }

            var rates = {"D":100, "T" :75 , "B": 85, "A":120};

            var res = $('.hrs').children("select[name^=res]");
                //$('.hrs').children('select');
            var dollar =0; var rate=0 ;
            var rowArr = [];
            for ( var i=0; i<res.length; i++){
                var opt = ($(res[i]).val());

                rowArr[i] = [$(year[i]).val(),$(work[i]).val(),$(subj[i]).val(),$(myChildren[i]).val(),opt,$(resNames[i]).val()];

                if(opt == 'D'){
                    rate =  rates['D']* Math.floor($(myChildren[i]).val());
                } else if (opt == 'A'){
                    rate =  rates['A']* Math.floor($(myChildren[i]).val());
                } else if (opt == 'B'){
                    rate =  rates['B']* Math.floor($(myChildren[i]).val());
                } else if (opt == 'T'){
                    rate =  rates['T']* Math.floor($(myChildren[i]).val());
                } else if (opt == ''){
                    rate = 0;
                }
                dollar = dollar + rate;
            }

            $('#total-hours-output').html('Total Hours : '+ tot);
            $('#total-amount-output').html('Total Amount : '+dollar);
            $('#resultsArr').html(rowArr);
            return rowArr;
        };

    /*
        This function makes the ajax call to back end to save the results
     */

    function updateEst(pckgId){
        if(validate()){
            var arr = calculate();
            $.ajax({
                type:'POST',
                url: '/estimates/p_add',
                success: function(response) {
                    $('#results').html(response);
                    $('#results').css('color','green');
                },
                data: {
                    arr:arr,
                    workPckgId: pckgId,
                    testPgmCode:$('#testProgramCode').val()
                }
            });
        }
    }
