<?php
//Snezana Tanic 0237/13
//Marijana Prpa 0442/13

class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
        $this->load->helper('url_helper');
    }

    public function index()
    {
        $this->load->driver('session');
        $this->load->helper('url');
        if (isset($_SESSION['username'])) {
            $data['imePrezime'] = "Administrator";
            $data['brReg'] = $this->admin_model->brRegistracija();
            $data['brZah'] = $this->admin_model->brZahteva();
            $data['konkurs'] = $this->admin_model->dohvatiKonkurs();

            $this->load->helper('url');
            $this->load->view('header', $data);
            $this->load->view('admin/menu');
            $this->load->view('admin/pocetna', $data);
            $this->load->view('footer');
        } else redirect('Welcome');

    }

    public function zahtevi() {
        $this->load->driver('session');
        $this->load->helper('url');
        if (isset($_SESSION['username'])) {
            $data['imePrezime'] = "Administrator";

            $data['registracije'] = $this->admin_model->dohvatiRegistracije();
            $data['zahtevi'] = $this->admin_model->dohvatiZahteve();

            $this->load->helper('url');
            $this->load->helper('form');
            $this->load->library('form_validation');

            $this->load->view('header', $data);
            $this->load->view('admin/menu');
            $this->load->view('admin/zahtevi', $data);
            $this->load->view('footer');
        }  else redirect('Welcome');
    }

    public function obradaZahteva() {
        $this->load->driver('session');
        $this->load->helper('url');
        if (isset($_SESSION['username'])) {
            $this->load->helper('url');
            $this->load->helper('form');
            $this->load->library('form_validation');

            if (isset($_POST['odobriReg']) && is_array($_POST['odobriReg'])) {
                foreach ($_POST['odobriReg'] as $reg)  {
                    $this->admin_model->odobriRegistraciju($reg);
                }
            }
            if (isset($_POST['ponistiReg']) && is_array($_POST['ponistiReg'])) {
                foreach ($_POST['ponistiReg'] as $reg)  {
                    $this->admin_model->odbijRegistraciju($reg);
                }
            }
            if (isset($_POST['odobriZah']) && is_array($_POST['odobriZah'])) {
                foreach ($_POST['odobriZah'] as $reg)  {
                    $this->admin_model->odobriZahtev($reg);
                }
            }
            if (isset($_POST['ponistiZah']) && is_array($_POST['ponistiZah'])) {
                foreach ($_POST['ponistiZah'] as $reg)  {
                    $this->admin_model->odbijZahtev($reg);
                }
            }

            $this->zahtevi();
        } else redirect('Welcome');


    }

    public function isplata() {
        $this->load->driver('session');
        $this->load->helper('url');
        if (isset($_SESSION['username'])) {
            $data['imePrezime'] = "Administrator";

            $this->load->helper('url');
            $this->load->helper('date');
            date_default_timezone_set('Europe/Belgrade');

            $this->load->view('header', $data);
            $this->load->view('admin/menu');
            $this->load->view('admin/isplata');
            $this->load->view('footer');
        } else redirect('Welcome');

    }

    public function isplatiStudente() {
        $this->load->driver('session');
        $this->load->helper('url');
        if (isset($_SESSION['username'])) {
            $this->admin_model->isplatiStudente();
            $this->isplata();
        } else redirect('Welcome');

    }

    public function konkurs() {
        $this->load->driver('session');
        $this->load->helper('url');
        if (isset($_SESSION['username'])) {
            $data['imePrezime'] = "Administrator";

            $data['konkurs'] = $this->admin_model->dohvatiKonkurs();

            $this->load->helper('url');
            $this->load->helper('date');
            date_default_timezone_set('Europe/Belgrade');

            $this->load->view('header', $data);
            $this->load->view('admin/menu');
            $this->load->view('admin/konkurs', $data);
            $this->load->view('footer');
        } else redirect('Welcome');

    }
    
    public function postaviKonkurs() {
        $this->load->driver('session');
        $this->load->helper('url');
        if (isset($_SESSION['username'])) {
            $this->admin_model->izbrisiTabele();
            $this->admin_model->postaviKonkursVreme(1);
            $this->konkurs();
        } else redirect('Welcome');

    }
    
    public function zatvoriKonkurs() {
        $this->load->driver('session');
        $this->load->helper('url');
        if (isset($_SESSION['username'])) {
            $this->admin_model->postaviKonkursVreme(0);
            $this->konkurs();
        } else redirect('Welcome');

    }

    public function ukloni(){
        $this->load->driver('session');
        $this->load->helper('url');
        if (isset($_SESSION['username'])) {
            $this->load->helper('url');
            $this->load->helper('form');
            $this->load->library('form_validation');
            $data['imePrezime'] = "Administrator";
            $this->load->view('header', $data);
            $this->load->view('admin/menu');
            $data['predmeti'] = $this->admin_model->uzmi_predmete();
            $this->load->view('admin/ukloni', $data);
            $this->load->view('footer');
        } else redirect('Welcome');

    }
    
    public function obrisi(){
        $this->load->driver('session');
        $this->load->helper('url');
        if (isset($_SESSION['username'])) {
            $this->load->helper('url');
            $this->load->helper('form');
            $this->load->library('form_validation');
            if (isset($_POST['predmeti']))
                if (is_array($_POST['predmeti'])){
                    foreach ($_POST['predmeti'] as $predmet) {
                        $this->admin_model->brisi($predmet);
                    }
                }
            $this->ukloni();
        } else redirect('Welcome');

    }

    public function dodavanje(){
        $this->load->driver('session');
        $this->load->helper('url');
        if (isset($_SESSION['username'])) {
            $this->load->helper('url');
            $this->load->helper('form');
            $this->load->library('form_validation');

            $data['imePrezime'] = "Administrator";
            $this->load->view('header', $data);
            $this->load->view('admin/menu');
            $this->load->view('admin/dodavanje');
            $this->load->view('footer');
        }
        else redirect('Welcome');
    }

        public function dodajpredmet (){
            $this->load->driver('session');
            $this->load->helper('url');
            if (isset($_SESSION['username'])) {
          if($_SERVER['REQUEST_METHOD'] == 'POST') {
                if(isset($_POST['cenaposatu']) && $_POST['cenaposatu'] != "" && isset($_POST['sifraP']) && $_POST['sifraP'] != "" &&  isset($_POST['naziv']) && $_POST['naziv'] != "" && isset($_POST['godina']) && $_POST['godina'] != "" && isset($_POST['sifra']) && $_POST['sifra'] != "")  {

                    $sifraP = $_POST['sifraP'];
                    $naziv =   $_POST['naziv'];
                    $godina =  $_POST['godina'];
                    $cenaposatu = $_POST['cenaposatu'];
                    $sifra = $_POST['sifra'];
                    if($godina < 1 || $godina > 4) {
                        $this->load->view('admin/godinaLosa');
                    } else if($this->admin_model->nadjipredmetponazivu($naziv) != null) {
                        $this->predmetpostojinaziv();
                        //return;

                    }
                    else if($this->admin_model->nadjipredmetposifri($sifraP) != null) {
                        $this->predmetpostojisifra();
                        //return;
                    }
                    else {

                        $postoji = $this->admin_model->nadjiprofesora($sifra);
                        if (empty($postoji))    {
                            $data['sifraP'] = $sifraP;
                            $data['naziv'] = $naziv;
                            $data['godina'] = $godina;
                            $data['cenaposatu'] = $cenaposatu;
                            $data['sifra'] = $sifra;
                            $this->load->view('admin/dodajprofesora', $data);
                            //$this->predmetdodat();
                        } else {
                            $this->admin_model->dodajpredmet($sifraP, $naziv, $godina, $cenaposatu, $sifra);
                            $this->predmetdodat();
                        }
                    }
                }
                else {
                  $this->load->view('admin/svaPolja');

                }
            }
        } else redirect('Welcome');

    }


    public function dodajprofesora(){
        $this->load->driver('session');
        $this->load->helper('url');
        if (isset($_SESSION['username'])) {
            $this->load->helper('url');
            $this->load->helper('form');
            $this->load->library('form_validation');

            if (isset($_POST['ime']) &&  isset($_POST['prezime'])) {
                $ime = $_POST['ime'];
                $prezime = $_POST['prezime'];
                $sifra =   $_POST['sifra'];
                $naziv =  $_POST['naziv'];
                $godina =  $_POST['godina'];
                $cenaposatu = $_POST['cenaposatu'];
                $sifraP =  $_POST['sifraP'];
                $lozinka = $this->RandomString();
                if ($_POST['pol'] == "muski") {
                    $pol = 'm';
                    $slika = 'http://localhost/psipro/images/user_m.png';
                }
                else {
                    $pol = 'z';
                    $slika = 'http://localhost/psipro/images/user_z.png';
                }
                if ($_POST['tip'] == "asis")
                    $status = 'asistent';
                else
                    $status = 'profesor';

                $mail = $sifra . "@etf.rs";
                $subject = "Obavestenje";
                $message = "Uspesno ste registrovani. Vasa lozinka je: " . $lozinka;

                $this->admin_model->posaljiMejl($mail, $subject, $message);

                $this->admin_model->dodajprofesora($ime, $prezime, $sifra, $status, $pol, $slika, $lozinka);
                $this->admin_model->dodajpredmet($sifraP, $naziv, $godina, $cenaposatu, $sifra);
                $this->profpredmetdodat();
            }
        } else redirect('Welcome');

    }

    public function RandomString()
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randstring = "";
        for ($i = 0; $i < 10; $i++) {
            $randstring = $randstring . $characters[rand(0, strlen($characters))];
        }
        return $randstring;
    }

    public function predmetdodat(){
        $this->load->driver('session');
        $this->load->helper('url');
        if (isset($_SESSION['username'])) {
            $this->load->helper('url');
            $this->load->helper('form');
            $this->load->library('form_validation');

            $this->load->view('admin/predmetdodat');
        } else redirect('Welcome');

    }

    public function profpredmetdodat(){
        $this->load->driver('session');
        $this->load->helper('url');
        if (isset($_SESSION['username'])) {
            $data['imePrezime'] = "Administrator";

            $this->load->helper('url');
            $this->load->helper('form');
            $this->load->library('form_validation');
            $this->load->view('header', $data);
            //$this->load->view('admin/menu');
            $this->load->view('admin/profpredmetdodat');
           // $this->load->view('footer');

        } else redirect('Welcome');

    }

    public function predmetpostojisifra(){
        $this->load->driver('session');
        $this->load->helper('url');
        if (isset($_SESSION['username'])) {
            $this->load->helper('url');
            $this->load->helper('form');
            $this->load->library('form_validation');

            return $this->load->view('admin/predmetpostojisifra');
        } else redirect('Welcome');

    }

    public function predmetpostojinaziv(){
        $this->load->driver('session');
        $this->load->helper('url');
        if (isset($_SESSION['username'])) {
            $this->load->helper('url');
            $this->load->helper('form');
            $this->load->library('form_validation');

            return $this->load->view('admin/predmetpostojinaziv');
        } else redirect('Welcome');

    }

    public function logout()
    {
        $this->load->driver('session');
        $this->session->sess_destroy();
        $this->load->helper('url');
        redirect('Welcome');
    }

}
