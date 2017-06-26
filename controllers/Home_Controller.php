<?php
/**
 * Created by Atom.
 * User: reaper45
 * Date: 06/24/17
 * Time : 20:25 PM
 *
 */
// namespace controllers;

class Home_Controller extends Controller
{
  // Implemet parent contructor
  function __construct($method)
  {
    parent::__construct($method);
  }

  // Loading the home view
  public function index()
  {
    $data['title'] = "Home";

    if (Session::has('user')) {
      return new View('home', $data);
    }
    return new View('home', $data);
  }

}
