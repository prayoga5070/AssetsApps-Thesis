<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
  
  function __construct()
  {
    parent::__construct();

    // Initialize response
    $this->response = new stdClass;
    $this->response->status = true;
    $this->requester = $this->_get_requester();
  }

//   function _get_requester()
//   {
//     if($user = $this->get_user()) {
//       return $user;
//     } else {
//       $this->_return_forbidden("Token tidak ditemukan");
//     }
//   }

//   private function get_user()
//   {
//     $this->load->model('authentication_m', 'authentication');

//     $data = $this->authentication->show($_SERVER['PHP_AUTH_USER']);

//     return count($data) > 0 ? $data[0] : null;
//   }

  protected function _return_forbidden($message)
  {
    header('HTTP/1.0 403 Forbidden');
    echo $message;
    die();
  }

  protected function _validate_index_datatable()
  {
    $response = $this->response;
    $request = $this->request;

    // Main validation datatable
    $response = get_must_sent_message($response, !isset($request->draw), "draw");
    $response = get_must_sent_message($response, !isset($request->start), "start");
    $response = get_must_sent_message($response, !isset($request->length), "length");
    $response = get_must_sent_message($response, !isset($request->search), "search");
    $response = get_must_sent_message($response, !isset($request->order[0]['column']), "order[0]['column']");
    $response = get_must_sent_message($response, !isset($request->order[0]['dir']), "order[0]['dir']");

    if($response->status)
    {
      // Main validation datatable
      $response = must_filled($response, $request->draw, "draw");
      $response = must_filled($response, $request->start !== null, "start");
      $response = must_filled($response, $request->length, "length");
      $response = must_filled($response, $request->order[0]['column'] !== null, "order[0]['column']");
      $response = must_filled($response, $request->order[0]['dir'], "order[0]['dir']");
    }
  }

  protected function _validate_select2()
  {
    $response = $this->response;
    $request = $this->request;

    // Main validation datatable
    $response = get_must_sent_message($response, !isset($request->page), "page");

    if($response->status)
    {
      // Main validation datatable
      $response = must_filled($response, $request->page, "page");

      if (!isset($request->search)) $request->search = '';
    }
  }
  
}

// 272