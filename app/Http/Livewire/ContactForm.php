<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Log;
use Livewire\Component;

class ContactForm extends Component
{
	public $name;
	public $email;
	public $region;
	public $message;

	public function mount() {
		$this->email = 'aria@noriatech.com';
		$this->region = 'mke';
	}

    public function render() {
        return view('livewire.contact-form');
    }

     public function updated($field) {
        $this->validateOnly($field, [
            'name' => 'min:2',
            'email' => 'email',
            'message' => 'min:6',
        ]);
    }

    public function submit() {
    	sleep(1);
    	$data = $this->validate([
    		'name' => 'required|min:2',
    		'email' => 'required|email',
    		'region' => 'required',
    		'message' => 'required|min:6'
    	]);

    	sleep(2);

    	Log::info('Form submitted. Data: ', $data);
    	
    	session()->flash('success', 'Message has been sent! Thank you for contacting us...');
    	$this->reset();
    }
}
