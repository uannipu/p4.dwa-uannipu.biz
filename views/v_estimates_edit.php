
<div id='wrapper'>

    <h1>Estimation Calculator</h1>

    <!-- Left side with all the controls -->
    <div id='controls'>
        <form name='myForm' >

            <h2>Testing program</h2>

            <input type ="text" id='pgm' maxlength='14' value=<?=$estimates[0]['test_subject_code']?>>
            <div class='program' id ='pg'></div>
            <div id='pgm-error'>Max 14 chars</div>

            <div class='clearfix'></div>

            <h2>Year</h2>
            <div class='year' id='yr'>
                <select id='year' value=<?=$estimates[0]['year']?>>
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
                <?php foreach($work  as $opt): ?>
                    <option <?php if($opt['work_type_code'] == $estimates[0]['work_type_code']) { ?> selected="<?php echo $opt['work_type_code']; ?>" <?php } ?> value="<?php echo $opt['work_type_code']; ?>"><?php echo $opt['work_type_desc']; ?></option>
                <?php endforeach ?>
                </select>
            </div>
            <div class='clearfix'></div>

            <h2>Testing subject</h2>
            <input type ="text" id='subj' maxlength='14'/>
            <div id='subj-error'>Max 14 chars</div>
            <span class='error' id='sub-error'></span>

            <h2 id='h2sp'>Hours: Type: Name:</h2>
            <?php $i = 1; foreach($estimates  as $est): ?>
            <div class='hrs' id='input<?=$i ?>'>
                <input type="text" name="hr<?=$i ?>" id="hr<?=$i ?>" onkeyup="recalc()" value=<?=$est['hours']?> />
                <select class='drpBox' id='res<?=$i ?>' name='res<?=$i ?>' onchange="recalc()">
                    <option value=''>Select</option>
                    <option value='D'>Developer</option>
                    <option value='B'>BSA</option>
                    <option value='T'>Tester</option>
                    <option value='A'>Sr.Architect</option>
                </select>
                <input type="text" name="name<?=$i ?>" id="name<?=$i ?>" onkeyup="recalc()" value=<?=$est['resource_name'] ?> />
            </div>
            <div class='clearfix'></div>
            <?php $i++; endforeach ?>
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
                    <?php foreach($estimates  as $est): ?>
                    <tr class="rowcls" id="row1">
                        <td><?=$est['year']?></td>
                        <td><?=$est['work_type_code']?></td>
                        <td><?=$est['hours']?></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <?php endforeach ?>
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
