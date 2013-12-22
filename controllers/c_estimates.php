<?php
/**
 * Created by JetBrains PhpStorm.
 * User: UAnnipu
 * Date: 10/29/13
 * Time: 11:39 PM
 * To change this template use File | Settings | File Templates.
 */
class estimates_controller extends base_controller {

    public function __construct() {
        parent::__construct();
        if(!$this->user) {
           Router::redirect('/users/login');
          // die("Members only. <a href='/users/login'>Login</a>");
        }
    }
    /*function to view the add post screen */
    public function add() {
        if(!$this->user) {
            Router::redirect('/users/login');
        } else {
         # Setup view
            $this->template->content = View::instance('v_estimates_add');
            $this->template->title   = "New Estimates";
          # Render template
         echo $this->template;
        }
    }

    /*function to view the add post screen */
    public function edit($pckgid = NULL) {
        if(!$this->user) {
            Router::redirect('/users/login');
        } else {

            $user = $this->user->user_id;

            # Setup view
            $q = "SELECT we.work_pckg_id, e.estimation_id, e.test_subject_code, e.work_type_code,rs.hourly_rate, rs.resource_type_desc,
                        e.year, e.hours, e.resource_type_code, e.resource_name , w.work_type_desc,wp.test_program_code, tp.test_program_desc, ts.test_subject_desc
                    FROM work_pckg_estimates we INNER JOIN estimates e
                        ON e.estimation_id = we .estimates_id
                     INNER JOIN work_package wp
                        ON wp.work_pckg_id = we.work_pckg_id
                     INNER JOIN resource_type rs
                        ON rs.resource_type_code = e.resource_type_code
                     INNER JOIN work_type w
                        ON w.work_type_code = e.work_type_code
                     INNER JOIN test_program tp
                        ON tp.test_program_code = wp.test_program_code
                     INNER JOIN test_subject ts
                        ON ts.test_subject_code = e.test_subject_code
                     WHERE wp.work_pckg_id = ".$pckgid. " and wp.user_id = ".$user." order by e.estimation_id asc";

            $estimates = DB::instance(DB_NAME)->select_rows($q);

            $q1= "select work_type_code, work_type_desc from work_type order by work_type_code asc";
            $work = DB::instance(DB_NAME)->select_rows($q1);

            $q2= "select resource_type_code, resource_type_desc from resource_type order by resource_type_code asc";
            $restype = DB::instance(DB_NAME)->select_rows($q2);

            $q3= "select test_subject_code, test_subject_desc from test_subject order by test_subject_code asc";
            $subjs = DB::instance(DB_NAME)->select_rows($q3);

            $q4 = "SELECT
                    p.work_pckg_id,
                    p.test_program_code,
                    tp.test_program_desc,
                    p.work_pckg_desc,
                    p.requestor_name,
                    p.user_id AS user_id,
                    users.first_name,
                    users.last_name
                FROM work_package p
                INNER JOIN users
                    ON p.user_id = users.user_id
                INNER JOIN test_program tp
                    ON tp.test_program_code = p.test_program_code
                WHERE users.user_id =".$user ."
                    AND p.work_pckg_id= ".$pckgid ;

                $workPckg = DB::instance(DB_NAME)->select_row($q4);


            if(!empty($estimates)){
                $this->template->content = View::instance('v_estimates_edit');
                $this->template->title   = "Add or Update Estimates";
                $this->template->content->estimates = $estimates;
                $amtHrs = $this ->calculateHours($estimates);
                $hrs = explode("|",$amtHrs);
                $totalHrs = $hrs[0];
                $totalAmt = $hrs[1];
               // print_r($hrs);
                //echo $totalHrs.'|'.$totalAmt;
                $this->template->content->work = $work;
                $this->template->content->restype = $restype;
                $this->template->content->subjs = $subjs;
                $this->template->content->totalHrs = $totalHrs;
                $this->template->content->totalAmt = $totalAmt;
                $this->template->content->pckgid = $pckgid;
                $this->template->content->currentPckg = $workPckg;
                # Render template

            } else {
                $this->template->content = View::instance('v_estimates_add');
                $this->template->title   = "Add Estimates";
                $this->template->content->estimates = $estimates;
                // print_r($hrs);
                //echo $totalHrs.'|'.$totalAmt;
                $this->template->content->work = $work;
                $this->template->content->restype = $restype;
                $this->template->content->subjs = $subjs;
                $this->template->content->pckgid = $pckgid;
                $this->template->content->currentPckg = $workPckg;

            }
            echo $this->template;
        }
    }

