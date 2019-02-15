<?php
class Data_model extends CI_Model {

  public function __construct()
  {
    $this->load->database();
  }

  public function get_temperature() {
  $this->db->select('datetime_val, temperature_val_C');
  $this->db->from('SensorValues');
  /*
  $this->db->where('datetime_val >= now() - INTERVAL 1 DAY AND datetime_val <= now()');
  */
  $this->db->where('datetime_val >= now() - INTERVAL 1 DAY AND datetime_val <= now()');
  $this->db->order_by('datetime_val', 'asc');
  return $this->db->get()->result_array();
  }

  public function get_temperature_NTC() {
  $this->db->select('datetime_val, temperature_ntc');
  $this->db->from('SensorValues');
  $this->db->where('datetime_val >= now() - INTERVAL 1 DAY AND datetime_val <= now()');
  $this->db->order_by('datetime_val', 'asc');
  return $this->db->get()->result_array();
  }

  public function get_humidity() {
    $this->db->select('datetime_val, humidity_val');
    $this->db->from('SensorValues');
    $this->db->where('datetime_val >= now() - INTERVAL 1 DAY AND datetime_val <= now()');
    $this->db->order_by('datetime_val', 'asc');
    return $this->db->get()->result_array();
  }

  public function get_light() {
    $this->db->select('datetime_val, light_val');
    $this->db->from('SensorValues');
    $this->db->where('datetime_val >= now() - INTERVAL 1 DAY AND datetime_val <= now()');
    $this->db->order_by('datetime_val', 'asc');
    return $this->db->get()->result_array();
  }

  public function get_audio() {
    $this->db->select('datetime_val, audio_dB');
    $this->db->from('SensorValues');
    $this->db->where('datetime_val >= now() - INTERVAL 1 DAY AND datetime_val <= now()');
    $this->db->order_by('datetime_val', 'asc');
    return $this->db->get()->result_array();
  }

  public function get_bat() {
    $this->db->select('datetime_val, bat_val');
    $this->db->from('SensorValues');
    $this->db->where('datetime_val >= now() - INTERVAL 1 DAY AND datetime_val <= now()');
    $this->db->order_by('datetime_val', 'asc');
    return $this->db->get()->result_array();
  }

  public function get_gas() {
    $this->db->select('datetime_val, gas_val');
    $this->db->from('SensorValues');
    $this->db->where('datetime_val >= now() - INTERVAL 1 DAY AND datetime_val <= now()');
    $this->db->order_by('datetime_val', 'asc');
    return $this->db->get()->result_array();
  }

  public function get_voc() {
    $this->db->select('datetime_val, voc_val');
    $this->db->from('SensorValues');
    $this->db->where('datetime_val >= now() - INTERVAL 1 DAY AND datetime_val <= now()');
    $this->db->order_by('datetime_val', 'asc');
    return $this->db->get()->result_array();
  }
}
