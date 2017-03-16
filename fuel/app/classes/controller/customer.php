<?php

class Controller_Customer extends Controller_Template {

    public $template = 'frontend/template';

    public function action_index() {
        $oCustomers = Model_Customer::find('all');
        $oView = View::forge('customer/index', array('oCustomers' => $oCustomers));
        $this->template->sContent = $oView;
    }

    public function action_create() {
        $oCustomer = new Model_Customer();
        $oView = View::forge('customer/action', array('oCustomer' => $oCustomer));
        $this->template->sContent = $oView;
    }

    public function action_edit() {
        $iIdCustomer = $this->param('id', 0);

        $oCustomer = Model_Customer::find($iIdCustomer);

        if (!$oCustomer) {
            Session::set_flash('error', 'Cliente não existe');
            Response::redirect(Uri::create('cliente'));
        }

        $oView = View::forge('customer/action', array('oCustomer' => $oCustomer));
        $this->template->sContent = $oView;
    }

    public function action_remove() {
        $iCustomerId = $this->param('id', 0);
        $oCustomer = Model_Customer::find($iCustomerId);

        if (!$oCustomer) {
            return Response::forge(json_encode(array(
                        'status' => 'fail',
            )));
        }

        try {
            $oCustomer->delete();
            Session::set_flash('alert', 'Cliente removido com sucesso.');
            return Response::forge(json_encode(array(
                        'status' => 'success',
            )));
        } catch (Exception $ex) {
            return Response::forge(json_encode(array(
                        'status' => 'fail'
            )));
        }
    }

    public function action_save() {
        $iCustomerId = Input::post('id');

        $oCustomer = Model_Customer::find($iCustomerId);

        if (is_null($oCustomer)) {
            $oCustomer = new Model_Customer();
        }

        $oCustomer->name = Input::post('name');
        $oCustomer->phone = Input::post('phone');
        $oCustomer->save();
        Session::set_flash('alert', 'Cliente salvo com sucesso.');
        Response::redirect(Uri::create('cliente/' . $oCustomer->id . '/editar'));
    }

}
