<?php
/**
 * Created by PhpStorm.
 * User: Jovana
 * Date: 5/20/2016
 * Time: 2:29 PM
 */
// Todorovic Jovana 0014/2013
class Student extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

    }

    public function pocetna()
    {
        session_start();
        $this->load->helper('url');


        if (isset($_SESSION["username"])) {
            $username = $_SESSION["username"];
            $this->load->database();
            $this->db->select('SifT');
            $this->db->from('prisustvo');
            $this->db->where('SifS', $username);
            $this->db->where('Status', 'izabran');

            $prisustva = $this->db->get()->result_array(); // sif t iz prisustva


            $this->db->select('*');
            $this->db->from('termin');
            $termini = $this->db->get()->result_array(); // sif t iz prisustva


            $niz = array();

            $k = false;
            $j = 0;
            foreach ($termini as $n) {
                foreach ($prisustva as $x) {
                    if ($x['SifT'] == $n['SifT']) $k = true;
                }
                if ($k == true) {
                    $niz[$j] = $n;
                    $j = $j + 1;
                }
                $k = false;
            }

            $data['termin'] = $niz;


            $this->load->view("Student/pocetna.php", $data);

        } else
            $this->load->view("Student/logStudent.php");
    }

    public function loginStudent()
    {
        session_start();
        $this->load->helper('url');

        $this->load->view("Student/logStudent");

    }

    public function DohvatanjeDemonstrature($kIme)
    {

        $this->load->database();
        $this->db->select('SifT');
        $this->db->from('prisustvo');
        $this->db->where('SifS', $kIme);
        $this->db->where('Status', 'izabran');

        $prisustva = $this->db->get()->result_array(); // sif t iz prisustva


        $this->db->select('*');
        $this->db->from('termin');
        $termini = $this->db->get()->result_array(); // sif t iz prisustva


        $niz = array();

        $k = false;
        $j = 0;
        foreach ($termini as $n) {
            foreach ($prisustva as $x) {
                if ($x['SifT'] == $n['SifT']) $k = true;
            }
            if ($k == true) {
                $niz[$j] = $n;
                $j = $j + 1;
            }
            $k = false;
        }

        $data['termin'] = $niz;
        return $data;

    }

    public function validacijaLogovanja()
    {
        session_start();
        $this->load->helper('url');
        $d['poruka'] = "";


        if(!isset($_POST['Kime']))
        {
            $kIme = $_SESSION['username'];
            $data = $this->DohvatanjeDemonstrature($kIme);
            return $this->load->view("Student/pocetna.php", $data);
        }

            $kIme = $_POST['Kime'];
            $sifra = $_POST['sifra'];
            $this->load->helper('url');
                $this->load->database();
                 $this->db->select('Ime');
                 $this->db->from('student');
                 $this->db->where('SifS', $kIme);
                 $this->db->where('Sifra', $sifra);
                 $data = $this->db->get()->result_array();

            if (empty($data)) {
                $this->load->view("Student/logGreska.php");
            } else {


                $_SESSION['username'] = "$kIme";
                $_SESSION['pass'] = "$sifra";

                $username = $_SESSION["username"];
                $this->db->select('Ime');
                $this->db->select('Prezime');
                $this->db->select('Pol');
                $this->db->from('student');
                $this->db->where('SifS', $username);

                $x = $this->db->get()->result_array();
                $pol = $x[0]['Pol'];
                $imePrezime = $x[0]['Ime'] . ' ' . $x[0]['Prezime'];
                $_SESSION['ime'] = $imePrezime;
                $_SESSION['pol'] = $pol;

                 $data = $this->DohvatanjeDemonstrature($kIme);


                $this->load->view("Student/pocetna.php", $data);

            }





    }

    public function registracijaStudent()
    {
        session_start();
        $this->load->helper('url');
        $this->load->view("Student/registracijaStudent.php");
    }


    public function proveraGreskeReg($s, $ps, $pol)
    {
        $uslov = false;

        if(strcmp($s,$ps) != 0) return false;
        if(strcmp($pol,"m")==0 || strcmp($pol,"M")==0 || strcmp($pol,"z")==0 || strcmp($pol,"Z")==0) $uslov = true;
        return $uslov;
    }

    public function zahtevZaReg()
    {
        session_start();
        $this->load->helper('url');

        if ( isset($_POST['ime']) && $_POST['prezime']&& $_POST['broj_indeksa'] && $_POST['smer'] && $_POST['korisnicko_ime'] && $_POST['sifra'] && $_POST['potvrdi_sifru'] && $_POST['br_telefona'] && $_POST['godina_studija'] && $_POST['pol'] && $_POST['prosek'])
        {
            $ime = $_POST['ime'];
            $prezime = $_POST['prezime'];

            $broj_indeksa = $_POST['broj_indeksa'];
            $smer = $_POST['smer'];
            $korisnicko_ime = $_POST['korisnicko_ime'];
            $sifra = $_POST['sifra'];

            $potvrdi_sifru = $_POST['potvrdi_sifru'];
            $br_telefona = $_POST['br_telefona'];
            $godina_studija = $_POST['godina_studija'];
            $prosek = $_POST['prosek'];
            $pol = $_POST['pol'];
            $slika = "0.jpg";

            if($this->proveraGreskeReg($sifra, $potvrdi_sifru, $pol) == false)  {$this->load->view("Student/GreskaReg.php"); return;}
            $this->load->database();

            $this->db->select('Ime');
            $this->db->from('student');
           
            $this->db->where('SifS', $korisnicko_ime);
            $data = $this->db->get()->result_array();

            if (!empty($data)) {
                $this->load->view("Student/GreskaReg.php"); return;
            }

            $data = array('Sifra'=>$sifra,'Ime' => "$ime", 'Prezime' => "$prezime", 'Slika' => "$slika", 'Pol' => "$pol", 'GodStudija' => "$godina_studija", 'Prosek' => "$prosek", 'Smer' => "$smer", 'BrTel' => "$br_telefona", 'Indeks' => "$broj_indeksa", 'SifS' => "$korisnicko_ime");

            $this->db->insert('zahtevregistracija', $data);
            $this->load->view("Student/logStudent.php");
        }

    }

    public function profil()
    {
        session_start();
        $this->load->helper('url');
        if(isset($_SESSION["username"]))
        {
            $username = $_SESSION["username"];
            $pass = $_SESSION["pass"];
            $this->load->database();

          $this->db->select('Ime');
            $this->db->select('Prezime');
            $this->db->select('Prosek');
            $this->db->select('GodStudija');
            $this->db->select('Indeks');
            $this->db->select('Smer');
            $this->db->select('BrTel');
            $this->db->select('UkupanBrSati');
            $this->db->select('UkupnoNeIsplaceno');
            $this->db->select('UkupnoIsplaceno');
            $this->db->select('Slika');
            $this->db->select('SifS');
           // $this->db->select("*");
            $this->db->from('student');
            $this->db->where('SifS', $username);
            $this->db->where('Sifra',$pass);



            $data['student']=$this->db->get()->result_array();



            $this->load->view("Student/profilStudent.php",$data);
        }
        else
        {
            $this->load->view("Student/logStudent.php");
        }
    }

    public function krajRada()
    {
        session_start();
        $this->load->helper('url');
        unset($_SESSION['username']);
        $this->load->view("Student/welcome_message.php");

    }

    public function izmenaPodataka()
    {
        session_start();
        $this->load->helper('url');

        $this->load->view("Student/izmenaPodataka");

    }

    public function izmenaSlike()
    {
        session_start();
        $this->load->helper('url');

        $this->load->view("Student/izmenaSlike");

    }

    public function izmenaLozinke()
    {
        session_start();
        $this->load->helper('url');

        if(isset($_SESSION["username"]))
        {
            $this->load->view("Student/izmenaLozinke");
        }
        else
            $this->load->view("Student/logStudent");


    }

    public function validacijaIzmeneLozinke()
    {
        session_start();
        $this->load->helper('url');
        $sl = $_POST['alozinka'];
        $nl = $_POST['nlozinka'];
        $pnl = $_POST['pnlozinka'];
        if(isset($_SESSION["username"]))
        {
            $loz = $_SESSION['pass'];
            if(strcmp($sl,$loz)==0 && strcmp($nl,$pnl)==0)
            {
                $data = array(
                    'Sifra' => $nl,
                );

                $username = $_SESSION["username"];
                // $pass = $_SESSION["pass"];
                $this->load->database();
                $this->db->where('SifS', $username);
                // $this->db->where('Sifra',$pass);
                $this->db->update('student',$data);
                $_SESSION['pass'] = $nl;
                $this->load->view("Student/logStudent");


            }
            else
                $this->load->view("Student/greskaIzmenaLoz");
        }
        else
            $this->load->view("Student/logStudent");
    }

    public function izmenaProseka()
    {
        session_start();
        $this->load->helper('url');
        if(isset($_SESSION["username"]))
        {
            $this->load->view("Student/izmenaProseka");
        }
        else
            $this->load->view("Student/logStudent");


    }

    public function validacijaIzmeneProseka()
    {
        session_start();
        $this->load->helper('url');


        $prosek = $_POST['prosek'];
        $b =1;

        if (isset($_SESSION["username"])) {
            $loz = $_SESSION['pass'];
            $username =  $_SESSION['username'];


            $this->load->database();

            $this->db->select('Prosek');
            $this->db->select('GodStudija');

            $this->db->from('student');
            $this->db->where('Sifra',$loz);
            $d = $this->db->get()->result_array();
            $staraV = $d[0]['Prosek'];
            $godina = $d[0]['GodStudija'];

            //var_dump($d);

            $data = array('NovaVred'=>"$prosek", 'Prosek'=>"$b",'Godina'=>"$godina",'StaraVred'=>$staraV, 'SifS'=>$username);


            $this->db->insert('zahtevizmena', $data);
            $this->load->view("Student/uspesnaIzmena");


        } else $this->load->view("Student/logStudent");
    }

    public function izmenaGodine()
    {
        session_start();
        $this->load->helper('url');

        if(isset($_SESSION["username"]))
        {
            $this->load->view("Student/izmenaGodine");
        }
        else
            $this->load->view("Student/logStudent");


    }

    public function validacijaIzmeneGodine()
    {
        session_start();
        $this->load->helper('url');


        $godina = $_POST['godina'];
        $b =0;

        if (isset($_SESSION["username"])) {
            $loz = $_SESSION['pass'];
            $username =  $_SESSION['username'];


            $this->load->database();

            $this->db->select('Prosek');
            $this->db->select('GodStudija');

            $this->db->from('student');
            $this->db->where('Sifra',$loz);
            $d = $this->db->get()->result_array();
            $staraV = $d[0]['Prosek'];
            $godina1 = $d[0]['GodStudija'];

            //var_dump($d);

            $data = array('NovaVred'=>"$godina", 'Prosek'=>"$b",'Godina'=>"$godina1",'StaraVred'=>$staraV, 'SifS'=>$username);


            $this->db->insert('zahtevizmena', $data);
            $this->load->view("Student/uspesnaIzmena");


        } else $this->load->view("Student/logStudent");
    }





    public function prijavaZaDemonstraturu()
    {
        if(!isset($_SESSION["username"]))
        session_start();
        $this->load->helper('url');
        if (isset($_SESSION["username"]))
        {
            $username = $_SESSION["username"];
        
            $niz1 = $this->dohvatiTermine($username);
            $data['termin'] = $niz1;

            if(empty($niz1)){ $this->load->view("Student/nemaTermina");}
            else
                $this->load->view("Student/prijavaZaDemonstraturu", $data);

        }
        else $this->load->view("Student/logStudent");
    }


    public function dohvatiTermine($username)
    {
        $this->load->database();
        $this->db->select('SifP');
        $this->db->from('demonstratura');
        $this->db->where('SifS',$username);
        $demonstratura = $this->db->get()->result_array();
        $this->db->select('*');
        $this->db->from('termin');
        $this->db->where('Status','prijavljen');
        $termini = $this->db->get()->result_array();

        $this->db->select('SifT');
        $this->db->from('prisustvo');
        $this->db->where('SifS',$username);
        $xx = $this->db->get()->result_array();



        $niz = array();
        $niz1 = array();
        $i = 0;

        foreach($termini as $t)
        {
            foreach ($demonstratura as $d)
            {
                if($d['SifP'] == $t['SifP']){$niz[$i] = $t; $i = $i+1;}
            }

        }

        $k = false;
        $j = 0;
        foreach ($niz as $n)
        {
            foreach ($xx as $x )
            {
                if($x['SifT'] == $n['SifT']) $k=true;
            }
            if($k == false){$niz1[$j] = $n; $j = $j + 1; }
            $k = false;
        }


        $data['termin'] = $niz1;
        return $niz1;
    }

    public function prijaviDemonstrature()
    {
         session_start();
        $this->load->helper('url');
        if (isset($_SESSION["username"]))
        {
            
            if(!isset($_POST['niz_t']))
                {
                    $username = $_SESSION["username"];
                    $niz1 = $this->dohvatiTermine($username);
                    $data['termin'] = $niz1;

                    if(empty($niz1)){ $this->load->view("Student/nemaTermina");}
                else
                    $this->load->view("Student/prijavaZaDemonstraturu", $data);
                }
            else
            {
                $niz = $_POST['niz_t'];

                if(!is_array($niz)){return $this->prijavaZaDemonstraturu();}



                $this->load->database();

                foreach($niz as $n)
                {
                    $this->db->select('SifP');
                    $this->db->from('termin');
                    $this->db->where('SifT',$n);
                    $idPred = $this->db->get()->result_array();
                    $idP = $idPred[0];
                    $idPP = $idP['SifP'];
                    $sifS = $_SESSION["username"];
                    $status = "prijavljen";
                    $data = array('SifS' => $sifS, 'SifT' => $n, 'SifP'=>$idPP, 'Status'=>$status);
                    $this->db->insert('prisustvo',$data);


                }
                $this->load->view("Student/uspesnoPrijavljivanjeDemonstratura");
            }



        }else $this->load->view("Student/logStudent");
    }

    public function prijavaDemonstrator()
    {
        session_start();
        $this->load->helper('url');

        $this->load->database();
        $this->db->select('Konkurs');

        $this->db->from('admin');
        $konkurs = $this->db->get()->result_array();
        $k = $konkurs[0]['Konkurs'];

       // var_dump($k); exit();

        if(strcmp($k,'0') == 0) $this->load->view("Student/GreskaKonkurs");
        else
        {
            if (isset($_SESSION["username"]))
            {
                $loz = $_SESSION['pass'];
                $username =  $_SESSION['username'];

                $this->load->database();
                $this->db->select('Konkurs');

                $this->db->from('admin');
                $konkurs = $this->db->get()->result_array();
                $pom = $konkurs[0];

                $this->db->select('*');

                $this->db->from('predmet');
                $predmeti = $this->db->get()->result_array();
                $data['predmeti']=$predmeti;
               $this->load->view("Student/prijavaDemonstrator",$data);
            } else $this->load->view("Student/logStudent");


        }






    }

    public function registracijaPrijave()
    {
        session_start();
        $this->load->helper('url');
        $username =  $_SESSION['username'];
      //  var_dump($username); exit();

        if(isset($_POST['niz_t']) && isset($_POST['ocene'])) {
            $niz = $_POST['niz_t'];
            $ocene = $_POST['ocene'];
            $this->load->database();
			
            $cnt = count($ocene);
			$this->db->select('SifS');
            $this->db->select('SifP');
            $this->db->select('Ocena');
			$this->db->from('demonstratura');
			$this->db->where('SifS', $username);
			$delq=$this->db->get()->result_array();
			if(!empty($delq)){
				foreach ($delq as $d){
					 
					 $this->db->where('SifS', $d['SifS']);
					 $this->db->where('SifP', $d['SifP']);
					 $this->db->where('Ocena', $d['Ocena']);
					 if(!$this->db->delete('demonstratura')){
						 $error = $this->db->error();
					 }
				}
			}
			
            for ($i = 0; $i < $cnt; $i++)
            {
                $ocena = $ocene[$i];
                $predmet = $niz[$i];

                $this->db->select('SifS');
                $this->db->select('SifP');
                $this->db->select('Ocena');

                $this->db->from('demonstratura');
                $this->db->where('SifS',$username);
                $this->db->where('SifP',$predmet);
                $prijave = $this->db->get()->result_array();
					
                if(empty($prijave))
                {
                    $data = array('SifS' => $username, 'SifP' => $predmet, 'Ocena' => $ocena);
                    $this->db->insert('demonstratura', $data);
                }
                else
                {
					
                    $data = array(
                        'Ocena' => $ocena,
                    );


                    $this->db->where('SifS', $username);

                    $this->db->where('SifP',$predmet);
                    $this->db->update('demonstratura',$data);
                }


            }

            $this->load->view("Student/uspesnaPijavaDem");
        }else $this->load->view("Student/popuniObavestenje");


    }

    public function validacijaIzmeneSlike()
    {
        session_start();
        $this->load->helper('url');

        if(isset($_SESSION["username"]))
        {

            if(!file_exists($_FILES['image']['tmp_name']) || !is_uploaded_file($_FILES['image']['tmp_name']))  return $this->load->view("Student/GreskaSlika");



            if(isset($_FILES['image']) && isset($_SESSION["username"]))
            {
                $this->load->database();

                $this->db->select('Slika');
                $this->db->from('student');
                $slike = $this->db->get()->result_array();


                $s = 0;
                foreach ($slike as $ss)
                {
                    $p = intval($ss['Slika']);
                  //  var_dump($p);exit();
                    if($p>$s) $s = $p;
                }

                $s+=1;

                $errors= array();
                $file_name = $_FILES['image']['name'];
                $file_tmp = $_FILES['image']['tmp_name'];
                $pom = base_url();
                $pom1 = $pom."images/";
                $pom2 = $pom1.$file_name;
                $target_dir = "./images/";
                if(!file_exists($target_dir))
                {
                    mkdir($target_dir,0777,true);
                }

                $username = $_SESSION["username"];
                $this->load->database();

                $file_name = $s.'.jpg';
                $this->db->select('Slika');
                $this->db->from('student');
                $this->db->where('SifS',$username);
                $d = $this->db->get()->result_array();
                $ime_slike = $d[0]['Slika'];


                    $this->db->select('Slika');
                    $this->db->from('student');
                    $this->db->where('SifS',$username);
                    $data = array('Slika'=>$s);
                    $this->db->update('student',$data);

                $target_file = $target_dir.$file_name;

                move_uploaded_file($_FILES['image']['tmp_name'],$target_file);

                $this->load->view("Student/uspesnaIzmenaSlike");
            }

            else $this->load->view("Student/GreskaSlika");

        }else $this->load->view("Student/logStudent");
    }

    public  function posaljiMejl($mail, $subject, $message) {
        $this->load->library('email');

        $config['protocol']    = 'smtp';
        $config['smtp_host']    = 'ssl://smtp.gmail.com';
        $config['smtp_port']    = '465';
        $config['smtp_timeout'] = '7';
        $config['smtp_user']    = 'edemonstrator@gmail.com';
        $config['smtp_pass']    = 'psiprojekat';
        $config['charset']    = 'utf-8';
        $config['newline']    = "\r\n";
        $config['mailtype'] = 'text'; // or html
        $config['validation'] = TRUE; // bool whether to validate email or not

        $this->email->initialize($config);

        $this->email->from('edemonstrator@gmail.com', 'eDemonstrator');
        $this->email->to($mail);
        $this->email->subject($subject);
        $this->email->message($message);

        $this->email->send();
    }

    public function zabSifra()
    {
        session_start();
        $this->load->helper('url');

        $this->load->view("Student/sifraZaboravljena");
    }

    public function RandomString()
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randstring = '';
        for ($i = 0; $i < 10; $i++) {
            $randstring = $randstring . $characters[rand(0, strlen($characters))];
        }
        return $randstring;
    }

    public function slanjeMejla()
    {
        session_start();
        $this->load->helper('url');
        $kIme = $_POST['Kime'];
 
        $mail = $kIme.'@student.etf.rs';
        $sifra = $this->RandomString();
        $this->load->database();
        $this->db->select('SifS');
        $this->db->from('student');
        $this->db->where('SifS', $kIme);
        $slike = $this->db->get()->result_array();

        if(!isset($slike)) $this->load->view("Student/Student/greskaKorisnikNePostoji");
        else{
            $this->load->database();
            $this->db->select('SifS');
            $this->db->from('student');
            $this->db->where('SifS', $kIme);
            $data = array('Sifra'=>$sifra);
            $this->db->update('student',$data);
            $subject='Promena šifre';
            $tekst = 'Vaša nova šifra je: '.$sifra;

            $this->posaljiMejl($mail,$subject,$tekst);
            $this->load->view("Student/obavestenjeSifra");

        }
    

    }

}

?>