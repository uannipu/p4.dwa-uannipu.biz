
<div id='wrapper'>

    <h1>Estimation Calculator</h1>

    <!-- Left side with all the controls -->
    <div id='controls'>
        <form name='myForm' >

            <h2>Testing program</h2>
            <input type ="text" id='pgm' maxlength='14' data-validation="required"/>
            <div class='program' id ='pg'></div>
            <div id='pgm-error'>Max 14 chars</div>

            <div class='clearfix'></div>

            <h2>Year</h2>
            <div class='year' id='yr'>
                <select id='year'>
                    <option value=''>Select</option>
                    <option value='2014'>2014</option>
                    <option value='2015'>2015</option>
                    <option value='2016'>2016</option>
                </select>
            </div>
            <div class='clearfix'></div>

            <h2>Work Type</h2>
            <div class='typ' id='tp'>
                <select id='typ'>
                    <option value=''>Select</option>
                    <option value='D'>Development</option>
                    <option value='M'>Maintenance</option>
                </select>
            </div>
            <div class='clearfix'></div>

            <h2>Testing subject</h2>
            <input type ="text" id='subj' maxlength='14'/>
            <div id='subj-error'>Max 14 chars</div>
            <span class='error' id='sub-error'></span>

            <h2 id='h2sp'>Hours: Type: Name:</h2>

            <div class='hrs' id='input1'>
                <input type="text" name="hr1" id="hr1" onkeyup="recalc()" />
                <select class='drpBox' id='res1' name='res1' onchange="recalc()">
                    <option value=''>Select</option>
                    <option value='D'>Developer</option>
                    <option value='B'>BSA</option>
                    <option value='T'>Tester</option>
                    <option value='A'>Sr.Architect</option>
                </select>
                <input type="text" name="name1" id="name1" onkeyup="recalc()" />
            </div>
            <div class='clearfix'></div>

            <br/>
            <input type='button' id='more' value='More'>
            <input type='button' id='btnDel' value='Remove' />

            <br/><br/>
        </form>
    </div>
    <!-- Right side with the live preview -->
    <div id='preview'>
        <div id='card-background'>
            <div id='canvas'>
                <div id='test-program-output'></div>
                <table id='est' class='tableData'>
                    <tbody>
                    <tr id="firstrow">
                        <td>Year</td>
                        <td>Work</td>
                        <td>Subject</td>
                        <td>Resource Type</td>
                        <td>Hours</td>
                        <td>Rate/hour</td>
                        <td>Name</td>
                    </tr>
                    <tr class="rowcls" id="row1">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div id='total-hours-output'></div> <BR>
        <div id='total-amount-output'></div> <BR>
        <!-- Buttons -->
        <input type='button' id='refresh-btn' value='Start over'>
        <input type='button' id='save' value='Save'>
        <div id='results'></div>

    </div>

</div>
<!-- end of wrapper -->
<script src="/js/estimator.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="/js/jquery.form.js"></script>
