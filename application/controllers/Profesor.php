<?php
// Danko Miladinovic 0149/13

class Profesor extends CI_Controller
{

    private function filePath($filePath){
        $fileParts = pathinfo($filePath);

        if(!isset($fileParts['filename']))
        {$fileParts['filename'] = substr($fileParts['basename'], 0, strrpos($fileParts['basename'], '.'));}

        return $fileParts;
    }

    private function sendEmail($subject, $body, $Toemail)
    {
        $this->load->library('My_phpmailer.php');
        $name = 'eDemonstrator';
        $email = 'edemonstrator@gmail.com';
        $Mail = new My_PHPMailer();
        $Mail->isSMTP();
        $Mail->From = $email; //e-mail posaljioca
        $Mail->FromName = $name; //ime posiljaoca
        $Mail->SMTPSecure = "ssl";//postavljanje prefiksa serveru
        $Mail->Host = "smtp.gmail.com"; // GMail SMTP
        $Mail->Port = 465;
        $Mail->Username = $email;
        $Mail->Password = 'psiprojekat';
        foreach ($Toemail as $stu) {
            $Mail->AddAddress("" . $stu['SifS'] . "@student.etf.rs");
        }
        $Mail->AddReplyTo($email);
        $Mail->WordWrap = 50;
        $Mail->IsHTML(true);
        $Mail->Subject = $subject;
        $Mail->Body = $body;
        $Mail->SMTPAuth = true;
        if ($Mail->send()) {
            //$poruka="...";
            // var_dump($poruka);
            // exit();
        } else {
            $poruka = $Mail->ErrorInfo;
            //  var_dump($poruka);
            //  exit();
        }
    }

    private function sendE($subject, $body, $to)
    {
        $this->load->library('My_phpmailer.php');
        $name = 'eDemonstrator';
        $email = 'edemonstrator@gmail.com';
        $Mail = new My_PHPMailer();
        $Mail->isSMTP();
        $Mail->From = $email; //e-mail posaljioca
        $Mail->FromName = $name; //ime posiljaoca
        $Mail->SMTPSecure = "ssl";//postavljanje prefiksa serveru
        $Mail->Host = "smtp.gmail.com"; // GMail SMTP
        $Mail->Port = 465;
        $Mail->Username = $email;
        $Mail->Password = 'psiprojekat';
        $Mail->AddAddress("" . $to . "@student.etf.rs");
        $Mail->AddReplyTo($email);
        $Mail->WordWrap = 50;
        $Mail->IsHTML(true);
        $Mail->Subject = $subject;
        $Mail->Body = $body;
        $Mail->SMTPAuth = true;
        if ($Mail->send()) {
            //$poruka="...";
            // var_dump($poruka);
            // exit();
        } else {
            $poruka = $Mail->ErrorInfo;
            var_dump($poruka);
            exit();
        }
    }

