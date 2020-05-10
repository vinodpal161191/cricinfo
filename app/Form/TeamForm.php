<?php

namespace App\Form;
use DB;

use Kris\LaravelFormBuilder\Form;

class TeamForm extends Form
{
    public function buildForm()
    {
        $logoUri = null;
        if ($this->model && $this->model->logoUri) {
            $logoUri = route('image_factory', [$this->model->logoUri, 'w' => 120, 'h' => 90]);
        }
        // if ($logoUri) {
        //     $this->add('logoUri', 'static', [
        //         'tag' => 'div',
        //         'value' => "<img src='$logoUri'>"
        //     ]);
        // }
        $this->add('logoUri', 'file', ['rules' => 'image']);
        $this->add('name', 'text', ['rules' => 'required|max:255']);
        $this->add('identifier', 'text', ['rules' => 'required|max:255']);
        $this->add('clubState', 'text', ['rules' => 'required|max:255']);
        $this->add('submit', 'submit', ['label' => 'Save', 'attr' => ['class' => 'btn btn-success']])
        ->add('clear', 'reset', ['label' => 'Clear', 'attr' => ['class' => 'btn btn-default']]);
    }
}
