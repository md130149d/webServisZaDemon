<?php
//Snezana Tanic 0237/13
//Marijana Prpa 0442/13

class Admin_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function dohvatiRegistracije() {

        $query = $this->db->get('ZahtevRegistracija');
        if($query==null) return null;
        return $query->result_array();

    }

    public function dohvatiZahteve() {

        $query = $this->db->get('ZahtevIzmena');
        if($query==null) return null;
        return $query->result_array();

    }

    public function brRegistracija() {

        $query = $this->db->get('ZahtevRegistracija');
        return $query->num_rows();

    }

    public function brZahteva() {

        $query = $this->db->get('ZahtevIzmena');
        return $query->num_rows();

    }
    
    public function odobriRegistraciju($id) {
        $query = $this->db->get_where('zahtevRegistracija', array('SifZR' => $id));
        if(!empty($query->result())){
            $zahtev = $query->row_array();
            $student = array(
                'SifS' => $zahtev['SifS'] ,
                'Sifra' => $zahtev['Sifra'] ,
                'Ime' => $zahtev['Ime'] ,
                'Prezime' => $zahtev['Prezime'] ,
                'Pol' => $zahtev['Pol'] ,
                'GodStudija' => $zahtev['GodStudija'] ,
                'Indeks' => $zahtev['Indeks'] ,
                'Prosek' => $zahtev['Prosek'] ,
                'Smer' => $zahtev['Smer'] ,
                'BrTel' => $zahtev['BrTel'] ,
                'UkupanBrSati' => 0 ,
                'UkupnoNeisplaceno' => 0 ,
                'UkupnoIsplaceno' => 0 ,
                'Slika' => "0"
            );

            $this->db->insert('Student', $student);
            $this->db->delete('zahtevRegistracija', array('SifZR' => $id));

            $mail = $student['SifS'] . "@student.etf.rs";

            $subject = 'Registracija';
            $message = 'Uspesno ste se registrovali na sistem.';

            $this->posaljiMejl($mail, $subject, $message);

        }
        
    }

    public function odbijRegistraciju($id) {
        $query = $this->db->get_where('zahtevRegistracija', array('SifZR' => $id));
        if(!empty($query->result())) {
            $zahtev = $query->row_array();
        }
        $this->db->delete('zahtevRegistracija', array('SifZR' => $id));
        $mail = $zahtev['SifS'] . "@student.etf.rs";

        $subject = 'Registracija';
        $message = 'Nazalost Vasa registracija nije uspela.';

        $this->posaljiMejl($mail, $subject, $message);
    }

    public function  odobriZahtev($id) {
        $query = $this->db->get_where('zahtevIzmena', array('SifZI' => $id));
        if(!empty($query->result())){
            $zahtev = $query->row_array();
            
            $mail = $zahtev['SifS'] . "@student.etf.rs";
            $subject = 'Zahtev za izmenu podatka';

            if($zahtev['Prosek'] == 1) {
                $student = array(
                    'prosek' => $zahtev['NovaVred']
                );

                $message = 'Uspesno ste promenili prosek.';
            }
            else {
                $student = array(
                    'GodStudija' => $zahtev['NovaVred']
                );

                $message = 'Uspesno ste promenili godinu.';

            }

            $this->db->update('Student', $student, array('SifS' => $zahtev['SifS']));
            $this->db->delete('zahtevIzmena', array('SifZI' => $id));
            $this->posaljiMejl($mail, $subject, $message);
        }
    }

    public function  odbijZahtev($id) {
        $query = $this->db->get_where('zahtevIzmena', array('SifZI' => $id));
        if(!empty($query->result())) {
            $zahtev = $query->row_array();
            $mail = $zahtev['SifS'] . "@student.etf.rs";
            $subject = 'Zahtev za izmenu podatka';

            if ($zahtev['Prosek'] == 1) {
                $student = array(
                    'prosek' => $zahtev['NovaVred']
                );

                $message = 'Zahtev za promenu proseka odbijen.' ;
            } else {
                $student = array(
                    'GodStudija' => $zahtev['NovaVred']
                );

                $message = 'Zahtev za promenu godine odbijen.';

            }
        }
        $this->db->delete('zahtevIzmena', array('SifZI' => $id));
        $this->posaljiMejl($mail, $subject, $message);
    }
    
    public function dohvatiKonkurs() {
        $query = $this->db->get('Admin');
        $admin = $query->row_array();
        return $admin['Konkurs'];
    }

    public function izbrisiTabele() {
        $this->db->empty_table('Prisustvo');
        $this->db->empty_table('Demonstratura');
        $this->db->empty_table('Termin');
    }

    public function postaviKonkursVreme($vreme) {
        $pod = array(
            'Konkurs' => $vreme
        );
        $this->db->update('Admin', $pod, array('SifA' => "admin"));

        $query = $this->db->get('Student');
        $result = $query->result_array();
        if($vreme == 1) {
            foreach ($result as $r) {
                $mail = $r['SifS'] . "@student.etf.rs";
                $subject = 'Konkurs';
                $message = 'Konkurs prijave za demonstraturu je otvoren';
                $this->posaljiMejl($mail, $subject, $message);
            }
        } else {
            foreach ($result as $r) {
                $mail = $r['SifS'] . "@student.etf.rs";
                $subject = 'Konkurs';
                $message = 'Konkurs prijave za demonstraturu je zatvoren';
                $this->posaljiMejl($mail, $subject, $message);
            }
        }
    }

    public function isplatiStudente() {
        $query = $this->db->get('Student');
        if(!empty($query->result())){
            $zahtevi = $query->result_array();
            foreach ($zahtevi as $zahtev) {
                $info = array(
                    'UkupnoNeisplaceno' => 0,
                    'UkupnoIsplaceno' => $zahtev['UkupnoIsplaceno'] + $zahtev['UkupnoNeisplaceno']
                );

                $this->db->update('Student', $info, array('SifS' => $zahtev['SifS']));
            }
        }

    }

    public  function posaljiMejl($mail, $subject, $message) {
        $this->load->library('email');
        date_default_timezone_set('Europe/Belgrade');

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

    public function uzmi_predmete()  {
        $query = $this->db->get('predmet');
        return $query->result_array();
    }
    
    public function brisi($predmet) {
        $this->db->delete('predmet', array('SifP' => $predmet));
    }

    public function nadjiprofesora($sifra){

        $query = $this->db->get_where('zaposleni', array('SifZ' => $sifra));
        return $query->result_array();
    }

    public function dodajprofesora($ime, $prezime, $sifra, $status, $pol, $slika, $lozinka) {
        $this->load->helper('url');
        $data = array  (
            'SifZ' => $sifra,
            'Sifra' => $lozinka,
            'Ime' => $ime,
            'Prezime' => $prezime,
            'Status' => $status,
            'Pol' => $pol,
            'Slika' => $slika
        );
        $this->db->insert('zaposleni', $data);
    }

    public function dodajpredmet($sifra, $naziv, $godina, $cenaposatu, $sifrazap) {
        $this->load->helper('url');
        $data = array  (
            'SifP' => $sifra,
            'Naziv' => $naziv,
            'Godina' => $godina,
            'CenaPoSatu' => $cenaposatu,
            'SifZ' => $sifrazap
        );
        $this->db->insert('predmet', $data);
    }

    public function nadjipredmetponazivu($naziv) {
        $query = $this->db->get_where('predmet', array('naziv' => $naziv));
        if($query==null) return null;
        return $query->result_array();
    }

    public function nadjipredmetposifri($sifra){
        $query = $this->db->get_where('predmet', array('SifP' => $sifra));
        if($query==null) return null;
        return $query->result_array();
    }

}