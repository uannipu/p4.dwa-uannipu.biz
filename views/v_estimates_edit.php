
<div id='wrapper'>

    <h1><h1>Estimations for work package : <?=$currentPckg['work_pckg_desc'] ?> and Test Program :<?=$currentPckg['test_program_desc'] ?></h1></h1>

    <!-- Left side with all the controls -->
    <div id='controls'>
        <form name='myForm' >
            <h2><div id='results'></div></h2>
            <h2>Testing program: <?=$estimates[0]['test_program_desc'] ?></h2>
            <h3 id='h2sp'>Year: WorkType: Subject: Hours: ResourceType: Name:</h3>
                <div id='hours-error'></div>
                <div id='years-error'></div>
                <div id='work-error'></div>
                <div id='subj-error'></div>
                <div id='res-error'></div>
                <div id='resname-error'></div>
            <?php $i = 1; foreach($estimates  as $est): ?>
                <div class='hrs' id='input<?=$i ?>'>
                    <select id='year<?=$i ?>' name='year<?=$i ?>'  value=<?=$est['year']?> onchange="recalc()" >
                        <option value=''>Select</option>
                        <option value='2014' <?=($est['year'] == 2014)? ' selected="selected"':''?>>2014</option>
                        <option value='2015'<?=($est['year'] == 2015)? ' selected="selected"':''?>>2015</option>
                        <option value='2016' <?=($est['year'] == 2016)? ' selected="selected"':''?>>2016</option>
                    </select>
                        <select id='typ<?=$i ?>' name='typ<?=$i ?>' onchange="recalc()">
                            <option value=''>Select</option>
                            <?php foreach($work  as $opt): ?>
                                <option <?php if($opt['work_type_code'] == $est['work_type_code']) { ?> selected="<?php echo $opt['work_type_code']; ?>" <?php } ?> value="<?php echo $opt['work_type_code']; ?>"><?php echo $opt['work_type_desc']; ?></option>
                            <?php endforeach ?>
                        </select>
                    <select id='subj<?=$i ?>' name='subj<?=$i ?>' onchange="recalc()">
                            <option value=''>Select</option>
                            <?php foreach($subjs  as $subj): ?>
                                <option <?php if($subj['test_subject_code'] == $est['test_subject_code']) { ?> selected="<?php echo $subj['test_subject_code']; ?>" <?php } ?> value="<?php echo $subj['test_subject_code']; ?>"><?php echo $subj['test_subject_desc']; ?></option>
                            <?php endforeach ?>
                    </select>

                    <input type="text" name="hr<?=$i ?>" id="hr<?=$i ?>" onkeyup="recalc()" value=<?=$est['hours']?> />
                    <select class='drpBox' id='res<?=$i ?>' name='res<?=$i ?>' onchange="recalc()">
                        <option value=''>Select</option>
                        <?php foreach($restype  as $res): ?>
                            <option <?php if($res['resource_type_code'] == $est['resource_type_code']) { ?> selected="<?php echo $res['resource_type_code']; ?>" <?php } ?> value="<?php echo $res['resource_type_code']; ?>"><?php echo $res['resource_type_desc']; ?></option>
                        <?php endforeach ?>
                    </select>
                    <input type="text" name="name<?=$i ?>" id="name<?=$i ?>" onkeyup="recalc()" value=<?=$est['resource_name'] ?> >

                </div>
            <?php $i++; endforeach ?>
            <br/>
            <input type='button' id='more' value='More'>
            <input type='button' id='btnDel' value='Remove' />
            <input type='hidden' id='testProgramCode' value='<?=$currentPckg['test_program_code'] ?>'
            <br/><br/>
        </form>
    </div>
    <!-- Right side with the live preview -->
    <div id='preview'>
            <div id='canvas'>
                <div id='test-program-output'><h2>Testing program: <?=$estimates[0]['test_program_desc'] ?></h2></div>
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
                         <?php $i=1; foreach($estimates  as $est): ?>
                            <tr class="rowcls" id="row<?=$i?>">
                                <td><?=$est['year']?></td>
                                <td><?=$est['work_type_desc']?></td>
                                <td><?=$est['test_subject_desc']?></td>
                                <td><?=$est['resource_type_desc']?></td>
                                <td><?=$est['hours']?></td>
                                <td><?=$est['hourly_rate']?></td>
                                <td><?=$est['resource_name']?></td>

                            </tr>
                        <?php $i++ ; endforeach ?>
                    </tbody>
                </table>
        </div>
        <BR>
        <div id='total-hours-output'>Total hours : <?=$totalHrs?></div> <BR>
        <div id='total-amount-output'>Total amount : <?=$totalAmt?></div> <BR>

        <!-- Buttons -->
        <input type='button' id='refresh-btn' value='Start over'>
        <input type='button' id='save' value='Save' onclick='updateEst(<?=$pckgid ?>)'>


        <div id='results'></div>

    </div>

</div>
<!-- end of wrapper -->

<script src="/js/estimator.js"></script>
<script src="/js/validate.js" /></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="/js/jquery.form.js"></script>