    /*function to process the form, and store in the database */
    public function p_add() {
        if(!$this->user) {
            Router::redirect('/users/login');
        } else {
               $user = $this->user->user_id;
               $dataArr = $_POST['arr'];
               $pckgId =$_POST['workPckgId'];
               $testPgmCode = $_POST['testPgmCode'];
            $q ="select estimates_id from work_pckg_estimates where work_pckg_id = ".$pckgId;
            //$estIdArr=DB::instance(DB_NAME)->select_array($q,"estimates_id");
            $estIdArr=DB::instance(DB_NAME)->select_rows($q);
            $where_condition='WHERE work_pckg_id = '.$pckgId;
            $appendStr = '';
       //     var_dump($estIdArr);
            $i=0;
            foreach($estIdArr as $id){
                if($i == count($estIdArr)-1) $appendStr = $appendStr.$id['estimates_id'];
                else $appendStr = $appendStr.$id['estimates_id'].',' ;
                $i++;

            }

                if(count($estIdArr)> 0){
                   $where_condition2 = "WHERE estimation_id in (".$appendStr.")";
                   // echo $where_condition ."\n" . "| ".$where_condition2;
                   // echo $where_condition2;
                    DB::instance(DB_NAME)-> delete("work_pckg_estimates", $where_condition);
                    DB::instance(DB_NAME)-> delete("estimates", $where_condition2);
                }

               // rowArr[i] = [$(year[i]).val(),$(work[i]).val(),$(subj[i]).val(),$(myChildren[i]).val(),opt,$(resNames[i]).val()];
                    $j=0;
                    foreach ($dataArr as $v1) {
                            $data = Array(
                                "test_subject_code" => $v1[2],
                                "year" => $v1[0],
                                "work_type_code" => $v1[1],
                                "hours" => $v1[3],
                                "user_id" => $user,
                                "resource_type_code" =>$v1[4],
                                "resource_name" =>$v1[5]
                            );

                           $est= DB::instance(DB_NAME)->insert("estimates", $data);


                          //  var_dump($est);
                            $data2 = Array(
                                "work_pckg_id" => $pckgId,
                                "estimates_id" => $est
                            );
                        $response[$j] =  DB::instance(DB_NAME)->insert("work_pckg_estimates", $data2);
                        $j++;
                    }
                }
                echo "Estimates have been updated successfully";

    }

    /* Function for home page once the user logs in.
       This function gets the posts of the users that the logged in user follows.
    */
    public function index() {

            if(!$this->user) {
                Router::redirect("/users/login");
            } else {
                # Set up the View
                $this->template->content = View::instance("v_estimates_index");
                $this->template->title   = "All Estimates";
                $user_id = $this->user->user_id;
            # Query
                $q = "SELECT
                    p.work_pckg_id,
                    p.test_program_code,
                    tp.test_program_desc,
                    p.work_pckg_desc,
                    p.requestor_name,
                    p.user_id AS user_id,
                    users.first_name,
                    users.last_name
                FROM work_package p
                INNER JOIN users
                    ON p.user_id = users.user_id
                INNER JOIN test_program tp
                    ON tp.test_program_code = p.test_program_code
                WHERE users.user_id =".$user_id ." order by p.work_pckg_id DESC";
                $packages = DB::instance(DB_NAME)->select_rows($q);
                $packagesNew = $this-> updateAmount($packages,$user_id);
                # Pass data to the View
                $this->template->content->packagesNew = $packagesNew ;
                # Render the View
                echo $this->template;
            }
    }

    private function updateAmount($packages,$user_id ){
        foreach($packages as $pkg){
            $pCode = $pkg["work_pckg_id"];

            # Query
            $q = "SELECT
                        p.work_pckg_id,
                        we.estimates_id,
                        p.work_pckg_desc,
                        p.requestor_name,
                        p.user_id AS user_id,
                        e.hours,
                        e.resource_type_code,
                        res.hourly_rate
                    FROM work_package p
                    INNER JOIN work_pckg_estimates we
                        ON  we.work_pckg_id = p.work_pckg_id
                    INNER JOIN estimates e
                        ON we.estimates_id = e.estimation_id
                    INNER JOIN resource_type res
                        ON res.resource_type_code = e.resource_type_code
                    WHERE p.user_id = ".$user_id.
                    " AND p.work_pckg_id = ".$pCode." order by we.estimates_id DESC";

            $estimates = DB::instance(DB_NAME)->select_rows($q);
            $totHrs = 0; $totAmt = 0;
                foreach($estimates as $est){
                    $totHrs = $totHrs +$est["hours"];
                    $totAmt = $totAmt + ($totHrs * $est["hourly_rate"]);
                }
            $pkg["totalHours"] = $totHrs;
            $pkg["totalAmount"] = $totAmt;
            $packagesNew[$pCode]=$pkg;
        }
        return $packagesNew;
    }


    private function calculateHours($estimates){
        $totHrs = 0; $totAmt = 0;
        foreach($estimates as $est){
            $totHrs = $totHrs +$est["hours"];
            $totAmt = $totAmt + ($totHrs * $est["hourly_rate"]);
        }
        return $totHrs."|".$totAmt;
    }
}
