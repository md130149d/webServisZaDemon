<?php
// Danko Miladinovic 149/13
class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->helper('url');
		$this->load->view('index');
	}

	public function logInProfesor(){
        $this->load->driver('session');
        $this->load->helper('url');
        if(isset($_POST['SifZ'])) {
            $this->load->database();
            $username=$this->db->escape($_POST['SifZ']);
            //var_dump($username);
            $password=$this->db->escape($_POST['Sifra']);
            $q=$this->db->query("Select Ime, Prezime, Pol From Zaposleni WHERE SifZ=$username AND Sifra=$password")->row();
          //  var_dump($q);
           // exit();
            if (empty($q)) {
                $q=$this->db->query("Select SifA From Admin Where SifA=$username AND Sifra=$password")->row();
                if(!empty($q)){
                    $this->session->set_userdata('username', $_POST['SifZ']);
                    //$this->session->set_userdata('userdata');
                    redirect("/Admin/index");
                }
                else {
                    $data['message'] = "Pogrešna šifra ili korisničko ime!";
                   // $this->load->view("logInProfesor", $data);
                    redirect('/Welcome/logInProfesor?message='.$data['message']);
                }
            } else {
                $this->session->set_userdata('username', $_POST['SifZ']);
                $this->session->set_userdata('imePrezime', "" . ($q->Ime) . " " . ($q->Prezime) . "");
                $this->session->set_userdata('pol', $q->Pol);
                $data['imePrezime'] = "" . ($q->Ime) . " " . ($q->Prezime) . "";
                redirect("/Profesor/pocetna", $data);
            }
        }
        else {
            if(isset($_GET['message'])){
                $data['message']=$_GET['message'];
                $this->load->view("logInProfesor",$data);
            }
            else $this->load->view("logInProfesor");
        }
	}
}
