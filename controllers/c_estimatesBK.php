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

    /*function to process the form, and store in the database */
    public function p_add() {
        if(!$this->user) {
            Router::redirect('/users/login');
        } else {
                $user = $this->user->user_id;
               $dataArr = array();
               $dataArr = $_POST['arr'];
               $currdate = Time::now();
               echo $currdate;
            foreach ($dataArr as $v1) {
                echo $v1[6];
                    $data = Array(
                        "test_program_code" => $v1[0],
                        "test_subject_code" => $v1[1],
                        "year" => $v1[2],
                        "work_type_code" => $v1[3],
                        "hours" => $v1[4],
                        "user_id" => $this->user->user_id,
                        "resource_type_code" =>$v1[5],
                        "resource_name" =>$v1[6]
                    );
                    DB::instance(DB_NAME)->insert('estimates', $data);

            }
                echo "success";
      /*      for($i = 0; $i < count($dataArr); $i++) {
                $mysqldata = $dataArr[i];
                for($j=0; $j<10; $j++){
                    echo $dataArr[i][j];
                }
            }
*/
          //      var_dump($dataArr);
/*
                for($i = 0; $i < count($dataArr); $i++) {
                    $mysqldata = $dataArr[i];
                        $data = Array(
                            "creation_date" => Time::now(),
                            "modified_date" => Time::now(),
                            "test_program_code" => $mysqldata[0],
                            "test_subject_code" => $mysqldata[1],
                            "work_type_code" => $mysqldata[2],
                            "year" => $mysqldata[3],
                            "hours" => $mysqldata[4],
                            "resource_type_code" => $mysqldata[5],
                            "user_id" => $this->user->user_id
                     );

                   DB::instance(DB_NAME)->insert('estimates', $data);
                    echo 'success';
                }
*/
           // $this->template->content->estimates =$_POST['arr'] ;
         //   $data = Array('test_program_code'=> 'dummy', 'test_program_desc' =>'dummier');
          //  DB::instance(DB_NAME)->insert("test_program",$data);
          //  $this->template->content = View::instance('v_debug');
          //  $this->template->content = 'hello';
           // echo $this->template;
           // Router::redirect("/estimates/index/".$user);
            }
    }

    /* Function for home page once the user logs in.
       This function gets the posts of the users that the logged in user follows.
    */
    public function index() {

            if(!$this->user) {
                Router::redirect('/users/login');
            } else {
                # Set up the View
                $this->template->content = View::instance('v_estimates_index');
                $this->template->title   = "All Estimates";
                $user_id = $this->user->user_id;
            # Query
                $q = 'SELECT
                    p.work_pckg_id,
                    p.test_program_code,
                    p.work_pckg_desc,
                    p.requestor_name,
                    p.user_id AS user_id,
                    users.first_name,
                    users.last_name
                FROM work_package p
                INNER JOIN users
                    ON p.user_id = users.user_id
                WHERE users.user_id ='.$user_id .' order by p.work_pckg_id DESC';

                $packages = DB::instance(DB_NAME)->select_rows($q);

                foreach($packages as $pkg){
                   $total = $this-> calculate($pkg['work_pckg_id'],$user_id);

//                   $totalArr['total'.$pkg['work_pckg_id']] = $total;
                    $packageId = $pkg['work_pckg_id'];
                    $pkg['total'] = $total;
  //                  echo $packageId;
                   $totalArr[$packageId] = $pkg;
                }
                    var_dump($totalArr);

                # Pass data to the View
                $this->template->content->packages = $packages ;
      //          $this->template->content->totalArr = $totalArr;

                # Render the View
                echo $this->template;
            }
    }

    private function updateAmount($packages,$user_id ){
        /*foreach($packages as $pkg){
            $total = $this-> calculate($pkg['work_pckg_id'],$user_id);

//                   $totalArr['total'.$pkg['work_pckg_id']] = $total;
            $packageId = $pkg['work_pckg_id'];
            $pkg['total'] = $total;
            //                  echo $packageId;
            $totalArr[$packageId] = $pkg;
        }
*/
        foreach($packages as $pkg){
            $pCode = $pkg['work_pckg_id'];

        # Query
        $q = 'SELECT
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
                WHERE p.user_id ='.$user_id .'
                AND p.work_pckg_id = '.$pCode.' order by we.estimates_id DESC';

        $estimates = DB::instance(DB_NAME)->select_rows($q);
        $totHrs = 0; $totAmt = 0;
        foreach($estimates as $est){
            /*           echo 'id : '. $est['estimates_id'];
                       echo 'hours : '. $est['hours'];
                       echo 'resource type: '. $est['resource_type_code'];
                       echo 'hourly rate: '. $est['hourly_rate']; */
            $totHrs = $totHrs +$est['hours'];
            $totAmt = $totAmt + ($totHrs * $est['hourly_rate']);
        }
            $pkg['totalHours'] = $totHrs;
            $pkg['totalAmount'] = $totAmt;
        }
        return $packages;
    }

    private function calculate($pkgid,$user_id ){
    # Query
        $q = 'SELECT
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
                WHERE p.user_id ='.$user_id .'
                AND p.work_pckg_id = '.$pkgid   .' order by we.estimates_id DESC';

        $estimates = DB::instance(DB_NAME)->select_rows($q);
        $totHrs = 0; $totAmt = 0;
       foreach($estimates as $est){
/*           echo 'id : '. $est['estimates_id'];
           echo 'hours : '. $est['hours'];
           echo 'resource type: '. $est['resource_type_code'];
           echo 'hourly rate: '. $est['hourly_rate']; */
           $totHrs = $totHrs +$est['hours'];
           $totAmt = $totAmt + ($totHrs * $est['hourly_rate']);
       }
        $total["totalHours"]   = $totHrs;
        $total["totalAmount"] = $totAmt;
        $total["pckgid"] = $pkgid;
    //    echo 'total hours : '. $totHrs .'| '.$est['hourly_rate'];
        return $total;
    }
    public function indexBK() {

        if(!$this->user) {
            Router::redirect('/users/login');
        } else {
            # Set up the View
            $this->template->content = View::instance('v_estimates_index');
            $this->template->title   = "All Estimates";
            $user_id = $this->user->user_id;
            # Query
            $q = 'SELECT
                    est.test_program_code,
                    est.test_subject_code,
                    est.hours,
                    est.creation_date,
                    est.user_id AS user_id,
                    users.first_name,
                    users.last_name
                FROM estimates est
                INNER JOIN users
                    ON est.user_id = users.user_id
                WHERE users.user_id ='.$user_id .' order by est.estimation_id DESC';

            $estimates = DB::instance(DB_NAME)->select_rows($q);

            # Pass data to the View
            $this->template->content->estimates =$estimates ;

            # Render the View
            echo $this->template;
        }
    }

}