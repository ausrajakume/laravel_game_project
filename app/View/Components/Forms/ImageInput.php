<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;

class ImageInput extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $label,
        public string $oldInputName,
        public Collection|array $images = [],
        public string $inputName = '',
        public string $inputId = ''
    )
    {
        if(!$this->inputName){
            $this->inputName = $this->label;
        }
        if(!$this->inputId){
            $this->inputId = $this->label;
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.image-input');
    }
}
