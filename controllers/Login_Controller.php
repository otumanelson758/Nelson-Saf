<?php
/**
 * Created by Atom.
 * User: reaper45
 * Date: 06/24/17
 * Time : 20:35 PM
 *
 */
 // namespace controllers

 class Login_Controller extends Controller
 {

   function __construct($metod)
   {
     parent::__construct($metod);
   }

   // Login form view
   public function index()
   {
     $data['title'] = 'Login';

     return new View("auth.login", $data);
   }

   // Authenticate user (login)
   public function authenticate()
   {
     // Get form data
     $formdata = Input::all();

     // Validate Input data
     $validator = new Validator;

     $validate = $validator->make($formdata,[
       'email'=>'required|email',
       'password'=>'required'
     ]);

     // If errors exists redirect back
     if ($validator->fails()) {
       $errors = $validator->errors();

       Session::putErrors($errors);
       return Redirect::back();
     }
     // Find user with email
     $user = Model_User::where(['email', $formdata['email']]);

     if ($user) {
       return Model_User::login($user);

       $data['title'] = 'Dashboard';
       Session::put('user', $formdata);

       return new View("home", $data);
     }
     return Redirect::back();
   }
 }
