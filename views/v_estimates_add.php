
<div id='wrapper'>

    <h1>Estimations for work package : <?=$currentPckg['work_pckg_desc'] ?> and Test Program :<?=$currentPckg['test_program_desc'] ?></h1>

    <!-- Left side with all the controls -->
    <div id='controls'>
        <form name='myForm' >
            <h2><div id='results'></div></h2>
            <h2>Testing program: <?=$currentPckg['test_program_desc'] ?></h2>
            <h3 id='h2sp'>Year: WorkType: Subject: Hours: ResourceType: Name:</h3>
            <?php $i=1; ?>
            <div id='hours-error'></div>
            <div id='years-error'></div>
            <div id='work-error'></div>
            <div id='subj-error'></div>
            <div id='res-error'></div>
            <div id='resname-error'></div>

            <div class='hrs' id='input<?=$i ?>'>

                    <select id='year<?=$i ?>' name='year<?=$i ?>'  value=<?=$est['year']?> onchange="recalc()" >
                    <option value=''>Select</option>
                    <option value='2014'>2014</option>
                    <option value='2015'>2015</option>
                    <option value='2016'>2016</option>
                    </select>
                    <select id='typ<?=$i ?>' name='typ<?=$i ?>' onchange="recalc()">
                        <option value=''>Select</option>
                        <?php foreach($work  as $opt): ?>
                            <option value="<?php echo $opt['work_type_code']; ?>"><?php echo $opt['work_type_desc']; ?></option>
                        <?php endforeach ?>
                    </select>
                    <select id='subj<?=$i ?>' name='subj<?=$i ?>' onchange="recalc()">
                        <option value=''>Select</option>
                        <?php foreach($subjs  as $subj): ?>
                            <option value="<?php echo $subj['test_subject_code']; ?>"><?php echo $subj['test_subject_desc']; ?></option>
                        <?php endforeach ?>
                    </select>

                    <input type="text" name="hr<?=$i ?>" id="hr<?=$i ?>" onkeyup="recalc()"  />
                    <select class='drpBox' id='res<?=$i ?>' name='res<?=$i ?>' onchange="recalc()">
                        <option value=''>Select</option>
                        <?php foreach($restype  as $res): ?>
                            <option value="<?php echo $res['resource_type_code']; ?>"><?php echo $res['resource_type_desc']; ?></option>
                        <?php endforeach ?>
                    </select>
                    <input type="text" name="name<?=$i ?>" id="name<?=$i ?>" onkeyup="recalc()"  >

                </div>

            <br/>
            <input type='button' id='more' value='More'>
            <input type='button' id='btnDel' value='Remove' />

            <br/><br/>
        </form>
    </div>
    <!-- Right side with the live preview -->
    <div id='preview'>
            <div id='canvas'>
                <div id='test-program-output'><h2>Testing program:<?=$currentPckg['test_program_desc'] ?> </h2></div>
                <table id='est' class='tableData'>
                    <thead>
                    <tr id="firstrow">
                        <td>Year</td>
                        <td>Work</td>
                        <td>Subject</td>
                        <td>Resource Type</td>
                        <td>Hours</td>
                        <td>Rate/hour</td>
                        <td>Name</td>

                    </tr>
                    </thead>
                    <tbody id="ebody">
                    <?php $i=1; ?>
                        <tr class="rowcls" id="row<?=$i?>">
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
        <div id='total-hours-output'>Total hours :</div> <BR>
        <div id='total-amount-output'>Total amount : </div> <BR>

        <!-- Buttons -->
        <input type='button' id='refresh-btn' value='Start over'>
        <input type='button' id='save' value='Save' onclick='updateEst(<?=$pckgid ?>)'>
        <div id='results'></div>
        <input type='hidden' id='testProgramCode' value='<?=$currentPckg['test_program_code'] ?>'
    </div>

</div>
<!-- end of wrapper -->
<script src="/js/estimator.js"></script>
<script src="/js/validate.js" /></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="/js/jquery.form.js"></script>


