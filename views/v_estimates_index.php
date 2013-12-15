<?php if(isset($_GET['incomplete'])): ?>
    Incomplete registration
<?php endif; ?>

<form method="POST" action="/users/p_signup">
    <div id="contentWithNav" class="homepage">
        <div class="description">
            <h1>Welcome <?php if($user) echo ', '.$user->first_name . ' '.$user->last_name; ?> </h1>
            <p> </p>
        </div>
        <div>
        <p>  <?php if(isset($error)):?>User with this email id already exists <?php endif; ?> </p>
            <table id="scheduleInfo">
            <tr>
                <td id="currentSchedule"  class="tableData">
                    <h3>View Work Packages</h3>
                    <p>List of packges assigned to application : </p>
                    <table class="topics">
                        <tr>
                            <th>Packaged ID</th>
                            <th>Package Desc</th>
                            <th>Program Name</th>
                            <th>Requestor name</th>
                            <th>Total Hours</th>
                            <th>Total Amount</th>

                            <th></th>
                        </tr>
                        <?php $classvar="" ; $i=0;?>
                        <?php foreach($packagesNew  as $pkg): ?>

                            <?php if ($i % 2 == 1) $classvar = "oddRow"; else $classvar="evenRow"; ?>
                            <tr class="<?php echo $classvar ?>">
                               <?php // $pkg = $row[0] ?>
                                <td><?=$pkg['work_pckg_id']?> </td>
                                <td> <?=$pkg['work_pckg_desc'] ?></td>
                                <td> <?=$pkg['test_program_code'] ?></td>
                                <td> <?=$pkg['requestor_name']?></td>
                                <td> <?=$pkg['totalHours']?></td>
                                <td> <?=$pkg['totalAmount']?></td>

                                <td></td>
                                <td></td>
                         </tr>
                           <?php $i++; ?>
                        <?php endforeach ?>
                    </table>
                </td>
            </tr>
            </table>
        </div>
    </div>
</form>



