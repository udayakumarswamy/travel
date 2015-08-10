<?php
if (! defined('BASEPATH')) exit('No direct script access');
class Country extends CI_Model
{


  function get_country() {
    $this->load->database();
    $sql = ('select * from countries');
    $query = $this->db->query($sql);

    foreach($query->result_array() as $row) {
      $cn_id = $row['abbreviation'];
      $data[$cn_id] = $row['country'];
      
    }

    return $data;
  }
  function get_country_ids() {
    $this->load->database();
    $sql = ('select * from countries');
    $query = $this->db->query($sql);

    foreach($query->result_array() as $row) {
      $cn_id = $row['abbreviation'];
      $data[$row['id']] = $row['country'];
      
    }

    return $data;
  }
  function get_country_by_id($id) {
    $this->load->database();
    $sql = ("select * from countries where id='$id'");
    $query = $this->db->query($sql);

    return $query->row_array();
  }

  function get_statecityzip() {
    $this->load->database();
    $sql = ('select * from zip_codes');
    $query = $this->db->query($sql);

    foreach($query->result_array() as $row) {
      $zip_id = $row['zip'];
      $data[$zip_id] = $row['full_state']."-".$row['city'];
    }

    return $data;
  }
  function get_country_by_abv($keyword){
    $this->db->select('*');
    $this->db->from('countries');
    $this->db->like('country',$keyword,'after');
    $result=$this->db->get();
    return $result->result_array();
    
  }
}