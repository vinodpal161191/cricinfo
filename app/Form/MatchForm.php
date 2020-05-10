<?php

namespace App\Form;
use DB;

use Kris\LaravelFormBuilder\Form;

class MatchForm extends Form
{
    public function buildForm()
    {
        $this->add('match_status', 'select', [
            'choices' => ['win' => 'Win', 'loss' => 'Loss'],
            'label' => 'Match Status for Team 1'
            // 'selected' => '1'
        ]);
        $this->add('location', 'text', ['rules' => 'required|max:255']);
        $this->add('submit', 'submit', ['label' => 'Save', 'attr' => ['class' => 'btn btn-success']])
        ->add('clear', 'reset', ['label' => 'Clear', 'attr' => ['class' => 'btn btn-default']]);
    }
}
