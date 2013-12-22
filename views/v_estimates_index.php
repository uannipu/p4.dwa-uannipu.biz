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

                    <h3>View Work Packages</h3>
                    <p>List of packges assigned to application : </p>
                    <table class="topics" id="example">
                        <thead>
                        <tr>
                            <th>Packaged ID</th>
                            <th>Package Desc</th>
                            <th>Program Name</th>
                            <th>Requestor name</th>
                            <th>Total Hours</th>
                            <th>Total Amount</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $classvar="" ; $i=0;?>
                        <?php foreach($packagesNew  as $pkg): ?>

                            <?php if ($i % 2 == 1) $classvar = "oddRow"; else $classvar="evenRow"; ?>
                            <tr class="<?php echo $classvar ?>">
                               <?php // $pkg = $row[0] ?>
                                <td><a href="/estimates/edit/<?=$pkg['work_pckg_id']; ?>"><?=$pkg['work_pckg_id']?></a></td>
                                <td><a href="/estimates/edit/<?=$pkg['work_pckg_id']; ?>"><?=$pkg['work_pckg_desc'] ?></a></td>
                                <td> <?=$pkg['test_program_desc'] ?></td>
                                <td> <?=$pkg['requestor_name']?></td>
                                <td> <?=$pkg['totalHours']?></td>
                                <td> <?=$pkg['totalAmount']?></td>

                         </tr>
                           <?php $i++; ?>
                        <?php endforeach ?>
                        </tbody>
                    </table>

        </div>
    </div>
</form>

<script type="text/javascript">
    $(document).ready(function(){
        $('#example').dataTable();
    });
</script>




