                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         <?php

class userInfo {

    public $name, $phone, $email, $id, $address, $profession, $adhar, $loc, $salary, $regDate, $age, $per, $skill, $cert;

    public function insert($id, $name, $phone, $email, $address) {

        $this->name = $name;
        $this->phone = $phone;
        $this->id = $id;
        $this->email = $email;
        $this->address = $address;
    }

}

class orgInfo {

    public $name, $phone, $email, $id, $project, $loc, $regDate, $days, $fore, $elec, $plumb, $ac, $pipe, $carp, $paint, $insu, $duct, $tail, $acc, $helper, $crew, $cook;

    public function insert($id, $name, $phone, $email) {

        $this->name = $name;
        $this->phone = $phone;
        $this->id = $id;
        $this->email = $email;
    }

}

function close(&$mysqli, &$stmt) {
    $stmt->close();
    $mysqli->close();
}

$defaultMail = "";

function insertCandi($path) {
    $mysqli = getConnection();
    $query = "insert into candidate(C_id,C_name,age,profession ,isSkiled,A_id,ph_no, email , isPerm, loc, salary, doc,regDate,Address) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

    $stmt = $mysqli->prepare($query);

    $stmt->bind_param("ssssssssssssss", $id, $name, $age, $pro, $skill, $aid, $phone, $mail, $perm, $loc, $salary, $doc, $date, $add);   // ready parameter by define with its type
    $id = uniqid("CALH_", false);
    $name = $_POST['Name'];
    $age = $_POST['Age'];
    $pro = $_POST['Prof'];
    $skill = $_POST['Skilled'];
    $aid = $_POST['Uid'];
    $phone = $_POST['Phone'];
    $mail = $_POST['Email'];
    $perm = $_POST['Permanent'];
    $loc = $_POST['Place'];
    $salary = $_POST['Sal'];
    $doc = $path;
    $date = date('y-m-d');
    $add = $_POST['Add1'] . " " . $_POST['Add2'] . " " . $_POST['Add3'] ." " . $_POST['Pin'];

    $stmt->execute();
    if ($mysqli->affected_rows > 0) {
       // $GLOBALS['defaultMail'] = $mail;
        close($mysqli, $stmt);

        return true;
    } else {
        //$GLOBALS['defaultMail'] = "";
        close($mysqli, $stmt);
        return false;
    }
}

function insertOrg() {
    $mysqli = getConnection();
    $query = "insert into organisation(O_id,O_Name,P_Name,O_loc,email,reg_Date,days,O_Phone,electric,plumb,ac,pipe,carp,paint,insu,duct,tail,account,helper,crew,cook,fore) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

    $stmt = $mysqli->prepare($query);

    $stmt->bind_param("ssssssssssssssssssssss", $id, $name, $p_name, $loc, $mail, $date, $Days, $phone, $one, $two, $three, $four, $five, $six, $seven, $eight, $nine, $ten, $eleven, $twelve, $thirteen, $fourteen);   // ready parameter by define with its type
    $id = uniqid("KORS_", false);
    $name = $_POST['Org_name'];
    $p_name = $_POST['P_name'];
    $loc = $_POST['O_Loc'];
    $mail = $_POST['O_Email'];
    $Days = $_POST['Day'];
    $phone = $_POST['O_Phone'];
    $date = date('y-m-d');
    $one = 0;
    $two = 0;
    $three = 0;
    $four = 0;
    $five = 0;
    $six = 0;
    $seven = 0;
    $eight = 0;
    $nine = 0;
    $ten = 0;
    $eleven = 0;
    $twelve = 0;
    $thirteen = 0;
    $fourteen = 0;
    for ($i = 1; $i <= 14; $i++) {
        if (isset($_POST["Prof$i"])) {
            $x = $_POST["Prof$i"];
            switch ($x) {
                case "Electrician":
                    $one = $_POST["q$i"];
                    break;
                case "Plumber":break;
                    $two = $_POST["q$i"];
                case "A.C Technician":
                    $three = $_POST["q$i"];
                    break;
                case "Pipe Fitter":
                    $four = $_POST["q$i"];
                    break;
                case "Carpenter":
                    $five = $_POST["q$i"];
                    break;
                case "Wall Painter":
                    $six = $_POST["q$i"];
                    break;
                case "Insulator":
                    $seven = $_POST["q$i"];
                    break;
                case "Ductman":
                    $eight = $_POST["q$i"];
                    break;
                case "Tailor":
                    $nine = $_POST["q$i"];
                    break;
                case "Accountant Basic":
                    $ten = $_POST["q$i"];
                    break;
                case "Helper":
                    $eleven = $_POST["q$i"];
                    break;
                case "Crew Member":
                    $twelve = $_POST["q$i"];
                    break;
                case "Cook":
                    $thirteen = $_POST["q$i"];
                    break;
                case "Foreman":
                    $fourteen = $_POST["q$i"];
                    break;
            }
        }
    }

    $stmt->execute();
    if ($mysqli->affected_rows > 0) {
        //$GLOBALS['defaultMail'] = $mail;
        close($mysqli, $stmt);

        return true;
    } else {
        //$GLOBALS['defaultMail'] = "";
        close($mysqli, $stmt);
        return false;
    }
}

