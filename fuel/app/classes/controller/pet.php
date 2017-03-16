<?php

class Controller_Pet extends Fuel\Core\Controller_Template {

    public $template = 'frontend/template';

    public function action_index() {
        $oPets = Model_Pet::find('all');
        $oView = View::forge('pet/index', array('oPets' => $oPets));
        $this->template->sContent = $oView;
    }

    public function action_create() {
        $oPet = new Model_Pet();
        $this->template = '';
        return Response::forge(View::forge('pet/_actions', array('oPet' => $oPet, 'iCustomerId' => $this->param('customer_id'))));
    }

    public function action_edit() {
        $iIdPet = $this->param('id', 0);
        $oPet = Model_Pet::find($iIdPet);
        
        $this->template = '';
        return Response::forge(View::forge('pet/_actions', array('oPet' => $oPet, 'iCustomerId' => $oPet->customer_id)));
    }

    public function action_save() {
        $this->template = '';
        $iIdPet = Input::post('id');

        $oPet = Model_Pet::find($iIdPet);

        if (is_null($oPet)) {
            $oPet = new Model_Pet();
            $oPet->customer_id = Input::post('customer_id');
        }

        $oPet->name = Input::post('name');
        $oPet->race = Input::post('race');
        $oPet->weight = Input::post('weight');
        $oPet->save();
        Session::set_flash('alert', 'Pet salvo com sucesso.');
    }

    public function action_remove() {
        $iIdPet = $this->param('id', 0);
        $oPet = Model_Pet::find($iIdPet);

        if (!$oPet) {
            return Response::forge(json_encode(array(
                        'status' => 'fail',
            )));
        }

        try {
            $oPet->delete();
            Session::set_flash('alert', 'Pet removido com sucesso.');
            return Response::forge(json_encode(array(
                        'status' => 'success',
            )));
        } catch (Exception $ex) {
            return Response::forge(json_encode(array(
                        'status' => 'fail'
            )));
        }
    }

}
