<?php
class Show extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('data_model');
  }

  public function index()
  {
    $this->load->view('templates/header');
    $this->load->view('templates/nav_logged_out');
    $this->load->view('homepage');
    $this->load->view('templates/footer');
  }

  public function login_form()
  {
    $this->load->view('templates/header');
    $this->load->view('templates/nav_logged_out');
    $this->load->view('session/login_form');
    $this->load->view('templates/footer');
  }

  public function log_in() {
    // print_r($this->input->post());
    // tunnus=user, salasana=password
    $post_login = $this->input->post('tunnus');
    $post_password = $this->input->post('salasana');

    $this->load->model('Session_model');
    $check_password = $this->Session_model->get_password($post_login);

    // if (password_verify($post_password, $check_password)) {
    if ($check_password == $post_password) {
      $_SESSION['logged_in'] = true;
      $_SESSION['user'] = $post_login;
      $this->Temperature();
    }
    else {
      $_SESSION['logged_in'] = false;
      $data['message']='Käyttäjätunnus tai salasana on väärin.';
      $this->load->view('templates/header');
      $this->load->view('templates/nav_logged_out');
      $this->load->view('templates/message', $data);
      $this->load->view('session/login_form');
      $this->load->view('templates/footer');
    }
  }

  public function logout() {
    $_SESSION['logged_in']=false;
    $this->index();
  }

  public function temperature()
  {
    $data['title'] = 'Lämpötila (C)';
    $data['unit'] = 'Lämpötila (C)';
    $data['max'] = 30;
    $data['values'] = $this->data_model->get_temperature();
    $data['sensor'] = 'temperature_val_C';

    $this->load->view('templates/header');
    $this->load->view('templates/nav_logged_in');
    $this->load->view('sensors/sensors_list');
    $this->load->view('sensors/data', $data);
    $this->load->view('templates/footer');
  }

  public function temperature_NTC()
  {
    $data['title'] = 'NTC-Lämpötila (C)';
    $data['unit'] = 'Lämpötila (C)';
    $data['max'] = 30;
    $data['values'] = $this->data_model->get_temperature_NTC();
    $data['sensor'] = 'temperature_ntc';

    $this->load->view('templates/header');
    $this->load->view('templates/nav_logged_in');
    $this->load->view('sensors/sensors_list');
    $this->load->view('sensors/data', $data);
    $this->load->view('templates/footer');
  }

  public function humidity()
  {
    $data['title'] = 'Kosteus (%)';
    $data['unit'] = 'Kosteus (%)';
    $data['max'] = 100;
    $data['values'] = $this->data_model->get_humidity();
    $data['sensor'] = 'humidity_val';

    $this->load->view('templates/header');
    $this->load->view('templates/nav_logged_in');
    $this->load->view('sensors/sensors_list');
    $this->load->view('sensors/data', $data);
    $this->load->view('templates/footer');
  }

  public function light()
  {
    $data['title'] = 'Valaistus (%)';
    $data['unit'] = 'Valaistus (%)';
    $data['max'] = 100;
    $data['values'] = $this->data_model->get_light();
    $data['sensor'] = 'light_val';

    $this->load->view('templates/header');
    $this->load->view('templates/nav_logged_in');
    $this->load->view('sensors/sensors_list');
    $this->load->view('sensors/data', $data);
    $this->load->view('templates/footer');
  }

  public function audio()
  {
    $data['title'] = 'Ääni (dB)';
    $data['unit'] = 'Ääni (dB)';
    $data['max'] = 120;
    $data['values'] = $this->data_model->get_audio();
    $data['sensor'] = 'audio_dB';

    $this->load->view('templates/header');
    $this->load->view('templates/nav_logged_in');
    $this->load->view('sensors/sensors_list');
    $this->load->view('sensors/data', $data);
    $this->load->view('templates/footer');
  }

  public function bat()
  {
    $data['title'] = 'Akun varaustila (V)';
    $data['unit'] = 'Akun varaustila (V)';
    $data['max'] = 5;
    $data['values'] = $this->data_model->get_bat();
    $data['sensor'] = 'bat_val';

    $this->load->view('templates/header');
    $this->load->view('templates/nav_logged_in');
    $this->load->view('sensors/sensors_list');
    $this->load->view('sensors/data', $data);
    $this->load->view('templates/footer');
  }

  public function gas()
  {
    $data['title'] = 'CO2 (PPM)';
    $data['unit'] = 'CO2 (PPM)';
    $data['max'] = 1023;
    $data['values'] = $this->data_model->get_gas();
    $data['sensor'] = 'gas_val';

    $this->load->view('templates/header');
    $this->load->view('templates/nav_logged_in');
    $this->load->view('sensors/sensors_list');
    $this->load->view('sensors/data', $data);
    $this->load->view('templates/footer');
  }

  public function voc()
  {
    $data['title'] = 'TVOC (PPM)';
    $data['unit'] = 'TVOC (PPM)';
    $data['max'] = 1023;
    $data['values'] = $this->data_model->get_voc();
    $data['sensor'] = 'voc_val';

    $this->load->view('templates/header');
    $this->load->view('templates/nav_logged_in');
    $this->load->view('sensors/sensors_list');
    $this->load->view('sensors/data', $data);
    $this->load->view('templates/footer');
  }
}
