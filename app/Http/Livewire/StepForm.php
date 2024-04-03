<?php

namespace App\Http\Livewire;

use App\Models\Form;
use Carbon\Carbon;
use Livewire\Component;

class StepForm extends Component
{
    public $first_name;
    public $last_name;
    public $address;
    public $city;
    public $country;
    public $date_of_birth;
    public $is_married = "";
    public $marriage_country;
    public $date_of_marriage;
    public $had_past_marriage;
    public $is_widowed;
    public $currentStep = 1;

    protected $listeners = ['dateSelected'];

    public function mount()
    {
        $this->currentStep = 1;
    }


    public function render()
    {
        return view('livewire.step-form');
    }

    public function nextStep()
    {
        $this->resetErrorBag();
        $this->validateData();
        $this->currentStep++;
    }

    public function validateData()
    {

        if ($this->currentStep == 1) {
            $this->validate([
                'first_name' => 'required|string',
                'last_name' => 'required|string',
                'address' => 'required|string',
                'city' => 'required|string',
                'country' => 'required|string',
                'date_of_birth' => 'required|string',
            ]);
        } elseif ($this->currentStep == 2) {
            $rules = [
                'is_married' => 'required|boolean',
            ];

            // Create validation date to ensure user was 18 years old for marriage
            $after = Carbon::createFromFormat('Y-m-d', $this->date_of_birth)
                ->addYears(18)
                ->format('Y-m-d');
            if ($this->is_married) {
                $rules['marriage_country'] = 'required|string';
                $rules['date_of_marriage'] = "required|string|after_or_equal:$after";
            } elseif ($this->is_married !== "") {
                $rules['is_widowed'] = 'required|boolean';
                $rules['had_past_marriage'] = 'required|boolean';
            }

            $messages = [
                'date_of_marriage.after_or_equal' => 'You are not eligible to apply because your marriage occurred before your 18th birthday.',
            ];

            $this->validate($rules, $messages);
        }
    }

    public function previousStep()
    {
        $this->resetErrorBag();
        $this->currentStep--;
    }

    public function dateSelected($date, $identifier)
    {
        if ($identifier === 'date_of_birth') {
            $this->date_of_birth = $date;
        } else {
            if ($identifier === 'date_of_marriage') {
                $this->date_of_marriage = $date;
            }
        }
    }

    public function save()
    {
        $this->resetErrorBag();
        $this->validateData();

        $attributes = [
            "first_name" => $this->first_name,
            "last_name" => $this->last_name,
            'address' => $this->address,
            "country" => $this->country,
            "city" => $this->city,
            "date_of_birth" => $this->date_of_birth,
            'is_married' => $this->is_married,
            'marriage_country' => $this->marriage_country,
            'date_of_marriage' => $this->date_of_marriage,
            'is_widowed' => $this->is_widowed,
            'had_past_marriage' => $this->had_past_marriage,
        ];

        $form = Form::create($attributes);

        return redirect()->route('form.show', ['form' => $form->getKey()]);
    }
}
