<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class UpdateProfilePictureForm extends Component {

    use WithFileUploads;
    public function render() {

        return view( 'livewire.update-profile-picture-form' );
    }

    public $image;

    public function update_photo() {
        $this->validate( array(
            'image' => 'image|max:1024', // 1MB Max
        ) );

        $this->image->store( 'image' );
    }

}