    private function validateDate($date, $format = 'Y-m-d H:i:s')
    {
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) == $date;
    }

    public function index()
    {
        $this->load->driver('session');
        $this->load->helper('url');
        if (isset($_SESSION['username'])) {
            $data['imePrezime'] = $this->session->userdata('imePrezime');
            $this->load->view('Profesor/pocetna', $data);
        } else redirect('Wlecome');
    }

    public function pocetna()
    {
        //start_session();
        $this->load->driver('session');
        //$_SESSION['username']="ctubic";
        $this->load->helper('url');
        if (isset($_SESSION['username'])) {
            $data['imePrezime'] = $this->session->userdata('imePrezime');
            $this->load->view('Profesor/pocetna', $data);
        } else redirect('/Welcome/index');
    }

    public function profil()
    {
        $this->load->driver('session');
        $this->load->helper('url');
        if (isset($_SESSION['username'])) {
            $this->load->helper('url');
            $data['imePrezime'] = $this->session->userdata('imePrezime');
            $this->load->database();
            $this->db->where('SifZ', $this->session->userdata('username'));
            $q = $this->db->get('zaposleni')->result_array();
            $data['zaposleni'] = $q;

            $this->db->select('Naziv');
            $this->db->where('SifZ', $this->session->userdata('username'));
            $l = $this->db->get('predmet')->result_array();
            $data['predmeti'] = $l;

            $this->load->view('Profesor/profil', $data);
        } else redirect('/Welcome/index');
    }

    public function izborDemonstratora()
    {
        $this->load->driver('session');
        $this->load->helper('url');
        if (isset($_SESSION['username'])) {
            $this->load->database();
            $a = $this->session->userdata('username');
            $b = 'prijavljen';
            $data['imePrezime'] = $this->session->userdata('imePrezime');
            $data['message'] = "";
            $where = "p.SifP=t.SifP";
            $this->db->select("Naziv");
            $this->db->select('p.SifP');
            $this->db->select('t.SifT');
            $this->db->select('Datum');
            $this->db->select('t.Sala');
            $this->db->from('predmet p');
            $this->db->from('termin t');
            $this->db->where($where);
            $this->db->where('SifZ', $a);
            $this->db->where('Status', $b);
            $q = $this->db->get()->result_array();
            $data['Predm'] = $q;

            $this->load->view('Profesor/izborDemonstratora', $data);
        } else {
            redirect('/Welcome/index');
        }
    }

    public function zakljucivanjeTermina()
    {
        $this->load->driver('session');
        $this->load->helper('url');
        //$this->sendEmail();
        if (isset($_SESSION['username'])) {
            $this->load->database();
            $b = 'odradjen';
            $data['imePrezime'] = $this->session->userdata('imePrezime');
            $data['message'] = "";
            $where = 'p.SifP=t.SifP';
            $this->db->select("p.Naziv, p.SifP, t.SifT, t.Datum");
            $this->db->from('predmet p');
            $this->db->from('termin t');
            $this->db->where('t.Status', $b);
            $this->db->where("$where");
            $q = $this->db->get()->result_array();
            $data['Ter'] = $q;
            $this->load->view('Profesor/zakljucivanjeTermina', $data);
        } else redirect('/Welcome/index');
    }

    public function zakljTabela(){
        $b = 'odradjen';
        $this->load->driver('session');
        $this->load->helper('url');
        if(isset($_SESSION['username'])) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $data['message'] = '';
                if (isset($_POST['ter'])) {
                    $where = "p.SifP=t.SifP";
                    $this->db->select('p.Naziv');
                    $this->db->select('p.SifP');
                    $this->db->select('VremeOd');
                    $this->db->select('VremeDo');
                    $this->db->select('Datum');
                    $this->db->select('Sala');
                    $this->db->from('predmet p');
                    $this->db->from('termin t');
                    $this->db->where($where);
                    $this->db->where('t.SifT', $_POST['ter']);
                    $this->db->where('t.Status', $b);
                    $r = $this->db->get()->row();
                    if (!empty($r)) {
                        $data['Naziv'] = $r->Naziv;
                        $dt = new DateTime($r->Datum);
                        $data['vreme'] = $dt->format('Y-m-d');
                        $data['datumOd'] = $r->VremeOd;
                        $data['datumDo'] = $r->VremeDo;
                        $data['predm'] = $r->SifP;
                        $data['sifT'] = $_POST['ter'];
                        $data['Sala'] = $r->Sala;
                        $date1 = new DateTime($r->VremeOd);
                        $date2 = new DateTime($r->VremeDo);
                        $time1 = $date1->format("H:i:s");
                        $time2 = $date2->format("H:i:s");
                        $data['sati'] = "" . $time1 . " - " . $time2 . "";
                        $where = "p.SifS=s.SifS";
                        $this->db->select("s.Ime, s.Prezime, s.SifS");
                        $this->db->from('Prisustvo p');
                        $this->db->from('Student s');
                        $this->db->where('SifT', $_POST['ter']);
                        $this->db->where($where);
                        $this->db->where('Status', 'izabran');
                        $l = $this->db->get()->result_array();
                        $data['Studenti'] = $l;
                    }
                    $this->load->view('Profesor/zakljucivanjeTabela', $data);
                }
            }
        }
        else redirect('Welcome');
    }

    public function potvrdjivanjePrisutnosti(){
        $date1 = new DateTime($_POST['DatumOd']);
        $date2 = new DateTime($_POST['DatumDo']);
        $diff = $date2->diff($date1);
        $h = $diff->h;
        $b = 'odradjen';
        $message="";
        $data['message']="";
        foreach ($_POST['indeks'] as $ind) {
            $indeks = $this->db->escape($ind);
            $sifraT = $this->db->escape($_POST['SifT']);
            $k = $this->db->query("SELECT s.SifS, UkupnoNeisplaceno, UkupanBrSati FROM Prisustvo p, Student s WHERE s.SifS=$indeks AND 
                                         SifT=$sifraT");
            if(!empty($k))
            if (!empty($k->row())) {
                $q=$k->row();
                $this->db->select('CenaPoSatu');
                $this->db->where('SifP', $_POST['SifP']);
                $cPS = $this->db->get('Predmet')->row();

                $novvr = ($q->UkupnoNeisplaceno) + $h * ($cPS->CenaPoSatu);
				$novBrSati=($q->UkupanBrSati)+$h;
                $nove = array(
                    'UkupnoNeisplaceno' => $novvr,
					'UkupanBrSati' => $novBrSati
                );
                $this->db->where('SifS', $ind);
                $this->db->update('Student', $nove);

                $this->db->where('SifT', $_POST['SifT']);
                $this->db->where('SifS', $ind);
                $this->db->where('SifP', $_POST['SifP']);
                $this->db->delete('prisustvo');
            }
            else $message="Nije dobro postavljen indeks.";
            else $message="Nije dobro postavljen indeks.";
        }
        if($message=="") {
            $uT = array(
                'Status' => 'Isplacen'
            );
            $this->db->where('SifT', $_POST['SifT']);
            $this->db->update('termin', $uT);
        }
        else {
            $data['message']=$message;
            $where = "p.SifP=t.SifP";
            $this->db->select('p.Naziv');
            $this->db->select('p.SifP');
            $this->db->select('VremeOd');
            $this->db->select('VremeDo');
            $this->db->select('Datum');
            $this->db->select('Sala');
            $this->db->from('predmet p');
            $this->db->from('termin t');
            $this->db->where($where);
            $this->db->where('t.SifT', $_POST['SifT']);
            $this->db->where('t.Status', $b);
            $r = $this->db->get()->row();
            if (!empty($r)) {
                $data['Naziv'] = $r->Naziv;
                $dt = new DateTime($r->Datum);
                $data['vreme'] = $dt->format('Y-m-d');
                $data['datumOd'] = $r->VremeOd;
                $data['datumDo'] = $r->VremeDo;
                $data['predm'] = $r->SifP;
                $data['sifT'] = $_POST['SifT'];
                $data['Sala'] = $r->Sala;
                $date1 = new DateTime($r->VremeOd);
                $date2 = new DateTime($r->VremeDo);
                $time1 = $date1->format("H:i:s");
                $time2 = $date2->format("H:i:s");
                $data['sati'] = "" . $time1 . " - " . $time2 . "";
                $where = "p.SifS=s.SifS";
                $this->db->select("s.Ime, s.Prezime, s.SifS");
                $this->db->from('Prisustvo p');
                $this->db->from('Student s');
                $this->db->where('SifT', $_POST['SifT']);
                $this->db->where($where);
                $this->db->where('Status', 'izabran');
                $l = $this->db->get()->result_array();
                $data['Studenti'] = $l;
            }
        }
        $this->load->view('Profesor/zakljucivanjeTabela', $data);
    }

    public function zakazivanjeTermina()
    {
        $this->load->driver('session');
        $this->load->helper('url');
        $this->load->database();
        if (isset($_SESSION['username'])) {
            $data['imePrezime'] = $this->session->userdata('imePrezime');
            $this->db->select('SifP');
            $this->db->select('Naziv');
            $this->db->from('Predmet p');
            $this->db->where('p.SifZ', $this->session->userdata('username'));
            $pred = $this->db->get()->result_array();
            $data['Predmet'] = $pred;
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (!isset($_POST['SifP']) || !isset($_POST['Datum']) || !isset($_POST['Sala']) || !isset($_POST['VremeOd']) || !isset($_POST['VremeDo'])
                    || $_POST['SifP'] == "" || $_POST['Datum'] == "" || $_POST['Sala'] == "" || $_POST['VremeOd'] == "" || $_POST['VremeDo'] == ""
                ) {
                    $data['message'] = "Moraju biti uneti svi podaci";
                   // $this->load->view('Profesor/zakazivanjeTermina', $data);
                    redirect('Profesor/zakazivanjeTermina?message='.$data['message']);
                } else if ($this->validateDate($_POST['Datum'], 'Y-m-d') && $this->validateDate($_POST['Datum'] . " " . $_POST['VremeOd'], 'Y-m-d H:i')
                    && $this->validateDate($_POST['Datum'] . " " . $_POST['VremeDo'], 'Y-m-d H:i')
                ) {
                    $vOd = $_POST['Datum'] . " " . $_POST['VremeOd'];
                    $vDo = $_POST['Datum'] . " " . $_POST['VremeDo'];
                    $date1 = new DateTime($vOd);
                    $date2 = new DateTime($vDo);
                    $d1 = $date1->format("Y-m-d H:i:s");
                    $d2 = $date2->format("Y-m-d H:i:s");
                    $to = date("Y-m-d H:i:s");

                    if ($date2 > $date1 && ($to < $d1) && ($to < $d2)) {
                        $SifP = $this->db->escape($_POST['SifP']);
                        $Datum = $this->db->escape($_POST['Datum']);
                        $Sala = $this->db->escape($_POST['Sala']);
                        $VremeOd = $this->db->escape($vOd);
                        $VremeDo = $this->db->escape($vDo);

                        $q = $this->db->query("SELECT SifT FROM Termin t WHERE t.SifT=(SELECT MAX(k.SifT) FROM Termin k)")->row();
                        $SifT = "'" . ($q->SifT + 1) . "'";
                        if (!$this->db->query("INSERT INTO Termin VALUES($SifT, $VremeOd, $VremeDo, $Sala, 'prijavljen', $Datum, $SifP)")) {
                            //if ($pom==false){//$this->db->error()){
                            //$error=$this->db->error();
                            $data['message'] = "Nisu dobro unete vrednosti";
                            $this->load->view('Profesor/zakazivanjeTermina', $data);
                        } else {
                            $this->db->select('SifS');
                            $this->db->from('demonstratura d');
                            $this->db->where('d.SifP', $_POST['SifP']);
                            $r = $this->db->get()->result_array();
                            $sati = "" . $_POST['VremeOd'] . " - " . $_POST['VremeDo'] . "";
                            $subject = "[" . $_POST['SifP'] . "]Termin Datum:" . $_POST['Datum'] . "";
                            $body = "Postovanje,<br><br>Otvoreno je prijavljivanje za termin " . $_POST['Datum'] . " " . $sati . " iz predmeta " . $_POST['SifP'] . ".<br><br>Pozdrav,<br>eDemonstrator tim";
                            $this->sendEmail($subject, $body, $r);
                            redirect('Profesor/pocetna', $data);
                        }
                    } else {
                        $data['message'] = "Nije dobro uneto vreme.";
                        //$this->load->view('Profesor/zakazivanjeTermina', $data);
                        redirect('Profesor/zakazivanjeTermina?message='.$data['message']);
                    }
                } else {
                    $data['message'] = "Nisu dobro unete vrednosti";
                    //$this->load->view('Profesor/zakazivanjeTermina', $data);
                    redirect('Profesor/zakazivanjeTermina?message='.$data['message']);
                }
            }
            if($_SERVER['REQUEST_METHOD']=='GET'){
                if(isset($_GET['message'])) $data['message']=$_GET['message'];
                $this->load->view('Profesor/zakazivanjeTermina', $data);
            }
        } else redirect('Welcome');
    }

    public function tabelaID()
    {
        $this->load->driver('session');
        $this->load->helper('url');
        if (isset($_SESSION['username'])) {
            $data['message'] = "";
            $b = "prijavljen";
            if (isset($_POST['pred'])) {
                $where = "p.SifP=t.SifP";
                $this->db->select('p.Naziv');
                $this->db->select('p.SifP');
                $this->db->from('predmet p');
                $this->db->from('termin t');
                $this->db->where('SifT', $_POST['pred']);
                $this->db->where($where);
                $r = $this->db->get()->row();
                $data['predm'] = $r->SifP;
                $data['Naziv'] = $r->Naziv;
                $this->db->select("SifT, Datum, VremeOd, VremeDo");
                $this->db->from('termin');
                $this->db->where('Status', $b);
                $this->db->where('SifT', $_POST['pred']);
                $k = $this->db->get()->result_array();
                $data['Predmeti'] = $k;

                $where = "s.SifS=p.SifS";
                $this->db->select("Ime");
                $this->db->select("Prezime");
                $this->db->select("s.SifS");
                $this->db->from('Prisustvo p');
                $this->db->from('Student s');
                $this->db->where('SifT', $_POST['pred']);
                $this->db->where('Status', $b);
                $this->db->where($where);
                $l = $this->db->get()->result_array();
                $data['Studenti'] = $l;
                $this->load->view('Profesor/tabelaID', $data);
            }
        }
        else redirect('/Welcome/index');
    }

    public function odaberiStudente()
    {
        $data['message'] = "";
        $SifP = $_POST['SifP'];
        $b = "prijavljen";
        if (isset($_POST['check_list'])) {
            $i = 0;
            foreach ($_POST['check_list'] as $stu) $i++;

            if ($_POST['BrD'] <= $i && $_POST['BrD'] != 0) {
                $j = 0;
                $this->db->select('Datum');
                $this->db->select('VremeOd');
                $this->db->select('VremeDo');
                $this->db->from('Termin');
                $this->db->where('SifT', $_POST['SifT']);
                $termin = $this->db->get()->row();
                $date1 = new DateTime($termin->VremeOd);
                $date2 = new DateTime($termin->VremeDo);
                $date3 = new DateTime($termin->Datum);
                $dat = $date3->format("Y-m-d");
                $time1 = $date1->format("H:i:s");
                $time2 = $date2->format("H:i:s");
                $sati = "" . $time1 . " - " . $time2 . "";
                $body = "Postovani,<br><br>Izabrani ste u terminu " . $dat . ", vreme: " . $sati . "<br>na predmetu " . $SifP . ".<br><br>Pozdrav,<br>eDemonstrator tim";
                $subject = "[" . $SifP . "] Demonstratura " . $dat . "";
                if (strcmp($_POST['oR'], 'Prijava') == 0) {
                    foreach ($_POST['check_list'] as $stu)
                        if ($j < $_POST['BrD']) {
                            $j++;
                            $nove = array(
                                'Status' => 'izabran'
                            );
                            $this->db->where('SifT', $_POST['SifT']);
                            $this->db->where('SifS', $stu);
                            $this->db->where('SifP', $SifP);
                            $this->db->update('prisustvo', $nove);
                            $this->sendE($subject, $body, $stu);
                        }
                } else {
                    $where = "d.SifP=t.SifP";
                    $whereS = "d.SifS=t.SifS";
                    $this->db->select('d.SifS, Ocena');
                    $this->db->from('Demonstratura d');
                    $this->db->from('prisustvo t');
                    $this->db->where('d.SifP', $SifP);
                    $this->db->where($where);
                    $this->db->where($whereS);
                    $this->db->where('t.Status', $b);
                    $this->db->where("t.SifT", $_POST['SifT']);
                    $this->db->order_by('Ocena', 'DESC');
                    $q = $this->db->get()->result_array();

                    foreach ($q as $oce) {
                        if ($j < $_POST['BrD'])
                            foreach ($_POST['check_list'] as $stu)
                                if ($stu == $oce['SifS']) {
                                    $j++;
                                    $nove = array(
                                        'Status' => 'izabran'
                                    );
                                    $this->db->where('SifT', $_POST['SifT']);
                                    $this->db->where('SifS', $stu);
                                    $this->db->where('SifP', $SifP);
                                    $this->db->update('prisustvo', $nove);
                                    $this->sendE($subject, $body, $stu);
                                    //$this->break;
                                }
                    }
                }
                $uT = array(
                    'Status' => 'odradjen'
                );
                $this->db->where('SifT', $_POST['SifT']);
                $this->db->update('termin', $uT);

            } else if ($_POST['BrD'] != 0) $data['message'] = $data['message'] . " Potrebno je štiklirati vise demonstratora";
            else$data['message'] = $data['message'] . " Potrebno je vise od 0 demonstratora";
        } else $data['message'] = $data['message'] . " Nije štikliran nijedan studnet";
        if($data['message']!="") {
            $where = "p.SifP=t.SifP";
            $this->db->select('p.Naziv');
            $this->db->select('p.SifP');
            $this->db->from('predmet p');
            $this->db->from('termin t');
            $this->db->where('SifT', $_POST['SifT']);
            $this->db->where($where);
            $r = $this->db->get()->row();
            $data['predm'] = $r->SifP;
            $data['Naziv'] = $r->Naziv;
            $this->db->select("SifT, Datum, VremeOd, VremeDo");
            $this->db->from('termin');
            $this->db->where('Status', $b);
            $this->db->where('SifT', $_POST['SifT']);
            $k = $this->db->get()->result_array();
            $data['Predmeti'] = $k;
            // $this->tabelaID();

            $where = "s.SifS=p.SifS";
            $this->db->select("Ime");
            $this->db->select("Prezime");
            $this->db->select("s.SifS");
            $this->db->from('Prisustvo p');
            $this->db->from('Student s');
            $this->db->where('SifT', $_POST['SifT']);
            $this->db->where('Status', $b);
            $this->db->where($where);
            $l = $this->db->get()->result_array();
            $data['Studenti'] = $l;
        }
        $this->load->view('Profesor/tabelaID', $data);
    }

    public function krajRada()
    {
        $this->load->driver('session');
        $this->session->sess_destroy();
        $this->load->helper('url');
        redirect('Welcome');
    }

    public function izmenaSlike(){
        $this->load->driver('session');
        $this->load->helper('url');
        if(isset($_SESSION['username'])){
            if(isset($_POST['message'])) $data['message']=$_POST['message'];

            if($_SERVER['REQUEST_METHOD'] == 'GET'){
                if(isset($_GET['message'])) {
                    $data['message'] = $_GET['message'];
                    $this->load->view('Profesor/izmenaSlike', $data);
                }
                else $this->load->view('Profesor/izmenaSlike');
            }
        }
        else redirect('Welcome');
    }

    public function izmenaPodataka(){
        $this->load->driver('session');
        $this->load->helper('url');
        if(isset($_SESSION['username'])){

            if(isset($_FILES['slika']))
            if(file_exists($_FILES['slika']['tmp_name']) || is_uploaded_file($_FILES['slika']['tmp_name'])) {
				
				$image_up=$this->filePath($_FILES['slika']['name']);
				//var_dump($image_up['extension']);
				//exit();
				if(strcmp($image_up['extension'],'jpg')==0 || strcmp($image_up['extension'],'png')==0 || strcmp($image_up['extension'],'bmp')==0 || strcmp($image_up['extension'],'gif')==0 || strcmp($image_up['extension'],'jpeg')==0){
                $this->load->database();
                $this->db->select('Slika');
                $this->db->from('Zaposleni');
                $this->db->where('SifZ', $_SESSION['username']);
                $image = $this->db->get()->row();
                $image_name=$this->filePath($image->Slika);
                //unlink("./images/".$_SESSION['username'].".jpg");
                rename("./images/".($image_name['basename']), "./temp/".($image_name['basename']));
                $target_file="./images/".$_SESSION['username'].".jpg";
                if(move_uploaded_file($_FILES['slika']['tmp_name'],$target_file)){
                    $nov=array(
                      'Slika'=> base_url('images/'.$_SESSION['username'].'.jpg')
                    );
                    $this->db->where('SifZ', $_SESSION['username']);
                    $this->db->update('Zaposleni', $nov);
                    $data['message']="Uspesno je promenjena slika.";
                    //$this->load->view('Profesor/izmenaPodataka', $data);
                    //echo "<p>Uspesno je promenjena slika.</p>";
                    redirect('Profesor/izmenaSlike?message='.$data['message']);
                }
                else{
                    rename('./temp/'.($image_name['basename']), "./images/".($image_name['basename']));
                    //unlink('./temp/'.($image_name['basename']));
                    $data['message']="Desila se greska prilikom dodavanja slike.";
                    //$this->load->view('Profesor/izmenaPodataka', $data);
                    redirect('Profesor/izmenaSlike?message='.$data['message']);
                }
				}
				else{
					$data['message']="Slika treba da bude u nekom od formata jpg, png, bmp, gif, jpeg.";
					redirect('Profesor/izmenaSlike?message='.$data['message']);
				}
            }
            else {
                $data['message']="Niste uneli sliku.";
                //$this->load->view('Profesor/izmenaPodataka', $data);
                redirect('Profesor/izmenaSlike?message='.$data['message']);
            }
        }
        else redirect('Welcome');
    }

    public function poruka_Slika(){
        $this->load->helper('url');
        $this->load->driver('session');
        if(isset($_GET['message'])) {
            $data['message'] = $_GET['message'];
            $this->load->view('Profesor/poruka_Slika', $data);
        }
        else $this->load->view('Profesor/poruka_Slika');
    }
}