function getCandidate() {
//    if ($GLOBALS['defaultMail'] == "") {
//        return;
//    }
    $mysqli = getConnection();

    $query = "select C_id,C_name,ph_no,email,Address from candidate where email = ?";

    $stmt = $mysqli->prepare($query);

    $stmt->bind_param("s", $_GET['defaultMail']);

    $stmt->bind_result($id, $name, $phone, $email, $Address);

    $stmt->execute() or die(mysqli_error($mysqli));

    $info = new userInfo;

    $stmt->fetch();

    $info->insert($id, $name, $phone, $email, $Address);

    close($mysqli, $stmt);

    return $info;
}

function getOrg() {
//    if ($GLOBALS['defaultMail'] == "") {
//        return;
//    }
    $mysqli = getConnection();

    $query = "select O_id,O_Name,O_Phone,email from organisation where email = ?";

    $stmt = $mysqli->prepare($query);

    $stmt->bind_param("s", $_GET['defaultMail']);

    $stmt->bind_result($id, $name, $phone, $email);

    $stmt->execute() or die(mysqli_error($mysqli));

    $info = new orgInfo;

    $stmt->fetch();

    $info->insert($id, $name, $phone, $email);

    close($mysqli, $stmt);

    return $info;
}
function searchIsCandidate(){
    $x = $_GET['q'];
    if (strpos($x, 'CALH') !== false) {
        return true;
    }
    if (strpos($x, 'KORS') !== false) {
        return false;
    }
    
}
function searchOrg(){
    $mysqli = getConnection();

        $query = "select O_Name,P_Name,O_loc,email,reg_Date,days,O_Phone,electric,plumb,ac,pipe,carp,paint,insu,duct,tail,account,helper,crew,cook,fore from organisation where O_id = ?";

        $stmt = $mysqli->prepare($query);

        $stmt->bind_param("s",$_GET['q']);

        $stmt->bind_result($name, $pname, $loc, $emal, $date, $day, $phone, $elec, $plumb, $ac, $pipe, $carp, $paint, $insu, $Duct, $tail, $acc, $help, $crew, $cook, $fore);

        $stmt->execute() or die(mysqli_error($mysqli));

        $info = new orgInfo();

        $stmt->fetch();

        $info->name = $name;
        $info->project = $pname;
        $info->loc = $loc;
        $info->email = $emal;
        $info->regDate = $date;
        $info->days = $day;
        $info->phone = $phone;
        $info->elec = $elec;
        $info->plumb = $plumb;
        $info->ac = $ac;
        $info->pipe = $pipe;
        $info->carp = $carp;
        $info->paint = $paint;
        $info->insu = $insu;
        $info->duct = $Duct;
        $info->tail = $tail;
        $info->acc = $acc;
        $info->helper = $help;
        $info->crew = $crew;
        $info->cook = $cook;
        $info->fore = $fore;

        close($mysqli, $stmt);

        return $info;

}
function searchCand(){
    $mysqli = getConnection();

        $query = "select C_name,age,profession ,isSkiled,A_id,ph_no, email , isPerm, loc, salary,regDate,Address from candidate where C_id = ?";

        $stmt = $mysqli->prepare($query);
        $x = $_GET['q'];

        $stmt->bind_param("s", $x);

        $stmt->bind_result($name, $age, $prof, $skill, $aid, $pno, $mail, $perm, $loc, $sal, $date, $add);

        $stmt->execute() or die(mysqli_error($mysqli));

        $info = new userInfo;

        $stmt->fetch();

        $info->name = $name;
        $info->age = $age;
        $info->profession = $prof;
        $info->skill = $skill;
        $info->adhar = $aid;
        $info->phone = $pno;
        $info->email = $mail;
        $info->per = $perm;
        $info->loc = $loc;
        $info->sal = $sal;
        $info->regDate = $date;
        $info->address = $add;

        close($mysqli, $stmt);

        return $info;
}
function searchId() {
    $x = $_POST['id'];
    if (strpos($x, 'CALH') !== false) {
        $mysqli = getConnection();

        $query = "select C_name,age,profession ,isSkiled,A_id,ph_no, email , isPerm, loc, salary,regDate,Address from candidate where C_id = ?";

        $stmt = $mysqli->prepare($query);

        $stmt->bind_param("s", $x);

        $stmt->bind_result($name, $age, $prof, $skill, $aid, $pno, $mail, $perm, $loc, $sal, $date, $add);

        $stmt->execute() or die(mysqli_error($mysqli));

        $info = new userInfo;

        $stmt->fetch();

        $info->name = $name;
        $info->age = $age;
        $info->profession = $prof;
        $info->skill = $skill;
        $info->adhar = $aid;
        $info->phone = $pno;
        $info->email = $mail;
        $info->per = $perm;
        $info->loc = $loc;
        $info->sal = $sal;
        $info->regDate = $date;
        $info->address = $add;

        close($mysqli, $stmt);

        return $info;
    } else if (strpos($x, 'KORS') !== false) {
        $mysqli = getConnection();

        $query = "select O_Name,P_Name,O_loc,email,reg_Date,days,O_Phone,electric,plumb,ac,pipe,carp,paint,insu,duct,tail,account,helper,crew,cook,fore from ogranisation where O_id = ?";

        $stmt = $mysqli->prepare($query);

        $stmt->bind_param("s", $x);

        $stmt->bind_result($name, $pname, $loc, $emal, $date, $day, $phone, $elec, $plumb, $ac, $pipe, $carp, $paint, $insu, $Duct, $tail, $acc, $help, $crew, $cook, $fore);

        $stmt->execute() or die(mysqli_error($mysqli));

        $info = new orgInfo();

        $stmt->fetch();

        $info->name = $name;
        $info->project = $pname;
        $info->loc = $loc;
        $info->email = $emal;
        $info->regDate = $date;
        $info->days = $day;
        $info->phone = $phone;
        $info->elec = $elec;
        $info->plumb = $plumb;
        $info->ac = $ac;
        $info->pipe = $pipe;
        $info->carp = $carp;
        $info->paint = $paint;
        $info->insu = $insu;
        $info->duct = $Duct;
        $info->tail = $tail;
        $info->acc = $acc;
        $info->helper = $help;
        $info->crew = $crew;
        $info->cook = $cook;
        $info->fore = $fore;

        close($mysqli, $stmt);

        return $info;
    }
}

?>