<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\Component;

class Index extends Component
{

    protected $listeners = [
        'reload' => '$refresh'
    ];

    protected function getUserList()
    {
        return User::where('id', '<>', auth()->id())->paginate(10);
    }

    public function downloadPdf(User $user)
    {
        $pdfContent = PDF::loadView('pdf.profile', ['user' => $user])->output();

        return response()->streamDownload(
            fn () => print($pdfContent),
            "user-profile-{$user->id}.pdf"
        );
    }

    public function delete(User $user)
    {
        $user->delete();
    }

    public function render()
    {
        return view('livewire.user.index', ['users' => $this->getUserList()]);
    }
}
