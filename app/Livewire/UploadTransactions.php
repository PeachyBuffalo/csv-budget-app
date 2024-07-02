<?php
namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class UploadTransactions extends Component
{
    use WithFileUploads;

    public $file;

    public function save()
    {
        $this->validate([
            'file' => 'required|mimes:csv,txt',
        ]);

        $path = $this->file->store('csv');

        $this->parseCSV(storage_path('app/' . $path));

        session()->flash('message', 'Transactions imported successfully.');

        return redirect()->route('dashboard');
    }

    public function parseCSV($path)
    {
        if (($handle = fopen($path, 'r')) !== false) {
            while (($data = fgetcsv($handle, 1000, ',')) !== false) {
                Transaction::create([
                    'user_id' => Auth::id(),
                    'description' => $data[0],
                    'amount' => $data[1],
                    'date' => $data[2],
                ]);
            }
            fclose($handle);
        }
    }

    public function render()
    {
        return view('livewire.upload-transactions');
    }
}

